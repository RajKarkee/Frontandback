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
