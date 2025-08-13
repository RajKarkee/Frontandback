<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    public function index()
    {
        $offices = Office::active()->get();
        return view('offices', compact('offices'));
    }

    public function show($slug)
    {
        $office = Office::where('slug', $slug)->active()->firstOrFail();
        return view('office-detail', compact('office'));
    }
}
