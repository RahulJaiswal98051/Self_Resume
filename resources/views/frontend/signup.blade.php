<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Self Resume</title>
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

    .signup-container {
      display: flex;
      width: 900px;
      height: 560px;
      background: white;
      box-shadow: 0 10px 30px rgba(0,0,0,0.3);
      border-radius: 14px;
      overflow: hidden;
    }

    .signup-left {
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

    .signup-left i {
      font-size: 65px;
      margin-bottom: 15px;
      color: #ffffffcc;
    }

    .signup-left h2 {
      font-size: 26px;
      font-weight: 600;
    }

    .signup-left p {
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

    .signup-right {
      width: 55%;
      padding: 50px 40px 50px 40px;
      background: #fff;
    }

    .signup-right h2 {
      margin-top: -25px;
      margin-bottom: 10px;
      color: #333;
    }

    .input-group {
      position: relative;
      margin-bottom: 10px;
    }

    .input-group label {
      font-size: 10px;
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

    .login-link {
      margin-top: 20px;
      text-align: center;
    }

    .login-link a {
      color: #7b2ff7;
      text-decoration: none;
    }

    .alert-danger {
      background: #e74c3c;
      color: white;
      padding: 10px 20px;
      border-radius: 5px;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>

@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<div class="signup-container">
  <!-- Left Panel -->
  <div class="signup-left">
    <i class="fas fa-robot"></i>
    <h2>AI Self Resume</h2>
    <p>Create your intelligent resume with ease</p>
    <div class="ai-badge">AI Powered</div>
  </div>

  <!-- Right Panel -->
  <div class="signup-right">
    <form method="POST" action="{{ route('signup-submit') }}" multipart="true" enctype="multipart/form-data">
      @csrf
      <h2>Sign Up</h2>

      <div class="input-group">
        <label for="name">Name</label>
        <i class="fas fa-user"></i>
        <input type="text" id="name" name="name" required pattern="[A-Za-z\s]{2,50}" title="Enter a valid name (letters only)">
      </div>

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
      <div class="input-group">
        <label for="password_confirmation">Confirm Password</label>
        <i class="fas fa-lock"></i>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
      </div>

      <div class="input-group">
        <label for="profile">Profile</label>
        <i class="fas fa-user"></i>
        <input type="file" id="profile" name="profile"  required>
      </div>

      <button type="submit">Submit</button>

      <div class="login-link">
        Already have an account? <a href="{{ route('login') }}">Login</a>
      </div>
    </form>
  </div>
</div>

</body>
</html>