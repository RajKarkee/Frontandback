<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CareerController extends Controller
{
    public function index()
    {
        $carrers=DB::table('careers')->where('status','active')->get();
        $carrer_benefits=DB::table('career_benefits')->where('is_active',1)->orderBy('sort_order','asc')->get();
        $carrer_testimonials=DB::table('career_testimonials')->where('is_active',1)->orderBy('sort_order','asc')->get(); 
        return view('new.carrers', [
            'carrers' => $carrers,
            'carrer_benefits' => $carrer_benefits,
            'carrer_testimonials' => $carrer_testimonials,
        ]);
    }
}
