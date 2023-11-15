@extends('layouts.navigation')

@section('title', 'SIKM - SEARCH')

@section('content')
<div class="container mx-auto">
    @if ($ukms->count() > 0 || $beritas->count() > 0)
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama UKM
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kategori
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kontak
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Detail
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ukms as $ukm)
                    @if ($ukm->status === 'Dipublikasi')
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $ukm->name }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $ukm->email }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $ukm->category }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $ukm->phone_number }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('sikm.ukm', ['id' => $ukm->id]) }}" class="px-3 py-2 font-medium text-white bg-blue-800 rounded-md dark:text-blue-500 hover:underline">
                                    Detail
                                </a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        <table class="w-full mt-6 text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center">No</th>
                    <th scope="col" class="px-6 py-3 text-center">Judul Berita</th>
                    <th scope="col" class="px-10 py-3 text-center">Tanggal Upload</th>
                    <th scope="col" class="px-6 py-3 text-center">Kategori</th>
                    <th scope="col" class="px-6 py-3 text-center">Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($beritas as $berita)
                    @if ($berita->status === 'Dipublikasi')
                        <tr class="text-center bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $berita->judul }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $berita->tanggal }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $berita->category }}
                            </td>
                            <td class="px-6 py-4">
                                <button type="button" class="px-3 py-2 font-medium text-white bg-green-800 rounded-md dark:text-blue-500 hover:underline">
                                    <a href="{{ route('sikm.berita', ['id' => $berita->id]) }}">Detail</a>
                                </button>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    @else
        <p class="my-8 text-xl font-bold text-center">Hasil pencarian Anda tidak ada.</p>
    @endif
</div>
@endsection