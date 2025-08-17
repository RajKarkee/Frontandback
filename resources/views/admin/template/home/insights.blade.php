<section class="section bg-audit-grey">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Latest Insights</h2>
            <p class="section-subtitle">
                Stay informed with our latest thought leadership, industry analysis, and expert perspectives.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @if($recentInsights && $recentInsights->count() > 0)
                @foreach($recentInsights->take(3) as $index => $insight)
                    <article class="blog-card fade-in {{ $index > 0 ? 'fade-in-delay-' . $index : '' }} group cursor-pointer overflow-hidden rounded-lg bg-white shadow-md hover:shadow-2xl transform transition-all duration-500 ease-out hover:scale-[1.02] relative h-80">
                        <!-- Background Image -->
                        <div class="absolute inset-0 w-full h-full">
                            @if($insight->featured_image)
                                <img src="{{ asset('storage/' . $insight->featured_image) }}"
                                     alt="{{ $insight->title }}"
                                     class="w-full h-full object-cover transition-all duration-700 ease-out group-hover:scale-110 group-hover:brightness-50">
                            @else
                                <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?q=80&w=800&auto=format&fit=crop"
                                     alt="{{ $insight->title }}"
                                     class="w-full h-full object-cover transition-all duration-700 ease-out group-hover:scale-110 group-hover:brightness-50">
                            @endif
                        </div>

                        <!-- Dark overlay on hover -->
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/60 transition-all duration-500 ease-out"></div>

                        <!-- Non-hover content - Bottom overlay -->
                        <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/80 to-transparent group-hover:opacity-0 transition-opacity duration-500">
                            @if($insight->category)
                                <span class="text-xs font-semibold text-white/80 uppercase tracking-wide">{{ $insight->category }}</span>
                            @endif
                            <h3 class="text-xl font-semibold text-white mt-1">
                                {{ \Illuminate\Support\Str::limit($insight->title, 60) }}
                            </h3>
                        </div>

                        <!-- Hover content - Center content -->
                        <div class="absolute inset-0 flex flex-col justify-center items-center p-6 text-center opacity-0 group-hover:opacity-100 transition-all duration-500 ease-out transform translate-y-4 group-hover:translate-y-0">
                            @if($insight->category)
                                <span class="text-sm font-semibold text-white/90 uppercase tracking-wide mb-3">{{ $insight->category }}</span>
                            @endif
                            <h3 class="text-2xl font-bold text-white mb-4 leading-tight">
                                <a href="{{ route('insights.detail', $insight->slug) }}" class="hover:text-fresh-teal transition-colors duration-300">
                                    {{ \Illuminate\Support\Str::limit($insight->title, 80) }}
                                </a>
                            </h3>
                            <p class="text-white/90 text-base leading-relaxed">
                                {{ \Illuminate\Support\Str::limit($insight->excerpt ?: strip_tags($insight->content), 120) }}
                            </p>
                        </div>
                    </article>
                @endforeach
            @else
                <!-- Fallback content when no insights are available -->
                <article class="blog-card fade-in group cursor-pointer overflow-hidden rounded-lg bg-white shadow-md hover:shadow-2xl transform transition-all duration-500 ease-out hover:scale-[1.02] relative h-80">
                    <!-- Background Image -->
                    <div class="absolute inset-0 w-full h-full">
                        <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?q=80&w=800&auto=format&fit=crop"
                             alt="Digital transformation in accounting"
                             class="w-full h-full object-cover transition-all duration-700 ease-out group-hover:scale-110 group-hover:brightness-50">
                    </div>

                    <!-- Dark overlay on hover -->
                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/60 transition-all duration-500 ease-out"></div>

                    <!-- Non-hover content - Bottom overlay -->
                    <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/80 to-transparent group-hover:opacity-0 transition-opacity duration-500">
                        <span class="text-xs font-semibold text-white/80 uppercase tracking-wide">CASE STUDY</span>
                        <h3 class="text-xl font-semibold text-white mt-1">
                            Digital Transformation in Modern Accounting Practices
                        </h3>
                    </div>

                    <!-- Hover content - Center content -->
                    <div class="absolute inset-0 flex flex-col justify-center items-center p-6 text-center opacity-0 group-hover:opacity-100 transition-all duration-500 ease-out transform translate-y-4 group-hover:translate-y-0">
                        <span class="text-sm font-semibold text-white/90 uppercase tracking-wide mb-3">CASE STUDY</span>
                        <h3 class="text-2xl font-bold text-white mb-4 leading-tight">
                            <a href="{{ route('insights') }}" class="hover:text-fresh-teal transition-colors duration-300">
                                Digital Transformation in Modern Accounting Practices
                            </a>
                        </h3>
                        <p class="text-white/90 text-base leading-relaxed">
                            Exploring how technology is reshaping the accounting landscape and what it means for businesses in Nepal.
                        </p>
                    </div>
                </article>

                <article class="blog-card fade-in fade-in-delay-1 group cursor-pointer overflow-hidden rounded-lg bg-white shadow-md hover:shadow-2xl transform transition-all duration-500 ease-out hover:scale-[1.02] relative h-80">
                    <!-- Background Image -->
                    <div class="absolute inset-0 w-full h-full">
                        <img src="https://images.unsplash.com/photo-1559526324-4b87b5e36e44?q=80&w=800&auto=format&fit=crop"
                             alt="Tax compliance strategies"
                             class="w-full h-full object-cover transition-all duration-700 ease-out group-hover:scale-110 group-hover:brightness-50">
                    </div>

                    <!-- Dark overlay on hover -->
                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/60 transition-all duration-500 ease-out"></div>

                    <!-- Non-hover content - Bottom overlay -->
                    <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/80 to-transparent group-hover:opacity-0 transition-opacity duration-500">
                        <span class="text-xs font-semibold text-white/80 uppercase tracking-wide">CASE STUDY</span>
                        <h3 class="text-xl font-semibold text-white mt-1">
                            Strategic Tax Planning for Growing Businesses
                        </h3>
                    </div>

                    <!-- Hover content - Center content -->
                    <div class="absolute inset-0 flex flex-col justify-center items-center p-6 text-center opacity-0 group-hover:opacity-100 transition-all duration-500 ease-out transform translate-y-4 group-hover:translate-y-0">
                        <span class="text-sm font-semibold text-white/90 uppercase tracking-wide mb-3">CASE STUDY</span>
                        <h3 class="text-2xl font-bold text-white mb-4 leading-tight">
                            <a href="{{ route('insights') }}" class="hover:text-fresh-teal transition-colors duration-300">
                                Strategic Tax Planning for Growing Businesses
                            </a>
                        </h3>
                        <p class="text-white/90 text-base leading-relaxed">
                            Essential tax strategies and compliance considerations for businesses expanding in Nepal's evolving market.
                        </p>
                    </div>
                </article>

                <article class="blog-card fade-in fade-in-delay-2 group cursor-pointer overflow-hidden rounded-lg bg-white shadow-md hover:shadow-2xl transform transition-all duration-500 ease-out hover:scale-[1.02] relative h-80">
                    <!-- Background Image -->
                    <div class="absolute inset-0 w-full h-full">
                        <img src="https://images.unsplash.com/photo-1507679799987-c73779587ccf?q=80&w=800&auto=format&fit=crop"
                             alt="Risk management insights"
                             class="w-full h-full object-cover transition-all duration-700 ease-out group-hover:scale-110 group-hover:brightness-50">
                    </div>

                    <!-- Dark overlay on hover -->
                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/60 transition-all duration-500 ease-out"></div>

                    <!-- Non-hover content - Bottom overlay -->
                    <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/80 to-transparent group-hover:opacity-0 transition-opacity duration-500">
                        <span class="text-xs font-semibold text-white/80 uppercase tracking-wide">CASE STUDY</span>
                        <h3 class="text-xl font-semibold text-white mt-1">
                            Risk Management in Uncertain Economic Times
                        </h3>
                    </div>

                    <!-- Hover content - Center content -->
                    <div class="absolute inset-0 flex flex-col justify-center items-center p-6 text-center opacity-0 group-hover:opacity-100 transition-all duration-500 ease-out transform translate-y-4 group-hover:translate-y-0">
                        <span class="text-sm font-semibold text-white/90 uppercase tracking-wide mb-3">CASE STUDY</span>
                        <h3 class="text-2xl font-bold text-white mb-4 leading-tight">
                            <a href="{{ route('insights') }}" class="hover:text-fresh-teal transition-colors duration-300">
                                Risk Management in Uncertain Economic Times
                            </a>
                        </h3>
                        <p class="text-white/90 text-base leading-relaxed">
                            How businesses can build resilient risk management frameworks to navigate economic volatility.
                        </p>
                    </div>
                </article>
            @endif
        </div>

        <div class="text-center mt-12 fade-in">
            <a href="{{ route('insights') }}" class="btn-outline">
                View All Insights
                <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
    </div>
</section>
