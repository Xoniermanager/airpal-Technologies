<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Xonier technologies">
    <meta property="og:asset" content="">
    <meta property="og:type" content="website">
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:image" content="/assets/img/logo.png">
    <meta property="twitter:domain" content="">
    <meta property="twitter:asset" content="">
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="{{ asset('/assets/img/logo.png') }}">
    <title>Airpal Technology</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/assets/img/favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/plugins/fontawesome/css/all.min.css') }}">
    <script src="assets/js/script.js" type="cd1ed460c5054330c2effc78-text/javascript"></script>
    <script src="../assets/js/rocket-loader.min.js" data-cf-settings="cd1ed460c5054330c2effc78-|49" defer></script>
    <link rel="stylesheet" href="{{ asset('admin/assets/css/feathericon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/datatables/datatables.min.css') }}">
    <script src="{{asset('assets/js/slick.js')}}" type="572446aacaa112e2d4b8af55-text/javascript"></script>

    <link rel="stylesheet" href="{{ asset('admin/assets/css/custom.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/assets/css/custom.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('assets/css/feather.css') }}">

    {{-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> --}}
    <link href="https://kendo.cdn.telerik.com/themes/7.2.1/default/default-main.css" rel="stylesheet" />
    <script src="https://kendo.cdn.telerik.com/2024.1.319/js/kendo.all.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="{{ asset('/assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('admin/assets/js/jquery-ui.css') }}"></script>
    <script src="{{ asset('admin/assets/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script>
        window.site_admin_base_url = '{{ env('SITE_ADMIN_BASE_URL') }}';
        window.site_base_url = '{{ env('SITE_BASE_URL') }}';
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>

<body style="background: #DDF6FA;">
    <div class="admin-wrapper">
        <div class="container">
            <div class="adminlogin-wrapper">
                <div class="row m-0">
                    <div class="col-md-6 p-0">
                        <img class="img-fluid" src="../assets/img/adminlogin.png" alt="Logo">
                    </div>
                    <div class="col-md-6 p-0">
                        <div class="login-right-wrap">
                            <h1>Admin Login</h1>
                            <p class="">Access to our admin dashboard</p>
                            <form method="post" id="adminLogin">
                                @csrf
                                <div class="mb-3">
                                    <input class="form-control" type="text" placeholder="Email" name="email" id="email">
                                </div>
                                <div class="mb-3">
                                    <input class="form-control" type="password" placeholder="Password" name="password" id="password">
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary w-100" type="submit" id="loginButton">Login </button>
                                    <span class="position-absolute" id="loaderImage">
                                        <img src="{{ asset('assets/img/1.webp') }}" class="loadingbtn"> 
                                    </span>
                                    
                                </div>
                            </form>
                            <div class="text-center forgotpass"><a href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="login-or">
                                <span class="or-line"></span>
                                <span class="span-or">or</span>
                            </div>
                            <div class="social-login">
                                <span>Login with</span>
                                <a href="#" class="facebook"><i class="fa-brands fa-facebook-f"></i></a><a
                                    href="#" class="google"><i class="fa-brands fa-google"></i></a>
                            </div>
                            <div class="text-center dont-have">Don’t have an account? <a
                                    href="register.html">Register</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    $(document).ready(function() {
        $("#loaderImage").hide();
        jQuery("#adminLogin").validate({
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
                var formData = new FormData(form);
                $.ajax({
                    url: "<?= route('admin.login') ?>",
                    type: 'post',
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    beforeSend: function(msg){
                        $("#loaderImage").show();
                        $('#loginButton').prop('disabled', true);
                    },
                    success: function(response) {
                        let email = encodeURIComponent($('#email').val());
                        let password = encodeURIComponent($('#password').val());
                        if (response.status == true) {
                            $("#loaderImage").hide();
                            $('#loginButton').prop('disabled', false);
                            swal.fire("Done!", response.message, "success").then(() => {
                                window.location.href = "<?= route('verify.otp.index') ?>?email=" + email + "&password=" + password;
                            });
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

<style>
    .social-login {
        text-align: center;
    }

    .login-right-wrap {
        background: #fff;
        padding: 4rem;
        height: 100%;
    }

    .social-login>a.facebook {
        background-color: #4B75BD;
    }

    .social-login>a {
        background-color: #CCCCCC;
        color: #FFFFFF;
        display: inline-block;
        font-size: 18px;
        height: 32px;
        line-height: 32px;
        margin-right: 6px;
        text-align: center;
        width: 32px;
        border-radius: 4px;
    }

    .social-login>a.google {
        background-color: #FE5240;
    }

    .social-login>a:last-child {
        margin-right: 0;
    }

    .social-login>a {
        background-color: #CCCCCC;
        color: #FFFFFF;
        display: inline-block;
        font-size: 18px;
        height: 32px;
        line-height: 32px;
        margin-right: 6px;
        text-align: center;
        width: 32px;
        border-radius: 4px;
    }

    .error {
        color: red;
    }
</style>

<style>
    login-right-wrap {
        background: #fff;
        padding: 4rem;
        height: 100%;
    }

    .adminlogin-wrapper {
        padding: 1.5rem 0;
        max-width: 930px;
        margin: auto;
    }

    .admin-wrapper {
        display: flex;
        align-items: center;
        height: 100vh;
    }
</style>
{{-- @endsection --}}
