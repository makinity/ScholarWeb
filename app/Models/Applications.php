<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Applications extends Model
{
    protected $fillable = ['user_id', 'fullname', 'birthday', 'address', 'contact_number', 'email', 'school_name', 'grade_level', 'gpa', 'date_applied', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function documents()
    {
        return $this->hasOne(ApplicationDocument::class);
    }

    public function score()
    {
        return $this->hasOne(Score::class);
    }

}
