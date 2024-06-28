<!DOCTYPE html>
<html lang="zxx">

<head>
@include('include.head')
</head>

<body>
    <div class="main-wrapper">
    @include('include.header')

        <div class="doctor-content">
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <div class="back-link">
                            <a href="{{ route('patient_details.index') }}"><i class="fa-solid fa-arrow-left-long"></i> Back</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="paitent-header">
                            <h4 class="paitent-title">Type of Consultation</h4>
                        </div>
                        <div class="consultation-grid">
                            <div class="consultation-info">
                                <p>Online Consultation</p>
                                <div class="consultation-list">
                                    <ul>
                                        <li>
                                            <div class="consultation-types active">
                                                <a href="javascript:void(0);">
                                                    <i class="feather-video"></i> Video Consulting
                                                </a>
                                                <span><i class="fas fa-circle-check"></i></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="consultation-types">
                                                <a href="javascript:void(0);">
                                                    <i class="feather-mic"></i> Audio Consulting
                                                </a>
                                                <span><i class="fas fa-circle-check"></i></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="consultation-types">
                                                <a href="javascript:void(0);">
                                                    <i class="feather-message-square"></i> Chat Consulting
                                                </a>
                                                <span><i class="fas fa-circle-check"></i></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <div class="booking-btn">
                            <a href="{{ route('checkout.index') }}"
                                class="btn btn-primary prime-btn justify-content-center align-items-center">
                                Next <i class="feather-arrow-right-circle"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="booking-header">
                            <h4 class="booking-title">Booking Summary</h4>
                        </div>
                        <div class="card booking-card">
                            <div class="card-body booking-card-body">
                                <div class="booking-doctor-details">
                                    <div class="booking-doctor-left">
                                        <div class="booking-doctor-img">
                                            <a href="#">
                                                <img src="{{URL::asset('assets/img/doctors/doctor-02.jpg')}}" alt="John Doe">
                                            </a>
                                        </div>
                                        <div class="booking-doctor-info">
                                            <h4><a href="#">Dr. John Doe</a></h4>
                                            <p>MBBS, Dentist</p>
                                        </div>
                                    </div>
                                    <div class="booking-doctor-right">
                                        <p>
                                            <i class="fas fa-circle-check"></i>
                                            <a href="#">Edit</a>
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
                                            <a href="#">Edit</a>
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
                                            <img src="{{URL::asset('assets/img/icons/device-message.svg')}}" alt="device-message-image">
                                        </div>
                                        <div class="booking-doctor-info">
                                            <h3>We can help you</h3>
                                            <p class="device-text">Call us +91-8700914459 (or) chat with our customer
                                                support team.</p>
                                            <a href="tel:+91-8700914459" class="btn">Chat With Us</a>
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
        