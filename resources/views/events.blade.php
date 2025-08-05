@extends('layouts.app')

@section('title', 'Events & Webinars - Chartered Insights')
@section('meta_description', 'Join Chartered Insights for upcoming events, webinars, workshops, and training sessions on accounting, taxation, business strategy, and industry insights.')

@section('content')
<!-- Hero Section -->
<section class="hero-section relative overflow-x-hidden p-0 m-0">
    <div class="relative w-full p-0 m-0">
        <div class="relative w-full h-[60vh] min-h-[60vh] overflow-hidden">
            <div class="absolute inset-0 w-full h-full bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1464983953574-0892a716854b?q=80&w=1600&auto=format&fit=crop');"></div>
            <div class="absolute inset-0 bg-black/40"></div>
            <div class="relative z-20 flex flex-col items-center justify-center h-full text-center text-crisp-white px-4 md:px-12">
                <h1 class="hero-title">Events & Webinars</h1>
                <p class="hero-subtitle max-w-4xl mx-auto">
                    Join us for exclusive events, webinars, and workshops designed to keep you informed about the latest developments in accounting, taxation, and business strategy.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Event Filters -->
<section class="section pt-8">
    <div class="container-custom">
        <div class="flex flex-wrap justify-center gap-4 mb-8 fade-in">
            <button class="event-filter-btn active" data-filter="all">All Events</button>
            <button class="event-filter-btn" data-filter="webinar">Webinars</button>
            <button class="event-filter-btn" data-filter="workshop">Workshops</button>
            <button class="event-filter-btn" data-filter="conference">Conferences</button>
            <button class="event-filter-btn" data-filter="training">Training</button>
        </div>
    </div>
</section>

<!-- Upcoming Events -->
<section class="section pt-0">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Upcoming Events</h2>
            <p class="section-subtitle">
                Don't miss these upcoming opportunities to enhance your knowledge and network with industry professionals.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Featured Event -->
            <div class="event-card featured lg:col-span-2 fade-in" data-category="conference">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-0">
                    <img src="https://images.unsplash.com/photo-1511578314322-379afb476865?q=80&w=800&auto=format&fit=crop"
                         alt="Annual Accounting Conference"
                         class="event-image lg:h-full">
                    <div class="event-content lg:flex lg:flex-col lg:justify-center">
                        <div class="event-date">
                            <span class="date-day">15</span>
                            <span class="date-month">MAR</span>
                        </div>
                        <span class="event-type conference">Conference</span>
                        <h3 class="text-2xl lg:text-3xl font-montserrat font-bold text-deep-chartered-blue mb-4 hover:text-fresh-teal transition-colors duration-200">
                            Annual Accounting & Finance Conference 2024
                        </h3>
                        <p class="event-description text-lg mb-4">
                            Join Nepal's premier gathering of accounting and finance professionals for a full day of insights, networking, and knowledge sharing. Features keynote speakers, panel discussions, and workshops on the latest industry trends.
                        </p>
                        <div class="event-details mb-4">
                            <div class="flex items-center mb-2">
                                <svg class="w-5 h-5 text-fresh-teal mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                Hotel Annapurna, Kathmandu
                            </div>
                            <div class="flex items-center mb-2">
                                <svg class="w-5 h-5 text-fresh-teal mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                9:00 AM - 5:00 PM
                            </div>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-fresh-teal mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                NPR 2,500 (Early Bird: NPR 2,000)
                            </div>
                        </div>
                        <button class="btn-primary" onclick="alert('Registration functionality will be implemented!')">
                            Register Now
                            <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Regular Events -->
            <div class="event-card fade-in fade-in-delay-1" data-category="webinar">
                <img src="https://images.unsplash.com/photo-1553028826-f4804a6dba3b?q=80&w=800&auto=format&fit=crop"
                     alt="Tax compliance webinar"
                     class="event-image">
                <div class="event-content">
                    <div class="event-date">
                        <span class="date-day">22</span>
                        <span class="date-month">FEB</span>
                    </div>
                    <span class="event-type webinar">Webinar</span>
                    <h3 class="event-title">
                        Tax Compliance Updates for FY 2023/24
                    </h3>
                    <p class="event-description">
                        Stay updated with the latest changes in tax regulations and compliance requirements. Essential for all business owners and finance professionals.
                    </p>
                    <div class="event-details">
                        <div class="flex items-center mb-2">
                            <svg class="w-4 h-4 text-fresh-teal mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            2:00 PM - 3:30 PM
                        </div>
                        <div class="flex items-center mb-4">
                            <svg class="w-4 h-4 text-fresh-teal mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Online (Zoom)
                        </div>
                    </div>
                    <button class="btn-outline w-full" onclick="alert('Registration functionality will be implemented!')">
                        Join Webinar (Free)
                    </button>
                </div>
            </div>

            <div class="event-card fade-in fade-in-delay-2" data-category="workshop">
                <img src="https://images.unsplash.com/photo-1560472354-b33ff0c44a43?q=80&w=800&auto=format&fit=crop"
                     alt="Financial planning workshop"
                     class="event-image">
                <div class="event-content">
                    <div class="event-date">
                        <span class="date-day">28</span>
                        <span class="date-month">FEB</span>
                    </div>
                    <span class="event-type workshop">Workshop</span>
                    <h3 class="event-title">
                        Strategic Financial Planning for SMEs
                    </h3>
                    <p class="event-description">
                        Interactive workshop covering budgeting, forecasting, and financial strategy for small and medium enterprises. Includes practical exercises and case studies.
                    </p>
                    <div class="event-details">
                        <div class="flex items-center mb-2">
                            <svg class="w-4 h-4 text-fresh-teal mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            </svg>
                            CI Training Center
                        </div>
                        <div class="flex items-center mb-4">
                            <svg class="w-4 h-4 text-fresh-teal mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            NPR 1,500
                        </div>
                    </div>
                    <button class="btn-outline w-full" onclick="alert('Registration functionality will be implemented!')">
                        Register (Limited Seats)
                    </button>
                </div>
            </div>

            <div class="event-card fade-in" data-category="training">
                <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?q=80&w=800&auto=format&fit=crop"
                     alt="Software training"
                     class="event-image">
                <div class="event-content">
                    <div class="event-date">
                        <span class="date-day">05</span>
                        <span class="date-month">MAR</span>
                    </div>
                    <span class="event-type training">Training</span>
                    <h3 class="event-title">
                        Advanced Excel for Financial Analysis
                    </h3>
                    <p class="event-description">
                        Master advanced Excel functions, pivot tables, and financial modeling techniques. Perfect for accounting professionals and analysts.
                    </p>
                    <div class="event-details">
                        <div class="flex items-center mb-2">
                            <svg class="w-4 h-4 text-fresh-teal mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            10:00 AM - 4:00 PM
                        </div>
                        <div class="flex items-center mb-4">
                            <svg class="w-4 h-4 text-fresh-teal mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            NPR 3,000
                        </div>
                    </div>
                    <button class="btn-outline w-full" onclick="alert('Registration functionality will be implemented!')">
                        Register Now
                    </button>
                </div>
            </div>

            <div class="event-card fade-in fade-in-delay-1" data-category="webinar">
                <img src="https://images.unsplash.com/photo-1507679799987-c73779587ccf?q=80&w=800&auto=format&fit=crop"
                     alt="Risk management webinar"
                     class="event-image">
                <div class="event-content">
                    <div class="event-date">
                        <span class="date-day">12</span>
                        <span class="date-month">MAR</span>
                    </div>
                    <span class="event-type webinar">Webinar</span>
                    <h3 class="event-title">
                        Enterprise Risk Management in Uncertain Times
                    </h3>
                    <p class="event-description">
                        Learn how to identify, assess, and mitigate business risks in today's volatile economic environment. Expert insights and practical frameworks.
                    </p>
                    <div class="event-details">
                        <div class="flex items-center mb-2">
                            <svg class="w-4 h-4 text-fresh-teal mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            3:00 PM - 4:30 PM
                        </div>
                        <div class="flex items-center mb-4">
                            <svg class="w-4 h-4 text-fresh-teal mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Online (Teams)
                        </div>
                    </div>
                    <button class="btn-outline w-full" onclick="alert('Registration functionality will be implemented!')">
                        Join Webinar (Free)
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Past Events -->
<section class="section bg-audit-grey">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Past Events</h2>
            <p class="section-subtitle">
                Missed an event? Catch up on key insights and access recordings from our previous sessions.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="past-event-card bg-crisp-white fade-in">
                <img src="https://images.unsplash.com/photo-1559526324-4b87b5e36e44?q=80&w=800&auto=format&fit=crop"
                     alt="Digital transformation seminar"
                     class="past-event-image">
                <div class="past-event-content">
                    <span class="past-event-date">January 25, 2024</span>
                    <h3 class="past-event-title">Digital Transformation in Accounting</h3>
                    <p class="past-event-description">
                        Explored automation tools, cloud accounting, and AI applications in modern accounting practices.
                    </p>
                    <div class="flex gap-2 mt-4">
                        <button class="btn-outline text-sm" onclick="alert('Recording access will be implemented!')">
                            View Recording
                        </button>
                        <button class="btn-outline text-sm" onclick="alert('Resources download will be implemented!')">
                            Download Resources
                        </button>
                    </div>
                </div>
            </div>

            <div class="past-event-card bg-crisp-white fade-in fade-in-delay-1">
                <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?q=80&w=800&auto=format&fit=crop"
                     alt="Audit best practices workshop"
                     class="past-event-image">
                <div class="past-event-content">
                    <span class="past-event-date">January 18, 2024</span>
                    <h3 class="past-event-title">Internal Audit Best Practices Workshop</h3>
                    <p class="past-event-description">
                        Comprehensive training on risk-based auditing, compliance frameworks, and audit technology.
                    </p>
                    <div class="flex gap-2 mt-4">
                        <button class="btn-outline text-sm" onclick="alert('Recording access will be implemented!')">
                            View Recording
                        </button>
                        <button class="btn-outline text-sm" onclick="alert('Resources download will be implemented!')">
                            Download Resources
                        </button>
                    </div>
                </div>
            </div>

            <div class="past-event-card bg-crisp-white fade-in fade-in-delay-2">
                <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?q=80&w=800&auto=format&fit=crop"
                     alt="Business valuation seminar"
                     class="past-event-image">
                <div class="past-event-content">
                    <span class="past-event-date">January 10, 2024</span>
                    <h3 class="past-event-title">Business Valuation Methodologies</h3>
                    <p class="past-event-description">
                        In-depth look at different valuation approaches, market multiples, and DCF modeling techniques.
                    </p>
                    <div class="flex gap-2 mt-4">
                        <button class="btn-outline text-sm" onclick="alert('Recording access will be implemented!')">
                            View Recording
                        </button>
                        <button class="btn-outline text-sm" onclick="alert('Resources download will be implemented!')">
                            Download Resources
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter Signup -->
<section class="section">
    <div class="container-custom">
        <div class="bg-deep-chartered-blue text-crisp-white rounded-2xl p-8 lg:p-12 text-center fade-in">
            <h2 class="text-3xl lg:text-4xl font-montserrat font-bold mb-6">
                Never Miss an Event
            </h2>
            <p class="text-xl mb-8 max-w-3xl mx-auto">
                Subscribe to our event newsletter and be the first to know about upcoming webinars, workshops, and exclusive training opportunities.
            </p>

            <form class="max-w-md mx-auto flex flex-col sm:flex-row gap-4">
                <input type="email" placeholder="Enter your email address"
                       class="flex-1 px-4 py-3 rounded-lg text-report-black focus:outline-none focus:ring-2 focus:ring-fresh-teal">
                <button type="submit" class="btn-primary bg-fresh-teal hover:bg-opacity-90 whitespace-nowrap">
                    Subscribe
                    <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </button>
            </form>

            <p class="text-sm text-audit-grey mt-4">
                Get event notifications, exclusive content, and early bird pricing.
            </p>
        </div>
    </div>
</section>

<!-- Contact for Custom Events -->
<section class="section bg-audit-grey">
    <div class="container-custom">
        <div class="text-center fade-in">
            <h2 class="section-title">Need Custom Training?</h2>
            <p class="section-subtitle max-w-4xl mx-auto mb-8">
                Looking for specialized training for your team? We offer custom workshops, corporate training sessions, and on-site seminars tailored to your organization's specific needs.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                <div class="text-center">
                    <div class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-2">Team Training</h3>
                    <p class="text-report-black">Custom workshops designed for your team's specific skill development needs.</p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-2">On-site Seminars</h3>
                    <p class="text-report-black">Bring our experts to your location for comprehensive training sessions.</p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-2">Certification Programs</h3>
                    <p class="text-report-black">Structured certification programs with measurable learning outcomes.</p>
                </div>
            </div>

            <a href="{{ route('contact') }}" class="btn-primary">
                Discuss Custom Training
                <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.event-filter-btn {
    padding: 0.5rem 1rem;
    border: 2px solid #015A77;
    background: transparent;
    color: #015A77;
    border-radius: 0.5rem;
    font-weight: 600;
    transition: all 0.3s ease;
}

.event-filter-btn:hover,
.event-filter-btn.active {
    background: #015A77;
    color: white;
}

.event-card {
    background: white;
    border-radius: 1rem;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.event-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.event-card.featured {
    border: 3px solid #00BFB2;
}

.event-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.event-content {
    padding: 1.5rem;
    position: relative;
}

.event-date {
    position: absolute;
    top: -1rem;
    right: 1.5rem;
    background: #015A77;
    color: white;
    padding: 0.5rem;
    border-radius: 0.5rem;
    text-align: center;
    min-width: 60px;
}

.date-day {
    display: block;
    font-size: 1.5rem;
    font-weight: bold;
    line-height: 1;
}

.date-month {
    display: block;
    font-size: 0.8rem;
    text-transform: uppercase;
}

.event-type {
    display: inline-block;
    padding: 0.25rem 0.75rem;
    border-radius: 1rem;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    margin-bottom: 1rem;
}

.event-type.webinar {
    background: #e1f5fe;
    color: #0277bd;
}

.event-type.workshop {
    background: #f3e5f5;
    color: #7b1fa2;
}

.event-type.conference {
    background: #e8f5e8;
    color: #2e7d32;
}

.event-type.training {
    background: #fff3e0;
    color: #ef6c00;
}

.event-title {
    font-size: 1.25rem;
    font-weight: bold;
    color: #015A77;
    margin-bottom: 1rem;
    line-height: 1.3;
}

.event-description {
    color: #666;
    margin-bottom: 1rem;
    line-height: 1.5;
}

.event-details {
    font-size: 0.9rem;
    color: #666;
}

.past-event-card {
    border-radius: 1rem;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.past-event-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.past-event-image {
    width: 100%;
    height: 160px;
    object-fit: cover;
}

.past-event-content {
    padding: 1.5rem;
}

.past-event-date {
    color: #00BFB2;
    font-size: 0.9rem;
    font-weight: 600;
}

.past-event-title {
    font-size: 1.1rem;
    font-weight: bold;
    color: #015A77;
    margin: 0.5rem 0;
    line-height: 1.3;
}

.past-event-description {
    color: #666;
    font-size: 0.9rem;
    line-height: 1.5;
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Event filtering
    const filterBtns = document.querySelectorAll('.event-filter-btn');
    const eventCards = document.querySelectorAll('.event-card');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Remove active class from all buttons
            filterBtns.forEach(b => b.classList.remove('active'));
            // Add active class to clicked button
            this.classList.add('active');

            const filter = this.getAttribute('data-filter');

            eventCards.forEach(card => {
                if (filter === 'all' || card.getAttribute('data-category') === filter) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
});
</script>
@endpush
