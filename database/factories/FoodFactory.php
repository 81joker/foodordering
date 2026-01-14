<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FoodFactory extends Factory
{
    public function definition(): array
    {
        $dishes = [
            ['Wiener Schnitzel', 'Panierte Kalbsschnitzel mit Kartoffelsalat', 18.90],
            ['Tafelspitz', 'Gekochtes Rindfleisch mit Meerrettich', 22.50],
            ['Schweinsbraten', 'Mit Semmelknödel und Krautsalat', 16.80],
            ['Gulaschsuppe', 'Mit Brot', 8.50],
            ['Pizza Margherita', 'Tomaten, Mozzarella, Basilikum', 12.90],
            ['Spaghetti Carbonara', 'Mit Speck und Ei', 14.50],
            ['Sushi Platte', 'Gemischte Sushi Auswahl', 24.90],
            ['Pad Thai', 'Gebratene Reisnudeln mit Hähnchen', 15.80],
            ['Cheeseburger', 'Mit Pommes und Salat', 11.90],
            ['Caesar Salad', 'Mit Hähnchenstreifen', 13.50],
            ['Kaiserschmarrn', 'Mit Apfelmus', 9.90],
            ['Apfelstrudel', 'Mit Vanillesauce', 7.50],
            ['Vegetarische Lasagne', 'Mit Gemüse und Béchamel', 16.90],
            ['Lachsfilet', 'Mit Dill-Kartoffeln', 21.90],
            ['Rumpsteak', 'Mit Pfeffersauce und Bratkartoffeln', 28.90],
            ['Forelle Müllerin', 'Panierte Forelle mit Zitrone', 19.90],
        ];

        $dish = $this->faker->randomElement($dishes);

        return [
            'restaurant_id' => \App\Models\Restaurant::inRandomOrder()->first()->id ?? \App\Models\Restaurant::factory(),
            'cuisine_id' => \App\Models\Cuisine::inRandomOrder()->first()->id ?? \App\Models\Cuisine::factory(),
            'name' => $dish[0],
            'description' => $dish[1],
            'price' => $dish[2],
            'avg_rating' => $this->faker->randomFloat(2, 3.8, 4.9),
            'total_orders' => $this->faker->numberBetween(10, 300),
            'is_available' => $this->faker->boolean(90),
        ];
    }
}
