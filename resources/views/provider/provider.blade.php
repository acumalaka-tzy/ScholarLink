<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ScholarLink Provider</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo-scholarlink.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=nunito:400,500,600,700,800,900" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body, * { font-family: 'Nunito', sans-serif !important; }
        body { overflow-x: hidden; }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f5f9; }
        ::-webkit-scrollbar-thumb { background: linear-gradient(to bottom, #2563eb, #06b6d4); border-radius: 999px; }
    </style>
</head>

<body class="min-h-screen bg-[#f4f7f9] text-gray-900">

@php 
    $providerName = Auth::user()->display_name ?? Auth::user()->name; 
    $initials = strtoupper(substr($providerName, 0, 2));
    $fotoProfil = Auth::user()->profile->foto_profil ?? null;
@endphp

<div class="fixed inset-0 -z-10 overflow-hidden">
    <div class="absolute top-0 left-0 w-[500px] h-[500px] bg-cyan-200 rounded-full blur-3xl opacity-30"></div>
    <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-orange-200 rounded-full blur-3xl opacity-30"></div>
</div>

<div class="min-h-screen flex overflow-hidden">
    <div id="overlay" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-40 hidden lg:hidden"></div>

    <aside id="sidebar" class="fixed lg:static inset-y-0 left-0 z-50 w-72 bg-white/95 backdrop-blur-2xl border-r border-gray-200 transform -translate-x-full lg:translate-x-0 transition duration-300 flex flex-col h-screen overflow-y-auto">
        <div class="p-8 border-b border-gray-100">
            <a href="{{ url('/') }}" class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-[1.5rem] shadow-xl shadow-blue-500/20 overflow-hidden">
                    <img src="{{ asset('images/logo-scholarlink.png') }}" class="w-full h-full object-cover" alt="ScholarLink Logo">
                </div>
                <div>
                    <h1 class="text-2xl font-black text-gray-900 tracking-tight">ScholarLink</h1>
                    <p class="text-sm text-gray-500 font-bold mt-1">Provider Area</p>
                </div>
            </a>
        </div>

        <nav id="nav-links" class="flex-1 p-6 space-y-3">
            @php
                $isProvider = Auth::user() && Auth::user()->role === 'provider';
                $menu = [
                    ['route' => 'provider.dashboard', 'icon' => 'bi-grid-fill', 'label' => 'Dashboard', 'sub' => 'Provider Overview', 'color' => 'blue'],
                    ['route' => 'provider.scholarships.index', 'icon' => 'bi-mortarboard-fill', 'label' => 'Scholarships', 'sub' => 'Manage Programs', 'color' => 'cyan'],
                    ['route' => 'provider.applications.index', 'icon' => 'bi-file-earmark-check-fill', 'label' => 'Applications', 'sub' => 'Student Applications', 'color' => 'purple'],
                    ['route' => $isProvider ? 'provider.chat-rooms.index' : 'scholarships.index', 'icon' => 'bi-chat-dots-fill', 'label' => 'Chat Rooms', 'sub' => 'Student Discussions', 'color' => 'pink'],
                ];
            @endphp

            @foreach($menu as $item)
                <a href="{{ route($item['route']) }}" class="{{ request()->routeIs(str_replace('index', '*', $item['route'])) ? 'bg-gradient-to-r from-blue-600 to-cyan-500 text-white shadow-lg shadow-blue-500/20' : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }} flex items-center gap-4 px-5 py-4 rounded-2xl font-black transition duration-300">
                    <div class="w-12 h-12 rounded-2xl flex items-center justify-center text-xl {{ request()->routeIs(str_replace('index', '*', $item['route'])) ? 'bg-white/15' : 'bg-'.$item['color'].'-100 text-'.$item['color'].'-600' }}">
                        <i class="bi {{ $item['icon'] }}"></i>
                    </div>
                    <div>
                        <p class="text-lg">{{ $item['label'] }}</p>
                        <p class="text-xs opacity-70 font-bold mt-1">{{ $item['sub'] }}</p>
                    </div>
                </a>
            @endforeach

        </nav>

        <div class="p-6 border-t border-gray-100">
            <div class="rounded-[2rem] bg-gradient-to-br from-blue-600 to-cyan-500 p-6 text-white shadow-xl shadow-blue-500/20">
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 rounded-2xl bg-white flex items-center justify-center overflow-hidden text-blue-600 font-black text-xl">
                        @if($fotoProfil)
                            <img src="{{ Storage::url($fotoProfil) }}" class="w-full h-full object-cover" alt="Profile Photo">
                        @else
                            {{ $initials }}
                        @endif
                    </div>
                    <div>
                        <p class="text-sm font-bold text-blue-100">Logged in as</p>
                        <h3 class="font-black text-xl">{{ Auth::user()->display_name ?? Auth::user()->name }}</h3>
                        <p class="text-sm text-blue-100 capitalize font-bold">{{ Auth::user()->role }}</p>
                    </div>
                </div>
            </div>
        </div>
    </aside>

    <main class="flex-1 min-w-0 flex flex-col h-screen overflow-hidden">
        <header class="sticky top-0 z-30 bg-white/90 backdrop-blur-xl border-b border-gray-200 shadow-sm">
            <div class="px-5 lg:px-8 py-4 flex items-center justify-between">
                <div class="flex items-center gap-3 sm:gap-4 flex-1">
                    <button id="openSidebar" class="lg:hidden flex-shrink-0 w-10 h-10 sm:w-14 sm:h-14 rounded-xl sm:rounded-2xl bg-white border border-gray-200 shadow-sm sm:shadow-lg flex items-center justify-center text-lg sm:text-2xl text-gray-700">
                        <i class="bi bi-list"></i>
                    </button>
                    <div class="flex flex-col min-w-0">
                        <h2 class="text-lg sm:text-3xl font-black text-gray-900 leading-tight truncate">Provider Panel</h2>
                        <p class="text-gray-500 font-bold text-[10px] sm:text-base mt-0.5 sm:mt-1 truncate">Manage Scholarships</p>
                    </div>
                </div>

                <div class="flex items-center gap-3 sm:gap-6 relative">
                    <div class="hidden md:block text-right">
                        <p class="font-black text-lg text-gray-900">{{ $providerName }}</p>
                        <p class="text-gray-500 text-sm capitalize font-bold">Provider</p>
                    </div>

                <button onclick="toggleProfileMenu()" class="w-10 h-10 sm:w-16 sm:h-16 flex-shrink-0 rounded-full sm:rounded-3xl bg-blue-600 text-white flex items-center justify-center font-black text-lg sm:text-2xl shadow-md sm:shadow-lg shadow-blue-500/20 hover:scale-105 transition overflow-hidden border-2 border-white/50">
                    @if($fotoProfil)
                        <img src="{{ Storage::url($fotoProfil) }}" class="w-full h-full object-cover" alt="Profile Photo">
                    @else
                        {{ $initials }}
                    @endif
                </button>

                <div id="profileMenu" class="hidden absolute right-0 top-24 w-80 bg-white border border-gray-100 rounded-[2rem] shadow-2xl overflow-hidden">
                    <div class="p-6 border-b border-gray-100">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 rounded-3xl bg-blue-600 text-white flex items-center justify-center font-black text-2xl overflow-hidden">
                                @if($fotoProfil)
                                    <img src="{{ Storage::url($fotoProfil) }}" class="w-full h-full object-cover" alt="Profile Photo">
                                @else
                                    {{ $initials }}
                                @endif
                            </div>
                            <div>
                                <h3 class="font-black text-lg text-gray-900">{{ Auth::user()->name }}</h3>
                                <p class="text-gray-500 text-sm font-bold">{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 space-y-2">
                        <a href="{{ route('profile.edit') }}" class="flex items-center gap-4 px-5 py-4 rounded-2xl hover:bg-gray-100 transition">
                            <div class="w-11 h-11 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center"><i class="bi bi-person-fill"></i></div>
                            <span class="font-black text-gray-700">My Profile</span>
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full flex items-center gap-4 px-5 py-4 rounded-2xl hover:bg-red-50 transition">
                                <div class="w-11 h-11 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center"><i class="bi bi-box-arrow-right"></i></div>
                                <span class="font-black text-red-600">Logout</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </header>
        <div class="flex-1 overflow-y-auto overflow-x-hidden flex flex-col">
            <section class="p-4 lg:p-6 flex-1">
                @yield('content')
            </section>
            <x-footer />
        </div>
    </main>
</div>

<script>
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');
    const toggle = () => {
        sidebar.classList.toggle('-translate-x-full');
        overlay.classList.toggle('hidden');
    };
    document.getElementById('openSidebar').addEventListener('click', toggle);
    overlay.addEventListener('click', toggle);

    document.querySelectorAll('#nav-links a').forEach(link => {
        link.addEventListener('click', () => {
            if(window.innerWidth < 1024) toggle();
        });
    });

    function toggleProfileMenu() {
        document.getElementById('profileMenu').classList.toggle('hidden');
    }
    
    window.addEventListener('click', function(e) {
        const menu = document.getElementById('profileMenu');
        if (!e.target.closest('#profileMenu') && !e.target.closest('button')) {
            menu.classList.add('hidden');
        }
    });
</script>
</body>
</html>