<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
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
}
