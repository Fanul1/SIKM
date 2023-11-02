<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class SikmController extends Controller
{
    public function home()
    {
        return view('homepage');
    }

    public function login()
    {
        return view('user.login');
    }
    
    public function register()
    {
        return view('user.register');
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
            if (Auth::user()->role === 1) {
                return redirect()->intended('/dashboard');
            } else {
                return redirect()->intended('/dashboarduser');
            }
        }
        
        return back()->with('loginError', 'Login gagal!');
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => ['required', 'email', 'unique:users', function ($attribute, $value, $fail) {
                if (strpos($value, '@usk.ac.id') === false) {
                    $fail($attribute.' must be a valid email with @usk.ac.id domain.');
                }
            }],
            'password' => 'required|min:8|max:255|confirmed'
        ]);
    
        $validatedData['password'] = Hash::make($validatedData['password']);
        $user = User::create($validatedData);
    
        // Log the user in after registration
        Auth::login($user);
        
        $request->session()->flash('success', 'Berhasil daftar! Selamat datang.');
        
        // Redirect users based on their roles
        if ($user->role === 1) {
            return redirect('/dashboard');
        } else {
            return redirect('/dashboarduser');
        }
    }
}
