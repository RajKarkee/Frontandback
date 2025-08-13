@extends('admin.layouts.app')

@section('title', 'Edit Career Position')
@section('page-title', 'Edit Career Position')

@section('page-actions')
    <a href="{{ route('admin.careers.show', $career) }}" class="btn btn-info">
        <i class="fas fa-eye me-2"></i>View Position
    </a>
    <a href="{{ route('admin.careers.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i>Back to Careers
    </a>
@endsection

@section('content')
    <form method="POST" action="{{ route('admin.careers.update', $career) }}">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-lg-8">
                <!-- Basic Information -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom py-3">
                        <h5 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-info-circle me-2"></i>Basic Information
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="title" class="form-label fw-semibold">Job Title *</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                       id="title" name="title" value="{{ old('title', $career->title) }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="department" class="form-label fw-semibold">Department *</label>
                                <select class="form-select @error('department') is-invalid @enderror" id="department" name="department" required>
                                    <option value="">Select Department</option>
                                    <option value="audit-assurance" {{ old('department', $career->department) === 'audit-assurance' ? 'selected' : '' }}>Audit & Assurance</option>
                                    <option value="tax-advisory" {{ old('department', $career->department) === 'tax-advisory' ? 'selected' : '' }}>Tax Advisory</option>
                                    <option value="risk-advisory" {{ old('department', $career->department) === 'risk-advisory' ? 'selected' : '' }}>Risk Advisory</option>
                                    <option value="business-consulting" {{ old('department', $career->department) === 'business-consulting' ? 'selected' : '' }}>Business Consulting</option>
                                    <option value="technology" {{ old('department', $career->department) === 'technology' ? 'selected' : '' }}>Technology</option>
                                    <option value="human-resources" {{ old('department', $career->department) === 'human-resources' ? 'selected' : '' }}>Human Resources</option>
                                    <option value="administration" {{ old('department', $career->department) === 'administration' ? 'selected' : '' }}>Administration</option>
                                    <option value="finance" {{ old('department', $career->department) === 'finance' ? 'selected' : '' }}>Finance</option>
                                </select>
                                @error('department')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="location" class="form-label fw-semibold">Location *</label>
                                <input type="text" class="form-control @error('location') is-invalid @enderror"
                                       id="location" name="location" value="{{ old('location', $career->location) }}" required>
                                @error('location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="employment_type" class="form-label fw-semibold">Employment Type *</label>
                                <select class="form-select @error('employment_type') is-invalid @enderror" id="employment_type" name="employment_type" required>
                                    <option value="">Select Type</option>
                                    <option value="full-time" {{ old('employment_type', $career->employment_type) === 'full-time' ? 'selected' : '' }}>Full-time</option>
                                    <option value="part-time" {{ old('employment_type', $career->employment_type) === 'part-time' ? 'selected' : '' }}>Part-time</option>
                                    <option value="contract" {{ old('employment_type', $career->employment_type) === 'contract' ? 'selected' : '' }}>Contract</option>
                                    <option value="internship" {{ old('employment_type', $career->employment_type) === 'internship' ? 'selected' : '' }}>Internship</option>
                                    <option value="freelance" {{ old('employment_type', $career->employment_type) === 'freelance' ? 'selected' : '' }}>Freelance</option>
                                </select>
                                @error('employment_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="experience_level" class="form-label fw-semibold">Experience Level</label>
                                <select class="form-select @error('experience_level') is-invalid @enderror" id="experience_level" name="experience_level">
                                    <option value="">Select Level</option>
                                    <option value="entry-level" {{ old('experience_level', $career->experience_level) === 'entry-level' ? 'selected' : '' }}>Entry Level</option>
                                    <option value="junior" {{ old('experience_level', $career->experience_level) === 'junior' ? 'selected' : '' }}>Junior</option>
                                    <option value="mid-level" {{ old('experience_level', $career->experience_level) === 'mid-level' ? 'selected' : '' }}>Mid Level</option>
                                    <option value="senior" {{ old('experience_level', $career->experience_level) === 'senior' ? 'selected' : '' }}>Senior</option>
                                    <option value="lead" {{ old('experience_level', $career->experience_level) === 'lead' ? 'selected' : '' }}>Lead</option>
                                    <option value="manager" {{ old('experience_level', $career->experience_level) === 'manager' ? 'selected' : '' }}>Manager</option>
                                    <option value="director" {{ old('experience_level', $career->experience_level) === 'director' ? 'selected' : '' }}>Director</option>
                                </select>
                                @error('experience_level')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="salary_range" class="form-label fw-semibold">Salary Range</label>
                                <input type="text" class="form-control @error('salary_range') is-invalid @enderror"
                                       id="salary_range" name="salary_range" value="{{ old('salary_range', $career->salary_range) }}"
                                       placeholder="e.g., $50,000 - $70,000">
                                @error('salary_range')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="application_deadline" class="form-label fw-semibold">Application Deadline</label>
                                <input type="date" class="form-control @error('application_deadline') is-invalid @enderror"
                                       id="application_deadline" name="application_deadline"
                                       value="{{ old('application_deadline', $career->application_deadline ? $career->application_deadline->format('Y-m-d') : '') }}">
                                @error('application_deadline')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="description" class="form-label fw-semibold">Job Description *</label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                          id="description" name="description" rows="6" required
                                          placeholder="Describe the role and position overview...">{{ old('description', $career->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Job Details -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom py-3">
                        <h5 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-tasks me-2"></i>Job Details
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="requirements" class="form-label fw-semibold">Requirements *</label>
                                <textarea class="form-control @error('requirements') is-invalid @enderror"
                                          id="requirements" name="requirements" rows="6" required
                                          placeholder="List the required qualifications, skills, and experience...">{{ old('requirements', $career->requirements) }}</textarea>
                                @error('requirements')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="responsibilities" class="form-label fw-semibold">Key Responsibilities</label>
                                <textarea class="form-control @error('responsibilities') is-invalid @enderror"
                                          id="responsibilities" name="responsibilities" rows="6"
                                          placeholder="Outline the main duties and responsibilities...">{{ old('responsibilities', $career->responsibilities) }}</textarea>
                                @error('responsibilities')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="qualifications" class="form-label fw-semibold">Preferred Qualifications</label>
                                <textarea class="form-control @error('qualifications') is-invalid @enderror"
                                          id="qualifications" name="qualifications" rows="4"
                                          placeholder="List any additional qualifications that would be beneficial...">{{ old('qualifications', $career->qualifications) }}</textarea>
                                @error('qualifications')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="benefits" class="form-label fw-semibold">Benefits & Perks</label>
                                <textarea class="form-control @error('benefits') is-invalid @enderror"
                                          id="benefits" name="benefits" rows="4"
                                          placeholder="Describe the benefits package and perks...">{{ old('benefits', $career->benefits) }}</textarea>
                                @error('benefits')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Application Information -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom py-3">
                        <h5 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-paper-plane me-2"></i>Application Information
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="application_email" class="form-label fw-semibold">Application Email</label>
                                <input type="email" class="form-control @error('application_email') is-invalid @enderror"
                                       id="application_email" name="application_email"
                                       value="{{ old('application_email', $career->application_email) }}"
                                       placeholder="careers@company.com">
                                @error('application_email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="application_url" class="form-label fw-semibold">Application URL</label>
                                <input type="url" class="form-control @error('application_url') is-invalid @enderror"
                                       id="application_url" name="application_url"
                                       value="{{ old('application_url', $career->application_url) }}"
                                       placeholder="https://apply.company.com">
                                @error('application_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <!-- Publishing Options -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom py-3">
                        <h5 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-cog me-2"></i>Publishing Options
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <label for="status" class="form-label fw-semibold">Status *</label>
                            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                <option value="draft" {{ old('status', $career->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="active" {{ old('status', $career->status) === 'active' ? 'selected' : '' }}>Active</option>
                                <option value="closed" {{ old('status', $career->status) === 'closed' ? 'selected' : '' }}>Closed</option>
                                <option value="filled" {{ old('status', $career->status) === 'filled' ? 'selected' : '' }}>Filled</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1"
                                   {{ old('is_featured', $career->is_featured) ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold" for="is_featured">
                                Featured Position
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remote_work_available" name="remote_work_available" value="1"
                                   {{ old('remote_work_available', $career->remote_work_available) ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold" for="remote_work_available">
                                Remote Work Available
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Update Position
                            </button>

                            <a href="{{ route('admin.careers.show', $career) }}" class="btn btn-outline-info">
                                <i class="fas fa-eye me-2"></i>View Position
                            </a>

                            <a href="{{ route('admin.careers.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-times me-2"></i>Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
<script>
    // Auto-set application deadline
    document.getElementById('status').addEventListener('change', function() {
        const deadlineField = document.getElementById('application_deadline');
        if (this.value === 'active' && !deadlineField.value) {
            // Set deadline to 30 days from now
            const date = new Date();
            date.setDate(date.getDate() + 30);
            deadlineField.value = date.toISOString().split('T')[0];
        }
    });

    // Character counter for textareas
    const textareas = ['description', 'requirements', 'responsibilities', 'qualifications', 'benefits'];
    textareas.forEach(id => {
        const textarea = document.getElementById(id);
        if (textarea) {
            const counter = document.createElement('div');
            counter.className = 'form-text text-end';
            counter.textContent = `${textarea.value.length} characters`;
            textarea.parentNode.appendChild(counter);

            textarea.addEventListener('input', function() {
                counter.textContent = `${this.value.length} characters`;
            });
        }
    });

    // Validate application deadline
    document.getElementById('application_deadline').addEventListener('change', function() {
        const today = new Date().toISOString().split('T')[0];
        if (this.value && this.value < today) {
            alert('Application deadline should be in the future.');
            this.value = '';
        }
    });
</script>
@endpush
