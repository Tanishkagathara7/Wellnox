@extends('admin.layouts.app')

@section('title', 'Enquiry from ' . $contact->name)
@section('page_title', 'Contact Enquiry Details')

@section('content')

    <div class="row g-4">
        <!-- Message Card -->
        <div class="col-lg-8">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h2 class="admin-card-title">Enquiry #{{ $contact->id }} &bull; {{ $contact->name }}</h2>
                    <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm btn-admin-outline">
                        <i class="bi bi-arrow-left me-1"></i> Back to Enquiries
                    </a>
                </div>
                <div class="admin-card-body">
                    <!-- Subject Banner -->
                    <div class="p-3 mb-4 rounded-3 border bg-light d-flex justify-content-between align-items-center">
                        <div>
                            <span class="text-muted small text-uppercase fw-bold d-block">Subject</span>
                            <span class="fs-6 fw-bold text-dark">{{ $contact->subject }}</span>
                        </div>
                        <div>
                            @if($contact->status === 'new')
                                <span class="badge-enquiry-new">New Enquiry</span>
                            @elseif($contact->status === 'read')
                                <span class="badge-enquiry-read">Marked as Read</span>
                            @elseif($contact->status === 'replied')
                                <span class="badge-enquiry-replied">Replied to Client</span>
                            @else
                                <span class="badge-enquiry-archived">Archived</span>
                            @endif
                        </div>
                    </div>

                    <!-- Client Message Text -->
                    <div class="mb-4">
                        <span class="text-muted small text-uppercase fw-bold d-block mb-2">Requirement / Message Content</span>
                        <div class="p-3 rounded-3 border bg-white text-dark" style="white-space: pre-line; line-height: 1.8; font-size: 15px;">
                            {{ $contact->message }}
                        </div>
                    </div>

                    <!-- Direct Contact CTAs -->
                    <div class="d-flex flex-wrap gap-2 pt-3 border-top">
                        <a href="mailto:{{ $contact->email }}?subject=Re:%20{{ urlencode($contact->subject) }}" class="btn btn-admin-bronze d-inline-flex align-items-center gap-2">
                            <i class="bi bi-envelope-fill"></i>
                            <span>Reply via Email</span>
                        </a>

                        @if($contact->phone)
                            <a href="tel:{{ $contact->phone }}" class="btn btn-admin-dark d-inline-flex align-items-center gap-2">
                                <i class="bi bi-telephone-fill"></i>
                                <span>Call {{ $contact->phone }}</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Meta & Status Actions Card -->
        <div class="col-lg-4">
            <!-- Client Details Box -->
            <div class="admin-card mb-4">
                <div class="admin-card-header">
                    <h2 class="admin-card-title">Client Details</h2>
                </div>
                <div class="admin-card-body">
                    <div class="mb-3">
                        <span class="text-muted small d-block">Full Name</span>
                        <span class="fw-bold text-dark">{{ $contact->name }}</span>
                    </div>

                    <div class="mb-3">
                        <span class="text-muted small d-block">Email Address</span>
                        <a href="mailto:{{ $contact->email }}" class="fw-semibold text-decoration-none">
                            {{ $contact->email }}
                        </a>
                    </div>

                    <div class="mb-3">
                        <span class="text-muted small d-block">Phone Number</span>
                        <a href="tel:{{ $contact->phone }}" class="fw-semibold text-decoration-none text-dark">
                            {{ $contact->phone }}
                        </a>
                    </div>

                    <div class="mb-3">
                        <span class="text-muted small d-block">Received Date &amp; Time</span>
                        <span class="small">{{ $contact->created_at->format('d M Y, h:i A') }}</span>
                    </div>

                    <div>
                        <span class="text-muted small d-block">Last Updated</span>
                        <span class="small">{{ $contact->updated_at->diffForHumans() }}</span>
                    </div>
                </div>
            </div>

            <!-- Status Changer Box -->
            <div class="admin-card">
                <div class="admin-card-header">
                    <h2 class="admin-card-title">Update Status</h2>
                </div>
                <div class="admin-card-body">
                    <form action="{{ route('admin.contacts.update', $contact) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="mb-3">
                            <label for="status" class="admin-form-label">Workflow Status</label>
                            <select name="status" id="status" class="form-select admin-form-select">
                                <option value="new" {{ $contact->status === 'new' ? 'selected' : '' }}>New</option>
                                <option value="read" {{ $contact->status === 'read' ? 'selected' : '' }}>Read</option>
                                <option value="replied" {{ $contact->status === 'replied' ? 'selected' : '' }}>Replied</option>
                                <option value="archived" {{ $contact->status === 'archived' ? 'selected' : '' }}>Archived</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-admin-bronze w-100 mb-2">
                            Update Status
                        </button>
                    </form>

                    <hr class="my-3">

                    <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" onsubmit="return confirm('Are you sure you want to permanently delete this contact enquiry?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm w-100">
                            <i class="bi bi-trash me-1"></i> Delete Enquiry
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
