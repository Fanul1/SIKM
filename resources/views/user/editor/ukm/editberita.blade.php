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
        <div class="mt-4">
            <label for="judul" class="block text-sm font-medium text-gray-900 dark:text-white">Judul Berita</label>
            <input type="text" name="judul" id="judul" class="block w-full mt-1 text-gray-900 border-gray-300 rounded-md shadow-sm dark:text-white" value="{{ $berita->judul }}">
        </div>
        <div class="mt-4">
            <label for="category" class="block text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
            <select id="category" name="category" class="block w-full mt-1 text-gray-900 border-gray-300 rounded-md shadow-sm dark:text-white">
                <option selected="">Pilih kategori</option>
                <option value="Keagamaan" {{ $berita->category === 'Keagamaan' ? 'selected' : '' }}>Keagamaan</option>
                <option value="Olahraga" {{ $berita->category === 'Olahraga' ? 'selected' : '' }}>Olahraga</option>
                <option value="Akademik" {{ $berita->category === 'Akademik' ? 'selected' : '' }}>Akademik</option>
                <option value="Kesenian" {{ $berita->category === 'Kesenian' ? 'selected' : '' }}>Kesenian</option>
            </select>
        </div>
        <div class="mt-4">
            <label for="deskripsi" class="block text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="4" class="block w-full mt-1 text-gray-900 border-gray-300 rounded-md shadow-sm dark:text-white">{{ $berita->deskripsi }}</textarea>
        </div>
        <div class="mt-4">
            <label for="gambar" class="block text-sm font-medium text-gray-900 dark:text-white">Gambar</label>
            <input type="file" name="gambar" id="gambar" class="block w-full mt-1 text-gray-900 border-gray-300 shadow-sm dark:text-white">
            <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" style="max-width: 300px;">
        </div>
        <div class="mt-4">
            <label for="tanggal" class="block text-sm font-medium text-gray-900 dark:text-white">Tanggal Posting</label>
            <input type="date" name="tanggal" id="tanggal" class="block w-full mt-1 text-gray-900 border-gray-300 rounded-md shadow-sm dark:text-white" value="{{ $berita->tanggal }}">
        </div>
        <div class="mt-6">
            <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
        </div>
    </form>
</div>
@endsection