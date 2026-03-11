<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Restaurant;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('restaurant')->latest()->get();

        return view('admin.pages.booking.index', compact('bookings'));
    }

    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        $restaurants = Restaurant::all();

        return view('admin.pages.booking.update', compact('booking', 'restaurants'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'restaurant_id' => 'required|exists:restaurants,id',
            'booking_date' => 'required|date',
            'booking_time' => 'required',
            'number_of_people' => 'required|integer|min:1',
            'status' => 'required|in:pending,confirmed,cancelled,completed',
        ]);
        $validated['booking_date'] = Carbon::parse($request->booking_date)->format('Y-m-d');
        $validated['booking_time'] = Carbon::parse($request->booking_time)->format('H:i:s');
        Booking::findOrFail($id)->update($validated);

        return redirect()->route('admin.bookings.index')->with('success', 'Booking updated successfully');
    }

    public function destroy($id)
    {
        Booking::findOrFail($id)->delete();

        return redirect()->route('admin.bookings.index')->with('success', 'Booking deleted successfully');
    }
}
