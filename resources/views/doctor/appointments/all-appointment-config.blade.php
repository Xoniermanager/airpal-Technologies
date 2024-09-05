@extends('layouts.doctor.main')
@section('content')
<div class="dashboard-header">
    <h3>Appointment</h3>
</div>
<div class="row mt-5">
    <div class="col-xl-6 col-lg-6 col-md-6 d-flex mb-4">
        <div class="appointment-wrap appointment-grid-wrap pt-0">
            <div style="margin-top: -20px;display: flex;justify-content: space-between;">
                <span class="btn btn-sm bg-info-light"> 09/04/2024</span>
                <span class="btn btn-sm btn-primary text-center" style="border-radius: 20px;
                     padding: 5px 20px;">Current</span>
                <span class="btn btn-sm bg-danger-light float-right"> 09/04/2024</span>
            </div>
            <div class="mt-4 mb-4">
                <h6>Slot Duration <small class="float-right"> 30 Min</small> </h6>
                <h6>CleanUp Interval <small class="float-right">30 Min</small> </h6>
                <h6>Starting date of each month for creating slots <small class="float-right">05</small> </h6>
                <h6>Upto which date of each month slots will be created <small class="float-right">05</small> </h6>
            </div>
            <a href="#" class="btn btn-sm btn-warning">
                <i class="fa fa-pen"></i>
            </a>
            <a href="#" class="btn btn-sm btn-danger">
                <i class="fa fa-trash"></i>
            </a>

        </div>
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6 d-flex mb-4">
        <div class="appointment-wrap appointment-grid-wrap pt-0">
            <div style="margin-top: -20px;display: flex;justify-content: space-between;">
                <span class="btn btn-sm bg-info-light"> 09/04/2024</span>
                <span class="btn btn-sm btn-primary text-center" style="border-radius: 20px;
                     padding: 5px 20px;">Current</span>
                <span class="btn btn-sm bg-danger-light float-right"> 09/04/2024</span>
            </div>
            <div class="mt-4 mb-4">
                <h6>Slot Duration <small class="float-right"> 30 Min</small> </h6>
                <h6>CleanUp Interval <small class="float-right">30 Min</small> </h6>
                <h6>Starting date of each month for creating slots <small class="float-right">05</small> </h6>
                <h6>Upto which date of each month slots will be created <small class="float-right">05</small> </h6>
            </div>
            <a href="#" class="btn btn-sm btn-warning">
                <i class="fa fa-pen"></i>
            </a>
            <a href="#" class="btn btn-sm btn-danger">
                <i class="fa fa-trash"></i>
            </a>

        </div>
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6 d-flex mb-4">
        <div class="appointment-wrap appointment-grid-wrap pt-0" style="pointer-events: none;
    opacity: 0.5;">
            <div style="margin-top: -20px;display: flex;justify-content: space-between;">
                <span class="btn btn-sm bg-info-light"> 09/04/2024</span>
                <span class="btn btn-sm btn-primary text-center" style="border-radius: 20px;
                     padding: 5px 20px;">Current</span>
                <span class="btn btn-sm bg-danger-light float-right"> 09/04/2024</span>
            </div>
            <div class="mt-4 mb-4">
                <h6>Slot Duration <small class="float-right"> 30 Min</small> </h6>
                <h6>CleanUp Interval <small class="float-right">30 Min</small> </h6>
                <h6>Starting date of each month for creating slots <small class="float-right">05</small> </h6>
                <h6>Upto which date of each month slots will be created <small class="float-right">05</small> </h6>
            </div>
            <a href="#" class="btn btn-sm btn-warning">
                <i class="fa fa-pen"></i>
            </a>
            <a href="#" class="btn btn-sm btn-danger">
                <i class="fa fa-trash"></i>
            </a>

        </div>
    </div>
</div>
@endsection