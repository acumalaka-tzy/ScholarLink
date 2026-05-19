<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $chatRoom->nama_room }} - Chat Room</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-950 text-white min-h-screen">

    <div class="max-w-5xl mx-auto px-6 py-10">

        <div class="mb-8">
            <a href="{{ route('chat-rooms.index') }}" class="text-indigo-300 hover:text-indigo-200 font-semibold">
                ← Kembali ke Chat Rooms
            </a>

            <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6 mt-5">
                <h1 class="text-3xl font-black">
                    {{ $chatRoom->nama_room }}
                </h1>

                <p class="text-slate-400 mt-2">
                    {{ $chatRoom->scholarship->nama_beasiswa ?? 'Beasiswa tidak tersedia' }}
                    •
                    {{ $chatRoom->scholarship->provider->nama_instansi ?? 'Provider tidak tersedia' }}
                </p>
            </div>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 rounded-2xl bg-emerald-500/15 border border-emerald-400/25 text-emerald-300">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 p-4 rounded-2xl bg-rose-500/15 border border-rose-400/25 text-rose-300">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-slate-900 border border-slate-800 rounded-3xl overflow-hidden">

            <div id="chat-box" class="h-[520px] overflow-y-auto p-6 space-y-5">

                @forelse($chatRoom->messages->sortBy('waktu_kirim') as $message)
                    @php
                        $isMine = $message->id_user === auth()->id();
                    @endphp

                    <div class="flex {{ $isMine ? 'justify-end' : 'justify-start' }}">
                        <div class="max-w-[80%] rounded-3xl px-5 py-4 {{ $isMine ? 'bg-indigo-600 text-white' : 'bg-slate-800 text-slate-100' }}">

                            <div class="flex items-center gap-2 mb-2">
                                <span class="font-bold text-sm">
                                    {{ $message->user->name ?? 'User' }}
                                </span>

                                <span class="text-xs opacity-75">
                                    {{ $message->waktu_kirim ? \Carbon\Carbon::parse($message->waktu_kirim)->format('d M Y H:i') : '-' }}
                                </span>
                            </div>

                            <p class="leading-relaxed whitespace-pre-line">
                                {{ $message->pesan }}
                            </p>

                        </div>
                    </div>
                @empty
                    <div class="h-full flex items-center justify-center text-center">
                        <div>
                            <div class="text-6xl mb-4">💬</div>

                            <h2 class="text-2xl font-black">
                                Belum ada pesan
                            </h2>

                            <p class="text-slate-400 mt-2">
                                Kirim pesan pertama di room ini.
                            </p>
                        </div>
                    </div>
                @endforelse

            </div>

            <form method="POST" action="{{ route('chat-rooms.messages.store', $chatRoom->id_room) }}" class="border-t border-slate-800 p-5">
                @csrf

                <div class="flex flex-col md:flex-row gap-4">
                    <textarea
                        name="pesan"
                        rows="2"
                        required
                        placeholder="Tulis pesan..."
                        class="flex-1 rounded-2xl bg-slate-950 border border-slate-700 px-5 py-4 text-white resize-none focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    >{{ old('pesan') }}</textarea>

                    <button
                        type="submit"
                        class="px-8 py-4 rounded-2xl bg-indigo-600 hover:bg-indigo-700 transition font-bold"
                    >
                        Kirim
                    </button>
                </div>
            </form>

        </div>

    </div>

    <script>
        const chatBox = document.getElementById('chat-box');

        if (chatBox) {
            chatBox.scrollTop = chatBox.scrollHeight;
        }
    </script>

</body>
</html>