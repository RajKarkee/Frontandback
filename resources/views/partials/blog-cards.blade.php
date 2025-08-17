@foreach($posts as $post)
<article class="blog-post-card fade-in group cursor-pointer overflow-hidden rounded-lg bg-white shadow-md hover:shadow-2xl transform transition-all duration-500 ease-out hover:scale-[1.02] relative h-80">
    <!-- Background Image -->
    <div class="absolute inset-0 w-full h-full">
        <img src="{{ $post->thumbnail_url }}"
             alt="{{ $post->title }}"
             class="w-full h-full object-cover transition-all duration-700 ease-out group-hover:scale-110 group-hover:brightness-50">
    </div>

    <!-- Dark overlay on hover -->
    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/60 transition-all duration-500 ease-out"></div>

    <!-- Non-hover content - Bottom overlay -->
    <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/80 via-black/60 to-transparent group-hover:opacity-0 transition-opacity duration-500">
        <div class="flex items-center justify-between mb-3">
            <span class="category-badge">{{ $post->category->name }}</span>
            @if($post->is_featured)
            <span class="featured-badge-sm">Featured</span>
            @endif
        </div>
        <h3 class="text-lg font-bold text-white line-clamp-2 mb-2">{{ $post->title }}</h3>
        <div class="flex items-center justify-between text-audit-grey text-sm">
            <span>{{ $post->author->name }}</span>
            <span>{{ $post->formatted_date }}</span>
        </div>
    </div>

    <!-- Hover content - Centered content -->
    <div class="absolute inset-0 flex flex-col justify-center items-center p-6 text-center opacity-0 group-hover:opacity-100 transition-all duration-500 ease-out transform translate-y-4 group-hover:translate-y-0">
        <div class="flex items-center justify-between w-full mb-4">
            <span class="category-badge">{{ $post->category->name }}</span>
            @if($post->is_featured)
            <span class="featured-badge-sm">Featured</span>
            @endif
        </div>

        <h3 class="text-xl font-bold text-white mb-4 line-clamp-3">{{ $post->title }}</h3>

        <p class="text-audit-grey text-sm mb-6 line-clamp-3">{{ $post->excerpt }}</p>

        <div class="flex flex-wrap gap-2 mb-6">
            @foreach($post->tags->take(3) as $tag)
            <span class="tag-badge">{{ $tag->name }}</span>
            @endforeach
        </div>

        <div class="flex items-center justify-between w-full text-audit-grey text-sm mb-4">
            <span>{{ $post->author->name }}</span>
            <span>{{ $post->formatted_date }}</span>
        </div>

        <a href="{{ $post->url }}" class="btn-primary-sm">
            Read Article
            <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
            </svg>
        </a>
    </div>
</article>
@endforeach
