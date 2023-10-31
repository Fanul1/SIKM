@extends('layouts.navigation') <!-- Extend the navigation template -->
@section('title', 'Homepage') <!-- Set the title for this page -->
@section('content')
    <div class="flex items-center justify-center p-4 text-center h-125 sm:text-left" style=" background-color: #AEB0E5;">
        <div>
            <p class="font-normal leading-normal text-black text-16px font-poppins">
                Unit Kegiatan Mahasiswa (UKM) adalah wadah aktivitas kemahasiswaan untuk mengembangkan minat, bakat, dan
                keahlian tertentu bagi para anggota-anggotanya. Lembaga ini merupakan partner organisasi kemahasiswaan intra
                kampus lainnya seperti Badan Eksekutif Mahasiswa. Lembaga ini bersifat otonom, dan bukan merupakan bagian
                dari Badan Eksekutif Mahasiswa.
            </p>
        </div>
    </div>

    <!-- Body -->
    <div class="container flex-grow p-8 mx-auto my-8 mt-8">
        <!-- Menambahkan margin top dan margin bottom pada kontainer card -->
        <!-- Card Container -->
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
            <!-- Card 1 -->
            <div class="p-4 m-4 bg-white rounded-lg shadow-lg"
                style="background-image: url('path-to-image-1.jpg'); background-size: cover; width: 300px; height: 156px;">
                <h2 class="text-xl font-bold text-white">Card 1</h2>
                <p class="mt-2 text-white">Konten Card 1</p>
            </div>

            <!-- Card 2 -->
            <div class="p-4 m-4 bg-white rounded-lg shadow-lg"
                style="background-image: url('path-to-image-2.jpg'); background-size: cover; width: 300px; height: 156px;">
                <h2 class="text-xl font-bold text-white">Card 2</h2>
                <p class="mt-2 text-white">Konten Card 2</p>
            </div>

            <!-- Card 3 -->
            <div class="p-4 m-4 bg-white rounded-lg shadow-lg"
                style="background-image: url('path-to-image-3.jpg'); background-size: cover; width: 300px; height: 156px;">
                <h2 class="text-xl font-bold text-white">Card 3</h2>
                <p class="mt-2 text-white">Konten Card 3</p>
            </div>

            <!-- Card 4 -->
            <div class="p-4 m-4 bg-white rounded-lg shadow-lg"
                style="background-image: url('path-to-image-4.jpg'); background-size: cover; width: 300px; height: 156px;">
                <h2 class="text-xl font-bold text-white">Card 4</h2>
                <p class="mt-2 text-white">Konten Card 4</p>
            </div>

            <!-- Card 5 -->
            <div class="p-4 m-4 bg-white rounded-lg shadow-lg"
                style="background-image: url('path-to-image-5.jpg'); background-size: cover; width: 300px; height: 156px;">
                <h2 class="text-xl font-bold text-white">Card 5</h2>
                <p class="mt-2 text-white">Konten Card 5</p>
            </div>

            <!-- Card 6 -->
            <div class="p-4 m-4 bg-white rounded-lg shadow-lg"
                style="background-image: url('path-to-image-6.jpg'); background-size: cover; width: 300px; height: 156px;">
                <h2 class="text-xl font-bold text-white">Card 6</h2>
                <p class="mt-2 text-white">Konten Card 6</p>
            </div>
        </div>
    </div>
@endsection
