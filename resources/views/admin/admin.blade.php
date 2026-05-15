<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ScholarLink Admin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-[#050816] text-white min-h-screen overflow-x-hidden">

<div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="hidden md:flex flex-col w-80 bg-white/5 backdrop-blur-2xl border-r border-white/10 shadow-2xl">

        <!-- Logo -->
        <div class="px-8 py-8 border-b border-white/10">

            <h1 class="text-5xl font-extrabold tracking-tight bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-400 bg-clip-text text-transparent">
                ScholarLink
            </h1>

            <p class="text-slate-400 text-lg mt-2">
                Admin Dashboard
            </p>

        </div>

<!-- Navigation -->
<nav class="flex-1 px-6 py-8 space-y-5">

    <!-- Dashboard -->
    <a href="{{ route('admin.dashboard') }}"
       class="group relative flex items-center gap-5 px-6 py-5 rounded-3xl
       bg-gradient-to-r from-indigo-500/30 to-pink-500/20
       border border-pink-400/40
       shadow-[0_0_30px_rgba(236,72,153,0.35)]
       hover:translate-x-2 hover:scale-[1.02]
       transition-all duration-300 ease-out overflow-hidden">

        <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition duration-300
        bg-gradient-to-r from-indigo-500/10 to-pink-500/10"></div>

        <div class="relative z-10 w-14 h-14 rounded-2xl bg-white/10
        flex items-center justify-center
        group-hover:scale-110 group-hover:rotate-6 transition duration-300">

            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-8 h-8 text-pink-300"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M3 13h8V3H3v10zm10 8h8V11h-8v10zm0-18v4h8V3h-8zM3 21h8v-6H3v6z" />

            </svg>

        </div>

        <span class="relative z-10 font-semibold text-2xl tracking-wide">
            Dashboard
        </span>

    </a>


    <!-- Users -->
    <a href="{{ route('admin.users.index') }}"
       class="group relative flex items-center gap-5 px-6 py-5 rounded-3xl
       border border-transparent hover:border-pink-500/20
       hover:bg-white/10 hover:translate-x-2
       hover:shadow-[0_0_25px_rgba(168,85,247,0.35)]
       transition-all duration-300 ease-out overflow-hidden">

        <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition duration-300
        bg-gradient-to-r from-indigo-500/5 to-pink-500/5"></div>

        <div class="relative z-10 w-14 h-14 rounded-2xl bg-white/5
        flex items-center justify-center
        group-hover:scale-110 group-hover:rotate-6 transition duration-300">

            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-8 h-8 text-violet-300"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M17 20h5V4H2v16h5m10 0v-2a4 4 0 00-4-4H9a4 4 0 00-4 4v2m12 0H7m10-11a4 4 0 11-8 0 4 4 0 018 0z" />

            </svg>

        </div>

        <span class="relative z-10 font-semibold text-2xl tracking-wide">
            Users
        </span>

    </a>


    <!-- Providers -->
    <a href="{{ route('admin.providers.index') }}"
       class="group relative flex items-center gap-5 px-6 py-5 rounded-3xl
       border border-transparent hover:border-cyan-500/20
       hover:bg-white/10 hover:translate-x-2
       hover:shadow-[0_0_25px_rgba(34,211,238,0.25)]
       transition-all duration-300 ease-out overflow-hidden">

        <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition duration-300
        bg-gradient-to-r from-cyan-500/5 to-blue-500/5"></div>

        <div class="relative z-10 w-14 h-14 rounded-2xl bg-white/5
        flex items-center justify-center
        group-hover:scale-110 group-hover:rotate-6 transition duration-300">

            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-8 h-8 text-cyan-300"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M3 21h18M5 21V7l8-4v18M19 21V11l-6-4" />

            </svg>

        </div>

        <span class="relative z-10 font-semibold text-2xl tracking-wide">
            Providers
        </span>

    </a>


    <!-- Scholarships -->
    <a href="{{ route('admin.scholarships.index') }}"
       class="group relative flex items-center gap-5 px-6 py-5 rounded-3xl
       border border-transparent hover:border-amber-500/20
       hover:bg-white/10 hover:translate-x-2
       hover:shadow-[0_0_25px_rgba(251,191,36,0.25)]
       transition-all duration-300 ease-out overflow-hidden">

        <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition duration-300
        bg-gradient-to-r from-yellow-500/5 to-orange-500/5"></div>

        <div class="relative z-10 w-14 h-14 rounded-2xl bg-white/5
        flex items-center justify-center
        group-hover:scale-110 group-hover:rotate-6 transition duration-300">

            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-8 h-8 text-amber-300"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422A12.083 12.083 0 0112 20.055a12.083 12.083 0 01-6.16-9.477L12 14zm0 0v6" />

            </svg>

        </div>

        <span class="relative z-10 font-semibold text-2xl tracking-wide">
            Scholarships
        </span>

    </a>

</nav>

        <!-- User Card -->
        <div class="p-3 border-t border-white/10">

            <div class="rounded-[2rem]
            bg-white/10 backdrop-blur-2xl
            border border-white/10
            shadow-[0_0_40px_rgba(168,85,247,0.35)]
            p-6">

                <p class="text-slate-400 text-lg">
                    Logged in as
                </p>

                <h3 class="font-bold text-2xl mt-3">
                    {{ Auth::user()->name }}
                </h3>

                <p class="text-indigo-400 text-lg capitalize mt-1">
                    {{ Auth::user()->role }}
                </p>

            </div>

        </div>

    </aside>

    <!-- Main -->
    <div class="flex-1 flex flex-col">

        <!-- Topbar -->
        <header class="h-28 bg-white/5 backdrop-blur-2xl border-b border-white/10 px-10 flex items-center justify-between sticky top-0 z-40">

            <!-- Left -->
            <div>

                <h2 class="text-4xl font-extrabold tracking-tight">
                    Admin Panel
                </h2>

                <p class="text-slate-400 text-xl mt-2">
                    Manage ScholarLink System
                </p>

            </div>

            <!-- Right -->
            <div class="flex items-center gap-6 relative">

                <!-- User Info -->
                <div class="hidden md:block text-right">

                    <p class="font-bold text-2xl">
                        {{ Auth::user()->name }}
                    </p>

                    <p class="text-slate-400 text-lg capitalize">
                        {{ Auth::user()->role }}
                    </p>

                </div>

                <!-- Avatar -->
                <button onclick="toggleProfileMenu()"
                    class="w-16 h-16 rounded-3xl
                    bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500
                    flex items-center justify-center
                    font-bold text-2xl
                    shadow-[0_0_30px_rgba(168,85,247,0.6)]
                    hover:scale-105 transition duration-300">

                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

                </button>

                <!-- Dropdown -->
                <div id="profileMenu"
                    class="hidden absolute right-0 top-24 w-72
                    bg-[#0f172a]/95 backdrop-blur-2xl
                    border border-white/10
                    rounded-[2rem]
                    shadow-[0_0_40px_rgba(168,85,247,0.4)]
                    overflow-hidden">

                    <!-- Header -->
                    <div class="px-6 py-6 border-b border-white/10">

                        <div class="flex items-center gap-4">

                            <div class="w-16 h-16 rounded-3xl
                            bg-gradient-to-br from-indigo-500 to-pink-500
                            flex items-center justify-center
                            font-bold text-2xl">

                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

                            </div>

                            <div>

                                <h3 class="font-bold text-xl">
                                    {{ Auth::user()->name }}
                                </h3>

                                <p class="text-slate-400 text-sm">
                                    {{ Auth::user()->email }}
                                </p>

                            </div>

                        </div>

                    </div>

                    <!-- Menu -->
                    <div class="p-4">

                        <a href="{{ route('profile.edit') }}"
                            class="flex items-center gap-3 px-5 py-4 rounded-2xl hover:bg-white/10 transition duration-300">

                            <span class="text-xl">👤</span>
                            <span class="text-lg">My Profile</span>

                        </a>

                        <form method="POST" action="{{ route('logout') }}">

                            @csrf

                            <button type="submit"
                                class="w-full flex items-center gap-3 px-5 py-4 rounded-2xl
                                hover:bg-rose-500/10 text-rose-400 transition duration-300">

                                <span class="text-xl">🚪</span>
                                <span class="text-lg">Logout</span>

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </header>

        <!-- Content -->
        <main class="flex-1 p-10">

            @yield('content')

        </main>

    </div>

</div>

<script>

function toggleProfileMenu() {

    document.getElementById('profileMenu')
        .classList.toggle('hidden');

}

window.addEventListener('click', function(e) {

    const menu = document.getElementById('profileMenu');

    if (!e.target.closest('button') && !e.target.closest('#profileMenu')) {

        menu.classList.add('hidden');

    }

});

</script>

</body>
</html>