<div class="appointment-details-wrap" id="appointmentGrid">

    @forelse ($bookings as $booking )
    <div class="appointment-wrap appointment-detail-card">
        <ul>
            <li>
                <div class="patinet-information">
                    <a href="{{$booking->patientProfileUrl()}}">
                        <img src="{{ $booking->patient->image_url}}"
                            alt="">
                    </a>
                    <div class="patient-info">
                        <p>#Apt0001</p>
                        <h6><a href="{{$booking->patientProfileUrl()}}">{{ $booking->patient->fullName }} </a></h6>
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
            <li>
                {!! checkPaymentStatusByBookingId($booking->id) !!}
            </li>
        </ul>
    </div>
    @empty
    <p>No Appointments Availables</p>
    @endforelse
</div>
