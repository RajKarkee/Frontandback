@extends('layouts.app')

@section('title', 'Our Services - Chartered Insights')
@section('meta_description', 'Comprehensive chartered accountancy services including audit & assurance, tax advisory, risk management, business consulting, and financial reporting.')

@section('content')
<!-- Hero Section -->
<x-jumbotron page-slug="services" />

@includeIf('front.cache.services.index')

@includeIF('front.cache.services.process')

<!-- Industry Expertise -->
<section class="section bg-audit-grey">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Industry Expertise</h2>
            <p class="section-subtitle">
                Specialized knowledge across key sectors, bringing industry-specific insights to every engagement.
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
            <div class="text-center p-4 bg-crisp-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 fade-in">
                <svg class="w-8 h-8 text-fresh-teal mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
                <h5 class="font-semibold text-deep-chartered-blue text-sm">Banking & Finance</h5>
            </div>

            <div class="text-center p-4 bg-crisp-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 fade-in fade-in-delay-1">
                <svg class="w-8 h-8 text-fresh-teal mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <h5 class="font-semibold text-deep-chartered-blue text-sm">Manufacturing</h5>
            </div>

            <div class="text-center p-4 bg-crisp-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 fade-in fade-in-delay-2">
                <svg class="w-8 h-8 text-fresh-teal mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
                <h5 class="font-semibold text-deep-chartered-blue text-sm">Healthcare</h5>
            </div>

            <div class="text-center p-4 bg-crisp-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 fade-in">
                <svg class="w-8 h-8 text-fresh-teal mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                <h5 class="font-semibold text-deep-chartered-blue text-sm">Education</h5>
            </div>

            <div class="text-center p-4 bg-crisp-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 fade-in fade-in-delay-1">
                <svg class="w-8 h-8 text-fresh-teal mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
                <h5 class="font-semibold text-deep-chartered-blue text-sm">Technology</h5>
            </div>

            <div class="text-center p-4 bg-crisp-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 fade-in fade-in-delay-2">
                <svg class="w-8 h-8 text-fresh-teal mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 00-2 2H10a2 2 0 00-2-2V4m8 0H8m0 0v2m0 0H6a2 2 0 00-2 2v6a2 2 0 002 2h2m0 0v2a2 2 0 002 2h4a2 2 0 002-2v-2m0 0h2a2 2 0 002-2V10a2 2 0 00-2-2h-2m0 0V6a2 2 0 00-2-2H10a2 2 0 00-2 2v2H6a2 2 0 00-2 2v6a2 2 0 002 2h2" />
                </svg>
                <h5 class="font-semibold text-deep-chartered-blue text-sm">Government</h5>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="section bg-deep-chartered-blue text-crisp-white">
    <div class="container-custom">
        <div class="text-center fade-in">
            <h2 class="text-3xl lg:text-4xl font-montserrat font-bold mb-6">
                Ready to Get Started?
            </h2>
            <p class="text-xl mb-8 max-w-3xl mx-auto">
                Let's discuss how our comprehensive chartered accountancy services can support your business objectives and drive sustainable growth.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact') }}" class="btn-primary bg-fresh-teal hover:bg-opacity-90">
                    Request Consultation
                    <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
                <a href="{{ route('about') }}" class="btn-secondary border-crisp-white text-crisp-white hover:bg-crisp-white hover:text-deep-chartered-blue">
                    Learn About Us
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
