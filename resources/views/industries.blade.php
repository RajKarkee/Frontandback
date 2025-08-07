@extends('layouts.app')

@section('title', 'Industries We Serve - Chartered Insights')
@section('meta_description', 'Discover how Chartered Insights provides specialized accounting, audit, and advisory services across diverse industries including healthcare, manufacturing, technology, real estate, and more.')

@section('content')
<!-- Hero Section -->
<section class="hero-section relative overflow-x-hidden p-0 m-0">
    <div class="relative w-full p-0 m-0">
        <div class="relative w-full h-[60vh] min-h-[60vh] overflow-hidden">
            <div class="absolute inset-0 w-full h-full bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1464983953574-0892a716854b?q=80&w=1600&auto=format&fit=crop');"></div>
            <div class="absolute inset-0 bg-black/40"></div>
            <div class="relative z-20 flex flex-col items-center justify-center h-full text-center text-crisp-white px-4 md:px-12">
                <h1 class="hero-title">Industries We Serve</h1>
                <p class="hero-subtitle max-w-4xl mx-auto">
                    With deep industry expertise across diverse sectors, we provide specialized accounting, audit, and advisory services tailored to your industry's unique challenges and opportunities.
                </p>
            </div>
        </div>
    </div>
</section>

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
            <!-- Healthcare -->
            <div class="industry-card service-card fade-in">
                <div class="service-icon-wrapper">
                    <svg class="service-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </div>
                <h3 class="service-title">Healthcare & Medical</h3>
                <p class="service-description">
                    Specialized financial solutions for hospitals, clinics, pharmaceutical companies, and healthcare providers navigating complex regulatory requirements and funding challenges.
                </p>
                <ul class="industry-features">
                    <li>Medical practice accounting</li>
                    <li>Healthcare compliance audits</li>
                    <li>Revenue cycle management</li>
                    <li>Medical equipment financing</li>
                </ul>
            </div>

            <!-- Manufacturing -->
            <div class="industry-card service-card fade-in fade-in-delay-1">
                <div class="service-icon-wrapper">
                    <svg class="service-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                    </svg>
                </div>
                <h3 class="service-title">Manufacturing & Industrial</h3>
                <p class="service-description">
                    Comprehensive financial management for manufacturers, including inventory valuation, cost accounting, supply chain optimization, and regulatory compliance.
                </p>
                <ul class="industry-features">
                    <li>Cost accounting systems</li>
                    <li>Inventory management</li>
                    <li>Supply chain finance</li>
                    <li>Industrial tax planning</li>
                </ul>
            </div>

            <!-- Technology -->
            <div class="industry-card service-card fade-in fade-in-delay-2">
                <div class="service-icon-wrapper">
                    <svg class="service-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="service-title">Technology & Software</h3>
                <p class="service-description">
                    Supporting tech companies and software developers with specialized accounting for intellectual property, R&D tax credits, and venture capital transactions.
                </p>
                <ul class="industry-features">
                    <li>Software revenue recognition</li>
                    <li>R&D tax incentives</li>
                    <li>IP valuation</li>
                    <li>Startup financial planning</li>
                </ul>
            </div>

            <!-- Real Estate -->
            <div class="industry-card service-card fade-in">
                <div class="service-icon-wrapper">
                    <svg class="service-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <h3 class="service-title">Real Estate & Construction</h3>
                <p class="service-description">
                    Specialized services for real estate developers, construction companies, and property management firms, including project accounting and asset valuation.
                </p>
                <ul class="industry-features">
                    <li>Project cost accounting</li>
                    <li>Property valuation</li>
                    <li>Construction audits</li>
                    <li>Real estate tax planning</li>
                </ul>
            </div>

            <!-- Financial Services -->
            <div class="industry-card service-card fade-in fade-in-delay-1">
                <div class="service-icon-wrapper">
                    <svg class="service-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                    </svg>
                </div>
                <h3 class="service-title">Financial Services</h3>
                <p class="service-description">
                    Comprehensive solutions for banks, insurance companies, investment firms, and fintech companies navigating complex regulatory environments.
                </p>
                <ul class="industry-features">
                    <li>Banking compliance</li>
                    <li>Insurance accounting</li>
                    <li>Investment audits</li>
                    <li>Fintech advisory</li>
                </ul>
            </div>

            <!-- Non-Profit -->
            <div class="industry-card service-card fade-in fade-in-delay-2">
                <div class="service-icon-wrapper">
                    <svg class="service-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </div>
                <h3 class="service-title">Non-Profit & NGOs</h3>
                <p class="service-description">
                    Specialized accounting and compliance services for non-profit organizations, NGOs, and charitable institutions ensuring transparency and accountability.
                </p>
                <ul class="industry-features">
                    <li>Grant accounting</li>
                    <li>Donor compliance</li>
                    <li>Impact reporting</li>
                    <li>Non-profit audits</li>
                </ul>
            </div>

            <!-- Hospitality -->
            <div class="industry-card service-card fade-in">
                <div class="service-icon-wrapper">
                    <svg class="service-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <h3 class="service-title">Hospitality & Tourism</h3>
                <p class="service-description">
                    Financial management solutions for hotels, restaurants, travel agencies, and tourism businesses, focusing on seasonal variations and operational efficiency.
                </p>
                <ul class="industry-features">
                    <li>Hotel revenue management</li>
                    <li>Restaurant accounting</li>
                    <li>Tourism tax planning</li>
                    <li>Seasonal cash flow</li>
                </ul>
            </div>

            <!-- Education -->
            <div class="industry-card service-card fade-in fade-in-delay-1">
                <div class="service-icon-wrapper">
                    <svg class="service-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <h3 class="service-title">Education & Training</h3>
                <p class="service-description">
                    Comprehensive financial services for educational institutions, training centers, and e-learning platforms, ensuring efficient resource management and compliance.
                </p>
                <ul class="industry-features">
                    <li>Educational accounting</li>
                    <li>Student fee management</li>
                    <li>Institutional audits</li>
                    <li>Education compliance</li>
                </ul>
            </div>

            <!-- Retail -->
            <div class="industry-card service-card fade-in fade-in-delay-2">
                <div class="service-icon-wrapper">
                    <svg class="service-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                </div>
                <h3 class="service-title">Retail & E-commerce</h3>
                <p class="service-description">
                    Financial solutions for retailers and e-commerce businesses, including inventory management, multi-channel revenue tracking, and customer analytics.
                </p>
                <ul class="industry-features">
                    <li>Retail accounting systems</li>
                    <li>E-commerce analytics</li>
                    <li>Multi-channel reporting</li>
                    <li>Customer profitability</li>
                </ul>
            </div>
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

<!-- Why Choose Us -->
<section class="section">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Why Choose Our Industry Expertise?</h2>
            <p class="section-subtitle">
                We combine deep industry knowledge with technical excellence to deliver solutions that address your sector's unique challenges.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center fade-in">
                <div class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-3">Specialized Knowledge</h3>
                <p class="text-report-black">
                    Our teams have deep expertise in industry-specific regulations, standards, and best practices.
                </p>
            </div>

            <div class="text-center fade-in fade-in-delay-1">
                <div class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-3">Proven Results</h3>
                <p class="text-report-black">
                    Track record of delivering measurable improvements in financial performance across industries.
                </p>
            </div>

            <div class="text-center fade-in fade-in-delay-2">
                <div class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-3">Collaborative Approach</h3>
                <p class="text-report-black">
                    We work closely with your teams to ensure solutions align with operational realities.
                </p>
            </div>

            <div class="text-center fade-in">
                <div class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>
                </div>
                <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-3">Innovation Focus</h3>
                <p class="text-report-black">
                    We leverage the latest technology and methodologies to drive efficiency and insights.
                </p>
            </div>
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
