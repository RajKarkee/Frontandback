@extends('layouts.app')

@section('title', 'Our Offices - Chartered Insights')
@section('meta_description', 'Visit Chartered Insights offices across Nepal. Find our locations in Kathmandu, Pokhara, and Chitwan with contact details, directions, and office hours.')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-content">
        <div class="text-center">
            <h1 class="hero-title">Our Offices</h1>
            <p class="hero-subtitle max-w-4xl mx-auto">
                Find us across Nepal with strategically located offices to serve you better. Each location offers the full range of our professional services with local expertise.
            </p>
        </div>
    </div>
</section>

<!-- Office Locations -->
<section class="section">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Our Locations</h2>
            <p class="section-subtitle">
                With offices strategically located across Nepal, we're always close to our clients, providing personalized service and local expertise.
            </p>
        </div>

        <!-- Main Office - Kathmandu -->
        <div class="office-card main-office mb-12 fade-in">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-0">
                <div class="office-image-container">
                    <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=800&auto=format&fit=crop"
                         alt="Chartered Insights Kathmandu Office"
                         class="office-image">
                    <div class="office-badge">Head Office</div>
                </div>
                <div class="office-content">
                    <h3 class="office-title">Kathmandu Office</h3>
                    <p class="office-description">
                        Our flagship office in the heart of Nepal's capital serves as our headquarters and primary service center. This modern facility houses our executive team, specialized departments, and state-of-the-art meeting facilities.
                    </p>

                    <div class="office-details">
                        <div class="office-detail-item">
                            <svg class="office-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <div>
                                <h4>Address</h4>
                                <p>Chartered House, Durbar Marg<br>Kathmandu 44600, Nepal</p>
                            </div>
                        </div>

                        <div class="office-detail-item">
                            <svg class="office-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <div>
                                <h4>Phone</h4>
                                <p>+977-1-4234567<br>+977-1-4234568</p>
                            </div>
                        </div>

                        <div class="office-detail-item">
                            <svg class="office-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <div>
                                <h4>Email</h4>
                                <p>kathmandu@charteredinsights.com</p>
                            </div>
                        </div>

                        <div class="office-detail-item">
                            <svg class="office-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div>
                                <h4>Office Hours</h4>
                                <p>Sunday - Friday: 9:00 AM - 6:00 PM<br>Saturday: 10:00 AM - 4:00 PM</p>
                            </div>
                        </div>
                    </div>

                    <div class="office-actions">
                        <button class="btn-primary" onclick="alert('Directions functionality will be implemented!')">
                            Get Directions
                            <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-1.447-.894L15 4m0 13V4m0 0L9 7" />
                            </svg>
                        </button>
                        <button class="btn-outline" onclick="alert('Appointment booking will be implemented!')">
                            Book Appointment
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Other Offices -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Pokhara Office -->
            <div class="office-card fade-in fade-in-delay-1">
                <div class="office-image-container">
                    <img src="https://images.unsplash.com/photo-1497366811353-6870744d04b2?q=80&w=800&auto=format&fit=crop"
                         alt="Chartered Insights Pokhara Office"
                         class="office-image">
                    <div class="office-badge">Branch Office</div>
                </div>
                <div class="office-content">
                    <h3 class="office-title">Pokhara Office</h3>
                    <p class="office-description">
                        Serving the beautiful lake city and surrounding regions, our Pokhara office provides comprehensive accounting and advisory services to local businesses and tourism enterprises.
                    </p>

                    <div class="office-details compact">
                        <div class="office-detail-item">
                            <svg class="office-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            </svg>
                            <div>
                                <h4>Address</h4>
                                <p>Lakeside Road, Ward 6<br>Pokhara 33700, Nepal</p>
                            </div>
                        </div>

                        <div class="office-detail-item">
                            <svg class="office-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <div>
                                <h4>Phone</h4>
                                <p>+977-61-234567</p>
                            </div>
                        </div>

                        <div class="office-detail-item">
                            <svg class="office-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <div>
                                <h4>Email</h4>
                                <p>pokhara@charteredinsights.com</p>
                            </div>
                        </div>

                        <div class="office-detail-item">
                            <svg class="office-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div>
                                <h4>Office Hours</h4>
                                <p>Sunday - Friday: 9:00 AM - 5:30 PM</p>
                            </div>
                        </div>
                    </div>

                    <div class="office-actions">
                        <button class="btn-outline w-full mb-2" onclick="alert('Directions functionality will be implemented!')">
                            Get Directions
                        </button>
                        <button class="btn-outline w-full" onclick="alert('Appointment booking will be implemented!')">
                            Book Appointment
                        </button>
                    </div>
                </div>
            </div>

            <!-- Chitwan Office -->
            <div class="office-card fade-in fade-in-delay-2">
                <div class="office-image-container">
                    <img src="https://images.unsplash.com/photo-1497366754035-f200968a6e72?q=80&w=800&auto=format&fit=crop"
                         alt="Chartered Insights Chitwan Office"
                         class="office-image">
                    <div class="office-badge">Branch Office</div>
                </div>
                <div class="office-content">
                    <h3 class="office-title">Chitwan Office</h3>
                    <p class="office-description">
                        Located in the heart of the Terai region, our Chitwan office serves agricultural businesses, manufacturing enterprises, and service providers across the central and southern regions of Nepal.
                    </p>

                    <div class="office-details compact">
                        <div class="office-detail-item">
                            <svg class="office-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            </svg>
                            <div>
                                <h4>Address</h4>
                                <p>Narayangadh Main Road<br>Bharatpur 44207, Chitwan</p>
                            </div>
                        </div>

                        <div class="office-detail-item">
                            <svg class="office-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <div>
                                <h4>Phone</h4>
                                <p>+977-56-234567</p>
                            </div>
                        </div>

                        <div class="office-detail-item">
                            <svg class="office-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <div>
                                <h4>Email</h4>
                                <p>chitwan@charteredinsights.com</p>
                            </div>
                        </div>

                        <div class="office-detail-item">
                            <svg class="office-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div>
                                <h4>Office Hours</h4>
                                <p>Sunday - Friday: 9:00 AM - 5:30 PM</p>
                            </div>
                        </div>
                    </div>

                    <div class="office-actions">
                        <button class="btn-outline w-full mb-2" onclick="alert('Directions functionality will be implemented!')">
                            Get Directions
                        </button>
                        <button class="btn-outline w-full" onclick="alert('Appointment booking will be implemented!')">
                            Book Appointment
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Interactive Map Section -->
<section class="section bg-audit-grey">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Find Us on the Map</h2>
            <p class="section-subtitle">
                Locate our offices and plan your visit with our interactive map showing all our locations across Nepal.
            </p>
        </div>

        <div class="map-container fade-in">
            <div class="map-placeholder">
                <svg class="w-24 h-24 text-fresh-teal mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-2">Interactive Map</h3>
                <p class="text-report-black mb-4">Interactive map integration will be implemented here showing all office locations with markers and detailed information.</p>
                <button class="btn-primary" onclick="alert('Interactive map will be integrated!')">
                    View Interactive Map
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Office Services -->
<section class="section">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Services Available at All Locations</h2>
            <p class="section-subtitle">
                Each of our offices provides the complete range of our professional services, ensuring consistent quality and expertise regardless of location.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="service-highlight text-center fade-in">
                <div class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <h3 class="text-lg font-montserrat font-semibold text-deep-chartered-blue mb-2">Audit & Assurance</h3>
                <p class="text-report-black text-sm">Comprehensive audit services with local expertise and national standards.</p>
            </div>

            <div class="service-highlight text-center fade-in fade-in-delay-1">
                <div class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                    </svg>
                </div>
                <h3 class="text-lg font-montserrat font-semibold text-deep-chartered-blue mb-2">Tax Advisory</h3>
                <p class="text-report-black text-sm">Strategic tax planning and compliance services tailored to local regulations.</p>
            </div>

            <div class="service-highlight text-center fade-in fade-in-delay-2">
                <div class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <h3 class="text-lg font-montserrat font-semibold text-deep-chartered-blue mb-2">Business Advisory</h3>
                <p class="text-report-black text-sm">Strategic consulting and business advisory services for growth and optimization.</p>
            </div>

            <div class="service-highlight text-center fade-in">
                <div class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h3 class="text-lg font-montserrat font-semibold text-deep-chartered-blue mb-2">Risk Management</h3>
                <p class="text-report-black text-sm">Comprehensive risk assessment and management solutions for all business types.</p>
            </div>
        </div>
    </div>
</section>

<!-- Getting Here -->
<section class="section bg-deep-chartered-blue text-crisp-white">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title text-crisp-white">Getting to Our Offices</h2>
            <p class="section-subtitle text-audit-grey">
                Easy access and convenient transportation options to all our locations.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center fade-in">
                <div class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-montserrat font-semibold mb-3">Schedule Appointment</h3>
                <p class="text-audit-grey mb-4">
                    Book an appointment at any of our offices for personalized consultation and service.
                </p>
                <button class="btn-outline border-crisp-white text-crisp-white hover:bg-crisp-white hover:text-deep-chartered-blue" onclick="alert('Appointment booking will be implemented!')">
                    Book Now
                </button>
            </div>

            <div class="text-center fade-in fade-in-delay-1">
                <div class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-montserrat font-semibold mb-3">Free Parking</h3>
                <p class="text-audit-grey mb-4">
                    All our offices provide complimentary parking facilities for client convenience.
                </p>
                <button class="btn-outline border-crisp-white text-crisp-white hover:bg-crisp-white hover:text-deep-chartered-blue" onclick="alert('Parking info will be implemented!')">
                    Parking Info
                </button>
            </div>

            <div class="text-center fade-in fade-in-delay-2">
                <div class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-1.447-.894L15 4m0 13V4m0 0L9 7" />
                    </svg>
                </div>
                <h3 class="text-xl font-montserrat font-semibold mb-3">Directions & Transport</h3>
                <p class="text-audit-grey mb-4">
                    Easy access by public transport, taxi, or personal vehicle with clear directions.
                </p>
                <button class="btn-outline border-crisp-white text-crisp-white hover:bg-crisp-white hover:text-deep-chartered-blue" onclick="alert('Directions will be implemented!')">
                    Get Directions
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Contact CTA -->
<section class="section">
    <div class="container-custom">
        <div class="text-center fade-in">
            <h2 class="section-title">Visit Us Today</h2>
            <p class="section-subtitle max-w-3xl mx-auto mb-8">
                Whether you need a quick consultation or comprehensive business advisory services, our team is ready to help. Visit any of our offices or contact us to schedule an appointment.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact') }}" class="btn-primary">
                    Contact Us
                    <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
                <a href="{{ route('services') }}" class="btn-outline">
                    Our Services
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.office-card {
    background: white;
    border-radius: 1rem;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.office-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.office-card.main-office {
    border: 3px solid #00BFB2;
}

.office-image-container {
    position: relative;
}

.office-image {
    width: 100%;
    height: 250px;
    object-fit: cover;
}

.office-badge {
    position: absolute;
    top: 1rem;
    right: 1rem;
    background: #00BFB2;
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 1rem;
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
}

.office-content {
    padding: 2rem;
}

.office-title {
    font-size: 1.5rem;
    font-weight: bold;
    color: #015A77;
    margin-bottom: 1rem;
    font-family: 'Montserrat', sans-serif;
}

.office-description {
    color: #666;
    margin-bottom: 1.5rem;
    line-height: 1.6;
}

.office-details {
    margin-bottom: 1.5rem;
}

.office-details.compact .office-detail-item {
    margin-bottom: 1rem;
}

.office-detail-item {
    display: flex;
    align-items: flex-start;
    margin-bottom: 1.5rem;
}

.office-icon {
    width: 1.25rem;
    height: 1.25rem;
    color: #00BFB2;
    margin-right: 0.75rem;
    flex-shrink: 0;
    margin-top: 0.125rem;
}

.office-detail-item h4 {
    font-weight: 600;
    color: #015A77;
    margin-bottom: 0.25rem;
    font-size: 0.9rem;
}

.office-detail-item p {
    color: #666;
    font-size: 0.9rem;
    line-height: 1.4;
}

.office-actions {
    display: flex;
    gap: 0.75rem;
    flex-wrap: wrap;
}

.map-container {
    background: white;
    border-radius: 1rem;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.map-placeholder {
    padding: 4rem 2rem;
    text-align: center;
    background: #f8f9fa;
}

.service-highlight:hover {
    transform: translateY(-2px);
    transition: all 0.3s ease;
}

@media (max-width: 768px) {
    .office-card.main-office .grid {
        grid-template-columns: 1fr;
    }

    .office-actions {
        flex-direction: column;
    }
}
</style>
@endpush
