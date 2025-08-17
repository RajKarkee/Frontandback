@extends('admin.layouts.app')

@section('title', 'View Tag')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 text-gray-800">{{ $tag->name }}</h1>
        <p class="text-muted">Tag details and posts</p>
    </div>
    <div>
        <a href="{{ route('admin.tags.edit', $tag) }}" class="btn btn-warning me-2">
            <i class="fas fa-edit me-2"></i>Edit Tag
        </a>
        <a href="{{ route('admin.tags.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to Tags
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-4">
        <!-- Tag Details -->
        <div class="card mb-4">
            <div class="card-header">
                <h6 class="card-title mb-0">Tag Details</h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <span class="badge bg-primary" style="font-size: 1.2rem; padding: 0.5rem 1rem;">
                        {{ $tag->name }}
                    </span>
                </div>

                <div class="mb-3">
                    <strong>Slug:</strong>
                    <code>{{ $tag->slug }}</code>
                </div>

                @if($tag->description)
                <div class="mb-3">
                    <strong>Description:</strong>
                    <p class="text-muted mb-0">{{ $tag->description }}</p>
                </div>
                @endif

                <hr>

                <div class="mb-3">
                    <strong>Created:</strong>
                    <div class="text-muted">{{ $tag->created_at->format('M j, Y g:i A') }}</div>
                </div>

                <div class="mb-0">
                    <strong>Last Updated:</strong>
                    <div class="text-muted">{{ $tag->updated_at->format('M j, Y g:i A') }}</div>
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
                            <h4 class="text-primary mb-0">{{ $tag->posts_count }}</h4>
                            <small class="text-muted">Total Posts</small>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <h4 class="text-success mb-0">{{ $tag->posts()->where('status', 'published')->count() }}</h4>
                        <small class="text-muted">Published</small>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-6">
                        <div class="border-end">
                            <h4 class="text-warning mb-0">{{ $tag->posts()->where('status', 'draft')->count() }}</h4>
                            <small class="text-muted">Drafts</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <h4 class="text-info mb-0">{{ $tag->posts()->where('is_featured', true)->count() }}</h4>
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
                    <a href="{{ route('admin.tags.edit', $tag) }}" class="btn btn-warning">
                        <i class="fas fa-edit me-2"></i>Edit Tag
                    </a>

                    @if($tag->posts_count == 0)
                    <button type="button" class="btn btn-danger" onclick="deleteTag()">
                        <i class="fas fa-trash me-2"></i>Delete Tag
                    </button>
                    @else
                    <button type="button" class="btn btn-danger" disabled title="Cannot delete tag with posts">
                        <i class="fas fa-trash me-2"></i>Delete Tag
                    </button>
                    <small class="text-muted">Cannot delete tag with existing posts</small>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <!-- Posts with this Tag -->
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="card-title mb-0">Posts tagged with "{{ $tag->name }}"</h6>
                <span class="badge bg-primary">{{ $tag->posts_count }} posts</span>
            </div>
            <div class="card-body">
                @if($tag->posts->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th>Status</th>
                                <th>Published</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tag->posts()->orderBy('created_at', 'desc')->get() as $post)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if($post->thumbnail)
                                        <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}"
                                             class="rounded me-2" style="width: 40px; height: 40px; object-fit: cover;">
                                        @endif
                                        <div>
                                            <div class="fw-medium">{{ $post->title }}</div>
                                            @if($post->is_featured)
                                            <span class="badge bg-info badge-sm">Featured</span>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if($post->category->icon)
                                        <i class="{{ $post->category->icon }} me-1 text-muted"></i>
                                        @endif
                                        {{ $post->category->name }}
                                    </div>
                                </td>
                                <td>{{ $post->author->name }}</td>
                                <td>
                                    <span class="badge {{ $post->status === 'published' ? 'bg-success' : 'bg-warning' }}">
                                        {{ ucfirst($post->status) }}
                                    </span>
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
                    <i class="fas fa-tags fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">No posts with this tag</h5>
                    <p class="text-muted">This tag hasn't been used in any posts yet.</p>
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>View All Posts
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Hidden form for delete action -->
<form id="deleteForm" action="{{ route('admin.tags.destroy', $tag) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
@endsection

@push('scripts')
<script>
function deleteTag() {
    if (confirm('Are you sure you want to delete this tag? This action cannot be undone.')) {
        document.getElementById('deleteForm').submit();
    }
}
</script>
@endpush
