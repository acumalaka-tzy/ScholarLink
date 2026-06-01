<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ScholarLink Admin</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=nunito:400,500,600,700,800,900" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body, * {
            font-family: 'Nunito', sans-serif !important;
        }
    </style>
</head>
<body class="bg-[#f4f7f9] text-gray-900 overflow-x-hidden">

<div class="flex min-h-screen">
    <aside class="hidden lg:flex flex-col w-80 bg-white border-r border-gray-100 shadow-xl">
        <div class="px-8 py-8 border-b border-gray-100">
            <div class="flex items-center gap-4">
                <div class="w-16 h-16 rounded-3xl bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center text-3xl shadow-lg shadow-blue-500/20">
                    <i class="bi bi-mortarboard-fill"></i>
                </div>
                <div>
                    <h1 class="text-3xl font-black tracking-tight text-gray-900">ScholarLink</h1>
                    <p class="text-gray-500 font-bold mt-1">Admin Dashboard</p>
                </div>
            </div>
        </div>

        <nav class="flex-1 px-6 py-8 space-y-3">
            <a href="{{ route('admin.dashboard') }}" class="group flex items-center gap-4 px-5 py-4 rounded-3xl bg-gradient-to-r from-blue-600 to-cyan-500 text-white shadow-lg shadow-blue-500/20 transition hover:scale-[1.02]">
                <div class="w-12 h-12 rounded-2xl bg-white/20 flex items-center justify-center text-xl">
                    <i class="bi bi-grid-fill"></i>
                </div>
                <span class="font-black text-lg">Dashboard</span>
            </a>

            <a href="{{ route('admin.users.index') }}" class="group flex items-center gap-4 px-5 py-4 rounded-3xl hover:bg-gray-100 transition">
                <div class="w-12 h-12 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center text-xl">
                    <i class="bi bi-people-fill"></i>
                </div>
                <span class="font-black text-lg text-gray-700">Users</span>
            </a>

            <a href="{{ route('admin.providers.index') }}" class="group flex items-center gap-4 px-5 py-4 rounded-3xl hover:bg-gray-100 transition">
                <div class="w-12 h-12 rounded-2xl bg-cyan-100 text-cyan-600 flex items-center justify-center text-xl">
                    <i class="bi bi-buildings-fill"></i>
                </div>
                <span class="font-black text-lg text-gray-700">Providers</span>
            </a>

            <a href="{{ route('admin.scholarships.index') }}" class="group flex items-center gap-4 px-5 py-4 rounded-3xl hover:bg-gray-100 transition">
                <div class="w-12 h-12 rounded-2xl bg-orange-100 text-orange-600 flex items-center justify-center text-xl">
                    <i class="bi bi-mortarboard-fill"></i>
                </div>
                <span class="font-black text-lg text-gray-700">Scholarships</span>
            </a>
        </nav>

        <div class="p-6 border-t border-gray-100">
            <div class="rounded-[2rem] bg-gradient-to-br from-blue-600 to-cyan-500 p-6 text-white shadow-xl shadow-blue-500/20">
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 rounded-2xl bg-white/20 flex items-center justify-center text-2xl font-black">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div>
                        <p class="text-sm font-bold text-blue-100">Logged in as</p>
                        <h3 class="font-black text-xl">{{ Auth::user()->name }}</h3>
                        <p class="text-sm text-blue-100 capitalize font-bold">{{ Auth::user()->role }}</p>
                    </div>
                </div>
            </div>
        </div>
    </aside>

    <div class="flex-1 flex flex-col">
        <header class="h-28 bg-white border-b border-gray-100 px-10 flex items-center justify-between sticky top-0 z-40 shadow-sm">
            <div>
                <h2 class="text-3xl font-black text-gray-900">Admin Panel</h2>
                <p class="text-gray-500 font-bold mt-1">Manage ScholarLink Platform</p>
            </div>

            <div class="flex items-center gap-6 relative">
                <div class="hidden md:block text-right">
                    <p class="font-black text-lg text-gray-900">{{ Auth::user()->name }}</p>
                    <p class="text-gray-500 text-sm capitalize font-bold">{{ Auth::user()->role }}</p>
                </div>

                <button onclick="toggleProfileMenu()" class="w-16 h-16 rounded-3xl bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center font-black text-2xl shadow-lg shadow-blue-500/20 hover:scale-105 transition">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </button>

                <div id="profileMenu" class="hidden absolute right-0 top-24 w-80 bg-white border border-gray-100 rounded-[2rem] shadow-2xl overflow-hidden">
                    <div class="p-6 border-b border-gray-100">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 rounded-3xl bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center font-black text-2xl">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <div>
                                <h3 class="font-black text-lg text-gray-900">{{ Auth::user()->name }}</h3>
                                <p class="text-gray-500 text-sm font-bold">{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 space-y-2">
                        <a href="{{ route('profile.edit') }}" class="flex items-center gap-4 px-5 py-4 rounded-2xl hover:bg-gray-100 transition">
                            <div class="w-11 h-11 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center">
                                <i class="bi bi-person-fill"></i>
                            </div>
                            <span class="font-black text-gray-700">My Profile</span>
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full flex items-center gap-4 px-5 py-4 rounded-2xl hover:bg-red-50 transition">
                                <div class="w-11 h-11 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center">
                                    <i class="bi bi-box-arrow-right"></i>
                                </div>
                                <span class="font-black text-red-600">Logout</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <main class="flex-1 p-10">
            @yield('content')
        </main>
    </div>
</div>

<script>
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
