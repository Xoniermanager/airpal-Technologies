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
                                        alt="Login">
                                </div>
                                <div class="col-md-12 col-lg-6 login-right">
                                    <div class="login-header">
                                        <h3>Login <span>Airpal</span></h3>
                                    </div>
                                    <form id="login" method="post">
                                        @csrf
                                        @if (\Session::has('error'))
                                            <p style="color: red;">{{ \Session::get('error') }}</p>
                                        @endif
                                        <div class="mb-4 form-focus">
                                            <input type="email" class="form-control floating" name="email" required>
                                            <label class="focus-label">Email</label>
                                            <span class="text-denger" id="email_error" style="color: red">
                                                
                                        </div>
                                        <div class="mb-3 form-focus">
                                            <input type="password" class="form-control floating" name="password"
                                                required >
                                            <label class="focus-label">Password</label>
                                        </div>
                                        <span class="text-denger" id="password_error" style="color: red">
                                        <div class="text-end">
                                            <a class="forgot-link" href="">Forgot
                                                Password ?</a>
                                        </div>
                                        <button class="btn btn-primary w-100 btn-lg login-btn"
                                            type="submit">Login</button>
                                        <div class="login-or">
                                            <span class="or-line"></span>
                                            <span class="span-or">or</span>
                                        </div>
                                        <div class="text-center dont-have">Don't have an account? <a
                                                href="{{ route('register.index') }}">Register</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @endsection
@section('javascript')
        <script>
            $(document).ready(function() {
                $("#login").validate({
                    rules: {
                        email: {
                            required: true,
                            email: true
                        },
                        password: {
                            required: true,
                            minlength: 8, // Correcting the minlength here as well
                            maxlength: 30
                        },
                    },
                    messages: {
                        email: "Please enter a valid email address",
                        password: {
                            required: "Please enter your password",
                            minlength: "Password must be at least 8 characters long", // Ensuring consistency
                            maxlength: "Password must be no more than 30 characters long"
                        },
                    },
                    submitHandler: function(form) {
                        var formData = new FormData(form);
                        $.ajax({
                            url: "{{ route('login') }}",
                            type: 'post',
                            data: formData,
                            processData: false,
                            contentType: false,
                            dataType: 'json',
                            success: function(response) {
                                console.log(response);
                                if (response.success) {
                                    window.location.href = response.redirect_url;
                                } else {
                                    Swal.fire("Error!", response.message, "error");
                                }
                            },
                            error: function(error_messages) {
                                Swal.fire("Error!", "Invalid credentials", "error");
                                var errors = error_messages.responseJSON.errors;
                                $.each(errors, function(key, value) {
                                    $('#' + key + '_error').html(value);
                                });
                            }
                        });
                    }
                });
            });
        </script>
@endsection