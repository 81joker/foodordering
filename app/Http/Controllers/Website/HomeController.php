<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
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

        return view('website.home.index', compact('restaurant_count', 'users_count'));
    }
}
