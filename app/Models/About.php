<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'our_story_title',
        'our_story_content',
        'our_story_image',
        'core_values_title',
        'core_values_subtitle',
        'leadership_title',
        'leadership_subtitle',
        'expertise_title',
        'expertise_subtitle',
        'why_choose_us_title',
        'why_choose_us_subtitle',
        'cta_title',
        'cta_subtitle',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the active about page content
     */
    public static function getActive()
    {
        return self::where('is_active', true)->first();
    }

    /**
     * Relationship with core values
     */
    public function coreValues()
    {
        return $this->hasMany(AboutCoreValue::class);
    }

    /**
     * Relationship with team members
     */
    public function teamMembers()
    {
        return $this->hasMany(AboutTeamMember::class);
    }

    /**
     * Relationship with expertise areas
     */
    public function expertiseAreas()
    {
        return $this->hasMany(AboutExpertiseArea::class);
    }

    /**
     * Relationship with why choose us items
     */
    public function whyChooseUsItems()
    {
        return $this->hasMany(AboutWhyChooseUs::class);
    }
}
