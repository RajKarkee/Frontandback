@extends('admin.layouts.app')

@section('title', 'Team Members')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Team Members</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">All Team Members</h5>
                    <a href="{{ route('admin.teams.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add New Team Member
                    </a>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped" id="teamsTable">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Email</th>
                                    <th>Sort Order</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teams as $team)
                                    <tr>
                                        <td>
                                            @if ($team->image)
                                                <img src="{{ Storage::url($team->image) }}" alt="{{ $team->name }}"
                                                    class="rounded-circle"
                                                    style="width: 50px; height: 50px; object-fit: cover;">
                                            @else
                                                <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center"
                                                    style="width: 50px; height: 50px;">
                                                    <i class="fas fa-user text-white"></i>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <div>
                                                <strong>{{ $team->name }}</strong>
                                                <br>
                                                <small class="text-muted">{{ Str::limit($team->bio, 50) }}</small>
                                            </div>
                                        </td>
                                        <td>{{ $team->position }}</td>
                                        <td>{{ $team->email ?? 'N/A' }}</td>
                                        <td>
                                            <span class="badge bg-info">{{ $team->sort_order }}</span>
                                        </td>
                                        <td>
                                            @if ($team->is_active)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-secondary">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.teams.show', $team) }}"
                                                    class="btn btn-sm btn-outline-info" title="View">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.teams.edit', $team) }}"
                                                    class="btn btn-sm btn-outline-primary" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.teams.destroy', $team) }}" method="POST"
                                                    style="display: inline-block;"
                                                    onsubmit="return confirm('Are you sure you want to delete this team member?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                                        title="Delete">
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

                    <!-- Pagination -->
                    @if ($teams->hasPages())
                        <div class="d-flex justify-content-center mt-4">
                            {{ $teams->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#teamsTable').DataTable({
                responsive: true,
                order: [
                    [4, 'asc']
                ], // Sort by sort_order by default
                columnDefs: [{
                        orderable: false,
                        targets: [0, 6]
                    } // Disable sorting for image and actions columns
                ]
            });
        });
    </script>
@endpush
