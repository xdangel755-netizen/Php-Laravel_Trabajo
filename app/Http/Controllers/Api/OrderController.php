<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return response()->json(Order::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:client,id',
            'order_date' => 'required|date',
            'total_amount' => 'required|numeric',
            'status' => 'required|string',
            'payment_method' => 'required|string',
            'shipping_address' => 'required|string',
        ]);

        $order = Order::create($validated);
        return response()->json($order, 201);
    }

    public function show(string $id)
    {
        return response()->json(Order::findOrFail($id));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:client,id',
            'order_date' => 'required|date',
            'total_amount' => 'required|numeric',
            'status' => 'required|string',
            'payment_method' => 'required|string',
            'shipping_address' => 'required|string',
        ]);

        $order = Order::findOrFail($id);
        $order->update($validated);
        return response()->json($order);
    }

    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return response()->json(null, 204);
    }
}
