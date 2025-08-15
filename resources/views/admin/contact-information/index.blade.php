@extends('admin.layouts.app')

@section('title', 'Contact Information Management')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="fas fa-address-card text-primary me-2"></i>
                        Contact Information Management
                    </h4>
                    <a href="{{ route('admin.contact-information.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-1"></i>
                        Add New Contact Info
                    </a>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if($contactInfos->count() > 0)
                        <div class="table-responsive">
                            <table id="contactInfoTable" class="table table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Created</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($contactInfos as $contactInfo)
                                        <tr>
                                            <td>{{ $contactInfo->id }}</td>
                                            <td>
                                                <strong>{{ $contactInfo->title }}</strong>
                                                @if($contactInfo->is_active)
                                                    <span class="badge bg-success ms-2">Active</span>
                                                @endif
                                            </td>
                                            <td>
                                                <i class="fas fa-phone text-muted me-1"></i>
                                                {{ $contactInfo->phone }}
                                            </td>
                                            <td>
                                                <i class="fas fa-envelope text-muted me-1"></i>
                                                {{ $contactInfo->email }}
                                            </td>
                                            <td>
                                                @if($contactInfo->is_active)
                                                    <span class="badge bg-success">
                                                        <i class="fas fa-check me-1"></i>Active
                                                    </span>
                                                @else
                                                    <span class="badge bg-secondary">
                                                        <i class="fas fa-times me-1"></i>Inactive
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                <small class="text-muted">
                                                    {{ $contactInfo->created_at->format('M d, Y') }}
                                                </small>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('admin.contact-information.show', $contactInfo) }}"
                                                       class="btn btn-sm btn-outline-info" title="View">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('admin.contact-information.edit', $contactInfo) }}"
                                                       class="btn btn-sm btn-outline-warning" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form method="POST"
                                                          action="{{ route('admin.contact-information.destroy', $contactInfo) }}"
                                                          style="display: inline-block;"
                                                          onsubmit="return confirm('Are you sure you want to delete this contact information?')">
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

                        <div class="d-flex justify-content-center">
                            {{ $contactInfos->links() }}
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-address-card fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">No Contact Information Found</h5>
                            <p class="text-muted mb-4">Get started by creating your first contact information entry.</p>
                            <a href="{{ route('admin.contact-information.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-1"></i>
                                Add Contact Information
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#contactInfoTable').DataTable({
            responsive: true,
            order: [[0, 'desc']],
            pageLength: 25,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search contact information...",
                lengthMenu: "Show _MENU_ entries",
                info: "Showing _START_ to _END_ of _TOTAL_ entries",
                paginate: {
                    first: "First",
                    last: "Last",
                    next: "Next",
                    previous: "Previous"
                }
            }
        });
    });
</script>
@endpush
