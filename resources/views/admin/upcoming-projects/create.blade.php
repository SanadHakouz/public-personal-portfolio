@extends('admin.layouts.app')

@section('title', 'Create Upcoming Project')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Create Upcoming Project</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.upcoming-projects.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Project Title</label>
                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="4" required>{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Project Image</label>
                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                <div class="form-text">Optional. Recommended size: 1200x800px.</div>
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('admin.upcoming-projects.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Create Project</button>
            </div>
        </form>
    </div>
</div>
@endsection
