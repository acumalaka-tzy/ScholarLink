<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $table = 'providers';

    protected $primaryKey = 'id_provider';

    protected $fillable = [
        'user_id',
        'nama_instansi',
        'deskripsi_instansi',
        'website',
        'email_kontak',
        'no_hp',
        'alamat',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function scholarships()
    {
        return $this->hasMany(Scholarship::class, 'id_provider', 'id_provider');
    }
}