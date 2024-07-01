@extends('layouts.admin.main')
@section('content')
        <div class="page-wrapper">
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row">
                        <div class="col">
                            <h3 class="page-title">Profile</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-header">
                            <div class="row align-items-center">
                                <div class="col-auto profile-image">
                                    <a href="#">
                                        <img class="rounded-circle" alt="User Image"
                                            src="{{ asset('images/' . $doctor->image_url) }}"
                                            onerror="this.src='{{ asset('assets/img/doctors/doctor-thumb-01.jpg') }}';">
                                    </a>
                                </div>
                                <div class="col ml-md-n2 profile-user-info">
                                    <h4 class="user-name mb-0">{{ $doctor->fullName ?? '' }}</h4>
                                    <h6 class="text-muted"><a href="W" class="__cf_email__"
                                            data-cfemail="">{{ $doctor->email ?? '' }}</a></h6>
                                    <div class="user-Location"><i class="fa-solid fa-location-dot"></i> Florida, United
                                        States</div>
                                    <div class="about-text">{{ $doctor->description ?? '' }}</div>
                                </div>
                                <div class="col-auto profile-btn">
                                    <a href="#" class="btn btn-primary">
                                        Edit
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="profile-menu">
                            <ul class="nav nav-tabs nav-tabs-solid">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#per_details_tab">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#per_education_tab">Education</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#per_experience_tab">Experience</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#per_awards_tab">Awards</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#per_working_hours_tab">Working Hours</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#password_tab">Password</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content profile-tab-cont">

                            <div class="tab-pane fade show active" id="per_details_tab">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title d-flex justify-content-between">
                                                    <span>Personal Details</span>
                                                    <a class="edit-link" data-bs-toggle="modal"
                                                        href="#edit_personal_details"><i
                                                            class="fa fa-edit me-1"></i>Edit</a>
                                                </h5>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted">Name</p>
                                                    <p class="col-sm-10">{{ $doctor->fullName ?? '' }}</p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted">Date of Birth</p>
                                                    <p class="col-sm-10">24 Jul 1983</p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted">Email ID</p>
                                                    <p class="col-sm-10"><a href="#" class="__cf_email__"
                                                            data-cfemail="9cf6f3f4f2f8f3f9dcf9e4fdf1ecf0f9b2fff3f1">{{ $doctor->email ?? '' }}</a>
                                                    </p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted">Mobile</p>
                                                    <p class="col-sm-10">{{ $doctor->phone ?? '' }}</p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted">Address</p>
                                                    <p class="col-sm-10 mb-0">
                                                        {{ $doctor->doctorAddress->fullAddress ?? '' }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="tab-pane fade show" id="per_education_tab">

                                <h5 class="card-title d-flex justify-content-between">
                                    <span>Education Details</span>
                                </h5>
                                @forelse ($doctor->educations as $education)
                                    <div class="col-lg-6">
                                        <div class="card">

                                            <div class="card-body">
                                                <div class="row">
                                                    <p class="col-sm-6 text-muted">Name of the institution</p>
                                                    <p class="col-sm-6">{{ $education->institute_name ?? '' }}</p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-6 text-muted">Course</p>
                                                    <p class="col-sm-6">24 Jul 1983</p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-6 text-muted">Start Date *</p>
                                                    <p class="col-sm-6"><a href="#" class="__cf_email__"
                                                            data-cfemail="9cf6f3f4f2f8f3f9dcf9e4fdf1ecf0f9b2fff3f1">{{ $education->start_date ?? '' }}</a>
                                                    </p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-6 text-muted">End Date *</p>
                                                    <p class="col-sm-6">{{ $education->end_date ?? '' }}</p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-6 text-muted">Education Certificates</p>
                                                    <p class="col-sm-6 mb-0">Preview</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty

                                    <h5 class="card-title d-flex justify-content-between">
                                        <span>Education Details Not Found</span>
                                    </h5>
                                @endforelse

                            </div>
                            <div class="tab-pane fade show" id="per_experience_tab">

                                <h5 class="card-title d-flex justify-content-between">
                                    <span>Experience Details</span>
                                </h5>

                                @forelse ($doctor->experiences as $experience)
                                    <div class="col-lg-6">
                                        <div class="card">

                                            <div class="card-body">


                                                <div class="row">
                                                    <p class="col-sm-6 text-muted">Job Title</p>
                                                    <p class="col-sm-6">{{ $experience->job_title ?? '' }}</p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-6 text-muted">hospital</p>
                                                    <p class="col-sm-6">{{ $experience->hospital->name ?? '' }}</p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-6 text-muted">Start Date *</p>
                                                    <p class="col-sm-6"><a href="#" class="__cf_email__"
                                                            data-cfemail="9cf6f3f4f2f8f3f9dcf9e4fdf1ecf0f9b2fff3f1">{{ $experience->start_date ?? '' }}</a>
                                                    </p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-6 text-muted">End Date *</p>
                                                    <p class="col-sm-6">{{ $experience->end_date ?? '' }}</p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-6 text-muted">Experience Certificates</p>
                                                    <p class="col-sm-6 mb-0">Preview</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty

                                    <h5 class="card-title d-flex justify-content-between">
                                        <span>Experience Details Not Found</span>
                                    </h5>
                                @endforelse

                            </div>
                            <div class="tab-pane fade show" id="per_awards_tab">

                                <h5 class="card-title d-flex justify-content-between">
                                    <span>Awards Details</span>
                                </h5>
                                @forelse ($doctor->awards as $award)
                                    <div class="col-lg-6">
                                        <div class="card">

                                            <div class="card-body">
                                                <div class="row">
                                                    <p class="col-sm-6 text-muted">Award Name</p>
                                                    <p class="col-sm-6">{{ $award->award->name ?? '' }}</p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-6 text-muted">Year</p>
                                                    <p class="col-sm-6">{{ date('Y',strtotime($award->year)) ?? '' }}</p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-6 text-muted">description</p>
                                                    <p class="col-sm-6"><a href="#" class="__cf_email__"
                                                            data-cfemail="9cf6f3f4f2f8f3f9dcf9e4fdf1ecf0f9b2fff3f1">{{ $award->description ?? '' }}</a>
                                                    </p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-6 text-muted">Award Certificates</p>
                                                    <p class="col-sm-6 mb-0">Preview</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty

                                    <h5 class="card-title d-flex justify-content-between">
                                        <span>Award Details Not Found</span>
                                    </h5>
                                @endforelse

                            </div>
                            <div class="tab-pane fade show" id="per_working_hours_tab">

                                <h5 class="card-title d-flex justify-content-between">
                                    <span>Working Hour Details</span>
                                </h5>
                                @forelse ($doctor->workingHour as $working)
                                    <div class="col-lg-6">
                                        <div class="card">

                                            <div class="col-md-12">

                                                <div class="widget business-widget">
                                                    <div class="widget-content">
                                                        <div class="listing-hours">
                                                            <div class="listing-day">
                                                                    <div class="day">{{ $working->daysOfWeek->name}}</div>
                                                                    <div class="time-items">
                                                                        <?php
                                                                           $startTime   = Date::createFromFormat('H:i:s',$working->start_time);
                                                                           $endTime     = Date::createFromFormat('H:i:s',$working->end_time);    
                                                                           $startTime12 = $startTime->format('h:i A');
                                                                           $endTime12   = $endTime->format('h:i A');
                                                                        ?>
                                                                        <span class="time">{{$startTime12}} - {{$endTime12}}</span>
                                                                    </div>
                                                                </div>
                                                                                                            
                                                            
                                                        </div>
                                                    </div>
                                                </div>

</div>
 
                                        </div>
                                    </div>
                                @empty

                                    <h5 class="card-title d-flex justify-content-between">
                                        <span>Award Details Not Found</span>
                                    </h5>
                                @endforelse

                            </div>
                            <div  class="tab-pane fade show" id="password_tab">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Change Password</h5>
                                        <div class="row">
                                            <div class="col-md-10 col-lg-6">
                                                <form>
                                                    <div class="mb-3">
                                                        <label class="mb-2">Old Password</label>
                                                        <input type="password" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="mb-2">New Password</label>
                                                        <input type="password" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="mb-2">Confirm Password</label>
                                                        <input type="password" class="form-control">
                                                    </div>
                                                    <button class="btn btn-primary" type="submit">Save Changes</button>
                                                </form>
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
    </div>

    </div>
@endsection
