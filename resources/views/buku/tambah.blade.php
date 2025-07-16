@extends('layout.template')
@section('title','Tambah Buku')
@section('content')
    <div class="overflow-x-auto px-10">
        <h1 class="text-lg text-center font-semibold mt-3 mb-3">@yield('title')</h1>
        <form action="/post-tambah-buku" method="post" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Kolom 1 -->
                <div>
                    <label for="nama_kategori" class="block text-sm font-medium text-gray-900">Nama Kategori</label>
                    <div class="mt-2">
                        <div
                            class="flex items-center rounded-md bg-white pl-3 ring-1 ring-gray-300 focus-within:ring-2 focus-within:ring-indigo-600">
                            <select name="id_kategori" id="nama_kategori"
                                class="block w-full py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($kategori as $val)
                                    <option value="{{ $val->id_kategori }}">{{ $val->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="judul" class="block text-sm font-medium text-gray-900">Judul Buku</label>
                    <div class="mt-2">
                        <div
                            class="flex items-center rounded-md bg-white pl-3 ring-1 ring-gray-300 focus-within:ring-2 focus-within:ring-indigo-600">
                            <input type="text" name="judul" id="judul"
                                class="block w-full py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm">
                        </div>
                    </div>
                </div>

                <div>
                    <label for="penulis" class="block text-sm font-medium text-gray-900">Penulis</label>
                    <div class="mt-2">
                        <div
                            class="flex items-center rounded-md bg-white pl-3 ring-1 ring-gray-300 focus-within:ring-2 focus-within:ring-indigo-600">
                            <input type="text" name="penulis" id="penulis"
                                class="block w-full py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm">
                        </div>
                    </div>
                </div>

                <div>
                    <label for="tahun_terbit" class="block text-sm font-medium text-gray-900">Tahun Terbit</label>
                    <div class="mt-2">
                        <div
                            class="flex items-center rounded-md bg-white pl-3 ring-1 ring-gray-300 focus-within:ring-2 focus-within:ring-indigo-600">
                            <input type="date" name="tahun_terbit" id="tahun_terbit"
                                class="block w-full py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm">
                        </div>
                    </div>
                </div>

                <div>
                    <label for="jumlah_halaman" class="block text-sm font-medium text-gray-900">Jumlah Halaman</label>
                    <div class="mt-2">
                        <div
                            class="flex items-center rounded-md bg-white pl-3 ring-1 ring-gray-300 focus-within:ring-2 focus-within:ring-indigo-600">
                            <input type="number" name="jumlah_halaman" id="jumlah_halaman"
                                class="block w-full py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm">
                        </div>
                    </div>
                </div>

                <div>
                    <label for="cover" class="block text-sm font-medium text-gray-900">Cover</label>
                    <div class="mt-2">
                        <div
                            class="flex items-center rounded-md bg-white pl-3 ring-1 ring-gray-300 focus-within:ring-2 focus-within:ring-indigo-600">
                            <input type="file" name="cover" id="cover"
                                class="block w-full py-1.5 pr-3 pl-1 text-base text-gray-900 focus:outline-none sm:text-sm">
                        </div>
                    </div>
                </div>

                <!-- Abstrak (full width) -->
                <div class="md:col-span-2">
                    <label for="abstrak" class="block text-sm font-medium text-gray-900">Abstrak</label>
                    <div class="mt-2">
                        <div
                            class="flex rounded-md bg-white pl-3 ring-1 ring-gray-300 focus-within:ring-2 focus-within:ring-indigo-600">
                            <textarea name="abstrak" id="abstrak" rows="4"
                                class="block w-full resize-none py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Tombol aksi (full width) -->
                <div class="md:col-span-2 mt-4">
                    <a href="/kategori"
                        class="px-4 py-2 bg-slate-200 rounded-lg text-slate-900 inline-block mr-3">Kembali</a>
                    <button type="submit" class="px-4 py-2 bg-blue-600 rounded-lg text-white">Simpan</button>
                </div>
            </div>
        </form>
    </div>
@endsection
