@extends('layouts.admin.main')
@section('content')
    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-7 col-auto">
                            <h3 class="page-title">Testimonials</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">testimonials</li>
                            </ul>
                        </div>
                        <div class="col-sm-5 col">
                            <a href="#add_testimonials" data-bs-toggle="modal" class="btn btn-primary float-end mt-2">Add</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                @include('admin.generals.testimonials.testimonial_list')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

{{-- 
        <!-- Start : pop up form to add new country  -->
        <div class="modal fade" id="add_testimonials" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add testimonials</h5>
                        <button type="button" class="btn-close close-form-add" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addtestimonialsForm" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-12">
                                    <div class="mb-3">
                                        <label class="mb-2">Name</label>
                                        <input type="text" name="name" class="form-control">
                                        <span class="text-danger" id="name-error"></span>

                                    </div>
                                    <div class="mb-3" id="testimonials-div">
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

        <!-- Start : pop up form to edit testimonials  -->
        <div class="modal fade" id="edit_testimonials" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit testimonials</h5>
                        <button type="button" class="btn-close close-form-add" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="edittestimonialsForm" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-12">
                                    <div class="mb-3">
                                        <label class="mb-2">Name</label>
                                        <input type="text" name="name" id="name" class="form-control">
                                        <span class="text-danger" id="name-error"></span>

                                    </div>
                                    <div class="mb-3" id="testimonials-div">
                                        <label class="mb-2">Description</label>
                                        <textarea name="description" id="description" class="form-control h-100px"></textarea>
                                        <span class="text-danger" id="description-error"></span>

                                    </div>
                                </div>

                            </div>
                            <input type="hidden" name="testimonials_id" id="testimonials_id">
                            <button type="submit" class="btn btn-primary w-100">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End : pop up form to edit speciality  -->

        <!-- Start : pop up form to delete speciality  -->
        <div class="modal fade" id="delete-testimonials" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-content p-2">
                            <h4 class="modal-title">Delete</h4>
                            <p class="mb-4">Are you sure want to delete?</p>
                            <input type="hidden" id="delete-testimonials-id" name="testimonials_id">
                            <button type="button" class="btn btn-primary confirm-delete">Delete </button>
                            <button type="button" class="btn btn-danger " data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End : pop up form to delete speciality  --> --}}

    </div>
@endsection
{{-- @section('javascript')
    <script>
        $(document).ready(function() {

            jQuery("#addtestimonialsForm").validate({
                rules: {
                    name: "required"
                },
                messages: {
                    name: "Please enter testimonials name!",
                },
                submitHandler: function(form) {
                    var formData = $(form).serialize();
                    $.ajax({
                        url: "<?= route('admin.add.testimonials') ?>",
                        type: 'post',
                        data: formData,
                        success: function(response) {
                            console.log(response);
                            jQuery('#add_testimonials').modal('hide');
                            $('#addtestimonialsForm')[0].reset();
                            jQuery('#testimonials_list').replaceWith(response.data);
                        },
                        error: function(error_messages) {
                            let errors = JSON.parse(error_messages.responseText).errors;
                            let randon_number = Math.floor((Math.random() * 100)+1);
                            for (var error_key in errors) {
                                random_id = error_key + '_' + randon_number
                                jQuery('.' + error_key + '_error').remove();
                                jQuery(document).find('#add_testimonials [name=' + error_key + ']')
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


            jQuery("#edittestimonialsForm").validate({
                rules: {
                    name: "required"
                },
                messages: {
                    name: "Please enter country name!",
                },
                submitHandler: function(form) {
                    var formData = $(form).serialize();
                    $.ajax({
                        url: "{{ route('admin.testimonials.update') }}",
                        type: 'post',
                        data: formData,
                        success: function(response) {
                            jQuery('#edit_testimonials').modal('hide');
                            // swal.fire("Done!", response.message, "success");
                            jQuery('#testimonials_list').replaceWith(response.data);
                        },
                        error: function(error_messages) {
                            let errors = JSON.parse(error_messages.responseText).errors;
                            let randon_number = Math.floor((Math.random() * 100)+1);
                            for (var error_key in errors) {
                                random_id = error_key + '_' + randon_number
                                jQuery('.' + error_key + '_error').remove();
                                $(document).find('#edit_testimonials [name=' + error_key + ']').after(
                                    '<span id="' + random_id +
                                    '_error" class="text text-danger ' + error_key + '_error">' + errors[
                                        error_key] + '</span>');
                                    remove_error_div(random_id);
                            }
                        }
                    });
                }
            });

            $(document).on('click', '.delete-testimonials', function() {
                const id = $(this).attr('data-id');
                $("#delete-testimonials-id").val(id);
            });


            $(document).on('click', '.confirm-delete', function(e) {
                    e.preventDefault();
                    const id = $("#delete-testimonials-id").val();
                    if (id != '') {
                        $.ajax({
                            method:'post',
                            type: 'delete',
                            data : {'_token':'{{ csrf_token() }}','id':id},
                            url: "{{ route('admin.delete-testimonials') }}",
                            success: function(response) {
                                jQuery('#delete-testimonials').modal('hide');

                                // swal.fire("Done!", response.message, "success");
                                jQuery('#testimonials_list').replaceWith(response.data);
                            }
                        });
                    }
                });


            $(document).on('click', '.close-form-add', function() {
                $('#addCountryForm')[0].reset();
            });

        }); // ready function end

        function edit_testimonials(id, name, description) {
            $('#testimonials_id').val(id);
            $('#name').val(name);
            $('#description').val(description);
    }


    </script>
@endsection --}}
