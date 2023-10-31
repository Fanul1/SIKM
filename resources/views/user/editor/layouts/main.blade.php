<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.css" rel="stylesheet" />
        <!-- Tambahkan link ke Google Fonts untuk Poppins -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
        @vite('resources/css/app.css')
        <style>
            /* Setel font-family untuk elemen-elemen yang Anda inginkan */
            body,
            p,
            th,
            td,
            button {
                font-family: 'Poppins', sans-serif;
            }
        </style>
</head>
<body>
    @include("user.editor.layouts.header")
    <div class="container">
            @include("user.editor.layouts.sidebar")
            <main class="pt-20 sm:ml-72">
                @yield('container')
            </main>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
</html>