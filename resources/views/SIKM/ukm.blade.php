{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $ukm->name }}</title>
    <!-- Menghubungkan dengan file CSS Tailwind -->
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col min-h-screen bg-gray-100">
    <!-- Navbar -->
    <nav style="background-color: #07294D;" class="w-full p-4 text-white">
        <div class="flex flex-row items-center justify-center w-full">
            <div class="flex flex-row justify-center w-full align-middle">
                <img src={{ asset('assets/Logousk.png') }} alt="Logo" class="object-contain" style="width: 100px">
                <div class="flex flex-col items-center justify-center font-bold font-poppins">
                    <div class="flex-col justify-start mx-5">
                        <p class="text-3xl text-center md:text-left md:inline">{{ $ukm->name }}</p>
                        <p class="hidden text-xl font-normal md:block">Sekretariat: {{ $ukm->name }}</p>
                        <p class="hidden text-xl font-normal md:block">Situs Resmi {{ $ukm->name }}</p>
                    </div>                    
                </div>
                <img src={{ $ukm->ukm_logo ? asset('storage/' . $ukm->ukm_logo) : asset('feather/image.svg') }} alt="Logo" class="object-contain" style="width: 100px">
            </div>
        </div>        
    </nav> --}}
@extends('layouts.navigation')
@section('title', $ukm->name)
@section('content')
    <!-- Content -->
    <div style="background-color: #D9D9D9;" class="flex flex-col items-center w-full py-6 overflow-hidden">
        <!-- Profil -->
        {{-- <div>
            <div class="h-1 bg-purple-700"></div>
            <div  style="background-color: #111723; width: 34rem;" class="text-center">
                <p class="text-lg text-white">PROFIL</p>
            </div>
            <div style="background-color: #598892; width: 34rem;" class="box-border h-56 p-3">
                <img src={{ asset('assets/menwa.png') }} alt="" class="object-contain w-full h-full">
            </div>
        </div>         --}}
        <!-- Gambar -->
        {{-- <div class="flex flex-wrap justify-center w-full gap-8 px-6 mt-8 md:gap-44 md:px-0">
            <img src={{ asset('assets/menwa1.png') }} alt="" class="object-contain w-80 h-52">
            <img src={{ asset('assets/menwa2.png') }} alt="" class="object-contain w-80 h-52">
        </div> --}}
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
            {{-- <a href="/berita" class="block mb-16 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 md:mb-0">
                <img class="object-cover w-full rounded-md h-52 md:h-auto" src="https://source.unsplash.com/1200x400/?crowd" alt="">
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h5 class="mb-2 text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                </div>
            </a> --}}
            @if ($berita)
            <div class="grid gap-4 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 justify-items-center ">
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md md:max-w-md dark:bg-gray-800 dark:border-gray-700">
                    <a href="{{ route('sikm.berita', ['id' => $berita->id]) }}">
                        <img class="object-cover rounded-t-lg" src={{ $berita->gambar ? asset('storage/' . $berita->gambar) : asset('feather/image.svg') }} alt="" />
                    </a>
                    <div class="p-5">
                        <a href="{{ route('sikm.berita', ['id' => $berita->id]) }}">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $berita->judul }}</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ strtok($berita->deskripsi, '.?!') }}</p>
                    </div>
                </div>
            </div>
            @else
                <p>Belum ada berita</p>
            @endif
        </div>
        @endif
    </div>
@endsection
    {{-- <!-- Footer -->
    <footer class="p-4 text-white" style="background-color: #401111;">
        <div class="container flex flex-col items-center justify-between mx-auto md:flex-row">
            <div class="flex flex-row items-center">
                <img src={{ asset('assets/Logousk.png') }} alt="Logo" class="w-16 h-16">
                <div class="flex flex-col justify-center ml-4 font-bold font-poppins">
                    <p class="text-2xl">SIKM USK</p>
                </div>
            </div>
            <!-- Alamat -->
            <div class="mb-4 md:mb-0 md:mr-4 font-poppins">
                <h2 class="mb-2 text-xl font-bold">Alamat</h2>
                <p class="text-base font-poppins">
                    Jln. Teuku Nyak Arief Darussalam,<br>
                    Banda Aceh, Aceh, 23111 INDONESIA
                </p>
            </div>
            <!-- Link -->
            <div class="font-poppins">
                <h2 class="mb-2 text-xl font-bold">Link</h2>
                <p class="text-base"><a href="{{ url('sikm/login') }}">Login</a></p>
                <p class="text-base"><a href="{{ url('sikm/register') }}">Register</a></p>
            </div>
            <!-- Kontak -->
            <div class="mb-4 md:mb-0 md:mr-4 font-poppins">
                <h2 class="mb-2 text-xl font-bold">Kontak</h2>
                <p class="text-base">
                    <span class="flex items-center">
                        <img src={{ asset('assets/phone.png') }} alt="Logo" class="w-3 h-3 mr-2">
                        <span>089515090480</span>
                    </span>
                </p>
                <p class="text-base">
                    <span class="flex items-center">
                        <img src={{ asset('assets/email.png') }} alt="Logo" class="w-3 h-3 mr-2">
                        <span>sikm.usk@gmail.com</span>
                    </span>
                </p>
            </div>
        </div>
        <!-- Garis Pemisah -->
        <hr class="w-full mx-auto my-4" style="background-color: #FFF;">
        <!-- Logo-footer -->
        <div class="mt-2 text-center font-poppins">
            <!-- Kontainer untuk Logo -->
            <div class="flex items-center justify-center">
                <!-- Logo GitHub -->
                <a href="https://github.com/username" class="mx-2 hover:text-gray-400" target="_blank">
                    <img src={{ asset('assets/github.png') }} alt="GitHub" class="w-6 h-auto">
                </a>
                <!-- Logo Facebook -->
                <a href="https://facebook.com/username" class="mx-2 text-white hover:text-gray-400" target="_blank">
                    <img src={{ asset('assets/facebook.png') }} alt="Facebook" class="w-6 h-auto">
                </a>
                <!-- Logo Instagram -->
                <a href="https://instagram.com/username" class="mx-2 text-white hover:text-gray-400" target="_blank">
                    <img src={{ asset('assets/instagram.png') }} alt="Instagram" class="w-6 h-auto">
                </a>
            </div>
            <!-- Teks Copyright -->
            <p class="mt-2 text-sm">Copyright © 2023. Made By Kelompok 9.</p>
        </div>
    </footer>
</body>
</html> --}}