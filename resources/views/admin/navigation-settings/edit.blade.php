@extends('admin.layouts.app')

@section('title', 'Edit Navigation Setting')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mb-2">
                <div class="page-title-box" style="display: flex; justify-content: space-between; align-items: center;">
                    <h4 class="page-title">Edit Navigation Setting - {{ $navigationSetting->page_title }}</h4>
                    <div class="page-title-right">
                        <a href="{{ route('admin.navigation-settings.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back to Navigation Settings
                        </a>
                    </div>
                </div>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <form action="{{ route('admin.navigation-settings.update', $navigationSetting) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <!-- Basic Information -->
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Navigation Information</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="page_title" class="form-label">Page Title</label>
                                <input type="text" class="form-control @error('page_title') is-invalid @enderror"
                                    id="page_title" name="page_title"
                                    value="{{ old('page_title', $navigationSetting->page_title) }}"
                                    placeholder="Enter page title">
                                @error('page_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="route_name" class="form-label">Route Name</label>
                                <input type="text" class="form-control @error('route_name') is-invalid @enderror"
                                    id="route_name" name="route_name"
                                    value="{{ old('route_name', $navigationSetting->route_name) }}"
                                    placeholder="Enter route name (e.g., home, services)">
                                @error('route_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="icon_class" class="form-label">Icon Class</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="{{ old('icon_class', $navigationSetting->icon_class) }}"
                                            id="icon-preview"></i>
                                    </span>
                                    <input type="text" class="form-control @error('icon_class') is-invalid @enderror"
                                        id="icon_class" name="icon_class"
                                        value="{{ old('icon_class', $navigationSetting->icon_class) }}"
                                        placeholder="e.g., fas fa-home" onkeyup="updateIconPreview()">
                                </div>
                                @error('icon_class')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Use Font Awesome icon classes (e.g., fas fa-home, fas fa-briefcase)
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                    rows="4" placeholder="Enter navigation description">{{ old('description', $navigationSetting->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tags" class="form-label">Tags</label>
                                <input type="text" class="form-control @error('tags') is-invalid @enderror"
                                    id="tags" name="tags" value="{{ old('tags', $navigationSetting->tags) }}"
                                    placeholder="Enter comma-separated tags (e.g., Finance,Consulting,Audit)">
                                @error('tags')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Settings -->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Settings</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="sort_order" class="form-label">Sort Order</label>
                                <input type="number" class="form-control @error('sort_order') is-invalid @enderror"
                                    id="sort_order" name="sort_order"
                                    value="{{ old('sort_order', $navigationSetting->sort_order) }}" min="0">
                                @error('sort_order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <div class="form-check form-switch">
                                    <input type="hidden" name="is_active" value="0">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active"
                                        value="1"
                                        {{ old('is_active', $navigationSetting->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">
                                        <span class="fw-bold">Active</span>
                                        <small class="text-muted d-block">Show this navigation item on the sidebar</small>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Preview Image -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Preview Image</h5>
                        </div>
                        <div class="card-body">
                            @if ($navigationSetting->preview_image)
                                <div class="mb-3">
                                    <img src="{{ $navigationSetting->preview_image_url }}" alt="Current preview image"
                                        class="img-thumbnail" style="max-width: 100%;">
                                    <div class="form-text">Current preview image</div>
                                </div>
                            @endif

                            <div class="mb-3">
                                <label for="preview_image" class="form-label">Upload New Image</label>
                                <input type="file" class="form-control @error('preview_image') is-invalid @enderror"
                                    id="preview_image" name="preview_image" accept="image/*">
                                @error('preview_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Upload a new image to replace the current one (JPEG, PNG, JPG, GIF,
                                    WebP). Max size: 2MB</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>Update Navigation Setting
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        function updateIconPreview() {
            const iconClass = document.getElementById('icon_class').value;
            const iconPreview = document.getElementById('icon-preview');
            iconPreview.className = iconClass || 'fas fa-question';
        }

        // Initialize icon preview
        document.addEventListener('DOMContentLoaded', function() {
            updateIconPreview();
        });
    </script>
@endsection
