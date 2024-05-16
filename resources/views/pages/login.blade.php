<!DOCTYPE html>
<html lang="zxx">
<head>
@include('include.head')
</head>
<body>
    <div class="main-wrapper">
    @include('include.header')

<div class="content top-space">
<div class="container-fluid">
<div class="row">
<div class="col-md-8 offset-md-2">

<div class="account-content">
<div class="row align-items-center justify-content-center">
<div class="col-md-7 col-lg-6 login-left">
<img src="{{URL::asset('assets/img/login-banner.png')}}" class="img-fluid" alt="Login">
</div>
<div class="col-md-12 col-lg-6 login-right">
<div class="login-header">
<h3>Login <span>Airpal</span></h3>
</div>
<form action="{{route('login.userLogin')}}" method="post">
    @csrf
    @if (\Session::has('error'))
        <p style="color: red;">{{\Session::get('error')}}</p>
    @endif
<div class="mb-3 form-focus">
<input type="email" class="form-control floating" name="email" required>
<label class="focus-label">Email</label>
</div>
<div class="mb-3 form-focus">
<input type="password" class="form-control floating" name="password" required>
<label class="focus-label">Password</label>
</div>
<div class="text-end">
<a class="forgot-link" href="{{ route('forgot-password.index') }}">Forgot Password ?</a>
</div>
<button class="btn btn-primary w-100 btn-lg login-btn" type="submit">Login</button>
<div class="login-or">
{{-- <span class="or-line"></span>
<span class="span-or">or</span>
</div>
<div class="row social-login">
<div class="col-6">
<a href="#" class="btn btn-facebook w-100"><i class="fab fa-facebook-f me-1"></i> Login</a>
</div>
<div class="col-6">
<a href="#" class="btn btn-google w-100"><i class="fab fa-google me-1"></i> Login</a>
</div>
</div> --}}
<div class="text-center dont-have">Don't have an account? <a href="{{ route('register.index') }}">Register</a></div>
</form>
</div>
</div>
</div>

</div>
</div>
</div>
</div>
@include('include.footer')
 