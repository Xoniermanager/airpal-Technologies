@extends('layouts.admin.main')
@section('content')
    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-7 col-auto">
                            <h3 class="page-title">Specialities</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Specialities</li>
                            </ul>
                        </div>
                        <div class="col-sm-5 col">
                            <a href="#Add_Specialities_details" data-bs-toggle="modal"
                                class="btn btn-primary float-end mt-2">Add</a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            @include('admin.speciality.speciality-list')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Start : pop up form to add new speciality  -->
        <div class="modal fade" id="Add_Specialities_details" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Specialities</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addSpecialityForm" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="mb-3">
                                        <label class="mb-2">Specialities</label>
                                        <input type="text" class="form-control" name="name">
                                        <span class="text-danger" id="name-error"></span>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="mb-3">
                                        <label class="mb-2">Image</label>
                                        <input type="file" class="form-control" name="image" id="image">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-12">
                                    <label class="mb-2" for="desc">Decription</label>
                                    <textarea class="form-control" name="description" id="desc" style="height: 65px"></textarea>

                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End : pop up form to add new speciality  -->

        <!-- Start : pop up form to edit speciality  -->
        <div class="modal fade" id="edit_specialities_details" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Specialities</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body display-edit-body">
                        <form id="updateSpecialityForm" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="mb-3">
                                        <label class="mb-2">Specialities</label>
                                        <input type="text" class="form-control" value="" name="name"
                                            id="edit_name">
                                        <span class="text-danger" id="name-edit-error"></span>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="mb-3">
                                        <label class="mb-2">Image</label>
                                        <input type="file" class="form-control" name="image" id="edit_image">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-12">
                                    <label class="mb-2" for="desc">Decription</label>
                                    <textarea class="form-control" name="description" id="description" style="height: 65px"></textarea>
                                </div>
                            </div>
                            <input type="hidden" id="edit_speciality_id" name="id" value="">
                            <button type="submit" class="btn btn-primary w-100">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end : pop up form to edit speciality  -->

        <!-- Start : pop up form to delete speciality  -->
        <div class="modal fade" id="delete_modal" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-content p-2">
                            <h4 class="modal-title">Delete</h4>
                            <p class="mb-4">Are you sure want to delete?</p>
                            <input type="hidden" id="id-for-delete-specialties" name="id-for-delete-specialties">
                            <button type="button" class="btn btn-primary confirm-delete">Delete</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
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

            jQuery("#addSpecialityForm").validate({
                rules: {
                    name: "required"
                },
                messages: {
                    name: "Please enter name!",
                },
                submitHandler: function(form) {
                    var formData = new FormData(form);
                    $.ajax({
                        url: "<?= route('admin.speciality.add') ?>",
                        type: 'post',
                        data: formData,
                        processData: false,
                        contentType: false, 
                        success: function(response) {
                            jQuery('#Add_Specialities_details').modal('hide');
                            console.log(response);
                            jQuery('#speciality_list').replaceWith(response.data);
                        },
                        error: function(error_messages) {
                            let errors = JSON.parse(error_messages.responseText).errors;
                            let randon_number = Math.floor((Math.random() * 100)+1);
                            for (var error_key in errors) {
                                random_id = error_key + '_' + randon_number
                                jQuery('.' + error_key + '_error').remove();
                                jQuery(document).find('#Add_Specialities_details [name=' + error_key + ']')
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


            jQuery("#updateSpecialityForm").validate({
                rules: {
                    name: "required"
                },
                messages: {
                    name: "Please enter name!",
                },
                submitHandler: function(form) {
                    var formData = new FormData(form);
                    $.ajax({
                        url: "<?= route('admin.update-specailization') ?>",
                        type: 'post',
                        data: formData,
                        processData: false,
                        contentType: false, 
                        success: function(response) {
                            jQuery('#edit_specialities_details').modal('hide');
                            // swal.fire("Done!", response.message, "success");
                            console.log(response);
                            jQuery('#speciality_list').replaceWith(response.data);
                        },
                        error: function(error_messages) {
                            let errors = JSON.parse(error_messages.responseText).errors;
                            let randon_number = Math.floor((Math.random() * 100)+1);
                            for (var error_key in errors) {
                                random_id = error_key + '_' + randon_number
                                jQuery('.' + error_key + '_error').remove();
                                jQuery(document).find('#edit_specialities_details [name=' + error_key + ']')
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
            // ajax for delete specialities by id
            $(document).on('click', '.delete-specialities', function() {
                const id = $(this).attr('data-id');
                $("#id-for-delete-specialties").val(id);
            });

            $(document).on('click', '.confirm-delete', function(e) {
                e.preventDefault();
                const id = $("#id-for-delete-specialties").val();
                if (id != '') {
                    $.ajax({
                        type: 'delete',
                        data : {'_token':'{{ csrf_token() }}'},
                        url: "{{ route('admin.speciality.index') }}/delete/"+id,
                        success: function(response) {
                            jQuery('#delete_modal').modal('hide');
                            // swal.fire("Done!", response.message, "success");
                            console.log(response);
                            jQuery('#speciality_list').replaceWith(response.data);
                        }
                    });
                }
            });


        });

        function edit_speciality(name, description, image, id) {
            $("#edit_name").val(name);
            $("#description").val(description);
            $("#edit_image").attr("src", image);
            $("#edit_speciality_id").val(id);
        }
    </script>
@endsection
