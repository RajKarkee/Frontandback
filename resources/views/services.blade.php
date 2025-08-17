@extends('layouts.app')

@section('title', 'Our Services - Chartered Insights')
@section('meta_description', 'Comprehensive chartered accountancy services including audit & assurance, tax advisory, risk management, business consulting, and financial reporting.')

@section('content')
<!-- Hero Section -->
<x-jumbotron page-slug="services" />

@includeIf('front.cache.services.index')

@includeIf('front.cache.services.process')

<!-- Industry Expertise -->
@includeIf('front.cache.services.industries')

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
