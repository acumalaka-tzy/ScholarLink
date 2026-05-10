<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    protected $primaryKey = 'id_beasiswa';

    protected $table = 'scholarships';

    protected $fillable = [
        'nama_beasiswa',
        'deskripsi',
        'provider_id',
        'category_id',
        'deadline',
    ];

    public function provider()
    {
        return $this->belongsTo(Provider::class, 'id_provider');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_kategori');
    }

    public function applications()
    {
        return $this->hasMany(Application::class, 'id_beasiswa');
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'id_beasiswa');
    }

    public function chatRooms()
    {
        return $this->hasMany(ChatRoom::class, 'id_beasiswa');
    }
}


