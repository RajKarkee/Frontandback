<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceProcess;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::active()->ordered()->get();
        $serviceProcesses = ServiceProcess::active()->ordered()->get();
        return view('services', compact('services', 'serviceProcesses'));
    }

    public function show($slug)
    {
        $service = Service::where('slug', $slug)->active()->firstOrFail();
        return view('service-detail', compact('service'));
    }
}
