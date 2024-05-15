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
                        <h2 class="breadcrumb-title">About Us</h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb"> 
                                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">About Us</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>


        <section class="about-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="about-img-info">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="about-inner-img">
                                        <div class="about-img">
                                             <img src="{{URL::asset('assets/img/about-img1.jpg')}}" class="img-fluid" alt="about-image">
                                        </div>
                                        <div class="about-img">
                                             <img src="{{URL::asset('assets/img/about-img2.jpg')}}" class="img-fluid" alt="about-image">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="about-inner-img">
                                        <div class="about-box">
                                            <h4>Over Years of Experience</h4>
                                        </div>
                                        <div class="about-img">
                                             <img src="{{URL::asset('assets/img/about-img3.jpg')}}" class="img-fluid" alt="about-image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="section-inner-header about-inner-header">
                            <h6>About Our Company</h6>
                            <h2>Patient Appointment and Management App</h2>
                        </div>
                        <div class="about-content">
                            <div class="about-content-details">
                                <p>Empowering individuals 
                                    through innovative wearable 
                                    tech, providing real-time health 
                                    monitoring for improved 
                                    wellness and efficient care.</p>
                                    <p>We envision a future where everyone 
                                        has access to advanced healthcare 
                                        solutions that use AI and biosensing 
                                        wearables  to proactively monitor health, 
                                        predict potential issues, and provide 
                                        personalised  recommendations  for 
                                        optimal wellness  and longevity.</p>
                            </div>
                            <div class="about-contact">
                                <div class="about-contact-icon">
                                    <span> <img src="{{URL::asset('assets/img/icons/phone-icon.svg')}}" alt="phone-image"></span>
                                </div>
                                <div class="about-contact-text">
                                    <p>Need Emergency?</p>
                                    <h4>+1 1234567890</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="work-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-head-fourteen text-center">
                            <h2>Key <span>Features</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-lg-4">
                        <div class="listing-card">
                            <div class="listing-img">
                                 <img src="{{URL::asset('assets/img/service/f1.png')}}"
                                    class="img-fluid" alt="surgery-image">

                            </div>
                            <div class="listing-content">
                                <div class="listing-details">
                                    <div class="listing-title">
                                        <h3>
                                            Appointment Management
                                        </h3>
                                    </div>
                                    <div class="listing-profile-details">

                                        <p>
                                            Patients can schedule appointments with doctors and nurses conveniently
                                            through our platform, streamlining the healthcare access process.

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-lg-4">
                        <div class="listing-card">
                            <div class="listing-img">
                                 <img src="{{URL::asset('assets/img/service/f2.png')}}"
                                    class="img-fluid" alt="surgery-image">

                            </div>
                            <div class="listing-content">
                                <div class="listing-details">
                                    <div class="listing-title">
                                        <h3>
                                            Multiple Provider Support 
                                        </h3>
                                    </div>
                                    <div class="listing-profile-details">
                                        <p> Our platform facilitates communication and collaboration among multiple healthcare providers involved in a patient's care, ensuring holistic and coordinated treatment.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-lg-4">
                        <div class="listing-card">
                            <div class="listing-img">
                                 <img src="{{URL::asset('assets/img/service/f3.png')}}"
                                    class="img-fluid" alt="surgery-image">

                            </div>
                            <div class="listing-content">
                                <div class="listing-details">
                                    <div class="listing-title">
                                        <h3>
                                            Reminders and Notifications  
                                        </h3>
                                    </div>
                                    <div class="listing-profile-details">
                                        <p>Patients receive timely reminders and notifications for upcoming appointments and medication schedules, enhancing treatment adherence and patient engagement.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-lg-4">
                        <div class="listing-card">
                            <div class="listing-img">
                                 <img src="{{URL::asset('assets/img/service/f4.png')}}"
                                    class="img-fluid" alt="surgery-image">

                            </div>
                            <div class="listing-content">
                                <div class="listing-details">
                                    <div class="listing-title">
                                        <h3>
                                            Patient Diary  
                                        </h3>
                                    </div>
                                    <div class="listing-profile-details">
                                        <p>  Our platform includes a patient diary feature, allowing users to track symptoms, record vital information, and monitor their health progress over time.
                                           </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-lg-4">
                        <div class="listing-card">
                            <div class="listing-img">
                                 <img src="{{URL::asset('assets/img/service/f5.png')}}"
                                    class="img-fluid" alt="surgery-image">

                            </div>
                            <div class="listing-content">
                                <div class="listing-details">
                                    <div class="listing-title">
                                        <h3>
                                            Airpal Portal   
                                        </h3>
                                    </div>
                                    <div class="listing-profile-details">
                                        <p>We offer a Airpal portal for remote consultations, enabling patients to connect with healthcare providers virtually from the comfort of their homes.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-lg-4">
                        <div class="listing-card">
                            <div class="listing-img">
                                 <img src="{{URL::asset('assets/img/service/f6.png')}}"
                                    class="img-fluid" alt="surgery-image">

                            </div>
                            <div class="listing-content">
                                <div class="listing-details">
                                    <div class="listing-title">
                                        <h3> Bio-Sensor Integration 
                                        </h3>
                                    </div>
                                    <div class="listing-profile-details">
                                        <p>We provide seamless integration with wearable bio-sensors, allowing patients to monitor their health metrics and transmit real-time data to healthcare providers for better-informed decision-making.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     

                </div>
            </div>
        </section>
        

        <section class="way-section pt-5">
            <div class="container">
                <div class="way-bg">
                    <div class="way-shapes-img">
                        <div class="way-shapes-left">
                             <img src="{{URL::asset('assets/img/shape-06.png')}}" alt="shape-image">
                        </div>
                        <div class="way-shapes-right">
                             <img src="{{URL::asset('assets/img/shape-07.png')}}" alt="shape-image">
                        </div>
                    </div>
                    <div class="row align-items-end">
                        <div class="col-lg-7 col-md-12">
                            <div class="section-inner-header way-inner-header mb-0">
                                <h2>Be on Your Way to Feeling Better with the Telememdicien App</h2>
                                
                                <a href="{{ route('contact.index') }}" class="btn btn-primary">Contact With Us</a>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12">
                            <div class="way-img">
                                 <img src="{{URL::asset('assets/img/way-img.png')}}" class="img-fluid" alt="doctor-way-image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="doctors-section professional-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-inner-header text-center">
                            <h2>Best Doctors</h2>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-3 col-md-6 d-flex">
                        <div class="doctor-profile-widget w-100">
                            <div class="doc-pro-img">
                                <a href="{{ route('doctor_profile.index') }}">
                                    <div class="doctor-profile-img">
                                         <img src="{{URL::asset('assets/img/doctors/doctor-03.jpg')}}" class="img-fluid" alt="Ruby Perrin">
                                    </div>
                                </a>

                            </div>
                            <div class="doc-content">
                                <div class="doc-pro-info">
                                    <div class="doc-pro-name">
                                        <a href="{{ route('doctor_profile.index') }}">Dr. Ruby Perrin</a>
                                        <p>Cardiology</p>
                                    </div>
                                    <div class="reviews-ratings">
                                        <p>
                                            <span><i class="fas fa-star"></i> 4.5</span> (35)
                                        </p>
                                    </div>
                                </div>
                                <div class="doc-pro-location">
                                    <p><i class="feather-map-pin"></i> Newyork, USA</p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3 col-md-6 d-flex">
                        <div class="doctor-profile-widget w-100">
                            <div class="doc-pro-img">
                                <a href="{{ route('doctor_profile.index') }}">
                                    <div class="doctor-profile-img">
                                         <img src="{{URL::asset('assets/img/doctors/doctor-04.jpg')}}" class="img-fluid"
                                            alt="Darren Elder">
                                    </div>
                                </a>
                            </div>
                            <div class="doc-content">
                                <div class="doc-pro-info">
                                    <div class="doc-pro-name">
                                        <a href="{{ route('doctor_profile.index') }}">Dr. Darren Elder</a>
                                        <p>Neurology</p>
                                    </div>
                                    <div class="reviews-ratings">
                                        <p>
                                            <span><i class="fas fa-star"></i> 4.0</span> (20)
                                        </p>
                                    </div>
                                </div>
                                <div class="doc-pro-location">
                                    <p><i class="feather-map-pin"></i> Florida, USA</p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3 col-md-6 d-flex">
                        <div class="doctor-profile-widget w-100">
                            <div class="doc-pro-img">
                                <a href="{{ route('doctor_profile.index') }}">
                                    <div class="doctor-profile-img">
                                         <img src="{{URL::asset('assets/img/doctors/doctor-05.jpg')}}" class="img-fluid"
                                            alt="Sofia Brient">
                                    </div>
                                </a>
                            </div>
                            <div class="doc-content">
                                <div class="doc-pro-info">
                                    <div class="doc-pro-name">
                                        <a href="{{ route('doctor_profile.index') }}">Dr. Sofia Brient</a>
                                        <p>Urology</p>
                                    </div>
                                    <div class="reviews-ratings">
                                        <p>
                                            <span><i class="fas fa-star"></i> 4.5</span> (30)
                                        </p>
                                    </div>
                                </div>
                                <div class="doc-pro-location">
                                    <p><i class="feather-map-pin"></i> Georgia, USA</p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3 col-md-6 d-flex">
                        <div class="doctor-profile-widget w-100">
                            <div class="doc-pro-img">
                                <a href="{{ route('doctor_profile.index') }}">
                                    <div class="doctor-profile-img">
                                         <img src="{{URL::asset('assets/img/doctors/doctor-02.jpg')}}" class="img-fluid"
                                            alt="Paul Richard">
                                    </div>
                                </a>
                            </div>
                            <div class="doc-content">
                                <div class="doc-pro-info">
                                    <div class="doc-pro-name">
                                        <a href="{{ route('doctor_profile.index') }}">Dr. Paul Richard</a>
                                        <p>Orthopedic</p>
                                    </div>
                                    <div class="reviews-ratings">
                                        <p>
                                            <span><i class="fas fa-star"></i> 4.3</span> (45)
                                        </p>
                                    </div>
                                </div>
                                <div class="doc-pro-location">
                                    <p><i class="feather-map-pin"></i> Michigan, USA</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <section class="testimonial-section">
            <div class="testimonial-shape-img">
                <div class="testimonial-shape-left">
                     <img src="{{URL::asset('assets/img/shape-04.png')}}" alt="shape-image">
                </div>
                <div class="testimonial-shape-right">
                     <img src="{{URL::asset('assets/img/shape-05.png')}}" alt="shape-image">
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="testimonial-slider slick">
                            <div class="testimonial-grid">
                                <div class="testimonial-info">
                                    <div class="testimonial-img">
                                         <img src="{{URL::asset('assets/img/clients/client-01.jpg')}}" class="img-fluid"
                                            alt="client-image">
                                    </div>
                                    <div class="testimonial-content">
                                        <div class="section-inner-header testimonial-header">
                                            <h6>Testimonials</h6>
                                            <h2>What Our Client Says</h2>
                                        </div>
                                        <div class="testimonial-details">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                                commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                                velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                            <h6><span>John Doe</span> New York</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-grid">
                                <div class="testimonial-info">
                                    <div class="testimonial-img">
                                         <img src="{{URL::asset('assets/img/clients/client-02.jpg')}}" class="img-fluid"
                                            alt="client-image">
                                    </div>
                                    <div class="testimonial-content">
                                        <div class="section-inner-header testimonial-header">
                                            <h6>Testimonials</h6>
                                            <h2>What Our Client Says</h2>
                                        </div>
                                        <div class="testimonial-details">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                                commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                                velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                            <h6><span>Amanda Warren</span> Florida</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-grid">
                                <div class="testimonial-info">
                                    <div class="testimonial-img">
                                         <img src="{{URL::asset('assets/img/clients/client-03.jpg')}}" class="img-fluid"
                                            alt="client-image">
                                    </div>
                                    <div class="testimonial-content">
                                        <div class="section-inner-header testimonial-header">
                                            <h6>Testimonials</h6>
                                            <h2>What Our Client Says</h2>
                                        </div>
                                        <div class="testimonial-details">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                                commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                                velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                            <h6><span>Betty Carlson</span> Georgia</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-grid">
                                <div class="testimonial-info">
                                    <div class="testimonial-img">
                                         <img src="{{URL::asset('assets/img/clients/client-04.jpg')}}" class="img-fluid"
                                            alt="client-image">
                                    </div>
                                    <div class="testimonial-content">
                                        <div class="section-inner-header testimonial-header">
                                            <h6>Testimonials</h6>
                                            <h2>What Our Client Says</h2>
                                        </div>
                                        <div class="testimonial-details">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                                commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                                velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                            <h6><span>Veronica</span> California</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-grid">
                                <div class="testimonial-info">
                                    <div class="testimonial-img">
                                         <img src="{{URL::asset('assets/img/clients/client-05.jpg')}}" class="img-fluid"
                                            alt="client-image">
                                    </div>
                                    <div class="testimonial-content">
                                        <div class="section-inner-header testimonial-header">
                                            <h6>Testimonials</h6>
                                            <h2>What Our Client Says</h2>
                                        </div>
                                        <div class="testimonial-details">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                                commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                                velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                            <h6><span>Richard</span> Michigan</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="faq-section faq-section-inner">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-inner-header text-center">
                            <h6>Get Your Answer</h6>
                            <h2>Frequently Asked Questions</h2>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="faq-img">
                             <img src="{{URL::asset('assets/img/faq-img.png')}}" class="img-fluid" alt="img">
                            <div class="faq-patients-count">
                                <div class="faq-smile-img">
                                     <img src="{{URL::asset('assets/img/icons/smiling-icon.svg')}}" alt="icon">
                                </div>
                                <div class="faq-patients-content">
                                    <h4><span class="count-digit">95</span>k+</h4>
                                    <p>Happy Patients</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="faq-info">
                            <div class="accordion" id="accordionExample">

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <a href="javascript:void(0)" class="accordion-button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            Can i make an Appointment Online with White Plains Hospital Kendi?
                                        </a>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="accordion-content">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                                    ad minim veniam, </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <a href="javascript:void(0)" class="accordion-button collapsed"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                            aria-expanded="false" aria-controls="collapseTwo">
                                            Can i make an Appointment Online with White Plains Hospital Kendi?
                                        </a>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse"
                                        aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="accordion-content">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                                    ad minim veniam, </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <a href="javascript:void(0)" class="accordion-button collapsed"
                                            data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                            aria-expanded="false" aria-controls="collapseThree">
                                            Can i make an Appointment Online with White Plains Hospital Kendi?
                                        </a>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse"
                                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="accordion-content">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                                    ad minim veniam, </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFour">
                                        <a href="javascript:void(0)" class="accordion-button collapsed"
                                            data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                            aria-expanded="false" aria-controls="collapseFour">
                                            Can i make an Appointment Online with White Plains Hospital Kendi?
                                        </a>
                                    </h2>
                                    <div id="collapseFour" class="accordion-collapse collapse"
                                        aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="accordion-content">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                                    ad minim veniam, </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFive">
                                        <a href="javascript:void(0)" class="accordion-button collapsed"
                                            data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                            aria-expanded="false" aria-controls="collapseFive">
                                            Can i make an Appointment Online with White Plains Hospital Kendi?
                                        </a>
                                    </h2>
                                    <div id="collapseFive" class="accordion-collapse collapse"
                                        aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="accordion-content">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                                    ad minim veniam, </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('include.footer')

       