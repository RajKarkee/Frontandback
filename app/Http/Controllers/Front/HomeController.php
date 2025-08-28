<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Insight;
use App\Models\InsightCategory;
use App\Models\HomeSetting;
use App\Models\FooterSetting;


class HomeController extends Controller
{
     public function home()
    {
        $page = Page::where('slug', 'home')->active()->first();
        $homeSetting = HomeSetting::getInstance();
        $footerSetting = FooterSetting::getInstance();

        // dd($homeSetting, $footerSetting);
        return view('new.home', compact('page', 'homeSetting', 'footerSetting'));
    }

}
