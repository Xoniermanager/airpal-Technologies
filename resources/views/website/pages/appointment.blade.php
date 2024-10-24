@extends('layouts.frontend.main')
@section('content')
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
                                                <img src="{{ $doctorDetails['image_url'] }}"
                                                    onerror="this.src='{{ asset('assets/img/doctors/doctor-thumb-01.jpg') }}';"
                                                    alt="John Doe">
                                            </a>
                                        </div>
                                        <div class="Appointment-doctor-info mt-3">
                                            <h4><a href="doctor-profile.html">Dr. {{ $doctorDetails->fullName }}</a>
                                            </h4>
                                            @isset($doctorDetails)
                                                @forelse ($doctorDetails->educations as $education)
                                                    {{ $education->course->name }}
                                                    @if (!$loop->last)
                                                        ,
                                                    @endif
                                                @empty
                                                    <p>N/A</p>
                                                @endforelse
                                            @endisset
                                            {{-- <p>MBBS, Dentist</p> --}}
                                        </div>
                                    </div>
                                    <div class="Appointment-doctor-right">
                                        {{-- <p>
                                            <i class="fas fa-check-circle"></i>
                                            <a href="search.html">Edit</a>
                                        </p> --}}
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
                                <form action="#" id="booking" enctype="multipart/form-data">
                                    @csrf
                                    <div class="forms-block">
                                        <label class="form-group-title">Appointment for</label>
                                        <label class="custom_radio me-4">
                                            <input type="radio" name="appointment" checked="">

                                            <input type="hidden" name="patient_id"
                                                value="{{ auth()->user()->id ?? '' }}">
                                            <input type="hidden" name="doctor_id" id="doctor_id" value="">

                                            <span class="checkmark"></span> My Self
                                        </label>

                                    </div>
                                    <div class="forms-block">
                                        <input type="text" name="booking_date" id="booking_date" class="form-control"
                                            value="" readonly>
                                        <span class="text-danger" id="booking_date_error"></span>
                                    </div>
                                    <div class="forms-block">
                                        <input type="text" name="booking_slot_time" id="booking_slot_time"
                                            class="form-control" value="" readonly>
                                        <span class="text-danger" id="booking_slot_time_error"></span>
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
                                        <span class="text-danger" id="description_error"></span>
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
                                        <input type="file" class="form-control inputfile" name="image">
                                        <span class="text-danger" id="image_error"></span>
                                    </div>
                                    <div class="forms-block">
                                        <label class="form-group-title">Symptoms <span>(Optional)</span></label>
                                        <input type="text" class="form-control" placeholder="Skin Allergy"
                                            name="symptoms">
                                        <span class="text-danger" id="symptoms_error"></span>
                                    </div>
                                    <div class="forms-block mb-0">
                                        <div class="booking-btn">
                                            <button
                                                class="btn btn-primary prime-btn justify-content-center align-items-center">
                                                Next<i class="feather-arrow-right-circle"></i>
                                            </button>
                                        </div>
                                        <span id ="appointment_error" class="text-danger"></span>
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
                                                    <img src="{{ $doctorDetails['image_url'] }}"
                                                        onerror="this.src='{{ asset('assets/img/doctors/doctor-thumb-01.jpg') }}';"
                                                        alt="John Doe">
                                                </a>
                                            </div>
                                            <div class="booking-doctor-info">
                                                <h4><a href="doctor-profile.html">{{ $doctorDetails->fullName }}</a>
                                                </h4>
                                                @isset($doctorDetails)
                                                    @forelse ($doctorDetails->educations as $education)
                                                        {{ $education->course->name }}
                                                        @if (!$loop->last)
                                                            ,
                                                        @endif
                                                    @empty
                                                        <p>N/A</p>
                                                    @endforelse
                                                @endisset
                                            </div>
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
                                    </div>
                                </div>
                            </div>
                            <div class="card booking-card">
                                <div class="card-body booking-card-body">
                                    <div class="booking-doctor-details">
                                        <div class="booking-device">
                                            <div class="booking-device-img">

                                                <img src="{{ URL::asset('assets/img/icons/device-message.svg') }}"
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
                                                <img src="{{ URL::asset('assets/img/icons/smart-phone.svg') }}"
                                                    alt="smart-phone">
                                            </div>
                                            <div class="booking-doctor-info">
                                                <h3>Get the App</h3>
                                                <p class="device-text">Download our app for better experience and for
                                                    more feature</p>
                                                <div class="app-images">
                                                    <a href="javascript:void(0);">
                                                        <img src="{{ URL::asset('assets/img/google-img.svg') }}"
                                                            alt="google-image">
                                                    </a>
                                                    <a href="javascript:void(0);">
                                                        <img src="{{ URL::asset('assets/img/app-img.svg') }}"
                                                            alt="app-image">
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
   @endsection

   @section('javascript')

        <script>
            $(document).ready(function() {
                jQuery("#booking").validate({
                    rules: {
                        description: {
                            required: true,
                            maxlength: 200
                        }
                    },
                    messages: {
                        description: {
                            required: "This field is required",
                            maxlength: "Please enter no more than 200 characters"
                        }
                    },
                    submitHandler: function(form) {
                        var formData = new FormData(form);
                        var successUrl = "{{ route('success.index') }}";
                        $.ajax({
                            url: "<?= route('patient.booking') ?>",
                            type: 'post',
                            data: formData,
                            dataType: 'json',
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                if (response.status == 200) {
                                    swal.fire("Done!", response.message, "success");
                                    console.log(site_base_url);
                                    window.location.href = successUrl;
                                }
                            },
                            error: function(error_messages) {
                                var errors = error_messages.responseJSON;
                                $.each(errors.errors, function(key, value) {
                                    console.log('#' + key + '_error',value);
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
                        jQuery(".calenderwrap").remove();
                        $('.calendar').html(response);
                        jQuery(".slot-bookings").html("");
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
                    // dataType: "json",
                    cache: false,
                    success: function(response) {
                        console.log('show', response);
                        jQuery('.appointment-time').html(response.html);
                        $('.appointment-time').html(response.html).hide().delay(200).fadeIn();
                    },
                    error: function(error_data) {
                        console.log(error_data);
                    },

                });
            }

            function splitButton(button) {
                var $button = $(button);
                var $allSlots = $('.slot-group');

                // Toggle visibility for the clicked slot's additional buttons
                var $additionalButtons = $button.siblings('.additional-buttons');
                if ($additionalButtons.hasClass("hidden")) {
                    // Show additional buttons of the clicked slot and hide others
                    $allSlots.find('.additional-buttons').addClass("hidden");
                    $additionalButtons.removeClass("hidden");
                } else {
                    // Hide additional buttons of the clicked slot
                    $additionalButtons.addClass("hidden");
                }
            }

            function showContent(contentId, slot, date, doctorId) {
                var url = "{{ route('check.auth') }}";
                // Send AJAX request to check if the user is authenticated
                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function(response) {
                        if (response.authenticated) {
                            // If authenticated, proceed with booking process
                            $('#booking_date').val(date);
                            $('.booking_date').text(date);
                            $('#booking_slot_time').val(slot);
                            $('.booking_slot_time').text(slot);
                            $('#doctor_id').val(doctorId);

                            var content = document.getElementById(contentId);
                            content.classList.remove("hidden-content");
                        } else {
                            // If not authenticated, redirect to login or show a message
                            Swal.fire("To Continue!", "your booking, please sign in first.", "error");

                        }
                    },
                    error: function() {
                        alert('An error occurred while checking authentication.');
                    }
                });
            }
        </script>

@endsection