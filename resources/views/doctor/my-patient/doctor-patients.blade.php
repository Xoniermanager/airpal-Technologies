@extends('layouts.doctor.main')
@section('content')
    <div class="dashboard-header">
        <h3>My Patients</h3>
        <ul class="header-list-btns">
            <li>
                <div class="input-block dash-search-input">
                    <input type="text" class="form-control" placeholder="Search" id="searchKey">
                    <span class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
                </div>
            </li>
        </ul>
    </div>
    <div class="appointment-tab-head">
        <div class="appointment-tab-head">
            <div class="appointment-tabs">
                <ul class="nav nav-pills inner-tab " id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="all_tab" data-bs-toggle="pill" data-bs-target="#pills-upcoming"
                            type="button" role="tab" aria-controls="pills-upcoming" aria-selected="false"
                            tabindex="-1">All Patients<span>{{ count($finalData['allPatients']) }}</span></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="new_tab" data-bs-toggle="pill" data-bs-target="#pills-complete"
                            type="button" role="tab" aria-controls="pills-complete" aria-selected="false"
                            tabindex="-1">New Patients<span>{{ count($finalData['newPatients']) }}</span></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="regular_tab" data-bs-toggle="pill"
                            data-bs-target="#pills-cancel" type="button" role="tab" aria-controls="pills-cancel"
                            aria-selected="true">Regular
                            Patients<span>{{ count($finalData['regularPatients']) }}</span></button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @include('doctor.my-patient.list')
@endsection
