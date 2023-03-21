<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'image'=>'2.png',
            'password'=>Hash::make('12345678'),
            'type'=> 1
        ]);

        $this->call([
            ManageAboutUsSeeder::class,
            ContentSeeder::class,
        ]);
    }
}
