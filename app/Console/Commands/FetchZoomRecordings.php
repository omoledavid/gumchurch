<?php

namespace App\Console\Commands;

use App\Http\Controllers\MidnightPrayerController;
use Illuminate\Console\Command;

class FetchZoomRecordings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'zoom:fetch-recordings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch latest sermon recordings from Zoom';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Fetching latest sermon recordings from Zoom...');
        
        $controller = app(MidnightPrayerController::class);
        $response = $controller->fetchLatestRecordings();
        
        $responseData = json_decode($response->getContent(), true);
        
        if ($responseData['success']) {
            $this->info('Success: ' . $responseData['message']);
            return Command::SUCCESS;
        } else {
            $this->error('Error: ' . $responseData['message']);
            return Command::FAILURE;
        }
    }
}
