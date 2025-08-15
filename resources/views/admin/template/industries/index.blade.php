<section class="section">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Our Industry Expertise</h2>
            <p class="section-subtitle">
                We understand that every industry has its unique challenges, regulations, and opportunities. Our specialized teams deliver targeted solutions that drive results.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($industries as $index => $industry)
            <!-- {{ $industry->name }} -->
            <div class="industry-card service-card fade-in @if($index % 3 == 1) fade-in-delay-1 @elseif($index % 3 == 2) fade-in-delay-2 @endif">
                <div class="service-icon-wrapper">
                    @if($industry->svg_icon)
                        <svg class="service-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $industry->svg_icon }}" />
                        </svg>
                    @elseif($industry->icon)
                        <i class="{{ $industry->icon }} service-icon"></i>
                    @else
                        <svg class="service-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    @endif
                </div>
                <h3 class="service-title">{{ $industry->title ?: $industry->name }}</h3>
                <p class="service-description">
                    {{ $industry->description }}
                </p>
                @if($industry->features && is_array($industry->features) && count($industry->features) > 0)
                <ul class="industry-features">
                    @foreach($industry->features as $feature)
                        <li>{{ $feature }}</li>
                    @endforeach
                </ul>
                @endif
                {{-- <div class="mt-4">
                    <a href="{{ route('industries.show', $industry->slug) }}" class="btn-link">
                        Learn More
                        <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div> --}}
            </div>
            @endforeach
        </div>
    </div>
</section>
