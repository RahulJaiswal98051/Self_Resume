<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>AI Self Resume | Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <style>
    * {
      margin: 0; padding: 0; box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      height: 100vh;
      background: linear-gradient(135deg, #2c003e, #6800a5);
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-container {
      display: flex;
      width: 900px;
      height: 520px;
      background: white;
      box-shadow: 0 10px 30px rgba(0,0,0,0.3);
      border-radius: 14px;
      overflow: hidden;
    }

    .login-left {
      width: 45%;
      background: linear-gradient(135deg, #2c003e, #7e00ff);
      color: white;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 40px;
      text-align: center;
    }

    .login-left i {
      font-size: 65px;
      margin-bottom: 15px;
      color: #ffffffcc;
    }

    .login-left h2 {
      font-size: 26px;
      font-weight: 600;
    }

    .login-left p {
      font-size: 15px;
      margin-top: 10px;
      color: #ddddff;
    }

    .ai-badge {
      margin-top: 25px;
      background: rgba(255,255,255,0.1);
      padding: 10px 20px;
      border-radius: 30px;
      font-size: 14px;
      color: #ffffffcc;
      border: 1px solid #ffffff44;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .login-right {
      width: 55%;
      padding: 50px;
      background: #fff;
    }

    .login-right h2 {
      margin-bottom: 25px;
      color: #333;
    }

    .input-group {
      position: relative;
      margin-bottom: 20px;
    }

    .input-group label {
      font-size: 14px;
      margin-bottom: 5px;
      display: block;
      color: #555;
    }

    .input-group input {
      width: 100%;
      padding: 12px;
      padding-left: 40px;
      border: 1px solid #ccc;
      border-radius: 6px;
    }

    .input-group i {
      position: absolute;
      top: 38px;
      left: 12px;
      color: #7b2ff7;
    }

    .checkbox-group {
      margin-bottom: 20px;
    }

    .checkbox-group input {
      margin-right: 6px;
    }

    button {
      width: 100%;
      padding: 12px;
      background: #7b2ff7;
      color: white;
      font-size: 16px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }

    button:hover {
      background: #5e0cf5;
    }

    .register-link {
      margin-top: 20px;
      text-align: center;
    }

    .register-link a {
      color: #7b2ff7;
      text-decoration: none;
    }
  </style>
</head>
<body>
@if (session('message'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif




<div class="login-container">
  <!-- Left Panel -->
  <div class="login-left">
    <i class="fas fa-brain"></i>
    <h2>AI Self Resume</h2>
    <p>Build your smart resume with artificial intelligence</p>
    <div class="ai-badge">AI Powered</div>
  </div>

  <!-- Right Panel -->
  <div class="login-right">
    <form method="POST" action="{{ route('login-submit') }}">
      @csrf
      <h2>Login to Self Resume</h2>

      <div class="input-group">
        <label for="email">Email</label>
        <i class="fas fa-envelope"></i>
        <input type="email" id="email" name="email" required>
      </div>

      <div class="input-group">
        <label for="password">Password</label>
        <i class="fas fa-lock"></i>
        <input type="password" id="password" name="password" required>
      </div>

      

      <button type="submit">LOGIN</button>

      <div class="forgot-password-link" style="margin-top: 15px; text-align: center;">
        <a href="{{ route('password.request') }}" style="color: #7b2ff7; text-decoration: none;">Forgot Password?</a>
      </div>

      <div class="register-link">
        Don’t have an account? <a href="{{ route('signup') }}">Sign Up</a>
      </div>
    </form>
  </div>
</div>

</body>
</html>