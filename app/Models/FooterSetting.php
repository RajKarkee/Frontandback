<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'company_tagline',
        'company_slogan',
        'address',
        'phone',
        'email',
        'social_links',
        'quick_links',
        'copyright_text',
    ];

    protected $casts = [
        'social_links' => 'array',
        'quick_links' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the footer settings instance (singleton pattern)
     */
    public static function getInstance()
    {
        return static::first() ?: static::create([
            'company_name' => 'Roshan Kumar & Associates',
            'company_tagline' => 'Chartered Accountants',
            'company_slogan' => 'Empowering Wealth Creation',
            'address' => 'Kathmandu, Nepal',
            'phone' => '+977-1-XXXXXXX',
            'email' => 'info@charteredinsights.com',
            'social_links' => [
                'facebook' => 'https://facebook.com/charteredinsights',
                'linkedin' => 'https://linkedin.com/company/charteredinsights',
                'twitter' => 'https://twitter.com/charteredinsights',
                'instagram' => 'https://instagram.com/charteredinsights',
            ],
            'quick_links' => [
                ['label' => 'About Us', 'url' => '/about'],
                ['label' => 'Services', 'url' => '/services'],
                ['label' => 'Industries', 'url' => '/industries'],
                ['label' => 'Insights', 'url' => '/insights'],
                ['label' => 'Careers', 'url' => '/careers'],
                ['label' => 'Contact', 'url' => '/contact'],
            ],
            'copyright_text' => '© 2024 Chartered Insights. All rights reserved.',
        ]);
    }

    /**
     * Get social links with defaults
     */
    public function getSocialLinksAttribute($value)
    {
        $decoded = json_decode($value, true);
        return $decoded ?: [];
    }

    /**
     * Get quick links with defaults
     */
    public function getQuickLinksAttribute($value)
    {
        $decoded = json_decode($value, true);
        return $decoded ?: [];
    }
}
