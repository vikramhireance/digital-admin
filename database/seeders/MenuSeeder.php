<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::create([
            'page'=>'Home',
            'order'=>1
        ]);
        Menu::create([
            'page'=>'About Us',
            'order'=>2
        ]);
        Menu::create([
            'page'=>'Services',
            'order'=>3
        ]);
        Menu::create([
            'page'=>'Portfolio',
            'order'=>4
        ]);
        Menu::create([
            'page'=>'Gallery',
            'order'=>5
        ]);
        Menu::create([
            'page'=>' Contact Us',
            'order'=>6
        ]);
        
    }
}
