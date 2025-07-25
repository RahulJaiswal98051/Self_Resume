<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-primary bg-gradient">

<div class="container-fluid vh-100 d-flex align-items-center justify-content-center p-4">
    <div class="row w-100 justify-content-center">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
            
            <!-- Main Card -->
            <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                
                <!-- Card Header -->
                <div class="card-header bg-dark text-white text-center py-4 border-0">
                    <div class="mb-3">
                        <i class="fas fa-key fa-3x text-warning"></i>
                    </div>
                    <h2 class="fw-bold mb-2">
                        <i class="fas fa-lock-open me-2"></i>
                        Reset Password
                    </h2>
                    <p class="mb-0 text-white-50 fs-6">
                        Enter your new password to secure your account
                    </p>
                </div>
                
                <!-- Card Body -->
                <div class="card-body p-5 bg-light">
                    
                    <!-- Success Alert -->
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show border-0 rounded-3 mb-4" role="alert">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-check-circle fa-lg text-success me-3"></i>
                                <div class="flex-grow-1">
                                    <strong>Success!</strong> {{ session('status') }}
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    @endif

                    <!-- Error Alert -->
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show border-0 rounded-3 mb-4" role="alert">
                            <div class="d-flex align-items-start">
                                <i class="fas fa-exclamation-triangle fa-lg text-danger me-3 mt-1"></i>
                                <div class="flex-grow-1">
                                    <strong>Please fix the following errors:</strong>
                                    <ul class="mb-0 mt-2 ps-3">
                                        @foreach ($errors->all() as $error)
                                            <li class="small">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    @endif

                    <!-- Reset Form -->
                    <form method="POST" action="{{ url('password-reset/' . $token) }}" class="needs-validation" novalidate>
                        @csrf

                        <!-- New Password Input Group -->
                        <div class="mb-4">
                            <label for="password" class="form-label fw-semibold text-dark mb-3">
                                <i class="fas fa-lock text-primary me-2"></i>
                                New Password
                            </label>
                            
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bg-primary text-white border-primary">
                                    <i class="fas fa-key"></i>
                                </span>
                                <input 
                                    id="password" 
                                    type="password" 
                                    class="form-control border-primary @error('password') is-invalid @enderror" 
                                    name="password" 
                                    required 
                                    autofocus
                                    placeholder="Enter new password"
                                    minlength="8"
                                    style="border-left: none; border-right: none;">
                                <button class="btn btn-outline-secondary border-primary" type="button" id="togglePassword">
                                    <i class="fas fa-eye" id="toggleIcon"></i>
                                </button>
                                <div class="invalid-feedback">
                                    @error('password')
                                        <i class="fas fa-exclamation-circle me-1"></i>
                                        {{ $message }}
                                    @else
                                        Password must be at least 8 characters long.
                                    @enderror
                                </div>
                            </div>
                            
                            <!-- Help Text -->
                            <div class="form-text mt-2">
                                <i class="fas fa-info-circle text-info me-1"></i>
                                Password must be at least 8 characters long
                            </div>
                        </div>

                        <!-- Confirm Password Input Group -->
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label fw-semibold text-dark mb-3">
                                <i class="fas fa-lock text-primary me-2"></i>
                                Confirm New Password
                            </label>
                            
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bg-primary text-white border-primary">
                                    <i class="fas fa-shield-alt"></i>
                                </span>
                                <input 
                                    id="password_confirmation" 
                                    type="password" 
                                    class="form-control border-primary" 
                                    name="password_confirmation" 
                                    required
                                    placeholder="Confirm new password"
                                    minlength="8"
                                    style="border-left: none; border-right: none;">
                                <button class="btn btn-outline-secondary border-primary" type="button" id="togglePasswordConfirm">
                                    <i class="fas fa-eye" id="toggleIconConfirm"></i>
                                </button>
                                <div class="invalid-feedback">
                                    Passwords do not match.
                                </div>
                            </div>
                            
                            <!-- Help Text -->
                            <div class="form-text mt-2">
                                <i class="fas fa-info-circle text-info me-1"></i>
                                Re-enter your password to confirm
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid gap-2 mb-3">
                            <button type="submit" class="btn btn-primary btn-lg fw-semibold py-3 rounded-3 position-relative overflow-hidden">
                                <span class="btn-content">
                                    <i class="fas fa-check me-2"></i>
                                    Reset Password
                                </span>
                                <span class="btn-loading d-none">
                                    <i class="fas fa-spinner fa-spin me-2"></i>
                                    Resetting...
                                </span>
                            </button>
                        </div>

                        <!-- Security Notice -->
                        <div class="alert alert-info border-0 rounded-3 bg-info bg-opacity-10 mb-2">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-shield-alt text-info me-3"></i>
                                <small class="text-info-emphasis mb-0">
                                    <strong>Security Notice:</strong> After resetting, you'll be redirected to login with your new password.
                                </small>
                            </div>
                        </div>

                    </form>
                </div>
                
                <!-- Card Footer -->
                <div class="card-footer bg-white border-0 py-4">
                    <div class="row g-3 text-center">
                        <div class="col-6">
                            <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-sm rounded-pill text-decoration-none">
                                <i class="fas fa-arrow-left me-1"></i>
                                Back to Login
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('signup') }}" class="btn btn-outline-primary btn-sm rounded-pill text-decoration-none">
                                <i class="fas fa-user-plus me-1"></i>
                                Create Account
                            </a>
                        </div>
                    </div>
                    
                    <!-- Additional Help -->
                    <div class="text-center mt-4">
                        <small class="text-muted">
                            <i class="fas fa-question-circle me-1"></i>
                            Need help? Contact our 
                            <a href="#" class="text-decoration-none">support team</a>
                        </small>
                    </div>
                </div>
            </div>
            
            <!-- Additional Info Card -->
            <div class="card mt-4 border-0 bg-white bg-opacity-90">
                <div class="card-body text-center py-3">
                    <small class="text-muted">
                        <i class="fas fa-shield-alt text-success me-1"></i>
                        Your password is encrypted with enterprise-grade security
                    </small>
                </div>
            </div>
            
        </div>
    </div>
</div>

<!-- Bootstrap 5 JavaScript CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Form validation
    const form = document.querySelector('.needs-validation');
    const passwordInput = document.getElementById('password');
    const confirmInput = document.getElementById('password_confirmation');
    const submitBtn = document.querySelector('button[type="submit"]');
    const btnContent = submitBtn.querySelector('.btn-content');
    const btnLoading = submitBtn.querySelector('.btn-loading');

    // Toggle password visibility
    const togglePassword = document.getElementById('togglePassword');
    const toggleIcon = document.getElementById('toggleIcon');

    togglePassword.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        toggleIcon.classList.toggle('fa-eye');
        toggleIcon.classList.toggle('fa-eye-slash');
    });

    // Toggle confirm password visibility
    const togglePasswordConfirm = document.getElementById('togglePasswordConfirm');
    const toggleIconConfirm = document.getElementById('toggleIconConfirm');

    togglePasswordConfirm.addEventListener('click', function() {
        const type = confirmInput.getAttribute('type') === 'password' ? 'text' : 'password';
        confirmInput.setAttribute('type', type);
        toggleIconConfirm.classList.toggle('fa-eye');
        toggleIconConfirm.classList.toggle('fa-eye-slash');
    });

    // Real-time password validation
    passwordInput.addEventListener('input', function() {
        const password = this.value;
        const confirmPassword = confirmInput.value;
        
        // Validate password length
        if (password.length >= 8) {
            this.classList.remove('is-invalid');
            this.classList.add('is-valid');
        } else if (password.length > 0) {
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
        } else {
            this.classList.remove('is-invalid', 'is-valid');
        }
        
        // Check if passwords match
        if (confirmPassword && password !== confirmPassword) {
            confirmInput.classList.add('is-invalid');
            confirmInput.classList.remove('is-valid');
        } else if (confirmPassword && password === confirmPassword) {
            confirmInput.classList.remove('is-invalid');
            confirmInput.classList.add('is-valid');
        }
    });

    // Real-time confirm password validation
    confirmInput.addEventListener('input', function() {
        const password = passwordInput.value;
        const confirmPassword = this.value;
        
        if (confirmPassword && password !== confirmPassword) {
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
        } else if (confirmPassword && password === confirmPassword) {
            this.classList.remove('is-invalid');
            this.classList.add('is-valid');
        } else if (!confirmPassword) {
            this.classList.remove('is-invalid', 'is-valid');
        }
    });

    // Form submission handling
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        event.stopPropagation();

        // Check if passwords match
        const password = passwordInput.value;
        const confirmPassword = confirmInput.value;
        
        if (password !== confirmPassword) {
            confirmInput.classList.add('is-invalid');
            form.classList.add('was-validated');
            return;
        }

        if (form.checkValidity()) {
            // Show loading state
            btnContent.classList.add('d-none');
            btnLoading.classList.remove('d-none');
            submitBtn.disabled = true;
            
            // Submit form after short delay for UX
            setTimeout(() => {
                form.submit();
            }, 500);
        }

        form.classList.add('was-validated');
    });

    // Auto-hide alerts after 8 seconds
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(function(alert) {
        setTimeout(function() {
            if (alert.classList.contains('show')) {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            }
        }, 8000);
    });

    // Add focus effects
    [passwordInput, confirmInput].forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('shadow-sm');
        });

        input.addEventListener('blur', function() {
            this.parentElement.classList.remove('shadow-sm');
        });
    });

    // Password strength indicator (visual feedback)
    passwordInput.addEventListener('input', function() {
        const password = this.value;
        const strength = getPasswordStrength(password);
        
        // You can add visual feedback here if needed
        // For example, change border color based on strength
    });

    function getPasswordStrength(password) {
        let strength = 0;
        if (password.length >= 8) strength++;
        if (/[a-z]/.test(password)) strength++;
        if (/[A-Z]/.test(password)) strength++;
        if (/[0-9]/.test(password)) strength++;
        if (/[^A-Za-z0-9]/.test(password)) strength++;
        return strength;
    }
});
</script>

</body>
</html>