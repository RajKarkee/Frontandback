<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CareerBenefit;
use App\Models\JobOpening;
use App\Models\CareerTestimonial;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CareerAdminController extends Controller
{
    // Main careers management dashboard
    public function index()
    {
        return redirect()->route('admin.careers.benefits');
    }

    // Career Benefits Management
    public function benefits()
    {
        $benefits = CareerBenefit::orderBy('sort_order')->orderBy('id')->get();
        return view('admin.careers.benefits', compact('benefits'));
    }

    public function storeBenefit(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string',
            'color_class' => 'nullable|string|max:100',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        CareerBenefit::create($validated);

        return redirect()->route('admin.careers.benefits')->with('success', 'Benefit added successfully!');
    }

    public function updateBenefit(Request $request, CareerBenefit $benefit)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string',
            'color_class' => 'nullable|string|max:100',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $benefit->update($validated);

        return redirect()->route('admin.careers.benefits')->with('success', 'Benefit updated successfully!');
    }

    public function destroyBenefit(CareerBenefit $benefit)
    {
        $benefit->delete();
        return redirect()->route('admin.careers.benefits')->with('success', 'Benefit deleted successfully!');
    }

    // Job Openings Management
    public function jobs()
    {
        $jobs = JobOpening::orderBy('is_featured', 'desc')
                          ->orderBy('sort_order')
                          ->orderBy('created_at', 'desc')
                          ->get();
        return view('admin.careers.jobs', compact('jobs'));
    }

    public function createJob()
    {
        return view('admin.careers.jobs-create');
    }

    public function storeJob(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'job_type' => 'required|in:full-time,part-time,contract,internship',
            'overview' => 'required|string',
            'responsibilities' => 'required|string',
            'requirements' => 'required|string',
            'benefits' => 'nullable|string',
            'category' => 'required|string|max:100',
            'salary_min' => 'nullable|numeric|min:0',
            'salary_max' => 'nullable|numeric|min:0',
            'application_deadline' => 'nullable|date',
            'status' => 'required|in:active,paused,closed',
            'is_featured' => 'boolean',
            'sort_order' => 'nullable|integer',
        ]);

        JobOpening::create($validated);

        return redirect()->route('admin.careers.jobs')->with('success', 'Job opening created successfully!');
    }

    public function editJob(JobOpening $job)
    {
        return view('admin.careers.jobs-edit', compact('job'));
    }

    public function updateJob(Request $request, JobOpening $job)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'job_type' => 'required|in:full-time,part-time,contract,internship',
            'overview' => 'required|string',
            'responsibilities' => 'required|string',
            'requirements' => 'required|string',
            'benefits' => 'nullable|string',
            'category' => 'required|string|max:100',
            'salary_min' => 'nullable|numeric|min:0',
            'salary_max' => 'nullable|numeric|min:0',
            'application_deadline' => 'nullable|date',
            'status' => 'required|in:active,paused,closed',
            'is_featured' => 'boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $job->update($validated);

        return redirect()->route('admin.careers.jobs')->with('success', 'Job opening updated successfully!');
    }

    public function destroyJob(JobOpening $job)
    {
        $job->delete();
        return redirect()->route('admin.careers.jobs')->with('success', 'Job opening deleted successfully!');
    }

    // Testimonials Management
    public function testimonials()
    {
        $testimonials = CareerTestimonial::orderBy('sort_order')->orderBy('id')->get();
        return view('admin.careers.testimonials', compact('testimonials'));
    }

    public function storeTestimonial(Request $request)
    {
        $validated = $request->validate([
            'employee_name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'testimonial' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'years_with_company' => 'nullable|integer',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('testimonials', 'public');
        }

        CareerTestimonial::create($validated);

        return redirect()->route('admin.careers.testimonials')->with('success', 'Testimonial added successfully!');
    }

    public function updateTestimonial(Request $request, CareerTestimonial $testimonial)
    {
        $validated = $request->validate([
            'employee_name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'testimonial' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'years_with_company' => 'nullable|integer',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer',
        ]);

        if ($request->hasFile('photo')) {
            // Delete old photo
            if ($testimonial->photo) {
                Storage::disk('public')->delete($testimonial->photo);
            }
            $validated['photo'] = $request->file('photo')->store('testimonials', 'public');
        }

        $testimonial->update($validated);

        return redirect()->route('admin.careers.testimonials')->with('success', 'Testimonial updated successfully!');
    }

    public function destroyTestimonial(CareerTestimonial $testimonial)
    {
        if ($testimonial->photo) {
            Storage::disk('public')->delete($testimonial->photo);
        }
        $testimonial->delete();
        return redirect()->route('admin.careers.testimonials')->with('success', 'Testimonial deleted successfully!');
    }

    // Job Applications Management
    public function applications()
    {
        $applications = JobApplication::with('jobOpening')
                                    ->orderBy('created_at', 'desc')
                                    ->paginate(20);
        return view('admin.careers.applications', compact('applications'));
    }

    public function showApplication(JobApplication $application)
    {
        $application->load('jobOpening');
        return view('admin.careers.applications-show', compact('application'));
    }

    public function updateApplicationStatus(Request $request, JobApplication $application)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,under_review,shortlisted,interviewed,offered,hired,rejected',
            'notes' => 'nullable|string',
        ]);

        $application->update($validated);

        return redirect()->back()->with('success', 'Application status updated successfully!');
    }

    // Toggle Status Methods
    public function toggleBenefitStatus(CareerBenefit $benefit)
    {
        $benefit->update(['is_active' => !$benefit->is_active]);
        return redirect()->back()->with('success', 'Benefit status updated successfully!');
    }

    public function toggleTestimonialStatus(CareerTestimonial $testimonial)
    {
        $testimonial->update(['is_active' => !$testimonial->is_active]);
        return redirect()->back()->with('success', 'Testimonial status updated successfully!');
    }

    public function toggleJobFeatured(JobOpening $job)
    {
        $job->update(['is_featured' => !$job->is_featured]);
        return redirect()->back()->with('success', 'Job featured status updated successfully!');
    }
}
