<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
            'title' => $this->faker->sentence(),

            'author' => $this->faker->name(),
            'genre' => 'horror, adventure, scifi, romance, biography, history, self-help, fiction, non-fiction',
            'availability' => $this->faker->boolean(),
            'description' => $this->faker->paragraph(5),

            'reviews' => $this->faker->paragraph(),
        ];
    }
}
