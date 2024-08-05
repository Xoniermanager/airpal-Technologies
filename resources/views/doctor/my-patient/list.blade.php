<div class="tab-content appointment-tab-content grid-patient" id="my-patient-list">
    <div class="tab-pane fade show active" id="pills-upcoming" role="tabpanel" aria-labelledby="pills-upcoming-tab">
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
                                                onerror="this.src='{{ asset('assets/img/doctors/doctor-thumb-01.jpg') }}">

                                        </a>
                                        <div class="patient-info">
                                            <p>#Apt0001</p>
                                            <h6><a
                                                    href="{{ route('doctor.doctor-patients.index') }}">{{ $patient->fullName }}</a>
                                            </h6>
                                            <ul>
                                                {{-- <li>Age : 42</li> --}}
                                                <li>{{ $patient->gender ?? '' }}</li>
                                                <li>{{ $patient->blood_group ?? '' }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="appointment-info">
                                <p><i class="fa-solid fa-clock"></i>Joined:
                                    {{ date('j M Y h:i A', strtotime($patient->created_at)) ?? '' }}</p>
                                <p class="mb-0"><i class="fa-solid fa-location-dot"></i>
                                    {{ $patient->patientAddress->address ?? '' }}
                                    {{ $patient->patientAddress->city ?? '' }}
                                    {{ $patient->patientAddress->state ?? '' }}
                                    {{ $patient->patientAddress->country->name ?? '' }}
                                </p>
                            </li>
                            <li class="appointment-action">
                                <div class="patient-book">
                                    <p><i class="fa-solid fa-calendar-days"></i>Last Booking
                                        <span>27 Feb 2024</span>
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            @empty

                <h4 class="text-danger"
                            style="
                    /* background: #ddf6fa; */
                    padding: 10px;
                    border-radius: 10px;
                    margin: 0 10px;
                ">
                    Patient Not Found</h4>
            @endforelse
        </div>
    </div>
</div>
