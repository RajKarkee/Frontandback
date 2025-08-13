<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Insight;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class InsightAdminController extends Controller
{
    public function index()
    {
        $insights = Insight::latest()->paginate(15);
        return view('admin.insights.index', compact('insights'));
    }

    public function create()
    {
        return view('admin.insights.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:insights',
            'content' => 'required|string',
            'summary' => 'nullable|string',
            'key_takeaways' => 'nullable|string',
            'references' => 'nullable|string',
            'author' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:100',
            'type' => 'nullable|string|max:50',
            'reading_time' => 'nullable|string|max:50',
            'tags' => 'nullable|string',
            'published_at' => 'nullable|date',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published,archived',
            'is_featured' => 'boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
        ]);

        $data = $request->all();
        $data['slug'] = $data['slug'] ?: Str::slug($data['title']);
        $data['is_featured'] = $request->has('is_featured');

        // Handle file upload
        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('insights', 'public');
        }

        Insight::create($data);

        return redirect()->route('admin.insights.index')
            ->with('success', 'Insight created successfully.');
    }

    public function show(Insight $insight)
    {
        return view('admin.insights.show', compact('insight'));
    }

    public function edit(Insight $insight)
    {
        return view('admin.insights.edit', compact('insight'));
    }

    public function update(Request $request, Insight $insight)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:insights,slug,' . $insight->id,
            'content' => 'required|string',
            'summary' => 'nullable|string',
            'key_takeaways' => 'nullable|string',
            'references' => 'nullable|string',
            'author' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:100',
            'type' => 'nullable|string|max:50',
            'reading_time' => 'nullable|string|max:50',
            'tags' => 'nullable|string',
            'published_at' => 'nullable|date',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published,archived',
            'is_featured' => 'boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
        ]);

        $data = $request->all();
        $data['slug'] = $data['slug'] ?: Str::slug($data['title']);
        $data['is_featured'] = $request->has('is_featured');

        // Handle file upload
        if ($request->hasFile('featured_image')) {
            if ($insight->featured_image) {
                Storage::disk('public')->delete($insight->featured_image);
            }
            $data['featured_image'] = $request->file('featured_image')->store('insights', 'public');
        }

        $insight->update($data);

        return redirect()->route('admin.insights.index')
            ->with('success', 'Insight updated successfully.');
    }

    public function destroy(Insight $insight)
    {
        // Delete associated image
        if ($insight->featured_image) {
            Storage::disk('public')->delete($insight->featured_image);
        }

        $insight->delete();

        return redirect()->route('admin.insights.index')
            ->with('success', 'Insight deleted successfully.');
    }
}
