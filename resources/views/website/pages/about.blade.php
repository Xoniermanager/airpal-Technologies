@extends('layouts.frontend.main')
@section('content')
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
                                <img src = "{{$sections['about_our_company']->image}}">
                                {{-- <div class="col-md-6">
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
                                            <h4></h4>
                                        </div>
                                        <div class="about-img">
                                             <img src="{{URL::asset('assets/img/about-img3.jpg')}}" class="img-fluid" alt="about-image">
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="section-inner-header about-inner-header">
                            <h6>About Our Company</h6>
                            <h2>{{$sections['about_our_company']->title}}</h2>
                        </div>
                        <div class="about-content">
                            <div class="about-content-details">
                                <p>{{ $sections['about_our_company']->content }}</p>
                            </div>
                            <div class="about-contact">
                                <div class="about-contact-icon">
                                    <span> <img src="{{URL::asset('assets/img/icons/phone-icon.svg')}}" alt="phone-image"></span>
                                </div>
                                <div class="about-contact-text">
                                    <p>Need Emergency?</p>
                                    <h4><a href="tel:{{ $sections['about_our_company']->getButtons[0]->link ?? ''}}"></a> {{ $sections['about_our_company']->getButtons[0]->text ?? ''}}  </h4>
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

                    @forelse ($sections['key_features']->getContent as  $contentSection)

                    <div class="col-md-6 col-sm-12 col-lg-4">
                        <div class="listing-card">
                            <div class="listing-img">
                                 <img src="{{ $contentSection->image ?? ''}}"
                                    class="img-fluid" alt="surgery-image">

                            </div>
                            <div class="listing-content">
                                <div class="listing-details">
                                    <div class="listing-title">
                                        <h3>
                                            {{ $contentSection->title ?? ''}}
                                        </h3>
                                    </div>
                                    <div class="listing-profile-details">

                                        <p>
                                            {{ $contentSection->content ?? ''}}

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                     
                   @empty
                       
                   @endforelse
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
                                <h2>{{ $sections['contact_with_us']['title'] ?? ''}}</h2>
                                
                                
                                <a href="{{ $sections['contact_with_us']->getButtons[0]->link ?? ''}}" class="btn btn-primary">{{ $sections['contact_with_us']->getButtons[0]->text ?? ''}}</a>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12">
                            <div class="way-img">
                                 <img src="{{ $sections['contact_with_us']->image ?? ''}}" class="img-fluid" alt="doctor-way-image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        {{-- this is top doctor section (common section with other pages)--}}
        <x-doctor-slider :doctorList="$doctorList" :show="true" />


        {{-- <x-testimonial-slider  :show="true" /> --}}
        <x-testimonial-slider  :testimonials="$testimonials"  :show="true" />




        <x-faqs :show="true" />
 @endsection

       