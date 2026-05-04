<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return response()->json(Client::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:client,email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'document_id' => 'required|string',
            'is_active' => 'nullable|boolean',
        ]);

        $client = Client::create($validated);
        return response()->json($client, 201);
    }

    public function show(string $id)
    {
        return response()->json(Client::findOrFail($id));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:client,email,' . $id,
            'phone' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'document_id' => 'required|string',
            'is_active' => 'nullable|boolean',
        ]);

        $client = Client::findOrFail($id);
        $client->update($validated);
        return response()->json($client);
    }

    public function destroy(string $id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        return response()->json(null, 204);
    }
}
