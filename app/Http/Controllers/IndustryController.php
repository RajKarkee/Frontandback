<?php

namespace App\Http\Controllers;

use App\Models\Industry;
use Illuminate\Http\Request;

class IndustryController extends Controller
{
    public function index()
    {
        $industries = Industry::active()->ordered()->get();
        return view('industries', compact('industries'));
    }

    public function show($slug)
    {
        $industry = Industry::where('slug', $slug)->active()->firstOrFail();
        return view('industry-detail', compact('industry'));
    }
}
