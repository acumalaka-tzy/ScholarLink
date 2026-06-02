@extends('layouts.app')

@section('content')
<div class="h-[80vh] max-w-5xl mx-auto p-4 md:p-6 flex flex-col">
    <a href="{{ auth()->user()->role === 'provider' ? route('provider.chat-rooms.index') : route('chat-rooms.index.scholarship', $chatRoom->id_beasiswa) }}" 
        class="mb-4 inline-flex items-center gap-2 text-blue-600 font-black hover:text-cyan-600 transition">
            <i class="bi bi-arrow-left"></i> Kembali ke Chat Rooms
    </a>

    {{-- Main Chat Container --}}
    <div class="flex-1 flex flex-col bg-white rounded-[2rem] shadow-2xl overflow-hidden border border-gray-100">
        {{-- Header --}}
        <div class="p-6 border-b border-gray-100 bg-gray-50 flex justify-between items-center">
            <div>
                <h1 class="text-xl font-black text-gray-900">{{ $chatRoom->nama_room }}</h1>
                <p class="text-xs font-bold text-gray-500">{{ $chatRoom->scholarship->nama_beasiswa ?? 'Room' }}</p>
            </div>
            <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase {{ $chatRoom->tipe === 'private' ? 'bg-red-100 text-red-600' : 'bg-green-100 text-green-600' }}">
                {{ $chatRoom->tipe }}
            </span>
        </div>

        {{-- Messages Area --}}
        <div id="chat-box" class="flex-1 overflow-y-auto p-6 space-y-4 bg-white">
            @forelse($chatRoom->messages->sortBy('waktu_kirim') as $message)
                @php $isMine = $message->id_user === auth()->id(); @endphp
                <div class="flex {{ $isMine ? 'justify-end' : 'justify-start' }}">
                    <div class="max-w-[75%] {{ $isMine ? 'bg-blue-600 text-white rounded-l-2xl rounded-tr-xl' : 'bg-gray-100 text-gray-900 rounded-r-2xl rounded-tl-xl' }} px-5 py-3 shadow-sm">
                        <p class="text-[10px] font-black opacity-70 mb-1">{{ $message->user->name ?? 'User' }}</p>
                        <p class="text-sm font-bold">{{ $message->pesan }}</p>
                    </div>
                </div>
            @empty
                <div class="text-center text-gray-400 font-bold mt-10">Belum ada pesan.</div>
            @endforelse
        </div>

        {{-- Input Area --}}
        <form method="POST" action="{{ route('chat-rooms.messages.store', $chatRoom->id_room) }}" class="p-4 border-t border-gray-100">
            @csrf
            <div class="flex gap-2">
                <input type="text" name="pesan" required placeholder="Tulis pesan..." class="flex-1 bg-gray-50 rounded-xl px-4 py-3 font-bold border-none focus:ring-2 focus:ring-blue-500">
                <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-xl font-black hover:bg-blue-700">
                    <i class="bi bi-send-fill"></i>
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    const chatBox = document.getElementById('chat-box');
    chatBox.scrollTop = chatBox.scrollHeight;
</script>
@endsection