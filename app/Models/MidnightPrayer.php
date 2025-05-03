<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MidnightPrayer extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'description',
        'recording_date',
        'duration',
        'zoom_recording_id',
        'file_url',
        'file_type',
        'file_size',
        'play_url',
        'download_token',
        'status',
        'local_file_path',
    ];
    
    protected $casts = [
        'recording_date' => 'datetime',
    ];
    
    public function getDurationForHumans()
    {
        $minutes = floor($this->duration / 60);
        $seconds = $this->duration % 60;
        
        return sprintf('%02d:%02d', $minutes, $seconds);
    }
    
    public function getFileSizeForHumans()
    {
        $bytes = $this->file_size;
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        
        $bytes /= (1 << (10 * $pow));
        
        return round($bytes, 2) . ' ' . $units[$pow];
    }
}
