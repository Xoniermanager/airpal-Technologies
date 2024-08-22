@extends('layouts.frontend.main')
@section('content')
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

                                    <form action="{{ route('forget.password.send.otp') }}" method="post">
                                        @csrf
                                        <div class="mb-3 form-focus">
                                            <input type="email" class="form-control floating" name="email">
                                            <label class="focus-label">Email</label>
                                        </div>
                                        <div class="text-end">
                                            <a class="forgot-link" href="">Remember your password?</a>
                                        </div>
                                        <button class="btn btn-primary w-100 btn-lg login-btn" type="submit">Reset
                                            Password</button>
                                    </form>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @endsection
