<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Food>
 */
class FoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'restaurant_id' => \App\Models\Restaurant::factory(),
            'cuisine_id' => \App\Models\Cuisine::factory(),
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 5, 100),
            'avg_rating' => $this->faker->randomFloat(2, 1, 5),
            'total_orders' => $this->faker->numberBetween(0, 1000),
            'is_available' => $this->faker->boolean(80), // 80% chance of being available
        ];
    }
}
