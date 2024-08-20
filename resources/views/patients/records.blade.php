@extends('layouts.patient.main')
@section('content')
                        <div class="dashboard-header">
                            <h3>Records</h3>
                            <div class="appointment-tabs">
                                <ul class="nav">
                                    <li>
                                        <a href="#" class="nav-link active" data-bs-toggle="tab"
                                            data-bs-target="#medical">Medical Records</a>
                                    </li>
                                    <li>
                                        <a href="#" class="nav-link" data-bs-toggle="tab"
                                            data-bs-target="#prescription">Prescriptions</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-content pt-0">

                            <div class="tab-pane fade" id="prescription">
                                <div class="search-header">
                                    <div class="search-field">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <span class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
                                    </div>
                                </div>
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
                                                    <td><a class="text-blue-600" href="javascript:void(0);"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#view_prescription">#PR-123</a></td>
                                                    <td>
                                                        <a href="javascript:void(0);" class="lab-icon prescription">
                                                            <span><i
                                                                    class="fa-solid fa-prescription"></i></span>Prescription
                                                        </a>
                                                    </td>
                                                    <td>24 Mar 2024, 10:30 AM</td>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a href="#" class="avatar avatar-sm me-2">
                                                                <img class="avatar-img rounded-3"
                                                                    src="../assets/img/doctors/doctor-thumb-02.jpg"
                                                                    alt="">
                                                            </a>
                                                            <a href="#">Edalin Hendry</a>
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
                                                    <td><a class="text-blue-600" href="javascript:void(0);"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#view_prescription">#PR-124</a></td>
                                                    <td>
                                                        <a href="javascript:void(0);" class="lab-icon prescription">
                                                            <span><i
                                                                    class="fa-solid fa-prescription"></i></span>Prescription
                                                        </a>
                                                    </td>
                                                    <td>27 Mar 2024, 11:15 AM</td>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a href="#" class="avatar avatar-sm me-2">
                                                                <img class="avatar-img rounded-3"
                                                                    src="../assets/img/doctors/doctor-thumb-05.jpg"
                                                                    alt="">
                                                            </a>
                                                            <a href="#">John Homes</a>
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
                                                    <td><a class="text-blue-600" href="javascript:void(0);"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#view_prescription">#PR-125</a></td>
                                                    <td>
                                                        <a href="javascript:void(0);" class="lab-icon prescription">
                                                            <span><i
                                                                    class="fa-solid fa-prescription"></i></span>Prescription
                                                        </a>
                                                    </td>
                                                    <td>11 Apr 2024, 09:00 AM</td>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a href="#" class="avatar avatar-sm me-2">
                                                                <img class="avatar-img rounded-3"
                                                                    src="../assets/img/doctors/doctor-thumb-03.jpg"
                                                                    alt="">
                                                            </a>
                                                            <a href="#">Shanta Neill</a>
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
                                                    <td><a class="text-blue-600" href="javascript:void(0);"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#view_prescription">#PR-126</a></td>
                                                    <td>
                                                        <a href="javascript:void(0);" class="lab-icon prescription">
                                                            <span><i
                                                                    class="fa-solid fa-prescription"></i></span>Prescription
                                                        </a>
                                                    </td>
                                                    <td>15 Apr 2024, 02:30 PM</td>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a href="#" class="avatar avatar-sm me-2">
                                                                <img class="avatar-img rounded-3"
                                                                    src="../assets/img/doctors/doctor-thumb-08.jpg"
                                                                    alt="">
                                                            </a>
                                                            <a href="#">Anthony Tran</a>
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
                                                    <td><a class="text-blue-600" href="javascript:void(0);"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#view_prescription">#PR-127</a></td>
                                                    <td>
                                                        <a href="javascript:void(0);" class="lab-icon prescription">
                                                            <span><i
                                                                    class="fa-solid fa-prescription"></i></span>Prescription
                                                        </a>
                                                    </td>
                                                    <td>23 Apr 2024, 06:40 PM</td>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a href="#" class="avatar avatar-sm me-2">
                                                                <img class="avatar-img rounded-3"
                                                                    src="../assets/img/doctors/doctor-thumb-01.jpg"
                                                                    alt="">
                                                            </a>
                                                            <a href="#">Susan Lingo</a>
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

                                <div class="pagination dashboard-pagination">
                                    <ul>
                                        <li>
                                            <a href="#" class="page-link"><i
                                                    class="fa-solid fa-chevron-left"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" class="page-link">1</a>
                                        </li>
                                        <li>
                                            <a href="#" class="page-link active">2</a>
                                        </li>
                                        <li>
                                            <a href="#" class="page-link">3</a>
                                        </li>
                                        <li>
                                            <a href="#" class="page-link">4</a>
                                        </li>
                                        <li>
                                            <a href="#" class="page-link">...</a>
                                        </li>
                                        <li>
                                            <a href="#" class="page-link"><i
                                                    class="fa-solid fa-chevron-right"></i></a>
                                        </li>
                                    </ul>
                                </div>

                            </div>


                            <div class="tab-pane fade show active" id="medical">
                                <div class="search-header">
                                    <div class="search-field">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <span class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
                                    </div>
                                    <div>
                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#add_medical_records"
                                            class="btn btn-primary prime-btn">Add Medical Record</a>
                                    </div>
                                </div>
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
                                                    <td><a class="text-blue-600"
                                                            href="javascript:void(0);">#MR-123</a></td>
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
                                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                data-bs-target="#edit_medical_records">
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
                                                    <td><a class="text-blue-600"
                                                            href="javascript:void(0);">#MR-124</a></td>
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
                                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                data-bs-target="#edit_medical_records">
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
                                                    <td><a class="text-blue-600"
                                                            href="javascript:void(0);">#MR-125</a></td>
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
                                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                data-bs-target="#edit_medical_records">
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
                                                    <td><a class="text-blue-600"
                                                            href="javascript:void(0);">#MR-126</a></td>
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
                                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                data-bs-target="#edit_medical_records">
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
                                                    <td><a class="text-blue-600"
                                                            href="javascript:void(0);">#MR-127</a></td>
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
                                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                data-bs-target="#edit_medical_records">
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
                                                    <td><a class="text-blue-600"
                                                            href="javascript:void(0);">#MR-128</a></td>
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
                                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                data-bs-target="#edit_medical_records">
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

                                <div class="pagination dashboard-pagination">
                                    <ul>
                                        <li>
                                            <a href="#" class="page-link"><i
                                                    class="fa-solid fa-chevron-left"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" class="page-link">1</a>
                                        </li>
                                        <li>
                                            <a href="#" class="page-link active">2</a>
                                        </li>
                                        <li>
                                            <a href="#" class="page-link">3</a>
                                        </li>
                                        <li>
                                            <a href="#" class="page-link">4</a>
                                        </li>
                                        <li>
                                            <a href="#" class="page-link">...</a>
                                        </li>
                                        <li>
                                            <a href="#" class="page-link"><i
                                                    class="fa-solid fa-chevron-right"></i></a>
                                        </li>
                                    </ul>
                                </div>

                            </div>

                        </div>
@endsection
