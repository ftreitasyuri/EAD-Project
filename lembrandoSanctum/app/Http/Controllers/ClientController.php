<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Return all clients in the database
        return response()->json(Client::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validade the request
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:clients',
                'name' => 'required',
            ],
            [

            ]
        );

        // Add a new client to the database
        $client = Client::create($request->all());
        return response()->json(
            [
                'message' => 'Client created successfully',
                'data' => $client,
            ],200
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Show client details
        $client = Client::find($id);
        
        // Return a response
        if($client){
            return response()->json($client, 200);
        }else{
            return response()->json(['message' => 'Client not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validade the request
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:clients,email,' . $id,
                'name' => 'required',
            ],
            [

            ]
        );

        // update the client in the database
        $client = Client::find($id);
        if($client){
            $client->update($request->all());
            return response()->json(['message' => 'Client updated successfully'], 200);
        }else{
            return response()->json(['message' => 'Client not found'], 404);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
