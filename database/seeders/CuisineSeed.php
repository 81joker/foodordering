<?php

namespace Database\Seeders;

use App\Models\Cuisine;
use Illuminate\Database\Seeder;

class CuisineSeed extends Seeder
{
    // /**
    //  * Run the database seeds.
    //  */
    // public function run(): void
    // {
    //     \App\Models\Cuisine::factory()->count(10)->create();
    // }

    public function run()
    {
        $cuisines = [
            'Italian',
            'Chinese',
            'Indian',
            'Mexican',
            'Japanese',
            'Thai',
            'French',
            'American',
            'Middle Eastern',
            'Greek',
            'Korean',
            'Vietnamese',
        ];

        foreach ($cuisines as $cuisine) {
            Cuisine::create([
                'name' => $cuisine,
            ]);
        }
    }
}
