<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeSetting;
use Illuminate\Http\Request;

class HomeSettingAdminController extends Controller
{
    public function index()
    {
        $homeSetting = HomeSetting::getInstance();
        return view('admin.home-settings.index', compact('homeSetting'));
    }

    public function edit()
    {
        $homeSetting = HomeSetting::getInstance();
        return view('admin.home-settings.edit', compact('homeSetting'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'key_statistics_title' => 'required|string|max:255',
            'key_statistics_subtitle' => 'nullable|string',
            'why_choose_us_title' => 'required|string|max:255',
            'why_choose_us_subtitle' => 'nullable|string',
            'statistics' => 'nullable|array',
            'features' => 'nullable|array',
            'features.*.title' => 'required|string|max:255',
            'features.*.description' => 'required|string',
            'features.*.icon' => 'nullable|string|max:255',
        ]);

        $homeSetting = HomeSetting::getInstance();

        // Process statistics
        $statistics = [];
        if ($request->has('statistics')) {
            foreach ($request->statistics as $stat) {
                if (!empty($stat['label']) && !empty($stat['value'])) {
                    $statistics[] = [
                        'label' => $stat['label'],
                        'value' => $stat['value'],
                        'icon' => $stat['icon'] ?? 'chart',
                    ];
                }
            }
        }

        // Process features
        $features = [];
        if ($request->has('features')) {
            foreach ($request->features as $feature) {
                if (!empty($feature['title']) && !empty($feature['description'])) {
                    $features[] = [
                        'title' => $feature['title'],
                        'description' => $feature['description'],
                        'icon' => $feature['icon'] ?? 'check',
                    ];
                }
            }
        }

        $homeSetting->update([
            'key_statistics_title' => $request->key_statistics_title,
            'key_statistics_subtitle' => $request->key_statistics_subtitle,
            'why_choose_us_title' => $request->why_choose_us_title,
            'why_choose_us_subtitle' => $request->why_choose_us_subtitle,
            'statistics' => $statistics,
            'features' => $features,
        ]);

        return redirect()->route('admin.home-settings.index')
            ->with('success', 'Home settings updated successfully.');
    }
}
