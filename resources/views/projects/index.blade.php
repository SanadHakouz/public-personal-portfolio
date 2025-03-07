@extends('layouts.master')

@section('content')
<x-page-header
title="Projects"
background="images/bg2.jpg"
:breadcrumbs="['/' => 'Home', '/projects' => 'Projects', '/about' => 'About' , '/contact' => 'contact']"
/>

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="display-5 mb-5">Projects</h1>
        </div>

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
                <div class="col-12 text-center py-5">
                    <div class="py-5">
                        <i class="fa fa-folder-open fa-4x text-muted mb-4"></i>
                        <h4 class="text-muted">No projects found</h4>
                    </div>
                </div>
            @endforelse
        </div>

        @if(isset($upcomingProjects) && $upcomingProjects->count() > 0)
            <div class="text-center mt-5 mb-4">
                <h2 class="display-6 mb-4">Upcoming Projects</h2>
            </div>

            <div class="row g-4">
                @foreach($upcomingProjects as $project)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                            @if($project->image_path)
                                <div class="img-container" style="height: 200px; overflow: hidden;">
                                    <img src="{{ Storage::url($project->image_path) }}" class="card-img-top" alt="{{ $project->title }}" style="object-fit: cover; height: 100%; width: 100%;">
                                </div>
                            @else
                                <div class="bg-light text-center py-5">
                                    <i class="fa fa-lightbulb fa-3x text-warning"></i>
                                </div>
                            @endif

                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h5 class="card-title mb-0">{{ $project->title }}</h5>
                                    <span class="badge bg-warning text-dark rounded-pill">Coming Soon</span>
                                </div>
                                <p class="card-text text-muted">{{ Str::limit($project->description, 100) }}</p>
                            </div>

                            <div class="card-footer bg-white border-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ route('upcoming-projects.show', $project) }}" class="btn btn-sm btn-outline-warning">
                                            <i class="fa fa-eye"></i> View Details
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
