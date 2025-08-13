@extends('admin.layouts.app')

@section('title', $isMultiSlide ? 'Create Slide' : 'Create Jumbotron')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    @if($isMultiSlide)
                        Create New Slide for {{ $availablePages[$pageSlug] ?? ucfirst($pageSlug) }} Page
                    @else
                        Create New Jumbotron
                    @endif
                </h5>
                @if($isMultiSlide)
                    <small class="text-muted">This will be slide #{{ $nextSlideOrder }} in the carousel</small>
                @endif
            </div>
            <div class="card-body">
                <form action="{{ route('admin.jumbotrons.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @if($isMultiSlide)
                        <!-- Hidden fields for multi-slide -->
                        <input type="hidden" name="page_slug" value="{{ $pageSlug }}">
                        <input type="hidden" name="is_multi_slide" value="1">
                        <input type="hidden" name="slide_order" value="{{ $nextSlideOrder }}">

                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i>
                            You are creating a slide for the <strong>{{ $availablePages[$pageSlug] ?? ucfirst($pageSlug) }}</strong> page carousel.
                        </div>
                    @else
                        <input type="hidden" name="is_multi_slide" value="0">
                        <input type="hidden" name="slide_order" value="1">

                        <div class="mb-3">
                            <label for="page_slug" class="form-label">Page <span class="text-danger">*</span></label>
                            <select class="form-select @error('page_slug') is-invalid @enderror"
                                    id="page_slug"
                                    name="page_slug"
                                    required>
                                <option value="">Select a page...</option>
                                @foreach($availablePages as $slug => $name)
                                    <option value="{{ $slug }}" {{ old('page_slug', $pageSlug) == $slug ? 'selected' : '' }}>
                                        {{ $name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('page_slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Select the page where this jumbotron will be displayed.</div>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text"
                               class="form-control @error('title') is-invalid @enderror"
                               id="title"
                               name="title"
                               value="{{ old('title') }}"
                               required
                               maxlength="255"
                               placeholder="Enter the main title">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">This will be the main heading displayed on the {{ $isMultiSlide ? 'slide' : 'jumbotron' }}.</div>
                    </div>

                    <div class="mb-3">
                        <label for="subtitle" class="form-label">Subtitle <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('subtitle') is-invalid @enderror"
                                  id="subtitle"
                                  name="subtitle"
                                  rows="3"
                                  required
                                  placeholder="Enter the subtitle or description">{{ old('subtitle') }}</textarea>
                        @error('subtitle')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">This text will appear below the main title.</div>
                    </div>

                    <!-- Button Fields (for call-to-action) -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="button_text" class="form-label">Button Text</label>
                                <input type="text"
                                       class="form-control @error('button_text') is-invalid @enderror"
                                       id="button_text"
                                       name="button_text"
                                       value="{{ old('button_text') }}"
                                       maxlength="255"
                                       placeholder="e.g., Learn More, Get Started">
                                @error('button_text')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Optional call-to-action button text.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="button_link" class="form-label">Button Link</label>
                                <input type="url"
                                       class="form-control @error('button_link') is-invalid @enderror"
                                       id="button_link"
                                       name="button_link"
                                       value="{{ old('button_link') }}"
                                       placeholder="https://example.com/page">
                                @error('button_link')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">URL where the button should link to.</div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="background_image" class="form-label">Background Image</label>
                        <input type="file"
                               class="form-control @error('background_image') is-invalid @enderror"
                               id="background_image"
                               name="background_image"
                               accept="image/jpeg,image/png,image/jpg,image/webp">
                        @error('background_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Upload a high-quality image (JPEG, PNG, WebP). Recommended size: 1920x1080px or larger.</div>
                    </div>

                    <div class="row">
                        @if(!$isMultiSlide)
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="sort_order" class="form-label">Sort Order</label>
                                <input type="number"
                                       class="form-control @error('sort_order') is-invalid @enderror"
                                       id="sort_order"
                                       name="sort_order"
                                       value="{{ old('sort_order', 0) }}"
                                       min="0">
                                @error('sort_order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Lower numbers appear first.</div>
                            </div>
                        </div>
                        @endif
                        <div class="col-md-{{ $isMultiSlide ? '12' : '6' }}">
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input"
                                           type="checkbox"
                                           id="is_active"
                                           name="is_active"
                                           value="1"
                                           {{ old('is_active', true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">
                                        Active
                                    </label>
                                </div>
                                <div class="form-text">Only active {{ $isMultiSlide ? 'slides' : 'jumbotrons' }} will be displayed on the frontend.</div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.jumbotrons.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Back to List
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Create {{ $isMultiSlide ? 'Slide' : 'Jumbotron' }}
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
                <div id="jumbotron-preview" class="position-relative rounded overflow-hidden" style="height: 200px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <div class="position-absolute inset-0 bg-dark bg-opacity-40"></div>
                    <div class="position-absolute top-50 start-50 translate-middle text-center text-white w-100 px-3">
                        <h5 id="preview-title" class="mb-2">Your Title Here</h5>
                        <p id="preview-subtitle" class="mb-2 small">Your subtitle will appear here...</p>
                        <div id="preview-button" class="d-none">
                            <button class="btn btn-primary btn-sm">Button Text</button>
                        </div>
                    </div>
                </div>
                <small class="text-muted mt-2 d-block">This is how your {{ $isMultiSlide ? 'slide' : 'jumbotron' }} will look. Upload an image to see the actual background.</small>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h6 class="card-title mb-0">Tips</h6>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mb-0">
                    <li class="mb-2">
                        <i class="fas fa-lightbulb text-warning me-2"></i>
                        Use high-resolution images for best quality
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-mobile-alt text-info me-2"></i>
                        Images should work well on mobile devices
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-palette text-success me-2"></i>
                        Dark overlays help text readability
                    </li>
                    @if($isMultiSlide)
                    <li class="mb-2">
                        <i class="fas fa-play text-primary me-2"></i>
                        Slides auto-advance every 5 seconds
                    </li>
                    @endif
                    <li class="mb-0">
                        <i class="fas fa-compress-alt text-primary me-2"></i>
                        Optimal size: 1920x1080px or 16:9 ratio
                    </li>
                </ul>
            </div>
        </div>

        @if($isMultiSlide)
        <div class="card mt-3">
            <div class="card-header">
                <h6 class="card-title mb-0">Slide Information</h6>
            </div>
            <div class="card-body">
                <p class="mb-2"><strong>Page:</strong> {{ $availablePages[$pageSlug] ?? ucfirst($pageSlug) }}</p>
                <p class="mb-2"><strong>Slide Order:</strong> #{{ $nextSlideOrder }}</p>
                <p class="mb-0"><strong>Type:</strong> Multi-Slide Carousel</p>
            </div>
        </div>
        @endif
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
        $('#preview-subtitle').text($(this).val() || 'Your subtitle will appear here...');
    });

    // Button preview
    function updateButtonPreview() {
        const buttonText = $('#button_text').val();
        const buttonLink = $('#button_link').val();

        if (buttonText) {
            $('#preview-button').removeClass('d-none').find('button').text(buttonText);
        } else {
            $('#preview-button').addClass('d-none');
        }
    }

    $('#button_text, #button_link').on('input', updateButtonPreview);

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

    // Button validation
    $('#button_text').on('input', function() {
        const buttonText = $(this).val();
        const buttonLink = $('#button_link');

        if (buttonText && !buttonLink.val()) {
            buttonLink.attr('required', true);
            buttonLink.closest('.mb-3').find('.form-text').html('<span class="text-warning">Button link is required when button text is provided.</span>');
        } else {
            buttonLink.removeAttr('required');
            buttonLink.closest('.mb-3').find('.form-text').text('URL where the button should link to.');
        }
    });

    // Form validation enhancement
    $('form').on('submit', function(e) {
        const requiredFields = @if($isMultiSlide) ['title', 'subtitle'] @else ['page_slug', 'title', 'subtitle'] @endif;
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

        // Check button validation
        const buttonText = $('#button_text').val();
        const buttonLink = $('#button_link').val();

        if (buttonText && !buttonLink) {
            $('#button_link').addClass('is-invalid');
            hasErrors = true;
        }

        if (hasErrors) {
            e.preventDefault();
            alert('Please fill in all required fields.');
        }
    });
});
</script>
@endpush
