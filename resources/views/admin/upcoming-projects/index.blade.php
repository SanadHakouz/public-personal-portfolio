@extends('admin.layouts.app')

@section('title', 'Manage Upcoming Projects')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Upcoming Projects</h5>
        <a href="{{ route('admin.upcoming-projects.create') }}" class="btn btn-primary">Add New Project</a>
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
                        <th>Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th width="150">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($upcomingProjects as $project)
                        <tr>
                            <td>{{ $project->id }}</td>
                            <td>
                                @if($project->image_path)
                                    <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->title }}" style="max-height: 50px;">
                                @else
                                    No Image
                                @endif
                            </td>
                            <td>{{ $project->title }}</td>
                            <td>{{ Str::limit($project->description, 50) }}</td>
                            <td>
                                <a href="{{ route('admin.upcoming-projects.edit', $project) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('admin.upcoming-projects.destroy', $project) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this project?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No upcoming projects found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
