<div class="container-fluid page-header py-5 mb-5 text-center" style="background: url('{{ asset($background) }}') center/cover no-repeat;">
    <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);"></div>

    <div class="container py-5">
        <h1 class="display-3 text-white mb-4" style="font-weight: 700; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">{{ $title }}</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                @php
                    // Get the current path without the leading slash
                    $currentPath = ltrim(request()->path(), '/');
                    // If we're at the root, set currentPath to 'home'
                    if ($currentPath === '') {
                        $currentPath = 'home';
                    }
                @endphp

                @foreach($breadcrumbs as $link => $text)
                    @php
                        // Extract the path from the link (remove leading slash)
                        $linkPath = ltrim($link, '/');
                        // If link is root, set to 'home' for comparison
                        if ($linkPath === '') {
                            $linkPath = 'home';
                        }
                        // Check if this link matches the current path
                        $isActive = ($linkPath === $currentPath);
                    @endphp

                    <li class="breadcrumb-item @if($isActive) active @endif">
                        <a href="{{ $link }}" class="nav-link px-3 @if($isActive) text-white fw-bold @else text-white-50 @endif"
                           style="transition: all 0.3s ease; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);">
                            {{ $text }}
                        </a>
                    </li>
                @endforeach
            </ol>
        </nav>
    </div>
</div>
