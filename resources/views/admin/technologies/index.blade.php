@extends('admin.layouts.app')

@section('title', 'Manage Technologies')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Technologies</h5>
        <a href="{{ route('admin.technologies.create') }}" class="btn btn-primary">Add New Technology</a>
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
                        <th>Category</th>
                        <th>Display Order</th>
                        <th>Status</th>
                        <th width="150">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($technologies as $technology)
                        <tr>
                            <td>{{ $technology->id }}</td>
                            <td>{{ $technology->name }}</td>
                            <td>{{ $technology->category->name ?? 'No Category' }}</td>
                            <td>{{ $technology->display_order }}</td>
                            <td>
                                <span class="badge {{ $technology->is_active ? 'bg-success' : 'bg-danger' }}">
                                    {{ $technology->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.technologies.edit', $technology) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('admin.technologies.destroy', $technology) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this technology?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No technologies found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
