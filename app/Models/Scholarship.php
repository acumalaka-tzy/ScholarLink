<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    protected $primaryKey = 'id_beasiswa';

    protected $table = 'scholarships';

    protected $fillable = [
        'id_provider',
        'id_kategori',
        'nama_beasiswa',
        'deskripsi',
        'syarat',
        'benefit',
        'tipe',
        'deadline',
        'tanggal_dibuat',
        'status',
    ];

    protected $casts = [
        'deadline' => 'datetime',
    ];

    public function provider()
    {
        return $this->belongsTo(Provider::class, 'id_provider', 'id_provider');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_kategori', 'id_kategory');
    }

    public function applications()
    {
        return $this->hasMany(Application::class, 'id_beasiswa', 'id_beasiswa');
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'id_beasiswa', 'id_beasiswa');
    }

    public function chatRooms()
    {
        return $this->hasMany(ChatRoom::class, 'id_beasiswa', 'id_beasiswa');
    }
}


