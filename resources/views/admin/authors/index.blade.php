@extends('admin.layouts.app')

@section('title', 'Authors Management')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 text-gray-800">Authors Management</h1>
            <p class="text-muted">Manage blog authors and their permissions</p>
        </div>
        <div>
            <a href="{{ route('admin.authors.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Add New Author
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">All Authors</h5>
        </div>
        <div class="card-body">
            @if($authors->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Author</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Posts</th>
                                <th>Joined</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($authors as $author)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm me-3">
                                                <div class="avatar-title bg-primary rounded-circle">
                                                    {{ strtoupper(substr($author->name, 0, 2)) }}
                                                </div>
                                            </div>
                                            <div>
                                                <h6 class="mb-0">{{ $author->name }}</h6>
                                                @if($author->bio)
                                                    <small class="text-muted">{{ Str::limit($author->bio, 50) }}</small>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $author->email }}</td>
                                    <td>
                                        <span class="badge bg-{{ $author->role === 'admin' ? 'danger' : 'info' }}">
                                            {{ ucfirst($author->role) }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge bg-primary">{{ $author->posts()->count() }}</span>
                                    </td>
                                    <td>{{ $author->created_at->format('M j, Y') }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.authors.show', $author) }}"
                                               class="btn btn-sm btn-outline-info">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.authors.edit', $author) }}"
                                               class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            @if($author->posts()->count() === 0)
                                                <button type="button" class="btn btn-sm btn-outline-danger"
                                                        onclick="deleteAuthor('{{ $author->id }}', '{{ $author->name }}')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            @else
                                                <button type="button" class="btn btn-sm btn-outline-secondary"
                                                        title="Cannot delete author with posts" disabled>
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $authors->links() }}
            @else
                <div class="text-center py-5">
                    <i class="fas fa-users fa-3x text-muted mb-3"></i>
                    <h4>No Authors Found</h4>
                    <p class="text-muted">Start by adding your first author to the system.</p>
                    <a href="{{ route('admin.authors.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Add New Author
                    </a>
                </div>
            @endif
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Author</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete author <strong id="authorName"></strong>?</p>
                    <p class="text-danger"><small>This action cannot be undone.</small></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form id="deleteForm" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete Author</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
.avatar-sm {
    width: 40px;
    height: 40px;
}

.avatar-title {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 0.875rem;
}
</style>
@endpush

@push('scripts')
<script>
function deleteAuthor(authorId, authorName) {
    document.getElementById('authorName').textContent = authorName;
    document.getElementById('deleteForm').action = '{{ route("admin.authors.index") }}/' + authorId;

    const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    modal.show();
}
</script>
@endpush
