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
        \App\Models\Member::factory(4)->create();
        \App\Models\Like::factory(4)->create();
        \App\Models\Dislike::factory(4)->create();
        \App\Models\Favourite::factory(4)->create();
    }
}
