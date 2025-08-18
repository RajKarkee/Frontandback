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
