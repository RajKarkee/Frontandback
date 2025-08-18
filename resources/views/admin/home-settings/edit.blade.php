@extends('admin.layouts.app')

@section('title', 'Edit Home Settings')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mb-2">
                <div class="page-title-box" style="display: flex; justify-content: space-between; align-items: center;">
                    <h4 class="page-title">Edit Home Settings</h4>
                    <div class="page-title-right">
                        <a href="{{ route('admin.home-settings.index') }}" class="btn btn-secondary">
                            <i class="mdi mdi-arrow-left"></i> Back to Home Settings
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <form action="{{ route('admin.home-settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <!-- Hero Section -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Hero Section</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="hero_title" class="form-label">Hero Title</label>
                                        <input type="text"
                                            class="form-control @error('hero_title') is-invalid @enderror"
                                            id="hero_title" name="hero_title"
                                            value="{{ old('hero_title', $homeSetting->hero_title) }}"
                                            placeholder="e.g., Welcome to Our Company">
                                        @error('hero_title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="home_logo" class="form-label">Home Logo</label>
                                        @if($homeSetting->home_logo)
                                            <div class="mb-2">
                                                <img src="{{ asset('storage/' . $homeSetting->home_logo) }}" 
                                                     alt="Current home logo" 
                                                     class="img-thumbnail" style="max-width: 150px;">
                                                <div class="form-text">Current home logo</div>
                                            </div>
                                        @endif
                                        <input type="file"
                                            class="form-control @error('home_logo') is-invalid @enderror"
                                            id="home_logo" name="home_logo" accept="image/*">
                                        @error('home_logo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">Upload company logo (JPEG, PNG, JPG, GIF, WebP, SVG). Max size: 2MB</div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="hero_subtitle" class="form-label">Hero Subtitle</label>
                                <textarea class="form-control @error('hero_subtitle') is-invalid @enderror"
                                    id="hero_subtitle" name="hero_subtitle" rows="3"
                                    placeholder="Enter hero subtitle description...">{{ old('hero_subtitle', $homeSetting->hero_subtitle) }}</textarea>
                                @error('hero_subtitle')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="hero_image" class="form-label">Hero Image</label>
                                @if($homeSetting->hero_image)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $homeSetting->hero_image) }}" 
                                             alt="Current hero image" 
                                             class="img-thumbnail" style="max-width: 200px;">
                                        <div class="form-text">Current hero image</div>
                                    </div>
                                @endif
                                <input type="file" 
                                    class="form-control @error('hero_image') is-invalid @enderror"
                                    id="hero_image" name="hero_image" accept="image/*">
                                @error('hero_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Upload a new image to replace the current one (JPEG, PNG, JPG, GIF, WebP). Max size: 2MB</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Key Statistics Section -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Key Statistics Section</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="key_statistics_title" class="form-label">Section Title</label>
                                <input type="text"
                                    class="form-control @error('key_statistics_title') is-invalid @enderror"
                                    id="key_statistics_title" name="key_statistics_title"
                                    value="{{ old('key_statistics_title', $homeSetting->key_statistics_title) }}"
                                    placeholder="e.g., Our Numbers Speak">
                                @error('key_statistics_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Statistics</label>
                                <div id="statistics-container">
                                    @if (old('statistics'))
                                        @foreach (old('statistics') as $index => $statistic)
                                            <div class="statistic-item border rounded p-3 mb-3"
                                                data-index="{{ $index }}">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="form-label">Number</label>
                                                        <input type="text"
                                                            class="form-control @error('statistics.' . $index . '.number') is-invalid @enderror"
                                                            name="statistics[{{ $index }}][number]"
                                                            value="{{ $statistic['number'] ?? '' }}"
                                                            placeholder="e.g., 500+">
                                                        @error('statistics.' . $index . '.number')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Label</label>
                                                        <input type="text"
                                                            class="form-control @error('statistics.' . $index . '.label') is-invalid @enderror"
                                                            name="statistics[{{ $index }}][label]"
                                                            value="{{ $statistic['label'] ?? '' }}"
                                                            placeholder="e.g., Projects Completed">
                                                        @error('statistics.' . $index . '.label')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="text-end mt-2">
                                                    <button type="button" class="btn btn-sm btn-danger remove-statistic">
                                                        <i class="mdi mdi-delete"></i> Remove
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach
                                    @elseif($homeSetting->statistics && is_array($homeSetting->statistics))
                                        @foreach ($homeSetting->statistics as $index => $statistic)
                                            <div class="statistic-item border rounded p-3 mb-3"
                                                data-index="{{ $index }}">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="form-label">Number</label>
                                                        <input type="text" class="form-control"
                                                            name="statistics[{{ $index }}][number]"
                                                            value="{{ $statistic['number'] ?? '' }}"
                                                            placeholder="e.g., 500+">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Label</label>
                                                        <input type="text" class="form-control"
                                                            name="statistics[{{ $index }}][label]"
                                                            value="{{ $statistic['label'] ?? '' }}"
                                                            placeholder="e.g., Projects Completed">
                                                    </div>
                                                </div>
                                                <div class="text-end mt-2">
                                                    <button type="button" class="btn btn-sm btn-danger remove-statistic">
                                                        <i class="mdi mdi-delete"></i> Remove
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <button type="button" class="btn btn-sm btn-success" id="add-statistic">
                                    <i class="mdi mdi-plus"></i> Add Statistic
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Why Choose Us Section -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Why Choose Us Section</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="why_choose_us_title" class="form-label">Section Title</label>
                                <input type="text"
                                    class="form-control @error('why_choose_us_title') is-invalid @enderror"
                                    id="why_choose_us_title" name="why_choose_us_title"
                                    value="{{ old('why_choose_us_title', $homeSetting->why_choose_us_title) }}"
                                    placeholder="e.g., Why Choose Us">
                                @error('why_choose_us_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="why_choose_us_image" class="form-label">Section Image</label>

                                @if($homeSetting->why_choose_us_image)
                                    <div class="current-image mb-3">
                                        <p class="text-muted mb-2">Current Image:</p>
                                        <img src="{{ asset('storage/' . $homeSetting->why_choose_us_image) }}"
                                             alt="{{ $homeSetting->why_choose_us_image_alt }}"
                                             class="img-thumbnail"
                                             style="max-width: 200px; max-height: 150px; object-fit: cover;">
                                        <p class="text-muted mt-1 small">{{ $homeSetting->why_choose_us_image }}</p>
                                    </div>
                                @endif

                                <input type="file"
                                    class="form-control @error('why_choose_us_image') is-invalid @enderror"
                                    id="why_choose_us_image" name="why_choose_us_image"
                                    accept="image/*"
                                    onchange="previewImage(this)">
                                @error('why_choose_us_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Upload a new image for the Why Choose Us section (JPG, PNG, WebP, max 2MB)</div>

                                <!-- Image Preview -->
                                <div id="image-preview" class="mt-3" style="display: none;">
                                    <p class="text-muted mb-2">New Image Preview:</p>
                                    <img id="preview-img" src="" alt="Preview" class="img-thumbnail" style="max-width: 200px; max-height: 150px; object-fit: cover;">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="why_choose_us_image_alt" class="form-label">Image Alt Text</label>
                                <input type="text"
                                    class="form-control @error('why_choose_us_image_alt') is-invalid @enderror"
                                    id="why_choose_us_image_alt" name="why_choose_us_image_alt"
                                    value="{{ old('why_choose_us_image_alt', $homeSetting->why_choose_us_image_alt) }}"
                                    placeholder="e.g., Professional team collaboration">
                                @error('why_choose_us_image_alt')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Alt text for accessibility and SEO</div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Features</label>
                                <div id="features-container">
                                    @if (old('features'))
                                        @foreach (old('features') as $index => $feature)
                                            <div class="feature-item border rounded p-3 mb-3"
                                                data-index="{{ $index }}">
                                                <div class="mb-2">
                                                    <label class="form-label">Title</label>
                                                    <input type="text"
                                                        class="form-control @error('features.' . $index . '.title') is-invalid @enderror"
                                                        name="features[{{ $index }}][title]"
                                                        value="{{ $feature['title'] ?? '' }}"
                                                        placeholder="e.g., Expert Team">
                                                    @error('features.' . $index . '.title')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label">Description</label>
                                                    <textarea class="form-control @error('features.' . $index . '.description') is-invalid @enderror"
                                                        name="features[{{ $index }}][description]" rows="3" placeholder="Feature description">{{ $feature['description'] ?? '' }}</textarea>
                                                    @error('features.' . $index . '.description')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label">Icon (Optional)</label>
                                                    <input type="text" class="form-control"
                                                        name="features[{{ $index }}][icon]"
                                                        value="{{ $feature['icon'] ?? '' }}"
                                                        placeholder="e.g., fas fa-users">
                                                </div>
                                                <div class="text-end">
                                                    <button type="button" class="btn btn-sm btn-danger remove-feature">
                                                        <i class="mdi mdi-delete"></i> Remove
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach
                                    @elseif($homeSetting->features && is_array($homeSetting->features))
                                        @foreach ($homeSetting->features as $index => $feature)
                                            <div class="feature-item border rounded p-3 mb-3"
                                                data-index="{{ $index }}">
                                                <div class="mb-2">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" class="form-control"
                                                        name="features[{{ $index }}][title]"
                                                        value="{{ $feature['title'] ?? '' }}"
                                                        placeholder="e.g., Expert Team">
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label">Description</label>
                                                    <textarea class="form-control" name="features[{{ $index }}][description]" rows="3"
                                                        placeholder="Feature description">{{ $feature['description'] ?? '' }}</textarea>
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label">Icon (Optional)</label>
                                                    <input type="text" class="form-control"
                                                        name="features[{{ $index }}][icon]"
                                                        value="{{ $feature['icon'] ?? '' }}"
                                                        placeholder="e.g., fas fa-users">
                                                </div>
                                                <div class="text-end">
                                                    <button type="button" class="btn btn-sm btn-danger remove-feature">
                                                        <i class="mdi mdi-delete"></i> Remove
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <button type="button" class="btn btn-sm btn-success" id="add-feature">
                                    <i class="mdi mdi-plus"></i> Add Feature
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">
                            <i class="mdi mdi-content-save"></i> Save Changes
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let statisticIndex = {{ $homeSetting->statistics ? count($homeSetting->statistics) : 0 }};
            let featureIndex = {{ $homeSetting->features ? count($homeSetting->features) : 0 }};

            // Add Statistic
            document.getElementById('add-statistic').addEventListener('click', function() {
                const statisticsContainer = document.getElementById('statistics-container');

                const statisticHtml = `
            <div class="statistic-item border rounded p-3 mb-3" data-index="${statisticIndex}">
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Number</label>
                        <input type="text" class="form-control"
                               name="statistics[${statisticIndex}][number]"
                               placeholder="e.g., 500+">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Label</label>
                        <input type="text" class="form-control"
                               name="statistics[${statisticIndex}][label]"
                               placeholder="e.g., Projects Completed">
                    </div>
                </div>
                <div class="text-end mt-2">
                    <button type="button" class="btn btn-sm btn-danger remove-statistic">
                        <i class="mdi mdi-delete"></i> Remove
                    </button>
                </div>
            </div>
        `;

                statisticsContainer.insertAdjacentHTML('beforeend', statisticHtml);
                statisticIndex++;
            });

            // Remove Statistic
            document.addEventListener('click', function(e) {
                if (e.target.closest('.remove-statistic')) {
                    e.target.closest('.statistic-item').remove();
                }
            });

            // Add Feature
            document.getElementById('add-feature').addEventListener('click', function() {
                const featuresContainer = document.getElementById('features-container');

                const featureHtml = `
            <div class="feature-item border rounded p-3 mb-3" data-index="${featureIndex}">
                <div class="mb-2">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control"
                           name="features[${featureIndex}][title]"
                           placeholder="e.g., Expert Team">
                </div>
                <div class="mb-2">
                    <label class="form-label">Description</label>
                    <textarea class="form-control"
                              name="features[${featureIndex}][description]"
                              rows="3"
                              placeholder="Feature description"></textarea>
                </div>
                <div class="mb-2">
                    <label class="form-label">Icon (Optional)</label>
                    <input type="text" class="form-control"
                           name="features[${featureIndex}][icon]"
                           placeholder="e.g., fas fa-users">
                </div>
                <div class="text-end">
                    <button type="button" class="btn btn-sm btn-danger remove-feature">
                        <i class="mdi mdi-delete"></i> Remove
                    </button>
                </div>
            </div>
        `;

                featuresContainer.insertAdjacentHTML('beforeend', featureHtml);
                featureIndex++;
            });

            // Remove Feature
            document.addEventListener('click', function(e) {
                if (e.target.closest('.remove-feature')) {
                    e.target.closest('.feature-item').remove();
                }
            });
        });
            });

        // Image preview function
        function previewImage(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview-img').src = e.target.result;
                    document.getElementById('image-preview').style.display = 'block';
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                document.getElementById('image-preview').style.display = 'none';
            }
        }
    });
</script>
@endpush
