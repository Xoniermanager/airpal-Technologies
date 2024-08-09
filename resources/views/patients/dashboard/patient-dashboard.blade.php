@extends('layouts.patient.main')
@section('content')
    <div class="row">
        <div class="col-xl-8 d-flex">
            <div class="dashboard-card w-100">
                <div class="dashboard-card-head">
                    <div class="header-title">
                        <h5>Health Records</h5>
                    </div>
     
                </div>
                <div class="dashboard-card-body">
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="health-records icon-orange">
                                        <span><i class="fa-solid fa-heart"></i>Heart Rate</span>
                                        <h3>140 Bpm <sup> 2%</sup></h3>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="health-records icon-amber">
                                        <span><i class="fa-solid fa-temperature-high"></i>Body
                                            Temprature</span>
                                        <h3>37.5 C</h3>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="health-records icon-dark-blue">
                                        <span><i class="fa-solid fa-notes-medical"></i>Glucose
                                            Level</span>
                                        <h3>70 - 90<sup> 6%</sup></h3>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="health-records icon-blue">
                                        <span><i class="fa-solid fa-highlighter"></i>SPo2</span>
                                        <h3>96%</h3>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="health-records icon-red">
                                        <span><i class="fa-solid fa-syringe"></i>Blood
                                            Pressure</span>
                                        <h3>100 mg/dl<sup> 2%</sup></h3>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="health-records icon-purple">
                                        <span><i class="fa-solid fa-user-pen"></i>BMI </span>
                                        <h3>20.1 kg/m2</h3>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="report-gen-date">
                                        <p>Report generated on last visit : 25 Mar 2024 <span><i
                                                    class="fa-solid fa-copy"></i></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="chart-over-all-report">
                                <h5>Overall Report</h5>
                                <div class="circle-bar circle-bar3 report-chart">
                                    <div class="circle-graph3" data-percent="66">
                                        <p>Last visit
                                            25 Mar 2024</p>
                                    </div>
                                </div>
                                <span class="health-percentage">Your health is 95% Normal</span>
                                <a href="{{ route('patient.medical-details.index')}}" class="btn btn-dark w-100">View
                                    Details<i class="fa-solid fa-chevron-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 d-flex">
            <div class="favorites-dashboard w-100">
                <div class="book-appointment-head">
                    <h3><span>Book a new</span>Appointment</h3>
                    <span class="add-icon"><a href="#"><i class="fa-solid fa-circle-plus"></i></a></span>
                </div>
                <div class="dashboard-card w-100">
                    <div class="dashboard-card-head">
                        <div class="header-title">
                            <h5>Favourites</h5>
                        </div>
                        <div class="card-view-link">
                            <a href="{{ route('patient.favorite.index') }}">View All</a>
                        </div>
                    </div>
                    <div class="dashboard-card-body">
                        @forelse ($favoriteDoctors->take(4)  as $favoriteDoctor)
                            <div class="doctor-fav-list">
                                <div class="doctor-info-profile">
                                    <a href="{{ route('frontend.doctor.profile', ['user' => $favoriteDoctor->doctor->id]) }}"
                                        class="table-avatar">
                                        <img src="{{ $favoriteDoctor->doctor->image_url ?? '' }}" alt="Img">
                                    </a>
                                    <div class="doctor-name-info">
                                        <h5><a
                                                href="{{ route('frontend.doctor.profile', ['user' => $favoriteDoctor->doctor->id]) }}">Dr.
                                                {{ $favoriteDoctor->doctor->fullName }}</a></h5>
                                        @isset($favoriteDoctor->doctor)
                                            @forelse ($favoriteDoctor->doctor->specializations as $specialization)
                                                <span class="badge badge-info text-white">{{ $specialization->name }}</span>
                                            @empty
                                                <p>N/A</p>
                                            @endforelse
                                        @endisset
                                    </div>
                                </div>
                                <a href="{{ route('appointment.index', ['id' => $favoriteDoctor->doctor->id]) }}"
                                    class="cal-plus-icon"><i class="fa-solid fa-calendar-plus"></i></a>
                            </div>
                            @empty
                                <div class="doctor-fav-list">
                                    <p>Not Found</p>
                                </div>
                            @endforelse


                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 d-flex">
                <div class="dashboard-main-col w-100">
                    <div class="dashboard-card w-100">
                        <div class="dashboard-card-head">
                            <div class="header-title">
                                <h5><span class="card-head-icon"><i class="fa-solid fa-calendar-days"></i></span>Appointments
                                </h5>
                            </div>
                            <div class="card-view-link">
                                <div class="owl-nav slide-nav text-end nav-control"></div>
                            </div>
                        </div>
                        <div class="dashboard-card-body">
                            <div class="apponiment-dates">

                                @forelse ($patientUpcomingBookings as $patientUpcomingBooking)
                                    <div class="appointment-dash-card">
                                        <div class="doctor-fav-list">
                                            <div class="doctor-info-profile">
                                                <a href="#" class="table-avatar">
                                                    <img src="{{ $patientUpcomingBooking->user->image_url }}" alt="Img">
                                                </a>
                                                <div class="doctor-name-info">
                                                    <h5><a
                                                            href="#">Dr.{{ $patientUpcomingBooking->user->fullName ?? '' }}</a>
                                                    </h5>
                                                    <span>Dentist</span>
                                                </div>
                                            </div>
                                            <a href="#" class="cal-plus-icon"><i class="fa-solid fa-hospital"></i></a>
                                        </div>
                                        <div class="date-time">
                                            <p><i class="fa-solid fa-clock"></i>
                                                {{ date('j M Y', strtotime($patientUpcomingBooking->booking_date)) ?? '' }} -
                                                {{ date('h:i A', strtotime($patientUpcomingBooking->slot_start_time)) ?? '' }}
                                            </p>
                                        </div>
                                        <div class="card-btns">
                                            <a href="#" class="btn btn-gray"><i
                                                    class="fa-solid fa-comment-dots"></i>Chat Now</a>
                                            <a href="patient-appointments.html" class="btn btn-outline-primary"><i
                                                    class="fa-solid fa-calendar-check"></i>Attend</a>
                                        </div>
                                    </div>
                                @empty
                                @endforelse


                            </div>
                        </div>
                    </div>
                    <div class="dashboard-card w-100">
                        <div class="dashboard-card-head">
                            <div class="header-title">
                                <h5>Past Appointments</h5>
                            </div>
                            <div class="card-view-link">
                                <div class="owl-nav slide-nav2 text-end nav-control">
                                </div>
                            </div>
                        </div>
                        @forelse ($patientPastBookings->take(2) as $patientPastBookings)
                            <div class="appointment-dash-card">
                                <div class="doctor-fav-list">
                                    <div class="doctor-info-profile">
                                        <a href="#" class="table-avatar">
                                            <img src="{{ $patientPastBookings->user->image_url }}" alt="Img">
                                        </a>
                                        <div class="doctor-name-info">
                                            <h5><a href="#">Dr.{{ $patientPastBookings->user->fullName ?? '' }}</a>
                                            </h5>
                                            <span>Dentist</span>
                                        </div>
                                    </div>
                                    <a href="#" class="cal-plus-icon"><i class="fa-solid fa-hospital"></i></a>
                                </div>
                                <div class="date-time">
                                    <p><i class="fa-solid fa-clock"></i>
                                        {{ date('j M Y', strtotime($patientPastBookings->booking_date)) ?? '' }} -
                                        {{ date('h:i A', strtotime($patientPastBookings->slot_start_time)) ?? '' }}
                                    </p>
                                </div>
                                <div class="card-btns">
                                    <a href="#" class="btn btn-gray"><i class="fa-solid fa-comment-dots"></i>Chat
                                        Now</a>
                                    <a href="patient-appointments.html" class="btn btn-outline-primary"><i
                                            class="fa-solid fa-calendar-check"></i>Attend</a>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="col-xl-7 d-flex">
                <div class="dashboard-main-col w-100">
                    <div class="dashboard-card w-100">
                        <div class="dashboard-card-head">
                            <div class="header-title">
                                <h5>Analytics</h5>
                            </div>
                  
                        </div>
                        <div class="dashboard-card-body">
                            <div class="chart-tab">
                                <ul class="nav nav-pills product-licence-tab" id="pills-tab2" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-revenue-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-revenue" type="button" role="tab"
                                            aria-controls="pills-revenue" aria-selected="false">Hear Rate</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-appointment-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-appointment" type="button" role="tab"
                                            aria-controls="pills-appointment" aria-selected="true">Blood Presure</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content w-100" id="v-pills-tabContent" style="height: 300px;">
                                <div class="tab-pane fade show active" id="pills-revenue" role="tabpanel"
                                    aria-labelledby="pills-revenue-tab">
                                    <div id="revenue-chart">
                                        <div class="search-header">
                                            <select id="time-period-revenue" class="">
                                                <option value="currentMonth">Current Month</option>
                                                <option value="monthly">Monthly</option>
                                                <option value="yearly">Yearly</option>
                                            </select>
                                        </div>
                                        <div id="revenue_chart_div" class="mb-4"></div>
                                    </div>
                                </div>
                                <div class="tab-pane fade active" id="pills-appointment" role="tabpanel"
                                    aria-labelledby="pills-appointment-tab">
                                    <div id="appointment-chart">
                                        <select id="time-period-appointment" class="">
                                            <option value="currentMonth">Current Month</option>
                                            <option value="monthly">Monthly</option>
                                            <option value="yearly">Yearly</option>
                                        </select>
                                        <div id="booking_chart_div"></div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="tab-content pt-0">

                                <div class="tab-pane fade active show" id="heart-rate" role="tabpanel">
                                    <div id="heart-rate-chart">
                                        <div id="chart_div"></div>
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="blood-pressure" role="tabpanel">
                                    <div id="blood-pressure-chart"></div>
                                </div>

                            </div> --}}
                        </div>
                    </div>
       
                    <div class="dashboard-card w-100">
                        <div class="dashboard-card-head">
                            <div class="header-title">
                                <h5>Dependant</h5>
                            </div>
                            <div class="card-view-link">
                                <a href="#" class="add-new" data-bs-toggle="modal" data-bs-target="#add_dependent"><i
                                        class="fa-solid fa-circle-plus me-2"></i>Add New</a>
                                <a href="dependent.html">View All</a>
                            </div>
                        </div>
                        <div class="dashboard-card-body">
                            <div class="doctor-fav-list">
                                <div class="doctor-info-profile">
                                    <a href="#" class="table-avatar">
                                        <img src="../assets/img/patients/patient-20.jpg" alt="Img">
                                    </a>
                                    <div class="doctor-name-info">
                                        <h5><a href="#">Laura</a></h5>
                                        <span>Mother - 58 years 20 days</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <a href="#" class="cal-plus-icon me-2"><i
                                            class="fa-solid fa-calendar-plus"></i></a>
                                    <a href="dependent.html" class="cal-plus-icon"><i class="fa-solid fa-eye"></i></a>
                                </div>
                            </div>
                            <div class="doctor-fav-list">
                                <div class="doctor-info-profile">
                                    <a href="#" class="table-avatar">
                                        <img src="../assets/img/patients/patient-21.jpg" alt="Img">
                                    </a>
                                    <div class="doctor-name-info">
                                        <h5><a href="#">Mathew</a></h5>
                                        <span>Father - 59 years 15 days</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <a href="#" class="cal-plus-icon me-2"><i
                                            class="fa-solid fa-calendar-plus"></i></a>
                                    <a href="dependent.html" class="cal-plus-icon"><i class="fa-solid fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 d-flex">
                <div class="dashboard-card w-100">
                    <div class="dashboard-card-head">
                        <div class="header-title">
                            <h5>Reports</h5>
                        </div>

                    </div>
                    <div class="dashboard-card-body">
                        <div class="account-detail-table">

                            <nav class="patient-dash-tab border-0 pb-0 mb-3 mt-3">
                                <ul class="nav nav-tabs-bottom">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#appoint-tab" data-bs-toggle="tab">Appointments</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#medical-tab" data-bs-toggle="tab">Medical Records</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#prsc-tab" data-bs-toggle="tab">Prescriptions</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#invoice-tab" data-bs-toggle="tab">Invoices</a>
                                    </li>
                                </ul>
                            </nav>


                            <div class="tab-content pt-0">

                                <div id="appoint-tab" class="tab-pane fade show active">
                                    <div class="custom-new-table">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-center mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Test Name</th>
                                                        <th>Date</th>
                                                        <th>Referred By</th>
                                                        <th>Amount</th>
                                                        <th>Comments</th>
                                                        <th>Status</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:void(0);"><span
                                                                    class="text-blue">RE124343</span></a>
                                                        </td>
                                                        <td>
                                                            Electro cardiography
                                                        </td>
                                                        <td>21 Mar 2024</td>
                                                        <td>Edalin Hendry</td>
                                                        <td>$300</td>
                                                        <td>Good take rest</td>
                                                        <td>
                                                            <span class="badge badge-success-bg">Normal</span>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <a href="#" class="account-action me-2"><i
                                                                        class="fa-solid fa-prescription"></i></a>
                                                                <a href="#" class="account-action"><i
                                                                        class="fa-solid fa-file-invoice-dollar"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:void(0);"><span
                                                                    class="text-blue">RE124342</span></a>
                                                        </td>
                                                        <td>
                                                            Complete Blood Count
                                                        </td>
                                                        <td>28 Mar 2024</td>
                                                        <td>Shanta Nesmith</td>
                                                        <td>$400</td>
                                                        <td>Stable, no change</td>
                                                        <td>
                                                            <span class="badge badge-success-bg">Normal</span>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <a href="#" class="account-action me-2"><i
                                                                        class="fa-solid fa-prescription"></i></a>
                                                                <a href="#" class="account-action"><i
                                                                        class="fa-solid fa-file-invoice-dollar"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:void(0);"><span
                                                                    class="text-blue">RE124341</span></a>
                                                        </td>
                                                        <td>
                                                            Blood Glucose Test
                                                        </td>
                                                        <td>02 Apr 2024</td>
                                                        <td>John Ewel</td>
                                                        <td>$350</td>
                                                        <td>All Clear</td>
                                                        <td>
                                                            <span class="badge badge-success-bg">Normal</span>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <a href="#" class="account-action me-2"><i
                                                                        class="fa-solid fa-prescription"></i></a>
                                                                <a href="#" class="account-action"><i
                                                                        class="fa-solid fa-file-invoice-dollar"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:void(0);"><span
                                                                    class="text-blue">RE124340</span></a>
                                                        </td>
                                                        <td>
                                                            Liver Function Tests
                                                        </td>
                                                        <td>15 Apr 2024</td>
                                                        <td>Joseph Engels</td>
                                                        <td>$480</td>
                                                        <td>Stable, no change</td>
                                                        <td>
                                                            <span class="badge badge-success-bg">Normal</span>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <a href="#" class="account-action me-2"><i
                                                                        class="fa-solid fa-prescription"></i></a>
                                                                <a href="#" class="account-action"><i
                                                                        class="fa-solid fa-file-invoice-dollar"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:void(0);"><span
                                                                    class="text-blue">RE124339</span></a>
                                                        </td>
                                                        <td>
                                                            Lipid Profile
                                                        </td>
                                                        <td>27 Apr 2024</td>
                                                        <td>Victoria Selzer</td>
                                                        <td>$250</td>
                                                        <td>Good take rest</td>
                                                        <td>
                                                            <span class="badge badge-success-bg">Normal</span>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <a href="#" class="account-action me-2"><i
                                                                        class="fa-solid fa-prescription"></i></a>
                                                                <a href="#" class="account-action"><i
                                                                        class="fa-solid fa-file-invoice-dollar"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="#"><span class="text-blue">RE124338</span></a>
                                                        </td>
                                                        <td>
                                                            Blood Cultures
                                                        </td>
                                                        <td>10 May 2024</td>
                                                        <td>Juliet Gabriel</td>
                                                        <td>$320</td>
                                                        <td>Good take rest</td>
                                                        <td>
                                                            <span class="badge badge-success-bg">Normal</span>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <a href="#" class="account-action me-2"><i
                                                                        class="fa-solid fa-prescription"></i></a>
                                                                <a href="#" class="account-action"><i
                                                                        class="fa-solid fa-file-invoice-dollar"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="medical-tab">
                                    <div class="custom-table">
                                        <div class="table-responsive">
                                            <table class="table table-center mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Date</th>
                                                        <th>Description</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-blue-600"><a href="javascript:void(0);">#MR-123</a>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="lab-icon">
                                                                <span><i class="fa-solid fa-paperclip"></i></span>Lab
                                                                Report
                                                            </a>
                                                        </td>
                                                        <td>24 Mar 2024</td>
                                                        <td>Glucose Test V12</td>
                                                        <td>
                                                            <div class="action-item">
                                                                <a href="javascript:void(0);">
                                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                                </a>
                                                                <a href="javascript:void(0);">
                                                                    <i class="fa-solid fa-download"></i>
                                                                </a>
                                                                <a href="javascript:void(0);">
                                                                    <i class="fa-solid fa-trash-can"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-blue-600"><a href="javascript:void(0);">#MR-124</a>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="lab-icon">
                                                                <span><i class="fa-solid fa-paperclip"></i></span>Lab
                                                                Report
                                                            </a>
                                                        </td>
                                                        <td>27 Mar 2024</td>
                                                        <td>Complete Blood Count(CBC)</td>
                                                        <td>
                                                            <div class="action-item">
                                                                <a href="javascript:void(0);">
                                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                                </a>
                                                                <a href="javascript:void(0);">
                                                                    <i class="fa-solid fa-download"></i>
                                                                </a>
                                                                <a href="javascript:void(0);">
                                                                    <i class="fa-solid fa-trash-can"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-blue-600"><a href="#">#MR-125</a></td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="lab-icon">
                                                                <span><i class="fa-solid fa-paperclip"></i></span>Lab
                                                                Report
                                                            </a>
                                                        </td>
                                                        <td>10 Apr 2024</td>
                                                        <td>Echocardiogram</td>
                                                        <td>
                                                            <div class="action-item">
                                                                <a href="javascript:void(0);">
                                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                                </a>
                                                                <a href="javascript:void(0);">
                                                                    <i class="fa-solid fa-download"></i>
                                                                </a>
                                                                <a href="javascript:void(0);">
                                                                    <i class="fa-solid fa-trash-can"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-blue-600"><a href="javascript:void(0);">#MR-126</a>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="lab-icon">
                                                                <span><i class="fa-solid fa-paperclip"></i></span>Lab
                                                                Report
                                                            </a>
                                                        </td>
                                                        <td>19 Apr 2024</td>
                                                        <td>COVID-19 Test</td>
                                                        <td>
                                                            <div class="action-item">
                                                                <a href="javascript:void(0);">
                                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                                </a>
                                                                <a href="javascript:void(0);">
                                                                    <i class="fa-solid fa-download"></i>
                                                                </a>
                                                                <a href="javascript:void(0);">
                                                                    <i class="fa-solid fa-trash-can"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-blue-600"><a href="javascript:void(0);">#MR-127</a>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="lab-icon">
                                                                <span><i class="fa-solid fa-paperclip"></i></span>Lab
                                                                Report
                                                            </a>
                                                        </td>
                                                        <td>27 Apr 2024</td>
                                                        <td>Allergy Tests</td>
                                                        <td>
                                                            <div class="action-item">
                                                                <a href="javascript:void(0);">
                                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                                </a>
                                                                <a href="javascript:void(0);">
                                                                    <i class="fa-solid fa-download"></i>
                                                                </a>
                                                                <a href="javascript:void(0);">
                                                                    <i class="fa-solid fa-trash-can"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-blue-600"><a href="#">#MR-128</a></td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="lab-icon">
                                                                <span><i class="fa-solid fa-paperclip"></i></span>Lab
                                                                Report
                                                            </a>
                                                        </td>
                                                        <td>02 May 2024</td>
                                                        <td>Lipid Panel </td>
                                                        <td>
                                                            <div class="action-item">
                                                                <a href="javascript:void(0);">
                                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                                </a>
                                                                <a href="javascript:void(0);">
                                                                    <i class="fa-solid fa-download"></i>
                                                                </a>
                                                                <a href="javascript:void(0);">
                                                                    <i class="fa-solid fa-trash-can"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="prsc-tab">
                                    <div class="custom-table">
                                        <div class="table-responsive">
                                            <table class="table table-center mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Created Date</th>
                                                        <th>Prescriped By</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-blue-600"><a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#view_prescription">#PR-123</a>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="lab-icon prescription">
                                                                <span><i
                                                                        class="fa-solid fa-prescription"></i></span>Prescription
                                                            </a>
                                                        </td>
                                                        <td>24 Mar 2024, 10:30 AM</td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                                    <img class="avatar-img rounded-3"
                                                                        src="../assets/img/doctors/doctor-thumb-02.jpg"
                                                                        alt="">
                                                                </a>
                                                                <a href="doctor-profile.html">Edalin
                                                                    Hendry</a>
                                                            </h2>
                                                        </td>
                                                        <td>
                                                            <div class="action-item">
                                                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                    data-bs-target="#view_prescription">
                                                                    <i class="fa-solid fa-link"></i>
                                                                </a>
                                                                <a href="javascript:void(0);">
                                                                    <i class="fa-solid fa-download"></i>
                                                                </a>
                                                                <a href="javascript:void(0);">
                                                                    <i class="fa-solid fa-trash-can"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-blue-600"><a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#view_prescription">#PR-124</a>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="lab-icon prescription">
                                                                <span><i
                                                                        class="fa-solid fa-prescription"></i></span>Prescription
                                                            </a>
                                                        </td>
                                                        <td>27 Mar 2024, 11:15 AM</td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                                    <img class="avatar-img rounded-3"
                                                                        src="../assets/img/doctors/doctor-thumb-05.jpg"
                                                                        alt="">
                                                                </a>
                                                                <a href="doctor-profile.html">John
                                                                    Homes</a>
                                                            </h2>
                                                        </td>
                                                        <td>
                                                            <div class="action-item">
                                                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                    data-bs-target="#view_prescription">
                                                                    <i class="fa-solid fa-link"></i>
                                                                </a>
                                                                <a href="javascript:void(0);">
                                                                    <i class="fa-solid fa-download"></i>
                                                                </a>
                                                                <a href="javascript:void(0);">
                                                                    <i class="fa-solid fa-trash-can"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-blue-600"><a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#view_prescription">#PR-125</a>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="lab-icon prescription">
                                                                <span><i
                                                                        class="fa-solid fa-prescription"></i></span>Prescription
                                                            </a>
                                                        </td>
                                                        <td>11 Apr 2024, 09:00 AM</td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                                    <img class="avatar-img rounded-3"
                                                                        src="../assets/img/doctors/doctor-thumb-03.jpg"
                                                                        alt="">
                                                                </a>
                                                                <a href="doctor-profile.html">Shanta
                                                                    Neill</a>
                                                            </h2>
                                                        </td>
                                                        <td>
                                                            <div class="action-item">
                                                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                    data-bs-target="#view_prescription">
                                                                    <i class="fa-solid fa-link"></i>
                                                                </a>
                                                                <a href="javascript:void(0);">
                                                                    <i class="fa-solid fa-download"></i>
                                                                </a>
                                                                <a href="javascript:void(0);">
                                                                    <i class="fa-solid fa-trash-can"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-blue-600"><a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#view_prescription">#PR-126</a>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="lab-icon prescription">
                                                                <span><i
                                                                        class="fa-solid fa-prescription"></i></span>Prescription
                                                            </a>
                                                        </td>
                                                        <td>15 Apr 2024, 02:30 PM</td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                                    <img class="avatar-img rounded-3"
                                                                        src="../assets/img/doctors/doctor-thumb-08.jpg"
                                                                        alt="">
                                                                </a>
                                                                <a href="doctor-profile.html">Anthony
                                                                    Tran</a>
                                                            </h2>
                                                        </td>
                                                        <td>
                                                            <div class="action-item">
                                                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                    data-bs-target="#view_prescription">
                                                                    <i class="fa-solid fa-link"></i>
                                                                </a>
                                                                <a href="javascript:void(0);">
                                                                    <i class="fa-solid fa-download"></i>
                                                                </a>
                                                                <a href="javascript:void(0);">
                                                                    <i class="fa-solid fa-trash-can"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-blue-600"><a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#view_prescription">#PR-127</a>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="lab-icon prescription">
                                                                <span><i
                                                                        class="fa-solid fa-prescription"></i></span>Prescription
                                                            </a>
                                                        </td>
                                                        <td>23 Apr 2024, 06:40 PM</td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                                    <img class="avatar-img rounded-3"
                                                                        src="../assets/img/doctors/doctor-thumb-01.jpg"
                                                                        alt="">
                                                                </a>
                                                                <a href="doctor-profile.html">Susan
                                                                    Lingo</a>
                                                            </h2>
                                                        </td>
                                                        <td>
                                                            <div class="action-item">
                                                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                    data-bs-target="#view_prescription">
                                                                    <i class="fa-solid fa-link"></i>
                                                                </a>
                                                                <a href="javascript:void(0);">
                                                                    <i class="fa-solid fa-download"></i>
                                                                </a>
                                                                <a href="javascript:void(0);">
                                                                    <i class="fa-solid fa-trash-can"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="invoice-tab">
                                    <div class="custom-table">
                                        <div class="table-responsive">
                                            <table class="table table-center mb-0">
                                                <thead>
                                                    <tr>
                                                        {{-- <th>ID</th> --}}
                                                        <th>Doctor</th>
                                                        <th>Appointment Date</th>
                                                        <th>Booked on</th>
                                                        <th>Amount</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($patientInvoicesList->take(8) as $patientInvoice )
                                                    <tr>
                                                        {{-- <td class="text-blue-600"><a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#invoice_view">#Inv-2021</a>
                                                        </td> --}}
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                                    <img class="avatar-img rounded-3"
                                                                        src="../assets/img/doctors/doctor-thumb-21.jpg"
                                                                        alt="">
                                                                </a>
                                                                <a href="doctor-profile.html">Dr.  {{  $patientInvoice->user->fullName}}</a>
                                                            </h2>
                                                        </td>
                                                        <td>{{ date('j M Y', strtotime($patientInvoice->booking_date)) ?? '' }}
                                                            {{-- {{ date('h:i A', strtotime($patientInvoice->slot_start_time)) ?? '' }} --}}
                                                        </td>
                                                        <td>{{ date('j M Y', strtotime($patientInvoice->created_at)) ?? '' }}</td>
                                                        <td>${{$patientInvoice->user->payment ?? 0}}</td>
                                                        <td>
                                                            @if (isset($invoiceDetail->invoice_url))
                                                            <a href="javascript:void(0)" class="set-bg-color"
                                                                onclick="printInvoice('{{ Storage::url($invoiceDetail->invoice_url) }}');">
                                                                <i class="fa-solid fa-print"></i>
                                                            </a>
                                                        @else
                                                            <a href="javascript:void(0)">
                                                                <i class="fa-solid fa-print"></i>
                                                            </a>
                                                        @endif
                                                            {{-- <div class="action-item">
                                                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                    data-bs-target="#invoice_view">
                                                                    <i class="fa-solid fa-link"></i>
                                                                </a>
                                                                <a href="javascript:void(0);">
                                                                    <i class="fa-solid fa-print"></i>
                                                                </a>
                                                            </div> --}}
                                                        </td>
                                                    </tr> 
                                                    @empty
                                                        
                                                    @endforelse
                             
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection

    @section('javascript')
        <script>
            $(document).ready(function() {
                var graphBookingData = [];
                var graphRevenueData = [];

                google.charts.load('current', {
                    packages: ['corechart', 'line']
                });

                // Function to load booking data
                function loadGraphBookingData(period) {
                    // period = period ?? 'currentMonth';
                    // $.ajax({
                    //     url: "<?= route('doctor.booking.graphData') ?>",
                    //     type: 'get',
                    //     data: {
                    //         'period': period
                    //     },
                    //     success: function(response) {
                            graphBookingData = [
                                [25, 5.240266007932762],
                                [26, 5.253756507319332],
                                [27, 5.22029650790401],
                                [28, 5.268704059004204],
                                [29, 5.233683845050076],
                                [30, 5.289605815622391],
                                [31, 5.232041091123958],
                                [1, 5.2301254401862955],
                                [2, 5.250722035402405],
                                [3, 5.283736492427697],
                                [4, 5.296890906826341],
                                [5, 5.355039204322343],
                                [6, 5.346735747035125],
                                [7, 5.326231782387644],
                                [8, 5.3273666240507165],
                                [9, 5.328501949410373],
                                [10, 5.291005414482904],
                                [11, 5.317451861825049],
                                [12, 5.3344712035425745],
                                [13, 5.318865815686569],
                                [14, 5.3273666240507165],
                                [15, 5.327650410031998],
                                [16, 5.33532534905194],
                                [17, 5.294647171789238],
                                [18, 5.243288403010766],
                                [19, 5.2449386384155785],
                                [20, 5.265097477347184],
                                [21, 5.291005414482904],
                                [22, 5.290165399493866],
                                [23, 5.243013533000918],
                                [24, 5.177591381675723],
                                [25, 5.136106760580972],
                                [26, 5.118754990317601],
                                [27, 5.132943184294443],
                                [28, 5.093984040401572],
                                [29, 5.092946441953961],
                                [1, 5.096580274206888]
                            ];
                            drawLogScalesBooking();
                    //     },
                    //     error: function(xhr, status, error) {
                    //         console.error(error);
                    //     }
                    // });
                }

                // Function to load revenue data
                function loadGraphRevenueData(period) {
                    // period = period ?? 'currentMonth';
                    // $.ajax({
                    //     url: "<?= route('revenue.report') ?>",
                    //     type: 'get',
                    //     data: {
                    //         'period': period
                    //     },
                    //     success: function(response) {
                            graphRevenueData = [
                                [25, 5.240266007932762],
                                [26, 5.253756507319332],
                                [27, 5.22029650790401],
                                [28, 5.268704059004204],
                                [29, 5.233683845050076],
                                [30, 5.289605815622391],
                                [31, 5.232041091123958],
                                [1, 5.2301254401862955],
                                [2, 5.250722035402405],
                                [3, 5.283736492427697],
                                [4, 5.296890906826341],
                                [5, 5.355039204322343],
                                [6, 5.346735747035125],
                                [7, 5.326231782387644],
                                [8, 5.3273666240507165],
                                [9, 5.328501949410373],
                                [10, 5.291005414482904],
                                [11, 5.317451861825049],
                                [12, 5.3344712035425745],
                                [13, 5.318865815686569],
                                [14, 5.3273666240507165],
                                [15, 5.327650410031998],
                                [16, 5.33532534905194],
                                [17, 5.294647171789238],
                                [18, 5.243288403010766],
                                [19, 5.2449386384155785],
                                [20, 5.265097477347184],
                                [21, 5.291005414482904],
                                [22, 5.290165399493866],
                                [23, 5.243013533000918],
                                [24, 5.177591381675723],
                                [25, 5.136106760580972],
                                [26, 5.118754990317601],
                                [27, 5.132943184294443],
                                [28, 5.093984040401572],
                                [29, 5.092946441953961],
                                [1, 5.096580274206888]
                            ];
                            drawLogScalesRevenue();
          
                            
                }

                // Function to draw booking chart
                function drawLogScalesBooking() {
                    var data = new google.visualization.DataTable();
                    data.addColumn('number', 'X');
                    data.addColumn('number', 'rate');
                    data.addRows(graphBookingData);

                    var view = new google.visualization.DataView(data);
                    view.setColumns([{
                        sourceColumn: 0,
                        type: 'string',
                        calc: function(dt, rowIndex) {
                            return String(dt.getValue(rowIndex, 0));
                        }
                    }, 1]);

                    var bookingOptions = {
                        hAxis: {
                            title: 'Periods',
                            logScale: false
                        },
                        vAxis: {
                            title: 'Blood Presure',
                            logScale: false
                        },
                        colors: ['#004cd4', '#097138']
                    };

                    var chartBooking = new google.visualization.LineChart(document.getElementById('booking_chart_div'));
                    chartBooking.draw(view, bookingOptions);
                }

                // Function to draw revenue chart
                function drawLogScalesRevenue() {
                    var data = new google.visualization.DataTable();
                    data.addColumn('number', 'X');
                    data.addColumn('number', 'rate');
                    data.addRows(graphRevenueData);

                    var view = new google.visualization.DataView(data);
                    view.setColumns([{
                        sourceColumn: 0,
                        type: 'string',
                        calc: function(dt, rowIndex) {
                            return String(dt.getValue(rowIndex, 0));
                        }
                    }, 1]);

                    var revenueOptions = {
                        hAxis: {
                            title: 'Periods',
                            logScale: false
                        },
                        vAxis: {
                            title: 'Heart Rate',
                            logScale: false
                        },
                        colors: ['#004cd4', '#097138']
                    };

                    var chartRevenue = new google.visualization.LineChart(document.getElementById('revenue_chart_div'));
                    chartRevenue.draw(view, revenueOptions);
                }

                // Initialize charts on page load
                google.charts.setOnLoadCallback(function() {
                    loadGraphBookingData('currentMonth');
                    loadGraphRevenueData('currentMonth');
                });

                // Event listener for revenue time period change
                $("#time-period-revenue").change(function() {
                    var period = $(this).val() ?? 'currentMonth';
                    loadGraphRevenueData(period);
                });

                // Event listener for appointment time period change
                $("#time-period-appointment").change(function() {
                    var period = $(this).val() ?? 'currentMonth';
                    loadGraphBookingData(period);
                });
            });
        </script>
    @endsection
