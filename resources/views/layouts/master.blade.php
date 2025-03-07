<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Portfolio')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

</head>
<body>
    @include('components.navbar')

    <div class="container mt-4">
        @yield('content')
    </div>

    @include('components.footer')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Stacked scripts -->
    @stack('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get all links on the right sidebar
    const sidebarLinks = document.querySelectorAll('.certificates-section a, .courses-section a, .languages-section a');

    sidebarLinks.forEach(function(link) {
        link.addEventListener('click', function(e) {
            // Check if it's an anchor link (starts with #)
            if (this.getAttribute('href').startsWith('#')) {
                e.preventDefault();

                // Get the target element
                const targetId = this.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);

                // Scroll to the element smoothly if it exists
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            }
            // For external links, make sure they open in a new tab if needed
            else if (this.getAttribute('target') === '_blank') {
                // Default behavior will open in new tab
            }
            // For regular links to other pages, just let the default behavior work
        });
    });
});
</script>
</body>
</html>
