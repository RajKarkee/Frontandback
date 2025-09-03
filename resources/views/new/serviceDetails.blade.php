@extends('new.layouts.sidebar')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/serviceDetails.css') }}">
    @include('new.layouts.links')
@endsection

@section('content')


    <div class="rka-scope">
        <main>
            <!-- Service Header Section -->
            <section class="service-header-section">
                <div class="section-container">
                    <div class="service-header-content gsap-animate">
                        <h1>{{ $service->title }}</h1>
                        <p class="lead">{{ $service->description }}</p>
                        <div class="d-flex flex-wrap justify-content-center gap-3">
                            <a href="/contact" class="btn-primary-filled">Get Started <i class="fas fa-arrow-right"></i></a>
                            <a href="/services" class="btn-primary-outline">Back to Services <i
                                    class="fas fa-arrow-left"></i></a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Service Details Section -->
            <section class="service-details-section">
                <div class="section-container">
                    <div class="row g-4">
                        <div class="col-12 gsap-animate">
                            <div class="detail-card">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 detail-content">
                                        <h2>Service Overview</h2>
                                        <p>{{ $service->content ?? $service->detailed_description }}</p>
                                        @if (isset($service->key_features) && is_array($service->key_features))
                                            <h3>Key Features</h3>
                                            <ul>
                                                @foreach ($service->key_features as $feature)
                                                    <li>{{ $feature }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                        @if (isset($service->sub_services) && is_array($service->sub_services))
                                            @foreach ($service->sub_services as $sub => $items)
                                                <h3>{{ $sub }}</h3>
                                                <ul>
                                                    @foreach ($items as $item)
                                                        <li>{{ $item }}</li>
                                                    @endforeach
                                                </ul>
                                            @endforeach
                                        @endif
                                        <h3>Service Features</h3>
                                        <ul class="no-bullets">
                                            @foreach ($service->features as $index => $feature)
                                                <li>{{ $feature }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-lg-6">
                                        <img src="{{ $service->featured_image ? Storage::url($service->featured_image) : 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&w=800&h=600' }}"
                                            alt="{{ $service->title }}" class="service-image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Call to Action Section -->
            <section class="cta-section">
                <div class="section-container">
                    <div class="gsap-animate">
                        <h2>Ready to Elevate Your Business?</h2>
                        <p>Contact us today to learn how {{ $service->title }} can drive your success.</p>
                        <div class="cta-buttons">
                            <a href="/contact" class="btn-primary-filled">Contact Us <i class="fas fa-arrow-right"></i></a>
                            <a href="/services" class="btn-primary-outline">Explore More Services <i
                                    class="fas fa-arrow-right"></i></a>
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
