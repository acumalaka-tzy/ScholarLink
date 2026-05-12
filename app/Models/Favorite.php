<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $table = 'favorites';

    protected $primaryKey = 'id_favorite';

    protected $fillable = [
        'id_user',
        'id_beasiswa'
    ];

    // Relasi user
    public function user()
    {
        return $this->belongsTo(
            User::class,
            'id_user',
            'id'
        );
    }

    // Relasi scholarship
    public function scholarship()
    {
        return $this->belongsTo(
            Scholarship::class,
            'id_beasiswa',
            'id_beasiswa'
        );
    }
}