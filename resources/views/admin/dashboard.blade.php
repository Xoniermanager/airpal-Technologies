@extends('layouts.admin.main')
@section('content')

    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-9">
                        <h3 class="page-title">Welcome {{ auth()->user()->fullName ?? 'Admin' }} !</h3>
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
                                    <h3>{{ $dashboardData['total_doctors'] ?? 0 }}+</h3>
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
                                    <h3>{{ $dashboardData['total_patients'] ?? 0 }}+</h3>
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
                                    <h3>{{ $dashboardData['total_appointments'] ?? 0 }}+</h3>
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
                            <div id="morrisArea">

                                <div class="dashboard-card-body">
                                    <div class="chart-tab">
                                        <ul class="nav nav-pills product-licence-tab" id="pills-tab2" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="pills-revenue-tab" data-bs-toggle="pill"
                                                    data-bs-target="#pills-revenue" type="button" role="tab"
                                                    aria-controls="pills-revenue" aria-selected="false">Revenue</button>
                                            </li>
                                        </ul>
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
                                                    <div id="chart_revenue_div" class="mb-4"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-12 col-lg-6">

                    <div class="card card-chart">
                        <div class="card-header">
                            <h4 class="card-title">Status</h4>
                        </div>
                        <div class="card-body">
                            <div id="morrisLine">

                                <div class="dashboard-card-body">
                                    <div class="chart-tab">
                                        <ul class="nav nav-pills product-licence-tab" id="pills-tab2" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="pills-revenue-tab"
                                                    data-bs-toggle="pill" data-bs-target="#pills-revenue" type="button"
                                                    role="tab" aria-controls="pills-revenue"
                                                    aria-selected="false">Appointments</button>
                                            </li>
                                        </ul>
                                        <div class="tab-content w-100" id="v-pills-tabContent" style="height: 300px;">
                                            <div class="tab-pane fade show active" id="pills-revenue" role="tabpanel"
                                                aria-labelledby="pills-revenue-tab">
                                                <div id="revenue-chart">
                                                    <div class="search-header">
                                                        <select id="time-period-appointments" class="">
                                                            <option value="currentMonth">Current Month</option>
                                                            <option value="monthly">Monthly</option>
                                                            <option value="yearly">Yearly</option>
                                                        </select>
                                                    </div>
                                                    <div id="chart_appointments_div" class="mb-4"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-6 d-flex">

                    <div class="card card-table flex-fill">
                        <div class="card-header">
                            <h4 class="card-title">Doctors List
                                <a href="{{ route('admin.index.doctors') }}" class="btn btn-primary btn-sm float-end">View
                                    All</a>
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
                                                                src="{{ $doctor->image_url ?? '' }}"
                                                                onerror="this.src='{{ asset('assets/img/user.jpg') }}';"
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
                                                <td>{{ $doctor->calculateTotalPayments() }}</td>

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
                                                                    src="{{ $patient->image_url ?? '' }}"
                                                                    onerror="this.src='{{ asset('assets/img/user.jpg') }}';"
                                                                    alt=""></a>
                                                            <a href="">{{ $patient->fullName }} </a>
                                                        </h2>
                                                    </td>
                                                    <td>{{ $patient->phone }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($patient->created_at)->format('j M Y') ?? '' }}
                                                    </td>
                                                    <td>{{ $patient->calculateTotalPayments() }}</td>
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
                                            @forelse ($dashboardData['appointments_list']->take(3) as $key =>  $appointment)
                                                <tr>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a href="" class="avatar avatar-sm me-2"><img
                                                                    class="avatar-img rounded-circle"
                                                                    src="{{ $appointment->user->image_url ?? '' }}"
                                                                    onerror="this.src='{{ asset('assets/img/user.jpg') }}';"
                                                                    alt=""></a>
                                                            <a href="">Dr. {{ $appointment->user->fullName }}</a>
                                                        </h2>
                                                    </td>
                                                    <td>Dental</td>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a href="" class="avatar avatar-sm me-2"><img
                                                                    class="avatar-img rounded-circle"
                                                                    src="{{ $appointment->patient->image_url ?? '' }}"
                                                                    onerror="this.src='{{ asset('assets/img/user.jpg') }}';"
                                                                    alt=""></a>
                                                            <a href="">{{ $appointment->patient->fullName }} </a>
                                                        </h2>
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($appointment->booking_date)->format('j M Y') ?? '' }}
                                                        <span
                                                            class="text-primary d-block">{{ date('h:i A', strtotime($appointment->slot_start_time)) ?? '' }}-
                                                            {{ date('h:i A', strtotime($appointment->slot_end_time)) ?? '' }}</span>
                                                    </td>
                                                    <td>
                                                        <div class="status-toggle">
                                                            <input type="checkbox" id="status_{{ $key }}"
                                                                class="check"
                                                                {{ $appointment->status == 'confirmed' ? 'checked' : ($appointment->status == 'rejected' ? '' : '') }}>
                                                            <label for="status_{{ $key }}"
                                                                class="checktoggle">checkbox</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        ${{ $appointment->payments->amount ?? 0 }}
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
    <script src="{{ asset('/assets/js/jquery-3.7.1.min.js') }}"></script>
    <script>
        // $(document).ready(function() {
        //     var graphData = [];
        //     loadGrpahAppointmentData('currentMonth');
        //     google.charts.load('current', {
        //         packages: ['corechart', 'line']
        //     });
        //     google.charts.setOnLoadCallback(drawLogScales);

        //     $("#time-period").change(function() {
        //         var period = $(this).val() ?? 'monthly';
        //         loadGrpahAppointmentData(period);
        //     });

        //     function loadGrpahAppointmentData(period) {
        //         period = period ?? 'currentMonth';
        //         $.ajax({
        //             url: "<?= route('doctor.booking.graphData.admin') ?>",
        //             type: 'get',
        //             data: {
        //                 'period': period
        //             },
        //             success: function(response) {
        //                 graphData = response;
        //                 drawLogScales();
        //             },
        //             error: function(xhr, status, error) {
        //                 console.error(error);
        //             }
        //         });
        //     }

        //     // manage graph based on select 
        //     function drawLogScales() {
        //         var data = new google.visualization.DataTable();
        //         data.addColumn('number', 'X');
        //         data.addColumn('number', 'rate');
        //         data.addRows(graphData);

        //         var view = new google.visualization.DataView(data);
        //         view.setColumns([{
        //                 sourceColumn: 0,
        //                 type: 'string',
        //                 calc: function(dt, rowIndex) {
        //                     return String(dt.getValue(rowIndex, 0));
        //                 }
        //             },
        //             1
        //         ]);

        //         var options = {
        //             hAxis: {
        //                 title: 'Periods',
        //                 logScale: false
        //             },
        //             vAxis: {
        //                 title: 'Amounts',
        //                 logScale: false
        //             },
        //             colors: ['#004cd4', '#097138']
        //         };

        //         var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        //         chart.draw(view, options);
        //     }
        // });




        $(document).ready(function() {
            var graphAppointmentData = [];
            var graphRevenueData = [];

            loadGraphAppointmentData('currentMonth');
            loadGraphRevenueData('currentMonth');

            google.charts.load('current', {
                packages: ['corechart', 'line']
            });
            google.charts.setOnLoadCallback(function() {
                drawLogScales('appointments');
                drawLogScales('revenue');
            });

            $("#time-period-appointments").change(function() {
                var period = $(this).val() ?? 'monthly';
                loadGraphAppointmentData(period);
            });

            $("#time-period-revenue").change(function() {
                var period = $(this).val() ?? 'monthly';
                loadGraphRevenueData(period);
            });

            function loadGraphAppointmentData(period) {
                period = period ?? 'currentMonth';
                $.ajax({
                    url: "<?= route('doctor.booking.graphData.admin') ?>",
                    type: 'get',
                    data: {
                        'period': period,
                        'type': 'appointments'
                    },
                    success: function(response) {
                        graphAppointmentData = response;
                        drawLogScales('appointments');
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

            function loadGraphRevenueData(period) {
                period = period ?? 'currentMonth';
                $.ajax({
                    url: "<?= route('doctor.revenue.graphData.admin') ?>",
                    type: 'get',
                    data: {
                        'period': period,
                        'type': 'revenue'
                    },
                    success: function(response) {
                        graphRevenueData = response;
                        drawLogScales('revenue');
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

            function drawLogScales(dataType) {
                var data = new google.visualization.DataTable();
                data.addColumn('number', 'X');

                // Set column name dynamically based on the type
                var columnLabel = (dataType === 'appointments') ? 'Appointments' : 'Revenue';
                data.addColumn('number', columnLabel);

                var graphData = (dataType === 'appointments') ? graphAppointmentData : graphRevenueData;
                data.addRows(graphData);

                var view = new google.visualization.DataView(data);
                view.setColumns([{
                        sourceColumn: 0,
                        type: 'string',
                        calc: function(dt, rowIndex) {
                            return String(dt.getValue(rowIndex, 0));
                        }
                    },
                    1
                ]);

                var options = {
                    hAxis: {
                        title: 'Periods',
                        logScale: false
                    },
                    vAxis: {
                        title: (dataType === 'appointments') ? 'Appointments' : 'Revenue',
                        logScale: false
                    },
                    colors: (dataType === 'appointments') ? ['#004cd4'] : ['#097138']
                };

                var chartDiv = (dataType === 'appointments') ? 'chart_appointments_div' : 'chart_revenue_div';
                var chart = new google.visualization.LineChart(document.getElementById(chartDiv));
                chart.draw(view, options);
            }
        });
    </script>
