<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // ADD ITEM
    public function add(Request $request)
    {
        $food = Food::findOrFail($request->food_id);
        $cart = session()->get('cart', []);

        if (! empty($cart)) {
            $first = reset($cart); // get first item

            if ($first['restaurant_id'] != $food->restaurant_id) {
                return back()->with('error', 'You can only order from one restaurant at a time.');
            }
        }

        if (isset($cart[$food->id])) {
            $cart[$food->id]['quantity'] += $request->quantity;
        } else {
            // otherwise add
            $cart[$food->id] = [
                'id' => $food->id,
                'name' => $food->name,
                'price' => (float) $food->price,
                'quantity' => $request->quantity,
                'restaurant_id' => $food->restaurant_id,
                'image' => $food->image ?? null,
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
            foreach ($request->quantity as $id => $qty) {
                if (isset($cart[$id])) {
                    $cart[$id]['quantity'] = max(1, (int) $qty);
                }
            }
            session()->put('cart', $cart);

            return back();
        }

        // Update SINGLE item
        if ($request->filled('food_id') && $request->filled('quantity')) {
            $id = $request->food_id;
            $cart[$id]['quantity'] = max(1, (int) $request->quantity);
            session()->put('cart', $cart);

            return back();
        }

        return back();
    }

    // REMOVE ITEM
    public function remove(Request $request)
    {
        $cart = session()->get('cart');

        if (isset($cart[$request->food_id])) {
            unset($cart[$request->food_id]);
            session()->put('cart', $cart);
        }

        return back();
    }
}
