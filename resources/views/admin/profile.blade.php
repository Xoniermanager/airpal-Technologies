@extends('layouts.admin.main')
@section('content')
    <div class="page-wrapper wrapperr">
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
                    <div class="profile-header card-light">
                        <div class="row align-items-center">
                            <div class="col-auto profile-image">
                                <a href="#">
                                    <img alt=""
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
                                <a href="{{ route('admin.edit-doctor', ['user' => $doctor->id]) }}" class="btn btn-primary">
                                    Edit
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-4">
                        <div class="profile-menu card-light mt-4">
                            <ul class="nav nav-tabs nav-tabs-solid verticle_tab">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#per_details_tab">
                                        <span class="nav-text text-gray-700 fw-bold fs-6 lh-1">
                                            Personal Details <i class="fa fa-arrow-right"></i>
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#education">
                                        <span class="nav-text text-gray-700 fw-bold fs-6 lh-1">
                                            Education <i class="fa fa-arrow-right"></i>
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#experience">
                                        <span class="nav-text text-gray-700 fw-bold fs-6 lh-1">
                                            Experience <i class="fa fa-arrow-right"></i>
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#award">
                                        <span class="nav-text text-gray-700 fw-bold fs-6 lh-1">
                                            Award <i class="fa fa-arrow-right"></i>
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#working-hours">
                                        <span class="nav-text text-gray-700 fw-bold fs-6 lh-1">
                                            Working Hours <i class="fa fa-arrow-right"></i>
                                        </span>
                                    </a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#password">
                                        <span class="nav-text text-gray-700 fw-bold fs-6 lh-1">
                                            Change Password <i class="fa fa-arrow-right"></i>
                                        </span>
                                    </a>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content mt-4 pt-0">
                            <div class="tab-pane fade show active" id="per_details_tab">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card-light">
                                            <div class="card-body">
                                                <h5 class="card-title d-flex justify-content-between">
                                                    <span>Personal Details</span>
                                                    <a class="edit-link"
                                                        href="{{ route('admin.edit-doctor', ['user' => $doctor->id]) }}"><i
                                                            class="fa fa-edit me-1"></i>Edit</a>
                                                </h5>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted">Name</p>
                                                    <p class="col-sm-10">Dr. <b>{{ $doctor->fullName ?? '' }}</b></p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted">Date of Birth</p>
                                                    <p class="col-sm-10">24 Jul 1983</p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted">Gender</p>
                                                    <p class="col-sm-10">{{ $doctor->gender ?? '' }}</p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted">Langauges</p>
                                                    <p class="col-sm-10">
                                                        @forelse ($doctor->language as $language )
                                                        {{ $language->name ?? '' }} 
                                                        @if( !$loop->last)
                                                        ,
                                                    @endif
                                                    @empty
                                                    <p class="col-sm-10">Not Found</p>
                                                    @endforelse
                                                    </p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted">Specialties</p>
                                                    <p class="col-sm-10">
                                                        @forelse ($doctor->specializations as $specialty )
                                                        {{ $specialty->name ?? '' }} 
                                                        @if( !$loop->last)
                                                        ,
                                                    @endif
                                                    @empty
                                                    <p class="col-sm-10">Not Found</p>
                                                    @endforelse
                                                    </p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted">Services</p>
                                                    <p class="col-sm-10">
                                                        @forelse ($doctor->services as $service )
                                                        {{ $service->name ?? '' }} 
                                                        @if( !$loop->last)
                                                        ,
                                                    @endif
                                                    @empty
                                                    <p class="col-sm-10">Not Found</p>
                                                    @endforelse
                                                    </p>
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
                            <div id="education" class="tab-pane fade">
                                <div class="row">
                                    @forelse ($doctor->educations as $education)
                                        <div class="col-md-6">
                                            <div class="card-light">
                                                <div class="card-body">
                                                    <h5 class="card-title">
                                                        <span>Education</span>
                                                    </h5>
                                                    <div >
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
                                                            <p class="col-sm-6 text-muted">Certificate</p>
                                                            <p class="col-sm-6"><a href="#" class="btn btm-sm btn-primary">Preview</a></p>
                                                        </div>
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
                            </div>
                            <div id="experience" class="tab-pane fade">
                                <div class="row">
                                    @forelse ($doctor->experiences as $experience)
                                    <div class="col-md-6">
                                      
                                            <div class="card-light">
                                                <div class="card-body">
                                                    <h5 class="card-title">
                                                        <span>Experience</span>
                                                    </h5>
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
                                                        <p class="col-sm-6 text-muted">Certificate</p>
                                                        <p class="col-sm-6"><a href="#" class="btn btm-sm btn-primary">Preview</a></p>
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
                            </div>
                            <div id="award" class="tab-pane fade">
                                <div class="row">
                             

                                        @forelse ($doctor->awards as $award)
                                        <div class="col-md-6">
                                            <div class="card-light">
                                                <div class="card-body">
                                                    <h5 class="card-title">
                                                        <span>Award</span>
                                                    </h5>
                                                    <div >
                                                        <div class="row">
                                                            <p class="col-sm-6 text-muted">Award Name</p>
                                                            <p class="col-sm-6">{{ $award->award->name ?? '' }}</p>
                                                        </div>
                                                        <div class="row">
                                                            <p class="col-sm-6 text-muted">Year</p>
                                                            <p class="col-sm-6">
                                                                {{ date('Y', strtotime($award->year)) ?? '' }}</p>
                                                        </div>
                                                        <div class="row">
                                                            <p class="col-sm-6 text-muted">description</p>
                                                            <p class="col-sm-6"><a href="#" class="__cf_email__"
                                                                    data-cfemail="9cf6f3f4f2f8f3f9dcf9e4fdf1ecf0f9b2fff3f1">{{ $award->description ?? '' }}</a>
                                                            </p>
                                                        </div>
                                                        <div class="row">
                                                            <p class="col-sm-6 text-muted">Certificate</p>
                                                            <p class="col-sm-6"><a href="#" class="btn btm-sm btn-primary">Preview</a></p>
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
                            </div>
                            <div id="working-hours" class="tab-pane fade">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-light">
                                            <div class="card-body">

                                                <h5 class="card-title">
                                                    <span>Working Hours</span>
                                                </h5>
                                                @forelse ($doctor->workingHour as $working)
                                                    <div class="slot-box">
                                                        <div class="slot-header">
                                                            <h5>{{ $working->daysOfWeek->name }}</h5>

                                                            <?php
                                                            $startTime = Date::createFromFormat('H:i:s', $working->start_time);
                                                            $endTime = Date::createFromFormat('H:i:s', $working->end_time);
                                                            $startTime12 = $startTime->format('h:i A');
                                                            $endTime12 = $endTime->format('h:i A');
                                                            ?>
                                                            <span class="time">{{ $startTime12 }} -
                                                                {{ $endTime12 }}</span>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <h5 class="card-title d-flex justify-content-between">
                                                        <span>Award Details Not Found</span>
                                                    </h5>
                                            </div>
                                            @endforelse
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        {{-- <div id="password" class="tab-pane fade">
                            <div class="card-light">
                                <div class="card-body">
                                    <h5 class="card-title"><span>Change Password</span> </h5>
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
                                                <button class="btn btn-primary" type="submit">Save
                                                    Changes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

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
