<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\FoodVariant;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // ADD ITEM
    public function add(Request $request)
    {
        $request->validate([
            'food_id' => 'required|exists:food,id',
            'quantity' => 'required|integer|min:1',
            'food_variant_id' => 'nullable|exists:food_variants,id',
        ]);

        $food = Food::findOrFail($request->food_id);
        $variant = null;
        if ($request->filled('food_variant_id')) {
            $variant = FoodVariant::where('food_id', $food->id)
                ->findOrFail($request->food_variant_id);
        }
        $cart = session()->get('cart', []);

        if (! empty($cart)) {
            $first = reset($cart); // get first item

            if ($first['restaurant_id'] != $food->restaurant_id) {
                return back()->with('error', 'You can only order from one restaurant at a time.');
            }
        }

        $cartKey = $food->id.':'.($variant?->id ?? 'base');

        if (isset($cart[$cartKey])) {
            $cart[$cartKey]['quantity'] += $request->quantity;
        } else {
            // otherwise add
            $cart[$cartKey] = [
                'key' => $cartKey,
                'id' => $food->id,
                'name' => $food->food_name,
                'price' => (float) ($variant?->price ?? $food->price),
                'quantity' => $request->quantity,
                'restaurant_id' => $food->restaurant_id,
                'image' => $food->image ?? null,
                'variant_id' => $variant?->id,
                'variant_name' => $variant?->name,
            ];
        }

        // save session
        session()->put('cart', $cart);

        return redirect()->route('checkout.index');
    }

    // UPDATE QTY
    public function update(Request $request)
    {
        $cart = session()->get('cart', []);

        // Update ALL quantities
        if ($request->has('update_all')) {
            foreach ($request->quantity as $key => $qty) {
                if (isset($cart[$key])) {
                    $cart[$key]['quantity'] = max(1, (int) $qty);
                }
            }
            session()->put('cart', $cart);

            return back();
        }

        // Update SINGLE item
        if ($request->filled('cart_key') && $request->filled('quantity')) {
            $key = $request->cart_key;
            $cart[$key]['quantity'] = max(1, (int) $request->quantity);
            session()->put('cart', $cart);

            return back();
        }

        return back();
    }

    // REMOVE ITEM
    public function remove(Request $request)
    {
        $cart = session()->get('cart');

        if (isset($cart[$request->cart_key])) {
            unset($cart[$request->cart_key]);
            session()->put('cart', $cart);
        }

        return back();
    }
}
