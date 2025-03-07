@extends('admin.layouts.app')

@section('title', 'Edit Technology Category')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Edit Technology Category</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.technology.categories.update', $category) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $category->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="icon" class="form-label">Font Awesome Icon</label>
                <input id="icon" type="text" class="form-control @error('icon') is-invalid @enderror" name="icon" value="{{ old('icon', $category->icon) }}">
                <div class="form-text">Enter Font Awesome icon name without the 'fa-' prefix (e.g., 'laptop-code', 'server', 'database')</div>
                @error('icon')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <div class="mt-2">
                    <p class="form-text fw-bold mb-1">Common icons:</p>
                    <div class="d-flex flex-wrap gap-2 mt-2">
                        <span class="badge bg-light text-dark p-2"><i class="fas fa-laptop-code me-1"></i> laptop-code</span>
                        <span class="badge bg-light text-dark p-2"><i class="fas fa-server me-1"></i> server</span>
                        <span class="badge bg-light text-dark p-2"><i class="fas fa-database me-1"></i> database</span>
                        <span class="badge bg-light text-dark p-2"><i class="fas fa-mobile-alt me-1"></i> mobile-alt</span>
                        <span class="badge bg-light text-dark p-2"><i class="fas fa-tools me-1"></i> tools</span>
                        <span class="badge bg-light text-dark p-2"><i class="fas fa-code me-1"></i> code</span>
                        <span class="badge bg-light text-dark p-2"><i class="fas fa-cogs me-1"></i> cogs</span>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="color" class="form-label">Color</label>
                <select id="color" name="color" class="form-select @error('color') is-invalid @enderror">
                    <option value="primary" @selected(old('color', $category->color) == 'primary')>Primary (Blue)</option>
                    <option value="secondary" @selected(old('color', $category->color) == 'secondary')>Secondary (Gray)</option>
                    <option value="success" @selected(old('color', $category->color) == 'success')>Success (Green)</option>
                    <option value="danger" @selected(old('color', $category->color) == 'danger')>Danger (Red)</option>
                    <option value="warning" @selected(old('color', $category->color) == 'warning')>Warning (Yellow)</option>
                    <option value="info" @selected(old('color', $category->color) == 'info')>Info (Light Blue)</option>
                    <option value="dark" @selected(old('color', $category->color) == 'dark')>Dark</option>
                </select>
                @error('color')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="display_order" class="form-label">Display Order</label>
                <input id="display_order" type="number" class="form-control @error('display_order') is-invalid @enderror" name="display_order" value="{{ old('display_order', $category->display_order) }}">
                <div class="form-text">Categories with lower numbers will display first</div>
                @error('display_order')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('admin.technology.categories.index') }}" class="btn btn-secondary">Cancel</a>
                <div>
                    <form action="{{ route('admin.technology.categories.destroy', $category) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this category? This will also delete all technologies in this category.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger me-2">Delete</button>
                    </form>
                    <button type="submit" class="btn btn-primary">Update Category</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('styles')
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
