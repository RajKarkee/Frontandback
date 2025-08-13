@extends('admin.layouts.app')

@section('title', 'Contact Details')
@section('page-title', 'Contact Message Details')

@section('content')
    <!-- Contact Message Details Card -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center flex-wrap">
                    <h5 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-envelope me-2"></i>Message Details
                    </h5>
                    <span class="badge bg-{{ $contact->status === 'new' ? 'danger' : ($contact->status === 'read' ? 'warning' : 'success') }} px-3 py-2">
                        {{ ucfirst($contact->status) }}
                    </span>
                </div>
                <div class="card-body p-4">
                    <div class="row g-4">
                        <!-- Contact Information -->
                        <div class="col-lg-6">
                            <h6 class="text-primary fw-bold mb-3">Contact Information</h6>

                            <div class="row mb-3">
                                <div class="col-4 col-md-3">
                                    <strong class="text-dark">Name:</strong>
                                </div>
                                <div class="col-8 col-md-9">
                                    <span class="text-muted">{{ $contact->name }}</span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-4 col-md-3">
                                    <strong class="text-dark">Email:</strong>
                                </div>
                                <div class="col-8 col-md-9">
                                    <a href="mailto:{{ $contact->email }}" class="text-primary text-decoration-none">
                                        <i class="fas fa-envelope me-1"></i>{{ $contact->email }}
                                    </a>
                                </div>
                            </div>

                            @if($contact->phone)
                            <div class="row mb-3">
                                <div class="col-4 col-md-3">
                                    <strong class="text-dark">Phone:</strong>
                                </div>
                                <div class="col-8 col-md-9">
                                    <a href="tel:{{ $contact->phone }}" class="text-success text-decoration-none">
                                        <i class="fas fa-phone me-1"></i>{{ $contact->phone }}
                                    </a>
                                </div>
                            </div>
                            @endif

                            <div class="row mb-3">
                                <div class="col-4 col-md-3">
                                    <strong class="text-dark">Received:</strong>
                                </div>
                                <div class="col-8 col-md-9">
                                    <span class="text-muted">
                                        <i class="fas fa-clock me-1"></i>{{ $contact->created_at->format('F j, Y \a\t g:i A') }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Subject and Message -->
                        <div class="col-lg-6">
                            <h6 class="text-primary fw-bold mb-3">Message Content</h6>

                            @if($contact->subject)
                            <div class="mb-3">
                                <strong class="text-dark d-block mb-2">Subject:</strong>
                                <div class="p-3 bg-light rounded border">
                                    {{ $contact->subject }}
                                </div>
                            </div>
                            @endif

                            <div>
                                <strong class="text-dark d-block mb-2">Message:</strong>
                                <div class="p-3 bg-light rounded border" style="max-height: 200px; overflow-y: auto;">
                                    {!! nl2br(e($contact->message)) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Actions Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-cogs me-2"></i>Actions
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <!-- Quick Actions -->
                        <div class="col-md-6 col-lg-4">
                            <a href="mailto:{{ $contact->email }}" class="btn btn-primary w-100 py-2">
                                <i class="fas fa-reply me-2"></i>Reply via Email
                            </a>
                        </div>

                        @if($contact->phone)
                        <div class="col-md-6 col-lg-4">
                            <a href="tel:{{ $contact->phone }}" class="btn btn-success w-100 py-2">
                                <i class="fas fa-phone me-2"></i>Call Contact
                            </a>
                        </div>
                        @endif

                        <div class="col-md-6 col-lg-4">
                            <a href="{{ route('admin.contacts.edit', $contact) }}" class="btn btn-warning w-100 py-2">
                                <i class="fas fa-edit me-2"></i>Edit Details
                            </a>
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <form method="POST" action="{{ route('admin.contacts.destroy', $contact) }}" class="d-inline w-100">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger w-100 py-2"
                                        onclick="return confirmDelete('Are you sure you want to delete this contact?')">
                                    <i class="fas fa-trash me-2"></i>Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Status Update -->
    @if($contact->status !== 'replied')
    <div class="row mb-4">
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-sync-alt me-2"></i>Quick Status Update
                    </h5>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('admin.contacts.update', $contact) }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="name" value="{{ $contact->name }}">
                        <input type="hidden" name="email" value="{{ $contact->email }}">
                        <input type="hidden" name="phone" value="{{ $contact->phone }}">
                        <input type="hidden" name="subject" value="{{ $contact->subject }}">
                        <input type="hidden" name="message" value="{{ $contact->message }}">

                        <div class="row align-items-end g-3">
                            <div class="col-md-8">
                                <label class="form-label fw-semibold">Update Status:</label>
                                <select class="form-select" name="status">
                                    <option value="read" {{ $contact->status === 'read' ? 'selected' : '' }}>
                                        <i class="fas fa-eye"></i> Mark as Read
                                    </option>
                                    <option value="replied" {{ $contact->status === 'replied' ? 'selected' : '' }}>
                                        <i class="fas fa-check"></i> Mark as Replied
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary w-100 py-2">
                                    <i class="fas fa-save me-2"></i>Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Navigation -->
    <div class="d-flex justify-content-between flex-wrap gap-2">
        <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to Contacts
        </a>

        <div class="d-flex gap-2">
            @if($contact->id > 1)
                <a href="{{ route('admin.contacts.show', $contact->id - 1) }}" class="btn btn-outline-primary">
                    <i class="fas fa-chevron-left me-1"></i>Previous
                </a>
            @endif

            <a href="{{ route('admin.contacts.show', $contact->id + 1) }}" class="btn btn-outline-primary">
                Next<i class="fas fa-chevron-right ms-1"></i>
            </a>
        </div>
    </div>
@endsection
