@extends('admin.layouts.app')

@section('title', 'View Industry Expertise')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 text-gray-800">Industry Expertise Details</h1>
                <div>
                    <a href="{{ route('admin.industry-expertise.edit', $industryExpertise) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="{{ route('admin.industry-expertise.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back to List
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">{{ $industryExpertise->title }}</h6>
                            <div>
                                <span class="badge bg-{{ $industryExpertise->status === 'active' ? 'success' : 'secondary' }}">
                                    {{ ucfirst($industryExpertise->status) }}
                                </span>
                                @if($industryExpertise->is_featured)
                                    <span class="badge bg-primary ms-1">Featured</span>
                                @endif
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <h6 class="text-primary">Description</h6>
                                    <p class="text-muted">{{ $industryExpertise->description }}</p>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="text-primary">Configuration</h6>
                                    <ul class="list-unstyled">
                                        <li><strong>Sort Order:</strong> {{ $industryExpertise->sort_order }}</li>
                                        <li><strong>Status:</strong> {{ ucfirst($industryExpertise->status) }}</li>
                                        <li><strong>Featured:</strong> {{ $industryExpertise->is_featured ? 'Yes' : 'No' }}</li>
                                        @if($industryExpertise->color_theme)
                                            <li><strong>Color Theme:</strong>
                                                <span class="d-inline-block ms-1" style="width: 16px; height: 16px; background-color: {{ $industryExpertise->color_theme }}; border-radius: 2px; vertical-align: middle;"></span>
                                                {{ $industryExpertise->color_theme }}
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>

                            <div class="row">
                                @if($industryExpertise->svg_icon)
                                <div class="col-md-6">
                                    <h6 class="text-primary">SVG Icon</h6>
                                    <div class="border rounded p-3 mb-3" style="background-color: #f8f9fa;">
                                        <div class="d-flex align-items-center mb-2">
                                            <div style="width: 32px; height: 32px; color: {{ $industryExpertise->color_theme ?? '#007bff' }};">
                                                {!! $industryExpertise->svg_icon !!}
                                            </div>
                                            <span class="ms-2 text-muted">Preview</span>
                                        </div>
                                        <details>
                                            <summary class="btn btn-outline-secondary btn-sm">View SVG Code</summary>
                                            <pre class="mt-2 p-2 bg-light border rounded small"><code>{{ $industryExpertise->svg_icon }}</code></pre>
                                        </details>
                                    </div>
                                </div>
                                @endif

                                @if($industryExpertise->icon_class)
                                <div class="col-md-6">
                                    <h6 class="text-primary">Icon Class</h6>
                                    <div class="border rounded p-3 mb-3" style="background-color: #f8f9fa;">
                                        <div class="d-flex align-items-center">
                                            <i class="{{ $industryExpertise->icon_class }} fa-2x" style="color: {{ $industryExpertise->color_theme ?? '#007bff' }};"></i>
                                            <span class="ms-2">
                                                <code>{{ $industryExpertise->icon_class }}</code>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>

                            <div class="row mt-4">
                                <div class="col-12">
                                    <h6 class="text-primary">Metadata</h6>
                                    <div class="table-responsive">
                                        <table class="table table-sm">
                                            <tr>
                                                <td width="120"><strong>ID:</strong></td>
                                                <td>{{ $industryExpertise->id }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Created:</strong></td>
                                                <td>{{ $industryExpertise->created_at->format('F j, Y \\a\\t g:i A') }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Updated:</strong></td>
                                                <td>{{ $industryExpertise->updated_at->format('F j, Y \\a\\t g:i A') }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Last Modified:</strong></td>
                                                <td>{{ $industryExpertise->updated_at->diffForHumans() }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Frontend Preview</h6>
                        </div>
                        <div class="card-body">
                            <div class="text-center p-4 border rounded" style="border-color: {{ $industryExpertise->color_theme ?? '#007bff' }}; background: linear-gradient(135deg, {{ $industryExpertise->color_theme ?? '#007bff' }}10, transparent);">
                                <div class="mb-3" style="color: {{ $industryExpertise->color_theme ?? '#007bff' }};">
                                    @if($industryExpertise->svg_icon)
                                        <div style="width: 48px; height: 48px; margin: 0 auto;">
                                            {!! $industryExpertise->svg_icon !!}
                                        </div>
                                    @elseif($industryExpertise->icon_class)
                                        <i class="{{ $industryExpertise->icon_class }} fa-3x"></i>
                                    @else
                                        <i class="fas fa-lightbulb fa-3x"></i>
                                    @endif
                                </div>
                                <h5 class="fw-bold mb-2">{{ $industryExpertise->title }}</h5>
                                <p class="text-muted mb-0">{{ $industryExpertise->description }}</p>
                            </div>
                            <small class="text-muted mt-2 d-block">This is how it will appear on the website</small>
                        </div>
                    </div>

                    <div class="card shadow mt-3">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-danger">Actions</h6>
                        </div>
                        <div class="card-body">
                            <div class="d-grid gap-2">
                                <a href="{{ route('admin.industry-expertise.edit', $industryExpertise->id) }}" class="btn btn-warning">
                                    <i class="fas fa-edit"></i> Edit Expertise
                                </a>

                                @if($industryExpertise->status === 'active')
                                    <form action="{{ route('admin.industry-expertise.update', $industryExpertise->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="inactive">
                                        <input type="hidden" name="title" value="{{ $industryExpertise->title }}">
                                        <input type="hidden" name="description" value="{{ $industryExpertise->description }}">
                                        <input type="hidden" name="svg_icon" value="{{ $industryExpertise->svg_icon }}">
                                        <button type="submit" class="btn btn-outline-secondary w-100">
                                            <i class="fas fa-eye-slash"></i> Deactivate
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('admin.industry-expertise.update', $industryExpertise) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="active">
                                        <input type="hidden" name="title" value="{{ $industryExpertise->title }}">
                                        <input type="hidden" name="description" value="{{ $industryExpertise->description }}">
                                        <input type="hidden" name="svg_icon" value="{{ $industryExpertise->svg_icon }}">
                                        <button type="submit" class="btn btn-outline-success w-100">
                                            <i class="fas fa-eye"></i> Activate
                                        </button>
                                    </form>
                                @endif

                                <form action="{{ route('admin.industry-expertise.destroy', $industryExpertise) }}" method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete this expertise? This action cannot be undone.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger w-100">
                                        <i class="fas fa-trash"></i> Delete Expertise
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
