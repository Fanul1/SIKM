<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <!-- Menghubungkan dengan file CSS Tailwind -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">
    <!-- Navbar -->
    <nav style="background-color: #07294D; height: 133px;" class="p-4 text-white h-133">
    <div class="container mx-auto flex flex-row items-center justify-between">
        <div class="flex flex-row items-center">
            <img src="assets/logousk.png" alt="Logo" class="w-100 h-100">
            <div class="flex flex-col justify-center font-bold font-poppins ml-4">
                <p><span style="font-size: 40px;">SIKM USK</span><br><span style="font-size: 24px;">Sistem Informasi Kegiatan Mahasiswa</span></p>
            </div>
        </div>
        <!-- Tombol Login dan Pencarian -->
        <div class="items-center inline-flex">
            <!-- Tombol Login -->
            <a href="#">
                <button class="text-white font-poppins mr-3" style="font-size: 28px; font-weight: bold;">Login</button>
            </a>
            
            <!-- Pencarian (search) -->
            <div class="relative flex items-center">
                <input
                    type="search"
                    class="relative m-0 block w-[1px] min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                    placeholder="Search"
                    aria-label="Search"
                    aria-describedby="button-addon2" />

                <!-- Search icon -->
                <span
                    class="input-group-text flex items-center whitespace-nowrap rounded px-3 py-1.5 text-center text-base font-normal text-neutral-700 dark:text-neutral-200"
                    id="basic-addon2">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        class="h-5 w-5">
                        <path
                            fill-rule="evenodd"
                            d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
            </div>
        </div>
    </div>
</nav>

    
    <div class="p-4 h-125 flex items-center justify-center text-center sm:text-left" style=" background-color: #AEB0E5;">
        <div>
            <p class="text-16px text-black font-poppins font-normal leading-normal">
                Unit Kegiatan Mahasiswa (UKM) adalah wadah aktivitas kemahasiswaan untuk mengembangkan minat, bakat, dan keahlian tertentu bagi para anggota-anggotanya. Lembaga ini merupakan partner organisasi kemahasiswaan intra kampus lainnya seperti Badan Eksekutif Mahasiswa. Lembaga ini bersifat otonom, dan bukan merupakan bagian dari Badan Eksekutif Mahasiswa.
            </p>
        </div>
    </div>
    
    <!-- Body -->
    <div class="container mx-auto mt-8 p-8 my-8 flex-grow"> <!-- Menambahkan margin top dan margin bottom pada kontainer card -->
        <!-- Card Container -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Card 1 -->
            <div class="bg-white rounded-lg shadow-lg p-4 m-4" style="background-image: url('path-to-image-1.jpg'); background-size: cover; width: 300px; height: 156px;">
                <h2 class="text-xl font-bold text-white">Card 1</h2>
                <p class="mt-2 text-white">Konten Card 1</p>
            </div>

            <!-- Card 2 -->
            <div class="bg-white rounded-lg shadow-lg p-4 m-4" style="background-image: url('path-to-image-2.jpg'); background-size: cover; width: 300px; height: 156px;">
                <h2 class="text-xl font-bold text-white">Card 2</h2>
                <p class="mt-2 text-white">Konten Card 2</p>
            </div>

            <!-- Card 3 -->
            <div class="bg-white rounded-lg shadow-lg p-4 m-4" style="background-image: url('path-to-image-3.jpg'); background-size: cover; width: 300px; height: 156px;">
                <h2 class="text-xl font-bold text-white">Card 3</h2>
                <p class="mt-2 text-white">Konten Card 3</p>
            </div>

            <!-- Card 4 -->
            <div class="bg-white rounded-lg shadow-lg p-4 m-4" style="background-image: url('path-to-image-4.jpg'); background-size: cover; width: 300px; height: 156px;">
                <h2 class="text-xl font-bold text-white">Card 4</h2>
                <p class="mt-2 text-white">Konten Card 4</p>
            </div>

            <!-- Card 5 -->
            <div class="bg-white rounded-lg shadow-lg p-4 m-4" style="background-image: url('path-to-image-5.jpg'); background-size: cover; width: 300px; height: 156px;">
                <h2 class="text-xl font-bold text-white">Card 5</h2>
                <p class="mt-2 text-white">Konten Card 5</p>
            </div>

            <!-- Card 6 -->
            <div class="bg-white rounded-lg shadow-lg p-4 m-4" style="background-image: url('path-to-image-6.jpg'); background-size: cover; width: 300px; height: 156px;">
                <h2 class="text-xl font-bold text-white">Card 6</h2>
                <p class="mt-2 text-white">Konten Card 6</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-white p-14" style="background-color: #401111;">
    <div class="container mx-auto flex flex-col md:flex-row items-center justify-between">
        <div class="flex flex-row items-center">
            <img src="assets/logousk.png" alt="Logo" class="w-100 h-100">
            <div class="flex flex-col justify-center font-bold font-poppins ml-4">
                <p><span style="font-size: 40px;">SIKM</span><br><span style="font-size: 32px;">USK</span></p>
            </div>
        </div>

        <!-- Alamat -->
        <div class="mb-4 md:mb-0 md:mr-4 font-poppins">
            <h2 class="mb-4 md:mb-0 md:mr-4 font-bold">Alamat</h2>
            <p class="text-sm font-poppins">
                Jln. Teuku Nyak Arief Darussalam,<br>
                Banda Aceh, Aceh, 23111 INDONESIA
            </p>
        </div>

        <!-- Link -->
        <div class="font-poppins">
            <h2 class="mb-4 md:mb-0 md:mr-4 font-bold">Link</h2>
            <p class="text-sm"><a href="#">Login</a></p>
            <p class="text-sm"><a href="#">Register</a></p>
        </div>

        <!-- Kontak -->
        <div class="mb-4 md:mb-0 md:mr-4 font-poppins">
            <h2 class="mb-4 md:mb-0 md:mr-4 font-bold">Kontak</h2>
            <p class="text-sm">
                <span class="flex items-center">
                    <img src="assets/phone.png" alt="Logo" class="w-3 h-3 mr-2">
                    <span>089515090480</span>
                </span>
            </p>
            <p class="text-sm">
                <span class="flex items-center">
                    <img src="assets/email.png" alt="Logo" class="w-3 h-3 mr-2">
                    <span>sikm.usk@gmail.com</span>
                </span>
            </p>
        </div>
    </div>

    <!-- Garis Pemisah -->
    <hr class="my-14 mx-auto" style="width: 1516px; background-color: #FFF;">

    <!-- Logo-footer -->
    <div class="font-poppins text-center mt-4">
        <!-- Kontainer untuk Logo -->
        <div class="flex items-center justify-center">
            <!-- Logo GitHub -->
            <a href="https://github.com/username" class="hover:text-gray-400 mx-4" target="_blank">
                <img src="assets/github.png" alt="GitHub" class="w-6 h-auto">
            </a>
            <!-- Logo Facebook -->
            <a href="https://facebook.com/username" class="text-white hover:text-gray-400 mx-4" target="_blank">
                <img src="assets/facebook.png" alt="Facebook" class="w-6 h-auto">
            </a>
            <!-- Logo Instagram -->
            <a href="https://instagram.com/username" class="text-white hover:text-gray-400 mx-4" target="_blank">
                <img src="assets/instagram.png" alt="Instagram" class="w-6 h-auto">
            </a>
        </div>

        <!-- Teks Copyright -->
        <p class="text-sm mt-2">Copyright © 2023. Made By Kelompok 9.</p>
    </div>
</footer>


</body>
</html>
