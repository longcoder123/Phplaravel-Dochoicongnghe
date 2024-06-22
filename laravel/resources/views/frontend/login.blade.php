

@extends('frontend.main')
@section('content')
  <style>
    /* Adjustments to center the form */
    .center {
      margin: auto;
      width: 50%;
      padding: 20px;
    }

    /* Custom style for the form */
    .custom-form {
      background-color: #f8f9fa;
      border: 1px solid #dee2e6;
      border-radius: 10px;
      padding: 20px;
      text-align: center; /* Center align form elements */
    }

    /* Custom style for the button */
    .custom-btn {
      background-color: #007bff;
      border-color: #007bff;
      width: 100%; /* Set button width to 100% */
    }

    /* Hover effect for the button */
    .custom-btn:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }

    /* Style for social login buttons */
    .social-btn {
      margin-top: 10px;
      width: 100%;
    }
  </style>

<div class="container center">
  <h2 class="text-center">Login</h2>
  @if ($message = Session::get('error'))

  <div class="alert alert-success alert-block">
  
      <button type="button" class="close" data-dismiss="alert">×</button>	
  
          <strong>{{ $message }}</strong>
  
  </div>
  
  @endif
  <form action="" method="POST" class="custom-form">
    @csrf
    <div class="form-group">
      <label for="email">Email </label>
      <input type="email" class="form-control" id="email" placeholder="Nhập Email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Mật khẩu</label>
      <input type="password" class="form-control" id="pwd" placeholder="Nhập mật khẩu" name="password">
    </div>
    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>
    <!-- Button is wrapped in a div to center it -->
    <div class="text-center mb-3">
      <button type="submit" class="btn btn-primary custom-btn">Đăng nhập</button>
    </div>
    <hr> <!-- Add a horizontal line -->
    <div class="text-center">
      <!-- Add social login buttons -->
      <a href="#" class="btn btn-danger social-btn"><i class="fab fa-google"></i> Sign in with Google</a>
      <a href="#" class="btn btn-primary social-btn"><i class="fab fa-facebook-f"></i> Sign in with Facebook</a>
    </div>
    <div class="mt-3">
      <p>Don't have an account? <a href="{{route('register')}}">Đăng ký</a></p>
    </div>
  </form>
</div>

<!-- Font Awesome library for icons -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

@stop()




