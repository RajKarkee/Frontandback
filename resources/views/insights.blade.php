@extends('layouts.app')
@use('Illuminate\Support\Facades\Storage')

@section('title', 'Insights & Articles - Chartered Insights')
@section('meta_description',
    'Stay informed with latest insights, industry analysis, and expert perspectives from
    Chartered Insights on accounting, taxation, and business trends.')

@push('styles')
    <style>
        /* Custom CSS to match the Tailwind design */
        :root {
            --deep-chartered-blue: #1e3a8a;
            --fresh-teal: #14b8a6;
            --crisp-white: #ffffff;
            --report-black: #1f2937;
        }

        .blog-card {
            position: relative;
            height: 320px;
            border-radius: 0.5rem;
            background-color: white;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            overflow: hidden;
        }

        .blog-card:hover {
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            transform: scale(1.02);
        }

        /* Background Image */
        .blog-bg-image {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
        }

        .blog-bg-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: all 0.7s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .blog-card:hover .blog-bg-image img {
            transform: scale(1.1);
            filter: brightness(0.5);
        }

        /* Dark overlay on hover */
        .dark-overlay {
            position: absolute;
            inset: 0;
            background-color: rgba(0, 0, 0, 0);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .blog-card:hover .dark-overlay {
            background-color: rgba(0, 0, 0, 0.6);
        }

        /* Bottom overlay content */
        .bottom-content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 1.5rem;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.8) 0%, transparent 100%);
            transition: opacity 0.5s ease;
        }

        .blog-card:hover .bottom-content {
            opacity: 0;
        }

        /* Center hover content */
        .center-content {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 1.5rem;
            text-align: center;
            opacity: 0;
            transform: translateY(1rem);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .blog-card:hover .center-content {
            opacity: 1;
            transform: translateY(0);
        }

        /* Badge */
        .featured-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            background-color: var(--fresh-teal);
            color: var(--crisp-white);
            font-size: 0.875rem;
            border-radius: 9999px;
            margin-bottom: 0.75rem;
            width: fit-content;
        }

        .category-text {
            font-size: 0.75rem;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.8);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 0.25rem;
        }

        .category-text-hover {
            font-size: 0.875rem;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.9);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 0.75rem;
        }

        /* Typography */
        .blog-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: white;
            margin-top: 0.25rem;
            line-height: 1.2;
        }

        .blog-title-hover {
            font-size: 1.5rem;
            font-weight: 700;
            color: white;
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .blog-title-hover a {
            text-decoration: none;
            color: inherit;
            transition: color 0.3s ease;
        }

        .blog-title-hover a:hover {
            color: var(--fresh-teal);
        }

        .blog-description {
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.9);
            line-height: 1.6;
        }

        .category-card:hover {
            transform: translateY(-2px);
        }
    </style>
@endpush

@section('content')
    <!-- Dynamic Hero Section -->
    <x-jumbotron page-slug="insights" />

    <!-- Featured Articles -->
    <section class="section">
        <div class="container-custom">
            <div class="section-header fade-in">
                <h2 class="section-title">Featured Articles</h2>
                <p class="section-subtitle">
                    Our most popular and impactful insights that are shaping business decisions across industries.
                </p>
            </div>

            <div class="container">
                <div class="row">
                    @if($featuredInsights && $featuredInsights->count() > 0)
                        @foreach($featuredInsights->take(1) as $insight)
                        <div class="col-12 col-lg-4">
                            <article class="blog-card">
                                <!-- Background Image -->
                                <div class="blog-bg-image">
                                    <img src="{{ $insight->featured_image ? Storage::url($insight->featured_image) : 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?q=80&w=800&auto=format&fit=crop' }}"
                                        alt="{{ $insight->title }}">
                                </div>

                                <!-- Dark overlay on hover -->
                                <div class="dark-overlay"></div>

                                <!-- Non-hover content - Bottom overlay -->
                                <div class="bottom-content">
                                    <span class="category-text">{{ $insight->insightCategory ? strtoupper($insight->insightCategory->name) : 'GENERAL' }}</span>
                                    <h3 class="blog-title">
                                        {{ $insight->title }}
                                    </h3>
                                </div>

                                <!-- Hover content - Center content -->
                                <div class="center-content">
                                    <span class="featured-badge">Featured</span>
                                    <span class="category-text-hover">{{ $insight->insightCategory ? strtoupper($insight->insightCategory->name) : 'GENERAL' }}</span>
                                    <h3 class="blog-title-hover">
                                        <a href="{{ route('insights.detail', $insight->slug) }}">
                                            {{ $insight->title }}
                                        </a>
                                    </h3>
                                    <p class="blog-description">
                                        {{ $insight->excerpt }}
                                    </p>
                                </div>
                            </article>
                        </div>
                        @endforeach
                        <div class="col-12 col-lg-4">
                            <article class="blog-card">
                                <!-- Background Image -->
                                <div class="blog-bg-image">
                                    <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?q=80&w=800&auto=format&fit=crop"
                                        alt="Digital transformation in accounting">
                                </div>

                                <!-- Dark overlay on hover -->
                                <div class="dark-overlay"></div>

                                <!-- Non-hover content - Bottom overlay -->
                                <div class="bottom-content">
                                    <span class="category-text">TAX ADVISORY</span>
                                    <h3 class="blog-title">
                                        Strategic Tax Planning for Growing Businesses in Nepal
                                    </h3>
                                </div>

                                <!-- Hover content - Center content -->
                                <div class="center-content">
                                    <span class="featured-badge">Featured</span>
                                    <span class="category-text-hover">TAX ADVISORY</span>
                                    <h3 class="blog-title-hover">
                                        <a href="#">
                                            Strategic Tax Planning for Growing Businesses in Nepal
                                        </a>
                                    </h3>
                                    <p class="blog-description">
                                        Essential tax strategies and compliance considerations for businesses expanding in
                                        Nepal's evolving regulatory landscape.
                                    </p>
                                </div>
                            </article>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Secondary Featured Articles -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @if($featuredInsights && $featuredInsights->count() > 1)
                    @foreach($featuredInsights->skip(1)->take(2) as $insight)
                        <article
                            class="blog-card fade-in group cursor-pointer overflow-hidden rounded-lg bg-white shadow-md hover:shadow-2xl transform transition-all duration-500 ease-out hover:scale-[1.02] relative h-80">
                            <!-- Background Image -->
                            <div class="absolute inset-0 w-full h-full">
                                <img src="{{ $insight->featured_image ? Storage::url($insight->featured_image) : 'https://images.unsplash.com/photo-1559526324-4b87b5e36e44?q=80&w=800&auto=format&fit=crop' }}"
                                    alt="{{ $insight->title }}"
                                    class="w-full h-full object-cover transition-all duration-700 ease-out group-hover:scale-110 group-hover:brightness-50">
                            </div>

                            <!-- Dark overlay on hover -->
                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/60 transition-all duration-500 ease-out">
                            </div>

                            <!-- Non-hover content - Bottom overlay -->
                            <div
                                class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/80 to-transparent group-hover:opacity-0 transition-opacity duration-500">
                                <span class="text-xs font-semibold text-white/80 uppercase tracking-wide">{{ $insight->insightCategory ? strtoupper($insight->insightCategory->name) : 'GENERAL' }}</span>
                                <h3 class="text-xl font-semibold text-white mt-1">
                                    {{ $insight->title }}
                                </h3>
                            </div>

                            <!-- Hover content - Center content -->
                            <div
                                class="absolute inset-0 flex flex-col justify-center items-center p-6 text-center opacity-0 group-hover:opacity-100 transition-all duration-500 ease-out transform translate-y-4 group-hover:translate-y-0">
                                <span class="text-sm font-semibold text-white/90 uppercase tracking-wide mb-3">{{ $insight->insightCategory ? strtoupper($insight->insightCategory->name) : 'GENERAL' }}</span>
                                <h3 class="text-2xl font-bold text-white mb-4 leading-tight">
                                    <a href="{{ route('insights.detail', $insight->slug) }}" class="hover:text-fresh-teal transition-colors duration-300">
                                        {{ $insight->title }}
                                    </a>
                                </h3>
                                <p class="text-white/90 text-base leading-relaxed">
                                    {{ $insight->excerpt }}
                                </p>
                            </div>
                        </article>
                    @endforeach
                @else
                    <!-- Fallback secondary featured articles -->
                    <article
                        class="blog-card fade-in group cursor-pointer overflow-hidden rounded-lg bg-white shadow-md hover:shadow-2xl transform transition-all duration-500 ease-out hover:scale-[1.02] relative h-80">
                        <!-- Background Image -->
                        <div class="absolute inset-0 w-full h-full">
                            <img src="https://images.unsplash.com/photo-1559526324-4b87b5e36e44?q=80&w=800&auto=format&fit=crop"
                                alt="Tax compliance strategies"
                                class="w-full h-full object-cover transition-all duration-700 ease-out group-hover:scale-110 group-hover:brightness-50">
                        </div>

                        <!-- Dark overlay on hover -->
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/60 transition-all duration-500 ease-out">
                        </div>

                        <!-- Non-hover content - Bottom overlay -->
                        <div
                            class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/80 to-transparent group-hover:opacity-0 transition-opacity duration-500">
                            <span class="text-xs font-semibold text-white/80 uppercase tracking-wide">TAX ADVISORY</span>
                            <h3 class="text-xl font-semibold text-white mt-1">
                                Strategic Tax Planning for Growing Businesses in Nepal
                            </h3>
                        </div>

                        <!-- Hover content - Center content -->
                        <div
                            class="absolute inset-0 flex flex-col justify-center items-center p-6 text-center opacity-0 group-hover:opacity-100 transition-all duration-500 ease-out transform translate-y-4 group-hover:translate-y-0">
                            <span class="text-sm font-semibold text-white/90 uppercase tracking-wide mb-3">TAX ADVISORY</span>
                            <h3 class="text-2xl font-bold text-white mb-4 leading-tight">
                                <a href="#" class="hover:text-fresh-teal transition-colors duration-300">
                                    Strategic Tax Planning for Growing Businesses in Nepal
                                </a>
                            </h3>
                            <p class="text-white/90 text-base leading-relaxed">
                                Essential tax strategies and compliance considerations for businesses expanding in Nepal's
                                evolving regulatory landscape.
                            </p>
                        </div>
                    </article>

                    <article
                        class="blog-card fade-in fade-in-delay-1 group cursor-pointer overflow-hidden rounded-lg bg-white shadow-md hover:shadow-2xl transform transition-all duration-500 ease-out hover:scale-[1.02] relative h-80">
                        <!-- Background Image -->
                        <div class="absolute inset-0 w-full h-full">
                            <img src="https://images.unsplash.com/photo-1507679799987-c73779587ccf?q=80&w=800&auto=format&fit=crop"
                                alt="Risk management insights"
                                class="w-full h-full object-cover transition-all duration-700 ease-out group-hover:scale-110 group-hover:brightness-50">
                        </div>

                        <!-- Dark overlay on hover -->
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/60 transition-all duration-500 ease-out">
                        </div>

                        <!-- Non-hover content - Bottom overlay -->
                        <div
                            class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/80 to-transparent group-hover:opacity-0 transition-opacity duration-500">
                            <span class="text-xs font-semibold text-white/80 uppercase tracking-wide">RISK MANAGEMENT</span>
                            <h3 class="text-xl font-semibold text-white mt-1">
                                Building Resilient Risk Management Frameworks
                            </h3>
                        </div>

                        <!-- Hover content - Center content -->
                        <div
                            class="absolute inset-0 flex flex-col justify-center items-center p-6 text-center opacity-0 group-hover:opacity-100 transition-all duration-500 ease-out transform translate-y-4 group-hover:translate-y-0">
                            <span class="text-sm font-semibold text-white/90 uppercase tracking-wide mb-3">RISK
                                MANAGEMENT</span>
                            <h3 class="text-2xl font-bold text-white mb-4 leading-tight">
                                <a href="#" class="hover:text-fresh-teal transition-colors duration-300">
                                    Building Resilient Risk Management Frameworks
                                </a>
                            </h3>
                            <p class="text-white/90 text-base leading-relaxed">
                                How businesses can build robust risk management frameworks to navigate economic volatility and
                                operational challenges.
                            </p>
                        </div>
                    </article>
                @endif
            </div>
        </div>
    </section>

    <!-- Categories -->
    <section class="section bg-audit-grey">
        <div class="container-custom">
            <div class="section-header fade-in">
                <h2 class="section-title">Browse by Category</h2>
                <p class="section-subtitle">
                    Explore our insights organized by topics relevant to your business interests.
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
                @if($categories && $categories->count() > 0)
                    @foreach($categories as $index => $category)
                        <a href="{{ route('insights.category', $category->slug) }}"
                           class="category-card text-center p-6 bg-crisp-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 fade-in {{ $index > 0 ? 'fade-in-delay-' . min($index, 2) : '' }} text-decoration-none">
                            @if($category->icon)
                                <div class="w-12 h-12 text-fresh-teal mx-auto mb-3">
                                    {!! $category->icon !!}
                                </div>
                            @else
                                <svg class="w-12 h-12 text-fresh-teal mx-auto mb-3" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            @endif
                            <h4 class="font-montserrat font-semibold text-deep-chartered-blue">{{ $category->name }}</h4>
                            <p class="text-sm text-report-black mt-2">{{ $category->insights_count }} {{ Str::plural('Article', $category->insights_count) }}</p>
                        </a>
                    @endforeach
                @else
                    <!-- Fallback static categories -->
                    <div class="category-card text-center p-6 bg-crisp-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 fade-in">
                        <svg class="w-12 h-12 text-fresh-teal mx-auto mb-3" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        <h4 class="font-montserrat font-semibold text-deep-chartered-blue">Audit & Assurance</h4>
                        <p class="text-sm text-report-black mt-2">12 Articles</p>
                    </div>

                    <div class="category-card text-center p-6 bg-crisp-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 fade-in fade-in-delay-1">
                        <svg class="w-12 h-12 text-fresh-teal mx-auto mb-3" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                        </svg>
                        <h4 class="font-montserrat font-semibold text-deep-chartered-blue">Tax Advisory</h4>
                        <p class="text-sm text-report-black mt-2">15 Articles</p>
                    </div>

                    <div class="category-card text-center p-6 bg-crisp-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 fade-in fade-in-delay-2">
                        <svg class="w-12 h-12 text-fresh-teal mx-auto mb-3" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        <h4 class="font-montserrat font-semibold text-deep-chartered-blue">Risk Management</h4>
                        <p class="text-sm text-report-black mt-2">8 Articles</p>
                    </div>

                    <div class="category-card text-center p-6 bg-crisp-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 fade-in">
                        <svg class="w-12 h-12 text-fresh-teal mx-auto mb-3" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                        <h4 class="font-montserrat font-semibold text-deep-chartered-blue">Business Strategy</h4>
                        <p class="text-sm text-report-black mt-2">10 Articles</p>
                    </div>

                    <div class="category-card text-center p-6 bg-crisp-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 fade-in fade-in-delay-1">
                        <svg class="w-12 h-12 text-fresh-teal mx-auto mb-3" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <h4 class="font-montserrat font-semibold text-deep-chartered-blue">Technology</h4>
                        <p class="text-sm text-report-black mt-2">6 Articles</p>
                    </div>

                    <div class="category-card text-center p-6 bg-crisp-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 fade-in fade-in-delay-2">
                        <svg class="w-12 h-12 text-fresh-teal mx-auto mb-3" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                        <h4 class="font-montserrat font-semibold text-deep-chartered-blue">Compliance</h4>
                        <p class="text-sm text-report-black mt-2">9 Articles</p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Recent Articles -->
    <section class="section">
        <div class="container-custom">
            <div class="section-header fade-in">
                <h2 class="section-title">Recent Articles</h2>
                <p class="section-subtitle">
                    Stay updated with our latest insights and expert commentary.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @if($recentInsights && $recentInsights->count() > 0)
                    @foreach($recentInsights as $index => $insight)
                        <article class="blog-card fade-in {{ $index > 0 ? 'fade-in-delay-' . min($index, 2) : '' }} group cursor-pointer overflow-hidden rounded-lg bg-white shadow-md hover:shadow-2xl transform transition-all duration-500 ease-out hover:scale-[1.02] relative h-80">
                            <!-- Background Image -->
                            <div class="absolute inset-0 w-full h-full">
                                <img src="{{ $insight->featured_image ? Storage::url($insight->featured_image) : 'https://images.unsplash.com/photo-1600880292089-90a7e086ee0c?q=80&w=800&auto=format&fit=crop' }}"
                                    alt="{{ $insight->title }}"
                                    class="w-full h-full object-cover transition-all duration-700 ease-out group-hover:scale-110 group-hover:brightness-50">
                            </div>

                            <!-- Dark overlay on hover -->
                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/60 transition-all duration-500 ease-out">
                            </div>

                            <!-- Non-hover content - Bottom overlay -->
                            <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/80 to-transparent group-hover:opacity-0 transition-opacity duration-500">
                                <span class="text-xs font-semibold text-white/80 uppercase tracking-wide">{{ $insight->insightCategory ? strtoupper($insight->insightCategory->name) : 'GENERAL' }}</span>
                                <h3 class="text-xl font-semibold text-white mt-1">
                                    {{ $insight->title }}
                                </h3>
                            </div>

                            <!-- Hover content - Center content -->
                            <div class="absolute inset-0 flex flex-col justify-center items-center p-6 text-center opacity-0 group-hover:opacity-100 transition-all duration-500 ease-out transform translate-y-4 group-hover:translate-y-0">
                                <span class="text-sm font-semibold text-white/90 uppercase tracking-wide mb-3">{{ $insight->insightCategory ? strtoupper($insight->insightCategory->name) : 'GENERAL' }}</span>
                                <h3 class="text-2xl font-bold text-white mb-4 leading-tight">
                                    <a href="{{ route('insights.detail', $insight->slug) }}" class="hover:text-fresh-teal transition-colors duration-300">
                                        {{ $insight->title }}
                                    </a>
                                </h3>
                                <p class="text-white/90 text-base leading-relaxed">
                                    {{ $insight->excerpt }}
                                </p>
                            </div>
                        </article>
                    @endforeach
              @endif
            </div>

            <div class="text-center mt-12 fade-in">
                <a href="{{ route('insights') }}" class="btn-outline">
                    View All Articles
                    <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>
        </div>
    </section>
@endsection
