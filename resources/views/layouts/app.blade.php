<!DOCTYPE html>
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
                <a href="#" class="hover:text-blue-400 transition">Tentang</a>
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