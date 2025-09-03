<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{env('APP_NAME')}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@500;600;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
</head>

<body>
    <div class="rka-scope">
        <div class="header">
            <div class="header-content">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center logo">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                            <text x="50%" y="50%" text-anchor="middle" dominant-baseline="central"
                                font-family="Lora, serif" font-size="24" fill="#003b5c" font-weight="bold">R</text>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-white font-lora font-bold text-xl">Roshan Kumar & Associates</h1>
                        <p class="text-white/80 text-sm font-roboto">Chartered Accountants</p>
                    </div>
                </div>
                <div class="slogan text-white font-roboto text-sm font-medium hidden md:block">
                    Empowering Wealth Creation
                </div>
                <div class="flex items-center space-x-3">
                    <div class="search-bar">
                        <input type="text" placeholder="Search..." oninput="handleSearch(this.value)">
                        <i class="fas fa-search"></i>
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
            <input type="text" placeholder="Search..." oninput="handleSearch(this.value)">
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
            <a href="{{ route('home') }}" data-tooltip="Home"
                data-image="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&w=300&h=120"
                data-description="Welcome to Chartered Insights, your trusted partner for expert financial solutions. We provide comprehensive audit, tax, and consulting services tailored to drive your business forward. Our team of experienced professionals is dedicated to delivering strategic insights and sustainable growth for clients across various industries."
                data-tags="Finance,Consulting,Audit" data-services='[
                {"title": "Financial Planning", "icon": "fas fa-chart-line"},
                {"title": "Investment Advice", "icon": "fas fa-piggy-bank"},
                {"title": "Risk Management", "icon": "fas fa-shield-alt"}
            ]'>
                <i class="fas fa-home"></i>
                <span>Home</span>
            </a>
            <a href="/services" data-tooltip="Services"
                data-image="https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&w=300&h=120"
                data-description="Explore our comprehensive audit, tax, and consulting services tailored to your needs. From financial reporting and compliance to strategic business consulting, we offer solutions that ensure regulatory adherence, optimize financial performance, and support long-term success."
                data-tags="Audit,Tax,Consulting" data-services='[
                {"title": "Audit Services", "icon": "fas fa-book"},
                {"title": "Tax Consulting", "icon": "fas fa-calculator"},
                {"title": "Business Advisory", "icon": "fas fa-briefcase"}
            ]'>
                <i class="fas fa-file-invoice-dollar"></i>
                <span>Services</span>
            </a>
            <a href="/industries" data-tooltip="Industries"
                data-image="https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&w=300&h=120"
                data-description="Specialized expertise across diverse sectors to meet your unique challenges. Our industry-specific knowledge in healthcare, technology, manufacturing, and more ensures customized solutions that address your business’s specific needs and goals."
                data-tags="Healthcare,Technology,Manufacturing" data-services='[
                {"title": "Healthcare", "icon": "fas fa-heartbeat"},
                {"title": "Technology", "icon": "fas fa-laptop-code"},
                {"title": "Manufacturing", "icon": "fas fa-industry"}
            ]'>
                <i class="fas fa-industry"></i>
                <span>Industries</span>
            </a>
            <a href="/events" data-tooltip="Events"
                data-image="https://images.unsplash.com/photo-1516321310769-65e85b8e6351?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&w=300&h=120"
                data-description="Join our upcoming events to connect and learn from industry experts. Our workshops, webinars, and networking sessions provide valuable insights and opportunities to collaborate with peers and professionals."
                data-tags="Workshops,Webinars,Networking" data-services='[
                {"title": "Workshops", "icon": "fas fa-chalkboard-teacher"},
                {"title": "Webinars", "icon": "fas fa-video"},
                {"title": "Networking", "icon": "fas fa-users"}
            ]'>
                <i class="fas fa-calendar"></i>
                <span>Events</span>
            </a>
            <a href="/offices" data-tooltip="Offices"
                data-image="https://images.unsplash.com/photo-1516321310769-65e85b8e6351?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&w=300&h=120"
                data-description="Discover our office locations and connect with our team near you. With multiple offices strategically located, we provide accessible, personalized support to meet your financial and consulting needs."
                data-tags="Locations,Support,Consulting" data-services='[
                {"title": "Regional Support", "icon": "fas fa-map-marker-alt"},
                {"title": "Consulting Hubs", "icon": "fas fa-building"},
                {"title": "Client Services", "icon": "fas fa-headset"}
            ]'>
                <i class="fas fa-building"></i>
                <span>Offices</span>
            </a>
            <a href="/blogs" data-tooltip="Blogs"
                data-image="https://images.unsplash.com/photo-1516321310769-65e85b8e6351?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&w=300&h=120"
                data-description="Read our latest articles on finance, tax, and business trends. Our blog offers in-depth analyses, practical tips, and expert perspectives to help you navigate the complexities of the financial world."
                data-tags="Finance,Tax,Trends" data-services='[
                {"title": "Finance Tips", "icon": "fas fa-money-bill"},
                {"title": "Tax Updates", "icon": "fas fa-file-alt"},
                {"title": "Industry Trends", "icon": "fas fa-chart-bar"}
            ]'>
                <i class="fas fa-blog"></i>
                <span>Blogs</span>
            </a>
            <a href="/insights" data-tooltip="Insights"
                data-image="https://images.unsplash.com/photo-1516321310769-65e85b8e6351?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&w=300&h=120"
                data-description="Stay informed with our latest industry insights and thought leadership. Our expert analyses cover emerging trends, regulatory updates, and strategic opportunities to keep your business ahead in a dynamic market."
                data-tags="Insights,Trends,Leadership" data-services='[
                {"title": "Market Analysis", "icon": "fas fa-chart-pie"},
                {"title": "Regulatory Updates", "icon": "fas fa-gavel"},
                {"title": "Strategic Insights", "icon": "fas fa-lightbulb"}
            ]'>
                <i class="fas fa-lightbulb"></i>
                <span>Insights</span>
            </a>
            <div class="separator-bar"></div>
            <a href="/about" class="text-item" data-tooltip="About"
                data-image="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&w=300&h=120"
                data-description="Learn about our mission, values, and commitment to excellence. At Chartered Insights, we strive to deliver unparalleled financial and consulting services, fostering trust and driving success for our clients."
                data-tags="Mission,Values,Excellence" data-services='[
                {"title": "Our Mission", "icon": "fas fa-bullseye"},
                {"title": "Our Values", "icon": "fas fa-handshake"},
                {"title": "Our Team", "icon": "fas fa-users"}
            ]'>
                <span>About</span>
            </a>
            <a href="/careers" class="text-item" data-tooltip="Careers"
                data-image="https://images.unsplash.com/photo-1516321310769-65e85b8e6351?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&w=300&h=120"
                data-description="Explore career opportunities to grow with Chartered Insights. Join our dynamic team of professionals dedicated to excellence in audit, tax, and advisory services, and advance your career with meaningful opportunities."
                data-tags="Careers,Opportunities,Professional" data-services='[
                {"title": "Job Openings", "icon": "fas fa-briefcase"},
                {"title": "Internships", "icon": "fas fa-graduation-cap"},
                {"title": "Professional Growth", "icon": "fas fa-chart-line"}
            ]'>
                <span>Careers</span>
            </a>
            <a href="/contact" class="text-item" data-tooltip="Contact Us"
                data-image="https://images.unsplash.com/photo-1516321310769-65e85b8e6351?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&w=300&h=120"
                data-description="Get in touch with our team for personalized support and inquiries. Whether you need assistance with audits, tax planning, or strategic consulting, our experts are here to help you succeed."
                data-tags="Support,Contact,Consulting" data-services='[
                {"title": "Support Desk", "icon": "fas fa-headset"},
                {"title": "Consulting Inquiries", "icon": "fas fa-envelope"},
                {"title": "Feedback", "icon": "fas fa-comment"}
            ]'>
                <span>Contact Us</span>
            </a>
        </div>
    </div>

    <div class="rka-content-scope" id="main-content">
        @yield('content')
        @yield('styles')
        @stack('styles')
        @include('new.layouts.footer')
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSearch() {
            const mobileSearch = document.getElementById('mobile-search');
            mobileSearch.style.display = mobileSearch.style.display === 'block' ? 'none' : 'block';
            gsap.fromTo(mobileSearch, { y: -10, opacity: 0 }, { y: 0, opacity: 1, duration: 0.15, ease: 'power3.out' });
        }

        function handleSearch(query) {
            console.log('Search query:', query);
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
                gsap.set(previewPanel, { opacity: 0, visibility: 'hidden' });
                gsap.set(overlay, { opacity: 0, visibility: 'hidden' });
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
                gsap.set(overlay, { opacity: 0, visibility: 'hidden' });
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
                detail: { isActive }
            }));
        }

        function adjustPreviewPanel() {
            const sidebarLinks = document.querySelectorAll('.rka-sidebar-scope .sidebar a, .rka-sidebar-scope .sidebar .text-item');
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

            // Remove existing event listeners by replacing elements
            sidebarLinks.forEach(link => {
                const newLink = link.cloneNode(true);
                link.parentNode.replaceChild(newLink, link);
            });

            // Re-query updated links
            const newSidebarLinks = document.querySelectorAll('.rka-sidebar-scope .sidebar a, .rka-sidebar-scope .sidebar .text-item');

            newSidebarLinks.forEach(link => {
                link.addEventListener('mouseenter', () => {
                    if (isMobile || link.getAttribute('href') === currentPath) return;

                    // Kill any active animation to prevent flicker
                    if (activeTimeline) {
                        activeTimeline.kill();
                    }

                    // Create a new GSAP timeline
                    activeTimeline = gsap.timeline({
                        onStart: () => {
                            previewPanel.classList.add('active');
                            overlay.classList.add('active');
                        }
                    });

                    // Update preview content
                    previewTitle.textContent = link.getAttribute('data-tooltip');
                    previewImage.src = link.getAttribute('data-image');
                    previewImage.alt = `${link.getAttribute('data-tooltip')} Preview`;
                    previewDescription.textContent = link.getAttribute('data-description');
                    const tags = link.getAttribute('data-tags')?.split(',') || [];
                    previewTags.innerHTML = tags.map(tag => `<span class="tag"><i class="fas fa-tag"></i>${tag.trim()}</span>`).join('');
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

                    // Animate preview and overlay with smoother transition
                    activeTimeline
                        .set(previewPanel, { x: 0, scaleX: 1 })
                        .fromTo(previewPanel, 
                            { opacity: 0, x: '5%' },
                            { opacity: 1, x: '0%', visibility: 'visible', duration: 0.15, ease: 'power3.inOut' }
                        )
                        .fromTo(overlay, 
                            { opacity: 0 },
                            { opacity: 1, visibility: 'visible', duration: 0.15, ease: 'power3.inOut' }, 0);
                });

                link.addEventListener('mouseleave', () => {
                    if (isMobile) return;
                    // Don't immediately hide; wait for outside click
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
                    gsap.set(sidebar, { x: '-100%', width: '40%', maxWidth: '480px', visibility: 'hidden' });
                    gsap.set(previewPanel, { opacity: 0, visibility: 'hidden', left: 80, x: 0, scaleX: 1 });
                    gsap.set(overlay, { opacity: 0, visibility: 'hidden' });
                    if (mainContent) {
                        mainContent.classList.remove('active');
                        gsap.set(mainContent, { marginLeft: '0' });
                    }
                } else {
                    sidebar.classList.remove('active');
                    gsap.set(sidebar, { x: '0%', width: '80px', visibility: 'visible' });
                    gsap.set(previewPanel, { left: 80, opacity: 0, visibility: 'hidden', x: 0, scaleX: 1 });
                    gsap.set(overlay, { opacity: 0, visibility: 'hidden' });
                    if (mainContent) {
                        mainContent.classList.remove('active');
                        gsap.set(mainContent, { marginLeft: '80px' });
                    }
                }

                adjustPreviewPanel();

                window.dispatchEvent(new CustomEvent('sidebarToggle', {
                    detail: { isActive: sidebar.classList.contains('active') }
                }));
            }, 100);
        }

        function handleOutsideClick(event) {
            const sidebar = document.getElementById('sidebar');
            const menuBtn = document.getElementById('menu-btn');
            const previewPanel = document.getElementById('page-preview');
            const overlay = document.getElementById('overlay');
            const isMobile = window.innerWidth <= 1024;

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
            gsap.from(logo, { scale: 0.8, opacity: 0, duration: 0.5, ease: 'power3.out' });
            document.addEventListener('click', handleOutsideClick);
        });
    </script>
    @yield('scripts')
</body>

</html>