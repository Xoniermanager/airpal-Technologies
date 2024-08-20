@extends('layouts.frontend.main')
@section('content')
    <div class="content top-space">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9 offset-md-1">

                    <div class="account-content">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-7 col-lg-6 login-left">
                                <img src="{{ URL::asset('assets/img/login-banner.png') }}" class="img-fluid">
                            </div>
                            <div class="col-md-12 col-lg-6 login-right">
                                <div class="login-header">
                                    <h3> Registeration</h3>
                                </div>
                                <form id="register" action="#">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-4 form-focus">
                                                <input type="text" class="form-control floating" name="first_name">
                                                <label class="focus-label">First name</label>
                                                <span class="text-danger" id="first_name_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4 form-focus">
                                                <input type="text" class="form-control floating" name="last_name">
                                                <label class="focus-label">Last name</label>
                                                <span class="text-danger" id="last_name_error"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4 form-focus">
                                        <input type="text" class="form-control floating" name="email">
                                        <label class="focus-label">Email</label>
                                        <span class="text-danger" id="email_error"></span>
                                    </div>
                                    <div class="mb-4 form-focus">
                                        <input type="password" class="form-control floating" name="password">
                                        <label class="focus-label">Create Password</label>
                                        <span class="text-danger" id="password_error"></span>
                                    </div>
                                    <div class="mb-4 form-focus">
                                        <input type="text" class="form-control floating" name="phone_number">
                                        <label class="focus-label">Mobile Number</label>
                                        <span class="text-danger" id="phone_number_error"></span>
                                    </div>
                                    <div>
                                        <select name="gender" class="form-control" style="font-size: 14px">
                                            <option value="">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                        <span class="text-danger" id="gender_error"></span>
                                    </div>
                                    <div class="text-end">
                                        <a class="forgot-link" href="{{ route('patient.login.index') }}">Already have an
                                            account?</a>
                                    </div>
                                    <button class="btn btn-primary w-100 btn-lg login-btn" type="submit">Signup</button>
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
            $("#register").validate({
                rules: {
                    first_name: {
                        required: true
                    },
                    last_name: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    phone_number: {
                        required: true,
                        digits: true,
                        minlength: 8,
                        maxlength: 12
                    },
                    password: {
                        required: true,
                        minlength: 8,
                        maxlength: 30
                    },
                    gender: {
                        required: true
                    }
                },
                messages: {
                    first_name: {
                        required: "Please enter your first name"
                    },
                    last_name: {
                        required: "Please enter your last name"
                    },
                    email: {
                        required: "Please enter a valid email address",
                        email: "Please enter a valid email address"
                    },
                    phone_number: {
                        required: "Please enter your phone number",
                        digits: "Please enter only digits",
                        minlength: "Phone number must be at least 8 digits long",
                        maxlength: "Phone number must be no more than 12 digits long"
                    },
                    password: {
                        required: "Please enter your password",
                        minlength: "Password must be at least 8 characters long",
                        maxlength: "Password must be no more than 30 characters long"
                    },
                    gender: {
                        required: "Please select your gender"
                    }
                },
                submitHandler: function(form) {
                    var formData = new FormData(form);
                    $.ajax({
                        url: "{{ route('patient.register') }}",
                        type: 'post',
                        data: formData,
                        processData: false,
                        contentType: false,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.success) {
                                Swal.fire("Done!", response.message, "success").then(() => {
                                    window.location.href = response.redirect_url;
                                });
                            } else {
                                Swal.fire("Error!", response.message, "error");
                            }
                        },
                        error: function(error_messages) {
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