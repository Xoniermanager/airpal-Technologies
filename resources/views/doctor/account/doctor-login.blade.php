<!DOCTYPE html>
<html lang="zxx">

<head>
    @include('include.head')
</head>

<body style="
background: url(https://img.freepik.com/free-photo/blue-watercolor-stain-white-background_23-2147835864.jpg?t=st=1720166400~exp=1720170000~hmac=ab6c394438adaa520ddaa29029cfe72db0da5ec650b98f0544e75657b508836d&w=1060);
">

    <div class="main-wrapper">


        <div class="content top-space">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 offset-md-2">

                        <div class="account-content">
                            <div class="row align-items-center justify-content-center">
                                <div class="col-md-7 col-lg-6 login-left">
                                    <img src="../assets/img/doctor-login.jpg" class="img-fluid"
                                        alt="App Login">
                                </div> 
                                <div class="col-md-12 col-lg-6 login-right">
                                    <div class="login-header">
                                        <h3>Login <span>Airpal Doctor Dashbarod</span></h3>
                                    </div>
                                    <form method="POST" action="{{ route('admin.login') }}" id="doctorLogin">
                                        @csrf
                                        <div class="mb-3 form-focus">
                                            <input type="email" class="form-control floating" name="email" value="{{ old('email') }}">
                                            <label class="focus-label">Email</label>
                                            @if($errors->has('email'))
                                                <span class="text-danger" id="email_error">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                        <div class="mb-3 form-focus">
                                            <input type="password" class="form-control floating" name="password">
                                            <label class="focus-label">Password</label>
                                            @if($errors->has('password'))
                                                <span class="text-danger" id="password_error">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                        <div class="text-end">
                                            <a class="forgot-link" href="{{ route('doctor.forget.password.index') }}">Forgot Password ?</a>
                                        </div>
                                        @if(session('error'))
                                            <div class="alert alert-danger">{{ session('error') }}</div>
                                        @endif
                                        <button class="btn btn-primary w-100 btn-lg login-btn" type="submit">Login</button>
                                        <div class="login-or">
                                            <span class="or-line"></span>
                                            <span class="span-or">or</span>
                                        </div>
                                        <div class="row social-login">
                                            <div class="col-6">
                                                <a href="#" class="btn btn-facebook w-100"><i class="fab fa-facebook-f me-1"></i> Login</a>
                                            </div>
                                            <div class="col-6">
                                                <a href="#" class="btn btn-google w-100"><i class="fab fa-google me-1"></i> Login</a>
                                            </div>
                                        </div>
                                        <div class="text-center dont-have">Don't have an account? <a href="register.html">Register</a></div>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>



        <div class="mouse-cursor cursor-outer"></div>
        <div class="mouse-cursor cursor-inner"></div>

    </div>
    <div class="progress-wrap active-progress">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919px, 307.919px; stroke-dashoffset: 228.265px;">
            </path>
        </svg>
    </div> 
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

    <script>

        $(document).ready(function() {
                jQuery("#doctorLogin").validate({
                rules: {

                    email: {
                            required: true,
                            email: true
                        },
                    password: {
                            required: true,
                            minlength: 8,
                            maxlength: 30
                        },
                },
                messages: {

                    email: "Please enter a valid email address",
                        password: {
                            required: "Please enter your password",
                            minlength: "Password must be at least 8 characters long",
                            maxlength: "Password must be no more than 20 characters long"
                        },

                },
                submitHandler: function(form) {
                    var formData  = new FormData(form);
                    $.ajax({
                        url: "<?= route('doctor.doctor-login') ?>",
                        type: 'post',
                        data: formData,
                        dataType: 'json',
                        processData: false,
                        contentType: false, 
                        success: function(response) {
                            swal.fire("Done!", response.message, "success");
                            if (response.success == true) {
                                window.location.href = "<?= route('doctor.doctor-dashboard.index') ?>";
                            }
                        },
                        error: function(error_messages) {

                            Swal.fire("Error!", "Invalid credentials", "error");
                            var errors = error_messages.responseJSON;
                            $.each(errors.errors, function(key, value) {
                                console.log(value);
                                $('#' + key + '_error').html(value);
                            })

                        }
                    });
                }
            });
});

    </script>

    <style>
        .error {
    color: red;
}
    </style> --}}