<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Menghubungkan dengan file CSS Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/homepage.css')}}">
    @vite('resources/css/app.css')
</head>

<body class="flex flex-col min-h-screen bg-gray-100">
    <!-- Navbar -->
    <nav style="background-color: #07294D;" class="p-4 text-white">
        <div class="container flex flex-row items-center justify-between mx-auto">
            <div class="flex flex-row items-center">
                <img src={{ asset('assets/Logousk.png') }} alt="Logo" class="w-16 h-16">
                <div class="flex flex-col justify-center ml-4 font-bold font-poppins">
                    @if(Request::routeIs('sikm.ukm'))
                    <p class="text-2xl">{{ $ukm->name }}</p>
                    <p class="text-lg">Dewan Permusyarawatan Mahasiswa USK</p>
                    @else
                    <p class="text-2xl">SIKM USK</p>
                    <p class="text-lg">Sistem Informasi Kegiatan Mahasiswa</p>
                    @endif
                </div>
            </div>
            <!-- Tombol Login dan Pencarian -->
            <div class="inline-flex items-center">
                <!-- Pencarian (search) -->
                <form method="GET" action="{{ url('/search') }}">   
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input type="search" name="query" id="default-search" class="block w-full p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg ps-10 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="UKM, Berita" required>
                        <button type="submit" class="text-white absolute end-2.5 bottom-1.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-2 py-1 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 text-sm">Search</button>
                    </div>
                </form>
                <!-- Tombol Login -->
                @auth
                    <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar" class="flex mx-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" type="button">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-10 h-10 bg-blue-500 rounded-full" src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : asset('feather/user.svg') }}" alt="user photo">
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownAvatar" class="z-10 hidden w-40 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600">
                        <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                        <div>{{ auth()->user()->name }}</div>
                        <div class="font-medium truncate">{{ auth()->user()->email }}</div>
                        </div>
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownUserAvatarButton">
                        <li>
                            @if (auth()->user()->role === '1')
                            <a href="/dashboard" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                            @else
                            <a href="/dashboarduser" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                            @endif
                        </li>
                        </ul>
                        <div class="py-2">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="flex items-center px-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
                                    role="menuitem">
                                    <span class="ml-3 font-medium whitespace-nowrap">Log Out</span>
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ url('sikm/login') }}">
                        <button class="ml-6 text-xl font-bold text-white font-poppins">Login</button>
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Content -->
    @yield('content')

    <!-- Footer -->
    <footer class="p-4 text-white" style="background-color: #401111; position: fixed; left: 0; bottom: 0; width: 100%;">
        <div class="container flex flex-col items-center justify-between mx-auto md:flex-row" style="margin-top: 30px; margin-bottom: 30px;">
            <div class="flex flex-row items-center">
                    <img src={{ asset('assets/Logousk.png') }} alt="Logo" class="w-16 h-16">
                    <div class="flex flex-col justify-center ml-4 font-bold font-poppins">
                        <p class="text-2xl">SIKM USK</p>
                    </div>
            </div>
            <!-- Alamat -->
            <div class="mb-4 md:mb-0 md:mr-4 font-poppins">
                <h2 class="mb-2 text-xl font-bold">Alamat</h2>
                <p class="text-base font-poppins">Jln. Teuku Nyak Arief Darussalam,
                    <br>Banda Aceh, Aceh, 23111 INDONESIA
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
                        <img src={{ asset('feather/phone.svg') }} alt="Logo" class="w-5 h-5 mr-2">
                        <span>089515090480</span>
                    </span>
                </p>
                <p class="text-base">
                    <span class="flex items-center">
                    <img src={{ asset('feather/mail.svg') }} alt="Logo" class="w-5 h-5 mr-2 bg-white" >
                        <span>sikm.usk@gmail.com</span>
                    </span>
                </p>
            </div>
        </div>
        <!-- Garis Pemisah -->
        <hr class="w-full mx-auto my-4" style="background-color: #FFF; margin: 50px 0;">
        <!-- Logo-footer -->
        <div class="mt-2 text-center font-poppins">
            <!-- Kontainer untuk Logo -->
            <div class="flex items-center justify-center">
                <!-- Logo GitHub -->
                <a href="https://github.com/username" class="mx-2 hover:text-gray-400" target="_blank">
                    <img src={{ asset('feather/github.svg') }} alt="GitHub" class="w-6 h-auto">
                </a>
                <!-- Logo Facebook -->
                <a href="https://facebook.com/username" class="mx-2 text-white hover:text-gray-400" target="_blank">
                    <img src={{ asset('feather/facebook.svg') }} alt="Facebook" class="w-6 h-auto">
                </a>
                <!-- Logo Instagram -->
                <a href="https://instagram.com/username" class="mx-2 text-white hover:text-gray-400" target="_blank">
                    <img src={{ asset('feather/instagram.svg') }} alt="Instagram" class="w-6 h-auto">
                </a>
            </div>
            <!-- Teks Copyright -->
            <p class="mt-2 text-sm">Copyright © 2023. Made By Kelompok 9.</p>
        </div>
    </footer>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
</html>