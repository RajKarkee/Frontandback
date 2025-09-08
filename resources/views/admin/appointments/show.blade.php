@extends('admin.layouts.app')

@section('title', 'Appointment Details')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mb-2">
                <div class="page-title-box" style="display: flex; justify-content: space-between; align-items: center;">
                    <h4 class="page-title">Appointment Details - #{{ $appointment->id }}</h4>
                    <div class="page-title-right">
                        <a href="{{ route('admin.appointments.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back to Appointments
                        </a>
                    </div>
                </div>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row">
            <!-- Client Information -->
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Client Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label text-muted">Full Name</label>
                                    <p class="fw-bold">{{ $appointment->name }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted">Email Address</label>
                                    <p class="fw-bold">
                                        <a href="mailto:{{ $appointment->email }}">{{ $appointment->email }}</a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                @if ($appointment->phone)
                                    <div class="mb-3">
                                        <label class="form-label text-muted">Phone Number</label>
                                        <p class="fw-bold">
                                            <a href="tel:{{ $appointment->phone }}">{{ $appointment->phone }}</a>
                                        </p>
                                    </div>
                                @endif
                            </div>
                        </div>

                        @if ($appointment->message)
                            <div class="mb-3">
                                <label class="form-label text-muted">Meeting Purpose</label>
                                <div class="bg-light p-3 rounded">
                                    <p class="mb-0">{{ $appointment->message }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Appointment Details -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Appointment Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label text-muted">Date & Time</label>
                            <p class="fw-bold">
                                <i class="fas fa-calendar me-2"></i>
                                {{ $appointment->appointment_date->format('l, F j, Y') }}
                            </p>
                            <p class="fw-bold">
                                <i class="fas fa-clock me-2"></i>
                                {{ $appointment->appointment_date->format('g:i A') }}
                            </p>
                            @if ($appointment->appointment_date->isPast())
                                <span class="badge bg-secondary">Past Appointment</span>
                            @else
                                <span class="badge bg-info">Upcoming Appointment</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-muted">Current Status</label>
                            <p>
                                <span class="badge bg-{{ $appointment->status_badge }} fs-6">
                                    {{ ucfirst($appointment->status) }}
                                </span>
                            </p>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-muted">Booked On</label>
                            <p class="text-muted">
                                {{ $appointment->created_at->format('M d, Y \a\t g:i A') }}
                                <br>
                                <small>({{ $appointment->created_at->diffForHumans() }})</small>
                            </p>
                        </div>

                        <!-- Status Update Actions -->
                        @if ($appointment->status !== 'completed' && $appointment->status !== 'cancelled')
                            <hr>
                            <div class="mb-3">
                                <label class="form-label text-muted">Quick Actions</label>
                                <div class="d-grid gap-2">
                                    @if ($appointment->status !== 'confirmed')
                                        <form method="POST"
                                            action="{{ route('admin.appointments.update-status', $appointment) }}">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="confirmed">
                                            <button type="submit" class="btn btn-success">
                                                <i class="fas fa-check me-2"></i>Confirm Appointment
                                            </button>
                                        </form>
                                    @endif

                                    @if ($appointment->status === 'confirmed')
                                        <form method="POST"
                                            action="{{ route('admin.appointments.update-status', $appointment) }}">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="completed">
                                            <button type="submit" class="btn btn-info">
                                                <i class="fas fa-check-double me-2"></i>Mark as Completed
                                            </button>
                                        </form>
                                    @endif

                                    <form method="POST"
                                        action="{{ route('admin.appointments.update-status', $appointment) }}">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="cancelled">
                                        <button type="submit" class="btn btn-outline-danger"
                                            onclick="return confirm('Are you sure you want to cancel this appointment?')">
                                            <i class="fas fa-times me-2"></i>Cancel Appointment
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Contact Client -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Contact Client</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <a href="mailto:{{ $appointment->email }}?subject=Regarding your appointment on {{ $appointment->appointment_date->format('M d, Y') }}"
                                class="btn btn-outline-primary">
                                <i class="fas fa-envelope me-2"></i>Send Email
                            </a>
                            @if ($appointment->phone)
                                <a href="tel:{{ $appointment->phone }}" class="btn btn-outline-success">
                                    <i class="fas fa-phone me-2"></i>Call Client
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
