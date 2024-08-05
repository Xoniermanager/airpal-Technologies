@extends('layouts.doctor.main')
@section('content')
                        <div class="dashboard-header">
                            <h3>Social Media</h3>
                        </div>
                        <div class="page-wrapper">
                            <div class="content container-fluid">
                                <div class="page-header">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="row">
                                                        <div class="col-sm-12 col float-end">
                                                            <a href="#add_account" data-bs-toggle="modal"
                                                                class="btn btn-primary float-end mt-2">Add</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                @include('doctor.social-media-accounts.list')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="add_account" aria-hidden="true" role="dialog">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add Account</h5>
                                        <button type="button" class="btn-close close-form-add" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <form id="addSocialMediaAccount" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="mb-2">Account Type</label>
                                                        <select class="form-control" name="account_type">
                                                            <option value="facebook">Facebook</option>
                                                            <option value="twitter">Twitter</option>
                                                            <option value="instagram">Instagram</option>
                                                            <option value="youtube">Youtube</option>
                                                            <option value="whatsapp">Whatsapp</option>
                                                            <option value="google">Google</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="doctor_id" value="{{ auth()->user()->id }}">
                                                <input type="hidden" id="delete-account-id" name="id">
                                                <div class="col-12">
                                                    <div class="mb-3" id="accounts-div">
                                                        <label class="mb-2">link</label>
                                                        <input type="text" name="link" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary w-100">Save</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- End : pop up form to add new speciality  -->


                        <!-- Start : pop up form to edit accounts  -->
                        <div class="modal fade" id="edit_account" aria-hidden="true" role="dialog">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit accounts</h5>
                                        <button type="button" class="btn-close close-form-add" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="editSocialMediaAccount" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="mb-2">Account Type</label>
                                                        <select class="form-control" name="account_type"
                                                            id="account_type">
                                                            <option value="facebook">Facebook</option>
                                                            <option value="twitter">Twitter</option>
                                                            <option value="instagram">Instagram</option>
                                                            <option value="youtube">Youtube</option>
                                                            <option value="whatsapp">Whatsapp</option>
                                                            <option value="google">Google</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="mb-3" id="accounts-div">
                                                        <label class="mb-2">link</label>
                                                        <input type="text" name="link" class="form-control"
                                                            id="link">
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="id" id="accountId" value="">
                                            <input type="hidden" name="doctor_id" value="{{ auth()->user()->id }}">
                                            <button type="submit" class="btn btn-primary w-100">update</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End : pop up form to add new speciality  -->


        <!-- Start : pop up form to delete speciality  -->
        <div class="modal fade" id="delete-account" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-content p-2">
                            <h4 class="modal-title">Delete</h4>
                            <p class="mb-4">Are you sure want to delete?</p>
                            <input type="hidden" id="delete-accounts-id" name="accounts_id">
                            <button type="button" class="btn btn-primary confirm-delete">Delete
                            </button>
                            <button type="button" class="btn btn-danger " data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection


@section('javascript')
    <script>
        jQuery(document).ready(function() {
            jQuery("#addSocialMediaAccount").validate({
                rules: {
                    account_type: "required",
                    link: "required",
                },
                messages: {
                    account_type: "Please select Account Type",
                    link: "Please provide link",

                },

                submitHandler: function(form) {
                    var formData = $(form).serialize();
                    console.log(formData);
                    $.ajax({
                        url: "<?= route('add.social.media.account') ?>",
                        type: 'post',
                        data: formData,
                        success: function(response) {
                            swal.fire("Done!", response.message, "success");
                            jQuery('#add_account').modal('hide');
                            $('#addSocialMediaAccount')[0].reset();
                            jQuery('#social_media_account_list').replaceWith(response.data);
                        },
                        error: function(error_messages) {
                            let errors = JSON.parse(error_messages.responseText).errors;
                            let randon_number = Math.floor((Math.random() * 100) + 1);
                            for (var error_key in errors) {
                                random_id = error_key + '_' + randon_number
                                jQuery('.' + error_key + '_error').remove();
                                jQuery(document).find('#add_slots [name=' + error_key + ']')
                                    .after(
                                        '<span id="' + random_id +
                                        '_error" class="text text-danger ' + error_key +
                                        '_error">' + errors[
                                            error_key] + '</span>');
                                remove_error_div(random_id);
                            }
                        }
                    });
                }
            });
        });

        function edit_account(socialMediaAccount) {
            var socialMediaAccount = JSON.parse(socialMediaAccount);
            console.log(socialMediaAccount)
            $('#accountId').val(socialMediaAccount.id);
            $('#account_type').val(socialMediaAccount.account_type);
            $('#link').val(socialMediaAccount.link);
        }

        jQuery("#editSocialMediaAccount").validate({
            rules: {
                account_type: "required",
                link: "required",
            },
            messages: {
                account_type: "Please select Account Type",
                link: "Please provide link",

            },

            submitHandler: function(form) {
                var formData = $(form).serialize();
                console.log(formData);
                $.ajax({
                    url: "<?= route('update.social.media.account') ?>",
                    type: 'post',
                    data: formData,
                    success: function(response) {
                        swal.fire("Done!", response.message, "success");
                        jQuery('#edit_account').modal('hide');
                        $('#editSocialMediaAccount')[0].reset();
                        jQuery('#social_media_account_list').replaceWith(response.data);
                    },
                    error: function(error_messages) {
                        let errors = JSON.parse(error_messages.responseText).errors;
                        let randon_number = Math.floor((Math.random() * 100) + 1);
                        for (var error_key in errors) {
                            random_id = error_key + '_' + randon_number
                            jQuery('.' + error_key + '_error').remove();
                            jQuery(document).find('#add_slots [name=' + error_key + ']')
                                .after(
                                    '<span id="' + random_id +
                                    '_error" class="text text-danger ' + error_key +
                                    '_error">' + errors[
                                        error_key] + '</span>');
                            remove_error_div(random_id);
                        }
                    }
                });
            }
        });

        $(document).on('click', '.delete-account', function() {
            var id = $(this).attr('data-id');
            $("#delete-account-id").val(id);
        });

        $(document).on('click', '.confirm-delete', function(e) {
            e.preventDefault();
            var id = $("#delete-account-id").val();
            if (id != '') {
                $.ajax({
                    method: 'post',
                    type: 'delete',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'id': id
                    },
                    url: "{{ route('delete.social.media.account') }}",
                    success: function(response) {
                        jQuery('#delete-account').modal('hide');
                        $('#addSocialMediaAccount')[0].reset();
                        $('#social_media_account_list').replaceWith(response.data);
                    }
                });
            }
        });
    </script>
@endsection