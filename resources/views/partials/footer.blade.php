<footer class="bg-deep-chartered-blue text-crisp-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Company Info -->
            <div class="col-span-1 lg:col-span-2">
                <a href="{{ route('home') }}" class="flex mb-2 items-center space-x-3">
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
                            {{ $footerSetting->company_name ?? 'Roshan Kumar &amp; Associates' }}
                        </h1>
                        <p class="text-crisp-white/80 text-sm">{{ $footerSetting->tagline ?? 'Chartered Accountants' }}
                        </p>
                    </div>
                </a>
                <p class="text-audit-grey mb-4 max-w-md">
                    Leading Chartered Accountancy firm providing comprehensive audit, tax, risk advisory, and business
                    consulting services to drive sustainable growth for businesses across Nepal.
                </p>
                <div class="flex space-x-4">
                    @if ($footerSetting && $footerSetting->social_links && is_array($footerSetting->social_links))
                        @if (isset($footerSetting->social_links['facebook']) && $footerSetting->social_links['facebook'])
                            <a href="{{ $footerSetting->social_links['facebook'] }}" target="_blank"
                                class="text-audit-grey hover:text-fresh-teal transition-colors duration-200"
                                title="Facebook">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                </svg>
                            </a>
                        @endif
                        @if (isset($footerSetting->social_links['twitter']) && $footerSetting->social_links['twitter'])
                            <a href="{{ $footerSetting->social_links['twitter'] }}" target="_blank"
                                class="text-audit-grey hover:text-fresh-teal transition-colors duration-200"
                                title="Twitter">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                                </svg>
                            </a>
                        @endif
                        @if (isset($footerSetting->social_links['linkedin']) && $footerSetting->social_links['linkedin'])
                            <a href="{{ $footerSetting->social_links['linkedin'] }}" target="_blank"
                                class="text-audit-grey hover:text-fresh-teal transition-colors duration-200"
                                title="LinkedIn">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                </svg>
                            </a>
                        @endif
                        @if (isset($footerSetting->social_links['instagram']) && $footerSetting->social_links['instagram'])
                            <a href="{{ $footerSetting->social_links['instagram'] }}" target="_blank"
                                class="text-audit-grey hover:text-fresh-teal transition-colors duration-200"
                                title="Instagram">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                </svg>
                            </a>
                        @endif
                    @else
                        <!-- Fallback social media links -->
                        <a href="#" class="text-audit-grey hover:text-fresh-teal transition-colors duration-200">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                            </svg>
                        </a>
                        <a href="#" class="text-audit-grey hover:text-fresh-teal transition-colors duration-200">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z" />
                            </svg>
                        </a>
                        <a href="#" class="text-audit-grey hover:text-fresh-teal transition-colors duration-200">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                            </svg>
                        </a>
                    @endif
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-lg font-montserrat font-semibold mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    @if ($footerSetting && $footerSetting->quick_links && is_array($footerSetting->quick_links))
                        @foreach ($footerSetting->quick_links as $link)
                            <li>
                                <a href="{{ $link['url'] ?? '#' }}"
                                    class="text-audit-grey hover:text-fresh-teal transition-colors duration-200">
                                    {{ $link['label'] ?? 'Link' }}
                                </a>
                            </li>
                        @endforeach
                    @else
                        <!-- Fallback quick links -->
                        <li><a href="{{ route('services') }}"
                                class="text-audit-grey hover:text-fresh-teal transition-colors duration-200">Our
                                Services</a></li>
                        <li><a href="{{ route('industries') }}"
                                class="text-audit-grey hover:text-fresh-teal transition-colors duration-200">Industries</a>
                        </li>
                        <li><a href="{{ route('insights') }}"
                                class="text-audit-grey hover:text-fresh-teal transition-colors duration-200">Insights</a>
                        </li>
                        <li><a href="{{ route('careers') }}"
                                class="text-audit-grey hover:text-fresh-teal transition-colors duration-200">Careers</a>
                        </li>
                        <li><a href="{{ route('about') }}"
                                class="text-audit-grey hover:text-fresh-teal transition-colors duration-200">About
                                Us</a></li>
                    @endif
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h3 class="text-lg font-montserrat font-semibold mb-4">Contact Info</h3>
                <div class="space-y-2 text-audit-grey">
                    <p>{{ $footerSetting->address ?? 'Main Office: Biratnagar, Nepal' }}</p>
                    <p>Phone: {{ $footerSetting->phone ?? '+977-21-123456' }}</p>
                    <p>Email: {{ $footerSetting->email ?? 'info@charteredinsights.com' }}</p>
                    <a href="{{ route('offices') }}"
                        class="text-fresh-teal hover:text-crisp-white transition-colors duration-200">View All
                        Offices</a>
                </div>
            </div>
        </div>

        <div class="border-t border-opacity-25 border-crisp-white mt-8 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-audit-grey text-sm">
                    {{ $footerSetting->copyright_text ?? '© ' . date('Y') . ' ' . ($footerSetting->company_name ?? 'Chartered Insights') . '. All rights reserved.' }}
                </p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#"
                        class="text-audit-grey hover:text-fresh-teal text-sm transition-colors duration-200">Privacy
                        Policy</a>
                    <a href="#"
                        class="text-audit-grey hover:text-fresh-teal text-sm transition-colors duration-200">Terms of
                        Service</a>
                    <a href="#"
                        class="text-audit-grey hover:text-fresh-teal text-sm transition-colors duration-200">Cookie
                        Policy</a>
                </div>
            </div>
        </div>
    </div>
</footer>
