<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nama UKM</title>
    <!-- Menghubungkan dengan file CSS Tailwind -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="flex flex-col min-h-screen bg-gray-100">
    <div class="h-5 w-full flex align-middle" style="background-color: #111723">
        <a href="" class="text-xs mx-52 text-white">@menwausk</a>
    </div>
    <!-- Navbar -->
    <nav style="background-color: #07294D;" class="p-4 w-full text-white">
        <div class="flex flex-row items-center w-full justify-center">
            <div class="w-full flex flex-row justify-center align-middle">
                <img src={{ asset('assets/Logousk.png') }} alt="Logo" class="w-20 h-20">
                <div class="flex flex-col justify-center items-center font-bold font-poppins">
                    <div class="flex-col justify-start mx-5">
                        <p class="text-2xl text-center md:text-left md:inline">UKM MENWA</p>
                        <p class="text-2xl hidden md:inline">(Resimen Mahasiswa)</p>
                        <p class="text-lg hidden md:block">Sekretariat: MENWA</p>
                        <p class="hidden md:block">Situs Resmi UKM MENWA (Resimen Mahasiswa) USK</p>
                    </div>                    
                </div>
                <img src={{ asset('assets/logo-menwa.png') }} alt="Logo" class="w-20 h-20">
            </div>
        </div>
    </nav>

    <!-- Content -->
    


    <!-- Footer -->
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

</html>