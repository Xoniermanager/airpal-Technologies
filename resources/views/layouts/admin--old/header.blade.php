<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Xonier technologies">
    <meta property="og:url" content="">
    <meta property="og:type" content="website">
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:image" content="assets/img/preview-banner.jpg">
    <meta property="twitter:domain" content="">
    <meta property="twitter:url" content="">
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="assets/img/preview-banner.jpg">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/feathericon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <title>Airpal Technology</title>
</head>
<body>
    <div class="header">

        <div class="header-left">
            <a href="{{ route('admin.dashboard.index') }}" class="logo">
                <img src="{{asset('assets/img/logo.png')}}" alt="Logo">
            </a>
            <a href="{{ route('admin.dashboard.index') }}" class="logo logo-small">
                <img src="{{asset('assets/img/logo-small.png')}}" alt="Logo" width="30" height="30">
            </a>
        </div>
        
        <a href="javascript:void(0);" id="toggle_btn">
            <i class="fe fe-text-align-left"></i>
        </a>
        <div class="top-nav-search">
            <form>
                <input type="text" class="form-control" placeholder="Search here">
                <button class="btn" type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        
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
                                            <img class="avatar-img rounded-circle" alt="User Image"
                                                src="{{asset('assets/img/doctors/doctor-thumb-01.jpg')}}">
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
                                            <img class="avatar-img rounded-circle" alt="User Image"
                                                src="{{asset('assets/img/patients/patient1.jpg')}}">
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
                                            <img class="avatar-img rounded-circle" alt="User Image"
                                                src="{{asset('assets/img/patients/patient2.jpg')}}">
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
                                            <img class="avatar-img rounded-circle" alt="User Image"
                                                src="assets/img/patients/patient3.jpg">
                                        </span>
                                        <div class="media-body flex-grow-1">
                                            <p class="noti-details"><span class="noti-title">Carl Kelly</span> send
                                                a message <span class="noti-title"> to his doctor</span></p>
                                            <p class="noti-time"><span class="notification-time">12 mins ago</span>
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
                    <span class="user-img"><img class="rounded-circle" src="assets/img/profiles/avatar-01.jpg"
                            width="31" alt="Vishnu Dev"></span>
                </a>
                <div class="dropdown-menu">
                    <div class="user-header">
                        <div class="avatar avatar-sm">
                            <img src="assets/img/profiles/avatar-01.jpg" alt="User Image"
                                class="avatar-img rounded-circle">
                        </div>
                        <div class="user-text">
                            <h6>Vishnu Dev</h6>
                            <p class="text-muted mb-0">Administrator</p>
                        </div>
                    </div>
                    <a class="dropdown-item" href="{{ route('admin.profile.index') }}">My Profile</a>
                    <a class="dropdown-item" href="{{ route('admin.settings.index') }}">Settings</a>
                    <a class="dropdown-item" href="{{ route('login.index') }}">Logout</a>
                </div>
            </li>
        
        </ul>
        
        </div>
        
        <div class="sidebar" id="sidebar">
                    <div class="sidebar-inner slimscroll">
                        <div id="sidebar-menu" class="sidebar-menu">
                            <ul> 
                                {{-- <li class=" ">
                                    <a href="{{ route('admin.dashboard.index') }}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.appointment-list.index') }}"><i class="fe fe-layout"></i> <span>Appointments</span></a>
                                </li> --}}
                                <li>
                                    <a href="{{ route('admin.speciality.index') }}"><i class="fe fe-users"></i> <span>Specialities</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.index.country') }}"><i class="fe fe-users"></i> <span>Country</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.index.state') }}"><i class="fe fe-users"></i> <span>State</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.index.doctors') }}"><i class="fe fe-user-plus"></i> <span>Doctors</span></a>
                                </li>
                                {{-- <li>
                                    <a href="{{ route('admin.patient-list.index') }}"><i class="fe fe-user"></i> <span>Patients</span></a>
                                </li>
                                {{-- <li>
                                    <a href="{{ route('admin.reviews.index') }}"><i class="fe fe-star-o"></i> <span>Reviews</span></a>
                                </li> --}}
                                <li>
                                    <a href="{{ route('admin.transactions-list.index') }}"><i class="fe fe-activity"></i>
                                        <span>Transactions</span></a>
                                </li>
                                {{-- <li>
                                    <a href="{{ route('admin.settings.index') }}"><i class="fe fe-vector"></i> <span>Settings</span></a>
                                </li>
                                <li class="submenu">
                                    <a href="#"><i class="fe fe-document"></i> <span> Reports</span> <span
                                            class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        <li><a href="{{ route('admin.invoice-report.index') }}">Invoice Reports</a></li>
                                    </ul>
                                </li> --}}
                               
                            </ul>
                        </div>
                    </div>
                </div>
    
