<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Cuisine;
use App\Models\Food;
use App\Models\Restaurant;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index(Request $request)
    {
        $cuisineId = $request->query('cuisine');

        $restaurants = Restaurant::when($cuisineId, function ($query) use ($cuisineId) {
            $query->whereHas('cuisines', function ($q) use ($cuisineId) {
                $q->where('cuisine_id', $cuisineId);
            });
        })
            ->with('cuisines')
            ->paginate(6);

        $cuisines = Cuisine::withCount('restaurants')->get();

        return view('website.restaurant.index', compact('restaurants', 'cuisines', 'cuisineId'));
    }

    public function show($id)
    {

        $restaurant = Restaurant::with('cuisines')->findOrFail($id);

        // Menu du restaurant avec pagination
        $foods = Food::where('restaurant_id', $id)
            ->paginate(6); // 6 items par page

        return view('website.restaurant.detail', compact('restaurant', 'foods'));
    }

    public function storeBooking(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'booking_date' => 'required|date',
            'booking_time' => 'required',
            'number_of_people' => 'required|integer|min:1',
            'comment' => 'nullable|string',
        ]);

        $validated['restaurant_id'] = $id;
        $validated['booking_date'] = Carbon::parse($request->booking_date)->format('Y-m-d');
        $validated['booking_time'] = Carbon::parse($request->booking_time)->format('H:i:s');
        Booking::create($validated);

        return back()->with('success', 'Your reservation has been submitted!');
    }
}
