@extends('new.layouts.sidebar')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/event.css') }}">
    @include('new.layouts.links')
@endsection    

@section('content')
    <div class="rka-scope" style="margin: 0; padding: 0; overflow-x: hidden;">
        <main style="margin: 0; padding: 0; width: 100vw;">
            <!-- Hero Section -->
            <section class="hero-section">
                <div class="hero-content gsap-animate">
                    <h1>Events & Seminars</h1>
                    <p>Join our educational events, workshops, and seminars to stay updated with the latest industry developments.</p>
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="#events" class="btn-primary-filled">Explore Events <i class="fas fa-arrow-right"></i></a>
                        <a href="#contact" class="btn-primary-outline">Contact Us <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </section>

            <!-- Events Section -->
            <section class="events-section" id="events">
                <div class="section-container">
                    <h2 class="gsap-animate">Upcoming Events</h2>
                    <p class="lead gsap-animate">Don't miss these upcoming opportunities to enhance your knowledge and network with industry professionals.</p>
                    <div class="filter-buttons gsap-animate">
                        <button class="btn-filter active" data-filter="all">All Events</button>
                        <button class="btn-filter" data-filter="Webinar">Webinars</button>
                        <button class="btn-filter" data-filter="Workshop">Workshops</button>
                        <button class="btn-filter" data-filter="Conference">Conferences</button>
                        <button class="btn-filter" data-filter="Training">Trainings</button>
                    </div>
                    <div class="event-grid">
                        <div class="event-card gsap-animate" data-category="Conference" 
                             data-title="Annual Accounting & Finance Conference 2024" 
                             data-description="Join Nepal's premier gathering of accounting and finance professionals for a full day of insights, networking, and knowledge sharing. Features keynote speakers, panel discussions, and workshops on the latest industry trends." 
                             data-details="Hotel Annapurna, Kathmandu|9:00 AM - 5:00 PM|NPR 2500.00 (Early Bird: NPR 2000.00)" 
                             data-button-text="Register Now" data-button-link="#register">
                            <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?q=80&w=1200&auto=format&fit=crop" class="event-image" alt="Conference event">
                            <div class="date-container">
                                <div class="day">16</div>
                                <div class="month">Sep</div>
                            </div>
                            <div class="content">
                                <span class="category">Conference</span>
                                <h3>Annual Accounting & Finance Conference 2024</h3>
                                <p>Join Nepal's premier gathering of accounting and finance professionals for a full day of insights, networking, and knowledge sharing.</p>
                            </div>
                        </div>
                        <div class="event-card gsap-animate" data-category="Webinar" data-delay="0.2" 
                             data-title="Tax Compliance Updates for FY 2023/24" 
                             data-description="Stay updated with the latest changes in tax regulations and compliance requirements. Essential for all business owners and finance professionals." 
                             data-details="Online (Zoom)|2:00 PM - 3:30 PM|Free" 
                             data-button-text="Join Webinar (Free)" data-button-link="#webinar">
                            <img src="https://images.unsplash.com/photo-1611162616305-c69b3fa7fbe0?q=80&w=1200&auto=format&fit=crop" class="event-image" alt="Webinar event">
                            <div class="date-container">
                                <div class="day">24</div>
                                <div class="month">Aug</div>
                            </div>
                            <div class="content">
                                <span class="category">Webinar</span>
                                <h3>Tax Compliance Updates for FY 2023/24</h3>
                                <p>Stay updated with the latest changes in tax regulations and compliance requirements.</p>
                            </div>
                        </div>
                        <div class="event-card gsap-animate" data-category="Workshop" data-delay="0.4" 
                             data-title="Strategic Financial Planning for SMEs" 
                             data-description="Interactive workshop covering budgeting, forecasting, and financial strategy for small and medium enterprises. Includes practical exercises and case studies." 
                             data-details="CI Training Center|10:00 AM - 4:00 PM|NPR 1500.00" 
                             data-button-text="Register Now" data-button-link="#register">
                            <img src="https://images.unsplash.com/photo-1516321310769-65e85b8e6351?q=80&w=1200&auto=format&fit=crop" class="event-image" alt="Workshop event">
                            <div class="date-container">
                                <div class="day">31</div>
                                <div class="month">Aug</div>
                            </div>
                            <div class="content">
                                <span class="category">Workshop</span>
                                <h3>Strategic Financial Planning for SMEs</h3>
                                <p>Interactive workshop covering budgeting, forecasting, and financial strategy for SMEs.</p>
                            </div>
                        </div>
                        <div class="event-card gsap-animate" data-category="Training" 
                             data-title="Advanced Excel for Financial Analysis" 
                             data-description="Master advanced Excel functions, pivot tables, and financial modeling techniques. Perfect for accounting professionals and analysts." 
                             data-details="CI Training Center|10:00 AM - 4:00 PM|NPR 3000.00" 
                             data-button-text="Register Now" data-button-link="#register">
                            <img src="https://images.unsplash.com/photo-1516321497487-e288fb19713f?q=80&w=1200&auto=format&fit=crop" class="event-image" alt="Training event">
                            <div class="date-container">
                                <div class="day">7</div>
                                <div class="month">Sep</div>
                            </div>
                            <div class="content">
                                <span class="category">Training</span>
                                <h3>Advanced Excel for Financial Analysis</h3>
                                <p>Master advanced Excel functions, pivot tables, and financial modeling techniques.</p>
                            </div>
                        </div>
                        <div class="event-card gsap-animate" data-category="Webinar" data-delay="0.2" 
                             data-title="Enterprise Risk Management in Uncertain Times" 
                             data-description="Learn how to identify, assess, and mitigate business risks in today's volatile economic environment. Expert insights and practical frameworks." 
                             data-details="Online (Teams)|3:00 PM - 4:30 PM|Free" 
                             data-button-text="Join Webinar (Free)" data-button-link="#webinar">
                            <img src="https://images.unsplash.com/photo-1594125730766-91d63d7e7a7b?q=80&w=1200&auto=format&fit=crop" class="event-image" alt="Webinar event">
                            <div class="date-container">
                                <div class="day">14</div>
                                <div class="month">Sep</div>
                            </div>
                            <div class="content">
                                <span class="category">Webinar</span>
                                <h3>Enterprise Risk Management in Uncertain Times</h3>
                                <p>Learn how to identify, assess, and mitigate business risks in today's volatile environment.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Past Events Section -->
            <section class="past-events-section">
                <div class="section-container">
                    <h2 class="gsap-animate">Past Events</h2>
                    <p class="lead gsap-animate">Missed an event? Catch up on key insights and access recordings from our previous sessions.</p>
                    <div class="event-grid">
                        <div class="event-card gsap-animate" data-category="Webinar" 
                             data-title="Digital Transformation in Accounting" 
                             data-description="Explored automation tools, cloud accounting, and AI applications in modern accounting practices." 
                             data-details="July 26, 2025" 
                             data-button-text="View Recording|Download Resources" data-button-link="#recording|#resources">
                            <img src="https://images.unsplash.com/photo-1516321310769-65e85b8e6351?q=80&w=1200&auto=format&fit=crop" class="event-image" alt="Webinar event">
                            <div class="date-container">
                                <div class="day">26</div>
                                <div class="month">Jul</div>
                            </div>
                            <div class="content">
                                <span class="category">Webinar</span>
                                <h3>Digital Transformation in Accounting</h3>
                                <p>Explored automation tools, cloud accounting, and AI applications in modern accounting.</p>
                            </div>
                        </div>
                        <div class="event-card gsap-animate" data-category="Workshop" data-delay="0.2" 
                             data-title="Internal Audit Best Practices Workshop" 
                             data-description="Comprehensive training on risk-based auditing, compliance frameworks, and audit technology." 
                             data-details="July 19, 2025" 
                             data-button-text="View Recording|Download Resources" data-button-link="#recording|#resources">
                            <img src="https://images.unsplash.com/photo-1542744173-05336fcc7ad4?q=80&w=1200&auto=format&fit=crop" class="event-image" alt="Workshop event">
                            <div class="date-container">
                                <div class="day">19</div>
                                <div class="month">Jul</div>
                            </div>
                            <div class="content">
                                <span class="category">Workshop</span>
                                <h3>Internal Audit Best Practices Workshop</h3>
                                <p>Comprehensive training on risk-based auditing and compliance frameworks.</p>
                            </div>
                        </div>
                        <div class="event-card gsap-animate" data-category="Webinar" data-delay="0.4" 
                             data-title="Business Valuation Methodologies" 
                             data-description="In-depth look at different valuation approaches, market multiples, and DCF modeling techniques." 
                             data-details="July 11, 2025" 
                             data-button-text="View Recording|Download Resources" data-button-link="#recording|#resources">
                            <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?q=80&w=1200&auto=format&fit=crop" class="event-image" alt="Webinar event">
                            <div class="date-container">
                                <div class="day">11</div>
                                <div class="month">Jul</div>
                            </div>
                            <div class="content">
                                <span class="category">Webinar</span>
                                <h3>Business Valuation Methodologies</h3>
                                <p>In-depth look at valuation approaches and DCF modeling techniques.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Custom Training Section -->
            <section class="custom-training-section">
                <div class="section-container">
                    <h2 class="gsap-animate">Need Custom Training?</h2>
                    <p class="lead gsap-animate">Looking for specialized training for your team? We offer custom workshops, corporate training sessions, and on-site seminars tailored to your organization's specific needs.</p>
                    <div class="row g-10">
                        <div class="col-12 col-md-6 col-lg-4 training-card gsap-animate">
                            <i class="fas fa-users"></i>
                            <h3>Team Training</h3>
                            <p>Custom workshops designed for your team's specific skill development needs.</p>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 training-card gsap-animate" data-delay="0.2">
                            <i class="fas fa-building"></i>
                            <h3>On-site Seminars</h3>
                            <p>Bring our experts to your location for comprehensive training sessions.</p>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 training-card gsap-animate" data-delay="0.4">
                            <i class="fas fa-certificate"></i>
                            <h3>Certification Programs</h3>
                            <p>Structured certification programs with measurable learning outcomes.</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="#contact" class="btn-custom">Discuss Custom Training <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </section>

            <!-- Event Overlay -->
            <div class="event-overlay">
                <div class="event-overlay-content">
                    <button class="event-overlay-close"><i class="fas fa-times"></i></button>
                    <span class="category"></span>
                    <h3></h3>
                    <p class="lead"></p>
                    <div class="details"></div>
                    <div class="buttons"></div>
                </div>
            </div>
        </main>
    </div>
     @include('new.layouts.contactusform')
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
            // Filter Logic
            $('.btn-filter').on('click', function() {
                $('.btn-filter').removeClass('active');
                $(this).addClass('active');
                const filter = $(this).data('filter');
                $('.event-card').each(function() {
                    const category = $(this).data('category');
                    if (filter === 'all' || category === filter) {
                        $(this).show();
                        gsap.fromTo(this, 
                            { opacity: 0, y: 20 },
                            { opacity: 1, y: 0, duration: 0.5, ease: 'power3.out' }
                        );
                    } else {
                        $(this).hide();
                    }
                });
            });

            // Event Overlay Logic
            $('.event-card').on('click', function() {
                const category = $(this).data('category');
                const title = $(this).data('title');
                const description = $(this).data('description');
                const details = $(this).data('details').split('|');
                const buttonText = $(this).data('button-text').split('|');
                const buttonLink = $(this).data('button-link').split('|');

                $('.event-overlay .category').text(category);
                $('.event-overlay h3').text(title);
                $('.event-overlay .lead').text(description);
                $('.event-overlay .details').html('');
                details.forEach(detail => {
                    const icon = detail.includes('Online') ? 'fa-globe' : detail.includes('July') ? 'fa-calendar-alt' : detail.includes('AM') || detail.includes('PM') ? 'fa-clock' : detail.includes('NPR') || detail.includes('Free') ? 'fa-ticket-alt' : 'fa-map-marker-alt';
                    $('.event-overlay .details').append(`<p><i class="fas ${icon}"></i> ${detail}</p>`);
                });
                $('.event-overlay .buttons').html('');
                buttonText.forEach((text, index) => {
                    const icon = text.includes('Recording') ? 'fa-play' : text.includes('Resources') ? 'fa-download' : 'fa-arrow-right';
                    const className = text.includes('Recording') || text.includes('Resources') ? 'btn-resource' : 'btn-event';
                    $('.event-overlay .buttons').append(`<a href="${buttonLink[index]}" class="${className}">${text} <i class="fas ${icon}"></i></a>`);
                });

                $('.event-overlay').addClass('active');
                gsap.fromTo('.event-overlay-content', 
                    { opacity: 0, y: 20 },
                    { opacity: 1, y: 0, duration: 0.5, ease: 'power3.out' }
                );
            });

            $('.event-overlay-close, .event-overlay').on('click', function(e) {
                if (e.target === this || $(e.target).hasClass('event-overlay-close') || $(e.target).hasClass('fa-times')) {
                    $('.event-overlay').removeClass('active');
                    gsap.to('.event-overlay-content', {
                        opacity: 0,
                        y: 20,
                        duration: 0.5,
                        ease: 'power3.in',
                        onComplete: () => {
                            $('.event-overlay .category').text('');
                            $('.event-overlay h3').text('');
                            $('.event-overlay .lead').text('');
                            $('.event-overlay .details').html('');
                            $('.event-overlay .buttons').html('');
                        }
                    });
                }
            });

            // Card Hover Animation
            $('.event-card, .training-card').on('mouseenter', function() {
                gsap.to(this, {
                    scale: 1.03,
                    boxShadow: '0 15px 35px rgba(0, 33, 63, 0.25)',
                    duration: 0.2,
                    ease: 'power2.out'
                });
            }).on('mouseleave', function() {
                gsap.to(this, {
                    scale: 1,
                    boxShadow: '0 8px 25px rgba(0, 33, 63, 0.15)',
                    duration: 0.2,
                    ease: 'power2.out'
                });
            });
        });

        // GSAP Animations
        window.addEventListener('load', function () {
            gsap.registerPlugin(ScrollTrigger);

            // Hero Parallax
            gsap.to('.hero-section', {
                backgroundPosition: '50% 60%',
                ease: 'none',
                scrollTrigger: {
                    trigger: '.hero-section',
                    start: 'top bottom',
                    end: 'bottom top',
                    scrub: 1
                }
            });

            // Section and Card Reveal
            gsap.utils.toArray('.gsap-animate').forEach((el) => {
                const delay = parseFloat(el.getAttribute('data-delay')) || 0;
                gsap.fromTo(el,
                    { opacity: 0, y: 20 },
                    {
                        opacity: 1,
                        y: 0,
                        duration: 0.8,
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
        });
    </script>
@endsection