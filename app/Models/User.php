<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'status',
        'tanggal_daftar',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'tanggal_daftar' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function provider()
    {
        return $this->hasOne(Provider::class, 'user_id', 'id');
    }

    public function applications()
    {
        return $this->hasMany(Application::class, 'id_user', 'id');
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'id_user', 'id');
    }
}