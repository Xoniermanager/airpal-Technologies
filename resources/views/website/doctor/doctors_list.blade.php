                        <div id="doctors_list">
                            @forelse ($doctors as $key => $doctor)
                            <div class="card doctor-card">
                                <div class="card-body">
                                    <div class="doctor-widget-one">
                                        <div class="doc-info-left">
                                            <div class="doctor-img">
                                                <a
                                                    href="{{ route('frontend.doctor.profile', ['user' => Crypt::encrypt($doctor->id)]) }}">
                                                    <img src="{{ $doctor['image_url'] }}"
                                                         onerror="this.src='{{ asset('assets/img/user.jpg') }}';"
                                                        class="img-fluid" alt="John Doe">
                                                </a>
                                                <div class="favourite-btn">
                                                    <input type="checkbox" id="heart-{{ $doctor->id }}"
                                                        style="display: none"
                                                        @if (Auth::check()) onclick="toggleFavorite({{ $doctor->id }}, {{ auth()->user()->id }}, this)"
                                                        @if (in_array($doctor->id, $favoriteDoctorsList)) checked @endif
                                                    @else {{-- onclick="alert('Please log in to favorite doctors.');"  --}} @endif>
                                                    <label for="heart-{{ $doctor->id }}">❤</label>
                                                </div>


                                            </div>
                                            <div class="doc-info-cont">
                                                <h4 class="doc-name">
                                                    <a
                                                        href="{{ route('frontend.doctor.profile', ['user' => Crypt::encrypt($doctor->id)]) }}">{{ $doctor->first_name . ' ' . $doctor->last_name }}</a>
                                                    <i class="fas fa-circle-check"></i>
                                                </h4>
                                                <span class="doc-speciality">
                                                    {{ formatDoctorEducations($doctor) }}
                                                </span>
                                                <div>
                                                    @isset($doctor)
                                                    @forelse ($doctor->specializations as $specialization)
                                                    <span class="badge badge-info text-white">{{ $specialization->name }}</span>
                                                    @empty
                                                    <p>N/A</p>
                                                    @endforelse
                                                    @endisset
                                                </div>
                                                <div class="clinic-details">
                                                    <div>
                                                        @if (isset($doctor->doctorAddress))
                                                            <p>
                                                                <span>
                                                                    <i class="feather-map-pin"></i><strong>
                                                                        {{ formatDoctorAddress($doctor) }}
                                                                    </strong>
                                                                    <a href="https://www.google.com/maps?q={{ encodeAddress($doctor) }}"
                                                                        target="_blank" style="color: blue">
                                                                        Get Directions </a>
                                                                </span>
                    
                                                            </p>
                                                        @else
                                                            <p class="doc-location">
                                                                <i class="feather-map-pin"></i> - Address Not Added
                                                            </p>
                                                        @endif
                    
                                                    </div>
                                             
                                                    <p class="doc-location">
                                                        <i class="feather-award"></i>
                                                        <span>{{ $doctor->experience_years == 0 || $doctor->experience_years == null ? 'Experience Not Added' : $doctor->experience_years . ' Years of Experience' }}</span>
                                                    </p>
                                                    <p class="doc-location">
                                                        <i class="feather-phone"></i>
                                                        <span>{{ !empty($doctor->phone) ? $doctor->phone : 'Not available' }}</span>
                                                    </p>
                                                    <p class="doc-location">
                                                        <i class="feather-mail"></i>
                                                        <span>{{ !empty($doctor->email) ? $doctor->email : 'Not available' }}</span>

                                                    </p>


                                                </div>

                                            </div>
                                        </div>
                                        <div class="doc-info-right">
                                            <div class="clinic-booking book-appoint">
                                                <a class="btn btn-primary"
                                                    href="{{ route('appointment.index', ['id' => Crypt::encrypt($doctor->id)]) }}">Book
                                                    Appointment</a>
                                                <a class="btn btn-primary-light" href="#">Book Online
                                                    Consultation</a>
                                                <div class="reviews-ratings mt-4">
                                                    {!! getRatingHtml($doctor->allover_rating) !!}
                                                    ({{ count($doctor->doctorReview) }} Reviews)
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div>
                                <p>No Doctor Found</p>
                            </div>
                            @endforelse
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="mt-3 d-flex justify-content-end">
                                        {{ $doctors->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>


                        <style>
                            label[for^="heart-"] {
                                color: #aab8c2;
                                cursor: pointer;
                                font-size: 20px;
                                height: 29px;
                                width: 31px;
                                padding-left: 6px;
                                border-radius: 47px;
                                background: white;
                                align-self: center;
                                /* transition: color 0.2s ease-in-out; */
                            }

                            label[for^="heart-"]:hover {
                                color: grey;
                            }

                            label[for^="heart-"]::selection,
                            label[for^="heart-"]::moz-selection {
                                color: none;
                                background: transparent;
                            }

                            input[id^="heart-"]:checked+label {
                                color: #e2264d;
                                will-change: font-size;
                            }
                        </style>