@extends('layouts.navigation')
@section('title', $ukm->name)
@section('content')
    <!-- Content -->
    <div style="background-color: #D9D9D9;" class="flex flex-col items-center w-full overflow-hidden">
        @if ($ukm->ukm_gambar)
            <div class="relative w-full overflow-hidden h-96">
                <div class="absolute inset-0 transition-opacity duration-500 ease-in-out bg-center bg-cover filter blur-sm" style="background-image: url('{{ asset('storage/' . $ukm->ukm_gambar) }}');"></div>
                <div class="relative z-10 flex flex-col items-start justify-center h-full mx-4 text-left text-white transition-opacity duration-500 ease-in-out sm:mx-8 md:mx-16 lg:mx-20">
                    <h1 class="mb-4 text-4xl font-bold">Selamat Datang di {{ $ukm->name }}</h1>
                    <p class="text-lg">Sekretariat: {{ $ukm->alamat }}</p>
                </div>
            </div>                    
        @endif
        <!-- Profil -->
        <div class="flex flex-wrap justify-center w-full gap-8 mt-16 md:mt-8 md:gap-16">
            <!-- Tentang -->
            <div class="w-60">
                <h2 class="mb-4 text-lg font-bold">TENTANG</h2>
                <a href="" class="block text-xs">SEJARAH TERBENTUKNYA {{ $ukm->name }}</a>                                
                <a href="" class="block text-xs">VISI dan MISI</a>
                <a href="" class="block text-xs">TUJUAN ORGANISASI</a>
            </div>
            <!-- Informasi -->
            <div class="w-60">
                <h2 class="mb-4 text-lg font-bold">INFORMASI</h2>
                <p class="text-xs">{{ $ukm->alamat }}</p>
                <p class="text-xs">
                    📩: <a href="mailto:{{ $ukm->email }}">{{ $ukm->email }}</a>
                </p>
                <p class="text-xs">📞: {{ $ukm->phone_number }}</p>
                <p class="text-xs">Ketua UKM : {{ $ukm->name_ketua }}</p>
                @if ($ukm->instagram)
                    <p class="text-xs">
                        Instagram:
                        <span id="instagramTooltip">{{ $ukm->instagram }}</span>
                    </p>
                @endif
                @if ($ukm->twitter)
                    <p class="text-xs">
                        Twitter:
                        <a href="https://twitter.com/{{ $ukm->twitter }}" target="_blank">{{ $ukm->twitter }}</a>
                    </p>
                @endif
                @if ($ukm->youtube)
                    <p class="text-xs">
                        YouTube: 
                        <a href="https://www.youtube.com/{{ $ukm->youtube }}" target="_blank">{{ $ukm->youtube }}</a>
                    </p>
                @endif
                @if ($ukm->facebook)
                    <p class="text-xs">
                        Facebook:
                        <a href="https://www.facebook.com/${{ $ukm->facebook }}" target="_blank">{{ $ukm->youtube }}</a>
                    </p>
                @endif
            </div>
        </div>
        <div class="flex flex-wrap justify-center w-full gap-16 px-6 mt-16 text-justify md:mt-8 md:px-0">
            <!-- Sejarah -->
            <div class="w-64 md:w-96">
                <h2 class="mb-4 text-xs font-bold">SEJARAH TERBENTUKNYA {{ $ukm->name }}</h2>
                @foreach(explode("\n", $ukm->sejarah) as $item)
                <p style="text-indent: 2.75em" class="text-xs">{{ trim($item) }}</p>
                @endforeach
            </div>
            <!-- Visi dan Misi -->
            <div class="w-64">
                <h2 class="mb-4 text-xs font-bold">VISI dan MISI</h2>
                <h3 class="text-xs">VISI</h3>
                <p style="text-indent: 2.75em" class="text-xs">{{ $ukm->visi }}</p>
                <h3 class="mt-4 text-xs">MISI</h3>
                <p style="text-indent: 2.75em" class="text-xs">{{ $ukm->name }} mempunyai misi:</p>
                <ol class="pl-6 text-xs list-decimal">
                    @foreach(explode("\n", $ukm->misi) as $item)
                    <li>{{ trim($item) }}</li>
                    @endforeach
                </ol>
            </div>
            <!-- Tujuan -->
            <div class="w-64 md:w-96">
                <h2 class="mb-4 text-xs font-bold">TUJUAN ORGANISASI</h2>
                @foreach(explode("\n", $ukm->tujuan) as $item)
                <p class="text-xs">{{ trim($item) }}</p>
                @endforeach
            </div>
        </div>
        @if ($ukm->beritas()->count() > 0 )
            <div class="grid w-full gap-4 p-8 mt-16 lg:p-24" style="max-width: 88rem;">
                <h2 class="mb-4 text-xl font-bold text-center">BERITA</h2>
                @if ($beritas->count() > 0)
                    @php
                        $beritasSorted = $beritas->where('status', 'Dipublikasi')->sortByDesc('tanggal');
                    @endphp
                    <div class="grid grid-cols-1 gap-10 lg:grid-cols-3 md:grid-cols-2">
                        @foreach ($beritasSorted as $berita)
                            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md md:max-w-md dark:bg-gray-800 dark:border-gray-700 berita-card">
                                <a href="{{ route('sikm.berita', ['id' => $berita->id]) }}">
                                    @if($berita->gambar)
                                        @php
                                            $gambarArray = json_decode($berita->gambar);
                                        @endphp
                                        @if(is_array($gambarArray) && count($gambarArray) > 0)
                                            <div class="swiper-container">
                                                <div class="swiper-wrapper">
                                                    @foreach ($gambarArray as $gambarPath)
                                                        <div class="swiper-slide">
                                                            <img class="object-cover rounded-t-lg" src="{{ asset('storage/' . $gambarPath) }}" alt="" />
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @else
                                            <img class="object-cover rounded-t-lg" src="{{ asset('storage/' . $berita->gambar) }}" alt="" />
                                        @endif
                                    @endif
                                </a>
                                <div class="p-5">
                                    <a href="{{ route('sikm.berita', ['id' => $berita->id]) }}">
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $berita->judul }}</h5>
                                    </a>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ strtok($berita->deskripsi, '.?!') }}</p>
                                    <div class="flex justify-center ">
                                        <a href="{{ route('sikm.berita', ['id' => $berita->id]) }}" class="px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:underline">Lihat lebih banyak</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p>Belum ada berita</p>
                @endif
            </div>
        @endif
        <button onclick="goBack()" class="fixed px-4 py-2 text-white bg-blue-500 rounded-full bottom-4 right-4">Kembali</button>
    </div>
@endsection