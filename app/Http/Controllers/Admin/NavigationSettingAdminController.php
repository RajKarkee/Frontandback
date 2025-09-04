<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NavigationSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NavigationSettingAdminController extends Controller
{
    public function index()
    {
        $navigationSettings = NavigationSetting::ordered()->get();
        return view('admin.navigation-settings.index', compact('navigationSettings'));
    }

    public function edit(NavigationSetting $navigationSetting)
    {
        return view('admin.navigation-settings.edit', compact('navigationSetting'));
    }

    public function update(Request $request, NavigationSetting $navigationSetting)
    {
        $request->validate([
            'page_title' => 'required|string|max:255',
            'route_name' => 'required|string|max:255',
            'icon_class' => 'required|string|max:255',
            'description' => 'required|string',
            'preview_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'tags' => 'nullable|string',
            'sort_order' => 'required|integer|min:0',
        ]);

        $data = $request->only([
            'page_title',
            'route_name', 
            'icon_class',
            'description',
            'tags',
            'sort_order',
            'is_active'
        ]);
        
        // Convert is_active to boolean
        $data['is_active'] = (bool) $data['is_active'];

        // Handle image upload
        if ($request->hasFile('preview_image')) {
            // Delete old image if it exists and is not a URL
            if ($navigationSetting->preview_image && 
                !filter_var($navigationSetting->preview_image, FILTER_VALIDATE_URL) && 
                Storage::disk('public')->exists($navigationSetting->preview_image)) {
                Storage::disk('public')->delete($navigationSetting->preview_image);
            }

            $data['preview_image'] = $request->file('preview_image')->store('navigation', 'public');
        }

        $navigationSetting->update($data);

        return redirect()->route('admin.navigation-settings.index')
            ->with('success', 'Navigation setting updated successfully.');
    }
}
