@extends('layouts.frontend.main')
@section('content')
        <div class="breadcrumb-bar-two">
            <div class="container">
                <div class="row align-items-center inner-banner">
                    <div class="col-md-12 col-12 text-center">
                        <h2 class="breadcrumb-title">Specialty  Details</h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Specialty  Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="container pt-5">
                <div class="row">
                    <div class="col-lg-8 col-md-12">

                        <div class="blog">
                            <div class="blog-image"> 
                                <a href="#"><img class="img-fluid" src="{{ $specialty->image_url }}"
                                        alt="Post Image"></a>
                            </div>
                            <h3 class="blog-title"> {{ $specialty->name}}</h3>
                         
                            <div class="blog-content">
                                <p>{{ $specialty->description}}</p> 
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-4 col-md-12 sidebar-right theiaStickySidebar">
                         <div class="card post-widget">
                            <div class="card-header">
                                <h4 class="card-title"> Specialities </h4>
                            </div>
                            <div class="card-body">
                                <ul class="latest-posts">
                                    @foreach($specialties as $speciality)
                                    <li>
                                        <div class="post-thumb">
                                            <a href="{{ route('specialty.detail', ['id' => $speciality->id]) }}">
                                                <img class="img-fluid" src="{{ $speciality->image_url  ?? ''}}"
                                                    alt="blog-image">
                                            </a>
                                        </div>
                                        <div class="post-info">
                                            <h4>
                                                <a href="{{ route('specialty.detail', ['id' => $speciality->id]) }}">{{ $speciality->name ??  ''}}</a>
                                            </h4>
                                            <p>({{ $speciality->doctor()->count() }})  Doctors</p>
                                        </div>
                                    </li>
                                    @endforeach 
                                </ul>
                            </div>
                        </div>
 

                    </div>

                </div>
        </div>
        <section class="doctors-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 " data-="fade-up">
                        <div class="section-header-one section-header-slider">
                            <h2 class="section-title">Our Doctors</h2>
                        </div>
                    </div>
                    <div class="col-md-6 " data-="fade-up">
                        <div class="owl-nav slide-nav-2 text-end nav-control"></div>
                    </div>
                </div>
                <div class="row doctor-slider-one" data-="fade-up">

                    @forelse($doctorLists as $doctor)
                    <div class="col-md-3">
                        <div class="doctor-profile-widget">
                            <div class="doc-pro-img">
                                <a href="{{ route('frontend.doctor.profile', ['user' => Crypt::encrypt($doctor->id)]) }}">
                                    <div class="doctor-profile-img">
                                        <img src="{{ $doctor->user->image_url ?? ''}}" class="img-fluid"
                                        alt=""
                                        onerror="this.src='{{asset('assets/img/doctors/doctor-thumb-01.jpg')}}';" 
                                            >
                                    </div>
                                </a>

                            </div>

                                <div class="listing-profile-details p-3 d-block">
                                <div class="doctors-body">
                                    <a href="{{ route('frontend.doctor.profile', ['user' => Crypt::encrypt($doctor->id)]) }}">
                                        <h4>Dr. {{$doctor->user->first_name ?? ''}} {{$doctor->user->last_name ?? ''}} </h4>
                                    </a>
                                    <p>
                                        @if (isset($doctor->user->educations))
                                        @forelse ($doctor->user->educations as $education)
                                        {{$education->course->name}}
                                        @if( !$loop->last)
                                            ,
                                        @endif
                                        @empty
                                        <p>N/A</p>
                                        @endforelse 
                                        @else
                                        <p>N/A</p>       
                                        @endif
      
                                    </p>
                                        {{-- {{$doctor->specialty->name ?? ''}} --}}
                                        @isset($doctor->user->specializations)
                                        @forelse ($doctor->user->specializations as $specialty)
                                          <span class="badge badge-info text-white">  {{ $specialty->name }}</span>
                                        @empty
                                            <p>N/A</p>
                                        @endforelse
                                    @endisset
                                    </span></p>
                                        <div class="location border-top pt-3">
                                        {{-- <p><i class="fas fa-map-marker-alt"></i> San Diego, USA</p> --}}

                                        @php
                                        $address = $doctor->user->doctorAddress->address ?? '';
                                        $city = $doctor->user->doctorAddress->city ?? '';
                                        $fullAddress = $address . ' ' . $city . ' india';
                                        $encodedAddress = str_replace(' ', '+', $fullAddress);
                                    @endphp

                                    <a href="https://www.google.com/maps?q={{ $encodedAddress }}" target="_blank">
                                        <p>
                                            <i class="fas fa-map-marker-alt"></i><strong>
                                            {{ isset($doctor->user->doctorAddress->address ) ? $doctor->user->doctorAddress->address  : '' }}
                                            {{ isset($doctor->user->doctorAddress->city) ? ', '.$doctor->user->doctorAddress->city : '' }}
                                            {{ isset($doctor->user->doctorAddress->states->name) ? ', '.$doctor->user->doctorAddress->states->name : '' }}
                                            {{ isset($doctor->user->doctorAddress->states->country->name) ? ', '.$doctor->user->doctorAddress->states->country->name : '' }}
                                        </strong>
                                        </p> 
                                    </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>   
                    @empty
                      <p>Doctors Not Found</p>  
                    @endforelse
    
   

                </div>
            </div>
        </section>


        @endsection

        <style>

.specialty-text {
    display: inline-block;
    padding: 10px 20px;
    border-radius: 25px;
    background: linear-gradient(45deg, #6a11cb, #2575fc);
    color: #fff;
    font-family: 'Arial', sans-serif;
    font-size: 18px;
    font-weight: bold;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

        </style>