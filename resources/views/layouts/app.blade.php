{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ScholarLink</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-br from-slate-950 via-blue-950 to-slate-900 min-h-screen text-white relative">

    <nav class="w-full border-b border-white/10 backdrop-blur-xl bg-slate-950/80 sticky top-0 px-6 py-4 flex items-center justify-between z-[100]">
        <div class="max-w-7xl mx-auto w-full flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-extrabold text-blue-400">
                    <a href="{{ route('scholarship.index') }}">🎓 ScholarLink</a>
                </h1>
            </div>

            <div class="hidden md:flex gap-8 text-gray-300 font-medium">
                <a href="#" class="hover:text-blue-400 transition">Home</a>
                <a href="{{ route('scholarship.index') }}" class="hover:text-blue-400 transition">Beasiswa</a>
                <a href="{{ route('kategori.index') }}" class="hover:text-blue-400 transition">Kategori</a>
                {{-- <a href="#" class="hover:text-blue-400 transition">Tentang</a> --}}
            </div>

            <button class="bg-blue-500 hover:bg-blue-600 px-5 py-2 rounded-xl font-semibold transition shadow-lg shadow-blue-500/30">
                Login
            </button>
        </div>
    </nav>

    <main class="relative z-0">
        @yield('content')
    </main>

</body>
</html>
