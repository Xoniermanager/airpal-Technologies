@extends('layouts.frontend.main')
@section('content')
    <section class="doctor-search-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="banner-content aos aos-init aos-animate" data-aos="fade-up">
                        <h1>{{ $sections['health_monitoring_banner']->title }}</h1>
                        <img src="{{ URL::asset('assets/img/icons/header-icon.svg') }}" class="header-icon" alt="header-icon">
                        <p>{{ $sections['health_monitoring_banner']->subtitle }}</p>
                        <a href="{{ $sections['health_monitoring_banner']->getButtons[0]->link ?? '' }}"
                            class="btn">{{ $sections['health_monitoring_banner']->getButtons[0]->text ?? '' }}</a>
                    </div>
                </div>

                <div class="col-lg-6">
                    <img src="{{ URL::asset('assets/img/service/device.png') }}" class="img-fluid dr-img"
                        alt="doctor-image">
                </div>
            </div>
        </div>
    </section>
    <section class="service-sec-fourteen">
        <div class="section-bg">
            <img src="{{ URL::asset('assets/img/bg/sercice-sec-bg.png') }}" alt="Img">
        </div>
        <div class="container">
            <div class="section-head-fourteen">
                <h2>{{ $sections['our_health_monitoring']->title }}</h2>
                <p>{{ $sections['our_health_monitoring']->subtitle }}</p>
            </div>

            @php
                $chunks = $sections['our_health_monitoring']->getContent->chunk(4); // Split into chunks of 4
            @endphp
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-12 d-flex">
                    <div class="service-type-cards w-100">


                        @foreach ($chunks[0] as $contentSection)
                            <div class="service-types aos-init aos-animate" data-aos="fade-down">
                                <div class="doctor-image">
                                    <a href="#"><img src="{{ $contentSection->image }}" alt="Img"></a>
                                </div>
                                <div class="service-content">
                                    <h4><a href="#">{{ $contentSection->title }}</a></h4>
                                    {{-- <a href="#" class="explore-link">Explore<i
                                            class="feather-arrow-right-circle"></i></a> --}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex">
                    <div class="services-img-col w-100">
                        <div class="sec-img-center">
                            <img src="{{ $sections['our_health_monitoring']->image }}" alt="Img">
                        </div>
                        <div class="img-center img-center-one aos-init aos-animate" data-aos="fade-down"
                            data-aos-delay="500">
                            <img src="{{ URL::asset('assets/img/service/service-img-01.jpg') }}" alt="Img">
                        </div>
                        <div class="img-center img-center-two aos-init aos-animate" data-aos="fade-up" data-aos-delay="800">
                            <img src="{{ URL::asset('assets/img/service/service-img-02.jpg') }}" alt="Img">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 d-flex">
                    <div class="service-type-cards w-100">

                        @foreach ($chunks[1] as $contentSection)
                            <div class="service-types service-type-right aos-init aos-animate" data-aos="fade-down">
                                <div class="service-content">
                                    <h4><a href="#">{{ $contentSection->title }}</a></h4>
                                    {{-- <a href="#" class="explore-link">Explore<i class="feather-arrow-right-circle"></i></a> --}}
                                </div>
                                <div class="doctor-image">
                                    <a href="#"><img src="{{ $contentSection->image }}" alt="Img"></a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="work-section doctors-section">
        <div class="container" style="transform: none;">
            <div class="row" style="transform: none;">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-body product-description">
                            <div class="doctor-widget">
                                <div class="doc-info-left">
                                    <div class="doctor-img1">
                                        <img src="{{ $sections['health_monitoring_device']->image }}" class="img-fluid"
                                            alt="">
                                    </div>
                                    <div class="doc-info-cont product-cont">
                                        <h4 class="doc-name mb-2">{{ $sections['health_monitoring_device']->title }}</h4>

                                        <p>{!! $sections['health_monitoring_device']->content !!}</p>

                                        <a class="btn btn-primary custom-components" type="button"
                                            href="{{ $sections['health_monitoring_device']->getButtons[0]->link ?? '' }}"
                                            data-bs-original-title="" title="">
                                            {{ $sections['health_monitoring_device']->getButtons[0]->text ?? '' }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-body pt-0">

                            <h3 class="pt-4">Product Details</h3>
                            <hr>


                            <div class="tab-content pt-3">

                                <div role="tabpanel" id="doc_overview" class="tab-pane fade show active">
                                    <div class="row">
                                        <div class="col-md-9">

                                            <div class="widget about-widget">
                                                <h4 class="widget-title">Description</h4>
                                                <p> Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry. Lorem Ipsum has been the industry's standard dummy text ever
                                                    since the 1500s, when an unknown printer took a galley of type and
                                                    scrambled

                                                </p>
                                            </div>
                                            @foreach ($sections['product_details'] as $key => $section)
                                            <div class="widget awards-widget">
                                                
                                                    <h4 class="widget-title">{{ $sections['product_details'][$key]->title }}</h4>
                                                    <div class="experience-box">
                                                        <ul class="experience-list">
                                                            @foreach ($section->listItems as $item)
                                                                <li>
                                                                    <div class="experience-user">
                                                                        <div class="before-circle"></div>
                                                                    </div>
                                                                    <div class="experience-content">
                                                                        <div class="timeline-content">
                                                                            <p> {{ $item['title'] }} </p>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                             
                                            </div>
                                            @endforeach

                                            

                                            {{-- <div class="widget about-widget">
                                                <h4 class="widget-title">Directions for use</h4>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry.</p>
                                            </div>


                                            <div class="widget about-widget">
                                                <h4 class="widget-title">Storage</h4>
                                                <p> Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry.</p>
                                            </div>


                                            <div class="widget about-widget">
                                                <h4 class="widget-title">Administration Instructions</h4>
                                                <p> Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry.</p>
                                            </div>


                                            <div class="widget about-widget">
                                                <h4 class="widget-title">Warning</h4>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry.</p>
                                            </div>


                                            <div class="widget about-widget mb-3">
                                                <h4 class="widget-title">Precaution</h4>
                                                <p class="mb-0"> Lorem Ipsum is simply dummy text of the printing and
                                                    typesetting industry.</p>
                                            </div> --}}

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <section class="choose-us-fourteen">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header-fourteen text-center">
                        <div class="service-inner-fourteen justify-content-center">
                            <div class="service-inner-fourteen-one">
                            </div>
                            <div class="service-inner-fourteen-two">
                                <h3>{{ $sections['we_are_solving']->title ?? '' }}</h3>
                            </div>
                            <div class="service-inner-fourteen-three">
                            </div>
                        </div>
                        <h2>{{ $sections['we_are_solving']->subtitle }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="you-get-list">
                        <ul>

                            @forelse ($sections['we_are_solving']->getContent as  $contentSection)
                                <li>
                                    <div class="get-list-content">
                                        <div class="get-icon">
                                            <i class="fa fa-check fs-40"></i>
                                        </div>
                                        <div class="get-icon-right">
                                            <h3 class="">{{ $contentSection->title }}</h3>
                                        </div>
                                    </div>
                                </li>
                            @empty
                            @endforelse

                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="choose-us-right-main">
                        <img src="{{ URL::asset('assets/img/choose-us-six.png') }}" alt="image" class="img-fluid">
                        <div class="banner-imgfourteenten">
                            <img src="{{ URL::asset('assets/img/icons/serv-img-icon-1.svg') }}" class="img-fluid"
                                alt="Icon">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
