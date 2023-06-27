<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\PostsController;

class AuthController extends Controller
{
    public function show()
{
    return view('login.show');  
}
public function afficher()
{
    return view('login.register');  
}

    public function login(Request $request)
{
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
          
            session()->flash('success', 'Welcom Back');
            return app(PostsController::class)->index();
        } else {
            return redirect()->back()->withErrors([
                'email' => 'Identifiants incorrects',
            ]);
        }
    }
    public function register(Request $request)
    {
        $fields = $request->all();
        $fields['password'] = bcrypt($request->input('password'));

        User::create($fields);
        return redirect()->route('login');
    }
    public function logout(Request $request)
    {
    auth()->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
    }

}
