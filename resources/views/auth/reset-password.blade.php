<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - ScholarLink</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .register-bg {
            background:
                radial-gradient(circle at top left, rgba(99, 102, 241, 0.25), transparent 35%),
                radial-gradient(circle at bottom right, rgba(168, 85, 247, 0.25), transparent 35%),
                linear-gradient(135deg, #020617 0%, #0f172a 55%, #111827 100%);
        }

        .glass-card {
            background: rgba(15, 23, 42, 0.82);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(148, 163, 184, 0.18);
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.35);
        }

        .gradient-text {
            background: linear-gradient(135deg, #818cf8 0%, #c084fc 55%, #fb7185 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .btn-primary {
            background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            transition: all 0.25s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 16px 30px rgba(99, 102, 241, 0.35);
        }
    </style>
</head>

<body class="register-bg min-h-screen text-white">

    <div class="min-h-screen grid lg:grid-cols-2">

        <!-- Left Section -->
        <div class="hidden lg:flex flex-col justify-between p-12 relative overflow-hidden">

            <div>
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center font-black text-xl shadow-lg shadow-purple-500/30">
                        S
                    </div>

                    <div>
                        <h1 class="text-3xl font-black gradient-text">
                            ScholarLink
                        </h1>
                        <p class="text-slate-400 text-sm">
                            Platform Beasiswa Terpercaya
                        </p>
                    </div>
                </a>
            </div>

            <div class="max-w-xl">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-indigo-500/15 border border-indigo-400/30 text-indigo-300 text-sm font-semibold mb-6">
                    🎓 Join ScholarLink
                </div>

                <h2 class="text-5xl font-black leading-tight mb-6">
                    Daftar dan mulai <span class="gradient-text">perjalanan beasiswa</span> kamu.
                </h2>

                <p class="text-slate-300 text-lg leading-relaxed">
                    Buat akun untuk mengakses beasiswa, mengirim application, upload dokumen, menyimpan favorit, dan mengikuti diskusi melalui chat room.
                </p>

                <div class="grid grid-cols-3 gap-4 mt-10">
                    <div class="glass-card rounded-2xl p-5">
                        <p class="text-3xl font-black">1K+</p>
                        <p class="text-slate-400 text-sm mt-1">Beasiswa</p>
                    </div>

                    <div class="glass-card rounded-2xl p-5">
                        <p class="text-3xl font-black">500+</p>
                        <p class="text-slate-400 text-sm mt-1">Penerima</p>
                    </div>

                    <div class="glass-card rounded-2xl p-5">
                        <p class="text-3xl font-black">Gratis</p>
                        <p class="text-slate-400 text-sm mt-1">Daftar</p>
                    </div>
                </div>
            </div>

            <p class="text-slate-500 text-sm">
                © 2026 ScholarLink. Semua hak dilindungi.
            </p>
        </div>

        <!-- Right Section -->
        <div class="flex items-center justify-center px-6 py-12">

            <div class="w-full max-w-md">

                <div class="lg:hidden text-center mb-8">
                    <a href="{{ route('home') }}" class="inline-flex items-center justify-center gap-3">
                        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center font-black text-xl">
                            S
                        </div>

                        <span class="text-3xl font-black gradient-text">
                            ScholarLink
                        </span>
                    </a>
                </div>

                <div class="glass-card rounded-3xl p-8">

                    <div class="mb-8">
                        <h2 class="text-3xl font-black">
                            Buat Akun
                        </h2>

                        <p class="text-slate-400 mt-2">
                            Daftar sebagai mahasiswa untuk mulai mencari beasiswa.
                        </p>
                    </div>

                    @if ($errors->any())
                        <div class="mb-5 p-4 rounded-2xl bg-rose-500/15 border border-rose-400/25 text-rose-300 text-sm">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}" class="space-y-5">
                        @csrf

                        <div>
                            <label for="name" class="block text-sm font-semibold text-slate-300 mb-2">
                                Nama Lengkap
                            </label>

                            <input
                                id="name"
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                required
                                autofocus
                                autocomplete="name"
                                placeholder="Masukkan nama lengkap"
                                class="w-full rounded-2xl bg-slate-950/80 border border-slate-700 px-5 py-4 text-white placeholder:text-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                            >
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-semibold text-slate-300 mb-2">
                                Email
                            </label>

                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autocomplete="username"
                                placeholder="contoh@email.com"
                                class="w-full rounded-2xl bg-slate-950/80 border border-slate-700 px-5 py-4 text-white placeholder:text-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                            >
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-semibold text-slate-300 mb-2">
                                Password
                            </label>

                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                autocomplete="new-password"
                                placeholder="Minimal 8 karakter"
                                class="w-full rounded-2xl bg-slate-950/80 border border-slate-700 px-5 py-4 text-white placeholder:text-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                            >
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-sm font-semibold text-slate-300 mb-2">
                                Konfirmasi Password
                            </label>

                            <input
                                id="password_confirmation"
                                type="password"
                                name="password_confirmation"
                                required
                                autocomplete="new-password"
                                placeholder="Ulangi password"
                                class="w-full rounded-2xl bg-slate-950/80 border border-slate-700 px-5 py-4 text-white placeholder:text-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                            >
                        </div>

                        <button
                            type="submit"
                            class="btn-primary w-full py-4 rounded-2xl font-black text-white"
                        >
                            REGISTER
                        </button>
                    </form>

                    <div class="mt-7 text-center">
                        <p class="text-slate-400 text-sm">
                            Sudah punya akun?
                            <a href="{{ route('login') }}" class="text-indigo-300 hover:text-indigo-200 font-bold">
                                Masuk sekarang
                            </a>
                        </p>
                    </div>

                </div>

                <div class="mt-6 text-center">
                    <a href="{{ route('home') }}" class="text-slate-400 hover:text-white text-sm font-semibold">
                        ← Kembali ke halaman utama
                    </a>
                </div>

            </div>

        </div>

    </div>

</body>
</html>