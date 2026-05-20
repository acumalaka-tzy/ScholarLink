<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ScholarLink Provider</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            overflow-x: hidden;
        }

        .glass-card {
            background: rgba(15, 23, 42, 0.78);
            backdrop-filter: blur(18px);
            border: 1px solid rgba(148, 163, 184, 0.18);
        }

        .sidebar-link {
            transition: all 0.25s ease;
        }

        .sidebar-link:hover {
            transform: translateX(6px);
            background: rgba(99, 102, 241, 0.16);
            color: #ffffff;
        }

        .sidebar-link.active {
            background: linear-gradient(
                135deg,
                rgba(99, 102, 241, 0.28),
                rgba(168, 85, 247, 0.28)
            );

            color: #ffffff;
            border: 1px solid rgba(129, 140, 248, 0.45);
            box-shadow: 0 10px 25px rgba(99, 102, 241, 0.18);
        }

        .gradient-text {
            background: linear-gradient(
                135deg,
                #818cf8 0%,
                #c084fc 50%,
                #fb7185 100%
            );

            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .mobile-sidebar {
            transition: transform 0.3s ease;
        }

        #sidebar {
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: rgba(99,102,241,0.5) transparent;
        }

        #sidebar::-webkit-scrollbar {
            width: 4px;
        }

        #sidebar::-webkit-scrollbar-track {
            background: transparent;
        }

        #sidebar::-webkit-scrollbar-thumb {
            background: #4f46e5;
            border-radius: 999px;
        }
    </style>
</head>

<body class="min-h-screen bg-slate-950 text-white">

@php
    $providerName = Auth::user()->name ?? 'Provider Scholarship';
@endphp

<div class="min-h-screen flex">

    <!-- Overlay -->
    <div id="overlay"
         class="fixed inset-0 bg-black/60 backdrop-blur-sm z-40 hidden lg:hidden">
    </div>

    <!-- Sidebar -->
    <aside id="sidebar"
           class="mobile-sidebar fixed lg:static inset-y-0 left-0 z-50 w-72 bg-slate-950/95 backdrop-blur-xl border-r border-slate-800 transform -translate-x-full lg:translate-x-0 flex flex-col h-screen">

        <!-- Logo -->
        <div class="p-7 border-b border-slate-800">

            <a href="{{ url('/') }}" class="flex items-center gap-3">

                <div class="shrink-0 w-14 h-14 rounded-2xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center font-black text-2xl shadow-lg shadow-purple-500/30">
                    S
                </div>

                <div>
                    <h1 class="text-3xl font-black gradient-text leading-none">
                        ScholarLink
                    </h1>

                    <p class="text-sm text-slate-400 mt-2">
                        Provider Area
                    </p>
                </div>

            </a>

        </div>

        <!-- Navigation -->
        <nav class="flex-1 p-5 space-y-3">

            <a href="{{ route('provider.dashboard') }}"
               class="sidebar-link {{ request()->routeIs('provider.dashboard') ? 'active' : '' }} flex items-center gap-4 px-5 py-4 rounded-2xl text-slate-300 font-bold">

                <span class="text-2xl">📊</span>
                <span>Dashboard</span>

            </a>

            <a href="{{ route('provider.scholarships.index') }}"
               class="sidebar-link {{ request()->routeIs('provider.scholarships.*') ? 'active' : '' }} flex items-center gap-4 px-5 py-4 rounded-2xl text-slate-300 font-bold">

                <span class="text-2xl">🎓</span>
                <span>Scholarships</span>

            </a>

            <a href="{{ route('provider.applications.index') }}"
               class="sidebar-link {{ request()->routeIs('provider.applications.*') ? 'active' : '' }} flex items-center gap-4 px-5 py-4 rounded-2xl text-slate-300 font-bold">

                <span class="text-2xl">📄</span>
                <span>Applications</span>

            </a>

            <a href="{{ route('chat-rooms.index') }}"
               class="sidebar-link {{ request()->routeIs('chat-rooms.*') ? 'active' : '' }} flex items-center gap-4 px-5 py-4 rounded-2xl text-slate-300 font-bold">

                <span class="text-2xl">💬</span>
                <span>Chat Rooms</span>

            </a>

            <a href="{{ url('/') }}"
               class="sidebar-link flex items-center gap-4 px-5 py-4 rounded-2xl text-slate-300 font-bold">

                <span class="text-2xl">🏠</span>
                <span>Home Website</span>

            </a>

        </nav>

        <!-- User -->
        <div class="mt-auto p-5 border-t border-slate-800 bg-slate-950/60 backdrop-blur-xl">

            <div class="rounded-3xl bg-gradient-to-br from-indigo-600/30 to-purple-700/30 border border-indigo-400/20 p-5 mb-4">

                <p class="text-sm text-slate-400">
                    Logged in as
                </p>

                <h3 class="text-lg font-black mt-2 break-words">
                    {{ $providerName }}
                </h3>

                <p class="text-sm text-indigo-300 mt-1">
                    Provider
                </p>

            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit"
                        class="w-full py-3 rounded-2xl bg-rose-500 hover:bg-rose-600 transition font-bold shadow-lg shadow-rose-500/20">

                    Logout

                </button>
            </form>

        </div>

    </aside>

    <!-- Main -->
    <main class="flex-1 min-w-0">

        <!-- Topbar -->
        <header class="sticky top-0 z-30 bg-slate-950/90 backdrop-blur-xl border-b border-slate-800">

            <div class="px-5 lg:px-10 py-5 flex items-center justify-between gap-4">

                <div class="flex items-center gap-4 min-w-0">

                    <button id="openSidebar"
                            class="lg:hidden shrink-0 w-11 h-11 rounded-xl bg-slate-800 border border-slate-700 flex items-center justify-center">

                        ☰

                    </button>

                    <div class="min-w-0">

                        <h2 class="text-2xl lg:text-3xl font-black truncate">
                            Provider Panel
                        </h2>

                        <p class="text-slate-400 text-sm lg:text-base mt-1 hidden sm:block">
                            Manage scholarships, applications, and student communication
                        </p>

                    </div>

                </div>

                <div class="hidden sm:flex items-center gap-4">

                    <div class="text-right">

                        <h3 class="font-bold">
                            {{ $providerName }}
                        </h3>

                        <p class="text-sm text-slate-400">
                            Provider
                        </p>

                    </div>

                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center font-black text-xl shadow-lg shadow-purple-500/30">

                        {{ strtoupper(substr($providerName, 0, 1)) }}

                    </div>

                </div>

            </div>

        </header>

        <!-- Content -->
        <section class="p-5 lg:p-10">

            @if(session('success'))
                <div class="mb-6 bg-emerald-500/20 border border-emerald-500/30 text-emerald-400 px-6 py-4 rounded-2xl">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 bg-red-500/20 border border-red-500/30 text-red-400 px-6 py-4 rounded-2xl">
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')

        </section>

    </main>

</div>

<script>
    const openSidebar = document.getElementById('openSidebar');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');

    if (openSidebar && sidebar && overlay) {

        openSidebar.addEventListener('click', () => {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });

    }
</script>

</body>
</html>