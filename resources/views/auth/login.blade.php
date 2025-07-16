@extends('layout.template')
@section('content')
<div class="mx-auto mt-24 bg-slate-100 rounded shadow-md w-full max-w-sm p-6">
    <p class="text-center text-xl font-bold mb-6">
        {{ $title ?? 'Form Login' }}
    </p>

    <form action="/login-post" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" required
                class="mt-1 w-full px-3 py-2 border border-gray-300 rounded shadow-sm focus:outline-none focus:ring focus:border-blue-300" />
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" name="password" id="password" required
                class="mt-1 w-full px-3 py-2 border border-gray-300 rounded shadow-sm focus:outline-none focus:ring focus:border-blue-300" />
        </div>
        <div>
            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition duration-200">
                Login
            </button>
        </div>
        <div class="mt-4 text-center">
            <a href="/register" class="text-blue-600 hover:text-blue-700 text-sm">
                Belum punya akun? Register
            </a>
        </div>
    </form>
</div>
@endsection