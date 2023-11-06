<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SikmController extends Controller
{
    public function home()
    {
        return view('homepage');
    }
    
    public function ukm()
    {
        return view('ukm.ukm');
    }

    public function berita()
    {
        return view('ukm.berita');
    }
}
