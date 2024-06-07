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
                        <h2 class="breadcrumb-title">Social Media</h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('doctor.doctor-dashboard.index') }}">Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Social Media</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>


        <div class="content doctor">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-xl-3 theiaStickySidebar">
                    @include('doctor.include.sidebar')

                    </div>
                    <div class="col-lg-8 col-xl-9">
                        <div class="dashboard-header">
                            <h3>Social Media</h3>
                        </div>
                        <div class="add-btn text-end mb-4">
                            <a href="#" class="btn btn-primary prime-btn add-social-media">Add New Social Media</a>
                        </div>
                        <form action="{{ route('doctor.doctor-social.index') }}"
                            class="social-media-form">
                            <div class="social-media-links d-flex align-items-center">
                                <div class="input-block input-block-new select-social-link">
                                    <select class="select">
                                        <option selected>Facebook</option>
                                        <option>Linkedin</option>
                                        <option>Twitter</option>
                                        <option>Instagram</option>
                                    </select>
                                </div>
                                <div class="input-block input-block-new flex-fill">
                                    <input type="password" class="form-control" placeholder="Add Url">
                                </div>
                            </div>
                            <div class="social-media-links d-flex align-items-center">
                                <div class="input-block input-block-new select-social-link">
                                    <select class="select">
                                        <option>Facebook</option>
                                        <option>Linkedin</option>
                                        <option selected>Twitter</option>
                                        <option>Instagram</option>
                                    </select>
                                </div>
                                <div class="input-block input-block-new flex-fill">
                                    <input type="password" class="form-control" placeholder="Add Url">
                                </div>
                            </div>
                            <div class="social-media-links d-flex align-items-center">
                                <div class="input-block input-block-new select-social-link">
                                    <select class="select">
                                        <option>Facebook</option>
                                        <option selected>Linkedin</option>
                                        <option>Twitter</option>
                                        <option>Instagram</option>
                                    </select>
                                </div>
                                <div class="input-block input-block-new flex-fill">
                                    <input type="password" class="form-control" placeholder="Add Url">
                                </div>
                            </div>
                            <div class="social-media-links d-flex align-items-center">
                                <div class="input-block input-block-new select-social-link">
                                    <select class="select">
                                        <option>Facebook</option>
                                        <option>Linkedin</option>
                                        <option>Twitter</option>
                                        <option selected>Instagram</option>
                                    </select>
                                </div>
                                <div class="input-block input-block-new flex-fill">
                                    <input type="password" class="form-control" placeholder="Add Url">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

  

    </div>

    @include('include.footer')