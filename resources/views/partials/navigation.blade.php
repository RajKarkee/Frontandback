@php
    $navItems = [
        ['name' => 'Home', 'route' => 'home'],
        ['name' => 'Services', 'route' => 'services'],
        ['name' => 'Industries', 'route' => 'industries'],
        ['name' => 'Insights', 'route' => 'insights'],
        ['name' => 'Events', 'route' => 'events'],
        ['name' => 'Offices', 'route' => 'offices'],
        ['name' => 'Careers', 'route' => 'careers'],
        ['name' => 'Blogs', 'route' => 'blogs'],
        ['name' => 'About', 'route' => 'about'],
        ['name' => 'Contact Us', 'route' => 'contact'],
    ];
@endphp

<nav class="shadow-medium sticky top-0 z-50 bg-deep-chartered-blue text-crisp-white">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center space-x-3">
                <div class="w-12 h-12 bg-fresh-teal rounded-lg flex items-center justify-center">
                    {{-- Centered white "R" SVG --}}
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" class="w-8 h-8"
                        xmlns="http://www.w3.org/2000/svg">
                        <text x="50%" y="50%" text-anchor="middle" dominant-baseline="central"
                            font-family="Montserrat, Arial, sans-serif" font-size="24" fill="white"
                            font-weight="bold">R</text>
                    </svg>
                </div>
                <div class="hidden md:block">
                    <h1 class="text-crisp-white font-montserrat font-bold text-xl">
                        Roshan Kumar &amp; Associates
                    </h1>
                    <p class="text-crisp-white/80 text-sm">Chartered Accountants</p>
                </div>
            </a>

            {{-- Desktop Navigation --}}
            <div class="hidden lg:flex items-center space-x-2">
                @foreach ($navItems as $item)
                    <a href="{{ route($item['route']) }}"
                        class="relative px-4 py-2 rounded-md text-sm font-lato transition-all duration-300 nav-link{{ Request::routeIs($item['route']) ? ' active bg-fresh-teal text-crisp-white' : '' }}">
                        {{ $item['name'] }}
                        @if (Request::routeIs($item['route']))
                            <span
                                class="absolute left-1/2 -translate-x-1/2 bottom-0 w-6 h-1 bg-fresh-teal rounded-t"></span>
                        @endif
                    </a>
                @endforeach
            </div>

            {{-- Mobile Menu Button --}}
            <button id="mobile-menu-btn" class="lg:hidden text-crisp-white hover:bg-crisp-white/10 p-2 rounded"
                aria-label="Open menu" type="button" @click="document.getElementById('mobile-menu').classList.toggle('hidden')">
                {{-- Simple hamburger icon --}}
                <svg id="menu-icon" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        {{-- Mobile Navigation --}}
        <div id="mobile-menu" class="lg:hidden hidden pb-4 animate-slide-up">
            <div class="space-y-2">
                @foreach ($navItems as $item)
                    <a href="{{ route($item['route']) }}"
                        class="relative block px-4 py-3 rounded-md text-sm font-sans transition-all duration-300 mobile-nav-link{{ Request::routeIs($item['route']) ? ' active' : '' }}"
                        @click="document.getElementById('mobile-menu').classList.add('hidden')">
                        {{ $item['name'] }}
                        @if (Request::routeIs($item['route']))
                            {{-- <span class="absolute left-4 bottom-1 w-2 h-2 bg-fresh-teal rounded-full"></span> --}}
                        @endif
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</nav>

