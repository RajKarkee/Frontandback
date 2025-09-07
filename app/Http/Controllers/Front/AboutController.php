<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
   public function index()
   {
       $about = DB::table('abouts')->where('is_active', '1')->first();
    $about_core_values = DB::table('about_core_values')->where('is_active', '1')->orderBy('sort_order','asc')->get();
    $about_expertise_areas = DB::table('about_expertise_areas')->where('is_active', '1')->orderBy('sort_order','asc')->get();
    $about_team_members = DB::table('about_team_members')->where('is_active', '1')->orderBy('sort_order','asc')->paginate(3);
    $about_why_choose_us = DB::table('about_why_choose_us')->where('is_active', '1')->orderBy('sort_order','asc')->get();
    return view('new.about', compact(
    'about',
    'about_core_values',
    'about_expertise_areas',
    'about_team_members',
    'about_why_choose_us'
));
   }
}
