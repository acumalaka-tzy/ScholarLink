<?php

namespace App\Http\Controllers;

use App\Models\ChatRoom;
use App\Models\Scholarship;
use App\Models\Message;
use App\Models\ChatParticipant;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatRoomController extends Controller
{
    public function providerIndex()
    {
        $user = Auth::user();

        if (!$user->provider) {
            $chatRooms = collect(); 
        } else {
            $providerId = $user->provider->id_provider; 

            $chatRooms = ChatRoom::whereHas('scholarship', function ($query) use ($providerId) {
                $query->where('id_provider', $providerId);
            })
            ->with(['scholarship', 'creator'])
            ->orderByDesc('tanggal_dibuat')
            ->get();
        }

        return view('provider.chat_rooms.index', compact('chatRooms'));
    }

    public function index($id_beasiswa)
    {
        $user = Auth::user();
        $scholarship = Scholarship::findOrFail($id_beasiswa);
        
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
        if (Auth::user()->role !== 'provider') {
            abort(403, 'Akses tidak diizinkan.');
        }

        $request->validate([
            'id_beasiswa' => 'required|exists:scholarships,id_beasiswa',
            'nama_room'   => 'required|string|max:255',
            'tipe'        => 'required|in:public,private',
        ]);

        $room = ChatRoom::create([
            'id_beasiswa'    => $request->id_beasiswa,
            'dibuat_oleh'    => Auth::id(),
            'nama_room'      => $request->nama_room,
            'tipe'           => $request->tipe,
            'tanggal_dibuat' => now(),
        ]);

                // Jika room private, masukkan semua pendaftar beasiswa sebagai peserta
        if ($request->tipe === 'private') {

            $applications = Application::where(
                'id_beasiswa',
                $request->id_beasiswa
            )->get();

            foreach ($applications as $application) {

                ChatParticipant::firstOrCreate([
                    'id_room' => $room->id_room,
                    'id_user' => $application->id_user,
                ]);
            }
        }

        // Jika datang dari halaman provider, kembalikan ke sana
        if ($id_beasiswa == 0 || $id_beasiswa == null) {
            return redirect()
                ->route('provider.chat-rooms.index')
                ->with('success', 'Room berhasil dibuat.');
        }

        return redirect()
            ->route('chat-rooms.index.scholarship', $id_beasiswa)
            ->with('success', 'Room berhasil dibuat.');
    }
    
    public function show($id)
    {
        $chatRoom = ChatRoom::with(['scholarship.provider', 'creator', 'messages.user'])
            ->where('id_room', $id)
            ->firstOrFail();

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

        if ($chatRoom->tipe === 'private') {
            $isAllowed = ChatParticipant::where('id_room', $id)->where('id_user', Auth::id())->exists() 
                       || $chatRoom->dibuat_oleh === Auth::id();
            if (!$isAllowed) abort(403);
        }

        // Daftar kata tidak sopan dari config
        $badWords = config('profanity', []);

        $pesan = $request->pesan;

        // Ganti kata-kata kotor dengan asterisks (case-insensitive)
        foreach ($badWords as $word) {
            $pattern = '/\b' . preg_quote($word, '/') . '\b/i';
            $replacement = str_repeat('*', mb_strlen($word));
            $pesan = preg_replace($pattern, $replacement, $pesan);
        }

        Message::create([
            'id_room' => $chatRoom->id_room,
            'id_user' => Auth::id(),
            'pesan' => $pesan,
            'waktu_kirim' => now(),
        ]);

        return redirect()->route('chat-rooms.show', $chatRoom->id_room);
    }
}