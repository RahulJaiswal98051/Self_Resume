<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset Request</title>
    
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
                        <i class="fas fa-shield-alt fa-3x text-warning"></i>
                    </div>
                    <h2 class="fw-bold mb-2">
                        <i class="fas fa-unlock-alt me-2"></i>
                        Reset Password
                    </h2>
                    <p class="mb-0 text-white-50 fs-6">
                        Enter your email address to receive a secure reset link
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
                    <form method="POST" action="{{ route('password.email') }}" class="needs-validation" novalidate>
                        @csrf

                        <!-- Email Input Group -->
                        <div class="mb-4">
                            <label for="email" class="form-label fw-semibold text-dark mb-3">
                                <i class="fas fa-envelope text-primary me-2"></i>
                                Email Address
                            </label>
                            
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bg-primary text-white border-primary">
                                    <i class="fas fa-at"></i>
                                </span>
                                <input 
                                    id="email" 
                                    type="email" 
                                    class="form-control border-primary @error('email') is-invalid @enderror" 
                                    name="email" 
                                    required 
                                    autofocus
                                    placeholder="Enter your email address"
                                    value="{{ old('email') }}"
                                    style="border-left: none;">
                                <div class="invalid-feedback">
                                    @error('email')
                                        <i class="fas fa-exclamation-circle me-1"></i>
                                        {{ $message }}
                                    @else
                                        Please provide a valid email address.
                                    @enderror
                                </div>
                            </div>
                            
                            <!-- Help Text -->
                            <div class="form-text mt-2">
                                <i class="fas fa-info-circle text-info me-1"></i>
                                We'll send a secure password reset link to this email address
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid gap-2 mb-3">
                            <button type="submit" class="btn btn-primary btn-lg fw-semibold py-3 rounded-3 position-relative overflow-hidden">
                                <span class="btn-content">
                                    <i class="fas fa-paper-plane me-2"></i>
                                    Send Reset Link
                                </span>
                                <span class="btn-loading d-none">
                                    <i class="fas fa-spinner fa-spin me-2"></i>
                                    Sending...
                                </span>
                            </button>
                        </div>

                        <!-- Security Notice -->
                        <div class="alert alert-info border-0 rounded-3 bg-info bg-opacity-10 mb-2">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-lock text-info me-3"></i>
                                <small class="text-info-emphasis mb-0">
                                    <strong>Security Notice:</strong> The reset link will expire in 60 minutes for your protection.
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
            
            <!-- Additional Info Card
            <div class="card mt-4 border-0 bg-white bg-opacity-90">
                <div class="card-body text-center py-3">
                    <small class="text-muted">
                        <i class="fas fa-shield-alt text-success me-1"></i>
                        Your data is protected with enterprise-grade security
                    </small>
                </div>
            </div> -->
            
        </div>
    </div>
</div>

<!-- Bootstrap 5 JavaScript CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Form validation
    const form = document.querySelector('.needs-validation');
    const emailInput = document.getElementById('email');
    const submitBtn = document.querySelector('button[type="submit"]');
    const btnContent = submitBtn.querySelector('.btn-content');
    const btnLoading = submitBtn.querySelector('.btn-loading');

    // Real-time email validation
    emailInput.addEventListener('input', function() {
        const email = this.value.trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        
        if (email && !emailRegex.test(email)) {
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
        } else if (email) {
            this.classList.remove('is-invalid');
            this.classList.add('is-valid');
        } else {
            this.classList.remove('is-invalid', 'is-valid');
        }
    });

    // Form submission handling
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        event.stopPropagation();

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
    emailInput.addEventListener('focus', function() {
        this.parentElement.classList.add('shadow-sm');
    });

    emailInput.addEventListener('blur', function() {
        this.parentElement.classList.remove('shadow-sm');
    });
});
</script>

</body>
</html>