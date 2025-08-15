<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInformation;
use Illuminate\Http\Request;

class ContactInformationAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contactInfos = ContactInformation::latest()->paginate(15);
        return view('admin.contact-information.index', compact('contactInfos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.contact-information.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'address' => 'required|string',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'website' => 'nullable|url|max:255',
            'map_embed_url' => 'nullable|url',
            'google_maps_link' => 'nullable|url',
            'additional_info' => 'nullable|string',
            'is_active' => 'boolean',

            // Social media links
            'social_media.facebook' => 'nullable|url',
            'social_media.twitter' => 'nullable|url',
            'social_media.linkedin' => 'nullable|url',
            'social_media.instagram' => 'nullable|url',
            'social_media.youtube' => 'nullable|url',

            // Business hours
            'business_hours.monday' => 'nullable|string',
            'business_hours.tuesday' => 'nullable|string',
            'business_hours.wednesday' => 'nullable|string',
            'business_hours.thursday' => 'nullable|string',
            'business_hours.friday' => 'nullable|string',
            'business_hours.saturday' => 'nullable|string',
            'business_hours.sunday' => 'nullable|string',
        ]);

        // If this contact info is set as active, deactivate others
        if ($request->has('is_active') && $request->is_active) {
            ContactInformation::where('is_active', true)->update(['is_active' => false]);
        }

        // Prepare social media links
        $socialMediaLinks = [];
        if ($request->has('social_media')) {
            foreach ($request->social_media as $platform => $url) {
                if (!empty($url)) {
                    $socialMediaLinks[$platform] = $url;
                }
            }
        }

        // Prepare business hours
        $businessHours = [];
        if ($request->has('business_hours')) {
            foreach ($request->business_hours as $day => $hours) {
                if (!empty($hours)) {
                    $businessHours[$day] = $hours;
                }
            }
        }

        ContactInformation::create([
            'title' => $validated['title'],
            'address' => $validated['address'],
            'latitude' => $validated['latitude'],
            'longitude' => $validated['longitude'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'website' => $validated['website'],
            'map_embed_url' => $validated['map_embed_url'],
            'google_maps_link' => $validated['google_maps_link'],
            'additional_info' => $validated['additional_info'],
            'is_active' => $request->has('is_active'),
            'social_media_links' => $socialMediaLinks,
            'business_hours' => $businessHours,
        ]);

        return redirect()->route('admin.contact-information.index')
            ->with('success', 'Contact information created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactInformation $contactInformation)
    {
        return view('admin.contact-information.show', compact('contactInformation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactInformation $contactInformation)
    {
        return view('admin.contact-information.edit', compact('contactInformation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactInformation $contactInformation)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'address' => 'required|string',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'website' => 'nullable|url|max:255',
            'map_embed_url' => 'nullable|url',
            'google_maps_link' => 'nullable|url',
            'additional_info' => 'nullable|string',
            'is_active' => 'boolean',

            // Social media links
            'social_media.facebook' => 'nullable|url',
            'social_media.twitter' => 'nullable|url',
            'social_media.linkedin' => 'nullable|url',
            'social_media.instagram' => 'nullable|url',
            'social_media.youtube' => 'nullable|url',

            // Business hours
            'business_hours.monday' => 'nullable|string',
            'business_hours.tuesday' => 'nullable|string',
            'business_hours.wednesday' => 'nullable|string',
            'business_hours.thursday' => 'nullable|string',
            'business_hours.friday' => 'nullable|string',
            'business_hours.saturday' => 'nullable|string',
            'business_hours.sunday' => 'nullable|string',
        ]);

        // If this contact info is set as active, deactivate others
        if ($request->has('is_active') && $request->is_active) {
            ContactInformation::where('is_active', true)
                ->where('id', '!=', $contactInformation->id)
                ->update(['is_active' => false]);
        }

        // Prepare social media links
        $socialMediaLinks = [];
        if ($request->has('social_media')) {
            foreach ($request->social_media as $platform => $url) {
                if (!empty($url)) {
                    $socialMediaLinks[$platform] = $url;
                }
            }
        }

        // Prepare business hours
        $businessHours = [];
        if ($request->has('business_hours')) {
            foreach ($request->business_hours as $day => $hours) {
                if (!empty($hours)) {
                    $businessHours[$day] = $hours;
                }
            }
        }

        $contactInformation->update([
            'title' => $validated['title'],
            'address' => $validated['address'],
            'latitude' => $validated['latitude'],
            'longitude' => $validated['longitude'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'website' => $validated['website'],
            'map_embed_url' => $validated['map_embed_url'],
            'google_maps_link' => $validated['google_maps_link'],
            'additional_info' => $validated['additional_info'],
            'is_active' => $request->has('is_active'),
            'social_media_links' => $socialMediaLinks,
            'business_hours' => $businessHours,
        ]);

        return redirect()->route('admin.contact-information.index')
            ->with('success', 'Contact information updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactInformation $contactInformation)
    {
        $contactInformation->delete();

        return redirect()->route('admin.contact-information.index')
            ->with('success', 'Contact information deleted successfully.');
    }
}
