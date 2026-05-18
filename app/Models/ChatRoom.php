<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{
    protected $table = 'chat_rooms';

    protected $primaryKey = 'id_room';

    public $timestamps = false;

    protected $fillable = [
        'id_beasiswa',
        'dibuat_oleh',
        'nama_room',
        'tipe',
        'tanggal_dibuat',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_dibuat' => 'datetime',
        ];
    }

    public function scholarship()
    {
        return $this->belongsTo(Scholarship::class, 'id_beasiswa', 'id_beasiswa');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'dibuat_oleh', 'id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'id_room', 'id_room');
    }
}