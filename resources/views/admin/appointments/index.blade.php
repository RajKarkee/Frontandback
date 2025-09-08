@extends('admin.layouts.app')

@section('title', 'Appointment Management')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mb-2">
                <div class="page-title-box" style="display: flex; justify-content: space-between; align-items: center;">
                    <h4 class="page-title">Appointment Management</h4>
                    <div class="page-title-right">
                        <span class="badge bg-info">Total: {{ $appointments->total() }} appointments</span>
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

        <!-- Statistics Cards -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card border-warning">
                    <div class="card-body text-center">
                        <h3 class="text-warning">{{ \App\Models\Appointment::pending()->count() }}</h3>
                        <p class="card-title mb-0">Pending</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-success">
                    <div class="card-body text-center">
                        <h3 class="text-success">{{ \App\Models\Appointment::confirmed()->count() }}</h3>
                        <p class="card-title mb-0">Confirmed</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-info">
                    <div class="card-body text-center">
                        <h3 class="text-info">{{ \App\Models\Appointment::upcoming()->count() }}</h3>
                        <p class="card-title mb-0">Upcoming</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-secondary">
                    <div class="card-body text-center">
                        <h3 class="text-secondary">{{ \App\Models\Appointment::past()->count() }}</h3>
                        <p class="card-title mb-0">Past</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Appointments Table -->
        <div class="card">
            <div class="card-body">
                @if ($appointments->isEmpty())
                    <div class="text-center py-4">
                        <i class="fas fa-calendar-times fa-3x text-muted mb-3"></i>
                        <h5>No appointments found</h5>
                        <p class="text-muted">Appointments will appear here once customers start booking consultations.</p>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Client Details</th>
                                    <th>Appointment Date</th>
                                    <th>Status</th>
                                    <th>Booked On</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($appointments as $appointment)
                                    <tr>
                                        <td><strong>#{{ $appointment->id }}</strong></td>
                                        <td>
                                            <div>
                                                <strong>{{ $appointment->name }}</strong><br>
                                                <small class="text-muted">
                                                    <i class="fas fa-envelope me-1"></i>{{ $appointment->email }}
                                                </small><br>
                                                @if ($appointment->phone)
                                                    <small class="text-muted">
                                                        <i class="fas fa-phone me-1"></i>{{ $appointment->phone }}
                                                    </small>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <strong>{{ $appointment->appointment_date->format('M d, Y') }}</strong><br>
                                            <small class="text-muted">
                                                {{ $appointment->appointment_date->format('g:i A') }}
                                            </small><br>
                                            @if ($appointment->appointment_date->isPast())
                                                <small class="badge bg-secondary">Past</small>
                                            @else
                                                <small class="badge bg-info">Upcoming</small>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="badge bg-{{ $appointment->status_badge }}">
                                                {{ ucfirst($appointment->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <small class="text-muted">
                                                {{ $appointment->created_at->format('M d, Y g:i A') }}
                                            </small>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.appointments.show', $appointment) }}"
                                                    class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-eye"></i>
                                                </a>

                                                @if ($appointment->status !== 'completed')
                                                    <div class="btn-group" role="group">
                                                        <button type="button"
                                                            class="btn btn-sm btn-outline-secondary dropdown-toggle"
                                                            data-bs-toggle="dropdown">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            @if ($appointment->status !== 'confirmed')
                                                                <li>
                                                                    <form method="POST"
                                                                        action="{{ route('admin.appointments.update-status', $appointment) }}"
                                                                        class="d-inline">
                                                                        @csrf
                                                                        @method('PATCH')
                                                                        <input type="hidden" name="status"
                                                                            value="confirmed">
                                                                        <button type="submit" class="dropdown-item">
                                                                            <i
                                                                                class="fas fa-check text-success me-2"></i>Confirm
                                                                        </button>
                                                                    </form>
                                                                </li>
                                                            @endif
                                                            @if ($appointment->status !== 'completed')
                                                                <li>
                                                                    <form method="POST"
                                                                        action="{{ route('admin.appointments.update-status', $appointment) }}"
                                                                        class="d-inline">
                                                                        @csrf
                                                                        @method('PATCH')
                                                                        <input type="hidden" name="status"
                                                                            value="completed">
                                                                        <button type="submit" class="dropdown-item">
                                                                            <i
                                                                                class="fas fa-check-double text-info me-2"></i>Complete
                                                                        </button>
                                                                    </form>
                                                                </li>
                                                            @endif
                                                            <li>
                                                                <form method="POST"
                                                                    action="{{ route('admin.appointments.update-status', $appointment) }}"
                                                                    class="d-inline">
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    <input type="hidden" name="status" value="cancelled">
                                                                    <button type="submit" class="dropdown-item">
                                                                        <i class="fas fa-times text-danger me-2"></i>Cancel
                                                                    </button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center">
                        {{ $appointments->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
