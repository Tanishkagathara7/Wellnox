@extends('admin.layouts.app')

@section('title', 'Admin Profile')
@section('page_title', 'My Profile & Security')

@section('content')

    <div class="row justify-content-center">
        <!-- Profile Information Card -->
        <div class="col-lg-6 mb-4">
            <div class="admin-card h-100">
                <div class="admin-card-header">
                    <h2 class="admin-card-title">Profile Information</h2>
                </div>
                <div class="admin-card-body">
                    <p class="text-muted small mb-4">Update your admin account's profile information and email address.</p>

                    <form action="{{ route('admin.profile.update') }}" method="POST" novalidate>
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="admin-form-label">Full Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control admin-form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="admin-form-label">Email Address <span class="text-danger">*</span></label>
                            <input type="email" name="email" id="email" class="form-control admin-form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-admin-bronze">
                            <i class="bi bi-check2 me-1"></i> Save Changes
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Password Change Card -->
        <div class="col-lg-6 mb-4">
            <div class="admin-card h-100">
                <div class="admin-card-header">
                    <h2 class="admin-card-title">Update Password</h2>
                </div>
                <div class="admin-card-body">
                    <p class="text-muted small mb-4">Ensure your account is using a long, random password to stay secure.</p>

                    <form action="{{ route('admin.profile.password') }}" method="POST" novalidate>
                        @csrf
                        @method('PUT')

                        <!-- Current Password -->
                        <div class="mb-3">
                            <label for="current_password" class="admin-form-label">Current Password <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="password" name="current_password" id="current_password" class="form-control admin-form-control @error('current_password') is-invalid @enderror" required>
                                <button type="button" class="btn btn-outline-secondary toggle-password-btn" data-target="#current_password">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                            @error('current_password')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- New Password -->
                        <div class="mb-3">
                            <label for="password" class="admin-form-label">New Password <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="password" name="password" id="password" class="form-control admin-form-control @error('password') is-invalid @enderror" required>
                                <button type="button" class="btn btn-outline-secondary toggle-password-btn" data-target="#password">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                            @error('password')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-4">
                            <label for="password_confirmation" class="admin-form-label">Confirm Password <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control admin-form-control" required>
                                <button type="button" class="btn btn-outline-secondary toggle-password-btn" data-target="#password_confirmation">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-admin-dark">
                            <i class="bi bi-shield-lock me-1"></i> Update Password
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
