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
        $jumbotrons=DB::table('jumbotrons')->where('page_slug','blogs')->where('is_active',1)->orderBy('sort_order','asc')->get();
        return view('new.blogs',compact('blogs','jumbotrons'));
   

    }
}
