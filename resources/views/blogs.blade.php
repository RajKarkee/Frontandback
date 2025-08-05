@extends('layouts.app')

@section('title', 'Blog - Latest News & Updates | Chartered Insights')
@section('meta_description', 'Read the latest news, updates, and thought leadership from Chartered Insights. Stay informed about accounting trends, business insights, and industry developments.')

@section('content')
<!-- Hero Section -->
<section class="hero-section relative overflow-x-hidden p-0 m-0">
    <div class="relative w-full p-0 m-0">
        <div class="relative w-full h-[60vh] min-h-[60vh] overflow-hidden">
            <div class="absolute inset-0 w-full h-full bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1464983953574-0892a716854b?q=80&w=1600&auto=format&fit=crop');"></div>
            <div class="absolute inset-0 bg-black/40"></div>
            <div class="relative z-20 flex flex-col items-center justify-center h-full text-center text-crisp-white px-4 md:px-12">
                <h1 class="hero-title">Our Blog</h1>
                <p class="hero-subtitle max-w-4xl mx-auto">
                    Stay updated with the latest news, insights, and thought leadership from our team of experts. Discover trends, best practices, and valuable advice for your business.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Featured Post -->
<section class="section">
    <div class="container-custom">
        <div class="featured-post-card fade-in">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-0">
                <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?q=80&w=800&auto=format&fit=crop"
                     alt="Digital transformation in accounting"
                     class="featured-image">
                <div class="featured-content">
                    <span class="featured-badge">Featured Article</span>
                    <h2 class="featured-title">
                        The Future of Accounting: How Technology is Transforming the Profession
                    </h2>
                    <p class="featured-excerpt">
                        Explore how artificial intelligence, automation, and cloud computing are reshaping the accounting landscape. From automated bookkeeping to predictive analytics, discover what these changes mean for businesses and accounting professionals in Nepal.
                    </p>
                    <div class="featured-meta">
                        <div class="author-info">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=100&auto=format&fit=crop&ixlib=rb-4.0.3"
                                 alt="Author" class="author-avatar">
                            <div>
                                <p class="author-name">Rajesh Sharma, CA</p>
                                <p class="author-title">Senior Partner</p>
                            </div>
                        </div>
                        <div class="post-meta">
                            <span>January 20, 2024</span>
                            <span>•</span>
                            <span>8 min read</span>
                        </div>
                    </div>
                    <button class="btn-primary mt-6" onclick="alert('Blog post will be implemented!')">
                        Read Full Article
                        <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Blog Categories -->
<section class="section bg-audit-grey">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Browse by Category</h2>
            <p class="section-subtitle">
                Explore our content organized by topics that matter to your business.
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
            <div class="category-card text-center fade-in">
                <div class="category-icon">
                    <svg class="w-8 h-8 text-fresh-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <h4 class="category-title">Audit & Assurance</h4>
                <p class="category-count">12 Posts</p>
            </div>

            <div class="category-card text-center fade-in fade-in-delay-1">
                <div class="category-icon">
                    <svg class="w-8 h-8 text-fresh-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                    </svg>
                </div>
                <h4 class="category-title">Tax Updates</h4>
                <p class="category-count">18 Posts</p>
            </div>

            <div class="category-card text-center fade-in fade-in-delay-2">
                <div class="category-icon">
                    <svg class="w-8 h-8 text-fresh-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <h4 class="category-title">Business Strategy</h4>
                <p class="category-count">15 Posts</p>
            </div>

            <div class="category-card text-center fade-in">
                <div class="category-icon">
                    <svg class="w-8 h-8 text-fresh-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <h4 class="category-title">Technology</h4>
                <p class="category-count">8 Posts</p>
            </div>

            <div class="category-card text-center fade-in fade-in-delay-1">
                <div class="category-icon">
                    <svg class="w-8 h-8 text-fresh-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h4 class="category-title">Risk Management</h4>
                <p class="category-count">10 Posts</p>
            </div>

            <div class="category-card text-center fade-in fade-in-delay-2">
                <div class="category-icon">
                    <svg class="w-8 h-8 text-fresh-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h4 class="category-title">Industry News</h4>
                <p class="category-count">22 Posts</p>
            </div>
        </div>
    </div>
</section>

<!-- Recent Posts -->
<section class="section">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Recent Posts</h2>
            <p class="section-subtitle">
                Stay updated with our latest articles and insights.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Blog Post 1 -->
            <article class="blog-post-card fade-in">
                <img src="https://images.unsplash.com/photo-1559526324-4b87b5e36e44?q=80&w=800&auto=format&fit=crop"
                     alt="Tax compliance updates"
                     class="post-image">
                <div class="post-content">
                    <span class="post-category">Tax Updates</span>
                    <h3 class="post-title">
                        <a href="#">Nepal Tax Law Updates: What Businesses Need to Know for 2024</a>
                    </h3>
                    <p class="post-excerpt">
                        Comprehensive overview of the latest changes in Nepal's tax regulations and their impact on businesses across different sectors.
                    </p>
                    <div class="post-footer">
                        <div class="author-meta">
                            <img src="https://images.unsplash.com/photo-1494790108755-2616b612b494?q=80&w=50&auto=format&fit=crop"
                                 alt="Author" class="author-small-avatar">
                            <span class="author-small-name">Sunita Karki</span>
                        </div>
                        <div class="post-date">Jan 15, 2024</div>
                    </div>
                </div>
            </article>

            <!-- Blog Post 2 -->
            <article class="blog-post-card fade-in fade-in-delay-1">
                <img src="https://images.unsplash.com/photo-1554224154-26032fced8bd?q=80&w=800&auto=format&fit=crop"
                     alt="Financial reporting"
                     class="post-image">
                <div class="post-content">
                    <span class="post-category">Audit & Assurance</span>
                    <h3 class="post-title">
                        <a href="#">5 Key Audit Preparation Tips for Small and Medium Enterprises</a>
                    </h3>
                    <p class="post-excerpt">
                        Essential steps to prepare for your annual audit and ensure a smooth, efficient process that adds value to your business.
                    </p>
                    <div class="post-footer">
                        <div class="author-meta">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=50&auto=format&fit=crop"
                                 alt="Author" class="author-small-avatar">
                            <span class="author-small-name">Rajesh Sharma</span>
                        </div>
                        <div class="post-date">Jan 12, 2024</div>
                    </div>
                </div>
            </article>

            <!-- Blog Post 3 -->
            <article class="blog-post-card fade-in fade-in-delay-2">
                <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=800&auto=format&fit=crop"
                     alt="Business analytics"
                     class="post-image">
                <div class="post-content">
                    <span class="post-category">Business Strategy</span>
                    <h3 class="post-title">
                        <a href="#">Cash Flow Management Strategies for Growing Businesses</a>
                    </h3>
                    <p class="post-excerpt">
                        Practical approaches to maintain healthy cash flow during periods of rapid growth and economic uncertainty.
                    </p>
                    <div class="post-footer">
                        <div class="author-meta">
                            <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?q=80&w=50&auto=format&fit=crop"
                                 alt="Author" class="author-small-avatar">
                            <span class="author-small-name">Priya Thapa</span>
                        </div>
                        <div class="post-date">Jan 10, 2024</div>
                    </div>
                </div>
            </article>

            <!-- Blog Post 4 -->
            <article class="blog-post-card fade-in">
                <img src="https://images.unsplash.com/photo-1563013544-824ae1b704d3?q=80&w=800&auto=format&fit=crop"
                     alt="Cybersecurity"
                     class="post-image">
                <div class="post-content">
                    <span class="post-category">Technology</span>
                    <h3 class="post-title">
                        <a href="#">Protecting Financial Data: Cybersecurity Best Practices for Businesses</a>
                    </h3>
                    <p class="post-excerpt">
                        Essential cybersecurity measures to protect sensitive financial information and maintain client trust in the digital age.
                    </p>
                    <div class="post-footer">
                        <div class="author-meta">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=50&auto=format&fit=crop"
                                 alt="Author" class="author-small-avatar">
                            <span class="author-small-name">Amit Gurung</span>
                        </div>
                        <div class="post-date">Jan 8, 2024</div>
                    </div>
                </div>
            </article>

            <!-- Blog Post 5 -->
            <article class="blog-post-card fade-in fade-in-delay-1">
                <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?q=80&w=800&auto=format&fit=crop"
                     alt="ESG reporting"
                     class="post-image">
                <div class="post-content">
                    <span class="post-category">Industry News</span>
                    <h3 class="post-title">
                        <a href="#">ESG Reporting: The Growing Importance of Sustainability Metrics</a>
                    </h3>
                    <p class="post-excerpt">
                        Understanding Environmental, Social, and Governance reporting requirements and their impact on business valuation.
                    </p>
                    <div class="post-footer">
                        <div class="author-meta">
                            <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?q=80&w=50&auto=format&fit=crop"
                                 alt="Author" class="author-small-avatar">
                            <span class="author-small-name">Sita Rai</span>
                        </div>
                        <div class="post-date">Jan 5, 2024</div>
                    </div>
                </div>
            </article>

            <!-- Blog Post 6 -->
            <article class="blog-post-card fade-in fade-in-delay-2">
                <img src="https://images.unsplash.com/photo-1590283603385-17ffb3a7f29f?q=80&w=800&auto=format&fit=crop"
                     alt="Economic outlook"
                     class="post-image">
                <div class="post-content">
                    <span class="post-category">Business Strategy</span>
                    <h3 class="post-title">
                        <a href="#">Nepal Economic Outlook 2024: Opportunities and Challenges</a>
                    </h3>
                    <p class="post-excerpt">
                        Analysis of Nepal's economic prospects for 2024 and strategic considerations for businesses planning growth.
                    </p>
                    <div class="post-footer">
                        <div class="author-meta">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=50&auto=format&fit=crop"
                                 alt="Author" class="author-small-avatar">
                            <span class="author-small-name">Rajesh Sharma</span>
                        </div>
                        <div class="post-date">Jan 3, 2024</div>
                    </div>
                </div>
            </article>
        </div>

        <!-- Load More Button -->
        <div class="text-center mt-12 fade-in">
            <button class="btn-outline" onclick="alert('Load more functionality will be implemented!')">
                Load More Posts
                <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                </svg>
            </button>
        </div>
    </div>
</section>

<!-- Newsletter Signup -->
<section class="section bg-deep-chartered-blue text-crisp-white">
    <div class="container-custom">
        <div class="text-center fade-in">
            <h2 class="text-3xl lg:text-4xl font-montserrat font-bold mb-6">
                Subscribe to Our Newsletter
            </h2>
            <p class="text-xl mb-8 max-w-3xl mx-auto">
                Get the latest blog posts, industry updates, and exclusive insights delivered directly to your inbox every week.
            </p>

            <form class="max-w-md mx-auto flex flex-col sm:flex-row gap-4">
                <input type="email" placeholder="Enter your email address"
                       class="flex-1 px-4 py-3 rounded-lg text-report-black focus:outline-none focus:ring-2 focus:ring-fresh-teal">
                <button type="submit" class="btn-primary bg-fresh-teal hover:bg-opacity-90 whitespace-nowrap">
                    Subscribe
                    <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </button>
            </form>

            <p class="text-sm text-audit-grey mt-4">
                Join 2,500+ professionals who trust our insights. Unsubscribe anytime.
            </p>
        </div>
    </div>
</section>

<!-- Popular Tags -->
<section class="section">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Popular Topics</h2>
            <p class="section-subtitle">
                Explore our most discussed topics and trending subjects.
            </p>
        </div>

        <div class="flex flex-wrap gap-3 justify-center fade-in">
            <span class="tag">Accounting Standards</span>
            <span class="tag">Tax Planning</span>
            <span class="tag">Business Valuation</span>
            <span class="tag">Internal Controls</span>
            <span class="tag">Financial Reporting</span>
            <span class="tag">Risk Assessment</span>
            <span class="tag">Compliance</span>
            <span class="tag">Digital Transformation</span>
            <span class="tag">Cash Flow Management</span>
            <span class="tag">Corporate Governance</span>
            <span class="tag">Audit Procedures</span>
            <span class="tag">Small Business</span>
            <span class="tag">IFRS Updates</span>
            <span class="tag">VAT Regulations</span>
            <span class="tag">Business Strategy</span>
        </div>
    </div>
</section>

<!-- Contact for Contributions -->
<section class="section bg-audit-grey">
    <div class="container-custom">
        <div class="text-center fade-in">
            <h2 class="section-title">Share Your Expertise</h2>
            <p class="section-subtitle max-w-4xl mx-auto mb-8">
                Are you an industry expert with valuable insights to share? We welcome guest contributions from accounting professionals, business leaders, and industry specialists. Join our community of thought leaders and help shape the conversation.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                <div class="text-center">
                    <div class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-2">Write for Us</h3>
                    <p class="text-report-black">Share your expertise through guest articles and thought leadership pieces.</p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-2">Expert Interviews</h3>
                    <p class="text-report-black">Participate in interviews and panel discussions on industry topics.</p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 bg-fresh-teal rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-crisp-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-2">Case Studies</h3>
                    <p class="text-report-black">Contribute real-world case studies and success stories from your experience.</p>
                </div>
            </div>

            <a href="{{ route('contact') }}" class="btn-primary">
                Get in Touch
                <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.featured-post-card {
    background: white;
    border-radius: 1rem;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    border: 3px solid #00BFB2;
}

.featured-image {
    width: 100%;
    height: 400px;
    object-fit: cover;
}

.featured-content {
    padding: 2.5rem;
}

.featured-badge {
    display: inline-block;
    background: #00BFB2;
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 1rem;
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
    margin-bottom: 1rem;
}

.featured-title {
    font-size: 2rem;
    font-weight: bold;
    color: #015A77;
    margin-bottom: 1rem;
    font-family: 'Montserrat', sans-serif;
    line-height: 1.2;
}

.featured-excerpt {
    font-size: 1.1rem;
    color: #666;
    line-height: 1.6;
    margin-bottom: 2rem;
}

.featured-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
}

.author-info {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.author-avatar {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    object-fit: cover;
}

.author-name {
    font-weight: 600;
    color: #015A77;
    margin: 0;
}

.author-title {
    color: #666;
    font-size: 0.9rem;
    margin: 0;
}

.post-meta {
    color: #666;
    font-size: 0.9rem;
}

.category-card {
    background: white;
    padding: 1.5rem;
    border-radius: 1rem;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.category-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.category-icon {
    margin: 0 auto 1rem auto;
    display: flex;
    justify-content: center;
}

.category-title {
    font-weight: 600;
    color: #015A77;
    margin-bottom: 0.5rem;
    font-family: 'Montserrat', sans-serif;
}

.category-count {
    color: #666;
    font-size: 0.9rem;
}

.blog-post-card {
    background: white;
    border-radius: 1rem;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.blog-post-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.post-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.post-content {
    padding: 1.5rem;
}

.post-category {
    display: inline-block;
    background: #f1f5f9;
    color: #64748b;
    padding: 0.25rem 0.75rem;
    border-radius: 1rem;
    font-size: 0.8rem;
    font-weight: 500;
    margin-bottom: 1rem;
}

.post-title {
    margin-bottom: 1rem;
}

.post-title a {
    font-size: 1.1rem;
    font-weight: 600;
    color: #015A77;
    text-decoration: none;
    line-height: 1.3;
    font-family: 'Montserrat', sans-serif;
}

.post-title a:hover {
    color: #00BFB2;
}

.post-excerpt {
    color: #666;
    font-size: 0.9rem;
    line-height: 1.5;
    margin-bottom: 1.5rem;
}

.post-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 1rem;
    border-top: 1px solid #e2e8f0;
}

.author-meta {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.author-small-avatar {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    object-fit: cover;
}

.author-small-name {
    font-size: 0.85rem;
    font-weight: 500;
    color: #015A77;
}

.post-date {
    font-size: 0.85rem;
    color: #666;
}

.tag {
    display: inline-block;
    background: #f1f5f9;
    color: #64748b;
    padding: 0.5rem 1rem;
    border-radius: 1.5rem;
    font-size: 0.9rem;
    font-weight: 500;
    transition: all 0.3s ease;
    cursor: pointer;
}

.tag:hover {
    background: #00BFB2;
    color: white;
}

@media (max-width: 768px) {
    .featured-post-card .grid {
        grid-template-columns: 1fr;
    }

    .featured-content {
        padding: 1.5rem;
    }

    .featured-title {
        font-size: 1.5rem;
    }

    .featured-meta {
        flex-direction: column;
        align-items: flex-start;
    }
}
</style>
@endpush
