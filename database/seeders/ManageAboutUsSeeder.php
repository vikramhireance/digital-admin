<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManageAboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
    $about['title'] = 'News';
    $about['description'] = 'That is Latest News';
    $about['image'] = 'news.jpg';
    $about['created_at'] = Carbon::now();
    DB::table('manage_about_us')->insert([$about]);

    }
}
