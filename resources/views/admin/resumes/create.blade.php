@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add New Resume</h1>
        <a href="{{ route('admin.resumes.index') }}" class="btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back to List
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Resume Details</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.resumes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="cv_file">PDF File</label>
                    <input type="file" class="form-control-file @error('cv_file') is-invalid @enderror" id="cv_file" name="cv_file" required>
                    <small class="form-text text-muted">Upload a PDF file (max 2MB)</small>
                    @error('cv_file')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="is_active" name="is_active" {{ old('is_active') ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">Set as Active Resume</label>
                    <small class="form-text text-muted">If checked, this will be the resume users can download from your site</small>
                </div>

                <button type="submit" class="btn btn-primary">Upload Resume</button>
            </form>
        </div>
    </div>
</div>
@endsection
