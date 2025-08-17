@extends('admin.layouts.app')

@section('title', 'Edit Category')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 text-gray-800">Edit Category</h1>
        <p class="text-muted">Update category details</p>
    </div>
    <div>
        <a href="{{ route('admin.categories.show', $category) }}" class="btn btn-info me-2">
            <i class="fas fa-eye me-2"></i>View Category
        </a>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to Categories
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Category Details</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.categories.update', $category) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Category Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                               id="name" name="name" value="{{ old('name', $category->name) }}" required>
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug <small class="text-muted">(leave empty to auto-generate)</small></label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror"
                               id="slug" name="slug" value="{{ old('slug', $category->slug) }}">
                        @error('slug')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                                  id="description" name="description" rows="4"
                                  placeholder="Brief description of the category...">{{ old('description', $category->description) }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="icon" class="form-label">Icon Class <small class="text-muted">(FontAwesome class)</small></label>
                        <div class="input-group">
                            <input type="text" class="form-control @error('icon') is-invalid @enderror"
                                   id="icon" name="icon" value="{{ old('icon', $category->icon) }}"
                                   placeholder="e.g., fas fa-code, fas fa-laptop">
                            <span class="input-group-text">
                                <i id="iconPreview" class="{{ old('icon', $category->icon ?: 'fas fa-folder') }}"></i>
                            </span>
                        </div>
                        @error('icon')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">
                            Use FontAwesome icon classes. Preview will appear on the right.
                            <br>Examples: <code>fas fa-code</code>, <code>fas fa-laptop</code>, <code>fas fa-mobile-alt</code>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Update Category
                            </button>
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <!-- Preview -->
        <div class="card">
            <div class="card-header">
                <h6 class="card-title mb-0">Preview</h6>
            </div>
            <div class="card-body">
                <div class="category-preview">
                    <div class="d-flex align-items-center mb-3">
                        <i id="previewIcon" class="{{ old('icon', $category->icon ?: 'fas fa-folder') }} me-3 text-primary" style="font-size: 1.5rem;"></i>
                        <div>
                            <h6 class="mb-0" id="previewName">{{ old('name', $category->name) }}</h6>
                            <small class="text-muted" id="previewSlug">{{ old('slug', $category->slug) }}</small>
                        </div>
                    </div>
                    <p class="text-muted mb-0" id="previewDescription">
                        {{ old('description', $category->description ?: 'Category description will appear here...') }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Category Stats -->
        <div class="card mt-4">
            <div class="card-header">
                <h6 class="card-title mb-0">Category Statistics</h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <strong>Total Posts:</strong>
                    <span class="badge bg-primary ms-2">{{ $category->posts_count }}</span>
                </div>
                <div class="mb-3">
                    <strong>Published Posts:</strong>
                    <span class="badge bg-success ms-2">{{ $category->posts()->where('status', 'published')->count() }}</span>
                </div>
                <div class="mb-3">
                    <strong>Draft Posts:</strong>
                    <span class="badge bg-warning ms-2">{{ $category->posts()->where('status', 'draft')->count() }}</span>
                </div>
                <div class="mb-0">
                    <strong>Created:</strong>
                    <div class="text-muted">{{ $category->created_at->format('M j, Y') }}</div>
                </div>
            </div>
        </div>

        <!-- Icon Examples -->
        <div class="card mt-4">
            <div class="card-header">
                <h6 class="card-title mb-0">Popular Icons</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6 mb-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary w-100" onclick="setIcon('fas fa-code')">
                            <i class="fas fa-code me-1"></i> Code
                        </button>
                    </div>
                    <div class="col-6 mb-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary w-100" onclick="setIcon('fas fa-laptop')">
                            <i class="fas fa-laptop me-1"></i> Tech
                        </button>
                    </div>
                    <div class="col-6 mb-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary w-100" onclick="setIcon('fas fa-mobile-alt')">
                            <i class="fas fa-mobile-alt me-1"></i> Mobile
                        </button>
                    </div>
                    <div class="col-6 mb-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary w-100" onclick="setIcon('fas fa-globe')">
                            <i class="fas fa-globe me-1"></i> Web
                        </button>
                    </div>
                    <div class="col-6 mb-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary w-100" onclick="setIcon('fas fa-chart-line')">
                            <i class="fas fa-chart-line me-1"></i> Analytics
                        </button>
                    </div>
                    <div class="col-6 mb-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary w-100" onclick="setIcon('fas fa-shield-alt')">
                            <i class="fas fa-shield-alt me-1"></i> Security
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
    document.getElementById('previewName').textContent = name || 'Category Name';
});

// Update slug preview
document.getElementById('slug').addEventListener('input', function() {
    document.getElementById('previewSlug').textContent = this.value || 'category-slug';
});

// Update description preview
document.getElementById('description').addEventListener('input', function() {
    document.getElementById('previewDescription').textContent = this.value || 'Category description will appear here...';
});

// Update icon preview
document.getElementById('icon').addEventListener('input', function() {
    const iconClass = this.value || 'fas fa-folder';
    document.getElementById('iconPreview').className = iconClass;
    document.getElementById('previewIcon').className = iconClass + ' me-3 text-primary';
});

// Set icon from buttons
function setIcon(iconClass) {
    document.getElementById('icon').value = iconClass;
    document.getElementById('iconPreview').className = iconClass;
    document.getElementById('previewIcon').className = iconClass + ' me-3 text-primary';
}
</script>
@endpush
