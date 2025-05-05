<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Provider;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => fake()->numberBetween(1, 24),
            'brand_id' => Brand::all()->random()->id,
            'provider_id' => Provider::all()->random()->id,
            'slug' => fake()->unique(true)->slug(),
            'title' => fake()->jobTitle(),
            'model' => fake()->title(),
            'description' => fake()->realText(),
            'price' => fake()->numberBetween(100, 999_999),
            'discount' => fake()->numberBetween(0, 100),
            'quantity' => fake()->numberBetween(1, 10),
            'rating' => fake()->numberBetween(1, 5),
            'published' => fake()->boolean(),
        ];
    }
}
