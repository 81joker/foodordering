<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RestaurantSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Restaurant::factory()->count(10)->create();
    }
}
