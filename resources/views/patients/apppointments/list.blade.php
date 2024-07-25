<div class="tab-pane fade show active" id="appointmentList" role="tabpanel"
aria-labelledby="pills-upcoming-tab">
<div class="row">
    @forelse ($appointments as $appointment )
    <div class="col-xl-4 col-lg-6 col-md-12 d-flex">
        <div class="appointment-wrap appointment-grid-wrap">
            <ul>
                <li>
                    <div class="appointment-grid-head">
                        <div class="patinet-information">
                            <a href="patient-upcoming-appointment.html">
                                <img src="{{asset('images/').'/'.$appointment->user->image_url}}" class="img-fluid"
                                alt=""   onerror="this.src='{{asset('assets/img/doctors/doctor-thumb-01.jpg')}}';" >
                            </a>
                            <div class="patient-info">
                                <p>#Apt{{ $appointment->id }}</p>
                                <h6><a href="{{ route('frontend.doctor.profile',['user' =>$appointment->user->id]) }}">Dr
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
                    <p><i class="fa-solid fa-clock"></i> {{ $appointment->slot_start_time }} - {{ $appointment->slot_end_time }} </p>
                </li>
                <li class="appointment-action">
                    <ul>
                        <li>
                            <a href="patient-upcoming-appointment.html"><i
                                    class="fa-solid fa-eye"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa-solid fa-comments"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa-solid fa-xmark"></i></a>
                        </li>
                    </ul>
                    <div class="appointment-detail-btn">
                        <a href="#" class="start-link"><i
                                class="fa-solid fa-calendar-check me-1"></i>Attend</a>
                    </div>
                </li>
            </ul>
        </div>
    </div> 
    @empty
    <p>Not Found</p>     
    @endforelse 


</div>
</div>