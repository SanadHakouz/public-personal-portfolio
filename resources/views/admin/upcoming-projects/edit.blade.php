@extends('admin.layouts.app')

@section('title', 'Edit Upcoming Project')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Edit Upcoming Project</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.upcoming-projects.update', $upcomingProject) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Project Title</label>
                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $upcomingProject->title) }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="4" required>{{ old('description', $upcomingProject->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Project Image</label>
                @if($upcomingProject->image_path)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $upcomingProject->image_path) }}" alt="{{ $upcomingProject->title }}" style="max-height: 200px;" class="d-block">
                        <div class="form-text">Current image</div>
                    </div>
                @endif
                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                <div class="form-text">Leave empty to keep the current image.</div>
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('admin.upcoming-projects.index') }}" class="btn btn-secondary">Cancel</a>
                <div>
                    <form action="{{ route('admin.upcoming-projects.destroy', $upcomingProject) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this project?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger me-2">Delete</button>
                    </form>
                    <button type="submit" class="btn btn-primary">Update Project</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
