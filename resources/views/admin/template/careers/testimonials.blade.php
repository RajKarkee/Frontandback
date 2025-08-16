<section class="section bg-deep-chartered-blue text-crisp-white">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title text-crisp-white">What Our Team Says</h2>
            <p class="section-subtitle text-audit-grey">
                Hear from our team members about their experience working at Chartered Insights.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($testimonials as $index => $testimonial)
            <div class="testimonial-card fade-in @if($index > 0) fade-in-delay-{{ ($index % 3) + 1 }} @endif">
                <div class="testimonial-content">
                    <p class="testimonial-text">
                        "{{ $testimonial->testimonial }}"
                    </p>
                    <div class="testimonial-author">
                        @if($testimonial->photo_url)
                        <img src="{{ $testimonial->photo_url }}" alt="{{ $testimonial->employee_name }}" class="author-photo">
                        @endif
                        <div class="author-info">
                            <h4 class="author-name">{{ $testimonial->employee_name }}</h4>
                            <p class="author-position">{{ $testimonial->position }}</p>
                            @if($testimonial->years_with_company)
                            <p class="author-tenure">{{ $testimonial->years_with_company }} years with company</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <!-- Fallback static testimonials -->
            <div class="testimonial-card fade-in">
                <div class="testimonial-content">
                    <p class="testimonial-text">
                        "The professional development opportunities here are exceptional. I've grown from a junior auditor to a senior position in just three years, with constant support and mentorship."
                    </p>
                    <div class="testimonial-author">
                        <div class="author-info">
                            <h4 class="author-name">Priya Sharma</h4>
                            <p class="author-position">Senior Auditor</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>
