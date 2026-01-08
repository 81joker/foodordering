<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Tim',
            'email' => 'tim26618@gmail.com',
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Laura',
            'email' => 'laura@gmail.com',
        ]);

        $this->call([
            CuisineSeed::class,
            // RestaurantSeed::class,
            // FoodSeed::class,
            // OrderSeed::class,
            // ReviewSeed::class,
        ]);
    }
}
