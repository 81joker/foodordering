<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {

        $restaurant = $request->input('restaurant_name');
        $food = $request->input('food_name');

        $query = Restaurant::query();

        if ($restaurant) {
            $query->where('restaurant_name', 'like', "%$restaurant%");
        }

        if ($food) {
            $query->whereHas('foods', function ($q) use ($food) {
                $q->where('food_name', 'like', "%$food%");
            });
        }

        $restaurants = $query->with('cuisines')->paginate(6);
        // dd($restaurant);
        return view('website.home.search', compact('restaurants'));
        // return view('website.restaurant.index', compact('restaurants'));
    }
}
