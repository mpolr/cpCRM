<?php

// app/Http/Controllers/CaseController.php
namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ClientCase;
use Illuminate\Http\Request;

class CaseController extends Controller
{
    public function store(Request $request, Client $client)
    {
        $request->validate([
            'description' => 'required|string',
            'status' => 'required|in:open,in_progress,closed',
            'assigned_employee' => 'required|exists:users,id',
        ]);

        $client->cases()->create($request->all());
        return redirect()->route('clients.show', $client);
    }

    public function update(Request $request, ClientCase $case)
    {
        $request->validate([
            'description' => 'required|string',
            'status' => 'required|in:open,in_progress,closed',
            'assigned_employee' => 'required|exists:users,id',
        ]);

        $case->update($request->all());
        return redirect()->route('clients.show', $case->client);
    }

    public function destroy(ClientCase $case)
    {
        $client = $case->client;
        $case->delete();
        return redirect()->route('clients.show', $client);
    }
}