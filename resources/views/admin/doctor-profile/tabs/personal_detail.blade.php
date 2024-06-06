<div class="tab-pane fade show active" id="personal_details_tab">
    <div class="setting-title">
        <h5>Profile</h5>
    </div>
    <form id="personalDetailsForm" method="post" enctype="multipart/form-data">
        @csrf
        <div class="setting-card">
            <div class="change-avatar img-upload">
                <div class="profile-img">
                    <i class="fa-solid fa-file-image"></i>
                </div>
                <div class="upload-img">
                    <h5>Profile Image</h5>
                    <div class="imgs-load d-flex align-items-center">
                        <div class="change-photo">
                            Upload New
                            <input type="file" class="upload" name="image">
                        </div>
                        {{-- <a href="#" class="upload-remove">Remove</a> --}}
                    </div>
                    <p class="form-text">Your Image should Below 4 MB, Accepted format
                        jpg,png,svg
                    </p>
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
                        <input type="text" class="form-control" name="first_name" value="{{$singleDoctorDetails->first_name ?? " "}}">
                        <span class="text-danger" id="first_name_error"></span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="form-wrap">
                        <label class="col-form-label">Last Name <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="last_name" value="{{$singleDoctorDetails->last_name ?? " "}}">
                        <span class="text-danger" id="last_name_error"></span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="form-wrap">
                        <label class="col-form-label">Display Name <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="display_name" value="{{$singleDoctorDetails->display_name ?? " "}}">
                        <span class="text-danger" id="display_name_error"></span>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="form-wrap">
                        <label class="col-form-label">Phone Number <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="phone" value="{{$singleDoctorDetails->phone ?? " "}}">
                        <span class="text-danger" id="phone_error"></span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="form-wrap">
                        <label class="col-form-label">Email Address <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="email"value="{{$singleDoctorDetails->email ?? " "}}">
                        <span class="text-danger" id="email_error"></span>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-wrap">
                        <label class="col-form-label">Known Languages <span
                                class="text-danger">*</span></label>
                        <select id="language" class="form-control" name="name[]"> </select>
                        <script id="nolanguageTemplate" type="text/x-kendo-tmpl">
                            <div>
                                                    No data found. Do you want to add new item - '#: instance.filterInput.val() #' ?
                                                </div>
                                                <br />
                                                # var value = instance.input.val(); #
                                                # var id = instance.element[0].id; #
                                                <button class="k-button k-button-solid-base k-button-solid k-button-md k-rounded-md" onclick="addLanguage('#: id #', '#: value #')">Add new item</button>
                                            </script>
                                            <span class="text-danger" id="name_error"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="setting-title">
            <h5>Speciality & Services </h5>
        </div>
        <div class="setting-card">
            <div class="add-info membership-infos">
                <div class="row membership-content">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-wrap">
                            <label class="col-form-label">Speciality <span
                                    class="text-danger">*</span></label>
                            <div class="position-relative form-control dropdown">
                                <a href="#" class="dropdown-toggle nav-link"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Select
                                </a>
                                <div class="w-100 dropdown-menu dropdown-menu-end">
                                    @foreach ($specialities as $speciality)
                                        <li class="dropdown-item"><input type="checkbox"
                                                value="{{ $speciality->id }}"
                                                name="specialities[]"> {{ $speciality->name }}
                                        </li>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="d-flex align-items-center">
                            <div class="form-wrap w-100">
                                <label class="col-form-label">Services</label>
                                <div class="position-relative form-control dropdown">
                                    <a href="#" class="dropdown-toggle nav-link"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Select
                                    </a>
                                    <div class="w-100 dropdown-menu dropdown-menu-end">
                                        @foreach ($services as $service)
                                            <li class="dropdown-item"><input type="checkbox"
                                                    value="{{ $service->id }}"
                                                    name="service[]">{{ $service->name }}</li>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="form-wrap ms-2">
                                <label class="col-form-label d-block">&nbsp;</label>
                                <a href="javascript:void(0);" class="trash-icon trash">Delete</a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="text-end">
                <a href="#" class="add-membership-info more-item">Add New</a>
            </div> --}}
        </div>
        <div class="modal-btn text-end">
            <a href="#" class="btn btn-gray">Cancel</a>
            <button type="submit" class="btn btn-primary prime-btn">Save Changes</button>
        </div>
    </form>
</div>