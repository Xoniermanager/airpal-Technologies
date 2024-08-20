@extends('layouts.patient.main')
@section('content')

                        <form  id="patientDetailsForm">
                            @csrf
                            <div class="setting-card">
                                <div class="change-avatar img-upload">
                                    <div class="profile-img">
                                        @if (isset($patientDetails->image_url))
                                            <img src="{{ $patientDetails->image_url }}" class="previewProfile">
                                        @else
                                        <img src=""  onerror="this.src='{{asset('assets/img/doctors/doctor-thumb-01.jpg')}}'" >
                                        @endif
                                    </div>
                                    <div class="upload-img">
                                        <h5>Profile Image</h5>
                                        <div class="imgs-load d-flex align-items-center">
                                            <div class="change-photo">
                                                Upload New
                                                <input type="file" class="upload" name="image"  id="imgInp" value="{{$patientDetails->image_url}}">
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
                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-wrap">
                                            <label class="col-form-label">First Name <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" value="{{$patientDetails->first_name ?? ''}}" name="first_name">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-wrap">
                                            <label class="col-form-label">Last Name <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" value="{{$patientDetails->last_name ?? ''}}" name="last_name" >
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-wrap">
                                            <label class="col-form-label">Date of Birth <span
                                                    class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="dob" value="{{$patientDetails->dob ?? ''}}" >
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-wrap">
                                            <label class="col-form-label">Phone Number <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" value="{{$patientDetails->phone ?? ''}}" name="phone">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-wrap">
                                            <label class="col-form-label">Email Address <span
                                                    class="text-danger">*</span></label>
                                            <input type="email" class="form-control" value="{{$patientDetails->email ?? ''}}" name="email" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-wrap">
                                            <label class="col-form-label">Blood Group <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control"  name="blood_group"  value="{{$patientDetails->blood_group ?? ''}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-wrap">
                                            <label class="col-form-label">Gender<span
                                                    class="text-danger">*</span></label>
                                            <select class="form-control select" name="gender">
                                                <option value="">Select Gender</option>
                                                <option value="Male"   {{ isset($patientDetails->gender) ? ($patientDetails->gender == 'Male'? 'selected':'')   : ''}}>Male</option>
                                                <option value="Female" {{ isset($patientDetails->gender) ? ($patientDetails->gender == 'Female'? 'selected':'') : ''}}>Female</option>
                                            </select>
                                            {{-- <span class="text-danger" id="gender_error"></span> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="setting-title">
                                <h5>Address</h5>
                            </div>
                            <div class="setting-card">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-wrap">
                                            <label class="col-form-label">Address <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="address[street]" value="{{$patientDetails->doctorAddress->address}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-wrap">
                                            <label class="col-form-label">City <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control"  name="address[city]" value="{{$patientDetails->doctorAddress->city}}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-wrap">
                                            <label class="col-form-label">Country</label>  
                                            <select class="form-control select" name="address[country]" >
                                                <option value="">Select Country </option>
                                                @forelse ($countries as $country )
                                                <option value="{{ $country->id }}"
                                                    @if(isset($patientDetails) && isset($patientDetails->doctorAddress) && $patientDetails->doctorAddress->country_id == $country->id)
                                                        selected
                                                    @endif>
                                                    {{ $countryName = $country->name }}
                                                </option>
                                                @empty
                                                <option>Not avaiable please create it first</option>  
                                                @endforelse
                                            </select> 
                                            <span class="text-danger" id="country_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-wrap">
                                            <label class="col-form-label">State<span
                                                    class="text-danger">*</span></label>
                                            <div class="form-icon">
                                                <select  class="form-control select" id="states" name="address[states]">
                                                    <option value=" ">Select State </option>
                                                    @forelse ($states as $state )
                                                    <option value="{{ $state->id }}"
                                                        @if(isset($patientDetails) && isset($patientDetails->doctorAddress) && $patientDetails->doctorAddress->state_id == $state->id)
                                                            selected
                                                        @endif>
                                                        {{ $state->name }}
                                                    </option>
                                                     @empty
                                                     <option>Not avaiable please create it first</option>  
                                                     @endforelse
                                                </select> 
                                                    <span class="text-danger" id="states_error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-wrap">
                                            <label class="col-form-label">Pincode <span
                                                    class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="address[pincode]" value="{{$patientDetails->doctorAddress->pin_code}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden"  value ="{{$patientDetails->id ?? ''}}" name="address[user_id]">
                            <div class="modal-btn text-end">
                                <a href="#" class="btn btn-gray">Cancel</a>
                                <button type="submit" class="btn btn-primary prime-btn">Save Changes</button>
                            </div>
                        </form>
    @endsection



    @section('javascript')

    <script>

        $("#patientDetailsForm").validate({
                rules: {
                    first_name: "required",
                    last_name: "required",
                    gender: "required",
                    phone: "required",
                    email: {
                        required: true,
                        email: true // Add email validation
                    },
                },
                messages: {
                    first_name: "Please enter first name!",
                    last_name: "Please enter last name!",
                    display_name: "Please enter display name!",
                    phone: "Please enter phone number!",
                    email: {
                        required: "Please enter email address!",
                        email: "Please enter a valid email address!" // Add email validation message
                    },
                },
                submitHandler: function(form) {
                    var errorTimeout;
                    var formData = new FormData(form);
                    $.ajax({
                        url: "<?= route('patient-profile.update') ?>",
                        type: 'post',
                        data: formData,
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                'content') // Add CSRF token
                        },
                        success: function(response) {
                            if (response.status == true) {
                                swal.fire("Done!", response.message, "success");
                            }
                        },

                        error: function(error_messages) {
                            var errors = error_messages.responseJSON;
                            $.each(errors.errors, function(key, value) {
                                $('#' + key + '_error').html(value)
                            .show(); // Show the error message
                            });
                            if (errorTimeout) {
                                clearTimeout(errorTimeout);
                            }
                            // Set timeout to remove the error messages after 2 seconds
                            errorTimeout = setTimeout(function() {
                                $('.text-danger').fadeOut();
                            }, 2000);
                        }

                    });
                }
            });

            $('#country').on('change', function() {
                let countyId = this.value
                $.ajax({
                    url: "{{ route('get.state.by.country.id') }}",
                    type: 'get',
                    data: {
                        'country_id': countyId
                    },
                    dataType: 'json',
                    success: function(response) {
                        var states = response.data;
                        var options = '';
                        //options += "<option>Select State</option>";
                        $.each(states, function(index, item) {

                            options += "<option value='" + item.id + "'>" + item.name +
                                "</option>";
                        });
                        $("#states").html(options);

                    },
                    error: function(error) {
                        console.log("Error fetching data:", error);
                    }
                });
            })

            imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }}

            document.getElementById('imgInp').addEventListener('change', function(event) {

            const [file] = event.target.files; // Get the selected file
            if (file) {
                // Get all elements with the class 'previewProfile'
                const previewImages = document.getElementsByClassName('previewProfile');
                console.log(previewImages)
                // Loop through each element and set the preview image
                Array.from(previewImages).forEach((img, index) => {
                    img.src = URL.createObjectURL(
                    file); // Create a URL for the file and set it as the src of the img
                    img.style.display = 'inline-block'; // Make sure the image is visible
                });
            }
        });

        
    </script>

    @endsection