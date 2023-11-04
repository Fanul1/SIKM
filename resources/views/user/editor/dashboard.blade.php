@extends('user.editor.layouts.main')
@section('title')
    EDITOR | DASHBOARD
@endsection
@section('content')
    <div class="flex items-center justify-between">
        Selamat Datang {{ auth()->user()->name }} di Dashboard Anda
        @can('editor')
            , Anda telah tervalidasi sebagai editor
        @endcan
        <button data-modal-target="editakun-modal" data-modal-toggle="editakun-modal"
            class="flex items-center text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-md text-sm px-3 py-1.5 text-center dark:bg-green-600 dark:hover-bg-green-700 dark:focus:ring-green-800" type="button">
            <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 18">
                <path d="M6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9Zm-1.391 7.361.707-3.535a3 3 0 0 1 .82-1.533L7.929 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h4.259a2.975 2.975 0 0 1-.15-1.639ZM8.05 17.95a1 1 0 0 1-.981-1.2l.708-3.536a1 1 0 0 1 .274-.511l6.363-6.364a3.007 3.007 0 0 1 4.243 0 3.007 3.007 0 0 1 0 4.243l-6.365 6.363a1 1 0 0 1-.511.274l-3.536.708a1.07 1.07 0 0 1-.195.023Z" />
            </svg>
            <span class="pl-2">Edit Akun</span>
        </button>
    </div>
    @include('user.editor.updprof')
    <!-- modal edit akun -->
    @can('editor')
    <section class="bg-white dark:bg-gray-900">
        <div class="max-w-6xl px-1 py-8 mx-auto lg:py-8">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Membuat Template UKM</h2>
            <form action="#">
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                            UKM</label>
                        <input type="text" name="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Ketik nama UKM" {{-- required="" --}}>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukkan Alamat Email" {{-- required="" --}}>
                    </div>
                    <div>
                        <label for="category"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                        <select id="category"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Pilih kategori</option>
                            <option value="AG">Keagamaan</option>
                            <option value="OL">Olahraga</option>
                            <option value="AK">Akademik</option>
                        </select>
                    </div>
                    <div>
                        <label for="number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kontak
                            Telpon/WA (+62)</label>
                        <input type="number" name="number" id="number"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Nomor" {{-- required="" --}}>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="description"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                        <textarea id="description" rows="2"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Alamat Sekretariat kantor"></textarea>
                    </div>
                </div>
                <button type="submit" data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                    class="bg-green-800 inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Buat
                </button>
                <div id="popup-modal" tabindex="-1"
                    class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button"
                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="popup-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="p-6 text-center">
                                <svg class="w-12 h-12 mx-auto mb-4 text-gray-400 dark:text-gray-200" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apa kamu yakin?</h3>
                                <button data-modal-hide="popup-modal" type="button"
                                    class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                    Konfirmasi
                                </button>
                                <button data-modal-hide="popup-modal" type="button"
                                    class="text-white bg-red-400 hover:bg-red-100 focus:ring-4 focus:outline-none focus:ring-red-200 rounded-lg border border-red-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Batal</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div id="delete-modal" tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="popup-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-6 text-center">
                        <svg class="w-12 h-12 mx-auto mb-4 text-gray-400 dark:text-gray-200" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah kamu yakin menghapus
                            UKM ini?</h3>
                        <button data-modal-hide="delete-modal" type="button"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            Konfirmasi
                        </button>
                        <button data-modal-hide="delete-modal" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Batal</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endcan
@endsection
