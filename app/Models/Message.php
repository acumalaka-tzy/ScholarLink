<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function room()
    {
        return $this->belongsTo(ChatRoom::class, 'id_room');
    }
}
