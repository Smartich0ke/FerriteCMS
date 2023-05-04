<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
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
            'title' => $this->faker->unique()->sentence(),
            'slug' => $this->faker->unique()->slug(),
            'body' => $this->faker->unique()->paragraph(100),
            'excerpt' => $this->faker->unique()->paragraph(),
            'image' => 'img/645374822e654.webp',
            'private' => false,
            'category_id' => 1,
            'user_id' => 1,
        ];
    }
}
