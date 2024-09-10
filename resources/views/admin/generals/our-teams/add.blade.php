@extends('layouts.admin.main')
@section('content')

<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-7 col-auto">
                        <h3 class="page-title">Our Team</h3>
                    </div>
                    {{-- <div class="col-sm-5 col">
                        <a href="#add_ourTeam" data-bs-toggle="modal" class="btn btn-primary float-end mt-2">Add</a>
                    </div> --}}
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <form id="addourTeam"
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
                                                <label class="col-form-label">Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="name"
                                                    value="{{ $singleDoctorDetails->name ?? '' }}">
                                                {{-- <input type="text" class="form-control" name="name" value="{{$singleDoctorDetails->name ?? " "}}"> --}}
                                                <span class="text-danger" id="name_error"></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Desgination<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="designation"
                                                    value="{{ $singleDoctorDetails->email ?? '' }}">
                                                <span class="text-danger" id="designation_error"></span>
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

        jQuery("#addourTeam").validate({
            rules: {
                name: "required",
                designation: "required",
                description: "required"
            },
            messages: {
                name: "Please enter the testimonial name!",
                designation: "Please enter the designation!",
                description: "Please enter the testimonial description!"
            },
            submitHandler: function(form) {

                var formData = new FormData($(form)[0]); // Use FormData for file uploads
                $.ajax({
                    url: "{{ route('admin.save.our.team.form') }}",
                    type: 'post',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Handle successful response
                    if(response.success == true)
                    {
                        swal.fire("Done!", response.message, "success");
                        $(form).trigger("reset"); // Reset the form
                        window.location.href = "{{ route('admin.our.team.index') }}";
                    }

                    },
                    error: function(xhr) {
                        try {
                            let errors = JSON.parse(xhr.responseText).errors;
                            let randon_number = Math.floor((Math.random() * 100) + 1);
                            for (var error_key in errors) {
                                random_id = error_key + '_' + randon_number;
                                jQuery('.' + error_key + '_error').remove();
                                jQuery(document).find('#addourTeam [name=' + error_key + ']')
                                    .after('<span id="' + random_id + '_error" class="text text-danger ' + error_key + '_error">' + errors[error_key] + '</span>');
                                remove_error_div(random_id);
                            }
                        } catch (e) {
                            console.log("Error parsing response:", e);
                        }
                    }
                });
            }
        });
    });
</script>

@endsection
