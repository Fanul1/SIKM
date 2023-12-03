@extends('layouts.navigation')
@section('title', $ukm->name)
@section('content')
    <!-- Content -->
    <div style="background-color: #D9D9D9;" class="flex flex-col items-center w-full py-6 overflow-hidden">
        <!-- Profil -->
        <div class="flex flex-wrap justify-center w-full gap-8 mt-16 md:mt-8 md:gap-16">
            <!-- Tentang -->
            <div class="w-60">
                <h2 class="mb-4 text-lg font-bold">TENTANG</h2>
                <a href="" class="block text-xs">SEJARAH TERBENTUKNYA UKM RESIMEN MAHASISWA</a>                                
                <a href="" class="block text-xs">VISI dan MISI</a>
                <a href="" class="block text-xs">TUJUAN ORGANISASI</a>
            </div>
            <!-- Informasi -->
            <div class="w-60">
                <h2 class="mb-4 text-lg font-bold">INFORMASI</h2>
                <p class="text-xs">{{ $ukm->alamat }}</p>
                <p class="text-xs">📩: {{ $ukm->email }}</p>
                <p class="text-xs">📞: {{ $ukm->phone_number }}</p>
                <p class="text-xs">Ketua UKM : {{ $ukm->name_ketua }}</p>
                @if ($ukm->instagram)
                <p class="text-xs">Instagram: {{ $ukm->instagram }}</p>
                @endif
                @if ($ukm->twitter)
                <p class="text-xs">📞: {{ $ukm->twitter }}</p>
                @endif
                @if ($ukm->youtube)
                <p class="text-xs">📞: {{ $ukm->youtube }}</p>
                @endif
            </div>
        </div>
        <div class="flex flex-wrap justify-center w-full gap-16 px-6 mt-16 text-justify md:mt-8 md:px-0">
            <!-- Sejarah -->
            <div class="w-64 md:w-96">
                <h2 class="mb-4 text-xs font-bold">SEJARAH TERBENTUKNYA UKM RESIMEN MAHASISWA</h2>
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
                <div class="grid gap-4 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 justify-items-center ">
                    @foreach ($beritas as $berita)
                        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md md:max-w-md dark:bg-gray-800 dark:border-gray-700">
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