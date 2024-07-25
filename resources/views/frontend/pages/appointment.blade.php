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

        <div class="container">

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

                                                    {!! $calender !!}
                                                </div>
                                            </div>

                                        </div>


                                    </div>


                                </div>
                                <div class="colorpallete mt-2">
                                    <button class="available"> Not Available </button>
                                    <button class="currentDate"> Available </button>
                                    <button class="closed"> About To Finish </button>
                                </div>
                                <div>

                                </div>
                            </div>
                            <div class="col-lg-5 sidebar-side">
                                <div class="doctors-sidebar">
                                    <div class="form-widget">
                                        <div class="title-box">
                                            <h3>Select Time</h3>
                                        </div>

                                        <div class="form-inner">
                                            <div id="dayName"></div>
                                            <div class="appointment-time slotbox">
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
                                                <img src="{{ asset('images/' . $doctorDetails->image_url) }}"
                                                    onerror="this.src='{{ asset('assets/img/doctors/doctor-thumb-01.jpg') }}';"
                                                    alt="John Doe">
                                            </a>
                                        </div>
                                        <div class="Appointment-doctor-info mt-3">
                                            <h4><a href="doctor-profile.html">Dr. {{ $doctorDetails->fullName }}</a>
                                            </h4>
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
                                <form action="#" id="booking">
                                    @csrf
                                    <div class="forms-block">
                                        <label class="form-group-title">Appointment for</label>
                                        <label class="custom_radio me-4">
                                            <input type="radio" name="appointment" checked="">
                                            
                                            <input type="hidden" name="patient_id" value="{{ auth()->user()->id ?? ''}}">
                                            {{-- <input type="hidden" name="booking_date" id="booking_date" value="">
                                            <input type="hidden" name="booking_slot_time" id="booking_slot_time"
                                                value=""> --}}
                                            <input type="hidden" name="doctor_id" id="doctor_id" value="" >

                                            <span class="checkmark"></span> My Self
                                        </label>

                                    </div>
                                    <div class="forms-block">
                                        <input type="text" name="booking_date" id="booking_date" class="form-control" 
                                        value="" readonly>
                                    </div>
                                    <div class="forms-block">
                                        <input type="text" name="booking_slot_time" id="booking_slot_time" class="form-control" 
                                        value="" readonly >
                                    </div>
                                    <div class="forms-block">
                                        <label class="form-group-title">Do you have insurance?</label>
                                        <label class="custom_radio me-4">
                                            <input type="radio" name="insurance" value="1">
                                            <span class="checkmark"></span> Yes
                                        </label>
                                        <label class="custom_radio">
                                            <input type="radio" name="insurance" checked="" value="0">
                                            <span class="checkmark"></span> No
                                        </label>
                                    </div>
                                    <div class="forms-block">
                                        <label class="form-group-title">Description</label>
                                        <textarea class="form-control" placeholder="Enter Your Reason" name="description"></textarea>
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
                                        <input type="file" name="" class="form-control inputfile"
                                            name="image">
                                    </div>
                                    <div class="forms-block">
                                        <label class="form-group-title">Symptoms <span>(Optional)</span></label>
                                        <input type="text" class="form-control" placeholder="Skin Allergy">
                                    </div>
                                    <div class="forms-block mb-0">
                                        <div class="booking-btn">
                                            <button
                                                class="btn btn-primary prime-btn justify-content-center align-items-center">
                                                Next<i class="feather-arrow-right-circle"></i>
                                            </button>
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
                                                    <img src="{{ asset('images/' . $doctorDetails->image_url) }}"
                                                        onerror="this.src='{{ asset('assets/img/doctors/doctor-thumb-01.jpg') }}';"
                                                        alt="John Doe">
                                                </a>
                                            </div>
                                            <div class="booking-doctor-info">
                                                <h4><a href="doctor-profile.html">{{ $doctorDetails->fullName }}</a>
                                                </h4>
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
                                                <li>Booking Date: <span class="booking_date"></span></li>
                                                <li>Booking Time: <span class="booking_slot_time"></span></li>
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
                                               
                                                <img src="{{URL::asset('assets/img/icons/device-message.svg')}}"
                                                    alt="device-message-image">
                                            </div>
                                            <div class="booking-doctor-info">
                                                <h3>We can help you</h3>
                                                <p class="device-text">Call us +1 888-888-8888 (or) chat with our
                                                    customer
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
                                                <img src="{{URL::asset('assets/img/icons/smart-phone.svg')}}" alt="smart-phone">
                                            </div>
                                            <div class="booking-doctor-info">
                                                <h3>Get the App</h3>
                                                <p class="device-text">Download our app for better experience and for more feature</p>
                                                <div class="app-images">
                                                <a href="javascript:void(0);">
                                                <img src="{{URL::asset('assets/img/google-img.svg')}}" alt="google-image">
                                                </a>
                                                <a href="javascript:void(0);">
                                                <img src="{{URL::asset('assets/img/app-img.svg')}}" alt="app-image">
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
        </div>
        @include('include.footer')
        <script src="{{ asset('/assets/js/jquery-3.7.1.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            $(document).ready(function() {

                checkSlotsByDate('',"<?= $doctorDetails->id ?>");

                jQuery("#booking").validate({
                    rules: {

                        // TODO apply it later
                    },
                    messages: {

                        email: "Please enter a valid email address",
                        password: {
                            required: "Please enter your password",
                            minlength: "Password must be at least 8 characters long",
                            maxlength: "Password must be no more than 20 characters long"
                        },
                    },
                    submitHandler: function(form) {
                 var formData = new FormData(form);
                        $.ajax({
                            url: "<?= route('patient.booking') ?>",
                            type: 'post',
                            data: formData,
                            dataType: 'json',
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                swal.fire("Done!", response.message, "success");
                                window.location.href = "http://127.0.0.1:8000/doctor/success";
                                // if (response.success == true) {

                                // }
                            },
                            error: function(error_messages) {

                                Swal.fire("Error!", "Something Went Wrong", "error");
                                var errors = error_messages.responseJSON;
                                $.each(errors.errors, function(key, value) {
                                    $('#' + key + '_error').html(value);
                                })

                            }
                        });
                    }
                });
            });


            function ajax_update_calendar(month, year, doctor_id) {
                var url = "{{ route('update.calendar') }}";

                jQuery.ajax({
                    type: "post",
                    url: url,
                    data: {
                        '_token': '{{ csrf_token() }}',
                        month: month,
                        year: year,
                        doctor_id: doctor_id, 
                    },
                    dataType: "html", 
                    cache: false,
                    success: function(response) {
                        if(response.success == true){
                        jQuery(".calenderwrap").remove();
                        $('.calendar').replaceWith(response);
                        jQuery(".slot-bookings").html("");
                        }
                    },
                    error: function(error_data) {
                        console.log(error_data);
                    },
                });

            }

            function checkSlotsByDate(date, doctorId) {
                var url = "{{ route('getDoctorSlots.byId') }}";
                jQuery.ajax({
                    type: "post",
                    url: url,
                    data: {
                        '_token': '{{ csrf_token() }}',
                        date: date,
                        doctor_id: doctorId,
                    },
                    dataType: "json",
                    cache: false,
                    success: function(response) {
                        $('.appointment-time').html(response.html).hide().delay(200).fadeIn();
                    },
                    error: function(error_data) {
                        console.log(error_data);
                    },

                });
            }
        </script>

