<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutTeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'about_id',
        'name',
        'position',
        'role',
        'bio',
        'image',
        'email',
        'twitter_url',
        'linkedin_url',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Relationship with About
     */
    public function about()
    {
        return $this->belongsTo(About::class);
    }

    /**
     * Scope for active team members
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for ordered team members
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc');
    }
}
