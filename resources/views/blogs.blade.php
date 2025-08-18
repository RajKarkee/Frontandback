@extends('layouts.app')

@section('title', 'Blog - Latest News & Updates | Chartered Insights')
@section('meta_description', 'Read the latest news, updates, and thought leadership from Chartered Insights. Stay informed about accounting trends, business insights, and industry developments.')

@section('content')
<!-- Hero Section -->
<x-jumbotron page-slug="blogs" />

<!-- Featured Post -->
@includeIf('front.cache.blog.featured')

<!-- Blog Categories -->
@includeIf('front.cache.blog.categories')

<!-- Recent Posts -->
@includeIf('front.cache.blog.recent')


<!-- Popular Tags -->
@includeIf('front.cache.blog.tags')


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
