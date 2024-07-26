<div class="appointment-details-wrap" id="appointmentGrid">

    @forelse ($bookings as $booking )
    <div class="appointment-wrap appointment-detail-card">
        <ul>
            <li>
                <div class="patinet-information">
                    <a href="#">
                        <img src="{{ asset('images').'/'.$booking->patient->image_url}}"
                            alt="">
                    </a>
                    <div class="patient-info">
                        <p>#Apt0001</p>
                        <h6><a href="#">{{ $booking->patient->fullName }} </a></h6>
                        <div class="mail-info-patient">
                            <ul>
                                <li><i class="fa-solid fa-envelope"></i><a
                                        href=""
                                        class="__cf_email__">{{ $booking->patient->email }}</a>
                                </li>
                                <li><i class="fa-solid fa-phone"></i>{{ $booking->patient->phone }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
            <li class="appointment-info">
                <div class="person-info">
                    <p>Type of Appointment</p>
                    <ul class="d-flex apponitment-types">
                        <li><i class=" fa-solid fa-video text-green"></i>Video Call Appointment</li>
                    </ul>
                </div>
            </li>
            <li class="appointment-action">
                <div class="detail-badge-info">
                    <span class="badge bg-grey me-2">{{ ($booking->patient->bookedAppointments->count() < 2 ) ? 'New Patient' : '' }}</span>
                    <span class="badge bg-yellow">{{ ($booking->booking_date >= now()) ? 'Upcoming' : '' }}</span>
                </div>
                <div class="consult-fees">
                    <h6>Consultation Fees : $0 </h6>
                </div>
                <ul>
                    <li>
                        <a href="#"><i class="fa-solid fa-comments"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa-solid fa-xmark"></i></a>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="detail-card-bottom-info">
            <li>
                <h6>Appointment Date & Time</h6>
                <span>{{ date('j M Y',strtotime($booking->booking_date)) ?? '' }} - {{ date('h:i A', strtotime($booking->slot_start_time)) ?? '' }}</span>
            </li>
            {{-- <li>
                <h6>Clinic Location</h6>
                <span>Adrian’s Dentistry</span>
            </li> --}}
            <li>
                <h6>Location</h6>
                <span>Online Consultaion</span>
            </li>
            <li>
                <h6>Booked for Service</h6>
                <span>General</span>
            </li>
            <li>
                <div class="start-btn">
                    <a href="{{ route('doctor.appointments.index') }}" class="btn btn-secondary">Start
                        Session</a>
                </div>
            </li>
        </ul>
    </div>
    @empty
    <p>No Appointments Availables</p>
    @endforelse

    {{-- <div class="recent-appointments">
        <h5 class="head-text">Recent Appointments</h5>

        <div class="appointment-wrap">
            <ul>
                <li>
                    <div class="patinet-information">
                        <a href="#">
                            <img src="../assets/img/doctors-dashboard/profile-01.jpg"
                                alt="">
                        </a>
                        <div class="patient-info">
                            <p>#Apt0001</p>
                            <h6><a href="#">Adrian</a></h6>
                        </div>
                    </div>
                </li>
                <li class="appointment-info">
                    <p><i class="fa-solid fa-clock"></i>11 Nov 2024 10.45 AM</p>
                    <ul class="d-flex apponitment-types">
                        <li>General Visit</li>
                        <li>Chat</li>
                    </ul>
                </li>
                <li class="mail-info-patient">
                    <ul>
                        <li><i class="fa-solid fa-envelope"></i><a
                                href=""
                                class="__cf_email__"
                                data-cfemail="a1c0c5d3c0cfe1c4d9c0ccd1cdc48fc2cecc">[email&#160;protected]</a>
                        </li>
                        <li><i class="fa-solid fa-phone"></i>+1 504 368 6874</li>
                    </ul>
                </li>
                <li class="appointment-action">
                    <ul>
                        <li>
                            <a href="#"><i class="fa-solid fa-eye"></i></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>


        <div class="appointment-wrap">
            <ul>
                <li>
                    <div class="patinet-information">
                        <a href="#">
                            <img src="../assets/img/doctors-dashboard/profile-03.jpg"
                                alt="">
                        </a>
                        <div class="patient-info">
                            <p>#Apt0003</p>
                            <h6><a href="#">Samuel</a></h6>
                        </div>
                    </div>
                </li>
                <li class="appointment-info">
                    <p><i class="fa-solid fa-clock"></i>27 Oct 2024 09.30 AM</p>
                    <ul class="d-flex apponitment-types">
                        <li>General Visit</li>
                        <li>Video Call</li>
                    </ul>
                </li>
                <li class="mail-info-patient">
                    <ul>
                        <li><i class="fa-solid fa-envelope"></i><a
                                href=""
                                class="__cf_email__"
                                data-cfemail="fb889a968e9e97bb9e839a968b979ed5989496">[email&#160;protected]</a>
                        </li>
                        <li><i class="fa-solid fa-phone"></i> +1 749 104 6291</li>
                    </ul>
                </li>
                <li class="appointment-action">
                    <ul>
                        <li>
                            <a href="#"><i class="fa-solid fa-eye"></i></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

    </div> --}}
</div>