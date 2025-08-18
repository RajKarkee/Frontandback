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
                          <svg class="w-8 h-8 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            {!! $service->svg_icon !!}
                          </svg>
                        @elseif($service->icon)
                            <i class="{{ $service->icon }} w-8 h-8 text-crisp-white"></i>
                        @endif
                    </div>
                    <h3 class="text-lg font-montserrat font-semibold text-deep-chartered-blue mb-2">{{ $service->title }}</h3>
                    <p class="text-report-black text-sm">{{ $service->description }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
