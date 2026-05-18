<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'documents';

    protected $primaryKey = 'id_dokumen';

    protected $fillable = [
        'id_application',
        'jenis_dokumen',
        'nama_file',
        'file_path',
        'tanggal_upload',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_upload' => 'datetime',
        ];
    }

    public function application()
    {
        return $this->belongsTo(Application::class, 'id_application', 'id_application');
    }
}