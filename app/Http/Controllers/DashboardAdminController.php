<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Ukm;

class DashboardAdminController extends Controller
{
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
        $users = User::whereIn('role', ['2', '3'])->with('ukm')->get();  // Mengambil editor dengan data UKM
        return view('user.admin.dashboard', compact('users'));
    }

    public function delete($name)
    {
        if (Gate::allows('admin')) {
            DB::table('users')->where('name', $name)->delete();
            return redirect('/dashboard')->with('success', 'Account deleted successfully');
        }
    }

    public function validasi($name) {
        if (Gate::allows('admin')) {
            DB::table('users')
                ->where('name', $name)
                ->update(['role' => '2']);
            return redirect('/dashboard')->with('success', 'Account approved successfully');
        }
    }

    public function deleteEditor(User $user)
    {
        // Hapus akun editor beserta UKMnya
        if ($user->ukm) {
            // Hapus UKM terlebih dahulu jika ada
            $user->ukm->delete();
        }
        $user->delete();
        return redirect()->back()->with('success', 'Akun editor dan UKM telah dihapus.');
    }

    public function suspendEditor(User $user)
    {
        // Ubah peran editor menjadi '3' (ditahan)
        $user->update(['role' => '3']);
        return redirect()->back()->with('success', 'Izin editor telah dicabut.');
    }

    public function unsuspendEditor(User $user)
    {
        // Kembalikan peran editor menjadi '2' (bebas)
        $user->update(['role' => '2']);
        return redirect()->back()->with('success', 'Akun editor telah dibebaskan.');
    }

    public function hapusukm(Request $request, $id)
    {
        $this->authorize('admin'); // Pastikan hanya admin yang dapat menghapus UKM
    
        $ukm = Ukm::find($id);
    
        if (!$ukm) {
            return redirect('/dashboard')->with('error', 'UKM tidak ditemukan.');
        }
    
        // Hapus UKM
        $ukm->delete();
    
        return redirect('/dashboard')->with('success', 'UKM berhasil dihapus.');
    }
}
