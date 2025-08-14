@extends('admin.layouts.app')

@section('title', 'Industry Details')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.industries.index') }}">Industries</a></li>
    <li class="breadcrumb-item active">{{ $industry->name }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">{{ $industry->title ?: $industry->name }}</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6 class="text-muted">Industry Name</h6>
                            <p class="fw-bold">{{ $industry->name }}</p>
                        </div>
                        @if ($industry->title)
                            <div class="col-md-6">
                                <h6 class="text-muted">Display Title</h6>
                                <p>{{ $industry->title }}</p>
                            </div>
                        @endif
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6 class="text-muted">Slug</h6>
                            <p><code>{{ $industry->slug }}</code></p>
                        </div>
                        @if ($industry->category)
                            <div class="col-md-6">
                                <h6 class="text-muted">Category</h6>
                                <span class="badge bg-secondary">{{ $industry->category }}</span>
                            </div>
                        @endif
                    </div>

                    @if ($industry->description)
                        <div class="mb-4">
                            <h6 class="text-muted">Description</h6>
                            <div class="bg-light p-3 rounded">
                                {{ $industry->description }}
                            </div>
                        </div>
                    @endif

                    @if ($industry->content)
                        <div class="mb-4">
                            <h6 class="text-muted">Detailed Content</h6>
                            <div class="bg-light p-3 rounded">
                                {!! nl2br(e($industry->content)) !!}
                            </div>
                        </div>
                    @endif

                    @if ($industry->features && is_array($industry->features) && count($industry->features) > 0)
                        <div class="mb-4">
                            <h6 class="text-muted">Key Features</h6>
                            <ul class="list-unstyled">
                                @foreach ($industry->features as $feature)
                                    <li><i class="fas fa-check text-success me-2"></i>{{ $feature }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if ($industry->svg_icon)
                        <div class="mb-4">
                            <h6 class="text-muted">SVG Icon Preview</h6>
                            <div class="p-3 border rounded text-center" style="max-width: 100px;">
                                <svg class="w-100 h-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    style="max-height: 60px;">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="{{ $industry->svg_icon }}" />
                                </svg>
                            </div>
                        </div>
                    @endif

                    @if ($industry->meta_title || $industry->meta_description)
                        <div class="mb-4">
                            <h6 class="text-muted">SEO Information</h6>
                            @if ($industry->meta_title)
                                <p><strong>Meta Title:</strong> {{ $industry->meta_title }}</p>
                            @endif
                            @if ($industry->meta_description)
                                <p><strong>Meta Description:</strong> {{ $industry->meta_description }}</p>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Challenges & Solutions -->
        @if ($industry->challenges || $industry->solutions)
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-lightbulb me-2"></i>Challenges & Solutions
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        @if ($industry->challenges)
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-muted">Industry Challenges</label>
                                <div class="bg-light rounded p-3">
                                    {!! nl2br(e($industry->challenges)) !!}
                                </div>
                            </div>
                        @endif

                        @if ($industry->solutions)
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
        @if ($industry->market_trends || $industry->regulatory_updates)
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-chart-line me-2"></i>Market Insights
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        @if ($industry->market_trends)
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-muted">Market Trends</label>
                                <div class="bg-light rounded p-3">
                                    {!! nl2br(e($industry->market_trends)) !!}
                                </div>
                            </div>
                        @endif

                        @if ($industry->regulatory_updates)
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
        @if ($industry->case_studies || $industry->resources)
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-book me-2"></i>Case Studies & Resources
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        @if ($industry->case_studies)
                            <div class="col-12">
                                <label class="form-label fw-semibold text-muted">Case Studies</label>
                                <div class="bg-light rounded p-3">
                                    {!! nl2br(e($industry->case_studies)) !!}
                                </div>
                            </div>
                        @endif

                        @if ($industry->resources)
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
                                @if ($industry->status === 'active')
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
                                @if ($industry->priority)
                                    <span class="badge bg-info fs-6">{{ $industry->priority }}</span>
                                @else
                                    <span class="text-muted">Not set</span>
                                @endif
                            </p>
                        </div>

                        @if ($industry->is_featured)
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
            @if ($industry->image || $industry->icon)
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom py-3">
                        <h5 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-image me-2"></i>Visual Assets
                        </h5>
                    </div>
                    <div class="card-body p-4 text-center">
                        @if ($industry->image)
                            <div class="mb-3">
                                <label class="form-label fw-semibold text-muted d-block text-start">Industry Image</label>
                                <img src="{{ Storage::url($industry->image) }}" alt="{{ $industry->name }}"
                                    class="img-fluid rounded shadow-sm" style="max-height: 200px;">
                            </div>
                        @endif

                        @if ($industry->icon)
                            <div class="mb-3">
                                <label class="form-label fw-semibold text-muted d-block text-start">Industry Icon</label>
                                <div class="bg-light rounded p-3">
                                    <i class="{{ $industry->icon }} fa-3x text-primary"></i>
                                </div>
                            </div>
                        @endif

                        @if (!$industry->image && !$industry->icon)
                            <div class="text-center py-4">
                                <i class="fas fa-image fa-3x text-muted mb-3"></i>
                                <p class="text-muted mb-0">No visual assets uploaded</p>
                            </div>
                        @endif
                    </div>
                </div>
            @endif

            <!-- SEO Information -->
            @if ($industry->meta_title || $industry->meta_description || $industry->meta_keywords)
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom py-3">
                        <h5 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-search me-2"></i>SEO Information
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        @if ($industry->meta_title)
                            <div class="mb-3">
                                <label class="form-label fw-semibold text-muted">Meta Title</label>
                                <p class="mb-0 small bg-light rounded p-2">{{ $industry->meta_title }}</p>
                            </div>
                        @endif

                        @if ($industry->meta_description)
                            <div class="mb-3">
                                <label class="form-label fw-semibold text-muted">Meta Description</label>
                                <p class="mb-0 small bg-light rounded p-2">{{ $industry->meta_description }}</p>
                            </div>
                        @endif

                        @if ($industry->meta_keywords)
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

                        @if ($industry->status === 'active')
                            <a href="#" class="btn btn-outline-info" target="_blank">
                                <i class="fas fa-external-link-alt me-2"></i>View on Website
                            </a>
                        @endif

                        <hr class="my-3">

                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                            data-bs-target="#deleteModal">
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
                    <p class="mb-0">Are you sure you want to delete the industry
                        "<strong>{{ $industry->name }}</strong>"?</p>
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
