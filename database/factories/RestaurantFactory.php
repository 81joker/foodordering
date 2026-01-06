<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restaurant>
 */
class RestaurantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'description' => $this->faker->paragraph(),
            'address' => $this->faker->address(),
            'phone_number' => $this->faker->phoneNumber(),
            'delivery_fee' => $this->faker->randomFloat(2, 0, 20),
            'avg_rating' => $this->faker->randomFloat(2, 1, 5),
        ];
    }
}
