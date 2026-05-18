<?php

namespace App\Http\Controllers;

use App\Models\ChatRoom;
use App\Models\Scholarship;
use App\Models\Message;
use Illuminate\Http\Request;

class ChatRoomController extends Controller
{
    public function index()
    {
        $chatRooms = ChatRoom::with([
            'scholarship.provider',
            'creator',
            'messages.user',
        ])
            ->orderByDesc('tanggal_dibuat')
            ->get();

        $scholarships = Scholarship::with('provider')
            ->orderByDesc('tanggal_dibuat')
            ->get();

        return view('chat_rooms.index', compact('chatRooms', 'scholarships'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_beasiswa' => 'required|exists:scholarships,id_beasiswa',
            'nama_room' => 'required|string|max:255',
            'tipe' => 'required|in:public,private',
        ]);

        ChatRoom::create([
            'id_beasiswa' => $request->id_beasiswa,
            'dibuat_oleh' => auth()->id(),
            'nama_room' => $request->nama_room,
            'tipe' => $request->tipe,
            'tanggal_dibuat' => now(),
        ]);

        return redirect()
            ->route('chat-rooms.index')
            ->with('success', 'Chat room berhasil dibuat.');
    }

    public function show($id)
    {
        $chatRoom = ChatRoom::with([
            'scholarship.provider',
            'creator',
            'messages.user',
        ])
            ->where('id_room', $id)
            ->firstOrFail();

        return view('chat_rooms.show', compact('chatRoom'));
    }

    public function sendMessage(Request $request, $id)
    {
        $request->validate([
            'pesan' => 'required|string|max:2000',
        ]);

        Message::create([
            'id_room' => $id,
            'id_user' => auth()->id(),
            'pesan' => $request->pesan,
            'waktu_kirim' => now(),
        ]);

        return redirect()
            ->route('chat-rooms.show', $id)
            ->with('success', 'Pesan berhasil dikirim.');
    }
}