@extends('new.layouts.sidebar')

@section('styles')
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts: Inter & Lora -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Lora:wght@500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #00213f;
            --secondary: #0090d4;
            --accent: #00b4f2;
            --light: #f8fcff;
            --lighter: #e8f0fc;
            --white: #ffffff;
            --gray: #6c757d;
            --shadow: rgba(0, 33, 63, 0.1);
            --transition: all 0.3s cubic-bezier(0.4, 0.0, 0.2, 1);
        }

        .rka-scope {
            font-family: 'Inter', sans-serif;
            background: var(--light);
            color: var(--primary);
            line-height: 1.8;
            overflow-x: hidden;
        }

        .rka-scope main {
            margin: 0;
            padding: 0;
            width: 100%;
        }

        .rka-scope h1, .rka-scope h2, .rka-scope h3, .rka-scope h4, .rka-scope h5, .rka-scope h6 {
            font-family: 'Lora', serif;
            font-weight: 700;
            color: var(--primary);
            letter-spacing: 0.3px;
        }

        .section-container {
            max-width: 1600px; /* Wider container */
            margin: 0 auto;
            padding: 0 2rem;
        }

        /* Hero Section */
        .hero-section {
            position: relative;
            height: 90vh;
            min-height: 600px;
            overflow: hidden;
            background: linear-gradient(135deg, rgba(0, 33, 63, 0.8), rgba(0, 144, 212, 0.7)), url('https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&w=1920&h=1080') center/cover;
            margin: 0;
            padding: 0;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-content {
            text-align: center;
            max-width: 900px;
            width: 90%;
            padding: 3rem;
            color: var(--white);
            background: rgba(0, 33, 63, 0.2);
            backdrop-filter: blur(12px);
            border-radius: 32px;
            box-shadow: 0 12px 45px rgba(0, 33, 63, 0.25);
        }

        .hero-content h1 {
            font-size: 4.5rem;
            margin-bottom: 1.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--white), var(--accent));
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-content p {
            font-size: 1.3rem;
            font-weight: 400;
            margin-bottom: 2.5rem;
            opacity: 0.9;
        }

        .btn-primary-filled, .btn-primary-outline {
            font-family: 'Inter', sans-serif;
            font-size: 1rem; /* Smaller font size */
            font-weight: 600;
            padding: 0.6rem 2.8rem; /* Smaller height, wider width */
            border-radius: 50px;
            transition: var(--transition);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            margin: 0.5rem;
            position: relative;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0, 33, 63, 0.15); /* Subtle shadow */
        }

        .btn-primary-filled {
            background: linear-gradient(90deg, var(--secondary), var(--accent));
            color: var(--white);
            border: none;
        }

        .btn-primary-filled:hover {
            background: linear-gradient(90deg, var(--accent), #00d4ff);
            transform: translateY(-2px) scale(1.03);
            box-shadow: 0 6px 15px rgba(0, 144, 212, 0.25);
        }

        .btn-primary-outline {
            background: transparent;
            border: 2px solid var(--secondary);
            color: var(--secondary);
        }

        .btn-primary-outline:hover {
            background: var(--secondary);
            color: var(--white);
            transform: translateY(-2px) scale(1.03);
            box-shadow: 0 6px 15px rgba(0, 33, 63, 0.15);
        }

        .btn-primary-filled i, .btn-primary-outline i {
            font-size: 1rem;
            margin-left: 6px;
            transition: transform 0.3s;
        }

        .btn-primary-filled:hover i, .btn-primary-outline:hover i {
            transform: translateX(3px);
        }

        /* Why Choose Section */
        .why-choose-section {
            padding: 5rem 0;
            background: var(--light);
        }

        .why-choose-section h2 {
            font-size: 2.8rem;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .why-choose-section .lead {
            font-size: 1.2rem;
            color: var(--gray);
            max-width: 1000px;
            margin: 0 auto 3rem;
            text-align: center;
        }

        .benefit-card {
            background: linear-gradient(135deg, var(--white), var(--light));
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 8px 25px var(--shadow);
            text-align: center;
            height: 300px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: var(--transition);
        }

        .benefit-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 30px rgba(0, 33, 63, 0.15);
        }

        .benefit-card i {
            font-size: 2rem;
            color: var(--secondary);
            margin-bottom: 1.2rem;
            transition: var(--transition);
        }

        .benefit-card:hover i {
            color: var(--accent);
            transform: scale(1.1);
        }

        .benefit-card h3 {
            font-size: 1.5rem;
            margin-bottom: 0.8rem;
            position: relative;
            transition: var(--transition);
        }

        .benefit-card h3:hover {
            color: var(--accent);
            transform: scale(1.03);
        }

        .benefit-card h3::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 2px;
            background: var(--accent);
            transition: width 0.3s ease;
        }

        .benefit-card h3:hover::after {
            width: 80%;
        }

        .benefit-card p {
            font-size: 0.95rem;
            color: var(--gray);
            margin-bottom: 1.2rem;
            flex-grow: 1;
        }

        /* Current Openings Section */
        .openings-section {
            padding: 5rem 0;
            background: var(--light);
        }

        .openings-section h2 {
            font-size: 2.8rem;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .openings-section .lead {
            font-size: 1.2rem;
            color: var(--gray);
            max-width: 1000px;
            margin: 0 auto 3rem;
            text-align: center;
        }

        .nav-tabs {
            border-bottom: 2px solid var(--lighter);
            margin-bottom: 2rem;
            justify-content: center;
        }

        .nav-tabs .nav-link {
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            font-weight: 600;
            color: var(--gray);
            padding: 0.8rem 1.5rem;
            border: none;
            border-bottom: 3px solid transparent;
            transition: var(--transition);
        }

        .nav-tabs .nav-link:hover {
            color: var(--secondary);
            border-bottom: 3px solid var(--secondary);
        }

        .nav-tabs .nav-link.active {
            color: var(--secondary);
            background: transparent;
            border-bottom: 3px solid var(--secondary);
        }

        .job-banner {
            background: linear-gradient(135deg, var(--white), var(--light));
            border-bottom: 1px solid var(--lighter);
            padding: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: var(--transition);
            position: relative;
            width: 100%;
        }

        .job-banner:hover {
            transform: translateY(-4px);
            box-shadow: 0 4px 15px rgba(0, 33, 63, 0.1);
        }

        .job-banner .job-info {
            flex-grow: 1;
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            align-items: center;
        }

        .job-banner h3 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
            color: var(--primary);
            flex-basis: 100%;
            position: relative;
            transition: var(--transition);
        }

        .job-banner h3:hover {
            color: var(--accent);
            transform: scale(1.02);
        }

        .job-banner h3::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--accent);
            transition: width 0.3s ease;
        }

        .job-banner h3:hover::after {
            width: 50%;
        }

        .job-banner p {
            font-size: 0.95rem;
            color: var(--gray);
            margin: 0;
            flex: 1 1 auto;
        }

        .job-banner .featured {
            font-size: 0.85rem;
            color: var(--secondary);
            font-weight: 600;
            background: rgba(0, 144, 212, 0.1);
            padding: 0.3rem 0.8rem;
            border-radius: 12px;
            margin-right: 1rem;
        }

        .job-banner .btn-container {
            display: flex;
            gap: 1rem;
            flex-shrink: 0;
        }

        .job-banner .btn-primary-filled, .job-banner .btn-primary-outline {
            padding: 0.5rem 2.5rem; /* Smaller height, wider width */
            font-size: 0.95rem; /* Smaller font */
            max-width: 180px; /* Wider buttons */
        }

        .job-details {
            background: var(--white);
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 4px 15px var(--shadow);
            margin-top: 1rem;
            margin-bottom: 1rem;
        }

        .job-details h4 {
            font-size: 1.3rem;
            margin-bottom: 1rem;
            color: var(--primary);
        }

        .job-details ul {
            padding-left: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .job-details ul li {
            font-size: 0.95rem;
            color: var(--gray);
            margin-bottom: 0.5rem;
        }

        .job-details p {
            font-size: 0.95rem;
            color: var(--gray);
            margin-bottom: 1rem;
        }

        .view-more-container {
            text-align: center;
            margin-top: 2rem;
        }

        .view-more-container .btn-primary-filled {
            max-width: 320px; /* Wider button */
            padding: 0.6rem 2.8rem; /* Smaller height */
            font-size: 1rem;
        }

        /* Testimonials Section */
        .testimonials-section {
            padding: 5rem 0;
            background: linear-gradient(180deg, var(--lighter), var(--white));
        }

        .testimonials-section h2 {
            font-size: 2.8rem;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .testimonials-section .lead {
            font-size: 1.2rem;
            color: var(--gray);
            max-width: 1000px;
            margin: 0 auto 3rem;
            text-align: center;
        }

        .testimonial-card {
            background: linear-gradient(135deg, var(--white), var(--light));
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 8px 25px var(--shadow);
            text-align: center;
            height: 260px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: var(--transition);
        }

        .testimonial-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 30px rgba(0, 33, 63, 0.15);
        }

        .testimonial-card p {
            font-size: 0.95rem;
            color: var(--gray);
            margin-bottom: 1.2rem;
            flex-grow: 1;
            font-style: italic;
        }

        .testimonial-card h4 {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
        }

        .testimonial-card .role {
            font-size: 0.9rem;
            color: var(--secondary);
        }

        /* HR Contact Section */
        .hr-contact-section {
            padding: 5rem 0;
            background: var(--light);
        }

        .hr-contact-section h2 {
            font-size: 2.8rem;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .hr-contact-section .lead {
            font-size: 1.2rem;
            color: var(--gray);
            max-width: 1000px;
            margin: 0 auto 3rem;
            text-align: center;
        }

        .hr-contact-card {
            background: var(--white); /* Removed gradient for cleaner look */
            border-radius: 16px;
            padding: 4rem 3rem; /* Increased padding for spacious feel */
            box-shadow: 0 4px 15px var(--shadow); /* Lighter shadow */
            max-width: 1200px; /* Wide but centered */
            margin: 0 auto;
            text-align: center; /* Centered content */
        }

        .hr-contact-card h3 {
            font-size: 2rem;
            margin-bottom: 1.5rem;
            position: relative;
            transition: var(--transition);
        }

        .hr-contact-card h3:hover {
            color: var(--accent);
            transform: scale(1.03);
        }

        .hr-contact-card h3::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 2px;
            background: var(--accent);
            transition: width 0.3s ease;
        }

        .hr-contact-card h3:hover::after {
            width: 50%;
        }

        .hr-contact-card p, .hr-contact-card ul li {
            font-size: 1.1rem;
            color: var(--gray);
            margin-bottom: 1rem;
            line-height: 1.6;
        }

        .hr-contact-card .text-secondary {
            color: var(--secondary);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
        }

        .hr-contact-card .text-secondary:hover,
        .hr-contact-card .text-secondary:focus {
            color: var(--accent);
            text-decoration: underline;
        }

        .hr-contact-card ul {
            padding: 0;
            list-style: none;
            margin-bottom: 2rem;
        }

        .hr-contact-card .btn-primary-filled, .hr-contact-card .btn-primary-outline {
            width: 100%;
            max-width: 320px; /* Wider buttons */
            margin: 1rem auto;
            padding: 0.6rem 2.8rem; /* Smaller height */
            font-size: 1rem; /* Smaller font */
            border-radius: 50px;
        }

        .hr-contact-card .btn-primary-outline {
            border-color: var(--secondary);
            color: var(--secondary);
        }

        .hr-contact-card .btn-primary-outline:hover {
            background: var(--secondary);
            color: var(--white);
        }

        /* Modal Overlay */
        .modal-content {
            background: linear-gradient(135deg, var(--white), var(--light));
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 8px 25px var(--shadow);
        }

        .modal-header {
            border-bottom: none;
            padding-bottom: 0;
        }

        .modal-title {
            font-size: 1.8rem;
            color: var(--primary);
        }

        .modal-body .form-label {
            font-size: 0.95rem;
            font-weight: 500;
            color: var(--primary);
            margin-bottom: 0.4rem;
        }

        .modal-body .form-control {
            border: 1px solid var(--lighter);
            border-radius: 8px;
            padding: 0.7rem;
            font-size: 0.95rem;
            font-family: 'Inter', sans-serif;
            transition: var(--transition);
        }

        .modal-body .form-control:focus {
            border-color: var(--secondary);
            box-shadow: 0 0 6px rgba(0, 144, 212, 0.2);
            outline: none;
        }

        .modal-body .form-control::file-selector-button {
            background: var(--secondary);
            color: var(--white);
            border: none;
            border-radius: 8px;
            padding: 0.5rem 1rem;
            transition: var(--transition);
        }

        .modal-body .form-control::file-selector-button:hover {
            background: var(--accent);
        }

        .modal-body .btn-primary-filled {
            width: 100%;
            max-width: 300px; /* Wider button */
            margin: 1rem auto 0;
            padding: 0.6rem 2.8rem; /* Smaller height */
            font-size: 1rem;
        }

        /* Responsive Adjustments */
        @media (min-width: 1400px) {
            .section-container {
                max-width: 1600px;
            }
        }

        @media (max-width: 991px) {
            .hero-section {
                height: 80vh;
                min-height: 500px;
            }
            .hero-content {
                max-width: 700px;
                padding: 2rem;
            }
            .hero-content h1 {
                font-size: 3.5rem;
            }
            .hero-content p {
                font-size: 1.2rem;
            }
            .why-choose-section h2, .openings-section h2, .testimonials-section h2, .hr-contact-section h2 {
                font-size: 2.5rem;
            }
            .benefit-card {
                height: 280px;
                padding: 1.8rem;
            }
            .benefit-card h3 {
                font-size: 1.3rem;
            }
            .benefit-card p {
                font-size: 0.9rem;
            }
            .job-banner {
                padding: 1.2rem;
            }
            .job-banner h3 {
                font-size: 1.3rem;
            }
            .job-banner p {
                font-size: 0.9rem;
            }
            .job-banner .btn-primary-filled, .job-banner .btn-primary-outline {
                max-width: 160px;
                padding: 0.4rem 2rem;
                font-size: 0.9rem;
            }
            .testimonial-card {
                height: 240px;
                padding: 1.8rem;
            }
            .testimonial-card h4 {
                font-size: 1.1rem;
            }
            .testimonial-card p {
                font-size: 0.9rem;
            }
            .hr-contact-card {
                padding: 2.5rem;
            }
            .hr-contact-card h3 {
                font-size: 1.8rem;
            }
            .modal-title {
                font-size: 1.6rem;
            }
            .view-more-container .btn-primary-filled {
                max-width: 280px;
                padding: 0.5rem 2.5rem;
                font-size: 0.95rem;
            }
        }

        @media (max-width: 767px) {
            .hero-section {
                height: 70vh;
                min-height: 450px;
            }
            .hero-content {
                padding: 1.8rem;
                margin-top: 1.5rem;
            }
            .hero-content h1 {
                font-size: 2.8rem;
            }
            .hero-content p {
                font-size: 1.1rem;
            }
            .btn-primary-filled, .btn-primary-outline {
                padding: 0.5rem 2.5rem;
                font-size: 0.9rem;
                max-width: 200px;
            }
            .btn-primary-filled i, .btn-primary-outline i {
                font-size: 0.9rem;
                margin-left: 5px;
            }
            .why-choose-section, .openings-section, .testimonials-section, .hr-contact-section {
                padding: 4rem 0;
            }
            .why-choose-section h2, .openings-section h2, .testimonials-section h2, .hr-contact-section h2 {
                font-size: 2.2rem;
            }
            .why-choose-section .lead, .openings-section .lead, .testimonials-section .lead, .hr-contact-section .lead {
                font-size: 1rem;
            }
            .benefit-card {
                height: 260px;
                padding: 1.5rem;
            }
            .benefit-card i {
                font-size: 1.8rem;
            }
            .benefit-card h3 {
                font-size: 1.2rem;
            }
            .benefit-card p {
                font-size: 0.85rem;
            }
            .job-banner {
                flex-direction: column;
                align-items: flex-start;
                padding: 1rem;
            }
            .job-banner .job-info {
                flex-direction: column;
                gap: 0.5rem;
            }
            .job-banner h3 {
                font-size: 1.2rem;
            }
            .job-banner p {
                font-size: 0.85rem;
            }
            .job-banner .btn-container {
                flex-direction: column;
                width: 100%;
            }
            .job-banner .btn-primary-filled, .job-banner .btn-primary-outline {
                max-width: 100%;
                padding: 0.4rem 2rem;
                font-size: 0.85rem;
            }
            .job-details {
                padding: 1.5rem;
            }
            .job-details h4 {
                font-size: 1.2rem;
            }
            .job-details ul li, .job-details p {
                font-size: 0.9rem;
            }
            .testimonial-card {
                height: 220px;
                padding: 1.5rem;
            }
            .testimonial-card h4 {
                font-size: 1rem;
            }
            .testimonial-card p {
                font-size: 0.85rem;
            }
            .hr-contact-card {
                padding: 2rem;
            }
            .hr-contact-card h3 {
                font-size: 1.6rem;
            }
            .hr-contact-card p, .hr-contact-card ul li {
                font-size: 1rem;
            }
            .hr-contact-card .btn-primary-filled, .hr-contact-card .btn-primary-outline {
                max-width: 280px;
                padding: 0.5rem 2.5rem;
                font-size: 0.95rem;
            }
            .modal-title {
                font-size: 1.5rem;
            }
            .modal-body .form-label {
                font-size: 0.9rem;
            }
            .modal-body .form-control {
                font-size: 0.9rem;
                padding: 0.6rem;
            }
            .modal-body .btn-primary-filled {
                max-width: 260px;
                padding: 0.5rem 2.5rem;
                font-size: 0.95rem;
            }
            .view-more-container .btn-primary-filled {
                max-width: 260px;
                padding: 0.5rem 2.5rem;
                font-size: 0.9rem;
            }
            .section-container {
                padding: 0 1.2rem;
            }
        }

        @media (max-width: 576px) {
            .hero-section {
                height: 60vh;
                min-height: 400px;
            }
            .hero-content {
                padding: 1.5rem;
                margin-top: 1.2rem;
            }
            .hero-content h1 {
                font-size: 2rem;
            }
            .hero-content p {
                font-size: 0.9rem;
            }
            .btn-primary-filled, .btn-primary-outline {
                padding: 0.4rem 2rem;
                font-size: 0.85rem;
                max-width: 180px;
            }
            .btn-primary-filled i, .btn-primary-outline i {
                font-size: 0.85rem;
                margin-left: 4px;
            }
            .why-choose-section h2, .openings-section h2, .testimonials-section h2, .hr-contact-section h2 {
                font-size: 1.8rem;
            }
            .why-choose-section .lead, .openings-section .lead, .testimonials-section .lead, .hr-contact-section .lead {
                font-size: 0.9rem;
            }
            .benefit-card {
                height: 240px;
                padding: 1.2rem;
            }
            .benefit-card i {
                font-size: 1.6rem;
            }
            .benefit-card h3 {
                font-size: 1.1rem;
            }
            .benefit-card p {
                font-size: 0.8rem;
            }
            .job-banner {
                padding: 1rem;
            }
            .job-banner h3 {
                font-size: 1.1rem;
            }
            .job-banner p {
                font-size: 0.8rem;
            }
            .job-banner .btn-primary-filled, .job-banner .btn-primary-outline {
                padding: 0.3rem 1.8rem;
                font-size: 0.8rem;
            }
            .job-details {
                padding: 1.2rem;
            }
            .job-details h4 {
                font-size: 1.1rem;
            }
            .job-details ul li, .job-details p {
                font-size: 0.85rem;
            }
            .testimonial-card {
                height: 200px;
                padding: 1.2rem;
            }
            .testimonial-card h4 {
                font-size: 0.95rem;
            }
            .testimonial-card p {
                font-size: 0.8rem;
            }
            .hr-contact-card {
                padding: 1.5rem;
            }
            .hr-contact-card h3 {
                font-size: 1.4rem;
            }
            .hr-contact-card p, .hr-contact-card ul li {
                font-size: 0.9rem;
            }
            .hr-contact-card .btn-primary-filled, .hr-contact-card .btn-primary-outline {
                max-width: 260px;
                padding: 0.4rem 2rem;
                font-size: 0.9rem;
            }
            .modal-title {
                font-size: 1.3rem;
            }
            .modal-body .form-label {
                font-size: 0.85rem;
            }
            .modal-body .form-control {
                font-size: 0.85rem;
                padding: 0.5rem;
            }
            .modal-body .btn-primary-filled {
                max-width: 240px;
                padding: 0.4rem 2rem;
                font-size: 0.9rem;
            }
            .view-more-container .btn-primary-filled {
                max-width: 240px;
                padding: 0.4rem 2rem;
                font-size: 0.85rem;
            }
            .section-container {
                padding: 0 1rem;
            }
        }

        @media (max-width: 400px) {
            .hero-section {
                height: 50vh;
                min-height: 350px;
            }
            .hero-content {
                padding: 1rem;
                margin-top: 1rem;
            }
            .hero-content h1 {
                font-size: 1.8rem;
            }
            .hero-content p {
                font-size: 0.85rem;
            }
            .btn-primary-filled, .btn-primary-outline {
                padding: 0.3rem 1.8rem;
                font-size: 0.8rem;
                max-width: 160px;
            }
            .btn-primary-filled i, .btn-primary-outline i {
                font-size: 0.8rem;
                margin-left: 4px;
            }
            .why-choose-section, .openings-section, .testimonials-section, .hr-contact-section {
                padding: 3rem 0;
            }
            .why-choose-section h2, .openings-section h2, .testimonials-section h2, .hr-contact-section h2 {
                font-size: 1.6rem;
            }
            .why-choose-section .lead, .openings-section .lead, .testimonials-section .lead, .hr-contact-section .lead {
                font-size: 0.85rem;
            }
            .benefit-card {
                height: 220px;
                padding: 1rem;
            }
            .benefit-card i {
                font-size: 1.4rem;
            }
            .benefit-card h3 {
                font-size: 1rem;
            }
            .benefit-card p {
                font-size: 0.75rem;
            }
            .job-banner {
                padding: 0.8rem;
            }
            .job-banner h3 {
                font-size: 1rem;
            }
            .job-banner p {
                font-size: 0.75rem;
            }
            .job-banner .btn-primary-filled, .job-banner .btn-primary-outline {
                padding: 0.3rem 1.5rem;
                font-size: 0.75rem;
            }
            .job-details {
                padding: 1rem;
            }
            .job-details h4 {
                font-size: 1rem;
            }
            .job-details ul li, .job-details p {
                font-size: 0.8rem;
            }
            .testimonial-card {
                height: 180px;
                padding: 1rem;
            }
            .testimonial-card h4 {
                font-size: 0.9rem;
            }
            .testimonial-card p {
                font-size: 0.75rem;
            }
            .hr-contact-card {
                padding: 1.2rem;
            }
            .hr-contact-card h3 {
                font-size: 1.3rem;
            }
            .hr-contact-card p, .hr-contact-card ul li {
                font-size: 0.85rem;
            }
            .hr-contact-card .btn-primary-filled, .hr-contact-card .btn-primary-outline {
                max-width: 240px;
                padding: 0.3rem 1.8rem;
                font-size: 0.85rem;
            }
            .modal-title {
                font-size: 1.2rem;
            }
            .modal-body .form-label {
                font-size: 0.8rem;
            }
            .modal-body .form-control {
                font-size: 0.8rem;
                padding: 0.4rem;
            }
            .modal-body .btn-primary-filled {
                max-width: 220px;
                padding: 0.3rem 1.8rem;
                font-size: 0.85rem;
            }
            .view-more-container .btn-primary-filled {
                max-width: 220px;
                padding: 0.3rem 1.8rem;
                font-size: 0.8rem;
            }
            .section-container {
                padding: 0 0.8rem;
            }
        }
    </style>
@endsection

@section('content')
    <div class="rka-scope" id="main-content">
        <main>
            <!-- Hero Section -->
            <section class="hero-section">
                <div class="hero-content gsap-animate">
                    <h1>Join Our Team</h1>
                    <p>Build your career with us and be part of a dynamic team committed to excellence and professional growth.</p>
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="#openings" class="btn-primary-filled"><i class="fas fa-briefcase"></i> View Openings</a>
                        <a href="#hr-contact" class="btn-primary-outline"><i class="fas fa-envelope"></i> Contact HR</a>
                    </div>
                </div>
            </section>

            <!-- Why Choose Section -->
            <section class="why-choose-section">
                <div class="section-container">
                    <h2 class="gsap-animate">Why Choose Chartered Insights?</h2>
                    <p class="lead gsap-animate">We believe our people are our greatest asset. That's why we invest in creating an environment where talent thrives and careers flourish.</p>
                    <div class="row g-4">
                        <div class="col-lg-4 col-md-6 gsap-animate">
                            <div class="benefit-card">
                                <i class="fas fa-graduation-cap"></i>
                                <h3>Professional Growth</h3>
                                <p>Continuous learning opportunities, professional certifications, and clear career progression paths to help you reach your potential.</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 gsap-animate" data-delay="0.2">
                            <div class="benefit-card">
                                <i class="fas fa-users"></i>
                                <h3>Collaborative Culture</h3>
                                <p>Work with diverse, talented teams in an inclusive environment that values collaboration, innovation, and mutual respect.</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 gsap-animate" data-delay="0.4">
                            <div class="benefit-card">
                                <i class="fas fa-heart"></i>
                                <h3>Comprehensive Benefits</h3>
                                <p>Competitive compensation, health insurance, retirement plans, and additional perks that support your well-being and financial security.</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 gsap-animate">
                            <div class="benefit-card">
                                <i class="fas fa-book-open"></i>
                                <h3>Learning & Development</h3>
                                <p>Access to training programs, workshops, conferences, and certification support to keep your skills current and competitive.</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 gsap-animate" data-delay="0.2">
                            <div class="benefit-card">
                                <i class="fas fa-balance-scale"></i>
                                <h3>Work-Life Balance</h3>
                                <p>Flexible working arrangements, paid time off, and a supportive environment that recognizes the importance of personal well-being.</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 gsap-animate" data-delay="0.4">
                            <div class="benefit-card">
                                <i class="fas fa-lightbulb"></i>
                                <h3>Innovation Focus</h3>
                                <p>Be part of a forward-thinking organization that embraces technology and innovation to deliver exceptional client service.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Current Openings Section -->
            <section class="openings-section" id="openings">
                <div class="section-container">
                    <h2 class="gsap-animate">Current Openings</h2>
                    <p class="lead gsap-animate">Explore exciting career opportunities across our various departments and locations.</p>
                    <ul class="nav nav-tabs mb-4" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="all-tab" data-bs-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">All Positions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="audit-tab" data-bs-toggle="tab" href="#audit" role="tab" aria-controls="audit" aria-selected="false">Audit & Assurance</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tax-tab" data-bs-toggle="tab" href="#tax" role="tab" aria-controls="tax" aria-selected="false">Tax Advisory</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="business-tab" data-bs-toggle="tab" href="#business" role="tab" aria-controls="business" aria-selected="false">Business Advisory</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="support-tab" data-bs-toggle="tab" href="#support" role="tab" aria-controls="support" aria-selected="false">Support & Admin</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                            <div class="job-list">
                                <div class="job-banner gsap-animate" data-department="audit">
                                    <div class="job-info">
                                        <h3>Senior Auditor</h3>
                                        <p class="featured">Featured</p>
                                        <p>Audit & Assurance</p>
                                        <p>Kathmandu</p>
                                        <p>Full-time</p>
                                    </div>
                                    <div class="btn-container">
                                        <button class="btn-primary-outline" data-bs-toggle="collapse" data-bs-target="#senior-auditor-details" aria-expanded="false" aria-controls="senior-auditor-details">View Details</button>
                                        <button class="btn-primary-filled" data-bs-toggle="modal" data-bs-target="#apply-senior-auditor">Apply Now</button>
                                    </div>
                                </div>
                                <div class="collapse" id="senior-auditor-details">
                                    <div class="job-details">
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
                                        <h4>Compensation</h4>
                                        <p>NPR 80,000 - 120,000</p>
                                        <h4>Application Deadline</h4>
                                        <p>September 30, 2025</p>
                                    </div>
                                </div>
                                <div class="job-banner gsap-animate" data-department="business">
                                    <div class="job-info">
                                        <h3>Business Analyst</h3>
                                        <p class="featured">Featured</p>
                                        <p>Business Advisory</p>
                                        <p>Kathmandu</p>
                                        <p>Full-time</p>
                                    </div>
                                    <div class="btn-container">
                                        <button class="btn-primary-outline" data-bs-toggle="collapse" data-bs-target="#business-analyst-details" aria-expanded="false" aria-controls="business-analyst-details">View Details</button>
                                        <button class="btn-primary-filled" data-bs-toggle="modal" data-bs-target="#apply-business-analyst">Apply Now</button>
                                    </div>
                                </div>
                                <div class="collapse" id="business-analyst-details">
                                    <div class="job-details">
                                        <h4>Position Overview</h4>
                                        <p>We are looking for a skilled Business Analyst to support our advisory team in delivering strategic insights and solutions to clients.</p>
                                        <h4>Key Responsibilities</h4>
                                        <ul>
                                            <li>Analyze client business processes and identify improvement opportunities</li>
                                            <li>Develop data-driven recommendations and reports</li>
                                            <li>Collaborate with cross-functional teams to implement solutions</li>
                                            <li>Facilitate client workshops and presentations</li>
                                        </ul>
                                        <h4>Requirements</h4>
                                        <ul>
                                            <li>Bachelor’s degree in Business, Finance, or related field</li>
                                            <li>2-4 years of business analysis experience</li>
                                            <li>Strong analytical and problem-solving skills</li>
                                            <li>Excellent communication and presentation skills</li>
                                        </ul>
                                        <h4>What We Offer</h4>
                                        <ul>
                                            <li>Competitive salary package</li>
                                            <li>Professional development opportunities</li>
                                            <li>Health and life insurance</li>
                                            <li>Flexible working arrangements</li>
                                        </ul>
                                        <h4>Compensation</h4>
                                        <p>NPR 60,000 - 90,000</p>
                                        <h4>Application Deadline</h4>
                                        <p>October 15, 2025</p>
                                    </div>
                                </div>
                                <div class="job-banner gsap-animate" data-department="tax">
                                    <div class="job-info">
                                        <h3>Tax Consultant</h3>
                                        <p>Tax Advisory</p>
                                        <p>Pokhara</p>
                                        <p>Full-time</p>
                                    </div>
                                    <div class="btn-container">
                                        <button class="btn-primary-outline" data-bs-toggle="collapse" data-bs-target="#tax-consultant-details" aria-expanded="false" aria-controls="tax-consultant-details">View Details</button>
                                        <button class="btn-primary-filled" data-bs-toggle="modal" data-bs-target="#apply-tax-consultant">Apply Now</button>
                                    </div>
                                </div>
                                <div class="collapse" id="tax-consultant-details">
                                    <div class="job-details">
                                        <h4>Position Overview</h4>
                                        <p>Join our Tax Advisory team to provide expert tax planning and compliance services to our clients.</p>
                                        <h4>Key Responsibilities</h4>
                                        <ul>
                                            <li>Prepare and review tax returns</li>
                                            <li>Provide tax planning and advisory services</li>
                                            <li>Stay updated with tax laws and regulations</li>
                                            <li>Assist clients with tax audits and inquiries</li>
                                        </ul>
                                        <h4>Requirements</h4>
                                        <ul>
                                            <li>Bachelor’s degree in Accounting or Finance</li>
                                            <li>2-3 years of tax-related experience</li>
                                            <li>Knowledge of local tax regulations</li>
                                            <li>Strong analytical skills</li>
                                        </ul>
                                        <h4>What We Offer</h4>
                                        <ul>
                                            <li>Competitive salary package</li>
                                            <li>Professional development opportunities</li>
                                            <li>Health and life insurance</li>
                                            <li>Flexible working arrangements</li>
                                        </ul>
                                        <h4>Compensation</h4>
                                        <p>NPR 50,000 - 80,000</p>
                                        <h4>Application Deadline</h4>
                                        <p>October 10, 2025</p>
                                    </div>
                                </div>
                                <div class="job-banner gsap-animate hidden-job" data-department="audit">
                                    <div class="job-info">
                                        <h3>Junior Accountant</h3>
                                        <p>Audit & Assurance</p>
                                        <p>Chitwan</p>
                                        <p>Full-time</p>
                                    </div>
                                    <div class="btn-container">
                                        <button class="btn-primary-outline" data-bs-toggle="collapse" data-bs-target="#junior-accountant-details" aria-expanded="false" aria-controls="junior-accountant-details">View Details</button>
                                        <button class="btn-primary-filled" data-bs-toggle="modal" data-bs-target="#apply-junior-accountant">Apply Now</button>
                                    </div>
                                </div>
                                <div class="collapse" id="junior-accountant-details">
                                    <div class="job-details">
                                        <h4>Position Overview</h4>
                                        <p>We are seeking a Junior Accountant to support our audit team with financial reporting and compliance tasks.</p>
                                        <h4>Key Responsibilities</h4>
                                        <ul>
                                            <li>Assist in preparing financial statements</li>
                                            <li>Support audit engagements</li>
                                            <li>Maintain accurate financial records</li>
                                            <li>Collaborate with senior auditors</li>
                                        </ul>
                                        <h4>Requirements</h4>
                                        <ul>
                                            <li>Bachelor’s degree in Accounting</li>
                                            <li>0-2 years of experience</li>
                                            <li>Basic knowledge of accounting principles</li>
                                            <li>Proficiency in MS Office</li>
                                        </ul>
                                        <h4>What We Offer</h4>
                                        <ul>
                                            <li>Competitive salary package</li>
                                            <li>Professional development opportunities</li>
                                            <li>Health and life insurance</li>
                                            <li>Flexible working arrangements</li>
                                        </ul>
                                        <h4>Compensation</h4>
                                        <p>NPR 40,000 - 60,000</p>
                                        <h4>Application Deadline</h4>
                                        <p>October 20, 2025</p>
                                    </div>
                                </div>
                                <div class="job-banner gsap-animate hidden-job" data-department="support">
                                    <div class="job-info">
                                        <h3>IT Support Specialist</h3>
                                        <p>Support & Admin</p>
                                        <p>Kathmandu</p>
                                        <p>Full-time</p>
                                    </div>
                                    <div class="btn-container">
                                        <button class="btn-primary-outline" data-bs-toggle="collapse" data-bs-target="#it-support-details" aria-expanded="false" aria-controls="it-support-details">View Details</button>
                                        <button class="btn-primary-filled" data-bs-toggle="modal" data-bs-target="#apply-it-support">Apply Now</button>
                                    </div>
                                </div>
                                <div class="collapse" id="it-support-details">
                                    <div class="job-details">
                                        <h4>Position Overview</h4>
                                        <p>Join our IT team to provide technical support and maintain our technology infrastructure.</p>
                                        <h4>Key Responsibilities</h4>
                                        <ul>
                                            <li>Provide technical support to staff</li>
                                            <li>Maintain IT systems and networks</li>
                                            <li>Troubleshoot hardware and software issues</li>
                                            <li>Assist in IT projects</li>
                                        </ul>
                                        <h4>Requirements</h4>
                                        <ul>
                                            <li>Bachelor’s degree in IT or related field</li>
                                            <li>1-3 years of IT support experience</li>
                                            <li>Knowledge of network administration</li>
                                            <li>Strong problem-solving skills</li>
                                        </ul>
                                        <h4>What We Offer</h4>
                                        <ul>
                                            <li>Competitive salary package</li>
                                            <li>Professional development opportunities</li>
                                            <li>Health and life insurance</li>
                                            <li>Flexible working arrangements</li>
                                        </ul>
                                        <h4>Compensation</h4>
                                        <p>NPR 50,000 - 70,000</p>
                                        <h4>Application Deadline</h4>
                                        <p>October 5, 2025</p>
                                    </div>
                                </div>
                            </div>
                            <div class="view-more-container gsap-animate">
                                <button class="btn-primary-filled" id="view-more-btn">View More</button>
                            </div>
                            <div class="text-center mt-4 gsap-animate">
                                <a href="#apply-general" class="btn-primary-filled">Submit General Application</a>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="audit" role="tabpanel" aria-labelledby="audit-tab"></div>
                        <div class="tab-pane fade" id="tax" role="tabpanel" aria-labelledby="tax-tab"></div>
                        <div class="tab-pane fade" id="business" role="tabpanel" aria-labelledby="business-tab"></div>
                        <div class="tab-pane fade" id="support" role="tabpanel" aria-labelledby="support-tab"></div>
                    </div>
                </div>
            </section>

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

            <!-- Application Modals -->
            <!-- Senior Auditor Modal -->
            <div class="modal fade" id="apply-senior-auditor" tabindex="-1" aria-labelledby="apply-senior-auditor-label" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="apply-senior-auditor-label">Apply for Senior Auditor</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Department:</strong> Audit & Assurance</p>
                            <p><strong>Location:</strong> Kathmandu</p>
                            <p><strong>Type:</strong> Full-time</p>
                            <p><strong>Salary:</strong> NPR 80,000 - 120,000</p>
                            <p class="mb-4">We're excited to learn more about you! Please fill out the form below and we'll review your application carefully.</p>
                            <form action="#" method="POST">
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
                                        <label for="phone" class="form-label">Phone Number *</label>
                                        <input type="tel" class="form-control" id="phone" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="resume" class="form-label">Resume/CV *</label>
                                        <input type="file" class="form-control" id="resume" accept=".pdf,.doc,.docx" required>
                                        <small class="text-muted">Accepted formats: PDF, DOC, DOCX (Max: 5MB)</small>
                                    spouse
                                    </div>
                                    <div class="col-12">
                                        <label for="cover-letter" class="form-label">Cover Letter</label>
                                        <textarea class="form-control" id="cover-letter" rows="5" placeholder="Tell us why you're interested in this position and what makes you a great fit..."></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="portfolio" class="form-label">Portfolio URL</label>
                                        <input type="url" class="form-control" id="portfolio" placeholder="https://your-portfolio.com">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="linkedin" class="form-label">LinkedIn Profile</label>
                                        <input type="url" class="form-control" id="linkedin" placeholder="https://linkedin.com/in/yourprofile">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="salary" class="form-label">Expected Salary (NPR)</label>
                                        <input type="number" class="form-control" id="salary">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="start-date" class="form-label">Available Start Date</label>
                                        <input type="date" class="form-control" id="start-date">
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
            <!-- Other modals would follow similar structure -->
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

            // Recalc positions after images affect layout
            ScrollTrigger.refresh();
        });

        // Tab Filtering
        document.addEventListener('DOMContentLoaded', function () {
            const jobBanners = document.querySelectorAll('.job-banner');
            const jobDetails = document.querySelectorAll('.collapse');
            const allTabPane = document.querySelector('#all .job-list');
            const viewMoreBtn = document.querySelector('#view-more-than-btn');

            // Initialize "All Positions" tab
            updateViewMoreButton(allTabPane, viewMoreBtn);

            // Tab click handler
            document.querySelectorAll('.nav-tabs .nav-link').forEach(tab => {
                tab.addEventListener('click', function () {
                    const department = this.getAttribute('href').substring(1);
                    const targetPane = document.querySelector(`#${department}`);
                    const container = document.createElement('div');
                    container.className = 'job-list';
                    let visibleCount = 0;

                    // Clear all tab panes
                    document.querySelectorAll('.tab-pane').forEach(pane => {
                        pane.innerHTML = '';
                        pane.classList.remove('show', 'active');
                    });

                    // Populate target pane
                    jobBanners.forEach((banner, index) => {
                        const bannerDepartment = banner.getAttribute('data-department');
                        if (department === 'all' || bannerDepartment === department) {
                            const bannerClone = banner.cloneNode(true);
                            if (department === 'all' && visibleCount >= 3 && !banner.classList.contains('hidden-job')) {
                                bannerClone.classList.add('hidden-job');
                            } else if (department !== 'all' && visibleCount >= 3) {
                                bannerClone.classList.add('hidden-job');
                            }
                            container.appendChild(bannerClone);
                            visibleCount++;

                            // Append corresponding job details
                            const detailsId = bannerClone.querySelector('[data-bs-toggle="collapse"]').getAttribute('data-bs-target').substring(1);
                            const detailsClone = jobDetails[index].cloneNode(true);
                            container.appendChild(detailsClone);
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
                    targetPane.classList.add('show', 'active');

                    // Reapply GSAP animations for visible jobs
                    gsap.utils.toArray(container.querySelectorAll('.job-banner:not(.hidden-job)')).forEach((el, i) => {
                        gsap.fromTo(el,
                            { opacity: 0, y: 20 },
                            {
                                opacity: 1,
                                y: 0,
                                duration: 0.8,
                                delay: i * 0.1,
                                ease: 'power3.out'
                            }
                        );
                    });

                    // Update View More button state
                    const newViewMoreBtn = container.querySelector('.view-more-container .btn-primary-filled');
                    if (newViewMoreBtn) {
                        updateViewMoreButton(container, newViewMoreBtn);
                    }
                });
            });

            // View More/View Less Toggle
            window.toggleViewMore = function (button) {
                const jobList = button.closest('.job-list');
                const hiddenJobs = jobList.querySelectorAll('.job-banner.hidden-job');
                const hiddenDetails = jobList.querySelectorAll('.job-banner.hidden-job + .collapse');
                const isShowingMore = button.textContent === 'View More';

                hiddenJobs.forEach((job, index) => {
                    job.classList.toggle('hidden-job', !isShowingMore);
                    // Ensure corresponding details remain linked
                    if (isShowingMore) {
                        hiddenDetails[index].style.display = 'block';
                        setTimeout(() => {
                            hiddenDetails[index].style.display = '';
                        }, 0);
                    }
                });

                button.textContent = isShowingMore ? 'View Less' : 'View More';

                // Reapply GSAP animations for newly visible jobs
                gsap.utils.toArray(jobList.querySelectorAll('.job-banner:not(.hidden-job)')).forEach((el, i) => {
                    gsap.fromTo(el,
                        { opacity: 0, y: 20 },
                        {
                            opacity: 1,
                            y: 0,
                            duration: 0.8,
                            delay: i * 0.1,
                            ease: 'power3.out'
                        }
                    );
                });
            };

            // Update View More button visibility
            function updateViewMoreButton(jobList, viewMoreBtn) {
                const hiddenJobs = jobList.querySelectorAll('.job-banner.hidden-job');
                if (hiddenJobs.length === 0) {
                    viewMoreBtn.closest('.view-more-container').style.display = 'none';
                } else {
                    viewMoreBtn.closest('.view-more-container').style.display = '';
                }
            }
        });
    </script>
@endsection