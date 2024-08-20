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
                        <h2 class="breadcrumb-title">Dependants</h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Dependants</li>
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
                            <h3>Dependants</h3>
                            <ul class="header-list-btns">
                                <li>
                                    <div class="input-block dash-search-input">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <span class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="dashboard-header border-0 m-0">
                            <ul class="header-list-btns">
                                <li>
                                    <div class="input-block dash-search-input">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <span class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
                                    </div>
                                </li>
                            </ul>
                            <a href="#" class="btn btn-primary prime-btn" data-bs-toggle="modal"
                                data-bs-target="#add_dependent">Add Dependants</a>
                        </div>

                        <div class="dependent-wrap">
                            <div class="dependent-info">
                                <div class="patinet-information">
                                    <a href="patient-profile.html">
                                        <img src="../assets/img/dependent/dependent-01.jpg" alt="">
                                    </a>
                                    <div class="patient-info">
                                        <h5>Laura</h5>
                                        <ul>
                                            <li>Mother</li>
                                            <li>Female</li>
                                            <li>58 years 20 days</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="blood-info">
                                    <p>Blood Group</p>
                                    <h6>AB+ve</h6>
                                </div>
                            </div>
                            <div class="dependent-status">
                                <div class="status-toggle">
                                    <span class="deactive">Deactivate</span>
                                    <input type="checkbox" id="status_1" class="check" checked>
                                    <label for="status_1" class="checktoggle">checkbox</label>
                                    <span class="active">Activate</span>
                                </div>
                                <a href="javascript:void(0);" class="edit-icon" data-bs-toggle="modal"
                                    data-bs-target="#edit_dependent"><i class="fa-solid fa-pen-to-square"></i></a>
                            </div>
                        </div>


                        <div class="dependent-wrap">
                            <div class="dependent-info">
                                <div class="patinet-information">
                                    <a href="patient-profile.html">
                                        <img src="../assets/img/dependent/dependent-02.jpg" alt="">
                                    </a>
                                    <div class="patient-info">
                                        <h5>Mathew</h5>
                                        <ul>
                                            <li>Father</li>
                                            <li>Male</li>
                                            <li>59 years 15 days</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="blood-info">
                                    <p>Blood Group</p>
                                    <h6>AB+ve</h6>
                                </div>
                            </div>
                            <div class="dependent-status">
                                <div class="status-toggle">
                                    <span class="deactive">Deactivate</span>
                                    <input type="checkbox" id="status_2" class="check" checked>
                                    <label for="status_2" class="checktoggle">checkbox</label>
                                    <span class="active">Activate</span>
                                </div>
                                <a href="javascript:void(0);" class="edit-icon" data-bs-toggle="modal"
                                    data-bs-target="#edit_dependent"><i class="fa-solid fa-pen-to-square"></i></a>
                            </div>
                        </div>


                        <div class="dependent-wrap">
                            <div class="dependent-info">
                                <div class="patinet-information">
                                    <a href="patient-profile.html">
                                        <img src="../assets/img/dependent/dependent-03.jpg" alt="">
                                    </a>
                                    <div class="patient-info">
                                        <h5>Christopher</h5>
                                        <ul>
                                            <li>Brother</li>
                                            <li>Male</li>
                                            <li>32 years 6 Months</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="blood-info">
                                    <p>Blood Group</p>
                                    <h6>A+ve</h6>
                                </div>
                            </div>
                            <div class="dependent-status">
                                <div class="status-toggle">
                                    <span class="deactive">Deactivate</span>
                                    <input type="checkbox" id="status_3" class="check" checked>
                                    <label for="status_3" class="checktoggle">checkbox</label>
                                    <span class="active">Activate</span>
                                </div>
                                <a href="javascript:void(0);" class="edit-icon" data-bs-toggle="modal"
                                    data-bs-target="#edit_dependent"><i class="fa-solid fa-pen-to-square"></i></a>
                            </div>
                        </div>


                        <div class="dependent-wrap">
                            <div class="dependent-info">
                                <div class="patinet-information">
                                    <a href="patient-profile.html">
                                        <img src="../assets/img/dependent/dependent-04.jpg" alt="">
                                    </a>
                                    <div class="patient-info">
                                        <h5>Elisa</h5>
                                        <ul>
                                            <li>Sister</li>
                                            <li>Female</li>
                                            <li>28 years 4 Months</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="blood-info">
                                    <p>Blood Group</p>
                                    <h6>B+ve</h6>
                                </div>
                            </div>
                            <div class="dependent-status">
                                <div class="status-toggle checked">
                                    <span class="deactive">Deactivate</span>
                                    <input type="checkbox" id="status_4" class="check">
                                    <label for="status_4" class="checktoggle">checkbox</label>
                                    <span class="active">Activate</span>
                                </div>
                                <a href="javascript:void(0);" class="edit-icon" data-bs-toggle="modal"
                                    data-bs-target="#edit_dependent"><i class="fa-solid fa-pen-to-square"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>
    @include('include.footer')
