<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contents['title'] = 'News';
        $contents['description'] = 'That is Latest News';
        $contents['image'] = '20230221105556.jpeg';
        $contents['mission_title'] = 'mission title';
        $contents['mission_description'] = 'mission descriptionfgb';
        $contents['mission_image'] = '20230221105556.jpeg';
        $contents['vision_title'] = 'vision title dfg';
        $contents['vision_description'] = 'vision vision_description dfg';
        $contents['vision_image'] = '20230221105556.jpeg';
        $contents['created_at'] = Carbon::now();
        DB::table('contents')->insert([$contents]);
    }
}
