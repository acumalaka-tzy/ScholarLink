<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    protected $primaryKey = 'id_beasiswa';

    protected $table = 'scholarships';

    protected $fillable = [
        'id_provider',
        'id_kategori',
        'nama_beasiswa',
        'deskripsi',
        'syarat',
        'benefit',
        'tipe',
        'deadline',
        'tanggal_dibuat',
        'status'
    ];
}
