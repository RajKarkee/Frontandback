<?php

namespace App\Http\Controllers;

use App\Models\Page;
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

    public function show($slug)
    {
        $page = Page::where('slug', $slug)->active()->firstOrFail();
        return view('page', compact('page'));
    }
}
