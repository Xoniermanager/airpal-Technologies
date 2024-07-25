<div class="tab-pane fade show active" id="appointmentList" role="tabpanel"
aria-labelledby="pills-upcoming-tab" >
<div class="row">

@forelse ($bookings as $booking )

 <div class="col-xl-4 col-lg-6 col-md-12 d-flex">
    <div class="appointment-wrap appointment-grid-wrap">
        <ul>
            <li>
                <div class="appointment-grid-head">
                    <div class="patinet-information">
                        <a href="{{ route('doctor.appointments.index') }}">
                            <img src="{{ asset('images').'/'.$booking->patient->image_url}}" id="blah">
                        </a>
                        <div class="patient-info">
                            {{-- <p>#Apt0001</p> --}}
                            <h6><a
                                    href="{{ route('doctor.appointments.index') }}">{{$booking->patient->fullName}}</a>
                            </h6>
                        </div>
                    </div>
                    <div class="grid-user-msg">
                        <span class="video-icon"><a href="#"><i
                                    class="fa-solid fa-video"></i></a></span>
                    </div>
                </div>
            </li>
            <li class="appointment-info">
                <p><i class="fa-solid fa-clock"></i>{{ $booking->booking_date ?? '' }}</p>
                <p><i class="fa-solid fa-clock"></i>{{ $booking->slot_start_time ?? '' }}</p>
                <ul class="d-flex apponitment-types">
                    <li>General Visit</li>
                </ul>
            </li>
            <li class="appointment-action">
                <ul>
                    <li>
                        <a href="{{ route('doctor.appointments.index') }}"><i
                                class="fa-solid fa-eye"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa-solid fa-comments"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa-solid fa-xmark"></i></a>
                    </li>
                </ul>
                <div class="appointment-start">
                    <a href="{{ route('doctor.appointments.index') }}" class="start-link">Start
                        Now</a>
                </div>
            </li>
        </ul>
    </div>
</div>
 @empty
     <p>No Appointments Availables</p>
 @endforelse



    {{-- <div class="col-md-12">
        <div class="loader-item text-center">
            <a href="javascript:void(0);" class="btn btn-load">Load More</a>
        </div>
    </div> --}}
</div>
</div>