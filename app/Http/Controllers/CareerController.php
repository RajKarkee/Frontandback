<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\CareerBenefit;
use App\Models\JobOpening;
use App\Models\CareerTestimonial;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index()
    {
        // Get careers from existing Career model (for individual career posts)
        $careers = Career::active()->latest()->paginate(10);
        
        // Get data for comprehensive careers page
        $benefits = CareerBenefit::active()->ordered()->get();
        $jobOpenings = JobOpening::active()->ordered()->get();
        $testimonials = CareerTestimonial::active()->ordered()->get();

        // Group job openings by category
        $jobsByCategory = $jobOpenings->groupBy('category');

        return view('careers', compact('careers', 'benefits', 'jobOpenings', 'testimonials', 'jobsByCategory'));
    }

    public function show($slug)
    {
        $career = Career::where('slug', $slug)->active()->firstOrFail();
        return view('career-detail', compact('career'));
    }

    public function showJob($id)
    {
        $job = JobOpening::active()->findOrFail($id);
        return view('careers.job-detail', compact('job'));
    }

    public function getJobsByCategory(Request $request)
    {
        $category = $request->get('category', 'all');
        
        $query = JobOpening::active()->ordered();
        
        if ($category !== 'all') {
            $query->byCategory($category);
        }
        
        $jobs = $query->get();
        
        return response()->json([
            'jobs' => $jobs->map(function($job) {
                return [
                    'id' => $job->id,
                    'title' => $job->title,
                    'department' => $job->department,
                    'location' => $job->location,
                    'job_type' => $job->job_type,
                    'category' => $job->category,
                    'overview' => $job->overview,
                    'responsibilities_array' => $job->responsibilities_array,
                    'requirements_array' => $job->requirements_array,
                    'benefits_array' => $job->benefits_array,
                    'formatted_salary' => $job->formatted_salary,
                ];
            })
        ]);
    }
}
