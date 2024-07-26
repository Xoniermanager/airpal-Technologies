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
                        <h2 class="breadcrumb-title">Dashboard </h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('doctor.doctor-dashboard.index') }}">Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Dashboard</li>
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
                        <div class="row">


                            <div class="col-xl-4 d-flex">
                                <div class="dashboard-box-col w-100">
                                    <div class="dashboard-widget-box">
                                        <div class="dashboard-content-info">
                                            <h6>Total Patients</h6>
                                            <h4>{{ $totalPatientsCounter }}</h4>

                                        </div>
                                        <div class="dashboard-widget-icon">
                                            <span class="dash-icon-box"><i class="fa-solid fa-user-injured"></i></span>
                                        </div>
                                    </div>

                                    <div class="dashboard-widget-box">
                                        <div class="dashboard-content-info">
                                            <h6>Appointments Today</h6>
                                            <h4>{{ $todayAppointmentCounter }}</h4>
                                        </div>
                                        <div class="dashboard-widget-icon">
                                            <span class="dash-icon-box"><i class="fa-solid fa-calendar-days"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8 d-flex">
                                <div class="dashboard-card w-100">
                                    <div class="dashboard-card-head">
                                        <div class="header-title">
                                            <h5>Latest Appointment Requests</h5>
                                        </div>
                                        {{-- <div class="dropdown header-dropdown">
                                            <a class="dropdown-toggle nav-tog" data-bs-toggle="dropdown"
                                                href="javascript:void(0);">
                                                Last 7 Days
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a href="javascript:void(0);" class="dropdown-item">
                                                    Today
                                                </a>
                                                <a href="javascript:void(0);" class="dropdown-item">
                                                    This Month
                                                </a>
                                                <a href="javascript:void(0);" class="dropdown-item">
                                                    Last 7 Days
                                                </a>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <div class="dashboard-card-body">
                                        <div class="table-responsive">
                                            @include('doctor.latest-appointment-list')
                                            {{-- <table class="table dashboard-table appoint-table">
                                                <tbody>
                                                    @forelse ($recentAppointments as $appointment)
                                                        <tr>
                                                            <td>
                                                                <div class="patient-info-profile">
                                                                    <a href="{{ route('doctor.appointments.index') }}"
                                                                        class="table-avatar">
                                                                        <img
                                                                            src="{{ asset('images/' . $appointment->patient->image_url) }}">
                                                                    </a>
                                                                    <div class="patient-name-info">
                                                                        <span>#PAT{{ $appointment->id }}</span>
                                                                        <h5><a
                                                                                href="{{ route('doctor.appointments.index') }}">{{ $appointment->patient->FullName }}</a>
                                                                        </h5>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="appointment-date-created">
                                                                    <h6>
                                                                        {{ $appointment->booking_date }}
                                                                        {{ $appointment->slot_start_time }}
                                                                    </h6>
                                                                    <span class="badge table-badge">General</span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div
                                                                    class="apponiment-actions d-flex align-items-center">
                                                                    <a href="#" class="text-success-icon me-2"><i
                                                                            class="fa-solid fa-check"></i></a>
                                                                    <a href="#" class="text-danger-icon"><i
                                                                            class="fa-solid fa-xmark"></i></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @empty

                                                        <p>Not Found </p>
                                                    @endforelse
                                                </tbody>
                                            </table> --}}
                                            <a href="{{ route('doctor.doctor-request.index') }}">View All Appointment
                                                Requests</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-5 d-flex">
                                <div class="dashboard-chart-col w-100">
                                    <div class="dashboard-card w-100">
                                        <div class="dashboard-card-head border-0">
                                            <div class="header-title">
                                                <h5>Weekly Overview</h5>
                                            </div>
                                            <div class="chart-create-date">
                                                <h6>Mar 14 - Mar 21</h6>
                                            </div>
                                        </div>
                                        <div class="dashboard-card-body">
                                            <div class="chart-tab">
                                                <ul class="nav nav-pills product-licence-tab" id="pills-tab2"
                                                    role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link active" id="pills-revenue-tab"
                                                            data-bs-toggle="pill" data-bs-target="#pills-revenue"
                                                            type="button" role="tab" aria-controls="pills-revenue"
                                                            aria-selected="false">Revenue</button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="pills-appointment-tab"
                                                            data-bs-toggle="pill" data-bs-target="#pills-appointment"
                                                            type="button" role="tab"
                                                            aria-controls="pills-appointment"
                                                            aria-selected="true">Appointments</button>
                                                    </li>
                                                </ul>
                                                <div class="tab-content w-100" id="v-pills-tabContent">
                                                    <div class="tab-pane fade show active" id="pills-revenue"
                                                        role="tabpanel" aria-labelledby="pills-revenue-tab">
                                                        <div id="revenue-chart"></div>
                                                    </div>
                                                    <div class="tab-pane fade" id="pills-appointment" role="tabpanel"
                                                        aria-labelledby="pills-appointment-tab">
                                                        <div id="appointment-chart"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dashboard-card w-100">
                                        <div class="dashboard-card-head">
                                            <div class="header-title">
                                                <h5>Recent Patients</h5>
                                            </div>
                                            <div class="card-view-link">
                                                <a href="{{ route('doctor.doctor-patients.index') }}">View All</a>
                                            </div>
                                        </div>

                                        <div class="dashboard-card-body">
                                            <div class="row recent-patient-grid-boxes">
                                                @forelse ($recentPatients as $recentPatient)
                                                    <div class="col-md-6">
                                                        <div class="recent-patient-grid">
                                                            <a href="{{ route('doctor.doctor-patients.index') }}"
                                                                class="patient-img">
                                                                <img
                                                                    src="{{ asset('images/' . $recentPatient->patient->image_url) }}">

                                                            </a>
                                                            <h5><a
                                                                    href="{{ route('doctor.doctor-patients.index') }}"></a>
                                                            </h5>
                                                            <span>Patient ID : PAT{{ $recentPatient->id }}</span>
                                                            <div class="date-info">
                                                                <p>Last Appointment {{ $recentPatient->booking_date }}
                                                                    {{ $recentPatient->slot_start_time }}
                                                                    {{-- {{ \Carbon\Carbon::parse($recentAppointment->appointment_date)->format('d M Y h:i A') }}</p> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <p>Fot found</p>
                                                @endforelse

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-7 d-flex">

                                <div class="dashboard-main-col w-100">
                                    @if (!empty($upcomingAppointments))
                                        <div class="upcoming-appointment-card">
                                            <div class="title-card">
                                                <h5>Upcoming Appointment</h5>
                                            </div>
                                            <div class="upcoming-patient-info">
                                                <div class="info-details">
                                                    <span class="img-avatar">
                                                        <img
                                                            src="{{ asset('images/' . $upcomingAppointments->patient->image_url ?? '') }}">
                                                    </span>
                                                    <div class="name-info">
                                                        <span>#Apt{{ $upcomingAppointments->id }}</span>
                                                        <h6>{{ $upcomingAppointments->patient->fullName }}</h6>
                                                    </div>
                                                </div>
                                                <div class="date-details">
                                                    <span>General visit</span>
                                                    <h6>{{ $upcomingAppointments->slot_start_time }}</h6>
                                                </div>
                                                <div class="circle-bg">
                                                    <img src="../assets/img/bg/dashboard-circle-bg.png" alt>
                                                </div>
                                                <div class="date-details">
                                                    <span>Date</span>
                                                    <h6>{{ $upcomingAppointments->booking_date }}</h6>
                                                </div>
                                            </div>
                                            <div class="appointment-card-footer">
                                                <h5><i class="fa-solid fa-video"></i>Video Appointment</h5>
                                                <div class="btn-appointments">
                                                    <a href="{{ route('doctor.appointments.index') }}"
                                                        class="btn">Start Appointment</a>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="dashboard-main-col w-100 mb-3">
                                            <img src="../assets/img/doctors-dashboard/no-apt-3.png" alt="Img">
                                        </div>
                                    @endif

                                    <div class="dashboard-card w-100">
                                        <div class="dashboard-card-head">
                                            <div class="header-title">
                                                <h5>Recent Invoices</h5>
                                            </div>
                                            <div class="card-view-link">
                                                <a href="{{ route('doctor.doctor-invoices.index') }}">View All</a>
                                            </div>
                                        </div>
                                        <div class="dashboard-card-body">
                                            <div class="table-responsive">
                                                <table class="table dashboard-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="patient-info-profile">
                                                                    <a href="{{ route('doctor.doctor-invoices.index') }}"
                                                                        class="table-avatar">
                                                                        <img src="../assets/img/doctors-dashboard/profile-04.jpg"
                                                                            alt="Img">

                                                                    </a>
                                                                    <div class="patient-name-info">
                                                                        <h5><a
                                                                                href="{{ route('doctor.doctor-invoices.index') }}">Adrian</a>
                                                                        </h5>
                                                                        <span>#Apt0001</span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="appointment-date-created">
                                                                    <span class="paid-text">Amount</span>
                                                                    <h6>$450</h6>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="appointment-date-created">
                                                                    <span class="paid-text">Paid On</span>
                                                                    <h6>11 Nov 2024</h6>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="apponiment-view d-flex align-items-center">
                                                                    <a
                                                                        href="{{ route('doctor.doctor-invoices.index') }}"><i
                                                                            class="fa-solid fa-eye"></i></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="patient-info-profile">
                                                                    <a href="#" class="table-avatar">
                                                                        <img src="../assets/img/doctors-dashboard/profile-04.jpg"
                                                                            alt="Img">
                                                                    </a>
                                                                    <div class="patient-name-info">
                                                                        <h5><a href="#">Kelly</a></h5>
                                                                        <span>#Apt0002</span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="appointment-date-created">
                                                                    <span class="paid-text">Paid On</span>
                                                                    <h6>10 Nov 2024</h6>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="appointment-date-created">
                                                                    <span class="paid-text">Amount</span>
                                                                    <h6>$500</h6>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="apponiment-view d-flex align-items-center">
                                                                    <a href="#"><i
                                                                            class="fa-solid fa-eye"></i></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="patient-info-profile">
                                                                    <a href="#" class="table-avatar">
                                                                        <img src="../assets/img/doctors-dashboard/profile-04.jpg"
                                                                            alt="Img">
                                                                    </a>
                                                                    <div class="patient-name-info">
                                                                        <h5><a href="#">Samuel</a></h5>
                                                                        <span>#Apt0003</span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="appointment-date-created">
                                                                    <span class="paid-text">Paid On</span>
                                                                    <h6>03 Nov 2024</h6>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="appointment-date-created">
                                                                    <span class="paid-text">Amount</span>
                                                                    <h6>$320</h6>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="apponiment-view d-flex align-items-center">
                                                                    <a href="#"><i
                                                                            class="fa-solid fa-eye"></i></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="patient-info-profile">
                                                                    <a href="#" class="table-avatar">
                                                                        <img src="../assets/img/doctors-dashboard/profile-04.jpg"
                                                                            alt="Img">
                                                                    </a>
                                                                    <div class="patient-name-info">
                                                                        <h5><a href="#">Catherine</a></h5>
                                                                        <span>#Apt0004</span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="appointment-date-created">
                                                                    <span class="paid-text">Paid On</span>
                                                                    <h6>01 Nov 2024</h6>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="appointment-date-created">
                                                                    <span class="paid-text">Amount</span>
                                                                    <h6>$240</h6>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="apponiment-view d-flex align-items-center">
                                                                    <a href="#"><i
                                                                            class="fa-solid fa-eye"></i></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="patient-info-profile">
                                                                    <a href="#" class="table-avatar">
                                                                        <img src="../assets/img/doctors-dashboard/profile-05.jpg"
                                                                            alt="Img">
                                                                    </a>
                                                                    <div class="patient-name-info">
                                                                        <h5><a href="#">Robert</a></h5>
                                                                        <span>#Apt0005</span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="appointment-date-created">
                                                                    <span class="paid-text">Paid On</span>
                                                                    <h6>28 Oct 2024</h6>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="appointment-date-created">
                                                                    <span class="paid-text">Amount</span>
                                                                    <h6>$380</h6>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="apponiment-view d-flex align-items-center">
                                                                    <a href="#"><i
                                                                            class="fa-solid fa-eye"></i></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-xl-7 d-flex">
                                <div class="dashboard-card w-100">
                                    <div class="dashboard-card-head">
                                        <div class="header-title">
                                            <h5>Notifications</h5>
                                        </div>
                                        <div class="card-view-link">
                                            <a href="#">View All</a>
                                        </div>
                                    </div>
                                    <div class="dashboard-card-body">
                                        <div class="table-responsive">
                                            <table class="table dashboard-table">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="table-noti-info">
                                                                <div class="table-noti-icon color-violet">
                                                                    <i class="fa-solid fa-bell"></i>
                                                                </div>
                                                                <div class="table-noti-message">
                                                                    <h6><a href="#">Booking Confirmed on <span> 21 Mar
                                                                                2024 </span> 10:30 AM</a></h6>
                                                                    <span class="message-time">Just Now</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="table-noti-info">
                                                                <div class="table-noti-icon color-blue">
                                                                    <i class="fa-solid fa-star"></i>
                                                                </div>
                                                                <div class="table-noti-message">
                                                                    <h6><a href="#">You have a <span> New </span> Review
                                                                            for your Appointment </a></h6>
                                                                    <span class="message-time">5 Days ago</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="table-noti-info">
                                                                <div class="table-noti-icon color-red">
                                                                    <i class="fa-solid fa-calendar-check"></i>
                                                                </div>
                                                                <div class="table-noti-message">
                                                                    <h6><a href="#">You have Appointment with <span>
                                                                                Ahmed </span> by 01:20 PM </a></h6>
                                                                    <span class="message-time">12:55 PM</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="table-noti-info">
                                                                <div class="table-noti-icon color-yellow">
                                                                    <i class="fa-solid fa-money-bill-1-wave"></i>
                                                                </div>
                                                                <div class="table-noti-message">
                                                                    <h6><a href="#">Sent an amount of <span> $200
                                                                            </span> for an Appointment by 01:20 PM </a>
                                                                    </h6>
                                                                    <span class="message-time">2 Days ago</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="table-noti-info">
                                                                <div class="table-noti-icon color-blue">
                                                                    <i class="fa-solid fa-star"></i>
                                                                </div>
                                                                <div class="table-noti-message">
                                                                    <h6><a href="#">You have a <span> New </span> Review
                                                                            for your Appointment </a></h6>
                                                                    <span class="message-time">5 Days ago</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="col-xl-5 d-flex">
                                <div class="dashboard-card w-100">
                                    <div class="dashboard-card-head">
                                        <div class="header-title">
                                            <h5>Clinics & Availability</h5>
                                        </div>
                                    </div>
                                    <div class="dashboard-card-body">
                                        <div class="clinic-available">
                                            <div class="clinic-head">
                                                <div class="clinic-info">
                                                    <span class="clinic-img">
                                                        <img src="../assets/img/doctors-dashboard/clinic-02.jpg"
                                                            alt="Img">
                                                    </span>
                                                    <h6>Sofi’s Clinic</h6>
                                                </div>
                                                <div class="clinic-charge">
                                                    <span>$900</span>
                                                </div>
                                            </div>
                                            <div class="available-time">
                                                <ul>
                                                    <li>
                                                        <span>Tue :</span>
                                                        07:00 AM - 09:00 PM
                                                    </li>
                                                    <li>
                                                        <span>Wed : </span>
                                                        07:00 AM - 09:00 PM
                                                    </li>
                                                </ul>
                                                <div class="change-time">
                                                    <a href="#">Change </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clinic-available mb-0">
                                            <div class="clinic-head">
                                                <div class="clinic-info">
                                                    <span class="clinic-img">
                                                        <img src="../assets/img/doctors-dashboard/clinic-01.jpg"
                                                            alt="Img">
                                                    </span>
                                                    <h6>The Family Dentistry Clinic</h6>
                                                </div>
                                                <div class="clinic-charge">
                                                    <span>$600</span>
                                                </div>
                                            </div>
                                            <div class="available-time">
                                                <ul>
                                                    <li>
                                                        <span>Sat :</span>
                                                        07:00 AM - 09:00 PM
                                                    </li>
                                                    <li>
                                                        <span>Tue : </span>
                                                        07:00 AM - 09:00 PM
                                                    </li>
                                                </ul>
                                                <div class="change-time">
                                                    <a href="#">Change </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    @include('include.footer')
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <script>  
    function updateAppointment(status, requestId) {
        Swal.fire({
            title: "Are you sure?",
            // text: "You won't be able to revert this!",
            icon: "done",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, proceed!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('doctor.status.appointment') }}", // Adjust this URL to your route
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        patientId: requestId,
                        status: status
                    },
                    success: function(response) {
                        console.log(response.data);
                        $('#latest-appointment-list').replaceWith(response.data);
                        $('#appointmentRequestCounter').text(response.requestCounter);
                        jQuery('#latest-appointment-list').hide().delay(200).fadeIn();
                        
                        if (status === 'canceled') {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Appointment Canceled',
                                text: response.message,
                            });
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Done!',
                                text: response.message,
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'An error occurred while updating the appointment status.',
                        });
                    }
                });
            }
        });
    }
    
    $(document).ready(function() {
        $('.dropdown-item').on('click', function() {
            var filterKey = $(this).data('filter');
            $.ajax({
                url: "<?= route('filter.appointment.request') ?>",
                method: 'get',
                data: {
                    _token: '{{ csrf_token() }}',
                    filterKey: filterKey
                },
                success: function(response) {
                    $('#appointment-request-list').html(response.data);
                    $('#appointment-request-list').hide().fadeIn();
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An error occurred while filtering the appointments.',
                    });
                }
            });
        });
    });
    
    </script>