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
        return view('about', compact('page'));
    }

    public function show($slug)
    {
        $page = Page::where('slug', $slug)->active()->firstOrFail();
        return view('page', compact('page'));
    }
}
