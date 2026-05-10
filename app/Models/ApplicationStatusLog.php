<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationStatusLog extends Model
{
    protected $table = 'application_status_log';

    protected $primaryKey = 'id_log';

    protected $fillable = [
        'id_application',
        'status',
        'catatan',
        'waktu'
    ];

    public function application()
    {
        return $this->belongsTo(Application::class, 'id_application');
    }
}