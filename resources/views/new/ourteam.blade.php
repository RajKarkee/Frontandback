@extends('new.layouts.sidebar')

@section('styles')
   <link rel="stylesheet" href="{{ asset('css/ourteam.css') }}">
  
    
@endsection

@section('content')
    <div class="rka-scope" id="main-content">
        <main>
            <!-- Hero Section -->
            <section class="hero-section">
                <div class="hero-content gsap-animate">
                    <h1>Meet Our Team</h1>
                    <p>Meet our team of dedicated professionals delivering exceptional results for our clients.</p>
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="{{ route('careers') }}" class="btn-primary-filled"><i class="fas fa-briefcase"></i> Join Our Team</a>
                        <a href="{{ route('contact') }}" class="btn-primary-outline"><i class="fas fa-envelope"></i> Contact Us</a>
                    </div>  
                </div>
            </section>

            <!-- Team Section -->
            <section class="team-section">
                <div class="section-container">
                    <h2 class="gsap-animate">Meet Our Team</h2>
                    <p class="lead gsap-animate">Meet our team of dedicated professionals delivering exceptional results for our clients.</p>
                    <div class="row g-8">
                        <div class="col-lg-4 col-md-6 col-12 gsap-animate">
                            <div class="team-card">
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=400&auto=format&fit=crop" alt="Priya Sharma" class="gsap-image">
                                <div class="content">
                                    <h3>Priya Sharma</h3>
                                    <p class="role">Managing Director</p>
                                    <p>With over 15 years of experience in financial consulting, Priya leads our team with a vision for innovation and client success.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 gsap-animate" data-delay="0.08">
                            <div class="team-card">
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=400&auto=format&fit=crop" alt="Rajesh Thapa" class="gsap-image">
                                <div class="content">
                                    <h3>Rajesh Thapa</h3>
                                    <p class="role">Head of Tax Advisory</p>
                                    <p>Rajesh specializes in tax strategy, ensuring compliance and optimization for clients across diverse industries.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 gsap-animate" data-delay="0.16">
                            <div class="team-card">
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=400&auto=format&fit=crop" alt="Sunita Karki" class="gsap-image">
                                <div class="content">
                                    <h3>Sunita Karki</h3>
                                    <p class="role">Director of Business Consulting</p>
                                    <p>Sunita drives strategic initiatives, helping clients achieve sustainable growth through tailored solutions.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 gsap-animate">
                            <div class="team-card">
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=400&auto=format&fit=crop" alt="Anil Gurung" class="gsap-image">
                                <div class="content">
                                    <h3>Anil Gurung</h3>
                                    <p class="role">Audit Manager</p>
                                    <p>Anil oversees audit engagements, ensuring accuracy and compliance with the highest industry standards.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 gsap-animate" data-delay="0.08">
                            <div class="team-card">
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=400&auto=format&fit=crop" alt="Meena Adhikari" class="gsap-image">
                                <div class="content">
                                    <h3>Meena Adhikari</h3>
                                    <p class="role">HR Manager</p>
                                    <p>Meena fosters a supportive and inclusive workplace, driving talent acquisition and employee development.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 gsap-animate" data-delay="0.16">
                            <div class="team-card">
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=400&auto=format&fit=crop" alt="Suresh Bhattarai" class="gsap-image">
                                <div class="content">
                                    <h3>Suresh Bhattarai</h3>
                                    <p class="role">IT Director</p>
                                    <p>Suresh leads our technology initiatives, ensuring robust systems and innovative digital solutions.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 gsap-animate">
                            <div class="team-card">
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=400&auto=format&fit=crop" alt="Nisha Poudel" class="gsap-image">
                                <div class="content">
                                    <h3>Nisha Poudel</h3>
                                    <p class="role">Managing Director</p>
                                    <p>With over 15 years of experience in financial consulting, Nisha leads our team with a vision for innovation and client success.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 gsap-animate" data-delay="0.08">
                            <div class="team-card">
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=400&auto=format&fit=crop" alt="Hari Shrestha" class="gsap-image">
                                <div class="content">
                                    <h3>Hari Shrestha</h3>
                                    <p class="role">Head of Tax Advisory</p>
                                    <p>Hari specializes in tax strategy, ensuring compliance and optimization for clients across diverse industries.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 gsap-animate" data-delay="0.16">
                            <div class="team-card">
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=400&auto=format&fit=crop" alt="Rita Bhandari" class="gsap-image">
                                <div class="content">
                                    <h3>Rita Bhandari</h3>
                                    <p class="role">Director of Business Consulting</p>
                                    <p>Rita drives strategic initiatives, helping clients achieve sustainable growth through tailored solutions.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 gsap-animate">
                            <div class="team-card">
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=400&auto=format&fit=crop" alt="Kiran Lama" class="gsap-image">
                                <div class="content">
                                    <h3>Kiran Lama</h3>
                                    <p class="role">Audit Manager</p>
                                    <p>Kiran oversees audit engagements, ensuring accuracy and compliance with the highest industry standards.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 gsap-animate" data-delay="0.08">
                            <div class="team-card">
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=400&auto=format&fit=crop" alt="Sita Rai" class="gsap-image">
                                <div class="content">
                                    <h3>Sita Rai</h3>
                                    <p class="role">HR Manager</p>
                                    <p>Sita fosters a supportive and inclusive workplace, driving talent acquisition and employee development.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 gsap-animate" data-delay="0.16">
                            <div class="team-card">
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=400&auto=format&fit=crop" alt="Bikash Tamang" class="gsap-image">
                                <div class="content">
                                    <h3>Bikash Tamang</h3>
                                    <p class="role">IT Director</p>
                                    <p>Bikash leads our technology initiatives, ensuring robust systems and innovative digital solutions.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 gsap-animate">
                            <div class="team-card">
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=400&auto=format&fit=crop" alt="Anita Subedi" class="gsap-image">
                                <div class="content">
                                    <h3>Anita Subedi</h3>
                                    <p class="role">Managing Director</p>
                                    <p>Anita leads our team with a vision for innovation and client success, backed by over 15 years in financial consulting.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 gsap-animate" data-delay="0.08">
                            <div class="team-card">
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=400&auto=format&fit=crop" alt="Deepak Khadka" class="gsap-image">
                                <div class="content">
                                    <h3>Deepak Khadka</h3>
                                    <p class="role">Head of Tax Advisory</p>
                                    <p>Deepak specializes in tax strategy, ensuring compliance and optimization for clients across diverse industries.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 gsap-animate" data-delay="0.16">
                            <div class="team-card">
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=400&auto=format&fit=crop" alt="Laxmi Dahal" class="gsap-image">
                                <div class="content">
                                    <h3>Laxmi Dahal</h3>
                                    <p class="role">Director of Business Consulting</p>
                                    <p>Laxmi drives strategic initiatives, helping clients achieve sustainable growth through tailored solutions.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
    @include('new.layouts.contactusform')
@endsection

@section('scripts')
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- GSAP and ScrollTrigger -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script>
        // GSAP Animations
        window.addEventListener('load', function () {
            gsap.registerPlugin(ScrollTrigger);

            // General reveal animations for text and cards
            gsap.utils.toArray('.gsap-animate').forEach((el) => {
                const delay = parseFloat(el.getAttribute('data-delay')) || 0;
                gsap.fromTo(el,
                    { opacity: 0, y: 40 },
                    {
                        opacity: 1,
                        y: 0,
                        duration: 1,
                        delay,
                        ease: 'power4.out',
                        scrollTrigger: {
                            trigger: el,
                            start: 'top 85%',
                            once: true,
                            invalidateOnRefresh: true
                        }
                    }
                );
            });

            // Button animations
            gsap.utils.toArray('.btn-primary-filled, .btn-primary-outline').forEach((btn) => {
                gsap.fromTo(btn,
                    { opacity: 0, scale: 0.9 },
                    {
                        opacity: 1,
                        scale: 1,
                        duration: 0.8,
                        ease: 'power4.out',
                        scrollTrigger: {
                            trigger: btn,
                            start: 'top 90%',
                            once: true
                        }
                    }
                );
            });

            // Team card image animations
            gsap.utils.toArray('.gsap-image').forEach((img, i) => {
                gsap.fromTo(img,
                    { opacity: 0, scale: 0.8 },
                    {
                        opacity: 1,
                        scale: 1,
                        duration: 0.8,
                        delay: i * 0.08,
                        ease: 'power4.out',
                        scrollTrigger: {
                            trigger: img,
                            start: 'top 85%',
                            once: true
                        }
                    }
                );
            });

            // Team card animations
            gsap.utils.toArray('.team-card').forEach((card, i) => {
                gsap.fromTo(card,
                    { opacity: 0, y: 20 },
                    {
                        opacity: 1,
                        y: 0,
                        duration: 0.8,
                        delay: i * 0.08,
                        ease: 'power4.out',
                        scrollTrigger: {
                            trigger: card,
                            start: 'top 85%',
                            once: true
                        }
                    }
                );
            });

            // Recalc positions after images affect layout
            ScrollTrigger.refresh();
        });
    </script>
@endsection