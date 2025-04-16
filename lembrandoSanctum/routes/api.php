<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/status', function (){
    return response()->json(
        [
            'status' => 'Ok',
            'message' => 'Api is Running'
        ],
        200
    );
});

Route::apiResource('clients', ClientController::class);

// Auth routes
// Route::post('/login', [UserController::class, 'login']);
Route::post('/login', [UserController::class, 'login']);