<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Wellnox CMS</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo/favi.png') }}?v=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logo/favi.png') }}?v=1">
    <link rel="apple-touch-icon" href="{{ asset('assets/images/logo/favi.png') }}?v=1">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Admin CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/admin.css') }}?v={{ time() }}">
</head>
<body class="admin-body">

    <div class="admin-login-wrapper">
        <div class="admin-login-card">
            
            <div class="admin-login-header">
                <a href="{{ route('website.home') }}">
                    <img src="{{ asset('assets/images/logo/logo.png') }}" alt="Wellnox" height="46" class="mb-2">
                </a>
                <p class="text-white-50 small mb-0 text-uppercase" style="letter-spacing: 0.1em;">Management Control System</p>
            </div>

            <div class="admin-login-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show small py-2 px-3 mb-3" role="alert">
                        <i class="bi bi-check-circle me-1"></i> {{ session('success') }}
                        <button type="button" class="btn-close py-2" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show small py-2 px-3 mb-3" role="alert">
                        <i class="bi bi-exclamation-triangle me-1"></i> {{ $errors->first() }}
                        <button type="button" class="btn-close py-2" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.login.submit') }}" novalidate>
                    @csrf

                    <!-- Email Field -->
                    <div class="mb-3">
                        <label for="adminEmail" class="admin-form-label">Email Address <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-envelope"></i></span>
                            <input type="email" 
                                   name="email" 
                                   id="adminEmail" 
                                   class="form-control admin-form-control border-start-0 @error('email') is-invalid @enderror" 
                                   placeholder="admin@wellnox.com" 
                                   value="{{ old('email', 'rohantechmatrix@gmail.com') }}" 
                                   required 
                                   autofocus>
                        </div>
                        @error('email')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <label for="adminPassword" class="admin-form-label mb-0">Password <span class="text-danger">*</span></label>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-lock"></i></span>
                            <input type="password" 
                                   name="password" 
                                   id="adminPassword" 
                                   class="form-control admin-form-control border-start-0 border-end-0 @error('password') is-invalid @enderror" 
                                   placeholder="••••••••" 
                                   required>
                            <button type="button" class="btn btn-outline-secondary border-start-0 toggle-password-btn" data-target="#adminPassword" tabindex="-1">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                        @error('password')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="rememberMe" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label small text-muted" for="rememberMe">
                                Keep me logged in
                            </label>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-admin-bronze w-100 py-2 fs-6">
                        <i class="bi bi-box-arrow-in-right me-2"></i> Sign In to CMS
                    </button>
                </form>

                <div class="text-center mt-4 pt-3 border-top">
                    <a href="{{ route('website.home') }}" class="text-decoration-none text-muted small">
                        <i class="bi bi-arrow-left me-1"></i> Return to Wellnox Website
                    </a>
                </div>
            </div>

        </div>
    </div>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Admin JS -->
    <script src="{{ asset('assets/admin/js/admin.js') }}?v={{ time() }}"></script>
</body>
</html>
