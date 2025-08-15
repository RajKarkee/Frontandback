@extends('layouts.app')

@section('title', 'Careers - Join Our Team | Chartered Insights')
@section('meta_description', 'Join the Chartered Insights team and build your career in accounting, audit, tax advisory, and business consulting. Explore exciting opportunities and competitive benefits.')

@section('content')
<!-- Hero Section -->
<x-jumbotron page-slug="careers" />

<!-- Why Work With Us -->
<section class="section">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Why Choose Chartered Insights?</h2>
            <p class="section-subtitle">
                We believe our people are our greatest asset. That's why we invest in creating an environment where talent thrives and careers flourish.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($benefits as $index => $benefit)
            <div class="benefit-card text-center fade-in @if($index > 0) fade-in-delay-{{ ($index % 3) + 1 }} @endif">
                <div class="w-16 h-16 {{ $benefit->color_class }} rounded-full flex items-center justify-center mx-auto mb-4">
                    {!! $benefit->icon !!}
                </div>
                <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-3">{{ $benefit->title }}</h3>
                <p class="text-report-black">
                    {{ $benefit->description }}
                </p>
            </div>
            @empty
            <!-- Fallback static content -->
            <div class="benefit-card text-center fade-in">
                <div class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-3">Professional Growth</h3>
                <p class="text-report-black">
                    Continuous learning opportunities, professional certifications, and clear career progression paths to help you reach your potential.
                </p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Current Openings -->
<section class="section bg-audit-grey">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Current Openings</h2>
            <p class="section-subtitle">
                Explore exciting career opportunities across our various departments and locations.
            </p>
        </div>

        <!-- Job Filter -->
        <div class="flex flex-wrap justify-center gap-4 mb-8 fade-in">
            <button class="job-filter-btn active" data-filter="all">All Positions</button>
            <button class="job-filter-btn" data-filter="audit">Audit & Assurance</button>
            <button class="job-filter-btn" data-filter="tax">Tax Advisory</button>
            <button class="job-filter-btn" data-filter="advisory">Business Advisory</button>
            <button class="job-filter-btn" data-filter="support">Support & Admin</button>
        </div>

        <div class="space-y-6" id="jobs-container">
            @forelse($jobOpenings as $index => $job)
            <!-- Job Opening Card -->
            <div class="job-card bg-crisp-white fade-in @if($index > 0) fade-in-delay-{{ ($index % 3) + 1 }} @endif" data-category="{{ $job->category }}">
                <div class="job-header">
                    <div class="job-title-section">
                        <h3 class="job-title">{{ $job->title }}</h3>
                        <div class="job-meta">
                            <span class="job-department">{{ $job->department }}</span>
                            <span class="job-location">{{ $job->location }}</span>
                            <span class="job-type">{{ ucfirst($job->job_type) }}</span>
                            @if($job->is_featured)
                            <span class="job-featured">Featured</span>
                            @endif
                        </div>
                    </div>
                    <div class="job-actions">
                        <button class="btn-outline" onclick="toggleJobDetails('job-{{ $job->id }}')">View Details</button>
                        <a href="{{ route('careers.apply', $job->id) }}" class="btn-primary">Apply Now</a>
                    </div>
                </div>

                <div class="job-details" id="job-{{ $job->id }}" style="display: none;">
                    <div class="job-description">
                        <h4>Position Overview</h4>
                        <p>{{ $job->overview }}</p>

                        <h4>Key Responsibilities</h4>
                        <ul>
                            @foreach($job->responsibilities_array as $responsibility)
                            <li>{{ $responsibility }}</li>
                            @endforeach
                        </ul>

                        <h4>Requirements</h4>
                        <ul>
                            @foreach($job->requirements_array as $requirement)
                            <li>{{ $requirement }}</li>
                            @endforeach
                        </ul>

                        @if($job->benefits_array && count($job->benefits_array) > 0)
                        <h4>What We Offer</h4>
                        <ul>
                            @foreach($job->benefits_array as $benefit)
                            <li>{{ $benefit }}</li>
                            @endforeach
                        </ul>
                        @endif

                        @if($job->salary_min || $job->salary_max)
                        <h4>Compensation</h4>
                        <p>{{ $job->formatted_salary }}</p>
                        @endif

                        @if($job->application_deadline)
                        <h4>Application Deadline</h4>
                        <p>{{ $job->application_deadline->format('F d, Y') }}</p>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <!-- Fallback static content for jobs -->
            <div class="job-card bg-crisp-white fade-in" data-category="audit">
                <div class="job-header">
                    <div class="job-title-section">
                        <h3 class="job-title">Senior Auditor</h3>
                        <div class="job-meta">
                            <span class="job-department">Audit & Assurance</span>
                            <span class="job-location">Kathmandu</span>
                            <span class="job-type">Full-time</span>
                        </div>
                    </div>
                    <div class="job-actions">
                        <button class="btn-outline" onclick="toggleJobDetails('job-fallback')">View Details</button>
                        <button class="btn-primary" onclick="alert('Please contact us for application details!')">Apply Now</button>
                    </div>
                </div>

                <div class="job-details" id="job-fallback" style="display: none;">
                    <div class="job-description">
                        <h4>Position Overview</h4>
                        <p>We are seeking an experienced Senior Auditor to join our audit team. Please contact us for more details about current openings.</p>
                    </div>
                </div>
            </div>
            @endforelse
        </div>

        <div class="text-center mt-8 fade-in">
            <p class="text-report-black mb-4">Don't see the right position? We're always looking for talented professionals.</p>
            <a href="{{ route('careers.apply.general') }}" class="btn-outline">
                Submit General Application
                <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- Application Process -->
<section class="section">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Application Process</h2>
            <p class="section-subtitle">
                Our streamlined application process is designed to be fair, transparent, and efficient for all candidates.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="process-step text-center fade-in">
                <div class="step-number">1</div>
                <h3 class="step-title">Submit Application</h3>
                <p class="step-description">
                    Submit your application online with your resume, cover letter, and any required documents.
                </p>
            </div>

            <div class="process-step text-center fade-in fade-in-delay-1">
                <div class="step-number">2</div>
                <h3 class="step-title">Initial Screening</h3>
                <p class="step-description">
                    Our HR team will review your application and contact qualified candidates within 1-2 weeks.
                </p>
            </div>

            <div class="process-step text-center fade-in fade-in-delay-2">
                <div class="step-number">3</div>
                <h3 class="step-title">Interview Process</h3>
                <p class="step-description">
                    Participate in interviews with hiring managers and team members to assess fit and capabilities.
                </p>
            </div>

            <div class="process-step text-center fade-in">
                <div class="step-number">4</div>
                <h3 class="step-title">Final Decision</h3>
                <p class="step-description">
                    Receive our decision and, if successful, complete onboarding and join our team.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Employee Testimonials -->
<section class="section bg-deep-chartered-blue text-crisp-white">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title text-crisp-white">What Our Team Says</h2>
            <p class="section-subtitle text-audit-grey">
                Hear from our team members about their experience working at Chartered Insights.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($testimonials as $index => $testimonial)
            <div class="testimonial-card fade-in @if($index > 0) fade-in-delay-{{ ($index % 3) + 1 }} @endif">
                <div class="testimonial-content">
                    <p class="testimonial-text">
                        "{{ $testimonial->testimonial }}"
                    </p>
                    <div class="testimonial-author">
                        @if($testimonial->photo_url)
                        <img src="{{ $testimonial->photo_url }}" alt="{{ $testimonial->employee_name }}" class="author-photo">
                        @endif
                        <div class="author-info">
                            <h4 class="author-name">{{ $testimonial->employee_name }}</h4>
                            <p class="author-position">{{ $testimonial->position }}</p>
                            @if($testimonial->years_with_company)
                            <p class="author-tenure">{{ $testimonial->years_with_company }} years with company</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <!-- Fallback static testimonials -->
            <div class="testimonial-card fade-in">
                <div class="testimonial-content">
                    <p class="testimonial-text">
                        "The professional development opportunities here are exceptional. I've grown from a junior auditor to a senior position in just three years, with constant support and mentorship."
                    </p>
                    <div class="testimonial-author">
                        <div class="author-info">
                            <h4 class="author-name">Priya Sharma</h4>
                            <p class="author-position">Senior Auditor</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>

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
