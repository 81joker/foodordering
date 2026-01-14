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
        // Real restaurant names in Floridsdorf, Vienna
        $floridsdorfRestaurants = [
            'Gasthaus Zum Goldenen Löwen',
            'Wirtshaus Stammersdorf',
            'Gasthof Zur Linde',
            'Restaurant Donauhof',
            'Gasthaus Zum Grünen Baum',
            'Wirtshaus Am Spitz',
            'Gasthaus Floridsdorf',
            'Pizzeria Da Vinci Floridsdorf',
            'China Restaurant Peking',
            'Thai Orchid Floridsdorf',
            'Indisches Restaurant Maharaja',
            'Café Central Floridsdorf',
            'Steakhaus Floridsdorf',
            'Fischrestaurant Donau',
            'Heuriger Stammersdorf',
            'Burger King Floridsdorf',
            'McDonald\'s Donauzentrum',
            'Vegetarisches Restaurant Grünes Herz',
            'Schnitzelhaus Floridsdorf',
            'Kebab Haus Floridsdorf',
            'Asia Wok Floridsdorf',
            'Bäckerei-Konditorei Felber',
            'Café Donau',
            'Weingut Floridsdorf',
        ];

        // Floridsdorf streets
        $floridsdorfStreets = [
            'Prager Straße',
            'Brünner Straße',
            'Wagramer Straße',
            'Angerer Straße',
            'Jedlersdorfer Straße',
            'Donaufelder Straße',
            'Floridsdorfer Markt',
            'Schwarzeneggerstraße',
            'Gerasdorfer Straße',
            'Stammersdorfer Straße',
        ];

        $street = $this->faker->randomElement($floridsdorfStreets);
        $houseNumber = $this->faker->numberBetween(1, 150);
        $fullAddress = $street.' '.$houseNumber.', 1210 Floridsdorf, Wien, Österreich';

        return [
            'name' => $this->faker->unique()->randomElement($floridsdorfRestaurants),
            'description' => $this->faker->paragraph(),
            'address' => $fullAddress,
            'phone_number' => '+43 1 '.$this->faker->numberBetween(1000000, 9999999),
            'delivery_fee' => $this->faker->randomFloat(2, 0, 5),
            'avg_rating' => $this->faker->randomFloat(2, 3.0, 5.0),
        ];
    }
}
