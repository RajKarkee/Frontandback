<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::published()->latest()->paginate(9);
        return view('blogs', compact('blogs'));
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->published()->firstOrFail();
        return view('blog-detail', compact('blog'));
    }
}
