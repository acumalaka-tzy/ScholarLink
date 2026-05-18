<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Chat Rooms - ScholarLink</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-950 text-white min-h-screen">

    <div class="max-w-7xl mx-auto px-6 py-10">

        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-5 mb-8">
            <div>
                <a href="{{ url('/') }}" class="text-indigo-300 hover:text-indigo-200 font-semibold">
                    ← Kembali ke Home
                </a>

                <h1 class="text-4xl font-black mt-4">
                    Chat Rooms
                </h1>

                <p class="text-slate-400 mt-2">
                    Ruang diskusi beasiswa untuk provider dan mahasiswa.
                </p>
            </div>

            <a
                href="#create-room"
                class="px-6 py-3 rounded-2xl bg-indigo-600 hover:bg-indigo-700 transition font-bold text-center"
            >
                + Buat Room
            </a>
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

        <div id="create-room" class="bg-slate-900 border border-slate-800 rounded-3xl p-6 mb-10 scroll-mt-10">
            <h2 class="text-2xl font-black mb-5">
                Buat Chat Room Baru
            </h2>

            <form method="POST" action="{{ route('chat-rooms.store') }}" class="grid md:grid-cols-4 gap-4">
                @csrf

                <div>
                    <label class="block text-sm text-slate-400 mb-2">
                        Beasiswa
                    </label>

                    <select
                        name="id_beasiswa"
                        required
                        class="w-full rounded-xl bg-slate-950 border border-slate-700 px-4 py-3 text-white"
                    >
                        <option value="">Pilih Beasiswa</option>

                        @foreach($scholarships as $scholarship)
                            <option value="{{ $scholarship->id_beasiswa }}" {{ old('id_beasiswa') == $scholarship->id_beasiswa ? 'selected' : '' }}>
                                {{ $scholarship->nama_beasiswa }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm text-slate-400 mb-2">
                        Nama Room
                    </label>

                    <input
                        type="text"
                        name="nama_room"
                        value="{{ old('nama_room') }}"
                        required
                        placeholder="Contoh: Diskusi Beasiswa"
                        class="w-full rounded-xl bg-slate-950 border border-slate-700 px-4 py-3 text-white"
                    >
                </div>

                <div>
                    <label class="block text-sm text-slate-400 mb-2">
                        Tipe
                    </label>

                    <select
                        name="tipe"
                        required
                        class="w-full rounded-xl bg-slate-950 border border-slate-700 px-4 py-3 text-white"
                    >
                        <option value="public" {{ old('tipe') === 'public' ? 'selected' : '' }}>
                            Public
                        </option>

                        <option value="private" {{ old('tipe') === 'private' ? 'selected' : '' }}>
                            Private
                        </option>
                    </select>
                </div>

                <div class="flex items-end">
                    <button
                        type="submit"
                        class="w-full px-6 py-3 rounded-xl bg-indigo-600 hover:bg-indigo-700 transition font-bold"
                    >
                        Simpan
                    </button>
                </div>
            </form>
        </div>

        <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6">
            @forelse($chatRooms as $room)
                <a
                    href="{{ route('chat-rooms.show', $room->id_room) }}"
                    class="block bg-slate-900 border border-slate-800 rounded-3xl p-6 hover:border-indigo-500 transition"
                >
                    <div class="flex items-start justify-between gap-4 mb-5">
                        <div class="w-14 h-14 rounded-2xl bg-indigo-500/15 flex items-center justify-center text-3xl">
                            💬
                        </div>

                        <span class="px-3 py-1 rounded-full text-xs font-bold {{ $room->tipe === 'private' ? 'bg-rose-500/15 text-rose-300' : 'bg-emerald-500/15 text-emerald-300' }}">
                            {{ ucfirst($room->tipe ?? 'public') }}
                        </span>
                    </div>

                    <h2 class="text-xl font-black mb-2">
                        {{ $room->nama_room }}
                    </h2>

                    <p class="text-slate-400 text-sm mb-4">
                        {{ $room->scholarship->nama_beasiswa ?? '-' }}
                    </p>

                    <div class="flex items-center justify-between text-sm text-slate-400">
                        <span>
                            {{ $room->messages->count() }} pesan
                        </span>

                        <span>
                            {{ $room->tanggal_dibuat ? \Carbon\Carbon::parse($room->tanggal_dibuat)->format('d M Y') : '-' }}
                        </span>
                    </div>
                </a>
            @empty
                <div class="md:col-span-2 xl:col-span-3 bg-slate-900 border border-slate-800 rounded-3xl p-12 text-center">
                    <div class="text-6xl mb-5">
                        📭
                    </div>

                    <h2 class="text-2xl font-black">
                        Belum ada chat room
                    </h2>

                    <p class="text-slate-400 mt-2">
                        Isi form di atas lalu klik Simpan.
                    </p>
                </div>
            @endforelse
        </div>

    </div>

</body>
</html>