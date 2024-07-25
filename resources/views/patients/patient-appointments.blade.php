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
                        <h2 class="breadcrumb-title">Patient Appointments</h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Patient Appointments</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        @php $userId  = auth()->user()->id; @endphp
        <div class="content doctor-content">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-xl-3 theiaStickySidebar">
                        @include('patients.include.sidebar')
                    </div>

                    <div class="col-lg-8 col-xl-9">
                        <div class="dashboard-header">
                            <h3>Appointments</h3>
                            <ul class="header-list-btns">
                                <li>
                                    <div class="input-block dash-search-input">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <span class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="view-icons">
                                        <a href="patient-appointments.html"><i class="fa-solid fa-list"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="view-icons">
                                        <a href="patient-appointments-grid.html" class="active"><i
                                                class="fa-solid fa-th"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="appointment-tab-head">
                            <div class="appointment-tabs">
                                <ul class="nav nav-pills inner-tab " id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="today" type="button"  onclick="filter('all',{{ $userId}})">All<span>21</span></button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="today" type="button"  onclick="filter('today',{{ $userId}})">Today<span>21</span></button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="upcoming" type="button" onclick="filter('upcoming',{{ $userId}})">Upcoming<span>21</span></button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="cancelled" type="button" onclick="filter('canceled',{{ $userId}})">Cancelled<span>16</span></button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="completed" type="button" onclick="filter('completed',{{ $userId}})">Completed<span>214</span></button>
                                    </li>
                                </ul>
                            </div>
                            <div class="filter-head">
                                <div class="position-relative daterange-wraper me-2">
                                    <div class="input-groupicon calender-input">
                                        <input type="text" class="form-control  date-range bookingrange"
                                            placeholder="From Date - To Date ">
                                    </div>
                                    <i class="fa-solid fa-calendar-days"></i>
                                </div>
                                <div class="form-sorts dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" id="table-filter"><i
                                            class="fa-solid fa-filter me-2"></i>Filter By</a>
                                    <div class="filter-dropdown-menu">
                                        <div class="filter-set-view">
                                            <div class="accordion" id="accordionExample">
                                                <div class="filter-set-content">
                                                    <div class="filter-set-content-head">
                                                        <a href="#" data-bs-toggle="collapse"
                                                            data-bs-target="#collapseTwo" aria-expanded="false"
                                                            aria-controls="collapseTwo">Name<i
                                                                class="fa-solid fa-chevron-right"></i></a>
                                                    </div>
                                                    <div class="filter-set-contents accordion-collapse collapse show"
                                                        id="collapseTwo" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li>
                                                                <div class="input-block dash-search-input w-100">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Search">
                                                                    <span class="search-icon"><i
                                                                            class="fa-solid fa-magnifying-glass"></i></span>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="filter-set-content">
                                                    <div class="filter-set-content-head">
                                                        <a href="#" data-bs-toggle="collapse"
                                                            data-bs-target="#collapseOne" aria-expanded="true"
                                                            aria-controls="collapseOne">Appointment Type<i
                                                                class="fa-solid fa-chevron-right"></i></a>
                                                    </div>
                                                    <div class="filter-set-contents accordion-collapse collapse show"
                                                        id="collapseOne" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li>
                                                                <div class="filter-checks">
                                                                    <label class="checkboxs">
                                                                        <input type="checkbox" checked>
                                                                        <span class="checkmarks"></span>
                                                                        <span class="check-title">All Type</span>
                                                                    </label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="filter-checks">
                                                                    <label class="checkboxs">
                                                                        <input type="checkbox">
                                                                        <span class="checkmarks"></span>
                                                                        <span class="check-title">Video Call</span>
                                                                    </label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="filter-checks">
                                                                    <label class="checkboxs">
                                                                        <input type="checkbox">
                                                                        <span class="checkmarks"></span>
                                                                        <span class="check-title">Audio Call</span>
                                                                    </label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="filter-checks">
                                                                    <label class="checkboxs">
                                                                        <input type="checkbox">
                                                                        <span class="checkmarks"></span>
                                                                        <span class="check-title">Chat</span>
                                                                    </label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="filter-checks">
                                                                    <label class="checkboxs">
                                                                        <input type="checkbox">
                                                                        <span class="checkmarks"></span>
                                                                        <span class="check-title">Direct Visit</span>
                                                                    </label>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="filter-set-content">
                                                    <div class="filter-set-content-head">
                                                        <a href="#" data-bs-toggle="collapse"
                                                            data-bs-target="#collapseThree" aria-expanded="false"
                                                            aria-controls="collapseThree">Visit Type<i
                                                                class="fa-solid fa-chevron-right"></i></a>
                                                    </div>
                                                    <div class="filter-set-contents accordion-collapse collapse show"
                                                        id="collapseThree" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li>
                                                                <div class="filter-checks">
                                                                    <label class="checkboxs">
                                                                        <input type="checkbox" checked>
                                                                        <span class="checkmarks"></span>
                                                                        <span class="check-title">All Visit</span>
                                                                    </label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="filter-checks">
                                                                    <label class="checkboxs">
                                                                        <input type="checkbox">
                                                                        <span class="checkmarks"></span>
                                                                        <span class="check-title">General</span>
                                                                    </label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="filter-checks">
                                                                    <label class="checkboxs">
                                                                        <input type="checkbox">
                                                                        <span class="checkmarks"></span>
                                                                        <span class="check-title">Consultation</span>
                                                                    </label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="filter-checks">
                                                                    <label class="checkboxs">
                                                                        <input type="checkbox">
                                                                        <span class="checkmarks"></span>
                                                                        <span class="check-title">Follow-up</span>
                                                                    </label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="filter-checks">
                                                                    <label class="checkboxs">
                                                                        <input type="checkbox">
                                                                        <span class="checkmarks"></span>
                                                                        <span class="check-title">Direct Visit</span>
                                                                    </label>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="filter-reset-btns">
                                                <a href="appointments.html" class="btn btn-light">Reset</a>
                                                <a href="appointments.html" class="btn btn-primary">Filter Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <div class="tab-content appointment-tab-content appoint-patient">
                            <div class="tab-content appointment-tab-content">
                                @include('patients.appointments.list')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @include('include.footer')
    <script>
        function filter(key, userId) {
            $.ajax({
                url: "<?= route('patient.appointment-filter') ?>", 
                type: 'get', 
                data: { 
                    key: key,
                    user: userId,
                    _token: '{{ csrf_token() }}' 
                },
                success: function(response) {
                    jQuery('#appointmentList').replaceWith(response.data); // Replace the content
                    jQuery('#appointmentList').hide().delay(200).fadeIn(); // Apply fadeIn effect to the new content
                },
                error: function(xhr, status, error) {
                    // Handle any errors
                    console.error(error);
                }
            });
        }
    </script>
    