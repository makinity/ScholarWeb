<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'category',
        'award_amount',
        'award_description',
        'deadline',
        'status',
        'applicants_count',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'award_amount' => 'decimal:2',
        'deadline' => 'date',
        'applicants_count' => 'integer',
    ];

    /**
     * Relationships
     */
    
    /**
     * Get applications for this scholarship
     */
    public function applications()
    {
        return $this->hasMany(Applications::class);
    }
    
    /**
     * Scope for active scholarships
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
    
    /**
     * Scope for ending soon scholarships (deadline within 7 days)
     */
    public function scopeEndingSoon($query)
    {
        return $query->where('status', 'active')
                     ->where('deadline', '<=', now()->addDays(7))
                     ->where('deadline', '>', now());
    }
    
    /**
     * Check if scholarship is active and accepting applications
     */
    public function isAcceptingApplications()
    {
        return $this->status === 'active' && $this->deadline > now();
    }
    
    /**
     * Automatically update status based on deadline
     */
    public function updateStatus()
    {
        if ($this->deadline < now()) {
            $this->status = 'closed';
        } elseif ($this->deadline <= now()->addDays(7)) {
            $this->status = 'ending_soon';
        } else {
            $this->status = 'active';
        }
        $this->save();
    }
}