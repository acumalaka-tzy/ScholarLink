@extends('layouts.app')

@section('content')

<div class="space-y-10">

    <!-- HERO -->
    <div class="relative overflow-hidden rounded-[2rem]
    bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500
    p-10 md:p-14 shadow-[0_0_50px_rgba(168,85,247,0.45)]">

        <div class="absolute top-0 right-0 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>

        <div class="relative z-10">

            <h2 class="text-4xl md:text-6xl font-black text-white leading-tight">
                Selamat Datang,
                <span class="text-pink-200">
                    {{ Auth::user()->name }}
                </span> 👋
            </h2>

            <p class="text-indigo-100 text-lg mt-5 max-w-2xl leading-relaxed">
                Jelajahi peluang beasiswa terbaik dan pantau seluruh aplikasi Anda dalam satu dashboard modern.
            </p>

            <div class="flex gap-4 mt-8">

                <button class="px-6 py-3 rounded-2xl bg-white text-indigo-700 font-bold shadow-lg hover:scale-105 transition duration-300">
                    Explore Scholarship
                </button>

                <button class="px-6 py-3 rounded-2xl border border-white/30 bg-white/10 backdrop-blur-xl text-white font-semibold hover:bg-white/20 transition">
                    Edit Profile
                </button>

            </div>

        </div>

    </div>

    <!-- STATS -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

        <!-- Card -->
        <div class="group rounded-[2rem] bg-white dark:bg-slate-900
        border border-slate-200 dark:border-white/10
        p-7 shadow-xl hover:shadow-[0_0_30px_rgba(99,102,241,0.25)]
        hover:-translate-y-1 transition duration-300">

            <div class="flex justify-between items-start">

                <div>

                    <p class="text-slate-500 dark:text-slate-400 font-medium">
                        Total Beasiswa
                    </p>

                    <h3 class="text-5xl font-black mt-4 dark:text-white">
                        1,250
                    </h3>

                </div>

                <div class="w-16 h-16 rounded-2xl
                bg-indigo-500/10 flex items-center justify-center">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-8 h-8 text-indigo-500"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422A12.083 12.083 0 0112 20.055a12.083 12.083 0 01-6.16-9.477L12 14zm0 0v6" />

                    </svg>

                </div>

            </div>

        </div>

        <!-- Card -->
        <div class="group rounded-[2rem] bg-white dark:bg-slate-900
        border border-slate-200 dark:border-white/10
        p-7 shadow-xl hover:shadow-[0_0_30px_rgba(236,72,153,0.25)]
        hover:-translate-y-1 transition duration-300">

            <div class="flex justify-between items-start">

                <div>

                    <p class="text-slate-500 dark:text-slate-400 font-medium">
                        Aplikasi Anda
                    </p>

                    <h3 class="text-5xl font-black mt-4 dark:text-white">
                        3
                    </h3>

                </div>

                <div class="w-16 h-16 rounded-2xl
                bg-pink-500/10 flex items-center justify-center">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-8 h-8 text-pink-500"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />

                    </svg>

                </div>

            </div>

        </div>

        <!-- Card -->
        <div class="group rounded-[2rem] bg-white dark:bg-slate-900
        border border-slate-200 dark:border-white/10
        p-7 shadow-xl hover:shadow-[0_0_30px_rgba(34,197,94,0.25)]
        hover:-translate-y-1 transition duration-300">

            <div class="flex justify-between items-start">

                <div>

                    <p class="text-slate-500 dark:text-slate-400 font-medium">
                        Diterima
                    </p>

                    <h3 class="text-5xl font-black mt-4 text-green-500">
                        1
                    </h3>

                </div>

                <div class="w-16 h-16 rounded-2xl
                bg-green-500/10 flex items-center justify-center">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-8 h-8 text-green-500"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M5 13l4 4L19 7" />

                    </svg>

                </div>

            </div>

        </div>

        <!-- Card -->
        <div class="rounded-[2rem]
        bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500
        p-7 text-white shadow-[0_0_40px_rgba(168,85,247,0.4)]">

            <div class="flex justify-between items-start">

                <div>

                    <p class="text-indigo-100 font-medium">
                        Profil Kelengkapan
                    </p>

                    <h3 class="text-5xl font-black mt-4">
                        75%
                    </h3>

                </div>

                <div class="w-16 h-16 rounded-2xl bg-white/10 flex items-center justify-center">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-8 h-8 text-white"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />

                    </svg>

                </div>

            </div>

        </div>

    </div>

    <!-- CONTENT -->
    <div class="grid xl:grid-cols-3 gap-8">

        <!-- LEFT -->
        <div class="xl:col-span-2 space-y-6">

            <div class="flex items-center justify-between">

                <h3 class="text-3xl font-black dark:text-white">
                    Aplikasi Beasiswa
                </h3>

                <button class="px-5 py-3 rounded-2xl bg-indigo-600 text-white font-semibold hover:bg-indigo-700 transition">
                    + Apply New
                </button>

            </div>

            <!-- Application Card -->
            <div class="rounded-[2rem]
            bg-white dark:bg-slate-900
            border border-slate-200 dark:border-white/10
            p-8 shadow-xl hover:shadow-[0_0_35px_rgba(99,102,241,0.2)]
            transition duration-300">

                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">

                    <div>

                        <div class="flex items-center gap-3 mb-4">

                            <span class="px-4 py-2 rounded-full bg-green-500/10 text-green-500 text-sm font-bold">
                                DITERIMA
                            </span>

                        </div>

                        <h4 class="text-2xl font-bold dark:text-white">
                            Beasiswa Penuh S1 - UI
                        </h4>

                        <p class="text-slate-500 dark:text-slate-400 mt-2">
                            Universitas Indonesia
                        </p>

                    </div>

                    <button class="px-5 py-3 rounded-2xl bg-indigo-600 text-white font-semibold hover:bg-indigo-700 transition">
                        Lihat Detail
                    </button>

                </div>

            </div>

        </div>

        <!-- RIGHT -->
<div>

    <div class="rounded-[2rem]
    bg-white dark:bg-slate-900
    border border-slate-200 dark:border-white/10
    p-8 shadow-xl">

        <div class="flex items-center gap-4 mb-8">

            <div class="w-16 h-16 rounded-2xl
            bg-gradient-to-br from-indigo-500 to-pink-500
            flex items-center justify-center text-white text-2xl font-bold">

                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

            </div>

            <div>

                <h4 class="text-2xl font-bold dark:text-white">
                    {{ Auth::user()->name }}
                </h4>

                <p class="text-slate-500 dark:text-slate-400">
                    {{ Auth::user()->email }}
                </p>

            </div>

        </div>

        <div class="space-y-5">

            <div class="flex justify-between">

                <span class="text-slate-500 dark:text-slate-400">
                    Role
                </span>

                <span class="font-semibold dark:text-white">
                    {{ ucfirst(Auth::user()->role_name) }}
                </span>

            </div>

            <div class="flex justify-between">

                <span class="text-slate-500 dark:text-slate-400">
                    Status
                </span>

                <span class="text-green-500 font-semibold">
                    Active
                </span>

            </div>

        </div>

        <button class="w-full mt-8 py-4 rounded-2xl
        bg-gradient-to-r from-indigo-600 to-pink-500
        text-white font-bold hover:scale-[1.02]
        transition duration-300">

            Edit Profile

        </button>

        @if (Auth::user()->role_name == 'admin')

            <a href="{{ route('admin.dashboard') }}"
               class="block w-full mt-4 py-4 rounded-2xl
               bg-red-600 text-center text-white font-bold
               hover:bg-red-700 transition duration-300">

                Masuk Admin Dashboard

            </a>

        @endif

        @if (Auth::user()->role_name == 'provider')

            <a href="{{ route('provider.dashboard') }}"
               class="block w-full mt-4 py-4 rounded-2xl
               bg-green-600 text-center text-white font-bold
               hover:bg-green-700 transition duration-300">

                Masuk Provider Dashboard

            </a>

        @endif

    </div>

</div>

    </div>

</div>

@endsection