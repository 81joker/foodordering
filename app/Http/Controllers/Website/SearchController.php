<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class SearchController extends Controller
{
   public function search(Request $request)
    {

        dd($request->all());
        $name = $request->input('name');
        $food = $request->input('food');

        $query = Restaurant::query();

        if ($name) {
            $query->where('name', 'like', "%$name%");
        }

        if ($food) {
            $query->whereHas('foods', function ($q) use ($food) {
                $q->where('name', 'like', "%$food%");
            });
        }

        $restaurants = $query->with('cuisines')->paginate(6);

        return view('website.restaurant.index', compact('restaurants'));
    }  
}
