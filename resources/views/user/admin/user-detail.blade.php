<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body >
    @can('admin')
    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full p-4 bg-white rounded-lg shadow-md sm:max-w-md">
            <div class="flex items-center justify-between">
                <h1 class="text-2xl font-semibold">Detail Pengguna</h1>
                <a href="javascript:history.back();" class="text-blue-600 dark:text-blue-500 hover:underline">Kembali</a>
            </div>            
            <div class="p-4 bg-gray-100 rounded-md shadow-md">
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-1">
                        <img class="w-20 h-20 mx-auto rounded-full" src="{{ asset('storage/' . $users->avatar) }}" alt="User Photo">
                    </div>
                    <div class="col-span-1">
                        <table class="w-full">
                            <tr>
                                <th class="text-left">Nama:</th>
                                <td>{{ $users->name }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">Email:</th>
                                <td>{{ $users->email }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">No Hp:</th>
                                <td>{{ $users->numberphone }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endcan
</body>
</html>