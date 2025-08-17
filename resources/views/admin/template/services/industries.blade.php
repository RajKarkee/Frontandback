<section class="section bg-audit-grey">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Industry Expertise</h2>
            <p class="section-subtitle">
                Specialized knowledge across key sectors, bringing industry-specific insights to every engagement.
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
            @foreach ($industries->take(6) as $industry)
                <div
                    class="text-center p-4 bg-crisp-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 fade-in">
                    <svg class="w-8 h-8 text-fresh-teal mx-auto mb-2" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="{{ $industry->svg_icon }}" />
                    </svg>
                    <h5 class="font-semibold text-deep-chartered-blue text-sm">{{ $industry->name }}</h5>
                </div>
            @endforeach
        </div>
    </div>
</section>
