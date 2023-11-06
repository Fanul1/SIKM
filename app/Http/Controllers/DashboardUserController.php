<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;

class DashboardUserController extends Controller
{
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

    public function dashboarduser () {
        if (auth()->user()->role !== '1') {
            return view('user.editor.dashboard');
        } else{
            abort(403);
        }
    }

    public function editprofukm() 
    {
        if (Gate::allows('editor')) {
            return view('user.editor.ukm.profilukm');
            } else{
                abort(403);
            }
    }

    public function editkontakukm()
    {
        if (Gate::allows('editor')) {
            return view('user.editor.ukm.kontakukm');
            } else{
                abort(403);
            }
    }

    public function editberitaukm()
    {
        if (Gate::allows('editor')) {
            return view('user.editor.ukm.beritaukm');
            } else{
             abort(403);
            }
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'category' => 'required|string',
            'phone_number' => 'required|string',
            'alamat' => 'nullable|string',
        ]);
        $editor = auth()->user();
        if ($editor->ukm) {
            // Jika editor telah memiliki UKM, maka berikan pesan error atau redirect ke halaman lain
            return redirect('/dashboarduser')->with('error', 'Anda sudah memiliki UKM.');
        }
        // Tambahkan UKM ke user yang sedang masuk
        $editor->ukm()->create($data);

        return redirect('/dashboarduser')->with('success', 'UKM Anda telah berhasil dibuat.');
    }

    public function updateukm(Request $request)
    {
        $user = Auth::user(); // Mengambil data user yang sedang login

        // Validasi data input
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email',
            'category' => 'required', // Tambahkan validasi sesuai kebutuhan
            'phone_number' => 'required|string',
            'alamat' => 'required', // Tambahkan validasi sesuai kebutuhan
            'tujuan' => 'required', // Tambahkan validasi sesuai kebutuhan
            'visi' => 'required', // Tambahkan validasi sesuai kebutuhan
            'misi' => 'required', // Tambahkan validasi sesuai kebutuhan
            'sejarah' => 'required', // Tambahkan validasi sesuai kebutuhan
            'ukm_logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Tambahkan validasi sesuai kebutuhan
            'ukm_gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Tambahkan validasi sesuai kebutuhan
        ]);

        // Ambil data UKM yang dimiliki oleh user yang sedang login
        $ukm = $user->ukm;

        // Update data UKM
        $ukm->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'category' => $data['category'],
            'phone_number' => $data['phone_number'],
            'alamat' => $data['alamat'],
            'tujuan' => $data['tujuan'],
            'visi' => $data['visi'],
            'misi' => $data['misi'],
            'sejarah' => $data['sejarah'],
        ]);

        // Handle upload logo UKM
        if ($request->hasFile('ukm_logo')) {
            $ukmLogoPath = $request->file('ukm_logo')->store('ukm_logo', 'public');
            $ukm->ukm_logo = $ukmLogoPath;
        }

        // Handle upload gambar UKM
        if ($request->hasFile('ukm_gambar')) {
            $ukmGambarPath = $request->file('ukm_gambar')->store('ukm_gambar', 'public');
            $ukm->ukm_gambar = $ukmGambarPath;
        }

        $ukm->save();

        return redirect('/dashboarduser')->with('success', 'Data UKM Anda berhasil diperbarui.');
    }
}
