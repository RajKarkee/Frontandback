@extends('layouts.app')

@section('title', 'Chartered Insights - Leading Chartered Accountancy Services in Nepal')
@section('meta_description', 'Leading Chartered Accountancy firm in Nepal providing comprehensive audit, tax, risk advisory, and business consulting services that drive sustainable growth.')

@section('content')
<!-- Hero Section -->
<section class="hero-section relative overflow-x-hidden p-0 m-0">
    <div class="relative w-full p-0 m-0">
        <div class="relative w-full h-[80vh] min-h-[80vh] overflow-hidden">
            {{-- Slides --}}
            <div class="absolute inset-0 w-full h-full transition-all duration-700 ease-in-out" id="hero-slider">
                {{-- Slide 1 --}}
                <div class="slide absolute inset-0 w-full h-full bg-cover bg-center transition-all duration-700 ease-in-out opacity-100 z-10"
                    style="background-image: url('https://images.unsplash.com/photo-1560472354-b33ff0c44a43?q=80&w=1600&auto=format&fit=crop');">
                    <div class="absolute inset-0 bg-black/40"></div>
                    <div class="relative z-20 flex flex-col items-center justify-center h-full text-center text-crisp-white px-4 md:px-12">
                        <h1 class="font-montserrat text-3xl md:text-5xl lg:text-6xl font-bold mb-6 drop-shadow-lg">
                            Chartered Excellence, Trusted Results
                        </h1>
                        <p class="font-lato text-lg md:text-2xl max-w-2xl mx-auto mb-8 drop-shadow">
                            Leading Chartered Accountancy firm in Nepal providing audit, tax, risk advisory, and business consulting services.
                        </p>
                        <a href="{{ route('contact') }}" class="btn-primary inline-flex items-center">
                            Get Started
                            <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </div>
                {{-- Slide 2 --}}
                <div class="slide absolute inset-0 w-full h-full bg-cover bg-center transition-all duration-700 ease-in-out opacity-0 pointer-events-none z-0"
                    style="background-image: url('https://images.unsplash.com/photo-1551434678-e076c223a692?q=80&w=1600&auto=format&fit=crop');">
                    <div class="absolute inset-0 bg-black/40"></div>
                    <div class="relative z-20 flex flex-col items-center justify-center h-full text-center text-crisp-white px-4 md:px-12">
                        <h1 class="font-montserrat text-3xl md:text-5xl lg:text-6xl font-bold mb-6 drop-shadow-lg">
                            Empowering Business Growth
                        </h1>
                        <p class="font-lato text-lg md:text-2xl max-w-2xl mx-auto mb-8 drop-shadow">
                            Transform your business with strategic insights and expert guidance from Nepal's trusted CA professionals.
                        </p>
                        <a href="{{ route('services') }}" class="btn-primary inline-flex items-center">
                            Our Services
                            <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </div>
                {{-- Slide 3 --}}
                <div class="slide absolute inset-0 w-full h-full bg-cover bg-center transition-all duration-700 ease-in-out opacity-0 pointer-events-none z-0"
                    style="background-image: url('https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=1600&auto=format&fit=crop');">
                    <div class="absolute inset-0 bg-black/40"></div>
                    <div class="relative z-20 flex flex-col items-center justify-center h-full text-center text-crisp-white px-4 md:px-12">
                        <h1 class="font-montserrat text-3xl md:text-5xl lg:text-6xl font-bold mb-6 drop-shadow-lg">
                            Precision. Integrity. Results.
                        </h1>
                        <p class="font-lato text-lg md:text-2xl max-w-2xl mx-auto mb-8 drop-shadow">
                            Experience the difference with a partner-led approach and technology-enabled solutions.
                        </p>
                        <a href="{{ route('insights') }}" class="btn-primary inline-flex items-center">
                            Read Insights
                            <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            {{-- Arrow Navigation --}}
            <button id="hero-prev" class="absolute left-4 top-1/2 -translate-y-1/2 z-30 bg-black/40 hover:bg-black/60 text-white rounded-full p-2 transition-all duration-200">
                {{-- Lucide: chevron-left --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>
            <button id="hero-next" class="absolute right-4 top-1/2 -translate-y-1/2 z-30 bg-black/40 hover:bg-black/60 text-white rounded-full p-2 transition-all duration-200">
                {{-- Lucide: chevron-right --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
            {{-- Carousel Indicators --}}
            <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex space-x-2 z-30">
                <button class="hero-indicator w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100 transition-all duration-200"></button>
                <button class="hero-indicator w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100 transition-all duration-200"></button>
                <button class="hero-indicator w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100 transition-all duration-200"></button>
            </div>
        </div>
    </div>
</section>

<!-- Key Statistics -->
<section class="section bg-audit-grey">
    <div class="container-custom">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
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
        </div>
    </div>
</section>

<!-- Services Overview -->
<section class="section">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Our Core Services</h2>
            <p class="section-subtitle">
                Comprehensive chartered accountancy services designed to drive your business forward with precision, integrity, and strategic insight.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="service-card fade-in">
                <svg class="service-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg>
                <h3 class="service-title">Audit & Assurance</h3>
                <p class="service-description">
                    Independent audits, reviews, and assurance services that provide confidence in your financial reporting and compliance.
                </p>
                <a href="{{ route('services') }}" class="text-fresh-teal font-semibold hover:text-deep-chartered-blue transition-colors duration-200">
                    Learn More →
                </a>
            </div>

            <div class="service-card fade-in fade-in-delay-1">
                <svg class="service-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                </svg>
                <h3 class="service-title">Tax Advisory</h3>
                <p class="service-description">
                    Strategic tax planning, compliance, and advisory services to optimize your tax position and ensure regulatory adherence.
                </p>
                <a href="{{ route('services') }}" class="text-fresh-teal font-semibold hover:text-deep-chartered-blue transition-colors duration-200">
                    Learn More →
                </a>
            </div>

            <div class="service-card fade-in fade-in-delay-2">
                <svg class="service-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
                <h3 class="service-title">Risk Advisory</h3>
                <p class="service-description">
                    Comprehensive risk assessment, management strategies, and internal control solutions to protect and strengthen your organization.
                </p>
                <a href="{{ route('services') }}" class="text-fresh-teal font-semibold hover:text-deep-chartered-blue transition-colors duration-200">
                    Learn More →
                </a>
            </div>

            <div class="service-card fade-in">
                <svg class="service-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
                <h3 class="service-title">Business Consulting</h3>
                <p class="service-description">
                    Strategic advisory services, process optimization, and growth planning to help your business reach its full potential.
                </p>
                <a href="{{ route('services') }}" class="text-fresh-teal font-semibold hover:text-deep-chartered-blue transition-colors duration-200">
                    Learn More →
                </a>
            </div>

            <div class="service-card fade-in fade-in-delay-1">
                <svg class="service-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                </svg>
                <h3 class="service-title">Financial Reporting</h3>
                <p class="service-description">
                    Professional financial statement preparation, analysis, and reporting services that meet international standards.
                </p>
                <a href="{{ route('services') }}" class="text-fresh-teal font-semibold hover:text-deep-chartered-blue transition-colors duration-200">
                    Learn More →
                </a>
            </div>

            <div class="service-card fade-in fade-in-delay-2">
                <svg class="service-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <h3 class="service-title">Corporate Advisory</h3>
                <p class="service-description">
                    Strategic corporate guidance, governance consulting, and transaction advisory to support your business objectives.
                </p>
                <a href="{{ route('services') }}" class="text-fresh-teal font-semibold hover:text-deep-chartered-blue transition-colors duration-200">
                    Learn More →
                </a>
            </div>
        </div>

        <div class="text-center mt-12 fade-in">
            <a href="{{ route('services') }}" class="btn-primary">
                View All Services
                <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- Industries We Serve -->
<section class="section bg-audit-grey">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Industries We Serve</h2>
            <p class="section-subtitle">
                Deep industry expertise across diverse sectors, bringing specialized knowledge to meet your unique challenges.
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <div class="text-center p-6 bg-crisp-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 fade-in">
                <div class="text-fresh-teal mb-3">
                    <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <h4 class="font-montserrat font-semibold text-deep-chartered-blue">Banking & Finance</h4>
            </div>

            <div class="text-center p-6 bg-crisp-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 fade-in fade-in-delay-1">
                <div class="text-fresh-teal mb-3">
                    <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <h4 class="font-montserrat font-semibold text-deep-chartered-blue">Manufacturing</h4>
            </div>

            <div class="text-center p-6 bg-crisp-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 fade-in fade-in-delay-2">
                <div class="text-fresh-teal mb-3">
                    <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <h4 class="font-montserrat font-semibold text-deep-chartered-blue">Education</h4>
            </div>

            <div class="text-center p-6 bg-crisp-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 fade-in fade-in-delay-3">
                <div class="text-fresh-teal mb-3">
                    <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </div>
                <h4 class="font-montserrat font-semibold text-deep-chartered-blue">Healthcare</h4>
            </div>
        </div>

        <div class="text-center mt-12 fade-in">
            <a href="{{ route('industries') }}" class="btn-outline">
                View All Industries
                <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="section">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Why Choose Chartered Insights</h2>
            <p class="section-subtitle">
                Partner with a firm that combines deep expertise, proven methodologies, and unwavering commitment to your success.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="fade-in">
                <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?q=80&w=800&auto=format&fit=crop"
                     alt="Professional team collaboration"
                     class="rounded-lg shadow-xl w-full h-auto">
            </div>

            <div class="space-y-6">
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
            <article class="blog-card fade-in">
                <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?q=80&w=800&auto=format&fit=crop"
                     alt="Digital transformation in accounting"
                     class="blog-image">
                <div class="blog-content">
                    <h3 class="blog-title">
                        <a href="{{ route('insights') }}">Digital Transformation in Modern Accounting Practices</a>
                    </h3>
                    <p class="blog-excerpt">
                        Exploring how technology is reshaping the accounting landscape and what it means for businesses in Nepal.
                    </p>
                    <div class="blog-meta">
                        <span>January 15, 2024</span> • <span>5 min read</span>
                    </div>
                </div>
            </article>

            <article class="blog-card fade-in fade-in-delay-1">
                <img src="https://images.unsplash.com/photo-1559526324-4b87b5e36e44?q=80&w=800&auto=format&fit=crop"
                     alt="Tax compliance strategies"
                     class="blog-image">
                <div class="blog-content">
                    <h3 class="blog-title">
                        <a href="{{ route('insights') }}">Strategic Tax Planning for Growing Businesses</a>
                    </h3>
                    <p class="blog-excerpt">
                        Essential tax strategies and compliance considerations for businesses expanding in Nepal's evolving market.
                    </p>
                    <div class="blog-meta">
                        <span>January 10, 2024</span> • <span>7 min read</span>
                    </div>
                </div>
            </article>

            <article class="blog-card fade-in fade-in-delay-2">
                <img src="https://images.unsplash.com/photo-1507679799987-c73779587ccf?q=80&w=800&auto=format&fit=crop"
                     alt="Risk management insights"
                     class="blog-image">
                <div class="blog-content">
                    <h3 class="blog-title">
                        <a href="{{ route('insights') }}">Risk Management in Uncertain Economic Times</a>
                    </h3>
                    <p class="blog-excerpt">
                        How businesses can build resilient risk management frameworks to navigate economic volatility.
                    </p>
                    <div class="blog-meta">
                        <span>January 5, 2024</span> • <span>6 min read</span>
                    </div>
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
