@extends('layout.template')
@section('content')
    <div class="overflow-x-auto px-10">
        <h1 class="text-lg text-center font-semibold mt-3 mb-3">{{$title}}</h1>
        <form action="/post-update" method="post" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <input type="hidden" name="id" id="id" value="{{$user->id}}"/>
                    <label for="name" class="block text-sm font-medium text-gray-900">Username</label>
                    <div class="mt-2">
                        <div
                            class="flex items-center rounded-md bg-white pl-3 ring-1 ring-gray-300 focus-within:ring-2 focus-within:ring-indigo-600">
                            <input type="text" name="name" id="name" value="{{$user->name}}"
                                class="block w-full py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm">
                        </div>
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-900">Email</label>
                    <div class="mt-2">
                        <div
                            class="flex items-center rounded-md bg-white pl-3 ring-1 ring-gray-300 focus-within:ring-2 focus-within:ring-indigo-600">
                            <input type="email" name="email" id="email" value="{{$user->email}}"
                                class="block w-full py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm">
                        </div>
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-900">Password (opsional)</label>
                    <div class="mt-2">
                        <div
                            class="flex items-center rounded-md bg-white pl-3 ring-1 ring-gray-300 focus-within:ring-2 focus-within:ring-indigo-600">
                            <input type="password" name="password" id="password"
                                class="block w-full py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm">
                        </div>
                    </div>
                </div>
                <div>
                    <label for="role" class="block text-sm font-medium text-gray-900">User Role</label>
                    <div class="mt-2">
                        <div
                            class="flex items-center rounded-md bg-white pl-3 ring-1 ring-gray-300 focus-within:ring-2 focus-within:ring-indigo-600">
                            <select name="role" id="role"
                                class="block w-full py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm">
                                    <option value="{{$user->role}}">{{$user->role}}</option>
                                    <option value="admin">Admin</option>
                                    <option value="pengguna">Pengguna</option>
                            </select>
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