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

    <form action="{{ route('admin.home-settings.update') }}" method="POST">
        @csrf
        @method('PUT')

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
                            <input type="text" class="form-control @error('key_statistics_title') is-invalid @enderror"
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
                                @if(old('statistics'))
                                    @foreach(old('statistics') as $index => $statistic)
                                        <div class="statistic-item border rounded p-3 mb-3" data-index="{{ $index }}">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="form-label">Number</label>
                                                    <input type="text" class="form-control @error('statistics.'.$index.'.number') is-invalid @enderror"
                                                           name="statistics[{{ $index }}][number]"
                                                           value="{{ $statistic['number'] ?? '' }}"
                                                           placeholder="e.g., 500+">
                                                    @error('statistics.'.$index.'.number')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Label</label>
                                                    <input type="text" class="form-control @error('statistics.'.$index.'.label') is-invalid @enderror"
                                                           name="statistics[{{ $index }}][label]"
                                                           value="{{ $statistic['label'] ?? '' }}"
                                                           placeholder="e.g., Projects Completed">
                                                    @error('statistics.'.$index.'.label')
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
                                    @foreach($homeSetting->statistics as $index => $statistic)
                                        <div class="statistic-item border rounded p-3 mb-3" data-index="{{ $index }}">
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
                            <input type="text" class="form-control @error('why_choose_us_title') is-invalid @enderror"
                                   id="why_choose_us_title" name="why_choose_us_title"
                                   value="{{ old('why_choose_us_title', $homeSetting->why_choose_us_title) }}"
                                   placeholder="e.g., Why Choose Us">
                            @error('why_choose_us_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Features</label>
                            <div id="features-container">
                                @if(old('features'))
                                    @foreach(old('features') as $index => $feature)
                                        <div class="feature-item border rounded p-3 mb-3" data-index="{{ $index }}">
                                            <div class="mb-2">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control @error('features.'.$index.'.title') is-invalid @enderror"
                                                       name="features[{{ $index }}][title]"
                                                       value="{{ $feature['title'] ?? '' }}"
                                                       placeholder="e.g., Expert Team">
                                                @error('features.'.$index.'.title')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control @error('features.'.$index.'.description') is-invalid @enderror"
                                                          name="features[{{ $index }}][description]"
                                                          rows="3"
                                                          placeholder="Feature description">{{ $feature['description'] ?? '' }}</textarea>
                                                @error('features.'.$index.'.description')
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
                                    @foreach($homeSetting->features as $index => $feature)
                                        <div class="feature-item border rounded p-3 mb-3" data-index="{{ $index }}">
                                            <div class="mb-2">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control"
                                                       name="features[{{ $index }}][title]"
                                                       value="{{ $feature['title'] ?? '' }}"
                                                       placeholder="e.g., Expert Team">
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control"
                                                          name="features[{{ $index }}][description]"
                                                          rows="3"
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

<!-- Templates for dynamic fields -->
<template id="statistic-template">
    <div class="statistic-item border rounded p-3 mb-3" data-index="">
        <div class="row">
            <div class="col-md-6">
                <label class="form-label">Number</label>
                <input type="text" class="form-control" name="statistics[][number]" placeholder="e.g., 500+">
            </div>
            <div class="col-md-6">
                <label class="form-label">Label</label>
                <input type="text" class="form-control" name="statistics[][label]" placeholder="e.g., Projects Completed">
            </div>
        </div>
        <div class="text-end mt-2">
            <button type="button" class="btn btn-sm btn-danger remove-statistic">
                <i class="mdi mdi-delete"></i> Remove
            </button>
        </div>
    </div>
</template>

<template id="feature-template">
    <div class="feature-item border rounded p-3 mb-3" data-index="">
        <div class="mb-2">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" name="features[][title]" placeholder="e.g., Expert Team">
        </div>
        <div class="mb-2">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="features[][description]" rows="3" placeholder="Feature description"></textarea>
        </div>
        <div class="mb-2">
            <label class="form-label">Icon (Optional)</label>
            <input type="text" class="form-control" name="features[][icon]" placeholder="e.g., fas fa-users">
        </div>
        <div class="text-end">
            <button type="button" class="btn btn-sm btn-danger remove-feature">
                <i class="mdi mdi-delete"></i> Remove
            </button>
        </div>
    </div>
</template>

@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    let statisticIndex = {{ $homeSetting->statistics ? count($homeSetting->statistics) : 0 }};
    let featureIndex = {{ $homeSetting->features ? count($homeSetting->features) : 0 }};

    // Add Statistic
    document.getElementById('add-statistic').addEventListener('click', function() {
        const template = document.getElementById('statistic-template');
        const clone = template.content.cloneNode(true);

        // Update indices
        clone.querySelector('.statistic-item').setAttribute('data-index', statisticIndex);
        clone.querySelectorAll('input').forEach(input => {
            input.name = input.name.replace('[]', `[${statisticIndex}]`);
        });

        document.getElementById('statistics-container').appendChild(clone);
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
        const template = document.getElementById('feature-template');
        const clone = template.content.cloneNode(true);

        // Update indices
        clone.querySelector('.feature-item').setAttribute('data-index', featureIndex);
        clone.querySelectorAll('input, textarea').forEach(input => {
            input.name = input.name.replace('[]', `[${featureIndex}]`);
        });

        document.getElementById('features-container').appendChild(clone);
        featureIndex++;
    });

    // Remove Feature
    document.addEventListener('click', function(e) {
        if (e.target.closest('.remove-feature')) {
            e.target.closest('.feature-item').remove();
        }
    });
});
</script>
@endsection
