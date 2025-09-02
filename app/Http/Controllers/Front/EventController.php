<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class EventController extends Controller
{
    public function index(){
        $events=DB::table('events')->where('status', 'active')->get();
        $jumbotrons=DB::table('jumbotrons')->where('page_slug','events')->where('is_active',1)->orderBy('sort_order','asc')->get();
        return view('new.event', compact('events','jumbotrons'));
    }
}
