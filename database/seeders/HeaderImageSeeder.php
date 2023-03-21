<?php

namespace Database\Seeders;

use App\Models\HeaderImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeaderImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HeaderImage::create([
            'page'=>'aboutus',
        ]);
        HeaderImage::create([
            'page'=>'service',
        ]);
        HeaderImage::create([
            'page'=>'portfolio',
        ]);
        HeaderImage::create([
            'page'=>'contact',
        ]);
        HeaderImage::create([
            'page'=>'gallery',
        ]);
        
        
    }
}
