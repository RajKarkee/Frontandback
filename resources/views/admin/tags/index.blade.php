@extends('admin.layouts.app')

@section('title', 'Manage Tags')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 text-gray-800">Manage Tags</h1>
        <p class="text-muted">Create and organize tags for your blog posts</p>
    </div>
    <a href="{{ route('admin.tags.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Create New Tag
    </a>
</div>

<!-- Search -->
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('admin.tags.index') }}" class="row g-3">
            <div class="col-md-6">
                <label for="search" class="form-label">Search Tags</label>
                <input type="text" class="form-control" id="search" name="search"
                       value="{{ request('search') }}" placeholder="Search tags...">
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="submit" class="btn btn-outline-primary me-2">Search</button>
                <a href="{{ route('admin.tags.index') }}" class="btn btn-outline-secondary">Reset</a>
            </div>
        </form>
    </div>
</div>

<!-- Bulk Actions -->
<div class="card mb-4">
    <div class="card-body">
        <form id="bulk-form" method="POST" action="{{ route('admin.tags.bulk-destroy') }}">
            @csrf
            @method('DELETE')
            <div class="d-flex align-items-center">
                <button type="button" id="select-all" class="btn btn-sm btn-outline-secondary me-2">Select All</button>
                <button type="submit" class="btn btn-sm btn-outline-danger" id="bulk-delete-btn" disabled>Delete Selected</button>
            </div>
        </form>
    </div>
</div>

<!-- Tags Table -->
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" id="master-checkbox">
                        </th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Posts Count</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tags as $tag)
                    <tr>
                        <td>
                            <input type="checkbox" name="tags[]" value="{{ $tag->id }}" class="tag-checkbox" form="bulk-form">
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border">{{ $tag->name }}</span>
                        </td>
                        <td>
                            <code>{{ $tag->slug }}</code>
                        </td>
                        <td>
                            @if($tag->published_posts_count > 0)
                            <span class="badge bg-info">{{ $tag->published_posts_count }} posts</span>
                            @else
                            <span class="text-muted">0 posts</span>
                            @endif
                        </td>
                        <td>{{ $tag->created_at->format('M j, Y') }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ $tag->url }}" class="btn btn-sm btn-outline-info" target="_blank" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.tags.show', $tag) }}" class="btn btn-sm btn-outline-secondary" title="Details">
                                    <i class="fas fa-info-circle"></i>
                                </a>
                                <a href="{{ route('admin.tags.edit', $tag) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                @if($tag->published_posts_count == 0)
                                <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Are you sure you want to delete this tag?')" title="Delete">
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
                                <i class="fas fa-tags fa-3x mb-3"></i>
                                <p>No tags found.</p>
                                <a href="{{ route('admin.tags.create') }}" class="btn btn-primary">Create Your First Tag</a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($tags->hasPages())
        <div class="d-flex justify-content-center">
            {{ $tags->appends(request()->query())->links() }}
        </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const masterCheckbox = document.getElementById('master-checkbox');
    const tagCheckboxes = document.querySelectorAll('.tag-checkbox');
    const selectAllBtn = document.getElementById('select-all');
    const bulkDeleteBtn = document.getElementById('bulk-delete-btn');
    const bulkForm = document.getElementById('bulk-form');

    function updateBulkDeleteBtn() {
        const checkedBoxes = document.querySelectorAll('.tag-checkbox:checked');
        bulkDeleteBtn.disabled = checkedBoxes.length === 0;
    }

    masterCheckbox.addEventListener('change', function() {
        tagCheckboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
        updateBulkDeleteBtn();
    });

    tagCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateBulkDeleteBtn);
    });

    selectAllBtn.addEventListener('click', function() {
        const allChecked = Array.from(tagCheckboxes).every(cb => cb.checked);
        tagCheckboxes.forEach(checkbox => {
            checkbox.checked = !allChecked;
        });
        masterCheckbox.checked = !allChecked;
        updateBulkDeleteBtn();
    });

    bulkForm.addEventListener('submit', function(e) {
        const checkedBoxes = document.querySelectorAll('.tag-checkbox:checked');
        if (checkedBoxes.length === 0) {
            e.preventDefault();
            alert('Please select at least one tag to delete.');
            return;
        }

        if (!confirm(`Are you sure you want to delete ${checkedBoxes.length} selected tag(s)?`)) {
            e.preventDefault();
        }
    });
});
</script>
@endpush
