<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
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
                @yield('content')
            </main>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
<script>
    document.getElementById('avatar').addEventListener('change', function (event) {
        const preview = document.getElementById('avatar-preview');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        } else {
            preview.src = '';
        }
    });
</script>
<script>
    @if(session('success'))
        alert("{{ session('success') }}");
    @endif
    @if(session('error'))
        alert("{{ session('error') }}");
    @endif
</script>
<script>
    function goBack() {
        window.history.back();
    }
</script>
</html>