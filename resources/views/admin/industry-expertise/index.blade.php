@extends('admin.layouts.app')

@section('title', 'Industry Expertise Management')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 text-gray-800">Industry Expertise</h1>
                <a href="{{ route('admin.industry-expertise.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add New Expertise
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Expertise List</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Order</th>
                                    <th>Title</th>
                                    <th>Icon</th>
                                    <th>Status</th>
                                    <th>Featured</th>
                                    <th>Color Theme</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($expertises as $expertise)
                                <tr>
                                    <td>{{ $expertise->sort_order }}</td>
                                    <td>
                                        <strong>{{ $expertise->title }}</strong>
                                        <br>
                                        <small class="text-muted">{{ Str::limit($expertise->description, 50) }}</small>
                                    </td>
                                    <td>
                                        @if($expertise->svg_icon)
                                            <div class="d-flex align-items-center">
                                                <div style="width: 24px; height: 24px; color: {{ $expertise->color_theme ?? '#007bff' }};">
                                                    {!! $expertise->svg_icon !!}
                                                </div>
                                                @if($expertise->icon_class)
                                                    <i class="{{ $expertise->icon_class }} ms-2"></i>
                                                @endif
                                            </div>
                                        @elseif($expertise->icon_class)
                                            <i class="{{ $expertise->icon_class }}"></i>
                                        @else
                                            <span class="text-muted">No icon</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $expertise->status === 'active' ? 'success' : 'secondary' }}">
                                            {{ ucfirst($expertise->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $expertise->is_featured ? 'primary' : 'light text-dark' }}">
                                            {{ $expertise->is_featured ? 'Featured' : 'Normal' }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($expertise->color_theme)
                                            <span class="d-inline-block" style="width: 20px; height: 20px; background-color: {{ $expertise->color_theme }}; border-radius: 3px;"></span>
                                            <small class="ms-1">{{ $expertise->color_theme }}</small>
                                        @else
                                            <span class="text-muted">Default</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.industry-expertise.show', $expertise->id) }}"
                                               class="btn btn-sm btn-info" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.industry-expertise.edit', $expertise->id) }}"
                                               class="btn btn-sm btn-warning" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.industry-expertise.destroy', $expertise->id) }}"
                                                  method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this expertise?')"
                                                        title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4">
                                        <div class="text-muted">
                                            <i class="fas fa-inbox fa-2x mb-2"></i>
                                            <p>No expertise items found. <a href="{{ route('admin.industry-expertise.create') }}">Create your first one</a></p>
                                        </div>
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
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#dataTable').DataTable({
        "order": [[ 0, "asc" ]], // Sort by order column
        "pageLength": 25
    });
});
</script>
@endpush
