<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Cuisine;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index(Request $request)
    {
        $cuisineId = $request->query('cuisine');

        $foods = Food::when($cuisineId, function ($query) use ($cuisineId) {
            $query->where('cuisine_id', $cuisineId);
        })
            ->with('restaurant')
            ->paginate(6);

        $cuisines = Cuisine::withCount('foods')->get();

        return view('website.food.index', compact('foods', 'cuisines', 'cuisineId'));
    }

    public function show($id)
    {

        $food = Food::with('restaurant')->findOrFail($id);

        return view('website.food.detail', compact('food'));
    }
}
