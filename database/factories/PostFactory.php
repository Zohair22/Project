<?php

namespace Database\Factories;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->words(3, 'true'),
            'lang' => fake()->languageCode(),
            'kind' => fake()->words(3, 'true'),
            'rate' => fake()->numberBetween(10, 90),
            'time' => Carbon::now(),
            'description' => fake()->paragraphs(3, 'true'),
        ];
    }
}
