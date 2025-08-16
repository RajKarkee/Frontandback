@extends('admin.layouts.app')

@section('title', 'Edit Office')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{ route('admin.offices.index') }}">Offices</a></li>
<li class="breadcrumb-item active">Edit Office</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Edit Office: {{ $office->name }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.offices.update', $office) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Basic Information -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Office Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                       id="name" name="name" value="{{ old('name', $office->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="type" class="form-label">Office Type <span class="text-danger">*</span></label>
                                <select class="form-select @error('type') is-invalid @enderror" id="type" name="type" required>
                                    <option value="">Select Office Type</option>
                                    <option value="head_office" {{ old('type', $office->type) == 'head_office' ? 'selected' : '' }}>Head Office</option>
                                    <option value="branch_office" {{ old('type', $office->type) == 'branch_office' ? 'selected' : '' }}>Branch Office</option>
                                </select>
                                @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="image" class="form-label">Office Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                       id="image" name="image" accept="image/*">
                                @if($office->image)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $office->image) }}" alt="Current Image" class="img-thumbnail" style="max-width: 200px;">
                                    </div>
                                @endif
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Location Information -->
                    <h6 class="border-bottom pb-2 mb-3">Location Information</h6>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('address') is-invalid @enderror"
                                          id="address" name="address" rows="3" required>{{ old('address', $office->address) }}</textarea>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="city" class="form-label">City <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('city') is-invalid @enderror"
                                       id="city" name="city" value="{{ old('city', $office->city) }}" required>
                                @error('city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="state" class="form-label">State/Province</label>
                                <input type="text" class="form-control @error('state') is-invalid @enderror"
                                       id="state" name="state" value="{{ old('state', $office->state) }}">
                                @error('state')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="country" class="form-label">Country <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('country') is-invalid @enderror"
                                       id="country" name="country" value="{{ old('country', $office->country) }}" required>
                                @error('country')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="postal_code" class="form-label">Postal Code</label>
                                <input type="text" class="form-control @error('postal_code') is-invalid @enderror"
                                       id="postal_code" name="postal_code" value="{{ old('postal_code', $office->postal_code) }}">
                                @error('postal_code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="latitude" class="form-label">Latitude</label>
                                <input type="number" step="any" class="form-control @error('latitude') is-invalid @enderror"
                                       id="latitude" name="latitude" value="{{ old('latitude', $office->latitude) }}">
                                @error('latitude')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="longitude" class="form-label">Longitude</label>
                                <input type="number" step="any" class="form-control @error('longitude') is-invalid @enderror"
                                       id="longitude" name="longitude" value="{{ old('longitude', $office->longitude) }}">
                                @error('longitude')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <h6 class="border-bottom pb-2 mb-3">Contact Information</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                       id="phone" name="phone" value="{{ old('phone', $office->phone) }}" required>
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                       id="email" name="email" value="{{ old('email', $office->email) }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="office_hours" class="form-label">Office Hours</label>
                                <textarea class="form-control @error('office_hours') is-invalid @enderror"
                                          id="office_hours" name="office_hours" rows="2" placeholder="e.g., Sunday - Friday: 9:00 AM - 6:00 PM">{{ old('office_hours', $office->office_hours) }}</textarea>
                                @error('office_hours')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Map & Navigation -->
                    <h6 class="border-bottom pb-2 mb-3">Map & Navigation</h6>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="map_link" class="form-label">Map Link</label>
                                <input type="url" class="form-control @error('map_link') is-invalid @enderror"
                                       id="map_link" name="map_link" value="{{ old('map_link', $office->map_link) }}" placeholder="https://maps.google.com/...">
                                @error('map_link')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="transportation" class="form-label">Transportation Details</label>
                                <textarea class="form-control @error('transportation') is-invalid @enderror"
                                          id="transportation" name="transportation" rows="3" placeholder="Public transport options, bus routes, etc.">{{ old('transportation', $office->transportation) }}</textarea>
                                @error('transportation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="directions" class="form-label">Directions</label>
                                <textarea class="form-control @error('directions') is-invalid @enderror"
                                          id="directions" name="directions" rows="3" placeholder="Step-by-step directions to the office">{{ old('directions', $office->directions) }}</textarea>
                                @error('directions')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="parking_info" class="form-label">Parking Information</label>
                                <textarea class="form-control @error('parking_info') is-invalid @enderror"
                                          id="parking_info" name="parking_info" rows="2" placeholder="Parking availability, cost, etc.">{{ old('parking_info', $office->parking_info) }}</textarea>
                                @error('parking_info')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="appointment_link" class="form-label">Appointment Link</label>
                                <input type="url" class="form-control @error('appointment_link') is-invalid @enderror"
                                       id="appointment_link" name="appointment_link" value="{{ old('appointment_link', $office->appointment_link) }}" placeholder="https://...">
                                @error('appointment_link')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Settings -->
                    <h6 class="border-bottom pb-2 mb-3">Settings</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                    <option value="active" {{ old('status', $office->status) == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ old('status', $office->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_headquarters" name="is_headquarters" value="1" {{ old('is_headquarters', $office->is_headquarters) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_headquarters">
                                        Mark as Headquarters
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.offices.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update Office</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
