
     <section class="section">
        <div class="container-custom">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="fade-in">
                    <h2 class="section-title text-left">{{ $about->our_story_title ?? 'Our Story' }}</h2>
                    @if ($about && $about->our_story_content)
                        <div class="text-lg text-report-black">
                            {!! nl2br(e($about->our_story_content)) !!}
                        </div>
                    @else
                        <p class="text-lg text-report-black mb-6">
                            Chartered Insights is a full-service Chartered Accountancy firm headquartered in Biratnagar,
                            Nepal, delivering a complete range of Audit & Assurance, Taxation, Risk Advisory, Accounting,
                            and Business Consulting services to businesses, not-for-profit organizations, and government
                            entities.
                        </p>
                        <p class="text-lg text-report-black mb-6">
                            We were founded with a vision to empower businesses with financial clarity, robust compliance,
                            and strategic insights that help them navigate challenges and seize opportunities in a
                            competitive, evolving marketplace.
                        </p>
                        <p class="text-lg text-report-black">
                            By combining deep technical knowledge, sector-specific expertise, and a client-focused service
                            approach, Chartered Insights has become a trusted partner for organizations seeking
                            professional, ethical, and growth-oriented solutions.
                        </p>
                    @endif
                </div>
                <div class="fade-in fade-in-delay-1">
                    @if ($about && $about->our_story_image)
                        <img src="{{ asset('storage/' . $about->our_story_image) }}" alt="Our Story"
                            class="rounded-lg shadow-xl w-full h-auto">
                    @else
                        <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?q=80&w=800&auto=format&fit=crop"
                            alt="Professional team collaboration" class="rounded-lg shadow-xl w-full h-auto">
                    @endif
                </div>
            </div>
        </div>
    </section>
 <section class="section bg-audit-grey">
        <div class="container-custom">
            <div class="section-header fade-in">
                <h2 class="section-title">{{ $about->core_values_title ?? 'Our Core Values & Client-First Philosophy' }}
                </h2>
                <p class="section-subtitle">
                    {{ $about->core_values_subtitle ?? 'These foundational principles guide every interaction, decision, and service we provide to our clients.' }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @if ($about && $about->coreValues->count() > 0)
                    @foreach ($about->coreValues as $index => $value)
                        <div class="card fade-in {{ $index > 0 ? 'fade-in-delay-' . (($index % 3) + 1) : '' }}">
                            <div class="card-header">
                                <div class="w-12 h-12 bg-fresh-teal rounded-lg flex items-center justify-center mb-4">
                                    @if ($value->icon_svg)
                                        <div class="w-6 h-6 text-crisp-white">
                                            {!! $value->icon_svg !!}
                                        </div>
                                    @else
                                        <svg class="w-6 h-6 text-crisp-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                        </svg>
                                    @endif
                                </div>
                                <h3 class="card-title">{{ $value->title }}</h3>
                            </div>
                            <div class="card-content">
                                <p>{{ $value->description }}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- Fallback to static content if no dynamic content -->
                    <div class="card fade-in">
                        <div class="card-header">
                            <div class="w-12 h-12 bg-fresh-teal rounded-lg flex items-center justify-center mb-4">
                                <svg class="w-6 h-6 text-crisp-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <h3 class="card-title">Partner-Led Engagements</h3>
                        </div>
                        <div class="card-content">
                            <p>Every assignment is directly supervised by a partner or senior professional to ensure
                                quality, accountability, and strategic insight from start to finish.</p>
                        </div>
                    </div>

                    <div class="card fade-in fade-in-delay-1">
                        <div class="card-header">
                            <div class="w-12 h-12 bg-fresh-teal rounded-lg flex items-center justify-center mb-4">
                                <svg class="w-6 h-6 text-crisp-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h3 class="card-title">Culture of Excellence</h3>
                        </div>
                        <div class="card-content">
                            <p>We adhere to international best practices while delivering solutions tailored to the Nepali
                                business landscape, ensuring both compliance and practical value.</p>
                        </div>
                    </div>

                    <div class="card fade-in fade-in-delay-2">
                        <div class="card-header">
                            <div class="w-12 h-12 bg-fresh-teal rounded-lg flex items-center justify-center mb-4">
                                <svg class="w-6 h-6 text-crisp-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </div>
                            <h3 class="card-title">Client-First Mindset</h3>
                        </div>
                        <div class="card-content">
                            <p>We prioritize client goals and challenges, providing customized solutions that not only meet
                                legal and regulatory requirements but also support business performance.</p>
                        </div>
                    </div>

                    <div class="card fade-in">
                        <div class="card-header">
                            <div class="w-12 h-12 bg-fresh-teal rounded-lg flex items-center justify-center mb-4">
                                <svg class="w-6 h-6 text-crisp-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <h3 class="card-title">Long-Term Relationships</h3>
                        </div>
                        <div class="card-content">
                            <p>Our focus extends beyond one-time engagements. We cultivate lasting partnerships built on
                                trust, reliability, and consistent delivery.</p>
                        </div>
                    </div>

                    <div class="card fade-in fade-in-delay-1">
                        <div class="card-header">
                            <div class="w-12 h-12 bg-fresh-teal rounded-lg flex items-center justify-center mb-4">
                                <svg class="w-6 h-6 text-crisp-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <h3 class="card-title">Personal Ownership</h3>
                        </div>
                        <div class="card-content">
                            <p>Every team member takes ownership of their work, ensuring timely execution, high quality, and
                                measurable results for clients.</p>
                        </div>
                    </div>

                    <div class="card fade-in fade-in-delay-2">
                        <div class="card-header">
                            <div class="w-12 h-12 bg-fresh-teal rounded-lg flex items-center justify-center mb-4">
                                <svg class="w-6 h-6 text-crisp-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                            <h3 class="card-title">Commitment to Learning & Growth</h3>
                        </div>
                        <div class="card-content">
                            <p>We invest in our people by offering training, professional certifications, and leadership
                                opportunities to continually enhance our service quality.</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Leadership Team -->
    <section class="section">
        <div class="container-custom">
            <div class="section-header fade-in">
                <h2 class="section-title">{{ $about->leadership_title ?? 'Our Leadership Team' }}</h2>
                <p class="section-subtitle">
                    {{ $about->leadership_subtitle ?? 'Meet the experienced professionals leading our firm with vision, expertise, and unwavering commitment to client success.' }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @if ($about && $about->teamMembers->count() > 0)
                    @foreach ($about->teamMembers as $index => $member)
                        <div class="team-card fade-in {{ $index > 0 ? 'fade-in-delay-' . (($index % 3) + 1) : '' }}">
                            @if ($member->image)
                                <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}"
                                    class="team-image">
                            @else
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=400&auto=format&fit=crop"
                                    alt="{{ $member->name }}" class="team-image">
                            @endif
                            <div class="team-info">
                                <h3 class="team-name">{{ $member->name }}</h3>
                                <p class="team-role">{{ $member->position }}</p>
                                <p class="team-bio">{{ $member->bio }}</p>
                                @if ($member->linkedin_url || $member->twitter_url || $member->email)
                                    <div class="mt-4 flex justify-center space-x-3">
                                        @if ($member->linkedin_url)
                                            <a href="{{ $member->linkedin_url }}" target="_blank"
                                                class="text-fresh-teal hover:text-deep-chartered-blue">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M16.338 16.338H13.67V12.16c0-.995-.017-2.277-1.387-2.277-1.39 0-1.601 1.086-1.601 2.207v4.248H8.014v-8.59h2.559v1.174h.037c.356-.675 1.227-1.387 2.526-1.387 2.703 0 3.203 1.778 3.203 4.092v4.711zM5.005 6.575a1.548 1.548 0 11-.003-3.096 1.548 1.548 0 01.003 3.096zm-1.337 9.763H6.34v-8.59H3.667v8.59zM17.668 1H2.328C1.595 1 1 1.581 1 2.298v15.403C1 18.418 1.595 19 2.328 19h15.34c.734 0 1.332-.582 1.332-1.299V2.298C19 1.581 18.402 1 17.668 1z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </a>
                                        @endif
                                        @if ($member->twitter_url)
                                            <a href="{{ $member->twitter_url }}" target="_blank"
                                                class="text-fresh-teal hover:text-deep-chartered-blue">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path
                                                        d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84">
                                                    </path>
                                                </svg>
                                            </a>
                                        @endif
                                        @if ($member->email)
                                            <a href="mailto:{{ $member->email }}"
                                                class="text-fresh-teal hover:text-deep-chartered-blue">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                            </a>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach

                @endif
            </div>
        </div>
    </section>

    <!-- Expertise Areas -->
    <section class="section bg-audit-grey">
        <div class="container-custom">
            <div class="section-header fade-in">
                <h2 class="section-title">{{ $about->expertise_title ?? 'Our People – Expertise that Drives Value' }}</h2>
                <p class="section-subtitle">
                    {{ $about->expertise_subtitle ?? 'Our multidisciplinary team combines diverse skills and industry experience to deliver exceptional results.' }}
                </p>
            </div>

            @if ($about && $about->expertiseAreas->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($about->expertiseAreas as $index => $area)
                        <div class="fade-in {{ $index > 0 ? 'fade-in-delay-' . (($index % 3) + 1) : '' }}">
                            <div class="flex items-start space-x-4 mb-6">
                                <div
                                    class="flex-shrink-0 w-8 h-8 bg-fresh-teal rounded-full flex items-center justify-center">
                                    @if ($area->icon)
                                        <i class="{{ $area->icon }} text-crisp-white"></i>
                                    @else
                                        <svg class="w-5 h-5 text-crisp-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                                        </svg>
                                    @endif
                                </div>
                                <div>
                                    <h4 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-2">
                                        {{ $area->title }}</h4>
                                    <p class="text-report-black">{{ $area->description }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="section">
        <div class="container-custom">
            <div class="section-header fade-in">
                <h2 class="section-title">{{ $about->why_choose_us_title ?? 'Why Businesses Choose Chartered Insights' }}
                </h2>
                <p class="section-subtitle">
                    {{ $about->why_choose_us_subtitle ?? 'Our track record speaks for itself - proven expertise, exceptional service, and measurable results.' }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @if ($about && $about->whyChooseUsItems->count() > 0)
                    @foreach ($about->whyChooseUsItems as $index => $item)
                        <div class="text-center fade-in {{ $index > 0 ? 'fade-in-delay-' . (($index % 3) + 1) : '' }}">
                            <div
                                class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                                @if ($item->icon)
                                    <i class="{{ $item->icon }} text-2xl text-crisp-white"></i>
                                @else
                                    <svg class="w-8 h-8 text-crisp-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                @endif
                            </div>
                            <h4 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-2">
                                {{ $item->title }}</h4>
                            <p class="text-report-black">{{ $item->description }}</p>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
