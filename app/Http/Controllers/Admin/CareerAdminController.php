<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CareerAdminController extends Controller
{
    public function index()
    {
        $careers = Career::latest()->paginate(15);
        return view('admin.careers.index', compact('careers'));
    }

    public function create()
    {
        return view('admin.careers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:careers',
            'summary' => 'required|string',
            'description' => 'required|string',
            'requirements' => 'nullable|string',
            'responsibilities' => 'nullable|string',
            'benefits' => 'nullable|string',
            'department' => 'nullable|string|max:100',
            'employment_type' => 'nullable|string|max:50',
            'experience_level' => 'nullable|string|max:50',
            'location' => 'nullable|string|max:255',
            'salary_range' => 'nullable|string|max:100',
            'application_deadline' => 'nullable|date',
            'application_url' => 'nullable|url',
            'status' => 'required|in:draft,active,closed,paused',
            'is_featured' => 'boolean',
            'is_remote' => 'boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
        ]);

        $data = $request->all();
        $data['slug'] = $data['slug'] ?: Str::slug($data['title']);
        $data['is_featured'] = $request->has('is_featured');
        $data['is_remote'] = $request->has('is_remote');

        Career::create($data);

        return redirect()->route('admin.careers.index')
            ->with('success', 'Career created successfully.');
    }

    public function show(Career $career)
    {
        return view('admin.careers.show', compact('career'));
    }

    public function edit(Career $career)
    {
        return view('admin.careers.edit', compact('career'));
    }

    public function update(Request $request, Career $career)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:careers,slug,' . $career->id,
            'summary' => 'required|string',
            'description' => 'required|string',
            'requirements' => 'nullable|string',
            'responsibilities' => 'nullable|string',
            'benefits' => 'nullable|string',
            'department' => 'nullable|string|max:100',
            'employment_type' => 'nullable|string|max:50',
            'experience_level' => 'nullable|string|max:50',
            'location' => 'nullable|string|max:255',
            'salary_range' => 'nullable|string|max:100',
            'application_deadline' => 'nullable|date',
            'application_url' => 'nullable|url',
            'status' => 'required|in:draft,active,closed,paused',
            'is_featured' => 'boolean',
            'is_remote' => 'boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
        ]);

        $data = $request->all();
        $data['slug'] = $data['slug'] ?: Str::slug($data['title']);
        $data['is_featured'] = $request->has('is_featured');
        $data['is_remote'] = $request->has('is_remote');

        $career->update($data);

        return redirect()->route('admin.careers.index')
            ->with('success', 'Career updated successfully.');
    }

    public function destroy(Career $career)
    {
        $career->delete();

        return redirect()->route('admin.careers.index')
            ->with('success', 'Career deleted successfully.');
    }
}
