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
            'phone' => 'required|string',
            'description' => 'required|string',
            'solution' => 'string|nullable',
        ]);

        $client = Client::where('phone', $request->get('phone'))->first();
        if ($client === null) {
            $client = new Client();
            $client->phone = $request->get('phone');
            $client->save();
        }

        $order = new Order();
        $order->client_id = $client->id;
        $order->description = $request->get('description');
        $order->solution = $request->get('solution');
        $order->user_id = auth()->id();
        $order->save();

        return redirect()->route('index');
    }

    public function show(Order $order)
    {
        $client = $order->client;
        return view('orders.show', compact('order', 'client'));
    }

    public function edit(Order $order)
    {
        $client = $order->client;
        return view('orders.edit', compact('order', 'client'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'description' => 'required|string',
            'solution' => 'string|nullable',
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