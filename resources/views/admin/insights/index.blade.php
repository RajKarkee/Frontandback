@extends('admin.layouts.app')

@section('title', 'Insights')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item active">Insights</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">All Insights</h5>
                <a href="{{ route('admin.insights.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add New Insight
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
                    <table class="table table-striped" id="insightsTable">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Featured</th>
                                <th>Published Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($insights as $insight)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <strong>{{ $insight->title }}</strong>
                                            <br>
                                            <small class="text-muted">{{ Str::limit($insight->summary, 50) }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $insight->author }}</td>
                                <td>
                                    @if($insight->category)
                                        <span class="badge bg-secondary">{{ $insight->category }}</span>
                                    @else
                                        <span class="text-muted">No category</span>
                                    @endif
                                </td>
                                <td>
                                    @if($insight->status === 'published')
                                        <span class="badge bg-success">Published</span>
                                    @elseif($insight->status === 'draft')
                                        <span class="badge bg-warning">Draft</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    @if($insight->is_featured)
                                        <span class="badge bg-primary">
                                            <i class="fas fa-star"></i> Featured
                                        </span>
                                    @else
                                        <span class="text-muted">No</span>
                                    @endif
                                </td>
                                <td>
                                    @if($insight->published_at)
                                        {{ $insight->published_at->format('M d, Y') }}
                                    @else
                                        <span class="text-muted">Not published</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.insights.show', $insight) }}" class="btn btn-sm btn-outline-info" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.insights.edit', $insight) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.insights.destroy', $insight) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this insight?')">
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
    $('#insightsTable').DataTable({
        responsive: true,
        order: [[5, 'desc']], // Sort by published date
        columnDefs: [
            { orderable: false, targets: [6] } // Disable sorting on actions column
        ]
    });
});
</script>
@endpush
