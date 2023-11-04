<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class SikmController extends Controller
{
    public function home()
    {
        return view('homepage');
    }

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

    public function updateProfile(Request $request)
    {
        $user = auth()->user();
    
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'numberphone' => 'nullable|string',
            'email' => 'required|string|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:3|confirmed',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);
    
        // Remove password and password confirmation from $data if they are not provided.
        if (empty($data['password'])) {
            unset($data['password']);
            unset($data['password_confirmation']);
        } else {
            $data['password'] = Hash::make($data['password']);
        }
    
        // Check if the phone number is provided and not empty.
        if (!empty($data['numberphone'])) {
            $user->numberphone = $data['numberphone'];
        }
    
        // Handle the avatar upload
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $data['avatar'] = $avatarPath;
        }
    
        $user->update($data);
    
        return redirect('/dashboarduser')->with('success', 'Profil Anda telah diperbarui.');
    }

    public function detail(string $name)
    {
        $users = DB::table('users')
            ->select('*')
            ->where('name', $name)
            ->first();
        $view_data = [
            'users' => $users
        ];
        return view('user.admin.user-detail', $view_data);
    }

    public function dashadmin()
    {
        $this->authorize('admin');
        $users = DB::table('users')
            ->select('*')
            ->where('role', '!=', '1')
            ->get();   
        return view('user.admin.dashboard', compact('users'));
    }
}