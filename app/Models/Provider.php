<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $table = 'providers';

    protected $primaryKey = 'id_provider';

    protected $fillable = [
        'nama_instansi',
    ];

    public function scholarships()
    {
        return $this->hasMany(
            Scholarship::class,
            'provider_id',
            'id_provider'
        );
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}