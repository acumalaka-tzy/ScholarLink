<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationStatusLog extends Model
{
    protected $table = 'application_status_logs';

    protected $primaryKey = 'id_log';

    protected $fillable = [
        'id_application',
        'status',
        'catatan',
        'tanggal_status'
    ];

    public $timestamps = true;

    public function application()
    {
        return $this->belongsTo(
            Application::class,
            'id_application',
            'id_application'
        );
    }
}