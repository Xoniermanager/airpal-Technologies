<div class="profile-sidebar doctor-sidebar profile-sidebar-new">
    <div class="widget-profile pro-widget-content">
        <div class="profile-info-widget">
            <a href="{{ route('doctor.doctor-profile.index') }}" class="booking-doc-img">

                <img src="{{ auth()->user()->image_url }}" id="blah" class="previewProfile">
            </a>

            <div class="profile-det-info">
                <h3><a href="{{ route('doctor.doctor-profile.index') }}"> {{ auth()->user()->fullName }}</a></h3>
                <div class="patient-details">
                    <h5 class="mb-0">
                        {{ $doctorDetails->doctorEducation() }}
                    </h5>
                </div>
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
    <div class="dashboard-widget">
        <nav class="dashboard-menu">
            <ul>
                <li class="{{ request()->routeIs('doctor.doctor-dashboard.index') ? 'active' : '' }}">
                    <a href="{{ route('doctor.doctor-dashboard.index') }}">
                        <i class="fa-solid fa-shapes"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('doctor.doctor-request.index') ? 'active' : '' }}">
                    <a href="{{ route('doctor.doctor-request.index') }}">
                        <i class="fa-solid fa-calendar-check"></i>
                        <span>Appointment Requests</span>
                        <small class="unread-msg" id="appointmentRequestCounter">{{ $appointmentCounter }}</small>
                    </a>
                </li>
                <li class="{{ request()->routeIs('doctor.appointments.index') ? 'active' : '' }}">
                    <a href="{{ route('doctor.appointments.index') }}">
                        <i class="fa-solid fa-calendar-days"></i>
                        <span>Appointments</span>
                    </a>
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
                <li class="{{ request()->routeIs('doctor.appointment.config') ? 'active' : '' }}">
                    <a href="{{ route('doctor.appointment.config') }}">
                        <i class="fas fa-star"></i>
                        <span>Appointment Config</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('doctor.questions.index') ? 'active' : '' }}">
                    <a href="{{ route('doctor.questions.index') }}">
                        <i class="fa-solid fa-user-pen"></i>
                        <span>Add Question</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('doctor.doctor-profile.index') ? 'active' : '' }}">
                    <a href="{{ route('doctor.doctor-profile.index') }}">
                        <i class="fa-solid fa-user-pen"></i>
                        <span>Profile Settings</span>
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
                <li class="{{ request()->routeIs('doctor.doctor-change-password.index') ? 'active' : '' }}">
                    <a href="{{ route('doctor.doctor-change-password.index') }}">
                        <i class="fa-solid fa-key"></i>
                        <span>Change Password</span>
                    </a>
                </li>
                <li class="{{ request()->is('doctor/prescription/*') ? 'active' : '' }}">
                    <a href="{{ route('prescription.index') }}">
                        <i class="fa-solid fa-user-injured"></i>
                        <span>My Prescriptions</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('doctor.logout') }}">
                        <i class="fa-solid fa-calendar-check"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

</div>
