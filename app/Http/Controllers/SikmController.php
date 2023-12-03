<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ukm;
use App\Models\Berita;

class SikmController extends Controller
{
    public function index()
    {
        $ukms = Ukm::where('status', '=', 'Dipublikasi')->get();
        $ukms = $ukms->sortByDesc(function ($ukm) {
            return $ukm->beritas->max('updated_at'); // Mengambil waktu terbaru dari berita di setiap UKM
        });
    
        return view('SIKM.homepage', compact('ukms'));
    }    
    
    public function showUkm($id)
    {
        $ukm = Ukm::find($id);
        $beritas = Berita::where('ukm_id', $ukm->id)
                        ->where('status', '=', 'Dipublikasi')
                        ->get();
        return view('SIKM.ukm', compact('ukm', 'beritas'));
    }    

    public function showBerita($id)
    {
        $berita = Berita::find($id);

        // Make sure the berita belongs to a valid ukm
        if ($berita && $berita->status === 'Dipublikasi') {
            $ukm = Ukm::find($berita->ukm_id);
            return view('SIKM.berita', compact('berita', 'ukm'));
        }
    
        // Handle the case when the berita is not found or not published
        return abort(404);
    }
}
