    <section class="section">
        <div class="container-custom">
            <div class="section-header fade-in">
                <h2 class="section-title">Featured Articles</h2>
                <p class="section-subtitle">
                    Our most popular and impactful insights that are shaping business decisions across industries.
                </p>
            </div>

            <div class="container">
                <div class="row">
                    @if ($featuredInsights && $featuredInsights->count() > 0)
                        @php
                            $insight = $featuredInsights->first();
                        @endphp
                        @if ($insight)
                            <div class="col-12 col-lg-4">
                                <article class="blog-card">
                                    <!-- Background Image -->
                                    <div class="blog-bg-image">
                                        <img src="{{ $insight->featured_image ? Storage::url($insight->featured_image) : 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?q=80&w=800&auto=format&fit=crop' }}"
                                            alt="{{ $insight->title }}">
                                    </div>

                                    <!-- Dark overlay on hover -->
                                    <div class="dark-overlay"></div>

                                    <!-- Non-hover content - Bottom overlay -->
                                    <div class="bottom-content">
                                        <span
                                            class="category-text">{{ $insight->insightCategory ? strtoupper($insight->insightCategory->name) : 'GENERAL' }}</span>
                                        <h3 class="blog-title">
                                            {{ $insight->title }}
                                        </h3>
                                    </div>

                                    <!-- Hover content - Center content -->
                                    <div class="center-content">
                                        <span class="featured-badge">Featured</span>
                                        <span
                                            class="category-text-hover">{{ $insight->insightCategory ? strtoupper($insight->insightCategory->name) : 'GENERAL' }}</span>
                                        <h3 class="blog-title-hover">
                                            <a href="{{ route('insights.detail', $insight->slug) }}">
                                                {{ $insight->title }}
                                            </a>
                                        </h3>
                                        <p class="blog-description">
                                            {{ $insight->excerpt }}
                                        </p>
                                    </div>
                                </article>
                            </div>
                        @endif
                    @endif
                </div>
            </div>

            <!-- Secondary Featured Articles -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @if ($featuredInsights && $featuredInsights->count() > 1)
                    @foreach ($featuredInsights->skip(1)->take(2) as $insight)
                        <article
                            class="blog-card fade-in group cursor-pointer overflow-hidden rounded-lg bg-white shadow-md hover:shadow-2xl transform transition-all duration-500 ease-out hover:scale-[1.02] relative h-80">
                            <!-- Background Image -->
                            <div class="absolute inset-0 w-full h-full">
                                <img src="{{ $insight->featured_image ? Storage::url($insight->featured_image) : 'https://images.unsplash.com/photo-1559526324-4b87b5e36e44?q=80&w=800&auto=format&fit=crop' }}"
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
        </div>
    </section>
