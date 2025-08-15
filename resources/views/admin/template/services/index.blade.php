<!-- Services Overview -->
<section class="section">
    <div class="container-custom">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $index => $service)
            <!-- {{ $service->title }} -->
            <div class="service-card fade-in {{ $index % 3 == 1 ? 'fade-in-delay-1' : ($index % 3 == 2 ? 'fade-in-delay-2' : '') }}">
                <svg class="service-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    {!! $service->svg_icon !!}
                </svg>
                <h3 class="service-title">{{ $service->title }}</h3>
                <p class="service-description">
                    {{ $service->description }}
                </p>
                @if($service->features)
                <ul class="text-sm text-report-black space-y-1 mb-4">
                    @foreach($service->features as $feature)
                    <li>• {{ $feature }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Detailed Service Sections -->
<section class="section bg-audit-grey">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Service Details</h2>
            <p class="section-subtitle">
                Explore our comprehensive service offerings and discover how we can support your business goals.
            </p>
        </div>

        @foreach($services->take(3) as $index => $service)
        <!-- {{ $service->title }} Detail -->
        <div class="bg-crisp-white rounded-lg shadow-lg p-8 mb-8 fade-in">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                @if($index % 2 == 0)
                <!-- Text on left, image on right for even index (0, 2, 4...) -->
                <div>
                    <h3 class="text-2xl font-montserrat font-bold text-deep-chartered-blue mb-4">{{ $service->title }}</h3>
                    <p class="text-lg text-report-black mb-6">
                        {{ $service->detailed_description ?? $service->description }}
                    </p>
                    @if($service->sub_services)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($service->sub_services as $subServiceTitle => $subServiceItems)
                        <div>
                            <h4 class="font-semibold text-deep-chartered-blue mb-2">{{ $subServiceTitle }}</h4>
                            <ul class="text-sm text-report-black space-y-1">
                                @foreach($subServiceItems as $item)
                                <li>• {{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
                <div class="text-center">
                    @if($service->featured_image)
                    <img src="{{ $service->featured_image }}"
                         alt="{{ $service->title }}"
                         class="rounded-lg shadow-lg w-full h-auto">
                    @else
                    <svg class="w-24 h-24 text-fresh-teal mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        {!! $service->svg_icon !!}
                    </svg>
                    @endif
                </div>
                @else
                <!-- Image on left, text on right for odd index (1, 3, 5...) -->
                <div class="text-center order-2 lg:order-1">
                    @if($service->featured_image)
                    <img src="{{ $service->featured_image }}"
                         alt="{{ $service->title }}"
                         class="rounded-lg shadow-lg w-full h-auto">
                    @else
                    <svg class="w-24 h-24 text-fresh-teal mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        {!! $service->svg_icon !!}
                    </svg>
                    @endif
                </div>
                <div class="order-1 lg:order-2">
                    <h3 class="text-2xl font-montserrat font-bold text-deep-chartered-blue mb-4">{{ $service->title }}</h3>
                    <p class="text-lg text-report-black mb-6">
                        {{ $service->detailed_description ?? $service->description }}
                    </p>
                    @if($service->sub_services)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($service->sub_services as $subServiceTitle => $subServiceItems)
                        <div>
                            <h4 class="font-semibold text-deep-chartered-blue mb-2">{{ $subServiceTitle }}</h4>
                            <ul class="text-sm text-report-black space-y-1">
                                @foreach($subServiceItems as $item)
                                <li>• {{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</section>
