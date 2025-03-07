<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <!-- Inline SVG Logo with black color -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 220 50" style="height: 40px; width: auto;">
                <!-- Code Symbol in black -->
                <g transform="translate(10, 25)" fill="#000000">
                    <path d="M0,0 L8,-8 L14,-2 L14,2 L8,8 L0,0" />
                    <path d="M18,-12 L18,12" stroke="#000000" stroke-width="6" stroke-linecap="round" />
                    <path d="M36,0 L28,-8 L22,-2 L22,2 L28,8 L36,0" />
                </g>

                <!-- Hakousan Text in black -->
                <text x="60" y="30" font-family="Arial, sans-serif" font-size="20" font-weight="bold" fill="#000000">Hakousan</text>
            </svg>
        </a>

        <!-- Improved hamburger button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('projects.*') ? 'active' : '' }}" href="{{ route('projects.index') }}">Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
                </li>
            </ul>

            <!-- Social Icons with better spacing -->
            <ul class="navbar-nav">
                <li class="nav-item me-3">
                    <a href="https://www.linkedin.com" target="_blank" class="nav-link">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </li>
                <li class="nav-item me-3">
                    <a href="https://github.com" target="_blank" class="nav-link">
                        <i class="fab fa-github"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="https://www.instagram.com" target="_blank" class="nav-link">
                        <i class="fab fa-instagram"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
