<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Show page login
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect('/pengiriman');
        }
        return view('auth.login');
    }

    // Show page register
    public function showRegister()
    {
        if (Auth::check()) {
            return redirect('/pengiriman');
        }
        return view('auth.register');
    }

    // store data user from register to database
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'user',
        ]);

        Auth::login($user);
        return redirect('/pengiriman');
    }

    // verify user for login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/pengiriman');
        }

        return back()->withErrors(['email' => 'Email atau password salah']);
    }

    // logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
