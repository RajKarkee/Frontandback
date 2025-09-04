<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:wght@500;600;700&family=Roboto:wght@300;400;500;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
</head>

<body>
    <div class="rka-scope">
        <div class="header">
            <div class="header-content">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center logo">
                        @if ($homeSetting && $homeSetting->home_logo)
                            <img src="{{ asset('storage/' . $homeSetting->home_logo) }}" alt="Company Logo"
                                class="w-10 h-10 object-contain rounded">
                        @else
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                                <text x="50%" y="50%" text-anchor="middle" dominant-baseline="central"
                                    font-family="Lora, serif" font-size="24" fill="#003b5c" font-weight="bold">R</text>
                            </svg>
                        @endif
                    </div>
                    <div>
                        <h1 class="text-white font-lora font-bold text-xl">
                            {{ $footerSetting ? $footerSetting->company_name : 'Roshan Kumar & Associates' }}
                        </h1>
                        <p class="text-white/80 text-sm font-roboto">
                            {{ $footerSetting ? $footerSetting->company_tagline : 'Chartered Accountants' }}
                        </p>
                    </div>
                </div>
                <div class="slogan text-white font-roboto text-sm font-medium hidden md:block">
                    {{ $footerSetting ? $footerSetting->company_slogan : 'Empowering Wealth Creation' }}
                </div>
                <div class="flex items-center space-x-3">
                    <div class="search-bar">
                        <input type="text" placeholder="Search..." oninput="handleLiveSearch(this.value)"
                            onkeypress="handleSearchKeyPress(event, this.value)" id="search-input"
                            onfocus="showSearchDropdown()" onblur="hideSearchDropdown()">
                        <i class="fas fa-search" onclick="performSearchFromIcon()"></i>

                        <!-- Live Search Dropdown -->
                        <div id="search-dropdown" class="search-dropdown" style="display: none;">
                            <div id="search-dropdown-content">
                                <div class="search-placeholder">
                                    <i class="fas fa-search"></i>
                                    <span>Start typing to search...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <i class="fas fa-search search-icon" onclick="toggleSearch()"></i>
                    <button id="menu-btn" class="menu-btn hidden text-white hover:bg-white/10 p-2 rounded"
                        aria-label="Toggle menu" onclick="toggleMenu()">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="mobile-search" id="mobile-search">
            <div class="input-group">
                <input type="text" placeholder="Search..." oninput="handleLiveSearch(this.value)"
                    onkeypress="handleSearchKeyPress(event, this.value)" id="mobile-search-input"
                    onfocus="showMobileSearchDropdown()" onblur="hideMobileSearchDropdown()">
                <button class="btn btn-primary btn-sm" type="button" onclick="performMobileSearch()">
                    <i class="fas fa-search"></i>
                </button>
            </div>

            <!-- Mobile Live Search Dropdown -->
            <div id="mobile-search-dropdown" class="mobile-search-dropdown" style="display: none;">
                <div id="mobile-search-dropdown-content">
                    <div class="search-placeholder">
                        <i class="fas fa-search"></i>
                        <span>Start typing to search...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rka-sidebar-scope">
        <div class="overlay" id="overlay"></div>
        <div class="sidebar" id="sidebar">
            <div class="page-preview" id="page-preview">
                <h3 id="preview-title"></h3>
                <img id="preview-image" src="" alt="Page Preview">
                <p id="preview-description"></p>
                <div class="tags" id="preview-tags"></div>
                <div class="services-container" id="preview-services"></div>
            </div>
            @if (isset($navigationItems) && $navigationItems->where('page_slug', 'home')->first())
                @php $homeNav = $navigationItems->where('page_slug', 'home')->first(); @endphp
                <a href="{{ route($homeNav->route_name) }}" data-tooltip="{{ $homeNav->page_title }}"
                    data-image="{{ $homeNav->preview_image_url }}" data-description="{{ $homeNav->description }}"
                data-tags="{{ $homeNav->tags }}" @else <a href="{{ route('home') }}" data-tooltip="Home"
                    data-image="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&w=300&h=120"
                    data-description="Welcome to Chartered Insights, your trusted partner for expert financial solutions. We provide comprehensive audit, tax, and consulting services tailored to drive your business forward. Our team of experienced professionals is dedicated to delivering strategic insights and sustainable growth for clients across various industries."
                    data-tags="Finance,Consulting,Audit" @endif
                    data-services='[
        {"title": "Financial Planning", "icon": "fas fa-chart-line"},
        {"title": "Investment Advice", "icon": "fas fa-piggy-bank"},
        {"title": "Risk Management", "icon": "fas fa-shield-alt"}
    ]'>
                    <i class="fas fa-home"></i>
                    <span>Home</span>
                </a>
                @if (isset($navigationItems) && $navigationItems->where('page_slug', 'services')->first())
                    @php $servicesNav = $navigationItems->where('page_slug', 'services')->first(); @endphp
                    <a href="{{ route($servicesNav->route_name) }}" data-tooltip="{{ $servicesNav->page_title }}"
                        data-image="{{ $servicesNav->preview_image_url }}"
                        data-description="{{ $servicesNav->description }}" data-tags="{{ $servicesNav->tags }}"
                    @else <a href="/services" data-tooltip="Services"
                        data-image="https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&w=300&h=120"
                        data-description="Explore our comprehensive audit, tax, and consulting services tailored to your needs. From financial reporting and compliance to strategic business consulting, we offer solutions that ensure regulatory adherence, optimize financial performance, and support long-term success."
                        data-tags="Audit,Tax,Consulting" @endif
                        data-services='[
        {"title": "Audit Services", "icon": "fas fa-book"},
        {"title": "Tax Consulting", "icon": "fas fa-calculator"},
        {"title": "Business Advisory", "icon": "fas fa-briefcase"}
    ]'>
                        <i
                            class="@if (isset($servicesNav)) {{ $servicesNav->icon_class }}@else fas fa-file-invoice-dollar @endif"></i>
                        <span>
                            @if (isset($servicesNav))
                                {{ $servicesNav->page_title }}
                            @else
                                Services
                            @endif
                        </span>
                    </a>
                    @if (isset($navigationItems) && $navigationItems->where('page_slug', 'industries')->first())
                        @php $industriesNav = $navigationItems->where('page_slug', 'industries')->first(); @endphp
                        <a href="{{ route($industriesNav->route_name) }}"
                            data-tooltip="{{ $industriesNav->page_title }}"
                            data-image="{{ $industriesNav->preview_image_url }}"
                            data-description="{{ $industriesNav->description }}"
                        data-tags="{{ $industriesNav->tags }}" @else <a href="/industries"
                            data-tooltip="Industries"
                            data-image="https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&w=300&h=120"
                            data-description="Specialized expertise across diverse sectors to meet your unique challenges. Our industry-specific knowledge in healthcare, technology, manufacturing, and more ensures customized solutions that address your business's specific needs and goals."
                            data-tags="Healthcare,Technology,Manufacturing" @endif
                            data-services='[
        {"title": "Healthcare", "icon": "fas fa-heartbeat"},
        {"title": "Technology", "icon": "fas fa-laptop-code"},
        {"title": "Manufacturing", "icon": "fas fa-industry"}
    ]'>
                            <i
                                class="@if (isset($industriesNav)) {{ $industriesNav->icon_class }}@else fas fa-industry @endif"></i>
                            <span>
                                @if (isset($industriesNav))
                                    {{ $industriesNav->page_title }}
                                @else
                                    Industries
                                @endif
                            </span>
                        </a>
                        @if (isset($navigationItems) && $navigationItems->where('page_slug', 'events')->first())
                            @php $eventsNav = $navigationItems->where('page_slug', 'events')->first(); @endphp
                            <a href="{{ route($eventsNav->route_name) }}"
                                data-tooltip="{{ $eventsNav->page_title }}"
                                data-image="{{ $eventsNav->preview_image_url }}"
                                data-description="{{ $eventsNav->description }}" data-tags="{{ $eventsNav->tags }}"
                            @else <a href="/events" data-tooltip="Events"
                                data-image="https://images.unsplash.com/photo-1516321310769-65e85b8e6351?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&w=300&h=120"
                                data-description="Join our upcoming events to connect and learn from industry experts. Our workshops, webinars, and networking sessions provide valuable insights and opportunities to collaborate with peers and professionals."
                                data-tags="Workshops,Webinars,Networking" @endif
                                data-services='[
        {"title": "Workshops", "icon": "fas fa-chalkboard-teacher"},
        {"title": "Webinars", "icon": "fas fa-video"},
        {"title": "Networking", "icon": "fas fa-users"}
    ]'>
                                <i
                                    class="@if (isset($eventsNav)) {{ $eventsNav->icon_class }}@else fas fa-calendar @endif"></i>
                                <span>
                                    @if (isset($eventsNav))
                                        {{ $eventsNav->page_title }}
                                    @else
                                        Events
                                    @endif
                                </span>
                            </a>
                            @if (isset($navigationItems) && $navigationItems->where('page_slug', 'offices')->first())
                                @php $officesNav = $navigationItems->where('page_slug', 'offices')->first(); @endphp
                                <a href="{{ route($officesNav->route_name) }}"
                                    data-tooltip="{{ $officesNav->page_title }}"
                                    data-image="{{ $officesNav->preview_image_url }}"
                                    data-description="{{ $officesNav->description }}"
                                data-tags="{{ $officesNav->tags }}" @else <a href="/offices"
                                    data-tooltip="Offices"
                                    data-image="https://images.unsplash.com/photo-1516321310769-65e85b8e6351?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&w=300&h=120"
                                    data-description="Discover our office locations and connect with our team near you. With multiple offices strategically located, we provide accessible, personalized support to meet your financial and consulting needs."
                                    data-tags="Locations,Support,Consulting" @endif
                                    data-services='[
        {"title": "Regional Support", "icon": "fas fa-map-marker-alt"},
        {"title": "Consulting Hubs", "icon": "fas fa-building"},
        {"title": "Client Services", "icon": "fas fa-headset"}
    ]'>
                                    <i
                                        class="@if (isset($officesNav)) {{ $officesNav->icon_class }}@else fas fa-building @endif"></i>
                                    <span>
                                        @if (isset($officesNav))
                                            {{ $officesNav->page_title }}
                                        @else
                                            Offices
                                        @endif
                                    </span>
                                </a>
                                @if (isset($navigationItems) && $navigationItems->where('page_slug', 'blogs')->first())
                                    @php $blogsNav = $navigationItems->where('page_slug', 'blogs')->first(); @endphp
                                    <a href="{{ route($blogsNav->route_name) }}"
                                        data-tooltip="{{ $blogsNav->page_title }}"
                                        data-image="{{ $blogsNav->preview_image_url }}"
                                        data-description="{{ $blogsNav->description }}"
                                    data-tags="{{ $blogsNav->tags }}" @else <a href="/blogs"
                                        data-tooltip="Blogs"
                                        data-image="https://images.unsplash.com/photo-1516321310769-65e85b8e6351?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&w=300&h=120"
                                        data-description="Read our latest articles on finance, tax, and business trends. Our blog offers in-depth analyses, practical tips, and expert perspectives to help you navigate the complexities of the financial world."
                                        data-tags="Finance,Tax,Trends" @endif
                                        data-services='[
        {"title": "Finance Tips", "icon": "fas fa-money-bill"},
        {"title": "Tax Updates", "icon": "fas fa-file-alt"},
        {"title": "Industry Trends", "icon": "fas fa-chart-bar"}
    ]'>
                                        <i
                                            class="@if (isset($blogsNav)) {{ $blogsNav->icon_class }}@else fas fa-blog @endif"></i>
                                        <span>
                                            @if (isset($blogsNav))
                                                {{ $blogsNav->page_title }}
                                            @else
                                                Blogs
                                            @endif
                                        </span>
                                    </a>
                                    @if (isset($navigationItems) && $navigationItems->where('page_slug', 'insights')->first())
                                        @php $insightsNav = $navigationItems->where('page_slug', 'insights')->first(); @endphp
                                        <a href="{{ route($insightsNav->route_name) }}"
                                            data-tooltip="{{ $insightsNav->page_title }}"
                                            data-image="{{ $insightsNav->preview_image_url }}"
                                            data-description="{{ $insightsNav->description }}"
                                        data-tags="{{ $insightsNav->tags }}" @else <a href="/insights"
                                            data-tooltip="Insights"
                                            data-image="https://images.unsplash.com/photo-1516321310769-65e85b8e6351?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&w=300&h=120"
                                            data-description="Stay informed with our latest industry insights and thought leadership. Our expert analyses cover emerging trends, regulatory updates, and strategic opportunities to keep your business ahead in a dynamic market."
                                            data-tags="Insights,Trends,Leadership" @endif
                                            data-services='[
        {"title": "Market Analysis", "icon": "fas fa-chart-pie"},
        {"title": "Regulatory Updates", "icon": "fas fa-gavel"},
        {"title": "Strategic Insights", "icon": "fas fa-lightbulb"}
    ]'>
                                            <i
                                                class="@if (isset($insightsNav)) {{ $insightsNav->icon_class }}@else fas fa-lightbulb @endif"></i>
                                            <span>
                                                @if (isset($insightsNav))
                                                    {{ $insightsNav->page_title }}
                                                @else
                                                    Insights
                                                @endif
                                            </span>
                                        </a>
                                        <div class="separator-bar"></div>
                                        @if (isset($navigationItems) && $navigationItems->where('page_slug', 'about')->first())
                                            @php $aboutNav = $navigationItems->where('page_slug', 'about')->first(); @endphp
                                            <a href="{{ route($aboutNav->route_name) }}" class="text-item"
                                                data-tooltip="{{ $aboutNav->page_title }}"
                                                data-image="{{ $aboutNav->preview_image_url }}"
                                                data-description="{{ $aboutNav->description }}"
                                            data-tags="{{ $aboutNav->tags }}" @else <a href="/about"
                                                class="text-item" data-tooltip="About"
                                                data-image="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&w=300&h=120"
                                                data-description="Learn about our mission, values, and commitment to excellence. At Chartered Insights, we strive to deliver unparalleled financial and consulting services, fostering trust and driving success for our clients."
                                                data-tags="Mission,Values,Excellence" @endif
                                                data-services='[
        {"title": "Our Mission", "icon": "fas fa-bullseye"},
        {"title": "Our Values", "icon": "fas fa-handshake"},
        {"title": "Our Team", "icon": "fas fa-users"}
    ]'>
                                                <span>
                                                    @if (isset($aboutNav))
                                                        {{ $aboutNav->page_title }}
                                                    @else
                                                        About
                                                    @endif
                                                </span>
                                            </a>
                                            @if (isset($navigationItems) && $navigationItems->where('page_slug', 'ourteam')->first())
                                                @php $teamNav = $navigationItems->where('page_slug', 'ourteam')->first(); @endphp
                                                <a href="{{ route($teamNav->route_name) }}" class="text-item"
                                                    data-tooltip="{{ $teamNav->page_title }}"
                                                    data-image="{{ $teamNav->preview_image_url }}"
                                                    data-description="{{ $teamNav->description }}"
                                                data-tags="{{ $teamNav->tags }}" @else <a href="/ourteam"
                                                    class="text-item" data-tooltip="ourteam"
                                                    data-image="https://images.unsplash.com/photo-1516321497487-e288fb19713f?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&w=300&h=120"
                                                    data-description="Meet our dedicated team of professionals at Roshan Kumar & Associates. Our experts in audit, tax, and consulting bring diverse expertise and a commitment to delivering exceptional results for our clients."
                                                    data-tags="Team,Experts,Professionals" @endif
                                                    data-services='[
        {"title": "Audit Experts", "icon": "fas fa-book-open"},
        {"title": "Tax Specialists", "icon": "fas fa-calculator"},
        {"title": "Consulting Team", "icon": "fas fa-users-cog"}
    ]'>
                                                    <span>
                                                        @if (isset($teamNav))
                                                            {{ $teamNav->page_title }}
                                                        @else
                                                            Teams
                                                        @endif
                                                    </span>
                                                </a>
                                                @if (isset($navigationItems) && $navigationItems->where('page_slug', 'careers')->first())
                                                    @php $careersNav = $navigationItems->where('page_slug', 'careers')->first(); @endphp
                                                    <a href="{{ route($careersNav->route_name) }}" class="text-item"
                                                        data-tooltip="{{ $careersNav->page_title }}"
                                                        data-image="{{ $careersNav->preview_image_url }}"
                                                        data-description="{{ $careersNav->description }}"
                                                    data-tags="{{ $careersNav->tags }}" @else <a href="/careers"
                                                        class="text-item" data-tooltip="Careers"
                                                        data-image="https://images.unsplash.com/photo-1516321310769-65e85b8e6351?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&w=300&h=120"
                                                        data-description="Explore career opportunities to grow with Chartered Insights. Join our dynamic team of professionals dedicated to excellence in audit, tax, and advisory services, and advance your career with meaningful opportunities."
                                                        data-tags="Careers,Opportunities,Professional" @endif
                                                        data-services='[
        {"title": "Job Openings", "icon": "fas fa-briefcase"},
        {"title": "Internships", "icon": "fas fa-graduation-cap"},
        {"title": "Professional Growth", "icon": "fas fa-chart-line"}
    ]'>
                                                        <span>
                                                            @if (isset($careersNav))
                                                                {{ $careersNav->page_title }}
                                                            @else
                                                                Careers
                                                            @endif
                                                        </span>
                                                    </a>
                                                    @if (isset($navigationItems) && $navigationItems->where('page_slug', 'contact')->first())
                                                        @php $contactNav = $navigationItems->where('page_slug', 'contact')->first(); @endphp
                                                        <a href="{{ route($contactNav->route_name) }}"
                                                            class="text-item"
                                                            data-tooltip="{{ $contactNav->page_title }}"
                                                            data-image="{{ $contactNav->preview_image_url }}"
                                                            data-description="{{ $contactNav->description }}"
                                                        data-tags="{{ $contactNav->tags }}" @else <a
                                                            href="/contact" class="text-item"
                                                            data-tooltip="Contact Us"
                                                            data-image="https://images.unsplash.com/photo-1516321310769-65e85b8e6351?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&w=300&h=120"
                                                            data-description="Get in touch with our team for personalized support and inquiries. Whether you need assistance with audits, tax planning, or strategic consulting, our experts are here to help you succeed."
                                                            data-tags="Support,Contact,Consulting" @endif
                                                            data-services='[
        {"title": "Support Desk", "icon": "fas fa-headset"},
        {"title": "Consulting Inquiries", "icon": "fas fa-envelope"},
        {"title": "Feedback", "icon": "fas fa-comment"}
    ]'>
                                                            <span>
                                                                @if (isset($contactNav))
                                                                    {{ $contactNav->page_title }}
                                                                @else
                                                                    Contact Us
                                                                @endif
                                                            </span>
                                                        </a>
        </div>
    </div>

    <div class="rka-content-scope" id="main-content">
        @yield('content')
        @yield('styles')
        @stack('styles')
        @include('new.layouts.footer')
    </div>

    <!-- Search Modal -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="searchModalLabel">
                        <i class="fas fa-search me-2"></i>Search Results
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="search-form mb-3">
                        <div class="input-group">
                            <input type="text" id="modal-search-input" class="form-control"
                                placeholder="Search for services, industries, insights..."
                                onkeypress="handleModalSearchKeyPress(event)">
                            <button class="btn btn-primary" type="button" onclick="performModalSearch()">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>

                    <div id="search-loading" class="text-center py-4" style="display: none;">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2 text-muted">Searching...</p>
                    </div>

                    <div id="search-results-container">
                        <div class="text-center py-4 text-muted">
                            <i class="fas fa-search fa-2x mb-3"></i>
                            <p>Enter a search term to find content</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSearch() {
            const mobileSearch = document.getElementById('mobile-search');
            mobileSearch.style.display = mobileSearch.style.display === 'block' ? 'none' : 'block';
            gsap.fromTo(mobileSearch, {
                y: -10,
                opacity: 0
            }, {
                y: 0,
                opacity: 1,
                duration: 0.15,
                ease: 'power3.out'
            });
        }

        function performSearchFromIcon() {
            const searchInput = document.getElementById('search-input');
            const query = searchInput.value.trim();
            if (query.length >= 1) {
                openSearchModal(query);
            } else {
                // Focus the input to show placeholder
                searchInput.focus();
            }
        }

        function handleSearchKeyPress(event, query) {
            if (event.key === 'Enter') {
                event.preventDefault();
                if (query.length >= 1) {
                    hideAllSearchDropdowns();
                    openSearchModal(query);
                }
            } else if (event.key === 'Escape') {
                hideAllSearchDropdowns();
                event.target.blur();
            }
        }

        function openSearchModal(query = '') {
            const modal = new bootstrap.Modal(document.getElementById('searchModal'));
            const modalSearchInput = document.getElementById('modal-search-input');

            if (query) {
                modalSearchInput.value = query;
                modal.show();
                setTimeout(() => performModalSearch(), 300);
            } else {
                modal.show();
                setTimeout(() => modalSearchInput.focus(), 300);
            }
        }

        function handleModalSearchKeyPress(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                performModalSearch();
            }
        }

        function performModalSearch() {
            const query = document.getElementById('modal-search-input').value.trim();
            const loadingDiv = document.getElementById('search-loading');
            const resultsContainer = document.getElementById('search-results-container');

            if (query.length < 1) {
                resultsContainer.innerHTML = `
                    <div class="text-center py-4 text-muted">
                        <i class="fas fa-search fa-2x mb-3"></i>
                        <p>Enter a search term to find content</p>
                    </div>
                `;
                return;
            }

            // Show loading
            loadingDiv.style.display = 'block';
            resultsContainer.innerHTML = '';

            fetch(`/api/search?q=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(data => {
                    loadingDiv.style.display = 'none';
                    displayModalResults(data, query);
                })
                .catch(error => {
                    console.error('Search error:', error);
                    loadingDiv.style.display = 'none';
                    resultsContainer.innerHTML = `
                        <div class="alert alert-danger">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            An error occurred while searching. Please try again.
                        </div>
                    `;
                });
        }

        function displayModalResults(data, query) {
            const resultsContainer = document.getElementById('search-results-container');

            if (!data.success || data.results.length === 0) {
                resultsContainer.innerHTML = `
                    <div class="text-center py-4">
                        <i class="fas fa-search fa-2x text-muted mb-3"></i>
                        <h5>No results found for "${query}"</h5>
                        <p class="text-muted">Try different keywords or browse our categories below:</p>
                        <div class="d-flex flex-wrap justify-content-center gap-2 mt-3">
                            <a href="/services" class="btn btn-outline-primary btn-sm">Services</a>
                            <a href="/industries" class="btn btn-outline-primary btn-sm">Industries</a>
                            <a href="/insights" class="btn btn-outline-primary btn-sm">Insights</a>
                            <a href="/blogs" class="btn btn-outline-primary btn-sm">Blogs</a>
                            <a href="/events" class="btn btn-outline-primary btn-sm">Events</a>
                            <a href="/careers" class="btn btn-outline-primary btn-sm">Careers</a>
                        </div>
                    </div>
                `;
                return;
            }

            // Group results by category
            const groupedResults = {};
            data.results.forEach(result => {
                if (!groupedResults[result.category]) {
                    groupedResults[result.category] = [];
                }
                groupedResults[result.category].push(result);
            });

            let html = `<div class="search-stats mb-3">
                <small class="text-muted">Found ${data.total_results} results for "${query}"</small>
            </div>`;

            // Display results by category
            Object.keys(groupedResults).forEach(category => {
                const categoryResults = groupedResults[category];
                const categoryIcon = getCategoryIcon(category);

                html += `
                    <div class="category-section mb-4">
                        <h6 class="category-header">
                            <i class="${categoryIcon} me-2"></i>${category}
                            <span class="badge bg-primary ms-2">${categoryResults.length}</span>
                        </h6>
                        <div class="category-results">
                `;

                categoryResults.forEach(result => {
                    html += `
                        <div class="search-result-item">
                            <div class="d-flex align-items-start">
                                <i class="${result.icon} me-3 mt-1 text-primary"></i>
                                <div class="flex-grow-1">
                                    <a href="${result.url}" class="result-title h6 mb-1" data-bs-dismiss="modal">${result.title}</a>
                                    <p class="result-description mb-0 small text-muted">${result.description}</p>
                                </div>
                            </div>
                        </div>
                    `;
                });

                html += `
                        </div>
                    </div>
                `;
            });

            resultsContainer.innerHTML = html;
        }

        function getCategoryIcon(category) {
            const icons = {
                'Services': 'fas fa-file-invoice-dollar',
                'Industries': 'fas fa-industry',
                'Insights': 'fas fa-lightbulb',
                'Blogs': 'fas fa-blog',
                'Events': 'fas fa-calendar',
                'Careers': 'fas fa-briefcase'
            };
            return icons[category] || 'fas fa-circle';
        }

        function performMobileSearch() {
            const mobileSearchInput = document.getElementById('mobile-search-input');
            const query = mobileSearchInput.value.trim();
            if (query.length >= 1) {
                openSearchModal(query);
                // Hide mobile search
                toggleSearch();
            }
        }

        let searchTimeout;
        let currentSearchQuery = '';

        function handleLiveSearch(query) {
            currentSearchQuery = query;

            // Clear previous timeout
            if (searchTimeout) {
                clearTimeout(searchTimeout);
            }

            if (query.length === 0) {
                hideAllSearchDropdowns();
                return;
            }

            if (query.length >= 1) {
                // Show dropdown immediately
                showSearchDropdown();
                showMobileSearchDropdown();

                // Add small delay for performance
                searchTimeout = setTimeout(() => {
                    performLiveSearch(query);
                }, 150);
            }
        }

        function performLiveSearch(query) {
            const dropdownContent = document.getElementById('search-dropdown-content');
            const mobileDropdownContent = document.getElementById('mobile-search-dropdown-content');

            // Show loading
            const loadingHtml = `
                <div class="search-loading">
                    <i class="fas fa-spinner fa-spin"></i>
                    <span>Searching...</span>
                </div>
            `;

            dropdownContent.innerHTML = loadingHtml;
            mobileDropdownContent.innerHTML = loadingHtml;

            fetch(`/api/search?q=${encodeURIComponent(query)}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Search response:', data);
                    displayLiveResults(data, query);
                })
                .catch(error => {
                    console.error('Search error:', error);
                    const errorHtml = `
                        <div class="search-error">
                            <i class="fas fa-exclamation-triangle"></i>
                            <span>Search error: ${error.message}</span>
                        </div>
                    `;
                    dropdownContent.innerHTML = errorHtml;
                    mobileDropdownContent.innerHTML = errorHtml;
                });
        }

        function displayLiveResults(data, query) {
            const dropdownContent = document.getElementById('search-dropdown-content');
            const mobileDropdownContent = document.getElementById('mobile-search-dropdown-content');

            if (!data.success || data.results.length === 0) {
                const noResultsHtml = `
                    <div class="no-results">
                        <i class="fas fa-search"></i>
                        <span>No results for "${query}"</span>
                    </div>
                `;
                dropdownContent.innerHTML = noResultsHtml;
                mobileDropdownContent.innerHTML = noResultsHtml;
                return;
            }

            // Group results by category
            const groupedResults = {};
            data.results.forEach(result => {
                if (!groupedResults[result.category]) {
                    groupedResults[result.category] = [];
                }
                groupedResults[result.category].push(result);
            });

            let html = '';

            // Display results by category with highlighted matching text
            Object.keys(groupedResults).forEach(category => {
                const categoryResults = groupedResults[category];
                const categoryIcon = getCategoryIcon(category);

                html += `
                    <div class="dropdown-category">
                        <div class="category-title">
                            <i class="${categoryIcon}"></i>
                            <span>${category}</span>
                            <span class="result-count">${categoryResults.length}</span>
                        </div>
                        <div class="category-items">
                `;

                // Limit results per category for dropdown
                const limitedResults = categoryResults.slice(0, 3);

                limitedResults.forEach(result => {
                    const highlightedTitle = highlightMatchingText(result.title, query);
                    const highlightedDesc = highlightMatchingText(result.description, query);

                    html += `
                        <div class="dropdown-item" onclick="navigateToResult('${result.url}')">
                            <div class="item-content">
                                <div class="item-title">${highlightedTitle}</div>
                                <div class="item-description">${highlightedDesc}</div>
                            </div>
                            <i class="${result.icon} item-icon"></i>
                        </div>
                    `;
                });

                if (categoryResults.length > 3) {
                    html += `
                        <div class="dropdown-item more-results" onclick="openSearchModal('${query}')">
                            <div class="item-content">
                                <div class="item-title">View all ${categoryResults.length} ${category.toLowerCase()} results</div>
                            </div>
                            <i class="fas fa-arrow-right item-icon"></i>
                        </div>
                    `;
                }

                html += `
                        </div>
                    </div>
                `;
            });

            dropdownContent.innerHTML = html;
            mobileDropdownContent.innerHTML = html;
        }

        function highlightMatchingText(text, query) {
            if (!text || !query) return text;

            const regex = new RegExp(`(${query})`, 'gi');
            return text.replace(regex, '<mark>$1</mark>');
        }

        function navigateToResult(url) {
            hideAllSearchDropdowns();
            window.location.href = url;
        }

        function showSearchDropdown() {
            const dropdown = document.getElementById('search-dropdown');
            if (dropdown && currentSearchQuery.length >= 1) {
                dropdown.style.display = 'block';
            }
        }

        function hideSearchDropdown() {
            setTimeout(() => {
                const dropdown = document.getElementById('search-dropdown');
                if (dropdown) {
                    dropdown.style.display = 'none';
                }
            }, 200);
        }

        function showMobileSearchDropdown() {
            const dropdown = document.getElementById('mobile-search-dropdown');
            if (dropdown && currentSearchQuery.length >= 1) {
                dropdown.style.display = 'block';
            }
        }

        function hideMobileSearchDropdown() {
            setTimeout(() => {
                const dropdown = document.getElementById('mobile-search-dropdown');
                if (dropdown) {
                    dropdown.style.display = 'none';
                }
            }, 200);
        }

        function hideAllSearchDropdowns() {
            const dropdown = document.getElementById('search-dropdown');
            const mobileDropdown = document.getElementById('mobile-search-dropdown');

            if (dropdown) dropdown.style.display = 'none';
            if (mobileDropdown) mobileDropdown.style.display = 'none';
        }

        function hideSearchSuggestions() {
            // Function to hide search suggestions if implemented
            console.log('Hiding search suggestions');
        }

        function toggleMenu() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');
            const previewPanel = document.getElementById('page-preview');
            const overlay = document.getElementById('overlay');
            const isMobile = window.innerWidth <= 1024;

            sidebar.classList.toggle('active');
            const isActive = sidebar.classList.contains('active');

            if (isMobile) {
                gsap.to(sidebar, {
                    x: isActive ? '0%' : '-100%',
                    duration: 0.2,
                    ease: 'power3.out',
                    onStart: () => {
                        if (!isActive) sidebar.style.visibility = 'hidden';
                    },
                    onComplete: () => {
                        if (isActive) sidebar.style.visibility = 'visible';
                    }
                });
                gsap.set(previewPanel, {
                    opacity: 0,
                    visibility: 'hidden'
                });
                gsap.set(overlay, {
                    opacity: 0,
                    visibility: 'hidden'
                });
                if (mainContent) {
                    mainContent.classList.toggle('active', isActive);
                    gsap.to(mainContent, {
                        marginLeft: '0',
                        duration: 0.2,
                        ease: 'power3.out'
                    });
                }
            } else {
                gsap.to(sidebar, {
                    x: '0%',
                    width: isActive ? '40%' : '80px',
                    duration: 0.2,
                    ease: 'power3.out'
                });
                gsap.to(previewPanel, {
                    left: isActive ? 480 : 80,
                    duration: 0.2,
                    ease: 'power3.out'
                });
                gsap.set(overlay, {
                    opacity: 0,
                    visibility: 'hidden'
                });
                if (mainContent) {
                    mainContent.classList.toggle('active', isActive);
                    gsap.to(mainContent, {
                        marginLeft: isActive ? '480px' : '80px',
                        duration: 0.2,
                        ease: 'power3.out'
                    });
                }
            }

            window.dispatchEvent(new CustomEvent('sidebarToggle', {
                detail: {
                    isActive
                }
            }));
        }

        function adjustPreviewPanel() {
            const sidebarLinks = document.querySelectorAll(
                '.rka-sidebar-scope .sidebar a, .rka-sidebar-scope .sidebar .text-item');
            const previewPanel = document.getElementById('page-preview');
            const previewTitle = document.getElementById('preview-title');
            const previewImage = document.getElementById('preview-image');
            const previewDescription = document.getElementById('preview-description');
            const previewTags = document.getElementById('preview-tags');
            const previewServices = document.getElementById('preview-services');
            const overlay = document.getElementById('overlay');
            const currentPath = window.location.pathname;
            const isMobile = window.innerWidth <= 1024;
            let activeTimeline = null;


            sidebarLinks.forEach(link => {
                const newLink = link.cloneNode(true);
                link.parentNode.replaceChild(newLink, link);
            });


            const newSidebarLinks = document.querySelectorAll(
                '.rka-sidebar-scope .sidebar a, .rka-sidebar-scope .sidebar .text-item');

            newSidebarLinks.forEach(link => {
                link.addEventListener('mouseenter', () => {
                    if (isMobile || link.getAttribute('href') === currentPath) return;


                    if (activeTimeline) {
                        activeTimeline.kill();
                    }


                    activeTimeline = gsap.timeline({
                        onStart: () => {
                            previewPanel.classList.add('active');
                            overlay.classList.add('active');
                        }
                    });


                    previewTitle.textContent = link.getAttribute('data-tooltip');
                    previewImage.src = link.getAttribute('data-image');
                    previewImage.alt = `${link.getAttribute('data-tooltip')} Preview`;
                    previewDescription.textContent = link.getAttribute('data-description');
                    const tags = link.getAttribute('data-tags')?.split(',') || [];
                    previewTags.innerHTML = tags.map(tag =>
                        `<span class="tag"><i class="fas fa-tag"></i>${tag.trim()}</span>`).join('');
                    const services = JSON.parse(link.getAttribute('data-services') || '[]');
                    previewServices.innerHTML = services.map(service => `
                        <div class="service-box">
                            <div class="service-info">
                                <i class="${service.icon}"></i>
                                <h4>${service.title}</h4>
                            </div>
                            <div class="plus-icon">+</div>
                        </div>
                    `).join('');


                    activeTimeline
                        .set(previewPanel, {
                            x: 0,
                            scaleX: 1
                        })
                        .fromTo(previewPanel, {
                            opacity: 0,
                            x: '5%'
                        }, {
                            opacity: 1,
                            x: '0%',
                            visibility: 'visible',
                            duration: 0.15,
                            ease: 'power3.inOut'
                        })
                        .fromTo(overlay, {
                            opacity: 0
                        }, {
                            opacity: 1,
                            visibility: 'visible',
                            duration: 0.15,
                            ease: 'power3.inOut'
                        }, 0);
                });

                link.addEventListener('mouseleave', () => {
                    if (isMobile) return;

                });
            });
        }

        let resizeTimeout;

        function resizeHandler() {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(() => {
                const sidebar = document.getElementById('sidebar');
                const mainContent = document.getElementById('main-content');
                const previewPanel = document.getElementById('page-preview');
                const overlay = document.getElementById('overlay');
                const isMobile = window.innerWidth <= 1024;

                if (isMobile) {
                    sidebar.classList.remove('active');
                    gsap.set(sidebar, {
                        x: '-100%',
                        width: '40%',
                        maxWidth: '480px',
                        visibility: 'hidden'
                    });
                    gsap.set(previewPanel, {
                        opacity: 0,
                        visibility: 'hidden',
                        left: 80,
                        x: 0,
                        scaleX: 1
                    });
                    gsap.set(overlay, {
                        opacity: 0,
                        visibility: 'hidden'
                    });
                    if (mainContent) {
                        mainContent.classList.remove('active');
                        gsap.set(mainContent, {
                            marginLeft: '0'
                        });
                    }
                } else {
                    sidebar.classList.remove('active');
                    gsap.set(sidebar, {
                        x: '0%',
                        width: '80px',
                        visibility: 'visible'
                    });
                    gsap.set(previewPanel, {
                        left: 80,
                        opacity: 0,
                        visibility: 'hidden',
                        x: 0,
                        scaleX: 1
                    });
                    gsap.set(overlay, {
                        opacity: 0,
                        visibility: 'hidden'
                    });
                    if (mainContent) {
                        mainContent.classList.remove('active');
                        gsap.set(mainContent, {
                            marginLeft: '80px'
                        });
                    }
                }

                adjustPreviewPanel();

                window.dispatchEvent(new CustomEvent('sidebarToggle', {
                    detail: {
                        isActive: sidebar.classList.contains('active')
                    }
                }));
            }, 100);
        }

        function handleOutsideClick(event) {
            const sidebar = document.getElementById('sidebar');
            const menuBtn = document.getElementById('menu-btn');
            const previewPanel = document.getElementById('page-preview');
            const overlay = document.getElementById('overlay');
            const searchDropdown = document.getElementById('search-dropdown');
            const mobileSearchDropdown = document.getElementById('mobile-search-dropdown');
            const searchInput = document.getElementById('search-input');
            const mobileSearchInput = document.getElementById('mobile-search-input');
            const isMobile = window.innerWidth <= 1024;

            // Handle search dropdown clicks
            if (searchDropdown && !searchInput.contains(event.target) && !searchDropdown.contains(event.target)) {
                hideSearchDropdown();
            }

            if (mobileSearchDropdown && !mobileSearchInput.contains(event.target) && !mobileSearchDropdown.contains(event
                    .target)) {
                hideMobileSearchDropdown();
            }

            if (isMobile && sidebar.classList.contains('active')) {
                if (!sidebar.contains(event.target) && !menuBtn.contains(event.target)) {
                    toggleMenu();
                }
            } else if (!isMobile && (previewPanel.classList.contains('active') || overlay.classList.contains('active'))) {
                if (!sidebar.contains(event.target) && !previewPanel.contains(event.target)) {
                    gsap.to(previewPanel, {
                        opacity: 0,
                        x: '-5%',
                        scaleX: 0.95,
                        visibility: 'hidden',
                        duration: 0.15,
                        ease: 'power3.inOut',
                        onComplete: () => previewPanel.classList.remove('active')
                    });
                    gsap.to(overlay, {
                        opacity: 0,
                        visibility: 'hidden',
                        duration: 0.15,
                        ease: 'power3.inOut',
                        onComplete: () => overlay.classList.remove('active')
                    });
                }
            }
        }

        window.addEventListener('resize', resizeHandler);
        document.addEventListener('DOMContentLoaded', () => {
            resizeHandler();
            adjustPreviewPanel();
            const logo = document.querySelector('.rka-scope .logo');
            gsap.from(logo, {
                scale: 0.8,
                opacity: 0,
                duration: 0.5,
                ease: 'power3.out'
            });
            document.addEventListener('click', handleOutsideClick);

            // Add search shortcut (Ctrl+K or Cmd+K)
            document.addEventListener('keydown', function(e) {
                if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
                    e.preventDefault();
                    openSearchModal();
                }
            });

            // Add test function for debugging
            window.testSearch = function(query) {
                console.log('Testing search for:', query);
                fetch(`/api/search?q=${encodeURIComponent(query)}`)
                    .then(response => response.json())
                    .then(data => {
                        console.log('Search result:', data);
                    })
                    .catch(error => {
                        console.error('Search error:', error);
                    });
            };
        });
    </script>

    <style>
        /* Live Search Dropdown Styles */
        .search-dropdown,
        .mobile-search-dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            z-index: 1000;
            max-height: 400px;
            overflow-y: auto;
            margin-top: 5px;
        }

        .search-dropdown {
            width: 100%;
        }

        .mobile-search-dropdown {
            width: 100%;
            margin-top: 8px;
        }

        .search-placeholder,
        .search-loading,
        .search-error,
        .no-results {
            padding: 20px;
            text-align: center;
            color: #666;
            font-size: 14px;
        }

        .search-loading i {
            margin-right: 8px;
            color: #007bff;
        }

        .search-error i {
            margin-right: 8px;
            color: #dc3545;
        }

        .dropdown-category {
            border-bottom: 1px solid #f0f0f0;
        }

        .dropdown-category:last-child {
            border-bottom: none;
        }

        .category-title {
            display: flex;
            align-items: center;
            padding: 12px 16px 8px 16px;
            font-weight: 600;
            font-size: 13px;
            color: #333;
            background: #f8f9fa;
            border-bottom: 1px solid #e9ecef;
        }

        .category-title i {
            margin-right: 8px;
            color: #007bff;
            width: 16px;
        }

        .result-count {
            margin-left: auto;
            background: #007bff;
            color: white;
            padding: 2px 8px;
            border-radius: 10px;
            font-size: 11px;
        }

        .category-items {
            max-height: 200px;
            overflow-y: auto;
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            padding: 12px 16px;
            cursor: pointer;
            border-bottom: 1px solid #f5f5f5;
            transition: background-color 0.2s ease;
        }

        .dropdown-item:hover {
            background-color: #f8f9fa;
        }

        .dropdown-item:last-child {
            border-bottom: none;
        }

        .dropdown-item.more-results {
            background-color: #e3f2fd;
            color: #1976d2;
            font-weight: 500;
        }

        .dropdown-item.more-results:hover {
            background-color: #bbdefb;
        }

        .item-content {
            flex: 1;
            min-width: 0;
        }

        .item-title {
            font-weight: 500;
            font-size: 14px;
            color: #333;
            margin-bottom: 4px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .item-description {
            font-size: 12px;
            color: #666;
            line-height: 1.3;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .item-icon {
            margin-left: 12px;
            color: #999;
            font-size: 14px;
            flex-shrink: 0;
        }

        .dropdown-item:hover .item-icon {
            color: #007bff;
        }

        /* Highlight matching text */
        mark {
            background-color: #fff3cd;
            color: #856404;
            padding: 0 2px;
            border-radius: 2px;
            font-weight: 600;
        }

        /* Search bar positioning */
        .search-bar {
            position: relative;
        }

        .mobile-search {
            position: relative;
        }

        /* Custom scrollbar for search results */
        .search-dropdown::-webkit-scrollbar,
        .mobile-search-dropdown::-webkit-scrollbar,
        .category-items::-webkit-scrollbar {
            width: 6px;
        }

        .search-dropdown::-webkit-scrollbar-track,
        .mobile-search-dropdown::-webkit-scrollbar-track,
        .category-items::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 3px;
        }

        .search-dropdown::-webkit-scrollbar-thumb,
        .mobile-search-dropdown::-webkit-scrollbar-thumb,
        .category-items::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 3px;
        }

        .search-dropdown::-webkit-scrollbar-thumb:hover,
        .mobile-search-dropdown::-webkit-scrollbar-thumb:hover,
        .category-items::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .dropdown-item {
                padding: 10px 12px;
            }

            .item-title {
                font-size: 13px;
            }

            .item-description {
                font-size: 11px;
            }

            .category-title {
                padding: 10px 12px 6px 12px;
                font-size: 12px;
            }
        }

        /* Search Modal Styles */
        .search-result-item {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 8px;
            border: 1px solid #e9ecef;
            transition: all 0.2s ease;
            background: #f8f9fa;
        }

        .search-result-item:hover {
            background: #e9ecef;
            border-color: #007bff;
            transform: translateX(4px);
        }

        .search-result-item .result-title {
            color: #333;
            text-decoration: none;
            font-weight: 600;
            display: block;
        }

        .search-result-item .result-title:hover {
            color: #007bff;
            text-decoration: none;
        }

        .search-result-item .result-description {
            color: #666;
            line-height: 1.4;
        }

        .category-header {
            color: #495057;
            font-weight: 600;
            padding: 8px 0;
            border-bottom: 2px solid #e9ecef;
            margin-bottom: 12px;
        }

        .category-section {
            border-left: 3px solid #007bff;
            padding-left: 15px;
            margin-left: 5px;
        }

        .category-results {
            max-height: 300px;
            overflow-y: auto;
        }

        .search-stats {
            padding: 8px 12px;
            background: #e3f2fd;
            border-radius: 6px;
            border-left: 4px solid #2196f3;
        }

        /* Custom scrollbar for category results */
        .category-results::-webkit-scrollbar {
            width: 6px;
        }

        .category-results::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 3px;
        }

        .category-results::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 3px;
        }

        .category-results::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }

        /* Modal enhancements */
        .modal-dialog {
            max-width: 600px;
        }

        .modal-header {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: white;
            border-bottom: none;
        }

        .modal-header .btn-close {
            filter: invert(1);
        }

        .modal-body {
            max-height: 70vh;
            overflow-y: auto;
        }

        @media (max-width: 768px) {
            .modal-dialog {
                margin: 10px;
                max-width: calc(100% - 20px);
            }

            .category-section {
                border-left: 2px solid #007bff;
                padding-left: 10px;
                margin-left: 2px;
            }
        }
    </style>
    @yield('scripts')
</body>

</html>
