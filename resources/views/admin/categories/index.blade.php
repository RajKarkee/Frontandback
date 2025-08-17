@extends('admin.layouts.app')

@section('title', 'Manage Categories')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 text-gray-800">Manage Categories</h1>
        <p class="text-muted">Organize your blog posts with categories</p>
    </div>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Create New Category
    </a>
</div>

<!-- Search -->
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('admin.categories.index') }}" class="row g-3">
            <div class="col-md-6">
                <label for="search" class="form-label">Search Categories</label>
                <input type="text" class="form-control" id="search" name="search"
                       value="{{ request('search') }}" placeholder="Search categories...">
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="submit" class="btn btn-outline-primary me-2">Search</button>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">Reset</a>
            </div>
        </form>
    </div>
</div>

<!-- Categories Table -->
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Description</th>
                        <th>Posts Count</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                @if($category->icon)
                                <img src="{{ asset('storage/' . $category->icon) }}"
                                     class="rounded me-3" width="40" height="40"
                                     style="object-fit: cover;">
                                @else
                                <div class="bg-light rounded me-3 d-flex align-items-center justify-content-center"
                                     style="width: 40px; height: 40px;">
                                    <i class="fas fa-folder text-muted"></i>
                                </div>
                                @endif
                                <div>
                                    <h6 class="mb-0">{{ $category->name }}</h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <code>{{ $category->slug }}</code>
                        </td>
                        <td>
                            @if($category->description)
                            {{ Str::limit($category->description, 60) }}
                            @else
                            <span class="text-muted">No description</span>
                            @endif
                        </td>
                        <td>
                            <span class="badge bg-info">{{ $category->published_posts_count }} posts</span>
                        </td>
                        <td>{{ $category->created_at->format('M j, Y') }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ $category->url }}" class="btn btn-sm btn-outline-info" target="_blank" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.categories.show', $category) }}" class="btn btn-sm btn-outline-secondary" title="Details">
                                    <i class="fas fa-info-circle"></i>
                                </a>
                                <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                @if($category->published_posts_count == 0)
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Are you sure you want to delete this category?')" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                @else
                                <button class="btn btn-sm btn-outline-danger disabled" title="Cannot delete - has posts">
                                    <i class="fas fa-trash"></i>
                                </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">
                            <div class="text-muted">
                                <i class="fas fa-folder-open fa-3x mb-3"></i>
                                <p>No categories found.</p>
                                <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Create Your First Category</a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($categories->hasPages())
        <div class="d-flex justify-content-center">
            {{ $categories->appends(request()->query())->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
