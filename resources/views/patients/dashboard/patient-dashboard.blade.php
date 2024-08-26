@extends('layouts.patient.main')
@section('content')
    <div class="row">
        <div class="col-xl-8 d-flex">
            <div class="dashboard-card w-100">
                <div class="dashboard-card-head d-block">
                    <div class="header-title">
                        <h5>Health Records
                         <small class="float-right">Report generated on last visit :
                                {{ date('j M Y', strtotime($diaryDetails->updated_at ?? '')) ?? '' }}
                            </small>
                            </h5>
                        <div class="report-gen-date">
                           
                        </div>
                    </div>

                </div>
                <div class="dashboard-card-body">
                    <div class="row">
                        <div class="col-sm-7">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="health-records icon-orange">
                                        <span><i class="fa-solid fa-heart"></i>Heart Rate</span>
                                        <h3>{{ $diaryDetails->pulse_rate ?? 'N/A' }} Bpm
                                            <sup
                                                class="{{ ($diaryDetails->percentage['avg_heart_beat'] ?? 0) > 0 ? 'percentage-color-green' : 'percentage-color-red' }}">
                                                {{ $diaryDetails->percentage['avg_heart_beat'] ?? 0 }}%
                                            </sup>
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="health-records icon-amber">
                                        <span><i class="fa-solid fa-temperature-high"></i>Body
                                            Temprature</span>
                                        <h3>{{ $diaryDetails->avg_body_temp ?? 'N/A' }} C
                                            <sup
                                                class="{{ ($diaryDetails->percentage['avg_body_temp'] ?? 0) > 0 ? 'percentage-color-green' : 'percentage-color-red' }}">
                                                {{ $diaryDetails->percentage['avg_body_temp'] ?? 0 }}%
                                            </sup>
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="health-records icon-dark-blue">
                                        <span><i class="fa-solid fa-notes-medical"></i>Glucose
                                            Level</span>
                                        <h3>{{ $diaryDetails->glucose ?? 'N/A' }}
                                            <sup
                                                class="{{ ($diaryDetails->percentage['glucose'] ?? 0) > 0 ? 'percentage-color-green' : 'percentage-color-red' }}">
                                                {{ $diaryDetails->percentage['glucose'] ?? 0 }}%
                                            </sup>
                                        </h3>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="health-records icon-blue">
                                        <span><i class="fa-solid fa-highlighter"></i>SPo2</span>
                                        <h3>{{ $diaryDetails->oxygen_level ?? 'N/A' }}% <sup>
                                                <sup
                                                    class="{{ ($diaryDetails->percentage['oxygen_level'] ?? 0) > 0 ? 'percentage-color-green' : 'percentage-color-red' }}">
                                                    {{ $diaryDetails->percentage['oxygen_level'] ?? 0 }}%
                                                </sup></h3>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="health-records icon-red">
                                        <span><i class="fa-solid fa-syringe"></i>Blood
                                            Pressure</span>
                                        <h3>{{ $diaryDetails->bp ?? 'N/A' }} mg/dl
                                            <sup class="{{ ($diaryDetails->percentage['bp'] ?? 0) > 0 ? 'percentage-color-green' : 'percentage-color-red' }}">
                                                {{ $diaryDetails->percentage['bp'] ?? 0 }}%
                                            </sup>
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="health-records icon-purple">
                                        <span><i class="fa-solid fa-user-pen"></i>BMI </span>
                                        <h3>20.1 kg/m2</h3>
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
                                <a href="{{ route('patient.diary.index') }}" class="btn btn-dark w-100">View Details<i
                                        class="fa-solid fa-chevron-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 d-flex">
            <div class="favorites-dashboard w-100">
                <div class="book-appointment-head">
                    <a href="{{route('doctors.index')}}"><h3><span>Book a new</span>Appointment</h3></a>
                    <span class="add-icon"><a href="{{route('doctors.index')}}"><i class="fa-solid fa-circle-plus"></i></a></span>
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

            <div class="col-md-12">
                <div class="dashboard-main-col w-100 overflow-hidden">
                    <div class="dashboard-card w-100">
                        <div class="dashboard-card-head">
                            <div class="header-title">
                                <h5>Analytics</h5>
                            </div>

                        </div>
                        <div class="dashboard-card-body">
                            <div class="chart-tab">
                                <ul class="nav nav-pills product-licence-tab" id="pills-tab2" role="tablist">

                                    {{-- Blood pressure graph tab --}}
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-revenue-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-revenue" type="button" role="tab"
                                            aria-controls="pills-revenue" aria-selected="false">Blood Presure</button>
                                    </li>

                                    {{-- Heart rate graph tab --}}
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-appointment-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-appointment" type="button" role="tab"
                                            aria-controls="pills-appointment" aria-selected="true">Heart Rate</button>
                                    </li>
                                    {{-- body temp graph tab --}}
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="body-temp-tab" data-bs-toggle="pill"
                                            data-bs-target="#body-temp" type="button" role="tab"
                                            aria-controls="body-temp" aria-selected="true">Body Temprature</button>
                                    </li>

                                    {{-- glucose graph tab --}}
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="body-temp-tab" data-bs-toggle="pill"
                                            data-bs-target="#glucose" type="button" role="tab" aria-controls="#glucose"
                                            aria-selected="true">Glucose Level</button>
                                    </li>
                                    {{-- oxygen graph tab --}}
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="oxygen-tab" data-bs-toggle="pill"
                                            data-bs-target="#oxygen" type="button" role="tab" aria-controls="#oxygen"
                                            aria-selected="true">Oxygen Level</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content w-100" id="v-pills-tabContent" style="height: 300px;">

                                {{-- Heart Rate graph tab show data --}}
                                <div class="tab-pane fade show active" id="pills-revenue" role="tabpanel"
                                    aria-labelledby="pills-revenue-tab">
                                    <div id="revenue-chart">
                                        <div class="search-header">
                                            <select id="time-period-revenue" class="">
                                                @for ($month = 1; $month <= 12; $month++)
                                                    <option value="{{ $month }}"
                                                        {{ $month == \Carbon\Carbon::now()->month ? 'selected' : '' }}>
                                                        {{ $month }} -
                                                        {{ \Carbon\Carbon::create()->month($month)->format('F') }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div id="heart_rate_chart_div" class="mb-4"></div>
                                    </div>
                                </div>

                                {{-- Blood pressure graph tab show data --}}
                                <div class="tab-pane fade active" id="pills-appointment" role="tabpanel"
                                    aria-labelledby="pills-appointment-tab">
                                    <div id="appointment-chart">
                                        <select id="time-period-heartbeat" class="">
                                            @for ($month = 1; $month <= 12; $month++)
                                                <option value="{{ $month }}"
                                                    {{ $month == \Carbon\Carbon::now()->month ? 'selected' : '' }}>
                                                    {{ $month }} -
                                                    {{ \Carbon\Carbon::create()->month($month)->format('F') }}
                                                </option>
                                            @endfor
                                        </select>
                                        <div id="blood_pressure_chart_div"></div>
                                    </div>
                                </div>

                                {{-- Body temp graph tab show data --}}
                                <div class="tab-pane fade active" id="body-temp" role="tabpanel"
                                    aria-labelledby="body-temp-tab">
                                    <div id="appointment-chart">
                                        <select id="time-period-bodytemp" class="">
                                            @for ($month = 1; $month <= 12; $month++)
                                                <option value="{{ $month }}"
                                                    {{ $month == \Carbon\Carbon::now()->month ? 'selected' : '' }}>
                                                    {{ $month }} -
                                                    {{ \Carbon\Carbon::create()->month($month)->format('F') }}
                                                </option>
                                            @endfor
                                        </select>
                                        <div id="body_temp_chart_div"></div>
                                    </div>
                                </div>

                                {{-- glucose graph tab show data --}}
                                <div class="tab-pane fade active" id="glucose" role="tabpanel"
                                    aria-labelledby="glucose-tab">
                                    <div id="glucose-chart">
                                        <select id="time-period-body-glucose" class="">
                                            @for ($month = 1; $month <= 12; $month++)
                                                <option value="{{ $month }}"
                                                    {{ $month == \Carbon\Carbon::now()->month ? 'selected' : '' }}>
                                                    {{ $month }} -
                                                    {{ \Carbon\Carbon::create()->month($month)->format('F') }}
                                                </option>
                                            @endfor
                                        </select>
                                        <div id="glucose_chart_div"></div>
                                    </div>
                                </div>

                                <div class="tab-pane fade active" id="oxygen" role="tabpanel"
                                    aria-labelledby="oxygen-tab">
                                    <div id="oxygen-chart">
                                        <select id="time-period-body-oxygen" class="">
                                            @for ($month = 1; $month <= 12; $month++)
                                                <option value="{{ $month }}"
                                                    {{ $month == \Carbon\Carbon::now()->month ? 'selected' : '' }}>
                                                    {{ $month }} -
                                                    {{ \Carbon\Carbon::create()->month($month)->format('F') }}
                                                </option>
                                            @endfor
                                        </select>
                                        <div id="oxygen_chart_div"></div>
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


                </div>
            </div>
            <div class="col-md-5 d-flex">
                <div class="dashboard-main-col w-100">
                    <div class="dashboard-card w-100">
                        <div class="dashboard-card-head">
                            <div class="header-title">
                                <h5><span class="card-head-icon"><i class="fa-solid fa-calendar-days"></i></span>Upcomming
                                    Appointments
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
                                                {{ date('j M Y', strtotime($patientUpcomingBooking->booking_date)) ?? '' }}
                                                -
                                                {{ date('h:i A', strtotime($patientUpcomingBooking->slot_start_time)) ?? '' }}
                                            </p>
                                        </div>
                                        <div class="card-btns">
                                            <a href="#" class="btn btn-gray"><i
                                                    class="fa-solid fa-comment-dots"></i>Chat
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
                </div>
            </div>
            <div class="col-md-7">
                {{-- <div class="dashboard-card w-100">
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
                                <a href="#" class="cal-plus-icon me-2"><i class="fa-solid fa-calendar-plus"></i></a>
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
                                <a href="#" class="cal-plus-icon me-2"><i class="fa-solid fa-calendar-plus"></i></a>
                                <a href="dependent.html" class="cal-plus-icon"><i class="fa-solid fa-eye"></i></a>
                            </div>
                        </div>
                    </div>
                </div> --}}
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
                                    {{-- <li class="nav-item">
                                        <a class="nav-link active" href="#appoint-tab" data-bs-toggle="tab">Appointments</a>
                                    </li> --}}
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#medical-tab" data-bs-toggle="tab">Medical
                                            Records</a>
                                    </li>
                                    {{-- <li class="nav-item">
                                            <a class="nav-link" href="#prsc-tab" data-bs-toggle="tab">Prescriptions</a>
                                        </li> --}}
                                    <li class="nav-item">
                                        <a class="nav-link" href="#invoice-tab" data-bs-toggle="tab">Invoices</a>
                                    </li>
                                </ul>
                            </nav>


                            <div class="tab-content pt-0">

                                {{-- <div id="appoint-tab" class="tab-pane fade show active">
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
                                </div> --}}


                                <div class="tab-pane fade show active" id="medical-tab">
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
                                                    @forelse ($medicalRecords as $key => $medicalRecord)
                                                        <tr>
                                                            <td class="text-blue-600"><a
                                                                    href="javascript:void(0);">{{ $key + 1 }}</a>
                                                            </td>
                                                            <td>
                                                                <a href="javascript:void(0);" class="lab-icon">
                                                                    <span><i class="fa-solid fa-paperclip"></i></span>
                                                                    {{ $medicalRecord->name ?? '' }}
                                                                </a>
                                                            </td>
                                                            <td> {{ $medicalRecord->date ?? '' }}</td>
                                                            <td>{!! Str::limit($medicalRecord->description, 20, ' ...') !!}</td>
                                                            <td>
                                                                <div class="action-item">
                                                                    <a
                                                                        href="{{ route('patient.medical-records.edit', $medicalRecord->id) }}">
                                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                                    </a>
                                                                    <a href="{{ $medicalRecord->file }}" download>
                                                                        <i class="fa-solid fa-download"></i>
                                                                    </a>
                                                                    <a href="#"
                                                                        onclick="delete_medical_record({{ $medicalRecord->id }})">
                                                                        <i class="fa-solid fa-trash-can"></i>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                    @endforelse

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>


                                {{-- <div class="tab-pane fade" id="prsc-tab">
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
                                                            <td class="text-blue-600"><a href="#"
                                                                    data-bs-toggle="modal"
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
                                                                    <a href="doctor-profile.html"
                                                                        class="avatar avatar-sm me-2">
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
                                                            <td class="text-blue-600"><a href="#"
                                                                    data-bs-toggle="modal"
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
                                                                    <a href="doctor-profile.html"
                                                                        class="avatar avatar-sm me-2">
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
                                                            <td class="text-blue-600"><a href="#"
                                                                    data-bs-toggle="modal"
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
                                                                    <a href="doctor-profile.html"
                                                                        class="avatar avatar-sm me-2">
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
                                                            <td class="text-blue-600"><a href="#"
                                                                    data-bs-toggle="modal"
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
                                                                    <a href="doctor-profile.html"
                                                                        class="avatar avatar-sm me-2">
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
                                                            <td class="text-blue-600"><a href="#"
                                                                    data-bs-toggle="modal"
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
                                                                    <a href="doctor-profile.html"
                                                                        class="avatar avatar-sm me-2">
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
                                    </div> --}}


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
                                                    @forelse ($patientInvoicesList->take(8) as $patientInvoice)
                                                        <tr>
                                                            {{-- <td class="text-blue-600"><a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#invoice_view">#Inv-2021</a>
                                                        </td> --}}
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="doctor-profile.html"
                                                                        class="avatar avatar-sm me-2">
                                                                        <img class="avatar-img rounded-3"
                                                                            src="../assets/img/doctors/doctor-thumb-21.jpg"
                                                                            alt="">
                                                                    </a>
                                                                    <a href="doctor-profile.html">Dr.
                                                                        {{ $patientInvoice->user->fullName }}</a>
                                                                </h2>
                                                            </td>
                                                            <td>{{ date('j M Y', strtotime($patientInvoice->booking_date)) ?? '' }}
                                                                {{-- {{ date('h:i A', strtotime($patientInvoice->slot_start_time)) ?? '' }} --}}
                                                            </td>
                                                            <td>{{ date('j M Y', strtotime($patientInvoice->created_at)) ?? '' }}
                                                            </td>
                                                            <td>${{ $patientInvoice->user->payment ?? 0 }}</td>
                                                            <td>

                                                                @if (isset($patientInvoice->invoice_url))
                                                                    <div class="action-item">
                                                                        <a href="javascript:void(0)" class="set-bg-color"
                                                                            onclick="printInvoice('{{ Storage::url($patientInvoice->invoice_url) }}');">
                                                                            <i class="fa-solid fa-print"></i>
                                                                        </a>
                                                                    </div>
                                                                @else
                                                                    <div class="action-item">
                                                                        <a href="javascript:void(0)">
                                                                            <i class="fa-solid fa-print"></i>
                                                                        </a>
                                                                    </div>
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
                var graphBodyTempData = [];
                var graphBodyGlucoseData = [];
                var graphBodyOxygenData = [];

                google.charts.load('current', {
                    packages: ['corechart', 'line']
                });

                // ----load data by ajax call ----- //

                // Function to load booking data
                function loadGraphHeartRate(period) {
                    period = period ?? new Date().getMonth() + 1;
                    $.ajax({
                        url: "<?= route('patient-heartbeat.graph.data') ?>",
                        type: 'get',
                        data: {
                            'period': period
                        },
                        success: function(response) {
                            graphBookingData = response;
                            drawLogScalesHeartRate();
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                }

                // Function to load revenue data
                function loadGraphBloodPressure(period) {
                    period = period ?? new Date().getMonth() + 1;
                    $.ajax({
                        url: "<?= route('patient-blood-pressure.graph.data') ?>",
                        type: 'get',
                        data: {
                            'period': period
                        },
                        success: function(response) {
                            graphRevenueData = response
                            drawLogScalesBloodPressure();
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                }

                // Function to load body temprature data
                function loadGraphBodyTemp(period) {
                    period = period ?? new Date().getMonth() + 1;
                    $.ajax({
                        url: "<?= route('patient-body-temp.graph.data') ?>",
                        type: 'get',
                        data: {
                            'period': period
                        },
                        success: function(response) {
                            graphBodyTempData = response
                            drawLogScalesBodyTemp();
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                }

                // Function to load body temprature data
                function loadGraphBodyGlucose(period) {
                    period = period ?? new Date().getMonth() + 1;
                    $.ajax({
                        url: "<?= route('patient-body-glucose.graph.data') ?>",
                        type: 'get',
                        data: {
                            'period': period
                        },
                        success: function(response) {
                            graphBodyGlucoseData = response
                            drawLogScalesBodyGlucose();
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                }

                // Function to load body temprature data
                function loadGraphBodyOxygen(period) {
                    period = period ?? new Date().getMonth() + 1;
                    $.ajax({
                        url: "<?= route('patient-body-oxygen.graph.data') ?>",
                        type: 'get',
                        data: {
                            'period': period
                        },
                        success: function(response) {
                            graphBodyOxygenData = response
                            drawLogScalesBodyOxygen();
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                }


                // ----load data by ajax call end ----- //


                // ----- Function to draw chart------- //
                function drawLogScalesHeartRate() {
                    var data = new google.visualization.DataTable();
                    data.addColumn('number', 'X');
                    data.addColumn('number', 'heart rate');
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

                    var chartBooking = new google.visualization.LineChart(document.getElementById(
                        'blood_pressure_chart_div'));
                    chartBooking.draw(view, bookingOptions);
                }

                function drawLogScalesBloodPressure() {
                    var data = new google.visualization.DataTable();
                    data.addColumn('number', 'X');
                    data.addColumn('number', 'blood pressure');
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

                    var chartRevenue = new google.visualization.LineChart(document.getElementById(
                        'heart_rate_chart_div'));
                    chartRevenue.draw(view, revenueOptions);
                }

                function drawLogScalesBodyTemp() {
                    var data = new google.visualization.DataTable();
                    data.addColumn('number', 'X');
                    data.addColumn('number', 'body temprature');
                    data.addRows(graphBodyTempData);

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
                            title: 'body temprature',
                            logScale: false
                        },
                        colors: ['#004cd4', '#097138']
                    };

                    var chartRevenue = new google.visualization.LineChart(document.getElementById(
                        'body_temp_chart_div'));
                    chartRevenue.draw(view, revenueOptions);
                }


                function drawLogScalesBodyGlucose() {
                    var data = new google.visualization.DataTable();
                    data.addColumn('number', 'X');
                    data.addColumn('number', 'body glucose');
                    data.addRows(graphBodyGlucoseData);

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
                            title: 'body glucose',
                            logScale: false
                        },
                        colors: ['#004cd4', '#097138']
                    };

                    var chartRevenue = new google.visualization.LineChart(document.getElementById(
                        'glucose_chart_div'));
                    chartRevenue.draw(view, revenueOptions);
                }

                function drawLogScalesBodyOxygen() {
                    var data = new google.visualization.DataTable();
                    data.addColumn('number', 'X');
                    data.addColumn('number', 'body oxygen');
                    data.addRows(graphBodyOxygenData);

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
                            title: 'body oxygen',
                            logScale: false
                        },
                        colors: ['#004cd4', '#097138']
                    };

                    var chartRevenue = new google.visualization.LineChart(document.getElementById(
                        'oxygen_chart_div'));
                    chartRevenue.draw(view, revenueOptions);
                }

                // -------Function to draw chart end----- //


                // Initialize charts on page load
                google.charts.setOnLoadCallback(function() {
                    currentMonth = new Date().getMonth() + 1;
                    loadGraphHeartRate(currentMonth);
                    loadGraphBloodPressure(currentMonth);
                    loadGraphBodyTemp(currentMonth);
                    loadGraphBodyGlucose(currentMonth);
                    loadGraphBodyOxygen(currentMonth);
                });

                // Event listener for revenue time period change
                $("#time-period-revenue").change(function() {
                    var period = $(this).val() ?? 'currentMonth';
                    loadGraphBloodPressure(period);
                });

                // Event listener for appointment time period change
                $("#time-period-heartbeat").change(function() {
                    var period = $(this).val() ?? 'currentMonth';
                    loadGraphHeartRate(period);
                });
                $("#time-period-bodytemp").change(function() {
                    var period = $(this).val() ?? 'currentMonth';
                    loadGraphBodyTemp(period);
                });
                $("#time-period-body-glucose").change(function() {
                    var period = $(this).val() ?? 'currentMonth';
                    loadGraphBodyGlucose(period);
                });
                $("#time-period-body-oxygen").change(function() {
                    var period = $(this).val() ?? 'currentMonth';
                    loadGraphBodyOxygen(period);
                });
            });

            function delete_medical_record(id) {
                event.preventDefault();
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/patients/delete-medical-record/' + id,
                            type: "get",
                            success: function(res) {
                                $(".data-medical-record-id-" + id).remove();
                                Swal.fire("Done!", "It was successfully deleted!", "success");
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                Swal.fire("Error deleting!", "Please try again", "error");
                            }
                        });
                    }
                });
            }

            function printInvoice(url) {
                var printWindow = window.open(url, '_blank');
                printWindow.onload = function() {
                    printWindow.print();
                };
            }
        </script>
        <style>
            a.set-bg-color {
                background-color: #004cd4;
                color: white;
            }

            .page-item.active .page-link {
                background-color: #004cd4;
                border-color: #004cd4;
                color: white;
            }

            sup.percentage-color-red {
                color: red !important;
            }

            sup.percentage-color-green {
                color: green !important;
            }
        </style>
    @endsection
