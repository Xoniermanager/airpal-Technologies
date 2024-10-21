<section class="doctors-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 aos">
                <div class="section-header-one section-header-slider">
                    <h2 class="section-title">Top Doctors</h2>
                </div>
            </div>
            <div class="col-md-6 aos">
                <div class="owl-nav slide-nav-2 text-end nav-control"></div>
            </div>
        </div>
        @isset($doctorList)
            <div class="owl-carousel doctor-slider-one owl-theme aos">
                @foreach ($doctorList as $doctor)
                    <div class="item">
                        <div class="doctor-profile-widget">
                            <div class="doc-pro-img">
                                <a href="#">
                                    <div class="doctor-profile-img">
                                        <a
                                            href="{{ route('frontend.doctor.profile', ['user' => Crypt::encrypt($doctor->id)]) }}">
                                            <img src="{{ $doctor['image_url'] }}" class="img-fluid doctor-slider-image"
                                                alt="Ruby Perrin"
                                                onerror="this.src='{{ asset('assets/img/user.jpg') }}';">
                                        </a>
                                    </div>
                                </a>

                            </div>
                            <div class="doc-content">
                                <div class="doc-pro-info">
                                    <div class="doc-pro-name">
                                        <a href="{{ route('frontend.doctor.profile', ['user' => Crypt::encrypt($doctor->id)]) }}">Dr.&nbsp;{{ $doctor->fullName }}</a>
                                        <p>          {{ formatDoctorSpecializations($doctor) }}</p>
                                    </div>
                                    <div class="reviews-ratings">
                                        <p>
                                            <span><i class="fas fa-star"></i> {{ $doctor->allover_rating ?? 0 }}</span>
                                            
                                            ({{ count($doctor->getAllDoctorReviews()) }})

                                        </p>
                                    </div>
                                    {{-- <div class="reviews-ratings">
                                        <p>
                                            {!! getRatingHtml($doctor->allover_rating) !!}
                                        </p>
                                    </div> --}}
                                </div>
                                {{-- <div class="doc-pro-info">
                          
                                </div> --}}

                                <div class="doc-pro-location">
                                    @if (isset($doctor->doctorAddress))
                                        <span>
                                            <i class="feather-map-pin"></i>
                                     
                                                {{ formatDoctorAddress($doctor) }}
                                           
                                            <a href="https://www.google.com/maps?q={{  encodeAddress($doctor) }}" target="_blank"
                                                style="color: blue">
                                                Get Directions </a>
                                        </span>
                                    @else
                                        <span class="doc-location">
                                            <i class="feather-map-pin"></i> - Address Not Added
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach



            </div>
        @endisset

    </div>
</section>
