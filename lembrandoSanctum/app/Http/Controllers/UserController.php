<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{
    //
    public function login(Request $request)
    {

        // Validate request
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required'
            ],
            []
        );

        // Login attempt
        // $email = $request->email;
        // $password = $request->password;
        $email = $request->input('email');
        $password = $request->input('password');

        $attempt = auth()->attempt(
            [
                'email' => $email,
                'password' => $password
            ]
        );

        if (!$attempt) {
            return response()->json(
                [
                    'error' => 'Não Autorizado'
                ],
                401
            );
        }

        // Authenticate user
        $user = auth()->user();
        $token = $user->createToken($user->name)->plainTextToken;

        // Return access token for the api request
        return response()->json(
            ['token' => $token]
        );
    }
}
