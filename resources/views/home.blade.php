@extends('layouts.app')

@section('title', 'Chartered Insights - Leading Chartered Accountancy Services in Nepal')
@section('meta_description', 'Leading Chartered Accountancy firm in Nepal providing comprehensive audit, tax, risk advisory, and business consulting services that drive sustainable growth.')

@section('content')
<!-- Dynamic Hero Section -->
<x-jumbotron page-slug="home" height="80vh" min-height="80vh">

</x-jumbotron>

<!-- Key Statistics -->
<section class="section bg-audit-grey">
    <div class="container-custom">
        @if($homeSetting && $homeSetting->key_statistics_title)
            <div class="section-header fade-in text-center mb-8">
                <h2 class="section-title">{{ $homeSetting->key_statistics_title }}</h2>
            </div>
        @endif

        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            @if($homeSetting && $homeSetting->statistics && is_array($homeSetting->statistics))
                @foreach($homeSetting->statistics as $index => $statistic)
                    <div class="stat-item fade-in {{ $index > 0 ? 'fade-in-delay-' . $index : '' }}">
                        <div class="stat-number" data-target="{{ $statistic['number'] ?? '0' }}">0</div>
                        <div class="stat-label">{{ $statistic['label'] ?? 'Statistic' }}</div>
                    </div>
                @endforeach
            @else
                <!-- Fallback to hardcoded statistics if none configured -->
                <div class="stat-item fade-in">
                    <div class="stat-number" data-target="100">0</div>
                    <div class="stat-label">Happy Clients</div>
                </div>
                <div class="stat-item fade-in fade-in-delay-1">
                    <div class="stat-number" data-target="15">0</div>
                    <div class="stat-label">Years Experience</div>
                </div>
                <div class="stat-item fade-in fade-in-delay-2">
                    <div class="stat-number" data-target="500">0</div>
                    <div class="stat-label">Projects Completed</div>
                </div>
                <div class="stat-item fade-in fade-in-delay-3">
                    <div class="stat-number" data-target="25">0</div>
                    <div class="stat-label">Expert Team Members</div>
                </div>
            @endif
        </div>
    </div>
</section>


@includeIf('front.cache.home.services')
<!-- Industries We Serve -->
@includeIf('front.cache.home.industries')

<!-- Why Choose Us -->
<section class="section">
    <div class="container-custom">
        <div class="section-header fade-in">
            @if($homeSetting && $homeSetting->why_choose_us_title)
                <h2 class="section-title">{{ $homeSetting->why_choose_us_title }}</h2>
            @else
                <h2 class="section-title">Why Choose Chartered Insights</h2>
            @endif
            <p class="section-subtitle">
                Partner with a firm that combines deep expertise, proven methodologies, and unwavering commitment to your success.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="fade-in">
                @if($homeSetting && $homeSetting->why_choose_us_image)
                    <img src="{{ asset('storage/' . $homeSetting->why_choose_us_image) }}"
                         alt="{{ $homeSetting->why_choose_us_image_alt ?? 'Professional team collaboration' }}"
                         class="rounded-lg shadow-xl w-full h-auto">
                @else
                    <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?q=80&w=800&auto=format&fit=crop"
                         alt="Professional team collaboration"
                         class="rounded-lg shadow-xl w-full h-auto">
                @endif
            </div>

            <div class="space-y-6">
                @if($homeSetting && $homeSetting->features && is_array($homeSetting->features))
                    @foreach($homeSetting->features as $index => $feature)
                        <div class="flex items-start space-x-4 fade-in {{ $index > 0 ? 'fade-in-delay-' . $index : '' }}">
                            <div class="flex-shrink-0 w-8 h-8 bg-fresh-teal rounded-full flex items-center justify-center">
                                @if(isset($feature['icon']) && $feature['icon'])
                                    <i class="{{ $feature['icon'] }} w-5 h-5 text-crisp-white"></i>
                                @else
                                    <svg class="w-5 h-5 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                @endif
                            </div>
                            <div>
                                <h4 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-2">{{ $feature['title'] ?? 'Feature Title' }}</h4>
                                <p class="text-report-black">{{ $feature['description'] ?? 'Feature description' }}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- Fallback to hardcoded features -->
                    <div class="flex items-start space-x-4 fade-in">
                        <div class="flex-shrink-0 w-8 h-8 bg-fresh-teal rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-2">Partner-Led Engagements</h4>
                            <p class="text-report-black">Every assignment is directly supervised by a partner or senior professional to ensure quality, accountability, and strategic insight.</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4 fade-in fade-in-delay-1">
                        <div class="flex-shrink-0 w-8 h-8 bg-fresh-teal rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-2">Deep Industry Expertise</h4>
                            <p class="text-report-black">Specialized knowledge across multiple sectors, ensuring tailored solutions that address your industry-specific challenges.</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4 fade-in fade-in-delay-2">
                        <div class="flex-shrink-0 w-8 h-8 bg-fresh-teal rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-2">Technology-Enabled Solutions</h4>
                            <p class="text-report-black">Leveraging cutting-edge technology and digital tools to deliver efficient, accurate, and timely results.</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4 fade-in fade-in-delay-3">
                        <div class="flex-shrink-0 w-8 h-8 bg-fresh-teal rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-2">Client-Centric Approach</h4>
                            <p class="text-report-black">Building long-term partnerships through exceptional service, clear communication, and measurable results.</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Latest Insights -->
<section class="section bg-audit-grey">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Latest Insights</h2>
            <p class="section-subtitle">
                Stay informed with our latest thought leadership, industry analysis, and expert perspectives.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <article class="blog-card fade-in group cursor-pointer overflow-hidden rounded-lg bg-white shadow-md hover:shadow-2xl transform transition-all duration-500 ease-out hover:scale-[1.02] relative h-80">
                <!-- Background Image -->
                <div class="absolute inset-0 w-full h-full">
                    <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?q=80&w=800&auto=format&fit=crop"
                         alt="Digital transformation in accounting"
                         class="w-full h-full object-cover transition-all duration-700 ease-out group-hover:scale-110 group-hover:brightness-50">
                </div>

                <!-- Dark overlay on hover -->
                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/60 transition-all duration-500 ease-out"></div>

                <!-- Non-hover content - Bottom overlay -->
                <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/80 to-transparent group-hover:opacity-0 transition-opacity duration-500">
                    <span class="text-xs font-semibold text-white/80 uppercase tracking-wide">CASE STUDY</span>
                    <h3 class="text-xl font-semibold text-white mt-1">
                        Digital Transformation in Modern Accounting Practices
                    </h3>
                </div>

                <!-- Hover content - Center content -->
                <div class="absolute inset-0 flex flex-col justify-center items-center p-6 text-center opacity-0 group-hover:opacity-100 transition-all duration-500 ease-out transform translate-y-4 group-hover:translate-y-0">
                    <span class="text-sm font-semibold text-white/90 uppercase tracking-wide mb-3">CASE STUDY</span>
                    <h3 class="text-2xl font-bold text-white mb-4 leading-tight">
                        <a href="{{ route('insights') }}" class="hover:text-fresh-teal transition-colors duration-300">
                            Digital Transformation in Modern Accounting Practices
                        </a>
                    </h3>
                    <p class="text-white/90 text-base leading-relaxed">
                        Exploring how technology is reshaping the accounting landscape and what it means for businesses in Nepal.
                    </p>
                </div>
            </article>

            <article class="blog-card fade-in fade-in-delay-1 group cursor-pointer overflow-hidden rounded-lg bg-white shadow-md hover:shadow-2xl transform transition-all duration-500 ease-out hover:scale-[1.02] relative h-80">
                <!-- Background Image -->
                <div class="absolute inset-0 w-full h-full">
                    <img src="https://images.unsplash.com/photo-1559526324-4b87b5e36e44?q=80&w=800&auto=format&fit=crop"
                         alt="Tax compliance strategies"
                         class="w-full h-full object-cover transition-all duration-700 ease-out group-hover:scale-110 group-hover:brightness-50">
                </div>

                <!-- Dark overlay on hover -->
                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/60 transition-all duration-500 ease-out"></div>

                <!-- Non-hover content - Bottom overlay -->
                <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/80 to-transparent group-hover:opacity-0 transition-opacity duration-500">
                    <span class="text-xs font-semibold text-white/80 uppercase tracking-wide">CASE STUDY</span>
                    <h3 class="text-xl font-semibold text-white mt-1">
                        Strategic Tax Planning for Growing Businesses
                    </h3>
                </div>

                <!-- Hover content - Center content -->
                <div class="absolute inset-0 flex flex-col justify-center items-center p-6 text-center opacity-0 group-hover:opacity-100 transition-all duration-500 ease-out transform translate-y-4 group-hover:translate-y-0">
                    <span class="text-sm font-semibold text-white/90 uppercase tracking-wide mb-3">CASE STUDY</span>
                    <h3 class="text-2xl font-bold text-white mb-4 leading-tight">
                        <a href="{{ route('insights') }}" class="hover:text-fresh-teal transition-colors duration-300">
                            Strategic Tax Planning for Growing Businesses
                        </a>
                    </h3>
                    <p class="text-white/90 text-base leading-relaxed">
                        Essential tax strategies and compliance considerations for businesses expanding in Nepal's evolving market.
                    </p>
                </div>
            </article>

            <article class="blog-card fade-in fade-in-delay-2 group cursor-pointer overflow-hidden rounded-lg bg-white shadow-md hover:shadow-2xl transform transition-all duration-500 ease-out hover:scale-[1.02] relative h-80">
                <!-- Background Image -->
                <div class="absolute inset-0 w-full h-full">
                    <img src="https://images.unsplash.com/photo-1507679799987-c73779587ccf?q=80&w=800&auto=format&fit=crop"
                         alt="Risk management insights"
                         class="w-full h-full object-cover transition-all duration-700 ease-out group-hover:scale-110 group-hover:brightness-50">
                </div>

                <!-- Dark overlay on hover -->
                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/60 transition-all duration-500 ease-out"></div>

                <!-- Non-hover content - Bottom overlay -->
                <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/80 to-transparent group-hover:opacity-0 transition-opacity duration-500">
                    <span class="text-xs font-semibold text-white/80 uppercase tracking-wide">CASE STUDY</span>
                    <h3 class="text-xl font-semibold text-white mt-1">
                        Risk Management in Uncertain Economic Times
                    </h3>
                </div>

                <!-- Hover content - Center content -->
                <div class="absolute inset-0 flex flex-col justify-center items-center p-6 text-center opacity-0 group-hover:opacity-100 transition-all duration-500 ease-out transform translate-y-4 group-hover:translate-y-0">
                    <span class="text-sm font-semibold text-white/90 uppercase tracking-wide mb-3">CASE STUDY</span>
                    <h3 class="text-2xl font-bold text-white mb-4 leading-tight">
                        <a href="{{ route('insights') }}" class="hover:text-fresh-teal transition-colors duration-300">
                            Risk Management in Uncertain Economic Times
                        </a>
                    </h3>
                    <p class="text-white/90 text-base leading-relaxed">
                        How businesses can build resilient risk management frameworks to navigate economic volatility.
                    </p>
                </div>
            </article>
        </div>

        <div class="text-center mt-12 fade-in">
            <a href="{{ route('insights') }}" class="btn-outline">
                View All Insights
                <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="section bg-deep-chartered-blue text-crisp-white">
    <div class="container-custom">
        <div class="text-center fade-in">
            <h2 class="text-3xl lg:text-4xl font-montserrat font-bold mb-6">
                Ready to Transform Your Business?
            </h2>
            <p class="text-xl mb-8 max-w-3xl mx-auto">
                Partner with Chartered Insights and experience the difference that expert guidance, innovative solutions, and unwavering commitment can make for your organization.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact') }}" class="btn-primary bg-fresh-teal hover:bg-opacity-90">
                    Get Started Today
                    <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
                <a href="{{ route('services') }}" class="btn-secondary border-crisp-white text-crisp-white hover:bg-crisp-white hover:text-deep-chartered-blue">
                    Explore Services
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.hero-section {
    position: relative;
    overflow-x: hidden;
}
.carousel-container {
    width: 100%;
    overflow: hidden;
}
.carousel-item {
    min-width: 100%;
    max-width: 100%;
    box-sizing: border-box;
}
.hero-section img,
.carousel-item img {
    max-width: 100%;
    width: 100%;
    object-fit: cover;
    display: block;
}
@media (max-width: 1024px) {
    .hero-section .grid {
        gap: 2rem !important;
    }
}
.carousel-indicator.active {
    background-color: white !important;
    opacity: 1;
}

.animate-fade-in {
    animation: fadeIn 0.6s ease-out forwards;
}

@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Modern Blog Card Component with Overlay Animation */
.blog-card {
    will-change: transform, box-shadow;
    backface-visibility: hidden;
    transform-style: preserve-3d;
}

/* Card hover state - scale up with enhanced shadow */
.blog-card:hover {
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25), 0 0 0 1px rgba(255, 255, 255, 0.05);
}

/* Image zoom and darken animation */
.blog-card img {
    will-change: transform, filter;
    backface-visibility: hidden;
}

/* Smooth overlay transitions */
.blog-card .absolute {
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Performance optimizations */
.blog-card * {
    transform-origin: center;
}

/* Enhanced link hover effect */
.blog-card a:hover {
    transform: translateX(2px);
    transition: all 0.3s ease;
}

/* Card focus state for accessibility */
.blog-card:focus-within {
    outline: 2px solid #0891b2;
    outline-offset: 2px;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .blog-card:hover {
        transform: scale(1.01); /* Reduced scale on mobile */
    }

    .blog-card {
        height: 280px; /* Smaller height on mobile */
    }
}

/* Enhanced gradient overlay */
.blog-card .bg-gradient-to-t {
    background: linear-gradient(to top, rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0.4) 70%, transparent 100%);
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const slides = document.querySelectorAll('#hero-slider .slide');
    const indicators = document.querySelectorAll('.hero-indicator');
    let current = 0;

    function showSlide(idx) {
        slides.forEach((slide, i) => {
            if (i === idx) {
                slide.classList.add('opacity-100', 'z-10');
                slide.classList.remove('opacity-0', 'pointer-events-none', 'z-0');
            } else {
                slide.classList.remove('opacity-100', 'z-10');
                slide.classList.add('opacity-0', 'pointer-events-none', 'z-0');
            }
        });
        indicators.forEach((ind, i) => {
            if (i === idx) {
                ind.classList.add('bg-opacity-100');
                ind.classList.remove('bg-opacity-50');
            } else {
                ind.classList.remove('bg-opacity-100');
                ind.classList.add('bg-opacity-50');
            }
        });
    }
    function next() { current = (current + 1) % slides.length; showSlide(current); }
    function prev() { current = (current - 1 + slides.length) % slides.length; showSlide(current); }
    indicators.forEach((btn, i) => btn.addEventListener('click', () => { current = i; showSlide(current); }));
    document.getElementById('hero-next').onclick = next;
    document.getElementById('hero-prev').onclick = prev;
    showSlide(current);
    setInterval(next, 7000);
});
</script>
@endpush
