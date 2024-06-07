<!DOCTYPE html>
<html lang="zxx">

<head>
    @include('include.head')
</head>

<body>

    <div class="main-wrapper">
        @include('doctor.include.header')
        <div class="breadcrumb-bar-two">
            <div class="container">
                <div class="row align-items-center inner-banner">
                    <div class="col-md-12 col-12 text-center">
                        <h2 class="breadcrumb-title">Doctor Profile</h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('doctor.doctor-dashboard.index') }}">Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Doctor Profile</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>


        <div class="content doctor-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-xl-3 theiaStickySidebar">

                        @include('doctor.include.sidebar')
                    </div>
                    <div class="col-lg-8 col-xl-9">

                        <div class="dashboard-header">
                            <h3>Profile Settings</h3>
                        </div>

                        <div class="setting-tab">
                            <div class="appointment-tabs">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#" data-bs-toggle="tab"
                                            data-bs-target="#tabone" aria-selected="true" role="tab">Basic Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#" data-bs-toggle="tab" data-bs-target="#tabtwo"
                                            aria-selected="true" role="tab">Experience</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#" data-bs-toggle="tab" data-bs-target="#tabthree"
                                            aria-selected="true" role="tab">Education</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#" data-bs-toggle="tab" data-bs-target="#tabfour"
                                            aria-selected="true" role="tab">Clinics</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#" data-bs-toggle="tab" data-bs-target="#tabfive"
                                            aria-selected="true" role="tab">Business Hours</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-content">

                            <div class="tab-pane active show" id="tabone" role="tabpanel">
                                <div class="setting-title">
                                    <h5>Profile</h5>
                                </div>
                                <form action="#">
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
                                                        <input type="file" class="upload">
                                                    </div>
                                                    <a href="#" class="upload-remove">Remove</a>
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
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-wrap">
                                                    <label class="col-form-label">Last Name <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-wrap">
                                                    <label class="col-form-label">Display Name <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-wrap">
                                                    <label class="col-form-label">Designation <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-wrap">
                                                    <label class="col-form-label">Phone Numbers <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-wrap">
                                                    <label class="col-form-label">Email Address <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-wrap">
                                                    <label class="col-form-label">Known Languages <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-block input-block-new mb-0">
                                                        <input class="input-tags form-control" id="inputBox3"
                                                            type="text" data-role="tagsinput" placeholder="Type New"
                                                            name="Label" value="English German,Portugese">
                                                        <a href="#" class="input-text save-btn">Save</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="setting-title">
                                        <h5>Memberships</h5>
                                    </div>
                                    <div class="setting-card">
                                        <div class="add-info membership-infos">
                                            <div class="row membership-content">
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="form-wrap">
                                                        <label class="col-form-label">Title <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" placeholder="Add Title">
                                                    </div>
                                                </div>
                                                <div class="col-lg-9 col-md-6">
                                                    <div class="d-flex align-items-center">
                                                        <div class="form-wrap w-100">
                                                            <label class="col-form-label">About Membership</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                        <div class="form-wrap ms-2">
                                                            <label class="col-form-label d-block">&nbsp;</label>
                                                            <a href="javascript:void(0);"
                                                                class="trash-icon trash">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <a href="#" class="add-membership-info more-item">Add New</a>
                                        </div>
                                    </div>
                                    <div class="modal-btn text-end">
                                        <a href="#" class="btn btn-gray">Cancel</a>
                                        <button type="submit" class="btn btn-primary prime-btn">Save Changes</button>
                                    </div>
                                </form>
                            </div>


                            <div class="tab-pane fade" id="tabtwo" role="tabpanel">
                                <div class="dashboard-header border-0 mb-0">
                                    <h3>Experience</h3>
                                    <ul>
                                        <li>
                                            <a href="#" class="btn btn-primary prime-btn add-experiences">Add New
                                                Experience</a>
                                        </li>
                                    </ul>
                                </div>
                                <form action="#">
                                    <div class="accordions experience-infos" id="list-accord">

                                        <div class="user-accordion-item">
                                            <a href="#" class="accordion-wrap" data-bs-toggle="collapse"
                                                data-bs-target="#experience1">Experience<span>Delete</span></a>
                                            <div class="accordion-collapse collapse show" id="experience1"
                                                data-bs-parent="#list-accord">
                                                <div class="content-collapse">
                                                    <div class="add-service-info">
                                                        <div class="add-info">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <div class="form-wrap mb-2">
                                                                        <div class="change-avatar img-upload">
                                                                            <div class="profile-img">
                                                                                <i class="fa-solid fa-file-image"></i>
                                                                            </div>
                                                                            <div class="upload-img">
                                                                                <h5>Hospital Logo</h5>
                                                                                <div
                                                                                    class="imgs-load d-flex align-items-center">
                                                                                    <div class="change-photo">
                                                                                        Upload New
                                                                                        <input type="file"
                                                                                            class="upload">
                                                                                    </div>
                                                                                    <a href="#"
                                                                                        class="upload-remove">Remove</a>
                                                                                </div>
                                                                                <p class="form-text">Your Image should
                                                                                    Below 4
                                                                                    MB, Accepted format jpg,png,svg</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-md-6">
                                                                    <div class="form-wrap">
                                                                        <label class="col-form-label">Title</label>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-md-6">
                                                                    <div class="form-wrap">
                                                                        <label class="col-form-label">Hospital <span
                                                                                class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-md-6">
                                                                    <div class="form-wrap">
                                                                        <label class="col-form-label">Year of Experience
                                                                            <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-wrap">
                                                                        <label class="col-form-label">Location <span
                                                                                class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-wrap">
                                                                        <label class="col-form-label">Employement
                                                                        </label>
                                                                        <select class="select">
                                                                            <option>Full Time</option>
                                                                            <option>Part Time</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="form-wrap">
                                                                        <label class="col-form-label">Job Description
                                                                            <span class="text-danger">*</span></label>
                                                                        <textarea class="form-control"
                                                                            rows="3"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-md-6">
                                                                    <div class="form-wrap">
                                                                        <label class="col-form-label">Start Date <span
                                                                                class="text-danger">*</span></label>
                                                                        <div class="form-icon">
                                                                            <input type="text"
                                                                                class="form-control datetimepicker">
                                                                            <span class="icon"><i
                                                                                    class="fa-regular fa-calendar-days"></i></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-md-6">
                                                                    <div class="form-wrap">
                                                                        <label class="col-form-label">End Date <span
                                                                                class="text-danger">*</span></label>
                                                                        <div class="form-icon">
                                                                            <input type="text"
                                                                                class="form-control datetimepicker">
                                                                            <span class="icon"><i
                                                                                    class="fa-regular fa-calendar-days"></i></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-md-6">
                                                                    <div class="form-wrap">
                                                                        <label class="col-form-label">&nbsp;</label>
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox">
                                                                                I Currently Working Here
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="text-end">
                                                            <a href="#" class="reset more-item">Reset</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="user-accordion-item">
                                            <a href="#" class="collapsed accordion-wrap" data-bs-toggle="collapse"
                                                data-bs-target="#experience2">Hill Medical Hospital, Newcastle (15 Mar
                                                2021 - 24
                                                Jan 2023 )<span>Delete</span></a>
                                            <div class="accordion-collapse collapse" id="experience2"
                                                data-bs-parent="#list-accord">
                                                <div class="content-collapse">
                                                    <div class="add-service-info">
                                                        <div class="add-info">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <div class="form-wrap mb-2">
                                                                        <div class="change-avatar img-upload">
                                                                            <div class="profile-img">
                                                                                <i class="fa-solid fa-file-image"></i>
                                                                            </div>
                                                                            <div class="upload-img">
                                                                                <h5>Hospital Logo</h5>
                                                                                <div
                                                                                    class="imgs-load d-flex align-items-center">
                                                                                    <div class="change-photo">
                                                                                        Upload New
                                                                                        <input type="file"
                                                                                            class="upload">
                                                                                    </div>
                                                                                    <a href="#"
                                                                                        class="upload-remove">Remove</a>
                                                                                </div>
                                                                                <p class="form-text">Your Image should
                                                                                    Below 4
                                                                                    MB, Accepted format jpg,png,svg</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-md-6">
                                                                    <div class="form-wrap">
                                                                        <label class="col-form-label">Title</label>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-md-6">
                                                                    <div class="form-wrap">
                                                                        <label class="col-form-label">Hospital <span
                                                                                class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-md-6">
                                                                    <div class="form-wrap">
                                                                        <label class="col-form-label">Year of Experience
                                                                            <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-wrap">
                                                                        <label class="col-form-label">Location <span
                                                                                class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-wrap">
                                                                        <label class="col-form-label">Employement
                                                                        </label>
                                                                        <select class="select">
                                                                            <option>Full Time</option>
                                                                            <option>Part Time</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="form-wrap">
                                                                        <label class="col-form-label">Job Description
                                                                            <span class="text-danger">*</span></label>
                                                                        <textarea class="form-control"
                                                                            rows="3"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-md-6">
                                                                    <div class="form-wrap">
                                                                        <label class="col-form-label">Start Date <span
                                                                                class="text-danger">*</span></label>
                                                                        <div class="form-icon">
                                                                            <input type="text"
                                                                                class="form-control datetimepicker">
                                                                            <span class="icon"><i
                                                                                    class="fa-regular fa-calendar-days"></i></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-md-6">
                                                                    <div class="form-wrap">
                                                                        <label class="col-form-label">End Date <span
                                                                                class="text-danger">*</span></label>
                                                                        <div class="form-icon">
                                                                            <input type="text"
                                                                                class="form-control datetimepicker">
                                                                            <span class="icon"><i
                                                                                    class="fa-regular fa-calendar-days"></i></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-md-6">
                                                                    <div class="form-wrap">
                                                                        <label class="col-form-label">&nbsp;</label>
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox">
                                                                                I Currently Working Here
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="text-end">
                                                            <a href="#" class="reset more-item">Reset</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-btn text-end">
                                        <a href="#" class="btn btn-gray">Cancel</a>
                                        <button type="submit" class="btn btn-primary prime-btn">Save Changes</button>
                                    </div>
                                </form>
                            </div>


                            <div class="tab-pane fade" id="tabthree" role="tabpanel">
                                <div class="dashboard-header border-0 mb-0">
                                    <h3>Education</h3>
                                    <ul>
                                        <li>
                                            <a href="#" class="btn btn-primary prime-btn add-educations">Add New
                                                Education</a>
                                        </li>
                                    </ul>
                                </div>
                                <form action="#">
                                    <div class="accordions education-infos" id="list-accord">

                                        <div class="user-accordion-item">
                                            <a href="#" class="accordion-wrap" data-bs-toggle="collapse"
                                                data-bs-target="#education1">Education<span>Delete</span></a>
                                            <div class="accordion-collapse collapse show" id="education1"
                                                data-bs-parent="#list-accord">
                                                <div class="content-collapse">
                                                    <div class="add-service-info">
                                                        <div class="add-info">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <div class="form-wrap mb-2">
                                                                        <div class="change-avatar img-upload">
                                                                            <div class="profile-img">
                                                                                <i class="fa-solid fa-file-image"></i>
                                                                            </div>
                                                                            <div class="upload-img">
                                                                                <h5>Logo</h5>
                                                                                <div
                                                                                    class="imgs-load d-flex align-items-center">
                                                                                    <div class="change-photo">
                                                                                        Upload New
                                                                                        <input type="file"
                                                                                            class="upload">
                                                                                    </div>
                                                                                    <a href="#"
                                                                                        class="upload-remove">Remove</a>
                                                                                </div>
                                                                                <p class="form-text">Your Image should
                                                                                    Below 4
                                                                                    MB, Accepted format jpg,png,svg</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-wrap">
                                                                        <label class="col-form-label">Name of the
                                                                            institution</label>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-wrap">
                                                                        <label class="col-form-label">Course</label>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-md-6">
                                                                    <div class="form-wrap">
                                                                        <label class="col-form-label">Start Date <span
                                                                                class="text-danger">*</span></label>
                                                                        <div class="form-icon">
                                                                            <input type="text"
                                                                                class="form-control datetimepicker">
                                                                            <span class="icon"><i
                                                                                    class="fa-regular fa-calendar-days"></i></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-md-6">
                                                                    <div class="form-wrap">
                                                                        <label class="col-form-label">End Date <span
                                                                                class="text-danger">*</span></label>
                                                                        <div class="form-icon">
                                                                            <input type="text"
                                                                                class="form-control datetimepicker">
                                                                            <span class="icon"><i
                                                                                    class="fa-regular fa-calendar-days"></i></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-md-6">
                                                                    <div class="form-wrap">
                                                                        <label class="col-form-label">No of Years <span
                                                                                class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="form-wrap">
                                                                        <label class="col-form-label">Description <span
                                                                                class="text-danger">*</span></label>
                                                                        <textarea class="form-control"
                                                                            rows="3"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="text-end">
                                                            <a href="#" class="reset more-item">Reset</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="user-accordion-item">
                                            <a href="#" class="collapsed accordion-wrap" data-bs-toggle="collapse"
                                                data-bs-target="#education2">Cambridge (MBBS)<span>Delete</span></a>
                                            <div class="accordion-collapse collapse" id="education2"
                                                data-bs-parent="#list-accord">
                                                <div class="content-collapse">
                                                    <div class="add-service-info">
                                                        <div class="add-info">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <div class="form-wrap mb-2">
                                                                        <div class="change-avatar img-upload">
                                                                            <div class="profile-img">
                                                                                <i class="fa-solid fa-file-image"></i>
                                                                            </div>
                                                                            <div class="upload-img">
                                                                                <h5>Logo</h5>
                                                                                <div
                                                                                    class="imgs-load d-flex align-items-center">
                                                                                    <div class="change-photo">
                                                                                        Upload New
                                                                                        <input type="file"
                                                                                            class="upload">
                                                                                    </div>
                                                                                    <a href="#"
                                                                                        class="upload-remove">Remove</a>
                                                                                </div>
                                                                                <p class="form-text">Your Image should
                                                                                    Below 4
                                                                                    MB, Accepted format jpg,png,svg</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-wrap">
                                                                        <label class="col-form-label">Name of the
                                                                            institution</label>
                                                                        <input type="text" class="form-control"
                                                                            value="Cambridge">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-wrap">
                                                                        <label class="col-form-label">Course</label>
                                                                        <input type="text" class="form-control"
                                                                            value="MBBS">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-md-6">
                                                                    <div class="form-wrap">
                                                                        <label class="col-form-label">Start Date <span
                                                                                class="text-danger">*</span></label>
                                                                        <div class="form-icon">
                                                                            <input type="text"
                                                                                class="form-control datetimepicker"
                                                                                value="12-6-2000">
                                                                            <span class="icon"><i
                                                                                    class="fa-regular fa-calendar-days"></i></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-md-6">
                                                                    <div class="form-wrap">
                                                                        <label class="col-form-label">End Date <span
                                                                                class="text-danger">*</span></label>
                                                                        <div class="form-icon">
                                                                            <input type="text"
                                                                                class="form-control datetimepicker"
                                                                                value="09-05-2005">
                                                                            <span class="icon"><i
                                                                                    class="fa-regular fa-calendar-days"></i></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-md-6">
                                                                    <div class="form-wrap">
                                                                        <label class="col-form-label">No of Years <span
                                                                                class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control"
                                                                            value="5">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="form-wrap">
                                                                        <label class="col-form-label">Description <span
                                                                                class="text-danger">*</span></label>
                                                                        <textarea class="form-control"
                                                                            rows="3"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="text-end">
                                                            <a href="#" class="reset more-item">Reset</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-btn text-end">
                                        <a href="#" class="btn btn-gray">Cancel</a>
                                        <button class="btn btn-primary prime-btn">Save Changes</button>
                                    </div>
                                </form>

                            </div>


                            <div class="tab-pane fade" id="tabfour" role="tabpanel">
                                <div class="dashboard-header">
                                    <div class="header-back">
                                       
                                        <h3>Appointment Details</h3>
                                    </div>
                                </div>
                                <div class="appointment-details-wrap">

                                    <div class="appointment-wrap appointment-detail-card">
                                        <ul>
                                            <li>
                                                <div class="patinet-information">
                                                    <a href="#">
                                                        <img src="../assets/img/doctors-dashboard/profile-02.jpg"
                                                            alt="User Image">
                                                    </a>
                                                    <div class="patient-info">
                                                        <p>#Apt0001</p>
                                                        <h6><a href="#">Kelly Joseph </a><span
                                                                class="badge new-tag">New</span>
                                                        </h6>
                                                        <div class="mail-info-patient">
                                                            <ul>
                                                                <li><i class="fa-solid fa-envelope"></i><a href="#"
                                                                        class="__cf_email__"
                                                                        data-cfemail="d7bcb2bbbbae97b2afb6baa7bbb2f9b4b8ba">[email&#160;protected]</a>
                                                                </li>
                                                                <li><i class="fa-solid fa-phone"></i>+1 504 368 6874
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="appointment-info">
                                                <div class="person-info">
                                                    <p>Person with patient</p>
                                                    <ul class="d-flex apponitment-types">
                                                        <li>Andrew</li>
                                                    </ul>
                                                </div>
                                                <div class="person-info">
                                                    <p>Type of Appointment</p>
                                                    <ul class="d-flex apponitment-types">
                                                        <li><i class="fa-solid fa-video text-indigo"></i>Video Call</li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="appointment-action">
                                                <div class="detail-badge-info">
                                                    <span class="badge bg-green">Completed</span>
                                                </div>
                                                <div class="consult-fees">
                                                    <h6>Consultation Fees : $200</h6>
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="#"><i class="fa-solid fa-comments"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#"><i class="fa-solid fa-xmark"></i></a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                        <ul class="detail-card-bottom-info">
                                            <li>
                                                <h6>Appointment Date & Time</h6>
                                                <span>22 Jul 2023 - 12:00 pm</span>
                                            </li>
                                            <li>
                                                <h6>Visit Type</h6>
                                                <span>General</span>
                                            </li>
                                            <li class="appointment-detail-btn">
                                                <a href="#view_prescription" data-bs-toggle="modal">View Details</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="recent-appointments">
                                        <h5 class="head-text">Recent Appointments</h5>

                                        <div class="appointment-wrap">
                                            <ul>
                                                <li>
                                                    <div class="patinet-information">
                                                        <a href="#">
                                                            <img src="../assets/img/doctors-dashboard/profile-01.jpg"
                                                                alt="User Image">
                                                        </a>
                                                        <div class="patient-info">
                                                            <p>#Apt0001</p>
                                                            <h6><a href="#">Adrian</a></h6>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="appointment-info">
                                                    <p><i class="fa-solid fa-clock"></i>11 Nov 2024 10.45 AM</p>
                                                    <ul class="d-flex apponitment-types">
                                                        <li>General Visit</li>
                                                        <li>Chat</li>
                                                    </ul>
                                                </li>
                                                <li class="mail-info-patient">
                                                    <ul>
                                                        <li><i class="fa-solid fa-envelope"></i><a href="#"
                                                                class="__cf_email__"
                                                                data-cfemail="60010412010e200518010d100c054e030f0d">[email&#160;protected]</a>
                                                        </li>
                                                        <li><i class="fa-solid fa-phone"></i>+1 504 368 6874</li>
                                                    </ul>
                                                </li>
                                                <li class="appointment-action">
                                                    <ul>
                                                        <li>
                                                            <a href="#"><i class="fa-solid fa-eye"></i></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>


                                        <div class="appointment-wrap">
                                            <ul>
                                                <li>
                                                    <div class="patinet-information">
                                                        <a href="#">
                                                            <img src="../assets/img/doctors-dashboard/profile-03.jpg"
                                                                alt="User Image">
                                                        </a>
                                                        <div class="patient-info">
                                                            <p>#Apt0003</p>
                                                            <h6><a href="#">Samuel</a></h6>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="appointment-info">
                                                    <p><i class="fa-solid fa-clock"></i>27 Oct 2024 09.30 AM</p>
                                                    <ul class="d-flex apponitment-types">
                                                        <li>General Visit</li>
                                                        <li>Video Call</li>
                                                    </ul>
                                                </li>
                                                <li class="mail-info-patient">
                                                    <ul>
                                                        <li><i class="fa-solid fa-envelope"></i><a href="#"
                                                                class="__cf_email__"
                                                                data-cfemail="0370626e76666f43667b626e736f662d606c6e">[email&#160;protected]</a>
                                                        </li>
                                                        <li><i class="fa-solid fa-phone"></i> +1 749 104 6291</li>
                                                    </ul>
                                                </li>
                                                <li class="appointment-action">
                                                    <ul>
                                                        <li>
                                                            <a href="#"><i class="fa-solid fa-eye"></i></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div class="tab-pane fade" id="tabfive" role="tabpanel">
                                <div class="dashboard-header border-0 mb-0">
                                    <h3>Business Hours</h3>
                                </div>
                                <form action="#">
                                    <div class="business-wrap">
                                        <h4>Select Business days</h4>
                                        <ul class="business-nav">
                                            <li>
                                                <a class="tab-link active" data-tab="day-monday">Monday</a>
                                            </li>
                                            <li>
                                                <a class="tab-link active" data-tab="day-tuesday">Tuesday</a>
                                            </li>
                                            <li>
                                                <a class="tab-link active" data-tab="day-wednesday">Wednesday</a>
                                            </li>
                                            <li>
                                                <a class="tab-link active" data-tab="day-thursday">Thursday</a>
                                            </li>
                                            <li>
                                                <a class="tab-link active" data-tab="day-friday">Friday</a>
                                            </li>
                                            <li>
                                                <a class="tab-link" data-tab="day-saturday">Saturday</a>
                                            </li>
                                            <li>
                                                <a class="tab-link" data-tab="day-sunday">Sunday</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="accordions business-info" id="list-accord">

                                        <div class="user-accordion-item tab-items active" id="day-monday">
                                            <a href="#" class="accordion-wrap" data-bs-toggle="collapse"
                                                data-bs-target="#monday">Monday<span class="edit">Edit</span></a>
                                            <div class="accordion-collapse collapse show" id="monday"
                                                data-bs-parent="#list-accord">
                                                <div class="content-collapse pb-0">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-6">
                                                            <div class="form-wrap">
                                                                <label class="col-form-label">From <span
                                                                        class="text-danger">*</span></label>
                                                                <div class="form-icon">
                                                                    <input type="text" class="form-control timepicker1">
                                                                    <span class="icon"><i
                                                                            class="fa-solid fa-clock"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-wrap">
                                                                <label class="col-form-label">To <span
                                                                        class="text-danger">*</span></label>
                                                                <div class="form-icon">
                                                                    <input type="text" class="form-control timepicker1">
                                                                    <span class="icon"><i
                                                                            class="fa-solid fa-clock"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="user-accordion-item tab-items active" id="day-tuesday">
                                            <a href="#" class="accordion-wrap collapsed" data-bs-toggle="collapse"
                                                data-bs-target="#tuesday">Tuesday<span class="edit">Edit</span></a>
                                            <div class="accordion-collapse collapse" id="tuesday"
                                                data-bs-parent="#list-accord">
                                                <div class="content-collapse pb-0">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-6">
                                                            <div class="form-wrap">
                                                                <label class="col-form-label">From <span
                                                                        class="text-danger">*</span></label>
                                                                <div class="form-icon">
                                                                    <input type="text" class="form-control timepicker1">
                                                                    <span class="icon"><i
                                                                            class="fa-solid fa-clock"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-wrap">
                                                                <label class="col-form-label">To <span
                                                                        class="text-danger">*</span></label>
                                                                <div class="form-icon">
                                                                    <input type="text" class="form-control timepicker1">
                                                                    <span class="icon"><i
                                                                            class="fa-solid fa-clock"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="user-accordion-item tab-items active" id="day-wednesday">
                                            <a href="#" class="accordion-wrap collapsed" data-bs-toggle="collapse"
                                                data-bs-target="#wednesday">Wednesday<span class="edit">Edit</span></a>
                                            <div class="accordion-collapse collapse" id="wednesday"
                                                data-bs-parent="#list-accord">
                                                <div class="content-collapse pb-0">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-6">
                                                            <div class="form-wrap">
                                                                <label class="col-form-label">From <span
                                                                        class="text-danger">*</span></label>
                                                                <div class="form-icon">
                                                                    <input type="text" class="form-control timepicker1">
                                                                    <span class="icon"><i
                                                                            class="fa-solid fa-clock"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-wrap">
                                                                <label class="col-form-label">To <span
                                                                        class="text-danger">*</span></label>
                                                                <div class="form-icon">
                                                                    <input type="text" class="form-control timepicker1">
                                                                    <span class="icon"><i
                                                                            class="fa-solid fa-clock"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="user-accordion-item tab-items active" id="day-thursday">
                                            <a href="#" class="accordion-wrap collapsed" data-bs-toggle="collapse"
                                                data-bs-target="#thursday">Thursday<span class="edit">Edit</span></a>
                                            <div class="accordion-collapse collapse" id="thursday"
                                                data-bs-parent="#list-accord">
                                                <div class="content-collapse pb-0">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-6">
                                                            <div class="form-wrap">
                                                                <label class="col-form-label">From <span
                                                                        class="text-danger">*</span></label>
                                                                <div class="form-icon">
                                                                    <input type="text" class="form-control timepicker1">
                                                                    <span class="icon"><i
                                                                            class="fa-solid fa-clock"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-wrap">
                                                                <label class="col-form-label">To <span
                                                                        class="text-danger">*</span></label>
                                                                <div class="form-icon">
                                                                    <input type="text" class="form-control timepicker1">
                                                                    <span class="icon"><i
                                                                            class="fa-solid fa-clock"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="user-accordion-item tab-items active" id="day-friday">
                                            <a href="#" class="accordion-wrap collapsed" data-bs-toggle="collapse"
                                                data-bs-target="#friday">Friday<span class="edit">Edit</span></a>
                                            <div class="accordion-collapse collapse" id="friday"
                                                data-bs-parent="#list-accord">
                                                <div class="content-collapse pb-0">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-6">
                                                            <div class="form-wrap">
                                                                <label class="col-form-label">From <span
                                                                        class="text-danger">*</span></label>
                                                                <div class="form-icon">
                                                                    <input type="text" class="form-control timepicker1">
                                                                    <span class="icon"><i
                                                                            class="fa-solid fa-clock"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-wrap">
                                                                <label class="col-form-label">To <span
                                                                        class="text-danger">*</span></label>
                                                                <div class="form-icon">
                                                                    <input type="text" class="form-control timepicker1">
                                                                    <span class="icon"><i
                                                                            class="fa-solid fa-clock"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="user-accordion-item tab-items" id="day-saturday">
                                            <a href="#" class="accordion-wrap collapsed" data-bs-toggle="collapse"
                                                data-bs-target="#saturday">Saturday<span class="edit">Edit</span></a>
                                            <div class="accordion-collapse collapse" id="saturday"
                                                data-bs-parent="#list-accord">
                                                <div class="content-collapse pb-0">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-6">
                                                            <div class="form-wrap">
                                                                <label class="col-form-label">From <span
                                                                        class="text-danger">*</span></label>
                                                                <div class="form-icon">
                                                                    <input type="text" class="form-control timepicker1">
                                                                    <span class="icon"><i
                                                                            class="fa-solid fa-clock"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-wrap">
                                                                <label class="col-form-label">To <span
                                                                        class="text-danger">*</span></label>
                                                                <div class="form-icon">
                                                                    <input type="text" class="form-control timepicker1">
                                                                    <span class="icon"><i
                                                                            class="fa-solid fa-clock"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="user-accordion-item tab-items" id="day-sunday">
                                            <a href="#" class="accordion-wrap collapsed" data-bs-toggle="collapse"
                                                data-bs-target="#sunday">Sunday<span class="edit">Edit</span></a>
                                            <div class="accordion-collapse collapse" id="sunday"
                                                data-bs-parent="#list-accord">
                                                <div class="content-collapse pb-0">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-6">
                                                            <div class="form-wrap">
                                                                <label class="col-form-label">From <span
                                                                        class="text-danger">*</span></label>
                                                                <div class="form-icon">
                                                                    <input type="text" class="form-control timepicker1">
                                                                    <span class="icon"><i
                                                                            class="fa-solid fa-clock"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-wrap">
                                                                <label class="col-form-label">To <span
                                                                        class="text-danger">*</span></label>
                                                                <div class="form-icon">
                                                                    <input type="text" class="form-control timepicker1">
                                                                    <span class="icon"><i
                                                                            class="fa-solid fa-clock"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-btn text-end">
                                        <a href="#" class="btn btn-gray">Cancel</a>
                                        <button type="submit" class="btn btn-primary prime-btn">Save Changes</button>
                                    </div>
                                </form>
                            </div>



                        </div>


                    </div>
                </div>
            </div>
        </div>



    </div>
    @include('include.footer')