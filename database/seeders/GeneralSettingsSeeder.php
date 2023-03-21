<?php

namespace Database\Seeders;

use App\Models\General_Settings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneralSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        General_Settings::create([

            'website_title'=>'sfdgrgrd',
            'website_description'=>'<p>sggrgr</p>',
            'live_mode'=>'seggg',
            'light_logo'=>'20230223114512.jpg',
            'dark_logo'=>'20230223114512.jpg',
            'mobile_logo'=>'20230223114512.jpg',
            'favicon'=>'20230223114512.jpg',
            'primary_color'=>'#dd3c3c',
            'secondary_color'=>'#570e71',
            'dark_mode'=>'0',

        ]);
    }
}
