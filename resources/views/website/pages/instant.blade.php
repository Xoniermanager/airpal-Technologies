@extends('layouts.frontend.main')
@section('content')
        <section class="doctor-search-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 aos" data-aos="fade-up">
                        <div class="doctor-search">
                            <div class="banner-header">
                                <h2>Find Doctor, <br> For Instant Consultation</h2>
                            </div>
                            <div class="doctor-form">
                                <form action="#" class="doctor-search-form">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="mb-2">Name</label>
                                                <div class="form-custom">
                                                    <input type="text" class="form-control" value>
                                                    <i class="far fa-user"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="mb-2">Number</label>
                                                <div class="form-custom">
                                                    <input type="text" class="form-control" value>
                                                    <i class="fa fa-mobile"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="mb-2">Disease</label>
                                                <div class="form-custom">
                                                    <input type="text" class="form-control" value>
                                                    <i class="fas fa-fa fa-wheelchair"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <a href="#" class="btn banner-btn mt-3">SUBMIT</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 aos" data-aos="fade-up">
                        <img src="{{URL::asset('assets/img/banner-fifteen-ryt.png')}}" class="img-fluid dr-img" alt="doctor-image">
                    </div>
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
                    <div class="col-md-6 aos" data-aos="fade-up">
                        <div class="section-heading bg-area">
                            <h2>Browse by Specialities</h2>
                            <p>Find experienced doctors across all specialties</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 aos" data-aos="fade-up">
                        <div class="specialist-card d-flex">
                            <div class="specialist-img">
                                <img src="{{URL::asset('assets/img/category/1.png')}}" alt="kidney-image" class="img-fluid">
                            </div>
                            <div class="specialist-info">
                                <a href="#">
                                    <h4>Urology</h4>
                                </a>
                                <p>21 Doctors</p>
                            </div>
                            <div class="specialist-nav ms-auto">
                                <a href="#"><i class="fas fa-long-arrow-alt-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 aos" data-aos="fade-up">
                        <div class="specialist-card d-flex">
                            <div class="specialist-img">
                                <img src="{{URL::asset('assets/img/category/3.png')}}" alt="brain-image" class="img-fluid">
                            </div>
                            <div class="specialist-info">
                                <a href="#">
                                    <h4>Neurology</h4>
                                </a>
                                <p>21 Doctors</p>
                            </div>
                            <div class="specialist-nav ms-auto">
                                <a href="#"><i class="fas fa-long-arrow-alt-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 aos" data-aos="fade-up">
                        <div class="specialist-card d-flex">
                            <div class="specialist-img">
                                <img src="{{URL::asset('assets/img/category/2.png')}}" alt="bone-image" class="img-fluid">
                            </div>
                            <div class="specialist-info">
                                <a href="#">
                                    <h4>Orthopedic</h4>
                                </a>
                                <p>21 Doctors</p>
                            </div>
                            <div class="specialist-nav ms-auto">
                                <a href="#"><i class="fas fa-long-arrow-alt-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 aos" data-aos="fade-up">
                        <div class="specialist-card d-flex">
                            <div class="specialist-img">
                                <img src="{{URL::asset('assets/img/category/4.png')}}" alt="heart-image" class="img-fluid">
                            </div>
                            <div class="specialist-info">
                                <a href="#">
                                    <h4>Cardiologist</h4>
                                </a>
                                <p>21 Doctors</p>
                            </div>
                            <div class="specialist-nav ms-auto">
                                <a href="#"><i class="fas fa-long-arrow-alt-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 aos" data-aos="fade-up">
                        <div class="specialist-card d-flex">
                            <div class="specialist-img">
                                <img src="{{URL::asset('assets/img/category/1.png')}}" alt="kidney-image" class="img-fluid">
                            </div>
                            <div class="specialist-info">
                                <a href="#">
                                    <h4>Urology</h4>
                                </a>
                                <p>21 Doctors</p>
                            </div>
                            <div class="specialist-nav ms-auto">
                                <a href="#"><i class="fas fa-long-arrow-alt-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 aos" data-aos="fade-up">
                        <div class="specialist-card d-flex">
                            <div class="specialist-img">
                                <img src="{{URL::asset('assets/img/category/3.png')}}" alt="brain-image" class="img-fluid">
                            </div>
                            <div class="specialist-info">
                                <a href="#">
                                    <h4>Neurology</h4>
                                </a>
                                <p>21 Doctors</p>
                            </div>
                            <div class="specialist-nav ms-auto">
                                <a href="#"><i class="fas fa-long-arrow-alt-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 aos" data-aos="fade-up">
                        <div class="specialist-card d-flex">
                            <div class="specialist-img">
                                <img src="{{URL::asset('assets/img/category/2.png')}}" alt="bone-image" class="img-fluid">
                            </div>
                            <div class="specialist-info">
                                <a href="#">
                                    <h4>Orthopedic</h4>
                                </a>
                                <p>21 Doctors</p>
                            </div>
                            <div class="specialist-nav ms-auto">
                                <a href="#"><i class="fas fa-long-arrow-alt-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 aos" data-aos="fade-up">
                        <div class="specialist-card d-flex">
                            <div class="specialist-img">
                                <img src="{{URL::asset('assets/img/category/4.png')}}" alt="heart-image" class="img-fluid">
                            </div>
                            <div class="specialist-info">
                                <a href="#">
                                    <h4>Cardiologist</h4>
                                </a>
                                <p>21 Doctors</p>
                            </div>
                            <div class="specialist-nav ms-auto">
                                <a href="#"><i class="fas fa-long-arrow-alt-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="our-doctors-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 aos" data-aos="fade-up">
                        <div class="section-heading">
                            <h2>Top Doctors</h2>
                            <p>Access to expert physicians and surgeons, advanced technologies and top-quality surgery
                                facilities right here.</p>
                        </div>
                    </div>
                    <div class="col-md-6 text-end aos" data-aos="fade-up">
                        <div class="owl-nav slide-nav-2 text-end nav-control"></div>
                    </div>
                </div>
                <div class="owl-carousel our-doctors owl-theme aos" data-aos="fade-up">
                    <div class="item">
                        <div class="our-doctors-card">
                            <div class="doctors-header">
                                <a href="#"><img src="{{URL::asset('assets/img/doctors/doctor-01.jpg')}}" alt="Ruby Perrin"
                                        class="img-fluid"></a>

                            </div>
                            <div class="doctors-body">
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <span class="d-inline-block average-ratings">3.5</span>
                                </div>
                                <a href="#">
                                    <h4>Dr. Ruby Perrin</h4>
                                </a>
                                <p>BDS, MDS - Oral & Maxillofacial Surgery</p>
                                <div class="location d-flex">
                                    <p><i class="fas fa-map-marker-alt"></i> Georgia, USA</p>
                                    <p class="ms-auto"><i class="fas fa-user-md"></i> 450 Consultations</p>
                                </div>
                                <div class="row row-sm">
                                    <div class="col-6">
                                        <a href="#" class="btn view-btn" tabindex="0">View Profile</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="btn book-btn" tabindex="0">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        
        @endsection
 