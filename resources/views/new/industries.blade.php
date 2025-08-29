@extends('new.layouts.sidebar')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/industries.css') }}">
    @include('new.layouts.links')
@endsection

@section('content')
<div class="rka-scope" style="margin: 0; padding: 0; overflow-x: hidden;">
    <main style="margin: 0; padding: 0; width: 100vw;">
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="hero-slide hero-slide-1">
                <div class="hero-content gsap-animate">
                    <h1>Industry Expertise</h1>
                    <p>Tailored financial and advisory solutions for your industry’s unique challenges and opportunities.</p>
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="#industries" class="btn-primary-filled">
                            Explore Industries <i class="fas fa-arrow-right"></i>
                        </a>
                        <a href="#contact" class="btn-primary-outline">
                            Contact Us <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Industry Expertise Section -->
        <section class="industries-section" id="industries">
            <div class="section-container">
                <h2 class="gsap-animate">Our Industry Expertise</h2>
                <p class="lead gsap-animate">
                    We understand that every industry has its unique challenges, regulations, and opportunities. Our specialized teams deliver targeted solutions that drive results.
                </p>
                <div class="row g-5">
                    {{-- Dynamic industries --}}
                    @foreach($industries as $index => $industry)
                        <div class="col-12 col-md-6 col-lg-4 gsap-animate">
                            <div class="industry-card">
                                @if($industry->svg_icon)
                                    <svg class="service-icon" width="40" height="40" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $industry->svg_icon }}" />
                                    </svg>
                                @elseif($industry->icon)
                                    <i class="{{ $industry->icon }} service-icon"></i>
                                @else
                                    <svg class="service-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                @endif
                                <h3>{{ $industry->title ?: $industry->name }}</h3>
                                {{-- @if($industry->features && is_array($industry->features) && count($industry->features) > 0) --}}
                                @if($industry->features)
                                    <ul class="industry-features">

                                        @foreach(json_decode($industry->features) as $feature)
                                            <li>{{ $feature }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    @endforeach

                    {{-- Static fallback cards --}}
                    {{-- <div class="col-12 col-md-6 col-lg-4 gsap-animate" data-delay="0.2">
                        <div class="industry-card">
                            <i class="fas fa-industry"></i>
                            <h3>Manufacturing & Industrial</h3>
                            <ul>
                                <li>Cost accounting systems</li>
                                <li>Inventory management</li>
                                <li>Supply chain finance</li>
                                <li>Industrial tax planning</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 gsap-animate" data-delay="0.4">
                        <div class="industry-card">
                            <i class="fas fa-laptop-code"></i>
                            <h3>Technology & Software</h3>
                            <ul>
                                <li>Software revenue recognition</li>
                                <li>R&D tax incentives</li>
                                <li>IP valuation</li>
                                <li>Startup financial planning</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 gsap-animate" data-delay="0.6">
                        <div class="industry-card">
                            <i class="fas fa-building"></i>
                            <h3>Real Estate & Construction</h3>
                            <ul>
                                <li>Project cost accounting</li>
                                <li>Property valuation</li>
                                <li>Construction audits</li>
                                <li>Real estate tax planning</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 gsap-animate" data-delay="0.8">
                        <div class="industry-card">
                            <i class="fas fa-university"></i>
                            <h3>Financial Services</h3>
                            <ul>
                                <li>Banking compliance</li>
                                <li>Insurance accounting</li>
                                <li>Investment audits</li>
                                <li>Fintech advisory</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 gsap-animate" data-delay="1.0">
                        <div class="industry-card">
                            <i class="fas fa-hand-holding-heart"></i>
                            <h3>Non-Profit & NGOs</h3>
                            <ul>
                                <li>Grant accounting</li>
                                <li>Donor compliance</li>
                                <li>Impact reporting</li>
                                <li>Non-profit audits</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 gsap-animate" data-delay="1.2">
                        <div class="industry-card">
                            <i class="fas fa-hotel"></i>
                            <h3>Hospitality & Tourism</h3>
                            <ul>
                                <li>Hotel revenue management</li>
                                <li>Restaurant accounting</li>
                                <li>Tourism tax planning</li>
                                <li>Seasonal cash flow</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 gsap-animate" data-delay="1.4">
                        <div class="industry-card">
                            <i class="fas fa-graduation-cap"></i>
                            <h3>Education & Training</h3>
                            <ul>
                                <li>Educational accounting</li>
                                <li>Student fee management</li>
                                <li>Institutional audits</li>
                                <li>Education compliance</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 gsap-animate" data-delay="1.6">
                        <div class="industry-card">
                            <i class="fas fa-shopping-cart"></i>
                            <h3>Retail & E-commerce</h3>
                            <ul>
                                <li>Retail accounting systems</li>
                                <li>E-commerce analytics</li>
                                <li>Multi-channel reporting</li>
                                <li>Customer profitability</li>
                            </ul>
                        </div>
                    </div> --}}
                </div>
                <div class="btn-all-container gsap-animate">
                    <a href="#contact" class="btn-all">
                        View All Industries <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </section>

        <!-- Industry Insights Section -->
        <section class="insights-section" id="insights">
            <div class="section-container">
                <h2 class="gsap-animate">Industry-Specific Insights</h2>
                <p class="lead gsap-animate">
                    Stay informed with our latest industry analysis and expert commentary on sector-specific trends and challenges.
                </p>
                <div class="row g-4">
                    <div class="col-12 col-md-6 col-lg-4 gsap-animate">
                        <div class="insight-card">
                            <div class="image-container">
                                <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=1200&auto=format&fit=crop" alt="Digital Health Revolution">
                                <div class="gradient-overlay"></div>
                                <div class="title-overlay">
                                    <h3>Digital Health Revolution: Financial Implications</h3>
                                </div>
                                <div class="content-overlay">
                                    <span class="category">Healthcare</span>
                                    <h3>Digital Health Revolution: Financial Implications</h3>
                                    <div class="date">January 12, 2024 • 6 min read</div>
                                    <p>How telemedicine and digital health platforms are transforming healthcare finance and what providers need to know.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 gsap-animate" data-delay="0.2">
                        <div class="insight-card">
                            <div class="image-container">
                                <img src="https://images.unsplash.com/photo-1565514020179-026b92b84bb6?q=80&w=1200&auto=format&fit=crop" alt="Industry 4.0">
                                <div class="gradient-overlay"></div>
                                <div class="title-overlay">
                                    <h3>Industry 4.0: Cost Accounting for Smart Manufacturing</h3>
                                </div>
                                <div class="content-overlay">
                                    <span class="category">Manufacturing</span>
                                    <h3>Industry 4.0: Cost Accounting for Smart Manufacturing</h3>
                                    <div class="date">January 8, 2024 • 7 min read</div>
                                    <p>Understanding the financial impact of automation and IoT integration in modern manufacturing operations.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 gsap-animate" data-delay="0.4">
                        <div class="insight-card">
                            <div class="image-container">
                                <img src="https://images.unsplash.com/photo-1560472354-b33ff0c44a43?q=80&w=1200&auto=format&fit=crop" alt="Startup Valuations">
                                <div class="gradient-overlay"></div>
                                <div class="title-overlay">
                                    <h3>Startup Valuations in Nepal's Tech Ecosystem</h3>
                                </div>
                                <div class="content-overlay">
                                    <span class="category">Technology</span>
                                    <h3>Startup Valuations in Nepal's Tech Ecosystem</h3>
                                    <div class="date">January 5, 2024 • 8 min read</div>
                                    <p>Analysis of valuation methodologies and financial planning strategies for Nepal's growing tech startup scene.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btn-all-container gsap-animate">
                    <a href="#insights" class="btn-all">
                        View All Insights <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </section>

        <!-- Why Choose Section -->
        <section class="why-choose-section">
            <div class="section-container">
                <h2 class="gsap-animate">Why Choose Our Industry Expertise?</h2>
                <p class="lead gsap-animate">
                    We combine deep industry knowledge with technical excellence to deliver solutions that address your sector's unique challenges.
                </p>
                <div class="row g-4">
                    @foreach($industryExperties as $index => $experties)
                    <div class="col-12 col-md-6 col-lg-3 gsap-animate" data-delay="{{ $index * 0.1 }}">
                        <div class="why-card">
                            <i class="{{$experties->icon_class}}"></i>
                            <h4>{{$experties->title}}</h4>
                            <p>{{$experties->description}}</p>
                        </div>
                    </div>
                    @endforeach
                    {{-- <div class="col-12 col-md-6 col-lg-3 gsap-animate" data-delay="0.2">
                        <div class="why-card">
                            <i class="fas fa-check-circle"></i>
                            <h4>Proven Results</h4>
                            <p>We have a track record of delivering measurable outcomes and driving growth for businesses across various industries.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 gsap-animate" data-delay="0.4">
                        <div class="why-card">
                            <i class="fas fa-handshake"></i>
                            <h4>Strategic Partnerships</h4>
                            <p>We build long-term relationships with our clients, serving as trusted advisors and strategic partners in their growth journey.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 gsap-animate" data-delay="0.6">
                        <div class="why-card">
                            <i class="fas fa-lightbulb"></i>
                            <h4>Innovation Focus</h4>
                            <p>We stay ahead of industry trends and leverage cutting-edge technologies to provide innovative solutions that drive competitive advantage.</p>
                        </div>
                    </div> --}}
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta-section">
            <div class="section-container">
                <h2 class="gsap-animate">Ready to Partner with Industry Experts?</h2>
                <p class="gsap-animate">
                    Whether you're looking to optimize operations, ensure compliance, or drive growth, our industry-specialized teams are ready to help you achieve your goals.
                </p>
                <div class="d-flex flex-column flex-sm-row justify-content-center gap-3 gsap-animate" data-delay="0.2">
                    <a href="#contact" class="btn-cta-filled">
                        Schedule a Consultation <i class="fas fa-arrow-right"></i>
                    </a>
                    <a href="#services" class="btn-cta-outline">
                        Explore Our Services <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </section>
    </main>
</div>
 @include('new.layouts.contactusform')
@endsection

@section('scripts')
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- GSAP and ScrollTrigger -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script>
        // GSAP Animations
        window.addEventListener('load', function () {
            gsap.registerPlugin(ScrollTrigger);

            // General reveal animations
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
        });
    </script>
@endsection
