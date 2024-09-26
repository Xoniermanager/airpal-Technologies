@extends('layouts.frontend.main')
@section('content')
        <div class="breadcrumb-bar-two">
            <div class="container">
                <div class="row align-items-center inner-banner">
                    <div class="col-md-12 col-12 text-center">
                        <h2 class="breadcrumb-title">Specialty  List</h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Specialty  List</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <section class="service-section trusted-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 aos" data-aos="fade-up">
                        <div class="section-header-one section-header-slider">
                            <h2 class="section-title">Our <span>Specialities  </span></h2>
                        </div>
                    </div>
                </div>
                <div class="row row-gap aos justify-content-center" data-aos="fade-up">

                @foreach($specialties as $speciality)
                    <div class="col-md-6 col-sm-12 col-lg-4">
                        <div class="listing-card">
                            <div class="listing-img">
                                <a href="{{ route('specialty.detail', ['id' => $speciality->id]) }}"> 
                                    <img src="{{ $speciality->image_url ?? '' }}" class="img-fluid"
                                        alt="surgery-image">
                                </a> 
                            </div>
                            <div class="listing-content">
                                <div class="listing-details">
                                    <div class="listing-title">
                                        <h3><a href="{{ route('specialty.detail', ['id' => $speciality->id]) }}"> {{ $speciality->speciality_name ??  ''}} </a> <span style="font-size: 14px;font-weight:300">(Doctors {{ $speciality->doctor()->count() }}) </span></h3>
                                        
                                    </div>
                                    <div class="listing-title">
                                        <p>{{ $speciality->description ??  ''}}</p>
                                    </div>
                                    {{-- <div class="listing-profile-details d-block">
                                        <div class="listing-user">                                             
                                            <div class="listing-user-details">
                                                <span>Doctors ({{$speciality->doctor_count}}) </span>
                                              </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>  
                    @endforeach 
   
                </div>
            </div>
        </section>



        @endsection