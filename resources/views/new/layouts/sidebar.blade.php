<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar with Header</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@500;600;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <style>
        .rka-scope {
            --primary: #002b4a;
            --secondary: #0080c0;
            --accent: #00a3e0;
            --light: #f7fbff;
            --lighter: #eef4fc;
            --white: #ffffff;
            --gray: #6c757d;
            --shadow: rgba(0, 43, 74, 0.15);
            --shadow-lg: rgba(0, 43, 74, 0.25);
            --transition: all 0.3s cubic-bezier(0.4, 0.0, 0.2, 1);
            font-family: 'Roboto', sans-serif;
            color: var(--primary);
        }

        .rka-scope * {
            box-sizing: border-box;
        }

        .rka-scope h1 {
            font-family: 'Lora', serif;
            font-weight: 700;
            color: var(--white);
            letter-spacing: 0.5px;
        }

        .rka-scope .header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 80px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            color: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 32px;
            z-index: 50;
            box-shadow: 0 4px 15px rgba(0, 59, 92, 0.15);
        }

        .rka-scope .header-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            max-width: 1400px;
        }

        .rka-scope .header .logo {
            transition: transform 0.5s ease;
        }

        .rka-scope .header .logo:hover {
            transform: rotate(360deg);
        }

        .rka-scope .search-bar {
            position: relative;
            width: 280px;
            display: flex;
            align-items: center;
        }

        .rka-scope .search-bar input {
            width: 100%;
            padding: 8px 36px 8px 12px;
            border: none;
            border-radius: 16px;
            background: rgba(255, 255, 255, 0.2);
            color: var(--white);
            font-size: 13px;
            font-family: 'Roboto', sans-serif;
            transition: all 0.2s ease;
        }

        .rka-scope .search-bar input:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.3);
        }

        .rka-scope .search-bar input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .rka-scope .search-bar i {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--white);
            font-size: 14px;
            cursor: pointer;
            transition: color 0.2s ease;
        }

        .rka-scope .search-bar i:hover {
            color: var(--lighter);
        }

        .rka-scope .search-icon {
            display: none;
            color: var(--white);
            font-size: 18px;
            cursor: pointer;
            padding: 6px;
            border-radius: 50%;
            transition: background 0.2s ease;
        }

        .rka-scope .search-icon:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .rka-scope .mobile-search {
            display: none;
            position: absolute;
            top: 80px;
            left: 0;
            right: 0;
            padding: 8px 16px;
            background: var(--primary);
            z-index: 50;
        }

        .rka-scope .mobile-search input {
            width: 100%;
            padding: 8px;
            border: none;
            border-radius: 16px;
            background: rgba(255, 255, 255, 0.2);
            color: var(--white);
            font-size: 13px;
            font-family: 'Roboto', sans-serif;
        }

        .rka-scope .mobile-search input:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.3);
        }

        .rka-scope .mobile-search input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .rka-scope .menu-btn {
            display: none;
            color: var(--white);
            font-size: 18px;
            cursor: pointer;
            padding: 6px;
            border-radius: 50%;
            transition: background 0.2s ease;
        }

        .rka-scope .menu-btn:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .rka-sidebar-scope {
            --primary: #002b4a;
            --secondary: #0080c0;
            --accent: #00a3e0;
            --white: #ffffff;
            --gray: #6c757d;
            --shadow: rgba(0, 43, 74, 0.15);
            --shadow-lg: rgba(0, 43, 74, 0.25);
            --transition: all 0.3s cubic-bezier(0.4, 0.0, 0.2, 1);
            font-family: 'Roboto', sans-serif;
            color: var(--primary);
        }

        .rka-sidebar-scope * {
            box-sizing: border-box;
        }

        .rka-sidebar-scope .sidebar {
            width: 80px;
            background: linear-gradient(180deg, #ffffff, #f0f6ff);
            padding: 8px 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: transform 0.2s ease-in-out, width 0.2s ease-in-out;
            position: fixed;
            top: 80px;
            left: 0;
            bottom: 0;
            z-index: 1000;
            box-shadow: 6px 0 15px rgba(0, 59, 92, 0.15);
        }

        .rka-sidebar-scope .sidebar.active {
            transform: translateX(0);
            width: 40%;
            max-width: 480px;
        }

        .rka-sidebar-scope .sidebar a {
            text-decoration: none;
            color: var(--primary);
            margin: 8px 0;
            font-size: 10px;
            width: 100%;
            text-align: center;
            padding: 8px 0;
            border-radius: 6px;
            transition: background 0.2s ease, color 0.2s ease, transform 0.2s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            transform: scale(1);
            cursor: pointer;
        }

        .rka-sidebar-scope .sidebar a:hover {
            background: linear-gradient(90deg, #b8d7f0, #80c0f0);
            color: var(--accent);
            transform: scale(1.05);
            box-shadow: 0 2px 8px rgba(0, 59, 92, 0.1);
        }

        .rka-sidebar-scope .sidebar.active a {
            font-size: 13px;
            padding: 8px 16px;
            flex-direction: row;
            justify-content: flex-start;
            gap: 8px;
        }

        .rka-sidebar-scope .sidebar a i {
            font-size: 16px;
            color: var(--primary);
            margin-bottom: 3px;
            transition: color 0.2s ease;
        }

        .rka-sidebar-scope .sidebar a:hover i {
            color: var(--accent);
        }

        .rka-sidebar-scope .sidebar .separator-bar {
            width: 100%;
            height: 2px;
            background: rgba(0, 43, 74, 0.3);
            margin: 10px 0;
        }

        .rka-sidebar-scope .sidebar .text-item {
            text-decoration: none;
            color: var(--primary);
            margin: 3px 0;
            font-size: 10px;
            width: 100%;
            text-align: center;
            padding: 4px 0;
            transition: color 0.2s ease, transform 0.2s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            cursor: pointer;
            font-weight: 500;
            letter-spacing: 0.2px;
        }

        .rka-sidebar-scope .sidebar.active .text-item {
            font-size: 13px;
            padding: 4px 16px;
            flex-direction: row;
            justify-content: flex-start;
            gap: 8px;
        }

        .rka-sidebar-scope .sidebar .text-item:hover {
            color: var(--accent);
            transform: scale(1.02);
        }

        .rka-sidebar-scope .page-preview {
            position: fixed;
            top: 80px;
            left: 80px;
            width: 50vw;
            max-width: 600px;
            height: 75vh;
            background: var(--white);
            border-radius: 10px;
            box-shadow: 0 8px 25px var(--shadow-lg);
            opacity: 0;
            visibility: hidden;
            z-index: 999;
            padding: 20px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
        }

        .rka-sidebar-scope .sidebar.active .page-preview {
            left: 480px;
        }

        .rka-sidebar-scope .page-preview.active {
            opacity: 1;
            visibility: visible;
        }

        .rka-sidebar-scope .page-preview img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 16px;
        }

        .rka-sidebar-scope .page-preview h3 {
            font-size: 1.3rem;
            color: var(--primary);
            margin-bottom: 10px;
        }

        .rka-sidebar-scope .page-preview p {
            font-size: 1.1rem;
            color: var(--gray);
            line-height: 1.6;
            flex-grow: 1;
        }

        .rka-content-scope {
            margin-top: 5.2%;
            transition: margin-left 0.2s ease-in-out;
        }

        .rka-content-scope.active {
            margin-left: 480px;
        }

        @media (max-width: 1024px) {
            .rka-content-scope {
                margin-left: 0;
            }
            .rka-content-scope.active {
                margin-left: 480px;
            }
            .rka-sidebar-scope .page-preview {
                display: none;
            }
        }

        @media (min-width: 1025px) {
            .rka-sidebar-scope .sidebar {
                transform: translateX(0) !important;
                width: 80px;
            }
            .rka-sidebar-scope .sidebar.active {
                width: 40%;
                max-width: 480px;
            }
            .rka-scope .menu-btn {
                display: none;
            }
        }

        @media (max-width: 1024px) {
            .rka-sidebar-scope .sidebar {
                transform: translateX(-100%);
                width: 40%;
                max-width: 480px;
                box-shadow: 6px 0 15px rgba(0, 59, 92, 0.15);
            }
            .rka-sidebar-scope .sidebar.active {
                transform: translateX(0);
            }
            .rka-scope .header {
                padding: 0 16px;
            }
            .rka-scope .search-bar {
                width: 200px;
            }
            .rka-scope .menu-btn {
                display: block;
            }
        }

        @media (max-width: 768px) {
            .rka-scope .search-bar {
                display: none;
            }
            .rka-scope .search-icon {
                display: block;
            }
            .rka-scope .header-content {
                gap: 8px;
            }
            .rka-scope .header-content h1 {
                font-size: 18px;
            }
            .rka-scope .header-content p {
                font-size: 12px;
            }
        }

        @media (max-width: 576px) {
            .rka-scope .header {
                padding: 0 12px;
            }
            .rka-scope .header-content h1 {
                font-size: 16px;
            }
            .rka-scope .header-content p {
                font-size: 10px;
            }
            .rka-scope .mobile-search input {
                font-size: 12px;
                padding: 6px;
            }
            .rka-sidebar-scope .sidebar a {
                margin: 6px 0;
                padding: 6px 0;
                font-size: 9px;
            }
            .rka-sidebar-scope .sidebar a i {
                font-size: 14px;
                margin-bottom: 2px;
            }
            .rka-sidebar-scope .sidebar .separator-bar {
                margin: 6px 0;
            }
            .rka-sidebar-scope .sidebar .text-item {
                font-size: 9px;
                padding: 2px 10px;
                margin: 1px 0;
            }
            .rka-content-scope {
                padding: 16px;
            }
        }
        /* Loading button states */
.btn-spinner {
    display: none;
}

.btn-all:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}

/* Animation classes */
.gsap-animate {
    opacity: 0;
    transform: translateY(40px);
}

.gsap-animate.animated {
    opacity: 1;
    transform: translateY(0);
}

/* Service items animation */
.service-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.service-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}
    </style>
</head>
<body>
    <div class="rka-scope">
        <div class="header">
            <div class="header-content">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center logo">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                            <text x="50%" y="50%" text-anchor="middle" dominant-baseline="central" font-family="Lora, serif" font-size="24" fill="#003b5c" font-weight="bold">R</text>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-white font-lora font-bold text-xl">Roshan Kumar & Associates</h1>
                        <p class="text-white/80 text-sm font-roboto">Chartered Accountants</p>
                    </div>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="search-bar">
                        <input type="text" placeholder="Search..." oninput="handleSearch(this.value)">
                        <i class="fas fa-search"></i>
                    </div>
                    <i class="fas fa-search search-icon" onclick="toggleSearch()"></i>
                    <button id="menu-btn" class="menu-btn hidden text-white hover:bg-white/10 p-2 rounded" aria-label="Toggle menu" onclick="toggleMenu()">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
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
        <div class="sidebar" id="sidebar">
            <div class="page-preview" id="page-preview">
                <h3 id="preview-title"></h3>
                <img id="preview-image" src="" alt="Page Preview">
                <p id="preview-description"></p>
            </div>
            <a href="{{ route('home') }}" data-tooltip="Home" data-image="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&w=300&h=120" data-description="Welcome to Chartered Insights, your trusted partner for expert financial solutions. We provide comprehensive audit, tax, and consulting services tailored to drive your business forward. Our team of experienced professionals is dedicated to delivering strategic insights and sustainable growth for clients across various industries.">
                <i class="fas fa-home"></i>
                <span>Home</span>
            </a>
            <a href="/services" data-tooltip="Services" data-image="https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&w=300&h=120" data-description="Explore our comprehensive audit, tax, and consulting services tailored to your needs. From financial reporting and compliance to strategic business consulting, we offer solutions that ensure regulatory adherence, optimize financial performance, and support long-term success.">
                <i class="fas fa-file-invoice-dollar"></i>
                <span>Services</span>
            </a>
            <a href="/industries" data-tooltip="Industries" data-image="https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&w=300&h=120" data-description="Specialized expertise across diverse sectors to meet your unique challenges. Our industry-specific knowledge in healthcare, technology, manufacturing, and more ensures customized solutions that address your business’s specific needs and goals.">
                <i class="fas fa-industry"></i>
                <span>Industries</span>
            </a>
            <a href="/events" data-tooltip="Events" data-image="https://images.unsplash.com/photo-1516321310769-65e85b8e6351?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&w=300&h=120" data-description="Join our upcoming events to connect and learn from industry experts. Our workshops, webinars, and networking sessions provide valuable insights and opportunities to collaborate with peers and professionals.">
                <i class="fas fa-calendar"></i>
                <span>Events</span>
            </a>
            <a href="/offices" data-tooltip="Offices" data-image="https://images.unsplash.com/photo-1516321310769-65e85b8e6351?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&w=300&h=120" data-description="Discover our office locations and connect with our team near you. With multiple offices strategically located, we provide accessible, personalized support to meet your financial and consulting needs.">
                <i class="fas fa-building"></i>
                <span>Offices</span>
            </a>
            <a href="/blogs" data-tooltip="Blogs" data-image="https://images.unsplash.com/photo-1516321310769-65e85b8e6351?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&w=300&h=120" data-description="Read our latest articles on finance, tax, and business trends. Our blog offers in-depth analyses, practical tips, and expert perspectives to help you navigate the complexities of the financial world.">
                <i class="fas fa-blog"></i>
                <span>Blogs</span>
            </a>
            <a href="/insights" data-tooltip="Insights" data-image="https://images.unsplash.com/photo-1516321310769-65e85b8e6351?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&w=300&h=120" data-description="Stay informed with our latest industry insights and thought leadership. Our expert analyses cover emerging trends, regulatory updates, and strategic opportunities to keep your business ahead in a dynamic market.">
                <i class="fas fa-lightbulb"></i>
                <span>Insights</span>
            </a>
            <div class="separator-bar"></div>
           
            <a href="/about" class="text-item" data-tooltip="About" data-image="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&w=300&h=120" data-description="Learn about our mission, values, and commitment to excellence. At Chartered Insights, we strive to deliver unparalleled financial and consulting services, fostering trust and driving success for our clients.">
                <span>About</span>
            </a>
            <a href="/careers" class="text-item" data-tooltip="Careers" data-image="https://images.unsplash.com/photo-1516321310769-65e85b8e6351?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&w=300&h=120" data-description="Explore career opportunities to grow with Chartered Insights. Join our dynamic team of professionals dedicated to excellence in audit, tax, and advisory services, and advance your career with meaningful opportunities.">
                <span>Careers</span>
            </a>
            <a href="/contact" class="text-item" data-tooltip="Contact Us" data-image="https://images.unsplash.com/photo-1516321310769-65e85b8e6351?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&w=300&h=120" data-description="Get in touch with our team for personalized support and inquiries. Whether you need assistance with audits, tax planning, or strategic consulting, our experts are here to help you succeed.">
                <span>Contact Us</span>
            </a>
        </div>
    </div>

    <div class="rka-content-scope" id="main-content">
        @yield('content')
        @yield('scripts')
        @yield('styles')
        @stack('styles')
        @include('new.layouts.footer')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSearch() {
            const mobileSearch = document.getElementById('mobile-search');
            mobileSearch.style.display = mobileSearch.style.display === 'block' ? 'none' : 'block';
            gsap.fromTo(mobileSearch, { y: -10, opacity: 0 }, { y: 0, opacity: 1, duration: 0.2, ease: 'power3.out' });
        }

        function handleSearch(query) {
            console.log('Search query:', query);
        }

        function toggleMenu() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');
            const previewPanel = document.getElementById('page-preview');
            sidebar.classList.toggle('active');
            if (mainContent) {
                mainContent.classList.toggle('active', sidebar.classList.contains('active'));
            }
            gsap.to(sidebar, { x: sidebar.classList.contains('active') ? 0 : '-100%', duration: 0.2, ease: 'power3.out' });
            gsap.to(previewPanel, { 
                left: sidebar.classList.contains('active') ? 480 : 80, 
                duration: 0.2, 
                ease: 'power3.out' 
            });
            const event = new CustomEvent('sidebarToggle', {
                detail: { isActive: sidebar.classList.contains('active') }
            });
            window.dispatchEvent(event);
        }

        function adjustPreviewPanel() {
            const sidebarLinks = document.querySelectorAll('.rka-sidebar-scope .sidebar a, .rka-sidebar-scope .sidebar .text-item');
            const previewPanel = document.getElementById('page-preview');
            const previewTitle = document.getElementById('preview-title');
            const previewImage = document.getElementById('preview-image');
            const previewDescription = document.getElementById('preview-description');
            const currentPath = window.location.pathname;

            sidebarLinks.forEach(link => {
                link.addEventListener('mouseenter', () => {
                    if (link.getAttribute('href') === currentPath) {
                        return;
                    }
                    previewTitle.textContent = link.getAttribute('data-tooltip');
                    previewImage.src = link.getAttribute('data-image');
                    previewImage.alt = `${link.getAttribute('data-tooltip')} Preview`;
                    previewDescription.textContent = link.getAttribute('data-description');
                    gsap.fromTo(previewPanel,
                        { opacity: 0, x: 20 },
                        { 
                            opacity: 1, 
                            x: 0, 
                            duration: 0.6,
                            ease: 'power3.out',
                            visibility: 'visible',
                            onStart: () => previewPanel.classList.add('active')
                        }
                    );
                });

                link.addEventListener('mouseleave', () => {
                    gsap.to(previewPanel, {
                        opacity: 0,
                        x: 20,
                        duration: 0.6,
                        ease: 'power3.in',
                        visibility: 'hidden',
                        onComplete: () => previewPanel.classList.remove('active')
                    });
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
                if (window.innerWidth > 1024) {
                    sidebar.classList.remove('active');
                    gsap.set(sidebar, { x: 0 });
                    gsap.set(previewPanel, { left: 80 });
                    if (mainContent) {
                        mainContent.classList.remove('active');
                        mainContent.style.marginLeft = '80px';
                    }
                } else {
                    sidebar.classList.remove('active');
                    gsap.set(sidebar, { x: '-100%' });
                    gsap.set(previewPanel, { left: 80 });
                    if (mainContent) {
                        mainContent.classList.remove('active');
                        mainContent.style.marginLeft = '0';
                    }
                }
                window.dispatchEvent(new CustomEvent('sidebarToggle', {
                    detail: { isActive: sidebar.classList.contains('active') }
                }));
            }, 100);
        }

        window.addEventListener('resize', resizeHandler);
        document.addEventListener('DOMContentLoaded', () => {
            resizeHandler();
            adjustPreviewPanel();
            const logo = document.querySelector('.rka-scope .logo');
            gsap.from(logo, { scale: 0.8, opacity: 0, duration: 0.5, ease: 'power3.out' });
        });
    </script>
</body>
</html>