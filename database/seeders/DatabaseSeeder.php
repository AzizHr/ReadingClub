<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
    **/
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Category::factory(10)->create();
        \App\Models\Book::factory(10)->create();
        \App\Models\Group::factory(10)->create();
        \App\Models\Comment::factory(10)->create();
        \App\Models\Member::factory(10)->create();
        \App\Models\Like::factory(10)->create();
        \App\Models\Favourite::factory(10)->create();
    }
}
