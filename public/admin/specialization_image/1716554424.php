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
                                <li class="breadcrumb-item"><a
                                        href="{{ route('doctor.doctor-dashboard.index') }}">Home</a></li>
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
                                        <a class="nav-link" href="#" data-bs-toggle="tab" data-bs-target="#tabthree"
                                            aria-selected="true" role="tab">Education</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#" data-bs-toggle="tab" data-bs-target="#tabtwo"
                                            aria-selected="true" role="tab">Experience</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#" data-bs-toggle="tab" data-bs-target="#tabsix"
                                            aria-selected="true" role="tab">Awards</a>
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
                                        <h5>Speciality & Services </h5>
                                    </div>
                                    <div class="setting-card">
                                        <div class="add-info membership-infos">
                                            <div class="row membership-content">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-wrap">
                                                        <label class="col-form-label">Speciality  <span
                                                                class="text-danger">*</span></label>
                                                                <div class="position-relative form-control dropdown">
                                                                <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                Select 
                                                                </a>
                                                                <div class="w-100 dropdown-menu dropdown-menu-end">
                                                                    <li class="dropdown-item"><input type="checkbox"> Select This</li>
                                                                </div>
                                                            </div>
                                                            
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="d-flex align-items-center">
                                                        <div class="form-wrap w-100">
                                                            <label class="col-form-label">Services</label>
                                                            <div class="position-relative form-control dropdown">
                                                                <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                Select 
                                                                </a>
                                                                <div class="w-100 dropdown-menu dropdown-menu-end">
                                                                    <li class="dropdown-item"><input type="checkbox"> Select This</li>
                                                                </div>
                                                            </div>
                                                            



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
                                                              
                                                                <div class="col-md-4">
                                                                    <div class="form-wrap">
                                                                        <label class="col-form-label">Location <span
                                                                                class="text-danger">*</span></label>
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
                                                                
                                                                <div class="col-lg-12">
                                                                    <div class="form-wrap">
                                                                        <label class="col-form-label">Job Description
                                                                            <span class="text-danger">*</span></label>
                                                                        <textarea class="form-control"
                                                                            rows="3"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-btn text-end">
                                                            <a href="#" class="btn btn-gray">Cancel</a>
                                                            <button class="btn btn-primary prime-btn">Save
                                                                Changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

 

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
                                                                <div class="col-lg-6 col-md-6">
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
                                                                <div class="col-lg-6 col-md-6">
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
                                                               
                                                            </div>
                                                        </div>
                                                        <div class="modal-btn text-end">
                                                            <a href="#" class="btn btn-gray">Cancel</a>
                                                            <button class="btn btn-primary prime-btn">Save
                                                                Changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 

                                    </div>

                                </form>

                            </div>

                            <div class="tab-pane fade" id="tabfour" role="tabpanel">
                                <div class="dashboard-header border-0 mb-0">
                                    <h3>Clinics</h3>
                                    <ul>
                                        <li>
                                            <a href="#" class="btn btn-primary prime-btn add-clinics">Add New Clinic</a>
                                        </li>
                                    </ul>
                                </div>
                                <form action="#">
                                    <div class="accordions clinic-infos" id="list-accord">

                                        <div class="user-accordion-item">
                                            <a href="#" class="accordion-wrap" data-bs-toggle="collapse"
                                                data-bs-target="#clinic1">Clinic<span>Delete</span></a>
                                            <div class="accordion-collapse collapse show" id="clinic1"
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
                                                                                    Below 4 MB, Accepted format
                                                                                    jpg,png,svg</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-wrap">
                                                                        <label class="col-form-label">Clinic
                                                                            Name</label>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-wrap">
                                                                        <label class="col-form-label">Location</label>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-wrap">
                                                                        <label class="col-form-label">Address</label>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                               
                                                            </div>
                                                        </div>
                                                        <div class="modal-btn text-end">
                                                            <a href="#" class="btn btn-gray">Cancel</a>
                                                            <button type="submit" class="btn btn-primary prime-btn">Save
                                                                Changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
 

                                    </div>

                                </form>

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
                                                data-bs-target="#monday">Monday <span class="edit">Edit</span></a>
                                            <div class="accordion-collapse collapse show" id="monday"
                                                data-bs-parent="#list-accord">
                                                <div class="content-collapse pb-0">
                                                    <div class="row">
                                                        <div class="col-md-1">
                                                            <label for="" class="col-form-label">Available</label>
                                                            <input type="checkbox">
                                                        </div>
                                                        <div class="col-md-5">
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
                                                        <div class="col-md-5">
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
                                                    <div class="row align-items-centers">
                                                        <div class="col-md-1">
                                                            <label for="" class="col-form-label">Available</label>
                                                            <input type="checkbox">
                                                        </div>
                                                        <div class="col-md-5">
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
                                                    <div class="row align-items-centers">
                                                    <div class="col-md-1">
                                                            <label for="" class="col-form-label">Available</label>
                                                            <input type="checkbox">
                                                        </div>
                                                        <div class="col-md-5">
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
                                                    <div class="row align-items-centers">
                                                    <div class="col-md-1">
                                                            <label for="" class="col-form-label">Available</label>
                                                            <input type="checkbox">
                                                        </div>
                                                        <div class="col-md-5">
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
                                                    <div class="row align-items-centers">
                                                    <div class="col-md-1">
                                                            <label for="" class="col-form-label">Available</label>
                                                            <input type="checkbox">
                                                        </div>
                                                        <div class="col-md-5">
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
                                                    <div class="row align-items-centers">
                                                    <div class="col-md-1">
                                                            <label for="" class="col-form-label">Available</label>
                                                            <input type="checkbox">
                                                        </div>
                                                        <div class="col-md-5">
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
                                                    <div class="row align-items-centers">
                                                    <div class="col-md-1">
                                                            <label for="" class="col-form-label">Available</label>
                                                            <input type="checkbox">
                                                        </div>
                                                        <div class="col-md-5">
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

                            <div class="tab-pane fade" id="tabsix" role="tabpanel">
                                <div class="dashboard-header border-0 mb-0">
                                    <h3>Awards</h3>
                                    <ul>
                                        <li>
                                            <a href="#" class="btn btn-primary prime-btn add-awrads">Add New Award</a>
                                        </li>
                                    </ul>
                                </div>
                                <form action="#">
                                    <div class="accordions awrad-infos" id="list-accord">

                                        <div class="user-accordion-item">
                                            <a href="#" class="accordion-wrap" data-bs-toggle="collapse"
                                                data-bs-target="#award1">Awards<span>Delete</span></a>
                                            <div class="accordion-collapse collapse show" id="award1"
                                                data-bs-parent="#list-accord">
                                                <div class="content-collapse">
                                                    <div class="add-service-info">
                                                        <div class="add-info">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-6">
                                                                    <div class="form-wrap">
                                                                        <label class="col-form-label">Award Name</label>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-wrap">
                                                                        <label class="col-form-label">Year <span
                                                                                class="text-danger">*</span></label>
                                                                        <div class="form-icon">
                                                                            <input type="text"
                                                                                class="form-control datetimepicker">
                                                                            <span class="icon"><i
                                                                                    class="fa-regular fa-calendar-days"></i></span>
                                                                        </div>
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
                                                        <div class="modal-btn text-end">
                                                            <a href="#" class="btn btn-gray">Cancel</a>
                                                            <button type="submit" class="btn btn-primary prime-btn">Save
                                                                Changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

 

                                    </div>

                                </form>
                            </div>

                         



                        </div>




                    </div>


                </div>
            </div>
        </div>
    </div>



    </div>
    @include('include.footer')