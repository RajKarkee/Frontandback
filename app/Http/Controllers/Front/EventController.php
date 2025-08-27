<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        $events=DB::table('events')->where('status', 'active')->orderBy('sort_order', 'asc')->get();
        return view('new.event', compact('events'));
    }
}
