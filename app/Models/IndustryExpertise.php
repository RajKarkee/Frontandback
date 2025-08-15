<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndustryExpertise extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'description',
        'svg_icon',
        'icon_class',
        'sort_order',
        'status',
        'is_featured',
        'color_theme',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'sort_order' => 'integer',
    ];

    // Scopes for querying
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc')->orderBy('id', 'asc');
    }

    // Accessor for display order
    public function getDisplayOrderAttribute()
    {
        return $this->sort_order ?: 999;
    }
}
