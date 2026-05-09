<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'university',
        'location',
        'level',
        'field',
        'benefit_amount',
        'benefit_type',
        'deadline',
        'requirements',
        'status',
        'available_slots',
        'image_url',
        'is_featured',
    ];

    protected $casts = [
        'deadline' => 'date',
        'is_featured' => 'boolean',
        'benefit_amount' => 'decimal:2',
    ];

    // Scope untuk beasiswa aktif
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    // Scope untuk beasiswa featured
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
}
