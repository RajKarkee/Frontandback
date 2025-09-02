<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Insight;
use App\Models\InsightCategory;
use App\Models\HomeSetting;
use App\Models\FooterSetting;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home()
    {
        $page = Page::where('slug', 'home')->active()->first();
        $homeSetting = HomeSetting::getInstance();
        $services=DB::table('services')->where('status','active')->orderBy('sort_order','asc')->paginate(6);
        $why_choose_us=DB::table('about_why_choose_us')->where('is_active',1)->orderBy('sort_order','asc')->paginate(4);
        $industries=DB::table('industries')->where('status','active')->where('is_featured',1)->orderBy('sort_order','asc')->paginate('4');
        $jumbotrons=DB::table('jumbotrons')->where('page_slug','home')->where('is_active',1)->orderBy('sort_order','asc')->get();
        
        // Get the statistics JSON from database
        $statsData = DB::table('home_settings')->select('statistics')->first();
        
        // Decode the JSON to get the actual array
        $stats = $statsData ? json_decode($statsData->statistics, true) : [];
        
        $footerSetting = FooterSetting::getInstance();

        return view('new.home', compact('page', 'homeSetting', 'footerSetting', 'stats','services','why_choose_us','industries','jumbotrons'));
    }
}