<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Insight;
use App\Models\InsightCategory;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $page = Page::where('slug', 'home')->active()->first();
        return view('home', compact('page'));
    }

    public function about()
    {
        $page = Page::where('slug', 'about')->active()->first();

        // Get About page content with all related data
        $about = \App\Models\About::with([
            'coreValues' => function($query) {
                $query->where('is_active', true)->orderBy('sort_order');
            },
            'teamMembers' => function($query) {
                $query->where('is_active', true)->orderBy('sort_order');
            },
            'expertiseAreas' => function($query) {
                $query->where('is_active', true)->orderBy('sort_order');
            },
            'whyChooseUsItems' => function($query) {
                $query->where('is_active', true)->orderBy('sort_order');
            }
        ])->where('is_active', true)->first();

        return view('about', compact('page', 'about'));
    }

    public function insights()
    {
        $page = Page::where('slug', 'insights')->active()->first();

        // Get featured insights (limit to 3 for the main section)
        $featuredInsights = Insight::published()
                                  ->featured()
                                  ->orderBy('sort_order')
                                  ->orderBy('published_at', 'desc')
                                  ->limit(3)
                                  ->get();

        // Get recent insights (limit to 6 for the recent section)
        $recentInsights = Insight::published()
                                ->orderBy('published_at', 'desc')
                                ->limit(6)
                                ->get();

        // Get active categories with insights count
        $categories = InsightCategory::active()
                                   ->orderBy('sort_order')
                                   ->get()
                                   ->map(function ($category) {
                                       $category->insights_count = Insight::published()
                                                                         ->byCategory($category->slug)
                                                                         ->count();
                                       return $category;
                                   });

        return view('insights', compact('page', 'featuredInsights', 'recentInsights', 'categories'));
    }

    public function insightDetail($slug)
    {
        $insight = Insight::where('slug', $slug)
                         ->published()
                         ->with('insightCategory')
                         ->firstOrFail();

        // Get related insights (same category, exclude current)
        $relatedInsights = Insight::published()
                                 ->byCategory($insight->category_slug)
                                 ->where('id', '!=', $insight->id)
                                 ->limit(3)
                                 ->get();

        return view('insight-detail', compact('insight', 'relatedInsights'));
    }

    public function insightsByCategory($categorySlug)
    {
        $category = InsightCategory::where('slug', $categorySlug)
                                  ->active()
                                  ->firstOrFail();

        $insights = Insight::published()
                          ->byCategory($categorySlug)
                          ->orderBy('published_at', 'desc')
                          ->paginate(12);

        return view('insights-category', compact('category', 'insights'));
    }

    public function show($slug)
    {
        $page = Page::where('slug', $slug)->active()->firstOrFail();
        return view('page', compact('page'));
    }
}
