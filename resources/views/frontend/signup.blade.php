<!DOCTYPE html>
<!-- Coding By CodingNepal - www.codingnepalweb.com -->
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Self Resume</title>
<link rel="stylesheet" href="{{ asset('custom.css') }}">

   
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
  <div class="wrapper">
    <form action="{{route('signup-submit')}}" method='POST'>
      @csrf
      <h2>Sign Up</h2>
       <div class="input-field">
  <input type="text" name="name" required pattern="[A-Za-z\s]{2,50}" title="Please enter a valid name (letters and spaces only, 2-50 characters)">
  <label>Enter your Name</label>
</div>

      <div class="input-field">
        <input type="email" name="email" required>
        <label>Enter your Email</label>
      </div>
      <div class="input-field">
        <input type="password" name="password" required>
        <label>Enter your Password</label>
      </div>
      
      
      <button type="submit">Submit</button>
      
    </form>
  </div>
</body>
</html>