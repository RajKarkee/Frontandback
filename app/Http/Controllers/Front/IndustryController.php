<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class IndustryController extends Controller
{
    public function index(){
        $industries = DB::table('industries')->where('status', 'active')->orderBy('sort_order', 'asc')->get();
        $industryExperties=DB::table('industry_expertises')->where('status', 'active')->orderBy('sort_order', 'asc')->paginate(4);
        $jumbotrons=DB::table('jumbotrons')->where('page_slug','industries')->where('is_active',1)->orderBy('sort_order','asc')->get();
        return view('new.industries', compact('industries','industryExperties','jumbotrons'));
    }
    public function getAll(Request $request){
        if($request->ajax()){
            $industries = DB::table('industries')->where('status', 'active')->orderBy('sort_order', 'asc')->get();
            $industriesHtml = '';
            foreach ($industries as $index => $industry) {
                $delay = $index * 0.2;
                $svgIcon = $industry->svg_icon ? Storage::url($industry->svg_icon) : '';
                $industriesHtml .= '<div class="col-12 col-md-6 col-lg-4 gsap-animate">';
                $industriesHtml .= '<div class="industry-card">';
                if ($industry->svg_icon) {
                    $industriesHtml .= '<svg class="service-icon" width="40" height="40" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">';
                    $industriesHtml .= '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="' . htmlspecialchars($industry->svg_icon) . '" />';
                    $industriesHtml .= '</svg>';
                } elseif ($industry->icon) {
                    $industriesHtml .= '<i class="' . htmlspecialchars($industry->icon) . ' service-icon"></i>';
                } else {
                    $industriesHtml .= '<svg class="service-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">';
                    $industriesHtml .= '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />';
                    $industriesHtml .= '</svg>';
                }
                $industriesHtml .= '<h3>' . htmlspecialchars($industry->title ?: $industry->name) . '</h3>';
                if ($industry->features) {
                    $industriesHtml .= '<ul class="industry-features">';
                    foreach (json_decode($industry->features) as $feature) {
                        $industriesHtml .= '<li>' . htmlspecialchars($feature) . '</li>';
                    }
                    $industriesHtml .= '</ul>';
                }
                $industriesHtml .= '</div></div>';
        }
        return response()->json([
            'success' => true,
            'industries_html' => $industriesHtml]);
        }
        return response()->json(['success' => false, 'message' => 'Invalid request']);
    }


    public function show($id)
{
    
    $industry = (object)[
        'id' => $id,
        'title' => ' ',
        'description' => 'This is a static description for the industry.',
        'content' => 'Static content about the industry goes here.',
        'category' => 'Static Category',
        'status' => 'active',
        'created_at' => now(),
        'updated_at' => now(),
        'meta_title' => 'Static Meta Title',
        'meta_description' => 'Static Meta Description',
        'features' => json_encode(['Feature 1', 'Feature 2', 'Feature 3']),
    ];
    return view('new.industryDetails', compact('industry'));
}
}
