@extends('user.editor.layouts.main')

@section('title')
    EDITOR | EDIT BERITA-UKM
@endsection

@section('content')
<div class="container">
    <h1>Edit Berita</h1>
    <form action="{{ route('berita.update', ['id' => $berita->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ $berita->judul }}">
        </div>
        <div class="form-group">
            <label for="category">Kategori</label>
            <select class="form-control" id="category" name="category">
                <option value="AG" {{ $berita->category === 'AG' ? 'selected' : '' }}>Keagamaan</option>
                <option value="OL" {{ $berita->category === 'OL' ? 'selected' : '' }}>Olahraga</option>
                <option value="AK" {{ $berita->category === 'AK' ? 'selected' : '' }}>Akademik</option>
            </select>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi">{{ $berita->deskripsi }}</textarea>
        </div>
        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" class="form-control-file" id="gambar" name="gambar">
            <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" style="max-width: 300px;">
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $berita->tanggal }}">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection