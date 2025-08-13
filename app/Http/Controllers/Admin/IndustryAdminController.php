<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class IndustryAdminController extends Controller
{
    public function index()
    {
        $industries = Industry::latest()->paginate(15);
        return view('admin.industries.index', compact('industries'));
    }

    public function create()
    {
        return view('admin.industries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:industries',
            'description' => 'required|string',
            'overview' => 'nullable|string',
            'challenges' => 'nullable|string',
            'solutions' => 'nullable|string',
            'case_studies' => 'nullable|string',
            'key_services' => 'nullable|string',
            'category' => 'nullable|string|max:100',
            'market_size' => 'nullable|string|max:100',
            'growth_rate' => 'nullable|string|max:100',
            'key_players' => 'nullable|string',
            'trends' => 'nullable|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
            'status' => 'required|in:draft,published,archived',
            'sort_order' => 'nullable|integer',
            'is_featured' => 'boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
        ]);

        $data = $request->all();
        $data['slug'] = $data['slug'] ?: Str::slug($data['title']);
        $data['is_featured'] = $request->has('is_featured');

        // Handle file uploads
        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('industries', 'public');
        }

        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('industries/icons', 'public');
        }

        Industry::create($data);

        return redirect()->route('admin.industries.index')
            ->with('success', 'Industry created successfully.');
    }

    public function show(Industry $industry)
    {
        return view('admin.industries.show', compact('industry'));
    }

    public function edit(Industry $industry)
    {
        return view('admin.industries.edit', compact('industry'));
    }

    public function update(Request $request, Industry $industry)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:industries,slug,' . $industry->id,
            'description' => 'required|string',
            'overview' => 'nullable|string',
            'challenges' => 'nullable|string',
            'solutions' => 'nullable|string',
            'case_studies' => 'nullable|string',
            'key_services' => 'nullable|string',
            'category' => 'nullable|string|max:100',
            'market_size' => 'nullable|string|max:100',
            'growth_rate' => 'nullable|string|max:100',
            'key_players' => 'nullable|string',
            'trends' => 'nullable|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
            'status' => 'required|in:draft,published,archived',
            'sort_order' => 'nullable|integer',
            'is_featured' => 'boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
        ]);

        $data = $request->all();
        $data['slug'] = $data['slug'] ?: Str::slug($data['title']);
        $data['is_featured'] = $request->has('is_featured');

        // Handle file uploads
        if ($request->hasFile('featured_image')) {
            if ($industry->featured_image) {
                Storage::disk('public')->delete($industry->featured_image);
            }
            $data['featured_image'] = $request->file('featured_image')->store('industries', 'public');
        }

        if ($request->hasFile('icon')) {
            if ($industry->icon) {
                Storage::disk('public')->delete($industry->icon);
            }
            $data['icon'] = $request->file('icon')->store('industries/icons', 'public');
        }

        $industry->update($data);

        return redirect()->route('admin.industries.index')
            ->with('success', 'Industry updated successfully.');
    }

    public function destroy(Industry $industry)
    {
        // Delete associated images
        if ($industry->featured_image) {
            Storage::disk('public')->delete($industry->featured_image);
        }
        if ($industry->icon) {
            Storage::disk('public')->delete($industry->icon);
        }

        $industry->delete();

        return redirect()->route('admin.industries.index')
            ->with('success', 'Industry deleted successfully.');
    }
}
