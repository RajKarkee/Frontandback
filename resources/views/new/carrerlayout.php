<div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
    <div class="job-list">
        @foreach($job_openings as $index => $job)
        <div class="job-banner gsap-animate" data-department="{{ $job->category }}">
            <div class="job-info">
                <h3>{{$job->title}}</h3>
                @if($job->is_featured==1)
                <p class="featured">Featured</p>
                @endif
                <p>{{$job->category}}</p>
                <p>{{$job->location}}</p>
                <p>{{$job->job_type}}</p>
            </div>
            <div class="btn-container">
                <button class="btn-primary-outline" data-bs-toggle="collapse" data-bs-target="#s{{ $job->id }}" aria-expanded="false" aria-controls="job-details-{{ $job->id }}">View Details</button>
                <button class="btn-primary-filled apply-btn" data-bs-toggle="modal" data-bs-target="#applyModal"    
                    data-job-id="{{ $job->id }}"
                    data-job-title="{{ $job->title }}"
                    data-job-department="{{ $job->category }}"
                    data-job-location="{{ $job->location }}"
                    data-job-type="{{ $job->job_type }}"
                    data-job-salary-min="{{ $job->salary_min }}"
                    data-job-salary-max="{{ $job->salary_max ?? 'N/A' }}">Apply Now</button>
            </div>
        </div>
        <div class="collapse" id="s{{ $job->id }}">
            <div class="job-details">
                <h4>Position Overview</h4>
                <p>{{$job->overview}}</p>
                <h4>Key Responsibilities</h4>
                <ul>
                    @foreach(explode("\n", trim($job->responsibilities)) as $item)
                        @if(!empty(trim($item)))
                            <li>{{ trim($item) }}</li>
                        @endif
                    @endforeach
                </ul>
                <h4>Requirements</h4>
                <ul>
                    @foreach(explode("\n", trim($job->requirements)) as $item)
                        @if(!empty(trim($item)))
                            <li>{{ trim($item) }}</li>
                        @endif
                    @endforeach
                </ul>
                <h4>What We Offer</h4>
                <ul>
                    @foreach(explode("\n", trim($job->benefits)) as $item)
                        @if(!empty(trim($item)))
                            <li>{{ trim($item) }}</li>
                        @endif
                    @endforeach
                </ul>
                <h4>Compensation</h4>
                <p>NPR {{ number_format($job->salary_min) }} - {{ number_format($job->salary_max) }}</p>
                <h4>Application Deadline</h4>
                <p>{{ \Carbon\Carbon::parse($job->application_deadline)->format('F d, Y') }}</p>
            </div>
        </div>
        @endforeach
    </div>
    <div class="view-more-container gsap-animate">
        <button class="btn-primary-filled" id="view-more-btn">View More</button>
    </div>
    <div class="text-center mt-4 gsap-animate">
        <a href="#apply-general" class="btn-primary-filled">Submit General Application</a>
    </div>
</div>

<!-- Other tab panes -->
<div class="tab-pane fade" id="audit" role="tabpanel" aria-labelledby="audit-tab"></div>
<div class="tab-pane fade" id="tax" role="tabpanel" aria-labelledby="tax-tab"></div>
<div class="tab-pane fade" id="business" role="tabpanel" aria-labelledby="business-tab"></div>
<div class="tab-pane fade" id="support" role="tabpanel" aria-labelledby="support-tab"></div>

<!-- Testimonials Section -->
<section class="testimonials-section">
    <div class="section-container">
        <h2 class="gsap-animate">What Our Team Says</h2>
        <p class="lead gsap-animate">Hear from our team members about their experience working at Chartered Insights.</p>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 gsap-animate">
                <div class="testimonial-card">
                    <p>"The professional development opportunities here are exceptional. I've grown from a junior auditor to a senior position in just three years, with constant support and mentorship."</p>
                    <h4>Priya Sharma</h4>
                    <p class="role">Senior Auditor, 3 years with company</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 gsap-animate" data-delay="0.2">
                <div class="testimonial-card">
                    <p>"The collaborative culture and diverse client portfolio make every day interesting. I'm constantly learning and applying new skills in different industries."</p>
                    <h4>Rajesh Thapa</h4>
                    <p class="role">Tax Consultant, 2 years with company</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 gsap-animate" data-delay="0.4">
                <div class="testimonial-card">
                    <p>"The work-life balance and supportive management make this a great place to build a career. The benefits package is comprehensive and the team is like family."</p>
                    <h4>Sunita Karki</h4>
                    <p class="role">Business Analyst, 4 years with company</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- HR Contact Section -->
<section class="hr-contact-section" id="hr-contact">
    <div class="section-container">
        <h2 class="gsap-animate">Questions About Career Opportunities?</h2>
        <p class="lead gsap-animate">Our HR team is here to help answer your questions about career opportunities, application process, and what it's like to work at Chartered Insights.</p>
        <div class="row g-4">
            <div class="col-12 gsap-animate">
                <div class="hr-contact-card">
                    <h3>HR Department</h3>
                    <p><strong>Email:</strong> <a href="mailto:careers@charteredinsights.com" class="text-secondary">careers@charteredinsights.com</a></p>
                    <p><strong>Phone:</strong> <a href="tel:+97714234567" class="text-secondary">+977-1-4234567 (Ext. 101)</a></p>
                    <h3>Office Hours</h3>
                    <ul>
                        <li><strong>Sunday - Friday:</strong> 9:00 AM - 6:00 PM</li>
                        <li><strong>Saturday:</strong> 10:00 AM - 4:00 PM</li>
                    </ul>
                    <div class="d-flex flex-wrap gap-3 justify-content-center">
                        <a href="#apply-general" class="btn-primary-filled"><i class="fas fa-envelope"></i> Contact HR Team</a>
                        <a href="https://linkedin.com/company/charteredinsights" target="_blank" class="btn-primary-outline"><i class="fab fa-linkedin-in"></i> Follow Us on LinkedIn</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Application Modal -->
<div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="applyModalLabel">Apply for Position</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-6"><strong>Department:</strong> <span id="modalJobDepartment">-</span></div>
                    <div class="col-md-6"><strong>Location:</strong> <span id="modalJobLocation">-</span></div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6"><strong>Type:</strong> <span id="modalJobType">-</span></div>
                    <div class="col-md-6"><strong>Salary:</strong> NPR <span id="modalJobMin">-</span> - <span id="modalJobMax">-</span></div>
                </div>
                <p class="mb-4">We're excited to learn more about you! Please fill out the form below and we'll review your application carefully.</p>
                <form action="{{ route('job.application.store') }}" method="POST" enctype="multipart/form-data" id="jobApplicationForm">
                    @csrf
                    <input type="hidden" id="modalJobId" name="job_id">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="first-name" class="form-label">First Name *</label>
                            <input type="text" class="form-control" id="first-name" name="first_name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="last-name" class="form-label">Last Name *</label>
                            <input type="text" class="form-control" id="last-name" name="last_name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email Address *</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Phone Number *</label>
                            <input type="tel" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="col-12">
                            <label for="resume" class="form-label">Resume/CV *</label>
                            <input type="file" class="form-control" id="resume" name="resume" accept=".pdf,.doc,.docx" required>
                            <small class="text-muted">Accepted formats: PDF, DOC, DOCX (Max: 5MB)</small>
                        </div>
                        <div class="col-12">
                            <label for="cover-letter" class="form-label">Cover Letter</label>
                            <textarea class="form-control" id="cover-letter" name="cover_letter" rows="5" placeholder="Tell us why you're interested in this position and what makes you a great fit..."></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="portfolio" class="form-label">Portfolio URL</label>
                            <input type="url" class="form-control" id="portfolio" name="portfolio" placeholder="https://your-portfolio.com">
                        </div>
                        <div class="col-md-6">
                            <label for="linkedin" class="form-label">LinkedIn Profile</label>
                            <input type="url" class="form-control" id="linkedin" name="linkedin" placeholder="https://linkedin.com/in/yourprofile">
                        </div>
                        <div class="col-md-6">
                            <label for="salary" class="form-label">Expected Salary (NPR)</label>
                            <input type="number" class="form-control" id="salary" name="expected_salary">
                        </div>
                        <div class="col-md-6">
                            <label for="start-date" class="form-label">Available Start Date</label>
                            <input type="date" class="form-control" id="start-date" name="start_date">
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn-primary-filled"><i class="fas fa-paper-plane"></i> Submit Application</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- GSAP and ScrollTrigger -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

<script>
// GSAP Animations
window.addEventListener('load', function () {
    gsap.registerPlugin(ScrollTrigger);

    // General reveal animations
    gsap.utils.toArray('.gsap-animate').forEach((el) => {
        const delay = parseFloat(el.getAttribute('data-delay')) || 0;
        gsap.fromTo(el,
            { opacity: 0, y: 40 },
            {
                opacity: 1,
                y: 0,
                duration: 1,
                delay,
                ease: 'power3.out',
                scrollTrigger: {
                    trigger: el,
                    start: 'top 85%',
                    once: true,
                    invalidateOnRefresh: true
                }
            }
        );
    });

    // Button fade-in animations
    gsap.utils.toArray('.btn-primary-filled, .btn-primary-outline').forEach((btn) => {
        gsap.fromTo(btn,
            { opacity: 0, scale: 0.9 },
            {
                opacity: 1,
                scale: 1,
                duration: 0.8,
                ease: 'power2.out',
                scrollTrigger: {
                    trigger: btn,
                    start: 'top 90%',
                    once: true
                }
            }
        );
    });

    ScrollTrigger.refresh();
});

// Modal Population - Fixed Version
$(document).ready(function() {
    // Handle modal population for apply buttons
    $(document).on('click', '.apply-btn', function() {
        const jobTitle = $(this).data('job-title');
        const jobDepartment = $(this).data('job-department');
        const jobLocation = $(this).data('job-location');
        const jobType = $(this).data('job-type');
        const jobSalaryMin = $(this).data('job-salary-min');
        const jobSalaryMax = $(this).data('job-salary-max');
        const jobId = $(this).data('job-id');

        // Debug logging
        console.log('Button clicked:', {
            jobTitle, jobDepartment, jobLocation, jobType, jobSalaryMin, jobSalaryMax, jobId
        });

        // Update modal content
        $('#applyModalLabel').text('Apply for ' + jobTitle);
        $('#modalJobDepartment').text(' ' + jobDepartment);
        $('#modalJobLocation').text(' ' + jobLocation);
        $('#modalJobType').text(' ' + jobType);
        $('#modalJobMin').text(jobSalaryMin);
        $('#modalJobMax').text(jobSalaryMax);
        $('#modalJobId').val(jobId);
    });

    // File size validation
    $('#resume').on('change', function() {
        const file = this.files[0];
        if (file && file.size > 5 * 1024 * 1024) { // 5MB
            alert('File size must be less than 5MB');
            $(this).val('');
        }
    });

    // Form submission
    $('#jobApplicationForm').on('submit', function(e) {
        // Add any additional validation here if needed
        console.log('Form submitted');
    });
});

// Tab Filtering
document.addEventListener('DOMContentLoaded', function () {
    const jobBanners = document.querySelectorAll('.job-banner');
    const jobDetails = document.querySelectorAll('.collapse');
    
    // Tab click handler
    document.querySelectorAll('.nav-tabs .nav-link').forEach(tab => {
        tab.addEventListener('click', function (e) {
            const department = this.getAttribute('data-bs-target').substring(1);
            
            if (department === 'all') {
                return; // Let Bootstrap handle the "All" tab
            }
            
            const targetPane = document.querySelector(`#${department}`);
            const container = document.createElement('div');
            container.className = 'job-list';
            let visibleCount = 0;

            // Clear target pane
            targetPane.innerHTML = '';

            // Populate target pane with filtered jobs
            jobBanners.forEach((banner, index) => {
                const bannerDepartment = banner.getAttribute('data-department');
                if (bannerDepartment === department) {
                    const bannerClone = banner.cloneNode(true);
                    if (visibleCount >= 3) {
                        bannerClone.classList.add('hidden-job');
                    }
                    container.appendChild(bannerClone);
                    
                    // Add corresponding details
                    const detailsClone = jobDetails[index].cloneNode(true);
                    container.appendChild(detailsClone);
                    visibleCount++;
                }
            });

            // Add View More button if needed
            if (visibleCount > 3) {
                const viewMoreDiv = document.createElement('div');
                viewMoreDiv.className = 'view-more-container gsap-animate';
                viewMoreDiv.innerHTML = '<button class="btn-primary-filled" onclick="toggleViewMore(this)">View More</button>';
                container.appendChild(viewMoreDiv);
            }

            // Add general application button
            const generalAppDiv = document.createElement('div');
            generalAppDiv.className = 'text-center mt-4 gsap-animate';
            generalAppDiv.innerHTML = '<a href="#apply-general" class="btn-primary-filled">Submit General Application</a>';
            container.appendChild(generalAppDiv);

            targetPane.appendChild(container);
        });
    });
});

// View More/Less Toggle
function toggleViewMore(button) {
    const jobList = button.closest('.job-list');
    const hiddenJobs = jobList.querySelectorAll('.job-banner.hidden-job');
    const isShowingMore = button.textContent === 'View More';

    hiddenJobs.forEach((job) => {
        job.classList.toggle('hidden-job', !isShowingMore);
    });

    button.textContent = isShowingMore ? 'View Less' : 'View More';
}
</script>
@endsection