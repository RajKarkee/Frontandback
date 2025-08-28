<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function index()
    {
        $blogs=DB::table('blogs')->where('status','active')->get();
        return view('new.blogs',compact('blogs'));
    }
}
