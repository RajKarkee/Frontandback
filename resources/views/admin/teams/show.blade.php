@extends('admin.layouts.app')

@section('title', 'View Team Member')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.teams.index') }}">Team Members</a></li>
    <li class="breadcrumb-item active">{{ $team->name }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-4">
            <!-- Profile Card -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-4 text-center">
                    @if ($team->image)
                        <img src="{{ Storage::url($team->image) }}" alt="{{ $team->name }}" class="rounded-circle mb-3"
                            style="width: 150px; height: 150px; object-fit: cover;">
                    @else
                        <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3"
                            style="width: 150px; height: 150px;">
                            <i class="fas fa-user fa-4x text-white"></i>
                        </div>
                    @endif

                    <h4 class="mb-1">{{ $team->name }}</h4>
                    <p class="text-muted mb-3">{{ $team->position }}</p>

                    <div class="mb-3">
                        @if ($team->is_active)
                            <span class="badge bg-success fs-6">Active</span>
                        @else
                            <span class="badge bg-secondary fs-6">Inactive</span>
                        @endif
                    </div>

                    <div class="d-flex justify-content-center gap-2">
                        <a href="{{ route('admin.teams.edit', $team) }}" class="btn btn-primary">
                            <i class="fas fa-edit me-2"></i>Edit
                        </a>
                        <form action="{{ route('admin.teams.destroy', $team) }}" method="POST"
                            style="display: inline-block;"
                            onsubmit="return confirm('Are you sure you want to delete this team member?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash me-2"></i>Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <!-- Biography -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-user-circle me-2"></i>Biography
                    </h5>
                </div>
                <div class="card-body p-4">
                    <p class="mb-0">{{ $team->bio }}</p>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-address-book me-2"></i>Contact Information
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <strong>Email:</strong>
                            <p class="mb-0">
                                @if ($team->email)
                                    <a href="mailto:{{ $team->email }}">{{ $team->email }}</a>
                                @else
                                    <span class="text-muted">Not provided</span>
                                @endif
                            </p>
                        </div>
                        <div class="col-md-6">
                            <strong>Phone:</strong>
                            <p class="mb-0">
                                @if ($team->phone)
                                    <a href="tel:{{ $team->phone }}">{{ $team->phone }}</a>
                                @else
                                    <span class="text-muted">Not provided</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Social Media -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-share-alt me-2"></i>Social Media
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="d-flex gap-3">
                        @if ($team->linkedin_url)
                            <a href="{{ $team->linkedin_url }}" target="_blank" class="btn btn-outline-primary">
                                <i class="fab fa-linkedin-in me-2"></i>LinkedIn
                            </a>
                        @endif
                        @if ($team->twitter_url)
                            <a href="{{ $team->twitter_url }}" target="_blank" class="btn btn-outline-info">
                                <i class="fab fa-twitter me-2"></i>Twitter
                            </a>
                        @endif
                        @if ($team->facebook_url)
                            <a href="{{ $team->facebook_url }}" target="_blank" class="btn btn-outline-primary">
                                <i class="fab fa-facebook-f me-2"></i>Facebook
                            </a>
                        @endif
                        @if (!$team->linkedin_url && !$team->twitter_url && !$team->facebook_url)
                            <span class="text-muted">No social media links provided</span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Additional Information -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-info-circle me-2"></i>Additional Information
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <strong>Sort Order:</strong>
                            <p class="mb-0">{{ $team->sort_order }}</p>
                        </div>
                        <div class="col-md-6">
                            <strong>Created:</strong>
                            <p class="mb-0">{{ $team->created_at->format('M d, Y g:i A') }}</p>
                        </div>
                        <div class="col-md-6">
                            <strong>Last Updated:</strong>
                            <p class="mb-0">{{ $team->updated_at->format('M d, Y g:i A') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
