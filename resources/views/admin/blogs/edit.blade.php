@extends('admin.layouts.app')

@section('title', 'Edit Blog Post')
                                <label for="excerpt" class="form-label fw-semibold">Excerpt</label>
                                <textarea class="form-control @error('excerpt') is-invalid @enderror"
                                          id="excerpt" name="excerpt" rows="3"
                                          placeholder="Brief summary of the blog post...">{!! old('excerpt', $blog->excerpt) !!}</textarea>
                                @error('excerpt')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderrorn('page-title', 'Edit Blog Post')

@section('page-actions')
    <a href="{{ route('admin.blogs.show', $blog) }}" class="btn btn-info">
        <i class="fas fa-eye me-2"></i>View Post
    </a>
    <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i>Back to Blogs
    </a>
@endsection

@section('content')
    <form method="POST" action="{{ route('admin.blogs.update', $blog) }}" enctype="multipart/form-data">
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
                                <label for="title" class="form-label fw-semibold">Title *</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                       id="title" name="title" value="{{ old('title', $blog->title) }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="author" class="form-label fw-semibold">Author</label>
                                <input type="text" class="form-control @error('author') is-invalid @enderror"
                                       id="author" name="author" value="{{ old('author', $blog->author) }}">
                                @error('author')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="category" class="form-label fw-semibold">Category</label>
                                <select class="form-select @error('category') is-invalid @enderror" id="category" name="category">
                                    <option value="">Select Category</option>
                                    <option value="audit-assurance" {{ old('category', $blog->category) === 'audit-assurance' ? 'selected' : '' }}>Audit & Assurance</option>
                                    <option value="tax-advisory" {{ old('category', $blog->category) === 'tax-advisory' ? 'selected' : '' }}>Tax Advisory</option>
                                    <option value="risk-management" {{ old('category', $blog->category) === 'risk-management' ? 'selected' : '' }}>Risk Management</option>
                                    <option value="business-consulting" {{ old('category', $blog->category) === 'business-consulting' ? 'selected' : '' }}>Business Consulting</option>
                                    <option value="industry-insights" {{ old('category', $blog->category) === 'industry-insights' ? 'selected' : '' }}>Industry Insights</option>
                                    <option value="regulations" {{ old('category', $blog->category) === 'regulations' ? 'selected' : '' }}>Regulations</option>
                                    <option value="technology" {{ old('category', $blog->category) === 'technology' ? 'selected' : '' }}>Technology</option>
                                    <option value="news" {{ old('category', $blog->category) === 'news' ? 'selected' : '' }}>News</option>
                                </select>
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="excerpt" class="form-label fw-semibold">Excerpt</label>
                                <textarea class="form-control @error('excerpt') is-invalid @enderror"
                                          id="excerpt" name="excerpt" rows="3"
                                          placeholder="Brief summary of the blog post...">{{ old('excerpt', $blog->excerpt) }}</textarea>
                                @error('excerpt')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="content" class="form-label fw-semibold">Content *</label>
                                <textarea class="form-control @error('content') is-invalid @enderror"
                                          id="content" name="content" rows="15" required
                                          placeholder="Write your blog post content here...">{!! old('content', $blog->content) !!}</textarea>
                                @error('content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="tags" class="form-label fw-semibold">Tags</label>
                                <input type="text" class="form-control @error('tags') is-invalid @enderror"
                                       id="tags" name="tags" value="{{ old('tags', $blog->tags) }}"
                                       placeholder="tag1, tag2, tag3">
                                <div class="form-text">Separate tags with commas</div>
                                @error('tags')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="reading_time" class="form-label fw-semibold">Reading Time (minutes)</label>
                                <input type="number" class="form-control @error('reading_time') is-invalid @enderror"
                                       id="reading_time" name="reading_time" value="{{ old('reading_time', $blog->reading_time) }}"
                                       min="1" placeholder="5">
                                @error('reading_time')
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
                                          maxlength="160" placeholder="Brief description for search engines...">{{ old('meta_description', $blog->meta_description) }}</textarea>
                                <div class="form-text">Recommended: 150-160 characters</div>
                                @error('meta_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="meta_keywords" class="form-label fw-semibold">Meta Keywords</label>
                                <input type="text" class="form-control @error('meta_keywords') is-invalid @enderror"
                                       id="meta_keywords" name="meta_keywords" value="{{ old('meta_keywords', $blog->meta_keywords) }}"
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
                                <option value="draft" {{ old('status', $blog->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="published" {{ old('status', $blog->status) === 'published' ? 'selected' : '' }}>Published</option>
                                <option value="archived" {{ old('status', $blog->status) === 'archived' ? 'selected' : '' }}>Archived</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="published_at" class="form-label fw-semibold">Publish Date</label>
                            <input type="datetime-local" class="form-control @error('published_at') is-invalid @enderror"
                                   id="published_at" name="published_at"
                                   value="{{ old('published_at', $blog->published_at ? $blog->published_at->format('Y-m-d\TH:i') : '') }}">
                            @error('published_at')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1"
                                   {{ old('is_featured', $blog->is_featured) ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold" for="is_featured">
                                Featured Post
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
                        @if($blog->featured_image)
                            <div class="mb-3">
                                <img src="{{ Storage::url($blog->featured_image) }}"
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
                                <i class="fas fa-save me-2"></i>Update Blog Post
                            </button>

                            <a href="{{ route('admin.blogs.show', $blog) }}" class="btn btn-outline-info">
                                <i class="fas fa-eye me-2"></i>View Post
                            </a>

                            <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-secondary">
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
    // Auto-generate meta description from excerpt
    document.getElementById('excerpt').addEventListener('input', function() {
        const metaDesc = document.getElementById('meta_description');
        if (!metaDesc.value && this.value) {
            metaDesc.value = this.value.substring(0, 160);
        }
    });

    // Auto-generate tags from title
    document.getElementById('title').addEventListener('blur', function() {
        const tagsField = document.getElementById('tags');
        if (!tagsField.value && this.value) {
            const words = this.value.toLowerCase().split(' ').filter(word => word.length > 3);
            tagsField.value = words.slice(0, 5).join(', ');
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
</script>
@endpush
