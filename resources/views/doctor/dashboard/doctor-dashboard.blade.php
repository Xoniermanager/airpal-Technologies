@extends('layouts.doctor.main')
@section('content')
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
                        @include('doctor.dashboard.latest-appointment-list')
                        <a href="{{ route('doctor.doctor-request.index') }}"
                            class="btn btn-primary btn-sm float-end mt-4">View All</a>
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
                            <ul class="nav nav-pills product-licence-tab" id="pills-tab2" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-revenue-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-revenue" type="button" role="tab"
                                        aria-controls="pills-revenue" aria-selected="false">Revenue</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-appointment-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-appointment" type="button" role="tab"
                                        aria-controls="pills-appointment" aria-selected="true">Appointments</button>
                                </li>
                            </ul>
                            <div class="tab-content w-100" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-revenue" role="tabpanel"
                                    aria-labelledby="pills-revenue-tab">
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
                        {{-- <div class="card-view-link">
                                                <a href="{{ route('doctor.doctor-patients.index') }}">View All</a>
                                            </div> --}}
                    </div>

                    <div class="dashboard-card-body">
                        <div class="row recent-patient-grid-boxes">
                            @forelse ($recentPatients as $recentPatient)
                                <div class="col-md-6">
                                    <div class="recent-patient-grid">
                                        <a href="{{ route('doctor.doctor-patients.index') }}" class="patient-img">
                                            <img src="{{ $recentPatient->patient->image_url }}">

                                        </a>
                                        <h5><a href="{{ route('doctor.doctor-patients.index') }}"></a>
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
                                    <img src="{{ $upcomingAppointments->patient->image_url }}">
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
                                <a href="{{ route('doctor.appointments.index') }}" class="btn">Start Appointment</a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="dashboard-main-col w-100 mb-3">
                        <img src="../assets/img/doctors-dashboard/no-apt-3.png" alt="Img">
                    </div>
                @endif

                @include('doctor.dashboard.invoices-list')

            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <div class="modal fade" id="invoice-preview" aria-hidden="true" role="dialog" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div id="show-patient-invoice"></div>
            <div class=""
                style="display:none;background: rgb(0 0 0 / 47%);
    height: 100%;
    position: absolute;
    width: 87.5%;"
                id="spin-loader">
                <img src="{{ asset('assets/img/loading.gif') }}"
                    style="height: 120px;
    position: relative;
    left: 46%; 
    top: 35%;" id="spin-loader">
            </div>
            <form id="invoiceForm"
                style="position: absolute;
             bottom: 2px;
             left: 0;
             margin: auto;
             text-align: center;
             right: 91px;">
                <input type="hidden" value="" id="showValue">
                <button type="button" class="btn btn-primary" id="printButton">Download Invoice</button>

            </form>

        </div>
    </div>
    <form action="{{ route('download.patient.invoice') }}" method="post">
        @csrf
        <input type="hidden" name="appointment_id" value="1">
        <button type="submit">test</button>
    </form>
@endsection
@section('javascript')
    <script>
        function updateAppointment(status, requestId) {
            let statusText = '';

            if (status == 'cancelled') {
                statusText = 'cancel';
            }

            if (status == 'confirmed') {
                statusText = 'confirm';
            }
            Swal.fire({
                title: "Are you sure to " + statusText + " the select appointment ?",
                // text: "You won't be able to revert this!",
                icon: "done",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, proceed!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('updateStatus.appointment.request') }}", // Adjust this URL to your route
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: requestId,
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

        // Get invoice html from backend to show in pop up
        function show_invoice(appointment_id) {
            showValue.setAttribute('value', appointment_id);
            jQuery.ajax({
                url: "<?= route('preview.patient.invoice') ?>",
                type: 'post',
                data: {
                    "appointment_id": appointment_id,
                    "_token": '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(response) {
                    jQuery('#show-patient-invoice').html(response.data);
                },
                error: function(error_data) {
                    console.log(error_data);
                }
            });
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#printButton').click(function(event) {
                event.preventDefault(); // Prevent the default form submission
                document.getElementById("spin-loader").style.display = "inline-block";
                $.ajax({
                    url: "<?= route('download.patient.invoice') ?>",
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content') // If you're using Laravel
                    },
                    data: {
                        "appointment_id": 1,
                        "_token": '{{ csrf_token() }}'
                    },
                    xhrFields: {
                        responseType: 'blob' // Important for handling binary data
                    },
                    success: function(data) {
                        var url = window.URL.createObjectURL(data);
                        var a = document.createElement('a');
                        a.href = url;
                        a.download = 'invoice.pdf';
                        document.body.appendChild(a);
                        a.click();
                        a.remove();
                    },
                    error: function(xhr, status, error) {
                        console.error('Error generating PDF:', error);
                    }
                });
            });
        });
    </script>
@endsection
