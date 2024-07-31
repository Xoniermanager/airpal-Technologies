@extends('layouts.doctor.main')
@section('content')
    @php
        $ratingButton = false;
    @endphp
    <div class="breadcrumb-bar-two">
        <div class="container">
            <div class="row align-items-center inner-banner">
                <div class="col-md-12 col-12 text-center">
                    <h2 class="breadcrumb-title">Doctor Profile</h2>
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                            <li class="breadcrumb-item" aria-current="page">Doctor Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="doctor-widget">
                        <div class="doc-info-left">
                            <div class="doctor-img"> 
                                <img src="{{ $doctor['image_url'] }}" class="img-fluid"
                                    alt=""   onerror="this.src='{{asset('assets/img/doctors/doctor-thumb-01.jpg')}}';" >
                            </div>
                            <div class="doc-info-cont">
                                <h4 class="doc-name">{{ $doctor->first_name }} {{ $doctor->last_name }}</h4>
                                {{-- <p class="doc-speciality">{{$specializationsString}}</p> --}}
                                <p class="doc-speciality" style="font-weight:600">
                                    @forelse ($doctor->educations as $education)
                                        {{ $education->course->name }}
                                        @if (!$loop->last)
                                            ,
                                        @endif
                                    @empty
                                        <p>N/A</p>
                                    @endforelse
                                </p>
                                @php
                                    $slicedSpecializationsArray = $doctor->specializations;
                                @endphp
                                <p class="doc-department"><img
                                        src="{{ URL::asset('assets/img/specialities/specialities-05.png') }}"
                                        class="img-fluid" alt="Speciality">Dentist</p>
                                <div class="reviews-ratings">
                                    <p>
                                        <?php
                                        $total = '0';
                                        if (isset($doctor->doctorReview) && count($doctor->doctorReview) > 0) {
                                            $total = $doctor->doctorReview->sum('rating') / count($doctor->doctorReview);
                                        }
                                        ?>
                                        <span><i class="fas fa-star"></i>{{ $total }}</span>
                                        ({{ count($doctor->doctorReview) }} reviews)
                                    </p>
                                </div>
                                <div class="clinic-details">
                                    @php
                                        $address = $doctor->doctorAddress->address ?? '';
                                        $city = $doctor->doctorAddress->city ?? '';
                                        $fullAddress = $address . ' ' . $city . ' india';
                                        $encodedAddress = str_replace(' ', '+', $fullAddress);
                                    @endphp
                                    @if (isset($doctor->doctorAddress))
                                        <p><i class="fas fa-map-marker-alt"></i>{{ $doctor->doctorAddress->address ?? '' }}
                                            {{ ',' . $doctor->doctorAddress->city ?? '' }}
                                            {{ ',' . $doctor->doctorAddress->states->name ?? '' }}
                                            {{ ',' . $doctor->doctorAddress->states->country->name ?? '' }}
                                            <a href="https://www.google.com/maps?q={{ $encodedAddress }}" target="_blank"
                                                style="color: blue">Get Directions
                                            </a>

                                        </p>
                                    @else
                                        <p class="doc-location"><i class="fas fa-map-marker-alt"></i> - <a
                                                href="javascript:void(0);">Get Directions</a></p>
                                    @endif


                                </div>
                                <div class="clinic-services">
                                    @forelse ($doctor->specializations as $specializaion)
                                        <span>{{ $specializaion->name }}</span>
                                    @empty
                                        <span>No Specialization available</span>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <div class="doc-info-right">
                            <div class="clini-infos">
                                <ul>
                                    <li><i class="far fa-thumbs-up"></i> 99%</li>
                                    <li><i class="far fa-comment"></i> 35 Feedback</li>
                                    @if (isset($doctor->doctorAddress))
                                        <li><i class="fas fa-map-marker-alt"></i>
                                            {{ $doctor->doctorAddress->address ?? '' }}
                                            {{ ',' . $doctor->doctorAddress->city ?? '' }}
                                            {{ ',' . $doctor->doctorAddress->states->name ?? '' }}
                                            {{ ',' . $doctor->doctorAddress->states->country->name ?? '' }} </li>
                                    @else
                                        <li><i class="fas fa-map-marker-alt"></i></li>
                                    @endif

                                    <li><i class="far fa-money-bill-alt"></i> $100 per hour </li>
                                </ul>
                            </div>
                            <div class="doctor-action">
                                <a href="javascript:void(0)" class="btn btn-white fav-btn">
                                    <i class="far fa-bookmark"></i>
                                </a>
                                <a href="#" class="btn btn-white msg-btn">
                                    <i class="far fa-comment-alt"></i>
                                </a>
                                <a href="javascript:void(0)" class="btn btn-white call-btn" data-bs-toggle="modal"
                                    data-bs-target="#voice_call">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="javascript:void(0)" class="btn btn-white call-btn" data-bs-toggle="modal"
                                    data-bs-target="#video_call">
                                    <i class="fas fa-video"></i>
                                </a>
                            </div>
                            <div class="clinic-booking mb-2">
                                <a class="apt-btn" href="#">Book Appointment</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body pt-0">

                    <nav class="user-tabs mb-4">
                        <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                            <li class="nav-item">
                                <a class="nav-link active" href="#doc_overview" data-bs-toggle="tab">Overview</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#doc_locations" data-bs-toggle="tab">Locations</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#doc_reviews" data-bs-toggle="tab">Reviews</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#doc_business_hours" data-bs-toggle="tab">Business Hours</a>
                            </li>
                        </ul>
                    </nav>


                    <div class="tab-content pt-0">

                        <div role="tabpanel" id="doc_overview" class="tab-pane fade show active">
                            <div class="row">
                                <div class="col-md-12 col-lg-9">

                                    <div class="widget about-widget">
                                        <h4 class="widget-title">About Me</h4>
                                        <p>{{ $doctor->description }}</p>
                                    </div>


                                    <div class="widget education-widget">
                                        <h4 class="widget-title">Education</h4>
                                        <div class="experience-box">
                                            <ul class="experience-list">

                                                @forelse ($doctor->educations as $education)
                                                    <li>
                                                        <div class="experience-user">
                                                            <div class="before-circle"></div>
                                                        </div>
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <a href="#"
                                                                    class="name">{{ $education->institute_name }}</a>
                                                                <div>BDS</div>
                                                                <span class="time">
                                                                    <?php
                                                                    $startYear = date('Y', strtotime($education->start_date));
                                                                    $endYear = date('Y', strtotime($education->end_date));
                                                                    ?>
                                                                    {{ $startYear }} - {{ $endYear }}</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @empty
                                                    <li>No educations available</li>
                                                @endforelse
                                            </ul>
                                        </div>
                                    </div>


                                    <div class="widget experience-widget">
                                        <h4 class="widget-title">Work & Experience</h4>
                                        <div class="experience-box">
                                            <ul class="experience-list">

                                                @forelse ($doctor->experiences as $experience)
                                                    <li>
                                                        <div class="experience-user">
                                                            <div class="before-circle"></div>
                                                        </div>
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <a href="#/"
                                                                    class="name">{{ $experience->job_title }}</a>

                                                                <?php
                                                                $startYear = date('Y', strtotime($experience->start_date));
                                                                $endYear = date('Y', strtotime($experience->end_date));
                                                                ?>

                                                                <span class="time">{{ $startYear }} -
                                                                    {{ $endYear }}</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @empty
                                                    <li>No Work Experience available</li>
                                                @endforelse

                                            </ul>
                                        </div>
                                    </div>


                                    <div class="widget awards-widget">
                                        <h4 class="widget-title">Awards</h4>
                                        <div class="experience-box">
                                            <ul class="experience-list">
                                                @forelse ($doctor->awards as $award)
                                                    <li>
                                                        <div class="experience-user">
                                                            <div class="before-circle"></div>
                                                        </div>
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <p class="exp-year">
                                                                    {{ $startYear = date('M Y', strtotime($award->year)) }}
                                                                </p>
                                                                <h4 class="exp-title">{{ $award->award->name }}</h4>
                                                                <p>{{ $award->description }}</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @empty
                                                    <li>
                                                        <div class="experience-user">
                                                            <div class="before-circle"></div>
                                                        </div>
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <p class="exp-year">July 2024</p>
                                                                <h4 class="exp-title">Not Found</h4>
                                                                {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                                Proin a ipsum tellus. Interdum et malesuada fames ac ante
                                                                ipsum primis in faucibus.</p> --}}
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforelse

                                            </ul>
                                        </div>
                                    </div>


                                    <div class="service-list">
                                        <h4>Services</h4>
                                        <ul class="clearfix">
                                            @forelse ($doctor->services as $service)
                                                <li>{{ $service->name }} </li>

                                            @empty
                                                <li>No Services available</li>
                                            @endforelse
                                        </ul>
                                    </div>


                                    <div class="service-list">
                                        <h4>Specializations</h4>
                                        <ul class="clearfix">
                                            @forelse ($doctor->specializations as $specializaion)
                                                <li>{{ $specializaion->name }}</li>
                                            @empty
                                                <li>No Specialization available</li>
                                            @endforelse
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div role="tabpanel" id="doc_locations" class="tab-pane fade">

                            <div class="location-list">
                                <div class="row">

                                    <iframe src="https://www.google.com/maps?q={{ $encodedAddress }}&output=embed"
                                        width="100%" height="450" frameborder="0" style="border:0"
                                        allowfullscreen></iframe>


                                </div>
                            </div>


                        </div>

                        <div role="tabpanel" id="doc_reviews" class="tab-pane fade">

                            <div class="widget review-listing">
                                @include('frontend.doctor.review')
                            </div>
                            @if (Auth()->user() && $ratingButton == true)
                                <div class="rate-form">
                                    <h4 class="mb-4">Add Review</h4>
                                    @include('frontend.doctor.review_form')
                                </div>
                            @endif
                        </div>
                        <div role="tabpanel" id="doc_business_hours" class="tab-pane fade">
                            <div class="row">
                                <div class="col-md-6 offset-md-3">

                                    <div class="widget business-widget">
                                        <div class="widget-content">
                                            <div class="listing-hours">
                                                {{-- <div class="listing-day current">
                                                    <div class="day">Today <span>5 Nov 2024</span></div>
                                                    <div class="time-items">
                                                        <span class="open-status"><span
                                                                class="badge bg-success-light">Open Now</span></span>
                                                        <span class="time">07:00 AM - 09:00 PM</span>
                                                    </div>
                                                </div> --}}
                                                @forelse ($doctor->workingHour as $workingHour)
                                                    <div class="listing-day">
                                                        <div class="day">{{ $workingHour->daysOfWeek->name }}</div>
                                                        <div class="time-items">
                                                            <?php
                                                            $startTime = Date::createFromFormat('H:i:s', $workingHour->start_time);
                                                            $endTime = Date::createFromFormat('H:i:s', $workingHour->end_time);
                                                            $startTime12 = $startTime->format('h:i A');
                                                            $endTime12 = $endTime->format('h:i A');
                                                            ?>
                                                            <span class="time">{{ $startTime12 }} -
                                                                {{ $endTime12 }}</span>
                                                        </div>
                                                    </div>
                                                @empty
                                                @endforelse

                                                {{-- <div class="listing-day closed">
                                                    <div class="day">Sunday</div>
                                                    <div class="time-items">
                                                        <span class="time"><span
                                                                class="badge bg-danger-light">Closed</span></span>
                                                    </div>
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
    </div>
    <div class="modal" id="add_rating">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Rating</h5>
                    <button type="button" class="btn-close close-form-add" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('frontend.doctor.review_form')
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script>
        function getReviewDetailsByPatientId(id, rating, title, review) {
            $("#rating-" + rating.replace(/\./g, "_")).prop('checked', true);
            $("#review").val(review);
            $('#review_id').val(id);
            $('#title').val(title);
        }
        jQuery(document).ready(function($) {
            jQuery("#addRatingForm").validate({
                rules: {
                    rating: "required",
                    review: "required",
                    title: "required",
                },
                messages: {
                    rating: "Please Select the Rating",
                    review: "Please Enter Review",
                    title: "Please Enter title",
                },
                submitHandler: function(form) {
                    var data = $(form).serialize();
                    $.ajax({
                        url: "{{ route('add.doctor.review') }}",
                        type: 'POST',
                        data: data,
                        success: function(response) {
                            jQuery('#add_rating').modal('hide');
                            swal.fire("Done!", response.message, "success");
                            jQuery("#addRatingForm")[0].reset();
                            jQuery('#review_list').replaceWith(response.data);
                        },
                        error: function(error_messages) {
                            let errors = error_messages.responseJSON.error;
                            for (var error_key in errors) {
                                $(document).find('[name=' + error_key + ']').after(
                                    '<span class="' + error_key +
                                    '_error text text-danger">' + errors[
                                        error_key] + '</span>');
                                setTimeout(function() {
                                    jQuery("." + error_key + "_error").remove();
                                }, 5000);
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection
