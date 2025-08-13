@extends('admin.layouts.app')

@section('title', 'Career Details')
@section('page-title', 'Career Details')

@section('page-actions')
    <a href="{{ route('admin.careers.edit', $career) }}" class="btn btn-warning">
        <i class="fas fa-edit me-2"></i>Edit Career
    </a>
    <a href="{{ route('admin.careers.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i>Back to Careers
    </a>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-briefcase me-2"></i>Job Information
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <h6 class="text-primary fw-bold mb-3">Basic Information</h6>

                            <div class="mb-3">
                                <strong class="text-dark d-block mb-1">Job Title:</strong>
                                <p class="text-muted mb-0">{{ $career->title }}</p>
                            </div>

                            <div class="mb-3">
                                <strong class="text-dark d-block mb-1">Department:</strong>
                                <p class="text-muted mb-0">
                                    <i class="fas fa-building me-1"></i>{{ $career->department }}
                                </p>
                            </div>

                            <div class="mb-3">
                                <strong class="text-dark d-block mb-1">Location:</strong>
                                <p class="text-muted mb-0">
                                    <i class="fas fa-map-marker-alt me-1"></i>{{ $career->location }}
                                </p>
                            </div>

                            <div class="mb-3">
                                <strong class="text-dark d-block mb-1">Employment Type:</strong>
                                <span class="badge bg-info px-3 py-2">{{ ucfirst($career->employment_type) }}</span>
                            </div>

                            @if($career->experience_level)
                            <div class="mb-3">
                                <strong class="text-dark d-block mb-1">Experience Level:</strong>
                                <p class="text-muted mb-0">
                                    <i class="fas fa-chart-line me-1"></i>{{ ucfirst($career->experience_level) }}
                                </p>
                            </div>
                            @endif

                            @if($career->salary_range)
                            <div class="mb-3">
                                <strong class="text-dark d-block mb-1">Salary Range:</strong>
                                <p class="text-muted mb-0">
                                    <i class="fas fa-dollar-sign me-1"></i>{{ $career->salary_range }}
                                </p>
                            </div>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <h6 class="text-primary fw-bold mb-3">Job Details</h6>

                            <div class="mb-3">
                                <strong class="text-dark d-block mb-1">Status:</strong>
                                <span class="badge bg-{{ $career->status === 'active' ? 'success' : ($career->status === 'draft' ? 'warning' : 'danger') }} px-3 py-2">
                                    {{ ucfirst($career->status) }}
                                </span>
                            </div>

                            @if($career->application_deadline)
                            <div class="mb-3">
                                <strong class="text-dark d-block mb-1">Application Deadline:</strong>
                                <p class="text-muted mb-0">
                                    <i class="fas fa-calendar-times me-1"></i>{{ $career->application_deadline->format('F j, Y') }}
                                </p>
                            </div>
                            @endif

                            <div class="mb-3">
                                <strong class="text-dark d-block mb-1">Posted:</strong>
                                <p class="text-muted mb-0">
                                    <i class="fas fa-calendar-plus me-1"></i>{{ $career->created_at->format('F j, Y \a\t g:i A') }}
                                </p>
                            </div>

                            <div class="mb-3">
                                <strong class="text-dark d-block mb-1">Last Updated:</strong>
                                <p class="text-muted mb-0">
                                    <i class="fas fa-edit me-1"></i>{{ $career->updated_at->format('F j, Y \a\t g:i A') }}
                                </p>
                            </div>

                            <div class="mb-3">
                                <strong class="text-dark d-block mb-1">Remote Work:</strong>
                                <span class="badge bg-{{ $career->remote_work_available ? 'success' : 'secondary' }}">
                                    {{ $career->remote_work_available ? 'Available' : 'Not Available' }}
                                </span>
                            </div>

                            <div class="mb-3">
                                <strong class="text-dark d-block mb-1">Featured Position:</strong>
                                <span class="badge bg-{{ $career->is_featured ? 'success' : 'secondary' }}">
                                    {{ $career->is_featured ? 'Yes' : 'No' }}
                                </span>
                            </div>
                        </div>
                    </div>

                    @if($career->description)
                    <div class="mt-4">
                        <h6 class="text-primary fw-bold mb-3">Job Description</h6>
                        <div class="p-3 bg-light rounded border">
                            {!! nl2br(e($career->description)) !!}
                        </div>
                    </div>
                    @endif

                    @if($career->requirements)
                    <div class="mt-4">
                        <h6 class="text-primary fw-bold mb-3">Requirements</h6>
                        <div class="p-3 bg-light rounded border">
                            {!! nl2br(e($career->requirements)) !!}
                        </div>
                    </div>
                    @endif

                    @if($career->responsibilities)
                    <div class="mt-4">
                        <h6 class="text-primary fw-bold mb-3">Key Responsibilities</h6>
                        <div class="p-3 bg-light rounded border">
                            {!! nl2br(e($career->responsibilities)) !!}
                        </div>
                    </div>
                    @endif

                    @if($career->benefits)
                    <div class="mt-4">
                        <h6 class="text-primary fw-bold mb-3">Benefits & Perks</h6>
                        <div class="p-3 bg-light rounded border">
                            {!! nl2br(e($career->benefits)) !!}
                        </div>
                    </div>
                    @endif

                    @if($career->qualifications)
                    <div class="mt-4">
                        <h6 class="text-primary fw-bold mb-3">Preferred Qualifications</h6>
                        <div class="p-3 bg-light rounded border">
                            {!! nl2br(e($career->qualifications)) !!}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Quick Stats -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-bottom py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Quick Stats</h6>
                </div>
                <div class="card-body p-4">
                    <div class="row text-center">
                        <div class="col-6">
                            <div class="border-end">
                                <h4 class="text-primary mb-1">{{ $career->applications_count ?? 0 }}</h4>
                                <small class="text-muted">Applications</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <h4 class="text-info mb-1">{{ $career->views_count ?? 0 }}</h4>
                            <small class="text-muted">Views</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions Card -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-cogs me-2"></i>Actions
                    </h6>
                </div>
                <div class="card-body p-4">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.careers.edit', $career) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i>Edit Position
                        </a>

                        @if($career->status === 'active')
                            <a href="{{ route('careers') }}#job-{{ $career->id }}"
                               class="btn btn-info" target="_blank">
                                <i class="fas fa-external-link-alt me-2"></i>View on Site
                            </a>
                        @endif

                        @if($career->status === 'draft')
                        <form method="POST" action="{{ route('admin.careers.update', $career) }}" class="d-inline">
                            @csrf
                            @method('PUT')
                            @foreach($career->toArray() as $key => $value)
                                @if($key !== 'status' && !is_array($value))
                                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                                @endif
                            @endforeach
                            <input type="hidden" name="status" value="active">
                            <button type="submit" class="btn btn-success w-100">
                                <i class="fas fa-eye me-2"></i>Activate Position
                            </button>
                        </form>
                        @elseif($career->status === 'active')
                        <form method="POST" action="{{ route('admin.careers.update', $career) }}" class="d-inline">
                            @csrf
                            @method('PUT')
                            @foreach($career->toArray() as $key => $value)
                                @if($key !== 'status' && !is_array($value))
                                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                                @endif
                            @endforeach
                            <input type="hidden" name="status" value="closed">
                            <button type="submit" class="btn btn-warning w-100">
                                <i class="fas fa-pause me-2"></i>Close Position
                            </button>
                        </form>
                        @endif

                        <a href="{{ route('admin.careers.applications', $career) }}" class="btn btn-outline-primary">
                            <i class="fas fa-file-alt me-2"></i>View Applications
                        </a>

                        <form method="POST" action="{{ route('admin.careers.destroy', $career) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100"
                                    onclick="return confirmDelete('Are you sure you want to delete this career position?')">
                                <i class="fas fa-trash me-2"></i>Delete Position
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Application Information -->
            @if($career->application_email || $career->application_url)
            <div class="card border-0 shadow-sm mt-4">
                <div class="card-header bg-white border-bottom py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-paper-plane me-2"></i>Application Info
                    </h6>
                </div>
                <div class="card-body p-4">
                    @if($career->application_email)
                    <div class="mb-3">
                        <strong class="text-dark d-block mb-1">Email:</strong>
                        <a href="mailto:{{ $career->application_email }}" class="text-primary">
                            {{ $career->application_email }}
                        </a>
                    </div>
                    @endif

                    @if($career->application_url)
                    <div class="mb-3">
                        <strong class="text-dark d-block mb-1">Application URL:</strong>
                        <a href="{{ $career->application_url }}" target="_blank" class="text-primary">
                            Apply Online <i class="fas fa-external-link-alt ms-1"></i>
                        </a>
                    </div>
                    @endif
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection
