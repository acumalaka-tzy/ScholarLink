<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    public function scholarships()
    {
        return $this->hasMany(Scholarship::class, 'id_provider');
    }
}
