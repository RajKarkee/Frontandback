@extends('admin.layouts.app')

@section('title', 'Edit Team Member')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.teams.index') }}">Team Members</a></li>
    <li class="breadcrumb-item active">Edit Team Member</li>
@endsection

@section('content')
    <form action="{{ route('admin.teams.update', $team) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-8">
                <!-- Basic Information -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom py-3">
                        <h5 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-user me-2"></i>Basic Information
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="name" class="form-label fw-semibold">Full Name *</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name', $team->name) }}"
                                    placeholder="Enter full name..." required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="position" class="form-label fw-semibold">Position *</label>
                                <input type="text" class="form-control @error('position') is-invalid @enderror"
                                    id="position" name="position" value="{{ old('position', $team->position) }}"
                                    placeholder="e.g., Managing Director, Head of Tax Advisory..." required>
                                @error('position')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="bio" class="form-label fw-semibold">Biography *</label>
                                <textarea class="form-control @error('bio') is-invalid @enderror" id="bio" name="bio" rows="4"
                                    placeholder="Write a brief biography about the team member..." required>{{ old('bio', $team->bio) }}</textarea>
                                @error('bio')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom py-3">
                        <h5 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-address-book me-2"></i>Contact Information
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="email" class="form-label fw-semibold">Email Address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email', $team->email) }}"
                                    placeholder="john.doe@company.com">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="phone" class="form-label fw-semibold">Phone Number</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                    id="phone" name="phone" value="{{ old('phone', $team->phone) }}"
                                    placeholder="+977-1-4445566">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Social Media -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom py-3">
                        <h5 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-share-alt me-2"></i>Social Media Links
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="linkedin_url" class="form-label fw-semibold">LinkedIn URL</label>
                                <input type="url" class="form-control @error('linkedin_url') is-invalid @enderror"
                                    id="linkedin_url" name="linkedin_url"
                                    value="{{ old('linkedin_url', $team->linkedin_url) }}"
                                    placeholder="https://linkedin.com/in/username">
                                @error('linkedin_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="twitter_url" class="form-label fw-semibold">Twitter URL</label>
                                <input type="url" class="form-control @error('twitter_url') is-invalid @enderror"
                                    id="twitter_url" name="twitter_url"
                                    value="{{ old('twitter_url', $team->twitter_url) }}"
                                    placeholder="https://twitter.com/username">
                                @error('twitter_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="facebook_url" class="form-label fw-semibold">Facebook URL</label>
                                <input type="url" class="form-control @error('facebook_url') is-invalid @enderror"
                                    id="facebook_url" name="facebook_url"
                                    value="{{ old('facebook_url', $team->facebook_url) }}"
                                    placeholder="https://facebook.com/username">
                                @error('facebook_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <!-- Profile Image -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom py-3">
                        <h5 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-image me-2"></i>Profile Image
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        @if ($team->image)
                            <div class="mb-3">
                                <img src="{{ Storage::url($team->image) }}" alt="Current profile image"
                                    class="img-fluid rounded shadow-sm">
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" id="remove_image"
                                        name="remove_image" value="1">
                                    <label class="form-check-label text-danger" for="remove_image">
                                        Remove current image
                                    </label>
                                </div>
                            </div>
                        @endif

                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                            name="image" accept="image/*">
                        <div class="form-text">Recommended: 400x400px, JPG or PNG, max 2MB</div>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Settings -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom py-3">
                        <h5 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-cog me-2"></i>Settings
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <label for="sort_order" class="form-label fw-semibold">Sort Order</label>
                            <input type="number" class="form-control @error('sort_order') is-invalid @enderror"
                                id="sort_order" name="sort_order" value="{{ old('sort_order', $team->sort_order) }}"
                                min="0" placeholder="0">
                            <div class="form-text">Lower numbers appear first</div>
                            @error('sort_order')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active"
                                value="1" {{ old('is_active', $team->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold" for="is_active">
                                Active Member
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Update Team Member
                            </button>

                            <a href="{{ route('admin.teams.show', $team) }}" class="btn btn-outline-info">
                                <i class="fas fa-eye me-2"></i>View Team Member
                            </a>

                            <a href="{{ route('admin.teams.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-times me-2"></i>Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
