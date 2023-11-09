@extends('layouts.navigation')
@section('title', 'Homepage')
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
    </div> <!-- Body -->
        <div class="container flex-grow p-8 mx-auto my-8 mt-8">
            <!-- Menambahkan margin top dan margin bottom pada kontainer card -->
            <!-- Card Container -->
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                <!-- Card 1 -->
                @foreach ($ukms as $ukm)
                <div>
                    <div class="grid grid-cols-3 gap-4 p-4 m-4">
                        <div class="col-span-1 -mx-2 bg-white rounded-lg shadow-lg"
                            style="background-image: url('{{ $ukm->ukm_logo ? asset('storage/' . $ukm->ukm_logo) : asset('feather/image.svg') }}'); background-size: contain; background-repeat: no-repeat; background-position: center; height: 156px; width: 156px;">
                            <div class="flex items-center justify-center h-full"></div>
                        </div>
                        <div class="col-span-2 -mx-2 bg-white rounded-lg shadow-lg" style="height: 156px;">
                            <div class="flex items-center justify-center h-full">
                                @foreach ($ukm->beritas as $berita)
                                <img src="{{ $berita->gambar ? asset('storage/' . $berita->gambar) : asset('feather/image.svg') }}" alt="News" class="object-cover w-full h-full zoom-on-hover">
                                @endforeach
                            </div>
                        </div>
                        <a href="{{ route('sikm.ukm', ['id' => $ukm->id]) }}" class="flex items-center justify-center col-span-3 font-bold text-center font-poppins">{{ $ukm->name }}</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
@endsection