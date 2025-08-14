@extends('admin.layouts.app')

@section('title', 'Service Processes')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item active">Service Processes</li>
@endsection

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Service Processes</h2>
    <a href="{{ route('admin.service-processes.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Add New Step
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
        @if($processes->count() > 0)
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Step</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Color</th>
                            <th>Status</th>
                            <th>Sort Order</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($processes as $process)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-circle d-flex align-items-center justify-content-center text-white"
                                             style="width: 40px; height: 40px; background-color: {{ $process->color }};">
                                            <strong>{{ $process->step_number }}</strong>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h6 class="mb-0">{{ $process->title }}</h6>
                                </td>
                                <td>
                                    <p class="mb-0 text-muted" style="max-width: 300px;">
                                        {{ Str::limit($process->description, 100) }}
                                    </p>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="rounded" style="width: 20px; height: 20px; background-color: {{ $process->color }};"></div>
                                        <small class="ms-2">{{ $process->color }}</small>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-{{ $process->is_active ? 'success' : 'secondary' }}">
                                        {{ $process->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>{{ $process->sort_order }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.service-processes.show', $process) }}"
                                           class="btn btn-sm btn-outline-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.service-processes.edit', $process) }}"
                                           class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.service-processes.destroy', $process) }}"
                                              method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                    onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center">
                {{ $processes->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-cogs fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">No service processes found</h5>
                <p class="text-muted">Get started by creating your first service process step.</p>
                <a href="{{ route('admin.service-processes.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Add First Step
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
