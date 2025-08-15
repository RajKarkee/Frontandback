@extends('admin.layouts.app')

@section('title', 'Edit Service Process Step')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{ route('admin.service-processes.index') }}">Service Processes</a></li>
<li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Edit Service Process Step</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.service-processes.update', $serviceProcess) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="step_number" class="form-label">Step Number <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('step_number') is-invalid @enderror"
                                       id="step_number" name="step_number" value="{{ old('step_number', $serviceProcess->step_number) }}" min="1" required>
                                @error('step_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="sort_order" class="form-label">Sort Order</label>
                                <input type="number" class="form-control @error('sort_order') is-invalid @enderror"
                                       id="sort_order" name="sort_order" value="{{ old('sort_order', $serviceProcess->sort_order) }}">
                                @error('sort_order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">Leave empty to use step number as sort order</small>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                               id="title" name="title" value="{{ old('title', $serviceProcess->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                                  id="description" name="description" rows="4" required>{{ old('description', $serviceProcess->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="color" class="form-label">Color</label>
                                <input type="color" class="form-control form-control-color @error('color') is-invalid @enderror"
                                       id="color" name="color" value="{{ old('color', $serviceProcess->color ?? '#20B2AA') }}">
                                @error('color')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="icon" class="form-label">Icon (Optional)</label>
                                <input type="text" class="form-control @error('icon') is-invalid @enderror"
                                       id="icon" name="icon" value="{{ old('icon', $serviceProcess->icon) }}"
                                       placeholder="e.g., fas fa-search">
                                @error('icon')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">FontAwesome icon class</small>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="is_active" name="is_active"
                                   {{ old('is_active', $serviceProcess->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">
                                Active
                            </label>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.service-processes.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Back to List
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Update Step
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
            <div class="card-body text-center">
                <div class="preview-step">
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-white mx-auto mb-3"
                         style="width: 60px; height: 60px; background-color: {{ old('color', $serviceProcess->color ?? '#20B2AA') }};" id="preview-circle">
                        <span class="h5 mb-0" id="preview-number">{{ old('step_number', $serviceProcess->step_number) }}</span>
                    </div>
                    <h6 id="preview-title">{{ old('title', $serviceProcess->title) }}</h6>
                    <p class="text-muted small" id="preview-description">{{ old('description', $serviceProcess->description) }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const stepNumberInput = document.getElementById('step_number');
    const titleInput = document.getElementById('title');
    const descriptionInput = document.getElementById('description');
    const colorInput = document.getElementById('color');

    const previewNumber = document.getElementById('preview-number');
    const previewTitle = document.getElementById('preview-title');
    const previewDescription = document.getElementById('preview-description');
    const previewCircle = document.getElementById('preview-circle');

    function updatePreview() {
        previewNumber.textContent = stepNumberInput.value || '{{ $serviceProcess->step_number }}';
        previewTitle.textContent = titleInput.value || '{{ $serviceProcess->title }}';
        previewDescription.textContent = descriptionInput.value || '{{ $serviceProcess->description }}';
        previewCircle.style.backgroundColor = colorInput.value;
    }

    stepNumberInput.addEventListener('input', updatePreview);
    titleInput.addEventListener('input', updatePreview);
    descriptionInput.addEventListener('input', updatePreview);
    colorInput.addEventListener('input', updatePreview);
});
</script>
@endsection
