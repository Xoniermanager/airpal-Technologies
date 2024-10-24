@extends('layouts.admin.main')
@section('content')
    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-7 col-auto">
                            <h3 class="page-title">faqs</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">faqs</li>
                            </ul>
                        </div>
                        <div class="col-sm-5 col">
                            <a href="#add_faqs" data-bs-toggle="modal" class="btn btn-primary float-end mt-2">Add</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                @include('admin.faqs.faqs-list')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Start : pop up form to add new country  -->
        <div class="modal fade" id="add_faqs" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add faqs</h5>
                        <button type="button" class="btn-close close-form-add" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addfaqsForm" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-12">
                                    <div class="mb-3">
                                        <label class="mb-2">Name</label>
                                        <input type="text" name="name" class="form-control">
                                        <span class="text-danger" id="name-error"></span>

                                    </div>
                                    <div class="mb-3" id="faqs-div">
                                        <label class="mb-2">Description</label>
                                       
                                        <textarea name="description"  name="description" class="form-control h-100px"></textarea>
                                        <span class="text-danger" id="description-error"></span>

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

        <!-- Start : pop up form to edit faqs  -->
        <div class="modal fade" id="edit_faqs" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit faqs</h5>
                        <button type="button" class="btn-close close-form-add" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editfaqsForm" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-12">
                                    <div class="mb-3">
                                        <label class="mb-2">Name</label>
                                        <input type="text" name="name" id="name" class="form-control">
                                        <span class="text-danger" id="name-error"></span>

                                    </div>
                                    <div class="mb-3" id="faqs-div">
                                        <label class="mb-2">Description</label>
                                        <textarea name="description" id="description" class="form-control h-100px"></textarea>
                                        <span class="text-danger" id="description-error"></span>

                                    </div>
                                </div>

                            </div>
                            <input type="hidden" name="faqs_id" id="faqs_id">
                            <button type="submit" class="btn btn-primary w-100">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End : pop up form to edit speciality  -->

        <!-- Start : pop up form to delete speciality  -->
        <div class="modal fade" id="delete-faqs" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-content p-2">
                            <h4 class="modal-title">Delete</h4>
                            <p class="mb-4">Are you sure want to delete?</p>
                            <input type="hidden" id="delete-faqs-id" name="faqs_id">
                            <button type="button" class="btn btn-primary confirm-delete">Delete </button>
                            <button type="button" class="btn btn-danger " data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End : pop up form to delete speciality  -->



    </div>
@endsection
@section('javascript')
    <script>
        $(document).ready(function() {

            jQuery("#addfaqsForm").validate({
                rules: {
                    name: "required"
                },
                messages: {
                    name: "Please enter faqs name!",
                },
                submitHandler: function(form) {
                    var formData = $(form).serialize();
                    $.ajax({
                        url: "<?= route('admin.add.faqs') ?>",
                        type: 'post',
                        data: formData,
                        success: function(response) {
                            console.log(response);
                            jQuery('#add_faqs').modal('hide');
                            $('#addfaqsForm')[0].reset();
                            jQuery('#faqs_list').replaceWith(response.data);
                        },
                        error: function(error_messages) {
                            let errors = JSON.parse(error_messages.responseText).errors;
                            let randon_number = Math.floor((Math.random() * 100)+1);
                            for (var error_key in errors) {
                                random_id = error_key + '_' + randon_number
                                jQuery('.' + error_key + '_error').remove();
                                jQuery(document).find('#add_faqs [name=' + error_key + ']')
                                    .after(
                                        '<span id="' + random_id +
                                        '_error" class="text text-danger '+ error_key +'_error">' + errors[
                                            error_key] + '</span>');
                                remove_error_div(random_id);
                            }
                        }
                    });
                }
            });

            /* Remove server erorr messge div */
            function remove_error_div(error_ele_id) 
            {
                setTimeout(function() {
                    jQuery("#" + error_ele_id + "_error").remove();
                }, 5000);
            }


            jQuery("#editfaqsForm").validate({
                rules: {
                    name: "required"
                },
                messages: {
                    name: "Please enter country name!",
                },
                submitHandler: function(form) {
                    var formData = $(form).serialize();
                    $.ajax({
                        url: "{{ route('admin.faqs.update') }}",
                        type: 'post',
                        data: formData,
                        success: function(response) {
                            jQuery('#edit_faqs').modal('hide');
                            // swal.fire("Done!", response.message, "success");
                            jQuery('#faqs_list').replaceWith(response.data);
                        },
                        error: function(error_messages) {
                            let errors = JSON.parse(error_messages.responseText).errors;
                            let randon_number = Math.floor((Math.random() * 100)+1);
                            for (var error_key in errors) {
                                random_id = error_key + '_' + randon_number
                                jQuery('.' + error_key + '_error').remove();
                                $(document).find('#edit_faqs [name=' + error_key + ']').after(
                                    '<span id="' + random_id +
                                    '_error" class="text text-danger ' + error_key + '_error">' + errors[
                                        error_key] + '</span>');
                                    remove_error_div(random_id);
                            }
                        }
                    });
                }
            });

            $(document).on('click', '.delete-faqs', function() {
                const id = $(this).attr('data-id');
                $("#delete-faqs-id").val(id);
            });


            $(document).on('click', '.confirm-delete', function(e) {
                    e.preventDefault();
                    const id = $("#delete-faqs-id").val();
                    if (id != '') {
                        $.ajax({
                            method:'post',
                            type: 'delete',
                            data : {'_token':'{{ csrf_token() }}','id':id},
                            url: "{{ route('admin.delete-faqs') }}",
                            success: function(response) {
                                jQuery('#delete-faqs').modal('hide');

                                // swal.fire("Done!", response.message, "success");
                                jQuery('#faqs_list').replaceWith(response.data);
                            }
                        });
                    }
                });


            $(document).on('click', '.close-form-add', function() {
                $('#addCountryForm')[0].reset();
            });

        }); // ready function end

        function edit_faqs(id, name, description) {
            $('#faqs_id').val(id);
            $('#name').val(name);
            $('#description').val(description);
    }


    </script>
@endsection
