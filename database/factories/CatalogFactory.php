<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Catalog>
 */
class CatalogFactory extends Factory
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
            'title' => fake()->unique(true)->title(),
            'description' => fake()->text(500),
            'image' => '/storage/static/catalog/.png',
            'published' => fake()->boolean(true),
        ];
    }
}
