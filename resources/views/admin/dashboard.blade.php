@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard Overview')

@section('content')
    <!-- Welcome Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm bg-gradient-primary text-white">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h3 class="mb-2">Welcome back, {{ Auth::user()->name }}!</h3>
                            <p class="mb-0 opacity-75">Here's what's happening with your content management system today.</p>
                        </div>
                        <div class="col-md-4 text-end">
                            <i class="fas fa-chart-line fa-3x opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Primary Statistics Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Users</div>
                            <div class="h4 mb-0 font-weight-bold text-gray-800">{{ $stats['users'] }}</div>
                        </div>
                        <div class="col-auto">
                            <div class="icon-circle bg-primary">
                                <i class="fas fa-users text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Pages</div>
                            <div class="h4 mb-0 font-weight-bold text-gray-800">{{ $stats['pages'] }}</div>
                        </div>
                        <div class="col-auto">
                            <div class="icon-circle bg-success">
                                <i class="fas fa-file-alt text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Blog Posts</div>
                            <div class="h4 mb-0 font-weight-bold text-gray-800">{{ $stats['blogs'] }}</div>
                        </div>
                        <div class="col-auto">
                            <div class="icon-circle bg-info">
                                <i class="fas fa-blog text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Events</div>
                            <div class="h4 mb-0 font-weight-bold text-gray-800">{{ $stats['events'] }}</div>
                        </div>
                        <div class="col-auto">
                            <div class="icon-circle bg-warning">
                                <i class="fas fa-calendar-alt text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Secondary Statistics -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Services</div>
                            <div class="h4 mb-0 font-weight-bold text-gray-800">{{ $stats['services'] }}</div>
                        </div>
                        <div class="col-auto">
                            <div class="icon-circle bg-secondary">
                                <i class="fas fa-cogs text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Industries</div>
                            <div class="h4 mb-0 font-weight-bold text-gray-800">{{ $stats['industries'] }}</div>
                        </div>
                        <div class="col-auto">
                            <div class="icon-circle bg-dark">
                                <i class="fas fa-industry text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Careers</div>
                            <div class="h4 mb-0 font-weight-bold text-gray-800">{{ $stats['careers'] }}</div>
                        </div>
                        <div class="col-auto">
                            <div class="icon-circle bg-primary">
                                <i class="fas fa-user-tie text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Offices</div>
                            <div class="h4 mb-0 font-weight-bold text-gray-800">{{ $stats['offices'] }}</div>
                        </div>
                        <div class="col-auto">
                            <div class="icon-circle bg-danger">
                                <i class="fas fa-building text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions and Recent Activity -->
    <div class="row mb-4">
        <div class="col-lg-6 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom-0 py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-bolt me-2"></i>Quick Actions
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <a href="{{ route('admin.services.create') }}" class="btn btn-outline-primary w-100 py-2">
                                <i class="fas fa-plus me-2"></i>New Service
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.events.create') }}" class="btn btn-outline-success w-100 py-2">
                                <i class="fas fa-calendar-plus me-2"></i>New Event
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.insights.create') }}" class="btn btn-outline-info w-100 py-2">
                                <i class="fas fa-lightbulb me-2"></i>New Insight
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.careers.create') }}" class="btn btn-outline-warning w-100 py-2">
                                <i class="fas fa-briefcase me-2"></i>New Career
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.industries.create') }}" class="btn btn-outline-dark w-100 py-2">
                                <i class="fas fa-industry me-2"></i>New Industry
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.offices.create') }}" class="btn btn-outline-secondary w-100 py-2">
                                <i class="fas fa-building me-2"></i>New Office
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom-0 py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-list-alt me-2"></i>Recent Contacts
                    </h6>
                </div>
                <div class="card-body">
                    @if(isset($recentContacts) && $recentContacts->count() > 0)
                        <div class="list-group list-group-flush">
                            @foreach($recentContacts->take(5) as $contact)
                                <div class="list-group-item border-0 px-0">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <div class="activity-dot bg-{{ $contact->status === 'new' ? 'danger' : 'success' }}"></div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1 fw-semibold">{{ $contact->name }}</h6>
                                            <small class="text-muted">{{ $contact->email }} • {{ $contact->created_at->diffForHumans() }}</small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-envelope fa-2x text-muted mb-3"></i>
                            <p class="text-muted mb-0">No recent contacts to display.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- System Information -->
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom-0 py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-server me-2"></i>System Information
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="d-flex align-items-center">
                                <div class="icon-circle bg-primary me-3">
                                    <i class="fab fa-laravel text-white"></i>
                                </div>
                                <div>
                                    <strong>Laravel Version</strong><br>
                                    <span class="text-muted">{{ app()->version() }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex align-items-center">
                                <div class="icon-circle bg-info me-3">
                                    <i class="fab fa-php text-white"></i>
                                </div>
                                <div>
                                    <strong>PHP Version</strong><br>
                                    <span class="text-muted">{{ phpversion() }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex align-items-center">
                                <div class="icon-circle bg-{{ config('app.env') == 'production' ? 'success' : 'warning' }} me-3">
                                    <i class="fas fa-cog text-white"></i>
                                </div>
                                <div>
                                    <strong>Environment</strong><br>
                                    <span class="text-muted text-capitalize">{{ config('app.env') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
    .icon-circle {
        width: 3rem;
        height: 3rem;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .activity-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
    }

    .bg-gradient-primary {
        background: linear-gradient(135deg, var(--bs-primary) 0%, #667eea 100%);
    }

    .card {
        transition: transform 0.2s ease-in-out;
    }

    .card:hover {
        transform: translateY(-2px);
    }

    .btn-outline-primary:hover,
    .btn-outline-success:hover,
    .btn-outline-info:hover,
    .btn-outline-warning:hover,
    .btn-outline-dark:hover,
    .btn-outline-secondary:hover {
        transform: translateY(-1px);
        transition: all 0.2s ease-in-out;
    }

    .text-xs {
        font-size: 0.7rem;
    }

    .text-gray-800 {
        color: #5a5c69 !important;
    }

    .opacity-75 {
        opacity: 0.75;
    }

    .opacity-50 {
        opacity: 0.5;
    }
</style>
@endpush
