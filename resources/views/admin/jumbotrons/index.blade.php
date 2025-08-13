@extends('admin.layouts.app')

@section('title', 'Jumbotron Management')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Jumbotron Management</h1>
    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
            <i class="fas fa-plus me-2"></i>Add New
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('admin.jumbotrons.create') }}">
                <i class="fas fa-image me-2"></i>Single Jumbotron
            </a></li>
            <li><a class="dropdown-item" href="{{ route('admin.jumbotrons.create', ['page_slug' => 'home']) }}">
                <i class="fas fa-images me-2"></i>Home Page Slide
            </a></li>
        </ul>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if($jumbotrons->count() > 0)
    @foreach($jumbotrons as $pageSlug => $pageJumbotrons)
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="card-title mb-0">
                        {{ $availablePages[$pageSlug] ?? ucfirst($pageSlug) }} Page
                        @if($pageJumbotrons->first()->is_multi_slide)
                            <span class="badge bg-info ms-2">Multi-Slide</span>
                        @else
                            <span class="badge bg-secondary ms-2">Single</span>
                        @endif
                    </h5>
                    <small class="text-muted">{{ $pageSlug }}</small>
                </div>
                <div>
                    @if($pageJumbotrons->first()->is_multi_slide)
                        <a href="{{ route('admin.jumbotrons.create', ['page_slug' => $pageSlug]) }}"
                           class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-plus me-1"></i>Add Slide
                        </a>
                    @endif
                </div>
            </div>
            <div class="card-body">
                @if($pageJumbotrons->first()->is_multi_slide)
                    <!-- Multi-slide layout -->
                    <div class="row" id="slides-container-{{ $pageSlug }}" data-page-slug="{{ $pageSlug }}">
                        @foreach($pageJumbotrons->sortBy('slide_order') as $slide)
                            <div class="col-md-6 col-lg-4 mb-3" data-slide-id="{{ $slide->id }}">
                                <div class="card slide-card h-100">
                                    <div class="position-relative">
                                        @if($slide->background_image_url)
                                            <img src="{{ $slide->background_image_url }}"
                                                 class="card-img-top"
                                                 style="height: 150px; object-fit: cover;">
                                        @else
                                            <div class="bg-light d-flex align-items-center justify-content-center"
                                                 style="height: 150px;">
                                                <i class="fas fa-image text-muted fa-2x"></i>
                                            </div>
                                        @endif
                                        <div class="position-absolute top-0 end-0 p-2">
                                            <span class="badge bg-primary">Slide {{ $slide->slide_order }}</span>
                                        </div>
                                        <div class="position-absolute top-0 start-0 p-2">
                                            <form action="{{ route('admin.jumbotrons.toggle-status', $slide) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm {{ $slide->is_active ? 'btn-success' : 'btn-secondary' }}">
                                                    @if($slide->is_active)
                                                        <i class="fas fa-check"></i>
                                                    @else
                                                        <i class="fas fa-times"></i>
                                                    @endif
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card-body p-3">
                                        <h6 class="card-title">{{ Str::limit($slide->title, 30) }}</h6>
                                        <p class="card-text small text-muted">{{ Str::limit($slide->subtitle, 50) }}</p>
                                        @if($slide->button_text)
                                            <p class="small"><strong>Button:</strong> {{ $slide->button_text }}</p>
                                        @endif
                                    </div>
                                    <div class="card-footer p-2">
                                        <div class="btn-group w-100" role="group">
                                            <a href="{{ route('admin.jumbotrons.edit', $slide) }}"
                                               class="btn btn-sm btn-outline-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.jumbotrons.destroy', $slide) }}"
                                                  method="POST" class="d-inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this slide?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                            <button class="btn btn-sm btn-outline-secondary drag-handle" title="Drag to reorder">
                                                <i class="fas fa-grip-vertical"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <!-- Single jumbotron layout -->
                    @php $jumbotron = $pageJumbotrons->first() @endphp
                    <div class="row">
                        <div class="col-md-4">
                            @if($jumbotron->background_image_url)
                                <img src="{{ $jumbotron->background_image_url }}"
                                     class="img-fluid rounded"
                                     style="height: 200px; width: 100%; object-fit: cover;">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center rounded"
                                     style="height: 200px;">
                                    <i class="fas fa-image text-muted fa-3x"></i>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-8">
                            <h5>{{ $jumbotron->title }}</h5>
                            <p class="text-muted">{{ $jumbotron->subtitle }}</p>
                            @if($jumbotron->button_text)
                                <p><strong>Button:</strong> {{ $jumbotron->button_text }}</p>
                            @endif
                            <div class="mt-3">
                                <form action="{{ route('admin.jumbotrons.toggle-status', $jumbotron) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm {{ $jumbotron->is_active ? 'btn-success' : 'btn-secondary' }}">
                                        @if($jumbotron->is_active)
                                            <i class="fas fa-check"></i> Active
                                        @else
                                            <i class="fas fa-times"></i> Inactive
                                        @endif
                                    </button>
                                </form>
                                <a href="{{ route('admin.jumbotrons.edit', $jumbotron) }}"
                                   class="btn btn-sm btn-outline-warning">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.jumbotrons.destroy', $jumbotron) }}"
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Are you sure you want to delete this jumbotron?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endforeach
@else
    <div class="card">
        <div class="card-body text-center py-5">
            <i class="fas fa-image fa-3x text-muted mb-3"></i>
            <h5>No Jumbotrons Found</h5>
            <p class="text-muted">Start by creating your first jumbotron for any page.</p>
            <a href="{{ route('admin.jumbotrons.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Create Jumbotron
            </a>
        </div>
    </div>
@endif

<!-- Quick Stats Card -->
<div class="row mt-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title mb-0">Pages Without Jumbotrons</h6>
            </div>
            <div class="card-body">
                @php
                    $usedSlugs = $jumbotrons->keys()->toArray();
                    $availableForCreation = array_diff_key($availablePages, array_flip($usedSlugs));
                @endphp

                @if(count($availableForCreation) > 0)
                    <ul class="list-unstyled">
                        @foreach($availableForCreation as $slug => $name)
                            <li class="mb-2">
                                <span class="badge bg-light text-dark me-2">{{ $name }}</span>
                                <a href="{{ route('admin.jumbotrons.create', ['page_slug' => $slug]) }}"
                                   class="btn btn-sm btn-outline-primary">
                                    Add Jumbotron
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted mb-0">All pages have jumbotrons configured.</p>
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title mb-0">Quick Stats</h6>
            </div>
            <div class="card-body">
                @php
                    $totalJumbotrons = $jumbotrons->flatten()->count();
                    $activeJumbotrons = $jumbotrons->flatten()->where('is_active', true)->count();
                    $inactiveJumbotrons = $totalJumbotrons - $activeJumbotrons;
                @endphp
                <div class="row text-center">
                    <div class="col-4">
                        <div class="border-end">
                            <h4 class="mb-1">{{ $totalJumbotrons }}</h4>
                            <small class="text-muted">Total</small>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="border-end">
                            <h4 class="mb-1 text-success">{{ $activeJumbotrons }}</h4>
                            <small class="text-muted">Active</small>
                        </div>
                    </div>
                    <div class="col-4">
                        <h4 class="mb-1 text-secondary">{{ $inactiveJumbotrons }}</h4>
                        <small class="text-muted">Inactive</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.slide-card {
    cursor: move;
    transition: transform 0.2s ease;
}
.slide-card:hover {
    transform: translateY(-2px);
}
.slide-card.ui-sortable-helper {
    transform: rotate(5deg);
    box-shadow: 0 10px 20px rgba(0,0,0,0.2);
}
.drag-handle {
    cursor: grab;
}
.drag-handle:active {
    cursor: grabbing;
}
</style>
@endpush

@push('scripts')
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<script>
$(document).ready(function() {
    // Initialize sortable for multi-slide containers
    $('[id^="slides-container-"]').sortable({
        items: '[data-slide-id]',
        handle: '.drag-handle',
        placeholder: 'col-md-6 col-lg-4 mb-3',
        start: function(event, ui) {
            ui.placeholder.html('<div class="card h-100 border-dashed"><div class="card-body d-flex align-items-center justify-content-center text-muted"><i class="fas fa-arrow-down fa-2x"></i></div></div>');
        },
        update: function(event, ui) {
            var container = $(this);
            var pageSlug = container.data('page-slug');
            var slideIds = [];

            container.find('[data-slide-id]').each(function() {
                slideIds.push($(this).data('slide-id'));
            });

            // Update slide order via AJAX
            $.ajax({
                url: '{{ route("admin.jumbotrons.reorder-slides") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    page_slug: pageSlug,
                    slide_ids: slideIds
                },
                success: function(response) {
                    if (response.success) {
                        // Update slide order badges
                        container.find('[data-slide-id]').each(function(index) {
                            $(this).find('.badge.bg-primary').text('Slide ' + (index + 1));
                        });

                        // Show success toast
                        showToast('success', response.message);
                    }
                },
                error: function() {
                    showToast('error', 'Failed to reorder slides. Please try again.');
                }
            });
        }
    });

    // Toast notification function
    function showToast(type, message) {
        var toastHtml = `
            <div class="toast align-items-center text-white bg-${type === 'success' ? 'success' : 'danger'} border-0" role="alert">
                <div class="d-flex">
                    <div class="toast-body">${message}</div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                </div>
            </div>
        `;

        // Create toast container if it doesn't exist
        if (!$('#toast-container').length) {
            $('body').append('<div id="toast-container" class="position-fixed top-0 end-0 p-3" style="z-index: 1055;"></div>');
        }

        var $toast = $(toastHtml);
        $('#toast-container').append($toast);

        var toast = new bootstrap.Toast($toast[0]);
        toast.show();

        // Remove toast element after it's hidden
        $toast.on('hidden.bs.toast', function() {
            $(this).remove();
        });
    }
});
</script>
@endpush
