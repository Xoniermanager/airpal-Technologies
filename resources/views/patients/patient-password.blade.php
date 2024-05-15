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
                        <h2 class="breadcrumb-title">Change Password</h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('patients.patient-dashboard.index') }}">Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Change Password</li>
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
                        <div class="dashboard-header">
                            <h3>Change Password</h3>
                        </div>
                        <form action="{{ route('patients.patient-password.index') }}">
                            <div class="card pass-card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-block input-block-new">
                                                <label class="form-label">Old Password</label>
                                                <input type="password" class="form-control">
                                            </div>
                                            <div class="input-block input-block-new">
                                                <label class="form-label">New Password</label>
                                                <div class="pass-group">
                                                    <input type="password" class="form-control pass-input">
                                                    <span class="feather-eye-off toggle-password"></span>
                                                </div>
                                            </div>
                                            <div class="input-block input-block-new mb-0">
                                                <label class="form-label">Confirm Password</label>
                                                <div class="pass-group">
                                                    <input type="password" class="form-control pass-input-sub">
                                                    <span class="feather-eye-off toggle-password-sub"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-set-button">
                                <button class="btn btn-light" type="button">Cancel</button>
                                <button class="btn btn-primary" type="submit">Save Changes</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>


    </div>

    @include('include.footer')