@extends('admin.layouts.app')

@section('title', 'Edit Job Opening')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0">Edit Job Opening</h1>
                <a href="{{ route('admin.careers.jobs') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Back to Jobs
                </a>
            </div>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.careers.jobs.update', $job) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Job Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                           value="{{ old('title', $job->title) }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="department" class="form-label">Department</label>
                                    <input type="text" class="form-control" id="department" name="department"
                                           value="{{ old('department', $job->department) }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="location" class="form-label">Location</label>
                                    <input type="text" class="form-control" id="location" name="location"
                                           value="{{ old('location', $job->location) }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="job_type" class="form-label">Job type</label>
                                    <select class="form-select" id="job_type" name="job_type" required>
                                        <option value="">Select Type</option>
                                        <option value="full_time" {{ old('job_type', $job->job_type) == 'full_time' ? 'selected' : '' }}>Full Time</option>
                                        <option value="part_time" {{ old('job_type', $job->job_type) == 'part_time' ? 'selected' : '' }}>Part Time</option>
                                        <option value="contract" {{ old('job_type', $job->job_type) == 'contract' ? 'selected' : '' }}>Contract</option>
                                        <option value="internship" {{ old('job_type', $job->job_type) == 'internship' ? 'selected' : '' }}>Internship</option>
                                    </select>
                                </div>
                            </div>
                            {{-- <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="experience_level" class="form-label">Experience Level</label>
                                    <select class="form-select" id="experience_level" name="experience_level" required>
                                        <option value="">Select Level</option>
                                        <option value="entry" {{ old('experience_level', $job->experience_level) == 'entry' ? 'selected' : '' }}>Entry Level</option>
                                        <option value="mid" {{ old('experience_level', $job->experience_level) == 'mid' ? 'selected' : '' }}>Mid Level</option>
                                        <option value="senior" {{ old('experience_level', $job->experience_level) == 'senior' ? 'selected' : '' }}>Senior Level</option>
                                        <option value="lead" {{ old('experience_level', $job->experience_level) == 'lead' ? 'selected' : '' }}>Lead</option>
                                        <option value="executive" {{ old('experience_level', $job->experience_level) == 'executive' ? 'selected' : '' }}>Executive</option>
                                    </select>
                                </div>
                            </div> --}}
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="salary_min" class="form-label">Minimum Salary</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control" id="salary_min" name="salary_min"
                                               value="{{ old('salary_min', $job->salary_min) }}" min="0">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="salary_max" class="form-label">Maximum Salary</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control" id="salary_max" name="salary_max"
                                               value="{{ old('salary_max', $job->salary_max) }}" min="0">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Job Description</label>
                            <textarea class="form-control" id="description" name="description" rows="6" required>{{ old('description', $job->description) }}</textarea>
                        </div>

                        <!-- Requirements Section -->
                        <div class="mb-3">
                            <label class="form-label">Requirements</label>
                            <small class="form-text text-muted">List the main requirements for this position</small>
                            <div id="requirements-container" class="mt-2">
                                @php
                                    $requirements = old('requirements', $job->requirements ?? []);
                                    if (is_string($requirements)) {
                                        $requirements = array_filter(explode("\n", $requirements));
                                    }
                                @endphp
                                @forelse($requirements as $index => $requirement)
                                    <div class="requirement-item mb-2 d-flex align-items-center">
                                        <input type="text" name="requirements[]" class="form-control me-2"
                                               value="{{ trim($requirement) }}" placeholder="Enter requirement">
                                        <button type="button" class="btn btn-outline-danger btn-sm remove-requirement">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                @empty
                                    <div class="requirement-item mb-2 d-flex align-items-center">
                                        <input type="text" name="requirements[]" class="form-control me-2"
                                               placeholder="Enter requirement">
                                        <button type="button" class="btn btn-outline-danger btn-sm remove-requirement">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                @endforelse
                            </div>
                            <button type="button" class="btn btn-outline-primary btn-sm mt-2" id="add-requirement">
                                <i class="fas fa-plus me-1"></i>Add Requirement
                            </button>
                        </div>

                        <!-- Responsibilities Section -->
                        <div class="mb-3">
                            <label class="form-label">Responsibilities</label>
                            <small class="form-text text-muted">List the main responsibilities for this position</small>
                            <div id="responsibilities-container" class="mt-2">
                                @php
                                    $responsibilities = old('responsibilities', $job->responsibilities ?? []);
                                    if (is_string($responsibilities)) {
                                        $responsibilities = array_filter(explode("\n", $responsibilities));
                                    }
                                @endphp
                                @forelse($responsibilities as $index => $responsibility)
                                    <div class="responsibility-item mb-2 d-flex align-items-center">
                                        <input type="text" name="responsibilities[]" class="form-control me-2"
                                               value="{{ trim($responsibility) }}" placeholder="Enter responsibility">
                                        <button type="button" class="btn btn-outline-danger btn-sm remove-responsibility">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                @empty
                                    <div class="responsibility-item mb-2 d-flex align-items-center">
                                        <input type="text" name="responsibilities[]" class="form-control me-2"
                                               placeholder="Enter responsibility">
                                        <button type="button" class="btn btn-outline-danger btn-sm remove-responsibility">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                @endforelse
                            </div>
                            <button type="button" class="btn btn-outline-primary btn-sm mt-2" id="add-responsibility">
                                <i class="fas fa-plus me-1"></i>Add Responsibility
                            </button>
                        </div>

                        <!-- Benefits Section -->
                        <div class="mb-3">
                            <label class="form-label">Benefits</label>
                            <small class="form-text text-muted">List the benefits offered with this position</small>
                            <div id="benefits-container" class="mt-2">
                                @php
                                    $benefits = old('benefits', $job->benefits ?? []);
                                    if (is_string($benefits)) {
                                        $benefits = array_filter(explode("\n", $benefits));
                                    }
                                @endphp
                                @forelse($benefits as $index => $benefit)
                                    <div class="benefit-item mb-2 d-flex align-items-center">
                                        <input type="text" name="benefits[]" class="form-control me-2"
                                               value="{{ trim($benefit) }}" placeholder="Enter benefit">
                                        <button type="button" class="btn btn-outline-danger btn-sm remove-benefit">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                @empty
                                    <div class="benefit-item mb-2 d-flex align-items-center">
                                        <input type="text" name="benefits[]" class="form-control me-2"
                                               placeholder="Enter benefit">
                                        <button type="button" class="btn btn-outline-danger btn-sm remove-benefit">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                @endforelse
                            </div>
                            <button type="button" class="btn btn-outline-primary btn-sm mt-2" id="add-benefit">
                                <i class="fas fa-plus me-1"></i>Add Benefit
                            </button>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="application_deadline" class="form-label">Application Deadline</label>
                                    <input type="date" class="form-control" id="application_deadline" name="application_deadline"
                                           value="{{ old('application_deadline', $job->application_deadline?->format('Y-m-d')) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="positions_available" class="form-label">Positions Available</label>
                                    <input type="number" class="form-control" id="positions_available" name="positions_available"
                                           value="{{ old('positions_available', $job->positions_available) }}" min="1">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1"
                                           {{ old('is_featured', $job->is_featured) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_featured">
                                        Featured Job
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1"
                                           {{ old('is_active', $job->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">
                                        Active
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.careers.jobs') }}" class="btn btn-secondary me-2">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update Job Opening</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Requirements functionality
    document.getElementById('add-requirement').addEventListener('click', function() {
        const container = document.getElementById('requirements-container');
        const newItem = document.createElement('div');
        newItem.className = 'requirement-item mb-2 d-flex align-items-center';
        newItem.innerHTML = `
            <input type="text" name="requirements[]" class="form-control me-2" placeholder="Enter requirement">
            <button type="button" class="btn btn-outline-danger btn-sm remove-requirement">
                <i class="fas fa-trash"></i>
            </button>
        `;
        container.appendChild(newItem);
    });

    // Responsibilities functionality
    document.getElementById('add-responsibility').addEventListener('click', function() {
        const container = document.getElementById('responsibilities-container');
        const newItem = document.createElement('div');
        newItem.className = 'responsibility-item mb-2 d-flex align-items-center';
        newItem.innerHTML = `
            <input type="text" name="responsibilities[]" class="form-control me-2" placeholder="Enter responsibility">
            <button type="button" class="btn btn-outline-danger btn-sm remove-responsibility">
                <i class="fas fa-trash"></i>
            </button>
        `;
        container.appendChild(newItem);
    });

    // Benefits functionality
    document.getElementById('add-benefit').addEventListener('click', function() {
        const container = document.getElementById('benefits-container');
        const newItem = document.createElement('div');
        newItem.className = 'benefit-item mb-2 d-flex align-items-center';
        newItem.innerHTML = `
            <input type="text" name="benefits[]" class="form-control me-2" placeholder="Enter benefit">
            <button type="button" class="btn btn-outline-danger btn-sm remove-benefit">
                <i class="fas fa-trash"></i>
            </button>
        `;
        container.appendChild(newItem);
    });

    // Remove functionality using event delegation
    document.addEventListener('click', function(e) {
        if (e.target.closest('.remove-requirement')) {
            const container = document.getElementById('requirements-container');
            if (container.children.length > 1) {
                e.target.closest('.requirement-item').remove();
            }
        }

        if (e.target.closest('.remove-responsibility')) {
            const container = document.getElementById('responsibilities-container');
            if (container.children.length > 1) {
                e.target.closest('.responsibility-item').remove();
            }
        }

        if (e.target.closest('.remove-benefit')) {
            const container = document.getElementById('benefits-container');
            if (container.children.length > 1) {
                e.target.closest('.benefit-item').remove();
            }
        }
    });
});
</script>
@endsection
