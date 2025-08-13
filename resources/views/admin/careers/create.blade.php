@extends('admin.layouts.app')

@section('title', 'Create Career')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{ route('admin.careers.index') }}">Careers</a></li>
<li class="breadcrumb-item active">Create Career</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Create New Career</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.careers.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="title" class="form-label">Job Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                       id="title" name="title" value="{{ old('title') }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                       id="slug" name="slug" value="{{ old('slug') }}">
                                <div class="form-text">Leave empty to auto-generate from title</div>
                                @error('slug')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="summary" class="form-label">Job Summary <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('summary') is-invalid @enderror"
                                          id="summary" name="summary" rows="4" required>{{ old('summary') }}</textarea>
                                @error('summary')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Job Description <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                          id="description" name="description" rows="8" required>{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="requirements" class="form-label">Requirements</label>
                                <textarea class="form-control @error('requirements') is-invalid @enderror"
                                          id="requirements" name="requirements" rows="6">{{ old('requirements') }}</textarea>
                                <div class="form-text">List key requirements and qualifications</div>
                                @error('requirements')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="responsibilities" class="form-label">Responsibilities</label>
                                <textarea class="form-control @error('responsibilities') is-invalid @enderror"
                                          id="responsibilities" name="responsibilities" rows="6">{{ old('responsibilities') }}</textarea>
                                <div class="form-text">List main job responsibilities</div>
                                @error('responsibilities')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="benefits" class="form-label">Benefits</label>
                                <textarea class="form-control @error('benefits') is-invalid @enderror"
                                          id="benefits" name="benefits" rows="4">{{ old('benefits') }}</textarea>
                                @error('benefits')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                                    <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                                    <option value="active" {{ old('status') === 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="closed" {{ old('status') === 'closed' ? 'selected' : '' }}>Closed</option>
                                    <option value="paused" {{ old('status') === 'paused' ? 'selected' : '' }}>Paused</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="department" class="form-label">Department</label>
                                <input type="text" class="form-control @error('department') is-invalid @enderror"
                                       id="department" name="department" value="{{ old('department') }}">
                                @error('department')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="employment_type" class="form-label">Employment Type</label>
                                <select class="form-select @error('employment_type') is-invalid @enderror" id="employment_type" name="employment_type">
                                    <option value="">Select Type</option>
                                    <option value="full-time" {{ old('employment_type') === 'full-time' ? 'selected' : '' }}>Full-time</option>
                                    <option value="part-time" {{ old('employment_type') === 'part-time' ? 'selected' : '' }}>Part-time</option>
                                    <option value="contract" {{ old('employment_type') === 'contract' ? 'selected' : '' }}>Contract</option>
                                    <option value="freelance" {{ old('employment_type') === 'freelance' ? 'selected' : '' }}>Freelance</option>
                                    <option value="internship" {{ old('employment_type') === 'internship' ? 'selected' : '' }}>Internship</option>
                                </select>
                                @error('employment_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="experience_level" class="form-label">Experience Level</label>
                                <select class="form-select @error('experience_level') is-invalid @enderror" id="experience_level" name="experience_level">
                                    <option value="">Select Level</option>
                                    <option value="entry" {{ old('experience_level') === 'entry' ? 'selected' : '' }}>Entry Level</option>
                                    <option value="mid" {{ old('experience_level') === 'mid' ? 'selected' : '' }}>Mid Level</option>
                                    <option value="senior" {{ old('experience_level') === 'senior' ? 'selected' : '' }}>Senior Level</option>
                                    <option value="executive" {{ old('experience_level') === 'executive' ? 'selected' : '' }}>Executive</option>
                                </select>
                                @error('experience_level')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" class="form-control @error('location') is-invalid @enderror"
                                       id="location" name="location" value="{{ old('location') }}">
                                @error('location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="salary_range" class="form-label">Salary Range</label>
                                <input type="text" class="form-control @error('salary_range') is-invalid @enderror"
                                       id="salary_range" name="salary_range" value="{{ old('salary_range') }}" placeholder="e.g., $50,000 - $70,000">
                                @error('salary_range')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="application_deadline" class="form-label">Application Deadline</label>
                                <input type="date" class="form-control @error('application_deadline') is-invalid @enderror"
                                       id="application_deadline" name="application_deadline" value="{{ old('application_deadline') }}">
                                @error('application_deadline')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="application_url" class="form-label">Application URL</label>
                                <input type="url" class="form-control @error('application_url') is-invalid @enderror"
                                       id="application_url" name="application_url" value="{{ old('application_url') }}">
                                @error('application_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_featured"
                                           name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_featured">
                                        Featured Job
                                    </label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_remote"
                                           name="is_remote" value="1" {{ old('is_remote') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_remote">
                                        Remote Work Available
                                    </label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="meta_title" class="form-label">Meta Title</label>
                                <input type="text" class="form-control @error('meta_title') is-invalid @enderror"
                                       id="meta_title" name="meta_title" value="{{ old('meta_title') }}">
                                @error('meta_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="meta_description" class="form-label">Meta Description</label>
                                <textarea class="form-control @error('meta_description') is-invalid @enderror"
                                          id="meta_description" name="meta_description" rows="3">{{ old('meta_description') }}</textarea>
                                @error('meta_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <hr>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.careers.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Back to Careers
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Create Career
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// Auto-generate slug from title
document.getElementById('title').addEventListener('input', function() {
    const title = this.value;
    const slug = title.toLowerCase()
        .replace(/[^a-z0-9 -]/g, '')
        .replace(/\s+/g, '-')
        .replace(/-+/g, '-')
        .trim('-');
    document.getElementById('slug').value = slug;
});
</script>
@endpush
