<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product_image>
 */
class Product_imageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(1, true),
            'url' => '', // URL зададим позже при сохранении
            'position' => 0, // По умолчанию будет 0, но изменится в сидере
        ];
    }
}
