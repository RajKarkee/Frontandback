@extends('admin.layouts.app')

@section('title', 'View Jumbotron')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Jumbotron Details</h5>
                <div>
                    <a href="{{ route('admin.jumbotrons.edit', $jumbotron) }}" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-edit me-2"></i>Edit
                    </a>
                    <form action="{{ route('admin.jumbotrons.destroy', $jumbotron) }}"
                          method="POST"
                          class="d-inline"
                          onsubmit="return confirm('Are you sure you want to delete this jumbotron?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm">
                            <i class="fas fa-trash me-2"></i>Delete
                        </button>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="text-muted">Page</h6>
                        <p class="mb-3">
                            @php $availablePages = \App\Models\Jumbotron::getAvailablePageSlugs(); @endphp
                            <strong>{{ $availablePages[$jumbotron->page_slug] ?? $jumbotron->page_slug }}</strong>
                            <br>
                            <small class="text-muted">Slug: {{ $jumbotron->page_slug }}</small>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-muted">Status</h6>
                        <p class="mb-3">
                            <span class="badge {{ $jumbotron->is_active ? 'bg-success' : 'bg-secondary' }} fs-6">
                                {{ $jumbotron->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <h6 class="text-muted">Sort Order</h6>
                        <p class="mb-3">{{ $jumbotron->sort_order }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-muted">Last Updated</h6>
                        <p class="mb-3">{{ $jumbotron->updated_at->format('F j, Y \a\t g:i A') }}</p>
                    </div>
                </div>

                <h6 class="text-muted">Title</h6>
                <p class="mb-3">{{ $jumbotron->title }}</p>

                <h6 class="text-muted">Subtitle</h6>
                <p class="mb-3">{{ $jumbotron->subtitle }}</p>

                @if($jumbotron->background_image_url)
                    <h6 class="text-muted">Background Image</h6>
                    <div class="mb-3">
                        <img src="{{ $jumbotron->background_image_url }}"
                             alt="Background Image"
                             class="img-fluid rounded"
                             style="max-height: 300px; width: 100%; object-fit: cover;">
                        <small class="text-muted d-block mt-1">{{ $jumbotron->background_image_url }}</small>
                    </div>
                @endif
            </div>
        </div>

        <!-- Full Preview -->
        <div class="card mt-4">
            <div class="card-header">
                <h6 class="card-title mb-0">Full Size Preview</h6>
            </div>
            <div class="card-body p-0">
                <div class="position-relative"
                     style="height: 400px;
                            background-image: url('{{ $jumbotron->background_image_url ?: 'https://images.unsplash.com/photo-1464983953574-0892a716854b?q=80&w=1600&auto=format&fit=crop' }}');
                            background-size: cover;
                            background-position: center;">
                    <div class="position-absolute inset-0 bg-dark bg-opacity-40"></div>
                    <div class="position-absolute top-50 start-50 translate-middle text-center text-white w-100 px-4">
                        <h1 class="display-5 fw-bold mb-3">{{ $jumbotron->title }}</h1>
                        <p class="lead">{{ $jumbotron->subtitle }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title mb-0">Quick Actions</h6>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.jumbotrons.edit', $jumbotron) }}" class="btn btn-primary">
                        <i class="fas fa-edit me-2"></i>Edit Jumbotron
                    </a>
                    <form action="{{ route('admin.jumbotrons.toggle-status', $jumbotron) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-{{ $jumbotron->is_active ? 'warning' : 'success' }} w-100">
                            @if($jumbotron->is_active)
                                <i class="fas fa-pause me-2"></i>Deactivate
                            @else
                                <i class="fas fa-play me-2"></i>Activate
                            @endif
                        </button>
                    </form>
                    <a href="{{ route('admin.jumbotrons.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-list me-2"></i>Back to List
                    </a>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h6 class="card-title mb-0">Information</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 mb-3">
                        <small class="text-muted">Created</small>
                        <div>{{ $jumbotron->created_at->format('M d, Y g:i A') }}</div>
                    </div>
                    <div class="col-12 mb-3">
                        <small class="text-muted">Last Modified</small>
                        <div>{{ $jumbotron->updated_at->format('M d, Y g:i A') }}</div>
                    </div>
                    @if($jumbotron->background_image_url)
                        <div class="col-12 mb-3">
                            <small class="text-muted">Image URL</small>
                            <div class="text-break small">
                                <a href="{{ $jumbotron->background_image_url }}" target="_blank">
                                    {{ Str::limit($jumbotron->background_image_url, 30) }}
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        @php
            $pageUrl = '';
            switch($jumbotron->page_slug) {
                case 'home':
                    $pageUrl = route('home');
                    break;
                case 'about':
                    $pageUrl = route('about');
                    break;
                case 'services':
                    $pageUrl = route('services');
                    break;
                case 'industries':
                    $pageUrl = route('industries');
                    break;
                case 'insights':
                    $pageUrl = route('insights');
                    break;
                case 'careers':
                    $pageUrl = route('careers');
                    break;
                case 'contact':
                    $pageUrl = route('contact');
                    break;
                case 'offices':
                    $pageUrl = route('offices');
                    break;
                case 'events':
                    $pageUrl = route('events');
                    break;
                case 'blogs':
                    $pageUrl = route('blogs');
                    break;
                default:
                    $pageUrl = '#';
            }
        @endphp

        @if($pageUrl !== '#')
            <div class="card mt-3">
                <div class="card-header">
                    <h6 class="card-title mb-0">Frontend Preview</h6>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-3">View this jumbotron on the actual page:</p>
                    <a href="{{ $pageUrl }}"
                       target="_blank"
                       class="btn btn-outline-primary w-100">
                        <i class="fas fa-external-link-alt me-2"></i>View Live Page
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
