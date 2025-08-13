@extends('admin.layouts.app')

@section('title', 'Offices')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item active">Offices</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">All Offices</h5>
                <a href="{{ route('admin.offices.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add New Office
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
                    <table class="table table-striped" id="officesTable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>City</th>
                                <th>Country</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Phone</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($offices as $office)
                            <tr>
                                <td>
                                    <div>
                                        <strong>{{ $office->name }}</strong>
                                        <br>
                                        <small class="text-muted">
                                            @if($office->address)
                                                <i class="fas fa-map-marker-alt"></i> {{ Str::limit($office->address, 30) }}
                                            @endif
                                        </small>
                                    </div>
                                </td>
                                <td>{{ $office->city }}</td>
                                <td>{{ $office->country }}</td>
                                <td>
                                    @if($office->office_type)
                                        <span class="badge bg-info">{{ ucfirst($office->office_type) }}</span>
                                    @else
                                        <span class="text-muted">No type</span>
                                    @endif
                                </td>
                                <td>
                                    @if($office->status === 'active')
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    @if($office->phone)
                                        <a href="tel:{{ $office->phone }}">{{ $office->phone }}</a>
                                    @else
                                        <span class="text-muted">No phone</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.offices.show', $office) }}" class="btn btn-sm btn-outline-info" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.offices.edit', $office) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.offices.destroy', $office) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this office?')">
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
    $('#officesTable').DataTable({
        responsive: true,
        order: [[1, 'asc']], // Sort by city
        columnDefs: [
            { orderable: false, targets: [6] } // Disable sorting on actions column
        ]
    });
});
</script>
@endpush
