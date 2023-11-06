<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | ADMIN</title>
    <!-- Tambahkan link ke Google Fonts untuk Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
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
        @auth
        <form method="POST" action="{{ route('logout') }}" class="mr-4">
            @csrf
            <button type="submit" class="text-white">Logout</button>
        </form>
        @endauth
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
                    <td class="px-4 py-2 text-center border">{{ $loop->iteration }}</td>
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
                    <th class="px-4 py-2 text-center border">Nama Editor</th>
                    <th class="px-4 py-2 text-center border">Detail</th>
                    <th class="px-4 py-2 text-center border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="bg-stone-100">
                    <td class="px-4 py-2 text-center border">
                        @if ($user->ukm)
                            {{ $loop->iteration }}
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
                            {{ $user->name }}
                        @endif
                    </td>
                    <td class="px-4 py-2 text-center border">
                        @if ($user->ukm)
                            <button type="button" class="px-4 py-2 font-bold text-white bg-green-500 rounded hover:bg-green-700">
                                Detail
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
</script>
</html>
