@extends('user.editor.layouts.main')
@section('title')
    EDITOR | KONTAK-UKM
@endsection

@section('content')
    <div class="mt-5">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Kontak UKM</h2>
        <form action="{{ route('updatekontakukm') }}" method="POST">
            @csrf
            @method('PUT') <!-- Gunakan PUT method untuk mengirim data perubahan -->
            <div class="mt-4">
                <label for="number_phone" class="block text-sm font-medium text-gray-900 dark:text-white">Narahubung</label>
                <input type="number" name="number_phone" id="number_phone" class="block w-full px-4 py-2 text-gray-900 border border-gray-300 rounded-lg dark:text-white bg-gray-50 dark:bg-gray-700 dark:border-gray-600 focus:ring-primary-600 focus:border-primary-600 focus:outline-none" placeholder="Kontak No HP" required value="{{ $ukm->phone_number }}">
            </div>
            <div class="mt-4">
                <label for="email" class="block text-sm font-medium text-gray-900 dark:text-white">Email UKM</label>
                <input type="email" name="email" id="email" class="block w-full px-4 py-2 text-gray-900 border border-gray-300 rounded-lg dark:text-white bg-gray-50 dark:bg-gray-700 dark:border-gray-600 focus:ring-primary-600 focus:border-primary-600 focus:outline-none" placeholder="Email UKM" required value="{{ $ukm->email }}">
            </div>
            <div class="mt-4">
                <label for="nama_ketua" class="block text-sm font-medium text-gray-900 dark:text-white">Nama Ketua UKM</label>
                <input type="text" name="nama_ketua" id="nama_ketua" class="block w-full px-4 py-2 text-gray-900 border border-gray-300 rounded-lg dark:text-white bg-gray-50 dark:bg-gray-700 dark:border-gray-600 focus:ring-primary-600 focus:border-primary-600 focus:outline-none" placeholder="Nama Ketua UKM" required value="{{ $ukm->name_ketua }}">
            </div>
            <div class="mt-4">
                <label for="instagram" class="block text-sm font-medium text-gray-900 dark:text-white">Instagram Account</label>
                <input type="text" name="instagram" id="instagram" class="block w-full px-4 py-2 text-gray-900 border border-gray-300 rounded-lg dark:text-white bg-gray-50 dark:bg-gray-700 dark:border-gray-600 focus:ring-primary-600 focus:border-primary-600 focus:outline-none" placeholder="Instagram Account" value="{{ $ukm->instagram }}">
            </div>
            <div class="mt-4">
                <label for="youtube" class="block text-sm font-medium text-gray-900 dark:text-white">YouTube Account</label>
                <input type="text" name="youtube" id="youtube" class="block w-full px-4 py-2 text-gray-900 border border-gray-300 rounded-lg dark:text-white bg-gray-50 dark:bg-gray-700 dark:border-gray-600 focus:ring-primary-600 focus:border-primary-600 focus:outline-none" placeholder="YouTube Account" value="{{ $ukm->youtube }}">
            </div>
            <div class="mt-4">
                <label for="facebook" class="block text-sm font-medium text-gray-900 dark:text-white">Facebook Account</label>
                <input type="text" name="facebook" id="facebook" class="block w-full px-4 py-2 text-gray-900 border border-gray-300 rounded-lg dark:text-white bg-gray-50 dark:bg-gray-700 dark:border-gray-600 focus:ring-primary-600 focus:border-primary-600 focus:outline-none" placeholder="Facebook Account" value="{{ $ukm->youtube }}">
            </div>
            <div class="mt-4">
                <label for="twitter" class="block text-sm font-medium text-gray-900 dark:text-white">Twitter Account</label>
                <input type="text" name="twitter" id="twitter" class="block w-full px-4 py-2 text-gray-900 border border-gray-300 rounded-lg dark:text-white bg-gray-50 dark:bg-gray-700 dark:border-gray-600 focus:ring-primary-600 focus:border-primary-600 focus:outline-none" placeholder="Twitter Account" value="{{ $ukm->youtube }}">
            </div>
            <div class="mt-6">
                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:ring-green-200 focus:outline-none">Simpan</button>
            </div>
        </form>        
    </div>
@endsection
