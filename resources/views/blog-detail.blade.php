@extends('layouts.app')

@section('title', $post->title . ' | Chartered Insights')
@section('meta_description', $post->excerpt)

@section('content')
<!-- Hero Section -->
<section class="section bg-audit-grey">
    <div class="container-custom">
        <div class="max-w-4xl mx-auto">
            <!-- Breadcrumb -->
            <nav class="flex items-center space-x-2 text-sm text-gray-600 mb-6">
                <a href="{{ route('home') }}" class="hover:text-fresh-teal">Home</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <a href="{{ route('blogs') }}" class="hover:text-fresh-teal">Blog</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <span class="text-gray-500">{{ $post->title }}</span>
            </nav>

            <!-- Article Header -->
            <div class="text-center mb-8">
                <div class="flex items-center justify-center space-x-4 mb-4">
                    <a href="{{ $post->category->url }}" class="category-badge">{{ $post->category->name }}</a>
                    @if($post->is_featured)
                    <span class="featured-badge-sm">Featured</span>
                    @endif
                </div>

                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-warm-grey mb-6 leading-tight">
                    {{ $post->title }}
                </h1>

                <p class="text-lg text-gray-600 mb-8 max-w-3xl mx-auto">
                    {{ $post->excerpt }}
                </p>

                <!-- Article Meta -->
                <div class="flex items-center justify-center space-x-6 text-sm text-gray-600">
                    <div class="flex items-center space-x-2">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=40&auto=format&fit=crop&ixlib=rb-4.0.3"
                             alt="{{ $post->author->name }}" class="w-8 h-8 rounded-full">
                        <span>{{ $post->author->name }}</span>
                    </div>
                    <span>•</span>
                    <span>{{ $post->formatted_date }}</span>
                    <span>•</span>
                    <span>{{ $post->category->name }}</span>
                </div>
            </div>

            <!-- Featured Image -->
            <div class="rounded-lg overflow-hidden mb-12">
                <img src="{{ $post->thumbnail_url }}"
                     alt="{{ $post->title }}"
                     class="w-full h-64 md:h-96 object-cover">
            </div>
        </div>
    </div>
</section>

<!-- Article Content -->
<section class="section">
    <div class="container-custom">
        <div class="max-w-4xl mx-auto">
            <div class="prose prose-lg max-w-none">
                {!! $post->content !!}
            </div>

            <!-- Tags -->
            @if($post->tags->count() > 0)
            <div class="mt-12 pt-8 border-t border-gray-200">
                <h3 class="text-lg font-semibold text-warm-grey mb-4">Tags</h3>
                <div class="flex flex-wrap gap-2">
                    @foreach($post->tags as $tag)
                    <a href="{{ $tag->url }}" class="tag">{{ $tag->name }}</a>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Share Buttons -->
            <div class="mt-8 pt-8 border-t border-gray-200">
                <h3 class="text-lg font-semibold text-warm-grey mb-4">Share this article</h3>
                <div class="flex space-x-4">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                       target="_blank"
                       class="btn-outline">
                        Share on Facebook
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($post->title) }}"
                       target="_blank"
                       class="btn-outline">
                        Share on Twitter
                    </a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->url()) }}"
                       target="_blank"
                       class="btn-outline">
                        Share on LinkedIn
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Posts -->
@if($relatedPosts && $relatedPosts->count() > 0)
<section class="section bg-audit-grey">
    <div class="container-custom">
        <div class="section-header text-center mb-12">
            <h2 class="section-title">Related Articles</h2>
            <p class="section-subtitle">More articles from {{ $post->category->name }}</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($relatedPosts as $relatedPost)
            <article class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                <div class="aspect-w-16 aspect-h-9">
                    <img src="{{ $relatedPost->thumbnail_url }}"
                         alt="{{ $relatedPost->title }}"
                         class="w-full h-48 object-cover">
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        <span class="category-badge">{{ $relatedPost->category->name }}</span>
                        <span class="text-sm text-gray-500">{{ $relatedPost->formatted_date }}</span>
                    </div>
                    <h3 class="text-lg font-semibold text-warm-grey mb-3 line-clamp-2">
                        <a href="{{ $relatedPost->url }}" class="hover:text-fresh-teal transition-colors">
                            {{ $relatedPost->title }}
                        </a>
                    </h3>
                    <p class="text-gray-600 text-sm line-clamp-3 mb-4">{{ $relatedPost->excerpt }}</p>
                    <a href="{{ $relatedPost->url }}" class="text-fresh-teal font-medium text-sm hover:underline">
                        Read More →
                    </a>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Back to Blog -->
<section class="section">
    <div class="container-custom text-center">
        <a href="{{ route('blogs') }}" class="btn-primary">
            ← Back to All Articles
        </a>
    </div>
</section>
@endsection

@push('styles')
<style>
.prose {
    color: #374151;
    line-height: 1.75;
}

.prose h1, .prose h2, .prose h3, .prose h4, .prose h5, .prose h6 {
    color: #015A77;
    font-weight: 600;
    margin-top: 2rem;
    margin-bottom: 1rem;
}

.prose h1 { font-size: 2.25rem; }
.prose h2 { font-size: 1.875rem; }
.prose h3 { font-size: 1.5rem; }
.prose h4 { font-size: 1.25rem; }

.prose p {
    margin-bottom: 1.5rem;
}

.prose a {
    color: #00BFB2;
    text-decoration: underline;
}

.prose a:hover {
    color: #00a599;
}

.prose blockquote {
    border-left: 4px solid #00BFB2;
    padding-left: 1.5rem;
    margin: 2rem 0;
    font-style: italic;
    color: #6b7280;
}

.prose code {
    background: #f3f4f6;
    padding: 0.25rem 0.5rem;
    border-radius: 0.25rem;
    font-size: 0.875em;
}

.prose pre {
    background: #1f2937;
    color: #f9fafb;
    padding: 1.5rem;
    border-radius: 0.5rem;
    overflow-x: auto;
    margin: 2rem 0;
}

.prose img {
    border-radius: 0.5rem;
    margin: 2rem 0;
}

.prose ul, .prose ol {
    margin: 1.5rem 0;
    padding-left: 2rem;
}

.prose li {
    margin: 0.5rem 0;
}
</style>
@endpush
