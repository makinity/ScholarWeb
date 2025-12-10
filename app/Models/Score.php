<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable = ['application_id', 'admin_id', 'academic_score', 'income_score', 'interview_score', 'total_score'];
    
}
