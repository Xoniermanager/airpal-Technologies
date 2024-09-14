@extends('layouts.admin.main')
@section('content')
    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-7 col-auto">
                            <h3 class="page-title">Services</h3>
                        </div>
                        <div class="col-sm-5 col mb-3">
                            <a href="#add_service" data-bs-toggle="modal"
                                class="btn btn-primary float-end mt-2">Add</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                @include('admin.service.service-list')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


           <!-- Start : pop up form to add new country  -->
           <div class="modal fade" id="add_service" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Service</h5>
                        <button type="button" class="btn-close close-form-add" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addServiceForm" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-12">
                                    <div class="mb-3">
                                        <label class="mb-2">Service</label>
                                        <input type="text" class="form-control" name="name">
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

           <!-- Start : pop up form to add new country  -->
           <div class="modal fade" id="edit_service" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit service</h5>
                        <button type="button" class="btn-close close-form-edit" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editServiceForm" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-12">
                                    <div class="mb-3">
                                        <label class="mb-2">Service</label>
                                        <input type="text" class="form-control" name="name" id="service-name">
                                        <span class="text-danger" id="name-error"></span>
                                    </div>
                                </div>
                              
                            </div>
                            <input type="hidden" name="id" id="service_id">
                            <button type="submit" class="btn btn-primary w-100">Save</button>
                        </form>
                    </div>
                </div>
            </div>
           </div>
          <!-- End : pop up form to add new speciality  -->

                  <!-- Start : pop up form to delete speciality  -->
        <div class="modal " id="delete_service" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-content p-2">
                            <h4 class="modal-title">Delete</h4>
                            <p class="mb-4">Are you sure want to delete?</p>
                            <input type="hidden" id="id-delete-service" name="id">
                            <button type="button" class="btn btn-primary confirm-service-delete">Delete</button>
                            <button type="button" class="btn btn-danger " data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End : pop up form to delete speciality  -->
    </div>
@endsection
@section("javascript")
    <script>
         $(document).ready(function(){

            jQuery("#addServiceForm").validate({
                rules: {
                    name: "required"
                },
                messages: {
                    name: "Please enter service name!",
                },
                submitHandler: function(form) {
                    var formData = $(form).serialize();
                    $.ajax({
                        url: "<?= route('admin.service.add') ?>",
                        type: 'post',
                        data: formData,
                        dataType:'json',
                        success: function(response) {
                            jQuery('#add_service').modal('hide');
                            jQuery('#service_list').replaceWith(response.data);
                            $("#addServiceForm")[0].reset();
                        },
                        error: function(error_messages) {
                            let errors = JSON.parse(error_messages.responseText).errors;
                            let randon_number = Math.floor((Math.random() * 100)+1);
                            for (var error_key in errors) {
                                random_id = error_key + '_' + randon_number
                                jQuery('.' + error_key + '_error').remove();
                                jQuery(document).find('#add_service [name=' + error_key + ']')
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

            jQuery("#editServiceForm").validate({
                rules: {
                    name: "required"
                },
                messages: {
                    name: "Please enter country name!",
                },
                submitHandler: function(form) {
                    var formData = $(form).serialize();
                    let update_id = jQuery('#service_id').val();
                    $.ajax({
                        url: "{{ route('admin.service.index') }}/update/"+update_id,
                        type: 'post',
                        data: formData,
                        success: function(response) {
                            jQuery('#edit_service').modal('hide');
                            swal.fire("Done!", response.message, "success");
                            jQuery('#service_list').replaceWith(response.data);
                        },
                        error: function(error_messages) {
                            let errors = JSON.parse(error_messages.responseText).errors;
                            let randon_number = Math.floor((Math.random() * 100)+1);
                            for (var error_key in errors) {
                                random_id = error_key + '_' + randon_number
                                jQuery('.' + error_key + '_error').remove();
                                jQuery(document).find('#edit_service [name=' + error_key + ']')
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


            function remove_error_div(error_ele_id) 
            {
                setTimeout(function() {
                    jQuery("#" + error_ele_id + "_error").remove();
                }, 5000);
            }

            $(document).on('click','.delete-service',function(){
               const id =  $(this).attr('data-id');
               $("#id-delete-service").val(id);
            });
    
           $(document).on('click' ,'.confirm-service-delete',function(e){
            e.preventDefault();
             const id = $("#id-delete-service").val();
              if(id!=''){
                $.ajax({
                   type : 'GET',
                   url  : "{{route('admin.service.index')}}/delete/"+id,
                   success : function(response){
                        jQuery('#delete_service').modal('hide');
                        
                        // swal.fire("Done!", response.message, "success");
                        console.log(response.data);
                        jQuery('#service_list').replaceWith(response.data);
                   }
                });
              }
           });

        //    $(document).on('click','.close-form-add',function(){
        //       $('#addCountryForm')[0].reset();
        //    });

         }); // ready function 

         function edit_service(name , id){
           $('#service-name').val(name);
           $('#service_id').val(id);
         }
       
    </script>
@endsection

   