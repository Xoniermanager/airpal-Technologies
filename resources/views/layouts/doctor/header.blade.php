<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.doctor.head')
</head>
<header class="header header-custom header-fixed header-one">
    <div class="container">
        <nav class="navbar navbar-expand-lg header-nav">
            <div class="navbar-header">
                <a id="mobile_btn" href="javascript:void(0);">
                    <span class="bar-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </a>
                <a href="{{ route('home.index') }}" class="navbar-brand logo">
                    <img src="{{ asset('assets/img/logo.png') }}" class="img-fluid" alt="Logo">
                </a>
            </div>
            <div class="main-menu-wrapper">
                <div class="menu-header">
                    <a href="{{ route('home.index') }}" class="menu-logo">
                        <img src="{{ asset('assets/img/logo.png') }}" class="img-fluid" alt="Logo">
                    </a>
                    <a id="menu_close" class="menu-close" href="javascript:void(0);">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
                <ul class="main-nav">
                    <li class="active">
                        <a href="{{ route('home.index') }}">Home </a>

                    </li>
                    <li class="">
                        <a href="{{ route('doctors.index') }}">Doctors </a>
                    </li>
                    <li class="">
                        <a href="{{ route('instant.index') }}">Instant Consultation </a>
                    </li>
                    <li class="">
                        <a href="{{ route('health_monitoring.index') }}">Health Monitoring Device </a>
                    </li>


                </ul>
            </div>
            <ul class="nav header-navbar-rht">


                <li class="nav-item dropdown noti-nav me-3 pe-0">
                    <a href="#" class="dropdown-toggle nav-link p-0" data-bs-toggle="dropdown">
                        <i class="fa-solid fa-bell"></i> <span class="badge">5</span>
                    </a>
                    <div class="dropdown-menu notifications dropdown-menu-end ">
                        <div class="topnav-dropdown-header">
                            <span class="notification-title">Notifications</span>
                        </div>
                        <div class="noti-content">
                            <ul class="notification-list">
                                <li class="notification-message">
                                    <a href="#">
                                        <div class="notify-block d-flex">
                                            <span class="avatar">
                                                <img class="avatar-img" alt="Ruby perin"
                                                    src="{{ asset('assets/img/clients/client-01.jpg') }}">
                                            </span>
                                            <div class="media-body">
                                                <h6>Travis Tremble <span class="notification-time">18.30
                                                        PM</span></h6>
                                                <p class="noti-details">Sent a amount of $210 for his
                                                    Appointment <span class="noti-title">Dr.Ruby perin </span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="#">
                                        <div class="notify-block d-flex">
                                            <span class="avatar">
                                                <img class="avatar-img" alt="Hendry Watt"
                                                    src="{{ asset('assets/img/clients/client-02.jpg') }}">
                                            </span>
                                            <div class="media-body">
                                                <h6>Travis Tremble <span class="notification-time">12 Min
                                                        Ago</span></h6>
                                                <p class="noti-details"> has booked her appointment to <span
                                                        class="noti-title">Dr. Hendry Watt</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="#">
                                        <div class="notify-block d-flex">
                                            <div class="avatar">
                                                <img class="avatar-img" alt="Maria Dyen"
                                                    src="{{ asset('assets/img/clients/client-03.jpg') }}">
                                            </div>
                                            <div class="media-body">
                                                <h6>Travis Tremble <span class="notification-time">6 Min
                                                        Ago</span></h6>
                                                <p class="noti-details"> Sent a amount $210 for his Appointment
                                                    <span class="noti-title">Dr.Maria Dyen</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="#">
                                        <div class="notify-block d-flex">
                                            <div class="avatar avatar-sm">
                                                <img class="avatar-img" alt="client-image"
                                                    src="{{ asset('assets/img/clients/client-04.jpg') }}">
                                            </div>
                                            <div class="media-body">
                                                <h6>Travis Tremble <span class="notification-time">8.30
                                                        AM</span></h6>
                                                <p class="noti-details"> Send a message to his doctor</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown has-arrow logged-item">
                    <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <span class="user-img">
                            <img src="{{ auth()->user()->image_url }}" class="blah avatar-img rounded-circle"
                              
                               >
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <div class="user-header">
                            <div class="avatar avatar-sm">
                                <img src="{{ auth()->user()->image_url }}" class="blah avatar-img rounded-circle"
                               >
                            </div>
                            <div class="user-text">
                                <h6> <a href="{{ route('doctor.doctor-profile.index') }}">Dr
                                        {{ auth()->user()->fullName }}</h6>
                                <p class="text-success mb-0">Available</p>
                            </div>
                        </div>
                        <a class="dropdown-item" href="{{ route('doctor.doctor-dashboard.index') }}">Dashboard</a>
                        <a class="dropdown-item" href="{{ route('doctor.doctor-profile.index') }}">Profile
                            Settings</a>
                            <a class="dropdown-item" href="{{ route('doctor.doctor-change-password.index') }}">
                                Change Password</a>
                        <a class="dropdown-item" href="{{ route('doctor.logout') }}">Logout</a>
                    </div>
                </li>

            </ul>
        </nav>
    </div>
</header>