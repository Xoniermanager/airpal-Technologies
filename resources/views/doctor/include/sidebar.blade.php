<div class="profile-sidebar doctor-sidebar profile-sidebar-new">
                            <div class="widget-profile pro-widget-content">
                                <div class="profile-info-widget">
                                    <a href="{{ route('doctor.doctor-profile.index') }}" class="booking-doc-img">
                                        <img src="../assets/img/doctors-dashboard/doctor-profile-img.jpg"
                                            alt="User Image">
                                    </a>
                                    <div class="profile-det-info">
                                        <h3><a href="{{ route('doctor.doctor-profile.index') }}"> {{$doctorDetails->first_name ?? "" }} {{$doctorDetails->last_name ?? "" }}</a></h3>
                                        <div class="patient-details">
                                            <h5 class="mb-0">
                                                @isset($doctorDetails)
                                                  
                                                @forelse ($doctorDetails->educations as $education)
                                                {{$education->course->name}}
                                                @if( !$loop->last),@endif
                                                @empty
                                                <p>N/A</p>
                                                @endforelse
                                                @endisset
           
                                            </h5>
                                        </div>
                                        <span class="badge doctor-role-badge"><i
                                                class="fa-solid fa-circle"></i>Dentist</span>
                                    </div>
                                </div>
                            </div>
                            <div class="doctor-available-head">
                                <div class="input-block input-block-new">
                                    <label class="form-label">Availability <span class="text-danger">*</span></label>
                                    <select class="select form-control">
                                        <option>I am Available Now</option>
                                        <option>Not Available</option>
                                    </select>
                                </div>
                            </div>
                            <div class="dashboard-widget">
                                <nav class="dashboard-menu">
                                    <ul>
                                        <li class="active">
                                            <a href="{{ route('doctor.doctor-dashboard.index') }}">
                                                <i class="fa-solid fa-shapes"></i>
                                                <span>Dashboard</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('doctor.doctor-request.index') }}">
                                                <i class="fa-solid fa-calendar-check"></i>
                                                <span>Requests</span>
                                                <small class="unread-msg">2</small>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('doctor.doctor-appointments.index') }}">
                                                <i class="fa-solid fa-calendar-days"></i>
                                                <span>Appointments</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('doctor.doctor-timing.index') }}">
                                                <i class="fa-solid fa-calendar-day"></i>
                                                <span>Available Timings</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('doctor.doctor-patients.index') }}">
                                                <i class="fa-solid fa-user-injured"></i>
                                                <span>My Patients</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('doctor.doctor-specialities.index') }}">
                                                <i class="fa-solid fa-clock"></i>
                                                <span>Specialties & Services</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('doctor.doctor-reviews.index') }}">
                                                <i class="fas fa-star"></i>
                                                <span>Reviews</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('doctor.doctor-accounts.index') }}">
                                                <i class="fa-solid fa-file-contract"></i>
                                                <span>Accounts</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('doctor.doctor-invoices.index') }}">
                                                <i class="fa-solid fa-file-lines"></i>
                                                <span>Invoices</span>
                                            </a>
                                        </li>
                                        

                                        <li>
                                            <a href="{{ route('doctor.doctor-profile.index') }}">
                                                <i class="fa-solid fa-user-pen"></i>
                                                <span>Profile Settings</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('doctor.doctor-social.index') }}">
                                                <i class="fa-solid fa-shield-halved"></i>
                                                <span>Social Media</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('doctor.doctor-change-password.index') }}">
                                                <i class="fa-solid fa-key"></i>
                                                <span>Change Password</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <i class="fa-solid fa-calendar-check"></i>
                                                <span>Logout</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>