<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Provider extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_provider';

    public $timestamps = false;

    protected $fillable = [
    'id_user',
    'nama_instansi',
    'deskripsi_instansi',
    'website',
    'email_kontak',
    'no_hp',
    'alamat',
    'status',
];
}
