<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email - ScholarLink</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }

        .auth-bg {
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

<body class="auth-bg min-h-screen text-white">

    <div class="min-h-screen flex items-center justify-center px-6 py-12">

        <div class="w-full max-w-md">

            <div class="text-center mb-8">
                <a href="{{ route('home') }}" class="inline-flex items-center justify-center gap-3">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center font-black text-xl">
                        S
                    </div>

                    <span class="text-3xl font-black gradient-text">
                        ScholarLink
                    </span>
                </a>
            </div>

            <div class="glass-card rounded-3xl p-8 text-center">

                <div class="text-6xl mb-5">
                    📩
                </div>

                <h2 class="text-3xl font-black">
                    Verifikasi Email
                </h2>

                <p class="text-slate-400 mt-3 leading-relaxed">
                    Terima kasih sudah mendaftar. Silakan verifikasi email kamu melalui link yang sudah kami kirim.
                </p>

                @if (session('status') == 'verification-link-sent')
                    <div class="mt-6 p-4 rounded-2xl bg-emerald-500/15 border border-emerald-400/25 text-emerald-300 text-sm text-left">
                        Link verifikasi baru sudah dikirim ke email kamu.
                    </div>
                @endif

                <div class="mt-8 space-y-4">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <button type="submit" class="btn-primary w-full py-4 rounded-2xl font-black text-white">
                            KIRIM ULANG EMAIL VERIFIKASI
                        </button>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit" class="w-full py-4 rounded-2xl bg-slate-800 hover:bg-slate-700 border border-slate-700 transition font-black text-white">
                            LOGOUT
                        </button>
                    </form>
                </div>

            </div>

        </div>

    </div>

</body>
</html>