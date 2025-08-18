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
