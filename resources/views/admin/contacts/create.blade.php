@extends('admin.layouts.app')

@section('title', 'Create Contact')
@section('page-title', 'Create New Contact')

@section('page-actions')
    <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i>Back to Contacts
    </a>
@endsection

@section('content')
    <form method="POST" action="{{ route('admin.contacts.store') }}">
        @csrf

        <div class="row">
            <div class="col-lg-8">
                <!-- Basic Information -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom py-3">
                        <h5 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-user me-2"></i>Contact Information
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="first_name" class="form-label fw-semibold">First Name *</label>
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                       id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                                @error('first_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="last_name" class="form-label fw-semibold">Last Name *</label>
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                       id="last_name" name="last_name" value="{{ old('last_name') }}" required>
                                @error('last_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label fw-semibold">Email Address *</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                       id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="phone" class="form-label fw-semibold">Phone Number</label>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                       id="phone" name="phone" value="{{ old('phone') }}">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="company" class="form-label fw-semibold">Company</label>
                                <input type="text" class="form-control @error('company') is-invalid @enderror"
                                       id="company" name="company" value="{{ old('company') }}">
                                @error('company')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="position" class="form-label fw-semibold">Position/Title</label>
                                <input type="text" class="form-control @error('position') is-invalid @enderror"
                                       id="position" name="position" value="{{ old('position') }}">
                                @error('position')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="website" class="form-label fw-semibold">Website</label>
                                <input type="url" class="form-control @error('website') is-invalid @enderror"
                                       id="website" name="website" value="{{ old('website') }}"
                                       placeholder="https://example.com">
                                @error('website')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="industry" class="form-label fw-semibold">Industry</label>
                                <select class="form-select @error('industry') is-invalid @enderror" id="industry" name="industry">
                                    <option value="">Select Industry</option>
                                    <option value="technology" {{ old('industry') === 'technology' ? 'selected' : '' }}>Technology</option>
                                    <option value="healthcare" {{ old('industry') === 'healthcare' ? 'selected' : '' }}>Healthcare</option>
                                    <option value="finance" {{ old('industry') === 'finance' ? 'selected' : '' }}>Finance</option>
                                    <option value="manufacturing" {{ old('industry') === 'manufacturing' ? 'selected' : '' }}>Manufacturing</option>
                                    <option value="retail" {{ old('industry') === 'retail' ? 'selected' : '' }}>Retail</option>
                                    <option value="education" {{ old('industry') === 'education' ? 'selected' : '' }}>Education</option>
                                    <option value="real-estate" {{ old('industry') === 'real-estate' ? 'selected' : '' }}>Real Estate</option>
                                    <option value="non-profit" {{ old('industry') === 'non-profit' ? 'selected' : '' }}>Non-Profit</option>
                                    <option value="government" {{ old('industry') === 'government' ? 'selected' : '' }}>Government</option>
                                    <option value="other" {{ old('industry') === 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('industry')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Address Information -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom py-3">
                        <h5 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-map-marker-alt me-2"></i>Address Information
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="address" class="form-label fw-semibold">Street Address</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror"
                                       id="address" name="address" value="{{ old('address') }}">
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="city" class="form-label fw-semibold">City</label>
                                <input type="text" class="form-control @error('city') is-invalid @enderror"
                                       id="city" name="city" value="{{ old('city') }}">
                                @error('city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <label for="state" class="form-label fw-semibold">State/Province</label>
                                <input type="text" class="form-control @error('state') is-invalid @enderror"
                                       id="state" name="state" value="{{ old('state') }}">
                                @error('state')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <label for="postal_code" class="form-label fw-semibold">Postal Code</label>
                                <input type="text" class="form-control @error('postal_code') is-invalid @enderror"
                                       id="postal_code" name="postal_code" value="{{ old('postal_code') }}">
                                @error('postal_code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="country" class="form-label fw-semibold">Country</label>
                                <select class="form-select @error('country') is-invalid @enderror" id="country" name="country">
                                    <option value="">Select Country</option>
                                    <option value="US" {{ old('country') === 'US' ? 'selected' : '' }}>United States</option>
                                    <option value="CA" {{ old('country') === 'CA' ? 'selected' : '' }}>Canada</option>
                                    <option value="GB" {{ old('country') === 'GB' ? 'selected' : '' }}>United Kingdom</option>
                                    <option value="AU" {{ old('country') === 'AU' ? 'selected' : '' }}>Australia</option>
                                    <option value="DE" {{ old('country') === 'DE' ? 'selected' : '' }}>Germany</option>
                                    <option value="FR" {{ old('country') === 'FR' ? 'selected' : '' }}>France</option>
                                    <option value="JP" {{ old('country') === 'JP' ? 'selected' : '' }}>Japan</option>
                                    <option value="CN" {{ old('country') === 'CN' ? 'selected' : '' }}>China</option>
                                    <option value="IN" {{ old('country') === 'IN' ? 'selected' : '' }}>India</option>
                                    <option value="BR" {{ old('country') === 'BR' ? 'selected' : '' }}>Brazil</option>
                                    <option value="MX" {{ old('country') === 'MX' ? 'selected' : '' }}>Mexico</option>
                                    <option value="other" {{ old('country') === 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('country')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="timezone" class="form-label fw-semibold">Timezone</label>
                                <select class="form-select @error('timezone') is-invalid @enderror" id="timezone" name="timezone">
                                    <option value="">Select Timezone</option>
                                    <option value="America/New_York" {{ old('timezone') === 'America/New_York' ? 'selected' : '' }}>Eastern Time (ET)</option>
                                    <option value="America/Chicago" {{ old('timezone') === 'America/Chicago' ? 'selected' : '' }}>Central Time (CT)</option>
                                    <option value="America/Denver" {{ old('timezone') === 'America/Denver' ? 'selected' : '' }}>Mountain Time (MT)</option>
                                    <option value="America/Los_Angeles" {{ old('timezone') === 'America/Los_Angeles' ? 'selected' : '' }}>Pacific Time (PT)</option>
                                    <option value="Europe/London" {{ old('timezone') === 'Europe/London' ? 'selected' : '' }}>GMT</option>
                                    <option value="Europe/Paris" {{ old('timezone') === 'Europe/Paris' ? 'selected' : '' }}>CET</option>
                                    <option value="Asia/Tokyo" {{ old('timezone') === 'Asia/Tokyo' ? 'selected' : '' }}>JST</option>
                                    <option value="Australia/Sydney" {{ old('timezone') === 'Australia/Sydney' ? 'selected' : '' }}>AEST</option>
                                </select>
                                @error('timezone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Inquiry Details -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom py-3">
                        <h5 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-comment me-2"></i>Inquiry Details
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="subject" class="form-label fw-semibold">Subject *</label>
                                <input type="text" class="form-control @error('subject') is-invalid @enderror"
                                       id="subject" name="subject" value="{{ old('subject') }}" required>
                                @error('subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="inquiry_type" class="form-label fw-semibold">Inquiry Type</label>
                                <select class="form-select @error('inquiry_type') is-invalid @enderror" id="inquiry_type" name="inquiry_type">
                                    <option value="">Select Type</option>
                                    <option value="general" {{ old('inquiry_type') === 'general' ? 'selected' : '' }}>General Inquiry</option>
                                    <option value="service" {{ old('inquiry_type') === 'service' ? 'selected' : '' }}>Service Request</option>
                                    <option value="support" {{ old('inquiry_type') === 'support' ? 'selected' : '' }}>Support</option>
                                    <option value="partnership" {{ old('inquiry_type') === 'partnership' ? 'selected' : '' }}>Partnership</option>
                                    <option value="quote" {{ old('inquiry_type') === 'quote' ? 'selected' : '' }}>Quote Request</option>
                                    <option value="complaint" {{ old('inquiry_type') === 'complaint' ? 'selected' : '' }}>Complaint</option>
                                    <option value="feedback" {{ old('inquiry_type') === 'feedback' ? 'selected' : '' }}>Feedback</option>
                                    <option value="media" {{ old('inquiry_type') === 'media' ? 'selected' : '' }}>Media Inquiry</option>
                                </select>
                                @error('inquiry_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="message" class="form-label fw-semibold">Message *</label>
                                <textarea class="form-control @error('message') is-invalid @enderror"
                                          id="message" name="message" rows="6" required
                                          placeholder="Please provide details about your inquiry...">{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="budget_range" class="form-label fw-semibold">Budget Range</label>
                                <select class="form-select @error('budget_range') is-invalid @enderror" id="budget_range" name="budget_range">
                                    <option value="">Select Budget Range</option>
                                    <option value="under-5k" {{ old('budget_range') === 'under-5k' ? 'selected' : '' }}>Under $5,000</option>
                                    <option value="5k-10k" {{ old('budget_range') === '5k-10k' ? 'selected' : '' }}>$5,000 - $10,000</option>
                                    <option value="10k-25k" {{ old('budget_range') === '10k-25k' ? 'selected' : '' }}>$10,000 - $25,000</option>
                                    <option value="25k-50k" {{ old('budget_range') === '25k-50k' ? 'selected' : '' }}>$25,000 - $50,000</option>
                                    <option value="50k-100k" {{ old('budget_range') === '50k-100k' ? 'selected' : '' }}>$50,000 - $100,000</option>
                                    <option value="over-100k" {{ old('budget_range') === 'over-100k' ? 'selected' : '' }}>Over $100,000</option>
                                </select>
                                @error('budget_range')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="timeline" class="form-label fw-semibold">Project Timeline</label>
                                <select class="form-select @error('timeline') is-invalid @enderror" id="timeline" name="timeline">
                                    <option value="">Select Timeline</option>
                                    <option value="immediate" {{ old('timeline') === 'immediate' ? 'selected' : '' }}>Immediate (ASAP)</option>
                                    <option value="1-month" {{ old('timeline') === '1-month' ? 'selected' : '' }}>Within 1 month</option>
                                    <option value="3-months" {{ old('timeline') === '3-months' ? 'selected' : '' }}>Within 3 months</option>
                                    <option value="6-months" {{ old('timeline') === '6-months' ? 'selected' : '' }}>Within 6 months</option>
                                    <option value="1-year" {{ old('timeline') === '1-year' ? 'selected' : '' }}>Within 1 year</option>
                                    <option value="flexible" {{ old('timeline') === 'flexible' ? 'selected' : '' }}>Flexible</option>
                                </select>
                                @error('timeline')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional Information -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-bottom py-3">
                        <h5 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-info me-2"></i>Additional Information
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="source" class="form-label fw-semibold">How did you hear about us?</label>
                                <select class="form-select @error('source') is-invalid @enderror" id="source" name="source">
                                    <option value="">Select Source</option>
                                    <option value="website" {{ old('source') === 'website' ? 'selected' : '' }}>Website</option>
                                    <option value="search-engine" {{ old('source') === 'search-engine' ? 'selected' : '' }}>Search Engine</option>
                                    <option value="social-media" {{ old('source') === 'social-media' ? 'selected' : '' }}>Social Media</option>
                                    <option value="referral" {{ old('source') === 'referral' ? 'selected' : '' }}>Referral</option>
                                    <option value="advertisement" {{ old('source') === 'advertisement' ? 'selected' : '' }}>Advertisement</option>
                                    <option value="event" {{ old('source') === 'event' ? 'selected' : '' }}>Event</option>
                                    <option value="email" {{ old('source') === 'email' ? 'selected' : '' }}>Email Campaign</option>
                                    <option value="other" {{ old('source') === 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('source')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="preferred_contact" class="form-label fw-semibold">Preferred Contact Method</label>
                                <select class="form-select @error('preferred_contact') is-invalid @enderror" id="preferred_contact" name="preferred_contact">
                                    <option value="">Select Method</option>
                                    <option value="email" {{ old('preferred_contact') === 'email' ? 'selected' : '' }}>Email</option>
                                    <option value="phone" {{ old('preferred_contact') === 'phone' ? 'selected' : '' }}>Phone</option>
                                    <option value="video-call" {{ old('preferred_contact') === 'video-call' ? 'selected' : '' }}>Video Call</option>
                                    <option value="in-person" {{ old('preferred_contact') === 'in-person' ? 'selected' : '' }}>In-Person Meeting</option>
                                </select>
                                @error('preferred_contact')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="notes" class="form-label fw-semibold">Internal Notes</label>
                                <textarea class="form-control @error('notes') is-invalid @enderror"
                                          id="notes" name="notes" rows="3"
                                          placeholder="Internal notes (not visible to contact)">{{ old('notes') }}</textarea>
                                @error('notes')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <!-- Status & Priority -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom py-3">
                        <h5 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-cog me-2"></i>Status & Priority
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <label for="status" class="form-label fw-semibold">Status *</label>
                            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                <option value="new" {{ old('status', 'new') === 'new' ? 'selected' : '' }}>New</option>
                                <option value="contacted" {{ old('status') === 'contacted' ? 'selected' : '' }}>Contacted</option>
                                <option value="qualified" {{ old('status') === 'qualified' ? 'selected' : '' }}>Qualified</option>
                                <option value="proposal" {{ old('status') === 'proposal' ? 'selected' : '' }}>Proposal Sent</option>
                                <option value="negotiation" {{ old('status') === 'negotiation' ? 'selected' : '' }}>In Negotiation</option>
                                <option value="closed-won" {{ old('status') === 'closed-won' ? 'selected' : '' }}>Closed Won</option>
                                <option value="closed-lost" {{ old('status') === 'closed-lost' ? 'selected' : '' }}>Closed Lost</option>
                                <option value="on-hold" {{ old('status') === 'on-hold' ? 'selected' : '' }}>On Hold</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="priority" class="form-label fw-semibold">Priority</label>
                            <select class="form-select @error('priority') is-invalid @enderror" id="priority" name="priority">
                                <option value="low" {{ old('priority', 'medium') === 'low' ? 'selected' : '' }}>Low</option>
                                <option value="medium" {{ old('priority', 'medium') === 'medium' ? 'selected' : '' }}>Medium</option>
                                <option value="high" {{ old('priority') === 'high' ? 'selected' : '' }}>High</option>
                                <option value="urgent" {{ old('priority') === 'urgent' ? 'selected' : '' }}>Urgent</option>
                            </select>
                            @error('priority')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="assigned_to" class="form-label fw-semibold">Assigned To</label>
                            <select class="form-select @error('assigned_to') is-invalid @enderror" id="assigned_to" name="assigned_to">
                                <option value="">Unassigned</option>
                                <!-- This would typically be populated with users from the database -->
                                <option value="1" {{ old('assigned_to') == '1' ? 'selected' : '' }}>John Doe</option>
                                <option value="2" {{ old('assigned_to') == '2' ? 'selected' : '' }}>Jane Smith</option>
                                <option value="3" {{ old('assigned_to') == '3' ? 'selected' : '' }}>Mike Johnson</option>
                            </select>
                            @error('assigned_to')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="newsletter_subscription" name="newsletter_subscription" value="1"
                                   {{ old('newsletter_subscription') ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold" for="newsletter_subscription">
                                Subscribe to Newsletter
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Follow-up Information -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom py-3">
                        <h5 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-calendar me-2"></i>Follow-up Information
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <label for="follow_up_date" class="form-label fw-semibold">Follow-up Date</label>
                            <input type="date" class="form-control @error('follow_up_date') is-invalid @enderror"
                                   id="follow_up_date" name="follow_up_date" value="{{ old('follow_up_date') }}">
                            @error('follow_up_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="follow_up_time" class="form-label fw-semibold">Follow-up Time</label>
                            <input type="time" class="form-control @error('follow_up_time') is-invalid @enderror"
                                   id="follow_up_time" name="follow_up_time" value="{{ old('follow_up_time') }}">
                            @error('follow_up_time')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="send_auto_response" name="send_auto_response" value="1"
                                   {{ old('send_auto_response', true) ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold" for="send_auto_response">
                                Send Auto-response Email
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Create Contact
                            </button>

                            <a href="{{ route('admin.contacts.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-times me-2"></i>Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
<script>
    // Auto-set follow-up date
    document.getElementById('status').addEventListener('change', function() {
        const followUpDate = document.getElementById('follow_up_date');
        const priority = document.getElementById('priority').value;

        if (this.value === 'new' && !followUpDate.value) {
            const date = new Date();
            // Set follow-up based on priority
            switch(priority) {
                case 'urgent':
                    date.setHours(date.getHours() + 2);
                    break;
                case 'high':
                    date.setDate(date.getDate() + 1);
                    break;
                case 'medium':
                    date.setDate(date.getDate() + 3);
                    break;
                default:
                    date.setDate(date.getDate() + 7);
            }
            followUpDate.value = date.toISOString().split('T')[0];
        }
    });

    // Auto-generate full name display
    const firstNameField = document.getElementById('first_name');
    const lastNameField = document.getElementById('last_name');

    function updateDisplayName() {
        const firstName = firstNameField.value;
        const lastName = lastNameField.value;

        if (firstName || lastName) {
            document.title = `Create Contact - ${firstName} ${lastName}`.trim();
        }
    }

    firstNameField.addEventListener('input', updateDisplayName);
    lastNameField.addEventListener('input', updateDisplayName);

    // Character counter for message
    const messageField = document.getElementById('message');
    const messageCounter = document.createElement('div');
    messageCounter.className = 'form-text text-end';
    messageCounter.textContent = `${messageField.value.length} characters`;
    messageField.parentNode.appendChild(messageCounter);

    messageField.addEventListener('input', function() {
        messageCounter.textContent = `${this.value.length} characters`;
    });

    // Auto-populate timezone based on country
    document.getElementById('country').addEventListener('change', function() {
        const timezoneField = document.getElementById('timezone');
        const timezoneMap = {
            'US': 'America/New_York',
            'CA': 'America/Toronto',
            'GB': 'Europe/London',
            'AU': 'Australia/Sydney',
            'DE': 'Europe/Berlin',
            'FR': 'Europe/Paris',
            'JP': 'Asia/Tokyo',
            'CN': 'Asia/Shanghai',
            'IN': 'Asia/Kolkata'
        };

        if (timezoneMap[this.value] && !timezoneField.value) {
            timezoneField.value = timezoneMap[this.value];
        }
    });

    // Validate email format
    document.getElementById('email').addEventListener('blur', function() {
        const email = this.value;
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (email && !emailRegex.test(email)) {
            this.classList.add('is-invalid');
            let feedback = this.parentNode.querySelector('.invalid-feedback');
            if (!feedback) {
                feedback = document.createElement('div');
                feedback.className = 'invalid-feedback';
                this.parentNode.appendChild(feedback);
            }
            feedback.textContent = 'Please enter a valid email address.';
        } else {
            this.classList.remove('is-invalid');
        }
    });
</script>
@endpush
