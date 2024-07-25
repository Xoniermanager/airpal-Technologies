<!DOCTYPE html>
<html lang="zxx">
<style>
    .error-msg {
        color: red;
    }
</style>

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
                                    <img src="{{ URL::asset('assets/img/login-banner.png') }}" class="img-fluid"
                                        alt="Register">
                                </div>
                                <div class="col-md-12 col-lg-6 login-right">
                                    <div class="login-header">
                                        <h3> Registeration</h3>
                                    </div>

                                    <form action="{{ route('patient.register') }}" method="post">
                                        @csrf
                                        <div class="mb-3 form-focus">
                                            <input type="text" class="form-control floating" name="name" value="{{ old('name') }}">
                                            @error('name')
                                                <span class="error-msg">{{ $message }}</span>
                                            @enderror
                                            <label class="focus-label">Name</label>
                                        </div>
                                        <div class="mb-3 form-focus">
                                            <input type="text" class="form-control floating" name="email" value="{{ old('email') }}" >
                                            @error('email')
                                                <span class="error-msg">{{ $message }}</span>
                                            @enderror
                                            <label class="focus-label">Email</label>
                                        </div>
                                        <div class="mb-3 form-focus">
                                            <input type="text" class="form-control floating" name="phone_number"
                                            value="{{ old('phone_number') }}" >
                                            @error('phone_number')
                                                <span class="error-msg">{{ $message }}</span>
                                            @enderror
                                            <label class="focus-label">Mobile Number</label>
                                        </div>
                                        <div class="mb-3 form-focus">
                                            <input type="password" class="form-control floating" name="password"
                                                >
                                            @error('password')
                                                <span class="error-msg">{{ $message }}</span>
                                            @enderror
                                            <label class="focus-label">Create Password</label>
                                        </div>
                                        <div class="text-end">
                                            <a class="forgot-link" href="">Already have an account?</a>
                                        </div>
                                        <button class="btn btn-primary w-100 btn-lg login-btn"
                                            type="submit">Signup</button>
                                        <div class="login-or">
                                            {{-- <span class="or-line"></span>
<span class="span-or">or</span> --}}
                                        </div>
                                        {{-- <div class="row social-login">
<div class="col-6">
<a href="#" class="btn btn-facebook w-100"><i class="fab fa-facebook-f me-1"></i> Login</a>
</div>
<div class="col-6">
<a href="#" class="btn btn-google w-100"><i class="fab fa-google me-1"></i> Login</a>
</div>
</div> --}}
                                    </form>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @include('include.footer')
