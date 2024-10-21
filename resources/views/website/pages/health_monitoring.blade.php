@extends('layouts.frontend.main')
@section('content')
    <section class="doctor-search-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="banner-content aos aos-init aos-animate" data-aos="fade-up">
                        <h1>{{ $sections['health_monitoring_banner']->title ?? '' }}</h1>
                        <img src="{{ URL::asset('assets/img/icons/header-icon.svg') }}" class="header-icon" alt="header-icon">
                        <p>{{ $sections['health_monitoring_banner']->subtitle ?? '' }}</p>
                        <a href="{{ $sections['health_monitoring_banner']->getButtons[0]->link ?? '' }}"
                            class="btn">{{ $sections['health_monitoring_banner']->getButtons[0]->text ?? '' }}</a>
                    </div>
                </div>

                <div class="col-lg-6">
                    <img src="{{ $sections['health_monitoring_banner']->image ?? '' }}" class="img-fluid dr-img"
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

                                        <p><b>{!! $sections['health_monitoring_device']->content !!}</b></p>

                                        @foreach ($sections['health_monitoring_device']->getListing as $ulSection)
                                        <div class="widget awards-widget">
                                            {{-- <h4 class="widget-title">{{ $ulSection->title }}</h4> --}}
                                            <div class="experience-box">
                                                <ul class="">
                                                    @foreach ($ulSection->listItems as $item)
                                                        <li class="mb-3">
                                                            {{-- <div class="experience-user">
                                                                <div class="before-circle"></div>
                                                            </div> --}}
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
 
                                        <a class="btn btn-primary custom-components" type="button"  data-bs-toggle="modal" data-bs-target="#exampleModalCenter"
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
                                                <h4 class="widget-title">{{ $sections['product_details']->title ?? '' }}
                                                </h4>
                                                <p>- {{ $sections['product_details']->subtitle ?? '' }}
                                                </p>
                                                <p>- {{ $sections['product_details']->content ?? '' }}
                                                </p>
                                            </div>

                                            @foreach ($sections['product_details']->getListing as $ulSection)
                                            @if ($ulSection && $ulSection->listItems->isNotEmpty()) <!-- Check if $ulSection exists and has list items -->
                                                <div class="widget awards-widget">
                                                    <h4 class="widget-title">{{ $ulSection->title }}</h4>
                                                    <div class="experience-box">
                                                        <ul class="experience-list">
                                                            @foreach ($ulSection->listItems as $item)
                                                                @if (!empty($item['title'])) <!-- Ensure $item['title'] is not empty -->
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
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                        

                                                <div class="widget about-widget">
                                                    @if($sections['product_details']->getContent[0])
                                                        <h4 class="widget-title">
                                                            {{ $sections['product_details']->getContent[0]['title'] }}</h4>
                                                        <p>{{ $sections['product_details']->getContent[0]['content'] }}</p>
                                                    @endif
                                                   

                                                    @if ($sections['product_details']->getButtons[0])
                                                        <a href="{{ $sections['product_details']->getButtons[0]->link }}"
                                                            class="btn btn-outline-primary">{{ $sections['product_details']->getButtons[0]->text }}</a>
                                                    @endif
                                                </div>
                                                <div class="widget about-widget">

                                                    @if($sections['product_details']->getContent[1])
                                                        <h4 class="widget-title">
                                                            {{ $sections['product_details']->getContent[1]['title'] }}</h4>
                                                        <p>{{ $sections['product_details']->getContent[1]['content'] }}</p>
                                                    @endif
                                                    
                                                    @if($sections['product_details']->getContent[2])
                                                        <h4 class="widget-title">
                                                            {{ $sections['product_details']->getContent[2]['title'] }}</h4>
                                                        <p>{{ $sections['product_details']->getContent[2]['content'] }}</p>
                                                    @endif
                                                
                                                <div class="widget about-widget">

                                                    @if ($sections['product_details']->getButtons[1])
                                                        <a href="{{ $sections['product_details']->getButtons[1]->link }}"
                                                            class="btn btn-primary">{{ $sections['product_details']->getButtons[1]->text }}</a>
                                                    @endif
                                                </div>
                                                <div class="widget about-widget">

                                                    @if($sections['product_details']->getContent[3])
                                                        <h4 class="widget-title">
                                                            {{ $sections['product_details']->getContent[3]['title'] }}</h4>
                                                        <p>{{ $sections['product_details']->getContent[3]['content'] }}</p>
                                                    @endif
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
                        <img src="{{ $sections['we_are_solving']->image }}" alt="image" class="img-fluid">
                        <div class="banner-imgfourteenten">
                            <img src="{{ URL::asset('assets/img/icons/serv-img-icon-1.svg') }}" class="img-fluid"
                                alt="Icon">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenter" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Product Enquiry</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>
                <div class="modal-body">
                    <form  id="connect_waearable_mail">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="mb-2">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter Your Name">
                                    <span class="text-danger" id="name_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="mb-2">Phone Number</label>
                                    <input type="text" class="form-control" name="phone"  placeholder="Enter Phone Number">
                                    <span class="text-danger" id="phone_error"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="mb-2">Email Address</label>
                                    <input type="text" class="form-control" name="email" placeholder="Enter Email Address">
                                    <span class="text-danger" id="email_error"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="mb-2">Message</label>
                                    <textarea class="form-control h-100px" name="message" placeholder="Enter your comments"></textarea>
                                    <span class="text-danger" id="message_error"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group-btn mb-0">
                                    <button type="submit" class="btn btn-primary prime-btn">Submit </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection



@section('javascript')

    <script>
        $(document).ready(function() {
            $('.loaderonload').hide();
            jQuery("#connect_waearable_mail").validate({
                rules: {
                    name: 'required',
                    phone: {
                        required: true,
                        digits: true,
                        minlength: 10,
                        maxlength: 15
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    message: 'required',
                },
                messages: {
                    name: "Please enter your name",
                    phone: {
                        required: "Please enter your phone number",
                        digits: "Please enter a valid phone number with digits only",
                        minlength: "Your phone number must be at least 10 digits long",
                        maxlength: "Your phone number must not exceed 15 digits"
                    },
                    disease: "Please select a service",

                },
                submitHandler: function(form) {
                    var formData = new FormData(form);
                    console.log(formData);
                    $.ajax({
                        url: "<?= route('connect.wearable.mail') ?>",
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        dataType: "json",
                        beforeSend: function() {
                            $('.loaderonload').show();
                        },
                        success: function(response) {

                            if (response.success == true) {
                                $('.loaderonload').hide();
                                $('#connect_waearable_mail')[0].reset();
                                // Swal.fire("Done!", response.message, "success");
                                window.location.href = "<?= route('thank.you') ?>";
                            }
                        },
                        error: function(error_messages) {
                            $('.loaderonload').hide();
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
