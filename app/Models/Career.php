<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'department',
        'location',
        'employment_type',
        'salary_min',
        'salary_max',
        'requirements',
        'status',
    ];

    protected $casts = [
        'salary_min' => 'decimal:2',
        'salary_max' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}
