@extends('admin.layouts.app')

@section('title', 'Edit Industry')
@section('page-title', 'Edit Industry')

@section('page-actions')
    <a href="{{ route('admin.industries.show', $industry) }}" class="btn btn-info">
        <i class="fas fa-eye me-2"></i>View Industry
    </a>
    <a href="{{ route('admin.industries.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i>Back to Industries
    </a>
@endsection

@section('content')
    <form method="POST" action="{{ route('admin.industries.update', $industry) }}" enctype="multipart/form-data">
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
                            <div class="col-md-8">
                                <label for="name" class="form-label fw-semibold">Industry Name *</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                       id="name" name="name" value="{{ old('name', $industry->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="code" class="form-label fw-semibold">Industry Code</label>
                                <input type="text" class="form-control @error('code') is-invalid @enderror"
                                       id="code" name="code" value="{{ old('code', $industry->code) }}"
                                       placeholder="e.g., TECH, HLTH">
                                @error('code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="description" class="form-label fw-semibold">Description *</label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                          id="description" name="description" rows="4" required
                                          placeholder="Brief description of the industry...">{{ old('description', $industry->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="overview" class="form-label fw-semibold">Industry Overview</label>
                                <textarea class="form-control @error('overview') is-invalid @enderror"
                                          id="overview" name="overview" rows="6"
                                          placeholder="Detailed overview of the industry sector...">{{ old('overview', $industry->overview) }}</textarea>
                                @error('overview')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Services & Expertise -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom py-3">
                        <h5 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-cogs me-2"></i>Services & Expertise
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="services" class="form-label fw-semibold">Services Offered</label>
                                <textarea class="form-control @error('services') is-invalid @enderror"
                                          id="services" name="services" rows="6"
                                          placeholder="List the services you offer for this industry...">{{ old('services', $industry->services) }}</textarea>
                                @error('services')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="expertise" class="form-label fw-semibold">Key Expertise Areas</label>
                                <textarea class="form-control @error('expertise') is-invalid @enderror"
                                          id="expertise" name="expertise" rows="6"
                                          placeholder="Describe your key areas of expertise in this industry...">{{ old('expertise', $industry->expertise) }}</textarea>
                                @error('expertise')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Challenges & Solutions -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom py-3">
                        <h5 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-lightbulb me-2"></i>Challenges & Solutions
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="challenges" class="form-label fw-semibold">Industry Challenges</label>
                                <textarea class="form-control @error('challenges') is-invalid @enderror"
                                          id="challenges" name="challenges" rows="6"
                                          placeholder="Common challenges faced by this industry...">{{ old('challenges', $industry->challenges) }}</textarea>
                                @error('challenges')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="solutions" class="form-label fw-semibold">Our Solutions</label>
                                <textarea class="form-control @error('solutions') is-invalid @enderror"
                                          id="solutions" name="solutions" rows="6"
                                          placeholder="How we help solve industry challenges...">{{ old('solutions', $industry->solutions) }}</textarea>
                                @error('solutions')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Market Insights -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom py-3">
                        <h5 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-chart-line me-2"></i>Market Insights
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="market_trends" class="form-label fw-semibold">Market Trends</label>
                                <textarea class="form-control @error('market_trends') is-invalid @enderror"
                                          id="market_trends" name="market_trends" rows="6"
                                          placeholder="Current market trends and outlook...">{{ old('market_trends', $industry->market_trends) }}</textarea>
                                @error('market_trends')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="regulatory_updates" class="form-label fw-semibold">Regulatory Updates</label>
                                <textarea class="form-control @error('regulatory_updates') is-invalid @enderror"
                                          id="regulatory_updates" name="regulatory_updates" rows="6"
                                          placeholder="Recent regulatory changes and compliance requirements...">{{ old('regulatory_updates', $industry->regulatory_updates) }}</textarea>
                                @error('regulatory_updates')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Case Studies & Resources -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom py-3">
                        <h5 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-book me-2"></i>Case Studies & Resources
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="case_studies" class="form-label fw-semibold">Case Studies</label>
                                <textarea class="form-control @error('case_studies') is-invalid @enderror"
                                          id="case_studies" name="case_studies" rows="6"
                                          placeholder="Relevant case studies and success stories...">{{ old('case_studies', $industry->case_studies) }}</textarea>
                                @error('case_studies')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="resources" class="form-label fw-semibold">Resources & Downloads</label>
                                <textarea class="form-control @error('resources') is-invalid @enderror"
                                          id="resources" name="resources" rows="4"
                                          placeholder="Links to whitepapers, guides, and other resources...">{{ old('resources', $industry->resources) }}</textarea>
                                @error('resources')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SEO Settings -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-bottom py-3">
                        <h5 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-search me-2"></i>SEO Settings
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="meta_title" class="form-label fw-semibold">Meta Title</label>
                                <input type="text" class="form-control @error('meta_title') is-invalid @enderror"
                                       id="meta_title" name="meta_title" value="{{ old('meta_title', $industry->meta_title) }}"
                                       maxlength="60" placeholder="SEO title (60 characters max)">
                                @error('meta_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="meta_description" class="form-label fw-semibold">Meta Description</label>
                                <textarea class="form-control @error('meta_description') is-invalid @enderror"
                                          id="meta_description" name="meta_description" rows="3"
                                          maxlength="160" placeholder="SEO description (160 characters max)">{{ old('meta_description', $industry->meta_description) }}</textarea>
                                @error('meta_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="meta_keywords" class="form-label fw-semibold">Meta Keywords</label>
                                <input type="text" class="form-control @error('meta_keywords') is-invalid @enderror"
                                       id="meta_keywords" name="meta_keywords" value="{{ old('meta_keywords', $industry->meta_keywords) }}"
                                       placeholder="keyword1, keyword2, keyword3">
                                @error('meta_keywords')
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
                                <option value="draft" {{ old('status', $industry->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="active" {{ old('status', $industry->status) === 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status', $industry->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="priority" class="form-label fw-semibold">Priority</label>
                            <select class="form-select @error('priority') is-invalid @enderror" id="priority" name="priority">
                                <option value="">Select Priority</option>
                                <option value="1" {{ old('priority', $industry->priority) == 1 ? 'selected' : '' }}>High (1)</option>
                                <option value="2" {{ old('priority', $industry->priority) == 2 ? 'selected' : '' }}>Medium (2)</option>
                                <option value="3" {{ old('priority', $industry->priority) == 3 ? 'selected' : '' }}>Low (3)</option>
                            </select>
                            @error('priority')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1"
                                   {{ old('is_featured', $industry->is_featured) ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold" for="is_featured">
                                Featured Industry
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Visual Assets -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom py-3">
                        <h5 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-image me-2"></i>Visual Assets
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <!-- Current Image -->
                        @if($industry->image)
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Current Image</label>
                            <div class="text-center">
                                <img src="{{ Storage::url($industry->image) }}"
                                     alt="{{ $industry->name }}"
                                     class="img-fluid rounded shadow-sm mb-2"
                                     style="max-height: 150px;">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remove_image" name="remove_image" value="1">
                                    <label class="form-check-label small text-danger" for="remove_image">
                                        Remove current image
                                    </label>
                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- Upload New Image -->
                        <div class="mb-3">
                            <label for="image" class="form-label fw-semibold">
                                {{ $industry->image ? 'Replace Image' : 'Upload Image' }}
                            </label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror"
                                   id="image" name="image" accept="image/*">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">
                                Recommended: 800x600px, JPG/PNG, max 2MB
                            </div>
                        </div>

                        <!-- Industry Icon -->
                        <div class="mb-3">
                            <label for="icon" class="form-label fw-semibold">Icon Class</label>
                            <input type="text" class="form-control @error('icon') is-invalid @enderror"
                                   id="icon" name="icon" value="{{ old('icon', $industry->icon) }}"
                                   placeholder="fas fa-industry">
                            @error('icon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">
                                FontAwesome icon class (e.g., fas fa-industry)
                            </div>
                        </div>

                        @if($industry->icon)
                        <div class="text-center">
                            <label class="form-label fw-semibold d-block">Current Icon</label>
                            <i class="{{ $industry->icon }} fa-2x text-primary"></i>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Update Industry
                            </button>

                            <a href="{{ route('admin.industries.show', $industry) }}" class="btn btn-outline-info">
                                <i class="fas fa-eye me-2"></i>View Industry
                            </a>

                            <a href="{{ route('admin.industries.index') }}" class="btn btn-outline-secondary">
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
    // Character counters for meta fields
    function updateCounter(fieldId, maxLength) {
        const field = document.getElementById(fieldId);
        if (field) {
            const counter = document.createElement('div');
            counter.className = 'form-text text-end';
            counter.textContent = `${field.value.length}/${maxLength} characters`;
            field.parentNode.appendChild(counter);

            field.addEventListener('input', function() {
                counter.textContent = `${this.value.length}/${maxLength} characters`;
                if (this.value.length > maxLength) {
                    counter.classList.add('text-danger');
                } else {
                    counter.classList.remove('text-danger');
                }
            });
        }
    }

    // Initialize character counters
    updateCounter('meta_title', 60);
    updateCounter('meta_description', 160);

    // Auto-generate meta title from name if empty
    document.getElementById('name').addEventListener('input', function() {
        const metaTitle = document.getElementById('meta_title');
        if (!metaTitle.value) {
            metaTitle.value = this.value;
            metaTitle.dispatchEvent(new Event('input'));
        }
    });

    // Image preview
    document.getElementById('image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                let preview = document.getElementById('imagePreview');
                if (!preview) {
                    preview = document.createElement('div');
                    preview.id = 'imagePreview';
                    preview.className = 'mt-2 text-center';
                    e.target.parentNode.appendChild(preview);
                }
                preview.innerHTML = `
                    <img src="${e.target.result}" class="img-fluid rounded shadow-sm" style="max-height: 150px;">
                    <div class="form-text">Preview of new image</div>
                `;
            };
            reader.readAsDataURL(file);
        }
    });

    // Icon preview
    document.getElementById('icon').addEventListener('input', function() {
        let preview = document.getElementById('iconPreview');
        if (!preview) {
            preview = document.createElement('div');
            preview.id = 'iconPreview';
            preview.className = 'mt-2 text-center';
            this.parentNode.appendChild(preview);
        }

        if (this.value) {
            preview.innerHTML = `
                <i class="${this.value} fa-2x text-primary"></i>
                <div class="form-text">Icon preview</div>
            `;
        } else {
            preview.innerHTML = '';
        }
    });
</script>
@endpush
