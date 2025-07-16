@extends('layout.template')
@section('title','All Book')
@section('content')
    <div class="overflow-x-auto px-10">
        {{-- alert --}}
        @if (session('success'))
            <div id="success-alert"
                class="bg-slate-100 border border-slate-400 text-slate-700 px-4 py-3 rounded relative mt-4" role="alert">
                <strong class="font-bold">Sukses!</strong>
                <span class="block sm:inline" id="success-message">{{ session('success') }}</span>
            </div>

            <script>
                // Auto hide after 5 seconds
                setTimeout(() => {
                    const alertBox = document.getElementById('success-alert');
                    if (alertBox) {
                        alertBox.classList.add('hidden');
                    }
                }, 4000);
            </script>
        @endif
        {{-- end-alert --}}
        <h1 class="text-lg text-center font-semibold">@yield('title')</h1>
        <a href="/tambah-buku" class="px-2 py-2 bg-blue-600 rounded-lg text-white my-2 inline-block">
            Tambah
        </a>

        <table class="min-w-full table-auto border border-slate-400">
            <thead class="bg-slate-100">
                <tr>
                    <th class="px-4 py-2 text-left border border-slate-400">No</th>
                    <th class="px-4 py-2 text-left border border-slate-400">Nama Kategori</th>
                    <th class="px-4 py-2 text-left border border-slate-400">Judul</th>
                    <th class="px-4 py-2 text-left border border-slate-400">Penulis</th>
                    <th class="px-4 py-2 text-left border border-slate-400">Abstrak</th>
                    <th class="px-4 py-2 text-left border border-slate-400">Tahun Terbit</th>
                    <th class="px-4 py-2 text-left border border-slate-400">Jumlah Halaman</th>
                    <th class="px-4 py-2 text-left border border-slate-400">Cover</th>
                    <th class="px-4 py-2 text-left border border-slate-400">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($data as $index => $row)
                    <tr class="border border-slate-400">
                        <td class="px-4 py-2 border border-slate-400">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 border border-slate-400">{{ $row->JoinToKategori->nama_kategori }}</td>
                        <td class="px-4 py-2 border border-slate-400">{{ $row->judul }}</td>
                        <td class="px-4 py-2 border border-slate-400">{{ $row->penulis }}</td>
                        <td class="px-4 py-2 border border-slate-400">{{ $row->abstrak }}</td>
                        <td class="px-4 py-2 border border-slate-400">{{ $row->tahun_terbit }}</td>
                        <td class="px-4 py-2 border border-slate-400">{{ $row->jumlah_halaman }}</td>
                        <td class="px-4 py-2 border border-slate-400">
                            <img src="{{ $row->cover }}" alt="404" class="w-24 h-32 object-cover rounded">
                        </td>
                        <td class="px-4 py-2 border border-slate-400">
                            <a href="update-buku/{{ $row->id_buku }}" class="text-blue-500 hover:underline">Edit</a> |
                            <a href="delete-buku/{{ $row->id_buku }}" class="text-red-500 hover:underline">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
