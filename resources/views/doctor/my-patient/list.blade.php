<div id="patient_list">
    <div class="appointment-tab-head">
        <div class="appointment-tab-head">
            <div class="appointment-tabs">
                <ul class="nav nav-pills inner-tab " id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="all_tab" data-bs-toggle="pill"
                            data-bs-target="#pills-upcoming" type="button" role="tab"
                            aria-controls="pills-upcoming" aria-selected="false" tabindex="-1">All
                            Patients<span>{{ count($finalData['allPatients']) }}</span></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="new_tab" data-bs-toggle="pill" data-bs-target="#pills-complete"
                            type="button" role="tab" aria-controls="pills-complete" aria-selected="false"
                            tabindex="-1">New Patients<span>{{ count($finalData['newPatients']) }}</span></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="regular_tab" data-bs-toggle="pill" data-bs-target="#pills-cancel"
                            type="button" role="tab" aria-controls="pills-cancel" aria-selected="true">Regular
                            Patients<span>{{ count($finalData['regularPatients']) }}</span></button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="tab-content appointment-tab-content">
        <div class="tab-pane fade active show" id="pills-upcoming" role="tabpanel" aria-labelledby="all_tab">
            <div class="row">
                @forelse ($finalData['allPatients'] as $patientDetails)
                    @php
                        $lastBookingDate = '';
                        $upcomingAppointment = false;
                        if (isset($patientDetails['upcoming']) && isset($patientDetails['last_booking'])) {
                            $lastBookingDate =
                                $patientDetails['upcoming']->booking_date ??
                                $patientDetails['last_booking']->booking_date;
                        }
                    @endphp
                    <div class="col-xl-4 col-lg-6 col-md-6 d-flex">
                        <div class="appointment-wrap appointment-grid-wrap">
                            <ul>
                                <li>
                                    <div class="appointment-grid-head">
                                        <div class="patinet-information">
                                            <a href="{{ route('doctor-patient-profile', ['id' => Crypt::encrypt($patientDetails['patient_details']->id)]) }}"">
                                                <img src="{{ $patientDetails['patient_details']->image_url }}"
                                                    id="blah"
                                                    onerror="this.src='{{ asset('assets/img/doctors/doctor-thumb-01.jpg') }}">

                                            </a>
                                            <div class="patient-info">
                                                {{-- <p>#Apt0001</p> --}}
                                                <h6><a
                                                        href="{{ route('doctor-patient-profile', ['id' => Crypt::encrypt($patientDetails['patient_details']->id)]) }}"">{{ $patientDetails['patient_details']->fullName }}</a>
                                                </h6>
                                                <ul>
                                                    {{-- <li>Age : 42</li> --}}
                                                    <li>{{ $patientDetails['patient_details']->gender ?? '' }}</li>
                                                    <li>{{ $patientDetails['patient_details']->blood_group ?? '' }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                        @if ($lastBookingDate >= now())
                                            <small class="">
                                                <p class="m-0 text-primary">
                                                    <i class="fa fa-calendar-day"></i>
                                                    {{ date('j M Y', strtotime($lastBookingDate)) }}
                                                </p>
                                            </small>
                                        @endif
                                    </div>
                                </li>
                                <li class="appointment-info">
                                    <p><i class="fa-solid fa-clock"></i>Joined:
                                        {{ date('j M Y h:i A', strtotime($patientDetails['patient_details']->created_at)) ?? '' }}
                                    </p>
                                    <p class="mb-0"><i class="fa-solid fa-location-dot"></i>
                                        {{ $patientDetails['patient_details']->patientAddress->address ?? '' }}
                                        {{ $patientDetails['patient_details']->patientAddress->city ?? '' }}
                                        {{ $patientDetails['patient_details']->patientAddress->state ?? '' }}
                                        {{ $patientDetails['patient_details']->patientAddress->country->name ?? '' }}
                                    </p>
                                </li>
                                <li class="appointment-action">
                                    <div class="patient-book">
                                        <p><i class="fa-solid fa-calendar-days"></i> Last Booked
                                            <span>{{ date('j M Y', strtotime($lastBookingDate)) }}</span>
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
        <div class="tab-pane fade" id="pills-complete" role="tabpanel" aria-labelledby="new_tab">
            <div class="row">
                @forelse ($finalData['newPatients'] as $patientDetails)
                    @php
                        $lastBookingDate = '';
                        if (isset($patientDetails['upcoming']) && isset($patientDetails['last_booking'])) {
                            $lastBookingDate =
                                $patientDetails['upcoming']->booking_date ??
                                $patientDetails['last_booking']->booking_date;
                        }
                    @endphp
                    <div class="col-xl-4 col-lg-6 col-md-6 d-flex">
                        <div class="appointment-wrap appointment-grid-wrap">
                            <ul>
                                <li>
                                    <div class="appointment-grid-head">
                                        <div class="patinet-information">
                                            <a href="{{ route('doctor-patient-profile', ['id' => Crypt::encrypt($patientDetails['patient_details']->id)]) }}">
                                                <img src="{{ $patientDetails['patient_details']->image_url }}"
                                                    id="blah"
                                                    onerror="this.src='{{ asset('assets/img/doctors/doctor-thumb-01.jpg') }}">

                                            </a>
                                            <div class="patient-info">
                                                {{-- <p>#Apt0001</p> --}}
                                                <h6><a
                                                        href="{{ route('doctor-patient-profile', ['id' => Crypt::encrypt($patientDetails['patient_details']->id)]) }}">{{ $patientDetails['patient_details']->fullName }}</a>
                                                </h6>
                                                <ul>
                                                    {{-- <li>Age : 42</li> --}}
                                                    <li>{{ $patientDetails['patient_details']->gender ?? '' }}</li>
                                                    <li>{{ $patientDetails['patient_details']->blood_group ?? '' }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        @if ($lastBookingDate >= now())
                                            <small class="">
                                                <p class="m-0 text-primary">
                                                    <i class="fa fa-calendar-day"></i>
                                                    {{ date('j M Y', strtotime($lastBookingDate)) }}
                                                </p>
                                            </small>
                                        @endif

                                    </div>
                                </li>
                                <li class="appointment-info">
                                    <p><i class="fa-solid fa-clock"></i>Joined:
                                        {{ date('j M Y h:i A', strtotime($patientDetails['patient_details']->created_at)) ?? '' }}
                                    </p>
                                    <p class="mb-0"><i class="fa-solid fa-location-dot"></i>
                                        {{ $patientDetails['patient_details']->patientAddress->address ?? '' }}
                                        {{ $patientDetails['patient_details']->patientAddress->city ?? '' }}
                                        {{ $patientDetails['patient_details']->patientAddress->state ?? '' }}
                                        {{ $patientDetails['patient_details']->patientAddress->country->name ?? '' }}
                                    </p>
                                </li>
                                <li class="appointment-action">
                             
                                    <div class="patient-book">
                                        <p><i class="fa-solid fa-calendar-days"></i> Last Booked
                                            <span>{{ date('j M Y', strtotime($lastBookingDate)) }}</span>
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
        <div class="tab-pane fade" id="pills-cancel" role="tabpanel" aria-labelledby="regular_tab">
            <div class="row">
                @forelse ($finalData['regularPatients'] as $patientDetails)
                    @php
                        $lastBookingDate = '';
                        if (isset($patientDetails['upcoming']) && isset($patientDetails['last_booking'])) {
                            $lastBookingDate =
                                $patientDetails['upcoming']->booking_date ??
                                $patientDetails['last_booking']->booking_date;
                        }
                    @endphp
                    <div class="col-xl-4 col-lg-6 col-md-6 d-flex">
                        <div class="appointment-wrap appointment-grid-wrap">
                            <ul>
                                <li>
                                    <div class="appointment-grid-head">
                                        <div class="patinet-information">
                                            <a href="{{ route('doctor-patient-profile', ['id' => Crypt::encrypt($patientDetails['patient_details']->id)]) }}">
                                                <img src="{{ $patientDetails['patient_details']->image_url }}"
                                                    id="blah"
                                                    onerror="this.src='{{ asset('assets/img/doctors/doctor-thumb-01.jpg') }}">

                                            </a>
                                            <div class="patient-info">
                                                {{-- <p>#Apt0001</p> --}}
                                                <h6><a
                                                    href="{{ route('doctor-patient-profile', ['id' => Crypt::encrypt($patientDetails['patient_details']->id)]) }}">{{ $patientDetails['patient_details']->fullName }}</a>
                                                </h6>
                                                <ul>
                                                    {{-- <li>Age : 42</li> --}}
                                                    <li>{{ $patientDetails['patient_details']->gender ?? '' }}</li>
                                                    <li>{{ $patientDetails['patient_details']->blood_group ?? '' }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        @if ($lastBookingDate >= now())
                                            <small class="">
                                                <p class="m-0 text-primary">
                                                    <i class="fa fa-calendar-day"></i>
                                                    {{ date('j M Y', strtotime($lastBookingDate)) }}
                                                </p>
                                            </small>
                                        @endif
                                    </div>
                                </li>
                                <li class="appointment-info">
                                    <p><i class="fa-solid fa-clock"></i>Joined:
                                        {{ date('j M Y h:i A', strtotime($patientDetails['patient_details']->created_at)) ?? '' }}
                                    </p>
                                    <p class="mb-0"><i class="fa-solid fa-location-dot"></i>
                                        {{ $patientDetails['patient_details']->patientAddress->address ?? '' }}
                                        {{ $patientDetails['patient_details']->patientAddress->city ?? '' }}
                                        {{ $patientDetails['patient_details']->patientAddress->state ?? '' }}
                                        {{ $patientDetails['patient_details']->patientAddress->country->name ?? '' }}
                                    </p>
                                </li>
                                <li class="appointment-action">
                                    <div class="patient-book">
                                        <p><i class="fa-solid fa-calendar-days"></i> Last Booked
                                            <span>{{ date('j M Y', strtotime($lastBookingDate)) }}</span>
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
</div>
