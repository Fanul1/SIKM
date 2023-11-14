<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>SIKM - Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <section class="">
        <div class="grid max-w-screen-xl gap-8 px-4 py-8 mx-auto lg:py-16 lg:grid-cols-2 lg:gap-16">
            <div class="flex flex-col justify-center">
                <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">SIKM</h1>
                <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">Disini kami mengintegrasikan semua ukm yang ada di USK</p>
                <a href="#" class="inline-flex items-center text-lg font-medium text-blue-600 dark:text-blue-500 hover:underline">Baca panduan penggunaan
                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
            </div>
            <div>
                <div class="w-full p-6 space-y-8 bg-white rounded-lg shadow-xl lg:max-w-xl sm:p-8 dark:bg-gray-800">
                    <h2 class="text-2xl font-bold text-center text-gray-900 dark:text-white">
                        Masuk ke SIKM
                    </h2>
                    <form class="mt-8 space-y-6" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div>
                            <h3 class="font-semibold text-center text-red-600">
                                {{ session('loginError') }}
                            </h3>
                        </div>                        
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required>
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kata Sandi</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        </div>
                        <div class="flex items-start justify-between mb-2">
                            <div class="flex items-center h-5">
                                Belum daftar?<a href="/sikm/register" class="ml-2 text-blue-600 hover:underline dark:text-blue-500">Buat Akun</a>
                            </div>
                            <a href="/forgot-password" class="text-blue-600 hover:underline dark:text-blue-500">Lupa Password?</a>
                        </div>
                        <div class="flex items-center justify-center">
                            <button type="submit" class="px-5 py-3 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 sm:w-auto dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login ke akun anda</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </section>
</body>
<script>
    @if(session('loginError'))
        alert("{{ session('loginError') }}");
    @endif
</script>
</html>