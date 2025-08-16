<section class="section">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Our Locations</h2>
            <p class="section-subtitle">
                With offices strategically located across Nepal, we're always close to our clients, providing
                personalized service and local expertise.
            </p>
        </div>

        @forelse($offices as $office)
            <!-- Office Card -->
            <div class="office-card {{ $office->is_headquarters ? 'main-office' : '' }} mb-12 fade-in">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-0">
                    <div class="office-image-container">
                        <img src="{{ $office->image ? asset('storage/' . $office->image) : 'https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=800&auto=format&fit=crop' }}"
                            alt="{{ $office->name }}" class="office-image">
                        @if ($office->is_headquarters)
                            <div class="office-badge">Head Office</div>
                        @else
                            <div class="office-badge">{{ $office->type_display }}</div>
                        @endif
                    </div>
                    <div class="office-content">
                        <h3 class="office-title">{{ $office->name }}</h3>
                        <p class="office-description">
                            @if ($office->is_headquarters)
                                Our flagship office in the heart of Nepal's capital serves as our headquarters and
                                primary service center. This modern facility houses our executive team, specialized
                                departments, and state-of-the-art meeting facilities.
                            @else
                                Our {{ $office->city }} office provides comprehensive accounting and financial advisory
                                services to businesses and individuals in the {{ $office->state }} region, ensuring
                                local expertise with global standards.
                            @endif
                        </p>

                        <div class="office-details">
                            <div class="office-detail-item">
                                <svg class="office-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <div>
                                    <h4>Address</h4>
                                    <p>{{ nl2br(e($office->address)) }}</p>
                                </div>
                            </div>

                            <div class="office-detail-item">
                                <svg class="office-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <div>
                                    <h4>Phone</h4>
                                    <p>{{ $office->phone }}</p>
                                </div>
                            </div>

                            <div class="office-detail-item">
                                <svg class="office-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <div>
                                    <h4>Email</h4>
                                    <p>{{ $office->email }}</p>
                                </div>
                            </div>

                            @if ($office->office_hours)
                                <div class="office-detail-item">
                                    <svg class="office-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <div>
                                        <h4>Office Hours</h4>
                                        <p>{!! nl2br(e($office->office_hours)) !!}</p>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="office-actions">
                            @if ($office->map_link)
                                <a href="{{ $office->map_link }}" target="_blank" class="btn-primary">
                                    Get Directions
                                    <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-1.447-.894L15 4m0 13V4m0 0L9 7" />
                                    </svg>
                                </a>
                            @else
                                <button class="btn-primary"
                                    onclick="alert('Directions functionality will be implemented!')">
                                    Get Directions
                                    <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-1.447-.894L15 4m0 13V4m0 0L9 7" />
                                    </svg>
                                </button>
                            @endif

                            @if ($office->appointment_link)
                                <a href="{{ $office->appointment_link }}" target="_blank" class="btn-outline">
                                    Book Appointment
                                </a>
                            @else
                                <button class="btn-outline" onclick="alert('Appointment booking will be implemented!')">
                                    Book Appointment
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <!-- Fallback to original static content if no offices in database -->
            <div class="office-card main-office mb-12 fade-in">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-0">
                    <div class="office-image-container">
                        <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=800&auto=format&fit=crop"
                            alt="Chartered Insights Kathmandu Office" class="office-image">
                        <div class="office-badge">Head Office</div>
                    </div>
                    <div class="office-content">
                        <h3 class="office-title">Kathmandu Office</h3>
                        <p class="office-description">
                            Our flagship office in the heart of Nepal's capital serves as our headquarters and primary
                            service center. This modern facility houses our executive team, specialized departments, and
                            state-of-the-art meeting facilities.
                        </p>

                        <div class="office-details">
                            <div class="office-detail-item">
                                <svg class="office-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <div>
                                    <h4>Address</h4>
                                    <p>Chartered House, Durbar Marg<br>Kathmandu 44600, Nepal</p>
                                </div>
                            </div>

                            <div class="office-detail-item">
                                <svg class="office-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <div>
                                    <h4>Phone</h4>
                                    <p>+977-1-4234567<br>+977-1-4234568</p>
                                </div>
                            </div>

                            <div class="office-detail-item">
                                <svg class="office-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <div>
                                    <h4>Email</h4>
                                    <p>kathmandu@charteredinsights.com</p>
                                </div>
                            </div>

                            <div class="office-detail-item">
                                <svg class="office-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <div>
                                    <h4>Office Hours</h4>
                                    <p>Sunday - Friday: 9:00 AM - 6:00 PM<br>Saturday: 10:00 AM - 4:00 PM</p>
                                </div>
                            </div>
                        </div>

                        <div class="office-actions">
                            <button class="btn-primary"
                                onclick="alert('Directions functionality will be implemented!')">
                                Get Directions
                                <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-1.447-.894L15 4m0 13V4m0 0L9 7" />
                                </svg>
                            </button>
                            <button class="btn-outline" onclick="alert('Appointment booking will be implemented!')">
                                Book Appointment
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforelse

    </div>
</section>
<section class="section bg-deep-chartered-blue text-crisp-white">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title text-crisp-white">Getting to Our Offices</h2>
            <p class="section-subtitle text-audit-grey">
                Easy access and convenient transportation options to all our locations.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center fade-in">
                <div class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-montserrat font-semibold mb-3">Schedule Appointment</h3>
                <p class="text-audit-grey mb-4">
                    Book an appointment at any of our offices for personalized consultation and service.
                </p>
                {{-- @php
                    $hasAppointmentLinks = $offices->whereNotNull('appointment_link')->count() > 0;
                @endphp --}}
                {{-- @if($hasAppointmentLinks)
                    <div class="dropdown">
                        <button class="btn-outline border-crisp-white text-crisp-white hover:bg-crisp-white hover:text-deep-chartered-blue dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            Book Now
                        </button>
                    </div>
                @else
                    <button class="btn-outline border-crisp-white text-crisp-white hover:bg-crisp-white hover:text-deep-chartered-blue" onclick="alert('Appointment booking will be implemented!')">
                        Book Now
                    </button>
                @endif --}}
            </div>

            <div class="text-center fade-in fade-in-delay-1">
                <div class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-montserrat font-semibold mb-3">Parking Information</h3>
                <p class="text-audit-grey mb-4">
                    @php
                        $parkingInfo = $offices->whereNotNull('parking_info')->first();
                    @endphp
                    @if($parkingInfo)
                        {!! Str::limit(strip_tags($parkingInfo->parking_info), 100) !!}
                    @else
                        All our offices provide convenient parking facilities for client convenience.
                    @endif
                </p>
                {{-- @if($parkingInfo && strlen($parkingInfo->parking_info) > 100)
                    <button class="btn-outline border-crisp-white text-crisp-white hover:bg-crisp-white hover:text-deep-chartered-blue" onclick="showParkingModal()">
                        View Details
                    </button>
                @else
                    <button class="btn-outline border-crisp-white text-crisp-white hover:bg-crisp-white hover:text-deep-chartered-blue" onclick="alert('Parking info will be implemented!')">
                        Parking Info
                    </button>
                @endif --}}
            </div>

            <div class="text-center fade-in fade-in-delay-2">
                <div class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-1.447-.894L15 4m0 13V4m0 0L9 7" />
                    </svg>
                </div>
                <h3 class="text-xl font-montserrat font-semibold mb-3">Directions & Transport</h3>
                <p class="text-audit-grey mb-4">
                    @php
                        $transportInfo = $offices->whereNotNull('transportation')->first();
                    @endphp
                    @if($transportInfo)
                        {!! Str::limit(strip_tags($transportInfo->transportation), 100) !!}
                    @else
                        Easy access by public transport, taxi, or personal vehicle with clear directions.
                    @endif
                </p>
                {{-- @if($transportInfo && strlen($transportInfo->transportation) > 100)
                    <button class="btn-outline border-crisp-white text-crisp-white hover:bg-crisp-white hover:text-deep-chartered-blue" onclick="showTransportModal()">
                        View Details
                    </button>
                @else
                    <button class="btn-outline border-crisp-white text-crisp-white hover:bg-crisp-white hover:text-deep-chartered-blue" onclick="alert('Directions will be implemented!')">
                        Get Directions
                    </button>
                @endif --}}
            </div>
        </div>
    </div>
</section>
