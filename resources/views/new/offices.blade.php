@extends('new.layouts.sidebar')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/offices.css') }}">
    @include('layouts.links') 

@endsection

@section('content')
    <div class="rka-scope" style="margin: 0; padding: 0; overflow-x: hidden;">
        <main style="margin: 0; padding: 0; width: 100vw;">
            <!-- Hero Section -->
            <section class="hero-section">
                <div class="hero-content gsap-animate">
                    <h1>Our Offices</h1>
                    <p>Find our locations across Nepal and connect with our local teams for personalized service.</p>
                    <div class="d-flex flex-wrap flex-column flex-md-row justify-content-center gap-3">
                        <a href="#contact" class="btn-primary-filled">Contact Us <i class="fas fa-arrow-right"></i></a>
                        <a href="#services" class="btn-primary-outline">Our Services <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </section>

            <!-- Locations Section -->
            <section class="locations-section" id="locations">
                <div class="section-container">
                    <h2 class="gsap-animate">Our Locations</h2>
                    <p class="lead gsap-animate">With offices strategically located across Nepal, we're always close to our clients, providing personalized service and local expertise.</p>
                    <div class="row g-4">
                        <div class="col-12 col-md-6 col-lg-4 gsap-animate">
                            <div class="office-card">
                                <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?q=80&w=1200&auto=format&fit=crop" class="office-image" alt="Kathmandu office">
                                <div class="content">
                                    <span class="office-badge">Head Office</span>
                                    <h3>Kathmandu Office</h3>
                                    <p>Our flagship office in the heart of Nepal's capital serves as our headquarters and primary service center. This modern facility houses our executive team, specialized departments, and state-of-the-art meeting facilities.</p>
                                    <div class="details">
                                        <p><i class="fas fa-map-marker-alt"></i> Chartered House, Durbar Marg, Kathmandu 44600, Nepal</p>
                                        <p><i class="fas fa-phone"></i> +977-1-4234567</p>
                                        <p><i class="fas fa-envelope"></i> kathmandu@charteredinsights.com</p>
                                        <p><i class="fas fa-clock"></i> Sunday - Friday: 9:00 AM - 6:00 PM<br>Saturday: 10:00 AM - 4:00 PM</p>
                                    </div>
                                    <div class="d-flex flex-wrap flex-lg-row justify-content-center gap-2">
                                        <a href="#directions" class="btn-office">Get Directions <i class="fas fa-map"></i></a>
                                        <a href="#appointment" class="btn-office">Book Appointment <i class="fas fa-calendar-check"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 gsap-animate" data-delay="0.2">
                            <div class="office-card">
                                <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?q=80&w=1200&auto=format&fit=crop" class="office-image" alt="Pokhara office">
                                <div class="content">
                                    <span class="office-badge">Branch Office</span>
                                    <h3>Pokhara Office</h3>
                                    <p>Our Pokhara office provides comprehensive accounting and financial advisory services to businesses and individuals in the Gandaki region, ensuring local expertise with global standards.</p>
                                    <div class="details">
                                        <p><i class="fas fa-map-marker-alt"></i> Lake Side, Pokhara-6, Kaski, Nepal</p>
                                        <p><i class="fas fa-phone"></i> +977-61-465432</p>
                                        <p><i class="fas fa-envelope"></i> pokhara@charteredinsights.com</p>
                                        <p><i class="fas fa-clock"></i> Sunday - Friday: 9:30 AM - 5:30 PM<br>Saturday: 10:00 AM - 3:00 PM</p>
                                    </div>
                                    <div class="d-flex flex-wrap flex-lg-row justify-content-center gap-2">
                                        <a href="#directions" class="btn-office">Get Directions <i class="fas fa-map"></i></a>
                                        <a href="#appointment" class="btn-office">Book Appointment <i class="fas fa-calendar-check"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 gsap-animate" data-delay="0.4">
                            <div class="office-card">
                                <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?q=80&w=1200&auto=format&fit=crop" class="office-image" alt="Chitwan office">
                                <div class="content">
                                    <span class="office-badge">Branch Office</span>
                                    <h3>Chitwan Office</h3>
                                    <p>Our Bharatpur office provides comprehensive accounting and financial advisory services to businesses and individuals in the Bagmati region, ensuring local expertise with global standards.</p>
                                    <div class="details">
                                        <p><i class="fas fa-map-marker-alt"></i> Narayangarh-4, Bharatpur, Chitwan, Nepal</p>
                                        <p><i class="fas fa-phone"></i> +977-56-526789</p>
                                        <p><i class="fas fa-envelope"></i> chitwan@charteredinsights.com</p>
                                        <p><i class="fas fa-clock"></i> Sunday - Friday: 9:00 AM - 5:00 PM<br>Saturday: Closed</p>
                                    </div>
                                    <div class="d-flex flex-wrap flex-lg-row justify-content-center gap-2">
                                        <a href="#directions" class="btn-office">Get Directions <i class="fas fa-map"></i></a>
                                        <a href="#appointment" class="btn-office">Book Appointment <i class="fas fa-calendar-check"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Access Section -->
            <section class="access-section" id="access">
                <div class="section-container">
                    <h2 class="gsap-animate">Getting to Our Offices</h2>
                    <p class="lead gsap-animate">Easy access and convenient transportation options to all our locations.</p>
                    <div class="row g-4">
                        <div class="col-12 col-lg-6 card gsap-animate">
                            <h3>Schedule Appointment</h3>
                            <p>Book an appointment at any of our offices for personalized consultation and service.</p>
                            <a href="#appointment" class="btn-office">Book Now <i class="fas fa-calendar-check"></i></a>
                        </div>
                        <div class="col-12 col-lg-6 card gsap-animate" data-delay="0.2">
                            <h3>Parking & Transport</h3>
                            <p><strong>Parking Information</strong></p>
                            <ul>
                                <li>Free parking available: 20 car parking slots</li>
                                <li>Covered parking</li>
                                <li>Security guard on duty</li>
                                <li>Visitor parking passes available on request</li>
                            </ul>
                            <p><strong>Directions & Transport</strong></p>
                            <ul>
                                <li><strong>Public Transport Options:</strong></li>
                                <li>Bus: Regular bus service from major areas</li>
                                <li>Micro: Available from Ratna Park and other key locations</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Services Section -->
            <section class="services-section" id="services">
                <div class="section-container">
                    <h2 class="gsap-animate">Services Available at All Locations</h2>
                    <p class="lead gsap-animate">Each of our offices provides the complete range of our professional services, ensuring consistent quality and expertise regardless of location.</p>
                    <div class="row g-4">
                        <div class="col-12 col-md-6 col-lg-4 gsap-animate">
                            <div class="service-card">
                                <i class="fas fa-file-alt"></i>
                                <h3>Audit & Assurance</h3>
                                <p>Independent audits, reviews, and assurance services that provide confidence in your financial reporting and compliance with regulatory requirements.</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 gsap-animate" data-delay="0.2">
                            <div class="service-card">
                                <i class="fas fa-calculator"></i>
                                <h3>Tax Advisory</h3>
                                <p>Strategic tax planning, compliance, and advisory services to optimize your tax position and ensure regulatory adherence across all jurisdictions.</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 gsap-animate" data-delay="0.4">
                            <div class="service-card">
                                <i class="fas fa-shield-alt"></i>
                                <h3>Risk Advisory</h3>
                                <p>Comprehensive risk assessment, management strategies, and internal control solutions to protect and strengthen your organization against uncertainties.</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 gsap-animate">
                            <div class="service-card">
                                <i class="fas fa-chart-line"></i>
                                <h3>Business Consulting</h3>
                                <p>Strategic advisory services, process optimization, and growth planning to help your business reach its full potential in competitive markets.</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 gsap-animate" data-delay="0.2">
                            <div class="service-card">
                                <i class="fas fa-book"></i>
                                <h3>Financial Reporting</h3>
                                <p>Professional financial statement preparation, analysis, and reporting services that meet international standards and regulatory requirements.</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 gsap-animate" data-delay="0.4">
                            <div class="service-card">
                                <i class="fas fa-briefcase"></i>
                                <h3>Corporate Advisory</h3>
                                <p>Strategic corporate guidance, governance consulting, and transaction advisory to support your business objectives and stakeholder interests.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- CTA Section -->
            <section class="cta-section">
                <div class="section-container">
                    <h2 class="gsap-animate">Visit Us Today</h2>
                    <p class="gsap-animate">Whether you need a quick consultation or comprehensive business advisory services, our team is ready to help. Visit any of our offices or contact us to schedule an appointment.</p>
                    <div class="d-flex flex-column flex-sm-row justify-content-center gap-3 gsap-animate" data-delay="0.2">
                        <a href="#contact" class="btn-cta-filled">Schedule a Consultation <i class="fas fa-arrow-right"></i></a>
                        <a href="#services" class="btn-cta-outline">Explore Our Services <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </section>
        </main>
    </div>
@endsection

@section('scripts')
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- GSAP and ScrollTrigger -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script>
        $(document).ready(function(){
            // Card Hover Animation
            $('.office-card').on('mouseenter', function() {
                gsap.to(this, {
                    scale: 1.05,
                    boxShadow: '0 20px 40px rgba(0, 33, 63, 0.3)',
                    duration: 0.3,
                    ease: 'power2.out'
                });
            }).on('mouseleave', function() {
                gsap.to(this, {
                    scale: 1,
                    boxShadow: '0 8px 30px rgba(0, 33, 63, 0.2)',
                    duration: 0.3,
                    ease: 'power2.out'
                });
            });

            $('.access-section .card').on('mouseenter', function() {
                gsap.to(this, {
                    scale: 1.05,
                    boxShadow: '0 15px 35px rgba(0, 33, 63, 0.25)',
                    duration: 0.3,
                    ease: 'power2.out'
                });
            }).on('mouseleave', function() {
                gsap.to(this, {
                    scale: 1,
                    boxShadow: '0 8px 30px rgba(0, 33, 63, 0.2)',
                    duration: 0.3,
                    ease: 'power2.out'
                });
            });

            $('.service-card').on('mouseenter', function() {
                gsap.to(this, {
                    scale: 1.05,
                    boxShadow: '0 20px 40px rgba(0, 33, 63, 0.3)',
                    duration: 0.3,
                    ease: 'power2.out'
                });
            }).on('mouseleave', function() {
                gsap.to(this, {
                    scale: 1,
                    boxShadow: '0 8px 30px rgba(0, 33, 63, 0.2)',
                    duration: 0.3,
                    ease: 'power2.out'
                });
            });
        });

        // GSAP Animations
        window.addEventListener('load', function () {
            gsap.registerPlugin(ScrollTrigger);

            // Hero Parallax
            gsap.to('.hero-section', {
                backgroundPosition: '50% 70%',
                ease: 'none',
                scrollTrigger: {
                    trigger: '.hero-section',
                    start: 'top bottom',
                    end: 'bottom top',
                    scrub: 1.5
                }
            });

            // Section and Card Reveal
            gsap.utils.toArray('.gsap-animate').forEach((el, index) => {
                const delay = parseFloat(el.getAttribute('data-delay')) || (index * 0.1);
                gsap.fromTo(el,
                    { opacity: 0, y: 30 },
                    {
                        opacity: 1,
                        y: 0,
                        duration: 1,
                        delay,
                        ease: 'power3.out',
                        scrollTrigger: {
                            trigger: el,
                            start: 'top 80%',
                            once: true,
                            invalidateOnRefresh: true
                        }
                    }
                );
            });
        });
    </script>
@endsection