<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $table = 'providers';

    protected $primaryKey = 'id_provider';

    protected $fillable = [
    'nama_instansi',
    'email_kontak',
    'no_hp',
    'website',
    'alamat',
    'deskripsi_instansi',
    'status',
    ];

    public function scholarships()
    {
        return $this->hasMany(
            Scholarship::class,
            'id_provider',
            'id_provider'
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}