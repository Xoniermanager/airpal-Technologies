<!DOCTYPE html>
<html lang="zxx">

<head>
    @include('include.head')
</head>

<body>
    <div class="main-wrapper">
        @include('include.header')

        <div class="breadcrumb-bar-two">
            <div class="container">
                <div class="row align-items-center inner-banner">
                    <div class="col-md-12 col-12 text-center">
                        <h2 class="breadcrumb-title">Appointment</h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Appointment</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>


        <div class="content content-space">
            <div class="container">

                <div class="row">
                    @if (!empty($allDaySlots))
                    <div class="col-lg-8 col-md-12">
                        <div class="Appointment-header">
                            <h4 class="Appointment-title">Select Available Slots</h4>
                        </div>

                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <input type="text" name='datepicker' class="form-control" value="Select date"
                                id="datepicker" ng-required="true" placeholder="MM/DD/YYYY">
                            <span class="fa fa-calendar"></span>
                        </div>

                        <div class="Appointment-date choose-date-book">
                            <p>Choose Date</p>
                            <div class="Appointment-range">
                                <div class="Appointmentrange btn">
                                    <img src="{{ URL::asset('assets/img/icons/today-icon.svg') }}" alt="calendar-mage">
                                    <span></span>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>

                  
                            
                        <div class="card Appointment-card">
                            <div class="card-body time-slot-card-body">
                                <div class="Appointment-date-slider">
                                    

                                    <ul class="date-slider slick nav nav-tabs nav-tabs-bottom nav-justified">
                                        @foreach ($allDaySlots as $date => $slots)
                                            @php
                                             if ($date === array_key_first($allDaySlots)) {
                                                    $isActive = 'active show';
                                                    }
                                                    else {
                                                      $isActive ='';
                                                    }
                                                
                                            @endphp
                                            <li class="nav-item">
                                                <a class="nav-link {{ $isActive }}" href="#{{ $date }}" data-bs-toggle="tab"
                                                    aria-selected="true" role="tab">
                                                    <p style="font-size: 13px;">{{ $slots['day'] }}</p>
                                                    <h4>{{ date('j F', strtotime($date)) }}</h4>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content">
                                        @foreach ($allDaySlots as $date => $slots)
                                        
                                            @php
                                             if ($date === array_key_first($allDaySlots)) {
                                                    $isActive = 'active show';
                                                    }
                                                    else {
                                                      $isActive ='';
                                                    }
                                                
                                            @endphp
                                            <div role="tabpanel" id="{{ $date }}" class="tab-pane fade {{ $isActive }}">
                                                <div class="row">
                                                    @php
                                                        $morningSlots = [];
                                                        $afternoonSlots = [];
                                                        $eveningSlots = [];
                        
                                                        foreach ($slots['slotsTime'] as $time) {
                                                            $timeParts = explode(' - ', $time);
                                                            $hour = (int) $timeParts[0];
                        
                                                            if ($hour < 12) {
                                                                $morningSlots[] = $time;
                                                            } elseif ($hour >= 12 && $hour <= 17) {
                                                                $afternoonSlots[] = $time;
                                                            } elseif ($hour > 17 && $hour <= 24) {
                                                                $eveningSlots[] = $time;
                                                            }
                                                        }
                                                    @endphp
                        
                                                    <div class="col-md-12">
                                                        <h4>Morning</h4>
                                                    </div>
                                                    @forelse ($morningSlots as $time)
                                                        <div class="col-lg-4 col-md-4">
                                                            <div class="time-slot time-slot-blk">
                                                                <div class="time-slot-list">
                                                                    <ul>
                                                                        <li class="mb-3">
                                                                            <a class="timing" href="javascript:void(0);">
                                                                                <span><i class="feather-clock"></i>{{ $time }}</span>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @empty
                                                        <p style="color: red;">Slots not available</p>
                                                    @endforelse
                        
                                                    <div class="col-md-12">
                                                        <h4>Afternoon</h4>
                                                    </div>
                                                    @forelse ($afternoonSlots as $time)
                                                        <div class="col-lg-4 col-md-4">
                                                            <div class="time-slot time-slot-blk">
                                                                <div class="time-slot-list">
                                                                    <ul>
                                                                        <li class="mb-3">
                                                                            <a class="timing" href="javascript:void(0);">
                                                                                <span><i class="feather-clock"></i>{{ $time }}</span>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @empty
                                                        <p style="color: red;">Slots not available</p>
                                                    @endforelse
                        
                                                    <div class="col-md-12">
                                                        <h4>Evening</h4>
                                                    </div>
                                                    @forelse ($eveningSlots as $time)
                                                        <div class="col-lg-4 col-md-4">
                                                            <div class="time-slot time-slot-blk">
                                                                <div class="time-slot-list">
                                                                    <ul>
                                                                        <li class="mb-3">
                                                                            <a class="timing" href="javascript:void(0);">
                                                                                <span><i class="feather-clock"></i>{{ $time }}</span>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @empty
                                                        <p style="color: red;">Slots not available</p>
                                                    @endforelse
                        
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                 
                        

                        {{-- <div class="card Appointment-card">
                            <div class="card-body time-slot-card-body">
                                <div class="Appointment-date-slider">
                                    <ul class="date-slider slick nav nav-tabs nav-tabs-bottom nav-justified">
                                        @foreach ($allDaySlots as $date => $slots)
                                            <li class="active nav-item">
                                                <a class="nav-link" href="#{{ $date }}" data-bs-toggle="tab"
                                                    aria-selected="true" role="tab">
                                                    <p style="font-size: 13px;">{{ $slots['day'] }}</p>
                                                    <h4>{{ date('j F', strtotime($date)) }}</h4>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content">
                                        @foreach ($allDaySlots as $date => $slots)
                                            <div role="tabpanel" id="{{ $date }}" class="tab-pane fade show">
                                                <div class="row">
                                                    @php
                                                        $morningSlots = [];
                                                        $afternoonSlots = [];
                                                        $eveningSlots = [];

                                                        foreach ($slots['slotsTime'] as $time) {
                                                            $timeParts = explode(' - ', $time);
                                                            $hour = (int) $timeParts[0];

                                                            if ($hour < 12) {
                                                                $morningSlots[] = $time;
                                                            } elseif ($hour >= 12 && $hour <= 17) {
                                                                $afternoonSlots[] = $time;
                                                            } elseif ($hour > 17 && $hour <= 24) {
                                                                $eveningSlots[] = $time;
                                                            }
                                                        }
                                                    @endphp

                                                    <div class="col-md-12">
                                                        <h4>Morning</h4>
                                                    </div>
                                                    @forelse ($morningSlots as $time)
                                                        <div class="col-lg-4 col-md-4">
                                                            <div class="time-slot time-slot-blk">
                                                                <div class="time-slot-list">
                                                                    <ul>
                                                                        <li class="mb-3">
                                                                            <a class="timing"
                                                                                href="javascript:void(0);">
                                                                                <span><i
                                                                                        class="feather-clock"></i>{{ $time }}</span>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @empty
                                                        <p style="color: red;">Slots not avaiable</p>
                                                    @endforelse


                                                    <div class="col-md-12">
                                                        <h4>Afternoon</h4>
                                                    </div>
                                                    @forelse ($afternoonSlots as $time)
                                                        <div class="col-lg-4 col-md-4">
                                                            <div class="time-slot time-slot-blk">
                                                                <div class="time-slot-list">
                                                                    <ul>
                                                                        <li class="mb-3">
                                                                            <a class="timing"
                                                                                href="javascript:void(0);">
                                                                                <span><i
                                                                                        class="feather-clock"></i>{{ $time }}</span>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @empty
                                                        <p style="color: red;">Slots not avaiable</p>
                                                    @endforelse


                                                    <div class="col-md-12">
                                                        <h4>Evening</h4>
                                                    </div>
                                                    @forelse ($eveningSlots as $time)
                                                        <div class="col-lg-4 col-md-4">
                                                            <div class="time-slot time-slot-blk">
                                                                <div class="time-slot-list">
                                                                    <ul>
                                                                        <li class="mb-3">
                                                                            <a class="timing"
                                                                                href="javascript:void(0);">
                                                                                <span><i
                                                                                        class="feather-clock"></i>{{ $time }}</span>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @empty
                                                        <p style="color: red;">Slots not avaiable</p>
                                                    @endforelse


                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div> --}}
                        <div class="Appointment-btn">
                            <a href="{{ route('patient_details.index') }}"
                                class="btn btn-primary prime-btn justify-content-center align-items-center">
                                Next <i class="feather-arrow-right-circle"></i>
                            </a>
                        </div>
                    </div>
                    @else
                    <div class="col-lg-8 col-md-12">
                        <h3>The slot for seeing this doctor has not been established. </h3>
                        <img src="https://i.imghippo.com/files/xVsnc1719474067.png">
                    </div>
                    @endif
                    <div class="col-lg-4 col-md-12">
                        <div class="Appointment-header">
                            <h4 class="Appointment-title">Appointment Summary  </h4>
                        </div>
                        <div class="card Appointment-card">
                            <div class="card-body Appointment-card-body">
                                <div class="Appointment-doctor-details">
                                    <div class="Appointment-doctor-left">
                                        <div class="Appointment-doctor-img">
                                            <a href="#">
                                                <img src="{{asset('images/'.$doctorDetails->image_url )}}"
                                                    alt="John Doe">
                                            </a>
                                        </div>
                                        <div class="Appointment-doctor-info mt-3">
                                            <h4><a href="#">Dr. {{ $doctorDetails->first_name ?? ''}} {{ $doctorDetails->first_name ?? ''}}</a></h4>
                                            <p> @forelse ($doctorDetails->specializations as $specializaion)
                                                <span>{{$specializaion->name}}</span>
                                                @empty
                                                <span>No Specialization available</span>
                                                @endforelse</p>
                                        </div>
                                    </div>
                                    <div class="Appointment-doctor-right">
                                        {{-- <p>
                                            <i class="fas fa-check-circle"></i>
                                            <a href="{{ route('doctors.index') }}">Edit</a>
                                        </p> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card Appointment-card">
                            <div class="card-body Appointment-card-body">
                                <div class="Appointment-doctor-details">
                                    <div class="Appointment-device">
                                        <div class="Appointment-device-img">
                                            <img src="{{ URL::asset('assets/img/icons/device-message.svg') }}"
                                                alt="device-message">
                                        </div>
                                        <div class="Appointment-doctor-info">
                                            <h3>We can help you</h3>
                                            <p class="device-text">Call us {{$doctorDetails->phone ?? ''}} (or) chat with our customer
                                                support team.</p>
                                            <a href="tel:+91-8700914459" class="btn">Chat With Us</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        @include('include.footer')


        <style>
            .column-wise {
                display: flex;
                flex-wrap: wrap;
                flex-direction: column;
                height: 100%;
                /* Ensure the container has a height for the flex direction to work */
            }

            .column-wise .col-lg-4,
            .column-wise .col-md-4 {
                flex: 1 1 auto;
            }
        </style>


        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
            rel="stylesheet">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
        <script>
            // $('#datepicker').datepicker();
            // $('#datepicker').on('changeDate', function() {
            //     $('#my_hidden_input').val(
            //         $('#datepicker').datepicker('getFormattedDate')
            //     );
            // });

            // $(document).ready(function() {
            //   $("#datepicker").datepicker();
            //   $('.fa-calendar').click(function() {
            //     $("#datepicker").focus();

            //   });
            // });

            $("#datepicker").datepicker({
                dateFormat: 'dd M yyyy',
                onSelect: function(dateText) {
                    alert('hello');
                }
            });
        </script>
