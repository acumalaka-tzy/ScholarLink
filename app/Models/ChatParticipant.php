<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatParticipant extends Model
{
    protected $table = 'chat_participants';

    protected $fillable = [
        'id_room',
        'id_user'
    ];

    public function room()
    {
        return $this->belongsTo(ChatRoom::class, 'id_room');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}