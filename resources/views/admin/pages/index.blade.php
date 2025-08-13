@extends('admin.layouts.app')

@section('title', 'Pages')
@section('page-title', 'Pages Management')

@section('page-actions')
    <a href="{{ route('admin.pages.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Add New Page
    </a>
@endsection

@section('content')
    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Pages</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pages as $page)
                            <tr>
                                <td>{{ $page->id }}</td>
                                <td>{{ $page->title }}</td>
                                <td>
                                    <code>{{ $page->slug }}</code>
                                </td>
                                <td>
                                    <span class="badge bg-{{ $page->status === 'active' ? 'success' : 'secondary' }}">
                                        {{ ucfirst($page->status) }}
                                    </span>
                                </td>
                                <td>{{ $page->created_at->format('M j, Y') }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.pages.show', $page) }}" class="btn btn-sm btn-info" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-sm btn-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form method="POST" action="{{ route('admin.pages.destroy', $page) }}" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Delete"
                                                    onclick="return confirmDelete('Are you sure you want to delete this page?')">
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
        </div>
    </div>
@endsection
