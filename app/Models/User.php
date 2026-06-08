<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use App\Notifications\VerifyEmailNotification;
use Illuminate\Support\Facades\URL;
use App\Models\Profile;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'status',
        'provider_status',
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

    public function getDisplayNameAttribute()
    {
        return explode(' ', trim($this->name))[0];
    }

    public function profile()
    {
        return $this->hasOne(Profile::class, 'user_id', 'id');
    }

    public function chatParticipants()
    {
        return $this->hasMany(ChatParticipant::class, 'id_user', 'id');
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmailNotification());
    }
}