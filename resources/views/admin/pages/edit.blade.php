@extends('admin.layouts.app')

@section('title', 'Edit Page')
@section('page-title', 'Edit Page')

@section('page-actions')
    <a href="{{ route('admin.pages.show', $page) }}" class="btn btn-info">
        <i class="fas fa-eye me-2"></i>View Page
    </a>
    <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i>Back to Pages
    </a>
@endsection

@section('content')
    <form method="POST" action="{{ route('admin.pages.update', $page) }}" enctype="multipart/form-data">
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
                                <label for="title" class="form-label fw-semibold">Title *</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                       id="title" name="title" value="{{ old('title', $page->title) }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="slug" class="form-label fw-semibold">Slug *</label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                       id="slug" name="slug" value="{{ old('slug', $page->slug) }}" required>
                                @error('slug')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="template" class="form-label fw-semibold">Template</label>
                                <select class="form-select @error('template') is-invalid @enderror" id="template" name="template">
                                    <option value="">Default Template</option>
                                    <option value="landing" {{ old('template', $page->template) === 'landing' ? 'selected' : '' }}>Landing Page</option>
                                    <option value="service" {{ old('template', $page->template) === 'service' ? 'selected' : '' }}>Service Page</option>
                                    <option value="about" {{ old('template', $page->template) === 'about' ? 'selected' : '' }}>About Page</option>
                                    <option value="contact" {{ old('template', $page->template) === 'contact' ? 'selected' : '' }}>Contact Page</option>
                                    <option value="full-width" {{ old('template', $page->template) === 'full-width' ? 'selected' : '' }}>Full Width</option>
                                </select>
                                @error('template')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="parent_id" class="form-label fw-semibold">Parent Page</label>
                                <select class="form-select @error('parent_id') is-invalid @enderror" id="parent_id" name="parent_id">
                                    <option value="">No Parent (Top Level)</option>
                                    @foreach(\App\Models\Page::where('id', '!=', $page->id)->get() as $parentPage)
                                        <option value="{{ $parentPage->id }}" {{ old('parent_id', $page->parent_id) == $parentPage->id ? 'selected' : '' }}>
                                            {{ $parentPage->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('parent_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="excerpt" class="form-label fw-semibold">Excerpt</label>
                                <textarea class="form-control @error('excerpt') is-invalid @enderror"
                                          id="excerpt" name="excerpt" rows="3"
                                          placeholder="Brief summary of the page...">{{ old('excerpt', $page->excerpt) }}</textarea>
                                @error('excerpt')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="content" class="form-label fw-semibold">Content *</label>
                                <textarea class="form-control @error('content') is-invalid @enderror"
                                          id="content" name="content" rows="15" required
                                          placeholder="Write your page content here...">{{ old('content', $page->content) }}</textarea>
                                @error('content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SEO Settings -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom py-3">
                        <h5 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-search me-2"></i>SEO Settings
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="meta_description" class="form-label fw-semibold">Meta Description</label>
                                <textarea class="form-control @error('meta_description') is-invalid @enderror"
                                          id="meta_description" name="meta_description" rows="3"
                                          maxlength="160" placeholder="Brief description for search engines...">{{ old('meta_description', $page->meta_description) }}</textarea>
                                <div class="form-text">Recommended: 150-160 characters</div>
                                @error('meta_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="meta_keywords" class="form-label fw-semibold">Meta Keywords</label>
                                <input type="text" class="form-control @error('meta_keywords') is-invalid @enderror"
                                       id="meta_keywords" name="meta_keywords" value="{{ old('meta_keywords', $page->meta_keywords) }}"
                                       placeholder="keyword1, keyword2, keyword3">
                                <div class="form-text">Separate keywords with commas</div>
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
                                <option value="draft" {{ old('status', $page->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="published" {{ old('status', $page->status) === 'published' ? 'selected' : '' }}>Published</option>
                                <option value="private" {{ old('status', $page->status) === 'private' ? 'selected' : '' }}>Private</option>
                                <option value="archived" {{ old('status', $page->status) === 'archived' ? 'selected' : '' }}>Archived</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="published_at" class="form-label fw-semibold">Publish Date</label>
                            <input type="datetime-local" class="form-control @error('published_at') is-invalid @enderror"
                                   id="published_at" name="published_at"
                                   value="{{ old('published_at', $page->published_at ? $page->published_at->format('Y-m-d\TH:i') : '') }}">
                            @error('published_at')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="sort_order" class="form-label fw-semibold">Sort Order</label>
                            <input type="number" class="form-control @error('sort_order') is-invalid @enderror"
                                   id="sort_order" name="sort_order" value="{{ old('sort_order', $page->sort_order) }}"
                                   min="0" placeholder="0">
                            <div class="form-text">Lower numbers appear first</div>
                            @error('sort_order')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1"
                                   {{ old('is_featured', $page->is_featured) ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold" for="is_featured">
                                Featured Page
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Featured Image -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom py-3">
                        <h5 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-image me-2"></i>Featured Image
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        @if($page->featured_image)
                            <div class="mb-3">
                                <img src="{{ Storage::url($page->featured_image) }}"
                                     alt="Current featured image"
                                     class="img-fluid rounded shadow-sm">
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" id="remove_image" name="remove_image" value="1">
                                    <label class="form-check-label text-danger" for="remove_image">
                                        Remove current image
                                    </label>
                                </div>
                            </div>
                        @endif

                        <input type="file" class="form-control @error('featured_image') is-invalid @enderror"
                               id="featured_image" name="featured_image" accept="image/*">
                        <div class="form-text">Recommended: 1200x630px, JPG or PNG, max 2MB</div>
                        @error('featured_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Update Page
                            </button>

                            <a href="{{ route('admin.pages.show', $page) }}" class="btn btn-outline-info">
                                <i class="fas fa-eye me-2"></i>View Page
                            </a>

                            <a href="{{ route('admin.pages.index') }}" class="btn btn-outline-secondary">
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
    // Auto-generate slug from title
    document.getElementById('title').addEventListener('input', function() {
        const slugField = document.getElementById('slug');
        if (!slugField.dataset.manual) {
            const slug = this.value.toLowerCase()
                .replace(/[^a-z0-9 -]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');
            slugField.value = slug;
        }
    });

    // Mark slug as manually edited
    document.getElementById('slug').addEventListener('input', function() {
        this.dataset.manual = 'true';
    });

    // Auto-generate meta description from excerpt
    document.getElementById('excerpt').addEventListener('input', function() {
        const metaDesc = document.getElementById('meta_description');
        if (!metaDesc.value && this.value) {
            metaDesc.value = this.value.substring(0, 160);
        }
    });

    // Show/hide publish date based on status
    document.getElementById('status').addEventListener('change', function() {
        const publishDateField = document.getElementById('published_at');
        if (this.value === 'published' && !publishDateField.value) {
            publishDateField.value = new Date().toISOString().slice(0, 16);
        } else if (this.value === 'draft') {
            publishDateField.value = '';
        }
    });

    // Validate slug format
    document.getElementById('slug').addEventListener('blur', function() {
        if (this.value && !/^[a-z0-9-]+$/.test(this.value)) {
            alert('Slug can only contain lowercase letters, numbers, and hyphens.');
            this.focus();
        }
    });
</script>
@endpush
