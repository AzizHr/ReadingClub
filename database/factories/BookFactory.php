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
            'title' => fake()->title(),
            'image' => fake()->imageUrl(),
            'description' => fake()->text(),
            'author' => fake()->name(),
            'is_archived' => fake()->numberBetween(0 , 1),
            'category_id' => Category::factory()
        ];
    }
}
