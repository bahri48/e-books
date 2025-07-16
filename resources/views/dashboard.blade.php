@extends('layout.master')

@section('content')
    @auth
        @php
            $role = Auth::user()->role;
        @endphp

        @if($role === 'admin')
            <p class="text-center">Selamat datang <strong>Admin</strong></p>

        @elseif($role === 'pengguna')
            <p class="text-center">Selamat datang <strong>Pengguna</strong></p>

        @else
            <p class="text-center text-red-600">
                403 - Anda tidak memiliki akses. Silakan <a href="/register" class="text-blue-600 underline">register</a> untuk menggunakan website ini.
            </p>
        @endif
    @else
        <p class="text-center text-red-600">
            Anda belum login. Silakan <a href="/login" class="text-blue-600 underline">login</a> terlebih dahulu.
        </p>
    @endauth
@endsection
