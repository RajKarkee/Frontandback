@extends('admin.layouts.app')

@section('title', 'View Contact Information')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="fas fa-eye text-primary me-2"></i>
                        Contact Information Details
                        @if($contactInformation->is_active)
                            <span class="badge bg-success ms-2">Active</span>
                        @else
                            <span class="badge bg-secondary ms-2">Inactive</span>
                        @endif
                    </h4>
                    <div class="btn-group">
                        <a href="{{ route('admin.contact-information.edit', $contactInformation) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-1"></i>Edit
                        </a>
                        <a href="{{ route('admin.contact-information.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-1"></i>Back to List
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <!-- Basic Information -->
                        <div class="col-lg-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Basic Information</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td class="fw-bold" style="width: 120px;">Title:</td>
                                            <td>{{ $contactInformation->title }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Address:</td>
                                            <td>{!! nl2br(e($contactInformation->address)) !!}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Phone:</td>
                                            <td>
                                                <a href="tel:{{ $contactInformation->phone }}" class="text-decoration-none">
                                                    <i class="fas fa-phone text-success me-1"></i>
                                                    {{ $contactInformation->phone }}
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Email:</td>
                                            <td>
                                                <a href="mailto:{{ $contactInformation->email }}" class="text-decoration-none">
                                                    <i class="fas fa-envelope text-primary me-1"></i>
                                                    {{ $contactInformation->email }}
                                                </a>
                                            </td>
                                        </tr>
                                        @if($contactInformation->website)
                                            <tr>
                                                <td class="fw-bold">Website:</td>
                                                <td>
                                                    <a href="{{ $contactInformation->website }}" target="_blank" class="text-decoration-none">
                                                        <i class="fas fa-globe text-info me-1"></i>
                                                        {{ $contactInformation->website }}
                                                        <i class="fas fa-external-link-alt ms-1 small"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endif
                                        @if($contactInformation->additional_info)
                                            <tr>
                                                <td class="fw-bold">Additional Info:</td>
                                                <td>{!! nl2br(e($contactInformation->additional_info)) !!}</td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <td class="fw-bold">Status:</td>
                                            <td>
                                                @if($contactInformation->is_active)
                                                    <span class="badge bg-success">
                                                        <i class="fas fa-check me-1"></i>Active
                                                    </span>
                                                @else
                                                    <span class="badge bg-secondary">
                                                        <i class="fas fa-times me-1"></i>Inactive
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Created:</td>
                                            <td>{{ $contactInformation->created_at->format('F d, Y \a\t g:i A') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Updated:</td>
                                            <td>{{ $contactInformation->updated_at->format('F d, Y \a\t g:i A') }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Maps and Preview -->
                        <div class="col-lg-6">
                            <!-- Map Information -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="mb-0"><i class="fas fa-map-marker-alt me-2"></i>Map Information</h5>
                                </div>
                                <div class="card-body">
                                    @if($contactInformation->latitude && $contactInformation->longitude)
                                        <div class="mb-3">
                                            <h6>Location Coordinates:</h6>
                                            <div class="row">
                                                <div class="col-6">
                                                    <small class="text-muted">Latitude:</small>
                                                    <div class="fw-bold">{{ $contactInformation->latitude }}</div>
                                                </div>
                                                <div class="col-6">
                                                    <small class="text-muted">Longitude:</small>
                                                    <div class="fw-bold">{{ $contactInformation->longitude }}</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <h6>Interactive Map:</h6>
                                            <div id="map" style="height: 300px; border: 1px solid #ddd; border-radius: 4px;"></div>
                                        </div>
                                    @endif

                                    @if($contactInformation->map_embed_url)
                                        <div class="mb-3">
                                            <h6>Embedded Map:</h6>
                                            <div class="border rounded" style="height: 200px; overflow: hidden;">
                                                <iframe src="{{ $contactInformation->map_embed_url }}"
                                                        width="100%"
                                                        height="200"
                                                        style="border:0;"
                                                        allowfullscreen=""
                                                        loading="lazy"
                                                        referrerpolicy="no-referrer-when-downgrade">
                                                </iframe>
                                            </div>
                                        </div>
                                    @endif

                                    @if($contactInformation->google_maps_link)
                                        <div class="mb-3">
                                            <h6>Google Maps Link:</h6>
                                            <a href="{{ $contactInformation->google_maps_link }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                                <i class="fas fa-map-marker-alt me-1"></i>
                                                View on Google Maps
                                                <i class="fas fa-external-link-alt ms-1 small"></i>
                                            </a>
                                        </div>
                                    @endif

                                    @if(!$contactInformation->latitude && !$contactInformation->longitude && !$contactInformation->map_embed_url && !$contactInformation->google_maps_link)
                                        <p class="text-muted">No map information available</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media Links -->
                    @if($contactInformation->getSocialMediaLinks()->isNotEmpty())
                        <div class="row">
                            <div class="col-12">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h5 class="mb-0"><i class="fas fa-share-alt me-2"></i>Social Media Links</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            @foreach($contactInformation->getSocialMediaLinks() as $platform => $url)
                                                <div class="col-md-6 col-lg-4 mb-3">
                                                    <div class="d-flex align-items-center">
                                                        @switch($platform)
                                                            @case('facebook')
                                                                <i class="fab fa-facebook fa-2x text-primary me-3"></i>
                                                                @break
                                                            @case('twitter')
                                                                <i class="fab fa-twitter fa-2x text-info me-3"></i>
                                                                @break
                                                            @case('linkedin')
                                                                <i class="fab fa-linkedin fa-2x text-primary me-3"></i>
                                                                @break
                                                            @case('instagram')
                                                                <i class="fab fa-instagram fa-2x text-danger me-3"></i>
                                                                @break
                                                            @case('youtube')
                                                                <i class="fab fa-youtube fa-2x text-danger me-3"></i>
                                                                @break
                                                            @default
                                                                <i class="fas fa-link fa-2x text-secondary me-3"></i>
                                                        @endswitch
                                                        <div>
                                                            <h6 class="mb-0">{{ ucfirst($platform) }}</h6>
                                                            <a href="{{ $url }}" target="_blank" class="text-decoration-none small">
                                                                {{ $url }}
                                                                <i class="fas fa-external-link-alt ms-1"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Business Hours -->
                    @if($contactInformation->getFormattedBusinessHours())
                        <div class="row">
                            <div class="col-12">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h5 class="mb-0"><i class="fas fa-clock me-2"></i>Business Hours</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            @foreach($contactInformation->getFormattedBusinessHours() as $day => $hours)
                                                <div class="col-md-6 col-lg-3 mb-2">
                                                    <div class="d-flex justify-content-between">
                                                        <strong>{{ ucfirst($day) }}:</strong>
                                                        <span class="{{ strtolower($hours) === 'closed' ? 'text-muted' : '' }}">
                                                            {{ $hours }}
                                                        </span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Action Buttons -->
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.contact-information.edit', $contactInformation) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-1"></i>Edit Information
                        </a>
                        <form method="POST"
                              action="{{ route('admin.contact-information.destroy', $contactInformation) }}"
                              style="display: inline-block;"
                              onsubmit="return confirm('Are you sure you want to delete this contact information? This action cannot be undone.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash me-1"></i>Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .coordinates-info {
        background-color: #f8f9fa;
        border-left: 4px solid #007bff;
        padding: 10px 15px;
        border-radius: 4px;
    }

    .coordinates-badge {
        background-color: #e9ecef;
        color: #495057;
        padding: 2px 8px;
        border-radius: 3px;
        font-family: monospace;
        font-size: 0.9em;
    }
</style>
@endpush

@push('scripts')
@if($contactInformation->latitude && $contactInformation->longitude)
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY&libraries=places"></script>
<script>
let map;
let marker;

function initMap() {
    const lat = {{ $contactInformation->latitude }};
    const lng = {{ $contactInformation->longitude }};
    const position = { lat: lat, lng: lng };

    // Initialize map
    map = new google.maps.Map(document.getElementById("map"), {
        zoom: 15,
        center: position,
        disableDefaultUI: false,
        zoomControl: true,
        mapTypeControl: true,
        scaleControl: true,
        streetViewControl: true,
        rotateControl: false,
        fullscreenControl: true
    });

    // Add marker at the saved location
    marker = new google.maps.Marker({
        position: position,
        map: map,
        title: "{{ addslashes($contactInformation->title) }}",
        icon: {
            url: 'https://maps.google.com/mapfiles/ms/icons/red-dot.png'
        }
    });

    // Add info window
    const infoWindow = new google.maps.InfoWindow({
        content: `
            <div style="max-width: 250px;">
                <h6 class="mb-1">{{ addslashes($contactInformation->title) }}</h6>
                <p class="mb-1 small">{{ addslashes($contactInformation->address) }}</p>
                @if($contactInformation->phone)
                    <p class="mb-1 small"><i class="fas fa-phone"></i> {{ $contactInformation->phone }}</p>
                @endif
                @if($contactInformation->email)
                    <p class="mb-0 small"><i class="fas fa-envelope"></i> {{ $contactInformation->email }}</p>
                @endif
            </div>
        `
    });

    // Show info window on marker click
    marker.addListener("click", () => {
        infoWindow.open(map, marker);
    });

    // Auto-open info window
    infoWindow.open(map, marker);
}

// Initialize map when page loads
document.addEventListener('DOMContentLoaded', function() {
    if (typeof google !== 'undefined') {
        initMap();
    } else {
        console.error('Google Maps API not loaded');
    }
});
</script>
@endif
@endpush
