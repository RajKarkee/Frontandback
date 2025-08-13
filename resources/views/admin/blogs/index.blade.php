@extends('admin.layouts.app')

@section('title', 'Blogs')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item active">Blogs</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">All Blogs</h5>
                <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add New Blog
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
                    <table class="table table-striped" id="blogsTable">
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
                            @foreach($blogs as $blog)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if($blog->featured_image)
                                            <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}" class="rounded me-2" style="width: 40px; height: 40px; object-fit: cover;">
                                        @endif
                                        <div>
                                            <strong>{{ $blog->title }}</strong>
                                            <br>
                                            <small class="text-muted">{{ Str::limit($blog->excerpt, 50) }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $blog->author }}</td>
                                <td>
                                    @if($blog->category)
                                        <span class="badge bg-secondary">{{ $blog->category }}</span>
                                    @else
                                        <span class="text-muted">No category</span>
                                    @endif
                                </td>
                                <td>
                                    @if($blog->status === 'published')
                                        <span class="badge bg-success">Published</span>
                                    @elseif($blog->status === 'draft')
                                        <span class="badge bg-warning">Draft</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    @if($blog->is_featured)
                                        <span class="badge bg-primary">
                                            <i class="fas fa-star"></i> Featured
                                        </span>
                                    @else
                                        <span class="text-muted">No</span>
                                    @endif
                                </td>
                                <td>
                                    @if($blog->published_at)
                                        {{ $blog->published_at->format('M d, Y') }}
                                    @else
                                        <span class="text-muted">Not published</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.blogs.show', $blog) }}" class="btn btn-sm btn-outline-info" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this blog?')">
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
    $('#blogsTable').DataTable({
        responsive: true,
        order: [[5, 'desc']], // Sort by published date
        columnDefs: [
            { orderable: false, targets: [6] } // Disable sorting on actions column
        ]
    });
});
</script>
@endpush
