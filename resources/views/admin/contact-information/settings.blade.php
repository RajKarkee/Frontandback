@extends('admin.layouts.app')

@section('title', 'Contact Information Settings')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="fas fa-cog text-primary me-2"></i>
                        Contact Information Settings
                        @if($contactInformation)
                            <span class="badge bg-success ms-2">Configured</span>
                        @else
                            <span class="badge bg-warning ms-2">Not Configured</span>
                        @endif
                    </h4>
                    <div class="text-muted small">
                        {{ $contactInformation ? 'Last updated: ' . $contactInformation->updated_at->diffForHumans() : 'No data configured yet' }}
                    </div>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <h6><i class="fas fa-exclamation-triangle me-2"></i>Please fix the following errors:</h6>
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.contact-information.settings.save') }}" method="POST">
                        @csrf

                        <div class="row">
                            <!-- Basic Information -->
                            <div class="col-lg-8">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Basic Information</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="title" class="form-label">
                                                    Title <span class="text-danger">*</span>
                                                </label>
                                                <input type="text"
                                                       class="form-control @error('title') is-invalid @enderror"
                                                       id="title"
                                                       name="title"
                                                       value="{{ old('title', $contactInformation->title ?? '') }}"
                                                       required>
                                                @error('title')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="phone" class="form-label">
                                                    Phone Number <span class="text-danger">*</span>
                                                </label>
                                                <input type="tel"
                                                       class="form-control @error('phone') is-invalid @enderror"
                                                       id="phone"
                                                       name="phone"
                                                       value="{{ old('phone', $contactInformation->phone ?? '') }}"
                                                       required>
                                                @error('phone')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="email" class="form-label">
                                                    Email Address <span class="text-danger">*</span>
                                                </label>
                                                <input type="email"
                                                       class="form-control @error('email') is-invalid @enderror"
                                                       id="email"
                                                       name="email"
                                                       value="{{ old('email', $contactInformation->email ?? '') }}"
                                                       required>
                                                @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="website" class="form-label">Website URL</label>
                                                <input type="url"
                                                       class="form-control @error('website') is-invalid @enderror"
                                                       id="website"
                                                       name="website"
                                                       value="{{ old('website', $contactInformation->website ?? '') }}"
                                                       placeholder="https://example.com">
                                                @error('website')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="address" class="form-label">
                                                Address <span class="text-danger">*</span>
                                            </label>
                                            <textarea class="form-control @error('address') is-invalid @enderror"
                                                      id="address"
                                                      name="address"
                                                      rows="3"
                                                      required>{{ old('address', $contactInformation->address ?? '') }}</textarea>
                                            @error('address')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="additional_info" class="form-label">Additional Information</label>
                                            <textarea class="form-control @error('additional_info') is-invalid @enderror"
                                                      id="additional_info"
                                                      name="additional_info"
                                                      rows="2"
                                                      placeholder="Any additional contact details...">{{ old('additional_info', $contactInformation->additional_info ?? '') }}</textarea>
                                            @error('additional_info')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input"
                                                   type="checkbox"
                                                   id="is_active"
                                                   name="is_active"
                                                   value="1"
                                                   {{ old('is_active', $contactInformation->is_active ?? true) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_active">
                                                <strong>Active</strong>
                                                <small class="text-muted d-block">Make this contact information visible on the website</small>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Social Media Links -->
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h5 class="mb-0"><i class="fas fa-share-alt me-2"></i>Social Media Links</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="facebook" class="form-label">
                                                    <i class="fab fa-facebook text-primary me-1"></i>Facebook
                                                </label>
                                                <input type="url"
                                                       class="form-control"
                                                       id="facebook"
                                                       name="social_media_links[facebook]"
                                                       value="{{ old('social_media_links.facebook', optional($contactInformation)->getSocialMediaLinks()['facebook'] ?? '') }}"
                                                       placeholder="https://facebook.com/yourpage">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="twitter" class="form-label">
                                                    <i class="fab fa-twitter text-info me-1"></i>Twitter
                                                </label>
                                                <input type="url"
                                                       class="form-control"
                                                       id="twitter"
                                                       name="social_media_links[twitter]"
                                                       value="{{ old('social_media_links.twitter', optional($contactInformation)->getSocialMediaLinks()['twitter'] ?? '') }}"
                                                       placeholder="https://twitter.com/yourhandle">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="linkedin" class="form-label">
                                                    <i class="fab fa-linkedin text-primary me-1"></i>LinkedIn
                                                </label>
                                                <input type="url"
                                                       class="form-control"
                                                       id="linkedin"
                                                       name="social_media_links[linkedin]"
                                                       value="{{ old('social_media_links.linkedin', optional($contactInformation)->getSocialMediaLinks()['linkedin'] ?? '') }}"
                                                       placeholder="https://linkedin.com/in/yourprofile">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="instagram" class="form-label">
                                                    <i class="fab fa-instagram text-danger me-1"></i>Instagram
                                                </label>
                                                <input type="url"
                                                       class="form-control"
                                                       id="instagram"
                                                       name="social_media_links[instagram]"
                                                       value="{{ old('social_media_links.instagram', optional($contactInformation)->getSocialMediaLinks()['instagram'] ?? '') }}"
                                                       placeholder="https://instagram.com/yourhandle">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="youtube" class="form-label">
                                                    <i class="fab fa-youtube text-danger me-1"></i>YouTube
                                                </label>
                                                <input type="url"
                                                       class="form-control"
                                                       id="youtube"
                                                       name="social_media_links[youtube]"
                                                       value="{{ old('social_media_links.youtube', optional($contactInformation)->getSocialMediaLinks()['youtube'] ?? '') }}"
                                                       placeholder="https://youtube.com/yourchannel">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Business Hours -->
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h5 class="mb-0"><i class="fas fa-clock me-2"></i>Business Hours</h5>
                                    </div>
                                    <div class="card-body">
                                        @php
                                            $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
                                            $businessHours = old('business_hours', optional($contactInformation)->business_hours ?? []);
                                        @endphp

                                        <div class="row">
                                            @foreach($days as $day)
                                                <div class="col-md-6 mb-3">
                                                    <label for="{{ $day }}" class="form-label">{{ ucfirst($day) }}</label>
                                                    <input type="text"
                                                           class="form-control"
                                                           id="{{ $day }}"
                                                           name="business_hours[{{ $day }}]"
                                                           value="{{ $businessHours[$day] ?? '' }}"
                                                           placeholder="9:00 AM - 5:00 PM or Closed">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Map Information -->
                            <div class="col-lg-4">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h5 class="mb-0"><i class="fas fa-map-marker-alt me-2"></i>Map Location</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="map_search" class="form-label">Search Location</label>
                                            <input type="text"
                                                   class="form-control"
                                                   id="map_search"
                                                   placeholder="Enter location to search"
                                                   value="{{ old('map_search', $contactInformation->address ?? '') }}">
                                            <small class="text-muted">Press Enter to update map</small>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Interactive Map</label>
                                            <div style="height: 300px; border: 1px solid #ddd; border-radius: 4px; overflow: hidden;">
                                                <iframe id="gmap_canvas"
                                                        src=""
                                                        width="100%"
                                                        height="300"
                                                        style="border:0;"
                                                        allowfullscreen=""
                                                        loading="lazy"
                                                        referrerpolicy="no-referrer-when-downgrade">
                                                </iframe>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6 mb-3">
                                                <label for="latitude" class="form-label">Latitude</label>
                                                <input type="number"
                                                       class="form-control @error('latitude') is-invalid @enderror"
                                                       id="latitude"
                                                       name="latitude"
                                                       value="{{ old('latitude', $contactInformation->latitude ?? '') }}"
                                                       step="any">
                                                @error('latitude')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-6 mb-3">
                                                <label for="longitude" class="form-label">Longitude</label>
                                                <input type="number"
                                                       class="form-control @error('longitude') is-invalid @enderror"
                                                       id="longitude"
                                                       name="longitude"
                                                       value="{{ old('longitude', $contactInformation->longitude ?? '') }}"
                                                       step="any">
                                                @error('longitude')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="map_embed_url" class="form-label">Map Embed URL</label>
                                            <input type="url"
                                                   class="form-control @error('map_embed_url') is-invalid @enderror"
                                                   id="map_embed_url"
                                                   name="map_embed_url"
                                                   value="{{ old('map_embed_url', $contactInformation->map_embed_url ?? '') }}"
                                                   readonly>
                                            @error('map_embed_url')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <small class="text-muted">Auto-generated from search location</small>
                                        </div>

                                        <div class="mb-3">
                                            <label for="google_maps_link" class="form-label">Google Maps Link</label>
                                            <input type="url"
                                                   class="form-control @error('google_maps_link') is-invalid @enderror"
                                                   id="google_maps_link"
                                                   name="google_maps_link"
                                                   value="{{ old('google_maps_link', $contactInformation->google_maps_link ?? '') }}"
                                                   readonly>
                                            @error('google_maps_link')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <small class="text-muted">Auto-generated from search location</small>
                                        </div>
                                    </div>
                                </div>

                                @if($contactInformation)
                                    <div class="card">
                                        <div class="card-header">
                                            <h6 class="mb-0"><i class="fas fa-info-circle me-2"></i>Information</h6>
                                        </div>
                                        <div class="card-body">
                                            <small class="text-muted">
                                                <strong>Created:</strong> {{ $contactInformation->created_at->format('M d, Y \a\t g:i A') }}<br>
                                                <strong>Last Updated:</strong> {{ $contactInformation->updated_at->format('M d, Y \a\t g:i A') }}<br>
                                                <strong>ID:</strong> {{ $contactInformation->id }}
                                            </small>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex justify-content-end gap-2 mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="fas fa-save me-2"></i>
                                        {{ $contactInformation ? 'Update Contact Information' : 'Save Contact Information' }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
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

    .form-check-input:disabled + .form-check-label {
        opacity: 0.6;
    }

    .gmap_canvas,
    #gmap_canvas {
        height: 300px;
        width: 100%;
        border-radius: 4px;
    }

    .form-control {
        border-radius: 5px !important;
    }

    label {
        font-weight: 600;
        color: #333;
    }
</style>
@endpush
@push('scripts')
<script>
const mapEmbedUrl = "https://maps.google.com/maps?q=xxx_location&t=&z=13&ie=UTF8&iwloc=&output=embed";

function setMap(location) {
    const embedSrc = mapEmbedUrl.replace('xxx_location', encodeURIComponent(location));
    $('#gmap_canvas').attr('src', embedSrc);

    // Update the map embed URL field
    document.getElementById('map_embed_url').value = embedSrc;

    // Generate Google Maps link
    const mapsLink = `https://www.google.com/maps?q=${encodeURIComponent(location)}`;
    document.getElementById('google_maps_link').value = mapsLink;
}

function updateMapFromCoordinates() {
    const lat = document.getElementById('latitude').value;
    const lng = document.getElementById('longitude').value;

    if (lat && lng) {
        const location = `${lat},${lng}`;
        setMap(location);

        // Update search field
        document.getElementById('map_search').value = location;
    }
}

$(document).ready(function() {
    // Handle map search on Enter key
    $('#map_search').keydown(function(e) {
        if (e.which == 13) {
            e.preventDefault();
            const location = this.value.trim();
            if (location) {
                setMap(location);
            }
        }
    });

    // Handle coordinate input changes
    $('#latitude, #longitude').on('input', function() {
        updateMapFromCoordinates();
    });

    // Initialize map with existing data
    @if($contactInformation && ($contactInformation->latitude && $contactInformation->longitude))
        const initialLat = {{ $contactInformation->latitude }};
        const initialLng = {{ $contactInformation->longitude }};
        setMap(`${initialLat},${initialLng}`);
    @elseif($contactInformation && $contactInformation->address)
        setMap('{{ addslashes($contactInformation->address) }}');
    @else
        // Default to Kathmandu, Nepal
        setMap('Kathmandu, Nepal');
    @endif
});
</script>
@endpush
