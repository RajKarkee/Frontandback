@extends('layouts.app')

@section('title', 'Industries We Serve - Chartered Insights')
@section('meta_description', 'Discover how Chartered Insights provides specialized accounting, audit, and advisory services across diverse industries including healthcare, manufacturing, technology, real estate, and more.')

@push('styles')
<style>
.expertise-icon-container {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 2rem;
    height: 2rem;
}

.expertise-icon-container svg {
    width: 100% !important;
    height: 100% !important;
    display: block !important;
    color: white !important;
    fill: currentColor !important;
    stroke: currentColor !important;
}
</style>
@endpush

@section('content')
<!-- Dynamic Hero Section -->
<x-jumbotron page-slug="industries" />

<!-- Industries Overview -->
<section class="section">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Our Industry Expertise</h2>
            <p class="section-subtitle">
                We understand that every industry has its unique challenges, regulations, and opportunities. Our specialized teams deliver targeted solutions that drive results.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($industries as $index => $industry)
            <!-- {{ $industry->name }} -->
            <div class="industry-card service-card fade-in @if($index % 3 == 1) fade-in-delay-1 @elseif($index % 3 == 2) fade-in-delay-2 @endif">
                <div class="service-icon-wrapper">
                    @if($industry->svg_icon)
                        <svg class="service-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $industry->svg_icon }}" />
                        </svg>
                    @elseif($industry->icon)
                        <i class="{{ $industry->icon }} service-icon"></i>
                    @else
                        <svg class="service-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    @endif
                </div>
                <h3 class="service-title">{{ $industry->title ?: $industry->name }}</h3>
                <p class="service-description">
                    {{ $industry->description }}
                </p>
                @if($industry->features && is_array($industry->features) && count($industry->features) > 0)
                <ul class="industry-features">
                    @foreach($industry->features as $feature)
                        <li>{{ $feature }}</li>
                    @endforeach
                </ul>
                @endif
                {{-- <div class="mt-4">
                    <a href="{{ route('industries.show', $industry->slug) }}" class="btn-link">
                        Learn More
                        <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div> --}}
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Industry Insights -->
<section class="section bg-audit-grey">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Industry-Specific Insights</h2>
            <p class="section-subtitle">
                Stay informed with our latest industry analysis and expert commentary on sector-specific trends and challenges.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <article class="blog-card group relative overflow-hidden rounded-lg shadow-lg cursor-pointer fade-in">
                <div class="relative h-64 w-full">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-110"
                         style="background-image: url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=800&auto=format&fit=crop');">
                    </div>

                    <!-- Always visible gradient and title (hidden on hover) -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent group-hover:opacity-0 transition-opacity duration-300"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6 text-white group-hover:opacity-0 transition-opacity duration-300">
                        <h3 class="text-xl font-semibold mb-2">
                            Digital Health Revolution: Financial Implications
                        </h3>
                    </div>

                    <!-- Hover overlay with full content -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="absolute inset-0 flex flex-col justify-end p-6 text-white transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                        <span class="inline-block px-3 py-1 bg-fresh-teal text-crisp-white text-sm rounded-full mb-3 w-fit">Healthcare</span>
                        <h3 class="text-xl font-semibold mb-2">
                            Digital Health Revolution: Financial Implications
                        </h3>
                        <p class="text-sm text-gray-200 mb-4">
                            How telemedicine and digital health platforms are transforming healthcare finance and what providers need to know.
                        </p>
                        <div class="text-xs text-gray-300">
                            <span>January 12, 2024</span> • <span>6 min read</span>
                        </div>
                    </div>
                </div>
            </article>

            <article class="blog-card group relative overflow-hidden rounded-lg shadow-lg cursor-pointer fade-in fade-in-delay-1">
                <div class="relative h-64 w-full">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-110"
                         style="background-image: url('https://images.unsplash.com/photo-1565514020179-026b92b84bb6?q=80&w=800&auto=format&fit=crop');">
                    </div>

                    <!-- Always visible gradient and title (hidden on hover) -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent group-hover:opacity-0 transition-opacity duration-300"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6 text-white group-hover:opacity-0 transition-opacity duration-300">
                        <h3 class="text-xl font-semibold mb-2">
                            Industry 4.0: Cost Accounting for Smart Manufacturing
                        </h3>
                    </div>

                    <!-- Hover overlay with full content -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="absolute inset-0 flex flex-col justify-end p-6 text-white transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                        <span class="inline-block px-3 py-1 bg-fresh-teal text-crisp-white text-sm rounded-full mb-3 w-fit">Manufacturing</span>
                        <h3 class="text-xl font-semibold mb-2">
                            Industry 4.0: Cost Accounting for Smart Manufacturing
                        </h3>
                        <p class="text-sm text-gray-200 mb-4">
                            Understanding the financial impact of automation and IoT integration in modern manufacturing operations.
                        </p>
                        <div class="text-xs text-gray-300">
                            <span>January 8, 2024</span> • <span>7 min read</span>
                        </div>
                    </div>
                </div>
            </article>

            <article class="blog-card group relative overflow-hidden rounded-lg shadow-lg cursor-pointer fade-in fade-in-delay-2">
                <div class="relative h-64 w-full">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-110"
                         style="background-image: url('https://images.unsplash.com/photo-1560472354-b33ff0c44a43?q=80&w=800&auto=format&fit=crop');">
                    </div>

                    <!-- Always visible gradient and title (hidden on hover) -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent group-hover:opacity-0 transition-opacity duration-300"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6 text-white group-hover:opacity-0 transition-opacity duration-300">
                        <h3 class="text-xl font-semibold mb-2">
                            Startup Valuations in Nepal's Tech Ecosystem
                        </h3>
                    </div>

                    <!-- Hover overlay with full content -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="absolute inset-0 flex flex-col justify-end p-6 text-white transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                        <span class="inline-block px-3 py-1 bg-fresh-teal text-crisp-white text-sm rounded-full mb-3 w-fit">Technology</span>
                        <h3 class="text-xl font-semibold mb-2">
                            Startup Valuations in Nepal's Tech Ecosystem
                        </h3>
                        <p class="text-sm text-gray-200 mb-4">
                            Analysis of valuation methodologies and financial planning strategies for Nepal's growing tech startup scene.
                        </p>
                        <div class="text-xs text-gray-300">
                            <span>January 5, 2024</span> • <span>8 min read</span>
                        </div>
                    </div>
                </div>
            </article>
        </div>

        <div class="text-center mt-8 fade-in">
            <a href="{{ route('insights') }}" class="btn-outline">
                View All Industry Insights
                <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
    </div>
</section>


<section class="section">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Why Choose Our Industry Expertise?</h2>
            <p class="section-subtitle">
                We combine deep industry knowledge with technical excellence to deliver solutions that address your sector's unique challenges.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($expertises as $index => $expertise)
            <div class="text-center fade-in {{ $index > 0 ? 'fade-in-delay-' . $index : '' }}">
                <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4"
                     style="background-color: {{ $expertise->color_theme ?? '#10b981' }};">
                    @if($expertise->svg_icon)
                        <div class="expertise-icon-container text-crisp-white">
                            {!! $expertise->svg_icon !!}
                        </div>
                    @elseif($expertise->icon_class)
                        <i class="{{ $expertise->icon_class }} text-crisp-white text-2xl"></i>
                    @else
                        <svg class="w-8 h-8 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                    @endif
                </div>
                <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-3">{{ $expertise->title }}</h3>
                <p class="text-report-black">
                    {{ $expertise->description }}
                </p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section bg-deep-chartered-blue text-crisp-white">
    <div class="container-custom">
        <div class="text-center fade-in">
            <h2 class="text-3xl lg:text-4xl font-montserrat font-bold mb-6">
                Ready to Partner with Industry Experts?
            </h2>
            <p class="text-xl mb-8 max-w-3xl mx-auto">
                Whether you're looking to optimize operations, ensure compliance, or drive growth, our industry-specialized teams are ready to help you achieve your goals.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact') }}" class="btn-primary bg-fresh-teal hover:bg-opacity-90">
                    Schedule a Consultation
                    <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
                <a href="{{ route('services') }}" class="btn-outline border-crisp-white text-crisp-white hover:bg-crisp-white hover:text-deep-chartered-blue">
                    Explore Our Services
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.industry-features {
    list-style: none;
    margin-top: 1rem;
}

.industry-features li {
    position: relative;
    padding-left: 1.5rem;
    margin-bottom: 0.5rem;
    color: #666;
    font-size: 0.9rem;
}

.industry-features li:before {
    content: "✓";
    position: absolute;
    left: 0;
    color: #00BFB2;
    font-weight: bold;
}

.industry-card:hover {
    transform: translateY(-4px);
}

.industry-card {
    display: flex;
    flex-direction: column;
}

.btn-link {
    display: inline-flex;
    align-items: center;
    color: #00BFB2;
    font-weight: 500;
    text-decoration: none;
    transition: color 0.3s ease;
    margin-top: auto;
}

.btn-link:hover {
    color: #008B7A;
}

/* Blog Card Overlay Animation Styles */
.blog-card {
    transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.blog-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

@media (max-width: 768px) {
    .blog-card .absolute.inset-0.flex {
        transform: translateY(0);
        opacity: 1;
        background: rgba(0, 0, 0, 0.6);
    }

    .blog-card .absolute.inset-0.bg-gradient-to-t {
        opacity: 1;
    }
}
</style>
@endpush
