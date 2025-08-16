<section class="section">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Why Choose Chartered Insights?</h2>
            <p class="section-subtitle">
                We believe our people are our greatest asset. That's why we invest in creating an environment where talent thrives and careers flourish.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($benefits as $index => $benefit)
            <div class="benefit-card text-center fade-in @if($index > 0) fade-in-delay-{{ ($index % 3) + 1 }} @endif">
                <div class="w-16 h-16 {{ $benefit->color_class }} rounded-full flex items-center justify-center mx-auto mb-4">
                    {!! $benefit->icon !!}
                </div>
                <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-3">{{ $benefit->title }}</h3>
                <p class="text-report-black">
                    {{ $benefit->description }}
                </p>
            </div>
            @empty
            <!-- Fallback static content -->
            <div class="benefit-card text-center fade-in">
                <div class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-3">Professional Growth</h3>
                <p class="text-report-black">
                    Continuous learning opportunities, professional certifications, and clear career progression paths to help you reach your potential.
                </p>
            </div>
            @endforelse
        </div>
    </div>
</section>
