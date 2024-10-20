<div id="appointment-request-list">
    @forelse ($allRequest as $request)
        <div class="appointment-wrap">
            <ul>
                <li>
                    <div class="patinet-information">
                        <a href="{{ route('doctor.doctor-patients.index') }}">
                            <img src="{{ $request->patient->image_url }}">
                        </a>
                        <div class="patient-info">
                            <p>#Apt0001</p>
                            <h6><a
                                    href="{{ route('doctor.doctor-patients.index') }}">{{ $request->patient->fullName }}</a><span
                                    class="badge new-tag">New</span></h6>
                        </div>
                    </div>
                </li>
                <li class="appointment-info">
                    <p><i class="fa-solid fa-clock"></i>
                        {{ date('j M Y',strtotime($request->booking_date)) ?? '' }} - {{ date('h:i A', strtotime($request->slot_start_time)) ?? '' }} - {{ date('h:i A', strtotime($request->slot_end_time)) ?? '' }}
                    <p class="md-text">General Visit</p>
                </li>
                <li class="appointment-type">
                    <p class="md-text">Type of Appointment</p>
                    <p><i class="fa-solid fa-video text-blue"></i>Video Call</p>
                </li>
                <li>
                    <ul class="request-action">
                        <li>
                            <a href="#" class="accept-link" data-bs-toggle="modal"
                                data-bs-target="#accept_appointment" data-id="{{ $request->id }}"
                                onclick="updateAppointment('confirmed', {{ $request->id }})">
                                <i class="fa-solid fa-check"></i>Accept
                            </a>
                        </li>

                        <li>
                            <a href="#" class="reject-link" data-bs-toggle="modal"
                                data-bs-target="#accept_appointment" data-id="{{ $request->id }}"
                                onclick="updateAppointment('cancelled', {{ $request->id }})">
                                <i class="fa-solid fa-xmark"></i>Reject
                            </a>
            
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

    @empty
        <p>No Request Avaiable</p>
    @endforelse

    <div class="mt-3 d-flex justify-content-end">
        {{ $allRequest->links() }}
    </div>
    
</div>
