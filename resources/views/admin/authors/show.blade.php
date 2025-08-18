@extends('admin.layouts.app')

@section('title', 'Author Details - ' . $author->name)

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 text-gray-800">Author Details</h1>
            <p class="text-muted">View author information and posts</p>
        </div>
        <div>
            <a href="{{ route('admin.authors.edit', $author) }}" class="btn btn-primary me-2">
                <i class="fas fa-edit me-2"></i>Edit Author
            </a>
            <a href="{{ route('admin.authors.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to Authors
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body text-center">
                    <div class="avatar-lg mx-auto mb-3">
                        <div class="avatar-title bg-primary rounded-circle">
                            {{ strtoupper(substr($author->name, 0, 2)) }}
                        </div>
                    </div>
                    <h4 class="card-title">{{ $author->name }}</h4>
                    <p class="text-muted">{{ $author->email }}</p>
                    <span class="badge bg-{{ $author->role === 'admin' ? 'danger' : 'info' }} mb-3">
                        {{ ucfirst($author->role) }}
                    </span>

                    @if($author->bio)
                        <div class="mt-3">
                            <h6 class="text-primary">Bio</h6>
                            <p class="text-muted">{{ $author->bio }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Statistics</h6>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-6">
                            <h3 class="text-primary">{{ $author->posts()->count() }}</h3>
                            <p class="text-muted mb-0">Total Posts</p>
                        </div>
                        <div class="col-6">
                            <h3 class="text-success">{{ $author->posts()->where('status', 'published')->count() }}</h3>
                            <p class="text-muted mb-0">Published</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row text-center">
                        <div class="col-6">
                            <h3 class="text-warning">{{ $author->posts()->where('status', 'draft')->count() }}</h3>
                            <p class="text-muted mb-0">Drafts</p>
                        </div>
                        <div class="col-6">
                            <h3 class="text-info">{{ $author->posts()->where('is_featured', true)->count() }}</h3>
                            <p class="text-muted mb-0">Featured</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Account Information</h6>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <strong>Member Since:</strong>
                        <span class="text-muted">{{ $author->created_at->format('F j, Y') }}</span>
                    </div>
                    <div class="mb-2">
                        <strong>Last Updated:</strong>
                        <span class="text-muted">{{ $author->updated_at->format('F j, Y g:i A') }}</span>
                    </div>
                    <div>
                        <strong>Status:</strong>
                        <span class="badge bg-success">Active</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Author's Posts ({{ $posts->total() }})</h5>
                    @if(auth()->user()->id === $author->id || auth()->user()->role === 'admin')
                        <a href="{{ route('admin.posts.create') }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-plus me-1"></i>New Post
                        </a>
                    @endif
                </div>
                <div class="card-body">
                    @if($posts->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Published</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($posts as $post)
                                        <tr>
                                            <td>
                                                <div>
                                                    <h6 class="mb-0">{{ $post->title }}</h6>
                                                    @if($post->is_featured)
                                                        <span class="badge bg-warning badge-sm">Featured</span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                @if($post->category)
                                                    <span class="badge bg-info">{{ $post->category->name }}</span>
                                                @else
                                                    <span class="text-muted">No Category</span>
                                                @endif
                                            </td>
                                            <td>
                                                <span class="badge bg-{{ $post->status === 'published' ? 'success' : 'warning' }}">
                                                    {{ ucfirst($post->status) }}
                                                </span>
                                            </td>
                                            <td>
                                                @if($post->published_at)
                                                    {{ $post->published_at->format('M j, Y') }}
                                                @else
                                                    <span class="text-muted">Not published</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group btn-group-sm">
                                                    <a href="{{ route('admin.posts.show', $post) }}"
                                                       class="btn btn-outline-info">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    @if(auth()->user()->id === $author->id || auth()->user()->role === 'admin')
                                                        <a href="{{ route('admin.posts.edit', $post) }}"
                                                           class="btn btn-outline-primary">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{ $posts->links() }}
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-file-alt fa-3x text-muted mb-3"></i>
                            <h5>No Posts Yet</h5>
                            <p class="text-muted">This author hasn't created any posts yet.</p>
                            @if(auth()->user()->id === $author->id || auth()->user()->role === 'admin')
                                <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus me-2"></i>Create First Post
                                </a>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
.avatar-lg {
    width: 80px;
    height: 80px;
}

.avatar-title {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 1.5rem;
}

.badge-sm {
    font-size: 0.6rem;
}
</style>
@endpush
