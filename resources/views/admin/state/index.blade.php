@extends('layouts.admin.main')
@section('content')
    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-7 col-auto">
                            <h3 class="page-title">State</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">State</li>
                            </ul>
                        </div>
                        <div class="col-sm-5 col">
                            <a href="#add_state" data-bs-toggle="modal" class="btn btn-primary float-end mt-2">Add</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                @include('admin.state.state-list')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Start : pop up form to add new country  -->
        <div class="modal fade" id="add_state" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add State</h5>
                        <button type="button" class="btn-close close-form-add" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addStateForm" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-12">
                                    <div class="mb-3">
                                        <label class="mb-2">Country</label>
                                        <select class="form-select" aria-label="Default select example"
                                            id="add-contry-selection" name="country_id">
                                            <option value="">Select Country</option>
                                            @foreach ($countries as $data)
                                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3" style="display: none;" id="state-div">
                                        <label class="mb-2">State</label>
                                        <input type="text" name="name" id="state" class="form-control">
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

        <!-- Start : pop up form to edit state  -->
        <div class="modal fade" id="edit_state" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit State</h5>
                        <button type="button" class="btn-close close-form-add" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editStateForm" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-12">
                                    <div class="mb-3">
                                        <label class="mb-2">Country</label>
                                        <select class="form-select" aria-label="Default select example"
                                            id="edit-contry-selection" name="country_id">
                                            <option value="">Select Country</option>
                                            @foreach ($countries as $data)
                                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3" id="state-div">
                                        <label class="mb-2">State</label>
                                        <input type="text" name="name" id="state-name-edit" class="form-control">
                                    </div>
                                </div>

                            </div>
                            <input type="hidden" name="state_id" id="state_id">
                            <button type="submit" class="btn btn-primary w-100">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End : pop up form to edit speciality  -->

        <!-- Start : pop up form to delete speciality  -->
        <div class="modal fade" id="delete-state" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-content p-2">
                            <h4 class="modal-title">Delete</h4>
                            <p class="mb-4">Are you sure want to delete?</p>
                            <input type="hidden" id="delete-state-id" name="state_id">
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

            jQuery("#addStateForm").validate({
                rules: {
                    name: "required"
                },
                messages: {
                    name: "Please enter state name!",
                },
                submitHandler: function(form) {
                    var formData = $(form).serialize();
                    $.ajax({
                        url: "<?= route('admin.state.add') ?>",
                        type: 'post',
                        data: formData,
                        success: function(response) {
                            console.log(response);
                            jQuery('#add_state').modal('hide');
                            $('#addStateForm')[0].reset();
                            // swal.fire("Done!", response.message, "success");
                            jQuery('#state_list').replaceWith(response.data);
                        },
                        error: function(error_messages) {
                            let errors = JSON.parse(error_messages.responseText).errors;
                            let randon_number = Math.floor((Math.random() * 100)+1);
                            for (var error_key in errors) {
                                random_id = error_key + '_' + randon_number
                                jQuery('.' + error_key + '_error').remove();
                                jQuery(document).find('#add_state [name=' + error_key + ']')
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

            jQuery("#editStateForm").validate({
                rules: {
                    name: "required"
                },
                messages: {
                    name: "Please enter country name!",
                },
                submitHandler: function(form) {
                    var formData = $(form).serialize();
                    let update_id = jQuery('#state_id').val();
                    $.ajax({
                        url: "{{ route('admin.index.state') }}/update/"+update_id,
                        type: 'post',
                        data: formData,
                        success: function(response) {
                            jQuery('#edit_state').modal('hide');
                            // swal.fire("Done!", response.message, "success");
                            jQuery('#state_list').replaceWith(response.data);
                        },
                        error: function(error_messages) {
                            let errors = JSON.parse(error_messages.responseText).errors;
                            let randon_number = Math.floor((Math.random() * 100)+1);
                            for (var error_key in errors) {
                                random_id = error_key + '_' + randon_number
                                jQuery('.' + error_key + '_error').remove();
                                $(document).find('#edit_state [name=' + error_key + ']').after(
                                    '<span id="' + random_id +
                                    '_error" class="text text-danger ' + error_key + '_error">' + errors[
                                        error_key] + '</span>');
                                    remove_error_div(random_id);
                            }
                        }
                    });
                }
            });

            $(document).on('click', '.delete-state', function() {
                const id = $(this).attr('data-id');
                $("#delete-state-id").val(id);
            });

            $(document).on('click', '.confirm-delete', function(e) {
                e.preventDefault();
                const id = $("#delete-state-id").val();
                if (id != '') {
                    $.ajax({
                        type: 'delete',
                        data : {'_token':'{{ csrf_token() }}'},
                        url: "{{ route('admin.index.state') }}/delete/"+id,
                        success: function(response) {
                            jQuery('#delete-state').modal('hide');

                            // swal.fire("Done!", response.message, "success");
                            jQuery('#state_list').replaceWith(response.data);
                        }
                    });
                }
            });



            $(document).on('click', '.close-form-add', function() {
                $('#addCountryForm')[0].reset();
            });

        }); // ready function end

        function edit_state(name, id, country_id) {
            $('#state-name-edit').val(name);
            $('#state_id').val(id);

            $('#edit-contry-selection option').each(function() {
                if ($(this).val() == country_id) {
                    $(this).prop('selected', true);
                    $(this).prop('disabled', false);
                } else {
                    $(this).prop('selected', false);
                    $(this).prop('disabled', true);
                }
            });
        }



        document.getElementById('add-contry-selection').addEventListener('change', function() {
            var inputBox = document.getElementById('state-div');
            if (this.value) {
                inputBox.style.display = 'block';
            } else {
                inputBox.style.display = 'none';
            }
        });
    </script>
@endsection
