<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;
    protected $fillable = [
        'parent_name',
        'parent_email',
        'parent_phone',
        'child_name',
        'child_dob',
        'child_gender',
        'address',
        'program',
        'preferred_start_date',
        'message',
        'documents',
        'status',
        'admin_notes',
    ];

    protected $casts = [
        'child_dob' => 'date',
        'preferred_start_date' => 'date',
        'documents' => 'array',
    ];

    // Accessors
    public function getChildDobYearAttribute()
    {
        return $this->child_dob ? $this->child_dob->format('Y') : null;
    }

    // Scopes
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeReviewing($query)
    {
        return $query->where('status', 'reviewing');
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    public function scopeRejected($query)
    {
        return $query->where('status', 'rejected');
    }
}
