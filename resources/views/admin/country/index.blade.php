@extends('layouts.admin.main')
@section('content')
    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-7 col-auto">
                            <h3 class="page-title">Country</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Country</li>
                            </ul>
                        </div>
                        <div class="col-sm-5 col">
                            <a href="#add_country" data-bs-toggle="modal"
                                class="btn btn-primary float-end mt-2">Add</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                @include('admin.country.country-list')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


           <!-- Start : pop up form to add new country  -->
           <div class="modal fade" id="add_country" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Country</h5>
                        <button type="button" class="btn-close close-form-add" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addCountryForm" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-12">
                                    <div class="mb-3">
                                        <label class="mb-2">Country</label>
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
           <div class="modal fade" id="edit_country" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit country</h5>
                        <button type="button" class="btn-close close-form-edit" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editCountryForm" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-12">
                                    <div class="mb-3">
                                        <label class="mb-2">Country</label>
                                        <input type="text" class="form-control" name="name" id="country-name">
                                        <span class="text-danger" id="name-error"></span>
                                    </div>
                                </div>
                              
                            </div>
                            <input type="hidden" name="country_id" id="country_id">
                            <button type="submit" class="btn btn-primary w-100">Save</button>
                        </form>
                    </div>
                </div>
            </div>
           </div>
          <!-- End : pop up form to add new speciality  -->

                  <!-- Start : pop up form to delete speciality  -->
        <div class="modal fade" id="delete_country" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-content p-2">
                            <h4 class="modal-title">Delete</h4>
                            <p class="mb-4">Are you sure want to delete?</p>
                            <input type="hidden" id="id-for-delete-country" name="id">
                            <button type="button" class="btn btn-primary confirm-delete">Delete</button>
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

            jQuery("#addCountryForm").validate({
                rules: {
                    name: "required"
                },
                messages: {
                    name: "Please enter country name!",
                },
                submitHandler: function(form) {
                    var formData = $(form).serialize();
                    $.ajax({
                        url: "<?= route('admin.country.add') ?>",
                        type: 'post',
                        data: formData,
                        dataType:'json',
                        success: function(response) {
                            jQuery('#add_country').modal('hide');
                            jQuery('#country_list').replaceWith(response.data);
                        },
                        error: function(error_messages) {
                            let errors = JSON.parse(error_messages.responseText).errors;
                            let randon_number = Math.floor((Math.random() * 100)+1);
                            for (var error_key in errors) {
                                random_id = error_key + '_' + randon_number
                                jQuery('.' + error_key + '_error').remove();
                                jQuery(document).find('#add_country [name=' + error_key + ']')
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

        
            jQuery("#editCountryForm").validate({
                rules: {
                    // name: "required"
                },
                messages: {
                    name: "Please enter country name!",
                },
                submitHandler: function(form) {
                    var formData = $(form).serialize();
                    let update_id = jQuery('#country_id').val();
                    $.ajax({
                        url: "{{ route('admin.index.country') }}/update/"+update_id,
                        type: 'post',
                        data: formData,
                        success: function(response) {
                            jQuery('#edit_country').modal('hide');
                            // swal.fire("Done!", response.message, "success");
                            console.log(response.data);
                            jQuery('#country_list').replaceWith(response.data);
                        },
                        error: function(error_messages) {
                            let errors = JSON.parse(error_messages.responseText).errors;
                            let randon_number = Math.floor((Math.random() * 100)+1);
                            for (var error_key in errors) {
                                random_id = error_key + '_' + randon_number
                                jQuery('.' + error_key + '_error').remove();
                                jQuery(document).find('#edit_country [name=' + error_key + ']')
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

            $(document).on('click','.delete-country',function(){
               const id =  $(this).attr('data-id');
               $("#id-for-delete-country").val(id);
            });
    
           $(document).on('click' ,'.confirm-delete',function(e){
            e.preventDefault();
             const id = $("#id-for-delete-country").val();
              if(id!=''){
                $.ajax({
                   type : 'GET',
                   data : {'id':id},
                   url  : "{{route('admin.delete-country')}}",
                   success : function(response){
                        jQuery('#delete_country').modal('hide');
                        
                        // swal.fire("Done!", response.message, "success");
                        console.log(response.data);
                        jQuery('#country_list').replaceWith(response.data);
                   }
                });
              }
           });

        //    $(document).on('click','.close-form-add',function(){
        //       $('#addCountryForm')[0].reset();
        //    });

         }); // ready function 

         function edit_country(name , id){
           $('#country-name').val(name);
           $('#country_id').val(id);
         }
       
    </script>
@endsection

   