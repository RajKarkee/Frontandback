@extends('layouts.app')

@section('title', 'Apply for ' . ($job ? $job->title : 'Position') . ' | Chartered Insights')
@section('meta_description', 'Apply for ' . ($job ? $job->title : 'a position') . ' at Chartered Insights. Submit your application and join our team of professionals.')

@section('content')
<div class="min-h-screen bg-audit-grey py-12">
    <div class="container-custom">
        <div class="max-w-4xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-montserrat font-bold text-deep-chartered-blue mb-4">
                    @if($job)
                        Apply for {{ $job->title }}
                    @else
                        Submit Your Application
                    @endif
                </h1>
                @if($job)
                    <div class="bg-crisp-white rounded-lg p-4 mb-6 shadow-sm">
                        <div class="flex flex-wrap justify-center gap-4 text-sm text-report-black">
                            <span><strong>Department:</strong> {{ $job->department }}</span>
                            <span><strong>Location:</strong> {{ $job->location }}</span>
                            <span><strong>Type:</strong> {{ ucfirst(str_replace('_', ' ', $job->type)) }}</span>
                            @if($job->salary_min || $job->salary_max)
                                <span><strong>Salary:</strong> {{ $job->formatted_salary }}</span>
                            @endif
                        </div>
                    </div>
                @endif
                <p class="text-lg text-report-black max-w-2xl mx-auto">
                    We're excited to learn more about you! Please fill out the form below and we'll review your application carefully.
                </p>
            </div>

            <!-- Application Form -->
            <div class="bg-crisp-white rounded-xl shadow-lg p-8">
                <form id="applicationForm" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @if($job)
                        <input type="hidden" name="job_opening_id" value="{{ $job->id }}">
                    @endif

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

                    <!-- Application Documents -->
                    <div class="space-y-4">
                        <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-4">Application Documents</h3>

                        <div>
                            <label for="resume" class="block text-sm font-medium text-report-black mb-2">Resume/CV *</label>
                            <input type="file" id="resume" name="resume" required accept=".pdf,.doc,.docx"
                                   class="w-full px-4 py-3 border border-audit-grey rounded-lg focus:ring-2 focus:ring-fresh-teal focus:border-transparent">
                            <p class="text-sm text-report-black mt-1">Accepted formats: PDF, DOC, DOCX (Max: 5MB)</p>
                        </div>

                        <div>
                            <label for="cover_letter" class="block text-sm font-medium text-report-black mb-2">Cover Letter</label>
                            <textarea id="cover_letter" name="cover_letter" rows="6"
                                      placeholder="Tell us why you're interested in this position and what makes you a great fit..."
                                      class="w-full px-4 py-3 border border-audit-grey rounded-lg focus:ring-2 focus:ring-fresh-teal focus:border-transparent"></textarea>
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
                                <label for="expected_salary" class="block text-sm font-medium text-report-black mb-2">Expected Salary (NPR)</label>
                                <input type="number" id="expected_salary" name="expected_salary" min="0"
                                       class="w-full px-4 py-3 border border-audit-grey rounded-lg focus:ring-2 focus:ring-fresh-teal focus:border-transparent">
                            </div>
                            <div>
                                <label for="available_start_date" class="block text-sm font-medium text-report-black mb-2">Available Start Date</label>
                                <input type="date" id="available_start_date" name="available_start_date"
                                       class="w-full px-4 py-3 border border-audit-grey rounded-lg focus:ring-2 focus:ring-fresh-teal focus:border-transparent">
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-center pt-6">
                        <button type="submit" id="submitBtn"
                                class="bg-fresh-teal hover:bg-deep-chartered-blue text-crisp-white px-8 py-3 rounded-lg font-montserrat font-semibold transition-colors duration-300 flex items-center">
                            <span id="submitText">Submit Application</span>
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
<div id="successModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
    <div class="bg-crisp-white rounded-xl p-8 max-w-md mx-4">
        <div class="text-center">
            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-2">Application Submitted!</h3>
            <p class="text-report-black mb-6">Thank you for your interest! We'll review your application and get back to you soon.</p>
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
document.getElementById('applicationForm').addEventListener('submit', async function(e) {
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
            document.getElementById('successModal').classList.remove('hidden');
        } else {
            throw new Error(result.message || 'An error occurred');
        }
    } catch (error) {
        alert('Error submitting application: ' + error.message);
    } finally {
        // Reset button state
        submitBtn.disabled = false;
        submitText.textContent = 'Submit Application';
        loadingIcon.classList.add('hidden');
    }
});

// Set minimum date to tomorrow
document.getElementById('available_start_date').min = new Date(Date.now() + 86400000).toISOString().split('T')[0];
</script>
@endpush
