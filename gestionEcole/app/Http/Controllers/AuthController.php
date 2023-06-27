<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:6'
        ]);

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }
        $user = auth()->user();
        $token = $user->createToken('auth_token')->plainTextToken;
        $response = [
            'access_token' => $token,
            'user_name' => $user->nom,
            'user_email' => $user->email,
            'user_role' => $user->role,
            'user_id' => $user->id,
        ];
        return response()->json($response, 200);
    }
}