@extends('layout.template')
@section('title','Tambah Kategori')
@section('content')
    <div class="overflow-x-auto px-10">
        <h1 class="text-lg text-center font-semibold">@yield('title')</h1>
        <form action="/tambah-data" method="post">
            @csrf
            <div>
                <label for="price" class="block text-sm/6 font-medium text-gray-900">Nama Kategori</label>
                <div class="mt-2">
                    <div
                        class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                        <input type="text" name="nama_kategori" id="price"
                            class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                            placeholder="0.00">
                        <div class="grid shrink-0 grid-cols-1 focus-within:relative">
                        </div>
                    </div>
                </div>
                <div class="mt-5">
                    <a href="/kategori" class="px-2 py-2 bg-slate-200 rounded-lg text-slate-900 my-2 inline-block">Kembali</a>
                    <button type="sumbit" class="px-2 py-2 bg-blue-600 rounded-lg text-white my-2">Simpan</button>
                </div>
            </div>
        </form>
    </div>
@endsection
