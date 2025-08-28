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
        return view('new.event', compact('events'));
    }
}
