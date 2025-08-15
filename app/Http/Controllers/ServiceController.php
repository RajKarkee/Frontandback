<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceProcess;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        return view('services');
    }

}
