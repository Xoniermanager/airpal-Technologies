@extends('layouts.doctor.main')
@section('content')
    <div class="dashboard-header">
        <h3>Change Password</h3>
    </div>
    <form action="#" id="change-password">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="card pass-card">
                    <div class="card-body">
                        <div class="input-block input-block-new">
                            <label class="form-label">Old Password</label>
                            <input type="password" class="form-control" name="old_password">
                            <span class="text-danger" id="old_password_error">
                        </div>
                        <div class="input-block input-block-new">
                            <label class="form-label">New Password</label>
                            <div class="pass-group">
                                <input type="password" class="form-control pass-input" name="password" id="password">
                                <span class="feather-eye-off toggle-password"></span>
                                <span class="text-danger" id="password_error">
                            </div>
                        </div>
                        <div class="input-block input-block-new mb-0">
                            <label class="form-label">Confirm Password</label>
                            <div class="pass-group">
                                <input type="password" class="form-control pass-input-sub" name="confirm_password">
                                <span class="feather-eye-off toggle-password-sub"></span>
                                <span class="text-danger" id="confirm_password_error">
                            </div>
                        </div>
                        <input type="hidden" value="{{ auth()->user()->id }}" name="doctorId">
                        <div class="form-set-button mt-4">
                            <button class="btn btn-light" type="button">Cancel</button>
                            <button class="btn btn-primary" type="submit">Save Changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
@endsection
@section('javascript')
    <script>
        $(document).ready(function() {
            jQuery("#change-password").validate({
                rules: {
                    old_password: {
                        required: true,
                    },
                    password: {
                        required: true,
                        minlength: 8,
                        maxlength: 30
                    },
                    confirm_password: {
                        required: true,
                        minlength: 8,
                        maxlength: 30,
                        equalTo: "#password"
                    },
                },
                messages: {
                    old_password: "Please enter a valid old password",
                    password: {
                        required: "Please enter your password",
                        minlength: "Password must be at least 8 characters long",
                        maxlength: "Password must be no more than 30 characters long"
                    },
                    confirm_password: {
                        required: "Please enter your password",
                        minlength: "Password must be at least 8 characters long",
                        maxlength: "Password must be no more than 30 characters long",
                        equalTo: "Confirm password does not match"
                    },
                },
                submitHandler: function(form, event) {
                    var errorTimeout;
                    event.preventDefault(); // Prevent default form submission
                    var formData = new FormData(form);
                    $.ajax({
                        url: "<?= route('doctor.change.password') ?>",
                        type: 'post',
                        data: formData,
                        processData: false,
                        contentType: false,
                        dataType: 'json',
                        success: function(response) {
                            console.log(response);
                            if (response.success == true) {
                                Swal.fire("Done!", response.message, "success");
                                $('#change-password')[0].reset();
                            }
                        },
                        error: function(error_messages) {
                            var errors = error_messages.responseJSON;
                            $.each(errors.errors, function(key, value) {
                                $('#' + key + '_error').html(value)
                                    .show();
                            });
                            if (errorTimeout) {
                                clearTimeout(errorTimeout);
                            }
                            errorTimeout = setTimeout(function() {
                                $('.text-danger').fadeOut();
                            }, 2000);
                        }
                    });
                }
            });
        });
    </script>
@endsection
