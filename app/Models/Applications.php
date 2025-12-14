<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Applications extends Model
{
    protected $fillable = ['user_id', 'scholarship_id', 'full_name', 'birthday', 'address', 'contact_number', 'email', 'school_name', 'grade_level', 'gpa', 'date_applied', 'status', 'grade_file'];

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

    public function scholarship()
    {
        return $this->belongsTo(Scholarship::class);
    }

}
