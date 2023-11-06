<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;

class LoginRegController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    
    public function register()
    {
        return view('auth.register');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/sikm');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Redirect users based on their roles
            if (Gate::allows('admin')) {
                return redirect()->intended('/dashboard');
            } else {
                return redirect()->intended('/dashboarduser');
            }
        }
        return back()->with('loginError', 'Email dan Password anda masukkan tidak sesuai');
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => 'required|min:3|max:255|confirmed'
        ]);
    
        $user = User::create($validatedData);
    
        // Log the user in after registration
        Auth::login($user);
        
        $request->session()->flash('success', 'Berhasil daftar! Selamat datang.');
        
        // Redirect users based on their roles
        if (Gate::allows('admin')) {
            return redirect('/dashboard')->with('success', 'Selamat datang di dashboard admin!');
        } else {
            return redirect('/dashboarduser')->with('success', 'Selamat datang di dashboard user!');
        }
    }
}