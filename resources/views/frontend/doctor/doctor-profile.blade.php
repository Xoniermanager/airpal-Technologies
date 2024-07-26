@extends('layouts.doctor.main')
@section('content')
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
                                <img src="{{asset('images/').'/'.$doctor->image_url}}" class="img-fluid"
                                    alt=""   onerror="this.src='{{asset('assets/img/doctors/doctor-thumb-01.jpg')}}';" >
                            </div>
                            <div class="doc-info-cont">
                                <h4 class="doc-name">{{$doctor->first_name}} {{$doctor->last_name}}</h4>
                                {{-- <p class="doc-speciality">{{$specializationsString}}</p> --}}
                                <p class="doc-speciality"  style="font-weight:600"> 
                                @forelse ($doctor->educations as $education)
                                {{$education->course->name}}
                                @if( !$loop->last)
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
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="d-inline-block average-rating">(35)</span>
                                </div>
                                <div class="clinic-details">

                                    @php
                                    $address = $doctor->doctorAddress->address ?? '';
                                    $city = $doctor->doctorAddress->city ?? '';
                                    $fullAddress = $address . ' ' . $city . ' india';
                                    $encodedAddress = str_replace(' ', '+', $fullAddress);
                                    @endphp

        


                                    @if (isset($doctor->doctorAddress))
                                        <p><i class="fas fa-map-marker-alt"></i>{{ $doctor->doctorAddress->address ?? ''}} {{','.$doctor->doctorAddress->city ?? ''}}  {{','.$doctor->doctorAddress->states->name ??''}} {{','. $doctor->doctorAddress->states->country->name ??'' }}
                                            <a href="https://www.google.com/maps?q={{ $encodedAddress }}" target="_blank" style="color: blue">Get Directions
                                        </a>

                                    </p>  
                                    @else
                                    <p class="doc-location"><i class="fas fa-map-marker-alt"></i> - <a href="javascript:void(0);">Get Directions</a></p>
                                    @endif
        

                                </div>
                                <div class="clinic-services">
                                    @forelse ($doctor->specializations as $specializaion)
                                    <span>{{$specializaion->name}}</span>
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
                                    <li><i class="fas fa-map-marker-alt"></i> {{ $doctor->doctorAddress->address ??'' }} {{','.$doctor->doctorAddress->city ??'' }}  {{','.$doctor->doctorAddress->states->name ??'' }} {{','. $doctor->doctorAddress->states->country->name ??'' }} </li>
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
                            <div class="clinic-booking">
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
                                        <p>{{$doctor->description}}</p>
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
                                                            <a href="#" class="name">{{$education->institute_name}}</a>
                                                            <div>BDS</div>
                                                            <span class="time">
                                                                <?php
                                                                    $startYear=  date('Y', strtotime($education->start_date));
                                                                    $endYear=  date('Y', strtotime($education->end_date));
                                                                ?>
                                                               {{$startYear}} - {{$endYear}}</span>
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
                                                                <a href="#/" class="name">{{$experience->job_title}}</a>

                                                                <?php
                                                                        $startYear =  date('Y', strtotime($experience->start_date));
                                                                        $endYear   =  date('Y', strtotime($experience->end_date));
                                                                    ?>

                                                                <span class="time">{{$startYear}} - {{$endYear}}</span>
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
                                                            <p class="exp-year">{{  $startYear =  date('M Y', strtotime($award->year)) }}</p>
                                                            <h4 class="exp-title">{{ $award->award->name }}</h4>
                                                            <p>{{ $award->description}}</p>
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
                                            
                                            <li>{{$service->name}} </li>

                                            @empty
                                                <li>No Services available</li>
                                            @endforelse
                                        </ul>
                                    </div>


                                    <div class="service-list">
                                        <h4>Specializations</h4>
                                        <ul class="clearfix">
                                              @forelse ($doctor->specializations as $specializaion)
                                              <li>{{$specializaion->name}}</li>
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
                                    
                                    <iframe src="https://www.google.com/maps?q={{ $encodedAddress }}&output=embed" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>


                                </div>
                            </div>


                        </div>

                        <div role="tabpanel" id="doc_reviews" class="tab-pane fade">

                            <div class="widget review-listing">
                                <ul class="comments-list">

                                    <li>
                                        <div class="comment">
                                            <img class="avatar avatar-sm rounded-circle" alt=""
                                                src="{{ URL::asset('assets/img/patients/patient.jpg') }}">
                                            <div class="comment-body">
                                                <div class="meta-data">
                                                    <span class="comment-author">Richard Wilson</span>
                                                    <span class="comment-date">Reviewed 2 Days ago</span>
                                                    <div class="review-count rating">
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                </div>
                                                <p class="recommended"><i class="far fa-thumbs-up"></i> I recommend the
                                                    doctor</p>
                                                <p class="comment-content">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                    Ut enim ad minim veniam, quis nostrud exercitation.
                                                    Curabitur non nulla sit amet nisl tempus
                                                </p>
                                                <div class="comment-reply">
                                                    <a class="comment-btn" href="#">
                                                        <i class="fas fa-reply"></i> Reply
                                                    </a>
                                                    <p class="recommend-btn">
                                                        <span>Recommend?</span>
                                                        <a href="#" class="like-btn">
                                                            <i class="far fa-thumbs-up"></i> Yes
                                                        </a>
                                                        <a href="#" class="dislike-btn">
                                                            <i class="far fa-thumbs-down"></i> No
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <ul class="comments-reply">
                                            <li>
                                                <div class="comment">
                                                    <img class="avatar avatar-sm rounded-circle" alt=""
                                                        src="{{ URL::asset('assets/img/patients/patient1.jpg') }}">
                                                    <div class="comment-body">
                                                        <div class="meta-data">
                                                            <span class="comment-author">Charlene Reed</span>
                                                            <span class="comment-date">Reviewed 3 Days ago</span>
                                                            <div class="review-count rating">
                                                                <i class="fas fa-star filled"></i>
                                                                <i class="fas fa-star filled"></i>
                                                                <i class="fas fa-star filled"></i>
                                                                <i class="fas fa-star filled"></i>
                                                                <i class="fas fa-star"></i>
                                                            </div>
                                                        </div>
                                                        <p class="comment-content">
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                            sed do eiusmod tempor incididunt ut labore et dolore magna
                                                            aliqua.
                                                            Ut enim ad minim veniam.
                                                            Curabitur non nulla sit amet nisl tempus
                                                        </p>
                                                        <div class="comment-reply">
                                                            <a class="comment-btn" href="#">
                                                                <i class="fas fa-reply"></i> Reply
                                                            </a>
                                                            <p class="recommend-btn">
                                                                <span>Recommend?</span>
                                                                <a href="#" class="like-btn">
                                                                    <i class="far fa-thumbs-up"></i> Yes
                                                                </a>
                                                                <a href="#" class="dislike-btn">
                                                                    <i class="far fa-thumbs-down"></i> No
                                                                </a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>

                                    </li>


                                    <li>
                                        <div class="comment">
                                            <img class="avatar avatar-sm rounded-circle" alt=""
                                                src="{{ URL::asset('assets/img/patients/patient2.jpg') }}">
                                            <div class="comment-body">
                                                <div class="meta-data">
                                                    <span class="comment-author">Travis Trimble</span>
                                                    <span class="comment-date">Reviewed 4 Days ago</span>
                                                    <div class="review-count rating">
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                </div>
                                                <p class="comment-content">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                    Ut enim ad minim veniam, quis nostrud exercitation.
                                                    Curabitur non nulla sit amet nisl tempus
                                                </p>
                                                <div class="comment-reply">
                                                    <a class="comment-btn" href="#">
                                                        <i class="fas fa-reply"></i> Reply
                                                    </a>
                                                    <p class="recommend-btn">
                                                        <span>Recommend?</span>
                                                        <a href="#" class="like-btn">
                                                            <i class="far fa-thumbs-up"></i> Yes
                                                        </a>
                                                        <a href="#" class="dislike-btn">
                                                            <i class="far fa-thumbs-down"></i> No
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                </ul>

                                <div class="all-feedback text-center">
                                    <a href="#" class="btn btn-primary btn-sm">
                                        Show all feedback <strong>(167)</strong>
                                    </a>
                                </div>

                            </div>


                            <div class="write-review">
                                <h4>Write a review for <strong>Dr. Darren Elder</strong></h4>

                                <form>
                                    <div class="mb-3">
                                        <label class="mb-2">Review</label>
                                        <div class="star-rating">
                                            <input id="star-5" type="radio" name="rating" value="star-5">
                                            <label for="star-5" title="5 stars">
                                                <i class="active fa fa-star"></i>
                                            </label>
                                            <input id="star-4" type="radio" name="rating" value="star-4">
                                            <label for="star-4" title="4 stars">
                                                <i class="active fa fa-star"></i>
                                            </label>
                                            <input id="star-3" type="radio" name="rating" value="star-3">
                                            <label for="star-3" title="3 stars">
                                                <i class="active fa fa-star"></i>
                                            </label>
                                            <input id="star-2" type="radio" name="rating" value="star-2">
                                            <label for="star-2" title="2 stars">
                                                <i class="active fa fa-star"></i>
                                            </label>
                                            <input id="star-1" type="radio" name="rating" value="star-1">
                                            <label for="star-1" title="1 star">
                                                <i class="active fa fa-star"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="mb-2">Title of your review</label>
                                        <input class="form-control" type="text"
                                            placeholder="If you could say it in one sentence, what would you say?">
                                    </div>
                                    <div class="mb-3">
                                        <label class="mb-2">Your review</label>
                                        <textarea id="review_desc" maxlength="100" class="form-control"></textarea>
                                        <div class="d-flex justify-content-between mt-3"><small class="text-muted"><span
                                                    id="chars">100</span> characters remaining</small></div>
                                    </div>
                                    <hr>
                                    <div class="mb-3">
                                        <div class="terms-accept">
                                            <div class="custom-checkbox">
                                                <input type="checkbox" id="terms_accept">
                                                <label for="terms_accept">I have read and accept <a href="#">Terms
                                                        &amp; Conditions</a></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="submit-section">
                                        <button type="submit" class="btn btn-primary submit-btn">Add Review</button>
                                    </div>
                                </form>

                            </div>

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
                                                        <div class="day">{{$workingHour->daysOfWeek->name}}</div>
                                                        <div class="time-items">
                                                            <?php
                                                               $startTime   = Date::createFromFormat('H:i:s',$workingHour->start_time);
                                                               $endTime     = Date::createFromFormat('H:i:s',$workingHour->end_time);    
                                                               $startTime12 = $startTime->format('h:i A');
                                                               $endTime12   = $endTime->format('h:i A');
                                                            ?>
                                                            <span class="time">{{$startTime12}} - {{$endTime12}}</span>
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
@endsection
@section('javascript')
@endsection