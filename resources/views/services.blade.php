@extends('layouts.app')

@section('title', 'Our Services - Chartered Insights')
@section('meta_description', 'Comprehensive chartered accountancy services including audit & assurance, tax advisory, risk management, business consulting, and financial reporting.')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-content">
        <div class="text-center">
            <h1 class="hero-title">Our Services</h1>
            <p class="hero-subtitle max-w-4xl mx-auto">
                Comprehensive chartered accountancy services designed to drive your business forward with precision, integrity, and strategic insight.
            </p>
        </div>
    </div>
</section>

<!-- Services Overview -->
<section class="section">
    <div class="container-custom">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Audit & Assurance -->
            <div class="service-card fade-in">
                <svg class="service-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg>
                <h3 class="service-title">Audit & Assurance</h3>
                <p class="service-description">
                    Independent audits, reviews, and assurance services that provide confidence in your financial reporting and compliance with regulatory requirements.
                </p>
                <ul class="text-sm text-report-black space-y-1 mb-4">
                    <li>• Financial statement audits</li>
                    <li>• Internal audit services</li>
                    <li>• Compliance audits</li>
                    <li>• Due diligence reviews</li>
                </ul>
            </div>

            <!-- Tax Advisory -->
            <div class="service-card fade-in fade-in-delay-1">
                <svg class="service-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                </svg>
                <h3 class="service-title">Tax Advisory</h3>
                <p class="service-description">
                    Strategic tax planning, compliance, and advisory services to optimize your tax position and ensure regulatory adherence across all jurisdictions.
                </p>
                <ul class="text-sm text-report-black space-y-1 mb-4">
                    <li>• Corporate tax planning</li>
                    <li>• VAT and excise compliance</li>
                    <li>• Tax litigation support</li>
                    <li>• International tax advisory</li>
                </ul>
            </div>

            <!-- Risk Advisory -->
            <div class="service-card fade-in fade-in-delay-2">
                <svg class="service-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
                <h3 class="service-title">Risk Advisory</h3>
                <p class="service-description">
                    Comprehensive risk assessment, management strategies, and internal control solutions to protect and strengthen your organization against uncertainties.
                </p>
                <ul class="text-sm text-report-black space-y-1 mb-4">
                    <li>• Enterprise risk management</li>
                    <li>• Internal control assessment</li>
                    <li>• Fraud risk management</li>
                    <li>• Cybersecurity governance</li>
                </ul>
            </div>

            <!-- Business Consulting -->
            <div class="service-card fade-in">
                <svg class="service-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
                <h3 class="service-title">Business Consulting</h3>
                <p class="service-description">
                    Strategic advisory services, process optimization, and growth planning to help your business reach its full potential in competitive markets.
                </p>
                <ul class="text-sm text-report-black space-y-1 mb-4">
                    <li>• Strategic planning</li>
                    <li>• Business process improvement</li>
                    <li>• Performance management</li>
                    <li>• Market entry strategies</li>
                </ul>
            </div>

            <!-- Financial Reporting -->
            <div class="service-card fade-in fade-in-delay-1">
                <svg class="service-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                </svg>
                <h3 class="service-title">Financial Reporting</h3>
                <p class="service-description">
                    Professional financial statement preparation, analysis, and reporting services that meet international standards and regulatory requirements.
                </p>
                <ul class="text-sm text-report-black space-y-1 mb-4">
                    <li>• NFRS/IFRS compliance</li>
                    <li>• Management reporting</li>
                    <li>• Financial analysis</li>
                    <li>• Budgeting and forecasting</li>
                </ul>
            </div>

            <!-- Corporate Advisory -->
            <div class="service-card fade-in fade-in-delay-2">
                <svg class="service-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <h3 class="service-title">Corporate Advisory</h3>
                <p class="service-description">
                    Strategic corporate guidance, governance consulting, and transaction advisory to support your business objectives and stakeholder interests.
                </p>
                <ul class="text-sm text-report-black space-y-1 mb-4">
                    <li>• Corporate governance</li>
                    <li>• Mergers & acquisitions</li>
                    <li>• Business valuations</li>
                    <li>• Regulatory compliance</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Detailed Service Sections -->
<section class="section bg-audit-grey">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Service Details</h2>
            <p class="section-subtitle">
                Explore our comprehensive service offerings and discover how we can support your business goals.
            </p>
        </div>

        <!-- Audit & Assurance Detail -->
        <div class="bg-crisp-white rounded-lg shadow-lg p-8 mb-8 fade-in">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                <div>
                    <h3 class="text-2xl font-montserrat font-bold text-deep-chartered-blue mb-4">Audit & Assurance Services</h3>
                    <p class="text-lg text-report-black mb-6">
                        Our audit and assurance services provide independent verification of your financial information, helping stakeholders make informed decisions with confidence.
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <h4 class="font-semibold text-deep-chartered-blue mb-2">Statutory Audits</h4>
                            <ul class="text-sm text-report-black space-y-1">
                                <li>• Annual financial audits</li>
                                <li>• Regulatory compliance audits</li>
                                <li>• Special purpose audits</li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="font-semibold text-deep-chartered-blue mb-2">Internal Audits</h4>
                            <ul class="text-sm text-report-black space-y-1">
                                <li>• Operational audits</li>
                                <li>• IT audits</li>
                                <li>• Process reviews</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div>
                    <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?q=80&w=600&auto=format&fit=crop"
                         alt="Audit and assurance services"
                         class="rounded-lg shadow-lg w-full h-auto">
                </div>
            </div>
        </div>

        <!-- Tax Advisory Detail -->
        <div class="bg-crisp-white rounded-lg shadow-lg p-8 mb-8 fade-in">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                <div class="order-2 lg:order-1">
                    <img src="https://images.unsplash.com/photo-1559526324-4b87b5e36e44?q=80&w=600&auto=format&fit=crop"
                         alt="Tax advisory services"
                         class="rounded-lg shadow-lg w-full h-auto">
                </div>
                <div class="order-1 lg:order-2">
                    <h3 class="text-2xl font-montserrat font-bold text-deep-chartered-blue mb-4">Tax Advisory Services</h3>
                    <p class="text-lg text-report-black mb-6">
                        Navigate complex tax regulations with our expert guidance, ensuring compliance while optimizing your tax position for sustainable growth.
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <h4 class="font-semibold text-deep-chartered-blue mb-2">Corporate Tax</h4>
                            <ul class="text-sm text-report-black space-y-1">
                                <li>• Tax planning and strategy</li>
                                <li>• Return preparation</li>
                                <li>• Tax dispute resolution</li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="font-semibold text-deep-chartered-blue mb-2">Indirect Tax</h4>
                            <ul class="text-sm text-report-black space-y-1">
                                <li>• VAT compliance</li>
                                <li>• Excise duty advisory</li>
                                <li>• Customs duty planning</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Risk Advisory Detail -->
        <div class="bg-crisp-white rounded-lg shadow-lg p-8 fade-in">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                <div>
                    <h3 class="text-2xl font-montserrat font-bold text-deep-chartered-blue mb-4">Risk Advisory Services</h3>
                    <p class="text-lg text-report-black mb-6">
                        Build resilient organizations with our comprehensive risk management solutions, protecting your business from threats while enabling strategic growth.
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <h4 class="font-semibold text-deep-chartered-blue mb-2">Risk Management</h4>
                            <ul class="text-sm text-report-black space-y-1">
                                <li>• Risk assessment</li>
                                <li>• Control design</li>
                                <li>• Risk monitoring</li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="font-semibold text-deep-chartered-blue mb-2">Compliance</h4>
                            <ul class="text-sm text-report-black space-y-1">
                                <li>• Regulatory compliance</li>
                                <li>• Policy development</li>
                                <li>• Training programs</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div>
                    <img src="https://images.unsplash.com/photo-1507679799987-c73779587ccf?q=80&w=600&auto=format&fit=crop"
                         alt="Risk advisory services"
                         class="rounded-lg shadow-lg w-full h-auto">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Service Process -->
<section class="section">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Our Service Process</h2>
            <p class="section-subtitle">
                A structured approach that ensures quality, efficiency, and exceptional results for every engagement.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="text-center fade-in">
                <div class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl font-bold text-crisp-white">1</span>
                </div>
                <h4 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-2">Discovery</h4>
                <p class="text-report-black">Understanding your business, challenges, and objectives through comprehensive consultation.</p>
            </div>

            <div class="text-center fade-in fade-in-delay-1">
                <div class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl font-bold text-crisp-white">2</span>
                </div>
                <h4 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-2">Planning</h4>
                <p class="text-report-black">Developing tailored strategies and detailed project plans aligned with your specific requirements.</p>
            </div>

            <div class="text-center fade-in fade-in-delay-2">
                <div class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl font-bold text-crisp-white">3</span>
                </div>
                <h4 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-2">Execution</h4>
                <p class="text-report-black">Implementing solutions with precision, maintaining regular communication and quality oversight.</p>
            </div>

            <div class="text-center fade-in fade-in-delay-3">
                <div class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl font-bold text-crisp-white">4</span>
                </div>
                <h4 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-2">Results</h4>
                <p class="text-report-black">Delivering measurable outcomes and providing ongoing support for sustained success.</p>
            </div>
        </div>
    </div>
</section>

<!-- Industry Expertise -->
<section class="section bg-audit-grey">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Industry Expertise</h2>
            <p class="section-subtitle">
                Specialized knowledge across key sectors, bringing industry-specific insights to every engagement.
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
            <div class="text-center p-4 bg-crisp-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 fade-in">
                <svg class="w-8 h-8 text-fresh-teal mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
                <h5 class="font-semibold text-deep-chartered-blue text-sm">Banking & Finance</h5>
            </div>

            <div class="text-center p-4 bg-crisp-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 fade-in fade-in-delay-1">
                <svg class="w-8 h-8 text-fresh-teal mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <h5 class="font-semibold text-deep-chartered-blue text-sm">Manufacturing</h5>
            </div>

            <div class="text-center p-4 bg-crisp-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 fade-in fade-in-delay-2">
                <svg class="w-8 h-8 text-fresh-teal mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
                <h5 class="font-semibold text-deep-chartered-blue text-sm">Healthcare</h5>
            </div>

            <div class="text-center p-4 bg-crisp-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 fade-in">
                <svg class="w-8 h-8 text-fresh-teal mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                <h5 class="font-semibold text-deep-chartered-blue text-sm">Education</h5>
            </div>

            <div class="text-center p-4 bg-crisp-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 fade-in fade-in-delay-1">
                <svg class="w-8 h-8 text-fresh-teal mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
                <h5 class="font-semibold text-deep-chartered-blue text-sm">Technology</h5>
            </div>

            <div class="text-center p-4 bg-crisp-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 fade-in fade-in-delay-2">
                <svg class="w-8 h-8 text-fresh-teal mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 00-2 2H10a2 2 0 00-2-2V4m8 0H8m0 0v2m0 0H6a2 2 0 00-2 2v6a2 2 0 002 2h2m0 0v2a2 2 0 002 2h4a2 2 0 002-2v-2m0 0h2a2 2 0 002-2V10a2 2 0 00-2-2h-2m0 0V6a2 2 0 00-2-2H10a2 2 0 00-2 2v2H6a2 2 0 00-2 2v6a2 2 0 002 2h2" />
                </svg>
                <h5 class="font-semibold text-deep-chartered-blue text-sm">Government</h5>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="section bg-deep-chartered-blue text-crisp-white">
    <div class="container-custom">
        <div class="text-center fade-in">
            <h2 class="text-3xl lg:text-4xl font-montserrat font-bold mb-6">
                Ready to Get Started?
            </h2>
            <p class="text-xl mb-8 max-w-3xl mx-auto">
                Let's discuss how our comprehensive chartered accountancy services can support your business objectives and drive sustainable growth.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact') }}" class="btn-primary bg-fresh-teal hover:bg-opacity-90">
                    Request Consultation
                    <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
                <a href="{{ route('about') }}" class="btn-secondary border-crisp-white text-crisp-white hover:bg-crisp-white hover:text-deep-chartered-blue">
                    Learn About Us
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
