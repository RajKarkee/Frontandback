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
            <a class="nav-link {{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}"
               href="{{ route('admin.blogs.index') }}">
                <i class="fas fa-blog"></i>
                <span>Blog Posts</span>
                <span class="badge bg-info ms-auto">{{ \App\Models\Blog::count() }}</span>
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
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.industries.*') ? 'active' : '' }}"
               href="{{ route('admin.industries.index') }}">
                <i class="fas fa-industry"></i>
                <span>Industries</span>
                <span class="badge bg-dark ms-auto">{{ \App\Models\Industry::count() }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.careers.*') ? 'active' : '' }}"
               href="{{ route('admin.careers.index') }}">
                <i class="fas fa-user-tie"></i>
                <span>Careers</span>
                <span class="badge bg-primary ms-auto">{{ \App\Models\Career::count() }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.offices.*') ? 'active' : '' }}"
               href="{{ route('admin.offices.index') }}">
                <i class="fas fa-building"></i>
                <span>Offices</span>
                <span class="badge bg-info ms-auto">{{ \App\Models\Office::count() }}</span>
            </a>
        </li>

        <!-- Communications Section -->
        <li class="nav-item">
            <h6 class="sidebar-heading">
                <i class="fas fa-comments me-2"></i>Communications
            </h6>
        </li>

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
