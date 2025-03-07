@extends('admin.layouts.app')

@section('title', 'Manage Technology Categories')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Technology Categories</h5>
        <a href="{{ route('admin.technology.categories.create') }}" class="btn btn-primary">Add New Category</a>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Color</th>
                        <th>Display Order</th>
                        <th>Technologies</th>
                        <th width="150">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-{{ $category->icon }} me-2 text-{{ $category->color }}"></i>
                                    {{ $category->name }}
                                </div>
                            </td>
                            <td><span class="badge bg-{{ $category->color }}">{{ $category->color }}</span></td>
                            <td>{{ $category->display_order }}</td>
                            <td>{{ $category->technologies->count() }}</td>
                            <td>
                                <a href="{{ route('admin.technology.categories.edit', $category) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('admin.technology.categories.destroy', $category) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this category? This will also delete all technologies in this category.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No categories found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('styles')
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
