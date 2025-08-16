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
