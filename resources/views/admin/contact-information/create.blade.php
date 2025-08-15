@extends('admin.layouts.app')

@section('title', 'Add Contact Information')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="fas fa-plus text-primary me-2"></i>
                        Add Contact Information
                    </h4>
                    <a href="{{ route('admin.contact-information.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-1"></i>
                        Back to List
                    </a>
                </div>

                <div class="card-body">
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

                    <form method="POST" action="{{ route('admin.contact-information.store') }}">
                        @csrf

                        <div class="row">
                            <!-- Basic Information -->
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Basic Information</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                            <input type="text"
                                                   class="form-control @error('title') is-invalid @enderror"
                                                   id="title"
                                                   name="title"
                                                   value="{{ old('title', 'Contact Information') }}"
                                                   required>
                                            @error('title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                                            <textarea class="form-control @error('address') is-invalid @enderror"
                                                      id="address"
                                                      name="address"
                                                      rows="3"
                                                      required>{{ old('address') }}</textarea>
                                            @error('address')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                                            <input type="text"
                                                   class="form-control @error('phone') is-invalid @enderror"
                                                   id="phone"
                                                   name="phone"
                                                   value="{{ old('phone') }}"
                                                   required>
                                            @error('phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                            <input type="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   id="email"
                                                   name="email"
                                                   value="{{ old('email') }}"
                                                   required>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="website" class="form-label">Website</label>
                                            <input type="url"
                                                   class="form-control @error('website') is-invalid @enderror"
                                                   id="website"
                                                   name="website"
                                                   value="{{ old('website') }}"
                                                   placeholder="https://example.com">
                                            @error('website')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="additional_info" class="form-label">Additional Information</label>
                                            <textarea class="form-control @error('additional_info') is-invalid @enderror"
                                                      id="additional_info"
                                                      name="additional_info"
                                                      rows="3">{{ old('additional_info') }}</textarea>
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
                                                   {{ old('is_active', true) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_active">
                                                <strong>Set as Active</strong>
                                                <small class="text-muted d-block">This will be displayed on the contact page</small>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Maps and Social Media -->
                            <div class="col-lg-6">
                                <!-- Map Information -->
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h5 class="mb-0"><i class="fas fa-map-marker-alt me-2"></i>Location & Map Information</h5>
                                    </div>
                                    <div class="card-body">
                                        <!-- Interactive Map -->
                                        <div class="mb-3">
                                            <label class="form-label">Select Location on Map</label>
                                            <div id="map" style="height: 400px; width: 100%; border: 1px solid #ddd; border-radius: 0.375rem;"></div>
                                            <small class="form-text text-muted">
                                                Click on the map to select your location. The address and coordinates will be auto-filled.
                                            </small>
                                        </div>

                                        <!-- Coordinates (Hidden inputs) -->
                                        <input type="hidden" id="latitude" name="latitude" value="{{ old('latitude') }}">
                                        <input type="hidden" id="longitude" name="longitude" value="{{ old('longitude') }}">

                                        <!-- Auto-generated Links (Read-only) -->
                                        <div class="mb-3">
                                            <label for="map_embed_url" class="form-label">Map Embed URL</label>
                                            <input type="url"
                                                   class="form-control @error('map_embed_url') is-invalid @enderror"
                                                   id="map_embed_url"
                                                   name="map_embed_url"
                                                   value="{{ old('map_embed_url') }}"
                                                   readonly
                                                   placeholder="Will be auto-generated when location is selected">
                                            @error('map_embed_url')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <small class="form-text text-muted">
                                                This will be automatically generated when you select a location
                                            </small>
                                        </div>

                                        <div class="mb-3">
                                            <label for="google_maps_link" class="form-label">Google Maps Link</label>
                                            <input type="url"
                                                   class="form-control @error('google_maps_link') is-invalid @enderror"
                                                   id="google_maps_link"
                                                   name="google_maps_link"
                                                   value="{{ old('google_maps_link') }}"
                                                   readonly
                                                   placeholder="Will be auto-generated when location is selected">
                                            @error('google_maps_link')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <small class="form-text text-muted">
                                                This will be automatically generated when you select a location
                                            </small>
                                        </div>

                                        <!-- Address Confirmation -->
                                        <div class="mb-3">
                                            <label for="detected_address" class="form-label">Detected Address</label>
                                            <textarea class="form-control"
                                                      id="detected_address"
                                                      rows="3"
                                                      readonly
                                                      placeholder="Address will appear here when you select a location on the map">
                                            </textarea>
                                            <small class="form-text text-muted">
                                                This is the address detected from your map selection. Update the main address field if needed.
                                            </small>
                                        </div>

                                        <!-- Manual Override Option -->
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" id="manual_coordinates" name="manual_coordinates">
                                            <label class="form-check-label" for="manual_coordinates">
                                                Enter coordinates manually
                                            </label>
                                        </div>

                                        <!-- Manual Coordinate Inputs (Initially Hidden) -->
                                        <div id="manual_coord_inputs" style="display: none;">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="manual_latitude" class="form-label">Latitude</label>
                                                        <input type="number"
                                                               class="form-control"
                                                               id="manual_latitude"
                                                               step="any"
                                                               min="-90"
                                                               max="90"
                                                               placeholder="e.g., 26.4525">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="manual_longitude" class="form-label">Longitude</label>
                                                        <input type="number"
                                                               class="form-control"
                                                               id="manual_longitude"
                                                               step="any"
                                                               min="-180"
                                                               max="180"
                                                               placeholder="e.g., 87.2718">
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-outline-primary" id="update_from_manual">
                                                <i class="fas fa-map-marker-alt me-1"></i>Update Map from Coordinates
                                            </button>
                                        </div>
                                    </div>
                                </div>                                <!-- Social Media Links -->
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h5 class="mb-0"><i class="fas fa-share-alt me-2"></i>Social Media Links</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="facebook" class="form-label">
                                                <i class="fab fa-facebook text-primary me-2"></i>Facebook
                                            </label>
                                            <input type="url"
                                                   class="form-control @error('social_media.facebook') is-invalid @enderror"
                                                   id="facebook"
                                                   name="social_media[facebook]"
                                                   value="{{ old('social_media.facebook') }}"
                                                   placeholder="https://facebook.com/...">
                                            @error('social_media.facebook')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="twitter" class="form-label">
                                                <i class="fab fa-twitter text-info me-2"></i>Twitter
                                            </label>
                                            <input type="url"
                                                   class="form-control @error('social_media.twitter') is-invalid @enderror"
                                                   id="twitter"
                                                   name="social_media[twitter]"
                                                   value="{{ old('social_media.twitter') }}"
                                                   placeholder="https://twitter.com/...">
                                            @error('social_media.twitter')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="linkedin" class="form-label">
                                                <i class="fab fa-linkedin text-primary me-2"></i>LinkedIn
                                            </label>
                                            <input type="url"
                                                   class="form-control @error('social_media.linkedin') is-invalid @enderror"
                                                   id="linkedin"
                                                   name="social_media[linkedin]"
                                                   value="{{ old('social_media.linkedin') }}"
                                                   placeholder="https://linkedin.com/...">
                                            @error('social_media.linkedin')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="instagram" class="form-label">
                                                <i class="fab fa-instagram text-danger me-2"></i>Instagram
                                            </label>
                                            <input type="url"
                                                   class="form-control @error('social_media.instagram') is-invalid @enderror"
                                                   id="instagram"
                                                   name="social_media[instagram]"
                                                   value="{{ old('social_media.instagram') }}"
                                                   placeholder="https://instagram.com/...">
                                            @error('social_media.instagram')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="youtube" class="form-label">
                                                <i class="fab fa-youtube text-danger me-2"></i>YouTube
                                            </label>
                                            <input type="url"
                                                   class="form-control @error('social_media.youtube') is-invalid @enderror"
                                                   id="youtube"
                                                   name="social_media[youtube]"
                                                   value="{{ old('social_media.youtube') }}"
                                                   placeholder="https://youtube.com/...">
                                            @error('social_media.youtube')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Business Hours -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h5 class="mb-0"><i class="fas fa-clock me-2"></i>Business Hours</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            @foreach(['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $day)
                                                <div class="col-md-6 col-lg-3 mb-3">
                                                    <label for="{{ $day }}" class="form-label">{{ ucfirst($day) }}</label>
                                                    <input type="text"
                                                           class="form-control @error('business_hours.'.$day) is-invalid @enderror"
                                                           id="{{ $day }}"
                                                           name="business_hours[{{ $day }}]"
                                                           value="{{ old('business_hours.'.$day) }}"
                                                           placeholder="9:00 AM - 6:00 PM">
                                                    @error('business_hours.'.$day)
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            @endforeach
                                        </div>
                                        <small class="text-muted">
                                            <i class="fas fa-info-circle me-1"></i>
                                            Leave blank for closed days. Use format like "9:00 AM - 6:00 PM" or "Closed"
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Buttons -->
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.contact-information.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-times me-1"></i>Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i>Save Contact Information
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- Google Maps JavaScript API -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY&libraries=places&callback=initMap"></script>

<script>
let map;
let marker;
let geocoder;
let infoWindow;

function initMap() {
    // Default center (Biratnagar, Nepal)
    const defaultCenter = { lat: 26.4525, lng: 87.2718 };

    // Initialize the map
    map = new google.maps.Map(document.getElementById("map"), {
        zoom: 13,
        center: defaultCenter,
        mapTypeControl: true,
        streetViewControl: true,
        fullscreenControl: true,
    });

    // Initialize geocoder and info window
    geocoder = new google.maps.Geocoder();
    infoWindow = new google.maps.InfoWindow();

    // Initialize marker
    marker = new google.maps.Marker({
        position: defaultCenter,
        map: map,
        draggable: true,
        title: "Click or drag to select location"
    });

    // Add click listener to map
    map.addListener("click", (event) => {
        placeMarkerAndPanTo(event.latLng, map);
    });

    // Add drag listener to marker
    marker.addListener("dragend", () => {
        const position = marker.getPosition();
        updateLocationData(position.lat(), position.lng());
    });

    // Check if there are existing coordinates from old input
    const existingLat = document.getElementById('latitude').value;
    const existingLng = document.getElementById('longitude').value;

    if (existingLat && existingLng) {
        const existingPosition = { lat: parseFloat(existingLat), lng: parseFloat(existingLng) };
        marker.setPosition(existingPosition);
        map.setCenter(existingPosition);
        updateLocationData(existingLat, existingLng);
    }
}

function placeMarkerAndPanTo(latLng, map) {
    marker.setPosition(latLng);
    map.panTo(latLng);

    updateLocationData(latLng.lat(), latLng.lng());
}

function updateLocationData(lat, lng) {
    // Update hidden inputs
    document.getElementById('latitude').value = lat;
    document.getElementById('longitude').value = lng;

    // Generate URLs
    generateMapUrls(lat, lng);

    // Reverse geocode to get address
    reverseGeocode(lat, lng);

    // Update manual coordinate inputs if visible
    document.getElementById('manual_latitude').value = lat;
    document.getElementById('manual_longitude').value = lng;

    console.log('Location updated:', { lat, lng });
}

function generateMapUrls(lat, lng) {
    // Generate Google Maps embed URL
    const embedUrl = `https://www.google.com/maps/embed/v1/place?key=YOUR_GOOGLE_MAPS_API_KEY&q=${lat},${lng}&zoom=15`;
    document.getElementById('map_embed_url').value = embedUrl;

    // Generate Google Maps link
    const mapsLink = `https://www.google.com/maps?q=${lat},${lng}&z=15`;
    document.getElementById('google_maps_link').value = mapsLink;
}

function reverseGeocode(lat, lng) {
    const latLng = { lat: lat, lng: lng };

    geocoder.geocode({ location: latLng }, (results, status) => {
        if (status === "OK") {
            if (results[0]) {
                const address = results[0].formatted_address;
                document.getElementById('detected_address').value = address;

                // Optionally update the main address field if it's empty
                const mainAddressField = document.getElementById('address');
                if (!mainAddressField.value.trim()) {
                    mainAddressField.value = address;
                }

                // Show info window on marker
                infoWindow.setContent(
                    `<div><strong>Selected Location</strong><br>${address}</div>`
                );
                infoWindow.open(map, marker);
            } else {
                console.log("No results found");
                document.getElementById('detected_address').value = "Address not found for this location";
            }
        } else {
            console.log("Geocoder failed due to: " + status);
            document.getElementById('detected_address').value = "Unable to retrieve address";
        }
    });
}

// Manual coordinates functionality
document.addEventListener('DOMContentLoaded', function() {
    // Toggle manual coordinate inputs
    document.getElementById('manual_coordinates').addEventListener('change', function() {
        const manualInputs = document.getElementById('manual_coord_inputs');
        if (this.checked) {
            manualInputs.style.display = 'block';
        } else {
            manualInputs.style.display = 'none';
        }
    });

    // Update map from manual coordinates
    document.getElementById('update_from_manual').addEventListener('click', function() {
        const lat = parseFloat(document.getElementById('manual_latitude').value);
        const lng = parseFloat(document.getElementById('manual_longitude').value);

        if (!isNaN(lat) && !isNaN(lng)) {
            if (lat >= -90 && lat <= 90 && lng >= -180 && lng <= 180) {
                const position = { lat: lat, lng: lng };
                marker.setPosition(position);
                map.setCenter(position);
                updateLocationData(lat, lng);
            } else {
                alert('Please enter valid coordinates (Latitude: -90 to 90, Longitude: -180 to 180)');
            }
        } else {
            alert('Please enter valid numeric coordinates');
        }
    });

    // Form validation
    document.querySelector('form').addEventListener('submit', function(e) {
        const lat = document.getElementById('latitude').value;
        const lng = document.getElementById('longitude').value;

        if (!lat || !lng) {
            e.preventDefault();
            alert('Please select a location on the map before submitting the form.');
            return false;
        }
    });
});

// Handle API load errors
window.gm_authFailure = function() {
    alert('Google Maps API authentication failed. Please check your API key.');
    document.getElementById('map').innerHTML = '<div class="alert alert-danger">Google Maps API authentication failed. Please configure a valid API key.</div>';
};
</script>

<style>
.gm-style-iw {
    font-family: inherit !important;
}

#map {
    border: 2px solid #e3e6f0;
    border-radius: 0.35rem;
}

.manual-coord-group {
    background-color: #f8f9fc;
    border: 1px solid #e3e6f0;
    border-radius: 0.35rem;
    padding: 1rem;
    margin-top: 1rem;
}
</style>
@endpush
