@extends('layouts.navigation')
@section('title', 'Homepage')
@section('content')
<div class="flex items-center justify-center p-4 text-center h-125 sm:text-left" style=" background-color: #AEB0E5;">
        <div>
            <p class="font-normal leading-normal text-black text-16px font-poppins">
                Unit Kegiatan Mahasiswa (UKM) adalah wadah aktivitas kemahasiswaan untuk mengembangkan minat, bakat, dan
                keahlian tertentu bagi para anggota-anggotanya. Lembaga ini merupakan partner organisasi kemahasiswaan intra
                kampus lainnya seperti Badan Eksekutif Mahasiswa. Lembaga ini bersifat otonom, dan bukan merupakan bagian
                dari Badan Eksekutif Mahasiswa.
            </p>
        </div>
</div> 
<!-- Body -->
    <div class="container flex-grow p-8 mx-auto my-8 mt-8">
        <!-- Menambahkan margin top dan margin bottom pada kontainer card -->
        <!-- Card Container -->
        <div id="cardContainer" class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
            <!-- Card 1 -->
            @foreach ($ukms->take(6) as $ukm)
                @if ($ukm->beritas->where('status', 'Dipublikasi')->count() > 0)
                    <div class="grid grid-cols-3 gap-4 p-4 m-4">
                        <div class="col-span-1 -mx-2 bg-white rounded-lg shadow-lg" style="background-image: url('{{ $ukm->ukm_logo ? asset('storage/' . $ukm->ukm_logo) : asset('feather/image.svg') }}'); background-size: contain; background-repeat: no-repeat; background-position: center; height: 156px; width: 156px;">
                        </div>
                        @if ($ukm->beritas->where('status', 'Dipublikasi')->count() > 0)
                            <div class="col-span-2 -mx-2 bg-white rounded-lg shadow-lg swiper-container" style="height: 156px;">
                                <div class="swiper-wrapper">
                                    @foreach ($ukm->beritas->where('status', 'Dipublikasi')->sortByDesc('tanggal')->take(1) as $berita)
                                        @if($berita->gambar)
                                            @php
                                                $gambarArray = json_decode($berita->gambar);
                                            @endphp
                                            @if(is_array($gambarArray) && count($gambarArray) > 0)
                                                @foreach ($gambarArray as $gambarPath)
                                                    <div class="swiper-slide">
                                                        <img src="{{ asset('storage/' . $gambarPath) }}" alt="News" class="object-cover w-full h-full zoom-on-hover" data-tippy-content="{{ $berita->judul }}">
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="swiper-slide">
                                                    <img src="{{ $berita->gambar ? asset('storage/' . $berita->gambar) : asset('feather/image.svg') }}" alt="News" class="object-cover w-full h-full zoom-on-hover" data-tippy-content="{{ $berita->judul }}">
                                                </div>
                                            @endif
                                        @endif
                                        {{-- <!-- Add Pagination -->
                                        <div class="swiper-pagination"></div> --}}
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <a href="{{ route('sikm.ukm', ['id' => $ukm->id]) }}" class="flex items-center justify-center col-span-3 font-bold text-center font-poppins">{{ $ukm->name }}</a>
                    </div>
                @else
                    <div class="grid grid-cols-3 gap-4 p-4 m-4">
                        <div class="flex flex-col items-center justify-center col-span-3">
                            <a href="{{ route('sikm.ukm', ['id' => $ukm->id]) }}">
                                <div class="relative bg-white rounded-lg shadow-lg" style="background-image: url('{{ $ukm->ukm_logo ? asset('storage/' . $ukm->ukm_logo) : asset('feather/image.svg') }}'); background-size: contain; background-repeat: no-repeat; background-position: center; height: 210px; width: 210px;">
                                </div>
                            </a>
                            <a href="{{ route('sikm.ukm', ['id' => $ukm->id]) }}" class="flex items-center justify-center font-bold text-center font-poppins" style="height: 40px;">
                                {{ $ukm->name }}
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <!-- Sisanya akan ditampilkan setelah klik -->
        <div id="hiddenCards" class="hidden">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($ukms->slice(6) as $ukm)
                    @if ($ukm->beritas->where('status', 'Dipublikasi')->count() > 0)
                        <div class="grid grid-cols-3 gap-4 p-4 m-4">
                            <div class="col-span-1 -mx-2 bg-white rounded-lg shadow-lg" style="background-image: url('{{ $ukm->ukm_logo ? asset('storage/' . $ukm->ukm_logo) : asset('feather/image.svg') }}'); background-size: contain; background-repeat: no-repeat; background-position: center; height: 156px; width: 156px;">
                            </div>
                            @if ($ukm->beritas->where('status', 'Dipublikasi')->count() > 0)
                                <div class="col-span-2 -mx-2 bg-white rounded-lg shadow-lg swiper-container" style="height: 156px;">
                                    <div class="swiper-wrapper">
                                        @foreach ($ukm->beritas->where('status', 'Dipublikasi')->sortByDesc('tanggal')->take(1) as $berita)
                                            @if($berita->gambar)
                                                @php
                                                    $gambarArray = json_decode($berita->gambar);
                                                @endphp
                                                @if(is_array($gambarArray) && count($gambarArray) > 0)
                                                    @foreach ($gambarArray as $gambarPath)
                                                        <div class="swiper-slide">
                                                            <img src="{{ asset('storage/' . $gambarPath) }}" alt="News" class="object-cover w-full h-full zoom-on-hover" data-tippy-content="{{ $berita->judul }}">
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="swiper-slide">
                                                        <img src="{{ $berita->gambar ? asset('storage/' . $berita->gambar) : asset('feather/image.svg') }}" alt="News" class="object-cover w-full h-full zoom-on-hover" data-tippy-content="{{ $berita->judul }}">
                                                    </div>
                                                @endif
                                            @endif
                                            {{-- <!-- Add Pagination -->
                                            <div class="swiper-pagination"></div> --}}
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            <a href="{{ route('sikm.ukm', ['id' => $ukm->id]) }}" class="flex items-center justify-center col-span-3 font-bold text-center font-poppins">{{ $ukm->name }}</a>
                        </div>
                    @else
                        <div class="grid grid-cols-3 gap-4 p-4 m-4">
                            <div class="flex flex-col items-center justify-center col-span-3">
                                <a href="{{ route('sikm.ukm', ['id' => $ukm->id]) }}">
                                    <div class="relative bg-white rounded-lg shadow-lg" style="background-image: url('{{ $ukm->ukm_logo ? asset('storage/' . $ukm->ukm_logo) : asset('feather/image.svg') }}'); background-size: contain; background-repeat: no-repeat; background-position: center; height: 210px; width: 210px;">
                                    </div>
                                </a>
                                <a href="{{ route('sikm.ukm', ['id' => $ukm->id]) }}" class="flex items-center justify-center font-bold text-center font-poppins" style="height: 40px;">
                                    {{ $ukm->name }}
                                </a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
<!-- Expand bar untuk menampilkan sisanya -->
    <div id="expandBar" class="w-full py-4 text-center text-white bg-blue-500 cursor-pointer">
        <span id="expandText">Lihat Lebih Banyak</span>
    </div>
@endsection