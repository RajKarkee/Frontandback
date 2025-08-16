<!-- Event Filters -->
<section class="section pt-8">
    <div class="container-custom">
        <div class="flex flex-wrap justify-center gap-4 mb-8 fade-in">
            <button class="event-filter-btn active" data-filter="all">All Events</button>
            @foreach (['webinar', 'workshop', 'conference', 'training'] as $type)
                <button class="event-filter-btn" data-filter="{{ $type }}">{{ ucfirst($type) }}s</button>
            @endforeach
        </div>
    </div>
</section>
<section class="section pt-0">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Upcoming Events</h2>
            <p class="section-subtitle">
                Don't miss these upcoming opportunities to enhance your knowledge and network with industry
                professionals.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 min-h-[400px]">
            @if ($featuredEvent)
                <!-- Featured Event -->
                <div class="event-card featured lg:col-span-2 fade-in" data-category="{{ $featuredEvent->type }}">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-0">
                        <div class="relative lg:h-full">
                            <img src="{{ $featuredEvent->image_url ?: 'https://images.unsplash.com/photo-1511578314322-379afb476865?q=80&w=800&auto=format&fit=crop' }}"
                                alt="{{ $featuredEvent->title }}" class="w-full h-full object-cover event-image">
                            <div class="featured-event-date">
                                <span class="date-day">{{ $featuredEvent->start_date->format('j') }}</span>
                                <span class="date-month">{{ $featuredEvent->start_date->format('M') }}</span>
                            </div>
                        </div>
                        <div class="event-content lg:flex lg:flex-col lg:justify-center">
                            <span
                                class="event-type {{ $featuredEvent->type }}">{{ ucfirst($featuredEvent->type) }}</span>
                            <h3
                                class="text-2xl lg:text-3xl font-montserrat font-bold text-deep-chartered-blue mb-4 hover:text-fresh-teal transition-colors duration-200">
                                {{ $featuredEvent->title }}
                            </h3>
                            <p class="event-description text-lg mb-4">
                                {{ $featuredEvent->short_description }}
                            </p>
                            <div class="event-details mb-4">
                                @if ($featuredEvent->location)
                                    <div class="flex items-center mb-2">
                                        <svg class="w-5 h-5 text-fresh-teal mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        {{ $featuredEvent->location }}
                                    </div>
                                @endif
                                @if ($featuredEvent->formatted_time)
                                    <div class="flex items-center mb-2">
                                        <svg class="w-5 h-5 text-fresh-teal mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        {{ $featuredEvent->formatted_time }}
                                    </div>
                                @endif
                                @if ($featuredEvent->display_price)
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 text-fresh-teal mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                        {{ $featuredEvent->display_price }}
                                    </div>
                                @endif
                            </div>
                            @if ($featuredEvent->registration_link)
                                <a href="{{ $featuredEvent->registration_link }}" target="_blank" class="btn-primary">
                                    Register Now
                                    <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </a>
                            @else
                                <button class="btn-primary"
                                    onclick="alert('Registration functionality will be implemented!')">
                                    Register Now
                                    <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            @foreach ($upcomingEvents as $event)
                <div class="event-card fade-in fade-in-delay-1" data-category="{{ $event->type }}">
                    <img src="{{ $event->image_url ?: 'https://images.unsplash.com/photo-1553028826-f4804a6dba3b?q=80&w=800&auto=format&fit=crop' }}"
                        alt="{{ $event->title }}" class="event-image">
                    <div class="event-content">
                        <div class="event-date">
                            <span class="date-day">{{ $event->start_date->format('j') }}</span>
                            <span class="date-month">{{ $event->start_date->format('M') }}</span>
                        </div>
                        <span class="event-type {{ $event->type }}">{{ ucfirst($event->type) }}</span>
                        <h3 class="event-title">
                            {{ $event->title }}
                        </h3>
                        <p class="event-description">
                            {{ $event->short_description }}
                        </p>
                        <div class="event-details">
                            @if ($event->formatted_time)
                                <div class="flex items-center mb-2">
                                    <svg class="w-4 h-4 text-fresh-teal mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ $event->formatted_time }}
                                </div>
                            @endif
                            @if ($event->location)
                                <div class="flex items-center mb-4">
                                    <svg class="w-4 h-4 text-fresh-teal mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    {{ $event->location }}
                                </div>
                            @endif
                            @if ($event->display_price && !$event->is_free)
                                <div class="flex items-center mb-4">
                                    <svg class="w-4 h-4 text-fresh-teal mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    {{ $event->display_price }}
                                </div>
                            @endif
                        </div>
                        @if ($event->registration_link)
                            <a href="{{ $event->registration_link }}" target="_blank" class="btn-outline w-full">
                                {{ $event->is_free ? 'Join ' . ucfirst($event->type) . ' (Free)' : 'Register Now' }}
                            </a>
                        @else
                            <button class="btn-outline w-full"
                                onclick="alert('Registration functionality will be implemented!')">
                                {{ $event->is_free ? 'Join ' . ucfirst($event->type) . ' (Free)' : 'Register Now' }}
                            </button>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Past Events -->
<section class="section bg-audit-grey">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Past Events</h2>
            <p class="section-subtitle">
                Missed an event? Catch up on key insights and access recordings from our previous sessions.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($pastEvents as $event)
                <div class="past-event-card bg-crisp-white fade-in">
                    <img src="{{ $event->image_url ?: 'https://images.unsplash.com/photo-1559526324-4b87b5e36e44?q=80&w=800&auto=format&fit=crop' }}"
                        alt="{{ $event->title }}" class="past-event-image">
                    <div class="past-event-content">
                        <span class="past-event-date">{{ $event->start_date->format('F j, Y') }}</span>
                        <h3 class="past-event-title">{{ $event->title }}</h3>
                        <p class="past-event-description">
                            {{ $event->short_description }}
                        </p>
                        <div class="flex gap-2 mt-4">
                            @if ($event->recording_link)
                                <a href="{{ $event->recording_link }}" target="_blank" class="btn-outline text-sm">
                                    View Recording
                                </a>
                            @else
                                <button class="btn-outline text-sm"
                                    onclick="alert('Recording access will be implemented!')">
                                    View Recording
                                </button>
                            @endif
                            @if ($event->resources_link)
                                <a href="{{ $event->resources_link }}" target="_blank" class="btn-outline text-sm">
                                    Download Resources
                                </a>
                            @else
                                <button class="btn-outline text-sm"
                                    onclick="alert('Resources download will be implemented!')">
                                    Download Resources
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
