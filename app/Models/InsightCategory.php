<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsightCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'color_class',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get active categories
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Get insights in this category
     */
    public function insights()
    {
        return $this->hasMany(Insight::class, 'category_slug', 'slug');
    }

    /**
     * Get published insights count
     */
    public function getInsightsCountAttribute()
    {
        return $this->insights()->published()->count();
    }
}
