<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $attr = $request->validate([
        //     'nom' => 'required',
        //     'prenom' => 'required',
        //     'date_de_naissance' => 'required',
        //     'adresse' => 'required',
        //     'telephone' => 'required',
        //     'classe_id' => 'required',
        //     'user_id' => 'required',
        //     'email' => 'required',
        //     'password' => 'required',
        //     'role' => 'required'
        //     // 'nom' => 'required|string|max:255',
        //     // 'prenom' => 'required|string|max:255',
        //     // 'date_de_naissance' => 'required',
        //     // 'adresse' => 'required|string|max:255',
        //     // 'telephone' => 'required|numeric|min:10',
        //     // 'classe_id' => 'required|numeric|min:1',
        //     // 'user_id' => 'required|numeric|min:1',
        //     // 'email' => 'required|string|email|unique:users,email',
        //     // 'password' => 'required|string|min:6|confirmed',
        //     // 'role' => 'required|string'
        // ]);
    
        // $user = User::create([
        //     'name' => $attr['nom'],
        //     'email' => $attr['email'],
        //     'password' => bcrypt($attr['password']),
        //     'role' => $attr['role']
        // ]);
    
        // $token = $user->createToken('auth_token')->plainTextToken;
    
        // $response = [
        //     'access_token' => $token,
        //     'user_name' => $user->name,
        //     'user_email' => $user->email,
        //     'user_role' => $user->role,
        //     'user_id' => $user->id,
        // ];
    
        // return response()->json($response, 200);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
