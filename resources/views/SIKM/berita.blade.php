<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $berita->judul }}</title>
    <!-- Menghubungkan dengan file CSS Tailwind -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
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
    </nav>
    <!-- Content -->
    <div style="background-color: #D9D9D9;" class="flex flex-col items-center w-full overflow-hidden">
        <div class="grid w-full max-w-6xl gap-4 p-8 mx-4">
            <h2 class="mb-4 text-3xl font-bold text-center">{{ $berita->judul }}</h2>
            <div class="mb-16 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 md:mb-0">
                <img class="object-cover w-full rounded-md h-52 md:h-auto" src={{ $berita->gambar ? asset('storage/' . $berita->gambar) : asset('feather/image.svg') }} alt="">
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <div class="flex items-center mb-6">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img (23).jpg" class="h-8 mr-2 rounded-full" alt="avatar" loading="lazy" />
                        <div>
                          <span> Published <u>{{ $berita->tanggal }}</u> by </span>
                          <a href="#!" class="font-medium">{{ $ukm->name }}</a>
                        </div>
                    </div>
                    @foreach(explode("\n", $berita->deskripsi) as $item)
                    <p class="mb-5 font-normal text-gray-700 dark:text-gray-400" style="text-indent: 0.5in">{{ trim($item) }}</p>
                    @endforeach
                </div>
            </div>
        </div>
        <button onclick="goBack()" class="fixed px-4 py-2 text-white bg-blue-500 rounded-full bottom-4 right-4">Kembali</button>
    </div>

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
<script>
    function goBack() {
        window.history.back();
    }
</script>
</html>