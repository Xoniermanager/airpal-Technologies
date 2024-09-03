<form id="personalDetailsForm" method="post" enctype="multipart/form-data">
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
            <div class="col-lg-4 col-md-6">
                <div class="form-wrap">
                    <label class="col-form-label">First Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="first_name"
                        value="{{ $singleDoctorDetails->first_name ?? '' }}">
                    {{-- <input type="text" class="form-control" name="first_name" value="{{$singleDoctorDetails->first_name ?? " "}}"> --}}
                    <span class="text-danger" id="first_name_error"></span>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="form-wrap">
                    <label class="col-form-label">Last Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="last_name"
                        value="{{ $singleDoctorDetails->last_name ?? '' }}">
                    <span class="text-danger" id="last_name_error"></span>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="form-wrap">
                    <label class="col-form-label">Display Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="display_name"
                        value="{{ $singleDoctorDetails->display_name ?? '' }}">
                    <span class="text-danger" id="display_name_error"></span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-wrap">
                    <label class="col-form-label">Gender<span class="text-danger">*</span></label>
                    <select class="form-control select" name="gender">
                        <option value="">Select Gender</option>
                        <option value="Male"
                            {{ isset($singleDoctorDetails->gender) ? ($singleDoctorDetails->gender == 'Male' ? 'selected' : '') : '' }}>
                            Male</option>
                        <option value="Female"
                            {{ isset($singleDoctorDetails->gender) ? ($singleDoctorDetails->gender == 'Female' ? 'selected' : '') : '' }}>
                            Female</option>
                    </select>
                    <span class="text-danger" id="gender_error"></span>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="form-wrap">
                    <label class="col-form-label">Phone Number <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="phone"
                        value="{{ $singleDoctorDetails->phone ?? '' }}">
                    <span class="text-danger" id="phone_error"></span>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="form-wrap">
                    <label class="col-form-label">Email Address <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="email"
                        value="{{ $singleDoctorDetails->email ?? '' }}">
                    <span class="text-danger" id="email_error"></span>
                </div>
            </div>
            @if (!isset($singleDoctorDetails))
                <div class="col-lg-4 col-md-6">
                    <div class="form-wrap">
                        <label class="col-form-label">Password <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="password">
                        <span class="text-danger" id="password_error"></span>
                    </div>
                </div>
            @endif
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
        <input type="hidden" value="{{ auth()->user()->id }}" name="doctor_id">
        <a href="#" class="btn btn-gray">Cancel</a>
        <button type="submit" class="btn btn-primary prime-btn">Save Changes</button>
    </div>
</form>