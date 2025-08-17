<section class="section bg-audit-grey">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Industries We Serve</h2>
            <p class="section-subtitle">
                Deep industry expertise across diverse sectors, bringing specialized knowledge to meet your unique
                challenges.
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($industries->take(4) as $industry)
                <div
                    class="text-center p-6 bg-crisp-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 fade-in">
                    <div class="text-fresh-teal mb-3">
                        <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="{{ $industry->icon }}" />
                        </svg>
                    </div>
                    <h4 class="font-montserrat font-semibold text-deep-chartered-blue">{{ $industry->name }}</h4>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-12 fade-in">
            <a href="{{ route('industries') }}" class="btn-outline">
                View All Industries
                <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
    </div>
</section>
