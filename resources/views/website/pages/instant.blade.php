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

        {{-- this is top doctor section (common section with other pages)--}}
        <x-doctor-slider :doctorList="$doctorList" :show="true" />

        {{-- this is group by doctor specialty section (common section with other pages) --}}
        <x-specialty-group-by-section :show="true" />
        
        @endsection
 