@extends('admin.layouts.app')

@section('title', 'Page Details')
@section('page-title', 'Page Details')

@section('page-actions')
    <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-warning">
        <i class="fas fa-edit me-2"></i>Edit Page
    </a>
    <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i>Back to Pages
    </a>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-file-alt me-2"></i>Page Information
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <h6 class="text-primary fw-bold mb-3">Basic Information</h6>

                            <div class="mb-3">
                                <strong class="text-dark d-block mb-1">Title:</strong>
                                <p class="text-muted mb-0">{{ $page->title }}</p>
                            </div>

                            <div class="mb-3">
                                <strong class="text-dark d-block mb-1">Slug:</strong>
                                <p class="text-muted mb-0">
                                    <code>{{ $page->slug }}</code>
                                </p>
                            </div>

                            <div class="mb-3">
                                <strong class="text-dark d-block mb-1">Status:</strong>
                                <span class="badge bg-{{ $page->status === 'published' ? 'success' : ($page->status === 'draft' ? 'warning' : 'danger') }} px-3 py-2">
                                    {{ ucfirst($page->status) }}
                                </span>
                            </div>

                            @if($page->template)
                            <div class="mb-3">
                                <strong class="text-dark d-block mb-1">Template:</strong>
                                <p class="text-muted mb-0">
                                    <i class="fas fa-layout me-1"></i>{{ $page->template }}
                                </p>
                            </div>
                            @endif

                            @if($page->parent_id)
                            <div class="mb-3">
                                <strong class="text-dark d-block mb-1">Parent Page:</strong>
                                <p class="text-muted mb-0">
                                    <i class="fas fa-sitemap me-1"></i>{{ $page->parent->title ?? 'N/A' }}
                                </p>
                            </div>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <h6 class="text-primary fw-bold mb-3">Publishing Details</h6>

                            @if($page->published_at)
                            <div class="mb-3">
                                <strong class="text-dark d-block mb-1">Published Date:</strong>
                                <p class="text-muted mb-0">
                                    <i class="fas fa-calendar me-1"></i>{{ $page->published_at->format('F j, Y \a\t g:i A') }}
                                </p>
                            </div>
                            @endif

                            <div class="mb-3">
                                <strong class="text-dark d-block mb-1">Created:</strong>
                                <p class="text-muted mb-0">
                                    <i class="fas fa-calendar-plus me-1"></i>{{ $page->created_at->format('F j, Y \a\t g:i A') }}
                                </p>
                            </div>

                            <div class="mb-3">
                                <strong class="text-dark d-block mb-1">Last Updated:</strong>
                                <p class="text-muted mb-0">
                                    <i class="fas fa-edit me-1"></i>{{ $page->updated_at->format('F j, Y \a\t g:i A') }}
                                </p>
                            </div>

                            @if($page->sort_order)
                            <div class="mb-3">
                                <strong class="text-dark d-block mb-1">Sort Order:</strong>
                                <p class="text-muted mb-0">
                                    <i class="fas fa-sort-numeric-up me-1"></i>{{ $page->sort_order }}
                                </p>
                            </div>
                            @endif

                            <div class="mb-3">
                                <strong class="text-dark d-block mb-1">Featured:</strong>
                                <span class="badge bg-{{ $page->is_featured ? 'success' : 'secondary' }}">
                                    {{ $page->is_featured ? 'Yes' : 'No' }}
                                </span>
                            </div>
                        </div>
                    </div>

                    @if($page->excerpt)
                    <div class="mt-4">
                        <h6 class="text-primary fw-bold mb-3">Excerpt</h6>
                        <div class="p-3 bg-light rounded border">
                            {!! nl2br(e($page->excerpt)) !!}
                        </div>
                    </div>
                    @endif

                    @if($page->content)
                    <div class="mt-4">
                        <h6 class="text-primary fw-bold mb-3">Content</h6>
                        <div class="p-3 bg-light rounded border" style="max-height: 400px; overflow-y: auto;">
                            {!! nl2br(e($page->content)) !!}
                        </div>
                    </div>
                    @endif

                    @if($page->meta_keywords || $page->meta_description)
                    <div class="mt-4">
                        <h6 class="text-primary fw-bold mb-3">SEO Information</h6>
                        <div class="row g-3">
                            @if($page->meta_description)
                            <div class="col-12">
                                <strong class="text-dark d-block mb-1">Meta Description:</strong>
                                <p class="text-muted small">{{ $page->meta_description }}</p>
                            </div>
                            @endif
                            @if($page->meta_keywords)
                            <div class="col-12">
                                <strong class="text-dark d-block mb-1">Meta Keywords:</strong>
                                <p class="text-muted small">{{ $page->meta_keywords }}</p>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            @if($page->featured_image)
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-bottom py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Featured Image</h6>
                </div>
                <div class="card-body p-0">
                    <img src="{{ Storage::url($page->featured_image) }}"
                         alt="{{ $page->title }}"
                         class="img-fluid w-100"
                         style="max-height: 300px; object-fit: cover;">
                </div>
            </div>
            @endif

            <!-- Actions Card -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-cogs me-2"></i>Actions
                    </h6>
                </div>
                <div class="card-body p-4">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i>Edit Page
                        </a>

                        @if($page->status === 'published')
                            <a href="{{ route($page->slug === 'home' ? 'home' : 'page', $page->slug) }}"
                               class="btn btn-info" target="_blank">
                                <i class="fas fa-external-link-alt me-2"></i>View Page
                            </a>
                        @endif

                        @if($page->status === 'draft')
                        <form method="POST" action="{{ route('admin.pages.update', $page) }}" class="d-inline">
                            @csrf
                            @method('PUT')
                            @foreach($page->toArray() as $key => $value)
                                @if($key !== 'status' && !is_array($value))
                                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                                @endif
                            @endforeach
                            <input type="hidden" name="status" value="published">
                            <input type="hidden" name="published_at" value="{{ now() }}">
                            <button type="submit" class="btn btn-success w-100">
                                <i class="fas fa-eye me-2"></i>Publish Page
                            </button>
                        </form>
                        @elseif($page->status === 'published')
                        <form method="POST" action="{{ route('admin.pages.update', $page) }}" class="d-inline">
                            @csrf
                            @method('PUT')
                            @foreach($page->toArray() as $key => $value)
                                @if($key !== 'status' && !is_array($value))
                                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                                @endif
                            @endforeach
                            <input type="hidden" name="status" value="draft">
                            <button type="submit" class="btn btn-warning w-100">
                                <i class="fas fa-eye-slash me-2"></i>Unpublish Page
                            </button>
                        </form>
                        @endif

                        <form method="POST" action="{{ route('admin.pages.destroy', $page) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100"
                                    onclick="return confirmDelete('Are you sure you want to delete this page?')">
                                <i class="fas fa-trash me-2"></i>Delete Page
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Child Pages -->
            @if($page->children && $page->children->count() > 0)
            <div class="card border-0 shadow-sm mt-4">
                <div class="card-header bg-white border-bottom py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-sitemap me-2"></i>Child Pages
                    </h6>
                </div>
                <div class="card-body p-4">
                    <div class="list-group list-group-flush">
                        @foreach($page->children as $child)
                            <div class="list-group-item border-0 px-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong>{{ $child->title }}</strong>
                                        <br>
                                        <small class="text-muted">{{ $child->slug }}</small>
                                    </div>
                                    <span class="badge bg-{{ $child->status === 'published' ? 'success' : 'warning' }}">
                                        {{ ucfirst($child->status) }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection
