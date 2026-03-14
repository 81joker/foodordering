<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Restaurant;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        /*
        * @var int $restaurant_count
        */
        $restaurant_count = cache()->remember('restaurant_count', 60, function () {
            return Restaurant::count();
        });
        /*
         * @var int $users_count
        */
        $users_count = cache()->remember('users_count', 60, function () {
            return User::count();
        });

        // $popularFoods = Food::with('restaurant')
        // ->withSum('orders as total_orders', 'quantity')
        // ->orderByDesc('total_orders')
        // ->take(2)
        // ->get();
        /*
        * @var \Illuminate\Database\Eloquent\Collection $popularFoods
        */
        $popularFoods = Food::with('restaurant')
            ->whereHas('orderItems.order', function ($q) {
                $q->whereMonth('created_at', now()->month);
            })
            ->withSum('orderItems', 'quantity')
            ->orderByDesc('order_items_sum_quantity')
            ->take(5)
            ->get();
            // dd($popularFoods);  
        /*        
        * @var \Illuminate\Database\Eloquent\Collection $foods
        */
        $foods = Food::with('restaurant')->latest()->take(2)->get();

        return view('website.home.index', compact('restaurant_count', 'users_count', 'foods', 'popularFoods'));
    }
}
