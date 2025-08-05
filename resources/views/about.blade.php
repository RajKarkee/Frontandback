@extends('layouts.app')

@section('title', 'About Us - Chartered Insights')
@section('meta_description', 'Learn about Chartered Insights - leading Chartered Accountancy firm in Nepal with expert team, proven track record, and commitment to excellence.')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-content">
        <div class="text-center">
            <h1 class="hero-title">About Chartered Insights</h1>
            <p class="hero-subtitle max-w-4xl mx-auto">
                Empowering businesses with financial clarity, robust compliance, and strategic insights that help them navigate challenges and seize opportunities in a competitive, evolving marketplace.
            </p>
        </div>
    </div>
</section>

<!-- Introduction -->
<section class="section">
    <div class="container-custom">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="fade-in">
                <h2 class="section-title text-left">Our Story</h2>
                <p class="text-lg text-report-black mb-6">
                    Chartered Insights is a full-service Chartered Accountancy firm headquartered in Biratnagar, Nepal, delivering a complete range of Audit & Assurance, Taxation, Risk Advisory, Accounting, and Business Consulting services to businesses, not-for-profit organizations, and government entities.
                </p>
                <p class="text-lg text-report-black mb-6">
                    We were founded with a vision to empower businesses with financial clarity, robust compliance, and strategic insights that help them navigate challenges and seize opportunities in a competitive, evolving marketplace.
                </p>
                <p class="text-lg text-report-black">
                    By combining deep technical knowledge, sector-specific expertise, and a client-focused service approach, Chartered Insights has become a trusted partner for organizations seeking professional, ethical, and growth-oriented solutions.
                </p>
            </div>
            <div class="fade-in fade-in-delay-1">
                <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?q=80&w=800&auto=format&fit=crop"
                     alt="Professional team collaboration"
                     class="rounded-lg shadow-xl w-full h-auto">
            </div>
        </div>
    </div>
</section>

<!-- Core Values -->
<section class="section bg-audit-grey">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Our Core Values & Client-First Philosophy</h2>
            <p class="section-subtitle">
                These foundational principles guide every interaction, decision, and service we provide to our clients.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="card fade-in">
                <div class="card-header">
                    <div class="w-12 h-12 bg-fresh-teal rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="card-title">Partner-Led Engagements</h3>
                </div>
                <div class="card-content">
                    <p>Every assignment is directly supervised by a partner or senior professional to ensure quality, accountability, and strategic insight from start to finish.</p>
                </div>
            </div>

            <div class="card fade-in fade-in-delay-1">
                <div class="card-header">
                    <div class="w-12 h-12 bg-fresh-teal rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="card-title">Culture of Excellence</h3>
                </div>
                <div class="card-content">
                    <p>We adhere to international best practices while delivering solutions tailored to the Nepali business landscape, ensuring both compliance and practical value.</p>
                </div>
            </div>

            <div class="card fade-in fade-in-delay-2">
                <div class="card-header">
                    <div class="w-12 h-12 bg-fresh-teal rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                    <h3 class="card-title">Client-First Mindset</h3>
                </div>
                <div class="card-content">
                    <p>We prioritize client goals and challenges, providing customized solutions that not only meet legal and regulatory requirements but also support business performance.</p>
                </div>
            </div>

            <div class="card fade-in">
                <div class="card-header">
                    <div class="w-12 h-12 bg-fresh-teal rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="card-title">Long-Term Relationships</h3>
                </div>
                <div class="card-content">
                    <p>Our focus extends beyond one-time engagements. We cultivate lasting partnerships built on trust, reliability, and consistent delivery.</p>
                </div>
            </div>

            <div class="card fade-in fade-in-delay-1">
                <div class="card-header">
                    <div class="w-12 h-12 bg-fresh-teal rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="card-title">Personal Ownership</h3>
                </div>
                <div class="card-content">
                    <p>Every team member takes ownership of their work, ensuring timely execution, high quality, and measurable results for clients.</p>
                </div>
            </div>

            <div class="card fade-in fade-in-delay-2">
                <div class="card-header">
                    <div class="w-12 h-12 bg-fresh-teal rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h3 class="card-title">Commitment to Learning & Growth</h3>
                </div>
                <div class="card-content">
                    <p>We invest in our people by offering training, professional certifications, and leadership opportunities to continually enhance our service quality.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Leadership Team -->
<section class="section">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Our Leadership Team</h2>
            <p class="section-subtitle">
                Meet the experienced professionals leading our firm with vision, expertise, and unwavering commitment to client success.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Principal -->
            <div class="team-card fade-in">
                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=400&auto=format&fit=crop"
                     alt="CA Roshan Kumar Yadav"
                     class="team-image">
                <div class="team-info">
                    <h3 class="team-name">CA Roshan Kumar Yadav</h3>
                    <p class="team-role">Founder & Managing Partner</p>
                    <p class="team-bio">
                        A member of the Institute of Chartered Accountants of Nepal (ICAN), with a proven track record in Audit & Assurance, Taxation, Risk Management, and Strategic Advisory across healthcare, banking, manufacturing, and international development sectors.
                    </p>
                </div>
            </div>

            <!-- Internal Audit Leader -->
            <div class="team-card fade-in fade-in-delay-1">
                <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=400&auto=format&fit=crop"
                     alt="CA Sunil Shrestha"
                     class="team-image">
                <div class="team-info">
                    <h3 class="team-name">CA Sunil Shrestha</h3>
                    <p class="team-role">Leader - Internal Audit & Risk Advisory</p>
                    <p class="team-bio">
                        A specialist in internal audits, enterprise risk management, corporate governance, and SOP implementation, bringing deep technical expertise and practical solutions to complex organizational challenges.
                    </p>
                </div>
            </div>

            <!-- Offshore Services Leader -->
            <div class="team-card fade-in fade-in-delay-2">
                <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=400&auto=format&fit=crop"
                     alt="Offshore Services Leader"
                     class="team-image">
                <div class="team-info">
                    <h3 class="team-name">Senior Partner</h3>
                    <p class="team-role">Leader - Offshore & Outsourced Services</p>
                    <p class="team-bio">
                        Responsible for delivering outsourced accounting, virtual CFO services, payroll management, and compliance solutions to international clients while ensuring global best practices and cost-effectiveness.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Expertise Areas -->
<section class="section bg-audit-grey">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Our People – Expertise that Drives Value</h2>
            <p class="section-subtitle">
                Our multidisciplinary team combines diverse skills and industry experience to deliver exceptional results.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="fade-in">
                <div class="flex items-start space-x-4 mb-6">
                    <div class="flex-shrink-0 w-8 h-8 bg-fresh-teal rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-2">Trailblazing Professional Expertise</h4>
                        <p class="text-report-black">Our leadership team has delivered impactful assignments in Nepal and abroad, covering sectors such as healthcare, manufacturing, banking, technology, education, and development organizations.</p>
                    </div>
                </div>

                <div class="flex items-start space-x-4 mb-6">
                    <div class="flex-shrink-0 w-8 h-8 bg-fresh-teal rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-2">Multidisciplinary Knowledge Base</h4>
                        <p class="text-report-black">We combine the skills of Chartered Accountants, ACCA members, semi-qualified professionals, and industry specialists, enabling us to address diverse and complex challenges.</p>
                    </div>
                </div>
            </div>

            <div class="fade-in fade-in-delay-1">
                <div class="flex items-start space-x-4 mb-6">
                    <div class="flex-shrink-0 w-8 h-8 bg-fresh-teal rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-2">Mentoring & Knowledge Sharing</h4>
                        <p class="text-report-black">We maintain a strong mentorship culture, where experienced professionals guide the next generation, fostering growth, innovation, and technical mastery.</p>
                    </div>
                </div>

                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0 w-8 h-8 bg-fresh-teal rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-2">Collaborative, Client-Centric Teamwork</h4>
                        <p class="text-report-black">Our team works in close partnership with clients, ensuring our strategies align with their vision and objectives while delivering sustainable results.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="section">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Why Businesses Choose Chartered Insights</h2>
            <p class="section-subtitle">
                Our track record speaks for itself - proven expertise, exceptional service, and measurable results.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="text-center fade-in">
                <div class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h4 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-2">Proven Expertise</h4>
                <p class="text-report-black">100+ successful client engagements across industries with measurable impact and results.</p>
            </div>

            <div class="text-center fade-in fade-in-delay-1">
                <div class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h4 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-2">Partner-Level Involvement</h4>
                <p class="text-report-black">Senior professionals lead every assignment, ensuring quality and strategic oversight.</p>
            </div>

            <div class="text-center fade-in fade-in-delay-2">
                <div class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <h4 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-2">Comprehensive Services</h4>
                <p class="text-report-black">One firm for all your audit, tax, risk, and advisory needs with integrated solutions.</p>
            </div>

            <div class="text-center fade-in">
                <div class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <h4 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-2">Technology-Enabled Solutions</h4>
                <p class="text-report-black">Cloud-based systems, secure client portals, and real-time reporting capabilities.</p>
            </div>

            <div class="text-center fade-in fade-in-delay-1">
                <div class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <h4 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-2">Ethical & Transparent</h4>
                <p class="text-report-black">Clear fee structures, no hidden charges, and unwavering commitment to confidentiality.</p>
            </div>

            <div class="text-center fade-in fade-in-delay-2">
                <div class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h4 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-2">Results-Driven Approach</h4>
                <p class="text-report-black">Focus on measurable outcomes and sustainable business improvements for every client.</p>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="section bg-deep-chartered-blue text-crisp-white">
    <div class="container-custom">
        <div class="text-center fade-in">
            <h2 class="text-3xl lg:text-4xl font-montserrat font-bold mb-6">
                Ready to Partner with Us?
            </h2>
            <p class="text-xl mb-8 max-w-3xl mx-auto">
                Experience the difference that expert guidance, innovative solutions, and unwavering commitment can make for your organization. Let's discuss how we can help you achieve your goals.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact') }}" class="btn-primary bg-fresh-teal hover:bg-opacity-90">
                    Contact Us Today
                    <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
                <a href="{{ route('services') }}" class="btn-secondary border-crisp-white text-crisp-white hover:bg-crisp-white hover:text-deep-chartered-blue">
                    Our Services
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
