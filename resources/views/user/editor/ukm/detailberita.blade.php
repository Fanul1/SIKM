@extends('user.editor.layouts.main')

@section('title')
    EDITOR | DETAIL BERITA-UKM
@endsection

@section('content')
<div class="container">
    <h1>Detail Berita</h1>
    <div>
        <h2>Judul: {{ $berita->judul }}</h2>
        <p>Kategori: {{ $berita->category }}</p>
        <p>Deskripsi: {{ $berita->deskripsi }}</p>
        <p>Tanggal Upload: {{ $berita->tanggal }}</p>
        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" style="max-width: 300px;">
    </div>
</div>
<button onclick="goBack()" class="fixed px-4 py-2 text-white bg-blue-500 rounded-full bottom-4 right-4">Kembali</button>

@endsection