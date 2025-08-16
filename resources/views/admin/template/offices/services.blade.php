<section class="section">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Services Available at All Locations</h2>
            <p class="section-subtitle">
                Each of our offices provides the complete range of our professional services, ensuring consistent quality and expertise regardless of location.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($services as $index => $service)
                <div class="service-highlight text-center fade-in {{ $index > 0 ? 'fade-in-delay-' . $index : '' }}">
                    <div class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                        @if($service->svg_icon)
                            {!! $service->svg_icon !!}
                        @elseif($service->icon)
                            <i class="{{ $service->icon }} w-8 h-8 text-crisp-white"></i>
                        @else
                            <!-- Default SVG icon -->
                            <svg class="w-8 h-8 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        @endif
                    </div>
                    <h3 class="text-lg font-montserrat font-semibold text-deep-chartered-blue mb-2">{{ $service->title }}</h3>
                    <p class="text-report-black text-sm">{{ $service->description }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
