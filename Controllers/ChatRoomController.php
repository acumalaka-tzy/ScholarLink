<?php

namespace App\Http\Controllers;

use App\Models\ChatRoom;
use App\Models\Scholarship;
use App\Models\Message;
use App\Models\ChatParticipant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatRoomController extends Controller
{
    public function providerIndex()
    {
        $user = Auth::user();

        // Pastikan user adalah provider dan punya profil provider
        if (!$user->provider) {
            $chatRooms = collect(); // Kosongkan jika tidak ada data provider
        } else {
            $providerId = $user->provider->id_provider; // Mengambil ID dari model Provider

            $chatRooms = ChatRoom::whereHas('scholarship', function ($query) use ($providerId) {
                $query->where('id_provider', $providerId);
            })
            ->with(['scholarship', 'creator'])
            ->orderByDesc('tanggal_dibuat')
            ->get();
        }

        return view('provider.chat_rooms.index', compact('chatRooms'));
    }

    // index sekarang menerima $id_beasiswa dari route
    public function index($id_beasiswa)
    {
        $user = Auth::user();
        $scholarship = Scholarship::findOrFail($id_beasiswa);
        
        // Ambil room yang hanya milik beasiswa ini dan sesuai hak akses user
        if ($user->role === 'provider') {
            $chatRooms = ChatRoom::where('id_beasiswa', $id_beasiswa)
                ->with(['creator', 'messages.user'])
                ->orderByDesc('tanggal_dibuat')->get();
        } else {
            $chatRooms = ChatRoom::where('id_beasiswa', $id_beasiswa)
                ->where(function($query) use ($user) {
                    $query->where('tipe', 'public')
                         ->orWhereHas('participants', function($q) use ($user) {
                             $q->where('id_user', $user->id);
                         });
                })
                ->orderByDesc('tanggal_dibuat')->get();
        }

        return view('chat_rooms.index', compact('chatRooms', 'scholarship'));
    }

    public function store(Request $request, $id_beasiswa = null)
    {
        // Proteksi: Hanya provider
        if (Auth::user()->role !== 'provider') {
            abort(403, 'Akses tidak diizinkan.');
        }

        $request->validate([
            'id_beasiswa' => 'required|exists:scholarships,id_beasiswa', // Validasi input dropdown
            'nama_room'   => 'required|string|max:255',
            'tipe'        => 'required|in:public,private',
        ]);

        ChatRoom::create([
            'id_beasiswa'    => $request->id_beasiswa,
            'dibuat_oleh'    => Auth::id(),
            'nama_room'      => $request->nama_room,
            'tipe'           => $request->tipe,
            'tanggal_dibuat' => now(),
        ]);

        // Jika datang dari halaman provider, kembalikan ke sana
        if ($id_beasiswa == 0 || $id_beasiswa == null) {
            return redirect()->route('provider.chat-rooms.index')->with('success', 'Room berhasil dibuat.');
        }

        return redirect()->route('chat-rooms.index.scholarship', $id_beasiswa)->with('success', 'Room berhasil dibuat.');
    }

    public function show($id)
    {
        $chatRoom = ChatRoom::with(['scholarship.provider', 'creator', 'messages.user'])
            ->where('id_room', $id)
            ->firstOrFail();

        // Proteksi Akses Private Room
        if ($chatRoom->tipe === 'private') {
            $isParticipant = ChatParticipant::where('id_room', $id)
                ->where('id_user', Auth::id())->exists();
            $isOwner = ($chatRoom->dibuat_oleh === Auth::id());

            if (!$isParticipant && !$isOwner) {
                return redirect()->back()->with('error', 'Anda tidak memiliki akses.');
            }
        }

        return view('chat_rooms.show', compact('chatRoom'));
    }

    public function sendMessage(Request $request, $id)
    {
        $request->validate(['pesan' => 'required|string|max:2000']);
        $chatRoom = ChatRoom::where('id_room', $id)->firstOrFail();

        // Pastikan user adalah peserta sebelum kirim pesan
        if ($chatRoom->tipe === 'private') {
            $isAllowed = ChatParticipant::where('id_room', $id)->where('id_user', Auth::id())->exists() 
                       || $chatRoom->dibuat_oleh === Auth::id();
            if (!$isAllowed) abort(403);
        }

        Message::create([
            'id_room' => $chatRoom->id_room,
            'id_user' => Auth::id(),
            'pesan' => $request->pesan,
            'waktu_kirim' => now(),
        ]);

        return redirect()->route('chat-rooms.show', $chatRoom->id_room);
    }
}