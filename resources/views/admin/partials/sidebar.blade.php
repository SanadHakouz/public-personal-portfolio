<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky sidebar-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                    <i class="bi bi-speedometer2 me-2"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}" href="{{ route('admin.projects.index') }}">
                    <i class="bi bi-kanban me-2"></i>
                    Projects
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}" href="{{ route('admin.contacts.index') }}">
                    <i class="bi bi-envelope me-2"></i>
                    Contact Messages
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.resumes.*') ? 'active' : '' }}" href="{{ route('admin.resumes.index') }}">
                    <i class="bi bi-file-earmark-person me-2"></i>
                    Resume Management
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.upcoming-projects.*') ? 'active' : '' }}" href="{{ route('admin.upcoming-projects.index') }}">
                    <i class="bi bi-lightbulb me-2"></i>
                    Upcoming Projects
                </a>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Technology Stack</span>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.technology.categories.*') ? 'active' : '' }}" href="{{ route('admin.technology.categories.index') }}">
                    <i class="bi bi-folder me-2"></i>
                    Tech Categories
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.technologies.*') ? 'active' : '' }}" href="{{ route('admin.technologies.index') }}">
                    <i class="bi bi-code-slash me-2"></i>
                    Technologies
                </a>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Website Management</span>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.about.*') ? 'active' : '' }}" href="#">
                    <i class="bi bi-file-person me-2"></i>
                    About Page
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.contact.*') ? 'active' : '' }}" href="#">
                    <i class="bi bi-chat-dots me-2"></i>
                    Contact Page
                </a>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Settings</span>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}" href="#">
                    <i class="bi bi-gear me-2"></i>
                    Site Settings
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.profile.*') ? 'active' : '' }}" href="#">
                    <i class="bi bi-person-circle me-2"></i>
                    Profile
                </a>
            </li>
        </ul>
    </div>
</nav>
