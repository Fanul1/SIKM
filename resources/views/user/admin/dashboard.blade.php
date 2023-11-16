<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | ADMIN</title>
    <!-- Tambahkan link ke Google Fonts untuk Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.css" rel="stylesheet" />
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

<body class="bg-gray-100">
    <nav class="flex justify-between p-4 bg-blue-900">
        <h2 class="text-3xl font-bold text-white pl-7">ADMINISTRATOR</h2>
        <div class="flex items-center ml-3">
            <div>
                <button type="button"
                    class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    aria-expanded="false" data-dropdown-toggle="dropdown-user">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-10 h-10 bg-white rounded-full" src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : asset('feather/user.svg') }}" alt="user photo">
                </button>
            </div>
            <div
                class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                id="dropdown-user">
                <div class="px-4 py-3" role="none">
                    <p class="text-sm text-gray-900 dark:text-white" role="none">
                        {{ auth()->user()->name }}
                    </p>
                    <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                        {{ auth()->user()->email }}
                    </p>
                    <a href="/" class="text-black">Beranda</a>
                </div>
                <ul class="py-1" role="none">
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="flex items-center px-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
                                role="menuitem">
                                <img src="feather/log-out.svg" class="w-5 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" alt="Profil Icon" aria-hidden="true">
                                <span class="flex-1 ml-3 whitespace-nowrap">Log Out</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>

    </nav>
    <div class="container mx-auto mt-6">
        <span class="text-2xl font-medium">Dashboard</span>
        <span class="text-xl font-normal text-stone-400">Admin SIKM</span>
    </div>
    <div class="container mx-auto mt-6 bg-green-200 ">
        <p class="text-base font-normal text-green-800 rounded-sm">Selamat Datang Di Dashboard ADMIN SIKM</p>
    </div>
    <div class="container mx-auto mt-6">
        <p class="p-1 font-medium text-center bg-blue-500 rounded-sm">DAFTAR USER</p>
        <table
            class="w-full bg-white border border-gray-300 rounded shadow-md table-auto caption-top hover:caption-bottom">
            <thead>
                <tr style="color: white" class="bg-black">
                    <th class="px-4 py-2 text-center border">No</th>
                    <th class="px-4 py-2 text-center border">Nama</th>
                    <th class="px-4 py-2 text-center border">Email</th>
                    <th class="px-4 py-2 text-center border">Detail</th>
                    <th class="px-4 py-2 text-center border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="bg-stone-100">
                    <td class="px-4 py-2 text-center border">{{ $users->firstItem() + $loop->iteration - 1 }}</td>
                    <td class="px-4 py-2 text-center border">{{ $user->name }}</td>
                    <td class="px-4 py-2 text-center border">{{ $user->email }}</td>
                    <td class="px-4 py-2 text-center border">
                        <a href="{{url ("/dashboard/$user->name")}}" class="px-4 py-2 text-white bg-green-600 rounded-xl">Detail</a>
                    </td>
                    <td class="px-4 py-2 text-center border">
                        <div class="flex justify-center">
                            @if ($user->role === '0')
                            <form method="POST" action="{{ url("/dashboard/$user->name/valid") }}">
                                @csrf @method('PUT')
                                <button class="px-4 py-2 mr-2 font-bold text-white bg-blue-900 rounded hover:bg-blue-700">Validasi</button>
                            </form>
                            @endif
                            <form action="{{ url('/dashboard/' . $user->name) }}" method="POST">
                                @csrf @method('DELETE')
                                <button class="px-4 py-2 font-bold text-white bg-red-500 rounded hover:bg-red-700">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Pagination -->
        <div class="flex items-center justify-between px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
            <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                <!-- Pagination Information -->
                <div>
                    <p class="text-sm text-gray-700">
                        Showing
                        <span class="font-medium">{{ $users->firstItem() }}</span>
                        to
                        <span class="font-medium">{{ $users->lastItem() }}</span>
                        of
                        <span class="font-medium">{{ $users->total() }}</span>
                        results
                    </p>
                </div>

                <!-- Pagination Links -->
                <div class="flex items-center">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
    <div class="container mx-auto mt-6">
        <p class="p-1 font-medium text-center bg-blue-500 rounded-sm">DAFTAR EDITOR</p>
        <table
            class="w-full bg-white border border-gray-300 rounded shadow-md table-auto caption-top hover:caption-bottom">
            <thead>
                <tr style="color: white" class="bg-black">
                    <th class="px-4 py-2 text-center border">No</th>
                    <th class="px-4 py-2 text-center border">Nama</th>
                    <th class="px-4 py-2 text-center border">Email</th>
                    <th class="px-4 py-2 text-center border">UKM</th>
                    <th class="px-4 py-2 text-center border">Role</th>
                    <th class="px-4 py-2 text-center border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                $count = 1;
                @endphp
                @foreach ($users as $user)
                @if($user->role === '2'|| $user->role === '3')
                <tr class="bg-stone-100">
                    <td class="px-4 py-2 text-center border">{{ $count++}}</td>
                    <td class="px-4 py-2 text-center border">{{ $user->name }}</td>
                    <td class="px-4 py-2 text-center border">{{ $user->email }}</td>
                    <td class="px-4 py-2 text-center border">
                        @if($user->ukm)
                            {{ $user->ukm->name }} <!-- Menampilkan nama UKM jika ada -->
                        @else
                            Belum memiliki UKM <!-- Menampilkan pesan jika tidak memiliki UKM -->
                        @endif
                    </td>
                    <td class="px-4 py-2 text-center border">Editor</td>
                    <td class="px-4 py-2 text-center border">
                        <form action="{{ route('deleteEditor', $user->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 font-bold text-white bg-red-500 rounded hover:bg-red-700">Hapus</button>
                        </form>
                        @if ($user->role === '2')
                        <form action="{{ route('suspendEditor', $user->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="px-4 py-2 ml-3 font-bold text-white bg-yellow-500 rounded hover:bg-yellow-700">Cabut Izin</button>
                        </form>
                        @endif
                        @if($user->role === '3')
                        <form action="{{ route('unsuspendEditor', $user->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="px-4 py-2 font-bold text-white bg-green-500 rounded hover.bg-green-700 ml-3">Bebaskan</button>
                        </form> 
                        @endif                   
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
            <!-- Pagination -->

    </div>
    <div class="container mx-auto mt-6">
        <p class="p-1 font-medium text-center bg-blue-500 rounded-sm">DAFTAR UNIT KEGIATAN MAHASISWA</p>
        <table
            class="w-full bg-white border border-gray-300 rounded shadow-md table-auto caption-top hover:caption-bottom">
            <thead>
                <tr style="color: white" class="bg-black">
                    <th class="px-4 py-2 text-center border">No</th>
                    <th class="px-4 py-2 text-center border">Nama UKM</th>
                    <th class="px-4 py-2 text-center border">Kontak UKM</th>
                    <th class="px-4 py-2 text-center border">Status UKM</th>
                    <th class="px-4 py-2 text-center border">Nama Editor</th>
                    <th class="px-4 py-2 text-center border">Detail</th>
                    <th class="px-4 py-2 text-center border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                $counts = 1;
                @endphp
                @foreach ($users as $user)
                @if ($user->ukm)
                <tr class="bg-stone-100">
                    <td class="px-4 py-2 text-center border">
                        @if ($user->ukm)
                            {{ $counts++ }}
                        @endif
                    </td>
                    <td class="px-4 py-2 text-center border">
                        @if ($user->ukm)
                            {{ $user->ukm->name }}
                        @endif
                    </td>
                    <td class="px-4 py-2 text-center border">
                        @if ($user->ukm)
                            {{ $user->ukm->phone_number }}
                        @endif
                    </td>
                    <td class="px-4 py-2 text-center border">
                        @if ($user->ukm)
                            {{ $user->ukm->status }}
                        @endif
                    </td>
                    <td class="px-4 py-2 text-center border">
                        @if ($user->ukm)
                            {{ $user->name }}
                        @endif
                    </td>
                    <td class="px-4 py-2 text-center border">
                        @if ($user->ukm)
                            <button type="button" class="px-4 py-2 font-bold text-white bg-green-500 rounded hover:bg-green-700">
                                <a href="{{ route('sikm.ukm', ['id' => $user->ukm->id]) }}">Detail</a>
                            </button>
                        @endif
                    </td>
                    <td class="px-4 py-2 text-center border">
                        @if ($user->ukm)
                            <form action="{{ route('hapusukm', ['id' => $user->ukm->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 font-bold text-white bg-red-500 rounded hover:bg-red-700">
                                    Hapus
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
    <footer class="text-center bg-green-200 mt-11">
        © 2023. Made By Kelompok 9
    </footer>
</body>
<script>
    @if(session('success'))
        alert("{{ session('success') }}");
    @endif
    @if(session('error'))
        alert("{{ session('error') }}");
    @endif
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
</html>
