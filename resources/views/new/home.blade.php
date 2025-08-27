@extends('new.layouts.sidebar')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    @include('layouts.links')
      <!-- Slick Slider CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
    <!-- GSAP for Animations -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
@endsection


@section('content')
    <div class="rka-scope">
        <main>
            <!-- Hero Section -->
            <section class="hero-section">
                <div class="hero-slider">
                    <div class="hero-slide hero-slide-1">
                        <div class="hero-content gsap-animate">
                            <h1>Chartered Insights: Your Trusted Partner</h1>
                            <p>Premier chartered accountancy firm in Nepal, offering expert audit, tax, risk advisory, and consulting services for sustainable growth.</p>
                            <div class="d-flex flex-wrap justify-content-center gap-3">
                                <a href="#" class="btn-primary-filled">Explore Our Expertise <i class="fas fa-arrow-right"></i></a>
                                <a href="#" class="btn-primary-outline">Learn More <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="hero-slide hero-slide-2">
                        <div class="hero-content gsap-animate">
                            <h1>Driving Financial Excellence</h1>
                            <p>Empowering businesses with precise financial reporting and strategic advisory services tailored to your needs.</p>
                            <div class="d-flex flex-wrap justify-content-center gap-3">
                                <a href="#" class="btn-primary-filled">Discover Our Solutions <i class="fas fa-arrow-right"></i></a>
                                <a href="#" class="btn-primary-outline">Learn More <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="hero-slide hero-slide-3">
                        <div class="hero-content gsap-animate">
                            <h1>Navigating Complex Challenges</h1>
                            <p>Comprehensive risk management and compliance solutions to safeguard and strengthen your organization.</p>
                            <div class="d-flex flex-wrap justify-content-center gap-3">
                                <a href="#" class="btn-primary-filled">Learn More Today <i class="fas fa-arrow-right"></i></a>
                                <a href="#" class="btn-primary-outline">Our Approach <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Key Statistics -->
            <section class="stats-section">
                <div class="section-container">
                    <h2 class="gsap-animate">Our Impact by the Numbers</h2>
                    <div class="row g-4">
                        <div class="col-6 col-md-3">
                            <div class="stat-item gsap-animate">
                                <div class="stat-number" data-target="100">0</div>
                                <div class="stat-label">Satisfied Clients</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="stat-item gsap-animate" data-delay="0.2">
                                <div class="stat-number" data-target="15">0</div>
                                <div class="stat-label">Years of Excellence</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="stat-item gsap-animate" data-delay="0.4">
                                <div class="stat-number" data-target="500">0</div>
                                <div class="stat-label">Successful Projects</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="stat-item gsap-animate" data-delay="0.6">
                                <div class="stat-number" data-target="25">0</div>
                                <div class="stat-label">Expert Advisors</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Core Services -->
            <section class="services-section">
                <div class="section-container">
                    <h2 class="gsap-animate">Our Core Services</h2>
                    <p class="lead gsap-animate">Comprehensive chartered accountancy services designed to drive your business forward with precision, integrity, and strategic insight.</p>
                    <div class="row g-4">
                        <div class="col-md-6 col-lg-4 gsap-animate">
                            <div class="service-card">
                                <h3>Audit & Assurance</h3>
                                <p>Independent audits, reviews, and assurance services that provide confidence in your financial reporting and compliance with regulatory requirements.</p>
                                <a href="#" class="learn-more">Learn More <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 gsap-animate" data-delay="0.2">
                            <div class="service-card">
                                <h3>Tax Advisory</h3>
                                <p>Strategic tax planning, compliance, and advisory services to optimize your tax position and ensure regulatory adherence across all jurisdictions.</p>
                                <a href="#" class="learn-more">Learn More <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 gsap-animate" data-delay="0.4">
                            <div class="service-card">
                                <h3>Risk Advisory</h3>
                                <p>Comprehensive risk assessment, management strategies, and internal control solutions to protect and strengthen your organization against uncertainties.</p>
                                <a href="#" class="learn-more">Learn More <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 gsap-animate" data-delay="0.6">
                            <div class="service-card">
                                <h3>Business Consulting</h3>
                                <p>Strategic advisory services, process optimization, and growth planning to help your business reach its full potential in competitive markets.</p>
                                <a href="#" class="learn-more">Learn More <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 gsap-animate" data-delay="0.8">
                            <div class="service-card">
                                <h3>Financial Reporting</h3>
                                <p>Professional financial statement preparation, analysis, and reporting services that meet international standards and regulatory requirements.</p>
                                <a href="#" class="learn-more">Learn More <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 gsap-animate" data-delay="1.0">
                            <div class="service-card">
                                <h3>Corporate Advisory</h3>
                                <p>Strategic corporate guidance, governance consulting, and transaction advisory to support your business objectives and stakeholder interests.</p>
                                <a href="#" class="learn-more">Learn More <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="btn-all gsap-animate">View All Services</a>
                </div>
            </section>

            <!-- Why Choose Us -->
            <section class="why-choose-us">
                <div class="section-container">
                    <h2 class="gsap-animate">Why Choose Chartered Insights</h2>
                    <p class="lead gsap-animate">Partner with us for unmatched expertise, innovative solutions, and a dedication to your business success.</p>
                    <div class="row g-4 align-items-center">
                        <div class="col-lg-6 gsap-animate">
                            <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&w=800&h=600" alt="Team collaboration" class="w-100">
                        </div>
                        <div class="col-lg-6">
                            <div class="feature-item gsap-animate">
                                <div class="feature-icon"><i class="fas fa-user-tie"></i></div>
                                <div>
                                    <h4 class="feature-title">Partner-Led Excellence</h4>
                                    <p class="feature-description">Senior professionals oversee every project, ensuring quality, accountability, and strategic insight.</p>
                                </div>
                            </div>
                            <div class="feature-item gsap-animate" data-delay="0.2">
                                <div class="feature-icon"><i class="fas fa-briefcase"></i></div>
                                <div>
                                    <h4 class="feature-title">Sector-Specific Expertise</h4>
                                    <p class="feature-description">Customized solutions driven by deep knowledge across diverse industries.</p>
                                </div>
                            </div>
                            <div class="feature-item gsap-animate" data-delay="0.4">
                                <div class="feature-icon"><i class="fas fa-cogs"></i></div>
                                <div>
                                    <h4 class="feature-title">Technology-Driven Results</h4>
                                    <p class="feature-description">Advanced tools and platforms deliver efficient, accurate outcomes.</p>
                                </div>
                            </div>
                            <div class="feature-item gsap-animate" data-delay="0.6">
                                <div class="feature-icon"><i class="fas fa-hand-holding-heart"></i></div>
                                <div>
                                    <h4 class="feature-title">Client-First Commitment</h4>
                                    <p class="feature-description">Fostering lasting partnerships through exceptional service and clear communication.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Industries We Serve -->
            <section class="industries-section">
                <div class="section-container">
                    <h2 class="gsap-animate">Industries We Serve</h2>
                    <p class="lead gsap-animate">Deep industry expertise across diverse sectors, bringing specialized knowledge to meet your unique challenges.</p>
                    <div class="row g-4">
                        <div class="col-6 col-md-3 gsap-animate">
                            <div class="industry-item">
                                <i class="fas fa-heartbeat"></i>
                                <p>Healthcare & Medical</p>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 gsap-animate" data-delay="0.2">
                            <div class="industry-item">
                                <i class="fas fa-industry"></i>
                                <p>Manufacturing & Industrial</p>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 gsap-animate" data-delay="0.4">
                            <div class="industry-item">
                                <i class="fas fa-laptop-code"></i>
                                <p>Technology & Software</p>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 gsap-animate" data-delay="0.6">
                            <div class="industry-item">
                                <i class="fas fa-building"></i>
                                <p>Real Estate & Construction</p>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="btn-all gsap-animate">View All Industries</a>
                </div>
            </section>

            <!-- Call to Action -->
            <section class="cta-section">
                <div class="section-container">
                    <div class="gsap-animate">
                        <h2>Elevate Your Business Today</h2>
                        <p>Join forces with Chartered Insights to unlock expert guidance and transformative solutions tailored to your needs.</p>
                        <div class="cta-buttons">
                            <a href="#" class="btn-primary-filled">Get Started Now <i class="fas fa-arrow-right"></i></a>
                            <a href="#" class="btn-primary-outline">Discover Our Services <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <!-- jQuery (required for Slick Slider) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Slick Slider JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.hero-slider').slick({
                dots: true,
                infinite: true,
                speed: 800,
                fade: true,
                cssEase: 'cubic-bezier(0.4, 0, 0.2, 1)',
                autoplay: true,
                autoplaySpeed: 5000,
                arrows: false,
                pauseOnHover: true,
                pauseOnFocus: true,
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            speed: 600,
                            autoplaySpeed: 4000
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            speed: 500,
                            autoplaySpeed: 3500
                        }
                    }
                ]
            });

            $('.hero-slider').on('beforeChange', function(event, slick, currentSlide, nextSlide){
                const nextContent = $(slick.$slides[nextSlide]).find('.hero-content');
                gsap.fromTo(nextContent, 
                    { opacity: 0, y: 50 },
                    { opacity: 1, y: 0, duration: 1.2, ease: 'power3.out' }
                );
            });
        });

        window.addEventListener('load', function () {
            gsap.registerPlugin(ScrollTrigger);

            const nf = new Intl.NumberFormat();
            document.querySelectorAll('.stat-number').forEach((num) => {
                const target = parseInt(num.getAttribute('data-target'), 10);
                if (!Number.isFinite(target)) return;

                const obj = { val: 0 };
                gsap.to(obj, {
                    val: target,
                    duration: 2,
                    ease: 'power2.out',
                    onUpdate: () => {
                        num.textContent = nf.format(Math.round(obj.val)) + '+';
                    },
                    scrollTrigger: {
                        trigger: num.closest('.stat-item') || num,
                        start: 'top 85%',
                        once: true,
                        invalidateOnRefresh: true
                    }
                });
            });

            gsap.utils.toArray('.gsap-animate').forEach((el) => {
                const delay = parseFloat(el.getAttribute('data-delay')) || 0;
                gsap.fromTo(el,
                    { opacity: 0, y: 40 },
                    {
                        opacity: 1,
                        y: 0,
                        duration: 1.2,
                        delay,
                        ease: 'power3.out',
                        scrollTrigger: {
                            trigger: el,
                            start: 'top 85%',
                            once: true,
                            invalidateOnRefresh: true
                        }
                    }
                );
            });

            ScrollTrigger.refresh();
        });
    </script>
@endsection
