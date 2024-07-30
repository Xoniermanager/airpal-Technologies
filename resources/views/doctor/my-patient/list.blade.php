<div class="tab-content appointment-tab-content grid-patient" id="my-patient-list">
    <div class="tab-pane fade show active" id="pills-upcoming" role="tabpanel"
        aria-labelledby="pills-upcoming-tab">
        <div class="row">

            @forelse ($patients as $patient)
                
            <div class="col-xl-4 col-lg-6 col-md-6 d-flex">
                <div class="appointment-wrap appointment-grid-wrap">
                    <ul>
                        <li>
                            <div class="appointment-grid-head">
                                <div class="patinet-information">
                                    <a href="{{ route('doctor.doctor-patients.index') }}">
                                            <img src="{{ $patient->image_url }}" id="blah" 
                                            onerror="this.src='{{asset('assets/img/doctors/doctor-thumb-01.jpg')}}">
                                            
                                    </a>
                                    <div class="patient-info">
                                        <p>#Apt0001</p>
                                        <h6><a href="{{ route('doctor.doctor-patients.index') }}">{{$patient->fullName}}</a></h6>
                                        <ul>
                                            {{-- <li>Age : 42</li> --}}
                                            <li>{{$patient->gender ?? ''}}</li>
                                            <li>{{$patient->blood_group ?? ''}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="appointment-info"> 
                            <p><i class="fa-solid fa-clock"></i>Joined: {{ date('j M Y h:i A', strtotime($patient->created_at)) ?? '' }}</p>
                            <p class="mb-0"><i class="fa-solid fa-location-dot"></i>
                                {{$patient->patientAddress->address ?? ''}}
                                {{$patient->patientAddress->city ?? ''}}
                                {{$patient->patientAddress->state ?? ''}}
                                {{$patient->patientAddress->country->name ?? ''}}
                            </p>
                        </li>
                        <li class="appointment-action">
                            <div class="patient-book">
                                <p><i class="fa-solid fa-calendar-days"></i>Last Booking
                                    <span>27 Feb 2024</span></p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            @empty
                
            <h4 class="text-danger" style="
            /* background: #ddf6fa; */
            padding: 10px;
            border-radius: 10px;
            margin: 0 10px;
        "> Patient Not Found</h4>
            @endforelse

            {{-- <div class="col-md-12">
                <div class="loader-item text-center">
                    <a href="javascript:void(0);" class="btn btn-load">Load More</a>
                </div>
            </div> --}}
        </div>
    </div>
    {{-- <div class="tab-pane fade" id="pills-cancel" role="tabpanel"
        aria-labelledby="pills-cancel-tab">
        <div class="row">

            <div class="col-xl-4 col-lg-6 col-md-6 d-flex">
                <div class="appointment-wrap appointment-grid-wrap">
                    <ul>
                        <li>
                            <div class="appointment-grid-head">
                                <div class="patinet-information">
                                    <a href="{{ route('doctor.doctor-patients.index') }}">
                                        <img src="../assets/img/doctors-dashboard/profile-06.jpg"
                                            alt="">
                                    </a>
                                    <div class="patient-info">
                                        <p>#Apt0006</p>
                                        <h6><a href="{{ route('doctor.doctor-patients.index') }}">Anderea Kearns</a>
                                        </h6>
                                        <ul>
                                            <li>Age : 40</li>
                                            <li>Female</li>
                                            <li>B-</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="appointment-info">
                            <p><i class="fa-solid fa-clock"></i>26 Sep 2024 10.20 AM</p>
                            <p class="mb-0"><i class="fa-solid fa-location-dot"></i>San
                                Francisco, USA</p>
                        </li>
                        <li class="appointment-action">
                            <div class="patient-book">
                                <p><i class="fa-solid fa-calendar-days"></i>Last Booking<span>11
                                        Feb 2024</span></p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="col-xl-4 col-lg-6 col-md-6 d-flex">
                <div class="appointment-wrap appointment-grid-wrap">
                    <ul>
                        <li>
                            <div class="appointment-grid-head">
                                <div class="patinet-information">
                                    <a href="{{ route('doctor.doctor-patients.index') }}">
                                        <img src="../assets/img/doctors-dashboard/profile-01.jpg"
                                            alt="">
                                    </a>
                                    <div class="patient-info">
                                        <p>#Apt0009</p>
                                        <h6><a href="{{ route('doctor.doctor-patients.index') }}">Darrell Tan</a></h6>
                                        <ul>
                                            <li>Age : 31</li>
                                            <li>Male</li>
                                            <li>AB+</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="appointment-info">
                            <p><i class="fa-solid fa-clock"></i>25 Aug 2024 10.45 AM</p>
                            <p class="mb-0"><i class="fa-solid fa-location-dot"></i>San Antonio,
                                USA</p>
                        </li>
                        <li class="appointment-action">
                            <div class="patient-book">
                                <p><i class="fa-solid fa-calendar-days"></i>Last Booking<span>03
                                        Jan 2024</span></p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="col-xl-4 col-lg-6 col-md-6 d-flex">
                <div class="appointment-wrap appointment-grid-wrap">
                    <ul>
                        <li>
                            <div class="appointment-grid-head">
                                <div class="patinet-information">
                                    <a href="{{ route('doctor.doctor-patients.index') }}">
                                        <img src="../assets/img/doctors-dashboard/profile-04.jpg"
                                            alt="">
                                    </a>
                                    <div class="patient-info">
                                        <p>#Apt0004</p>
                                        <h6><a href="{{ route('doctor.doctor-patients.index') }}">Catherine Gracey</a>
                                        </h6>
                                        <ul>
                                            <li>Age : 36</li>
                                            <li>Female</li>
                                            <li>AB-</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="appointment-info">
                            <p><i class="fa-solid fa-clock"></i>18 Oct 2024 12.20 PM</p>
                            <p class="mb-0"><i class="fa-solid fa-location-dot"></i>Los Angeles,
                                USA</p>
                        </li>
                        <li class="appointment-action">
                            <div class="patient-book">
                                <p><i class="fa-solid fa-calendar-days"></i>Last Booking<span>27
                                        Feb 2024</span></p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-12">
                <div class="loader-item text-center">
                    <a href="javascript:void(0);" class="btn btn-load">Load More</a>
                </div>
            </div>
        </div>
    </div> --}}
</div>