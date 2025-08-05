@extends('layouts.app')

@section('title', 'Contact Us - Chartered Insights')
@section('meta_description', 'Get in touch with Chartered Insights for professional chartered accountancy services. Contact our expert team for consultation and support.')

@section('content')
<!-- Hero Section -->
<section class="hero-section relative overflow-x-hidden p-0 m-0">
    <div class="relative w-full p-0 m-0">
        <div class="relative w-full h-[60vh] min-h-[60vh] overflow-hidden">
            <div class="absolute inset-0 w-full h-full bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1464983953574-0892a716854b?q=80&w=1600&auto=format&fit=crop');"></div>
            <div class="absolute inset-0 bg-black/40"></div>
            <div class="relative z-20 flex flex-col items-center justify-center h-full text-center text-crisp-white px-4 md:px-12">
                <h1 class="hero-title">Contact Us</h1>
                <p class="hero-subtitle max-w-4xl mx-auto">
                    Ready to transform your business with expert chartered accountancy services? Let's start the conversation.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form & Info -->
<section class="section">
    <div class="container-custom">
        @if(session('success'))
            <div class="bg-fresh-teal text-crisp-white p-4 rounded-lg mb-8 fade-in">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    {{ session('success') }}
                </div>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div class="fade-in">
                <h2 class="text-3xl font-montserrat font-bold text-deep-chartered-blue mb-6">Get in Touch</h2>
                <p class="text-lg text-report-black mb-8">
                    Ready to discuss your business needs? Fill out the form below and one of our experts will get back to you within 24 hours.
                </p>

                <form id="contact-form" method="POST" action="{{ route('contact.submit') }}" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="first_name" class="form-label">First Name *</label>
                            <input type="text" id="first_name" name="first_name" required class="form-input" value="{{ old('first_name') }}">
                            <div class="form-error"></div>
                        </div>

                        <div>
                            <label for="last_name" class="form-label">Last Name *</label>
                            <input type="text" id="last_name" name="last_name" required class="form-input" value="{{ old('last_name') }}">
                            <div class="form-error"></div>
                        </div>
                    </div>

                    <div>
                        <label for="email" class="form-label">Email Address *</label>
                        <input type="email" id="email" name="email" required class="form-input" value="{{ old('email') }}">
                        <div class="form-error"></div>
                    </div>

                    <div>
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="tel" id="phone" name="phone" class="form-input" value="{{ old('phone') }}">
                        <div class="form-error"></div>
                    </div>

                    <div>
                        <label for="company" class="form-label">Company/Organization</label>
                        <input type="text" id="company" name="company" class="form-input" value="{{ old('company') }}">
                        <div class="form-error"></div>
                    </div>

                    <div>
                        <label for="service_interest" class="form-label">Service of Interest</label>
                        <select id="service_interest" name="service_interest" class="form-input">
                            <option value="">Please select a service</option>
                            <option value="audit_assurance" {{ old('service_interest') == 'audit_assurance' ? 'selected' : '' }}>Audit & Assurance</option>
                            <option value="tax_advisory" {{ old('service_interest') == 'tax_advisory' ? 'selected' : '' }}>Tax Advisory</option>
                            <option value="risk_advisory" {{ old('service_interest') == 'risk_advisory' ? 'selected' : '' }}>Risk Advisory</option>
                            <option value="business_consulting" {{ old('service_interest') == 'business_consulting' ? 'selected' : '' }}>Business Consulting</option>
                            <option value="financial_reporting" {{ old('service_interest') == 'financial_reporting' ? 'selected' : '' }}>Financial Reporting</option>
                            <option value="corporate_advisory" {{ old('service_interest') == 'corporate_advisory' ? 'selected' : '' }}>Corporate Advisory</option>
                            <option value="other" {{ old('service_interest') == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                        <div class="form-error"></div>
                    </div>

                    <div>
                        <label for="message" class="form-label">Message *</label>
                        <textarea id="message" name="message" rows="6" required class="form-input" placeholder="Please describe your requirements or questions...">{{ old('message') }}</textarea>
                        <div class="form-error"></div>
                    </div>

                    <div class="flex items-start">
                        <input type="checkbox" id="privacy_consent" name="privacy_consent" required class="mt-1 mr-3">
                        <label for="privacy_consent" class="text-sm text-report-black">
                            I agree to the processing of my personal data for the purpose of responding to my inquiry and acknowledge that I have read the <a href="#" class="text-fresh-teal hover:text-deep-chartered-blue">Privacy Policy</a>. *
                        </label>
                    </div>

                    <button type="submit" class="btn-primary w-full md:w-auto">
                        Send Message
                        <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                        </svg>
                    </button>
                </form>
            </div>

            <!-- Contact Information -->
            <div class="fade-in fade-in-delay-1">
                <h2 class="text-3xl font-montserrat font-bold text-deep-chartered-blue mb-6">Contact Information</h2>

                <!-- Main Office -->
                <div class="bg-audit-grey rounded-lg p-6 mb-6">
                    <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-4">Main Office - Biratnagar</h3>
                    <div class="space-y-3">
                        <div class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-fresh-teal mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <div>
                                <p class="font-semibold text-report-black">Address:</p>
                                <p class="text-report-black">Main Road, Biratnagar-15<br>Morang, Nepal</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-fresh-teal flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <div>
                                <p class="font-semibold text-report-black">Phone:</p>
                                <p class="text-report-black">+977-21-123456</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-fresh-teal flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <div>
                                <p class="font-semibold text-report-black">Email:</p>
                                <p class="text-report-black">info@charteredinsights.com</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Business Hours -->
                <div class="bg-audit-grey rounded-lg p-6 mb-6">
                    <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-4">Business Hours</h3>
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="font-semibold text-report-black">Monday - Friday:</span>
                            <span class="text-report-black">9:00 AM - 6:00 PM</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-semibold text-report-black">Saturday:</span>
                            <span class="text-report-black">9:00 AM - 2:00 PM</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-semibold text-report-black">Sunday:</span>
                            <span class="text-report-black">Closed</span>
                        </div>
                    </div>
                </div>

                <!-- Social Media -->
                <div class="bg-audit-grey rounded-lg p-6">
                    <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-4">Follow Us</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-fresh-teal rounded-full flex items-center justify-center text-crisp-white hover:bg-deep-chartered-blue transition-colors duration-200">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-fresh-teal rounded-full flex items-center justify-center text-crisp-white hover:bg-deep-chartered-blue transition-colors duration-200">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-fresh-teal rounded-full flex items-center justify-center text-crisp-white hover:bg-deep-chartered-blue transition-colors duration-200">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="section bg-audit-grey">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Our Location</h2>
            <p class="section-subtitle">
                Visit our main office in Biratnagar or reach out to us for appointments at your convenience.
            </p>
        </div>

        <div class="fade-in">
            <div class="bg-crisp-white rounded-lg shadow-lg overflow-hidden">
                <!-- Replace this with actual embedded map -->
                <div class="h-96 bg-gray-200 flex items-center justify-center">
                    <div class="text-center">
                        <svg class="w-16 h-16 text-fresh-teal mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-2">Interactive Map</h3>
                        <p class="text-report-black">Chartered Insights Main Office<br>Biratnagar, Nepal</p>
                        <a href="https://maps.google.com" target="_blank" class="btn-outline mt-4 inline-flex">
                            View on Google Maps
                            <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Alternative Contact Methods -->
<section class="section">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Other Ways to Reach Us</h2>
            <p class="section-subtitle">
                Choose the communication method that works best for you.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center fade-in">
                <div class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                </div>
                <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-2">Phone Consultation</h3>
                <p class="text-report-black mb-4">Schedule a phone consultation to discuss your needs and get initial guidance.</p>
                <a href="tel:+977-21-123456" class="btn-outline">Call Now</a>
            </div>

            <div class="text-center fade-in fade-in-delay-1">
                <div class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                </div>
                <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-2">Live Chat</h3>
                <p class="text-report-black mb-4">Get instant answers to your questions through our live chat support during business hours.</p>
                <button class="btn-outline" onclick="alert('Live chat will be available soon!')">Start Chat</button>
            </div>

            <div class="text-center fade-in fade-in-delay-2">
                <div class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-2">Schedule Meeting</h3>
                <p class="text-report-black mb-4">Book a face-to-face meeting at our office or arrange a virtual consultation.</p>
                <a href="mailto:info@charteredinsights.com?subject=Meeting Request" class="btn-outline">Schedule Now</a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contact-form');

    if (form) {
        form.addEventListener('submit', function(e) {
            let isValid = true;

            // Clear previous errors
            document.querySelectorAll('.form-error').forEach(error => {
                error.textContent = '';
            });

            document.querySelectorAll('.form-input').forEach(input => {
                input.classList.remove('error');
            });

            // Validate required fields
            const requiredFields = ['first_name', 'last_name', 'email', 'message'];

            requiredFields.forEach(fieldId => {
                const field = document.getElementById(fieldId);
                if (!field.value.trim()) {
                    showError(fieldId, 'This field is required');
                    isValid = false;
                }
            });

            // Email validation
            const email = document.getElementById('email');
            if (email.value && !isValidEmail(email.value)) {
                showError('email', 'Please enter a valid email address');
                isValid = false;
            }

            // Privacy consent validation
            const privacy = document.getElementById('privacy_consent');
            if (!privacy.checked) {
                alert('Please accept the privacy policy to continue.');
                isValid = false;
            }

            if (!isValid) {
                e.preventDefault();
            }
        });
    }

    function showError(fieldId, message) {
        const field = document.getElementById(fieldId);
        const errorElement = field.parentNode.querySelector('.form-error');
        if (errorElement) {
            errorElement.textContent = message;
        }
        field.classList.add('error');
    }

    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
});
</script>
@endpush
