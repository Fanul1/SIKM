@extends('layouts.navigation') <!-- Extend the navigation template -->
@section('title', 'Homepage') <!-- Set the title for this page -->
@section('content')

<style>
    .zoom-on-hover {
    transition: transform 0.3s;
}

.zoom-on-hover:hover {
    transform: scale(1.1); /* Perbesar gambar saat dihover */
}



</style>
<div class="flex items-center justify-center p-4 text-center h-125 sm:text-left" style=" background-color: #AEB0E5;">
    <div> <p class="font-normal leading-normal text-black text-16px font-poppins">
    Unit Kegiatan Mahasiswa (UKM) adalah wadah aktivitas kemahasiswaan untuk mengembangkan minat, bakat, dan
    keahlian tertentu bagi para anggota-anggotanya. Lembaga ini merupakan partner organisasi kemahasiswaan intra
    kampus lainnya seperti Badan Eksekutif Mahasiswa. Lembaga ini bersifat otonom, dan bukan merupakan bagian
    dari Badan Eksekutif Mahasiswa.
    </p>
</div>
</div> <!-- Body -->
<div class="container flex-grow p-8 mx-auto my-8 mt-8">
    <!-- Menambahkan margin top dan margin bottom pada kontainer card -->
    <!-- Card Container -->
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
        <!-- Card 1 -->
        <div>
        <div class="grid grid-cols-3 gap-4 p-4 m-4">
    <div class="col-span-1 bg-white rounded-lg shadow-lg -mx-2"
         style="background-image: url('{{ asset('assets/ukmlogo1.jpg') }}'); background-size: contain; background-repeat: no-repeat; background-position: center; height: 156px; width: 156px;">
        <div class="flex justify-center items-center h-full">
        </div>
    </div>

    <div class="col-span-2 bg-white rounded-lg shadow-lg -mx-2" style="height: 156px;">
        <div class="flex justify-center items-center h-full">
            <img src="{{ asset('assets/ukmimage1.jpg') }}" alt="Image" class="w-full h-full object-cover zoom-on-hover">
        </div>
    </div>
    
    </div>
    <div>
    <p class="text-center font-bold font-poppins">UKM DETAK</p>

    </div>
</div>





        <!-- Card 2 -->
        <div>
        <div class="grid grid-cols-3 gap-4 p-4 m-4">
    <div class="col-span-1 bg-white rounded-lg shadow-lg -mx-2"
         style="background-image: url('{{ asset('assets/ukmlogo1.jpg') }}'); background-size: contain; background-repeat: no-repeat; background-position: center; height: 156px; width: 156px;">
        <div class="flex justify-center items-center h-full">
        </div>
    </div>

    <div class="col-span-2 bg-white rounded-lg shadow-lg -mx-2" style="height: 156px;">
        <div class="flex justify-center items-center h-full">
            <img src="{{ asset('assets/ukmimage1.jpg') }}" alt="Image" class="w-full h-full object-cover zoom-on-hover">
        </div>
    </div>
    
    </div>
    <div>
    <p class="text-center font-bold font-poppins">UKM DETAK</p>

    </div>
</div>

        <!-- Card 3 -->
        <div>
        <div class="grid grid-cols-3 gap-4 p-4 m-4">
    <div class="col-span-1 bg-white rounded-lg shadow-lg -mx-2"
         style="background-image: url('{{ asset('assets/ukmlogo1.jpg') }}'); background-size: contain; background-repeat: no-repeat; background-position: center; height: 156px; width: 156px;">
        <div class="flex justify-center items-center h-full">
        </div>
    </div>

    <div class="col-span-2 bg-white rounded-lg shadow-lg -mx-2" style="height: 156px;">
        <div class="flex justify-center items-center h-full">
            <img src="{{ asset('assets/ukmimage1.jpg') }}" alt="Image" class="w-full h-full object-cover zoom-on-hover">
        </div>
    </div>
    
    </div>
    <div>
    <p class="text-center font-bold font-poppins">UKM DETAK</p>

    </div>
</div>

        <!-- Card 4 -->
        <div>
        <div class="grid grid-cols-3 gap-4 p-4 m-4">
    <div class="col-span-1 bg-white rounded-lg shadow-lg -mx-2"
         style="background-image: url('{{ asset('assets/ukmlogo1.jpg') }}'); background-size: contain; background-repeat: no-repeat; background-position: center; height: 156px; width: 156px;">
        <div class="flex justify-center items-center h-full">
        </div>
    </div>

    <div class="col-span-2 bg-white rounded-lg shadow-lg -mx-2" style="height: 156px;">
        <div class="flex justify-center items-center h-full">
            <img src="{{ asset('assets/ukmimage1.jpg') }}" alt="Image" class="w-full h-full object-cover zoom-on-hover">
        </div>
    </div>
    
    </div>
    <div>
    <p class="text-center font-bold font-poppins">UKM DETAK</p>

    </div>
</div>

        <!-- Card 5 -->
        <div>
        <div class="grid grid-cols-3 gap-4 p-4 m-4">
    <div class="col-span-1 bg-white rounded-lg shadow-lg -mx-2"
         style="background-image: url('{{ asset('assets/ukmlogo1.jpg') }}'); background-size: contain; background-repeat: no-repeat; background-position: center; height: 156px; width: 156px;">
        <div class="flex justify-center items-center h-full">
        </div>
    </div>

    <div class="col-span-2 bg-white rounded-lg shadow-lg -mx-2" style="height: 156px;">
        <div class="flex justify-center items-center h-full">
            <img src="{{ asset('assets/ukmimage1.jpg') }}" alt="Image" class="w-full h-full object-cover zoom-on-hover">
        </div>
    </div>
    
    </div>
    <div>
    <p class="text-center font-bold font-poppins">UKM DETAK</p>

    </div>
</div>

        <!-- Card 6 -->
        <div>
        <div class="grid grid-cols-3 gap-4 p-4 m-4">
    <div class="col-span-1 bg-white rounded-lg shadow-lg -mx-2"
         style="background-image: url('{{ asset('assets/ukmlogo1.jpg') }}'); background-size: contain; background-repeat: no-repeat; background-position: center; height: 156px; width: 156px;">
        <div class="flex justify-center items-center h-full">
        </div>
    </div>

    <div class="col-span-2 bg-white rounded-lg shadow-lg -mx-2" style="height: 156px;">
        <div class="flex justify-center items-center h-full">
            <img src="{{ asset('assets/ukmimage1.jpg') }}" alt="Image" class="w-full h-full object-cover zoom-on-hover">
        </div>
    </div>
    
    </div>
    <div>
    <p class="text-center font-bold font-poppins">UKM DETAK</p>

    </div>
</div>
    </div>
</div>
@endsection