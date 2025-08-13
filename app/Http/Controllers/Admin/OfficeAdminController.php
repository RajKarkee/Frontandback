<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OfficeAdminController extends Controller
{
    public function index()
    {
        $offices = Office::latest()->paginate(15);
        return view('admin.offices.index', compact('offices'));
    }

    public function create()
    {
        return view('admin.offices.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'services' => 'nullable|string',
            'facilities' => 'nullable|string',
            'directions' => 'nullable|string',
            'business_hours' => 'nullable|string',
            'address_line_1' => 'nullable|string|max:255',
            'address_line_2' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'postal_code' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:100',
            'phone' => 'nullable|string|max:20',
            'fax' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|url|max:255',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'type' => 'nullable|string|max:50',
            'region' => 'nullable|string|max:100',
            'timezone' => 'nullable|string|max:50',
            'languages' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:active,inactive,opening-soon,temporarily-closed',
            'is_headquarters' => 'boolean',
        ]);

        $data = $request->all();
        $data['is_headquarters'] = $request->has('is_headquarters');

        // Handle file upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('offices', 'public');
        }

        Office::create($data);

        return redirect()->route('admin.offices.index')
            ->with('success', 'Office created successfully.');
    }

    public function show(Office $office)
    {
        return view('admin.offices.show', compact('office'));
    }

    public function edit(Office $office)
    {
        return view('admin.offices.edit', compact('office'));
    }

    public function update(Request $request, Office $office)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'services' => 'nullable|string',
            'facilities' => 'nullable|string',
            'directions' => 'nullable|string',
            'business_hours' => 'nullable|string',
            'address_line_1' => 'nullable|string|max:255',
            'address_line_2' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'postal_code' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:100',
            'phone' => 'nullable|string|max:20',
            'fax' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|url|max:255',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'type' => 'nullable|string|max:50',
            'region' => 'nullable|string|max:100',
            'timezone' => 'nullable|string|max:50',
            'languages' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:active,inactive,opening-soon,temporarily-closed',
            'is_headquarters' => 'boolean',
        ]);

        $data = $request->all();
        $data['is_headquarters'] = $request->has('is_headquarters');

        // Handle file upload
        if ($request->hasFile('image')) {
            if ($office->image) {
                Storage::disk('public')->delete($office->image);
            }
            $data['image'] = $request->file('image')->store('offices', 'public');
        }

        $office->update($data);

        return redirect()->route('admin.offices.index')
            ->with('success', 'Office updated successfully.');
    }

    public function destroy(Office $office)
    {
        // Delete associated image
        if ($office->image) {
            Storage::disk('public')->delete($office->image);
        }

        $office->delete();

        return redirect()->route('admin.offices.index')
            ->with('success', 'Office deleted successfully.');
    }
}
