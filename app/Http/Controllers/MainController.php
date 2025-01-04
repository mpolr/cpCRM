<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Order;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(): View|Factory|Application
    {
        $orders = Order::paginate(15);
        return view('index', compact('orders'));
    }

    public function create()
    {
        //return view('clients.create');
    }

    public function store(Request $request)
    {
//        $request->validate([
//            'name' => 'required|string|max:255',
//            'phone' => 'required|string|max:255',
//            'email' => 'nullable|email|max:255',
//        ]);
//
//        Client::create($request->all());
//        return redirect()->route('clients.index');
    }

    public function show(Client $client)
    {
//        return view('clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
//        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
//        $request->validate([
//            'name' => 'required|string|max:255',
//            'phone' => 'required|string|max:255',
//            'email' => 'nullable|email|max:255',
//        ]);
//
//        $client->update($request->all());
//        return redirect()->route('clients.index');
    }

    public function destroy(Client $client)
    {
//        $client->delete();
//        return redirect()->route('clients.index');
    }
}