<section class="section">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Why Choose Our Industry Expertise?</h2>
            <p class="section-subtitle">
                We combine deep industry knowledge with technical excellence to deliver solutions that address your sector's unique challenges.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($expertises as $index => $expertise)
            <div class="text-center fade-in {{ $index > 0 ? 'fade-in-delay-' . $index : '' }}">
                <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4"
                     style="background-color: {{ $expertise->color_theme ?? '#10b981' }};">
                    @if($expertise->svg_icon)
                        <div class="expertise-icon-container text-crisp-white">
                            {!! $expertise->svg_icon !!}
                        </div>
                    @elseif($expertise->icon_class)
                        <i class="{{ $expertise->icon_class }} text-crisp-white text-2xl"></i>
                    @else
                        <svg class="w-8 h-8 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                    @endif
                </div>
                <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-3">{{ $expertise->title }}</h3>
                <p class="text-report-black">
                    {{ $expertise->description }}
                </p>
            </div>
            @endforeach
        </div>
    </div>
</section>
