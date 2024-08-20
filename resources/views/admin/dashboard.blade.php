@extends('layouts.admin.main')
@section('content')

    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-9">
                        <h3 class="page-title">Welcome Admin!</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <div class="top-nav-search">
                            <form>
                                <input type="text" class="form-control" placeholder="Search here">
                                <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon text-primary border-primary">
                                    <i class="fe fe-users"></i>
                                </span>
                                <div class="dash-count">
                                    <h3>{{ $dashboardData['total_doctors'] ?? 0 }}</h3>
                                </div>
                            </div>
                            <div class="dash-widget-info">
                                <h6 class="text-muted">Doctors</h6>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary w-50"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon text-success">
                                    <i class="fe fe-credit-card"></i>
                                </span>
                                <div class="dash-count">
                                    <h3>{{ $dashboardData['total_patients'] ?? 0 }}</h3>
                                </div>
                            </div>
                            <div class="dash-widget-info">
                                <h6 class="text-muted">Patients</h6>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-success w-50"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon text-danger border-danger">
                                    <i class="fe fe-money"></i>
                                </span>
                                <div class="dash-count">
                                    <h3>{{ $dashboardData['total_appointments'] ?? 0 }}</h3>
                                </div>
                            </div>
                            <div class="dash-widget-info">
                                <h6 class="text-muted">Appointment</h6>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-danger w-50"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon text-warning border-warning">
                                    <i class="fe fe-folder"></i>
                                </span>
                                <div class="dash-count">
                                    <h3>$0</h3>
                                </div>
                            </div>
                            <div class="dash-widget-info">
                                <h6 class="text-muted">Revenue</h6>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-warning w-50">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-6">

                    <div class="card card-chart">
                        <div class="card-header">
                            <h4 class="card-title">Revenue</h4>
                        </div>
                        <div class="card-body">
                            <div id="morrisArea"></div>
                        </div>
                    </div>

                </div>
                <div class="col-md-12 col-lg-6">

                    <div class="card card-chart">
                        <div class="card-header">
                            <h4 class="card-title">Status</h4>
                        </div>
                        <div class="card-body">
                            <div id="morrisLine"></div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-6 d-flex">

                    <div class="card card-table flex-fill">
                        <div class="card-header">
                            <h4 class="card-title">Doctors List
                                <a href="{{ route('admin.index.doctors') }}"
                                class="btn btn-primary btn-sm float-end">View All</a>
                            </h4>
         
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>Doctor Name</th>
                                            <th>Speciality</th>
                                            <th>Earned</th>
                                            <th>Reviews</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($dashboardData['doctor_list'] as $doctor)
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/doctors/doctor-thumb-01.jpg"
                                                                alt=""></a>
                                                        <a href="">Dr. {{ $doctor->fullName }}</a>
                                                    </h2>
                                                </td>
                                                <td>
                                                    @isset($doctor)
                                                        @forelse ($doctor->specializations as $specialization)
                                                            <span
                                                                class="badge badge-info text-white">{{ $specialization->name }}</span>
                                                        @empty
                                                            <p>N/A</p>
                                                        @endforelse
                                                    @endisset
                                                </td>
                                                <td>$00.00</td>
                                                <td>
                                                    {!! getRatingHtml($doctor->allover_rating) !!}
                                                </td>
                                            </tr>
                                            @empty
                                                <tr>
                                                    <td> Not Found</td>
                                                </tr>
                                            @endforelse
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 d-flex">

                        <div class="card  card-table flex-fill">
                            <div class="card-header">
                                <h4 class="card-title">Patients List
                                    <a href="{{ route('admin.patient-list.index') }}"
                                class="btn btn-primary btn-sm float-end">View All</a>
                                </h4>
                                
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>Patient Name</th>
                                                <th>Phone</th>
                                                <th>Joined Date</th>
                                                <th>Paid</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($dashboardData['patient_list'] as $patient)
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/patients/patient1.jpg" alt=""></a>
                                                        <a href="">{{ $patient->fullName }} </a>
                                                    </h2>
                                                </td>
                                                <td>{{ $patient->phone }}</td>
                                                <td>{{ \Carbon\Carbon::parse($patient->created_at)->format('j M Y') ?? '' }}</td>
                                                <td>$100.00</td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td> Not Found</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">

                        <div class="card card-table">
                            <div class="card-header">
                                <h4 class="card-title">Appointment List <a href="{{ route('admin.appointment-list.index') }}"
                                    class="btn btn-primary btn-sm float-end">View All</a> </h4>
                             
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>Doctor Name</th>
                                                <th>Speciality</th>
                                                <th>Patient Name</th>
                                                <th>Apointment Time</th>
                                                <th>Status</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($dashboardData['appointments_list'] as $key =>  $appointment)
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/doctors/doctor-thumb-01.jpg"
                                                                alt=""></a>
                                                        <a href="">Dr. {{ $appointment->user->fullName }}</a>
                                                    </h2>
                                                </td>
                                                <td>Dental</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/patients/patient1.jpg" alt=""></a>
                                                        <a href="">{{ $appointment->patient->fullName }} </a>
                                                    </h2>
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($appointment->booking_date)->format('j M Y') ?? '' }} 
                                                    <span class="text-primary d-block">{{ date('h:i A', strtotime($appointment->slot_start_time)) ?? '' }}- {{ date('h:i A', strtotime($appointment->slot_end_time)) ?? '' }}</span>
                                                </td>
                                                <td>
                                                    <div class="status-toggle">
                                                        <input type="checkbox" id="status_{{ $key }}" class="check" {{ $appointment->status == 'confirmed' ? 'checked' : ($appointment->status == 'rejected' ? '' : '') }}>
                                                        <label for="status_{{ $key }}" class="checktoggle">checkbox</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    $200.00
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td> Not Found</td>
                                            </tr>
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
    @endsection
