<?php

namespace App\Http\Controllers;

use App\Models\Ukm;
use App\Models\Berita;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DashboardUserController extends Controller
{
    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'numberphone' => 'required|string',
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
            $user = auth()->user();
            $ukm = $user->ukm;
            return view('user.editor.dashboard', compact('ukm'));
        } else{
            abort(403);
        }
    }

    public function editprofukm() 
    {
        if (Gate::allows('editor')) {
            $ukm = auth()->user()->ukm;
            if ($ukm) {
                // Pass the UKM data to the view
                return view('user.editor.ukm.profilukm', compact('ukm'));
            }            
        } else{
            abort(403);
        }
    }

    public function editkontakukm()
    {
        if (Gate::allows('editor')) {
            $ukm = auth()->user()->ukm;
            return view('user.editor.ukm.kontakukm', ['ukm' => $ukm]);
            } else{
                abort(403);
            }
    }

    public function updatekontakukm(Request $request)
    {
        if (Gate::allows('editor')) {
            $user = Auth::user();
            $ukm = $user->ukm;

            $ukm->update([
                'name_ketua' => $request->input('nama_ketua'),
                'email' => $request->input('email'),
                'phone_number' => $request->input('number_phone'),
                'instagram' => $request->input('instagram'),
                'youtube' => $request->input('youtube'),
                'facebook' => $request->input('facebook'),
                'twitter' => $request->input('twitter'),
            ]);

            return redirect('/dashboarduser')->with('success', 'Kontak UKM berhasil diperbarui.');
        } else {
            abort(403);
        }
    }

    public function editberitaukm()
    {
        if (Gate::allows('editor')) {
            $ukm = Auth::user()->ukm;
            $beritas = Berita::where('ukm_id', $ukm->id)->get();            
            return view('user.editor.ukm.beritaukm', compact('beritas'));
            } else{
             abort(403);
            }
    }

    public function showDetail($id)
    {
        // Handle the "Detail" button click
        // Fetch the berita by its ID and show it
        $berita = Berita::findOrFail($id);
        return view('user.editor.ukm.detailberita', compact('berita'));
    }

    public function editBerita($id)
    {
        // Handle the "Edit" button click
        // Fetch the berita by its ID and show the edit form
        $berita = Berita::findOrFail($id);
        return view('user.editor.ukm.editberita', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required|string',
            'category' => 'required|string',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'gambar.*' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $berita = Berita::find($id);

        if (!$berita) {
            return redirect()->back()->with('error', 'Berita not found');
        }

        // Update the fields from the request
        $berita->judul = $request->input('judul');
        $berita->category = $request->input('category');
        $berita->deskripsi = $request->input('deskripsi');
        $berita->tanggal = $request->input('tanggal');

        // If new images are uploaded, update the images
        if ($request->hasFile('gambar')) {
            $this->validate($request, [
                'gambar.*' => 'image|mimes:jpeg,png,jpg,gif',
            ]);

            // Delete existing images
            if (!is_null($berita->gambar)) {
                $existingImages = json_decode($berita->gambar, true);

                // Check if decoding was successful and it's an array
                if (is_array($existingImages)) {
                    foreach ($existingImages as $existingImage) {
                        Storage::disk('public')->delete($existingImage);
                    }
                } else {
                    // If not an array, assume it's a single image and delete it
                    Storage::disk('public')->delete($berita->gambar);
                }
            }

            // Save new images
            $gambarPaths = [];
            foreach ($request->file('gambar') as $image) {
                $gambarPath = $image->store('ukm_berita', 'public');
                $gambarPaths[] = $gambarPath;
            }

            $berita->gambar = count($gambarPaths) > 1 ? json_encode($gambarPaths) : $gambarPaths[0];
        }

        $berita->save();

        return redirect()->route('berita.detail', ['id' => $berita->id])->with('success', 'Berita updated successfully');
    }

    public function deleteBerita($id)
    {
        // Delete the berita by its ID
        $berita = Berita::findOrFail($id);
        $berita->delete();   
        return redirect()->back()->with('success', 'Berita berhasil dihapus');
        
    }

    public function storeberita(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|string',
            'category' => 'required|string',
            'deskripsi' => 'required|string',
            'gambar.*' => 'required|image|mimes:jpeg,png,jpg,gif',
            'tanggal' => 'required|date',
        ]);

        $ukmId = auth()->user()->ukm->id;

        $gambarPaths = [];

        // Simpan gambar
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $image) {
                $gambarPath = $image->store('ukm_berita', 'public');
                $gambarPaths[] = $gambarPath;
            }
        }

        $berita = new Berita();
        $berita->ukm_id = $ukmId;
        $berita->judul = $request->judul;
        $berita->category = $request->category;
        $berita->deskripsi = $request->deskripsi;
        $berita->gambar = count($gambarPaths) > 1 ? json_encode($gambarPaths) : $gambarPaths[0];
        $berita->tanggal = $request->tanggal;
        $berita->save();

        return redirect('/editberitaukm')->with('success', 'Berita berhasil ditambahkan');
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'akronim' => 'required|string',
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
            'akronim' => 'required|string|max:255',
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
            'akronim' => $data['akronim'],
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

    public function destroy(Ukm $ukm)
    {
        $ukm->beritas()->delete();
        $ukm->delete();
        // Redirect ke halaman yang sesuai (misalnya, halaman dashboard)
        return redirect('/dashboarduser')->with('success', 'UKM berhasil dihapus');
    }

    public function publishUkm($id)
    {
        $ukm = Ukm::find($id);

        if ($ukm) {
            $ukm->status = 'Dipublikasi';
            $ukm->save();

            return redirect()->back()->with('success', 'UKM berhasil dipublikasi.');
        }

        return redirect()->back()->with('error', 'UKM tidak ditemukan.');
    }

    public function withdrawUkm($id)
    {
        $ukm = Ukm::find($id);

        if ($ukm) {
            $ukm->status = 'Belum Dipublish';
            $ukm->save();
        } else {
            return redirect()->back()->with('error', 'UKM tidak ditemukan.');
        }

        $berita = Berita::where('ukm_id', $id)->first();

        if ($berita) {
            $berita->status = 'Belum Dipublish';
            $berita->save();
        } else {
            return redirect()->back()->with('success', 'UKM berhasil ditarik.');
        }

        return redirect()->back()->with('success', 'UKM berhasil ditarik.');
    }

    public function toggleStatus($id)
    {
        $berita = Berita::find($id);

        if ($berita->status === 'Pending' || $berita->status === 'Belum Dipublish') {
            $berita->status = 'Dipublikasi';
        } else {
            $berita->status = 'Pending';
        }

        $berita->save();

        return redirect()->back()->with('success', 'status udah diupdate');
    }

    public function search()
    {
        // For UKMs with status "Dipublikasi"
        $ukms = Ukm::where('status', 'Dipublikasi')
                    ->get();
    
        // For Beritas with status "Dipublikasi"
        $beritas = Berita::where('status', 'Dipublikasi')
                        ->get();
    
        return view('layouts.search', compact('ukms', 'beritas'));
    }
    
}
