<?php

namespace Database\Seeders;

use App\Models\Series;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);
        Series::query()->create([
            'name' => 'This too shall pass away',
            'no_episodes' => 5
        ]);
        $this->call([
            AdminUserSeeder::class,
            GeneralSettingSeeder::class,
            SermonSeeder::class
        ]);
    }
}
