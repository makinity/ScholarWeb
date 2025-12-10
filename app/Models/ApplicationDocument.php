<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationDocument extends Model
{
    protected $fillable = ['application_id', 'id_document', 'grades_document', 'income_proof'];
    
    public function application()
    {
        return $this->belongsTo(Application::class);
    }

}
