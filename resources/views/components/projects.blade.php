<div class="container-xxl py-5" id="projects-section">
    <div class="container">
        <div class="text-center">
            <h2 class="display-5 mb-5">My Projects</h2>
        </div>

        <div id="projects-container">
            @php
                // Paginate the projects, with 3 per page
                $projects = App\Models\Project::latest()->paginate(3);
            @endphp

            <div class="row g-4">
                @forelse($projects as $project)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                            @if($project->image_path)
                                <div class="img-container" style="height: 200px; overflow: hidden;">
                                    <img src="{{ Storage::url($project->image_path) }}" class="card-img-top" alt="{{ $project->title }}" style="object-fit: cover; height: 100%; width: 100%;">
                                </div>
                            @else
                                <div class="bg-light text-center py-5">
                                    <i class="fa fa-code fa-3x text-primary"></i>
                                </div>
                            @endif

                            <div class="card-body">
                                <h5 class="card-title">{{ $project->title }}</h5>
                                <p class="card-text text-muted">{{ Str::limit($project->description, 100) }}</p>
                            </div>

                            <div class="card-footer bg-white border-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ route('projects.show', $project) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="fa fa-eye"></i> View Details
                                        </a>

                                        @if($project->github_link)
                                            <a href="{{ $project->github_link }}" target="_blank" class="btn btn-sm btn-outline-secondary">
                                                <i class="fab fa-github"></i> GitHub
                                            </a>
                                        @endif

                                        @if($project->documentation_path)
                                            <a href="{{ route('projects.documentation.download', $project) }}" class="btn btn-sm btn-outline-info">
                                                <i class="fa fa-file-pdf"></i> Docs
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-3">
                        <p class="text-muted">No projects to display yet. Check back soon!</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-5">
                <nav aria-label="Projects pagination">
                    <ul class="pagination">
                        @if ($projects->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link">&laquo; Previous</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link pagination-link" href="{{ $projects->previousPageUrl() }}" data-page="{{ $projects->currentPage() - 1 }}">&laquo; Previous</a>
                            </li>
                        @endif

                        @for ($i = 1; $i <= $projects->lastPage(); $i++)
                            <li class="page-item {{ ($projects->currentPage() == $i) ? 'active' : '' }}">
                                <a class="page-link pagination-link" href="{{ $projects->url($i) }}" data-page="{{ $i }}">{{ $i }}</a>
                            </li>
                        @endfor

                        @if ($projects->hasMorePages())
                            <li class="page-item">
                                <a class="page-link pagination-link" href="{{ $projects->nextPageUrl() }}" data-page="{{ $projects->currentPage() + 1 }}">Next &raquo;</a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <span class="page-link">Next &raquo;</span>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>

        <!-- View All Projects button -->
        <div class="text-center mt-4">
            <a href="{{ route('projects.index') }}" class="btn btn-primary px-4 py-2">
                View All Projects <i class="fa fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add event listeners to all pagination links
    document.addEventListener('click', function(e) {
        // Check if clicked element is a pagination link
        if (e.target.classList.contains('pagination-link') || e.target.closest('.pagination-link')) {
            e.preventDefault();

            // Get the link that was clicked
            const link = e.target.classList.contains('pagination-link') ? e.target : e.target.closest('.pagination-link');
            const url = link.getAttribute('href');

            // Fetch the new page content
            fetch(url)
                .then(response => response.text())
                .then(html => {
                    // Create a temporary element to parse the HTML
                    const tempDiv = document.createElement('div');
                    tempDiv.innerHTML = html;

                    // Find the projects container in the fetched HTML
                    const newProjectsContainer = tempDiv.querySelector('#projects-container');

                    // Replace the current projects container with the new one
                    document.querySelector('#projects-container').innerHTML = newProjectsContainer.innerHTML;

                    // Update the URL without reloading the page
                    window.history.pushState({}, '', url);
                })
                .catch(error => {
                    console.error('Error loading page:', error);
                });
        }
    });
});
</script>
@endpush
