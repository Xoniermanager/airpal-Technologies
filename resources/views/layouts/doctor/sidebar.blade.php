<div class="profile-sidebar doctor-sidebar profile-sidebar-new">
    <div class="widget-profile pro-widget-content">
        <div class="profile-info-widget">
            <a href="{{ route('doctor.doctor-profile.index') }}" class="booking-doc-img">

                <img src="{{ auth()->user()->image_url }}" id="blah" class="previewProfile">
            </a>

            <div class="profile-det-info">
                <h3 class="mb-0"><a href="{{ route('doctor.doctor-profile.index') }}">
                        {{ auth()->user()->fullName }}</a>
                    <small>
                        {{ $doctorDetails->doctorEducation() }}
                    </small>
                </h3>

                @isset($doctorDetails)
                    @forelse ($doctorDetails->specializations as $specialization)
                        <span class="badge doctor-role-badge"><i
                                class="fa-solid fa-circle"></i>{{ $specialization->name }}</span>
                    @empty
                        <p>N/A</p>
                    @endforelse
                @endisset

            </div>
        </div>
    </div>
    <div class="doctor-available-head">
        <div class="input-block input-block-new">
            <label class="form-label">Availability<span class="text-danger">*</span></label>
            <select class="select form-control">
                <option>I am Available Now</option>
                <option>Not Available</option>
            </select>
        </div>
    </div>
    <div class="dashboard-widget faq-info">
        <nav class="dashboard-menu">
            <ul>
                <li class="{{ request()->routeIs('doctor.doctor-dashboard.index') ? 'active' : '' }}">
                    <a href="{{ route('doctor.doctor-dashboard.index') }}">
                        <i class="fa-solid fa-shapes"></i>
                        <span>Dashboard</span>
                    </a>
                </li>


                <li class="accordion {{ request()->routeIs('doctor.doctor-request.index') ? 'active' : '' }}"
                    id="headingOne">
                    <a class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                        aria-expanded="false" aria-controls="collapseOne">
                        <i class="fa-solid fa-calendar-check"></i>
                        <span>Appointments</span>
                    </a>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                        style="">
                        <div class="accordion-body">
                            <div class="accordion-content">
                                <ul>
                                    <li class="{{ request()->routeIs('doctor.appointments.index') ? 'active' : '' }}">
                                        <a href="{{ route('doctor.appointments.index') }}">
                                            <i class="fa-solid fa-calendar-days"></i>
                                            <span>Appointment Listing</span>
                                        </a>
                                    </li>
                                    <li class="{{ request()->routeIs('doctor.appointment.config') ? 'active' : '' }}">
                                        <a href="{{ route('doctor.doctor-request.index') }}">
                                            <i class="fa-solid fa-calendar-check"></i>
                                            <span>Appointment Requests</span>
                                            <small class="unread-msg"
                                                id="appointmentRequestCounter">{{ $appointmentCounter }}</small>
                                        </a>
                                    </li>
                                    <li class="{{ request()->routeIs('doctor.all.appointment.config') ? 'active' : '' }}">
                                        <a href="{{ route('doctor.all.appointment.config') }}">
                                            <i class="fas fa-star"></i>
                                            <span>All Appointment Configs</span>
                                        </a>
                                    </li>

                                    <li class="{{ request()->routeIs('doctor.appointment.config') ? 'active' : '' }}">
                                        <a href="{{ route('doctor.appointment.config') }}">
                                            <i class="fas fa-star"></i>
                                            <span>Appointment Config</span>
                                        </a>
                                    </li>
                                    <li class="{{ request()->routeIs('doctor.appointment.config') ? 'active' : '' }}">
                                        <a href="{{ route('doctor.all.complete.appointment') }}">
                                            <b><i class="fa fa-check" style="font-size:25px;color:green"></i></b>
                                            <span>Complete Appointment</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="{{ request()->routeIs('doctor.doctor-patients.index') ? 'active' : '' }}">
                    <a href="{{ route('doctor.doctor-patients.index') }}">
                        <i class="fa-solid fa-user-injured"></i>
                        <span>My Patients</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('doctor.chat') ? 'active' : '' }}">
                    <a href="{{ route('doctor.chat') }}">
                        <i class="fa fa-comments"></i>
                        <span>Chat</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('doctor.questions.index') ? 'active' : '' }}">
                    <a href="{{ route('doctor.questions.index') }}">
                        <i class="fa-solid fa-user-pen"></i>
                        <span>Add Question</span>
                    </a>
                </li>

                <li class="{{ request()->routeIs('doctor.notification') ? 'active' : '' }}">
                    <a href="{{ route('doctor.notification') }}">
                        <i class="fa-solid fa-user-pen"></i>
                        <span>Notifications</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('doctor.doctor-reviews.index') ? 'active' : '' }}">
                    <a href="{{ route('doctor.doctor-reviews.index') }}">
                        <i class="fas fa-star"></i>
                        <span>Reviews</span>
                    </a>
                </li>
                {{-- <li class="{{ request()->routeIs('doctor.doctor-timing.index') ? 'active' : '' }}">
                    <a href="{{ route('doctor.doctor-timing.index') }}">
                        <i class="fa-solid fa-calendar-day"></i>
                        <span>Available Timings</span>
                    </a>
                </li> --}}
                <li class="{{ request()->routeIs('doctor.doctor-accounts.index') ? 'active' : '' }}">
                    <a href="{{ route('doctor.doctor-accounts.index') }}">
                        <i class="fa-solid fa-file-contract"></i>
                        <span>Accounts</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('doctor.doctor-invoices.index') ? 'active' : '' }}">
                    <a href="{{ route('doctor.doctor-invoices.index') }}">
                        <i class="fa-solid fa-file-lines"></i>
                        <span>Invoices</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('doctor.doctor-social.index') ? 'active' : '' }}">
                    <a href="{{ route('doctor.doctor-social.index') }}">
                        <i class="fa-solid fa-shield-halved"></i>
                        <span>Social Media</span>
                    </a>
                </li>

                <li class="{{ request()->is('doctor/prescription/*') ? 'active' : '' }}">
                    <a href="{{ route('prescription.index') }}">
                        <i class="fa-solid fa-user-injured"></i>
                        <span>My Prescriptions</span>
                    </a>
                </li>

            </ul>
        </nav>
    </div>

</div>
