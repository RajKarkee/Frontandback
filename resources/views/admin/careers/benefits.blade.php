@extends('admin.layouts.app')

@section('title', 'Career Benefits Management')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0">Career Benefits</h1>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBenefitModal">
                    <i class="fas fa-plus me-2"></i>Add New Benefit
                </button>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Icon</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Sort Order</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($benefits as $benefit)
                                    <tr>
                                        <td>
                                            @if($benefit->icon)
                                                <div class="benefit-icon {{ $benefit->color_class }}">
                                                    {!! $benefit->icon !!}
                                                </div>
                                            @else
                                                <span class="text-muted">No icon</span>
                                            @endif
                                        </td>
                                        <td>{{ $benefit->title }}</td>
                                        <td>{{ Str::limit($benefit->description, 100) }}</td>
                                        <td>{{ $benefit->sort_order ?? '-' }}</td>
                                        <td>
                                            <form action="{{ route('admin.careers.benefits.toggle-status', $benefit) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-{{ $benefit->is_active ? 'success' : 'secondary' }}">
                                                    {{ $benefit->is_active ? 'Active' : 'Inactive' }}
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-primary"
                                                    onclick="editBenefit({{ $benefit->id }}, '{{ $benefit->title }}', '{{ $benefit->description }}', '{{ $benefit->icon }}', '{{ $benefit->color_class }}', {{ $benefit->sort_order }}, {{ $benefit->is_active ? 'true' : 'false' }})">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <form action="{{ route('admin.careers.benefits.destroy', $benefit) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                                        onclick="return confirm('Are you sure you want to delete this benefit?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted py-4">
                                            No benefits found. <a href="#" data-bs-toggle="modal" data-bs-target="#addBenefitModal">Add the first one</a>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Benefit Modal -->
<div class="modal fade" id="addBenefitModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('admin.careers.benefits.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Add New Benefit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="color_class" class="form-label">Color Class</label>
                                <input type="text" class="form-control" id="color_class" name="color_class"
                                       placeholder="e.g., text-primary, text-success">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="icon" class="form-label">Icon (SVG or HTML)</label>
                        <textarea class="form-control" id="icon" name="icon" rows="4"
                                  placeholder="Paste SVG code or HTML icon here..."></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="sort_order" class="form-label">Sort Order</label>
                                <input type="number" class="form-control" id="sort_order" name="sort_order">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="form-check mt-4">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" checked>
                                    <label class="form-check-label" for="is_active">
                                        Active
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Benefit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Benefit Modal -->
<div class="modal fade" id="editBenefitModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="editBenefitForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">Edit Benefit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit_title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="edit_title" name="title" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit_color_class" class="form-label">Color Class</label>
                                <input type="text" class="form-control" id="edit_color_class" name="color_class">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="edit_description" class="form-label">Description</label>
                        <textarea class="form-control" id="edit_description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="edit_icon" class="form-label">Icon (SVG or HTML)</label>
                        <textarea class="form-control" id="edit_icon" name="icon" rows="4"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit_sort_order" class="form-label">Sort Order</label>
                                <input type="number" class="form-control" id="edit_sort_order" name="sort_order">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="form-check mt-4">
                                    <input class="form-check-input" type="checkbox" id="edit_is_active" name="is_active" value="1">
                                    <label class="form-check-label" for="edit_is_active">
                                        Active
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Benefit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.benefit-icon {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
    background-color: #f8f9fa;
}
.benefit-icon svg {
    width: 24px;
    height: 24px;
}
</style>

<script>
function editBenefit(id, title, description, icon, colorClass, sortOrder, isActive) {
    document.getElementById('edit_title').value = title;
    document.getElementById('edit_description').value = description;
    document.getElementById('edit_icon').value = icon;
    document.getElementById('edit_color_class').value = colorClass;
    document.getElementById('edit_sort_order').value = sortOrder;
    document.getElementById('edit_is_active').checked = isActive;

    document.getElementById('editBenefitForm').action = '/admin/careers/benefits/' + id;

    const editModal = new bootstrap.Modal(document.getElementById('editBenefitModal'));
    editModal.show();
}
</script>
@endsection
