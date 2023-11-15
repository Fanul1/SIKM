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
        return view('SIKM.homepage', compact('ukms'));
    }
    
    public function showUkm($id)
    {
        $ukm = Ukm::find($id);
        $berita = Berita::where('ukm_id', $ukm->id)
                        ->where('status', '=', 'Dipublikasi')
                        ->first();
        return view('SIKM.ukm', compact('ukm', 'berita'));
    }    

    public function showBerita($id)
    {
        $ukm = Ukm::find($id);
        $berita = Berita::where('ukm_id', $ukm->id)
                    ->where('status', '=', 'Dipublikasi')
                    ->first();
        return view('SIKM.berita', compact('berita', 'ukm'));
    }
}
