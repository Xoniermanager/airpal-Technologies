@extends('layouts.frontend.main')
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
                                <img src="{{ $doctor['image_url'] }}" class="img-fluid" alt=""
                                    src='{{ asset('assets/img/doctors/doctor-thumb-01.jpg') }}'>
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
                                <p class="doc-department">
                                    @isset($doctor)
                                        @forelse ($doctor->specializations as $specialization)
                                            <span class="badge badge-info text-white">{{ $specialization->name }}</span>

                                        @empty
                                            <p>N/A</p>
                                        @endforelse
                                    @endisset

                                </p>
                                <div class="reviews-ratings">
                                    {!! getRatingHtml($doctor->allover_rating) !!}
                                    ({{ count($doctor->doctorReview) }} Reviews)
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
                                    <li><i class="far fa-comment"></i> ({{ count($doctor->doctorReview) }}) Feedback</li>
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
                                <a href="tel:{{ $doctor->phone ?? '' }}" class="btn btn-white call-btn"
                                   >
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
                                @include('website.doctor.review')
                            </div>
                            @if (Auth()->user() && $ratingButton == false)
                                <div class="rate-form" id="form-rate">
                                    <h4 class="mb-4">Add Review</h4>
                                    <form id="addRatingForm" enctype="multipart/form-data" novalidate="novalidate">
                                        @csrf
                                        <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                                        <div class="row">
                                            <div class="col-12 col-sm-12">
                                                <label class="mb-2">Rating *</label>
                                                <svg aria-hidden="true"
                                                    style="position: absolute; width: 0; height: 0; overflow: hidden;"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <defs>
                                                        <symbol id="icon-star" viewBox="0 0 26 28">
                                                            <path
                                                                d="M26 10.109c0 0.281-0.203 0.547-0.406 0.75l-5.672 5.531 1.344 7.812c0.016 0.109 0.016 0.203 0.016 0.313 0 0.406-0.187 0.781-0.641 0.781-0.219 0-0.438-0.078-0.625-0.187l-7.016-3.687-7.016 3.687c-0.203 0.109-0.406 0.187-0.625 0.187-0.453 0-0.656-0.375-0.656-0.781 0-0.109 0.016-0.203 0.031-0.313l1.344-7.812-5.688-5.531c-0.187-0.203-0.391-0.469-0.391-0.75 0-0.469 0.484-0.656 0.875-0.719l7.844-1.141 3.516-7.109c0.141-0.297 0.406-0.641 0.766-0.641s0.625 0.344 0.766 0.641l3.516 7.109 7.844 1.141c0.375 0.063 0.875 0.25 0.875 0.719z">
                                                            </path>
                                                        </symbol>
                                                        <symbol id="icon-star-half" viewBox="0 0 13 28">
                                                            <path
                                                                d="M13 0.5v20.922l-7.016 3.687c-0.203 0.109-0.406 0.187-0.625 0.187-0.453 0-0.656-0.375-0.656-0.781 0-0.109 0.016-0.203 0.031-0.313l1.344-7.812-5.688-5.531c-0.187-0.203-0.391-0.469-0.391-0.75 0-0.469 0.484-0.656 0.875-0.719l7.844-1.141 3.516-7.109c0.141-0.297 0.406-0.641 0.766-0.641v0z">
                                                            </path>
                                                        </symbol>
                                                    </defs>
                                                </svg>
                                                <div class="comment-stars">
                                                    <input class="comment-stars-input" type="radio" name="rating"
                                                        value="5" id="rating-5">
                                                    <label class="comment-stars-view" for="rating-5"><svg
                                                            class="icon icon-star">
                                                            <use xlink:href="#icon-star"></use>
                                                        </svg></label>
                                                    <input class="comment-stars-input" type="radio" name="rating"
                                                        value="4.5" id="rating-4_5"> <label
                                                        class="comment-stars-view is-half" for="rating-4.5"><svg
                                                            class="icon icon-star-half">
                                                            <use xlink:href="#icon-star-half"></use>
                                                        </svg></label>
                                                    <input class="comment-stars-input" type="radio" name="rating"
                                                        value="4" id="rating-4"> <label class="comment-stars-view"
                                                        for="rating-4"><svg class="icon icon-star">
                                                            <use xlink:href="#icon-star"></use>
                                                        </svg></label>
                                                    <input class="comment-stars-input" type="radio" name="rating"
                                                        value="3.5" id="rating-3_5"> <label
                                                        class="comment-stars-view is-half" for="rating-3.5"><svg
                                                            class="icon icon-star-half">
                                                            <use xlink:href="#icon-star-half"></use>
                                                        </svg></label>
                                                    <input class="comment-stars-input" type="radio" name="rating"
                                                        value="3" id="rating-3" checked> <label
                                                        class="comment-stars-view" for="rating-3"><svg
                                                            class="icon icon-star">
                                                            <use xlink:href="#icon-star"></use>
                                                        </svg></label>
                                                    <input class="comment-stars-input" type="radio" name="rating"
                                                        value="2.5" id="rating-2_5"> <label
                                                        class="comment-stars-view is-half" for="rating-2.5"><svg
                                                            class="icon icon-star-half">
                                                            <use xlink:href="#icon-star-half"></use>
                                                        </svg></label>
                                                    <input class="comment-stars-input" type="radio" name="rating"
                                                        value="2" id="rating-2"> <label class="comment-stars-view"
                                                        for="rating-2"><svg class="icon icon-star">
                                                            <use xlink:href="#icon-star"></use>
                                                        </svg></label>
                                                    <input class="comment-stars-input" type="radio" name="rating"
                                                        value="1.5" id="rating-1_5"> <label
                                                        class="comment-stars-view is-half" for="rating-1.5"><svg
                                                            class="icon icon-star-half">
                                                            <use xlink:href="#icon-star-half"></use>
                                                        </svg></label>
                                                    <input class="comment-stars-input" type="radio" name="rating"
                                                        value="1" id="rating-1"> <label class="comment-stars-view"
                                                        for="rating-1"><svg class="icon icon-star">
                                                            <use xlink:href="#icon-star"></use>
                                                        </svg></label>
                                                    <input class="comment-stars-input" type="radio" name="rating"
                                                        value="0.5" id="rating-0_5"> <label
                                                        class="comment-stars-view is-half" for="rating-0.5"><svg
                                                            class="icon icon-star-half">
                                                            <use xlink:href="#icon-star-half"></use>
                                                        </svg></label>
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-6 mb-3">
                                                <label class="mb-2">Title *</label>
                                                <input type="text" name="title" class="form-control">
                                            </div>
                                            <div class="col-12 col-sm-12 mb-3">
                                                <label class="mb-2">Review *</label>
                                                <textarea type="text" name="review" class="form-control"></textarea>
                                            </div>
                                            <div class="col-md-12 text-center">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
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
                    <h5 class="modal-title">Update Rating</h5>
                    <button type="button" class="btn-close close-form-add" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addRatingForm" enctype="multipart/form-data" novalidate="novalidate">
                        @csrf
                        <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                        <input type="hidden" name="id" id="review_id">
                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <label class="mb-2">Rating *</label>
                                <svg aria-hidden="true" style="position: absolute; width: 0; height: 0; overflow: hidden;"
                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <defs>
                                        <symbol id="icon-star" viewBox="0 0 26 28">
                                            <path
                                                d="M26 10.109c0 0.281-0.203 0.547-0.406 0.75l-5.672 5.531 1.344 7.812c0.016 0.109 0.016 0.203 0.016 0.313 0 0.406-0.187 0.781-0.641 0.781-0.219 0-0.438-0.078-0.625-0.187l-7.016-3.687-7.016 3.687c-0.203 0.109-0.406 0.187-0.625 0.187-0.453 0-0.656-0.375-0.656-0.781 0-0.109 0.016-0.203 0.031-0.313l1.344-7.812-5.688-5.531c-0.187-0.203-0.391-0.469-0.391-0.75 0-0.469 0.484-0.656 0.875-0.719l7.844-1.141 3.516-7.109c0.141-0.297 0.406-0.641 0.766-0.641s0.625 0.344 0.766 0.641l3.516 7.109 7.844 1.141c0.375 0.063 0.875 0.25 0.875 0.719z">
                                            </path>
                                        </symbol>
                                        <symbol id="icon-star-half" viewBox="0 0 13 28">
                                            <path
                                                d="M13 0.5v20.922l-7.016 3.687c-0.203 0.109-0.406 0.187-0.625 0.187-0.453 0-0.656-0.375-0.656-0.781 0-0.109 0.016-0.203 0.031-0.313l1.344-7.812-5.688-5.531c-0.187-0.203-0.391-0.469-0.391-0.75 0-0.469 0.484-0.656 0.875-0.719l7.844-1.141 3.516-7.109c0.141-0.297 0.406-0.641 0.766-0.641v0z">
                                            </path>
                                        </symbol>
                                    </defs>
                                </svg>
                                <div class="comment-stars">
                                    <input class="comment-stars-input rating-5" type="radio" name="rating"
                                        value="5">
                                    <label class="comment-stars-view" for="rating-5"><svg class="icon icon-star">
                                            <use xlink:href="#icon-star"></use>
                                        </svg></label>
                                    <input class="comment-stars-input rating-4_5" type="radio" name="rating"
                                        value="4.5"> <label class="comment-stars-view is-half" for="rating-4.5"><svg
                                            class="icon icon-star-half">
                                            <use xlink:href="#icon-star-half"></use>
                                        </svg></label>
                                    <input class="comment-stars-input rating-4" type="radio" name="rating"
                                        value="4"> <label class="comment-stars-view" for="rating-4"><svg
                                            class="icon icon-star">
                                            <use xlink:href="#icon-star"></use>
                                        </svg></label>
                                    <input class="comment-stars-input rating-3_5" type="radio" name="rating"
                                        value="3.5"> <label class="comment-stars-view is-half" for="rating-3.5"><svg
                                            class="icon icon-star-half">
                                            <use xlink:href="#icon-star-half"></use>
                                        </svg></label>
                                    <input class="comment-stars-input rating-3" type="radio" name="rating"
                                        value="3" checked> <label class="comment-stars-view" for="rating-3"><svg
                                            class="icon icon-star">
                                            <use xlink:href="#icon-star"></use>
                                        </svg></label>
                                    <input class="comment-stars-input rating-2_5" type="radio" name="rating"
                                        value="2.5"> <label class="comment-stars-view is-half" for="rating-2.5"><svg
                                            class="icon icon-star-half">
                                            <use xlink:href="#icon-star-half"></use>
                                        </svg></label>
                                    <input class="comment-stars-input rating-2" type="radio" name="rating"
                                        value="2"> <label class="comment-stars-view" for="rating-2"><svg
                                            class="icon icon-star">
                                            <use xlink:href="#icon-star"></use>
                                        </svg></label>
                                    <input class="comment-stars-input rating-1_5" type="radio" name="rating"
                                        value="1.5"> <label class="comment-stars-view is-half" for="rating-1.5"><svg
                                            class="icon icon-star-half">
                                            <use xlink:href="#icon-star-half"></use>
                                        </svg></label>
                                    <input class="comment-stars-input rating-1" type="radio" name="rating"
                                        value="1"> <label class="comment-stars-view" for="rating-1"><svg
                                            class="icon icon-star">
                                            <use xlink:href="#icon-star"></use>
                                        </svg></label>
                                    <input class="comment-stars-input rating-0_5" type="radio" name="rating"
                                        value="0.5"> <label class="comment-stars-view is-half" for="rating-0.5"><svg
                                            class="icon icon-star-half">
                                            <use xlink:href="#icon-star-half"></use>
                                        </svg></label>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6 mb-3">
                                <label class="mb-2">Title *</label>
                                <input type="text" name="title" id="title" class="form-control">
                            </div>
                            <div class="col-12 col-sm-12 mb-3">
                                <label class="mb-2">Review *</label>
                                <textarea type="text" name="review" class="form-control" id="review"></textarea>
                            </div>
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
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
        function getReviewDetailsByPatientId(id, rating, title, review) {
            $(".rating-" + rating.replace(/\./g, "_")).prop('checked', true);
            $("#review").val(review);
            $('#review_id').val(id);
            $('#title').val(title);
        }
        jQuery(document).ready(function($) {
            check_review_patient_doctor('{{ $doctor->id }}');
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
                            jQuery('#form-rate').hide();
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

            function check_review_patient_doctor(doctorId) {
                $.ajax({
                    url: "{{ route('check.review') }}",
                    type: "Get",
                    data: {
                        "doctorId": doctorId
                    },
                    success: function(response) {
                        if (response == 0) {
                            $('#form-rate').hide();
                        } else {
                            $('#form-rate').show();
                        }
                    },
                    error: function(error_messages) {
                        let errors = error_messages.responseJSON.error;
                    }
                });
            }
        });
    </script>
@endsection
