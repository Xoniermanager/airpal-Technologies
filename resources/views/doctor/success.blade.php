@extends('layouts.frontend.main')
@section('content')

<div class="breadcrumb-bar-two">
    <div class="container">
        <div class="row align-items-center inner-banner">
            <div class="col-md-12 col-12 text-center">
                <h2 class="breadcrumb-title">Booking</h2>
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page">Booking</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="content success-page-cont bg-grey">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card summaries">
                    <div class="card-body">
                        <div class="success-cont">
                            <img src="{{ asset('assets/img/0de41a3c5953fba1755ebd416ec109dd.gif') }}" alt="">
                            <h3 class="text-success">Appointment Booked Successfully!</h3>
                            <p class="mb-1">Appointment booked with <strong>Dr. {{ $doctorName ?? ''}}</strong><br>
                                <strong> On:
                                    {{$bookingDate ?? ''}},
                                    <p> {{$bookingSlotTime ?? ''}}</p>
                                    {{-- {{ $bookingDate  ?? ''}} {{ $bookingSlotTime ?? ''}} --}}
                                </strong>
                            </p>
                            <a href="{{ route('home.index') }}" class="btn btn-primary view-inv-btn">
                                Home Page</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
