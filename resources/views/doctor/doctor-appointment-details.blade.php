<!DOCTYPE html>
<html lang="zxx">

<head>
@include('include.head')
</head>

<body>

    <div class="main-wrapper">

    @include('doctor.include.header')

        <div class="breadcrumb-bar-two">
            <div class="container">
                <div class="row align-items-center inner-banner">
                    <div class="col-md-12 col-12 text-center">
                        <h2 class="breadcrumb-title">Appointment Detail</h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('doctor.doctor-dashboard.index') }}">Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Appointment Detail</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>


        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-xl-3 theiaStickySidebar">
                    @include('doctor.include.sidebar')

                    </div>
                    <div class="col-lg-8 col-xl-9">
                        <div class="dashboard-header">
                            <div class="header-back">
                                <a href="{{ route('doctor.doctor-appointments.index') }}" class="back-arrow"><i
                                        class="fa-solid fa-arrow-left"></i></a>
                                <h3>Appointment Details</h3>
                            </div>
                        </div>
                        <div class="appointment-details-wrap">

                            <div class="appointment-wrap appointment-detail-card">
                                <ul>
                                    <li>
                                        <div class="patinet-information">
                                            <a href="#">
                                                <img src="../assets/img/doctors-dashboard/profile-02.jpg"
                                                    alt="">
                                            </a>
                                            <div class="patient-info">
                                                <p>#Apt0001</p>
                                                <h6><a href="#">Kelly Joseph </a></h6>
                                                <div class="mail-info-patient">
                                                    <ul>
                                                        <li><i class="fa-solid fa-envelope"></i><a
                                                                href=""
                                                                class="__cf_email__"
                                                                data-cfemail="6308060f0f1a23061b020e130f064d000c0e">[email&#160;protected]</a>
                                                        </li>
                                                        <li><i class="fa-solid fa-phone"></i>+1 504 368 6874</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="appointment-info">
                                        <div class="person-info">
                                            <p>Type of Appointment</p>
                                            <ul class="d-flex apponitment-types">
                                                <li><i class="fa-solid fa-hospital text-green"></i>Direct Visit</li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="appointment-action">
                                        <div class="detail-badge-info">
                                            <span class="badge bg-grey me-2">New Patient</span>
                                            <span class="badge bg-yellow">Upcoming</span>
                                        </div>
                                        <div class="consult-fees">
                                            <h6>Consultation Fees : $200</h6>
                                        </div>
                                        <ul>
                                            <li>
                                                <a href="#"><i class="fa-solid fa-comments"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa-solid fa-xmark"></i></a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <ul class="detail-card-bottom-info">
                                    <li>
                                        <h6>Appointment Date & Time</h6>
                                        <span>22 Jul 2023 - 12:00 pm</span>
                                    </li>
                                    <li>
                                        <h6>Clinic Location</h6>
                                        <span>Adrian’s Dentistry</span>
                                    </li>
                                    <li>
                                        <h6>Location</h6>
                                        <span>Newyork, United States</span>
                                    </li>
                                    <li>
                                        <h6>Visit Type</h6>
                                        <span>General</span>
                                    </li>
                                    <li>
                                        <div class="start-btn">
                                            <a href="{{ route('doctor.doctor-appointments.index') }}" class="btn btn-secondary">Start
                                                Session</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>


                            <div class="appointment-wrap appointment-detail-card">
                                <ul>
                                    <li>
                                        <div class="patinet-information">
                                            <a href="#">
                                                <img src="../assets/img/doctors-dashboard/profile-02.jpg"
                                                    alt="">
                                            </a>
                                            <div class="patient-info">
                                                <p>#Apt0001</p>
                                                <h6><a href="#">Kelly Joseph </a></h6>
                                                <div class="mail-info-patient">
                                                    <ul>
                                                        <li><i class="fa-solid fa-envelope"></i><a
                                                                href=""
                                                                class="__cf_email__"
                                                                data-cfemail="a1cac4cdcdd8e1c4d9c0ccd1cdc48fc2cecc">[email&#160;protected]</a>
                                                        </li>
                                                        <li><i class="fa-solid fa-phone"></i>+1 504 368 6874</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="appointment-info">
                                        <div class="person-info">
                                            <p>Person with patient</p>
                                            <ul class="d-flex apponitment-types">
                                                <li>Andrew</li>
                                            </ul>
                                        </div>
                                        <div class="person-info">
                                            <p>Type of Appointment</p>
                                            <ul class="d-flex apponitment-types">
                                                <li><i class="fa-solid fa-video text-indigo"></i>Video Call</li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="appointment-action">
                                        <div class="detail-badge-info">
                                            <span class="badge bg-red me-2">Cancelled</span>
                                            <a href="#reject_reason" class="reject-popup"
                                                data-bs-toggle="modal">Reason</a>
                                        </div>
                                        <div class="consult-fees">
                                            <h6>Consultation Fees : $200</h6>
                                        </div>
                                        <ul>
                                            <li>
                                                <a href="#"><i class="fa-solid fa-comments"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa-solid fa-xmark"></i></a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <ul class="detail-card-bottom-info">
                                    <li>
                                        <h6>Appointment Date & Time</h6>
                                        <span>22 Jul 2023 - 12:00 pm</span>
                                    </li>
                                    <li>
                                        <h6>Visit Type</h6>
                                        <span>General</span>
                                    </li>
                                    <li>
                                        <div class="detail-badge-info">
                                            <span class="badge bg-soft-red me-2">Status : Reschedule</span>
                                            <a href="{{ route('doctor.doctor-appointments.index') }}"
                                                class="reschedule-btn btn-primary-border">Reschedule Appointment</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>


                            <div class="appointment-wrap appointment-detail-card">
                                <ul>
                                    <li>
                                        <div class="patinet-information">
                                            <a href="#">
                                                <img src="../assets/img/doctors-dashboard/profile-02.jpg"
                                                    alt="">
                                            </a>
                                            <div class="patient-info">
                                                <p>#Apt0001</p>
                                                <h6><a href="#">Kelly Joseph </a><span class="badge new-tag">New</span>
                                                </h6>
                                                <div class="mail-info-patient">
                                                    <ul>
                                                        <li><i class="fa-solid fa-envelope"></i><a
                                                                href=""
                                                                class="__cf_email__"
                                                                data-cfemail="bcd7d9d0d0c5fcd9c4ddd1ccd0d992dfd3d1">[email&#160;protected]</a>
                                                        </li>
                                                        <li><i class="fa-solid fa-phone"></i>+1 504 368 6874</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="appointment-info">
                                        <div class="person-info">
                                            <p>Person with patient</p>
                                            <ul class="d-flex apponitment-types">
                                                <li>Andrew</li>
                                            </ul>
                                        </div>
                                        <div class="person-info">
                                            <p>Type of Appointment</p>
                                            <ul class="d-flex apponitment-types">
                                                <li><i class="fa-solid fa-video text-indigo"></i>Video Call</li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="appointment-action">
                                        <div class="detail-badge-info">
                                            <span class="badge bg-green">Completed</span>
                                        </div>
                                        <div class="consult-fees">
                                            <h6>Consultation Fees : $200</h6>
                                        </div>
                                        <ul>
                                            <li>
                                                <a href="#"><i class="fa-solid fa-comments"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa-solid fa-xmark"></i></a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <ul class="detail-card-bottom-info">
                                    <li>
                                        <h6>Appointment Date & Time</h6>
                                        <span>22 Jul 2023 - 12:00 pm</span>
                                    </li>
                                    <li>
                                        <h6>Visit Type</h6>
                                        <span>General</span>
                                    </li>
                                    <li class="appointment-detail-btn">
                                        <a href="#view_prescription" data-bs-toggle="modal">View Details</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="recent-appointments">
                                <h5 class="head-text">Recent Appointments</h5>

                                <div class="appointment-wrap">
                                    <ul>
                                        <li>
                                            <div class="patinet-information">
                                                <a href="#">
                                                    <img src="../assets/img/doctors-dashboard/profile-01.jpg"
                                                        alt="">
                                                </a>
                                                <div class="patient-info">
                                                    <p>#Apt0001</p>
                                                    <h6><a href="#">Adrian</a></h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="appointment-info">
                                            <p><i class="fa-solid fa-clock"></i>11 Nov 2024 10.45 AM</p>
                                            <ul class="d-flex apponitment-types">
                                                <li>General Visit</li>
                                                <li>Chat</li>
                                            </ul>
                                        </li>
                                        <li class="mail-info-patient">
                                            <ul>
                                                <li><i class="fa-solid fa-envelope"></i><a
                                                        href=""
                                                        class="__cf_email__"
                                                        data-cfemail="a1c0c5d3c0cfe1c4d9c0ccd1cdc48fc2cecc">[email&#160;protected]</a>
                                                </li>
                                                <li><i class="fa-solid fa-phone"></i>+1 504 368 6874</li>
                                            </ul>
                                        </li>
                                        <li class="appointment-action">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="fa-solid fa-eye"></i></a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>


                                <div class="appointment-wrap">
                                    <ul>
                                        <li>
                                            <div class="patinet-information">
                                                <a href="#">
                                                    <img src="../assets/img/doctors-dashboard/profile-03.jpg"
                                                        alt="">
                                                </a>
                                                <div class="patient-info">
                                                    <p>#Apt0003</p>
                                                    <h6><a href="#">Samuel</a></h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="appointment-info">
                                            <p><i class="fa-solid fa-clock"></i>27 Oct 2024 09.30 AM</p>
                                            <ul class="d-flex apponitment-types">
                                                <li>General Visit</li>
                                                <li>Video Call</li>
                                            </ul>
                                        </li>
                                        <li class="mail-info-patient">
                                            <ul>
                                                <li><i class="fa-solid fa-envelope"></i><a
                                                        href=""
                                                        class="__cf_email__"
                                                        data-cfemail="fb889a968e9e97bb9e839a968b979ed5989496">[email&#160;protected]</a>
                                                </li>
                                                <li><i class="fa-solid fa-phone"></i> +1 749 104 6291</li>
                                            </ul>
                                        </li>
                                        <li class="appointment-action">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="fa-solid fa-eye"></i></a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 
    </div>
    @include('include.footer')