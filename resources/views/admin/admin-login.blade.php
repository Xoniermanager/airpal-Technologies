{{-- @extends('layouts.admin.main')
@section('content') --}}
<!DOCTYPE html>
<html lang="zxx">

<head>
    @include('include.head')
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
                            <form  method="post" id="adminLogin" action="{{route('admin.login')}}">
                                @csrf
                                <div class="mb-3">
                                    <input class="form-control" type="text" placeholder="Email" name="email">
                                </div>
                                <div class="mb-3">
                                    <input class="form-control" type="text" placeholder="Password" name="password">
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary w-100" type="submit">Login</button>
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
                                <a href="#" class="facebook"><i class="fa-brands fa-facebook-f"></i></a><a href="#"
                                    class="google"><i class="fa-brands fa-google"></i></a>
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<script>
//     $(document).ready(function() {
//             jQuery("#adminLogin").validate({
//             rules: {

//                 email: {
//                         required: true,
//                         email: true
//                     },
//                 password: {
//                         required: true,
//                         minlength: 8,
//                         maxlength: 30
//                     },
//             },
//             messages: {

//                 email: "Please enter a valid email address",
//                     password: {
//                         required: "Please enter your password",
//                         minlength: "Password must be at least 8 characters long",
//                         maxlength: "Password must be no more than 20 characters long"
//                     },
//             },
//             submitHandler: function(form) {
//                 var formData  = new FormData(form);
//                 $.ajax({
//                     url: "<?= route('admin.login') ?>",
//                     type: 'post',
//                     data: formData,
//                     dataType: 'json',
//                     processData: false,
//                     contentType: false, 
//                     success: function(response) {
//                         swal.fire("Done!", response.message, "success");
//                         if (response.success == true) {
//                             window.location.href = "<?= route('admin.dashboard.index') ?>";
//                         }
//                     },
//                     error: function(error_messages) {

//                         Swal.fire("Error!", "Invalid credentials", "error");
//                         var errors = error_messages.responseJSON;
//                         $.each(errors.errors, function(key, value) {
//                             $('#' + key + '_error').html(value);
//                         })

//                     }
//                 });
//             }
//         });
// });


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
.social-login > a.facebook {
    background-color: #4B75BD;
}
.social-login > a {
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

.social-login > a.google {
    background-color: #FE5240;
}
.social-login > a:last-child {
    margin-right: 0;
}
.social-login > a {
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
 