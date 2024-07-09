<!DOCTYPE html>
<html lang="zxx">

<head>
    @include('include.head')
</head>

<body>
    <div class="main-wrapper">
        @include('include.header')

        <div class="breadcrumb-bar-two">
            <div class="container">
                <div class="row align-items-center inner-banner">
                    <div class="col-md-12 col-12 text-center">
                        <h2 class="breadcrumb-title">Appointment</h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Appointment</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="content content-space">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="Appointment-header">
                            <h4 class="Appointment-title"> Select Available Slots</h4>
                        </div>
                        <div class="row">
                            <div class="col-lg-7 col-md-12 col-sm-12 sidebar-side">
                                <div class="doctors-sidebar">
                                    <div class="form-widget">
                                        <div class="title-box">
                                            <h3> Select Date</h3>
                                        </div>
                                        <div class="form-inner">
                                            <div class=" ">
                                              
                                <div class="calendar">
                                    <div class="header">
                                      <button id="prevBtn">&lt;</button>
                                      <h5>July Date</h5> 
                                      <button id="nextBtn">&gt;</button>
                                    </div>
                                    <div class="days">
                                      <div class="day">Sun</div>
                                      <div class="day">Mon</div>
                                      <div class="day">Tue</div>
                                      <div class="day">Wed</div>
                                      <div class="day">Thu</div>
                                      <div class="day">Fri</div>
                                      <div class="day">Sat</div>
                                    </div>
                                    <div class="dates " id="dates">
                                        <div class="date" data-day="1">1</div>
                                        <div class="date" data-day="2">2</div>
                                       <div class="date" data-day="3">3</div>
                                        <div class="date" data-day="4">4</div>
                                       <div class="date" data-day="5">5</div>
                                       <div class="date" data-day="6">6</div>
                                       <div class="date" data-day="7">7</div>
                                    </div>
                                  </div>
                                            </div>

                                        </div>


                                    </div>


                                </div>

                            </div>
                            <div class="col-lg-5 sidebar-side">
                                <div class="doctors-sidebar">
                                    <div class="form-widget">
                                        <div class="title-box">
                                            <h3>Select Time</h3>
                                        </div>
                                        <div class="form-inner">
                                            <div class="appointment-time">
                                                <div>
                                                    <button id="original-button"
                                                        class="btn btn-outline-primary mb-3 w-100"
                                                        onclick="splitButton()">09:00 am - 09:30 am</button>
                                                    <div id="additional-buttons" class="hidden mb-2">
                                                        <button id="button1" onclick="showContent('myDIV')">09:00am
                                                        </button>
                                                        <button id="button2"
                                                            onclick="showContent('content2')">Next</button>
                                                    </div>

                                                </div>
                                                <div>
                                                    <button id="original-button"
                                                        class="btn btn-outline-primary mb-3 w-100"
                                                        onclick="splitButton()">10:00 am - 10:30 am</button>
                                                    <div id="additional-buttons" class="hidden mb-2">
                                                        <button id="button1" onclick="showContent('myDIV')">10:00am
                                                        </button>
                                                        <button id="button2"
                                                            onclick="showContent('content2')">Next</button>
                                                    </div>

                                                </div>
                                                <div>
                                                    <button id="original-button"
                                                        class="btn btn-outline-primary mb-3 w-100"
                                                        onclick="splitButton()">10:30 am - 11:00 am</button>
                                                    <div id="additional-buttons" class="hidden mb-2">
                                                        <button id="button1" onclick="showContent('myDIV')">11:00am
                                                        </button>
                                                        <button id="button2"
                                                            onclick="showContent('content2')">Next</button>
                                                    </div>

                                                </div>
                                                <div>
                                                    <button id="original-button"
                                                        class="btn btn-outline-primary mb-3 w-100"
                                                        onclick="splitButton()">11:00 am - 11:30 am</button>
                                                    <div id="additional-buttons" class="hidden mb-2">
                                                        <button id="button1" onclick="showContent('myDIV')">11:00am
                                                        </button>
                                                        <button id="button2"
                                                            onclick="showContent('content2')">Next</button>
                                                    </div>

                                                </div>
                                                <div>
                                                    <button id="original-button"
                                                        class="btn btn-outline-primary mb-3 w-100"
                                                        onclick="splitButton()">11:30 am - 12:00 pm</button>
                                                    <div id="additional-buttons" class="hidden mb-2">
                                                        <button id="button1" onclick="showContent('myDIV')">11:30am
                                                        </button>
                                                        <button id="button2"
                                                            onclick="showContent('content2')">Next</button>
                                                    </div>

                                                </div>
                                                <div>
                                                    <button id="original-button"
                                                        class="btn btn-outline-primary mb-3 w-100"
                                                        onclick="splitButton()">12:00 pm - 12:30 pm</button>
                                                    <div id="additional-buttons" class="hidden mb-2">
                                                        <button id="button1" onclick="showContent('myDIV')">12:00pm
                                                        </button>
                                                        <button id="button2"
                                                            onclick="showContent('content2')">Next</button>
                                                    </div>

                                                </div>
                                                <div>
                                                    <button id="original-button"
                                                        class="btn btn-outline-primary mb-3 w-100"
                                                        onclick="splitButton()">12:30 pm - 01:30 pm</button>
                                                    <div id="additional-buttons" class="hidden mb-2">
                                                        <button id="button1" onclick="showContent('myDIV')">12:30pm
                                                        </button>
                                                        <button id="button2"
                                                            onclick="showContent('content2')">Next</button>
                                                    </div>

                                                </div>




                                            </div>
                                        </div>


                                    </div>


                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="Appointment-header">
                            <h4 class="Appointment-title">Appointment Summary</h4>
                        </div>
                        <div class="card Appointment-card">
                            <div class="card-body Appointment-card-body">
                                <div class="Appointment-doctor-details">
                                    <div class="Appointment-doctor-left">
                                        <div class="Appointment-doctor-img">
                                            <a href="doctor-profile.html">
                                                <img
                                                  src="{{ asset('images/' . $doctorDetails->image_url) }}"
                                        onerror="this.src='{{ asset('assets/img/doctors/doctor-thumb-01.jpg') }}';"
                                                alt="John Doe">
                                            </a>
                                        </div>
                                        <div class="Appointment-doctor-info mt-3">
                                            <h4><a href="doctor-profile.html">Dr. {{ $doctorDetails->fullName }}</a></h4>
                                            <p>MBBS, Dentist</p>
                                        </div>
                                    </div>
                                    <div class="Appointment-doctor-right">
                                        <p>
                                            <i class="fas fa-check-circle"></i>
                                            <a href="search.html">Edit</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                       

                    </div>
                </div>
            </div>

            <div id="content2" class="hidden-content">
                <div class="container"> 
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="paitent-header">
                            <h4 class="paitent-title">Patient Details</h4>
                        </div>
                        <div class="paitent-appointment">
                            <form action="#">
                                <div class="forms-block">
                                    <label class="form-group-title">Appointment for</label>
                                    <label class="custom_radio me-4">
                                        <input type="radio" name="appointment" checked="">
                                        <span class="checkmark"></span> My Self
                                    </label>
                                    <label class="custom_radio">
                                        <input type="radio" name="appointment">
                                        <span class="checkmark"></span> Dependent
                                    </label>
                                </div>
                                <div class="forms-block">
                                    <div class="form-group-flex">
                                        <label class="form-group-title">Choose Dependent</label>

                                    </div>
                                    <div class="paitent-dependent-select">
                                        <select class="select form-control">
                                            <option>Select</option>
                                            <option>Dependent 01</option>
                                            <option>Dependent 02</option>
                                            <option>Dependent 03</option>
                                            <option>Dependent 04</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="forms-block">
                                    <label class="form-group-title">Do you have insurance?</label>
                                    <label class="custom_radio me-4">
                                        <input type="radio" name="insurance">
                                        <span class="checkmark"></span> Yes
                                    </label>
                                    <label class="custom_radio">
                                        <input type="radio" name="insurance" checked="">
                                        <span class="checkmark"></span> No
                                    </label>
                                </div>
                                <div class="forms-block">
                                    <label class="form-group-title">Reason</label>
                                    <textarea class="form-control" placeholder="Enter Your Reason"></textarea>
                                    <p class="characters-text">400 Characters</p>
                                </div>
                                <div class="forms-block position-relative">
                                    <label class="form-group-title d-flex align-items-center">
                                        <i class="fa fa-paperclip me-2"></i> Attachment
                                    </label>
                                    <div class="attachment-box">
                                        <div class="attachment-img">
                                            <div class="attachment-icon">
                                                <i class="feather-image"></i>
                                            </div>
                                            <div class="attachment-content">
                                                <p>Skin Allergy Image</p>
                                                <span>12.30 mb</span>
                                            </div>

                                        </div>
                                        <div class="attachment-close">
                                            <a href="javascript:void(0);"><i class="feather-x"></i></a>
                                        </div>
                                    </div>
                                    <input type="file" name="" class="form-control inputfile">
                                </div>
                                <div class="forms-block">
                                    <label class="form-group-title">Symtoms <span>(Optional)</span></label>
                                    <input type="text" class="form-control" placeholder="Skin Allergy">
                                </div>
                                <div class="forms-block mb-0">
                                    <div class="booking-btn">
                                        <a href="checkout.html"
                                            class="btn btn-primary prime-btn justify-content-center align-items-center">
                                            Next <i class="feather-arrow-right-circle"></i>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="booking-header">
                            <h4 class="booking-title">Booking Summary</h4>
                        </div>
                        <div class="card booking-card">
                            <div class="card-body booking-card-body">
                                <div class="booking-doctor-details">
                                    <div class="booking-doctor-left">
                                        <div class="booking-doctor-img">
                                            <a href="doctor-profile.html">
                                                <img src="assets/img/doctors/doctor-02.jpg" alt="John Doe">
                                            </a>
                                        </div>
                                        <div class="booking-doctor-info">
                                            <h4><a href="doctor-profile.html">Dr. John Doe</a></h4>
                                            <p>MBBS, Dentist</p>
                                        </div>
                                    </div>
                                    <div class="booking-doctor-right">
                                        <p>
                                            <i class="fas fa-circle-check"></i>
                                            <a href="doctor-profile.html">Edit</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card booking-card">
                            <div class="card-body booking-card-body booking-list-body">
                                <div class="booking-list">
                                    <div class="booking-date-list">
                                        <ul>
                                            <li>Booking Date: <span>Sun, 30 Aug 2024</span></li>
                                            <li>Booking Time: <span>10.00AM to 11:00AM</span></li>
                                        </ul>
                                    </div>
                                    <div class="booking-doctor-right">
                                        <p>
                                            <a href="appointment.html">Edit</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card booking-card">
                            <div class="card-body booking-card-body">
                                <div class="booking-doctor-details">
                                    <div class="booking-device">
                                        <div class="booking-device-img">
                                            <img src="assets/img/icons/device-message.svg" alt="device-message-image">
                                        </div>
                                        <div class="booking-doctor-info">
                                            <h3>We can help you</h3>
                                            <p class="device-text">Call us +1 888-888-8888 (or) chat with our customer
                                                support team.</p>
                                            <a href="#" class="btn">Chat With Us</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card booking-card mb-0">
                            <div class="card-body booking-card-body">
                                <div class="booking-doctor-details">
                                    <div class="booking-device">
                                        <div class="booking-device-img">
                                            <img src="assets/img/icons/smart-phone.svg" alt="smart-phone">
                                        </div>
                                        <div class="booking-doctor-info">
                                            <h3>Get the App</h3>
                                            <p class="device-text">Download our app for better experience and for more
                                                feature</p>
                                            <div class="app-images">
                                                <a href="javascript:void(0);">
                                                    <img src="assets/img/google-img.svg" alt="google-image">
                                                </a>
                                                <a href="javascript:void(0);">
                                                    <img src="assets/img/app-img.svg" alt="app-image">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('include.footer')





