@extends('admin.layouts.app')

@section('title', 'Edit Jumbotron')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Edit Jumbotron - {{ $availablePages[$jumbotron->page_slug] ?? $jumbotron->page_slug }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.jumbotrons.update', $jumbotron) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="page_slug" class="form-label">Page <span class="text-danger">*</span></label>
                        <select class="form-select @error('page_slug') is-invalid @enderror"
                                id="page_slug"
                                name="page_slug"
                                required>
                            <option value="">Select a page...</option>
                            @foreach($availablePages as $slug => $name)
                                <option value="{{ $slug }}" {{ old('page_slug', $jumbotron->page_slug) == $slug ? 'selected' : '' }}>
                                    {{ $name }}
                                </option>
                            @endforeach
                        </select>
                        @error('page_slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Select the page where this jumbotron will be displayed.</div>
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text"
                               class="form-control @error('title') is-invalid @enderror"
                               id="title"
                               name="title"
                               value="{{ old('title', $jumbotron->title) }}"
                               required
                               maxlength="255"
                               placeholder="Enter the main title">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">This will be the main heading displayed on the jumbotron.</div>
                    </div>

                    <div class="mb-3">
                        <label for="subtitle" class="form-label">Subtitle <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('subtitle') is-invalid @enderror"
                                  id="subtitle"
                                  name="subtitle"
                                  rows="3"
                                  required
                                  placeholder="Enter the subtitle or description">{{ old('subtitle', $jumbotron->subtitle) }}</textarea>
                        @error('subtitle')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">This text will appear below the main title.</div>
                    </div>

                    <div class="mb-3">
                        <label for="background_image" class="form-label">Background Image</label>
                        @if($jumbotron->background_image_url)
                            <div class="mb-2">
                                <small class="text-muted">Current image:</small>
                                <div class="position-relative d-inline-block">
                                    <img src="{{ $jumbotron->background_image_url }}"
                                         alt="Current background"
                                         class="img-thumbnail"
                                         style="width: 200px; height: 120px; object-fit: cover;">
                                </div>
                            </div>
                        @endif
                        <input type="file"
                               class="form-control @error('background_image') is-invalid @enderror"
                               id="background_image"
                               name="background_image"
                               accept="image/jpeg,image/png,image/jpg,image/webp">
                        @error('background_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">
                            Upload a new image to replace the current one. Leave empty to keep current image.
                            <br>Recommended size: 1920x1080px or larger.
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="sort_order" class="form-label">Sort Order</label>
                                <input type="number"
                                       class="form-control @error('sort_order') is-invalid @enderror"
                                       id="sort_order"
                                       name="sort_order"
                                       value="{{ old('sort_order', $jumbotron->sort_order) }}"
                                       min="0">
                                @error('sort_order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Lower numbers appear first.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input"
                                           type="checkbox"
                                           id="is_active"
                                           name="is_active"
                                           value="1"
                                           {{ old('is_active', $jumbotron->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">
                                        Active
                                    </label>
                                </div>
                                <div class="form-text">Only active jumbotrons will be displayed on the frontend.</div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.jumbotrons.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Back to List
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Update Jumbotron
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title mb-0">Preview</h6>
            </div>
            <div class="card-body">
                <div id="jumbotron-preview" class="position-relative rounded overflow-hidden"
                     style="height: 200px;
                            background-image: url('{{ $jumbotron->background_image_url ?: '' }}');
                            background-size: cover;
                            background-position: center;
                            {{ !$jumbotron->background_image_url ? 'background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);' : '' }}">
                    <div class="position-absolute inset-0 bg-dark bg-opacity-40"></div>
                    <div class="position-absolute top-50 start-50 translate-middle text-center text-white w-100 px-3">
                        <h5 id="preview-title" class="mb-2">{{ $jumbotron->title }}</h5>
                        <p id="preview-subtitle" class="mb-0 small">{{ Str::limit($jumbotron->subtitle, 80) }}</p>
                    </div>
                </div>
                <small class="text-muted mt-2 d-block">Live preview of your jumbotron.</small>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h6 class="card-title mb-0">Jumbotron Info</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <small class="text-muted">Created:</small>
                        <div>{{ $jumbotron->created_at->format('M d, Y') }}</div>
                    </div>
                    <div class="col-6">
                        <small class="text-muted">Updated:</small>
                        <div>{{ $jumbotron->updated_at->format('M d, Y') }}</div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-6">
                        <small class="text-muted">Status:</small>
                        <div>
                            <span class="badge {{ $jumbotron->is_active ? 'bg-success' : 'bg-secondary' }}">
                                {{ $jumbotron->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                    </div>
                    <div class="col-6">
                        <small class="text-muted">Sort Order:</small>
                        <div>{{ $jumbotron->sort_order }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h6 class="card-title mb-0">Quick Actions</h6>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.jumbotrons.show', $jumbotron) }}" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-eye me-2"></i>View Details
                    </a>
                    <form action="{{ route('admin.jumbotrons.toggle-status', $jumbotron) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-{{ $jumbotron->is_active ? 'warning' : 'success' }} btn-sm w-100">
                            @if($jumbotron->is_active)
                                <i class="fas fa-pause me-2"></i>Deactivate
                            @else
                                <i class="fas fa-play me-2"></i>Activate
                            @endif
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Live preview updates
    $('#title').on('input', function() {
        $('#preview-title').text($(this).val() || 'Your Title Here');
    });

    $('#subtitle').on('input', function() {
        const text = $(this).val() || 'Your subtitle will appear here...';
        $('#preview-subtitle').text(text.length > 80 ? text.substring(0, 80) + '...' : text);
    });

    // Image preview
    $('#background_image').on('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#jumbotron-preview').css({
                    'background-image': `url(${e.target.result})`,
                    'background-size': 'cover',
                    'background-position': 'center'
                });
            };
            reader.readAsDataURL(file);
        }
    });

    // Form validation enhancement
    $('form').on('submit', function(e) {
        const requiredFields = ['page_slug', 'title', 'subtitle'];
        let hasErrors = false;

        requiredFields.forEach(function(field) {
            const input = $(`[name="${field}"]`);
            if (!input.val().trim()) {
                input.addClass('is-invalid');
                hasErrors = true;
            } else {
                input.removeClass('is-invalid');
            }
        });

        if (hasErrors) {
            e.preventDefault();
            alert('Please fill in all required fields.');
        }
    });
});
</script>
@endpush
