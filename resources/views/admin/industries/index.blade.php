@extends('admin.layouts.app')

@section('title', 'Industries')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item active">Industries</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">All Industries</h5>
                <a href="{{ route('admin.industries.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add New Industry
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
                    <table class="table table-striped" id="industriesTable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Featured</th>
                                <th>Sort Order</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($industries as $industry)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <strong>{{ $industry->name }}</strong>
                                            <br>
                                            <small class="text-muted">{{ Str::limit($industry->description, 50) }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    @if($industry->status === 'active')
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    @if($industry->is_featured)
                                        <span class="badge bg-primary">
                                            <i class="fas fa-star"></i> Featured
                                        </span>
                                    @else
                                        <span class="text-muted">No</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark">{{ $industry->sort_order ?? 0 }}</span>
                                </td>
                                <td>{{ $industry->created_at->format('M d, Y') }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.industries.show', $industry) }}" class="btn btn-sm btn-outline-info" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.industries.edit', $industry) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.industries.destroy', $industry) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this industry?')">
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
    $('#industriesTable').DataTable({
        responsive: true,
        order: [[3, 'asc']], // Sort by sort order
        columnDefs: [
            { orderable: false, targets: [5] } // Disable sorting on actions column
        ]
    });
});
</script>
@endpush
