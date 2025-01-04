<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::paginate(10);
        return view('index', compact('orders'));
    }

    public function create()
    {
        $clients = Client::all();
        return view('orders.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
            'solution' => 'required|string',
        ]);

        Order::create($request->all());
        return redirect()->route('index');
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
        ]);

        $order->update($request->all());
        return redirect()->route('index');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('index');
    }
}