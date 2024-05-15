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
<img src="{{URL::asset('assets/img/login-banner.png')}}" class="img-fluid" alt="Login Banner">
</div>
<div class="col-md-12 col-lg-6 login-right">
<div class="login-header">
<h3>Forgot Password?</h3>
<p class="small text-muted">Enter your email to get a password reset link</p>
</div>

<form action="#">
<div class="mb-3 form-focus">
<input type="email" class="form-control floating">
<label class="focus-label">Email</label>
</div>
<div class="text-end">
<a class="forgot-link" href="{{ route('login.index') }}">Remember your password?</a>
</div>
<button class="btn btn-primary w-100 btn-lg login-btn" type="submit">Reset Password</button>
</form>

</div>
</div>
</div>

</div>
</div>
</div>
</div>
@include('include.footer') 