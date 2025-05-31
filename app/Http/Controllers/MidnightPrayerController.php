<?php

namespace App\Http\Controllers;

use App\Models\MidnightPrayer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class MidnightPrayerController extends Controller
{
    protected $zoomApiKey;
    protected $zoomApiSecret;
    protected $zoomAccountId;
    protected $audioStoragePath = 'public/audio/midnight-prayers';

    public function __construct()
    {
        $this->zoomApiKey = env('ZOOM_API_KEY');
        $this->zoomApiSecret = env('ZOOM_API_SECRET');
        $this->zoomAccountId = env('ZOOM_ACCOUNT_ID');
    }

    public function index()
    {
        // Get the latest prayers from the database
        $pageName = 'Midnight Prayers';
        $sermons = MidnightPrayer::orderBy('recording_date', 'desc')->paginate(10);

        return view('pages.midnight-prayers.index', compact('sermons', 'pageName'));
    }

    public function show($id)
    {
        $sermon = MidnightPrayer::findOrFail($id);
        $pageName = 'Midnight Prayer';
        return view('pages.midnight-prayers.show', compact('sermon', 'pageName'));
    }

    public function fetchLatestRecordings()
    {
        Log::info('Zoom credentials check:', [
            'API Key exists: ' . (!empty($this->zoomApiKey) ? 'Yes' : 'No'),
            'API Secret exists: ' . (!empty($this->zoomApiSecret) ? 'Yes' : 'No'),
            'Account ID exists: ' . (!empty($this->zoomAccountId) ? 'Yes' : 'No')
        ]);

        // Get OAuth token for Zoom API
        $token = $this->getZoomOAuthToken();

        if (!$token) {
            Log::error('Failed to get OAuth token');
            return response()->json(['success' => false, 'message' => 'Failed to get OAuth token'], 500);
        }

        Log::info('OAuth token obtained successfully');

        // Get recordings from the last 30 days
        $from = Carbon::now()->subDays(30)->format('Y-m-d');
        $to = Carbon::now()->format('Y-m-d');

        // Try user endpoint instead of account endpoint
        $url = "https://api.zoom.us/v2/users/me/recordings";
        Log::info('Requesting Zoom API (user endpoint): ' . $url);

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json',
            ])->get($url, [
                'from' => $from,
                'to' => $to,
                'page_size' => 100,
            ]);

            Log::info('Zoom API response status: ' . $response->status());

            if ($response->successful()) {
                $data = $response->json();
                Log::info('Zoom API response data structure: ' . json_encode(array_keys($data)));

                if (isset($data['meetings']) && is_array($data['meetings'])) {
                    // Log the first meeting structure to understand the format
                    if (!empty($data['meetings'])) {
                        Log::info('First meeting structure: ' . json_encode(array_keys($data['meetings'][0])));

                        if (isset($data['meetings'][0]['recording_files']) && !empty($data['meetings'][0]['recording_files'])) {
                            Log::info('First recording file structure: ' . json_encode($data['meetings'][0]['recording_files'][0]));
                        }
                    }

                    $recordings = $data['meetings'];
                    $this->processRecordings($recordings, $token);

                    return response()->json([
                        'success' => true,
                        'message' => 'Recordings fetched successfully',
                        'count' => count($recordings)
                    ]);
                } else {
                    Log::error('Zoom API response missing meetings key or not an array: ' . json_encode($data));
                    return response()->json(['success' => false, 'message' => 'Invalid API response format'], 500);
                }
            } else {
                Log::error('Zoom API error: ' . $response->body());
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to fetch recordings: ' . $response->status(),
                    'details' => $response->json()
                ], 500);
            }
        } catch (\Exception $e) {
            Log::error('Exception when calling Zoom API: ' . $e->getMessage());
            Log::error('Exception trace: ' . $e->getTraceAsString());
            return response()->json(['success' => false, 'message' => 'Exception: ' . $e->getMessage()], 500);
        }
    }

    protected function getZoomOAuthToken()
    {
        // Cache the token to avoid generating it on every request
        return Cache::remember('zoom_oauth_token', 3500, function () {
            try {
                Log::info('Requesting OAuth token from Zoom');

                $response = Http::withBasicAuth($this->zoomApiKey, $this->zoomApiSecret)
                    ->asForm()
                    ->post('https://zoom.us/oauth/token', [
                        'grant_type' => 'account_credentials',
                        'account_id' => $this->zoomAccountId,
                    ]);

                Log::info('OAuth response status: ' . $response->status());

                if ($response->successful()) {
                    $data = $response->json();
                    Log::info('OAuth token obtained successfully');
                    return $data['access_token'];
                } else {
                    Log::error('OAuth error: ' . $response->body());
                    return null;
                }
            } catch (\Exception $e) {
                Log::error('Exception when getting OAuth token: ' . $e->getMessage());
                return null;
            }
        });
    }

    protected function processRecordings($recordings, $token)
    {
        $count = 0;

        // Ensure storage directory exists
        if (!Storage::exists($this->audioStoragePath)) {
            Storage::makeDirectory($this->audioStoragePath);
        }

        foreach ($recordings as $recording) {
            try {
                // Log the recording structure
                Log::info('Processing recording: ' . $recording['topic'] . ' (UUID: ' . $recording['uuid'] . ')');

                // Get the day of the week from the recording start time
                $recordingDate = Carbon::parse($recording['start_time']);
                $dayOfWeek = $recordingDate->dayOfWeek; // 2 for Tuesday, 3 for Wednesday

                // Only process recordings from Tuesday (2) and Wednesday (3)
                if ($dayOfWeek !== 2 && $dayOfWeek !== 3) {
                    Log::info('Skipping recording from ' . $recordingDate->format('l') . ': ' . $recording['topic']);
                    continue;
                }

                // Check if this is a midnight prayer recording
                if (
                    stripos($recording['topic'], 'midnight') !== false ||
                    stripos($recording['topic'], 'prayer') !== false ||
                    stripos($recording['topic'], 'sermon') !== false ||
                    stripos($recording['topic'], 'service') !== false
                ) {

                    if (!isset($recording['recording_files']) || !is_array($recording['recording_files'])) {
                        Log::warning('No recording files found for meeting: ' . $recording['uuid']);
                        continue;
                    }

                    // First look for M4A (audio) files
                    $audioFile = null;
                    foreach ($recording['recording_files'] as $file) {
                        if (isset($file['file_type']) && ($file['file_type'] === 'M4A' || $file['file_type'] === 'MP3')) {
                            $audioFile = $file;
                            break;
                        }
                    }

                    // If no audio file, try to use MP4 (we'll extract audio later)
                    if (!$audioFile) {
                        foreach ($recording['recording_files'] as $file) {
                            if (isset($file['file_type']) && $file['file_type'] === 'MP4') {
                                $audioFile = $file;
                                break;
                            }
                        }
                    }

                    if (!$audioFile) {
                        Log::warning('No suitable audio file found for meeting: ' . $recording['uuid']);
                        continue;
                    }

                    // Check if we already have this recording
                    $existingSermon = MidnightPrayer::where('zoom_recording_id', $recording['uuid'])->first();

                    if (!$existingSermon) {
                        // Get duration from recording_length or duration field
                        $duration = 0;
                        if (isset($audioFile['recording_length'])) {
                            $duration = $audioFile['recording_length'];
                        } elseif (isset($audioFile['duration'])) {
                            $duration = $audioFile['duration'];
                        } elseif (isset($audioFile['recording_duration'])) {
                            $duration = $audioFile['recording_duration'];
                        }

                        // Generate a safe filename
                        $safeTitle = Str::slug($recording['topic']);
                        $fileName = $safeTitle . '-' . date('Y-m-d', strtotime($recording['start_time'])) . '-' . substr($recording['uuid'], 0, 8);
                        $fileExtension = strtolower($audioFile['file_type']);
                        $localFilePath = $fileName . '.' . $fileExtension;
                        $fullStoragePath = $this->audioStoragePath . '/' . $localFilePath;

                        // Download the file
                        $downloadSuccess = $this->downloadAudioFile($audioFile['download_url'], $token, $fullStoragePath);

                        if ($downloadSuccess) {
                            $date = Carbon::parse($recording['start_time']);
                            // Create a new sermon record
                            MidnightPrayer::create([
                                'title' => $date->format('l') . ' Midnight Prayer - ' . $date->format('F j, Y'),
                                'description' => $recording['topic'],
                                'recording_date' => $date,
                                'duration' => $recording['duration'] ?? $duration,
                                'zoom_recording_id' => $recording['uuid'],
                                'file_url' => $audioFile['download_url'],
                                'file_type' => $audioFile['file_type'],
                                'file_size' => $audioFile['file_size'] ?? 0,
                                'play_url' => $audioFile['play_url'],
                                'download_token' => $this->generateDownloadToken($audioFile['download_url']),
                                'status' => 'published',
                                'local_file_path' => $localFilePath,
                            ]);
                            $count++;
                            Log::info('Added new recording: ' . $recording['topic'] . ' with local file: ' . $localFilePath);
                        } else {
                            Log::error('Failed to download audio file for: ' . $recording['topic']);
                        }
                    } else {
                        // If the record exists but we don't have the local file, download it
                        if (empty($existingSermon->local_file_path) || !Storage::exists($this->audioStoragePath . '/' . $existingSermon->local_file_path)) {
                            // Generate a safe filename
                            $safeTitle = Str::slug($recording['topic']);
                            $fileName = $safeTitle . '-' . date('Y-m-d', strtotime($recording['start_time'])) . '-' . substr($recording['uuid'], 0, 8);
                            $fileExtension = strtolower($audioFile['file_type']);
                            $localFilePath = $fileName . '.' . $fileExtension;
                            $fullStoragePath = $this->audioStoragePath . '/' . $localFilePath;

                            // Download the file
                            $downloadSuccess = $this->downloadAudioFile($audioFile['download_url'], $token, $fullStoragePath);

                            if ($downloadSuccess) {
                                $existingSermon->local_file_path = $localFilePath;
                                $existingSermon->save();
                                Log::info('Updated existing recording with local file: ' . $localFilePath);
                            }
                        } else {
                            Log::info('Recording already exists with local file: ' . $existingSermon->local_file_path);
                        }
                    }
                }
            } catch (\Exception $e) {
                Log::error('Error processing recording: ' . $e->getMessage());
                Log::error('Recording data: ' . json_encode($recording));
            }
        }
        Log::info("Processed {$count} new recordings");
    }

    protected function downloadAudioFile($downloadUrl, $token, $storagePath)
    {
        try {
            Log::info('Downloading audio file to: ' . $storagePath);

            // Add access token to the download URL
            $downloadUrlWithToken = $downloadUrl . '?access_token=' . $token;

            // Download the file
            $response = Http::withOptions([
                'sink' => Storage::path($storagePath),
                'timeout' => 300, // 5 minutes timeout for large files
            ])->get($downloadUrlWithToken);

            if ($response->successful()) {
                Log::info('File downloaded successfully');
                return true;
            } else {
                Log::error('Failed to download file: ' . $response->status());
                return false;
            }
        } catch (\Exception $e) {
            Log::error('Exception when downloading file: ' . $e->getMessage());
            return false;
        }
    }

    protected function generateDownloadToken($downloadUrl)
    {
        // Generate a token for downloading the file
        // This is a simplified version, you might want to implement a more secure approach
        return md5($downloadUrl . time());
    }

    public function download($id)
    {
        $sermon = MidnightPrayer::findOrFail($id);

        // Check if we have a local file
        if (!empty($sermon->local_file_path) && Storage::exists($this->audioStoragePath . '/' . $sermon->local_file_path)) {
            return Storage::download($this->audioStoragePath . '/' . $sermon->local_file_path, $sermon->title . '.' . strtolower($sermon->file_type));
        }

        // Fallback to Zoom URL if local file doesn't exist
        $token = $this->getZoomOAuthToken();
        $downloadUrl = $sermon->file_url . "?access_token=" . $token;

        return redirect($downloadUrl);
    }

    public function play($id)
    {
        $sermon = MidnightPrayer::findOrFail($id);

        // Check if we have a local file
        if (!empty($sermon->local_file_path) && Storage::exists($this->audioStoragePath . '/' . $sermon->local_file_path)) {
            $filePath = Storage::path($this->audioStoragePath . '/' . $sermon->local_file_path);
            $fileSize = filesize($filePath);
            $fileName = basename($filePath);

            $headers = [
                'Content-Type' => 'audio/' . strtolower(str_replace('M4A', 'mp4', $sermon->file_type)),
                'Content-Length' => $fileSize,
                'Content-Disposition' => 'inline; filename="' . $fileName . '"',
                'Accept-Ranges' => 'bytes',
            ];

            return response()->file($filePath, $headers);
        }

        // Fallback to Zoom URL if local file doesn't exist
        return redirect($sermon->play_url);
    }
}
