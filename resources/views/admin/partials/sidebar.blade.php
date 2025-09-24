<!-- Sidebar Brand -->
<div class="position-sticky">
    <ul class="nav flex-column">
        <!-- Dashboard -->
        <li class="nav-item mt-2">
            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                href="{{ route('admin.dashboard') }}">
                <i class="fas fa-chart-line"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Content Management Section -->
        <li class="nav-item">
            <h6 class="sidebar-heading">
                <i class="fas fa-edit me-2"></i>Content Management
            </h6>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.pages.*') ? 'active' : '' }}"
                href="{{ route('admin.pages.index') }}">
                <i class="fas fa-file-alt"></i>
                <span>Pages</span>
                <span class="badge bg-primary ms-auto">{{ \App\Models\Page::count() }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.about.*') ? 'active' : '' }}"
                href="{{ route('admin.about.index') }}">
                <i class="fas fa-users"></i>
                <span>About Page</span>
                @if (\App\Models\About::count() > 0)
                    <span class="badge bg-success ms-auto">Active</span>
                @else
                    <span class="badge bg-warning ms-auto">Setup</span>
                @endif
            </a>
        </li>


        <!-- Blog System Section -->
        <li class="nav-item">
            <h6 class="sidebar-heading">
                <i class="fas fa-blog me-2"></i>Blog System
            </h6>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}"
                href="{{ route('admin.posts.index') }}">
                <i class="fas fa-file-alt"></i>
                <span>Posts</span>
                <span class="badge bg-primary ms-auto">{{ \App\Models\Post::count() }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}"
                href="{{ route('admin.categories.index') }}">
                <i class="fas fa-folder"></i>
                <span>Categories</span>
                <span class="badge bg-info ms-auto">{{ \App\Models\Category::count() }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.tags.*') ? 'active' : '' }}"
                href="{{ route('admin.tags.index') }}">
                <i class="fas fa-tags"></i>
                <span>Tags</span>
                <span class="badge bg-secondary ms-auto">{{ \App\Models\Tag::count() }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.authors.*') ? 'active' : '' }}"
                href="{{ route('admin.authors.index') }}">
                <i class="fas fa-users"></i>
                <span>Authors</span>
                <span
                    class="badge bg-primary ms-auto">{{ \App\Models\User::whereIn('role', ['admin', 'author'])->count() }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.insights.*') ? 'active' : '' }}"
                href="{{ route('admin.insights.index') }}">
                <i class="fas fa-lightbulb"></i>
                <span>Insights</span>
                <span class="badge bg-warning ms-auto">{{ \App\Models\Insight::count() }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.events.*') ? 'active' : '' }}"
                href="{{ route('admin.events.index') }}">
                <i class="fas fa-calendar-alt"></i>
                <span>Events</span>
                <span class="badge bg-success ms-auto">{{ \App\Models\Event::count() }}</span>
            </a>
        </li>

        <!-- Website Design Section -->
        <li class="nav-item">
            <h6 class="sidebar-heading">
                <i class="fas fa-paint-brush me-2"></i>Website Design
            </h6>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.home-settings.*') ? 'active' : '' }}"
                href="{{ route('admin.home-settings.index') }}">
                <i class="fas fa-home"></i>
                <span>Home Settings</span>
                @if (\App\Models\HomeSetting::count() > 0)
                    <span class="badge bg-success ms-auto">Configured</span>
                @else
                    <span class="badge bg-warning ms-auto">Setup</span>
                @endif
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.footer-settings.*') ? 'active' : '' }}"
                href="{{ route('admin.footer-settings.index') }}">
                <i class="fas fa-window-minimize"></i>
                <span>Footer Settings</span>
                @if (\App\Models\FooterSetting::count() > 0)
                    <span class="badge bg-success ms-auto">Configured</span>
                @else
                    <span class="badge bg-warning ms-auto">Setup</span>
                @endif
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.navigation-settings.*') ? 'active' : '' }}"
                href="{{ route('admin.navigation-settings.index') }}">
                <i class="fas fa-bars"></i>
                <span>Navigation Settings</span>
                @if (\App\Models\NavigationSetting::count() > 0)
                    <span class="badge bg-success ms-auto">{{ \App\Models\NavigationSetting::count() }}</span>
                @else
                    <span class="badge bg-warning ms-auto">Setup</span>
                @endif
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.jumbotrons.*') ? 'active' : '' }}"
                href="{{ route('admin.jumbotrons.index') }}">
                <i class="fas fa-image"></i>
                <span>Jumbotrons</span>
                <span class="badge bg-purple ms-auto">{{ \App\Models\Jumbotron::count() }}</span>
            </a>
        </li>

        <!-- Business Section -->
        <li class="nav-item">
            <h6 class="sidebar-heading">
                <i class="fas fa-briefcase me-2"></i>Business
            </h6>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}"
                href="{{ route('admin.services.index') }}">
                <i class="fas fa-cogs"></i>
                <span>Services</span>
                <span class="badge bg-secondary ms-auto">{{ \App\Models\Service::count() }}</span>
            </a>
            <a class="nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}"
                href="{{ route('admin.service-processes.index') }}">
                <i class="fas fa-cogs"></i>
                <span>Services Process</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.industries.*') ? 'active' : '' }}"
                href="{{ route('admin.industries.index') }}">
                <i class="fas fa-industry"></i>
                <span>Industries</span>
                <span class="badge bg-dark ms-auto">{{ \App\Models\Industry::count() }}</span>
            </a>
            <a class="nav-link " href="{{ route('admin.industry-expertise.index') }}">
                <i class="fas fa-industry"></i>
                <span>Industry Expertise</span>
                <span class="badge bg-dark ms-auto">{{ \App\Models\IndustryExpertise::count() }}</span>
            </a>
        </li>

        <!-- Company Information Section -->
        <li class="nav-item">
            <h6 class="sidebar-heading">
                <i class="fas fa-building me-2"></i>Company Information
            </h6>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.offices.*') ? 'active' : '' }}"
                href="{{ route('admin.offices.index') }}">
                <i class="fas fa-map-marker-alt"></i>
                <span>Office Locations</span>
                <span class="badge bg-info ms-auto">{{ \App\Models\Office::count() }}</span>
            </a>
        </li>

        <!-- Careers Section -->
        <li class="nav-item">
            <h6 class="sidebar-heading">
                <i class="fas fa-user-tie me-2"></i>Careers Management
            </h6>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.careers.benefits*') ? 'active' : '' }}"
                href="{{ route('admin.careers.benefits') }}">
                <i class="fas fa-star"></i>
                <span>Career Benefits</span>
                <span class="badge bg-success ms-auto">{{ \App\Models\CareerBenefit::count() }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.careers.jobs*') ? 'active' : '' }}"
                href="{{ route('admin.careers.jobs') }}">
                <i class="fas fa-briefcase"></i>
                <span>Job Openings</span>
                <span class="badge bg-primary ms-auto">{{ \App\Models\JobOpening::count() }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.careers.testimonials*') ? 'active' : '' }}"
                href="{{ route('admin.careers.testimonials') }}">
                <i class="fas fa-quote-left"></i>
                <span>Employee Testimonials</span>
                <span class="badge bg-info ms-auto">{{ \App\Models\CareerTestimonial::count() }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.careers.applications*') ? 'active' : '' }}"
                href="{{ route('admin.careers.applications') }}">
                <i class="fas fa-file-user"></i>
                <span>Job Applications</span>
                @php $newApplications = \App\Models\JobApplication::where('status', 'pending')->count(); @endphp
                <span class="badge bg-{{ $newApplications > 0 ? 'warning' : 'secondary' }} ms-auto">
                    {{ $newApplications }}
                </span>
            </a>
        </li>

        <!-- Communications Section -->
        <li class="nav-item">
            <h6 class="sidebar-heading">
                <i class="fas fa-comments me-2"></i>Communications
            </h6>
        </li>

        {{-- <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.appointments.*') ? 'active' : '' }}"
                href="{{ route('admin.appointments.index') }}">
                <i class="fas fa-calendar-check"></i>
                <span>Appointments</span>
                @php $pendingAppointments = \App\Models\Appointment::where('status', 'pending')->count(); @endphp
                <span class="badge bg-{{ $pendingAppointments > 0 ? 'warning' : 'secondary' }} ms-auto">
                    {{ $pendingAppointments }}
                </span>
            </a>
        </li> --}}

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}"
                href="{{ route('admin.contacts.index') }}">
                <i class="fas fa-envelope"></i>
                <span>Contact Messages</span>
                @php $newContacts = \App\Models\Contact::where('status', 'new')->count(); @endphp
                <span class="badge bg-{{ $newContacts > 0 ? 'danger' : 'secondary' }} ms-auto">
                    {{ $newContacts }}
                </span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.contact-information.*') ? 'active' : '' }}"
                href="{{ route('admin.contact-information.settings') }}">
                <i class="fas fa-cog"></i>
                <span>Contact Settings</span>
                @if (\App\Models\ContactInformation::count() > 0)
                    <span class="badge bg-success ms-auto">Configured</span>
                @else
                    <span class="badge bg-warning ms-auto">Setup</span>
                @endif
            </a>
        </li>

        <!-- Quick Actions -->
        <li class="nav-item">
            <h6 class="sidebar-heading">
                <i class="fas fa-bolt me-2"></i>Quick Actions
            </h6>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}" target="_blank">
                <i class="fas fa-external-link-alt"></i>
                <span>View Website</span>
            </a>
        </li>
    </ul>
</div>
