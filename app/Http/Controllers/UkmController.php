<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreukmRequest;
use App\Http\Requests\UpdateukmRequest;
use App\Models\ukm;

class UkmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function ukm()
    {
        return view('ukm.ukm');
    }

    public function berita()
    {
        return view('ukm.berita');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreukmRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ukm $ukm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ukm $ukm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateukmRequest $request, ukm $ukm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ukm $ukm)
    {
        //
    }
}
