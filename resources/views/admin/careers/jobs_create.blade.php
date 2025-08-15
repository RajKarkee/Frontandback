@extends('admin.layouts.app')

@section('title', 'Create Job Opening')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0">Create Job Opening</h1>
                <a href="{{ route('admin.careers.jobs') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Back to Jobs
                </a>
            </div>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.careers.jobs.store') }}" method="POST">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Job Title</label>
                                    <input type="text" class="form-control" id="title" name="title" 
                                           value="{{ old('title') }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="department" class="form-label">Department</label>
                                    <input type="text" class="form-control" id="department" name="department" 
                                           value="{{ old('department') }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="location" class="form-label">Location</label>
                                    <input type="text" class="form-control" id="location" name="location" 
                                           value="{{ old('location') }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="type" class="form-label">Job Type</label>
                                    <select class="form-select" id="type" name="type" required>
                                        <option value="">Select Type</option>
                                        <option value="full_time" {{ old('type') == 'full_time' ? 'selected' : '' }}>Full Time</option>
                                        <option value="part_time" {{ old('type') == 'part_time' ? 'selected' : '' }}>Part Time</option>
                                        <option value="contract" {{ old('type') == 'contract' ? 'selected' : '' }}>Contract</option>
                                        <option value="internship" {{ old('type') == 'internship' ? 'selected' : '' }}>Internship</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="experience_level" class="form-label">Experience Level</label>
                                    <select class="form-select" id="experience_level" name="experience_level" required>
                                        <option value="">Select Level</option>
                                        <option value="entry" {{ old('experience_level') == 'entry' ? 'selected' : '' }}>Entry Level</option>
                                        <option value="mid" {{ old('experience_level') == 'mid' ? 'selected' : '' }}>Mid Level</option>
                                        <option value="senior" {{ old('experience_level') == 'senior' ? 'selected' : '' }}>Senior Level</option>
                                        <option value="lead" {{ old('experience_level') == 'lead' ? 'selected' : '' }}>Lead</option>
                                        <option value="executive" {{ old('experience_level') == 'executive' ? 'selected' : '' }}>Executive</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="salary_min" class="form-label">Minimum Salary</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control" id="salary_min" name="salary_min" 
                                               value="{{ old('salary_min') }}" min="0">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="salary_max" class="form-label">Maximum Salary</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control" id="salary_max" name="salary_max" 
                                               value="{{ old('salary_max') }}" min="0">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Job Description</label>
                            <textarea class="form-control" id="description" name="description" rows="6" required>{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="requirements" class="form-label">Requirements</label>
                            <textarea class="form-control" id="requirements" name="requirements" rows="4" 
                                      placeholder="Enter each requirement on a new line">{{ old('requirements') }}</textarea>
                            <small class="form-text text-muted">Enter each requirement on a new line</small>
                        </div>

                        <div class="mb-3">
                            <label for="responsibilities" class="form-label">Responsibilities</label>
                            <textarea class="form-control" id="responsibilities" name="responsibilities" rows="4" 
                                      placeholder="Enter each responsibility on a new line">{{ old('responsibilities') }}</textarea>
                            <small class="form-text text-muted">Enter each responsibility on a new line</small>
                        </div>

                        <div class="mb-3">
                            <label for="benefits" class="form-label">Benefits</label>
                            <textarea class="form-control" id="benefits" name="benefits" rows="3" 
                                      placeholder="Enter each benefit on a new line">{{ old('benefits') }}</textarea>
                            <small class="form-text text-muted">Enter each benefit on a new line</small>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="application_deadline" class="form-label">Application Deadline</label>
                                    <input type="date" class="form-control" id="application_deadline" name="application_deadline" 
                                           value="{{ old('application_deadline') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="positions_available" class="form-label">Positions Available</label>
                                    <input type="number" class="form-control" id="positions_available" name="positions_available" 
                                           value="{{ old('positions_available', 1) }}" min="1">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1" 
                                           {{ old('is_featured') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_featured">
                                        Featured Job
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" 
                                           {{ old('is_active', true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">
                                        Active
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.careers.jobs') }}" class="btn btn-secondary me-2">Cancel</a>
                            <button type="submit" class="btn btn-primary">Create Job Opening</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
