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

                <div class="card summaries bg-lt pt-0">
                    <div class="card-body">
                        <div class="success-cont">
                            <img src="{{ asset('assets/img/failåed.webp') }}" alt="" class="h-280px">
                            <h3 class="text-danger">Appointment has been Cancelled!</h3>
                            <p class="mb-1">Appointment booked with <strong>Dr. {{ $doctorName ?? ''}}</strong><br>
                                <strong> On {{$bookingDate ?? ''}},

                                    {{-- {{ $bookingDate  ?? ''}} {{ $bookingSlotTime ?? ''}} --}}
                                </strong>
                            </p>
                            <p class="fw-bold mb-2"> {{$bookingSlotTime ?? ''}}</p>
                            <p class="text-danger">Due to payment error, the payment has not been received.</p>
                            <a href="{{ route('home.index') }}" class="btn btn-primary view-inv-btn">
                                Home Page</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>