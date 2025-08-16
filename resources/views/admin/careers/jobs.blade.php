@extends('admin.layouts.app')

@section('title', 'Job Openings Management')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0">Job Openings</h1>
                <a href="{{ route('admin.careers.jobs.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Add New Job Opening
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Department</th>
                                    <th>Location</th>
                                    <th>Type</th>
                                    <th>Salary</th>
                                    <th>Featured</th>
                                    <th>Status</th>
                                    <th>Applications</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($jobs as $job)
                                    <tr>
                                        <td>
                                            <strong>{{ $job->title }}</strong>
                                            @if($job->is_featured)
                                                <span class="badge bg-warning ms-1">Featured</span>
                                            @endif
                                        </td>
                                        <td>{{ $job->department }}</td>
                                        <td>{{ $job->location }}</td>
                                        <td>
                                            <span class="badge bg-info">{{ ucfirst($job->type) }}</span>
                                        </td>
                                        <td>{{ $job->formatted_salary }}</td>
                                        <td>
                                            <form action="{{ route('admin.careers.jobs.toggle-featured', $job) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-{{ $job->is_featured ? 'warning' : 'outline-warning' }}">
                                                    <i class="fas fa-star"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <span class="badge bg-{{ $job->is_active ? 'success' : 'secondary' }}">
                                                {{ $job->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.careers.applications') }}?job_opening_id={{ $job->id }}"
                                               class="badge bg-primary text-decoration-none">
                                                {{ $job->applications_count ?? 0 }} Applications
                                            </a>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.careers.jobs.edit', $job) }}"
                                                   class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.careers.jobs.destroy', $job) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                                            onclick="return confirm('Are you sure you want to delete this job opening?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center text-muted py-4">
                                            No job openings found. <a href="{{ route('admin.careers.jobs.create') }}">Create the first one</a>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
