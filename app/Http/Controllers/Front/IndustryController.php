<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class IndustryController extends Controller
{
    public function index(){
        $industries = DB::table('industries')->where('status', 'active')->orderBy('sort_order', 'asc')->paginate(9);
        $industryExperties=DB::table('industry_expertises')->where('status', 'active')->orderBy('sort_order', 'asc')->paginate(4);

        return view('new.industries', compact('industries','industryExperties'));
    }
}
