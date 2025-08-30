<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfficeController extends Controller
{
    public function index()
    {
        $services = DB::table('services')->where('status', 'active')->orderBy('sort_order','asc')->paginate(6);
        $offices = DB::table('offices')->where('status', 'active')->get();
        return view('new.offices', compact('offices','services'));
        
    }
}
