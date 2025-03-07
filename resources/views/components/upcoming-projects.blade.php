<section id="upcoming-projects" class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Upcoming Projects</h2>

        <div class="row">
            @forelse($upcomingProjects as $project)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if($project->image_path)
                            <img src="{{ asset('storage/' . $project->image_path) }}" class="card-img-top" alt="{{ $project->title }}">
                        @else
                            <div class="card-img-top bg-secondary" style="height: 200px;"></div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $project->title }}</h5>
                            <p class="card-text">{{ Str::limit($project->description, 100) }}</p>
                        </div>
                        <div class="card-footer bg-white border-top-0">
                            <span class="badge bg-info text-white">Coming Soon</span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p>No upcoming projects at the moment.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
