<!DOCTYPE html>
<html lang="zxx">

<head>
    @include('include.head')
</head>

<body style="background: url(https://img.freepik.com/free-photo/blue-watercolor-stain-white-background_23-2147835864.jpg?t=st=1720166400~exp=1720170000~hmac=ab6c394438adaa520ddaa29029cfe72db0da5ec650b98f0544e75657b508836d&w=1060); ">
    <div class="main-wrapper">
        <div class="content top-space">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="account-content">
                            <div class="row align-items-center justify-content-center">
                                <div class="col-md-7 col-lg-6 login-left">
                                    <img src="{{ URL::asset('assets/img/login-banner.png') }}" class="img-fluid"
                                        alt="Login Banner">
                                </div>
                                <div class="col-md-12 col-lg-6 login-right">
                                    <div class="login-header">
                                        <h3>Forgot Password?</h3>
                                        <p class="small text-muted">Enter your email to get a password reset link</p>
                                    </div>
                                    <form action="{{ route('reset.password') }}" method="post">
                                        @csrf
                                        <div class="mb-3 form-focus">
                                            <input type="password" class="form-control floating" name="new_password">
                                            <label class="focus-label">New Password</label>
                                            @error('new_password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    
                                        <div class="mb-3 form-focus">
                                            <input type="password" class="form-control floating" name="new_password_confirmation">
                                            <label class="focus-label">Confirm Password</label>
                                            @error('new_password_confirmation')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    
                                        <input type="hidden" value="{{ $email ?? '' }}" name="email">
                                    
                                        <div class="mb-3 form-focus">
                                            <input type="number" class="form-control floating" name="otp">
                                            <label class="focus-label">OTP</label>
                                            @error('otp')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    
                                        {{-- <div class="text-end">
                                            <a href="#" id="resendOtpLink" class="forgot-link">Resend OTP</a>
                                        </div> --}}
                                        <button class="btn btn-primary w-100 btn-lg login-btn" type="submit">Send OTP</button>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
       