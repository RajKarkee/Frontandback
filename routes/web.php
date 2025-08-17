<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\IndustryController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\InsightController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PageAdminController;
use App\Http\Controllers\Admin\BlogAdminController;
use App\Http\Controllers\Admin\EventAdminController;
use App\Http\Controllers\Admin\CareerAdminController;
use App\Http\Controllers\Admin\ContactAdminController;
use App\Http\Controllers\Admin\ContactInformationAdminController;
use App\Http\Controllers\Admin\ServiceAdminController;
use App\Http\Controllers\Admin\IndustryAdminController;
use App\Http\Controllers\Admin\IndustryExpertiseAdminController;
use App\Http\Controllers\Admin\OfficeAdminController;
use App\Http\Controllers\Admin\InsightAdminController;
use App\Http\Controllers\Admin\JumbotronController;
use App\Http\Controllers\Admin\ServiceProcessController;
use App\Http\Controllers\Admin\HomeSettingAdminController;
use App\Http\Controllers\Admin\FooterSettingAdminController;
use App\Http\Controllers\AboutAdminController;

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetPassword'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

// Admin Routes (Protected by auth middleware)
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    // Admin Dashboard
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    // Admin CRUD Routes
    Route::resource('pages', PageAdminController::class)->names([
        'index' => 'pages.index',
        'create' => 'pages.create',
        'store' => 'pages.store',
        'show' => 'pages.show',
        'edit' => 'pages.edit',
        'update' => 'pages.update',
        'destroy' => 'pages.destroy',
    ]);

    Route::resource('blogs', BlogAdminController::class)->names([
        'index' => 'blogs.index',
        'create' => 'blogs.create',
        'store' => 'blogs.store',
        'show' => 'blogs.show',
        'edit' => 'blogs.edit',
        'update' => 'blogs.update',
        'destroy' => 'blogs.destroy',
    ]);

    Route::resource('events', EventAdminController::class)->names([
        'index' => 'events.index',
        'create' => 'events.create',
        'store' => 'events.store',
        'show' => 'events.show',
        'edit' => 'events.edit',
        'update' => 'events.update',
        'destroy' => 'events.destroy',
    ]);

    Route::resource('careers', CareerAdminController::class)->except(['create', 'store', 'show', 'edit', 'update', 'destroy']);

    // Redirect careers index to benefits page (main careers management)
    Route::get('careers', function() {
        return redirect()->route('admin.careers.benefits');
    })->name('careers.index');

    // Career Benefits Management
    Route::get('careers/benefits', [CareerAdminController::class, 'benefits'])->name('careers.benefits');
    Route::post('careers/benefits', [CareerAdminController::class, 'storeBenefit'])->name('careers.benefits.store');
    Route::put('careers/benefits/{benefit}', [CareerAdminController::class, 'updateBenefit'])->name('careers.benefits.update');
    Route::delete('careers/benefits/{benefit}', [CareerAdminController::class, 'destroyBenefit'])->name('careers.benefits.destroy');
    Route::post('careers/benefits/{benefit}/toggle-status', [CareerAdminController::class, 'toggleBenefitStatus'])->name('careers.benefits.toggle-status');

    // Job Openings Management
    Route::get('careers/jobs', [CareerAdminController::class, 'jobs'])->name('careers.jobs');
    Route::get('careers/jobs/create', [CareerAdminController::class, 'createJob'])->name('careers.jobs.create');
    Route::post('careers/jobs', [CareerAdminController::class, 'storeJob'])->name('careers.jobs.store');
    Route::get('careers/jobs/{job}/edit', [CareerAdminController::class, 'editJob'])->name('careers.jobs.edit');
    Route::put('careers/jobs/{job}', [CareerAdminController::class, 'updateJob'])->name('careers.jobs.update');
    Route::delete('careers/jobs/{job}', [CareerAdminController::class, 'destroyJob'])->name('careers.jobs.destroy');
    Route::post('careers/jobs/{job}/toggle-featured', [CareerAdminController::class, 'toggleJobFeatured'])->name('careers.jobs.toggle-featured');

    // Career Testimonials Management
    Route::get('careers/testimonials', [CareerAdminController::class, 'testimonials'])->name('careers.testimonials');
    Route::post('careers/testimonials', [CareerAdminController::class, 'storeTestimonial'])->name('careers.testimonials.store');
    Route::put('careers/testimonials/{testimonial}', [CareerAdminController::class, 'updateTestimonial'])->name('careers.testimonials.update');
    Route::delete('careers/testimonials/{testimonial}', [CareerAdminController::class, 'destroyTestimonial'])->name('careers.testimonials.destroy');
    Route::post('careers/testimonials/{testimonial}/toggle-status', [CareerAdminController::class, 'toggleTestimonialStatus'])->name('careers.testimonials.toggle-status');

    // Job Applications Management
    Route::get('careers/applications', [CareerAdminController::class, 'applications'])->name('careers.applications');
    Route::get('careers/applications/{application}', [CareerAdminController::class, 'showApplication'])->name('careers.applications.show');
    Route::put('careers/applications/{application}/status', [CareerAdminController::class, 'updateApplicationStatus'])->name('careers.applications.update-status');

    Route::resource('contacts', ContactAdminController::class)->names([
        'index' => 'contacts.index',
        'create' => 'contacts.create',
        'store' => 'contacts.store',
        'show' => 'contacts.show',
        'edit' => 'contacts.edit',
        'update' => 'contacts.update',
        'destroy' => 'contacts.destroy',
    ]);

    // Contact Information Settings (simplified)
    Route::get('contact-information/settings', [ContactInformationAdminController::class, 'settings'])
        ->name('contact-information.settings');
    Route::post('contact-information/settings', [ContactInformationAdminController::class, 'saveSettings'])
        ->name('contact-information.settings.save');

    Route::resource('services', ServiceAdminController::class)->names([
        'index' => 'services.index',
        'create' => 'services.create',
        'store' => 'services.store',
        'show' => 'services.show',
        'edit' => 'services.edit',
        'update' => 'services.update',
        'destroy' => 'services.destroy',
    ]);

    Route::resource('service-processes', ServiceProcessController::class)->names([
        'index' => 'service-processes.index',
        'create' => 'service-processes.create',
        'store' => 'service-processes.store',
        'edit' => 'service-processes.edit',
        'update' => 'service-processes.update',
        'destroy' => 'service-processes.destroy',
    ]);

    Route::resource('industries', IndustryAdminController::class)->names([
        'index' => 'industries.index',
        'create' => 'industries.create',
        'store' => 'industries.store',
        'show' => 'industries.show',
        'edit' => 'industries.edit',
        'update' => 'industries.update',
        'destroy' => 'industries.destroy',
    ]);

    Route::resource('industry-expertise', IndustryExpertiseAdminController::class)->names([
        'index' => 'industry-expertise.index',
        'create' => 'industry-expertise.create',
        'store' => 'industry-expertise.store',
        'show' => 'industry-expertise.show',
        'edit' => 'industry-expertise.edit',
        'update' => 'industry-expertise.update',
        'destroy' => 'industry-expertise.destroy',
    ]);

    Route::resource('offices', OfficeAdminController::class)->names([
        'index' => 'offices.index',
        'create' => 'offices.create',
        'store' => 'offices.store',
        'show' => 'offices.show',
        'edit' => 'offices.edit',
        'update' => 'offices.update',
        'destroy' => 'offices.destroy',
    ]);

    Route::resource('insights', InsightAdminController::class)->names([
        'index' => 'insights.index',
        'create' => 'insights.create',
        'store' => 'insights.store',
        'show' => 'insights.show',
        'edit' => 'insights.edit',
        'update' => 'insights.update',
        'destroy' => 'insights.destroy',
    ]);

    // Additional Insight Routes
    Route::post('insights/{insight}/toggle-status', [InsightAdminController::class, 'toggleStatus'])->name('insights.toggle-status');
    Route::post('insights/{insight}/toggle-featured', [InsightAdminController::class, 'toggleFeatured'])->name('insights.toggle-featured');

    // Insight Categories Routes
    Route::get('insights-categories', [InsightAdminController::class, 'categories'])->name('insights.categories');
    Route::post('insights-categories', [InsightAdminController::class, 'storeCategory'])->name('insights.categories.store');
    Route::put('insights-categories/{category}', [InsightAdminController::class, 'updateCategory'])->name('insights.categories.update');
    Route::delete('insights-categories/{category}', [InsightAdminController::class, 'destroyCategory'])->name('insights.categories.destroy');
    Route::post('insights-categories/{category}/toggle-status', [InsightAdminController::class, 'toggleCategoryStatus'])->name('insights.categories.toggle-status');

    Route::resource('jumbotrons', JumbotronController::class)->names([
        'index' => 'jumbotrons.index',
        'create' => 'jumbotrons.create',
        'store' => 'jumbotrons.store',
        'show' => 'jumbotrons.show',
        'edit' => 'jumbotrons.edit',
        'update' => 'jumbotrons.update',
        'destroy' => 'jumbotrons.destroy',
    ]);

    // Additional jumbotron routes
    Route::post('jumbotrons/{jumbotron}/toggle-status', [JumbotronController::class, 'toggleStatus'])->name('jumbotrons.toggle-status');
    Route::post('jumbotrons/reorder-slides', [JumbotronController::class, 'reorderSlides'])->name('jumbotrons.reorder-slides');

    // Home Settings Management Routes
    Route::get('home-settings', [HomeSettingAdminController::class, 'index'])->name('home-settings.index');
    Route::get('home-settings/edit', [HomeSettingAdminController::class, 'edit'])->name('home-settings.edit');
    Route::put('home-settings', [HomeSettingAdminController::class, 'update'])->name('home-settings.update');

    // Footer Settings Management Routes
    Route::get('footer-settings', [FooterSettingAdminController::class, 'index'])->name('footer-settings.index');
    Route::get('footer-settings/edit', [FooterSettingAdminController::class, 'edit'])->name('footer-settings.edit');
    Route::put('footer-settings', [FooterSettingAdminController::class, 'update'])->name('footer-settings.update');

    // About Page Management Routes
    Route::get('about', [AboutAdminController::class, 'index'])->name('about.index');
    Route::post('about', [AboutAdminController::class, 'store'])->name('about.store');

    // Core Values Routes
    Route::post('about/core-values', [AboutAdminController::class, 'storeCoreValue'])->name('about.core-values.store');
    Route::put('about/core-values/{id}', [AboutAdminController::class, 'updateCoreValue'])->name('about.core-values.update');
    Route::delete('about/core-values/{id}', [AboutAdminController::class, 'deleteCoreValue'])->name('about.core-values.delete');
    Route::get('about/core-values/{id}/toggle', [AboutAdminController::class, 'toggleCoreValueStatus'])->name('about.core-values.toggle');

    // Team Members Routes
    Route::post('about/team-members', [AboutAdminController::class, 'storeTeamMember'])->name('about.team-members.store');
    Route::put('about/team-members/{id}', [AboutAdminController::class, 'updateTeamMember'])->name('about.team-members.update');
    Route::delete('about/team-members/{id}', [AboutAdminController::class, 'deleteTeamMember'])->name('about.team-members.delete');
    Route::get('about/team-members/{id}/toggle', [AboutAdminController::class, 'toggleTeamMemberStatus'])->name('about.team-members.toggle');

    // Expertise Areas Routes
    Route::post('about/expertise-areas', [AboutAdminController::class, 'storeExpertiseArea'])->name('about.expertise-areas.store');
    Route::put('about/expertise-areas/{id}', [AboutAdminController::class, 'updateExpertiseArea'])->name('about.expertise-areas.update');
    Route::delete('about/expertise-areas/{id}', [AboutAdminController::class, 'deleteExpertiseArea'])->name('about.expertise-areas.delete');
    Route::get('about/expertise-areas/{id}/toggle', [AboutAdminController::class, 'toggleExpertiseAreaStatus'])->name('about.expertise-areas.toggle');

    // Why Choose Us Routes
    Route::post('about/why-choose-us', [AboutAdminController::class, 'storeWhyChooseUs'])->name('about.why-choose-us.store');
    Route::put('about/why-choose-us/{id}', [AboutAdminController::class, 'updateWhyChooseUs'])->name('about.why-choose-us.update');
    Route::delete('about/why-choose-us/{id}', [AboutAdminController::class, 'deleteWhyChooseUs'])->name('about.why-choose-us.delete');
    Route::get('about/why-choose-us/{id}/toggle', [AboutAdminController::class, 'toggleWhyChooseUsStatus'])->name('about.why-choose-us.toggle');
});

// Frontend Routes
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');

Route::get('/services', [ServiceController::class, 'index'])->name('services');
// Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');

Route::get('/industries', [IndustryController::class, 'index'])->name('industries');
Route::get('/industries/{slug}', [IndustryController::class, 'show'])->name('industries.show');

Route::get('/insights', [PageController::class, 'insights'])->name('insights');
Route::get('/insights/category/{categorySlug}', [PageController::class, 'insightsByCategory'])->name('insights.category');
Route::get('/insights/{slug}', [PageController::class, 'insightDetail'])->name('insights.detail');

Route::get('/events', [EventController::class, 'index'])->name('events');
Route::get('/events/filter', [EventController::class, 'filter'])->name('events.filter');
Route::get('/events/{slug}', [EventController::class, 'show'])->name('events.show');

Route::get('/offices', [OfficeController::class, 'index'])->name('offices');
Route::get('/offices/{slug}', [OfficeController::class, 'show'])->name('offices.show');

Route::get('/careers', [CareerController::class, 'index'])->name('careers');
Route::get('/careers/jobs/{id}', [CareerController::class, 'showJob'])->name('careers.jobs.detail');
Route::get('/careers/jobs-by-category', [CareerController::class, 'getJobsByCategory'])->name('careers.jobs.by-category');
Route::get('/careers/{slug}', [CareerController::class, 'show'])->name('careers.show');

// Job Application Routes
Route::get('/apply', [JobApplicationController::class, 'generalApplication'])->name('careers.apply.general');
Route::get('/apply/{jobId}', [JobApplicationController::class, 'create'])->name('careers.apply');
Route::post('/apply', [JobApplicationController::class, 'store'])->name('careers.apply.submit');

Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
Route::get('/blogs/{slug}', [BlogController::class, 'show'])->name('blogs.show');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.submit');

// Newsletter subscription routes
Route::post('/newsletter/subscribe', [App\Http\Controllers\NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
Route::post('/newsletter/unsubscribe', [App\Http\Controllers\NewsletterController::class, 'unsubscribe'])->name('newsletter.unsubscribe');

// Dynamic page routes (should be last)
Route::get('/{slug}', [PageController::class, 'show'])->name('pages.show');
