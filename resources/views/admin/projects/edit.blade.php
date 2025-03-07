@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Project: {{ $project->title }}</h6>
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-sm btn-secondary">
                        <i class="fas fa-arrow-left fa-sm"></i> Back to List
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label">Project Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $project->title) }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" required>{{ old('description', $project->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="github_link" class="form-label">GitHub Link</label>
                            <input type="url" class="form-control @error('github_link') is-invalid @enderror" id="github_link" name="github_link" value="{{ old('github_link', $project->github_link) }}">
                            @error('github_link')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="documentation_file" class="form-label">Documentation PDF</label>
                            <input type="file" class="form-control @error('documentation_file') is-invalid @enderror" id="documentation_file" name="documentation_file" accept=".pdf">
                            <small class="text-muted">Upload a new PDF file (max 10MB) or leave empty to keep existing</small>

                            @if($project->documentation_path)
                                <div class="mt-2">
                                    <p>Current documentation:
                                        <a href="{{ route('projects.documentation.download', $project) }}" target="_blank" class="btn btn-sm btn-info">
                                            <i class="fas fa-download"></i> Download PDF
                                        </a>
                                    </p>
                                </div>
                            @endif

                            @error('documentation_file')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="project_image" class="form-label">Project Screenshot</label>
                            <input type="file" class="form-control @error('project_image') is-invalid @enderror" id="project_image" name="project_image" accept="image/*">
                            <small class="text-muted">Upload a new image (max 2MB) or leave empty to keep existing</small>

                            @if($project->image_path)
                                <div class="mt-2">
                                    <p>Current image:</p>
                                    <img src="{{ Storage::url($project->image_path) }}" alt="{{ $project->title }}" class="img-thumbnail" style="max-height: 150px;">
                                </div>
                            @endif

                            @error('project_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('projects.show', $project) }}" target="_blank" class="btn btn-info">
                                <i class="fas fa-eye fa-sm"></i> View Project
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save fa-sm"></i> Update Project
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
