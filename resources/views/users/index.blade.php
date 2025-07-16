@extends('layout.template')
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
        <h1 class="text-lg text-center font-semibold">{{$title}}</h1>
        <a href="/view-add" class="px-2 py-2 bg-blue-600 rounded-lg text-white my-2 inline-block">
            Tambah
        </a>

        <table class="min-w-full table-auto border border-slate-400">
            <thead class="bg-slate-100">
                <tr>
                    <th class="px-4 py-2 text-left border border-slate-400">No</th>
                    <th class="px-4 py-2 text-left border border-slate-400">Username</th>
                    <th class="px-4 py-2 text-left border border-slate-400">Email</th>
                    <th class="px-4 py-2 text-left border border-slate-400">Role</th>
                    <th class="px-4 py-2 text-left border border-slate-400">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($data as $index => $row)
                    <tr class="border border-slate-400">
                        <td class="px-4 py-2 border border-slate-400">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 border border-slate-400">{{ $row->name }}</td>
                        <td class="px-4 py-2 border border-slate-400">{{ $row->email }}</td>
                        <td class="px-4 py-2 border border-slate-400">{{ $row->role }}</td>
                        <td class="px-4 py-2 border border-slate-400">
                            <a href="view-update/{{ $row->id }}" class="text-blue-500 hover:underline">Edit</a> |
                            <a href="delete-user/{{ $row->id }}" class="text-red-500 hover:underline">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection