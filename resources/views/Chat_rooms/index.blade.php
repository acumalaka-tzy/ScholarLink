<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Rooms - ScholarLink</title>

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
<body class="min-h-screen bg-[#f4f7f9] overflow-x-hidden">

    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute top-0 left-0 w-96 h-96 bg-cyan-200 rounded-full blur-3xl opacity-30"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-orange-200 rounded-full blur-3xl opacity-30"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10 py-10">

        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6 mb-10">
            <div>
                <a href="{{ url('/') }}" class="inline-flex items-center gap-2 text-blue-600 hover:text-cyan-600 font-black transition">
                    <i class="bi bi-arrow-left"></i>
                    Kembali ke Home
                </a>
                <div class="flex items-center gap-5 mt-6">
                    <div class="w-16 h-16 rounded-3xl bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center text-3xl shadow-xl shadow-blue-500/20">
                        <i class="bi bi-chat-dots-fill"></i>
                    </div>
                    <div>
                        <h1 class="text-4xl font-black text-gray-900">Chat Rooms</h1>
                        <p class="text-gray-500 font-bold mt-2 text-lg">
                            Ruang diskusi beasiswa untuk provider dan mahasiswa.
                        </p>
                    </div>
                </div>
            </div>

            <a href="#create-room" class="inline-flex items-center justify-center gap-3 px-7 py-4 rounded-2xl bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-blue-700 hover:to-cyan-600 transition text-white font-black shadow-xl shadow-blue-500/20 hover:scale-[1.02]">
                <i class="bi bi-plus-circle-fill"></i>
                Buat Room
            </a>
        </div>

        @if(session('success'))
            <div class="mb-8 bg-green-50 border border-green-200 rounded-3xl p-6">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-green-100 text-green-600 flex items-center justify-center text-2xl">
                        <i class="bi bi-check-circle-fill"></i>
                    </div>
                    <div class="font-black text-green-700">
                        {{ session('success') }}
                    </div>
                </div>
            </div>
        @endif

        @if($errors->any())
            <div class="mb-8 bg-red-50 border border-red-200 rounded-3xl p-6">
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
        @endif

        <div id="create-room" class="bg-white border border-gray-100 rounded-[2rem] shadow-2xl overflow-hidden mb-10 scroll-mt-10">
            <div class="h-2 bg-gradient-to-r from-blue-600 via-cyan-400 to-orange-400"></div>
            <div class="p-8 md:p-10">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-16 h-16 rounded-3xl bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center text-3xl shadow-xl shadow-blue-500/20">
                        <i class="bi bi-plus-square-fill"></i>
                    </div>
                    <div>
                        <h2 class="text-3xl font-black text-gray-900">Buat Chat Room Baru</h2>
                        <p class="text-gray-500 font-bold mt-1">Buat ruang diskusi baru untuk scholarship.</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('chat-rooms.store') }}" class="grid md:grid-cols-2 xl:grid-cols-4 gap-6">
                    @csrf
                    <div>
                        <label class="block text-sm font-black text-gray-700 mb-3">Beasiswa</label>
                        <div class="relative">
                            <div class="absolute left-5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                <i class="bi bi-mortarboard-fill"></i>
                            </div>
                            <select name="id_beasiswa" required class="w-full appearance-none bg-gray-50 border-2 border-gray-200 rounded-2xl pl-14 pr-12 py-4 font-bold text-gray-900 focus:outline-none focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 transition">
                                <option value="">Pilih Beasiswa</option>
                                @foreach($scholarships as $scholarship)
                                    <option value="{{ $scholarship->id_beasiswa }}" {{ old('id_beasiswa') == $scholarship->id_beasiswa ? 'selected' : '' }}>
                                        {{ $scholarship->nama_beasiswa }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="absolute right-5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                <i class="bi bi-chevron-down"></i>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-black text-gray-700 mb-3">Nama Room</label>
                        <div class="relative">
                            <div class="absolute left-5 top-1/2 -translate-y-1/2 text-gray-400">
                                <i class="bi bi-chat-left-text-fill"></i>
                            </div>
                            <input type="text" name="nama_room" value="{{ old('nama_room') }}" required placeholder="Contoh: Diskusi Beasiswa" class="w-full bg-gray-50 border-2 border-gray-200 rounded-2xl pl-14 pr-5 py-4 font-bold text-gray-900 placeholder:text-gray-400 focus:outline-none focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 transition">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-black text-gray-700 mb-3">Tipe</label>
                        <div class="relative">
                            <div class="absolute left-5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                <i class="bi bi-globe-americas"></i>
                            </div>
                            <select name="tipe" required class="w-full appearance-none bg-gray-50 border-2 border-gray-200 rounded-2xl pl-14 pr-12 py-4 font-bold text-gray-900 focus:outline-none focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 transition">
                                <option value="public" {{ old('tipe') === 'public' ? 'selected' : '' }}>Public</option>
                                <option value="private" {{ old('tipe') === 'private' ? 'selected' : '' }}>Private</option>
                            </select>
                            <div class="absolute right-5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                <i class="bi bi-chevron-down"></i>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-end">
                        <button type="submit" class="w-full inline-flex items-center justify-center gap-3 px-6 py-4 rounded-2xl bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-blue-700 hover:to-cyan-600 transition text-white font-black shadow-xl shadow-blue-500/20 hover:scale-[1.02]">
                            <i class="bi bi-save-fill"></i>
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-8">
            @forelse($chatRooms as $room)
                <a href="{{ route('chat-rooms.show', $room->id_room) }}" class="group block bg-white border border-gray-100 rounded-[2rem] p-8 shadow-2xl hover:shadow-[0_25px_60px_rgba(59,130,246,0.18)] hover:-translate-y-1 transition duration-300 overflow-hidden relative">
                    <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-blue-600 via-cyan-400 to-orange-400"></div>
                    <div class="flex items-start justify-between gap-4 mb-6">
                        <div class="w-16 h-16 rounded-3xl bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center text-3xl shadow-lg shadow-blue-500/20">
                            <i class="bi bi-chat-dots-fill"></i>
                        </div>

                        @if($room->tipe === 'private')
                            <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-red-100 text-red-700 border border-red-200 text-xs font-black">
                                <i class="bi bi-lock-fill"></i>
                                Private
                            </span>
                        @else
                            <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-green-100 text-green-700 border border-green-200 text-xs font-black">
                                <i class="bi bi-globe-americas"></i>
                                Public
                            </span>
                        @endif
                    </div>

                    <h2 class="text-2xl font-black text-gray-900 mb-3 group-hover:text-blue-600 transition">
                        {{ $room->nama_room }}
                    </h2>
                    <p class="text-gray-500 font-bold mb-6">
                        {{ $room->scholarship->nama_beasiswa ?? '-' }}
                    </p>

                    <div class="flex items-center justify-between pt-5 border-t border-gray-100">
                        <div class="flex items-center gap-2 text-gray-500 font-bold text-sm">
                            <i class="bi bi-chat-left-dots-fill text-blue-600"></i>
                            {{ $room->messages->count() }} pesan
                        </div>
                        <div class="flex items-center gap-2 text-gray-500 font-bold text-sm">
                            <i class="bi bi-calendar-event-fill text-orange-500"></i>
                            {{ $room->tanggal_dibuat ? \Carbon\Carbon::parse($room->tanggal_dibuat)->format('d M Y') : '-' }}
                        </div>
                    </div>
                </a>
            @empty
                <div class="md:col-span-2 xl:col-span-3 bg-white border border-gray-100 rounded-[2rem] p-16 text-center shadow-2xl">
                    <div class="w-28 h-28 mx-auto rounded-full bg-gray-100 text-gray-400 flex items-center justify-center text-5xl mb-8">
                        <i class="bi bi-chat-square-dots-fill"></i>
                    </div>
                    <h2 class="text-4xl font-black text-gray-900 mb-4">Belum Ada Chat Room</h2>
                    <p class="text-gray-500 font-bold text-lg mb-8">Isi form di atas lalu klik Simpan.</p>
                    <a href="#create-room" class="inline-flex items-center gap-3 px-7 py-4 rounded-2xl bg-gradient-to-r from-blue-600 to-cyan-500 text-white font-black shadow-xl shadow-blue-500/20 hover:scale-[1.02] transition">
                        <i class="bi bi-plus-circle-fill"></i>
                        Buat Room
                    </a>
                </div>
            @endforelse
        </div>

    </div>

</body>
</html>
