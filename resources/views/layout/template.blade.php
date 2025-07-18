<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>
    <nav class="bg-white border-b border-gray-200 px-4 py-3">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="text-xl font-semibold text-gray-800">Logo</div>

            <div class="hidden md:flex space-x-6">
            @if(Auth::user()->role === 'admin')
                <a href="/kategori" class="text-gray-700 hover:text-blue-600">Kategori</a>
                <a href="/books" class="text-gray-700 hover:text-blue-600">Buku</a>
                <a href="/users" class="text-gray-700 hover:text-blue-600">Users</a>
                <a href="/logout" class="text-gray-700 hover:text-blue-600">Logout</a>
            @elseif(Auth::user()->role === 'pengguna')
                <a href="/books" class="text-gray-700 hover:text-blue-600">Buku</a>
                <a href="/logout" class="text-gray-700 hover:text-blue-600">Logout</a>
            @endif
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="menu-toggle" class="text-gray-700 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden mt-2 space-y-2 px-4">
            @if(Auth::user()->role === 'admin')
            <a href="/kategori" class="block text-gray-700 hover:text-blue-600">Kategori</a>
            <a href="/books" class="block  text-gray-700 hover:text-blue-600">Buku</a>
            <a href="/users" class="block  text-gray-700 hover:text-blue-600">Users</a>
            <a href="/logout" class="block text-gray-700 hover:text-blue-600">Logout</a>
            @elseif(Auth::user()->role === 'pengguna')
            <a href="/books" class="block  text-gray-700 hover:text-blue-600">Buku</a>
                <a href="/logout" class="text-gray-700 hover:text-blue-600">Logout</a>
            @endif
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    
    <script>
        const toggle = document.getElementById('menu-toggle');
        const menu = document.getElementById('mobile-menu');

        toggle.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>
</body>

</html>