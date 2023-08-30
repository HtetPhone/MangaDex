<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Luke',
        //     'email' => 'luke@gmail.com',
        //     'password'  => Hash::make('12345678'),
        // ]);
        $this->call([
            UserSeeder::class,
            MangaSeeder::class,
            ChapterSeeder::class
        ]);
    }
}
