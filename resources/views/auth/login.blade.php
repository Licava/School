<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>Preskool - Login</title>

<link rel="shortcut icon" href="{{('design2/img/favicon.png')}}">

<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{('design2/plugins/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{('design2/plugins/feather/feather.css')}}">

<link rel="stylesheet" href="{{('design2/plugins/icons/flags/flags.css')}}">

<link rel="stylesheet" href="{{('design2/plugins/fontawesome/css/fontawesome.min.css')}}">
<link rel="stylesheet" href="{{('design2/plugins/fontawesome/css/all.min.css')}}">

<link rel="stylesheet" href="{{('design2/css/stylee.css')}}">
</head>
<body>

<div class="main-wrapper login-body">
<div class="login-wrapper">
<div class="container">
<div class="loginbox">
<div class="login-left">
<img class="img-fluid" src="{{('design2/img/login.png')}}" alt="Logo">
</div>
<div class="login-right">
<div class="login-right-wrap">
<h1>Welcome to Preskool</h1>
<p class="account-subtitle">Need an account? <a href="{{ route('register') }}">Sign Up</a></p>
<h2>Sign in</h2>

<form method="POST" action="{{ route('login') }}">
                        @csrf
<div class="form-group">
<label>Username <span class="login-danger">*</span></label>
<input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
<span class="profile-views"><i class="fas fa-user-circle"></i></span>
</div>
<div class="form-group">
<label>Password <span class="login-danger">*</span></label>
<input type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" id="password" >
<span class="profile-views feather-eye toggle-password"></span>
</div>
<div class="forgotpass">
<div class="remember-me">
<label class="custom_check mr-2 mb-0 d-inline-flex remember-me"> Remember me
<input type="checkbox" name="radio">
<span class="checkmark"></span>
</label>
</div>
<a href="{{ route('password.request') }}">Forgot Password?</a>
</div>
<div class="form-group">
<button class="btn btn-primary btn-block" type="submit">Login</button>
</div>
</form>

<div class="login-or">
<span class="or-line"></span>
<span class="span-or">or</span>
</div>

<div class="social-login">
<a href="#"><i class="fab fa-google-plus-g"></i></a>
<a href="#"><i class="fab fa-facebook-f"></i></a>
<a href="#"><i class="fab fa-twitter"></i></a>
<a href="#"><i class="fab fa-linkedin-in"></i></a>
</div>

</div>
</div>
</div>
</div>
</div>
</div>


<script src="{{('design2/js/jquery-3.6.0.min.js')}}"></script>

<script src="{{('design2/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{('design2/js/feather.min.js')}}"></script>

<script src="{{('design2/js/script.js')}}"></script>
</body>
</html>