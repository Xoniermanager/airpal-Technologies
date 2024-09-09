@extends('layouts.admin.main')
@section('content')
    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-7 col-auto">
                            <h3 class="page-title">partners</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">partners</li>
                            </ul>
                        </div>
                        <div class="col-sm-5 col">
                            <a href="#add_partners" data-bs-toggle="modal" class="btn btn-primary float-end mt-2">Add</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                @include('admin.generals.our-partners.partner-list')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Start : pop up form to add new country  -->
        <div class="modal fade" id="add_partners" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add partners</h5>
                        <button type="button" class="btn-close close-form-add" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addpartnersForm" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-12">
                                    <div class="mb-3">
                                        <label class="mb-2">Partner Logo</label>
                                        <input type="file" name="image" class="form-control">
                                        <span class="text-danger" id="name-error"></span>
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

        <!-- Start : pop up form to edit partners  -->
        <div class="modal fade" id="edit_partners" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit partners</h5>
                        <button type="button" class="btn-close close-form-add" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editpartnersForm" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-12">
                                    <div class="mb-3">
                                        <label class="mb-2">Name</label>
                                        <input type="text" name="name" id="name" class="form-control">
                                        <span class="text-danger" id="name-error"></span>

                                    </div>
                                    <div class="mb-3" id="partners-div">
                                        <label class="mb-2">Description</label>
                                        <textarea name="description" id="description" class="form-control h-100px"></textarea>
                                        <span class="text-danger" id="description-error"></span>

                                    </div>
                                </div>

                            </div>
                            <input type="hidden" name="partners_id" id="partners_id">
                            <button type="submit" class="btn btn-primary w-100">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End : pop up form to edit speciality  -->

        <!-- Start : pop up form to delete speciality  -->
        <div class="modal fade" id="delete-partners" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-content p-2">
                            <h4 class="modal-title">Delete</h4>
                            <p class="mb-4">Are you sure want to delete?</p>
                            <input type="hidden" id="delete-partners-id" name="partners_id">
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
    // jQuery Validation for the form
    jQuery("#addpartnersForm").validate({
        submitHandler: function(form) {
            var formData = new FormData(form); // Collect form data

            $.ajax({
                url: "{{ route('admin.save.partner.form') }}", // URL for form submission
                type: 'post',
                data: formData,
                processData: false, // Important for FormData
                contentType: false, // Important for FormData
                success: function(response) {
                    // Hide modal after successful submission
                    $('#add_partners').modal('hide');
                    $('#addpartnersForm')[0].reset(); // Reset the form

                    // Replace the partners list with the updated response
                    jQuery('#partner_list').replaceWith(response.data);

                    // Display success message using SweetAlert
                    Swal.fire({
                        icon: 'success',
                        title: 'Partner added successfully!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                },
                error: function(error_messages) {
                    let errors = JSON.parse(error_messages.responseText).errors;
                    let random_number = Math.floor((Math.random() * 100) + 1);

                    // Clear previous errors
                    jQuery('.text-danger').remove();

                    // Loop through the errors and display them below respective fields
                    for (var error_key in errors) {
                        random_id = error_key + '_' + random_number;
                        jQuery('#addpartnersForm [name=' + error_key + ']')
                            .after(
                                '<span id="' + random_id +
                                '_error" class="text-danger ' + error_key + '_error">' + errors[
                                error_key] + '</span>');
                        remove_error_div(random_id); // Function to auto-remove error after a delay
                    }
                }
            });
        }
    });
});
          $(document).on('click', '.delete-partners', function() {
                const id = $(this).attr('data-id');
                $("#delete-partners-id").val(id);
            });


            $(document).on('click', '.confirm-delete', function(e) {
                    e.preventDefault();
                    const id = $("#delete-partners-id").val();
                    if (id != '') {
                        $.ajax({
                            method:'get',
                            type: 'delete',
                            data : {'_token':'{{ csrf_token() }}','id':id},
                            url: "{{ route('admin.delete.partner.form') }}",
                            success: function(response) {
                                jQuery('#delete-partners').modal('hide');

                                // swal.fire("Done!", response.message, "success");
                                jQuery('#partner_list').replaceWith(response.data);
                            }
                        });
                    }
                });

    </script>
@endsection
