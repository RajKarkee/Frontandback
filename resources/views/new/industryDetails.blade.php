@extends('new.layouts.sidebar')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/industryDetails.css') }}">
    @include('new.layouts.links')
@endsection

@section('content')
   <div class="rka-scope">
        <main>
            <!-- Hero Section -->
            <section class="hero-section">
                <div class="section-container">
                    <div class="hero-content gsap-animate">
                        <h1 class="gsap-animate" data-delay="0.1">Industries Details</h1>
                        <p class="lead gsap-animate" data-delay="0.2">This is a static description for the industry.</p>
                        <div class="d-flex flex-wrap justify-content-center gap-3">
                            <a href="/contact" class="btn-cta-filled gsap-animate" data-delay="0.3">Get Started <i class="fas fa-arrow-right"></i></a>
                            <a href="/industries" class="btn-cta-outline gsap-animate" data-delay="0.4">Back to Industries <i class="fas fa-arrow-left"></i></a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Industry Details Section -->
            <section class="industry-details-section">
                <div class="section-container">
                    <div class="row g-4">
                        <div class="col-12 gsap-animate" data-delay="0.1">
                            <div class="detail-card">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 detail-content">
                                        <h2 class="section-title">Industry Details</h2>
                                        <p class="gsap-animate" data-delay="0.2">Explore key insights and details about our healthcare financial services.</p>
                                        <p class="gsap-animate" data-delay="0.3">Our specialized financial services empower healthcare providers to navigate complex revenue cycles, ensure compliance, and optimize operations for sustainable growth.</p>
                                        <h3 class="gsap-animate" data-delay="0.4">Extra Information</h3>
                                        <ul class="no-bullets gsap-animate" data-delay="0.5">
                                            <li><strong>Category:</strong> Healthcare</li>
                                            <li><strong>Status:</strong> active</li>
                                            <li><strong>Created:</strong> 2025-09-02 05:55:34</li>
                                            <li><strong>Last Updated:</strong> 2025-09-02 05:55:34</li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 order-lg-2">
                                        <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&w=800&h=600"
                                            alt="Healthcare & Medical" class="service-image gsap-animate" data-delay="0.3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Industry Overview -->
            <section class="section">
                <div class="section-container">
                    <div class="text-center">
                        <h2 class="section-title gsap-animate" data-delay="0.1">Industry Overview</h2>
                    </div>
                    <div class="prose">
                        <h3 class="gsap-animate" data-delay="0.2">Financial Challenges</h3>
                        <p class="gsap-animate" data-delay="0.3">The healthcare industry presents unique financial challenges, from managing complex revenue cycles to ensuring compliance with stringent regulations. Our specialized team understands the intricacies of medical practice accounting, healthcare compliance, and the financial impact of healthcare reform.</p>
                        <hr class="divider gsap-animate" data-delay="0.4">
                        <h3 class="gsap-animate" data-delay="0.5">Tailored Solutions</h3>
                        <p class="gsap-animate" data-delay="0.6">With years of experience, we provide tailored financial solutions that help hospitals, clinics, pharmaceutical companies, and healthcare providers optimize their operations. Our services include strategic budgeting, cost management, regulatory compliance, and innovative financing options to support growth and sustainability in the healthcare sector.</p>
                        <hr class="divider gsap-animate" data-delay="0.7">
                        <h3 class="gsap-animate" data-delay="0.8">Empowering Healthcare</h3>
                        <p class="gsap-animate" data-delay="0.9">We partner with our clients to navigate the complexities of healthcare reform, offering insights into funding opportunities, tax incentives, and operational efficiencies. Our goal is to empower healthcare organizations to focus on delivering exceptional patient care while we handle their financial needs.</p>
                    </div>
                </div>
            </section>

            <!-- Key Services -->
            <section class="section key-services">
                <div class="section-container">
                    <div class="text-center">
                        <h2 class="section-title gsap-animate" data-delay="0.1">Our Healthcare & Medical Services</h2>
                        <p class="section-subtitle gsap-animate" data-delay="0.2">Specialized solutions tailored to healthcare industry needs.</p>
                    </div>
                    <div class="row g-4">
                        <div class="col-12 col-md-6 gsap-animate" data-delay="0.3">
                            <div class="service-card">
                                <div class="service-item">
                                    <i class="fas fa-check service-icon"></i>
                                    <div>
                                        <h3>Medical Practice Accounting</h3>
                                        <p>Streamlined accounting services to manage financial complexities for healthcare providers.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 gsap-animate" data-delay="0.4">
                            <div class="service-card">
                                <div class="service-item">
                                    <i class="fas fa-check service-icon"></i>
                                    <div>
                                        <h3>Healthcare Compliance Audits</h3>
                                        <p>Comprehensive audits to ensure adherence to healthcare regulations and avoid penalties.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 gsap-animate" data-delay="0.5">
                            <div class="service-card">
                                <div class="service-item">
                                    <i class="fas fa-check service-icon"></i>
                                    <div>
                                        <h3>Revenue Cycle Management</h3>
                                        <p>Optimize billing and collections to reduce claim denials and improve cash flow.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 gsap-animate" data-delay="0.6">
                            <div class="service-card">
                                <div class="service-item">
                                    <i class="fas fa-check service-icon"></i>
                                    <div>
                                        <h3>Medical Equipment Financing</h3>
                                        <p>Flexible financing solutions to acquire advanced medical equipment for your practice.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Case Studies -->
            <section class="section case-studies">
                <div class="section-container">
                    <div class="text-center">
                        <h2 class="section-title gsap-animate" data-delay="0.1">Case Studies</h2>
                        <p class="section-subtitle gsap-animate" data-delay="0.2">Explore our success stories in the Healthcare & Medical sector.</p>
                    </div>
                    <div class="row g-4">
                        <div class="col-12 col-md-6 gsap-animate" data-delay="0.3">
                            <div class="case-study-card">
                                <i class="fas fa-file-alt case-study-icon"></i>
                                <h3 class="case-study-title">Optimizing Revenue for a Regional Hospital</h3>
                                <p class="case-study-description">We streamlined revenue cycle management for a regional hospital, reducing claim denials by 30% and improving cash flow within six months.</p>
                                <a href="#read-more" class="learn-more">Read More <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 gsap-animate" data-delay="0.4">
                            <div class="case-study-card">
                                <i class="fas fa-file-alt case-study-icon"></i>
                                <h3 class="case-study-title">Compliance Success for a Clinic Network</h3>
                                <p class="case-study-description">Our compliance audits helped a clinic network avoid costly penalties, ensuring adherence to healthcare regulations across 10 locations.</p>
                                <a href="#read-more" class="learn-more">Read More <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Other Industries -->
            <section class="section other-industries">
                <div class="section-container">
                    <div class="text-center">
                        <h2 class="section-title gsap-animate" data-delay="0.1">Other Industries We Serve</h2>
                        <p class="section-subtitle gsap-animate" data-delay="0.2">Discover how we help businesses across various sectors achieve their financial goals.</p>
                    </div>
                    <div class="row g-4">
                        <div class="col-12 col-md-6 col-lg-4 gsap-animate" data-delay="0.3">
                            <div class="industry-card">
                                <i class="fas fa-laptop service-icon"></i>
                                <h3 class="service-title">Technology</h3>
                                <p class="service-description">Innovative financial solutions for tech startups and established firms navigating rapid growth and innovation.</p>
                                <a href="/industries/technology" class="learn-more">Learn More <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 gsap-animate" data-delay="0.4">
                            <div class="industry-card">
                                <i class="fas fa-industry service-icon"></i>
                                <h3 class="service-title">Manufacturing</h3>
                                <p class="service-description">Tailored financial strategies to optimize production, supply chain, and operational efficiency in manufacturing.</p>
                                <a href="/industries/manufacturing" class="learn-more">Learn More <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 gsap-animate" data-delay="0.5">
                            <div class="industry-card">
                                <i class="fas fa-shopping-cart service-icon"></i>
                                <h3 class="service-title">Retail</h3>
                                <p class="service-description">Comprehensive financial services to enhance profitability and streamline operations in the retail sector.</p>
                                <a href="/industries/retail" class="learn-more">Learn More <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-5 gsap-animate" data-delay="0.6">
                        <a href="/industries" class="btn-cta-outline">View All Industries <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </section>

            <!-- Call to Action Section -->
            <section class="cta-section">
                <div class="section-container">
                    <div class="gsap-animate">
                        <h2 class="gsap-animate" data-delay="0.1">Ready to Transform Your Healthcare & Medical Business?</h2>
                        <p class="gsap-animate" data-delay="0.2">Let our industry specialists help you navigate the unique challenges and opportunities in the healthcare sector.</p>
                        <div class="cta-buttons gsap-animate" data-delay="0.3">
                            <a href="/contact" class="btn-cta-filled">Schedule a Consultation <i class="fas fa-arrow-right"></i></a>
                            <a href="/industries" class="btn-cta-outline">Explore Our Services <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

  
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script>
        window.addEventListener('load', function() {
            gsap.registerPlugin(ScrollTrigger);

            gsap.utils.toArray('.gsap-animate').forEach((el) => {
                const delay = parseFloat(el.getAttribute('data-delay')) || 0;
                gsap.fromTo(el, {
                    opacity: 0,
                    y: 40,
                    scale: el.classList.contains('service-image') ? 0.95 : 1
                }, {
                    opacity: 1,
                    y: 0,
                    scale: 1,
                    duration: 1.2,
                    delay,
                    ease: 'power3.out',
                    scrollTrigger: {
                        trigger: el,
                        start: 'top 85%',
                        once: true,
                        invalidateOnRefresh: true
                    }
                });
            });

            ScrollTrigger.refresh();
        });
    </script>
@endsection