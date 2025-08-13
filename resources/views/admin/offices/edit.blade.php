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

                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="name" class="form-label">Office Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                       id="name" name="name" value="{{ old('name', $office->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                          id="description" name="description" rows="6">{{ old('description', $office->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="services" class="form-label">Services Offered</label>
                                <textarea class="form-control @error('services') is-invalid @enderror"
                                          id="services" name="services" rows="6">{{ old('services', $office->services) }}</textarea>
                                <div class="form-text">List the services provided by this office</div>
                                @error('services')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="facilities" class="form-label">Facilities</label>
                                <textarea class="form-control @error('facilities') is-invalid @enderror"
                                          id="facilities" name="facilities" rows="4">{{ old('facilities', $office->facilities) }}</textarea>
                                <div class="form-text">Available facilities and amenities</div>
                                @error('facilities')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="directions" class="form-label">Directions</label>
                                <textarea class="form-control @error('directions') is-invalid @enderror"
                                          id="directions" name="directions" rows="4">{{ old('directions', $office->directions) }}</textarea>
                                <div class="form-text">How to reach this office</div>
                                @error('directions')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="business_hours" class="form-label">Business Hours</label>
                                <textarea class="form-control @error('business_hours') is-invalid @enderror"
                                          id="business_hours" name="business_hours" rows="6">{{ old('business_hours', $office->business_hours) }}</textarea>
                                <div class="form-text">Operating hours for this office</div>
                                @error('business_hours')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <h6 class="mt-4 mb-3">Address Information</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="address_line_1" class="form-label">Address Line 1</label>
                                        <input type="text" class="form-control @error('address_line_1') is-invalid @enderror"
                                               id="address_line_1" name="address_line_1" value="{{ old('address_line_1', $office->address_line_1) }}">
                                        @error('address_line_1')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="address_line_2" class="form-label">Address Line 2</label>
                                        <input type="text" class="form-control @error('address_line_2') is-invalid @enderror"
                                               id="address_line_2" name="address_line_2" value="{{ old('address_line_2', $office->address_line_2) }}">
                                        @error('address_line_2')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="city" class="form-label">City</label>
                                        <input type="text" class="form-control @error('city') is-invalid @enderror"
                                               id="city" name="city" value="{{ old('city', $office->city) }}">
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
                                        <label for="postal_code" class="form-label">Postal Code</label>
                                        <input type="text" class="form-control @error('postal_code') is-invalid @enderror"
                                               id="postal_code" name="postal_code" value="{{ old('postal_code', $office->postal_code) }}">
                                        @error('postal_code')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <h6 class="mt-4 mb-3">Contact Information</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                               id="phone" name="phone" value="{{ old('phone', $office->phone) }}">
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="fax" class="form-label">Fax</label>
                                        <input type="tel" class="form-control @error('fax') is-invalid @enderror"
                                               id="fax" name="fax" value="{{ old('fax', $office->fax) }}">
                                        @error('fax')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                               id="email" name="email" value="{{ old('email', $office->email) }}">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="website" class="form-label">Website</label>
                                        <input type="url" class="form-control @error('website') is-invalid @enderror"
                                               id="website" name="website" value="{{ old('website', $office->website) }}">
                                        @error('website')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <h6 class="mt-4 mb-3">Geographic Information</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="latitude" class="form-label">Latitude</label>
                                        <input type="number" step="any" class="form-control @error('latitude') is-invalid @enderror"
                                               id="latitude" name="latitude" value="{{ old('latitude', $office->latitude) }}">
                                        @error('latitude')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
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
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                                    <option value="active" {{ old('status', $office->status) === 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ old('status', $office->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    <option value="opening-soon" {{ old('status', $office->status) === 'opening-soon' ? 'selected' : '' }}>Opening Soon</option>
                                    <option value="temporarily-closed" {{ old('status', $office->status) === 'temporarily-closed' ? 'selected' : '' }}>Temporarily Closed</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="type" class="form-label">Office Type</label>
                                <select class="form-select @error('type') is-invalid @enderror" id="type" name="type">
                                    <option value="">Select Type</option>
                                    <option value="headquarters" {{ old('type', $office->type) === 'headquarters' ? 'selected' : '' }}>Headquarters</option>
                                    <option value="branch" {{ old('type', $office->type) === 'branch' ? 'selected' : '' }}>Branch Office</option>
                                    <option value="regional" {{ old('type', $office->type) === 'regional' ? 'selected' : '' }}>Regional Office</option>
                                    <option value="sales" {{ old('type', $office->type) === 'sales' ? 'selected' : '' }}>Sales Office</option>
                                    <option value="support" {{ old('type', $office->type) === 'support' ? 'selected' : '' }}>Support Center</option>
                                    <option value="warehouse" {{ old('type', $office->type) === 'warehouse' ? 'selected' : '' }}>Warehouse</option>
                                    <option value="coworking" {{ old('type', $office->type) === 'coworking' ? 'selected' : '' }}>Coworking Space</option>
                                    <option value="virtual" {{ old('type', $office->type) === 'virtual' ? 'selected' : '' }}>Virtual Office</option>
                                </select>
                                @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="country" class="form-label">Country</label>
                                <input type="text" class="form-control @error('country') is-invalid @enderror"
                                       id="country" name="country" value="{{ old('country', $office->country) }}">
                                @error('country')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="region" class="form-label">Region</label>
                                <input type="text" class="form-control @error('region') is-invalid @enderror"
                                       id="region" name="region" value="{{ old('region', $office->region) }}">
                                <div class="form-text">e.g., North America, Europe, Asia-Pacific</div>
                                @error('region')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="timezone" class="form-label">Timezone</label>
                                <input type="text" class="form-control @error('timezone') is-invalid @enderror"
                                       id="timezone" name="timezone" value="{{ old('timezone', $office->timezone) }}" placeholder="e.g., UTC+05:00, EST">
                                @error('timezone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="languages" class="form-label">Languages</label>
                                <input type="text" class="form-control @error('languages') is-invalid @enderror"
                                       id="languages" name="languages" value="{{ old('languages', $office->languages) }}" placeholder="English, Spanish, French">
                                <div class="form-text">Separate languages with commas</div>
                                @error('languages')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="sort_order" class="form-label">Sort Order</label>
                                <input type="number" class="form-control @error('sort_order') is-invalid @enderror"
                                       id="sort_order" name="sort_order" value="{{ old('sort_order', $office->sort_order) }}" min="0">
                                <div class="form-text">Higher numbers appear first</div>
                                @error('sort_order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Office Image</label>
                                @if($office->image)
                                    <div class="mb-2">
                                        <img src="{{ Storage::url($office->image) }}" alt="Current Image" class="img-thumbnail" style="max-width: 200px;">
                                        <div class="form-text">Current image</div>
                                    </div>
                                @endif
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                       id="image" name="image" accept="image/*">
                                <div class="form-text">Upload a new image to replace the current one</div>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_headquarters"
                                           name="is_headquarters" value="1" {{ old('is_headquarters', $office->is_headquarters) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_headquarters">
                                        Headquarters
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <hr>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.offices.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Back to Offices
                                </a>
                                <div>
                                    <a href="{{ route('admin.offices.show', $office) }}" class="btn btn-info me-2">
                                        <i class="fas fa-eye"></i> View Office
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Update Office
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
