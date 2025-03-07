@extends('layouts.master')

@section('content')
<x-page-header
title="Upcoming Project"
background="images/bg2.jpg"
:breadcrumbs="['/' => 'Home', '/projects' => 'Projects']"
/>

<div class="container-xxl py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-header bg-white border-0 pt-4 px-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <h2 class="mb-0">{{ $upcomingProject->title }}</h2>
                            <span class="badge bg-warning text-dark rounded-pill px-3 py-2">Coming Soon</span>
                        </div>
                    </div>

                    @if($upcomingProject->image_path)
                        <div class="img-container px-4 pb-3">
                            <img src="{{ Storage::url($upcomingProject->image_path) }}" class="img-fluid rounded-4" alt="{{ $upcomingProject->title }}">
                        </div>
                    @endif

                    <div class="card-body px-4 pb-4">
                        <div class="mb-4">
                            <h4 class="text-primary mb-3">Project Description</h4>
                            <div class="description">
                                {{ $upcomingProject->description }}
                            </div>
                        </div>

                        <div class="mt-5">
                            <a href="{{ url()->previous() }}" class="btn btn-outline-primary">
                                <i class="fa fa-arrow-left me-2"></i> Back to Projects
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
