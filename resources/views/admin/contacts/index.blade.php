@extends('admin.layouts.app')

@section('title', 'Contacts')
@section('page-title', 'Contact Messages')

@section('content')
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center flex-wrap">
            <h5 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-envelope me-2"></i>All Contact Messages
            </h5>
            <div class="d-flex gap-2 flex-wrap">
                <span class="badge bg-danger">{{ $contacts->where('status', 'new')->count() }} New</span>
                <span class="badge bg-warning">{{ $contacts->where('status', 'read')->count() }} Read</span>
                <span class="badge bg-success">{{ $contacts->where('status', 'replied')->count() }} Replied</span>
            </div>
        </div>
        <div class="card-body p-0">
            <!-- Mobile-friendly responsive table -->
            <div class="table-responsive">
                <table class="table table-hover data-table mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="px-4 py-3">Contact</th>
                            <th class="px-4 py-3 d-none d-md-table-cell">Subject</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3 d-none d-lg-table-cell">Date</th>
                            <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $contact)
                            <tr class="{{ $contact->status === 'new' ? 'table-warning' : '' }}">
                                <td class="px-4 py-3">
                                    <div class="d-flex flex-column">
                                        <strong class="text-dark">{{ $contact->name }}</strong>
                                        <small class="text-muted">
                                            <i class="fas fa-envelope me-1"></i>{{ $contact->email }}
                                        </small>
                                        <!-- Show date on mobile -->
                                        <small class="text-muted d-lg-none">
                                            <i class="fas fa-clock me-1"></i>{{ $contact->created_at->format('M j, Y H:i') }}
                                        </small>
                                    </div>
                                </td>

                                <!-- Subject - hidden on small screens -->
                                <td class="px-4 py-3 d-none d-md-table-cell">
                                    <span class="text-muted">{{ Str::limit($contact->subject, 40) }}</span>
                                    <!-- Show subject on medium screens but not mobile -->
                                    <div class="d-md-none mt-1">
                                        <small class="text-muted">{{ Str::limit($contact->subject, 30) }}</small>
                                    </div>
                                </td>

                                <td class="px-4 py-3">
                                    <span class="badge bg-{{ $contact->status === 'new' ? 'danger' : ($contact->status === 'read' ? 'warning' : 'success') }} px-2 py-1">
                                        {{ ucfirst($contact->status) }}
                                    </span>
                                </td>

                                <!-- Date - hidden on mobile -->
                                <td class="px-4 py-3 d-none d-lg-table-cell">
                                    <span class="text-muted">
                                        <i class="fas fa-clock me-1"></i>{{ $contact->created_at->format('M j, Y H:i') }}
                                    </span>
                                </td>

                                <td class="px-4 py-3">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.contacts.show', $contact) }}"
                                           class="btn btn-sm btn-outline-primary"
                                           title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <a href="{{ route('admin.contacts.edit', $contact) }}"
                                           class="btn btn-sm btn-outline-warning"
                                           title="Edit Status">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form method="POST" action="{{ route('admin.contacts.destroy', $contact) }}"
                                              style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="btn btn-sm btn-outline-danger"
                                                    title="Delete Contact"
                                                    onclick="return confirmDelete('Are you sure you want to delete this contact?')">
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

            @if($contacts->isEmpty())
                <div class="text-center py-5">
                    <i class="fas fa-envelope-open fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">No contact messages yet</h5>
                    <p class="text-muted">Contact messages will appear here when submitted.</p>
                </div>
            @endif
        </div>
    </div>
@endsection
