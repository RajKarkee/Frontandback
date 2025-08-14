@extends('admin.layouts.app')

@section('title', 'Edit Industry')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.industries.index') }}">Industries</a></li>
    <li class="breadcrumb-item active">Edit Industry</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Edit Industry: {{ $industry->name }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.industries.update', $industry) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="name" class="form-label">Industry Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name', $industry->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="title" class="form-label">Display Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="title" name="title" value="{{ old('title', $industry->title) }}">
                                <div class="form-text">Optional display title (uses name if empty)</div>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="slug" class="form-label">URL Slug</label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                    id="slug" name="slug" value="{{ old('slug', $industry->slug) }}">
                                <div class="form-text">Leave empty to auto-generate from name</div>
                                @error('slug')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <input type="text" class="form-control @error('category') is-invalid @enderror"
                                    id="category" name="category" value="{{ old('category', $industry->category) }}"
                                    placeholder="e.g., Healthcare, Technology">
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                    id="description" name="description" rows="3" required>{{ old('description', $industry->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">Detailed Content</label>
                                <textarea class="form-control @error('content') is-invalid @enderror"
                                    id="content" name="content" rows="6">{{ old('content', $industry->content) }}</textarea>
                                @error('content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Features Section -->
                            <div class="mb-3">
                                <label class="form-label">Industry Features</label>
                                <div id="features-container">
                                    @forelse(old('features', $industry->features ?? []) as $index => $feature)
                                        <div class="feature-item mb-2">
                                            <div class="input-group">
                                                <input type="text" name="features[]" class="form-control" value="{{ $feature }}" placeholder="Enter feature">
                                                <button type="button" class="btn btn-outline-danger" onclick="removeFeature(this)">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="feature-item mb-2">
                                            <div class="input-group">
                                                <input type="text" name="features[]" class="form-control" placeholder="Enter feature">
                                                <button type="button" class="btn btn-outline-danger" onclick="removeFeature(this)">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    @endforelse
                                </div>
                                <button type="button" class="btn btn-outline-primary mt-2" onclick="addFeature()">
                                    <i class="fas fa-plus me-1"></i>Add Feature
                                </button>
                            </div>

                            <!-- SVG Icon Section -->
                            <div class="mb-3">
                                <label for="svg_icon" class="form-label">SVG Path Data</label>
                                <textarea class="form-control @error('svg_icon') is-invalid @enderror"
                                    id="svg_icon" name="svg_icon" rows="3"
                                    placeholder="Enter SVG path data (e.g., M4.318 6.318a4.5 4.5 0...)">{{ old('svg_icon', $industry->svg_icon) }}</textarea>
                                @error('svg_icon')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">SVG path data for custom icons. This will be used inside an SVG element.</div>

                                @if($industry->svg_icon)
                                    <div class="mt-3">
                                        <label class="form-label d-block">Current SVG Icon</label>
                                        <div class="p-3 border rounded text-center" style="max-width: 100px;">
                                            <svg class="w-100 h-100" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="max-height: 60px;">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $industry->svg_icon }}" />
                                            </svg>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <!-- SEO Section -->
                            <div class="mb-3">
                                <label for="meta_title" class="form-label">Meta Title</label>
                                <input type="text" class="form-control @error('meta_title') is-invalid @enderror"
                                    id="meta_title" name="meta_title" value="{{ old('meta_title', $industry->meta_title) }}"
                                    maxlength="60">
                                <div class="form-text">Recommended: 50-60 characters</div>
                                @error('meta_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="meta_description" class="form-label">Meta Description</label>
                                <textarea class="form-control @error('meta_description') is-invalid @enderror"
                                    id="meta_description" name="meta_description" rows="3"
                                    maxlength="160">{{ old('meta_description', $industry->meta_description) }}</textarea>
                                <div class="form-text">Recommended: 150-160 characters</div>
                                @error('meta_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <!-- Status & Settings -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h6 class="card-title mb-0">Status & Settings</h6>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                                            <option value="active" {{ old('status', $industry->status) === 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="inactive" {{ old('status', $industry->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="sort_order" class="form-label">Sort Order</label>
                                        <input type="number" class="form-control @error('sort_order') is-invalid @enderror"
                                            id="sort_order" name="sort_order" value="{{ old('sort_order', $industry->sort_order ?? 0) }}"
                                            min="0">
                                        @error('sort_order')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured"
                                                value="1" {{ old('is_featured', $industry->is_featured) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_featured">
                                                Featured Industry
                                            </label>
                                        </div>
                                        <div class="form-text">Featured industries appear prominently on the website</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Image Upload -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h6 class="card-title mb-0">Featured Image</h6>
                                </div>
                                <div class="card-body">
                                    @if($industry->featured_image)
                                        <div class="text-center mb-3">
                                            <img src="{{ Storage::url($industry->featured_image) }}" alt="{{ $industry->name }}"
                                                class="img-fluid rounded shadow-sm" style="max-height: 200px;">
                                            <div class="form-check mt-2">
                                                <input class="form-check-input" type="checkbox" id="remove_image" name="remove_image" value="1">
                                                <label class="form-check-label text-danger" for="remove_image">
                                                    Remove current image
                                                </label>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="mb-3">
                                        <label for="featured_image" class="form-label">
                                            {{ $industry->featured_image ? 'Replace Image' : 'Upload Image' }}
                                        </label>
                                        <input type="file" class="form-control @error('featured_image') is-invalid @enderror"
                                            id="featured_image" name="featured_image" accept="image/*">
                                        @error('featured_image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">
                                            Recommended: 800x600px, JPG/PNG, max 2MB
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- FontAwesome Icon -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h6 class="card-title mb-0">FontAwesome Icon</h6>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="icon" class="form-label">Icon Class</label>
                                        <input type="text" class="form-control @error('icon') is-invalid @enderror" id="icon"
                                            name="icon" value="{{ old('icon', $industry->icon) }}" placeholder="fas fa-industry">
                                        @error('icon')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">
                                            FontAwesome icon class (e.g., fas fa-industry)
                                        </div>
                                    </div>

                                    @if($industry->icon)
                                        <div class="text-center">
                                            <label class="form-label d-block">Current Icon</label>
                                            <i class="{{ $industry->icon }} fa-2x text-primary"></i>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save me-2"></i>Update Industry
                                        </button>

                                        <a href="{{ route('admin.industries.show', $industry) }}" class="btn btn-outline-info">
                                            <i class="fas fa-eye me-2"></i>View Details
                                        </a>

                                        <a href="{{ route('admin.industries.index') }}" class="btn btn-outline-secondary">
                                            <i class="fas fa-list me-2"></i>All Industries
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Auto-generate slug from name
    document.getElementById('name').addEventListener('input', function() {
        const name = this.value;
        const slug = name.toLowerCase()
            .replace(/[^a-z0-9 -]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-')
            .trim('-');
        document.getElementById('slug').value = slug;
    });

    // Features management
    function addFeature() {
        const container = document.getElementById('features-container');
        const newFeature = document.createElement('div');
        newFeature.className = 'feature-item mb-2';
        newFeature.innerHTML = `
            <div class="input-group">
                <input type="text" name="features[]" class="form-control" placeholder="Enter feature">
                <button type="button" class="btn btn-outline-danger" onclick="removeFeature(this)">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        `;
        container.appendChild(newFeature);
    }

    function removeFeature(button) {
        const container = document.getElementById('features-container');
        if (container.children.length > 1) {
            button.closest('.feature-item').remove();
        }
    }

    // Character counters for meta fields
    function updateCounter(fieldId, maxLength) {
        const field = document.getElementById(fieldId);
        if (field) {
            const counter = document.createElement('div');
            counter.className = 'form-text text-end';
            counter.textContent = `${field.value.length}/${maxLength} characters`;

            // Remove existing counter
            const existing = field.parentNode.querySelector('.form-text.text-end');
            if (existing) existing.remove();

            field.parentNode.appendChild(counter);

            field.addEventListener('input', function() {
                counter.textContent = `${this.value.length}/${maxLength} characters`;
                if (this.value.length > maxLength) {
                    counter.classList.add('text-danger');
                } else {
                    counter.classList.remove('text-danger');
                }
            });
        }
    }

    // Initialize counters
    updateCounter('meta_title', 60);
    updateCounter('meta_description', 160);

    // Auto-fill meta title from name if empty
    document.getElementById('name').addEventListener('input', function() {
        const metaTitle = document.getElementById('meta_title');
        if (!metaTitle.value) {
            metaTitle.value = this.value;
            metaTitle.dispatchEvent(new Event('input'));
        }
    });

    // Image preview
    document.getElementById('featured_image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                let preview = document.getElementById('imagePreview');
                if (!preview) {
                    preview = document.createElement('div');
                    preview.id = 'imagePreview';
                    preview.className = 'mt-2 text-center';
                    e.target.parentNode.appendChild(preview);
                }
                preview.innerHTML = `
                    <img src="${event.target.result}" class="img-fluid rounded shadow-sm" style="max-height: 150px;">
                    <div class="form-text">Preview of new image</div>
                `;
            };
            reader.readAsDataURL(file);
        }
    });

    // Icon preview
    document.getElementById('icon').addEventListener('input', function() {
        let preview = document.getElementById('iconPreview');
        if (!preview) {
            preview = document.createElement('div');
            preview.id = 'iconPreview';
            preview.className = 'mt-2 text-center';
            this.parentNode.appendChild(preview);
        }

        if (this.value) {
            preview.innerHTML = `
                <i class="${this.value} fa-2x text-primary"></i>
                <div class="form-text">Icon preview</div>
            `;
        } else {
            preview.innerHTML = '';
        }
    });
</script>
@endpush
