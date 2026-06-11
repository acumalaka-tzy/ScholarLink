<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ScholarLink</title>
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
<body class="bg-[#f4f7f9] text-gray-900 min-h-screen overflow-x-hidden antialiased flex flex-col">
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute top-0 left-0 w-[500px] h-[500px] bg-cyan-200 rounded-full blur-3xl opacity-30"></div>
        <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-orange-200 rounded-full blur-3xl opacity-30"></div>
    </div>

    @auth
        <x-navbar />
    @endauth

    <main class="flex-1 flex flex-col min-h-0">
        <div class="flex-1">
            @if(isset($slot))
                {{ $slot }}
            @else
                @yield('content')
            @endif
        </div>
        <x-footer />
    </main>

    <x-toast />

    @if(session('status') || session('success') || session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                @if(session('status') === 'profile-updated')
                    showToast('Profil berhasil diperbarui!', 'success');
                @elseif(session('status') === 'password-updated')
                    showToast('Password berhasil diperbarui!', 'success');
                @elseif(session('success'))
                    showToast("{{ session('success') }}", 'success');
                @elseif(session('error'))
                    showToast("{{ session('error') }}", 'error');
                @endif
            });
        </script>
    @endif
</body>
</html>
