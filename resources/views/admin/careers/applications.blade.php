@extends('admin.layouts.app')

@section('title', 'Job Applications Management')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0">Job Applications</h1>
                <div class="d-flex gap-2">
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            Filter by Status
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('admin.careers.applications') }}">All Applications</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.careers.applications') }}?status=pending">Pending</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.careers.applications') }}?status=reviewing">Reviewing</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.careers.applications') }}?status=interviewed">Interviewed</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.careers.applications') }}?status=accepted">Accepted</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.careers.applications') }}?status=rejected">Rejected</a></li>
                        </ul>
                    </div>
                </div>
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
                                    <th>Applicant</th>
                                    <th>Job Position</th>
                                    <th>Applied Date</th>
                                    <th>Status</th>
                                    <th>Resume</th>
                                    <th>Cover Letter</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($applications as $application)
                                    <tr>
                                        <td>
                                            <div>
                                                <strong>{{ $application->first_name }} {{ $application->last_name }}</strong>
                                                <br>
                                                <small class="text-muted">{{ $application->email }}</small>
                                                <br>
                                                <small class="text-muted">{{ $application->phone }}</small>
                                            </div>
                                        </td>
                                        <td>
                                            <strong>{{ $application->jobOpening->title }}</strong>
                                            <br>
                                            <small class="text-muted">{{ $application->jobOpening->department }}</small>
                                        </td>
                                        <td>{{ $application->created_at->format('M d, Y') }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-{{ $application->status_color }} dropdown-toggle" 
                                                        type="button" data-bs-toggle="dropdown">
                                                    {{ ucfirst($application->status) }}
                                                </button>
                                                <ul class="dropdown-menu">
                                                    @foreach(['pending', 'reviewing', 'interviewed', 'accepted', 'rejected'] as $status)
                                                        <li>
                                                            <form action="{{ route('admin.careers.applications.update-status', $application) }}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="status" value="{{ $status }}">
                                                                <button type="submit" class="dropdown-item">
                                                                    {{ ucfirst($status) }}
                                                                </button>
                                                            </form>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </td>
                                        <td>
                                            @if($application->resume_path)
                                                <a href="{{ asset('storage/' . $application->resume_path) }}" 
                                                   class="btn btn-sm btn-outline-primary" target="_blank">
                                                    <i class="fas fa-file-pdf"></i> View Resume
                                                </a>
                                            @else
                                                <span class="text-muted">No resume</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($application->cover_letter)
                                                <button type="button" class="btn btn-sm btn-outline-info" 
                                                        onclick="showCoverLetter('{{ addslashes($application->cover_letter) }}')">
                                                    <i class="fas fa-eye"></i> View Letter
                                                </button>
                                            @else
                                                <span class="text-muted">No cover letter</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-primary" 
                                                    onclick="showApplicationDetails({{ $application->id }})">
                                                <i class="fas fa-eye"></i> View Details
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted py-4">
                                            No applications found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if($applications->hasPages())
                        <div class="d-flex justify-content-center mt-3">
                            {{ $applications->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Application Details Modal -->
<div class="modal fade" id="applicationDetailsModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Application Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="applicationDetailsContent">
                <!-- Content will be loaded here -->
            </div>
        </div>
    </div>
</div>

<!-- Cover Letter Modal -->
<div class="modal fade" id="coverLetterModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cover Letter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="coverLetterContent" style="white-space: pre-wrap;"></div>
            </div>
        </div>
    </div>
</div>

<script>
function showCoverLetter(coverLetter) {
    document.getElementById('coverLetterContent').textContent = coverLetter;
    const modal = new bootstrap.Modal(document.getElementById('coverLetterModal'));
    modal.show();
}

function showApplicationDetails(applicationId) {
    // You can implement an AJAX call here to load detailed application data
    // For now, we'll redirect to a show route if needed
    fetch(`/admin/careers/applications/${applicationId}`)
        .then(response => response.text())
        .then(html => {
            document.getElementById('applicationDetailsContent').innerHTML = html;
            const modal = new bootstrap.Modal(document.getElementById('applicationDetailsModal'));
            modal.show();
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Failed to load application details');
        });
}
</script>
@endsection
