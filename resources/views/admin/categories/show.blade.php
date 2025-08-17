@extends('admin.layouts.app')

@section('title', 'View Category')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 text-gray-800">{{ $category->name }}</h1>
        <p class="text-muted">Category details and posts</p>
    </div>
    <div>
        <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-warning me-2">
            <i class="fas fa-edit me-2"></i>Edit Category
        </a>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to Categories
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-4">
        <!-- Category Details -->
        <div class="card mb-4">
            <div class="card-header">
                <h6 class="card-title mb-0">Category Details</h6>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    @if($category->icon)
                    <i class="{{ $category->icon }} me-3 text-primary" style="font-size: 2rem;"></i>
                    @endif
                    <div>
                        <h5 class="mb-0">{{ $category->name }}</h5>
                        <small class="text-muted">{{ $category->slug }}</small>
                    </div>
                </div>

                @if($category->description)
                <p class="text-muted">{{ $category->description }}</p>
                @endif

                <hr>

                <div class="mb-3">
                    <strong>Created:</strong>
                    <div class="text-muted">{{ $category->created_at->format('M j, Y g:i A') }}</div>
                </div>

                <div class="mb-3">
                    <strong>Last Updated:</strong>
                    <div class="text-muted">{{ $category->updated_at->format('M j, Y g:i A') }}</div>
                </div>
            </div>
        </div>

        <!-- Statistics -->
        <div class="card mb-4">
            <div class="card-header">
                <h6 class="card-title mb-0">Statistics</h6>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-6 mb-3">
                        <div class="border-end">
                            <h4 class="text-primary mb-0">{{ $category->posts_count }}</h4>
                            <small class="text-muted">Total Posts</small>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <h4 class="text-success mb-0">{{ $category->posts()->where('status', 'published')->count() }}</h4>
                        <small class="text-muted">Published</small>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-6">
                        <div class="border-end">
                            <h4 class="text-warning mb-0">{{ $category->posts()->where('status', 'draft')->count() }}</h4>
                            <small class="text-muted">Drafts</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <h4 class="text-info mb-0">{{ $category->posts()->where('is_featured', true)->count() }}</h4>
                        <small class="text-muted">Featured</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="card">
            <div class="card-header">
                <h6 class="card-title mb-0">Actions</h6>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-warning">
                        <i class="fas fa-edit me-2"></i>Edit Category
                    </a>

                    <a href="{{ route('admin.posts.create', ['category' => $category->id]) }}" class="btn btn-success">
                        <i class="fas fa-plus me-2"></i>Add New Post
                    </a>

                    @if($category->posts_count == 0)
                    <button type="button" class="btn btn-danger" onclick="deleteCategory()">
                        <i class="fas fa-trash me-2"></i>Delete Category
                    </button>
                    @else
                    <button type="button" class="btn btn-danger" disabled title="Cannot delete category with posts">
                        <i class="fas fa-trash me-2"></i>Delete Category
                    </button>
                    <small class="text-muted">Cannot delete category with existing posts</small>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <!-- Posts in this Category -->
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="card-title mb-0">Posts in {{ $category->name }}</h6>
                <a href="{{ route('admin.posts.create', ['category' => $category->id]) }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus me-1"></i>Add Post
                </a>
            </div>
            <div class="card-body">
                @if($category->posts->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Status</th>
                                <th>Featured</th>
                                <th>Published</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($category->posts()->orderBy('created_at', 'desc')->get() as $post)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if($post->thumbnail)
                                        <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}"
                                             class="rounded me-2" style="width: 40px; height: 40px; object-fit: cover;">
                                        @endif
                                        <div>
                                            <div class="fw-medium">{{ $post->title }}</div>
                                            @if($post->excerpt)
                                            <small class="text-muted">{{ Str::limit($post->excerpt, 50) }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $post->author->name }}</td>
                                <td>
                                    <span class="badge {{ $post->status === 'published' ? 'bg-success' : 'bg-warning' }}">
                                        {{ ucfirst($post->status) }}
                                    </span>
                                </td>
                                <td>
                                    @if($post->is_featured)
                                    <span class="badge bg-info">Featured</span>
                                    @else
                                    <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    @if($post->published_at)
                                    <small class="text-muted">{{ $post->published_at->format('M j, Y') }}</small>
                                    @else
                                    <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('admin.posts.show', $post) }}" class="btn btn-outline-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-outline-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="text-center py-4">
                    <i class="fas fa-file-alt fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">No posts in this category</h5>
                    <p class="text-muted">Start by creating your first post in this category.</p>
                    <a href="{{ route('admin.posts.create', ['category' => $category->id]) }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Create First Post
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Hidden form for delete action -->
<form id="deleteForm" action="{{ route('admin.categories.destroy', $category) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
@endsection

@push('scripts')
<script>
function deleteCategory() {
    if (confirm('Are you sure you want to delete this category? This action cannot be undone.')) {
        document.getElementById('deleteForm').submit();
    }
}
</script>
@endpush
