<?php

namespace Database\Factories;

use Illuminate\Support\Str;

use function Laravel\Prompts\text;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Manga>
 */
class MangaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->name();
        $summary = fake()->paragraph(5);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'summary' => $summary,
            'excerpt' => Str::words($summary, 10, '...'),
            'cover' => fake()->imageUrl(400, 400, 'cats'),
            'author_id' => rand(1,10),
        ];
    }
}
