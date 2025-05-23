<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'slug' => fake()->unique(true)->slug(),
            'title' => fake()->unique(true)->jobTitle(),
            'description' => fake()->text(500),
            'image' => '/storage/static/brands/logo_samsung.png',
            'published' => fake()->boolean(true),
        ];
    }
}
