<?php

namespace Database\Factories;

use App\Models\Catalog;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
//            'catalog_id' => Catalog::all()->random()->id,
            'slug' => $this->faker->unique(true)->slug(),
            'title' => $this->faker->unique(true)->userName(),
            'description' => $this->faker->text(),
            'image' => $this->faker->imageUrl(),
            'published' => $this->faker->boolean(true),
        ];
    }
}
