<section class="section">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Our Core Services</h2>
            <p class="section-subtitle">
                Comprehensive chartered accountancy services designed to drive your business forward with precision,
                integrity, and strategic insight.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($services as $index => $service)
                <div
                    class="service-card fade-in{{ $index % 3 === 1 ? ' fade-in-delay-1' : ($index % 3 === 2 ? ' fade-in-delay-2' : '') }}">
                    @if ($service->svg_icon)
                        <svg class="service-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            {!! $service->svg_icon !!}
                        </svg>
                    @else
                        <svg class="service-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" stroke-width="2" />
                        </svg>
                    @endif
                    <h3 class="service-title">{{ $service->title }}</h3>
                    <p class="service-description">
                        {{ $service->description }}
                    </p>
                    <a href="{{ route('services') }}"
                        class="text-fresh-teal font-semibold hover:text-deep-chartered-blue transition-colors duration-200">
                        Learn More →
                    </a>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-12 fade-in">
            <a href="{{ route('services') }}" class="btn-primary">
                View All Services
                <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
    </div>
</section>
``
