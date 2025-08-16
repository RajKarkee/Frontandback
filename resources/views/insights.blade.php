@extends('layouts.app')
@use('Illuminate\Support\Facades\Storage')

@section('title', 'Insights & Articles - Chartered Insights')
@section('meta_description',
    'Stay informed with latest insights, industry analysis, and expert perspectives from
    Chartered Insights on accounting, taxation, and business trends.')

    @push('styles')
        <style>
            /* Custom CSS to match the Tailwind design */
            :root {
                --deep-chartered-blue: #1e3a8a;
                --fresh-teal: #14b8a6;
                --crisp-white: #ffffff;
                --report-black: #1f2937;
            }

            .blog-card {
                position: relative;
                height: 320px;
                border-radius: 0.5rem;
                background-color: white;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
                transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
                cursor: pointer;
                overflow: hidden;
            }

            .blog-card:hover {
                box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
                transform: scale(1.02);
            }

            /* Background Image */
            .blog-bg-image {
                position: absolute;
                inset: 0;
                width: 100%;
                height: 100%;
            }

            .blog-bg-image img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: all 0.7s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .blog-card:hover .blog-bg-image img {
                transform: scale(1.1);
                filter: brightness(0.5);
            }

            /* Dark overlay on hover */
            .dark-overlay {
                position: absolute;
                inset: 0;
                background-color: rgba(0, 0, 0, 0);
                transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .blog-card:hover .dark-overlay {
                background-color: rgba(0, 0, 0, 0.6);
            }

            /* Bottom overlay content */
            .bottom-content {
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;
                padding: 1.5rem;
                background: linear-gradient(to top, rgba(0, 0, 0, 0.8) 0%, transparent 100%);
                transition: opacity 0.5s ease;
            }

            .blog-card:hover .bottom-content {
                opacity: 0;
            }

            /* Center hover content */
            .center-content {
                position: absolute;
                inset: 0;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                padding: 1.5rem;
                text-align: center;
                opacity: 0;
                transform: translateY(1rem);
                transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .blog-card:hover .center-content {
                opacity: 1;
                transform: translateY(0);
            }

            /* Badge */
            .featured-badge {
                display: inline-block;
                padding: 0.25rem 0.75rem;
                background-color: var(--fresh-teal);
                color: var(--crisp-white);
                font-size: 0.875rem;
                border-radius: 9999px;
                margin-bottom: 0.75rem;
                width: fit-content;
            }

            .category-text {
                font-size: 0.75rem;
                font-weight: 600;
                color: rgba(255, 255, 255, 0.8);
                text-transform: uppercase;
                letter-spacing: 0.05em;
                margin-bottom: 0.25rem;
            }

            .category-text-hover {
                font-size: 0.875rem;
                font-weight: 600;
                color: rgba(255, 255, 255, 0.9);
                text-transform: uppercase;
                letter-spacing: 0.05em;
                margin-bottom: 0.75rem;
            }

            /* Typography */
            .blog-title {
                font-size: 1.25rem;
                font-weight: 600;
                color: white;
                margin-top: 0.25rem;
                line-height: 1.2;
            }

            .blog-title-hover {
                font-size: 1.5rem;
                font-weight: 700;
                color: white;
                margin-bottom: 1rem;
                line-height: 1.2;
            }

            .blog-title-hover a {
                text-decoration: none;
                color: inherit;
                transition: color 0.3s ease;
            }

            .blog-title-hover a:hover {
                color: var(--fresh-teal);
            }

            .blog-description {
                font-size: 1rem;
                color: rgba(255, 255, 255, 0.9);
                line-height: 1.6;
            }

            .category-card:hover {
                transform: translateY(-2px);
            }
        </style>
    @endpush

@section('content')
    <!-- Dynamic Hero Section -->
    <x-jumbotron page-slug="insights" />

    <!-- Featured Articles -->
    @includeIf('front.cache.insights.featured')

    <!-- Categories -->
    @includeIf('front.cache.insights.categories')

    <!-- Recent Articles -->
    @includeIf('front.cache.insights.recent')
@endsection
