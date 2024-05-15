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
<a href="{{ route('appointment.index') }}"><i class="fa-solid fa-arrow-left-long"></i> Back</a>
</div>
</div>
</div>
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
<input type="radio" name="appointment" checked>
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
<input type="radio" name="insurance" checked>
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
<a href="{{ route('checkout.index') }}" class="btn btn-primary prime-btn justify-content-center align-items-center">
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
<a href="{{ route('doctor_profile.index') }}">
<img src="{{URL::asset('assets/img/doctors/doctor-02.jpg')}}" alt="John Doe">
</a>
</div>
<div class="booking-doctor-info">
<h4><a href="{{ route('doctor_profile.index') }}">Dr. John Doe</a></h4>
<p>MBBS, Dentist</p>
</div>
</div>
<div class="booking-doctor-right">
<p>
<i class="fas fa-circle-check"></i>
<a href="{{ route('doctor_profile.index') }}">Edit</a>
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
<a href="{{ route('appointment.index') }}">Edit</a>
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
<p class="device-text">Call us +1 888-888-8888 (or) chat with our customer support team.</p>
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

@include('include.footer') 