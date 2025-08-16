@extends('layouts.app')

@section('title', 'General Application | Chartered Insights')
@section('meta_description', 'Submit a general application to Chartered Insights. We are always looking for talented professionals to join our team.')

@section('content')
<div class="min-h-screen bg-audit-grey py-12">
    <div class="container-custom">
        <div class="max-w-4xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-montserrat font-bold text-deep-chartered-blue mb-4">
                    General Application
                </h1>
                <p class="text-lg text-report-black max-w-2xl mx-auto">
                    Don't see the perfect position listed? We're always interested in meeting talented professionals.
                    Submit your information and we'll keep you in mind for future opportunities that match your skills.
                </p>
            </div>

            <!-- Information Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-crisp-white rounded-lg p-6 text-center">
                    <div class="w-12 h-12 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-montserrat font-semibold text-deep-chartered-blue mb-2">Stay Connected</h3>
                    <p class="text-sm text-report-black">We'll keep your profile in our talent database for future opportunities</p>
                </div>

                <div class="bg-crisp-white rounded-lg p-6 text-center">
                    <div class="w-12 h-12 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h3 class="font-montserrat font-semibold text-deep-chartered-blue mb-2">Quick Process</h3>
                    <p class="text-sm text-report-black">Simple application process to get your information on file</p>
                </div>

                <div class="bg-crisp-white rounded-lg p-6 text-center">
                    <div class="w-12 h-12 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-montserrat font-semibold text-deep-chartered-blue mb-2">Priority Access</h3>
                    <p class="text-sm text-report-black">Be among the first to know about new openings that match your profile</p>
                </div>
            </div>

            <!-- Application Form -->
            <div class="bg-crisp-white rounded-xl shadow-lg p-8">
                <form id="generalApplicationForm" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Personal Information -->
                    <div class="space-y-4">
                        <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-4">Personal Information</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="first_name" class="block text-sm font-medium text-report-black mb-2">First Name *</label>
                                <input type="text" id="first_name" name="first_name" required
                                       class="w-full px-4 py-3 border border-audit-grey rounded-lg focus:ring-2 focus:ring-fresh-teal focus:border-transparent">
                            </div>
                            <div>
                                <label for="last_name" class="block text-sm font-medium text-report-black mb-2">Last Name *</label>
                                <input type="text" id="last_name" name="last_name" required
                                       class="w-full px-4 py-3 border border-audit-grey rounded-lg focus:ring-2 focus:ring-fresh-teal focus:border-transparent">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="email" class="block text-sm font-medium text-report-black mb-2">Email Address *</label>
                                <input type="email" id="email" name="email" required
                                       class="w-full px-4 py-3 border border-audit-grey rounded-lg focus:ring-2 focus:ring-fresh-teal focus:border-transparent">
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-medium text-report-black mb-2">Phone Number *</label>
                                <input type="tel" id="phone" name="phone" required
                                       class="w-full px-4 py-3 border border-audit-grey rounded-lg focus:ring-2 focus:ring-fresh-teal focus:border-transparent">
                            </div>
                        </div>
                    </div>

                    <!-- Career Interests -->
                    <div class="space-y-4">
                        <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-4">Career Interests</h3>

                        <div>
                            <label for="cover_letter" class="block text-sm font-medium text-report-black mb-2">Tell us about yourself and your career interests *</label>
                            <textarea id="cover_letter" name="cover_letter" rows="6" required
                                      placeholder="Share your background, skills, and what type of opportunities you're looking for at Chartered Insights..."
                                      class="w-full px-4 py-3 border border-audit-grey rounded-lg focus:ring-2 focus:ring-fresh-teal focus:border-transparent"></textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="preferred_department" class="block text-sm font-medium text-report-black mb-2">Preferred Department</label>
                                <select id="preferred_department" name="preferred_department"
                                        class="w-full px-4 py-3 border border-audit-grey rounded-lg focus:ring-2 focus:ring-fresh-teal focus:border-transparent">
                                    <option value="">Any Department</option>
                                    <option value="Audit & Assurance">Audit & Assurance</option>
                                    <option value="Tax Advisory">Tax Advisory</option>
                                    <option value="Business Advisory">Business Advisory</option>
                                    <option value="Support & Admin">Support & Admin</option>
                                    <option value="IT & Technology">IT & Technology</option>
                                    <option value="Human Resources">Human Resources</option>
                                    <option value="Marketing">Marketing</option>
                                </select>
                            </div>
                            <div>
                                <label for="experience_level" class="block text-sm font-medium text-report-black mb-2">Experience Level</label>
                                <select id="experience_level" name="experience_level"
                                        class="w-full px-4 py-3 border border-audit-grey rounded-lg focus:ring-2 focus:ring-fresh-teal focus:border-transparent">
                                    <option value="">Select Level</option>
                                    <option value="entry">Entry Level (0-2 years)</option>
                                    <option value="mid">Mid Level (3-5 years)</option>
                                    <option value="senior">Senior Level (6-10 years)</option>
                                    <option value="lead">Lead/Manager (10+ years)</option>
                                    <option value="executive">Executive Level</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Documents -->
                    <div class="space-y-4">
                        <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-4">Documents</h3>

                        <div>
                            <label for="resume" class="block text-sm font-medium text-report-black mb-2">Resume/CV *</label>
                            <input type="file" id="resume" name="resume" required accept=".pdf,.doc,.docx"
                                   class="w-full px-4 py-3 border border-audit-grey rounded-lg focus:ring-2 focus:ring-fresh-teal focus:border-transparent">
                            <p class="text-sm text-report-black mt-1">Accepted formats: PDF, DOC, DOCX (Max: 5MB)</p>
                        </div>
                    </div>

                    <!-- Additional Information -->
                    <div class="space-y-4">
                        <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-4">Additional Information</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="portfolio_url" class="block text-sm font-medium text-report-black mb-2">Portfolio URL</label>
                                <input type="url" id="portfolio_url" name="portfolio_url"
                                       placeholder="https://your-portfolio.com"
                                       class="w-full px-4 py-3 border border-audit-grey rounded-lg focus:ring-2 focus:ring-fresh-teal focus:border-transparent">
                            </div>
                            <div>
                                <label for="linkedin_profile" class="block text-sm font-medium text-report-black mb-2">LinkedIn Profile</label>
                                <input type="url" id="linkedin_profile" name="linkedin_profile"
                                       placeholder="https://linkedin.com/in/yourprofile"
                                       class="w-full px-4 py-3 border border-audit-grey rounded-lg focus:ring-2 focus:ring-fresh-teal focus:border-transparent">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="expected_salary" class="block text-sm font-medium text-report-black mb-2">Expected Salary Range (NPR)</label>
                                <input type="number" id="expected_salary" name="expected_salary" min="0"
                                       placeholder="e.g., 500000"
                                       class="w-full px-4 py-3 border border-audit-grey rounded-lg focus:ring-2 focus:ring-fresh-teal focus:border-transparent">
                            </div>
                            <div>
                                <label for="available_start_date" class="block text-sm font-medium text-report-black mb-2">Available From</label>
                                <input type="date" id="available_start_date" name="available_start_date"
                                       class="w-full px-4 py-3 border border-audit-grey rounded-lg focus:ring-2 focus:ring-fresh-teal focus:border-transparent">
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-center pt-6">
                        <button type="submit" id="submitBtn"
                                class="bg-fresh-teal hover:bg-deep-chartered-blue text-crisp-white px-8 py-3 rounded-lg font-montserrat font-semibold transition-colors duration-300 flex items-center">
                            <span id="submitText">Submit General Application</span>
                            <svg id="loadingIcon" class="animate-spin ml-2 h-5 w-5 text-white hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Success Modal -->
<div id="successModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 items-center justify-center" style="display: none;">
    <div class="bg-crisp-white rounded-xl p-8 max-w-md mx-4">
        <div class="text-center">
            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-2">Application Submitted!</h3>
            <p class="text-report-black mb-6">Thank you for your interest! We'll keep your information on file and contact you when suitable opportunities arise.</p>
            <button onclick="window.location.href='{{ route('careers') }}'"
                    class="bg-fresh-teal hover:bg-deep-chartered-blue text-crisp-white px-6 py-2 rounded-lg transition-colors duration-300">
                Back to Careers
            </button>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
document.getElementById('generalApplicationForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const submitBtn = document.getElementById('submitBtn');
    const submitText = document.getElementById('submitText');
    const loadingIcon = document.getElementById('loadingIcon');

    // Show loading state
    submitBtn.disabled = true;
    submitText.textContent = 'Submitting...';
    loadingIcon.classList.remove('hidden');

    const formData = new FormData(this);

    try {
        const response = await fetch('{{ route("careers.apply.submit") }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        });

        const result = await response.json();

        if (result.success) {
            const modal = document.getElementById('successModal');
            modal.style.display = 'flex';
        } else {
            throw new Error(result.message || 'An error occurred');
        }
    } catch (error) {
        alert('Error submitting application: ' + error.message);
    } finally {
        // Reset button state
        submitBtn.disabled = false;
        submitText.textContent = 'Submit General Application';
        loadingIcon.classList.add('hidden');
    }
});

// Set minimum date to today
document.getElementById('available_start_date').min = new Date().toISOString().split('T')[0];
</script>
@endpush
