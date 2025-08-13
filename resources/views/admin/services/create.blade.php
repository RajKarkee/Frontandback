@extends('admin.layouts.app')

@section('title', 'Create Service')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{ route('admin.services.index') }}">Services</a></li>
<li class="breadcrumb-item active">Create Service</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Create New Service</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="title" class="form-label">Service Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                       id="title" name="title" value="{{ old('title') }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                       id="slug" name="slug" value="{{ old('slug') }}">
                                <div class="form-text">Leave empty to auto-generate from title</div>
                                @error('slug')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Service Description <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                          id="description" name="description" rows="6" required>{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">Detailed Content</label>
                                <textarea class="form-control @error('content') is-invalid @enderror"
                                          id="content" name="content" rows="10">{{ old('content') }}</textarea>
                                <div class="form-text">Detailed information about the service</div>
                                @error('content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="features" class="form-label">Key Features</label>
                                <textarea class="form-control @error('features') is-invalid @enderror"
                                          id="features" name="features" rows="5">{{ old('features') }}</textarea>
                                <div class="form-text">List the main features of this service</div>
                                @error('features')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="benefits" class="form-label">Benefits</label>
                                <textarea class="form-control @error('benefits') is-invalid @enderror"
                                          id="benefits" name="benefits" rows="5">{{ old('benefits') }}</textarea>
                                <div class="form-text">Benefits clients get from this service</div>
                                @error('benefits')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                                    <option value="active" {{ old('status', 'active') === 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ old('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-select @error('category') is-invalid @enderror" id="category" name="category">
                                    <option value="">Select Category</option>
                                    <option value="consulting" {{ old('category') === 'consulting' ? 'selected' : '' }}>Consulting</option>
                                    <option value="development" {{ old('category') === 'development' ? 'selected' : '' }}>Development</option>
                                    <option value="design" {{ old('category') === 'design' ? 'selected' : '' }}>Design</option>
                                    <option value="marketing" {{ old('category') === 'marketing' ? 'selected' : '' }}>Marketing</option>
                                    <option value="support" {{ old('category') === 'support' ? 'selected' : '' }}>Support</option>
                                    <option value="training" {{ old('category') === 'training' ? 'selected' : '' }}>Training</option>
                                    <option value="strategy" {{ old('category') === 'strategy' ? 'selected' : '' }}>Strategy</option>
                                    <option value="technology" {{ old('category') === 'technology' ? 'selected' : '' }}>Technology</option>
                                    <option value="other" {{ old('category') === 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">Starting Price</label>
                                <input type="text" class="form-control @error('price') is-invalid @enderror"
                                       id="price" name="price" value="{{ old('price') }}" placeholder="e.g., $99/month">
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="duration" class="form-label">Typical Duration</label>
                                <input type="text" class="form-control @error('duration') is-invalid @enderror"
                                       id="duration" name="duration" value="{{ old('duration') }}" placeholder="e.g., 2-4 weeks">
                                @error('duration')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="sort_order" class="form-label">Sort Order</label>
                                <input type="number" class="form-control @error('sort_order') is-invalid @enderror"
                                       id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}" min="0">
                                <div class="form-text">Higher numbers appear first</div>
                                @error('sort_order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="featured_image" class="form-label">Featured Image</label>
                                <input type="file" class="form-control @error('featured_image') is-invalid @enderror"
                                       id="featured_image" name="featured_image" accept="image/*">
                                @error('featured_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="icon" class="form-label">Service Icon</label>
                                <input type="text" class="form-control @error('icon') is-invalid @enderror"
                                       id="icon" name="icon" value="{{ old('icon') }}" placeholder="e.g., fas fa-cogs">
                                <div class="form-text">Font Awesome icon class</div>
                                @error('icon')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_featured"
                                           name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_featured">
                                        Featured Service
                                    </label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="meta_title" class="form-label">Meta Title</label>
                                <input type="text" class="form-control @error('meta_title') is-invalid @enderror"
                                       id="meta_title" name="meta_title" value="{{ old('meta_title') }}">
                                @error('meta_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="meta_description" class="form-label">Meta Description</label>
                                <textarea class="form-control @error('meta_description') is-invalid @enderror"
                                          id="meta_description" name="meta_description" rows="3">{{ old('meta_description') }}</textarea>
                                @error('meta_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <hr>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Back to Services
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Create Service
                                </button>
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
// Auto-generate slug from title
document.getElementById('title').addEventListener('input', function() {
    const title = this.value;
    const slug = title.toLowerCase()
        .replace(/[^a-z0-9 -]/g, '')
        .replace(/\s+/g, '-')
        .replace(/-+/g, '-')
        .trim('-');
    document.getElementById('slug').value = slug;
});
</script>
@endpush
