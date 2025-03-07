@extends('layouts.master')

@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb" style="background: transparent; padding: 0.75rem 0;">
                        <li class="breadcrumb-item" style="background-color: transparent;">
                            <a href="{{ route('projects.index') }}" style="color: #4a6cf7; text-decoration: none; font-weight: 500; background-color: transparent; padding: 0.25rem 0.5rem; border-radius: 0.25rem; transition: color 0.3s ease;">Projects</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page" style="color: #6c757d; font-weight: 500; background-color: transparent !important; padding: 0.25rem 0.5rem; border-radius: 0.25rem;">
                            {{ $project->title }}
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row g-5">
            <div class="col-lg-8">
                <h1 class="mb-4">{{ $project->title }}</h1>

                @if($project->image_path)
                    <div class="project-image mb-5">
                        <img src="{{ Storage::url($project->image_path) }}" alt="{{ $project->title }}" class="img-fluid rounded shadow">
                    </div>
                @endif

                <div class="project-description mb-5">
                    <h3 class="mb-3">About This Project</h3>
                    <div class="project-content">
                        {!! nl2br(e($project->description)) !!}
                    </div>
                </div>

                <div class="project-links mb-5">
                    <div class="d-flex flex-wrap gap-3">
                        @if($project->github_link)
                            <a href="{{ $project->github_link }}" target="_blank" class="btn btn-primary">
                                <i class="fab fa-github me-2"></i> View on GitHub
                            </a>
                        @endif

                        @if($project->documentation_path)
                            <a href="{{ route('projects.documentation.download', $project) }}" class="btn btn-info">
                                <i class="fa fa-file-pdf me-2"></i> Download Documentation
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card shadow-sm border-0 rounded-4 mb-4">
                    <div class="card-body">
                        <h4 class="mb-4">Project Details</h4>

                        <div class="mb-3">
                            <p class="mb-1 text-muted small">Added on</p>
                            <p class="mb-0 fw-bold">{{ $project->created_at->format('F j, Y') }}</p>
                        </div>

                        <div class="mb-3">
                            <p class="mb-1 text-muted small">Last updated</p>
                            <p class="mb-0 fw-bold">{{ $project->updated_at->format('F j, Y') }}</p>
                        </div>

                        @if($project->github_link)
                            <div class="mb-3">
                                <p class="mb-1 text-muted small">Repository</p>
                                <p class="mb-0 fw-bold">
                                    <a href="{{ $project->github_link }}" target="_blank" class="text-decoration-none">
                                        <i class="fab fa-github me-1"></i> GitHub Repository
                                    </a>
                                </p>
                            </div>
                        @endif

                        @if($project->documentation_path)
                            <div class="mb-3">
                                <p class="mb-1 text-muted small">Documentation</p>
                                <p class="mb-0 fw-bold">
                                    <a href="{{ route('projects.documentation.download', $project) }}" class="text-decoration-none">
                                        <i class="fa fa-file-pdf me-1"></i> PDF Documentation
                                    </a>
                                </p>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <a href="{{ route('projects.index') }}" class="btn btn-outline-primary">
                        <i class="fa fa-arrow-left me-2"></i> Back to Projects
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
