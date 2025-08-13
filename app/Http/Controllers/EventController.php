<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::active()->upcoming()->latest()->paginate(9);
        return view('events', compact('events'));
    }

    public function show($slug)
    {
        $event = Event::where('slug', $slug)->active()->firstOrFail();
        return view('event-detail', compact('event'));
    }
}
