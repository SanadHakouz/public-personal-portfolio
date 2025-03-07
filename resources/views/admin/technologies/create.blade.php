@extends('admin.layouts.app')

@section('title', 'Create Technology')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Create Technology</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.technologies.store') }}">
            @csrf

            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select id="category_id" name="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                    <option value="">Select a category</option>
                    @foreach($categories as $id => $name)
                        <option value="{{ $id }}" @selected(old('category_id') == $id)>{{ $name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Technology Name</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="display_order" class="form-label">Display Order</label>
                <input id="display_order" type="number" class="form-control @error('display_order') is-invalid @enderror" name="display_order" value="{{ old('display_order', 0) }}">
                <div class="form-text">Technologies with lower numbers will display first within their category</div>
                @error('display_order')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" @checked(old('is_active'))>
                <label class="form-check-label" for="is_active">Active</label>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('admin.technologies.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Create Technology</button>
            </div>
        </form>
    </div>
</div>
@endsection
