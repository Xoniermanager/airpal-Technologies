
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
                                                onerror="this.src='{{ asset('assets/img/doctors/doctor-thumb-01.jpg') }}';">
                                        </a>
                                    </div>
                                </a>

                            </div>
                            <div class="doc-content">
                                <div class="doc-pro-info">
                                    <div class="doc-pro-name">
                                        <a
                                            href="{{ route('frontend.doctor.profile', ['user' => Crypt::encrypt($doctor->id)]) }}">{{ $doctor->fullName }}</a>
                                        @forelse ($doctor->specializations as $specializaion)
                                            <span>{{ $specializaion->name }},</span>
                                        @empty
                                            <span>No Specialization available</span>
                                        @endforelse
                                    </div>
                                    <div class="reviews-ratings">
                                        <p>
                                            {!! getRatingHtml($doctor->allover_rating) !!}
                                            {{-- <span><i class="fas fa-star"></i> 4.5</span> (35) --}}
                                        </p>
                                    </div>
                                </div>
                                <div class="doc-pro-location">
                                    @if (isset($doctor->doctorAddress))
                                        @php
                                            $address = $doctor->doctorAddress->address ?? '';
                                            $city = $doctor->doctorAddress->city ?? '';
                                            $fullAddress = $address . ' ' . $city . ' india';
                                            $encodedAddress = str_replace(' ', '+', $fullAddress);
                                        @endphp

                                        <a href="https://www.google.com/maps?q={{ $encodedAddress }}" target="_blank">
                                            <span>
                                                <i class="fas fa-map-marker-alt"></i><strong>
                                                    {{ isset($doctor->doctorAddress->address) ? $doctor->doctorAddress->address : '' }}
                                                    {{ isset($doctor->doctorAddress->city) ? ', ' . $doctor->doctorAddress->city : '' }}
                                                    {{ isset($doctor->doctorAddress->states->name) ? ', ' . $doctor->doctorAddress->states->name : '' }}
                                                    {{ isset($doctor->doctorAddress->states->country->name) ? ', ' . $doctor->doctorAddress->states->country->name : '' }}
                                                </strong>
                                            </span>
                                        </a>

                                        {{-- <p class="doc-location"><i class="feather-map-pin"></i>{{$doctor->doctorAddress->city ?? ''}} {{','. $doctor->doctorAddress->states->country->name ??'' }} - 
                        <a href="javascript:void(0);">Get Directions</a></p>   --}}
                                    @else
                                        <p class="doc-location"><i class="feather-map-pin"></i> - <a
                                                href="javascript:void(0);">Get Directions</a></p>
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
