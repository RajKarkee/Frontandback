<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfficeController extends Controller
{
    public function index()
    {
        $offices = DB::table('offices')->where('status', 'active')->get();
        return view('new.offices', compact('offices'));
    }
}
