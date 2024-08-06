@extends('layouts.patient.main')
@section('content')
    @php $patientId  = auth()->user()->id; @endphp
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
                    <div class="view-icons nav-link active" onclick="openTab(event, 'grid-view')">
                        <a href="javascript:void(0)"><i class="fa-solid fa-th"></i></a>
                    </div>
                </li>
                <li>
                    <div class="view-icons nav-link" onclick="openTab(event, 'list-view')">
                        <a href="javascript:void(0)"><i class="fa-solid fa-list"></i></a>
                    </div>
                </li>
            </ul>
        </ul>
    </div>
    <div class="appointment-tab-head">
        <p style="display:none" id="patient-id">{{ $patientId }}</p>
        <p style="display:none" id="selected-filter">all</p>
        <div class="appointment-tabs">
            <ul class="nav nav-pills inner-tab " id="pills-tab" role="tablist">
                <ul class="nav nav-pills inner-tab" id="pills-tab" role="tablist">

                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="all" type="button"
                            onclick="appointment_filter(this)">All<span>{{ $counters['allAppointments'] ?? 0 }}</span></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="today" type="button"
                            onclick="appointment_filter(this)">Today<span>{{ $counters['todayAppointments'] ?? 0 }}</span></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="upcoming" type="button"
                            onclick="appointment_filter(this)">Upcoming<span>{{ $counters['upcomingAppointments'] ?? 0 }}</span></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="confirmed" type="button"
                            onclick="appointment_filter(this)">Confirmed<span>{{ $counters['confirmedAppointments'] ?? 0 }}
                            </span></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="cancelled" type="button"
                            onclick="appointment_filter(this)">Cancelled<span>{{ $counters['cancelledAppointments'] ?? 0 }}
                            </span></button>
                    </li>
                </ul>


            </ul>
        </div>
        <div class="filter-head">
            <div class="position-relative daterange-wraper me-2">
                <div class="input-groupicon calender-input">
                    <input type="date" class="form-control  date-range bookingrange" placeholder="From Date - To Date "
                        id="dateSearch">
                </div>
                <i class="fa-solid fa-calendar-days"></i>
            </div>
        </div>
    </div>
        <div id="grid-view" class="tab-content appointment-tab-content active">
            @include('patients.appointments.grid-view')
        </div>
        <div id="list-view" class="tab-content appointment-tab-content">
            @include('patients.appointments.list-view')
        </div>

    </div>
@endsection

@section('javascript')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $("#pSearchKey").keyup(function() {
            filter();
        });

        $('input[type=date]').change(function() {
            filter();
        });

        function appointment_filter(element) {
            document.querySelectorAll('.nav-link').forEach(function(navLink) {
                navLink.classList.remove('active');
            });
            element.classList.add('active');
            jQuery('#selected-filter').text(jQuery(element).attr('id'));
            filter();
        }


        function filter(page_no = 1) {
            let key = jQuery('#selected-filter').text();
            let patientId = jQuery('#patient-id').text();
            let pSearchKey = jQuery('#pSearchKey').val();
            let dateSearch = jQuery('#dateSearch').val();
            $.ajax({
                url: "<?= route('patient.appointment.filter') ?>?page=" + page_no,
                type: 'get',
                data: {
                    'key': key,
                    'patientId': patientId,
                    'pSearchKey': pSearchKey,
                    'dateSearch': dateSearch,
                    'page_no': page_no,
                    '_token': '{{ csrf_token() }}'
                },
                success: function(response) {
                    jQuery('#patientAppointmentList').replaceWith(response.data.list);
                    jQuery('#patientAppointmentGrid').replaceWith(response.data.grid);

                    jQuery('#patientAppointmentList').hide().delay(200).fadeIn();
                    jQuery('#patientAppointmentGrid').hide().delay(200).fadeIn();
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
            console.log( document.getElementById(tabName));
            document.getElementById(tabName).classList.add("active");
            event.currentTarget.classList.add("active");
        }

        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            var page_no = $(this).attr('href').split('page=')[1];
            filter(page_no);
        });
    </script>
@endsection

<style>
    .tabs {
        display: flex;
        cursor: pointer;
    }

    .tabs .active a {
        background-color: #004cd4 !important;
        color: #fff;
    }

    .tab-content {
        display: none;
        /* border: 1px solid #ccc; */
        padding: 10px;
    }

    .tab-content.active {
        display: block;
    }
</style>
