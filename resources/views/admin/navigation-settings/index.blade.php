@extends('admin.layouts.app')

@section('title', 'Navigation Settings Management')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mb-2">
                <div class="page-title-box" style="display: flex; justify-content: space-between; align-items: center;">
                    <h4 class="page-title">Navigation Settings Management</h4>
                    <div class="page-title-right">
                        <button class="btn btn-info me-2" onclick="refreshCache()">
                            <i class="fas fa-sync-alt"></i> Refresh Navigation
                        </button>
                    </div>
                </div>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Current Navigation Settings</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Order</th>
                                        <th>Page</th>
                                        <th>Route</th>
                                        <th>Icon</th>
                                        <th>Description</th>
                                        <th>Tags</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($navigationSettings as $nav)
                                        <tr>
                                            <td>
                                                <span class="badge bg-secondary">{{ $nav->sort_order }}</span>
                                            </td>
                                            <td>
                                                <strong>{{ $nav->page_title }}</strong>
                                                <br>
                                                <small class="text-muted">{{ $nav->page_slug }}</small>
                                            </td>
                                            <td>
                                                <code>{{ $nav->route_name }}</code>
                                            </td>
                                            <td>
                                                <i class="{{ $nav->icon_class }} me-2"></i>
                                                <small>{{ $nav->icon_class }}</small>
                                            </td>
                                            <td>
                                                <p class="mb-0 text-truncate" style="max-width: 200px;"
                                                    title="{{ $nav->description }}">
                                                    {{ Str::limit($nav->description, 50) }}
                                                </p>
                                            </td>
                                            <td>
                                                @if ($nav->tags)
                                                    @foreach ($nav->tags_array as $tag)
                                                        <span class="badge bg-info me-1">{{ $tag }}</span>
                                                    @endforeach
                                                @else
                                                    <span class="text-muted">No tags</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($nav->is_active)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('admin.navigation-settings.edit', $nav) }}"
                                                        class="btn btn-sm btn-primary">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="text-end mt-3">
                            <small class="text-muted">
                                Last updated:
                                {{ $navigationSettings->max('updated_at') ? $navigationSettings->max('updated_at')->format('M j, Y g:i A') : 'Never' }}
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function refreshCache() {
            // You can implement cache refresh functionality here
            window.location.reload();
        }
    </script>
@endsection
