
<!DOCTYPE html>
<html lang="zxx">
<head>
@include('include.head')
</head>
<body>
    <div class="main-wrapper">
    @include('include.header')
        <section class="banner-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="banner-content aos" >
                            <h1>Consult <span>Best Doctors</span> Your Nearby Location.</h1>
                            <img src="{{URL::asset('assets/img/icons/header-icon.svg')}}" class="header-icon" alt="header-icon">
                            <p>Experts opinion at your comfort Zone </p>
                            <a href="#" class="btn">Start a Consult</a>
                            <div class="banner-arrow-img">
                                <img src="{{URL::asset('assets/img/down-arrow-img.png')}}" class="img-fluid" alt="down-arrow">
                            </div>
                        </div>
                        <div class="search-box-one aos" >
                            <form action="#">
                                <div class="search-input search-line">
                                    <i class="feather-search bficon"></i>
                                    <div class=" mb-0">
                                        <input type="text" class="form-control"
                                            placeholder="Search doctors, clinics, hospitals, etc">
                                    </div>
                                </div>
                                <div class="search-input search-map-line">
                                    <i class="feather-map-pin"></i>
                                    <div class=" mb-0">
                                        <input type="text" class="form-control" placeholder="Location">
                                        <a class="current-loc-icon current_location" href="javascript:void(0);">
                                            <i class="feather-crosshair"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="search-input search-calendar-line">
                                    <i class="feather-calendar"></i>
                                    <div class=" mb-0">
                                        <input type="text" class="form-control datetimepicker" placeholder="Date">
                                    </div>
                                </div>
                                <div class="form-search-btn">
                                    <a href="{{ route('doctors.index') }}" class="btn" type="submit">Search</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="banner-img aos" >
                            <img src="{{URL::asset('assets/img/banner-img.png')}}" class="img-fluid" alt="patient-image">
                            <div class="banner-img1">
                                <img src="{{URL::asset('assets/img/banner-img1.png')}}" class="img-fluid" alt="checkup-image">
                            </div>
                            <div class="banner-img2">
                                <img src="{{URL::asset('assets/img/banner-img2.png')}}" class="img-fluid" alt="doctor-slide">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="doctors-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 aos" >
                        <div class="section-header-one section-header-slider">
                            <h2 class="section-title">Top Doctors</h2>
                        </div>
                    </div>
                    <div class="col-md-6 aos" >
                        <div class="owl-nav slide-nav-2 text-end nav-control"></div>
                    </div>
                </div>
            
                <div class="owl-carousel doctor-slider-one owl-theme aos" >
                    @foreach ( $doctorList as $doctor )
                    <div class="item">
                        <div class="doctor-profile-widget">
                            <div class="doc-pro-img">
                                <a href="#">
                                    <div class="doctor-profile-img">
                                        <a href="{{route('frontend.doctor.profile',['user'=> $doctor->id])}}">
                                        <img src="{{ $doctor['image_url'] }}" class="img-fluid" alt="Ruby Perrin" 
                                        onerror="this.src='{{asset('assets/img/doctors/doctor-thumb-01.jpg')}}';" 
                                        >
                                        </a>
                                    </div>
                                </a>

                            </div>  
                            <div class="doc-content">
                                <div class="doc-pro-info">
                                    <div class="doc-pro-name">
                                        <a href="#">{{ $doctor->first_name ?? '' }} {{ $doctor->last_name ?? '' }}</a>
                                        @forelse ($doctor->specializations as $specializaion)
                                        <span>{{$specializaion->name}},</span>
                                        @empty
                                        <span>No Specialization available</span>
                                        @endforelse
                                        {{-- <p><span>{{$doctor->specializations[0]->name ?? ''}}</span></p> --}}
                                    </div>
                                    <div class="reviews-ratings">
                                        <p>
                                            <span><i class="fas fa-star"></i> 4.5</span> (35)
                                        </p>
                                    </div>
                                </div>
                                <div class="doc-pro-location">
                                    @if (isset($doctor->doctorAddress))
                                    @php
                                    $address = $doctor->doctorAddress->address ?? '';
                                    $city = $doctor->doctorAddress->city ?? '';
                                    $fullAddress = $address . ' ' . $city . ' india';
                                    $encodedAddress = str_replace(' ', '+', $fullAddress);
                                    @endphp

                                    <a href="https://www.google.com/maps?q={{ $encodedAddress }}" target="_blank">
                                        <span>
                                            <i class="fas fa-map-marker-alt"></i><strong>
                                            {{ isset($doctor->doctorAddress->address ) ? $doctor->doctorAddress->address  : '' }}
                                            {{ isset($doctor->doctorAddress->city) ? ', '.$doctor->doctorAddress->city : '' }}
                                            {{ isset($doctor->doctorAddress->states->name) ? ', '.$doctor->doctorAddress->states->name : '' }}
                                            {{ isset($doctor->doctorAddress->states->country->name) ? ', '.$doctor->doctorAddress->states->country->name : '' }}
                                        </strong>
                                        </span> 
                                    </a>

                                    {{-- <p class="doc-location"><i class="feather-map-pin"></i>{{$doctor->doctorAddress->city ?? ''}} {{','. $doctor->doctorAddress->states->country->name ??'' }} - 
                                        <a href="javascript:void(0);">Get Directions</a></p>   --}}
                                    @else
                                    <p class="doc-location"><i class="feather-map-pin"></i> - <a href="javascript:void(0);">Get Directions</a></p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach



                </div>
            </div>
        </section>
        <section class="specialities-section">
            <div class="shapes">
                <img src="{{URL::asset('assets/img/shapes/shape-3.png')}}" alt="shape-image" class="img-fluid shape-3">
                <img src="{{URL::asset('assets/img/shapes/shape-4.png')}}" alt="shape-image" class="img-fluid shape-4">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 aos aos-init aos-animate" >
                        <div class="section-heading bg-area">
                            <h2>Browse by Specialities</h2>
                            <p>Find experienced doctors across all specialties</p>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('specialty.list') }}" class="btn btn-primary prime-btn">Show More</a>
                    </div>
                </div>
                <div class="row">

                    @foreach($specialties as $speciality)

                    <div class="col-xl-3 col-lg-4 col-md-6 aos aos-init aos-animate" >
                        <div class="specialist-card d-flex">
                            <div class="specialist-img">
                                <img src="{{URL::asset('assets/img/category/1.png')}}" alt="kidney-image" class="img-fluid">
                            </div>
                            <div class="specialist-info">
                                <a href="{{ route('specialty.detail', ['id' => $speciality->id]) }}">
                                    <h4>{{ $speciality->speciality_name ??  ''}}</h4>
                                </a>
                                <p>{{$speciality->doctor_count}} Doctors</p>
                            </div>
                            <div class="specialist-nav ms-auto">
                                <a href="{{ route('specialty.detail', ['id' => $speciality->id]) }}"><i class="fas fa-long-arrow-alt-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
    
               
                </div>
            </div>
        </section>
        <section class="work-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 work-details">
                        <div class="section-header-one aos" >
                            <h5>How it Works</h5>
                            <h2 class="section-title">4 easy steps to get your solution</h2>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 aos" >
                                <div class="work-info">
                                    <div class="work-icon">
                                        <span><img src="{{URL::asset('assets/img/icons/work-01.svg')}}" alt="search-doctor-icon"></span>
                                    </div>
                                    <div class="work-content">
                                        <h5>Sign Up</h5>
                                        <p>Create an account on our platform by providing some basic information such as
                                            your name, email address, and password. Rest assured that your information
                                            is kept confidential and secure.

                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 aos" >
                                <div class="work-info">
                                    <div class="work-icon">
                                        <span><img src="{{URL::asset('assets/img/icons/work-02.svg')}}" alt="doctor-profile-icon"></span>
                                    </div>
                                    <div class="work-content">
                                        <h5>Describe Your Needs</h5>
                                        <p>Tell us about your healthcare needs and concerns. Provide details about your
                                            symptoms, medical history, and any specific questions you have for the
                                            doctor. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 aos" >
                                <div class="work-info">
                                    <div class="work-icon">
                                        <span><img src="{{URL::asset('assets/img/icons/work-03.svg')}}" alt="calendar-icon"></span>
                                    </div>
                                    <div class="work-content">
                                        <h5>Schedule Appointment</h5>
                                        <p>We offer flexible scheduling options, including same-day appointments and
                                            extended hours, to accommodate your busy schedule.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 aos" >
                                <div class="work-info">
                                    <div class="work-icon">
                                        <span><img src="{{URL::asset('assets/img/icons/work-04.svg')}}" alt="solution-icon"></span>
                                    </div>
                                    <div class="work-content">
                                        <h5>Connect and Consult</h5>
                                        <p>At the scheduled time, log in to your account and connect with your doctor
                                            for the consultation. Our secure and user-friendly platform ensures a
                                            seamless experience.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-12 work-img-info aos" >
                        <div class="work-img">
                            <img src="{{URL::asset('assets/img/work-img.png')}}" class="img-fluid" alt="doctor-image">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="specialities-section-one pt-0">
            <div class="floating-bg">
                <img src="{{URL::asset('assets/img/bg/health-care.png')}}" alt="heart-image">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 aos aos-init aos-animate" >
                        <div class="section-head-fourteen">
                            <h2>Why <span> Airpal App</span></h2>

                        </div>
                    </div>
                </div>
                <div class="specialities-block aos aos-init aos-animate" >
                    <ul>
                        <li>
                            <div class="specialities-item">
                                <div class="specialities-img">
                                    <div class="hexogen"><img src="{{URL::asset('assets/img/icons/health-care-love.svg')}}"
                                            alt="heart-icon"></div>
                                </div>
                                <p>Personalized Health care</p>
                            </div>
                        </li>
                        <li>
                            <div class="specialities-item">
                                <div class="specialities-img">
                                    <div class="hexogen"><img src="{{URL::asset('assets/img/icons/user-doctor.svg')}}"
                                            alt="male-doctor-icon"></div>
                                </div>
                                <p>World-Leading
                                    Experts</p>
                            </div>
                        </li>
                        <li>
                            <div class="specialities-item">
                                <div class="specialities-img">
                                    <div class="hexogen"><img src="{{URL::asset('assets/img/icons/healthcare.svg')}}"
                                            alt="stethoscope-icon"></div>
                                </div>
                                <p>Regularly
                                    Check Up</p>
                            </div>
                        </li>
                        <li>
                            <div class="specialities-item">
                                <div class="specialities-img">
                                    <div class="hexogen"><img src="{{URL::asset('assets/img/icons/drugs-svg.svg')}}" alt="medicine-icon">
                                    </div>
                                </div>
                                <p>Treatment For
                                    Complex Conditions</p>
                            </div>
                        </li>
                        <li>
                            <div class="specialities-item">
                                <div class="specialities-img">
                                    <div class="hexogen"><img src="{{URL::asset('assets/img/icons/syringe-svg.svg')}}" alt="syringe-icon">
                                    </div>
                                </div>
                                <p>Minimally Invasive Procedures</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="app-section">
            <div class="container">
                <div class="app-bg">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-12">
                            <div class="app-content">
                                <div class="app-header aos" >
                                    <h5>Working for Your Better Health.</h5>
                                    <h2>Download the Airpal App today!</h2>
                                </div>
                                <div class="app-scan aos" >
                                    <p>Book your medicines from your app.</p>

                                </div>
                                <div class="google-imgs aos" >
                                    <a href="javascript:void(0);"><img src="{{URL::asset('assets/img/google-play.png')}}" alt="img"></a>
                                    <a href="javascript:void(0);"><img src="{{URL::asset('assets/img/app-store.png')}}" alt="img"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 aos" >
                            <div class="mobile-img">
                                <img src="{{URL::asset('assets/img/mobile-img.png')}}" class="img-fluid" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="faq-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-header-one text-center aos" >
                            <h5>Get Your Answer</h5>
                            <h2 class="section-title">Frequently Asked Questions</h2>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 aos" >
                        <div class="faq-img">
                            <img src="{{URL::asset('assets/img/faq-img-2.jpg')}}" class="img-fluid" alt="img">
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
                        <div class="faq-info aos" >
                            <div class="accordion" id="faq-details">

                                @foreach ( $allFaqs->slice(0, 6) as  $key => $allFaq)
                                    
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{$key}}">
                                        <a href="javascript:void(0);" class="accordion-button {{ $key != 0 ? 'collapsed' : '' }}" data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{$key}}" aria-expanded="true"
                                            aria-controls="collapse{{$key}}">
                                           {{ $allFaq->name }}
                                        </a>
                                    </h2>
                                    <div id="collapse{{$key}}" class="accordion-collapse collapse {{ $key==0 ? 'show' : '' }}"
                                        aria-labelledby="heading{{$key}}" data-bs-parent="#faq-details">
                                        <div class="accordion-body">
                                            <div class="accordion-content">
                                                <p>{{  $allFaq->description}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

         

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="testimonial-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="testimonial-slider slick">
                            <div class="testimonial-grid">
                                <div class="testimonial-info">
                                    <div class="testimonial-img">
                                        <img src="{{URL::asset('assets/img/clients/client-01.jpg')}}" class="img-fluid" alt="John Doe">
                                    </div>
                                    <div class="testimonial-content">
                                        <div class="section-header section-inner-header testimonial-header">
                                            <h5>Testimonials</h5>
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
                                            alt="Amanda Warren">
                                    </div>
                                    <div class="testimonial-content">
                                        <div class="section-header section-inner-header testimonial-header">
                                            <h5>Testimonials</h5>
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
                                            alt="Betty Carlson">
                                    </div>
                                    <div class="testimonial-content">
                                        <div class="section-header section-inner-header testimonial-header">
                                            <h5>Testimonials</h5>
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
                                        <img src="{{URL::asset('assets/img/clients/client-04.jpg')}}" class="img-fluid" alt="Veronica">
                                    </div>
                                    <div class="testimonial-content">
                                        <div class="section-header section-inner-header testimonial-header">
                                            <h5>Testimonials</h5>
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
                                        <img src="{{URL::asset('assets/img/clients/client-05.jpg')}}" class="img-fluid" alt="Richard">
                                    </div>
                                    <div class="testimonial-content">
                                        <div class="section-header section-inner-header testimonial-header">
                                            <h5>Testimonials</h5>
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


        <section class="partners-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-header-one text-center aos" >
                            <h2 class="section-title">Our Partners</h2>
                        </div>
                    </div>
                </div>
                <div class="partners-info aos" >
                    <ul class="owl-carousel partners-slider d-flex">
                        <li>
                            <a href="javascript:void(0);">
                                <img class="img-fluid" src="{{URL::asset('assets/img/partners/partners-1.svg')}}" alt="partners">
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <img class="img-fluid" src="{{URL::asset('assets/img/partners/partners-2.svg')}}" alt="partners">
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <img class="img-fluid" src="{{URL::asset('assets/img/partners/partners-3.svg')}}" alt="partners">
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <img class="img-fluid" src="{{URL::asset('assets/img/partners/partners-4.svg')}}" alt="partners">
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <img class="img-fluid" src="{{URL::asset('assets/img/partners/partners-5.svg')}}" alt="partners">
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <img class="img-fluid" src="{{URL::asset('assets/img/partners/partners-6.svg')}}" alt="partners">
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <img class="img-fluid" src="{{URL::asset('assets/img/partners/partners-1.svg')}}" alt="partners">
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <img class="img-fluid" src="{{URL::asset('assets/img/partners/partners-2.svg')}}" alt="partners">
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <img class="img-fluid" src="{{URL::asset('assets/img/partners/partners-3.svg')}}" alt="partners">
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <img class="img-fluid" src="{{URL::asset('assets/img/partners/partners-4.svg')}}" alt="partners">
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <img class="img-fluid" src="{{URL::asset('assets/img/partners/partners-5.svg')}}" alt="partners">
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <img class="img-fluid" src="{{URL::asset('assets/img/partners/partners-6.svg')}}" alt="partners">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>


        @include('include.footer')

 