@extends('admin.layouts.app')

@section('title', 'View Contact Request')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Contact Request Details</h5>
            <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back to List
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <div class="mb-4">
                    <h5>Subject</h5>
                    <p class="fs-4">{{ $contactRequest->subject }}</p>
                </div>

                <div class="mb-4">
                    <h5>Message</h5>
                    <div class="card bg-light">
                        <div class="card-body">
                            {{ $contactRequest->message }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Sender Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <h6>Name</h6>
                            <p>{{ $contactRequest->name }}</p>
                        </div>

                        <div class="mb-3">
                            <h6>Email</h6>
                            <p>
                                <a href="mailto:{{ $contactRequest->email }}">
                                    {{ $contactRequest->email }}
                                </a>
                            </p>
                        </div>

                        <div class="mb-3">
                            <h6>Date</h6>
                            <p>{{ $contactRequest->created_at->format('F d, Y g:i A') }}</p>
                        </div>

                        <div class="mb-3">
                            <h6>Status</h6>
                            <p>
                                @if($contactRequest->is_read)
                                    <span class="badge bg-success">Read</span>
                                @else
                                    <span class="badge bg-warning">Unread</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <a href="mailto:{{ $contactRequest->email }}" class="btn btn-primary w-100 mb-2">
                        <i class="bi bi-reply"></i> Reply by Email
                    </a>

                    <form action="{{ route('admin.contacts.destroy', $contactRequest) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Are you sure you want to delete this contact request?')">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
