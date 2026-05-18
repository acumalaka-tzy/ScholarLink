<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';

    protected $primaryKey = 'id_message';

    public $timestamps = false;

    protected $fillable = [
        'id_room',
        'id_user',
        'pesan',
        'waktu_kirim',
    ];

    protected function casts(): array
    {
        return [
            'waktu_kirim' => 'datetime',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function room()
    {
        return $this->belongsTo(ChatRoom::class, 'id_room', 'id_room');
    }
}