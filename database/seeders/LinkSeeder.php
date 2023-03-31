<?php

namespace Database\Seeders;

use App\Models\Links;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Links::create([
            'page'=>'Privacy Policy',
        ]);
        Links::create([
            'page'=>'Terms & Condition',
        ]);
    }
}
