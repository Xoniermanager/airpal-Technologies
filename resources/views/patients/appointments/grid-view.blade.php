<div class="tab-pane fade show active" id="patientAppointmentGrid" role="tabpanel" aria-labelledby="pills-upcoming-tab">
    <div class="row">
        @forelse ($appointments as $appointment)
            <div class="col-xl-4 col-lg-6 col-md-12 d-flex">
                <div class="appointment-wrap appointment-grid-wrap position-relative">
                    @if ($appointment->status == 'confirmed')
                        <div class="ribbon ribbon-new"><span>Confirmed</span>
                        </div>
                    @elseif ($appointment->status == 'cancelled')
                        <div class="ribbon ribbon-hot"><span>Cancelled</span>
                        </div>
                    @elseif ($appointment->booking_date == \Carbon\Carbon::now()->toDateString())
                        <div class="ribbon ribbon-spo"><span>Today</span></div>
                    @elseif (\Carbon\Carbon::parse($appointment->booking_date)->gt(\Carbon\Carbon::now()))
                        <div class="ribbon ribbon-pop"><span>Upcoming</span></div>
                    @endif
                    <ul>
                        <li>
                            <div class="appointment-grid-head">
                                <div class="patinet-information">
                                    <img src="{{ $appointment->user->image_url }}" class="img-fluid" alt=""
                                        onerror="this.src='{{ asset('assets/img/doctors/doctor-thumb-01.jpg') }}';">
                                    <div class="patient-info">
                                        <h6><a
                                                href="{{ route('frontend.doctor.profile', ['user' => Crypt::encrypt($appointment->user->id)]) }}">Dr
                                                {{ $appointment->user->fullName }}</a></h6>
                                        <p class="visit">General Visit</p>
                                    </div>
                                </div>
                                <div class="grid-user-msg">
                                    <span class="video-icon"><a href="#"><i
                                                class="fa-solid fa-video"></i></a></span>
                                </div>
                            </div>
                        </li>
                        <li class="appointment-info">
                            <p><i class="fa-solid fa-calendar-check"></i> {{ $appointment->booking_date }}</p>
                            <p><i class="fa-solid fa-clock"></i> {{ $appointment->slot_start_time }} -
                                {{ $appointment->slot_end_time }} </p>
                        </li>
                        <li class="appointment-action">
                            <ul>
                                <li>
                                    <a href="patient-upcoming-appointment.html"><i class="fa-solid fa-eye"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa-solid fa-comments"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa-solid fa-xmark"></i></a>
                                </li>
                            </ul>
                            @if ($appointment->status = 'completed' && isset($appointment->prescription))
                                <div class="appointment-detail-btn">
                                    <a href="{{ route('patient.prescription.view', Crypt::encrypt($appointment->prescription->id)) }}"
                                        class="start-link"><i class="fa-solid fa-user-injured"></i>Prescription</a>
                                </div>
                            @endif
                                <div class="appointment-detail-btn">
                                   {!! checkPaymentStatusByBookingId($appointment->id) !!}
                                </div>
                            {!! $appointment->getMeetingButton() !!}
                        </li>
                    </ul>
                </div>
            </div>
        @empty
            <p>Not Found</p>
        @endforelse
    </div>
    <div class="mt-3 d-flex justify-content-end">
        {{ $appointments->links() }}
    </div>
</div>
