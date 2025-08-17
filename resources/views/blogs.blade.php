@extends('layouts.app')

@section('title', 'Blog - Latest News & Updates | Chartered Insights')
@section('meta_description', 'Read the latest news, updates, and thought leadership from Chartered Insights. Stay informed about accounting trends, business insights, and industry developments.')

@section('content')
<!-- Hero Section -->
<x-jumbotron page-slug="blogs" />

<!-- Featured Post -->
@if($featuredPost)
<section class="section">
    <div class="container-custom">
        <div class="featured-post-card fade-in">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-0">
                <img src="{{ $featuredPost->thumbnail_url }}"
                     alt="{{ $featuredPost->title }}"
                     class="featured-image">
                <div class="featured-content">
                    <span class="featured-badge">Featured Article</span>
                    <h2 class="featured-title">
                        {{ $featuredPost->title }}
                    </h2>
                    <p class="featured-excerpt">
                        {{ $featuredPost->excerpt }}
                    </p>
                    <div class="featured-meta">
                        <div class="author-info">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=100&auto=format&fit=crop&ixlib=rb-4.0.3"
                                 alt="{{ $featuredPost->author->name }}" class="author-avatar">
                            <div>
                                <p class="author-name">{{ $featuredPost->author->name }}</p>
                                <p class="author-title">{{ $featuredPost->category->name }}</p>
                            </div>
                        </div>
                        <div class="post-meta">
                            <span>{{ $featuredPost->formatted_date }}</span>
                            <span>•</span>
                            <span>{{ $featuredPost->category->name }}</span>
                        </div>
                    </div>
                    <a href="{{ $featuredPost->url }}" class="btn-primary mt-6">
                        Read Full Article
                        <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Blog Categories -->
<section class="section bg-audit-grey">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Browse by Category</h2>
            <p class="section-subtitle">
                Explore our content organized by topics that matter to your business.
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
            @foreach($categories as $index => $category)
            <a href="{{ $category->url }}" class="category-card text-center fade-in @if($index > 2) fade-in-delay-{{ ($index - 2) }} @endif">
                <div class="category-icon">
                    @if($category->icon_url)
                        <img src="{{ $category->icon_url }}" alt="{{ $category->name }}" class="w-8 h-8 mx-auto text-fresh-teal">
                    @else
                        <svg class="w-8 h-8 text-fresh-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3v8m0 0V9a2 2 0 012-2h2M7 12h6m-6 4h4m1-8h.01" />
                        </svg>
                    @endif
                </div>
                <h4 class="category-title">{{ $category->name }}</h4>
                <p class="category-count">{{ $category->published_posts_count }} Posts</p>
            </a>
            @endforeach
        </div>
    </div>
</section>

<!-- Recent Posts -->
<section class="section">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Recent Posts</h2>
            <p class="section-subtitle">
                Stay updated with our latest articles and insights.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="posts-container">
            @include('partials.blog-cards', ['posts' => $posts])
        </div>

        @if($posts->hasMorePages())
        <!-- Load More Button -->
        <div class="text-center mt-12 fade-in">
            <button id="load-more-btn" class="btn-outline" data-next-page="{{ $posts->currentPage() + 1 }}">
                Load More Posts
                <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                </svg>
            </button>
            <div id="loading" class="hidden text-center mt-4">
                <div class="inline-flex items-center px-4 py-2 font-semibold leading-6 text-sm shadow rounded-md text-white bg-fresh-teal transition ease-in-out duration-150 cursor-not-allowed">
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Loading...
                </div>
            </div>
        </div>
        @endif
    </div>
</section>


<!-- Popular Tags -->
<section class="section">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Popular Topics</h2>
            <p class="section-subtitle">
                Explore our most discussed topics and trending subjects.
            </p>
        </div>

        <div class="flex flex-wrap gap-3 justify-center fade-in">
            @foreach($popularTags as $tag)
            <a href="{{ $tag->url }}" class="tag">
                {{ $tag->name }}
                @if($tag->published_posts_count > 0)
                    ({{ $tag->published_posts_count }})
                @endif
            </a>
            @endforeach
        </div>
    </div>
</section>

<!-- Contact for Contributions -->
<section class="section bg-audit-grey">
    <div class="container-custom">
        <div class="text-center fade-in">
            <h2 class="section-title">Share Your Expertise</h2>
            <p class="section-subtitle max-w-4xl mx-auto mb-8">
                Are you an industry expert with valuable insights to share? We welcome guest contributions from accounting professionals, business leaders, and industry specialists. Join our community of thought leaders and help shape the conversation.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                <div class="text-center">
                    <div class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-2">Write for Us</h3>
                    <p class="text-report-black">Share your expertise through guest articles and thought leadership pieces.</p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-2">Expert Interviews</h3>
                    <p class="text-report-black">Participate in interviews and panel discussions on industry topics.</p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-2">Case Studies</h3>
                    <p class="text-report-black">Contribute real-world case studies and success stories from your experience.</p>
                </div>
            </div>

            <a href="{{ route('contact') }}" class="btn-primary">
                Get in Touch
                <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.featured-post-card {
    background: white;
    border-radius: 1rem;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    border: 3px solid #00BFB2;
}

.featured-image {
    width: 100%;
    height: 400px;
    object-fit: cover;
}

.featured-content {
    padding: 2.5rem;
}

.featured-badge {
    display: inline-block;
    background: #00BFB2;
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 1rem;
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
    margin-bottom: 1rem;
}

.featured-title {
    font-size: 2rem;
    font-weight: bold;
    color: #015A77;
    margin-bottom: 1rem;
    font-family: 'Montserrat', sans-serif;
    line-height: 1.2;
}

.featured-excerpt {
    font-size: 1.1rem;
    color: #666;
    line-height: 1.6;
    margin-bottom: 2rem;
}

.featured-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
}

.author-info {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.author-avatar {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    object-fit: cover;
}

.author-name {
    font-weight: 600;
    color: #015A77;
    margin: 0;
}

.author-title {
    color: #666;
    font-size: 0.9rem;
    margin: 0;
}

.post-meta {
    color: #666;
    font-size: 0.9rem;
}

.category-card {
    background: white;
    padding: 1.5rem;
    border-radius: 1rem;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.category-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.category-icon {
    margin: 0 auto 1rem auto;
    display: flex;
    justify-content: center;
}

.category-title {
    font-weight: 600;
    color: #015A77;
    margin-bottom: 0.5rem;
    font-family: 'Montserrat', sans-serif;
}

.category-count {
    color: #666;
    font-size: 0.9rem;
}

.blog-post-card {
    background: white;
    border-radius: 1rem;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.blog-post-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.post-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.post-content {
    padding: 1.5rem;
}

.post-category {
    display: inline-block;
    background: #f1f5f9;
    color: #64748b;
    padding: 0.25rem 0.75rem;
    border-radius: 1rem;
    font-size: 0.8rem;
    font-weight: 500;
    margin-bottom: 1rem;
}

.post-title {
    margin-bottom: 1rem;
}

.post-title a {
    font-size: 1.1rem;
    font-weight: 600;
    color: #015A77;
    text-decoration: none;
    line-height: 1.3;
    font-family: 'Montserrat', sans-serif;
}

.post-title a:hover {
    color: #00BFB2;
}

.post-excerpt {
    color: #666;
    font-size: 0.9rem;
    line-height: 1.5;
    margin-bottom: 1.5rem;
}

.post-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 1rem;
    border-top: 1px solid #e2e8f0;
}

.author-meta {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.author-small-avatar {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    object-fit: cover;
}

.author-small-name {
    font-size: 0.85rem;
    font-weight: 500;
    color: #015A77;
}

.post-date {
    font-size: 0.85rem;
    color: #666;
}

.tag {
    display: inline-block;
    background: #f1f5f9;
    color: #64748b;
    padding: 0.5rem 1rem;
    border-radius: 1.5rem;
    font-size: 0.9rem;
    font-weight: 500;
    transition: all 0.3s ease;
    cursor: pointer;
}

.tag:hover {
    background: #00BFB2;
    color: white;
}

@media (max-width: 768px) {
    .featured-post-card .grid {
        grid-template-columns: 1fr;
    }

    .featured-content {
        padding: 1.5rem;
    }

    .featured-title {
        font-size: 1.5rem;
    }

    .featured-meta {
        flex-direction: column;
        align-items: flex-start;
    }
}

/* Modern Blog Card Component with Overlay Animation */
.blog-post-card {
    will-change: transform, box-shadow;
    backface-visibility: hidden;
    transform-style: preserve-3d;
}

/* Card hover state - scale up with enhanced shadow */
.blog-post-card:hover {
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25), 0 0 0 1px rgba(255, 255, 255, 0.05);
}

/* Image zoom and darken animation */
.blog-post-card img {
    will-change: transform, filter;
    backface-visibility: hidden;
}

/* Smooth overlay transitions */
.blog-post-card .absolute {
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Performance optimizations */
.blog-post-card * {
    transform-origin: center;
}

/* Enhanced link hover effect */
.blog-post-card a:hover {
    transform: translateX(2px);
    transition: all 0.3s ease;
}

/* Card focus state for accessibility */
.blog-post-card:focus-within {
    outline: 2px solid #0891b2;
    outline-offset: 2px;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .blog-post-card:hover {
        transform: scale(1.01); /* Reduced scale on mobile */
    }

    .blog-post-card {
        height: 280px; /* Smaller height on mobile */
    }
}

/* Enhanced gradient overlay */
.blog-post-card .bg-gradient-to-t {
    background: linear-gradient(to top, rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0.4) 70%, transparent 100%);
}

/* Additional styles for blog cards */
.category-badge {
    background: #00BFB2;
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: 1rem;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.featured-badge-sm {
    background: #ff6b35;
    color: white;
    padding: 0.25rem 0.5rem;
    border-radius: 0.5rem;
    font-size: 0.7rem;
    font-weight: 600;
}

.tag-badge {
    background: rgba(255, 255, 255, 0.2);
    color: white;
    padding: 0.25rem 0.5rem;
    border-radius: 0.75rem;
    font-size: 0.7rem;
    font-weight: 500;
}

.btn-primary-sm {
    background: #00BFB2;
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    font-size: 0.875rem;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    transition: all 0.3s ease;
}

.btn-primary-sm:hover {
    background: #00a599;
    transform: translateY(-1px);
}

.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const loadMoreBtn = document.getElementById('load-more-btn');
    const postsContainer = document.getElementById('posts-container');
    const loading = document.getElementById('loading');

    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', function() {
            const nextPage = this.getAttribute('data-next-page');
            const currentUrl = new URL(window.location);

            // Show loading state
            loadMoreBtn.style.display = 'none';
            loading.classList.remove('hidden');

            // Build the request URL with current filters
            const loadMoreUrl = new URL('{{ route("blogs.load-more") }}');
            loadMoreUrl.searchParams.set('page', nextPage);

            // Preserve existing filters
            if (currentUrl.searchParams.has('category')) {
                loadMoreUrl.searchParams.set('category', currentUrl.searchParams.get('category'));
            }
            if (currentUrl.searchParams.has('tag')) {
                loadMoreUrl.searchParams.set('tag', currentUrl.searchParams.get('tag'));
            }

            fetch(loadMoreUrl.toString())
                .then(response => response.json())
                .then(data => {
                    if (data.html) {
                        // Append new posts to the container
                        postsContainer.insertAdjacentHTML('beforeend', data.html);

                        // Update button for next page or hide if no more pages
                        if (data.hasMore) {
                            loadMoreBtn.setAttribute('data-next-page', parseInt(nextPage) + 1);
                            loadMoreBtn.style.display = 'inline-flex';
                        }
                    }

                    // Hide loading state
                    loading.classList.add('hidden');
                })
                .catch(error => {
                    console.error('Error loading more posts:', error);
                    loadMoreBtn.style.display = 'inline-flex';
                    loading.classList.add('hidden');
                });
        });
    }
});
</script>
@endpush
