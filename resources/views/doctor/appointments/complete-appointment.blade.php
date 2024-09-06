@extends('layouts.doctor.main')
@section('content')
<div class="dashboard-header">
    <h3>Complete Appointment</h3>
</div>
<div class="row">

@forelse ($bookings as $booking)
    <div class="col-xl-4 col-lg-6 col-md-12 d-flex">
        <div class="position-relative appointment-wrap appointment-grid-wrap">
            @if ($booking->status == 'confirmed')
                <div class="ribbon ribbon-new"><span>Confirmed</span>
                </div>
            @elseif ($booking->status == 'cancelled')
                <div class="ribbon ribbon-hot"><span>Cancelled</span>
                </div>
            @elseif ($booking->booking_date == \Carbon\Carbon::now()->toDateString())
                <div class="ribbon ribbon-spo"><span>Today</span></div>
            @elseif (\Carbon\Carbon::parse($booking->booking_date)->gt(\Carbon\Carbon::now()) && $booking->status != 'completed')
                <div class="ribbon ribbon-pop"><span>Upcoming</span></div>
            @endif
            <ul>
                <li>
                    <div class="appointment-grid-head">
                        <div class="patinet-information">
                            <a href="{{ route('doctor-patient-profile', ['id' => Crypt::encrypt($booking->patient->id)]) }}">
                                <img src="{{ $booking->patient->image_url }}" id="blah">
                            </a>
                            <div class="patient-info">
                                <h6><a
                                        href="{{ route('doctor-patient-profile', ['id' => Crypt::encrypt($booking->patient->id)]) }}">{{ $booking->patient->fullName }}</a>
                                </h6>
                            </div>
                        </div>
                        <div class="grid-user-msg">
                            <span class="video-icon"><a href="#"><i
                                        class="fa-solid fa-video"></i></a></span>
                        </div>
                    </div>
                </li>
                <li class="appointment-info">
                    <p><i class="fa-solid fa-clock"></i>
                        {{ date('j M Y', strtotime($booking->booking_date)) ?? '' }} -
                        {{ date('h:i A', strtotime($booking->slot_start_time)) ?? '' }}
                    </p>
                    <p class="mb-0"><i class="fa-solid fa-location-dot"></i>
                        {{ $booking->user->patientAddress->address ?? '' }}
                        {{ $booking->user->patientAddress->city ?? '' }}
                        {{ $booking->user->patientAddress->state ?? '' }}
                        {{ $booking->user->patientAddress->country->name ?? '' }}
                    </p>
                    <ul class="d-flex apponitment-types">
                        <li>General Visit</li>
                    </ul>
                </li>
                <li class="appointment-action">
                    <ul>
                        <li>
                            <a href="{{ route('doctor.appointments.index') }}"><i
                                    class="fa-solid fa-eye"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa-solid fa-comments"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa-solid fa-xmark"></i></a>
                        </li>
                    </ul>
                    {{-- <div class="appointment-start">
                        <a href="{{ route('doctor.appointments.index') }}" class="start-link">
                            <i class="fa-solid fa-prescription"></i>
                            prescription</a>

                    </div> --}}
                    {!! $booking->getPrescriptionButton() !!}
                    {!! $booking->getMeetingButton()!!}

                </li>
            </ul>
        </div>
    </div>
@empty
    <p>No Appointments Availables</p>
@endforelse


<div class="mt-3 d-flex justify-content-end">
    {{ $bookings->links() }}
</div>
</div>
@endsection
