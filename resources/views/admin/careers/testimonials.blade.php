@extends('admin.layouts.app')

@section('title', 'Career Testimonials Management')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0">Employee Testimonials</h1>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTestimonialModal">
                    <i class="fas fa-plus me-2"></i>Add New Testimonial
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
                                    <th>Photo</th>
                                    <th>Employee</th>
                                    <th>Position</th>
                                    <th>Testimonial</th>
                                    <th>Rating</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($testimonials as $testimonial)
                                    <tr>
                                        <td>
                                            @if($testimonial->photo)
                                                <img src="{{ asset('storage/' . $testimonial->photo) }}" 
                                                     alt="{{ $testimonial->employee_name }}" 
                                                     class="rounded-circle" width="50" height="50">
                                            @else
                                                <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center" 
                                                     style="width: 50px; height: 50px;">
                                                    <i class="fas fa-user text-white"></i>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <strong>{{ $testimonial->employee_name }}</strong>
                                        </td>
                                        <td>{{ $testimonial->position }}</td>
                                        <td>{{ Str::limit($testimonial->testimonial, 100) }}</td>
                                        <td>
                                            <div class="d-flex">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <i class="fas fa-star {{ $i <= $testimonial->rating ? 'text-warning' : 'text-muted' }}"></i>
                                                @endfor
                                            </div>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.careers.testimonials.toggle-status', $testimonial) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-{{ $testimonial->is_active ? 'success' : 'secondary' }}">
                                                    {{ $testimonial->is_active ? 'Active' : 'Inactive' }}
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-primary" 
                                                    onclick="editTestimonial({{ $testimonial->id }}, '{{ $testimonial->employee_name }}', '{{ $testimonial->position }}', '{{ addslashes($testimonial->testimonial) }}', {{ $testimonial->rating }}, {{ $testimonial->is_active ? 'true' : 'false' }})">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <form action="{{ route('admin.careers.testimonials.destroy', $testimonial) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" 
                                                        onclick="return confirm('Are you sure you want to delete this testimonial?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted py-4">
                                            No testimonials found. <a href="#" data-bs-toggle="modal" data-bs-target="#addTestimonialModal">Add the first one</a>
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

<!-- Add Testimonial Modal -->
<div class="modal fade" id="addTestimonialModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('admin.careers.testimonials.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Add New Testimonial</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="employee_name" class="form-label">Employee Name</label>
                                <input type="text" class="form-control" id="employee_name" name="employee_name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="position" class="form-label">Position</label>
                                <input type="text" class="form-control" id="position" name="position" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="testimonial" class="form-label">Testimonial</label>
                        <textarea class="form-control" id="testimonial" name="testimonial" rows="4" required></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="rating" class="form-label">Rating</label>
                                <select class="form-select" id="rating" name="rating" required>
                                    <option value="">Select Rating</option>
                                    <option value="1">1 Star</option>
                                    <option value="2">2 Stars</option>
                                    <option value="3">3 Stars</option>
                                    <option value="4">4 Stars</option>
                                    <option value="5">5 Stars</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="photo" class="form-label">Employee Photo</label>
                                <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
                            </div>
                        </div>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" checked>
                        <label class="form-check-label" for="is_active">
                            Active
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Testimonial</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Testimonial Modal -->
<div class="modal fade" id="editTestimonialModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="editTestimonialForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">Edit Testimonial</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit_employee_name" class="form-label">Employee Name</label>
                                <input type="text" class="form-control" id="edit_employee_name" name="employee_name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit_position" class="form-label">Position</label>
                                <input type="text" class="form-control" id="edit_position" name="position" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="edit_testimonial" class="form-label">Testimonial</label>
                        <textarea class="form-control" id="edit_testimonial" name="testimonial" rows="4" required></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit_rating" class="form-label">Rating</label>
                                <select class="form-select" id="edit_rating" name="rating" required>
                                    <option value="1">1 Star</option>
                                    <option value="2">2 Stars</option>
                                    <option value="3">3 Stars</option>
                                    <option value="4">4 Stars</option>
                                    <option value="5">5 Stars</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit_photo" class="form-label">Employee Photo</label>
                                <input type="file" class="form-control" id="edit_photo" name="photo" accept="image/*">
                                <small class="form-text text-muted">Leave empty to keep current photo</small>
                            </div>
                        </div>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="edit_is_active" name="is_active" value="1">
                        <label class="form-check-label" for="edit_is_active">
                            Active
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Testimonial</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function editTestimonial(id, employeeName, position, testimonial, rating, isActive) {
    document.getElementById('edit_employee_name').value = employeeName;
    document.getElementById('edit_position').value = position;
    document.getElementById('edit_testimonial').value = testimonial;
    document.getElementById('edit_rating').value = rating;
    document.getElementById('edit_is_active').checked = isActive;
    
    document.getElementById('editTestimonialForm').action = '/admin/careers/testimonials/' + id;
    
    const editModal = new bootstrap.Modal(document.getElementById('editTestimonialModal'));
    editModal.show();
}
</script>
@endsection
