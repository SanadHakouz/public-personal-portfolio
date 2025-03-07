@extends('admin.layouts.app')

@section('title', 'Edit Technology')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Edit Technology</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.technologies.update', $technology) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select id="category_id" name="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                    <option value="">Select a category</option>
                    @foreach($categories as $id => $name)
                        <option value="{{ $id }}" @selected(old('category_id', $technology->category_id) == $id)>{{ $name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Technology Name</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $technology->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="display_order" class="form-label">Display Order</label>
                <input id="display_order" type="number" class="form-control @error('display_order') is-invalid @enderror" name="display_order" value="{{ old('display_order', $technology->display_order) }}">
                <div class="form-text">Technologies with lower numbers will display first within their category</div>
                @error('display_order')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" @checked(old('is_active', $technology->is_active))>
                <label class="form-check-label" for="is_active">Active</label>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('admin.technologies.index') }}" class="btn btn-secondary">Cancel</a>
                <div>
                    <form action="{{ route('admin.technologies.destroy', $technology) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this technology?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger me-2">Delete</button>
                    </form>
                    <button type="submit" class="btn btn-primary">Update Technology</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
