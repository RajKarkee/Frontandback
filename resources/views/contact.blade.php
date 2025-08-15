@extends('layouts.app')

@section('title', 'Contact Us - Chartered Insights')
@section('meta_description', 'Get in touch with Chartered Insights for professional chartered accountancy services. Contact our expert team for consultation and support.')

@section('content')
<!-- Hero Section -->

<x-jumbotron page-slug="contact" />

<!-- Contact Form & Info -->
<section class="section">
    <div class="container-custom">
        @if(session('success'))
            <div class="bg-fresh-teal text-crisp-white p-4 rounded-lg mb-8 fade-in">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    {{ session('success') }}
                </div>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div class="fade-in">
                <h2 class="text-3xl font-montserrat font-bold text-deep-chartered-blue mb-6">Get in Touch</h2>
                <p class="text-lg text-report-black mb-8">
                    Ready to discuss your business needs? Fill out the form below and one of our experts will get back to you within 24 hours.
                </p>

                <form id="contact-form" method="POST" action="{{ route('contact.submit') }}" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="first_name" class="form-label">First Name *</label>
                            <input type="text" id="first_name" name="first_name" required class="form-input" value="{{ old('first_name') }}">
                            <div class="form-error"></div>
                        </div>

                        <div>
                            <label for="last_name" class="form-label">Last Name *</label>
                            <input type="text" id="last_name" name="last_name" required class="form-input" value="{{ old('last_name') }}">
                            <div class="form-error"></div>
                        </div>
                    </div>

                    <div>
                        <label for="email" class="form-label">Email Address *</label>
                        <input type="email" id="email" name="email" required class="form-input" value="{{ old('email') }}">
                        <div class="form-error"></div>
                    </div>

                    <div>
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="tel" id="phone" name="phone" class="form-input" value="{{ old('phone') }}">
                        <div class="form-error"></div>
                    </div>

                    <div>
                        <label for="company" class="form-label">Company/Organization</label>
                        <input type="text" id="company" name="company" class="form-input" value="{{ old('company') }}">
                        <div class="form-error"></div>
                    </div>

                    <div>
                        <label for="service_interest" class="form-label">Service of Interest</label>
                        <select id="service_interest" name="service_interest" class="form-input">
                            <option value="">Please select a service</option>
                            <option value="audit_assurance" {{ old('service_interest') == 'audit_assurance' ? 'selected' : '' }}>Audit & Assurance</option>
                            <option value="tax_advisory" {{ old('service_interest') == 'tax_advisory' ? 'selected' : '' }}>Tax Advisory</option>
                            <option value="risk_advisory" {{ old('service_interest') == 'risk_advisory' ? 'selected' : '' }}>Risk Advisory</option>
                            <option value="business_consulting" {{ old('service_interest') == 'business_consulting' ? 'selected' : '' }}>Business Consulting</option>
                            <option value="financial_reporting" {{ old('service_interest') == 'financial_reporting' ? 'selected' : '' }}>Financial Reporting</option>
                            <option value="corporate_advisory" {{ old('service_interest') == 'corporate_advisory' ? 'selected' : '' }}>Corporate Advisory</option>
                            <option value="other" {{ old('service_interest') == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                        <div class="form-error"></div>
                    </div>

                    <div>
                        <label for="message" class="form-label">Message *</label>
                        <textarea id="message" name="message" rows="6" required class="form-input" placeholder="Please describe your requirements or questions...">{{ old('message') }}</textarea>
                        <div class="form-error"></div>
                    </div>

                    <div class="flex items-start">
                        <input type="checkbox" id="privacy_consent" name="privacy_consent" required class="mt-1 mr-3">
                        <label for="privacy_consent" class="text-sm text-report-black">
                            I agree to the processing of my personal data for the purpose of responding to my inquiry and acknowledge that I have read the <a href="#" class="text-fresh-teal hover:text-deep-chartered-blue">Privacy Policy</a>. *
                        </label>
                    </div>

                    <button type="submit" class="btn-primary w-full md:w-auto">
                        Send Message
                        <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                        </svg>
                    </button>
                </form>
            </div>

            <!-- Contact Information -->
            <div class="fade-in fade-in-delay-1">
                <h2 class="text-3xl font-montserrat font-bold text-deep-chartered-blue mb-6">Contact Information</h2>

                @if($contactInfo)
                    <!-- Main Office -->
                    <div class="bg-audit-grey rounded-lg p-6 mb-6">
                        <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-4">{{ $contactInfo->title }}</h3>
                        <div class="space-y-3">
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-fresh-teal mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <div>
                                    <p class="font-semibold text-report-black">Address:</p>
                                    <p class="text-report-black">{!! nl2br(e($contactInfo->address)) !!}</p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-3">
                                <svg class="w-5 h-5 text-fresh-teal flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <div>
                                    <p class="font-semibold text-report-black">Phone:</p>
                                    <p class="text-report-black">{{ $contactInfo->phone }}</p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-3">
                                <svg class="w-5 h-5 text-fresh-teal flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <div>
                                    <p class="font-semibold text-report-black">Email:</p>
                                    <p class="text-report-black">{{ $contactInfo->email }}</p>
                                </div>
                            </div>

                            @if($contactInfo->website)
                                <div class="flex items-center space-x-3">
                                    <svg class="w-5 h-5 text-fresh-teal flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9v-9m0-9v9m0 9c-5 0-9-4-9-9s4-9 9-9" />
                                    </svg>
                                    <div>
                                        <p class="font-semibold text-report-black">Website:</p>
                                        <a href="{{ $contactInfo->website }}" target="_blank" class="text-fresh-teal hover:text-deep-chartered-blue">{{ $contactInfo->website }}</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Business Hours -->
                    @if($contactInfo->getFormattedBusinessHours())
                        <div class="bg-audit-grey rounded-lg p-6 mb-6">
                            <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-4">Business Hours</h3>
                            <div class="space-y-2">
                                @foreach($contactInfo->getFormattedBusinessHours() as $day => $hours)
                                    <div class="flex justify-between">
                                        <span class="font-semibold text-report-black">{{ ucfirst($day) }}:</span>
                                        <span class="text-report-black {{ strtolower($hours) === 'closed' ? 'text-gray-500' : '' }}">{{ $hours }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Social Media -->
                    @if($contactInfo->getSocialMediaLinks()->isNotEmpty())
                        <div class="bg-audit-grey rounded-lg p-6">
                            <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-4">Follow Us</h3>
                            <div class="flex space-x-4">
                                @foreach($contactInfo->getSocialMediaLinks() as $platform => $url)
                                    <a href="{{ $url }}" target="_blank" class="w-10 h-10 bg-fresh-teal rounded-full flex items-center justify-center text-crisp-white hover:bg-deep-chartered-blue transition-colors duration-200">
                                        @switch($platform)
                                            @case('linkedin')
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                                </svg>
                                                @break
                                            @case('twitter')
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                                </svg>
                                                @break
                                            @case('facebook')
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                                </svg>
                                                @break
                                            @case('instagram')
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                                </svg>
                                                @break
                                            @case('youtube')
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                                                </svg>
                                                @break
                                            @default
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                                                </svg>
                                        @endswitch
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @else
                    <!-- Default Contact Information (fallback) -->
                    <div class="bg-audit-grey rounded-lg p-6 mb-6">
                        <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-4">Main Office - Biratnagar</h3>
                        <div class="space-y-3">
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-fresh-teal mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <div>
                                    <p class="font-semibold text-report-black">Address:</p>
                                    <p class="text-report-black">Main Road, Biratnagar-15<br>Morang, Nepal</p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-3">
                                <svg class="w-5 h-5 text-fresh-teal flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <div>
                                    <p class="font-semibold text-report-black">Phone:</p>
                                    <p class="text-report-black">+977-21-123456</p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-3">
                                <svg class="w-5 h-5 text-fresh-teal flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <div>
                                    <p class="font-semibold text-report-black">Email:</p>
                                    <p class="text-report-black">info@charteredinsights.com</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Default Business Hours -->
                    <div class="bg-audit-grey rounded-lg p-6 mb-6">
                        <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-4">Business Hours</h3>
                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span class="font-semibold text-report-black">Monday - Friday:</span>
                                <span class="text-report-black">9:00 AM - 6:00 PM</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="font-semibold text-report-black">Saturday:</span>
                                <span class="text-report-black">9:00 AM - 2:00 PM</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="font-semibold text-report-black">Sunday:</span>
                                <span class="text-report-black">Closed</span>
                            </div>
                        </div>
                    </div>

                    <!-- Default Social Media -->
                    <div class="bg-audit-grey rounded-lg p-6">
                        <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-4">Follow Us</h3>
                        <div class="flex space-x-4">
                            <a href="#" class="w-10 h-10 bg-fresh-teal rounded-full flex items-center justify-center text-crisp-white hover:bg-deep-chartered-blue transition-colors duration-200">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                </svg>
                            </a>
                            <a href="#" class="w-10 h-10 bg-fresh-teal rounded-full flex items-center justify-center text-crisp-white hover:bg-deep-chartered-blue transition-colors duration-200">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                </svg>
                            </a>
                            <a href="#" class="w-10 h-10 bg-fresh-teal rounded-full flex items-center justify-center text-crisp-white hover:bg-deep-chartered-blue transition-colors duration-200">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="section bg-audit-grey">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Our Location</h2>
            <p class="section-subtitle">
                Visit our main office in Biratnagar or reach out to us for appointments at your convenience.
            </p>
        </div>

        <div class="fade-in">
            <div class="bg-crisp-white rounded-lg shadow-lg overflow-hidden">
                @if($contactInfo && $contactInfo->map_embed_url)
                    <!-- Dynamic embedded map -->
                    <iframe src="{{ $contactInfo->map_embed_url }}"
                            width="100%"
                            height="400"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                @else
                    <!-- Default placeholder map -->
                    <div class="h-96 bg-gray-200 flex items-center justify-center">
                        <div class="text-center">
                            <svg class="w-16 h-16 text-fresh-teal mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-2">Interactive Map</h3>
                            <p class="text-report-black">Chartered Insights Main Office<br>{{ $contactInfo ? $contactInfo->address : 'Biratnagar, Nepal' }}</p>
                            <a href="{{ $contactInfo && $contactInfo->google_maps_link ? $contactInfo->google_maps_link : 'https://maps.google.com' }}" target="_blank" class="btn-outline mt-4 inline-flex">
                                View on Google Maps
                                <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Alternative Contact Methods -->
<section class="section">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Other Ways to Reach Us</h2>
            <p class="section-subtitle">
                Choose the communication method that works best for you.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center fade-in">
                <div class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                </div>
                <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-2">Phone Consultation</h3>
                <p class="text-report-black mb-4">Schedule a phone consultation to discuss your needs and get initial guidance.</p>
                <a href="tel:{{ $contactInfo ? $contactInfo->phone : '+977-21-123456' }}" class="btn-outline">Call Now</a>
            </div>

            <div class="text-center fade-in fade-in-delay-1">
                <div class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                </div>
                <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-2">Live Chat</h3>
                <p class="text-report-black mb-4">Get instant answers to your questions through our live chat support during business hours.</p>
                <button class="btn-outline" onclick="alert('Live chat will be available soon!')">Start Chat</button>
            </div>

            <div class="text-center fade-in fade-in-delay-2">
                <div class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-2">Schedule Meeting</h3>
                <p class="text-report-black mb-4">Book a face-to-face meeting at our office or arrange a virtual consultation.</p>
                <a href="mailto:{{ $contactInfo ? $contactInfo->email : 'info@charteredinsights.com' }}?subject=Meeting Request" class="btn-outline">Schedule Now</a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contact-form');

    if (form) {
        form.addEventListener('submit', function(e) {
            let isValid = true;

            // Clear previous errors
            document.querySelectorAll('.form-error').forEach(error => {
                error.textContent = '';
            });

            document.querySelectorAll('.form-input').forEach(input => {
                input.classList.remove('error');
            });

            // Validate required fields
            const requiredFields = ['first_name', 'last_name', 'email', 'message'];

            requiredFields.forEach(fieldId => {
                const field = document.getElementById(fieldId);
                if (!field.value.trim()) {
                    showError(fieldId, 'This field is required');
                    isValid = false;
                }
            });

            // Email validation
            const email = document.getElementById('email');
            if (email.value && !isValidEmail(email.value)) {
                showError('email', 'Please enter a valid email address');
                isValid = false;
            }

            // Privacy consent validation
            const privacy = document.getElementById('privacy_consent');
            if (!privacy.checked) {
                alert('Please accept the privacy policy to continue.');
                isValid = false;
            }

            if (!isValid) {
                e.preventDefault();
            }
        });
    }

    function showError(fieldId, message) {
        const field = document.getElementById(fieldId);
        const errorElement = field.parentNode.querySelector('.form-error');
        if (errorElement) {
            errorElement.textContent = message;
        }
        field.classList.add('error');
    }

    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
});
</script>
@endpush
