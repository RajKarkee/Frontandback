<?php

namespace App\Http\Controllers;

use App\Models\Insight;
use App\Models\InsightCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class InsightAdminController extends Controller
{
    public function index()
    {
        $insights = Insight::with('insightCategory')
                          ->orderBy('sort_order')
                          ->orderBy('created_at', 'desc')
                          ->paginate(20);

        $categories = InsightCategory::active()->orderBy('sort_order')->get();

        return view('admin.insights.index', compact('insights', 'categories'));
    }

    public function create()
    {
        $categories = InsightCategory::active()->orderBy('sort_order')->get();
        return view('admin.insights.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:insights,slug',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_slug' => 'nullable|exists:insight_categories,slug',
            'author' => 'nullable|string|max:255',
            'published_at' => 'nullable|date',
            'status' => 'required|in:draft,published',
            'is_featured' => 'boolean',
            'sort_order' => 'nullable|integer',
            'read_time' => 'nullable|integer|min:1',
            'meta_description' => 'nullable|string|max:160',
            'tags' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $data = $request->all();

        // Generate slug if not provided
        if (!$data['slug']) {
            $data['slug'] = Str::slug($data['title']);
        }

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('insights', 'public');
        }

        // Convert tags string to array
        if ($data['tags']) {
            $data['tags'] = array_map('trim', explode(',', $data['tags']));
        }

        Insight::create($data);

        return redirect()->route('admin.insights.index')->with('success', 'Insight created successfully!');
    }

    public function show(Insight $insight)
    {
        return view('admin.insights.show', compact('insight'));
    }

    public function edit(Insight $insight)
    {
        $categories = InsightCategory::active()->orderBy('sort_order')->get();

        return view('admin.insights.edit', compact('insight', 'categories'));
    }

    public function update(Request $request, Insight $insight)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:insights,slug,' . $insight->id,
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_slug' => 'nullable|exists:insight_categories,slug',
            'author' => 'nullable|string|max:255',
            'published_at' => 'nullable|date',
            'status' => 'required|in:draft,published',
            'is_featured' => 'boolean',
            'sort_order' => 'nullable|integer',
            'read_time' => 'nullable|integer|min:1',
            'meta_description' => 'nullable|string|max:160',
            'tags' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $data = $request->all();

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            // Delete old image
            if ($insight->featured_image) {
                Storage::disk('public')->delete($insight->featured_image);
            }
            $data['featured_image'] = $request->file('featured_image')->store('insights', 'public');
        }

        // Convert tags string to array
        if ($data['tags']) {
            $data['tags'] = array_map('trim', explode(',', $data['tags']));
        } else {
            $data['tags'] = null;
        }

        $insight->update($data);

        return redirect()->route('admin.insights.index')->with('success', 'Insight updated successfully!');
    }

    public function destroy(Insight $insight)
    {
        // Delete featured image
        if ($insight->featured_image) {
            Storage::disk('public')->delete($insight->featured_image);
        }

        $insight->delete();

        return redirect()->route('admin.insights.index')->with('success', 'Insight deleted successfully!');
    }

    public function toggleStatus(Insight $insight)
    {
        $insight->update(['is_active' => !$insight->is_active]);

        $status = $insight->is_active ? 'activated' : 'deactivated';
        return redirect()->back()->with('success', "Insight {$status} successfully!");
    }

    public function toggleFeatured(Insight $insight)
    {
        $insight->update(['is_featured' => !$insight->is_featured]);

        $status = $insight->is_featured ? 'featured' : 'unfeatured';
        return redirect()->back()->with('success', "Insight {$status} successfully!");
    }

    // Category Management
    public function categories()
    {
        $categories = InsightCategory::orderBy('sort_order')->get();
        return view('admin.insights.categories', compact('categories'));
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:insight_categories,slug',
            'description' => 'nullable|string',
            'icon' => 'nullable|string',
            'color_class' => 'nullable|string|max:50',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        InsightCategory::create($request->all());

        return redirect()->route('admin.insights.categories')->with('success', 'Category created successfully!');
    }

    public function updateCategory(Request $request, InsightCategory $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:insight_categories,slug,' . $category->id,
            'description' => 'nullable|string',
            'icon' => 'nullable|string',
            'color_class' => 'nullable|string|max:50',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $category->update($request->all());

        return redirect()->route('admin.insights.categories')->with('success', 'Category updated successfully!');
    }

    public function destroyCategory(InsightCategory $category)
    {
        // Check if category has insights
        if ($category->insights()->count() > 0) {
            return redirect()->back()->with('error', 'Cannot delete category with insights. Please reassign or delete insights first.');
        }

        $category->delete();

        return redirect()->route('admin.insights.categories')->with('success', 'Category deleted successfully!');
    }

    public function toggleCategoryStatus(InsightCategory $category)
    {
        $category->update(['is_active' => !$category->is_active]);

        $status = $category->is_active ? 'activated' : 'deactivated';
        return redirect()->back()->with('success', "Category {$status} successfully!");
    }
}
