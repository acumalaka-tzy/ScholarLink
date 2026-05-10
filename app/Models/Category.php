<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function scholarships()
{
    return $this->hasMany(Scholarship::class, 'id_kategori');
}
}
