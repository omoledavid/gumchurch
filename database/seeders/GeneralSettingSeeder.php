<?php

namespace Database\Seeders;

use App\Models\GeneralSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneralSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GeneralSetting::create([
            'site_name' => 'Gumchurch',
            'site_email' => 'info@gumchurch',
            'site_phone' => '0123456789',
            'site_address' => 'Gumchurch Road',
        ]);
    }
}
