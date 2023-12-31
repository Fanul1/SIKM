@extends('user.editor.layouts.main')

@section('title')
    EDITOR | BERITA-UKM
@endsection

@section('content')
    <div class="mt-5">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Tambah Berita</h2>
        <h6 class="text-gray-900 dark:text-white text-end">Semua wajib diisi</h6>
        <hr>
        <form action="/addberitaukm" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-4">
                <label for="judul" class="block text-sm font-medium text-gray-900 dark:text-white">Judul Berita</label>
                <input type="text" name="judul" id="judul" class="block w-full mt-1 text-gray-900 border-gray-300 rounded-md shadow-sm dark:text-white" required>
            </div>
            <div class="mt-4">
                <label for="category" class="block text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                <select id="category" name="category" class="block w-full mt-1 text-gray-900 border-gray-300 rounded-md shadow-sm dark:text-white">
                    <option selected="">Pilih kategori</option>
                    <option value="Keagamaan">Keagamaan</option>
                    <option value="Olahraga">Olahraga</option>
                    <option value="Akademik">Akademik</option>
                    <option value="Kesenian">Kesenian</option>
                </select>
            </div>
            <div class="mt-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="4" class="block w-full mt-1 text-gray-900 border-gray-300 rounded-md shadow-sm dark:text-white" required></textarea>
            </div>
            <div class="mt-4">
                <label for="gambar" class="block text-sm font-medium text-gray-900 dark:text-white">Gambar</label>
                <div id="imageInputs">
                    <div class="flex items-center">
                        <input type="file" name="gambar[]" class="block w-full mt-1 text-gray-900 border-gray-300 shadow-sm dark:text-white" required>
                        <button type="button" onclick="addImageInput()" class="px-2 py-1 ml-2 text-black bg-blue-500 rounded-lg" id="addButton">+</button>
                        <button type="button" onclick="removeImageInput()" class="px-2 py-1 ml-2 text-black bg-blue-500 rounded-lg" id="removeButton" style="display: none;">-</button>
                    </div>
                </div>
            </div>      
            <div class="mt-4">
                <label for="tanggal" class="block text-sm font-medium text-gray-900 dark:text-white">Tanggal Posting</label>
                <input type="date" name="tanggal" id="tanggal" class="block w-full mt-1 text-gray-900 border-gray-300 rounded-md shadow-sm dark:text-white" required>
            </div>
            <div class="mt-6">
                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Tambah</button>
            </div>
        </form>
    </div>
    
    <div class="relative my-8 overflow-x-auto shadow-md sm:rounded-lg">
        <p>List berita</p>
        <table id="beritaTable" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center">No</th>
                    <th scope="col" class="px-6 py-3 text-center">Judul Berita</th>
                    <th scope="col" class="px-10 py-3 text-center">Tanggal Upload</th>
                    <th scope="col" class="px-6 py-3 text-center">Kategori</th>
                    <th scope="col" class="px-6 py-3 text-center">Status</th>
                    <th scope="col" class="px-6 py-3 text-center">Detail</th>
                    <th scope="col" class="px-6 py-3 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($beritas as $berita)
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
                        {{ $berita->status }}
                    </td>
                    <td class="px-6 py-4">
                        <button type="button" class="px-3 py-2 font-medium text-white bg-green-800 rounded-md dark:text-blue-500 hover:underline">
                            <a href="{{ route('berita.detail', ['id' => $berita->id]) }}">Detail</a>
                        </button>
                    </td>
                    <td class="flex items-center px-6 py-4">
                        <button type="button" class="px-3 py-2 ml-2 font-medium text-white bg-yellow-800 rounded-md dark:text-yellow-500 hover:underline">
                            <a href="{{ route('berita.edit', ['id' => $berita->id]) }}">Edit</a>
                        </button>
                        <form action="{{ route('berita.delete', ['id' => $berita->id]) }}" method="POST" class="ml-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-2 font-medium text-white bg-red-800 rounded-md dark:text-red-500 hover:underline">Hapus</button>
                        </form>
                        <form action="{{ route('berita.toggle-status', ['id' => $berita->id]) }}" method="POST" class="ml-2">
                            @csrf
                            <button type="submit" class="px-3 py-2 font-medium text-white bg-blue-800 rounded-md dark:text-blue-500 hover:underline">
                                {{ $berita->status === 'Pending' || $berita->status === 'Belum Dipublish' ? 'Posting' : 'Tarik' }}
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <button onclick="goBack()" class="fixed px-4 py-2 text-white bg-blue-500 rounded-full bottom-4 right-4">Kembali</button>
@endsection