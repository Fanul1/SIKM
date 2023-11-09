<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ukm;
use App\Models\Berita;

class SikmController extends Controller
{
    public function index()
    {
        $ukms = Ukm::all();
        return view('SIKM.home', compact('ukms'));
    }    

    public function showUkm($id)
    {
        $ukm = Ukm::find($id);
        $berita = Berita::where('ukm_id', $ukm->id)->first(); // Mengambil berita pertama dari UKM ini, sesuaikan dengan logika bisnis Anda.
        return view('SIKM.ukm', compact('ukm', 'berita'));
    }

    public function showBerita($id)
    {
        $ukm = Ukm::find($id);
        $berita = Berita::find($id);
        return view('SIKM.berita', compact('berita', 'ukm'));
    }
}
