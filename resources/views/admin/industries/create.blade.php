@extends('admin.layouts.app')

@section('title', 'Create Industry')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{ route('admin.industries.index') }}">Industries</a></li>
<li class="breadcrumb-item active">Create Industry</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Create New Industry</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.industries.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="title" class="form-label">Industry Title <span class="text-danger">*</span></label>
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
                                <label for="description" class="form-label">Industry Description <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                          id="description" name="description" rows="8" required>{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="overview" class="form-label">Industry Overview</label>
                                <textarea class="form-control @error('overview') is-invalid @enderror"
                                          id="overview" name="overview" rows="6">{{ old('overview') }}</textarea>
                                <div class="form-text">Brief overview for previews and summaries</div>
                                @error('overview')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="challenges" class="form-label">Industry Challenges</label>
                                <textarea class="form-control @error('challenges') is-invalid @enderror"
                                          id="challenges" name="challenges" rows="6">{{ old('challenges') }}</textarea>
                                <div class="form-text">Key challenges faced by this industry</div>
                                @error('challenges')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="solutions" class="form-label">Our Solutions</label>
                                <textarea class="form-control @error('solutions') is-invalid @enderror"
                                          id="solutions" name="solutions" rows="6">{{ old('solutions') }}</textarea>
                                <div class="form-text">How we help solve industry challenges</div>
                                @error('solutions')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="case_studies" class="form-label">Case Studies</label>
                                <textarea class="form-control @error('case_studies') is-invalid @enderror"
                                          id="case_studies" name="case_studies" rows="6">{{ old('case_studies') }}</textarea>
                                <div class="form-text">Relevant case studies and success stories</div>
                                @error('case_studies')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="key_services" class="form-label">Key Services</label>
                                <textarea class="form-control @error('key_services') is-invalid @enderror"
                                          id="key_services" name="key_services" rows="4">{{ old('key_services') }}</textarea>
                                <div class="form-text">Main services offered for this industry</div>
                                @error('key_services')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                                    <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                                    <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>Published</option>
                                    <option value="archived" {{ old('status') === 'archived' ? 'selected' : '' }}>Archived</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label">Industry Category</label>
                                <select class="form-select @error('category') is-invalid @enderror" id="category" name="category">
                                    <option value="">Select Category</option>
                                    <option value="technology" {{ old('category') === 'technology' ? 'selected' : '' }}>Technology</option>
                                    <option value="healthcare" {{ old('category') === 'healthcare' ? 'selected' : '' }}>Healthcare</option>
                                    <option value="finance" {{ old('category') === 'finance' ? 'selected' : '' }}>Finance</option>
                                    <option value="manufacturing" {{ old('category') === 'manufacturing' ? 'selected' : '' }}>Manufacturing</option>
                                    <option value="retail" {{ old('category') === 'retail' ? 'selected' : '' }}>Retail</option>
                                    <option value="education" {{ old('category') === 'education' ? 'selected' : '' }}>Education</option>
                                    <option value="energy" {{ old('category') === 'energy' ? 'selected' : '' }}>Energy</option>
                                    <option value="automotive" {{ old('category') === 'automotive' ? 'selected' : '' }}>Automotive</option>
                                    <option value="real-estate" {{ old('category') === 'real-estate' ? 'selected' : '' }}>Real Estate</option>
                                    <option value="telecommunications" {{ old('category') === 'telecommunications' ? 'selected' : '' }}>Telecommunications</option>
                                    <option value="government" {{ old('category') === 'government' ? 'selected' : '' }}>Government</option>
                                    <option value="non-profit" {{ old('category') === 'non-profit' ? 'selected' : '' }}>Non-Profit</option>
                                    <option value="other" {{ old('category') === 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="market_size" class="form-label">Market Size</label>
                                <input type="text" class="form-control @error('market_size') is-invalid @enderror"
                                       id="market_size" name="market_size" value="{{ old('market_size') }}" placeholder="e.g., $50 billion">
                                @error('market_size')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="growth_rate" class="form-label">Growth Rate</label>
                                <input type="text" class="form-control @error('growth_rate') is-invalid @enderror"
                                       id="growth_rate" name="growth_rate" value="{{ old('growth_rate') }}" placeholder="e.g., 15% annually">
                                @error('growth_rate')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="key_players" class="form-label">Key Players</label>
                                <textarea class="form-control @error('key_players') is-invalid @enderror"
                                          id="key_players" name="key_players" rows="4">{{ old('key_players') }}</textarea>
                                <div class="form-text">Major companies in this industry</div>
                                @error('key_players')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="trends" class="form-label">Industry Trends</label>
                                <textarea class="form-control @error('trends') is-invalid @enderror"
                                          id="trends" name="trends" rows="4">{{ old('trends') }}</textarea>
                                <div class="form-text">Current and emerging trends</div>
                                @error('trends')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="sort_order" class="form-label">Sort Order</label>
                                <input type="number" class="form-control @error('sort_order') is-invalid @enderror"
                                       id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}" min="0">
                                <div class="form-text">Higher numbers appear first</div>
                                @error('sort_order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="featured_image" class="form-label">Featured Image</label>
                                <input type="file" class="form-control @error('featured_image') is-invalid @enderror"
                                       id="featured_image" name="featured_image" accept="image/*">
                                @error('featured_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="icon" class="form-label">Industry Icon</label>
                                <input type="file" class="form-control @error('icon') is-invalid @enderror"
                                       id="icon" name="icon" accept="image/*">
                                <div class="form-text">Small icon representing this industry</div>
                                @error('icon')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_featured"
                                           name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_featured">
                                        Featured Industry
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
                                <a href="{{ route('admin.industries.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Back to Industries
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Create Industry
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
