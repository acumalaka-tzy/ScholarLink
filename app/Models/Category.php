<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $primaryKey = 'id_kategori';

    protected $fillable = [
        'nama_kategori',
    ];

    public function scholarships()
    {
        return $this->hasMany(
            Scholarship::class,
            'id_kategori',
            'id_kategori'
        );
    }
}