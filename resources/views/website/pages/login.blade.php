@extends('layouts.frontend.main')
@section('content')
    <div class="content top-space">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">

                    <div class="account-content">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-7 col-lg-6 login-left">
                                <img src="{{ URL::asset('assets/img/login-banner.png') }}" class="img-fluid" alt="Login">
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
                                        <input type="email" class="form-control floating" name="email" id="email" required>
                                        <label class="focus-label">Email</label>
                                        <span class="text-denger" id="email_error" style="color: red">

                                    </div>
                                    <div class="mb-3 form-focus">
                                        <input type="password" class="form-control floating" name="password" id="password" required>
                                        <label class="focus-label">Password</label>
                                    </div>
                                    <span class="text-denger" id="password_error" style="color: red">
                                        <div class="text-end">
                                            <a class="forgot-link" href="{{ route('doctor.forget.password.index') }}">Forgot
                                                Password ?</a>
                                        </div>
                                        <button class="btn btn-primary btn-lg login-btn" style="width:97%" type="submit">Login</button>
                                        <span class="position-absolute" id="loaderImage">
                                            <img src="{{ asset('assets/img/1.webp') }}" class="loadingbtn"> 
                                        </span>
                                        <div class="login-or">
                                            <span class="or-line"></span>
                                            <span class="span-or">or</span>
                                        </div>
                                        <div class="text-center dont-have">Don't have an account? <a
                                                href="{{ route('choose') }}">Register</a>
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
            $("#loaderImage").hide();
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
                        beforeSend: function(msg){
                        $("#loaderImage").show();
                        $('#loginButton').prop('disabled', true);
                         },
                        success: function(response) {
                        let email    = encodeURIComponent($('#email').val());
                        let password = encodeURIComponent($('#password').val());
                        if (response.status == true) {
                            $("#loaderImage").hide();
                            $('#loginButton').prop('disabled', false);
                            setTimeout(function() {
                                window.location.href =
                                    "<?= route('verify.otp.index') ?>?email=" +
                                    email + "&password=" + password;
                            }, 2000); // 2000 ms = 2 seconds
                            swal.fire("Done!", response.message, "success");
                        }
                        else{
                            $("#loaderImage").hide();
                            $('#loginButton').prop('disabled', false);
                            Swal.fire("Error!", response.message, "error");
                        }
                    },
                    error: function(error_messages) {
                        $("#loaderImage").hide();
                        $('#loginButton').prop('disabled', false);
                        var errors = error_messages.responseJSON;
                        $.each(errors.errors, function(key, value) {
                            $('#' + key + '_error').html(value);
                        })

                    }
                    });
                }
            });
        });
    </script>
@endsection
