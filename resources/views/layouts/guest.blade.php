<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ScholarLink') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo-scholarlink.png') }}">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=nunito:400,500,600,700,800,900" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body, * {
            font-family: 'Nunito', sans-serif !important;
        }

        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #2563eb, #06b6d4);
            border-radius: 999px;
        }
    </style>
</head>
<body class="min-h-screen bg-[#f4f7f9] overflow-y-auto overflow-x-hidden antialiased flex flex-col">
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute top-0 left-0 w-[500px] h-[500px] bg-cyan-200 rounded-full blur-3xl opacity-30"></div>
        <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-orange-200 rounded-full blur-3xl opacity-30"></div>
    </div>

    <div class="flex-1 flex flex-col min-h-0">
        <div class="flex-1 flex items-center justify-center px-6 py-12">
        <div class="w-full max-w-md">
            <div class="text-center mb-10">
                <a href="/" class="inline-flex items-center gap-4">
                    <div class="w-16 h-16 rounded-[2rem] shadow-xl shadow-blue-500/20 overflow-hidden">
                        <img src="{{ asset('images/logo-scholarlink.png') }}" class="w-full h-full object-cover" alt="ScholarLink Logo">
                    </div>
                    <div class="text-left">
                        <h1 class="text-4xl font-black text-gray-900 tracking-tight">ScholarLink</h1>
                        <p class="text-gray-500 font-bold mt-1 text-sm">Scholarship Platform</p>
                    </div>
                </a>
            </div>

            <div class="relative overflow-hidden bg-white border border-gray-100 rounded-[2.5rem] shadow-[0_25px_80px_rgba(15,23,42,0.08)]">
                <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-blue-600 via-cyan-400 to-orange-400"></div>
                <div class="absolute top-0 right-0 w-72 h-72 bg-cyan-100 rounded-full blur-3xl opacity-40"></div>
                <div class="absolute bottom-0 left-0 w-72 h-72 bg-orange-100 rounded-full blur-3xl opacity-40"></div>

                <div class="relative px-8 py-10 sm:px-10">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
        </div>
        <x-footer />
    </div>
</body>
</html>
