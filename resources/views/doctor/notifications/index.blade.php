<!DOCTYPE html>
<html lang="zxx">

<head>
    @include('include.head')
</head>

<body>

    <div class="main-wrapper">
        @include('doctor.include.header')

        <div class="breadcrumb-bar-two">
            <div class="container">
                <div class="row align-items-center inner-banner">
                    <div class="col-md-12 col-12 text-center">
                        <h2 class="breadcrumb-title">Dashboard </h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('doctor.doctor-dashboard.index') }}">Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>


        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-xl-3">
                        @include('doctor.include.sidebar')
                    </div>
                    <div class="col-lg-8 col-xl-9">
                        <div class="row">
                            @include('doctor.notifications.list')
                        </div>
                    </div>
                </div>
            </div>
        </div>
