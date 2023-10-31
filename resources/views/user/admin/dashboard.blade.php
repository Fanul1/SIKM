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
    <nav class="p-4 bg-blue-900">
        <h2 class="text-3xl font-bold text-white pl-7">ADMINISTRATOR</h2>
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
                    <th class="px-4 py-2 text-center border">Kata Sandi</th>
                    <th class="px-4 py-2 text-center border">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-stone-100">
                    <td class="px-4 py-2 text-center border">1</td>
                    <td class="px-4 py-2 text-center border">Fanul</td>
                    <td class="px-4 py-2 text-center border">fanul@gmail.com</td>
                    <td class="px-4 py-2 text-center border">1234</td>
                    <td class="px-4 py-2 text-center border">
                        <button
                            class="px-4 py-2 mr-2 font-bold text-white bg-blue-900 rounded hover:bg-blue-700">Validasi</button>
                        <button
                            class="px-4 py-2 font-bold text-white bg-red-500 rounded hover:bg-red-700">Hapus</button>
                    </td>
                </tr>
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
                    <th class="px-4 py-2 text-center border">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-stone-100">
                    <td class="px-4 py-2 text-center border">1</td>
                    <td class="px-4 py-2 text-center border">Fanul</td>
                    <td class="px-4 py-2 text-center border">fanul@gmail.com</td>
                    <td class="px-4 py-2 text-center border">Badminton</td>
                    <td class="px-4 py-2 text-center border">Editor</td>
                    <td class="px-4 py-2 text-center border">
                        <button
                            class="px-4 py-2 font-bold text-white bg-red-500 rounded hover:bg-red-700">Hapus</button>
                    </td>
                </tr>
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
                    <th class="px-4 py-2 text-center border">Kontak</th>
                    <th class="px-4 py-2 text-center border">Nama Editor</th>
                    <th class="px-4 py-2 text-center border">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-stone-100">
                    <td class="px-4 py-2 text-center border">1</td>
                    <td class="px-4 py-2 text-center border">Badminton</td>
                    <td class="px-4 py-2 text-center border">0899913111</td>
                    <td class="px-4 py-2 text-center border">Fanul</td>
                    <td class="px-4 py-2 text-center border">
                        <button
                            class="px-4 py-2 font-bold text-white bg-red-500 rounded hover:bg-red-700">Hapus</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <footer class="text-center bg-green-200 mt-11">
        © 2023. Made By Kelompok 9
    </footer>
</body>

</html>
