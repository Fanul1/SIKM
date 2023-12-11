<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <title>@yield('title')</title>
    <!-- Add this to the head section of your HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@glidejs/glide/dist/css/glide.core.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.css" rel="stylesheet" />
    <!-- Tambahkan link ke Google Fonts untuk Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/main.css')}}">
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
<script src="{{ asset('js/ukm.js')}}"></script>
<script>
    @if(session('success'))
        alert("{{ session('success') }}");
    @endif
    @if(session('error'))
        alert("{{ session('error') }}");
    @endif
</script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    var mySwiper = new Swiper('#image-slider .swiper-container', {
        loop: true,
        navigation: {
            nextEl: '#image-slider .swiper-button-next',
            prevEl: '#image-slider .swiper-button-prev',
        },
        pagination: {
            el: '#image-slider .swiper-pagination',
            clickable: true,
        },
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        var table = $('#beritaTable').DataTable({
            "dom": '<"flex justify-between items-center"fl>t<"flex justify-between items-center"ip>',
            "order": [[0, 'asc']], // Urutkan berdasarkan kolom tanggal secara default
            "language": {
                "lengthMenu": "Tampilkan _MENU_ entri",
                "search": "Cari: ",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "infoFiltered": "(disaring dari _MAX_ total entri)",
                "paginate": {
                    "first": "First  ",
                    "last": " Last",
                    "next": " Next",
                    "previous": "Previos "
                }
            },
        });
    });
</script>
</html>