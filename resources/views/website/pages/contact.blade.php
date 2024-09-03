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

    <div class="loaderonload">
        <div class="loaderbox1"></div>
        <div class="loaderbox">
            <img src="{{ asset('assets/img/loader-rolling.gif') }}" class="search-loader">
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
                                <p>{{ site('admin_address') ?? '' }}</p>
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
                                <p> <a href="tel:{{ site('admin_phone') ?? '' }}">{{ site('admin_phone') ?? '' }}</a></p>
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
                                <p><a href="mailto:{{ site('admin_email') ?? '' }}"
                                        class="__cf_email__">{{ site('admin_email') ?? '' }}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 d-flex">
                    <div class="card contact-form-card w-100">
                        <div class="card-body">
                            <form id="contact-us">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="mb-2">Name</label>
                                            <input type="text" class="form-control" name="name"
                                                placeholder="Enter Your Name">
                                            <span class="text-danger" id="name_error"></span>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="mb-2">Email Address</label>
                                            <input type="text" class="form-control" name="email"
                                                placeholder="Enter Email Address">
                                            <span class="text-danger" id="email_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="mb-2">Phone Number</label>
                                            <input type="text" class="form-control" name="phone"
                                                placeholder="Enter Phone Number">
                                            <span class="text-danger" id="phone_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="mb-2">Services</label>
                                            <input type="text" class="form-control" placeholder="Enter Services"
                                                name="services">
                                            <span class="text-danger" id="services_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="mb-2">Message</label>
                                            <textarea class="form-control" placeholder="Enter your comments" name="comment"></textarea>
                                            <span class="text-danger" id="comment_error"></span>
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

@section('javascript')
    <script>
        $(document).ready(function() {
            $('.loaderonload').hide(); 
                    jQuery("#contact-us").validate({
                            rules: {
                                name: 'required',
                                phone: {
                                    required: true,
                                    digits: true,
                                    minlength: 10, 
                                    maxlength: 15
                                },
                                services: 'required',
                                email: {
                                    required: true,
                                    email: true
                                },
                                comment: 'required'
                            },
                            messages: {
                                name: "Please enter your name",
                                phone: {
                                    required: "Please enter your phone number",
                                    digits: "Please enter a valid phone number with digits only",
                                    minlength: "Your phone number must be at least 10 digits long",
                                    maxlength: "Your phone number must not exceed 15 digits"
                                },
                                services: "Please select a service",
                                email: {
                                    required: "Please enter your email address",
                                    email: "Please enter a valid email address"
                                },
                                comment: "Please enter your comment"
                            },
                            submitHandler: function(form) {
                                var formData = new FormData(form);
                                $.ajax({
                                    url: "<?= route('contact.us') ?>",
                                    type: 'POST',
                                    data: formData,
                                    processData: false,
                                    contentType: false,
                                    dataType: "json",
                                    beforeSend: function(){
                                        $('.loaderonload').show();
                                    },
                                    success: function(response) {
                
                                        if (response.success == true) {
                                            $('.loaderonload').hide();
                                            $('#contact-us')[0].reset();
                                            // Swal.fire("Done!", response.message, "success");
                                            window.location.href = "<?= route('thank.you') ?>";
                                        }
                                    },
                                    error: function(error_messages) {
                                        var errors = error_messages.responseJSON;
                                        $.each(errors.errors, function(key, value) {
                                            var id = key.replace(/\./g, '_');
                                            console.log('#' + id + '_error');
                                            $('#' + id + '_error').html(value);
                                        });
                                    }
                                });
                            }
                    });
                });
    </script>
@endsection
