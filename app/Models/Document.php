<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public function application()
    {
        return $this->belongsTo(Application::class, 'id_application');
    }
}
