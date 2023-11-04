@extends('layouts.navigation')

@section('content')
@if(auth()->check() && auth()->user()->role === 1)
    <div class="p-4 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold">Detail Pengguna</h1>
        <table class="w-full mt-4">
            <tr>
                <th class="w-1/4">Nama</th>
                <td>{{ $users->name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $users->email }}</td>
            </tr>
            <tr>
                <th>No Hp</th>
                <td>{{ $users->numberphone }}</td>
            </tr>
            <tr>
                <th>Foto Profil</th>
                <td><img class="w-36 h-36" src="{{ asset('storage/' . $users->avatar) }}" alt=""></td>
            </tr>
        </table>
    </div>
@endif
@endsection
