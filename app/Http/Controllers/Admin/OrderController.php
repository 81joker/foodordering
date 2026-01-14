<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user', 'restaurant')->latest()->paginate(20);
        return view('admin.pages.orders.index', compact('orders'));
    }

    public function orderLines(Order $order)
    {
        $lines = $order->items()->with('food')->get();
        return response()->json([
            'order' => $order,
            'lines' => $lines
        ]);
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate(['order_status' => 'required']);

        $order->update([
            'order_status' => $request->order_status
        ]);

        return response()->json(['success' => true]);
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()
            ->route('admin.orders.index')
            ->with('success', 'Order supprimée avec succès.');
    }
}
