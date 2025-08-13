@extends('layouts.app')

@section('title', 'Insights & Articles - Chartered Insights')
@section('meta_description', 'Stay informed with latest insights, industry analysis, and expert perspectives from Chartered Insights on accounting, taxation, and business trends.')

@section('content')
<!-- Hero Section -->
<section class="hero-section relative overflow-x-hidden p-0 m-0">
    <div class="relative w-full p-0 m-0">
        <div class="relative w-full h-[60vh] min-h-[60vh] overflow-hidden">
            <div class="absolute inset-0 w-full h-full bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1464983953574-0892a716854b?q=80&w=1600&auto=format&fit=crop');"></div>
            <div class="absolute inset-0 bg-black/40"></div>
            <div class="relative z-20 flex flex-col items-center justify-center h-full text-center text-crisp-white px-4 md:px-12">
                <h1 class="hero-title">Insights & Articles</h1>
                <p class="hero-subtitle max-w-4xl mx-auto">
                    Stay ahead with our latest thought leadership, industry analysis, and expert perspectives on accounting, taxation, and business trends.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Featured Articles -->
<section class="section">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Featured Articles</h2>
            <p class="section-subtitle">
                Our most popular and impactful insights that are shaping business decisions across industries.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
            <!-- Main Featured Article -->
            <article class="blog-card lg:col-span-2 fade-in group cursor-pointer overflow-hidden rounded-lg bg-white shadow-md hover:shadow-2xl transform transition-all duration-500 ease-out hover:scale-[1.02] relative min-h-[400px]">
                <!-- Mobile: Overlay Style (default on small screens) -->
                <div class="lg:hidden">
                    <!-- Background Image -->
                    <div class="absolute inset-0 w-full h-full">
                        <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?q=80&w=800&auto=format&fit=crop"
                             alt="Digital transformation in accounting"
                             class="w-full h-full object-cover transition-all duration-700 ease-out group-hover:scale-110 group-hover:brightness-50">
                    </div>

                    <!-- Dark overlay on hover -->
                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/60 transition-all duration-500 ease-out"></div>

                    <!-- Non-hover content - Bottom overlay -->
                    <div class="absolute bottom-0 left-0 right-0 p-8 bg-gradient-to-t from-black/80 to-transparent group-hover:opacity-0 transition-opacity duration-500">
                        <span class="inline-block px-3 py-1 bg-fresh-teal text-crisp-white text-sm rounded-full mb-4">Featured</span>
                        <h3 class="text-2xl font-semibold text-white">
                            Digital Transformation in Modern Accounting Practices
                        </h3>
                    </div>

                    <!-- Hover content - Center content -->
                    <div class="absolute inset-0 flex flex-col justify-center items-center p-8 text-center opacity-0 group-hover:opacity-100 transition-all duration-500 ease-out transform translate-y-4 group-hover:translate-y-0">
                        <span class="inline-block px-3 py-1 bg-fresh-teal text-crisp-white text-sm rounded-full mb-4">Featured</span>
                        <h3 class="text-2xl font-bold text-white mb-4 leading-tight">
                            <a href="#" class="hover:text-fresh-teal transition-colors duration-300">
                                Digital Transformation in Modern Accounting Practices
                            </a>
                        </h3>
                        <p class="text-white/90 text-lg leading-relaxed max-w-2xl">
                            Exploring how technology is reshaping the accounting landscape and what it means for businesses in Nepal. From cloud-based solutions to AI-powered analytics, discover the future of financial management.
                        </p>
                        <div class="blog-meta flex items-center text-sm text-white/70 mt-4">
                            <span>January 15, 2024</span>
                            <span class="mx-2">•</span>
                            <span>8 min read</span>
                            <span class="mx-2">•</span>
                            <span>Technology</span>
                        </div>
                    </div>
                </div>

                <!-- Desktop: Traditional Side-by-Side Layout -->
                <div class="hidden lg:grid lg:grid-cols-2 h-full">
                    <!-- Image Side -->
                    <div class="relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?q=80&w=800&auto=format&fit=crop"
                             alt="Digital transformation in accounting"
                             class="w-full h-full object-cover transition-all duration-700 ease-out group-hover:scale-110">
                    </div>

                    <!-- Content Side -->
                    <div class="p-8 flex flex-col justify-center bg-white">
                        <span class="inline-block px-3 py-1 bg-fresh-teal text-crisp-white text-sm rounded-full mb-4 w-fit">Featured</span>
                        <h3 class="text-3xl font-bold text-deep-chartered-blue mb-4 leading-tight">
                            <a href="#" class="hover:text-fresh-teal transition-colors duration-300">
                                Digital Transformation in Modern Accounting Practices
                            </a>
                        </h3>
                        <p class="text-report-black text-lg leading-relaxed mb-6">
                            Exploring how technology is reshaping the accounting landscape and what it means for businesses in Nepal. From cloud-based solutions to AI-powered analytics, discover the future of financial management.
                        </p>
                        <div class="blog-meta flex items-center text-sm text-report-black/70">
                            <span>January 15, 2024</span>
                            <span class="mx-2">•</span>
                            <span>8 min read</span>
                            <span class="mx-2">•</span>
                            <span>Technology</span>
                        </div>
                    </div>
                </div>
            </article>
        </div>

        <!-- Secondary Featured Articles -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <article class="blog-card fade-in group cursor-pointer overflow-hidden rounded-lg bg-white shadow-md hover:shadow-2xl transform transition-all duration-500 ease-out hover:scale-[1.02] relative h-80">
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
                    <span class="text-xs font-semibold text-white/80 uppercase tracking-wide">TAX ADVISORY</span>
                    <h3 class="text-xl font-semibold text-white mt-1">
                        Strategic Tax Planning for Growing Businesses in Nepal
                    </h3>
                </div>

                <!-- Hover content - Center content -->
                <div class="absolute inset-0 flex flex-col justify-center items-center p-6 text-center opacity-0 group-hover:opacity-100 transition-all duration-500 ease-out transform translate-y-4 group-hover:translate-y-0">
                    <span class="text-sm font-semibold text-white/90 uppercase tracking-wide mb-3">TAX ADVISORY</span>
                    <h3 class="text-2xl font-bold text-white mb-4 leading-tight">
                        <a href="#" class="hover:text-fresh-teal transition-colors duration-300">
                            Strategic Tax Planning for Growing Businesses in Nepal
                        </a>
                    </h3>
                    <p class="text-white/90 text-base leading-relaxed">
                        Essential tax strategies and compliance considerations for businesses expanding in Nepal's evolving regulatory landscape.
                    </p>
                </div>
            </article>

            <article class="blog-card fade-in fade-in-delay-1 group cursor-pointer overflow-hidden rounded-lg bg-white shadow-md hover:shadow-2xl transform transition-all duration-500 ease-out hover:scale-[1.02] relative h-80">
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
                    <span class="text-xs font-semibold text-white/80 uppercase tracking-wide">RISK MANAGEMENT</span>
                    <h3 class="text-xl font-semibold text-white mt-1">
                        Building Resilient Risk Management Frameworks
                    </h3>
                </div>

                <!-- Hover content - Center content -->
                <div class="absolute inset-0 flex flex-col justify-center items-center p-6 text-center opacity-0 group-hover:opacity-100 transition-all duration-500 ease-out transform translate-y-4 group-hover:translate-y-0">
                    <span class="text-sm font-semibold text-white/90 uppercase tracking-wide mb-3">RISK MANAGEMENT</span>
                    <h3 class="text-2xl font-bold text-white mb-4 leading-tight">
                        <a href="#" class="hover:text-fresh-teal transition-colors duration-300">
                            Building Resilient Risk Management Frameworks
                        </a>
                    </h3>
                    <p class="text-white/90 text-base leading-relaxed">
                        How businesses can build robust risk management frameworks to navigate economic volatility and operational challenges.
                    </p>
                </div>
            </article>
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
            <div class="category-card text-center p-6 bg-crisp-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 fade-in">
                <svg class="w-12 h-12 text-fresh-teal mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg>
                <h4 class="font-montserrat font-semibold text-deep-chartered-blue">Audit & Assurance</h4>
                <p class="text-sm text-report-black mt-2">12 Articles</p>
            </div>

            <div class="category-card text-center p-6 bg-crisp-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 fade-in fade-in-delay-1">
                <svg class="w-12 h-12 text-fresh-teal mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                </svg>
                <h4 class="font-montserrat font-semibold text-deep-chartered-blue">Tax Advisory</h4>
                <p class="text-sm text-report-black mt-2">15 Articles</p>
            </div>

            <div class="category-card text-center p-6 bg-crisp-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 fade-in fade-in-delay-2">
                <svg class="w-12 h-12 text-fresh-teal mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
                <h4 class="font-montserrat font-semibold text-deep-chartered-blue">Risk Management</h4>
                <p class="text-sm text-report-black mt-2">8 Articles</p>
            </div>

            <div class="category-card text-center p-6 bg-crisp-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 fade-in">
                <svg class="w-12 h-12 text-fresh-teal mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
                <h4 class="font-montserrat font-semibold text-deep-chartered-blue">Business Strategy</h4>
                <p class="text-sm text-report-black mt-2">10 Articles</p>
            </div>

            <div class="category-card text-center p-6 bg-crisp-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 fade-in fade-in-delay-1">
                <svg class="w-12 h-12 text-fresh-teal mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <h4 class="font-montserrat font-semibold text-deep-chartered-blue">Technology</h4>
                <p class="text-sm text-report-black mt-2">6 Articles</p>
            </div>

            <div class="category-card text-center p-6 bg-crisp-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 fade-in fade-in-delay-2">
                <svg class="w-12 h-12 text-fresh-teal mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                </svg>
                <h4 class="font-montserrat font-semibold text-deep-chartered-blue">Compliance</h4>
                <p class="text-sm text-report-black mt-2">9 Articles</p>
            </div>
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
            <article class="blog-card fade-in group cursor-pointer overflow-hidden rounded-lg bg-white shadow-md hover:shadow-2xl transform transition-all duration-500 ease-out hover:scale-[1.02] relative h-80">
                <!-- Background Image -->
                <div class="absolute inset-0 w-full h-full">
                    <img src="https://images.unsplash.com/photo-1600880292089-90a7e086ee0c?q=80&w=800&auto=format&fit=crop"
                         alt="Financial reporting standards"
                         class="w-full h-full object-cover transition-all duration-700 ease-out group-hover:scale-110 group-hover:brightness-50">
                </div>

                <!-- Dark overlay on hover -->
                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/60 transition-all duration-500 ease-out"></div>

                <!-- Non-hover content - Bottom overlay -->
                <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/80 to-transparent group-hover:opacity-0 transition-opacity duration-500">
                    <span class="text-xs font-semibold text-white/80 uppercase tracking-wide">FINANCIAL REPORTING</span>
                    <h3 class="text-xl font-semibold text-white mt-1">
                        NFRS Updates: What Businesses Need to Know
                    </h3>
                </div>

                <!-- Hover content - Center content -->
                <div class="absolute inset-0 flex flex-col justify-center items-center p-6 text-center opacity-0 group-hover:opacity-100 transition-all duration-500 ease-out transform translate-y-4 group-hover:translate-y-0">
                    <span class="text-sm font-semibold text-white/90 uppercase tracking-wide mb-3">FINANCIAL REPORTING</span>
                    <h3 class="text-2xl font-bold text-white mb-4 leading-tight">
                        <a href="#" class="hover:text-fresh-teal transition-colors duration-300">
                            NFRS Updates: What Businesses Need to Know
                        </a>
                    </h3>
                    <p class="text-white/90 text-base leading-relaxed">
                        Latest updates to Nepal Financial Reporting Standards and their impact on business financial reporting requirements.
                    </p>
                </div>
            </article>

            <article class="blog-card fade-in fade-in-delay-1 group cursor-pointer overflow-hidden rounded-lg bg-white shadow-md hover:shadow-2xl transform transition-all duration-500 ease-out hover:scale-[1.02] relative h-80">
                <!-- Background Image -->
                <div class="absolute inset-0 w-full h-full">
                    <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?q=80&w=800&auto=format&fit=crop"
                         alt="ESG reporting"
                         class="w-full h-full object-cover transition-all duration-700 ease-out group-hover:scale-110 group-hover:brightness-50">
                </div>

                <!-- Dark overlay on hover -->
                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/60 transition-all duration-500 ease-out"></div>

                <!-- Non-hover content - Bottom overlay -->
                <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/80 to-transparent group-hover:opacity-0 transition-opacity duration-500">
                    <span class="text-xs font-semibold text-white/80 uppercase tracking-wide">SUSTAINABILITY</span>
                    <h3 class="text-xl font-semibold text-white mt-1">
                        ESG Reporting: A Growing Imperative for Businesses
                    </h3>
                </div>

                <!-- Hover content - Center content -->
                <div class="absolute inset-0 flex flex-col justify-center items-center p-6 text-center opacity-0 group-hover:opacity-100 transition-all duration-500 ease-out transform translate-y-4 group-hover:translate-y-0">
                    <span class="text-sm font-semibold text-white/90 uppercase tracking-wide mb-3">SUSTAINABILITY</span>
                    <h3 class="text-2xl font-bold text-white mb-4 leading-tight">
                        <a href="#" class="hover:text-fresh-teal transition-colors duration-300">
                            ESG Reporting: A Growing Imperative for Businesses
                        </a>
                    </h3>
                    <p class="text-white/90 text-base leading-relaxed">
                        Understanding Environmental, Social, and Governance reporting requirements and best practices for sustainable business operations.
                    </p>
                </div>
            </article>

            <article class="blog-card fade-in fade-in-delay-2 group cursor-pointer overflow-hidden rounded-lg bg-white shadow-md hover:shadow-2xl transform transition-all duration-500 ease-out hover:scale-[1.02] relative h-80">
                <!-- Background Image -->
                <div class="absolute inset-0 w-full h-full">
                    <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=800&auto=format&fit=crop"
                         alt="Business analytics"
                         class="w-full h-full object-cover transition-all duration-700 ease-out group-hover:scale-110 group-hover:brightness-50">
                </div>

                <!-- Dark overlay on hover -->
                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/60 transition-all duration-500 ease-out"></div>

                <!-- Non-hover content - Bottom overlay -->
                <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/80 to-transparent group-hover:opacity-0 transition-opacity duration-500">
                    <span class="text-xs font-semibold text-white/80 uppercase tracking-wide">ANALYTICS</span>
                    <h3 class="text-xl font-semibold text-white mt-1">
                        Leveraging Data Analytics for Better Financial Decisions
                    </h3>
                </div>

                <!-- Hover content - Center content -->
                <div class="absolute inset-0 flex flex-col justify-center items-center p-6 text-center opacity-0 group-hover:opacity-100 transition-all duration-500 ease-out transform translate-y-4 group-hover:translate-y-0">
                    <span class="text-sm font-semibold text-white/90 uppercase tracking-wide mb-3">ANALYTICS</span>
                    <h3 class="text-2xl font-bold text-white mb-4 leading-tight">
                        <a href="#" class="hover:text-fresh-teal transition-colors duration-300">
                            Leveraging Data Analytics for Better Financial Decisions
                        </a>
                    </h3>
                    <p class="text-white/90 text-base leading-relaxed">
                        How advanced analytics and business intelligence tools are transforming financial decision-making processes.
                    </p>
                </div>
            </article>

            <article class="blog-card fade-in group cursor-pointer overflow-hidden rounded-lg bg-white shadow-md hover:shadow-2xl transform transition-all duration-500 ease-out hover:scale-[1.02] relative h-80">
                <!-- Background Image -->
                <div class="absolute inset-0 w-full h-full">
                    <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?q=80&w=800&auto=format&fit=crop"
                         alt="Corporate governance"
                         class="w-full h-full object-cover transition-all duration-700 ease-out group-hover:scale-110 group-hover:brightness-50">
                </div>

                <!-- Dark overlay on hover -->
                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/60 transition-all duration-500 ease-out"></div>

                <!-- Non-hover content - Bottom overlay -->
                <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/80 to-transparent group-hover:opacity-0 transition-opacity duration-500">
                    <span class="text-xs font-semibold text-white/80 uppercase tracking-wide">GOVERNANCE</span>
                    <h3 class="text-xl font-semibold text-white mt-1">
                        Strengthening Corporate Governance in Family Businesses
                    </h3>
                </div>

                <!-- Hover content - Center content -->
                <div class="absolute inset-0 flex flex-col justify-center items-center p-6 text-center opacity-0 group-hover:opacity-100 transition-all duration-500 ease-out transform translate-y-4 group-hover:translate-y-0">
                    <span class="text-sm font-semibold text-white/90 uppercase tracking-wide mb-3">GOVERNANCE</span>
                    <h3 class="text-2xl font-bold text-white mb-4 leading-tight">
                        <a href="#" class="hover:text-fresh-teal transition-colors duration-300">
                            Strengthening Corporate Governance in Family Businesses
                        </a>
                    </h3>
                    <p class="text-white/90 text-base leading-relaxed">
                        Best practices for implementing effective governance structures in family-owned enterprises to ensure long-term success.
                    </p>
                </div>
            </article>

            <article class="blog-card fade-in fade-in-delay-1 group cursor-pointer overflow-hidden rounded-lg bg-white shadow-md hover:shadow-2xl transform transition-all duration-500 ease-out hover:scale-[1.02] relative h-80">
                <!-- Background Image -->
                <div class="absolute inset-0 w-full h-full">
                    <img src="https://images.unsplash.com/photo-1563013544-824ae1b704d3?q=80&w=800&auto=format&fit=crop"
                         alt="Cyber security"
                         class="w-full h-full object-cover transition-all duration-700 ease-out group-hover:scale-110 group-hover:brightness-50">
                </div>

                <!-- Dark overlay on hover -->
                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/60 transition-all duration-500 ease-out"></div>

                <!-- Non-hover content - Bottom overlay -->
                <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/80 to-transparent group-hover:opacity-0 transition-opacity duration-500">
                    <span class="text-xs font-semibold text-white/80 uppercase tracking-wide">SECURITY</span>
                    <h3 class="text-xl font-semibold text-white mt-1">
                        Cybersecurity Considerations for Financial Data
                    </h3>
                </div>

                <!-- Hover content - Center content -->
                <div class="absolute inset-0 flex flex-col justify-center items-center p-6 text-center opacity-0 group-hover:opacity-100 transition-all duration-500 ease-out transform translate-y-4 group-hover:translate-y-0">
                    <span class="text-sm font-semibold text-white/90 uppercase tracking-wide mb-3">SECURITY</span>
                    <h3 class="text-2xl font-bold text-white mb-4 leading-tight">
                        <a href="#" class="hover:text-fresh-teal transition-colors duration-300">
                            Cybersecurity Considerations for Financial Data
                        </a>
                    </h3>
                    <p class="text-white/90 text-base leading-relaxed">
                        Essential cybersecurity measures to protect sensitive financial information and maintain data integrity.
                    </p>
                </div>
            </article>

            <article class="blog-card fade-in fade-in-delay-2 group cursor-pointer overflow-hidden rounded-lg bg-white shadow-md hover:shadow-2xl transform transition-all duration-500 ease-out hover:scale-[1.02] relative h-80">
                <!-- Background Image -->
                <div class="absolute inset-0 w-full h-full">
                    <img src="https://images.unsplash.com/photo-1590283603385-17ffb3a7f29f?q=80&w=800&auto=format&fit=crop"
                         alt="Economic outlook"
                         class="w-full h-full object-cover transition-all duration-700 ease-out group-hover:scale-110 group-hover:brightness-50">
                </div>

                <!-- Dark overlay on hover -->
                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/60 transition-all duration-500 ease-out"></div>

                <!-- Non-hover content - Bottom overlay -->
                <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/80 to-transparent group-hover:opacity-0 transition-opacity duration-500">
                    <span class="text-xs font-semibold text-white/80 uppercase tracking-wide">ECONOMIC OUTLOOK</span>
                    <h3 class="text-xl font-semibold text-white mt-1">
                        Nepal's Economic Outlook: Opportunities and Challenges
                    </h3>
                </div>

                <!-- Hover content - Center content -->
                <div class="absolute inset-0 flex flex-col justify-center items-center p-6 text-center opacity-0 group-hover:opacity-100 transition-all duration-500 ease-out transform translate-y-4 group-hover:translate-y-0">
                    <span class="text-sm font-semibold text-white/90 uppercase tracking-wide mb-3">ECONOMIC OUTLOOK</span>
                    <h3 class="text-2xl font-bold text-white mb-4 leading-tight">
                        <a href="#" class="hover:text-fresh-teal transition-colors duration-300">
                            Nepal's Economic Outlook: Opportunities and Challenges
                        </a>
                    </h3>
                    <p class="text-white/90 text-base leading-relaxed">
                        An analysis of Nepal's current economic landscape and strategic insights for businesses navigating market dynamics.
                    </p>
                </div>
            </article>
        </div>

        <div class="text-center mt-12 fade-in">
            <a href="{{ route('blogs') }}" class="btn-outline">
                View All Articles
                <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
    </div>
</section>

@push('styles')
<style>
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
</section>

<!-- Newsletter Signup -->
<section class="section bg-deep-chartered-blue text-crisp-white">
    <div class="container-custom">
        <div class="text-center fade-in">
            <h2 class="text-3xl lg:text-4xl font-montserrat font-bold mb-6">
                Stay Informed with Our Newsletter
            </h2>
            <p class="text-xl mb-8 max-w-3xl mx-auto">
                Get the latest insights, industry updates, and expert commentary delivered directly to your inbox every month.
            </p>

            <form class="max-w-md mx-auto flex flex-col sm:flex-row gap-4">
                <input type="email" placeholder="Enter your email address"
                       class="flex-1 px-4 py-3 rounded-lg text-report-black focus:outline-none focus:ring-2 focus:ring-fresh-teal">
                <button type="submit" class="btn-primary bg-fresh-teal hover:bg-opacity-90 whitespace-nowrap">
                    Subscribe Now
                    <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </button>
            </form>

            <p class="text-sm text-audit-grey mt-4">
                We respect your privacy. Unsubscribe at any time.
            </p>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.category-card:hover {
    transform: translateY(-2px);
}
</style>
@endpush
