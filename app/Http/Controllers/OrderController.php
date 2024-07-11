<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Menu;

class OrderController extends Controller
{
    public function index()
    {
        $orders = auth()->user()->orders;
        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function invoice(Order $order)
    {
        return view('orders.invoice', compact('order'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'quantity' => 'required|integer|min:1',
            'delivery_date' => 'required|date',
        ]);

        $menu = Menu::findOrFail($request->menu_id);
        $total_price = $menu->price * $request->quantity;

        $order = auth()->user()->orders()->create([
            'menu_id' => $request->menu_id,
            'quantity' => $request->quantity,
            'delivery_date' => $request->delivery_date,
            'total_price' => $total_price,
        ]);

        return redirect()->route('orders.show', $order->id)->with('success', 'Order placed successfully.');
    }
}
