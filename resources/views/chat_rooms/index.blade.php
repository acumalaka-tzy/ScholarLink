@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10 py-10">

    <div class="mb-8">
        <a href="{{ route('scholarships.show', $scholarship->id_beasiswa) }}" class="inline-flex items-center gap-2 text-blue-600 hover:text-cyan-600 font-black transition text-lg">
            <i class="bi bi-arrow-left"></i> Kembali ke Beasiswa
        </a>
    </div>

    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6 mb-10">
        <div>
            <div class="flex items-center gap-5">
                <div class="w-16 h-16 rounded-3xl bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center text-3xl shadow-xl shadow-blue-500/20">
                    <i class="bi bi-chat-dots-fill"></i>
                </div>
                <div>
                    <h1 class="text-4xl font-black text-gray-900">Ruang Diskusi</h1>
                    <p class="text-gray-500 font-bold mt-2 text-lg">{{ $scholarship->nama_beasiswa }}</p>
                </div>
            </div>
        </div>

        @if(auth()->user()->role === 'provider')
        <a href="#create-room" class="inline-flex items-center justify-center gap-3 px-7 py-4 rounded-2xl bg-gradient-to-r from-blue-600 to-cyan-500 text-white font-black shadow-xl shadow-blue-500/20 hover:scale-[1.02] transition">
            <i class="bi bi-plus-circle-fill"></i> Buat Room
        </a>
        @endif
    </div>

    @if(session('success'))
        <div class="mb-8 bg-green-50 border border-green-200 rounded-3xl p-6 text-green-700 font-black flex items-center gap-4">
            <i class="bi bi-check-circle-fill text-2xl"></i> {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="mb-8 bg-red-50 border border-red-200 rounded-3xl p-6 text-red-700 font-black flex items-center gap-4">
            <i class="bi bi-exclamation-circle-fill text-2xl"></i> {{ $errors->first() }}
        </div>
    @endif

    @if(auth()->user()->role === 'provider')
    <div id="create-room" class="bg-white border border-gray-100 rounded-[2rem] shadow-2xl overflow-hidden mb-10 scroll-mt-20">
    <div class="h-2 bg-gradient-to-r from-blue-600 to-cyan-500"></div>        <div class="p-8 md:p-10">
        <h2 class="text-2xl font-black text-gray-900 mb-6">Buat Room Diskusi Baru</h2>
            <form method="POST" action="{{ route('chat-rooms.store', $scholarship->id_beasiswa) }}" class="grid md:grid-cols-2 xl:grid-cols-3 gap-6">
                @csrf
                <input type="text" name="nama_room" required placeholder="Nama Room" class="bg-gray-50 border-2 border-gray-200 rounded-2xl p-4 font-bold focus:ring-4 focus:ring-blue-100 outline-none">
                <select name="tipe" class="bg-gray-50 border-2 border-gray-200 rounded-2xl p-4 font-bold focus:ring-4 focus:ring-blue-100 outline-none">
                    <option value="public">Public</option>
                    <option value="private">Private</option>
                </select>
                <button type="submit" class="bg-gradient-to-r from-blue-600 to-cyan-500 text-white font-black rounded-2xl py-4 shadow-lg hover:shadow-blue-500/30 transition">Simpan</button>
            </form>
        </div>
    </div>
    @endif

    <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-8">
        @forelse($chatRooms as $room)
            <a href="{{ route('chat-rooms.show', $room->id_room) }}" class="group block bg-white border border-gray-100 rounded-[2rem] p-8 shadow-lg hover:shadow-2xl transition-all hover:scale-[1.02]">
                <div class="flex justify-between mb-4">
                    <div class="w-12 h-12 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center text-xl">
                        <i class="bi bi-chat-dots-fill"></i>
                    </div>
                    <span class="px-4 py-1 rounded-full text-[10px] font-black uppercase {{ $room->tipe === 'private' ? 'bg-red-100 text-red-700' : 'bg-green-100 text-green-700' }}">
                        {{ $room->tipe }}
                    </span>
                </div>
                <h2 class="text-xl font-black text-gray-900 group-hover:text-blue-600">{{ $room->nama_room }}</h2>
                <div class="pt-5 border-t border-gray-100 text-xs font-black text-gray-400">
                    {{ $room->messages->count() }} Pesan • {{ $room->tanggal_dibuat ? $room->tanggal_dibuat->format('d M Y') : '-' }}
                </div>
            </a>
        @empty
            <div class="col-span-full text-center py-20 text-gray-400 font-bold">Belum ada ruang diskusi untuk beasiswa ini.</div>
        @endforelse
    </div>
</div>
@endsection