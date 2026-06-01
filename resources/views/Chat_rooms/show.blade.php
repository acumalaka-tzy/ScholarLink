<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $chatRoom->nama_room }} - Chat Room</title>

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
<body class="min-h-screen bg-[#f4f7f9] overflow-hidden">

    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute top-0 left-0 w-96 h-96 bg-cyan-200 rounded-full blur-3xl opacity-30"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-orange-200 rounded-full blur-3xl opacity-30"></div>
    </div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-10 py-10">

        <div class="mb-8">
            <a href="{{ route('chat-rooms.index') }}" class="inline-flex items-center gap-2 text-blue-600 hover:text-cyan-600 font-black transition">
                <i class="bi bi-arrow-left"></i>
                Kembali ke Chat Rooms
            </a>
        </div>

        <div class="bg-white border border-gray-100 rounded-[2rem] shadow-2xl overflow-hidden">
            <div class="h-2 bg-gradient-to-r from-blue-600 via-cyan-400 to-orange-400"></div>

            <div class="p-8 border-b border-gray-100">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                    <div class="flex items-center gap-5">
                        <div class="w-20 h-20 rounded-3xl bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center text-4xl shadow-xl shadow-blue-500/20">
                            <i class="bi bi-chat-dots-fill"></i>
                        </div>
                        <div>
                            <h1 class="text-4xl font-black text-gray-900">
                                {{ $chatRoom->nama_room }}
                            </h1>
                            <p class="text-gray-500 font-bold mt-3 text-lg">
                                {{ $chatRoom->scholarship->nama_beasiswa ?? 'Beasiswa tidak tersedia' }}
                                •
                                {{ $chatRoom->scholarship->provider->nama_instansi ?? 'Provider tidak tersedia' }}
                            </p>
                        </div>
                    </div>

                    @if($chatRoom->tipe === 'private')
                        <div class="inline-flex items-center gap-2 px-5 py-3 rounded-full bg-red-100 text-red-700 border border-red-200 text-sm font-black">
                            <i class="bi bi-lock-fill"></i>
                            Private Room
                        </div>
                    @else
                        <div class="inline-flex items-center gap-2 px-5 py-3 rounded-full bg-green-100 text-green-700 border border-green-200 text-sm font-black">
                            <i class="bi bi-globe-americas"></i>
                            Public Room
                        </div>
                    @endif
                </div>
            </div>

            @if(session('success'))
                <div class="px-8 pt-8">
                    <div class="bg-green-50 border border-green-200 rounded-3xl p-6">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-2xl bg-green-100 text-green-600 flex items-center justify-center text-2xl">
                                <i class="bi bi-check-circle-fill"></i>
                            </div>
                            <div class="font-black text-green-700">
                                {{ session('success') }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if($errors->any())
                <div class="px-8 pt-8">
                    <div class="bg-red-50 border border-red-200 rounded-3xl p-6">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 rounded-2xl bg-red-100 text-red-500 flex items-center justify-center text-2xl flex-shrink-0">
                                <i class="bi bi-exclamation-circle-fill"></i>
                            </div>
                            <div>
                                <h4 class="font-black text-red-700 text-lg mb-2">Terjadi Kesalahan</h4>
                                <ul class="space-y-1 text-red-600 font-bold text-sm">
                                    @foreach($errors->all() as $error)
                                        <li>• {{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div id="chat-box" class="h-[550px] overflow-y-auto px-8 py-8 space-y-6 bg-gradient-to-b from-gray-50 to-white">
                @forelse($chatRoom->messages->sortBy('waktu_kirim') as $message)
                    @php
                        $isMine = $message->id_user === auth()->id();
                    @endphp

                    <div class="flex {{ $isMine ? 'justify-end' : 'justify-start' }}">
                        <div class="max-w-[85%] flex gap-4 {{ $isMine ? 'flex-row-reverse' : '' }}">
                            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center font-black text-lg shadow-lg shadow-blue-500/20 flex-shrink-0">
                                {{ strtoupper(substr($message->user->name ?? 'U', 0, 1)) }}
                            </div>

                            <div class="rounded-[2rem] px-6 py-5 shadow-lg {{ $isMine ? 'bg-gradient-to-r from-blue-600 to-cyan-500 text-white rounded-br-md' : 'bg-white border border-gray-100 text-gray-900 rounded-bl-md' }}">
                                <div class="flex items-center gap-3 mb-3 flex-wrap">
                                    <span class="font-black text-sm">
                                        {{ $message->user->name ?? 'User' }}
                                    </span>
                                    <span class="text-xs font-bold opacity-70">
                                        {{ $message->waktu_kirim ? \Carbon\Carbon::parse($message->waktu_kirim)->format('d M Y • H:i') : '-' }}
                                    </span>
                                </div>
                                <p class="leading-relaxed whitespace-pre-line font-bold text-sm sm:text-base">
                                    {{ $message->pesan }}
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="h-full flex items-center justify-center text-center">
                        <div>
                            <div class="w-28 h-28 mx-auto rounded-full bg-gray-100 text-gray-400 flex items-center justify-center text-5xl mb-8">
                                <i class="bi bi-chat-square-dots-fill"></i>
                            </div>
                            <h2 class="text-4xl font-black text-gray-900 mb-4">Belum Ada Pesan</h2>
                            <p class="text-gray-500 font-bold text-lg">Kirim pesan pertama di room ini.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="border-t border-gray-100 bg-white p-8">
                <form method="POST" action="{{ route('chat-rooms.messages.store', $chatRoom->id_room) }}">
                    @csrf
                    <div class="flex flex-col lg:flex-row gap-5">
                        <div class="flex-1 relative">
                            <div class="absolute left-5 top-6 text-gray-400">
                                <i class="bi bi-chat-left-text-fill"></i>
                            </div>
                            <textarea name="pesan" rows="3" required placeholder="Tulis pesan..." class="w-full bg-gray-50 border-2 border-gray-200 rounded-[2rem] pl-14 pr-5 py-5 text-gray-900 font-bold placeholder:text-gray-400 resize-none focus:outline-none focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 transition">{{ old('pesan') }}</textarea>
                        </div>

                        <div class="flex items-end">
                            <button type="submit" class="w-full inline-flex items-center justify-center gap-3 px-8 py-5 rounded-2xl bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-blue-700 hover:to-cyan-600 transition text-white font-black shadow-xl shadow-blue-500/20 hover:scale-[1.02]">
                                <i class="bi bi-send-fill"></i>
                                Kirim
                            </button>
                        </div>
                    </div>
                </form>
            </div>
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
