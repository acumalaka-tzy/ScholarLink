<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';

    protected $fillable = [
    'user_id',
    'bio',
    'foto_profil',
    'foto_sampul',
    'universitas',
    'alamat',
    'nomor_telepon',
];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}