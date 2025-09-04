<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display the team page
     */
    public function index()
    {
       $teams=DB::table('teams')->get();
        
        return view('new.ourteam', compact('teams'));
    }
}
