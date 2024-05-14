<!DOCTYPE html>
<html lang="zxx">

<head>
@include('include.head')
</head>

<body>
 <div class="main-wrapper">
@include('patients.include.header')

<div class="breadcrumb-bar-two">
<div class="container">
<div class="row align-items-center inner-banner">
<div class="col-md-12 col-12 text-center">
<h2 class="breadcrumb-title">My Patient</h2>
<nav aria-label="breadcrumb" class="page-breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.html">Home</a></li>
<li class="breadcrumb-item" aria-current="page">My Patient</li>
</ol>
</nav>
</div>
</div>
</div>
</div>


<div class="content doctor-content">
<div class="container">
<div class="row">
<div class="col-lg-4 col-xl-3 theiaStickySidebar">
@include('patients.include.sidebar')
</div>

<div class="col-lg-8 col-xl-9">
<div class="appointment-patient">
<div class="dashboard-header">
<h3><a href="my-patients.html"><i class="fa-solid fa-arrow-left"></i> Patient Details</a></h3>
</div>
<div class="patient-wrap">
<div class="patient-info">
<img src="../assets/img/doctors-dashboard/profile-01.jpg" alt="img">
<div class="user-patient">
<h6>#P0016</h6>
<h5>Adrian Marshall</h5>
<ul>
<li>Age : 42</li>
<li>Male</li>
<li>AB+ve</li>
</ul>
</div>
</div>
<div class="patient-book">
<p><i class="fa-solid fa-calendar-days"></i>Last Booking</p>
<p>24 Mar 2024</p>
</div>
</div>

<div class="appointment-tabs user-tab">
<ul class="nav">
<li class="nav-item">
<a class="nav-link active" href="#pat_appointments" data-bs-toggle="tab">Appointments</a>
</li>
<li class="nav-item">
<a class="nav-link" href="#prescription" data-bs-toggle="tab">Prescription</a>
</li>
<li class="nav-item">
<a class="nav-link" href="#medical" data-bs-toggle="tab">Medical Records</a>
</li>
<li class="nav-item">
<a class="nav-link" href="#billing" data-bs-toggle="tab">Billing</a>
</li>
</ul>
</div>

<div class="tab-content pt-0">

<div id="pat_appointments" class="tab-pane fade show active">
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
<th>Doctor</th>
<th>Appt Date</th>
<th>Booking Date</th>
<th>Amount</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<tr>
<td><a class="text-blue-600" href="patient-upcoming-appointment.html">#Apt123</a></td>
<td>
<h2 class="table-avatar">
<a href="doctor-profile.html" class="avatar avatar-sm me-2">
<img class="avatar-img rounded-3" src="../assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
</a>
<a href="doctor-profile.html">Edalin Hendry</a>
</h2>
</td>
<td>24 Mar 2024</td>
<td>21 Mar 2024</td>
<td>$300</td>
<td><span class="badge badge-yellow status-badge">Upcoming</span></td>
<td>
<div class="action-item">
<a href="patient-upcoming-appointment.html">
<i class="fa-solid fa-link"></i>
</a>
</div>
</td>
</tr>
<tr>
<td><a class="text-blue-600" href="patient-upcoming-appointment.html">#Apt124</a></td>
<td>
<h2 class="table-avatar">
<a href="doctor-profile.html" class="avatar avatar-sm me-2">
<img class="avatar-img rounded-3" src="../assets/img/doctors/doctor-thumb-05.jpg" alt="User Image">
</a>
<a href="doctor-profile.html">John Homes</a>
</h2>
</td>
<td>17 Mar 2024</td>
<td>14 Mar 2024</td>
<td>$450</td>
<td><span class="badge badge-yellow status-badge">Upcoming</span></td>
<td>
<div class="action-item">
<a href="patient-upcoming-appointment.html">
<i class="fa-solid fa-link"></i>
</a>
</div>
</td>
</tr>
<tr>
<td><a class="text-blue-600" href="patient-upcoming-appointment.html">#Apt125</a></td>
<td>
<h2 class="table-avatar">
<a href="doctor-profile.html" class="avatar avatar-sm me-2">
<img class="avatar-img rounded-3" src="../assets/img/doctors/doctor-thumb-03.jpg" alt="User Image">
</a>
<a href="doctor-profile.html">Shanta Neill</a>
</h2>
</td>
<td>11 Mar 2024</td>
<td>07 Mar 2024</td>
<td>$250</td>
<td><span class="badge badge-yellow status-badge">Upcoming</span></td>
<td>
<div class="action-item">
<a href="patient-upcoming-appointment.html">
<i class="fa-solid fa-link"></i>
</a>
</div>
</td>
</tr>
<tr>
<td><a class="text-blue-600" href="patient-upcoming-appointment.html">#Apt126</a></td>
<td>
<h2 class="table-avatar">
<a href="doctor-profile.html" class="avatar avatar-sm me-2">
<img class="avatar-img rounded-3" src="../assets/img/doctors/doctor-thumb-08.jpg" alt="User Image">
</a>
<a href="doctor-profile.html">Anthony Tran</a>
</h2>
</td>
<td>26 Feb 2024</td>
<td>23 Feb 2024</td>
<td>$320</td>
<td><span class="badge badge-yellow status-badge">Upcoming</span></td>
<td>
<div class="action-item">
<a href="patient-upcoming-appointment.html">
<i class="fa-solid fa-link"></i>
</a>
</div>
</td>
</tr>
<tr>
<td><a class="text-blue-600" href="patient-upcoming-appointment.html">#Apt127</a></td>
<td>
<h2 class="table-avatar">
<a href="doctor-profile.html" class="avatar avatar-sm me-2">
<img class="avatar-img rounded-3" src="../assets/img/doctors/doctor-thumb-01.jpg" alt="User Image">
</a>
<a href="doctor-profile.html">Susan Lingo</a>
</h2>
</td>
<td>18 Feb 2024</td>
<td>15 Feb 2024</td>
<td>$480</td>
<td><span class="badge badge-yellow status-badge">Upcoming</span></td>
<td>
<div class="action-item">
<a href="doctor-appointment-start.html">
<i class="fa-solid fa-link"></i>
</a>
</div>
</td>
</tr>
<tr>
<td><a class="text-blue-600" href="patient-cancelled-appointment.html">#Apt128</a></td>
<td>
<h2 class="table-avatar">
<a href="doctor-profile.html" class="avatar avatar-sm me-2">
<img class="avatar-img rounded-3" src="../assets/img/doctors/doctor-thumb-09.jpg" alt="User Image">
</a>
<a href="doctor-profile.html">Joseph Boyd</a>
</h2>
</td>
<td>10 Feb 2024</td>
<td>07 Feb 2024</td>
<td>$260</td>
<td><span class="badge badge-danger status-badge">Cancelled</span></td>
<td>
<div class="action-item">
<a href="patient-cancelled-appointment.html">
<i class="fa-solid fa-link"></i>
</a>
</div>
</td>
</tr>
<tr>
<td><a class="text-blue-600" href="patient-completed-appointment.html">#Apt129</a></td>
<td>
<h2 class="table-avatar">
<a href="doctor-profile.html" class="avatar avatar-sm me-2">
<img class="avatar-img rounded-3" src="../assets/img/doctors/doctor-thumb-07.jpg" alt="User Image">
</a>
<a href="doctor-profile.html">Juliet Gabriel</a>
</h2>
</td>
<td>28 Jan 2024</td>
<td>25 Jan 2024</td>
<td>$350</td>
<td><span class="badge badge-green status-badge">Completed</span></td>
<td>
<div class="action-item">
<a href="patient-completed-appointment.html">
<i class="fa-solid fa-link"></i>
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
<a href="#" class="page-link"><i class="fa-solid fa-chevron-left"></i></a>
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
<a href="#" class="page-link"><i class="fa-solid fa-chevron-right"></i></a>
</li>
</ul>
</div>

</div>


<div class="tab-pane fade" id="prescription">
<div class="search-header">
<div class="search-field">
<input type="text" class="form-control" placeholder="Search">
<span class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
</div>
<div>
<a href="#" class="btn btn-primary prime-btn" data-bs-toggle="modal" data-bs-target="#add_prescription">Add New Prescription</a>
</div>
</div>
<div class="custom-table">
<div class="table-responsive">
<table class="table table-center mb-0">
<thead>
<tr>
<th>ID</th>
<th>Prescriped By</th>
<th>Type</th>
<th>Date</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<tr>
<td><a href="javascript:void(0);" class="text-blue-600" data-bs-toggle="modal" data-bs-target="#view_prescription">#Apt123</a></td>
<td>
<h2 class="table-avatar">
<a href="doctor-profile.html" class="avatar avatar-sm me-2">
<img class="avatar-img rounded-3" src="../assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
</a>
<a href="doctor-profile.html">Edalin Hendry</a>
</h2>
</td>
<td>Visit</td>
<td>25 Jan 2024</td>
<td>
<div class="action-item">
<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_prescription">
<i class="fa-solid fa-link"></i>
</a>
</div>
</td>
</tr>
<tr>
<td><a href="javascript:void(0);" class="text-blue-600" data-bs-toggle="modal" data-bs-target="#view_prescription">#Apt124</a></td>
<td>
<h2 class="table-avatar">
<a href="doctor-profile.html" class="avatar avatar-sm me-2">
<img class="avatar-img rounded-3" src="../assets/img/doctors/doctor-thumb-05.jpg" alt="User Image">
</a>
<a href="doctor-profile.html">John Homes</a>
</h2>
</td>
<td>Visit</td>
<td>28 Jan 2024</td>
<td>
<div class="action-item">
<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_prescription">
<i class="fa-solid fa-link"></i>
</a>
</div>
</td>
</tr>
<tr>
<td><a href="javascript:void(0);" class="text-blue-600" data-bs-toggle="modal" data-bs-target="#view_prescription">#Apt125</a></td>
<td>
<h2 class="table-avatar">
<a href="doctor-profile.html" class="avatar avatar-sm me-2">
<img class="avatar-img rounded-3" src="../assets/img/doctors/doctor-thumb-03.jpg" alt="User Image">
</a>
<a href="doctor-profile.html">Shanta Neill</a>
</h2>
</td>
<td>Visit</td>
<td>11 Feb 2024</td>
<td>
<div class="action-item">
<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_prescription">
<i class="fa-solid fa-link"></i>
</a>
</div>
</td>
</tr>
<tr>
<td><a href="javascript:void(0);" class="text-blue-600" data-bs-toggle="modal" data-bs-target="#view_prescription">#Apt126</a></td>
<td>
<h2 class="table-avatar">
<a href="doctor-profile.html" class="avatar avatar-sm me-2">
<img class="avatar-img rounded-3" src="../assets/img/doctors/doctor-thumb-08.jpg" alt="User Image">
</a>
<a href="doctor-profile.html">Anthony Tran</a>
</h2>
</td>
<td>Visit</td>
<td>19 Feb 2024</td>
<td>
<div class="action-item">
<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_prescription">
<i class="fa-solid fa-link"></i>
</a>
</div>
</td>
</tr>
<tr>
<td><a href="javascript:void(0);" class="text-blue-600" data-bs-toggle="modal" data-bs-target="#view_prescription">#Apt127</a></td>
<td>
<h2 class="table-avatar">
<a href="doctor-profile.html" class="avatar avatar-sm me-2">
<img class="avatar-img rounded-3" src="../assets/img/doctors/doctor-thumb-01.jpg" alt="User Image">
</a>
<a href="doctor-profile.html">Susan Lingo</a>
</h2>
</td>
<td>Visit</td>
<td>27 Feb 2024</td>
<td>
<div class="action-item">
<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_prescription">
<i class="fa-solid fa-link"></i>
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
<a href="#" class="page-link"><i class="fa-solid fa-chevron-left"></i></a>
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
<a href="#" class="page-link"><i class="fa-solid fa-chevron-right"></i></a>
</li>
</ul>
</div>

</div>


<div class="tab-pane fade" id="medical">
<div class="search-header">
<div class="search-field">
<input type="text" class="form-control" placeholder="Search">
<span class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
</div>
<div>
<a href="#" data-bs-toggle="modal" data-bs-target="#add_medical_records" class="btn btn-primary prime-btn">Add Medical Record</a>
</div>
</div>
<div class="custom-table">
<div class="table-responsive">
<table class="table table-center mb-0">
<thead>
<tr>
<th>Name</th>
<th>Date</th>
<th>Description</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<tr>
<td>
<a href="javascript:void(0);" class="lab-icon">
<span><i class="fa-solid fa-paperclip"></i></span>Lab Report
</a>
</td>
<td>24 Mar 2024</td>
<td>Glucose Test V12</td>
<td>
<div class="action-item">
<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#edit_medical_records">
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
<td>
<a href="javascript:void(0);" class="lab-icon">
<span><i class="fa-solid fa-paperclip"></i></span>Lab Report
</a>
</td>
<td>27 Mar 2024</td>
<td>Complete Blood Count(CBC)</td>
<td>
<div class="action-item">
<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#edit_medical_records">
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
<td>
<a href="javascript:void(0);" class="lab-icon">
<span><i class="fa-solid fa-paperclip"></i></span>Lab Report
</a>
</td>
<td>10 Apr 2024</td>
<td>Echocardiogram</td>
<td>
<div class="action-item">
<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#edit_medical_records">
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
<td>
<a href="javascript:void(0);" class="lab-icon">
<span><i class="fa-solid fa-paperclip"></i></span>Lab Report
</a>
</td>
<td>19 Apr 2024</td>
<td>COVID-19 Test</td>
<td>
<div class="action-item">
<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#edit_medical_records">
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
<td>
<a href="javascript:void(0);" class="lab-icon">
<span><i class="fa-solid fa-paperclip"></i></span>Lab Report
</a>
</td>
<td>27 Apr 2024</td>
<td>Allergy Tests</td>
<td>
<div class="action-item">
<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#edit_medical_records">
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
<td>
<a href="javascript:void(0);" class="lab-icon">
<span><i class="fa-solid fa-paperclip"></i></span>Lab Report
</a>
</td>
<td>02 May 2024</td>
<td>Lipid Panel </td>
<td>
<div class="action-item">
<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#edit_medical_records">
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
<a href="#" class="page-link"><i class="fa-solid fa-chevron-left"></i></a>
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
<a href="#" class="page-link"><i class="fa-solid fa-chevron-right"></i></a>
</li>
</ul>
</div>

</div>


<div class="tab-pane" id="billing">
<div class="search-header">
<div class="search-field">
<input type="text" class="form-control" placeholder="Search">
<span class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
</div>
<div>
<a href="#" class="btn btn-primary prime-btn" data-bs-toggle="modal" data-bs-target="#add_billing">Add New Billing</a>
</div>
</div>
<div class="custom-table">
<div class="table-responsive">
<table class="table table-center mb-0">
<thead>
<tr>
<th>Billing Date</th>
<th>Amount</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<tr>
<td>24 Mar 2024</td>
<td>$300</td>
<td><span class="badge badge-green status-badge">Paid</span></td>
<td>
<div class="action-item">
<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_bill">
<i class="fa-solid fa-link"></i>
</a>
</div>
</td>
</tr>
<tr>
<td>28 Mar 2024</td>
<td>$350</td>
<td><span class="badge badge-green status-badge">Paid</span></td>
<td>
<div class="action-item">
<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_bill">
<i class="fa-solid fa-link"></i>
</a>
</div>
</td>
</tr>
<tr>
<td>10 Apr 2024</td>
<td>$400</td>
<td><span class="badge badge-green status-badge">Paid</span></td>
<td>
<div class="action-item">
<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_bill">
<i class="fa-solid fa-link"></i>
</a>
</div>
</td>
</tr>
<tr>
<td>19 Apr 2024</td>
<td>$250</td>
<td><span class="badge badge-green status-badge">Paid</span></td>
<td>
<div class="action-item">
<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_bill">
<i class="fa-solid fa-link"></i>
</a>
</div>
</td>
</tr>
<tr>
<td>22 Apr 2024</td>
<td>$320</td>
<td><span class="badge badge-green status-badge">Paid</span></td>
<td>
<div class="action-item">
<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_bill">
<i class="fa-solid fa-link"></i>
</a>
</div>
</td>
</tr>
<tr>
<td>02 May 2024</td>
<td>$480</td>
<td><span class="badge badge-danger status-badge">Unpaid</span></td>
<td>
<div class="action-item">
<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_bill">
<i class="fa-solid fa-link"></i>
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
<a href="#" class="page-link"><i class="fa-solid fa-chevron-left"></i></a>
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
<a href="#" class="page-link"><i class="fa-solid fa-chevron-right"></i></a>
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

 

</div>

@include('include.footer')