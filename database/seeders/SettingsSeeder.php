<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HomeSetting;
use App\Models\FooterSetting;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Initialize Home Settings
        HomeSetting::getInstance();

        // Initialize Footer Settings
        FooterSetting::getInstance();

        $this->command->info('Settings initialized successfully!');
    }
}
