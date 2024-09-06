@extends('layouts.admin.main')
@section('content')

<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-7 col-auto">
                        <h3 class="page-title">Testimonials</h3>
                    </div>
                    {{-- <div class="col-sm-5 col">
                        <a href="#add_testimonials" data-bs-toggle="modal" class="btn btn-primary float-end mt-2">Add</a>
                    </div> --}}
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <form id="addTestimonial" id="addtestimonials"
                            {{-- method="POST" action="{{ route('admin.save.testimonial.form') }}"  --}}
                            enctype="multipart/form-data">
                                @csrf
                                <div class="setting-card">
                                    <div class="change-avatar img-upload">
                            
                                        <div class="profile-img">
                            
                                            @if (isset($singleDoctorDetails->image_url))
                                                <img src="{{ $singleDoctorDetails->image_url }}" id="blah" class="previewProfile">
                                            @else
                                                <img src="" id="blah"
                                                    onerror="this.src='{{ asset('assets/img/doctors/doctor-thumb-01.jpg') }}';">
                                            @endif
                                        </div>
                                        <div class="upload-img">
                                            <h5>Profile Image</h5>
                                            <div class="imgs-load d-flex align-items-center">
                                                <div class="change-photo">
                                                    Upload New
                                                    <input type="file" class="upload" name="image" id="imgInp">
                                                </div>
                                                {{-- <a href="#" class="upload-remove">Remove</a> --}}
                                            </div>
                                            <p class="form-text">Your Image should Below 2 MB, Accepted format
                                                jpg,png,svg
                                            </p>
                                            <span class="text-danger" id="image_error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="setting-title">
                                    <h5>Information</h5>
                                </div>
                            
                                <div class="setting-card">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Title <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="title"
                                                    value="{{ $singleDoctorDetails->title ?? '' }}">
                                                {{-- <input type="text" class="form-control" name="title" value="{{$singleDoctorDetails->title ?? " "}}"> --}}
                                                <span class="text-danger" id="title_error"></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">User Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="username"
                                                    value="{{ $singleDoctorDetails->email ?? '' }}">
                                                <span class="text-danger" id="username_error"></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Address <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="address"
                                                    value="{{ $singleDoctorDetails->email ?? '' }}">
                                                <span class="text-danger" id="address_error"></span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            
                                <div class="setting-title">
                                    <h5>About Me </h5>
                                </div>
                            
                                <div class="setting-card">
                                    <div class="add-info membership-infos">
                                        <div class="row membership-content">
                                            <div class="col-lg-12">
                                                <div class="form-wrap">
                                                    <label class="col-form-label">Description</label>
                                                    <textarea class="form-control" style="height: 150px;" name="description" id="description">{{ $singleDoctorDetails->description ?? '' }}</textarea>
                                                    <span class="text-danger" id="description_error"></span>
                                                    <span id="charCount">0/1000</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-btn text-end">
                                    <button type="submit" class="btn btn-primary prime-btn">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('javascript')
    <script>
        $(document).ready(function() {

            jQuery("#addtestimonials").validate({
                rules: {
                    title: "required"
                },
                messages: {
                    title: "Please enter testimonials title!",
                },
                submitHandler: function(form) {
                    var formData = $(form).serialize();
                    $.ajax({
                        url: "<?= route('admin.save.testimonial.form') ?>",
                        type: 'post',
                        data: formData,
                        success: function(response) {
        
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

            // jQuery("#edittestimonialsForm").validate({
            //     rules: {
            //         name: "required"
            //     },
            //     messages: {
            //         name: "Please enter country name!",
            //     },
            //     submitHandler: function(form) {
            //         var formData = $(form).serialize();
            //         $.ajax({
            //             url: "{{ route('admin.testimonials.update') }}",
            //             type: 'post',
            //             data: formData,
            //             success: function(response) {
            //                 jQuery('#edit_testimonials').modal('hide');
            //                 // swal.fire("Done!", response.message, "success");
            //                 jQuery('#testimonials_list').replaceWith(response.data);
            //             },
            //             error: function(error_messages) {
            //                 let errors = JSON.parse(error_messages.responseText).errors;
            //                 let randon_number = Math.floor((Math.random() * 100)+1);
            //                 for (var error_key in errors) {
            //                     random_id = error_key + '_' + randon_number
            //                     jQuery('.' + error_key + '_error').remove();
            //                     $(document).find('#edit_testimonials [name=' + error_key + ']').after(
            //                         '<span id="' + random_id +
            //                         '_error" class="text text-danger ' + error_key + '_error">' + errors[
            //                             error_key] + '</span>');
            //                         remove_error_div(random_id);
            //                 }
            //             }
            //         });
            //     }
            // });
        }); 
    </script>
@endsection
