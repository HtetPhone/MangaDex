<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chapter>
 */
class ChapterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $images = [];
        for ($i = 0; $i < 10; $i++) {
            $images[] = fake()->imageUrl(400,400,'cats');
        }
    
        return [
            'title' => fake()->title(),
            'images' => $images,
            'manga_id' => rand(1, 10),
            'user_id' => rand(1, 10)
        ];
    }
}
