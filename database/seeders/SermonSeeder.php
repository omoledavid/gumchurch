<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SermonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sermons')->insert([
            [
                'topic' => 'The Power of Faith',
                'series_id' => 1,  // Assuming you have a Series with ID 1
                'slug' => 'the-power-of-faith',
                'preacher' => 'Pastor Jedi Ukoko',
                'description' => 'A deep dive into the power of faith in challenging times.',
                'video' => 'https://www.youtube.com/watch?v=xxxxxx',  // Example YouTube embed link
                'audio' => 'https://www.example.com/audio/the-power-of-faith.mp3',  // Example audio link
                'pdf_file' => 'https://www.example.com/sermon-notes/the-power-of-faith.pdf',  // Example PDF link
            ], [
                'topic' => 'This too shall pass away',
                'series_id' => 1,  // Assuming you have a Series with ID 1
                'slug' => 'this-too-shall-pass-away',
                'preacher' => 'Pastor Jedi Ukoko',
                'description' => 'A deep dive into the power of faith in challenging times.',
                'video' => 'https://www.youtube.com/watch?v=xxxxxx',  // Example YouTube embed link
                'audio' => 'https://www.example.com/audio/the-power-of-faith.mp3',  // Example audio link
                'pdf_file' => 'https://www.example.com/sermon-notes/the-power-of-faith.pdf',  // Example PDF link
            ], [
                'topic' => 'Riddle of the first born son',
                'series_id' => 1,  // Assuming you have a Series with ID 1
                'slug' => 'riddle-of-first-born-son',
                'preacher' => 'Pastor Jedi Ukoko',
                'description' => 'A deep dive into the power of faith in challenging times.',
                'video' => 'https://www.youtube.com/watch?v=xxxxxx',  // Example YouTube embed link
                'audio' => 'https://www.example.com/audio/the-power-of-faith.mp3',  // Example audio link
                'pdf_file' => 'https://www.example.com/sermon-notes/the-power-of-faith.pdf',  // Example PDF link
            ],

        ]);
    }
}
