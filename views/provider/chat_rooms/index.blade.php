@extends('provider.provider')

@section('content')
<div class="p-6">
    <div class="mb-8">
        <h1 class="text-3xl font-black text-gray-900">Pusat Diskusi</h1>
        <p class="text-gray-500 font-bold">Kelola ruang chat untuk semua program beasiswa Anda</p>
    </div>

    {{-- Form Section --}}
    <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-gray-100 mb-8">
        <form method="POST" action="{{ route('chat-rooms.store', ['id_beasiswa' => 0]) }}" class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
            @csrf
            <div>
                <label class="block text-xs font-black text-gray-400 mb-2 uppercase">Pilih Beasiswa</label>
                <select name="id_beasiswa" required class="w-full bg-gray-50 border-2 border-gray-100 rounded-2xl p-4 font-bold outline-none focus:border-blue-500">
                    <option value="">Pilih Beasiswa</option>
                    @foreach(Auth::user()->provider->scholarships as $s)
                        <option value="{{ $s->id_beasiswa }}">{{ $s->nama_beasiswa }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-xs font-black text-gray-400 mb-2 uppercase">Nama Room</label>
                <input type="text" name="nama_room" required placeholder="Nama Room" class="w-full bg-gray-50 border-2 border-gray-100 rounded-2xl p-4 font-bold outline-none focus:border-blue-500">
            </div>
            <div>
                <label class="block text-xs font-black text-gray-400 mb-2 uppercase">Tipe</label>
                <select name="tipe" class="w-full bg-gray-50 border-2 border-gray-100 rounded-2xl p-4 font-bold outline-none focus:border-blue-500">
                    <option value="public">Public</option>
                    <option value="private">Private</option>
                </select>
            </div>
            <button type="submit" class="w-full bg-gradient-to-r from-cyan-500 to-blue-600 text-white font-black rounded-2xl py-4 hover:shadow-lg hover:shadow-blue-200 transition-all duration-300">
                Simpan
            </button>
        </form>
    </div>

    {{-- Tabel Section (Responsif) --}}
    <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 overflow-x-auto">
        <table class="w-full text-left min-w-[600px]">
            <thead class="bg-gradient-to-r from-cyan-500 to-blue-500 text-white">
                <tr>
                    <th class="px-8 py-5 font-black">NAMA BEASISWA</th>
                    <th class="px-8 py-5 font-black">NAMA ROOM</th>
                    <th class="px-8 py-5 font-black">TIPE</th>
                    <th class="px-8 py-5 font-black text-right">AKSI</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($chatRooms as $room)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-8 py-6 font-bold text-gray-700">{{ $room->scholarship->nama_beasiswa ?? 'N/A' }}</td>
                        <td class="px-8 py-6 font-black text-blue-600">{{ $room->nama_room }}</td>
                        <td class="px-8 py-6">
                            <span class="px-3 py-1 text-[10px] font-black uppercase rounded-full {{ $room->tipe === 'private' ? 'bg-red-100 text-red-600' : 'bg-green-100 text-green-600' }}">
                                {{ $room->tipe }}
                            </span>
                        </td>
                        <td class="px-8 py-6 text-right">
                            <a href="{{ route('chat-rooms.show', $room->id_room) }}" class="inline-block px-6 py-2 bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-black rounded-xl hover:shadow-md transition-all duration-300 text-xs">
                                BUKA
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-8 py-10 text-center text-gray-400 font-bold">Belum ada ruang diskusi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection