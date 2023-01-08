<?php

namespace Database\Factories;

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
    public function definition()
    {
        return [
            'name' => fake()->text(50),
            'price' => fake()->randomNumber(4, true),
            'discounted' => fake()->numberBetween(0, 1),
            'discount' => fake()->randomNumber(3, true),
            'description' => fake()->text(300)            
        ];
    }
}
