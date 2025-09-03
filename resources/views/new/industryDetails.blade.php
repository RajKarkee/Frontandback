@extends('new.layouts.sidebar')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/industryDetails.css') }}">
    @include('new.layouts.links')
@endsection

@section('content')
    <div class="rka-scope">
        <main>
            <!-- Industry Header Section -->
            <section class="industry-header-section">
                <div class="section-container">
                    <div class="industry-header-content gsap-animate">
                        <h1>Industries Details</h1>
                        <p class="lead">This page is responsible for providing details of each industry</p>
                        <div class="d-flex flex-wrap justify-content-center gap-3">
                            <a href="/contact" class="btn-primary-filled gsap-animate" data-delay="0.2">Get Started <i class="fas fa-arrow-right"></i></a>
                            <a href="/industries" class="btn-primary-outline gsap-animate" data-delay="0.4">Back to Industries <i class="fas fa-arrow-left"></i></a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Industry Details Section -->
            <section class="industry-details-section">
                <div class="section-container">
                    <div class="row g-4 justify-content-center">
                        <div class="col-12 col-lg-8 gsap-animate">
                            <div class="detail-card">
                                <div class="detail-content">
                                    <h2>Industry Overview</h2>
                                    <p>{{ $industry->content ?? $industry->description }}</p>
                                    @if (isset($industry->features) && is_array(json_decode($industry->features)))
                                        <h3>Key Features</h3>
                                        <ul class="key-features">
                                            @foreach (json_decode($industry->features) as $feature)
                                                <li class="gsap-animate" data-delay="{{ $loop->index * 0.1 }}">{{ $feature }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    <h3>Industry Details</h3>
                                    <ul class="no-bullets">
                                        <li class="gsap-animate" data-delay="0.2"><strong>Category:</strong> {{ $industry->category ?? 'N/A' }}</li>
                                        <li class="gsap-animate" data-delay="0.3"><strong>Status:</strong> {{ $industry->status ?? 'N/A' }}</li>
                                        <li class="gsap-animate" data-delay="0.4"><strong>Created:</strong> {{ $industry->created_at ?? 'N/A' }}</li>
                                        <li class="gsap-animate" data-delay="0.5"><strong>Last Updated:</strong> {{ $industry->updated_at ?? 'N/A' }}</li>
                                    </ul>
                                </div>
                                <img src="https://images.unsplash.com/photo-1505751172876-fa1923c5c7a5?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&w=800&h=600"
                                    alt="{{ $industry->title }}" class="industry-image gsap-animate" data-delay="0.6">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Call to Action Section -->
            <section class="cta-section">
                <div class="section-container">
                    <div class="gsap-animate">
                        <h2>Ready to Transform Your {{ $industry->title }} Business?</h2>
                        <p>Contact us today to learn how our expertise in {{ $industry->title }} can drive your success.</p>
                        <div class="cta-buttons">
                            <a href="/contact" class="btn-primary-filled gsap-animate" data-delay="0.2">Contact Us <i class="fas fa-arrow-right"></i></a>
                            <a href="/industries" class="btn-primary-outline gsap-animate" data-delay="0.4">Explore More Industries <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        @include('new.layouts.contactusform')
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
        // GSAP Animation
        window.addEventListener('load', function() {
            gsap.registerPlugin(ScrollTrigger);

            gsap.utils.toArray('.gsap-animate').forEach((el) => {
                const delay = parseFloat(el.getAttribute('data-delay')) || 0;
                gsap.fromTo(el, {
                    opacity: 0,
                    y: 40
                }, {
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
                });
            });

            ScrollTrigger.refresh();
        });
    </script>
@endsection