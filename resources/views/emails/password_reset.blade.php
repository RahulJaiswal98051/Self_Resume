<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Password Reset Request - Self Resume</title>
    
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <style>
        /* Email-specific styles for better compatibility */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
        }
        
        .btn-reset {
            display: inline-block;
            padding: 15px 30px;
            background: linear-gradient(45deg, #0d6efd, #0b5ed7);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 16px;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(13, 110, 253, 0.3);
        }
        
        .btn-reset:hover {
            background: linear-gradient(45deg, #0b5ed7, #0a58ca);
            color: white;
            text-decoration: none;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(13, 110, 253, 0.4);
        }
        
        .security-notice {
            background-color: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 15px;
            margin: 20px 0;
            border-radius: 0 8px 8px 0;
        }
        
        .footer-links a {
            color: #6c757d;
            text-decoration: none;
            margin: 0 10px;
        }
        
        .footer-links a:hover {
            color: #0d6efd;
            text-decoration: underline;
        }
        
        @media (max-width: 600px) {
            .email-container {
                margin: 10px;
                width: calc(100% - 20px);
            }
            
            .btn-reset {
                display: block;
                width: 100%;
                margin: 20px 0;
            }
        }
    </style>
</head>
<body class="bg-light">

<div class="email-container">
    
    <!-- Header Section -->
    <div class="bg-primary text-white text-center py-5">
        <div class="container">
            <div class="mb-3">
                <i class="fas fa-shield-alt fa-4x text-warning"></i>
            </div>
            <h1 class="fw-bold mb-2">
                <i class="fas fa-key me-2"></i>
                Password Reset Request
            </h1>
            <p class="mb-0 fs-5 opacity-75">
                Secure your account with a new password
            </p>
        </div>
    </div>
    
    <!-- Main Content -->
    <div class="container py-5">
        
        <!-- Greeting -->
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="text-center mb-4">
                    <h2 class="text-dark mb-3">
                        <i class="fas fa-user-circle text-primary me-2"></i>
                        Hello !
                    </h2>
                </div>
                
                <!-- Main Message -->
                <div class="card border-0 shadow-sm rounded-3 mb-4">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start mb-3">
                            <i class="fas fa-info-circle text-info fa-lg me-3 mt-1"></i>
                            <div>
                                <p class="mb-3 fs-6">
                                    You are receiving this email because we received a <strong>password reset request</strong> for your account.
                                </p>
                                <p class="mb-0 text-muted">
                                    If you didn't request this reset, you can safely ignore this email.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Reset Button Section -->
                <div class="text-center my-5">
                    <h3 class="mb-4 text-dark">
                        <i class="fas fa-arrow-down text-primary me-2"></i>
                        Click the button below to reset your password
                    </h3>
                    
                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                        <a href="{{ $resetLink }}" class="btn-reset">
                            <i class="fas fa-unlock-alt me-2"></i>
                            Reset My Password
                        </a>
                    </div>
                    
                    <p class="mt-3 text-muted small">
                        <i class="fas fa-clock me-1"></i>
                        This link will expire in 60 minutes for security reasons
                    </p>
                </div>
                
                <!-- Security Notice -->
                <div class="security-notice">
                    <div class="d-flex align-items-start">
                        <i class="fas fa-exclamation-triangle text-warning fa-lg me-3 mt-1"></i>
                        <div>
                            <h5 class="text-warning mb-2">
                                <strong>Security Notice</strong>
                            </h5>
                            <p class="mb-2 small">
                                If you did not request a password reset, please ignore this email. Your account remains secure.
                            </p>
                            <p class="mb-0 small">
                                <strong>Tip:</strong> Never share your password reset links with anyone.
                            </p>
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
    
    <!-- Footer Section -->
    <div class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    
                    <!-- Company Info -->
                    <div class="mb-3">
                        <h5 class="mb-2">
                            <i class="fas fa-building text-warning me-2"></i>
                            Self Resume Team
                        </h5>
                        <p class="mb-0 text-white-50 small">
                            Professional Resume Builder Platform
                        </p>
                    </div>
                    
                    <!-- Contact Info -->
                    <div class="mb-3">
                        <div class="footer-links">
                            <a href="#" class="text-white-50">
                                <i class="fas fa-envelope me-1"></i>
                                Support
                            </a>
                            <a href="#" class="text-white-50">
                                <i class="fas fa-question-circle me-1"></i>
                                Help Center
                            </a>
                            <a href="#" class="text-white-50">
                                <i class="fas fa-shield-alt me-1"></i>
                                Privacy Policy
                            </a>
                        </div>
                    </div>
                    
                    <!-- Social Links -->
                    <div class="mb-3">
                        <a href="#" class="text-white-50 me-3">
                            <i class="fab fa-facebook fa-lg"></i>
                        </a>
                        <a href="#" class="text-white-50 me-3">
                            <i class="fab fa-twitter fa-lg"></i>
                        </a>
                        <a href="#" class="text-white-50 me-3">
                            <i class="fab fa-linkedin fa-lg"></i>
                        </a>
                        <a href="#" class="text-white-50">
                            <i class="fab fa-instagram fa-lg"></i>
                        </a>
                    </div>
                    
                    <!-- Copyright -->
                    <div class="border-top border-secondary pt-3">
                        <p class="mb-0 text-white-50 small">
                            <i class="fas fa-copyright me-1"></i>
                            {{ date('Y') }} Self Resume. All rights reserved.
                        </p>
                        <p class="mb-0 text-white-50 small mt-1">
                            <i class="fas fa-map-marker-alt me-1"></i>
                            This email was sent from a secure server
                        </p>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    
</div>

<!-- Bootstrap 5 JavaScript CDN (Optional for emails, but good for testing) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>