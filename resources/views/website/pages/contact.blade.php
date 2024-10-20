@extends('layouts.frontend.main')
@section('content')
        <div class="breadcrumb-bar-two">
            <div class="container">
                <div class="row align-items-center inner-banner">
                    <div class="col-md-12 col-12 text-center">
                        <h2 class="breadcrumb-title">Contact Us</h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Contact Us</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>


        <section class="contact-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-12">
                        <div class="section-inner-header contact-inner-header">
                            <h6>Get in touch</h6>
                            <h2>Have Any Question?</h2>
                        </div>
                        <div class="card contact-card">
                            <div class="card-body">
                                <div class="contact-icon">
                                    <i class="feather-map-pin"></i>
                                </div>
                                <div class="contact-details">
                                    <h4>Address</h4>
                                    <p>Complete Address</p>
                                </div>
                            </div>
                        </div>
                        <div class="card contact-card">
                            <div class="card-body">
                                <div class="contact-icon">
                                    <i class="feather-phone"></i>
                                </div>
                                <div class="contact-details">
                                    <h4>Phone Number</h4>
                                    <p>+1 1234567890</p>
                                </div>
                            </div>
                        </div>
                        <div class="card contact-card">
                            <div class="card-body">
                                <div class="contact-icon">
                                    <i class="feather-mail"></i>
                                </div>
                                <div class="contact-details">
                                    <h4>Email Address</h4>
                                    <p><a href="mailto:david@airpal.com" class="__cf_email__">david@airpal.com</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12 d-flex">
                        <div class="card contact-form-card w-100">
                            <div class="card-body">
                                <form action="#">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="mb-2">Name</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Enter Your Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="mb-2">Email Address</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Enter Email Address">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="mb-2">Phone Number</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Enter Phone Number">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="mb-2">Services</label>
                                                <input type="text" class="form-control" placeholder="Enter Services">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="mb-2">Message</label>
                                                <textarea class="form-control" placeholder="Enter your comments"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group-btn mb-0">
                                                <button type="submit" class="btn btn-primary prime-btn">Send
                                                    Message</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @endsection
