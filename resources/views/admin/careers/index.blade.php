@extends('admin.layouts.app')

@section('title', 'Careers')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item active">Careers</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">All Careers</h5>
                <a href="{{ route('admin.careers.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add New Career
                </a>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-striped" id="careersTable">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Department</th>
                                <th>Type</th>
                                <th>Location</th>
                                <th>Status</th>
                                <th>Featured</th>
                                <th>Posted Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($careers as $career)
                            <tr>
                                <td>
                                    <div>
                                        <strong>{{ $career->title }}</strong>
                                        <br>
                                        <small class="text-muted">{{ Str::limit($career->summary, 50) }}</small>
                                    </div>
                                </td>
                                <td>
                                    @if($career->department)
                                        <span class="badge bg-secondary">{{ $career->department }}</span>
                                    @else
                                        <span class="text-muted">No department</span>
                                    @endif
                                </td>
                                <td>
                                    @if($career->employment_type)
                                        <span class="badge bg-info">{{ ucfirst($career->employment_type) }}</span>
                                    @else
                                        <span class="text-muted">No type</span>
                                    @endif
                                </td>
                                <td>
                                    @if($career->location)
                                        <i class="fas fa-map-marker-alt text-muted"></i> {{ $career->location }}
                                    @else
                                        <span class="text-muted">No location</span>
                                    @endif
                                </td>
                                <td>
                                    @if($career->status === 'published')
                                        <span class="badge bg-success">Published</span>
                                    @elseif($career->status === 'draft')
                                        <span class="badge bg-warning">Draft</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    @if($career->is_featured)
                                        <span class="badge bg-primary">
                                            <i class="fas fa-star"></i> Featured
                                        </span>
                                    @else
                                        <span class="text-muted">No</span>
                                    @endif
                                </td>
                                <td>{{ $career->created_at->format('M d, Y') }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.careers.show', $career) }}" class="btn btn-sm btn-outline-info" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.careers.edit', $career) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.careers.destroy', $career) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this career?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
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
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#careersTable').DataTable({
        responsive: true,
        order: [[6, 'desc']], // Sort by posted date
        columnDefs: [
            { orderable: false, targets: [7] } // Disable sorting on actions column
        ]
    });
});
</script>
@endpush
