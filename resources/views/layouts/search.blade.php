@extends('layouts.navigation')

@section('title', 'SIKM - SEARCH')

@section('content')
    <div class="container mx-auto">
        <div class="flex items-center justify-between mt-4 mb-4">
            <div class="relative inline-block text-center">
                <label for="filterType" class="block text-sm font-medium text-gray-700">Filter:</label>
                <select id="filterType" name="filterType" class="px-4 py-2 pr-8 border rounded form-select focus:outline-none focus:border-blue-500">
                    <option value="all">Semua</option>
                    <option value="ukm">Hanya UKM</option>
                    <option value="berita">Hanya Berita</option>
                </select>
            </div>
            <input type="text" id="searchInput" class="px-2 py-1 ml-4 border rounded focus:outline-none focus:border-blue-500" placeholder="Cari UKM atau Berita">
            <a href="/" class="text-blue-500 hover:underline">Kembali ke Beranda</a>
        </div>
        
        <h3 class="mt-8 mb-4 text-2xl font-bold text-center">UKM</h3>
        <div id="cardContainer" class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                <!-- Tampilkan UKM -->
                @foreach ($ukms as $ukm)
                    @if ($ukm->status === 'Dipublikasi')
                        <div class="grid grid-cols-3 gap-4 p-4 m-4 ukm-card">
                            <div class="col-span-1 -mx-2 bg-white rounded-lg shadow-lg" style="background-image: url('{{ $ukm->ukm_logo ? asset('storage/' . $ukm->ukm_logo) : asset('feather/image.svg') }}'); background-size: contain; background-repeat: no-repeat; background-position: center; height: 156px; width: 156px;">
                                <div class="flex items-center justify-center h-full"></div>
                            </div>
                            <div class="col-span-2 -mx-2 bg-white rounded-lg shadow-lg" style="height: 156px;">
                                <div class="flex items-center justify-center h-full">
                                    @foreach ($ukm->beritas->where('status', 'Dipublikasi')->sortByDesc('created_at')->take(1) as $berita)
                                        <img src="{{ $berita->gambar ? asset('storage/' . $berita->gambar) : asset('feather/image.svg') }}" alt="News" class="object-cover w-full h-full zoom-on-hover">
                                    @endforeach
                                </div>
                            </div>
                            <a href="{{ route('sikm.ukm', ['id' => $ukm->id]) }}" class="flex items-center justify-center col-span-3 font-bold text-center font-poppins">{{ $ukm->name }}</a>
                        </div>
                    @endif
                @endforeach
        </div>

        <h3 class="mt-8 mb-4 text-2xl font-bold text-center">Berita</h3>
        <div id="cardContainer" class="grid grid-cols-1 gap-4 mb-10 md:grid-cols-2 lg:grid-cols-3">
            <!-- Tampilkan Berita -->
            @foreach ($beritas as $berita)
                @if ($berita->status === 'Dipublikasi')
                    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md md:max-w-md dark:bg-gray-800 dark:border-gray-700 berita-card">
                        <a href="{{ route('sikm.berita', ['id' => $berita->id]) }}">
                            <img class="object-cover rounded-t-lg" src="{{ $berita->gambar ? asset('storage/' . $berita->gambar) : asset('feather/image.svg') }}" alt="" />
                        </a>
                        <div class="p-5">
                            <a href="{{ route('sikm.berita', ['id' => $berita->id]) }}">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $berita->judul }}</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ strtok($berita->deskripsi, '.?!') }}</p>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <p id="noResults" class="hidden my-8 text-xl font-bold text-center">Hasil pencarian tidak ditemukan.</p>
    </div>
    <script src="{{ asset('js/search.js') }}"></script>
@endsection
