<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
    {
        // Get featured upcoming event
        $featuredEvent = Event::where('status', 'active')
            ->where('is_featured', true)
            ->first();

        // Get other upcoming events (excluding featured)
        $upcomingEventsQuery = Event::active()
            ->upcoming()
            ->latest();

        if ($featuredEvent) {
            $upcomingEventsQuery->where('id', '!=', $featuredEvent->id);
        }

        // Filter by type if provided
        if ($request->has('type') && $request->type !== 'all') {
            $upcomingEventsQuery->byType($request->type);
        }

        $upcomingEvents = $upcomingEventsQuery->take(6)->get();

        // Get past events with recordings
        $pastEvents = Event::active()
            ->past()
            ->whereNotNull('recording_link')
            ->latest()
            ->take(6)
            ->get();

        // Get event types for filters
        $eventTypes = Event::active()->distinct()->pluck('type');

        return view('events', compact(
            'featuredEvent',
            'upcomingEvents',
            'pastEvents',
            'eventTypes'
        ));
    }

    public function show($slug)
    {
        $event = Event::where('slug', $slug)->active()->firstOrFail();

        // Get related events (same type, excluding current)
        $relatedEvents = Event::active()
            ->upcoming()
            ->byType($event->type)
            ->where('id', '!=', $event->id)
            ->take(3)
            ->get();

        return view('event-detail', compact('event', 'relatedEvents'));
    }

    public function register(Request $request, $slug)
    {
        $event = Event::where('slug', $slug)->active()->firstOrFail();

        // Handle event registration logic
        // This could integrate with payment processing, email notifications, etc.

        return redirect()->route('events.show', $slug)
            ->with('success', 'Registration successful! You will receive a confirmation email shortly.');
    }

    public function filter(Request $request)
    {
        $type = $request->get('type', 'all');

        $eventsQuery = Event::active()->upcoming();

        if ($type !== 'all') {
            $eventsQuery->byType($type);
        }

        $events = $eventsQuery->latest()->get();

        return response()->json([
            'events' => $events->map(function($event) {
                return [
                    'id' => $event->id,
                    'title' => $event->title,
                    'type' => $event->type,
                    'short_description' => $event->short_description,
                    'formatted_date' => $event->formatted_date,
                    'formatted_time' => $event->formatted_time,
                    'location' => $event->location,
                    'venue_type' => $event->venue_type,
                    'display_price' => $event->display_price,
                    'image_url' => $event->image_url,
                    'registration_link' => $event->registration_link,
                    'is_free' => $event->is_free,
                ];
            })
        ]);
    }
}
