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
                                <label for="detailed_description" class="form-label">Detailed Description</label>
                                <textarea class="form-control @error('detailed_description') is-invalid @enderror"
                                          id="detailed_description" name="detailed_description" rows="8">{{ old('detailed_description') }}</textarea>
                                <div class="form-text">More detailed description for the service detail sections</div>
                                @error('detailed_description')
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
                                <div id="features-container">
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" name="features[]" placeholder="Enter a feature">
                                        <button type="button" class="btn btn-outline-danger" onclick="removeFeature(this)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-outline-primary btn-sm" onclick="addFeature()">
                                    <i class="fas fa-plus"></i> Add Feature
                                </button>
                                <div class="form-text">List the main features of this service</div>
                                @error('features')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="benefits" class="form-label">Benefits</label>
                                <div id="benefits-container">
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" name="benefits[]" placeholder="Enter a benefit">
                                        <button type="button" class="btn btn-outline-danger" onclick="removeBenefit(this)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-outline-primary btn-sm" onclick="addBenefit()">
                                    <i class="fas fa-plus"></i> Add Benefit
                                </button>
                                <div class="form-text">Benefits clients get from this service</div>
                                @error('benefits')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Sub Services Section -->
                            <div class="mb-4">
                                <label class="form-label">Sub Services</label>
                                <div id="sub-services-container">
                                    <div class="card mb-3 sub-service-group">
                                        <div class="card-header">
                                            <div class="input-group">
                                                <input type="text" class="form-control sub-service-title" placeholder="Sub Service Category (e.g., Statutory Audits)" name="sub_service_titles[]">
                                                <button type="button" class="btn btn-outline-danger" onclick="removeSubServiceGroup(this)">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="sub-service-items">
                                                <div class="input-group mb-2">
                                                    <input type="text" class="form-control" placeholder="Sub service item" name="sub_service_items[0][]">
                                                    <button type="button" class="btn btn-outline-danger btn-sm" onclick="removeSubServiceItem(this)">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-outline-secondary btn-sm" onclick="addSubServiceItem(this)">
                                                <i class="fas fa-plus"></i> Add Item
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-outline-primary btn-sm" onclick="addSubServiceGroup()">
                                    <i class="fas fa-plus"></i> Add Sub Service Category
                                </button>
                                <div class="form-text">Organize services into categories with specific items</div>
                                @error('sub_services')
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
                                <label for="svg_icon" class="form-label">SVG Icon</label>
                                <textarea class="form-control @error('svg_icon') is-invalid @enderror"
                                          id="svg_icon" name="svg_icon" rows="4" placeholder="Enter SVG path content">{{ old('svg_icon') }}</textarea>
                                <div class="form-text">SVG path content for service icons (e.g., from Heroicons)</div>
                                @error('svg_icon')
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

// Features management
function addFeature() {
    const container = document.getElementById('features-container');
    const div = document.createElement('div');
    div.className = 'input-group mb-2';
    div.innerHTML = `
        <input type="text" class="form-control" name="features[]" placeholder="Enter a feature">
        <button type="button" class="btn btn-outline-danger" onclick="removeFeature(this)">
            <i class="fas fa-trash"></i>
        </button>
    `;
    container.appendChild(div);
}

function removeFeature(button) {
    const container = document.getElementById('features-container');
    if (container.children.length > 1) {
        button.parentElement.remove();
    }
}

// Benefits management
function addBenefit() {
    const container = document.getElementById('benefits-container');
    const div = document.createElement('div');
    div.className = 'input-group mb-2';
    div.innerHTML = `
        <input type="text" class="form-control" name="benefits[]" placeholder="Enter a benefit">
        <button type="button" class="btn btn-outline-danger" onclick="removeBenefit(this)">
            <i class="fas fa-trash"></i>
        </button>
    `;
    container.appendChild(div);
}

function removeBenefit(button) {
    const container = document.getElementById('benefits-container');
    if (container.children.length > 1) {
        button.parentElement.remove();
    }
}

// Sub Services management
let subServiceGroupCount = 0;

function addSubServiceGroup() {
    const container = document.getElementById('sub-services-container');
    const groupDiv = document.createElement('div');
    groupDiv.className = 'card mb-3 sub-service-group';
    subServiceGroupCount++;

    groupDiv.innerHTML = `
        <div class="card-header">
            <div class="input-group">
                <input type="text" class="form-control sub-service-title" placeholder="Sub Service Category (e.g., Statutory Audits)" name="sub_service_titles[]">
                <button type="button" class="btn btn-outline-danger" onclick="removeSubServiceGroup(this)">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="sub-service-items">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" placeholder="Sub service item" name="sub_service_items[${subServiceGroupCount}][]">
                    <button type="button" class="btn btn-outline-danger btn-sm" onclick="removeSubServiceItem(this)">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <button type="button" class="btn btn-outline-secondary btn-sm" onclick="addSubServiceItem(this)">
                <i class="fas fa-plus"></i> Add Item
            </button>
        </div>
    `;

    container.appendChild(groupDiv);
}

function removeSubServiceGroup(button) {
    const container = document.getElementById('sub-services-container');
    if (container.children.length > 1) {
        button.closest('.sub-service-group').remove();
    }
}

function addSubServiceItem(button) {
    const itemsContainer = button.previousElementSibling;
    const groupIndex = Array.from(document.querySelectorAll('.sub-service-group')).indexOf(button.closest('.sub-service-group'));

    const itemDiv = document.createElement('div');
    itemDiv.className = 'input-group mb-2';
    itemDiv.innerHTML = `
        <input type="text" class="form-control" placeholder="Sub service item" name="sub_service_items[${groupIndex}][]">
        <button type="button" class="btn btn-outline-danger btn-sm" onclick="removeSubServiceItem(this)">
            <i class="fas fa-times"></i>
        </button>
    `;

    itemsContainer.appendChild(itemDiv);
}

function removeSubServiceItem(button) {
    const itemsContainer = button.closest('.sub-service-items');
    if (itemsContainer.children.length > 1) {
        button.parentElement.remove();
    }
}
</script>
@endpush
