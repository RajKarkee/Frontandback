@extends('layouts.app')

@section('title', 'Careers - Join Our Team | Chartered Insights')
@section('meta_description', 'Join the Chartered Insights team and build your career in accounting, audit, tax advisory, and business consulting. Explore exciting opportunities and competitive benefits.')

@section('content')
<!-- Hero Section -->
<x-jumbotron page-slug="careers" />

<!-- Why Work With Us -->
@includeIf('front.cache.careers.benefits')

<!-- Current Openings -->
@includeIf('front.cache.careers.job_openings')

<!-- Employee Testimonials -->
@includeIf('front.cache.careers.testimonials')

<!-- Contact HR -->
<section class="section">
    <div class="container-custom">
        <div class="bg-audit-grey rounded-2xl p-8 lg:p-12 text-center fade-in">
            <h2 class="text-3xl lg:text-4xl font-montserrat font-bold text-deep-chartered-blue mb-6">
                Questions About Career Opportunities?
            </h2>
            <p class="text-xl text-report-black mb-8 max-w-3xl mx-auto">
                Our HR team is here to help answer your questions about career opportunities, application process, and what it's like to work at Chartered Insights.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8 max-w-2xl mx-auto">
                <div class="text-center">
                    <h3 class="font-montserrat font-semibold text-deep-chartered-blue mb-2">HR Department</h3>
                    <p class="text-report-black">careers@charteredinsights.com</p>
                    <p class="text-report-black">+977-1-4234567 (Ext. 101)</p>
                </div>
                <div class="text-center">
                    <h3 class="font-montserrat font-semibold text-deep-chartered-blue mb-2">Office Hours</h3>
                    <p class="text-report-black">Sunday - Friday: 9:00 AM - 6:00 PM</p>
                    <p class="text-report-black">Saturday: 10:00 AM - 4:00 PM</p>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact') }}" class="btn-primary">
                    Contact HR Team
                    <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
                <button class="btn-outline" onclick="alert('LinkedIn page will open!')">
                    Follow Us on LinkedIn
                </button>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.benefit-card:hover {
    transform: translateY(-2px);
    transition: all 0.3s ease;
}

.job-filter-btn {
    padding: 0.5rem 1rem;
    border: 2px solid #015A77;
    background: transparent;
    color: #015A77;
    border-radius: 0.5rem;
    font-weight: 600;
    transition: all 0.3s ease;
}

.job-filter-btn:hover,
.job-filter-btn.active {
    background: #015A77;
    color: white;
}

.job-card {
    border-radius: 1rem;
    padding: 2rem;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.job-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.job-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 1rem;
}

.job-title {
    font-size: 1.25rem;
    font-weight: bold;
    color: #015A77;
    margin-bottom: 0.5rem;
    font-family: 'Montserrat', sans-serif;
}

.job-meta {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
}

.job-meta span {
    background: #f1f5f9;
    color: #64748b;
    padding: 0.25rem 0.75rem;
    border-radius: 1rem;
    font-size: 0.8rem;
    font-weight: 500;
}

.job-featured {
    background: #00BFB2 !important;
    color: white !important;
}

.job-actions {
    display: flex;
    gap: 0.75rem;
    flex-shrink: 0;
}

.job-details {
    margin-top: 1.5rem;
    padding-top: 1.5rem;
    border-top: 1px solid #e2e8f0;
}

.job-description h4 {
    font-weight: 600;
    color: #015A77;
    margin: 1rem 0 0.5rem 0;
    font-size: 1rem;
}

.job-description h4:first-child {
    margin-top: 0;
}

.job-description ul {
    list-style: disc;
    margin-left: 1.5rem;
    margin-bottom: 1rem;
}

.job-description li {
    margin-bottom: 0.25rem;
    color: #666;
    line-height: 1.5;
}

.process-step {
    position: relative;
}

.step-number {
    width: 3rem;
    height: 3rem;
    background: #00BFB2;
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    font-weight: bold;
    margin: 0 auto 1rem auto;
}

.step-title {
    font-size: 1.1rem;
    font-weight: 600;
    color: #015A77;
    margin-bottom: 0.5rem;
    font-family: 'Montserrat', sans-serif;
}

.step-description {
    color: #666;
    font-size: 0.9rem;
    line-height: 1.5;
}

.testimonial-card {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border-radius: 1rem;
    padding: 2rem;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.testimonial-text {
    font-style: italic;
    margin-bottom: 1.5rem;
    line-height: 1.6;
    color: #e2e8f0;
}

.testimonial-author {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.author-photo {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    object-fit: cover;
}

.author-name {
    font-weight: 600;
    color: #00BFB2;
    margin-bottom: 0.25rem;
}

.author-position {
    color: #cbd5e1;
    font-size: 0.9rem;
}

.author-tenure {
    color: #94a3b8;
    font-size: 0.8rem;
}

@media (max-width: 768px) {
    .job-header {
        flex-direction: column;
        align-items: stretch;
    }

    .job-actions {
        flex-direction: column;
    }

    .job-meta {
        justify-content: flex-start;
    }
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Job filtering
    const filterBtns = document.querySelectorAll('.job-filter-btn');
    const jobCards = document.querySelectorAll('.job-card');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Remove active class from all buttons
            filterBtns.forEach(b => b.classList.remove('active'));
            // Add active class to clicked button
            this.classList.add('active');

            const filter = this.getAttribute('data-filter');

            jobCards.forEach(card => {
                if (filter === 'all' || card.getAttribute('data-category') === filter) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
});

function toggleJobDetails(jobId) {
    const details = document.getElementById(jobId);
    if (details.style.display === 'none' || details.style.display === '') {
        details.style.display = 'block';
    } else {
        details.style.display = 'none';
    }
}
</script>
@endpush
