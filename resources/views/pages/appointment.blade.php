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
<h4 class="Appointment-title">Select Available Slots</h4>
</div>
<div class="Appointment-date choose-date-book">
<p>Choose Date</p>
<div class="Appointment-range">
<div class="Appointmentrange btn">
<img src="{{URL::asset('assets/img/icons/today-icon.svg')}}" alt="calendar-mage">
<span></span>
<i class="fas fa-chevron-down"></i>
</div>
</div>
</div>
<div class="card Appointment-card">
<div class="card-body time-slot-card-body">
<div class="Appointment-date-slider">
<ul class="date-slider slick">
<li class="active">
<h4>Monday</h4>
<p>Sep 5</p>
</li>
<li>
<h4>Tuesday</h4>
<p>Sep 6</p>
</li>
<li>
<h4>Wednesday</h4>
<p>Sep 7</p>
</li>
<li>
<h4>Thursday</h4>
<p>Sep 8</p>
</li>
<li>
<h4>Friday</h4>
<p>Sep 9</p>
</li>
<li>
<h4>Saturday</h4>
<p>Sep 10</p>
</li>
<li>
<h4>Sunday</h4>
<p>Sep 11</p>
</li>
<li>
<h4>Monday</h4>
<p>Sep 12</p>
</li>
</ul>
</div>
<div class="row">
<div class="col-lg-4 col-md-4">
<div class="time-slot time-slot-blk">
<h4>Morning</h4>
<div class="time-slot-list">
<ul>
<li>
<a class="timing" href="javascript:void(0);">
<span><i class="feather-clock"></i> 09:00 - 09:30</span>
</a>
</li>
<li>
<a class="timing" href="javascript:void(0);">
<span><i class="feather-clock"></i> 10:00 - 10:30</span>
</a>
</li>
<li class="time-slot-open time-slot-morning">
<a class="timing" href="javascript:void(0);">
<span><i class="feather-clock"></i> 11:00 - 11:30</span>
</a>
</li>
<li>
<div class="load-more-timings load-more-morning">
<a href="javascript:void(0);">Load More</a>
</div>
</li>
</ul>
</div>
</div>
</div>
<div class="col-lg-4 col-md-4">
<div class="time-slot time-slot-blk">
<h4>Afternoon</h4>
<div class="time-slot-list">
<ul>
<li>
<a class="timing" href="javascript:void(0);">
<span><i class="feather-clock"></i> 12:00 - 12:30</span>
</a>
</li>
<li>
<a class="timing active" href="javascript:void(0);">
<span><i class="feather-clock"></i> 01:00 - 01:30</span>
</a>
</li>
<li class="time-slot-open time-slot-afternoon">
<a class="timing" href="javascript:void(0);">
<span><i class="feather-clock"></i> 02:30 - 03:00</span>
</a>
</li>
<li>
<div class="load-more-timings load-more-afternoon">
<a href="javascript:void(0);">Load More</a>
</div>
</li>
</ul>
</div>
</div>
</div>
<div class="col-lg-4 col-md-4">
<div class="time-slot time-slot-blk">
<h4>Evening</h4>
<div class="time-slot-list">
<ul>
<li>
<a class="timing" href="javascript:void(0);">
<span><i class="feather-clock"></i> 03:00 - 03:30</span>
</a>
</li>
<li>
<a class="timing" href="javascript:void(0);">
<span><i class="feather-clock"></i> 04:00 - 04:30</span>
</a>
</li>
<li class="time-slot-open time-slot-evening">
<a class="timing" href="javascript:void(0);">
<span><i class="feather-clock"></i> 05:00 - 05:30</span>
</a>
</li>
<li>
<div class="load-more-timings load-more-evening">
<a href="javascript:void(0);">Load More</a>
</div>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="Appointment-btn">
<a href="{{ route('patient_details.index') }}" class="btn btn-primary prime-btn justify-content-center align-items-center">
Next <i class="feather-arrow-right-circle"></i>
</a>
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
<a href="{{ route('doctor_profile.index') }}">
<img src="{{URL::asset('assets/img/doctors/doctor-01.jpg')}}" alt="John Doe">
</a>
</div>
<div class="Appointment-doctor-info mt-3">
<h4><a href="{{ route('doctor_profile.index') }}">Dr. John Doe</a></h4>
<p>MBBS, Dentist</p>
</div>
</div>
<div class="Appointment-doctor-right">
<p>
<i class="fas fa-check-circle"></i>
<a href="{{ route('doctors.index') }}">Edit</a>
</p>
</div>
</div>
</div>
</div>
<div class="card Appointment-card">
<div class="card-body Appointment-card-body">
<div class="Appointment-doctor-details">
<div class="Appointment-device">
<div class="Appointment-device-img">
<img src="{{URL::asset('assets/img/icons/device-message.svg')}}" alt="device-message">
</div>
<div class="Appointment-doctor-info">
<h3>We can help you</h3>
<p class="device-text">Call us +91-8700914459 (or) chat with our customer support team.</p>
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