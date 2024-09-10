    <div class="header">
        <div class="header-left">
            <a href="{{ route('admin.dashboard.index') }}" class="logo">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo">
            </a>
            <a href="{{ route('admin.dashboard.index') }}" class="logo logo-small">
                <img src="{{ asset('assets/img/favicon.png') }}" alt="Logo" width="30" height="30">
            </a>
        </div>

        <a href="javascript:void(0);" id="toggle_btn">
            <i class="fe fe-text-align-left"></i>
        </a>
        {{-- <div class="top-nav-search">
            <form>
                <input type="text" class="form-control" placeholder="Search here">
                <button class="btn" type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div> --}}

        <a class="mobile_btn" id="mobile_btn">
            <i class="fa fa-bars"></i>
        </a>

        <ul class="nav user-menu">

            <li class="nav-item dropdown noti-dropdown">
                <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                    <i class="fe fe-bell"></i> <span class="badge rounded-pill">3</span>
                </a>
                <div class="dropdown-menu notifications">
                    <div class="topnav-dropdown-header">
                        <span class="notification-title">Notifications</span>
                        <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                    </div>
                    <div class="noti-content">
                        <ul class="notification-list">
                            <li class="notification-message">
                                <a href="#">
                                    <div class="notify-block d-flex">
                                        <span class="avatar avatar-sm flex-shrink-0">
                                            <img class="avatar-img rounded-circle" alt=""
                                                src="{{ asset('assets/img/doctors/doctor-thumb-01.jpg') }}">
                                        </span>
                                        <div class="media-body flex-grow-1">
                                            <p class="noti-details"><span class="noti-title">Dr. Ruby Perrin</span>
                                                Schedule <span class="noti-title">her appointment</span></p>
                                            <p class="noti-time"><span class="notification-time">4 mins ago</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="#">
                                    <div class="notify-block d-flex">
                                        <span class="avatar avatar-sm flex-shrink-0">
                                            <img class="avatar-img rounded-circle" alt=""
                                                src="{{ asset('assets/img/patients/patient1.jpg') }}">
                                        </span>
                                        <div class="media-body flex-grow-1">
                                            <p class="noti-details"><span class="noti-title">Charlene Reed</span>
                                                has booked her appointment to <span class="noti-title">Dr. Ruby
                                                    Perrin</span></p>
                                            <p class="noti-time"><span class="notification-time">6 mins ago</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="#">
                                    <div class="notify-block d-flex">
                                        <span class="avatar avatar-sm flex-shrink-0">
                                            <img class="avatar-img rounded-circle" alt=""
                                                src="{{ asset('assets/img/patients/patient2.jpg') }}">
                                        </span>
                                        <div class="media-body flex-grow-1">
                                            <p class="noti-details"><span class="noti-title">Travis Trimble</span>
                                                sent a amount of $210 for his <span
                                                    class="noti-title">appointment</span></p>
                                            <p class="noti-time"><span class="notification-time">8 mins ago</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="#">
                                    <div class="notify-block d-flex">
                                        <span class="avatar avatar-sm flex-shrink-0">
                                            <img class="avatar-img rounded-circle" alt=""
                                                src="assets/img/patients/patient3.jpg">
                                        </span>
                                        <div class="media-body flex-grow-1">
                                            <p class="noti-details"><span class="noti-title">Carl Kelly</span>
                                                send
                                                a message <span class="noti-title"> to his doctor</span></p>
                                            <p class="noti-time"><span class="notification-time">12 mins
                                                    ago</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="topnav-dropdown-footer">
                        <a href="#">View all Notifications</a>
                    </div>
                </div>
            </li>


            <li class="nav-item dropdown has-arrow">
                <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                    <span class="user-img">
                        @isset(auth()->user()->image_url)
                            @if (auth()->user()->image_url)
                                <img class="rounded-circle" src="{{ auth()->user()->image_url }}" width="31"
                                    id="blah">
                            @else
                                <img class="rounded-circle" src="{{ asset('assets/img/user.jpg') }}" width="31"
                                    id="blah">
                            @endif
                        @endisset
                    </span>
                </a>
                <div class="dropdown-menu">
                    <div class="user-header">
                        <div class="avatar avatar-sm">
                            @isset(auth()->user()->image_url)
                                @if (auth()->user()->image_url)
                                    <img class="rounded-circle" src="{{ auth()->user()->image_url }}" width="31"
                                        id="blah">
                                @else
                                    <img class="rounded-circle" src="{{ asset('assets/img/user.jpg') }}" width="31"
                                        id="blah">
                                @endif
                            @endisset
                        </div>
                        <div class="user-text">
                            <h6>{{ auth()->user()->fullName ?? '' }}</h6>
                            <p class="text-muted mb-0">Administrator</p>
                        </div>
                    </div>
                    {{-- <a class="dropdown-item" href="">My Profile</a> --}}
                    <a class="dropdown-item" href="{{ route('admin.settings.index') }}">Settings</a>
                    <a class="dropdown-item" href="{{ route('admin.logout') }}">Logout</a>
                </div>


            </li>

        </ul>

    </div>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-item" data-url="{{ route('admin.dashboard.index') }}">
                        <a href="{{ route('admin.dashboard.index') }}"><i class="fe fe-home"></i>
                            <span>Dashboard</span></a>
                    </li>
                    <li class="menu-item" data-url="{{ route('admin.appointment-list.index') }}">
                        <a href="{{ route('admin.appointment-list.index') }}"><i class="fe fe-layout"></i>
                            <span>Appointments</span></a>
                    </li>
                    <li class="menu-item" data-url="{{ route('admin.speciality.index') }}">
                        <a href="{{ route('admin.speciality.index') }}"><i class="fe fe-users"></i>
                            <span>Specialities</span></a>
                    </li>
                    <li class="menu-item" data-url="{{ route('admin.index.doctors') }}">
                        <a href="{{ route('admin.index.doctors') }}"><i class="fe fe-user-plus"></i>
                            <span>Doctors</span></a>
                    </li>

                    <li class="menu-item" data-url="{{ route('admin.slots.index') }}">
                        <a href="{{ route('admin.slots.index') }}"><i class="fa-solid fa-calendar-week"></i>
                            <span>Slots</span></a>
                    </li>

                    <li class="menu-item" data-url="{{ route('admin.patient-list.index') }}">
                        <a href="{{ route('admin.patient-list.index') }}"><i class="fe fe-user"></i>
                            <span>Patients</span></a>
                    </li>

                    <li class="menu-item" data-url="{{ route('admin.reviews.index') }}">
                        <a href="{{ route('admin.reviews.index') }}"><i class="fe fe-star-o"></i>
                            <span>Reviews</span></a>
                    </li>

                    <li class="menu-item" data-url="{{ route('admin.transactions-list.index') }}">
                        <a href="{{ route('admin.transactions-list.index') }}"><i class="fe fe-activity"></i>
                            <span>Transactions</span></a>
                    </li>

                    <li class="menu-item" data-url="{{ route('admin.settings.index') }}">
                        <a href="{{ route('admin.settings.index') }}"><i class="fe fe-vector"></i>
                            <span>Settings</span></a>
                    </li>

                    <li class="menu-item" data-url="{{ route('admin.service.index') }}">
                        <a href="{{ route('admin.service.index') }}"><i class="fe fe-user-plus"></i>
                            <span>Services</span></a>
                    </li>

                    <li class="menu-item" data-url="{{ route('admin.faqs.index') }}">
                        <a href="{{ route('admin.faqs.index') }}"><i class="fe fe-user-plus"></i>
                            <span>FaQs</span></a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('admin.index.country') }}"
                            data-url="{{ route('admin.index.country') }}"><i class="fe fe-flag"></i>
                            <span>Country</span></a>
                    </li>
                    

                    <li class="submenu">
                        <a href="#" class=""><i class="fe fe-question"></i><span>Pages</span> <span
                                class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <a href="{{ route('admin.home.index',1) }}"
                                data-url="{{ route('admin.home.index',1) }}">
                                <span>Home</span></a>
                            <a href="{{ route('admin.about_us.index',2) }}"
                                data-url="{{ route('admin.about_us.index',2) }}">
                                <span>About Us</span></a>

                            <a href="{{ route('admin.health.monitoring.index',3) }}"
                                data-url="{{ route('admin.health.monitoring.index',3) }}">
                                <span>Health Monitoring</span></a>
                        </ul>
                    </li>

                    <li class="submenu" data-url="{{ route('admin.invoice-report.index') }}">
                        <a href="#"><i class="fe fe-question"></i><span>Generals</span> <span
                                class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <a href="{{ route('admin.testimonial.index') }}"
                                data-url="{{ route('admin.testimonial.index') }}">
                                <span>Testimonials</span></a>
                            <a href="{{ route('admin.partner.index') }}"
                                data-url="{{ route('admin.partner.index') }}">
                                <span>Our Partners</span></a>
                        </ul>
                    </li>

                    <li class="menu-item" data-url="{{ route('admin.social.media.index') }}">
                        <a href="{{ route('admin.social.media.index') }}"><i class="far fa-sticky-note"></i>
                            <span>Social Media</span>
                        </a>
                    </li>

                    <li class="menu-item" data-url="{{ route('admin.index.state') }}">
                        <a href="{{ route('admin.index.state') }}"><i class="fe fe-flag"></i> <span>State</span></a>
                    </li>
                    <li class="menu-item" data-url="{{ route('admin.questions.index') }}">
                        <a href="{{ route('admin.questions.index') }}">
                            <i class="fe fe-question"></i><span> Doctor's Questions</span>
                        </a>
                    </li>

                    <li class="submenu" data-url="{{ route('admin.invoice-report.index') }}">
                        <a href="#"><i class="fe fe-document"></i> <span> Reports</span> <span
                                class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li class="menu-item"><a href="{{ route('admin.invoice-report.index') }}">Invoice
                                    Reports</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </div>
