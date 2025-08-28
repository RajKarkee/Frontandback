
            <!-- Contact Section (Form and Info Side by Side) -->
            <section class="contact-section" id="contact">
                <div class="section-container">
                    <h2 class="gsap-animate">Get in Touch</h2>
                    <p class="lead gsap-animate">Ready to discuss your business needs? Fill out the form below and one of our experts will get back to you within 24 hours.</p>
                    <div class="row g-4">
                        <div class="col-lg-6 gsap-animate">
                            <form class="contact-form" action="#" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="first-name" class="form-label">First Name *</label>
                                        <input type="text" class="form-control" id="first-name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="last-name" class="form-label">Last Name *</label>
                                        <input type="text" class="form-control" id="last-name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email Address *</label>
                                        <input type="email" class="form-control" id="email" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone" class="form-label">Phone Number</label>
                                        <input type="tel" class="form-control" id="phone">
                                    </div>
                                    <div class="col-12">
                                        <label for="company" class="form-label">Company/Organization</label>
                                        <input type="text" class="form-control" id="company">
                                    </div>
                                    <div class="col-12">
                                        <label for="service" class="form-label">Service of Interest</label>
                                        <select class="form-select" id="service">
                                            <option selected disabled>Please select a service</option>
                                            <option value="audit">Audit & Assurance</option>
                                            <option value="tax">Tax Advisory</option>
                                            <option value="risk">Risk Advisory</option>
                                            <option value="consulting">Business Consulting</option>
                                            <option value="financial">Financial Reporting</option>
                                            <option value="corporate">Corporate Advisory</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="message" class="form-label">Message *</label>
                                        <textarea class="form-control" id="message" rows="5" required placeholder="Please describe your requirements or questions..."></textarea>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="privacy" required>
                                            <label class="form-check-label" for="privacy">
                                                I agree to the processing of my personal data for the purpose of responding to my inquiry and acknowledge that I have read the <a href="#" class="text-accent">Privacy Policy</a>.
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn-primary-filled"><i class="fas fa-paper-plane"></i> Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6 gsap-animate" data-delay="0.2">
                            <div class="contact-info-card mb-4">
                                <h3>Main Office - Biratnagar</h3>
                                <p><strong>Address:</strong> Main Road, Biratnagar-15, Morang, Nepal</p>
                                <p><strong>Phone:</strong> <a href="tel:+97721123456" class="text-secondary">+977-21-123456</a></p>
                                <p><strong>Email:</strong> <a href="mailto:info@charteredinsights.com" class="text-secondary">info@charteredinsights.com</a></p>
                            </div>
                            <div class="contact-info-card">
                                <h3>Business Hours</h3>
                                <ul>
                                    <li><strong>Monday - Friday:</strong> 9:00 AM - 6:00 PM</li>
                                    <li><strong>Saturday:</strong> 9:00 AM - 2:00 PM</li>
                                    <li><strong>Sunday:</strong> Closed</li>
                                </ul>
                                <h3>Follow Us</h3>
                                <div class="social-links">
                                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                                    <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
<style>
/* =======================
   CONTACT SECTION STYLES
   ======================= */
.contact-section {
    padding: 5rem 0;
    background: var(--light);
}

.contact-section h2 {
    font-size: 2.8rem;
    text-align: center;
    margin-bottom: 1.5rem;
}

.contact-section .lead {
    font-size: 1.2rem;
    color: var(--gray);
    max-width: 1000px;
    margin: 0 auto 3rem;
    text-align: center;
}

/* Contact Form */
.contact-form {
    background: linear-gradient(135deg, var(--white), var(--light));
    border-radius: 20px;
    padding: 2rem;
    box-shadow: 0 8px 25px var(--shadow);
}

.contact-form .form-control {
    border: 1px solid var(--lighter);
    border-radius: 8px;
    padding: 0.7rem;
    font-size: 0.95rem;
    font-family: 'Inter', sans-serif;
    transition: var(--transition);
}

.contact-form .form-control:focus {
    border-color: var(--secondary);
    box-shadow: 0 0 6px rgba(0, 144, 212, 0.2);
    outline: none;
}

.contact-form .form-label {
    font-size: 0.95rem;
    font-weight: 500;
    color: var(--primary);
    margin-bottom: 0.4rem;
}

.contact-form .form-select {
    border: 1px solid var(--lighter);
    border-radius: 8px;
    padding: 0.7rem;
    font-size: 0.95rem;
    font-family: 'Inter', sans-serif;
    transition: var(--transition);
}

.contact-form .form-select:focus {
    border-color: var(--secondary);
    box-shadow: 0 0 6px rgba(0, 144, 212, 0.2);
    outline: none;
}

.contact-form .form-check-label {
    font-size: 0.9rem;
    color: var(--gray);
}

.contact-form .form-check-input {
    border-color: var(--lighter);
    transition: var(--transition);
}

.contact-form .form-check-input:checked {
    background-color: var(--secondary);
    border-color: var(--secondary);
}

.contact-form .btn-primary-filled {
    width: 100%;
    max-width: 260px;
    margin: 1rem auto 0;
    display: block;
    padding: 0.6rem 2.5rem;
}

/* Contact Info Card */
.contact-info-card {
    background: linear-gradient(135deg, var(--white), var(--light));
    border-radius: 20px;
    padding: 2rem;
    box-shadow: 0 8px 25px var(--shadow);
}

.contact-info-card h3 {
    font-size: 1.8rem;
    margin-bottom: 1rem;
    position: relative;
    transition: var(--transition);
}

.contact-info-card h3:hover {
    color: var(--accent);
    transform: scale(1.03);
}

.contact-info-card h3::after {
    content: '';
    position: absolute;
    bottom: -2px;
    left: 0;
    width: 0;
    height: 2px;
    background: var(--accent);
    transition: width 0.3s ease;
}

.contact-info-card h3:hover::after {
    width: 100%;
}

.contact-info-card p,
.contact-info-card ul li {
    color: var(--gray);
    font-size: 1rem;
    margin-bottom: 0.7rem;
}

.contact-info-card .text-secondary {
    color: var(--secondary);
    text-decoration: none;
    transition: var(--transition);
}

.contact-info-card .text-secondary:hover,
.contact-info-card .text-secondary:focus {
    color: var(--accent);
    text-decoration: none;
}

.contact-info-card ul {
    padding: 0;
    list-style: none;
}

.contact-info-card .social-links {
    display: flex;
    justify-content: center;
    gap: 0.8rem;
    margin-top: 1.2rem;
}

.contact-info-card .social-links a {
    color: var(--white);
    font-size: 1rem;
    background: linear-gradient(90deg, var(--secondary), var(--accent));
    width: 36px;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    text-decoration: none;
    transition: var(--transition);
}

.contact-info-card .social-links a:hover,
.contact-info-card .social-links a:focus {
    background: linear-gradient(90deg, var(--accent), #00d4ff);
    transform: scale(1.1);
    box-shadow: 0 4px 12px rgba(0, 144, 212, 0.25);
    text-decoration: none;
}

/* =======================
   RESPONSIVE ADJUSTMENTS
   ======================= */
@media (max-width: 991px) {
    .contact-section h2 {
        font-size: 2.5rem;
    }
    .contact-form {
        padding: 1.8rem;
    }
    .contact-info-card {
        padding: 1.8rem;
    }
    .contact-info-card h3 {
        font-size: 1.6rem;
    }
    .contact-form .btn-primary-filled {
        max-width: 240px;
        padding: 0.5rem 2rem;
        font-size: 0.95rem;
    }
}

@media (max-width: 767px) {
    .contact-section {
        padding: 4rem 0;
    }
    .contact-section h2 {
        font-size: 2.2rem;
    }
    .contact-section .lead {
        font-size: 1rem;
    }
    .contact-form {
        padding: 1.5rem;
    }
    .contact-form .form-label {
        font-size: 0.9rem;
    }
    .contact-form .form-control,
    .contact-form .form-select {
        font-size: 0.9rem;
        padding: 0.6rem;
    }
    .contact-form .form-check-label {
        font-size: 0.85rem;
    }
    .contact-form .btn-primary-filled {
        max-width: 220px;
        padding: 0.5rem 2rem;
        font-size: 0.9rem;
    }
    .contact-info-card {
        padding: 1.5rem;
    }
    .contact-info-card h3 {
        font-size: 1.5rem;
    }
    .contact-info-card p,
    .contact-info-card ul li {
        font-size: 0.9rem;
    }
    .contact-info-card .social-links a {
        width: 32px;
        height: 32px;
        font-size: 0.9rem;
    }
}

@media (max-width: 576px) {
    .contact-section h2 {
        font-size: 1.8rem;
    }
    .contact-section .lead {
        font-size: 0.9rem;
    }
    .contact-form {
        padding: 1.2rem;
    }
    .contact-form .form-label {
        font-size: 0.85rem;
    }
    .contact-form .form-control,
    .contact-form .form-select {
        font-size: 0.85rem;
        padding: 0.5rem;
    }
    .contact-form .form-check-label {
        font-size: 0.8rem;
    }
    .contact-form .btn-primary-filled {
        max-width: 200px;
        padding: 0.4rem 1.5rem;
        font-size: 0.85rem;
    }
    .contact-info-card {
        padding: 1.2rem;
    }
    .contact-info-card h3 {
        font-size: 1.3rem;
    }
    .contact-info-card p,
    .contact-info-card ul li {
        font-size: 0.85rem;
    }
    .contact-info-card .social-links a {
        width: 30px;
        height: 30px;
        font-size: 0.85rem;
    }
}

@media (max-width: 400px) {
    .contact-section {
        padding: 3rem 0;
    }
    .contact-section h2 {
        font-size: 1.6rem;
    }
    .contact-section .lead {
        font-size: 0.85rem;
    }
    .contact-form {
        padding: 1rem;
    }
    .contact-form .form-label {
        font-size: 0.8rem;
    }
    .contact-form .form-control,
    .contact-form .form-select {
        font-size: 0.8rem;
        padding: 0.4rem;
    }
    .contact-form .form-check-label {
        font-size: 0.75rem;
    }
    .contact-form .btn-primary-filled {
        max-width: 180px;
        padding: 0.4rem 1.2rem;
        font-size: 0.8rem;
    }
    .contact-info-card {
        padding: 1rem;
    }
    .contact-info-card h3 {
        font-size: 1.2rem;
    }
    .contact-info-card p,
    .contact-info-card ul li {
        font-size: 0.8rem;
    }
    .contact-info-card .social-links a {
        width: 28px;
        height: 28px;
        font-size: 0.8rem;
    }
}

    </style>