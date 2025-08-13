@extends('admin.layouts.app')

@section('title', 'Industry Details')
@section('page-title', 'Industry Details')

@section('page-actions')
    <a href="{{ route('admin.industries.edit', $industry) }}" class="btn btn-warning">
        <i class="fas fa-edit me-2"></i>Edit Industry
    </a>
    <a href="{{ route('admin.industries.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i>Back to Industries
    </a>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <!-- Basic Information -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-info-circle me-2"></i>Basic Information
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-muted">Industry Name</label>
                            <p class="mb-0 fs-5 fw-medium">{{ $industry->name }}</p>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-muted">Industry Code</label>
                            <p class="mb-0">
                                @if($industry->code)
                                    <span class="badge bg-secondary fs-6">{{ $industry->code }}</span>
                                @else
                                    <span class="text-muted">Not specified</span>
                                @endif
                            </p>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold text-muted">Description</label>
                            <div class="bg-light rounded p-3">
                                @if($industry->description)
                                    {!! nl2br(e($industry->description)) !!}
                                @else
                                    <span class="text-muted">No description provided</span>
                                @endif
                            </div>
                        </div>

                        @if($industry->overview)
                        <div class="col-12">
                            <label class="form-label fw-semibold text-muted">Industry Overview</label>
                            <div class="bg-light rounded p-3">
                                {!! nl2br(e($industry->overview)) !!}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Services & Expertise -->
            @if($industry->services || $industry->expertise)
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-cogs me-2"></i>Services & Expertise
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        @if($industry->services)
                        <div class="col-12">
                            <label class="form-label fw-semibold text-muted">Services Offered</label>
                            <div class="bg-light rounded p-3">
                                {!! nl2br(e($industry->services)) !!}
                            </div>
                        </div>
                        @endif

                        @if($industry->expertise)
                        <div class="col-12">
                            <label class="form-label fw-semibold text-muted">Key Expertise Areas</label>
                            <div class="bg-light rounded p-3">
                                {!! nl2br(e($industry->expertise)) !!}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endif

            <!-- Challenges & Solutions -->
            @if($industry->challenges || $industry->solutions)
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-lightbulb me-2"></i>Challenges & Solutions
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        @if($industry->challenges)
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-muted">Industry Challenges</label>
                            <div class="bg-light rounded p-3">
                                {!! nl2br(e($industry->challenges)) !!}
                            </div>
                        </div>
                        @endif

                        @if($industry->solutions)
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-muted">Our Solutions</label>
                            <div class="bg-light rounded p-3">
                                {!! nl2br(e($industry->solutions)) !!}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endif

            <!-- Market Insights -->
            @if($industry->market_trends || $industry->regulatory_updates)
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-chart-line me-2"></i>Market Insights
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        @if($industry->market_trends)
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-muted">Market Trends</label>
                            <div class="bg-light rounded p-3">
                                {!! nl2br(e($industry->market_trends)) !!}
                            </div>
                        </div>
                        @endif

                        @if($industry->regulatory_updates)
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-muted">Regulatory Updates</label>
                            <div class="bg-light rounded p-3">
                                {!! nl2br(e($industry->regulatory_updates)) !!}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endif

            <!-- Case Studies & Resources -->
            @if($industry->case_studies || $industry->resources)
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-book me-2"></i>Case Studies & Resources
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        @if($industry->case_studies)
                        <div class="col-12">
                            <label class="form-label fw-semibold text-muted">Case Studies</label>
                            <div class="bg-light rounded p-3">
                                {!! nl2br(e($industry->case_studies)) !!}
                            </div>
                        </div>
                        @endif

                        @if($industry->resources)
                        <div class="col-12">
                            <label class="form-label fw-semibold text-muted">Resources & Downloads</label>
                            <div class="bg-light rounded p-3">
                                {!! nl2br(e($industry->resources)) !!}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endif
        </div>

        <div class="col-lg-4">
            <!-- Status & Metadata -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-info me-2"></i>Status & Metadata
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-semibold text-muted">Status</label>
                            <p class="mb-0">
                                @if($industry->status === 'active')
                                    <span class="badge bg-success fs-6">
                                        <i class="fas fa-check-circle me-1"></i>Active
                                    </span>
                                @elseif($industry->status === 'inactive')
                                    <span class="badge bg-secondary fs-6">
                                        <i class="fas fa-pause-circle me-1"></i>Inactive
                                    </span>
                                @else
                                    <span class="badge bg-warning fs-6">
                                        <i class="fas fa-clock me-1"></i>Draft
                                    </span>
                                @endif
                            </p>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold text-muted">Priority</label>
                            <p class="mb-0">
                                @if($industry->priority)
                                    <span class="badge bg-info fs-6">{{ $industry->priority }}</span>
                                @else
                                    <span class="text-muted">Not set</span>
                                @endif
                            </p>
                        </div>

                        @if($industry->is_featured)
                        <div class="col-12">
                            <span class="badge bg-warning fs-6">
                                <i class="fas fa-star me-1"></i>Featured Industry
                            </span>
                        </div>
                        @endif

                        <div class="col-12">
                            <label class="form-label fw-semibold text-muted">Created</label>
                            <p class="mb-0 small">{{ $industry->created_at->format('M d, Y \a\t g:i A') }}</p>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold text-muted">Last Updated</label>
                            <p class="mb-0 small">{{ $industry->updated_at->format('M d, Y \a\t g:i A') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Image/Icon -->
            @if($industry->image || $industry->icon)
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-image me-2"></i>Visual Assets
                    </h5>
                </div>
                <div class="card-body p-4 text-center">
                    @if($industry->image)
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-muted d-block text-start">Industry Image</label>
                            <img src="{{ Storage::url($industry->image) }}"
                                 alt="{{ $industry->name }}"
                                 class="img-fluid rounded shadow-sm"
                                 style="max-height: 200px;">
                        </div>
                    @endif

                    @if($industry->icon)
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-muted d-block text-start">Industry Icon</label>
                            <div class="bg-light rounded p-3">
                                <i class="{{ $industry->icon }} fa-3x text-primary"></i>
                            </div>
                        </div>
                    @endif

                    @if(!$industry->image && !$industry->icon)
                        <div class="text-center py-4">
                            <i class="fas fa-image fa-3x text-muted mb-3"></i>
                            <p class="text-muted mb-0">No visual assets uploaded</p>
                        </div>
                    @endif
                </div>
            </div>
            @endif

            <!-- SEO Information -->
            @if($industry->meta_title || $industry->meta_description || $industry->meta_keywords)
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-search me-2"></i>SEO Information
                    </h5>
                </div>
                <div class="card-body p-4">
                    @if($industry->meta_title)
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-muted">Meta Title</label>
                        <p class="mb-0 small bg-light rounded p-2">{{ $industry->meta_title }}</p>
                    </div>
                    @endif

                    @if($industry->meta_description)
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-muted">Meta Description</label>
                        <p class="mb-0 small bg-light rounded p-2">{{ $industry->meta_description }}</p>
                    </div>
                    @endif

                    @if($industry->meta_keywords)
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-muted">Meta Keywords</label>
                        <p class="mb-0 small bg-light rounded p-2">{{ $industry->meta_keywords }}</p>
                    </div>
                    @endif
                </div>
            </div>
            @endif

            <!-- Action Buttons -->
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.industries.edit', $industry) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i>Edit Industry
                        </a>

                        <a href="{{ route('admin.industries.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-list me-2"></i>All Industries
                        </a>

                        @if($industry->status === 'active')
                            <a href="#" class="btn btn-outline-info" target="_blank">
                                <i class="fas fa-external-link-alt me-2"></i>View on Website
                            </a>
                        @endif

                        <hr class="my-3">

                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            <i class="fas fa-trash me-2"></i>Delete Industry
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Industry</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">Are you sure you want to delete the industry "<strong>{{ $industry->name }}</strong>"?</p>
                    <p class="text-danger small mt-2 mb-0">This action cannot be undone.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form method="POST" action="{{ route('admin.industries.destroy', $industry) }}" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete Industry</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
