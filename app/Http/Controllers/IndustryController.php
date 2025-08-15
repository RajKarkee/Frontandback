<?php

namespace App\Http\Controllers;

use App\Models\Industry;
use App\Models\IndustryExpertise;
use Illuminate\Http\Request;

class IndustryController extends Controller
{
    public function index()
    {
        $industries = Industry::active()->ordered()->get();
        $expertises = IndustryExpertise::active()->featured()->ordered()->get();

        return view('industries', compact('industries', 'expertises'));
    }

    public function show($slug)
    {
        $industry = Industry::where('slug', $slug)->active()->firstOrFail();
        return view('industry-detail', compact('industry'));
    }
}
