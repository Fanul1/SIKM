@extends('user.editor.layouts.main')

@section('title')
    EDITOR | DETAIL BERITA-UKM
@endsection

@section('content')
<div class="container flex flex-col mx-auto lg:flex-row">
    <div id="image-slider" class="relative max-w-xs mx-auto mt-4 mb-10 lg:w-1/2">
        @if($berita->gambar)
            @php
                $gambarArray = json_decode($berita->gambar);
            @endphp
    
            @if(is_array($gambarArray) && count($gambarArray) > 1)
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach($gambarArray as $gambarPath)
                            <div class="swiper-slide">
                                <div class="relative image-container">
                                    <img src="{{ asset('storage/' . $gambarPath) }}" alt="{{ $berita->judul }}" class="object-cover w-full h-full">
                                    <div class="absolute inset-0 blur"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Add Navigation -->
                    <div class="absolute right-0 text-white transform -translate-y-1/2 swiper-button-next top-1/2"></div>
                    <div class="absolute left-0 text-white transform -translate-y-1/2 swiper-button-prev top-1/2"></div>
                    <!-- Add Pagination -->
                    <div class="absolute left-0 right-0 flex items-center justify-center gap-2 swiper-pagination bottom-4">
                        @foreach($gambarArray as $index => $gambar)
                            <div class="swiper-pagination-bullet" data-slide-to="{{ $index }}"></div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="image-container">
                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="object-cover w-full h-full">
                </div>
            @endif
    
        @endif
    </div>
    <div class="p-4 lg:w-1/2">
        <h1 class="mb-4 text-2xl font-bold">Detail Berita</h1>
        <div>
            <h3 class="text-xl font-medium">Judul: {{ $berita->judul }}</h3>
            <p>Kategori: {{ $berita->category }}</p>
            <p>Deskripsi: {{ $berita->deskripsi }}</p>
            <p>Tanggal Upload: {{ $berita->tanggal }}</p>
        </div>
    </div>
</div>
<button onclick="goBack()" class="fixed px-4 py-2 text-white bg-blue-500 rounded-full bottom-4 right-4">Kembali</button>
@endsection