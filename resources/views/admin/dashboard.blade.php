@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="card">
    <div class="card-header">
        Administration Panel
    </div>
    <div class="card-body">
        <h5 class="card-title">Welcome to your Admin Dashboard</h5>
        <p class="card-text">This is your secure admin area where you can manage your website content.</p>

        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Projects</h5>
                        <p class="card-text">Manage your portfolio projects</p>
                        <a href="{{ route('admin.projects.index') }}" class="btn btn-light">Manage Projects</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Messages</h5>
                        <p class="card-text">View contact form submissions</p>
                        <a href="{{ route('admin.contacts.index') }}" class="btn btn-light">View Messages</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-info mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Settings</h5>
                        <p class="card-text">Configure website settings</p>
                        <a href="#" class="btn btn-light">Edit Settings</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Resume Management</h5>
                        <p class="card-text">Upload and manage your CV/Resume</p>
                        <a href="{{ route('admin.resumes.index') }}" class="btn btn-light">Manage Resumes</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Technologies</h5>
                        <p class="card-text">Manage your technology skills</p>
                        <div class="d-flex justify-content-between mt-2">
                            <a href="{{ route('admin.technology.categories.index') }}" class="btn btn-light">Categories</a>
                            <a href="{{ route('admin.technologies.index') }}" class="btn btn-light">Technologies</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-purple mb-3">
                <div class="card-body">
                    <h5 class="card-title">Upcoming Projects</h5>
                    <p class="card-text">Manage your upcoming project ideas</p>
                    <a href="{{ route('admin.upcoming-projects.index') }}" class="btn btn-light">Manage Upcoming Projects</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
