<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminLog extends Model
{
    protected $table = 'admin_logs';

    protected $primaryKey = 'id_log';

    protected $fillable = [
        'id_admin',
        'aktivitas',
        'keterangan',
        'waktu'
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'id_admin');
    }
}