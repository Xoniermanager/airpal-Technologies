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
                        <h2 class="breadcrumb-title">Appointments</h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('doctor.doctor-dashboard.index') }}">Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Appointments</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        @php $userId = auth()->user()->id; @endphp
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-xl-3 theiaStickySidebar">
                        @include('doctor.include.sidebar')

                    </div>
                    <div class="col-lg-8 col-xl-9">
                        <div class="dashboard-header">
                            <h3>Appointments</h3>
                            <ul class="header-list-btns">
                                <li>
                                    <div class="input-block dash-search-input">
                                        <input type="text" class="form-control" placeholder="Search" id="searchKey">
                                        <span class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
                                    </div>
                                </li>
                                <ul class="tabs">
                                    <li>
                                        <div class="view-icons nav-link active" onclick="openTab(event, 'list-view')">
                                            <a href="javascript:void(0)"><i class="fa-solid fa-list"></i></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="view-icons nav-link" onclick="openTab(event, 'grid-view')">
                                            <a href="javascript:void(0)"><i class="fa-solid fa-th"></i></a>
                                        </div>
                                    </li>
                                </ul>


                                {{-- <li>
                                    <div class="view-icons nav-link active">
                                        <a href=""><i class="fa-solid fa-list"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="view-icons nav-link">
                                        <a href="" class="active"><i
                                                class="fa-solid fa-th"></i></a>
                                    </div>
                                </li> --}}
                                <li>
                                    {{-- <div class="view-icons">
                                        <a href="#"><i class="fa-solid fa-calendar-check"></i></a>
                                    </div> --}}
                                </li>
                            </ul>
                        </div>
                        <div class="appointment-tab-head">
                            <p style="display:none" id="doctor-id">{{ $userId }}</p>
                            <p style="display:none" id="selected-filter">all</p>
                            <div class="appointment-tabs">
                                <ul class="nav nav-pills inner-tab " id="pills-tab" role="tablist">
                                    <ul class="nav nav-pills inner-tab" id="pills-tab" role="tablist">

                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="all" type="button"
                                                onclick="appointment_filter(this)">All<span>{{ $doctorTotalAppointmentCounter }}</span></button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="today" type="button"
                                                onclick="appointment_filter(this)">Today<span>{{ $todayBookingCounter }}</span></button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="upcoming" type="button"
                                                onclick="appointment_filter(this)">Upcoming<span>{{ $getUpComingAppointmentCounter }}</span></button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="confirmed" type="button"
                                                onclick="appointment_filter(this)">Confirmed<span>{{ $getAllConfirmedAppointments }}
                                                </span></button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="cancelled" type="button"
                                                onclick="appointment_filter(this)">Cancelled<span>{{ $getAllCanceledAppointments }}
                                                </span></button>
                                        </li>
                                    </ul>


                                </ul>
                            </div>
                            <div class="filter-head">
                                <div class="position-relative daterange-wraper me-2">
                                    <div class="input-groupicon calender-input">
                                        <input type="date" class="form-control  date-range bookingrange"
                                            placeholder="From Date - To Date " id="dateSearch">
                                    </div>
                                    <i class="fa-solid fa-calendar-days"></i>
                                </div>
                            </div>
                        </div>

                        <div id="list-view" class="tab-content appointment-tab-content active">
                            @include('doctor.appointments.appointment-list')
                        </div>
                        <div id="grid-view" class="tab-content appointment-tab-content">
                            @include('doctor.appointments.list-view-appointment')
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('include.footer')

    <script>
        $("#searchKey").keyup(function() {
            filter();
            //    var searchKey = $('#searchKey').val();
            //    $.ajax({
            //         url:  "<?= route('doctor.appointment-search') ?>", 
            //         type: 'get', 
            //         data: { 
            //                 searchKey: searchKey,
            //                 doctorId: 2,
            //                 _token: '{{ csrf_token() }}' 
            //             },
            //         success: function(response) {
            //             jQuery('#appointmentList').replaceWith(response.data); 
            //             jQuery('#appointmentList').hide().delay(200).fadeIn();
            //         },
            //         error: function(xhr, status, error) {
            //             console.error(error);
            //         }
            //     });
        });




        $('input[type=date]').change(function() {
            filter();
            // $.ajax({
            //         url:  "<?= route('doctor.appointment-filter') ?>", 
            //         type: 'get', 
            //         data: { 
            //                 key: this.value,
            //                 doctorId: 2,
            //                 _token: '{{ csrf_token() }}' 
            //             },
            //         success: function(response) {
            //             jQuery('#appointmentList').replaceWith(response.data); 
            //             jQuery('#appointmentList').hide().delay(200).fadeIn();
            //         },
            //         error: function(xhr, status, error) {
            //             console.error(error);
            //         }
            //     });
        });

        function appointment_filter(element) {
            document.querySelectorAll('.nav-link').forEach(function(navLink) {
                navLink.classList.remove('active');
            });
            element.classList.add('active');
            jQuery('#selected-filter').text(jQuery(element).attr('id'));
            filter();
        }


        function filter() {
            let key = jQuery('#selected-filter').text();
            let userId = jQuery('#doctor-id').text();
            let searchKey = jQuery('#searchKey').val();
            let dateSearch = jQuery('#dateSearch').val();
            $.ajax({
                url: "<?= route('doctor.appointment-filter') ?>",
                type: 'get',
                data: {
                    key: key,
                    doctorId: userId,
                    searchKey: searchKey,
                    dateSearch: dateSearch,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {

                    jQuery('#appointmentList').replaceWith(response.data.grid);
                    jQuery('#appointmentGrid').replaceWith(response.data.list);
                    jQuery('#appointmentList').hide().delay(200).fadeIn();
                },
                error: function(xhr, status, error) {
                    // Handle any errors
                    console.error(error);
                }
            });
        }
    </script>


    <script>
        function openTab(event, tabName) {
            var i, tabcontent, tablinks;

            // Hide all tab content
            tabcontent = document.getElementsByClassName("tab-content");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].classList.remove("active");
            }

            // Remove active class from all tabs
            tablinks = document.getElementsByClassName("nav-link");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].classList.remove("active");
            }

            // Show the current tab and add an active class to the clicked tab
            document.getElementById(tabName).classList.add("active");
            event.currentTarget.classList.add("active");
        }
    </script>

    <style>
        .tabs {
            display: flex;
            cursor: pointer;
        }

        .tabs div {
            padding: 10px;
            border: 1px solid #ccc;
            border-bottom: none;
        }

        .tabs .active {
            background-color: #f1f1f1;
        }

        .tab-content {
            display: none;
            border: 1px solid #ccc;
            padding: 10px;
        }

        .tab-content.active {
            display: block;
        }
    </style>
