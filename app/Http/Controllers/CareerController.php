<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::active()->latest()->paginate(10);
        return view('careers', compact('careers'));
    }

    public function show($slug)
    {
        $career = Career::where('slug', $slug)->active()->firstOrFail();
        return view('career-detail', compact('career'));
    }
}
