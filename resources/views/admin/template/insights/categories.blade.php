   <section class="section bg-audit-grey">
        <div class="container-custom">
            <div class="section-header fade-in">
                <h2 class="section-title">Browse by Category</h2>
                <p class="section-subtitle">
                    Explore our insights organized by topics relevant to your business interests.
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
                @if ($categories && $categories->count() > 0)
                    @foreach ($categories as $index => $category)
                        <a href="{{ route('insights.category', $category->slug) }}"
                            class="category-card text-center p-6 bg-crisp-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 fade-in {{ $index > 0 ? 'fade-in-delay-' . min($index, 2) : '' }} text-decoration-none">
                            @if ($category->icon)
                                <div class="w-12 h-12 text-fresh-teal mx-auto mb-3">
                                    {!! $category->icon !!}
                                </div>
                            @else
                                <svg class="w-12 h-12 text-fresh-teal mx-auto mb-3" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            @endif
                            <h4 class="font-montserrat font-semibold text-deep-chartered-blue">{{ $category->name }}</h4>
                            <p class="text-sm text-report-black mt-2">{{ $category->insights_count }}
                                {{ Str::plural('Article', $category->insights_count) }}</p>
                        </a>
                    @endforeach
                @else
                    <!-- Fallback static categories -->
                    <div
                        class="category-card text-center p-6 bg-crisp-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 fade-in">
                        <svg class="w-12 h-12 text-fresh-teal mx-auto mb-3" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        <h4 class="font-montserrat font-semibold text-deep-chartered-blue">Audit & Assurance</h4>
                        <p class="text-sm text-report-black mt-2">12 Articles</p>
                    </div>

                    <div
                        class="category-card text-center p-6 bg-crisp-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 fade-in fade-in-delay-1">
                        <svg class="w-12 h-12 text-fresh-teal mx-auto mb-3" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                        </svg>
                        <h4 class="font-montserrat font-semibold text-deep-chartered-blue">Tax Advisory</h4>
                        <p class="text-sm text-report-black mt-2">15 Articles</p>
                    </div>

                    <div
                        class="category-card text-center p-6 bg-crisp-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 fade-in fade-in-delay-2">
                        <svg class="w-12 h-12 text-fresh-teal mx-auto mb-3" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        <h4 class="font-montserrat font-semibold text-deep-chartered-blue">Risk Management</h4>
                        <p class="text-sm text-report-black mt-2">8 Articles</p>
                    </div>

                    <div
                        class="category-card text-center p-6 bg-crisp-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 fade-in">
                        <svg class="w-12 h-12 text-fresh-teal mx-auto mb-3" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                        <h4 class="font-montserrat font-semibold text-deep-chartered-blue">Business Strategy</h4>
                        <p class="text-sm text-report-black mt-2">10 Articles</p>
                    </div>

                    <div
                        class="category-card text-center p-6 bg-crisp-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 fade-in fade-in-delay-1">
                        <svg class="w-12 h-12 text-fresh-teal mx-auto mb-3" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <h4 class="font-montserrat font-semibold text-deep-chartered-blue">Technology</h4>
                        <p class="text-sm text-report-black mt-2">6 Articles</p>
                    </div>

                    <div
                        class="category-card text-center p-6 bg-crisp-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 fade-in fade-in-delay-2">
                        <svg class="w-12 h-12 text-fresh-teal mx-auto mb-3" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                        <h4 class="font-montserrat font-semibold text-deep-chartered-blue">Compliance</h4>
                        <p class="text-sm text-report-black mt-2">9 Articles</p>
                    </div>
                @endif
            </div>
        </div>
    </section>
