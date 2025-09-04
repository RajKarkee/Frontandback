@extends('new.layouts.sidebar')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/ourteam.css') }}">
@endsection

@section('content')
    <div class="rka-scope" id="main-content">
        <main>
            <!-- Hero Section -->
            <section class="hero-section">
                <div class="hero-content gsap-animate">
                    <h1>Meet Our Team</h1>
                    <p>Meet our team of dedicated professionals delivering exceptional results for our clients.</p>
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="{{ route('careers') }}" class="btn-primary-filled"><i class="fas fa-briefcase"></i> Join Our
                            Team</a>
                        <a href="{{ route('contact') }}" class="btn-primary-outline"><i class="fas fa-envelope"></i> Contact
                            Us</a>
                    </div>
                </div>
            </section>

            <!-- Team Section -->
            <section class="team-section">
                <div class="section-container">
                    <h2 class="gsap-animate">Meet Our Team</h2>
                    <p class="lead gsap-animate">Meet our team of dedicated professionals delivering exceptional results for
                        our clients.</p>
                    <div class="row g-8">
                        @foreach ($teams as $index => $team)
                            <div class="col-lg-4 col-md-6 col-12 gsap-animate" data-delay="{{ ($index % 3) * 0.08 }}">
                                <div class="team-card">
                                    @if ($team->image)
                                        <img src="{{ Storage::url($team->image) }}" alt="{{ $team->name }}"
                                            class="gsap-image">
                                    @else
                                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=400&auto=format&fit=crop"
                                            alt="{{ $team->name }}" class="gsap-image">
                                    @endif
                                    <div class="content">
                                        <h3>{{ $team->name }}</h3>
                                        <p class="role">{{ $team->position }}</p>
                                        <p>{{ $team->bio }}</p>

                                        @if ($team->linkedin_url || $team->twitter_url || $team->facebook_url || $team->email)
                                            <div class="social-links mt-3">
                                                @if ($team->email)
                                                    <a href="mailto:{{ $team->email }}" class="text-primary me-2"
                                                        title="Email">
                                                        <i class="fas fa-envelope"></i>
                                                    </a>
                                                @endif
                                                @if ($team->linkedin_url)
                                                    <a href="{{ $team->linkedin_url }}" target="_blank"
                                                        class="text-primary me-2" title="LinkedIn">
                                                        <i class="fab fa-linkedin-in"></i>
                                                    </a>
                                                @endif
                                                @if ($team->twitter_url)
                                                    <a href="{{ $team->twitter_url }}" target="_blank"
                                                        class="text-primary me-2" title="Twitter">
                                                        <i class="fab fa-twitter"></i>
                                                    </a>
                                                @endif
                                                @if ($team->facebook_url)
                                                    <a href="{{ $team->facebook_url }}" target="_blank"
                                                        class="text-primary me-2" title="Facebook">
                                                        <i class="fab fa-facebook-f"></i>
                                                    </a>
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
        window.addEventListener('load', function() {
            gsap.registerPlugin(ScrollTrigger);

            // General reveal animations for text and cards
            gsap.utils.toArray('.gsap-animate').forEach((el) => {
                const delay = parseFloat(el.getAttribute('data-delay')) || 0;
                gsap.fromTo(el, {
                    opacity: 0,
                    y: 40
                }, {
                    opacity: 1,
                    y: 0,
                    duration: 1,
                    delay,
                    ease: 'power4.out',
                    scrollTrigger: {
                        trigger: el,
                        start: 'top 85%',
                        once: true,
                        invalidateOnRefresh: true
                    }
                });
            });

            // Button animations
            gsap.utils.toArray('.btn-primary-filled, .btn-primary-outline').forEach((btn) => {
                gsap.fromTo(btn, {
                    opacity: 0,
                    scale: 0.9
                }, {
                    opacity: 1,
                    scale: 1,
                    duration: 0.8,
                    ease: 'power4.out',
                    scrollTrigger: {
                        trigger: btn,
                        start: 'top 90%',
                        once: true
                    }
                });
            });

            // Team card image animations
            gsap.utils.toArray('.gsap-image').forEach((img, i) => {
                gsap.fromTo(img, {
                    opacity: 0,
                    scale: 0.8
                }, {
                    opacity: 1,
                    scale: 1,
                    duration: 0.8,
                    delay: i * 0.08,
                    ease: 'power4.out',
                    scrollTrigger: {
                        trigger: img,
                        start: 'top 85%',
                        once: true
                    }
                });
            });

            // Team card animations
            gsap.utils.toArray('.team-card').forEach((card, i) => {
                gsap.fromTo(card, {
                    opacity: 0,
                    y: 20
                }, {
                    opacity: 1,
                    y: 0,
                    duration: 0.8,
                    delay: i * 0.08,
                    ease: 'power4.out',
                    scrollTrigger: {
                        trigger: card,
                        start: 'top 85%',
                        once: true
                    }
                });
            });

            // Recalc positions after images affect layout
            ScrollTrigger.refresh();
        });
    </script>
@endsection
