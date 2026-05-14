<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ScholarLink Admin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gradient-to-br from-slate-950 via-slate-900 to-slate-950 text-white min-h-screen overflow-x-hidden">

<div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="hidden md:flex flex-col w-72 bg-slate-900/80 backdrop-blur-xl border-r border-slate-800 shadow-2xl">

        <!-- Logo -->
        <div class="px-8 py-7 border-b border-slate-800">

            <h1 class="text-4xl font-extrabold tracking-tight bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-400 bg-clip-text text-transparent">
                ScholarLink
            </h1>

            <p class="text-slate-400 text-sm mt-1">
                Admin Dashboard
            </p>

        </div>

        <!-- Navigation -->
        <nav class="flex-1 px-5 py-6 space-y-3">

            <a href="{{ route('admin.dashboard') }}"
               class="group flex items-center gap-4 px-5 py-4 rounded-2xl bg-slate-800/60 hover:bg-indigo-500/20 transition duration-300 border border-transparent hover:border-indigo-500/30">

                <span class="text-2xl group-hover:scale-110 transition">
                    📊
                </span>

                <span class="font-semibold text-lg">
                    Dashboard
                </span>

            </a>

            <a href="{{ route('admin.users.index') }}"
               class="group flex items-center gap-4 px-5 py-4 rounded-2xl hover:bg-slate-800/70 transition duration-300">

                <span class="text-2xl group-hover:scale-110 transition">
                    👥
                </span>

                <span class="font-medium text-lg">
                    Users
                </span>

            </a>

            <a href="{{ route('admin.providers.index') }}"
               class="group flex items-center gap-4 px-5 py-4 rounded-2xl hover:bg-slate-800/70 transition duration-300">

                <span class="text-2xl group-hover:scale-110 transition">
                    🏢
                </span>

                <span class="font-medium text-lg">
                    Providers
                </span>

            </a>

            <a href="{{ route('admin.scholarships.index') }}"
               class="group flex items-center gap-4 px-5 py-4 rounded-2xl hover:bg-slate-800/70 transition duration-300">

                <span class="text-2xl group-hover:scale-110 transition">
                    🎓
                </span>

                <span class="font-medium text-lg">
                    Scholarships
                </span>

            </a>

        </nav>

        <!-- User Card -->
        <div class="p-5 border-t border-slate-800">

            <div class="bg-gradient-to-r from-indigo-500/20 to-purple-500/20 border border-indigo-500/20 rounded-3xl p-5">

                <p class="text-sm text-slate-400">
                    Logged in as
                </p>

                <h3 class="font-bold text-xl mt-2">
                    {{ Auth::user()->name }}
                </h3>

                <p class="text-indigo-400 text-sm capitalize">
                    {{ Auth::user()->role }}
                </p>

            </div>

        </div>

    </aside>

    <!-- Main -->
    <div class="flex-1 flex flex-col">

        <!-- Topbar -->
        <header class="h-24 bg-slate-900/60 backdrop-blur-xl border-b border-slate-800 flex items-center justify-between px-10">

            <div>

                <h2 class="text-3xl font-bold tracking-tight">
                    Admin Panel
                </h2>

                <p class="text-slate-400 mt-1">
                    Manage ScholarLink System
                </p>

            </div>

            <div class="flex items-center gap-5">

                <div class="hidden md:block text-right">

                    <p class="font-semibold text-lg">
                        {{ Auth::user()->name }}
                    </p>

                    <p class="text-sm text-slate-400 capitalize">
                        {{ Auth::user()->role }}
                    </p>

                </div>

                <div class="w-14 h-14 rounded-2xl bg-gradient-to-r from-indigo-500 to-purple-600 flex items-center justify-center font-bold text-xl shadow-xl">

                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

                </div>

                <form method="POST" action="{{ route('logout') }}" class="mt-4">

    @csrf

    <button
        class="w-full bg-rose-500 hover:bg-rose-600 text-white py-3 rounded-2xl font-semibold transition duration-200">

        Logout

    </button>

</form>
            </div>

        </header>

        <!-- Content -->
        <main class="flex-1 p-10">

            @yield('content')

        </main>

    </div>

</div>

</body>
</html>