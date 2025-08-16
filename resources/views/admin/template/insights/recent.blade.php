  <section class="section">
        <div class="container-custom">
            <div class="section-header fade-in">
                <h2 class="section-title">Recent Articles</h2>
                <p class="section-subtitle">
                    Stay updated with our latest insights and expert commentary.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @if ($recentInsights && $recentInsights->count() > 0)
                    @foreach ($recentInsights as $index => $insight)
                        <article
                            class="blog-card fade-in {{ $index > 0 ? 'fade-in-delay-' . min($index, 2) : '' }} group cursor-pointer overflow-hidden rounded-lg bg-white shadow-md hover:shadow-2xl transform transition-all duration-500 ease-out hover:scale-[1.02] relative h-80">
                            <!-- Background Image -->
                            <div class="absolute inset-0 w-full h-full">
                                <img src="{{ $insight->featured_image ? Storage::url($insight->featured_image) : 'https://images.unsplash.com/photo-1600880292089-90a7e086ee0c?q=80&w=800&auto=format&fit=crop' }}"
                                    alt="{{ $insight->title }}"
                                    class="w-full h-full object-cover transition-all duration-700 ease-out group-hover:scale-110 group-hover:brightness-50">
                            </div>

                            <!-- Dark overlay on hover -->
                            <div
                                class="absolute inset-0 bg-black/0 group-hover:bg-black/60 transition-all duration-500 ease-out">
                            </div>

                            <!-- Non-hover content - Bottom overlay -->
                            <div
                                class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/80 to-transparent group-hover:opacity-0 transition-opacity duration-500">
                                <span
                                    class="text-xs font-semibold text-white/80 uppercase tracking-wide">{{ $insight->insightCategory ? strtoupper($insight->insightCategory->name) : 'GENERAL' }}</span>
                                <h3 class="text-xl font-semibold text-white mt-1">
                                    {{ $insight->title }}
                                </h3>
                            </div>

                            <!-- Hover content - Center content -->
                            <div
                                class="absolute inset-0 flex flex-col justify-center items-center p-6 text-center opacity-0 group-hover:opacity-100 transition-all duration-500 ease-out transform translate-y-4 group-hover:translate-y-0">
                                <span
                                    class="text-sm font-semibold text-white/90 uppercase tracking-wide mb-3">{{ $insight->insightCategory ? strtoupper($insight->insightCategory->name) : 'GENERAL' }}</span>
                                <h3 class="text-2xl font-bold text-white mb-4 leading-tight">
                                    <a href="{{ route('insights.detail', $insight->slug) }}"
                                        class="hover:text-fresh-teal transition-colors duration-300">
                                        {{ $insight->title }}
                                    </a>
                                </h3>
                                <p class="text-white/90 text-base leading-relaxed">
                                    {{ $insight->excerpt }}
                                </p>
                            </div>
                        </article>
                    @endforeach
                @endif
            </div>

            <div class="text-center mt-12 fade-in">
                <a href="{{ route('insights') }}" class="btn-outline">
                    View All Articles
                    <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>
        </div>
    </section>
