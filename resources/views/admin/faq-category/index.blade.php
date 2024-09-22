@extends('layouts.admin.main')
@section('content')
    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-7 col-auto">
                            <h3 class="page-title">FAQ Category</h3>
                        </div>
                        <div class="col-sm-5 col">
                            <a href="#add_faq_category" data-bs-toggle="modal" class="btn btn-primary float-end mt-2">Add FAQ Category</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                @include('admin.faq-category.faq-category-list')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Start : pop up form to add new FAQ category  -->
        <div class="modal fade" id="add_faq_category" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add: FAQ Category</h5>
                        <button type="button" class="btn-close close-form-add-faq-category" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="add-faq-category-form" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-12">
                                    <div class="mb-3">
                                        <label class="mb-2">Name</label>
                                        <input type="text" name="name" class="form-control">
                                        <span class="text-danger" id="name-error"></span>

                                    </div>
                                    <!-- <div class="mb-3" id="faqs-div">
                                        <label class="mb-2">Description</label>
                                       
                                        <textarea name="description"  name="description" class="form-control h-100px"></textarea>
                                        <span class="text-danger" id="description-error"></span>

                                    </div> -->
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary w-100">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End : pop up form to add new FAQ category  -->

        <!-- Start : pop up form to edit FAQ Category  -->
        <div class="modal fade" id="edit_faq_category" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit: FAQ Category</h5>
                        <button type="button" class="btn-close close-form-add-faq-category" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="edit-faq-category-form" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-12">
                                    <div class="mb-3">
                                        <label class="mb-2">Name</label>
                                        <input type="text" name="name" id="faq-category-name" class="form-control">
                                        <span class="text-danger" id="name-error"></span>

                                    </div>
                                    <!-- <div class="mb-3" id="faqs-div">
                                        <label class="mb-2">Description</label>
                                        <textarea name="description" id="description" class="form-control h-100px"></textarea>
                                        <span class="text-danger" id="description-error"></span>

                                    </div> -->
                                </div>

                            </div>
                            <input type="hidden" name="faq_category_id" id="faq-category-id">
                            <button type="submit" class="btn btn-primary w-100">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End : pop up form to edit FAQ category  -->

        <!-- Start : pop up form to delete FAQ category  -->
        <div class="modal fade" id="delete-faq-category" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-content p-2">
                            <h4 class="modal-title">Delete</h4>
                            <p class="mb-4">Are you sure to delete selected FAQ category?</p>
                            <input type="hidden" id="delete-faq-category-id" name="faq_category_id">
                            <button type="button" class="btn btn-primary confirm-faq-category-delete">Delete </button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End : pop up form to delete FAQ Category  -->



    </div>
@endsection
@section('javascript')
    <script>
        $(document).ready(function() {
            // Save/Create new FAQ category
            jQuery("#add-faq-category-form").validate({
                rules: {
                    name: "required"
                },
                messages: {
                    name: "Please enter faqs category name!",
                },
                submitHandler: function(form) {
                    var formData = $(form).serialize();
                    $.ajax({
                        url: "<?= route('admin.add.faq.category') ?>",
                        type: 'post',
                        data: formData,
                        success: function(response) {
                            console.log(response);
                            jQuery('#add_faq_category').modal('hide');
                            $('#add-faq-category-form')[0].reset();
                            jQuery('#faqs_category_list').replaceWith(response.data);
                        },
                        error: function(error_messages) {
                            let errors = JSON.parse(error_messages.responseText).errors;
                            let randon_number = Math.floor((Math.random() * 100)+1);
                            for (var error_key in errors) {
                                random_id = error_key + '_' + randon_number
                                jQuery('.' + error_key + '_error').remove();
                                jQuery(document).find('#add_faq_category [name=' + error_key + ']')
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

            // Update FAQ category ajax
            jQuery("#edit-faq-category-form").validate({
                rules: {
                    name: "required"
                },
                messages: {
                    name: "Please enter FAQ category name!",
                },
                submitHandler: function(form) {
                    var formData = $(form).serialize();
                    let edit_faq_category_id = $('#faq-category-id').val();
                    $.ajax({
                        url: site_admin_base_url + 'faq-category/update/'+edit_faq_category_id,
                        type: 'post',
                        data: formData,
                        dataType:'json',
                        success: function(response) {
                            jQuery('#edit_faq_category').modal('hide');
                            // swal.fire("Done!", response.message, "success");
                            jQuery('#faqs_category_list').replaceWith(response.data);
                        },
                        error: function(error_messages) {
                            let errors = JSON.parse(error_messages.responseText).errors;
                            let randon_number = Math.floor((Math.random() * 100)+1);
                            for (var error_key in errors) {
                                random_id = error_key + '_' + randon_number
                                jQuery('.' + error_key + '_error').remove();
                                $(document).find('#edit_faq_category [name=' + error_key + ']').after(
                                    '<span id="' + random_id +
                                    '_error" class="text text-danger ' + error_key + '_error">' + errors[
                                        error_key] + '</span>');
                                    remove_error_div(random_id);
                            }
                        }
                    });
                }
            });

            // Update delete FAQ category id on click
            $(document).on('click', '.delete-faqs', function() {
                const id = $(this).attr('data-id');
                $("#delete-faq-category-id").val(id);
            });


            $(document).on('click', '.confirm-faq-category-delete', function(e) {
                    e.preventDefault();
                    const delete_faq_category_id = $("#delete-faq-category-id").val();
                    console.log("delete Id: " + delete_faq_category_id);
                    if (delete_faq_category_id != '') {
                        $.ajax({
                            type: 'DELETE',
                            data : {'_token':'{{ csrf_token() }}'},
                            dataType: 'JSON',
                            url: site_admin_base_url + 'faq-category/delete/'+delete_faq_category_id,
                            success: function(response) {
                                jQuery('#delete-faq-category').modal('hide');
                                if(response.status)
                                {
                                    swal.fire("Deleted Successfully!", response.message, "success");
                                    jQuery('#faqs_category_list').replaceWith(response.data);
                                }
                                else
                                {
                                    swal.fire(response.data, response.message, "success");
                                }
                            }
                        });
                    }
                });


            $(document).on('click', '.close-form-add-faq-category', function() {
                $('#add_faq_category form').trigger("reset");
            });

    }); // ready function end

    function edit_faq_category(id, name) 
    {
        $('#faq-category-id').val(id);
        $('#faq-category-name').val(name);
    }


    </script>
@endsection
