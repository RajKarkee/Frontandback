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

            <div class="benefit-card text-center fade-in fade-in-delay-1">
                <div class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-3">Collaborative Culture</h3>
                <p class="text-report-black">
                    Work with diverse, talented teams in an inclusive environment that values collaboration, innovation, and mutual respect.
                </p>
            </div>

            <div class="benefit-card text-center fade-in fade-in-delay-2">
                <div class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-3">Comprehensive Benefits</h3>
                <p class="text-report-black">
                    Competitive compensation, health insurance, retirement plans, and additional perks that support your well-being and financial security.
                </p>
            </div>

            <div class="benefit-card text-center fade-in">
                <div class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-3">Learning & Development</h3>
                <p class="text-report-black">
                    Access to training programs, workshops, conferences, and certification support to keep your skills current and competitive.
                </p>
            </div>

            <div class="benefit-card text-center fade-in fade-in-delay-1">
                <div class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-3">Work-Life Balance</h3>
                <p class="text-report-black">
                    Flexible working arrangements, paid time off, and a supportive environment that recognizes the importance of personal well-being.
                </p>
            </div>

            <div class="benefit-card text-center fade-in fade-in-delay-2">
                <div class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>
                </div>
                <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-3">Innovation Focus</h3>
                <p class="text-report-black">
                    Be part of a forward-thinking organization that embraces technology and innovation to deliver exceptional client service.
                </p>
            </div>
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

        <div class="space-y-6">
            <!-- Senior Auditor Position -->
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
                        <button class="btn-outline" onclick="toggleJobDetails('job-1')">View Details</button>
                        <button class="btn-primary" onclick="alert('Application form will be implemented!')">Apply Now</button>
                    </div>
                </div>

                <div class="job-details" id="job-1" style="display: none;">
                    <div class="job-description">
                        <h4>Position Overview</h4>
                        <p>We are seeking an experienced Senior Auditor to join our audit team. The successful candidate will lead audit engagements, supervise junior staff, and ensure high-quality service delivery to our clients.</p>

                        <h4>Key Responsibilities</h4>
                        <ul>
                            <li>Plan and execute audit engagements for various client types and sizes</li>
                            <li>Supervise and mentor junior audit staff</li>
                            <li>Review audit working papers and ensure quality standards</li>
                            <li>Interact with clients and address audit-related queries</li>
                            <li>Prepare comprehensive audit reports and management letters</li>
                            <li>Stay updated with auditing standards and regulations</li>
                        </ul>

                        <h4>Requirements</h4>
                        <ul>
                            <li>Bachelor's degree in Accounting, Finance, or related field</li>
                            <li>Minimum 3-5 years of audit experience</li>
                            <li>Professional certification (CA, ACCA, CPA) preferred</li>
                            <li>Strong analytical and problem-solving skills</li>
                            <li>Excellent communication and leadership abilities</li>
                            <li>Proficiency in audit software and MS Office</li>
                        </ul>

                        <h4>What We Offer</h4>
                        <ul>
                            <li>Competitive salary package</li>
                            <li>Performance-based bonuses</li>
                            <li>Professional development opportunities</li>
                            <li>Health and life insurance</li>
                            <li>Flexible working arrangements</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Tax Consultant Position -->
            <div class="job-card bg-crisp-white fade-in fade-in-delay-1" data-category="tax">
                <div class="job-header">
                    <div class="job-title-section">
                        <h3 class="job-title">Tax Consultant</h3>
                        <div class="job-meta">
                            <span class="job-department">Tax Advisory</span>
                            <span class="job-location">Pokhara</span>
                            <span class="job-type">Full-time</span>
                        </div>
                    </div>
                    <div class="job-actions">
                        <button class="btn-outline" onclick="toggleJobDetails('job-2')">View Details</button>
                        <button class="btn-primary" onclick="alert('Application form will be implemented!')">Apply Now</button>
                    </div>
                </div>

                <div class="job-details" id="job-2" style="display: none;">
                    <div class="job-description">
                        <h4>Position Overview</h4>
                        <p>Join our tax advisory team as a Tax Consultant to provide comprehensive tax planning and compliance services to our diverse client base in the Pokhara region.</p>

                        <h4>Key Responsibilities</h4>
                        <ul>
                            <li>Prepare and review tax returns for individuals and businesses</li>
                            <li>Provide tax planning and advisory services</li>
                            <li>Research tax laws and regulations</li>
                            <li>Assist clients with tax compliance and optimization strategies</li>
                            <li>Represent clients in tax authority interactions</li>
                            <li>Develop tax-efficient business structures</li>
                        </ul>

                        <h4>Requirements</h4>
                        <ul>
                            <li>Bachelor's degree in Accounting, Finance, or Taxation</li>
                            <li>2-4 years of tax preparation and advisory experience</li>
                            <li>Strong knowledge of Nepal tax laws and regulations</li>
                            <li>Attention to detail and analytical mindset</li>
                            <li>Excellent client communication skills</li>
                            <li>Professional tax certification preferred</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Business Analyst Position -->
            <div class="job-card bg-crisp-white fade-in fade-in-delay-2" data-category="advisory">
                <div class="job-header">
                    <div class="job-title-section">
                        <h3 class="job-title">Business Analyst</h3>
                        <div class="job-meta">
                            <span class="job-department">Business Advisory</span>
                            <span class="job-location">Kathmandu</span>
                            <span class="job-type">Full-time</span>
                        </div>
                    </div>
                    <div class="job-actions">
                        <button class="btn-outline" onclick="toggleJobDetails('job-3')">View Details</button>
                        <button class="btn-primary" onclick="alert('Application form will be implemented!')">Apply Now</button>
                    </div>
                </div>

                <div class="job-details" id="job-3" style="display: none;">
                    <div class="job-description">
                        <h4>Position Overview</h4>
                        <p>We are looking for a talented Business Analyst to help our clients optimize their operations, improve efficiency, and drive strategic decision-making through data-driven insights.</p>

                        <h4>Key Responsibilities</h4>
                        <ul>
                            <li>Analyze business processes and identify improvement opportunities</li>
                            <li>Develop financial models and forecasts</li>
                            <li>Conduct market research and competitive analysis</li>
                            <li>Prepare business cases and strategic recommendations</li>
                            <li>Support mergers and acquisitions activities</li>
                            <li>Create dashboards and reports for stakeholders</li>
                        </ul>

                        <h4>Requirements</h4>
                        <ul>
                            <li>Master's degree in Business Administration, Finance, or related field</li>
                            <li>3+ years of business analysis or consulting experience</li>
                            <li>Strong analytical and quantitative skills</li>
                            <li>Proficiency in Excel, PowerPoint, and data analysis tools</li>
                            <li>Excellent presentation and communication skills</li>
                            <li>Industry experience in multiple sectors preferred</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Junior Accountant Position -->
            <div class="job-card bg-crisp-white fade-in" data-category="audit">
                <div class="job-header">
                    <div class="job-title-section">
                        <h3 class="job-title">Junior Accountant</h3>
                        <div class="job-meta">
                            <span class="job-department">Audit & Assurance</span>
                            <span class="job-location">Chitwan</span>
                            <span class="job-type">Full-time</span>
                        </div>
                    </div>
                    <div class="job-actions">
                        <button class="btn-outline" onclick="toggleJobDetails('job-4')">View Details</button>
                        <button class="btn-primary" onclick="alert('Application form will be implemented!')">Apply Now</button>
                    </div>
                </div>

                <div class="job-details" id="job-4" style="display: none;">
                    <div class="job-description">
                        <h4>Position Overview</h4>
                        <p>Entry-level position perfect for recent graduates looking to start their career in accounting and audit. Great opportunity for learning and professional development.</p>

                        <h4>Key Responsibilities</h4>
                        <ul>
                            <li>Assist in audit fieldwork and documentation</li>
                            <li>Prepare working papers and schedules</li>
                            <li>Perform basic audit procedures under supervision</li>
                            <li>Maintain client files and documentation</li>
                            <li>Support senior team members in various tasks</li>
                            <li>Learn and apply auditing standards and procedures</li>
                        </ul>

                        <h4>Requirements</h4>
                        <ul>
                            <li>Bachelor's degree in Accounting or Finance</li>
                            <li>Fresh graduate or 1-2 years of experience</li>
                            <li>Strong academic record</li>
                            <li>Eagerness to learn and grow professionally</li>
                            <li>Good communication and teamwork skills</li>
                            <li>Basic knowledge of accounting principles</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- IT Support Specialist -->
            <div class="job-card bg-crisp-white fade-in fade-in-delay-1" data-category="support">
                <div class="job-header">
                    <div class="job-title-section">
                        <h3 class="job-title">IT Support Specialist</h3>
                        <div class="job-meta">
                            <span class="job-department">Support & Admin</span>
                            <span class="job-location">Kathmandu</span>
                            <span class="job-type">Full-time</span>
                        </div>
                    </div>
                    <div class="job-actions">
                        <button class="btn-outline" onclick="toggleJobDetails('job-5')">View Details</button>
                        <button class="btn-primary" onclick="alert('Application form will be implemented!')">Apply Now</button>
                    </div>
                </div>

                <div class="job-details" id="job-5" style="display: none;">
                    <div class="job-description">
                        <h4>Position Overview</h4>
                        <p>Support our technology infrastructure and help drive digital transformation initiatives across the organization.</p>

                        <h4>Key Responsibilities</h4>
                        <ul>
                            <li>Provide technical support to staff across all offices</li>
                            <li>Maintain and troubleshoot computer systems and networks</li>
                            <li>Implement security protocols and data backup procedures</li>
                            <li>Support software installations and updates</li>
                            <li>Assist with digital transformation projects</li>
                            <li>Train staff on new technology tools</li>
                        </ul>

                        <h4>Requirements</h4>
                        <ul>
                            <li>Bachelor's degree in IT, Computer Science, or related field</li>
                            <li>2+ years of IT support experience</li>
                            <li>Knowledge of Windows, networks, and office software</li>
                            <li>Strong troubleshooting and problem-solving skills</li>
                            <li>Excellent customer service orientation</li>
                            <li>Professional IT certifications preferred</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-8 fade-in">
            <p class="text-report-black mb-4">Don't see the right position? We're always looking for talented professionals.</p>
            <button class="btn-outline" onclick="alert('General application form will be implemented!')">
                Submit General Application
                <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </button>
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

            <div class="testimonial-card fade-in fade-in-delay-1">
                <div class="testimonial-content">
                    <p class="testimonial-text">
                        "The collaborative culture and diverse client portfolio make every day interesting. I'm constantly learning and applying new skills in different industries."
                    </p>
                    <div class="testimonial-author">
                        <div class="author-info">
                            <h4 class="author-name">Rajesh Thapa</h4>
                            <p class="author-position">Tax Consultant</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="testimonial-card fade-in fade-in-delay-2">
                <div class="testimonial-content">
                    <p class="testimonial-text">
                        "The work-life balance and supportive management make this a great place to build a career. The benefits package is comprehensive and the team is like family."
                    </p>
                    <div class="testimonial-author">
                        <div class="author-info">
                            <h4 class="author-name">Sunita Karki</h4>
                            <p class="author-position">Business Analyst</p>
                        </div>
                    </div>
                </div>
            </div>
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
    justify-content: between;
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

.author-name {
    font-weight: 600;
    color: #00BFB2;
    margin-bottom: 0.25rem;
}

.author-position {
    color: #cbd5e1;
    font-size: 0.9rem;
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
