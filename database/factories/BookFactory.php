<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'book_title' => fake()->title(),
            'book_description' => fake()->text(),
            'book_author' => fake()->name(),
            'book_cover' => fake()->imageUrl(),
            'likes' => fake()->numberBetween(0 , 100),
            'category_id' => Category::factory(),
        ];
    }
}
