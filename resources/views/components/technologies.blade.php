<section id="technologies" class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-4">Technologies I Work With</h2>

        <div class="row g-4">
            @forelse($categories as $category)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-{{ $category->icon }} me-2" style="color: #4a6cf7; width: 25px;"></i>
                                <h3 class="h5 mb-0">{{ $category->name }}</h3>
                            </div>
                            <ul class="list-unstyled ps-4">
                                @foreach($category->technologies as $technology)
                                    <li class="mb-2">
                                        <div class="d-flex align-items-start">
                                            <i class="fas fa-check text-success me-2 mt-1 small"></i>
                                            <span>{{ $technology->name }}</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-4">
                    <p class="text-muted">No technologies found.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
