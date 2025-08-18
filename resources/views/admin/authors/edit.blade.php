@extends('admin.layouts.app')

@section('title', 'Edit Author - ' . $author->name)

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 text-gray-800">Edit Author</h1>
            <p class="text-muted">Update author information</p>
        </div>
        <div>
            <a href="{{ route('admin.authors.show', $author) }}" class="btn btn-info me-2">
                <i class="fas fa-eye me-2"></i>View Author
            </a>
            <a href="{{ route('admin.authors.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to Authors
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Author Information</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.authors.update', $author) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           id="name" name="name" value="{{ old('name', $author->name) }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                           id="email" name="email" value="{{ old('email', $author->email) }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="password" class="form-label">New Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                           id="password" name="password">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Leave blank to keep current password</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Confirm New Password</label>
                                    <input type="password" class="form-control"
                                           id="password_confirmation" name="password_confirmation">
                                    <div class="form-text">Required only if changing password</div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="role" class="form-label">Role <span class="text-danger">*</span></label>
                            <select class="form-select @error('role') is-invalid @enderror" id="role" name="role" required>
                                <option value="">Select Role</option>
                                <option value="author" {{ old('role', $author->role) === 'author' ? 'selected' : '' }}>Author</option>
                                <option value="admin" {{ old('role', $author->role) === 'admin' ? 'selected' : '' }}>Administrator</option>
                            </select>
                            @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">
                                <strong>Author:</strong> Can create and manage their own posts<br>
                                <strong>Administrator:</strong> Full access to all system features
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="bio" class="form-label">Bio</label>
                            <textarea class="form-control @error('bio') is-invalid @enderror"
                                      id="bio" name="bio" rows="4"
                                      placeholder="Brief description about the author...">{{ old('bio', $author->bio) }}</textarea>
                            @error('bio')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Maximum 1000 characters</div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.authors.show', $author) }}" class="btn btn-secondary me-2">Cancel</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Update Author
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Current Author</h6>
                </div>
                <div class="card-body text-center">
                    <div class="avatar-lg mx-auto mb-3">
                        <div class="avatar-title bg-primary rounded-circle">
                            {{ strtoupper(substr($author->name, 0, 2)) }}
                        </div>
                    </div>
                    <h5>{{ $author->name }}</h5>
                    <p class="text-muted">{{ $author->email }}</p>
                    <span class="badge bg-{{ $author->role === 'admin' ? 'danger' : 'info' }}">
                        {{ ucfirst($author->role) }}
                    </span>

                    <hr>

                    <div class="row text-center">
                        <div class="col-6">
                            <h4 class="text-primary">{{ $author->posts()->count() }}</h4>
                            <small class="text-muted">Total Posts</small>
                        </div>
                        <div class="col-6">
                            <h4 class="text-success">{{ $author->posts()->where('status', 'published')->count() }}</h4>
                            <small class="text-muted">Published</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Account Status</h6>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <strong>Member Since:</strong>
                        <span class="text-muted">{{ $author->created_at->format('F j, Y') }}</span>
                    </div>
                    <div class="mb-2">
                        <strong>Last Updated:</strong>
                        <span class="text-muted">{{ $author->updated_at->format('F j, Y g:i A') }}</span>
                    </div>
                    <div>
                        <strong>Status:</strong>
                        <span class="badge bg-success">Active</span>
                    </div>

                    @if($author->posts()->count() > 0)
                        <hr>
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i>
                            <small>This author has {{ $author->posts()->count() }} posts and cannot be deleted.</small>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
.avatar-lg {
    width: 80px;
    height: 80px;
}

.avatar-title {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 1.5rem;
}
</style>
@endpush
