@extends('layouts.admin.main')
@section('content')
 

        <div class="page-wrapper">
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Appointments</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Appointments</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="datatable table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>Doctor Name</th>
                                                <th>Speciality</th>
                                                <th>Patient Name</th>
                                                <th>Appointment Time</th>
                                                <th>Status</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/doctors/doctor-thumb-01.jpg"
                                                                alt=""></a>
                                                        <a href="">Dr. Ruby Perrin</a>
                                                    </h2>
                                                </td>
                                                <td>Dental</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/patients/patient1.jpg"
                                                                alt=""></a>
                                                        <a href="">Charlene Reed </a>
                                                    </h2>
                                                </td>
                                                <td>9 Nov 2023 <span class="text-primary d-block">11.00 AM - 11.15
                                                        AM</span></td>
                                                <td>
                                                    <div class="status-toggle">
                                                        <input type="checkbox" id="status_1" class="check" checked>
                                                        <label for="status_1" class="checktoggle">checkbox</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    $200.00
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/doctors/doctor-thumb-02.jpg"
                                                                alt=""></a>
                                                        <a href="">Dr. Darren Elder</a>
                                                    </h2>
                                                </td>
                                                <td>Dental</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/patients/patient2.jpg"
                                                                alt=""></a>
                                                        <a href="">Travis Trimble </a>
                                                    </h2>
                                                </td>
                                                <td>5 Nov 2023 <span class="text-primary d-block">11.00 AM - 11.35
                                                        AM</span></td>
                                                <td>
                                                    <div class="status-toggle">
                                                        <input type="checkbox" id="status_2" class="check" checked>
                                                        <label for="status_2" class="checktoggle">checkbox</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    $300.00
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/doctors/doctor-thumb-03.jpg"
                                                                alt=""></a>
                                                        <a href="">Dr. Deborah Angel</a>
                                                    </h2>
                                                </td>
                                                <td>Cardiology</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/patients/patient3.jpg"
                                                                alt=""></a>
                                                        <a href="">Carl Kelly</a>
                                                    </h2>
                                                </td>
                                                <td>11 Nov 2023 <span class="text-primary d-block">12.00 PM - 12.15
                                                        PM</span></td>
                                                <td>
                                                    <div class="status-toggle">
                                                        <input type="checkbox" id="status_3" class="check" checked>
                                                        <label for="status_3" class="checktoggle">checkbox</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    $150.00
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/doctors/doctor-thumb-04.jpg"
                                                                alt=""></a>
                                                        <a href="">Dr. Sofia Brient</a>
                                                    </h2>
                                                </td>
                                                <td>Urology</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/patients/patient4.jpg"
                                                                alt=""></a>
                                                        <a href=""> Michelle Fairfax</a>
                                                    </h2>
                                                </td>
                                                <td>7 Nov 2023 <span class="text-primary d-block">1.00 PM - 1.20
                                                        PM</span></td>
                                                <td>
                                                    <div class="status-toggle">
                                                        <input type="checkbox" id="status_4" class="check">
                                                        <label for="status_4" class="checktoggle">checkbox</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    $150.00
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/doctors/doctor-thumb-05.jpg"
                                                                alt=""></a>
                                                        <a href="">Dr. Marvin Campbell</a>
                                                    </h2>
                                                </td>
                                                <td>Orthopaedics</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/patients/patient5.jpg"
                                                                alt=""></a>
                                                        <a href="">Gina Moore</a>
                                                    </h2>
                                                </td>
                                                <td>15 Nov 2023 <span class="text-primary d-block">1.00 PM - 1.15
                                                        PM</span></td>
                                                <td>
                                                    <div class="status-toggle">
                                                        <input type="checkbox" id="status_5" class="check" checked>
                                                        <label for="status_5" class="checktoggle">checkbox</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    $200.00
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/doctors/doctor-thumb-06.jpg"
                                                                alt=""></a>
                                                        <a href="">Dr. Katharine Berthold</a>
                                                    </h2>
                                                </td>
                                                <td>Orthopaedics</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/patients/patient6.jpg"
                                                                alt=""></a>
                                                        <a href="">Elsie Gilley</a>
                                                    </h2>
                                                </td>
                                                <td>16 Nov 2023 <span class="text-primary d-block">1.00 PM - 1.15
                                                        PM</span></td>
                                                <td>
                                                    <div class="status-toggle">
                                                        <input type="checkbox" id="status_6" class="check" checked>
                                                        <label for="status_6" class="checktoggle">checkbox</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    $250.00
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/doctors/doctor-thumb-07.jpg"
                                                                alt=""></a>
                                                        <a href="">Dr. Linda Tobin</a>
                                                    </h2>
                                                </td>
                                                <td>Neurology</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/patients/patient7.jpg"
                                                                alt=""></a>
                                                        <a href="">Joan Gardner</a>
                                                    </h2>
                                                </td>
                                                <td>18 Nov 2023 <span class="text-primary d-block">1.10 PM - 1.25
                                                        PM</span></td>
                                                <td>
                                                    <div class="status-toggle">
                                                        <input type="checkbox" id="status_7" class="check" checked>
                                                        <label for="status_7" class="checktoggle">checkbox</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    $260.00
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/doctors/doctor-thumb-08.jpg"
                                                                alt=""></a>
                                                        <a href="">Dr. Paul Richard</a>
                                                    </h2>
                                                </td>
                                                <td>Dermatology</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/patients/patient8.jpg"
                                                                alt=""></a>
                                                        <a href=""> Daniel Griffing</a>
                                                    </h2>
                                                </td>
                                                <td>18 Nov 2023 <span class="text-primary d-block">11.10 AM - 11.25
                                                        AM</span></td>
                                                <td>
                                                    <div class="status-toggle">
                                                        <input type="checkbox" id="status_8" class="check" checked>
                                                        <label for="status_8" class="checktoggle">checkbox</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    $260.00
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/doctors/doctor-thumb-09.jpg"
                                                                alt=""></a>
                                                        <a href="">Dr. John Gibbs</a>
                                                    </h2>
                                                </td>
                                                <td>Dental</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/patients/patient9.jpg"
                                                                alt=""></a>
                                                        <a href="">Walter Roberson</a>
                                                    </h2>
                                                </td>
                                                <td>21 Nov 2023 <span class="text-primary d-block">12.10 PM - 12.25
                                                        PM</span></td>
                                                <td>
                                                    <div class="status-toggle">
                                                        <input type="checkbox" id="status_9" class="check" checked>
                                                        <label for="status_9" class="checktoggle">checkbox</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    $300.00
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/doctors/doctor-thumb-10.jpg"
                                                                alt=""></a>
                                                        <a href="">Dr. Olga Barlow</a>
                                                    </h2>
                                                </td>
                                                <td>Dental</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/patients/patient10.jpg"
                                                                alt=""></a>
                                                        <a href="">Robert Rhodes</a>
                                                    </h2>
                                                </td>
                                                <td>23 Nov 2023 <span class="text-primary d-block">12.10 PM - 12.25
                                                        PM</span></td>
                                                <td>
                                                    <div class="status-toggle">
                                                        <input type="checkbox" id="status_11" class="check" checked>
                                                        <label for="status_11" class="checktoggle">checkbox</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    $300.00
                                                </td>
                                            </tr>
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

