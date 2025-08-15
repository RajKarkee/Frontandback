@extends('admin.layouts.app')

@section('title', 'Edit Industry Expertise')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 text-gray-800">Edit Industry Expertise</h1>
                <div>
                    <a href="{{ route('admin.industry-expertise.show', $expertise->id) }}" class="btn btn-info">
                        <i class="fas fa-eye"></i> View
                    </a>
                    <a href="{{ route('admin.industry-expertise.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back to List
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Expertise Details</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.industry-expertise.update', $expertise->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                   id="title" name="title" value="{{ old('title', $expertise->title) }}" required>
                                            @error('title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="sort_order" class="form-label">Sort Order</label>
                                            <input type="number" class="form-control @error('sort_order') is-invalid @enderror"
                                                   id="sort_order" name="sort_order" value="{{ old('sort_order', $expertise->sort_order) }}" min="1">
                                            @error('sort_order')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('description') is-invalid @enderror"
                                              id="description" name="description" rows="4" required>{{ old('description', $expertise->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="svg_icon" class="form-label">SVG Icon <span class="text-danger">*</span></label>
                                            <textarea class="form-control @error('svg_icon') is-invalid @enderror"
                                                      id="svg_icon" name="svg_icon" rows="6" required
                                                      placeholder="<svg>...</svg>">{{ old('svg_icon', $expertise->svg_icon) }}</textarea>
                                            @error('svg_icon')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <small class="form-text text-muted">Paste the complete SVG code here</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="icon_class" class="form-label">Icon Class (Optional)</label>
                                            <input type="text" class="form-control @error('icon_class') is-invalid @enderror"
                                                   id="icon_class" name="icon_class" value="{{ old('icon_class', $expertise->icon_class) }}"
                                                   placeholder="fas fa-icon-name">
                                            @error('icon_class')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <small class="form-text text-muted">FontAwesome or other icon classes</small>
                                        </div>

                                        <div class="mb-3">
                                            <label for="color_theme" class="form-label">Color Theme</label>
                                            <input type="color" class="form-control form-control-color @error('color_theme') is-invalid @enderror"
                                                   id="color_theme" name="color_theme" value="{{ old('color_theme', $expertise->color_theme ?? '#007bff') }}">
                                            @error('color_theme')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="status" class="form-label">Status</label>
                                            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                                                <option value="active" {{ old('status', $expertise->status) === 'active' ? 'selected' : '' }}>Active</option>
                                                <option value="inactive" {{ old('status', $expertise->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                            @error('status')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div class="form-check mt-4">
                                                <input class="form-check-input @error('is_featured') is-invalid @enderror"
                                                       type="checkbox" id="is_featured" name="is_featured" value="1"
                                                       {{ old('is_featured', $expertise->is_featured) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="is_featured">
                                                    Featured Item
                                                </label>
                                                @error('is_featured')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                                <small class="form-text text-muted d-block">Featured items appear prominently on the website</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('admin.industry-expertise.index') }}" class="btn btn-secondary">Cancel</a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Update Expertise
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Current Preview</h6>
                        </div>
                        <div class="card-body">
                            <div id="preview-card" class="text-center p-3 border rounded" style="border-color: {{ $expertise->color_theme ?? '#007bff' }};">
                                <div id="preview-icon" class="mb-3" style="color: {{ $expertise->color_theme ?? '#007bff' }};">
                                    @if($expertise->svg_icon)
                                        {!! $expertise->svg_icon !!}
                                    @elseif($expertise->icon_class)
                                        <i class="{{ $expertise->icon_class }} fa-2x"></i>
                                    @else
                                        <i class="fas fa-eye fa-2x"></i>
                                    @endif
                                </div>
                                <h5 id="preview-title">{{ $expertise->title }}</h5>
                                <p id="preview-description" class="text-muted">{{ $expertise->description }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow mt-3">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-info">Metadata</h6>
                        </div>
                        <div class="card-body">
                            <small class="text-muted">
                                <strong>Created:</strong> {{ $expertise->created_at->format('M d, Y H:i') }}<br>
                                <strong>Updated:</strong> {{ $expertise->updated_at->format('M d, Y H:i') }}<br>
                                <strong>ID:</strong> {{ $expertise->id }}
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Live preview functionality
    function updatePreview() {
        const title = $('#title').val() || 'Expertise Title';
        const description = $('#description').val() || 'Expertise description will appear here...';
        const colorTheme = $('#color_theme').val() || '#007bff';
        const svgIcon = $('#svg_icon').val();
        const iconClass = $('#icon_class').val();

        $('#preview-title').text(title);
        $('#preview-description').text(description);
        $('#preview-card').css('border-color', colorTheme);

        // Update icon preview
        let iconHtml = '';
        if (svgIcon && svgIcon.includes('<svg')) {
            iconHtml = svgIcon;
        } else if (iconClass) {
            iconHtml = `<i class="${iconClass} fa-2x"></i>`;
        } else {
            iconHtml = '<i class="fas fa-eye fa-2x"></i>';
        }

        $('#preview-icon').html(iconHtml).css('color', colorTheme);
    }

    // Bind events for live preview
    $('#title, #description, #color_theme, #svg_icon, #icon_class').on('input', updatePreview);

    // Initial preview update
    updatePreview();
});
</script>
@endpush
