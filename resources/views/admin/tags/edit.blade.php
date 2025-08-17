@extends('admin.layouts.app')

@section('title', 'Edit Tag')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 text-gray-800">Edit Tag</h1>
        <p class="text-muted">Update tag details</p>
    </div>
    <div>
        <a href="{{ route('admin.tags.show', $tag) }}" class="btn btn-info me-2">
            <i class="fas fa-eye me-2"></i>View Tag
        </a>
        <a href="{{ route('admin.tags.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to Tags
        </a>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Tag Details</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.tags.update', $tag) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Tag Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                               id="name" name="name" value="{{ old('name', $tag->name) }}" required
                               placeholder="e.g., Laravel, JavaScript, Web Development">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug <small class="text-muted">(leave empty to auto-generate)</small></label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror"
                               id="slug" name="slug" value="{{ old('slug', $tag->slug) }}"
                               placeholder="e.g., laravel, javascript, web-development">
                        @error('slug')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="description" class="form-label">Description <small class="text-muted">(optional)</small></label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                                  id="description" name="description" rows="3"
                                  placeholder="Brief description of what this tag represents...">{{ old('description', $tag->description) }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Preview -->
                    <div class="alert alert-light border">
                        <h6 class="mb-2">Preview:</h6>
                        <span class="badge bg-primary" id="tagPreview">{{ old('name', $tag->name) }}</span>
                        <div class="mt-2">
                            <small class="text-muted" id="slugPreview">Slug: {{ old('slug', $tag->slug) }}</small>
                        </div>
                        <div class="mt-1">
                            <small class="text-muted" id="descriptionPreview">
                                {{ old('description', $tag->description ?: 'Description will appear here...') }}
                            </small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Update Tag
                            </button>
                            <a href="{{ route('admin.tags.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tag Statistics -->
        <div class="card mt-4">
            <div class="card-header">
                <h6 class="card-title mb-0">Tag Statistics</h6>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-3">
                        <h4 class="text-primary mb-0">{{ $tag->posts_count }}</h4>
                        <small class="text-muted">Total Posts</small>
                    </div>
                    <div class="col-3">
                        <h4 class="text-success mb-0">{{ $tag->posts()->where('status', 'published')->count() }}</h4>
                        <small class="text-muted">Published</small>
                    </div>
                    <div class="col-3">
                        <h4 class="text-warning mb-0">{{ $tag->posts()->where('status', 'draft')->count() }}</h4>
                        <small class="text-muted">Drafts</small>
                    </div>
                    <div class="col-3">
                        <h4 class="text-info mb-0">{{ $tag->posts()->where('is_featured', true)->count() }}</h4>
                        <small class="text-muted">Featured</small>
                    </div>
                </div>

                <hr>

                <div class="mb-3">
                    <strong>Created:</strong>
                    <span class="text-muted">{{ $tag->created_at->format('M j, Y g:i A') }}</span>
                </div>

                <div class="mb-0">
                    <strong>Last Updated:</strong>
                    <span class="text-muted">{{ $tag->updated_at->format('M j, Y g:i A') }}</span>
                </div>
            </div>
        </div>

        <!-- Popular Tags Suggestions -->
        <div class="card mt-4">
            <div class="card-header">
                <h6 class="card-title mb-0">Popular Tag Suggestions</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <button type="button" class="btn btn-sm btn-outline-primary w-100" onclick="setTag('Laravel')">
                            Laravel
                        </button>
                    </div>
                    <div class="col-md-4 mb-2">
                        <button type="button" class="btn btn-sm btn-outline-primary w-100" onclick="setTag('PHP')">
                            PHP
                        </button>
                    </div>
                    <div class="col-md-4 mb-2">
                        <button type="button" class="btn btn-sm btn-outline-primary w-100" onclick="setTag('JavaScript')">
                            JavaScript
                        </button>
                    </div>
                    <div class="col-md-4 mb-2">
                        <button type="button" class="btn btn-sm btn-outline-primary w-100" onclick="setTag('Web Development')">
                            Web Development
                        </button>
                    </div>
                    <div class="col-md-4 mb-2">
                        <button type="button" class="btn btn-sm btn-outline-primary w-100" onclick="setTag('Vue.js')">
                            Vue.js
                        </button>
                    </div>
                    <div class="col-md-4 mb-2">
                        <button type="button" class="btn btn-sm btn-outline-primary w-100" onclick="setTag('React')">
                            React
                        </button>
                    </div>
                    <div class="col-md-4 mb-2">
                        <button type="button" class="btn btn-sm btn-outline-primary w-100" onclick="setTag('Database')">
                            Database
                        </button>
                    </div>
                    <div class="col-md-4 mb-2">
                        <button type="button" class="btn btn-sm btn-outline-primary w-100" onclick="setTag('API')">
                            API
                        </button>
                    </div>
                    <div class="col-md-4 mb-2">
                        <button type="button" class="btn btn-sm btn-outline-primary w-100" onclick="setTag('Tutorial')">
                            Tutorial
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// Auto-generate slug from name (only if slug is empty)
document.getElementById('name').addEventListener('input', function() {
    const name = this.value;
    const slugField = document.getElementById('slug');

    // Only auto-generate if slug field is empty
    if (slugField.value === '') {
        const slug = name.toLowerCase()
            .replace(/[^\w\s-]/g, '') // Remove special characters
            .replace(/\s+/g, '-') // Replace spaces with hyphens
            .replace(/-+/g, '-') // Replace multiple hyphens with single hyphen
            .trim();

        slugField.value = slug;
    }

    // Update preview
    document.getElementById('tagPreview').textContent = name || 'Tag Name';
});

// Update slug preview
document.getElementById('slug').addEventListener('input', function() {
    const slug = this.value || 'tag-slug';
    document.getElementById('slugPreview').textContent = 'Slug: ' + slug;
});

// Update description preview
document.getElementById('description').addEventListener('input', function() {
    const description = this.value || 'Description will appear here...';
    document.getElementById('descriptionPreview').textContent = description;
});

// Set tag from suggestions
function setTag(tagName) {
    document.getElementById('name').value = tagName;

    const slug = tagName.toLowerCase()
        .replace(/[^\w\s-]/g, '') // Remove special characters
        .replace(/\s+/g, '-') // Replace spaces with hyphens
        .replace(/-+/g, '-') // Replace multiple hyphens with single hyphen
        .trim();

    // Only update slug if it's empty
    if (document.getElementById('slug').value === '') {
        document.getElementById('slug').value = slug;
    }

    // Update preview
    document.getElementById('tagPreview').textContent = tagName;
    document.getElementById('slugPreview').textContent = 'Slug: ' + document.getElementById('slug').value;

    // Focus on description field
    document.getElementById('description').focus();
}
</script>
@endpush
