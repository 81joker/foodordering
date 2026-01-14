<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        return view('website.checkout.index', compact('cart'));
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        $cart = session('cart', []);

        if (empty($cart)) {
            return back()->with('error', 'Your cart is empty.');
        }

        // -----------------------------------------
        // 1. GET OR CREATE CUSTOMER
        // -----------------------------------------
        $customer = User::where('phone', $request->phone)->first();
        if (! $customer) {
            $customer = User::create([
                'name' => $request->name,
                'email' => $request->email ?? 'customer@gmail.com',
                'phone' => $request->phone,
                'password' => bcrypt('password'), // random or default password
                'role' => 'customer',
            ]);
        }

        // -----------------------------------------
        // 2. CALCULATE TOTALS
        // -----------------------------------------
        $subtotal = 0;
        $restaurant_id = null;

        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
            $restaurant_id = $item['restaurant_id']; // one restaurant only
        }

        $tax = $subtotal * 0.03;
        $delivery_fee = 10; // set your fee
        $total = $subtotal + $tax + $delivery_fee;
        // -----------------------------------------
        // 3. CREATE ORDER
        // -----------------------------------------
        $order = Order::create([
            'user_id' => $customer->id,
            'restaurant_id' => $restaurant_id,
            'order_status' => 'pending',
            'subtotal' => $subtotal,
            'delivery_fee' => $delivery_fee,
            'tax' => $tax,
            'total' => $total,
            'payment_method' => $request->pay_mthd,
            'payment_status' => 'pending',
        ]);

        // -----------------------------------------
        // 4. CREATE ORDER ITEMS
        // -----------------------------------------
        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'food_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        // -----------------------------------------
        // 5. CLEAR CART
        // -----------------------------------------
        session()->forget('cart');

        // -----------------------------------------
        // 6. Redirect
        // -----------------------------------------
        return redirect()->route('checkout.index')->with('success', 'Order placed successfully!');
    }
}
