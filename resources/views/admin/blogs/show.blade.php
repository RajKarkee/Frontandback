@extends('admin.layouts.app')

@section('title', 'Blog Post Details')
@section('page-title', 'Blog Post Details')

@section('page-actions')
    <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn btn-warning">
        <i class="fas fa-edit me-2"></i>Edit Post
    </a>
    <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i>Back to Blogs
    </a>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-blog me-2"></i>Blog Post Information
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <h6 class="text-primary fw-bold mb-3">Basic Information</h6>

                            <div class="mb-3">
                                <strong class="text-dark d-block mb-1">Title:</strong>
                                <p class="text-muted mb-0">{{ $blog->title }}</p>
                            </div>

                            <div class="mb-3">
                                <strong class="text-dark d-block mb-1">Status:</strong>
                                <span class="badge bg-{{ $blog->status === 'published' ? 'success' : ($blog->status === 'draft' ? 'warning' : 'danger') }} px-3 py-2">
                                    {{ ucfirst($blog->status) }}
                                </span>
                            </div>

                            @if($blog->author)
                            <div class="mb-3">
                                <strong class="text-dark d-block mb-1">Author:</strong>
                                <p class="text-muted mb-0">
                                    <i class="fas fa-user me-1"></i>{{ $blog->author }}
                                </p>
                            </div>
                            @endif

                            @if($blog->category)
                            <div class="mb-3">
                                <strong class="text-dark d-block mb-1">Category:</strong>
                                <p class="text-muted mb-0">
                                    <i class="fas fa-folder me-1"></i>{{ $blog->category }}
                                </p>
                            </div>
                            @endif

                            @if($blog->tags)
                            <div class="mb-3">
                                <strong class="text-dark d-block mb-1">Tags:</strong>
                                <div>
                                    @foreach(explode(',', $blog->tags) as $tag)
                                        <span class="badge bg-secondary me-1">{{ trim($tag) }}</span>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <h6 class="text-primary fw-bold mb-3">Publishing Details</h6>

                            @if($blog->published_at)
                            <div class="mb-3">
                                <strong class="text-dark d-block mb-1">Published Date:</strong>
                                <p class="text-muted mb-0">
                                    <i class="fas fa-calendar me-1"></i>{{ $blog->published_at->format('F j, Y \a\t g:i A') }}
                                </p>
                            </div>
                            @endif

                            <div class="mb-3">
                                <strong class="text-dark d-block mb-1">Created:</strong>
                                <p class="text-muted mb-0">
                                    <i class="fas fa-calendar-plus me-1"></i>{{ $blog->created_at->format('F j, Y \a\t g:i A') }}
                                </p>
                            </div>

                            <div class="mb-3">
                                <strong class="text-dark d-block mb-1">Last Updated:</strong>
                                <p class="text-muted mb-0">
                                    <i class="fas fa-edit me-1"></i>{{ $blog->updated_at->format('F j, Y \a\t g:i A') }}
                                </p>
                            </div>

                            @if($blog->reading_time)
                            <div class="mb-3">
                                <strong class="text-dark d-block mb-1">Reading Time:</strong>
                                <p class="text-muted mb-0">
                                    <i class="fas fa-clock me-1"></i>{{ $blog->reading_time }} minutes
                                </p>
                            </div>
                            @endif
                        </div>
                    </div>

                    @if($blog->excerpt)
                    <div class="mt-4">
                        <h6 class="text-primary fw-bold mb-3">Excerpt</h6>
                        <div class="p-3 bg-light rounded border">
                            {!! $blog->excerpt !!}
                        </div>
                    </div>
                    @endif

                    @if($blog->content)
                    <div class="mt-4">
                        <h6 class="text-primary fw-bold mb-3">Content</h6>
                        <div class="p-3 bg-light rounded border" style="max-height: 400px; overflow-y: auto;">
                            {!! $blog->content !!}
                        </div>
                    </div>
                    @endif

                    @if($blog->meta_keywords || $blog->meta_description)
                    <div class="mt-4">
                        <h6 class="text-primary fw-bold mb-3">SEO Information</h6>
                        <div class="row g-3">
                            @if($blog->meta_description)
                            <div class="col-12">
                                <strong class="text-dark d-block mb-1">Meta Description:</strong>
                                <p class="text-muted small">{{ $blog->meta_description }}</p>
                            </div>
                            @endif
                            @if($blog->meta_keywords)
                            <div class="col-12">
                                <strong class="text-dark d-block mb-1">Meta Keywords:</strong>
                                <p class="text-muted small">{{ $blog->meta_keywords }}</p>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            @if($blog->featured_image)
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-bottom py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Featured Image</h6>
                </div>
                <div class="card-body p-0">
                    <img src="{{ Storage::url($blog->featured_image) }}"
                         alt="{{ $blog->title }}"
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
                        <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i>Edit Post
                        </a>

                        @if($blog->status === 'draft')
                        <form method="POST" action="{{ route('admin.blogs.update', $blog) }}" class="d-inline">
                            @csrf
                            @method('PUT')
                            @foreach($blog->toArray() as $key => $value)
                                @if($key !== 'status' && !is_array($value))
                                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                                @endif
                            @endforeach
                            <input type="hidden" name="status" value="published">
                            <input type="hidden" name="published_at" value="{{ now() }}">
                            <button type="submit" class="btn btn-success w-100">
                                <i class="fas fa-eye me-2"></i>Publish Post
                            </button>
                        </form>
                        @elseif($blog->status === 'published')
                        <form method="POST" action="{{ route('admin.blogs.update', $blog) }}" class="d-inline">
                            @csrf
                            @method('PUT')
                            @foreach($blog->toArray() as $key => $value)
                                @if($key !== 'status' && !is_array($value))
                                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                                @endif
                            @endforeach
                            <input type="hidden" name="status" value="draft">
                            <button type="submit" class="btn btn-warning w-100">
                                <i class="fas fa-eye-slash me-2"></i>Unpublish Post
                            </button>
                        </form>
                        @endif

                        <form method="POST" action="{{ route('admin.blogs.destroy', $blog) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100"
                                    onclick="return confirmDelete('Are you sure you want to delete this blog post?')">
                                <i class="fas fa-trash me-2"></i>Delete Post
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
