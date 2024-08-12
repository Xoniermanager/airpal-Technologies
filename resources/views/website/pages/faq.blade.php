@extends('layouts.frontend.main')
@section('content')
        <div class="breadcrumb-bar-two">
            <div class="container">
                <div class="row align-items-center inner-banner">
                    <div class="col-md-12 col-12 text-center">
                        <h2 class="breadcrumb-title">FAQ's</h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">FAQ's</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <section class="faq-section pt-5 mt-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-header-one text-center aos" data-aos="fade-up">
                            <h5>Get Your Answer</h5>
                            <h2 class="section-title">Frequently Asked Questions</h2>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                     
                    <div class="col-lg-12 col-md-12">
                        <div class="faq-info aos" data-aos="fade-up">
                            <div class="accordion" id="faq-details">


                                @foreach ( $allFaqs->slice(0, 6) as  $key => $allFaq)
                                    
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{$key}}">
                                        <a href="javascript:void(0);" class="accordion-button {{ $key != 0 ? 'collapsed' : '' }}" data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{$key}}" aria-expanded="false"
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
        

        @endsection