<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $table = 'applications';

    protected $primaryKey = 'id_application';

    protected $fillable = [
        'id_user',
        'id_beasiswa',
        'tanggal_apply',
        'status',
        'catatan',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_apply' => 'datetime',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function scholarship()
    {
        return $this->belongsTo(Scholarship::class, 'id_beasiswa', 'id_beasiswa');
    }

    public function documents()
    {
        return $this->hasMany(Document::class, 'id_application', 'id_application');
    }

    public function statusLogs()
    {
        return $this->hasMany(ApplicationStatusLog::class, 'id_application', 'id_application');
    }
}