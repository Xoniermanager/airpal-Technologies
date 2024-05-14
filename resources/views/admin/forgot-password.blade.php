<!DOCTYPE html>
<html lang="en">

 <head>
 @include('include.head')
</head>
<body>

<div class="main-wrapper login-body">
<div class="login-wrapper">
<div class="container">
<div class="loginbox">
<div class="login-left">
<img class="img-fluid" src="assets/img/logo-white.png" alt="Logo">
</div>
<div class="login-right">
<div class="login-right-wrap">
<h1>Forgot Password?</h1>
<p class="account-subtitle">Enter your email to get a password reset link</p>

<form action="{{ route('login.index') }}">
<div class="mb-3">
<input class="form-control" type="text" placeholder="Email">
</div>
<div class="mb-0">
<button class="btn btn-primary w-100" type="submit">Reset Password</button>
</div>
</form>

<div class="text-center dont-have">Remember your password? <a href="{{ route('login.index') }}">Login</a></div>
</div>
</div>
</div>
</div>
</div>
</div>
@include('include.footer')