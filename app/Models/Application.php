<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function scholarship()
    {
        return $this->belongsTo(Scholarship::class, 'id_beasiswa');
    }

    public function documents()
    {
        return $this->hasMany(Document::class, 'id_application');
    }
}
