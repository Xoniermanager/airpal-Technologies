@extends('layouts.doctor.main')
@section('content')


                        <div class="appointment-patient">
                            <div class="dashboard-header">
                                <h3><a href="{{ route('doctor.doctor-patients.index') }}"><i class="fa-solid fa-arrow-left"></i> Patient
                                        Details</a></h3>
                            </div>
                            <div class="patient-wrap">
                                <div class="patient-info">
                                    @if ($patientDetail->image_url)
                                    <img src="{{ $patientDetail->image_url ?? '' }}" alt="img">
                                    @else
                                    <img class="rounded-circle" src="{{ asset('assets/img/user.jpg')}}" width="31">
                                    @endif

                                    <div class="user-patient">
                                        <h6>#P0016</h6>
                                        <h5>{{ $patientDetail->fullName ?? '' }}</h5>
                                        <ul>
                                            <li>Age : {{ $patientDetail->getAgeAttribute ?? '' }}</li>
                                            <li>{{ $patientDetail->gender ?? '' }}</li>
                                            <li>{{ $patientDetail->blood_group ?? '' }}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="patient-book">
                                    <p><i class="fa-solid fa-calendar-days"></i>Last Booking</p>
                                    <p>24 Mar 2024</p>
                                </div>
                            </div>

                            <div class="appointment-tabs user-tab">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#pat_appointments"
                                            data-bs-toggle="tab">Appointments</a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a class="nav-link" href="#prescription" data-bs-toggle="tab">Prescription</a>
                                    </li> --}}
                                    {{-- <li class="nav-item">
                                        <a class="nav-link" href="#medical" data-bs-toggle="tab">Medical Records</a>
                                    </li> --}}
                                    {{-- <li class="nav-item">
                                        <a class="nav-link" href="#billing" data-bs-toggle="tab">Billing</a>
                                    </li> --}}
                                </ul>
                            </div>

                            <div class="tab-content pt-0">

                                <div id="pat_appointments" class="tab-pane fade show active" role="tabpanel">
                                    <div class="custom-table card-body">
                                        <ul>
                                            @forelse ($patientBooking as $booking)
                                                @php
                                                    $baseHue = 216; // Hue value for #004cd4
                                                    $saturation = 100; // Saturation for a vibrant color
                                                    $lightness = 41; // Initial lightness

                                                    // Adjust the hue or lightness dynamically based on the loop index
                                                    $currentHue = ($baseHue + $loop->index * 10) % 360; // Change hue for a color shift
                                                    $currentLightness = min($lightness + ($loop->index * 5), 70); // Gradually increase lightness

                                                    // Construct the HSL color string
                                                    $accentColor = "hsl($currentHue, $saturation%, $currentLightness%)";
                                                @endphp

                                                <li style="--accent-color: {{ $accentColor }}">
                                                    <div class="date">{{ date('j M Y', strtotime($booking->booking_date)) ?? '' }}</div>
                                                    <div class="appointment-wrap appointment-grid-wrap">
                                                        <div class="patinet-information mb-3">
                                                            <img src="{{ $booking->user->image_url ?? '' }}" alt="">
                                                            <div class="patient-info">
                                                              <a href="{{ route('frontend.doctor.profile', ['user' => Crypt::encrypt($booking->user->id)]) }}"><h5 class="mb-0">Dr. {{ $booking->user->fullName ?? '' }}</h5></a>

                                                                    @isset($doctorDetails)
                                                                    @forelse ($doctorDetails->educations as $education)
                                                                      <span class="badge badge-info text-white">  {{ $education->course->name }}</span>
                                                                    @empty
                                                                        <p>N/A</p>
                                                                    @endforelse
                                                                @endisset

                                                            </div>
                                                        </div>
                                                        <h4 class="">General Visit</h4>
                                                        <p class="mb-1"><b>Symptoms:</b> {{ $booking->symptoms ?? 'N/A' }}</p>
                                                        <p class="mb-1"><b>Appointment: </b>{{ date('j M Y', strtotime($booking->booking_date)) ?? '' }}</p>
                                                        <p class="mb-1 "><b>status: </b>
                                                            <span class="badge text-white
                                                                @if($booking->status == 'confirmed')
                                                                    badge-success
                                                                @elseif($booking->status == 'completed')
                                                                    badge-primary
                                                                @elseif($booking->status == 'rejected')
                                                                    badge-danger
                                                                @elseif($booking->status == 'requested')
                                                                    badge-warning
                                                                @else
                                                                    badge-secondary
                                                                @endif
                                                            ">
                                                                {{ ucfirst($booking->status) }}
                                                            </span>

                                                        </p>
                                                        <p class="mb-1"><b>Time:</b> {{ date('h:i A', strtotime($booking->slot_start_time)) ?? '' }}- {{ date('h:i A', strtotime($booking->slot_end_time)) ?? '' }}</p>
                                                        <p class="mb-1"> <b>Note: </b> {{ $booking->note ?? 'N/A' }}</p>


                                                        <div style="border-top: 1px dashed #000;padding-top: 5px;margin-top: 13px;">

                                                            <span class="float-left mt-2"> {!! $booking->getPrescriptionButton() !!}</span>
                                                            <span class="float-right mt-3">Booked on: {{ date('j M Y', strtotime($booking->created_at)) ?? '' }}</span>
                                                        </div>

                                                    </div>
                                                </li>
                                            @empty
                                                <div><p>Not Found</p></div>
                                            @endforelse
                                        </ul>

                                        {{-- <ul>
                                            @forelse ($patientBooking as $booking )
                                            <li style="--accent-color:#41516C">
                                                <div class="date">{{ date('j M Y', strtotime($booking->booking_date)) ?? '' }}</div>
                                                <div class="appointment-wrap appointment-grid-wrap">
                                                    <div class="patinet-information mb-3">
                                                        <img src="{{ $booking->user->image_url ?? '' }}" alt="">
                                                        <div class="patient-info">
                                                            <h5 class="mb-0">Dr. {{  $booking->user->fullName ?? '' }}</h5>
                                                            <span>Booking: {{ date('j M Y', strtotime($booking->booking_date)) ?? '' }}</span>
                                                        </div>
                                                    </div>
                                                    <h4 class="">General Visit  </h4>
                                                    <div class="">Lorem ipsum dolor sit, amet consectetur adipisicing
                                                        elit. Quos adipisci nobis nostrum vero nihil veniam.</div>
                                                </div>
                                            </li>
                                            @empty

                                            <div><p>Not Found</p></div>

                                        @endforelse
                                        </ul> --}}
                                    </div>
                                </div>
                                    {{-- <div class="custom-table">
                                        <div class="table-responsive">
                                            <table class="table table-center mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Doctor</th>
                                                        <th>Appt Date</th>
                                                        <th>Booking Date</th>
                                                        <th>Amount</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                @forelse ($patientBooking as $booking )
                                                <tbody>

                                                     <tr>
                                                        <td><a class="text-blue-600"
                                                                href="patient-upcoming-appointment.html">#Apt123</a>
                                                        </td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href="doctor-profile.html"
                                                                    class="avatar avatar-sm me-2">
                                                                    <img class="avatar-img rounded-3"
                                                                        src="{{ $booking->user->image_url ?? '' }}"
                                                                        alt="">
                                                                </a>
                                                                <a href="doctor-profile.html">{{  $booking->user->fullName ?? '' }}</a>
                                                            </h2>
                                                        </td>
                                                        <td> {{ date('j M Y', strtotime($booking->booking_date)) ?? '' }}</td>
                                                        <td> {{ date('j M Y', strtotime($booking->created_at)) ?? '' }}</td>
                                                        <td>$300</td>
                                                        <td><span
                                                                class="badge badge-yellow status-badge">{{  $booking->status ?? '' }}</span>
                                                        </td>
                                                        <td>
                                                            <div class="action-item">
                                                                <a href="patient-upcoming-appointment.html">
                                                                    <i class="fa-solid fa-link"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                                @empty
                                                <tr>
                                                    <td colspan="6" class="text-center">
                                                        <div><p>Not Found</p></div>
                                                    </td>
                                                   </tr>
                                            @endforelse

                                            </table>
                                        </div>
                                    </div> --}}
                                {{-- </div> --}}

{{--
                                <div class="tab-pane fade" id="prescription">
                                    <div class="search-header">
                                        <div class="search-field">
                                            <input type="text" class="form-control" placeholder="Search">
                                            <span class="search-icon"><i
                                                    class="fa-solid fa-magnifying-glass"></i></span>
                                        </div>
                                        <div>
                                            <a href="#" class="btn btn-primary prime-btn"
                                                data-bs-toggle="modal" data-bs-target="#add_prescription">Add New
                                                Prescription</a>
                                        </div>
                                    </div>
                                    <div class="custom-table">
                                        <div class="table-responsive">
                                            <table class="table table-center mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Prescriped By</th>
                                                        <th>Type</th>
                                                        <th>Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><a href="javascript:void(0);" class="text-blue-600"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#view_prescription">#Apt123</a></td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href="doctor-profile.html"
                                                                    class="avatar avatar-sm me-2">
                                                                    <img class="avatar-img rounded-3"
                                                                        src="../assets/img/doctors/doctor-thumb-02.jpg"
                                                                        alt="">
                                                                </a>
                                                                <a href="doctor-profile.html">Edalin Hendry</a>
                                                            </h2>
                                                        </td>
                                                        <td>Visit</td>
                                                        <td>25 Jan 2024</td>
                                                        <td>
                                                            <div class="action-item">
                                                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                    data-bs-target="#view_prescription">
                                                                    <i class="fa-solid fa-link"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="javascript:void(0);" class="text-blue-600"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#view_prescription">#Apt124</a></td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href="doctor-profile.html"
                                                                    class="avatar avatar-sm me-2">
                                                                    <img class="avatar-img rounded-3"
                                                                        src="../assets/img/doctors/doctor-thumb-05.jpg"
                                                                        alt="">
                                                                </a>
                                                                <a href="doctor-profile.html">John Homes</a>
                                                            </h2>
                                                        </td>
                                                        <td>Visit</td>
                                                        <td>28 Jan 2024</td>
                                                        <td>
                                                            <div class="action-item">
                                                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                    data-bs-target="#view_prescription">
                                                                    <i class="fa-solid fa-link"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="javascript:void(0);" class="text-blue-600"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#view_prescription">#Apt125</a></td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href="doctor-profile.html"
                                                                    class="avatar avatar-sm me-2">
                                                                    <img class="avatar-img rounded-3"
                                                                        src="../assets/img/doctors/doctor-thumb-03.jpg"
                                                                        alt="">
                                                                </a>
                                                                <a href="doctor-profile.html">Shanta Neill</a>
                                                            </h2>
                                                        </td>
                                                        <td>Visit</td>
                                                        <td>11 Feb 2024</td>
                                                        <td>
                                                            <div class="action-item">
                                                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                    data-bs-target="#view_prescription">
                                                                    <i class="fa-solid fa-link"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="javascript:void(0);" class="text-blue-600"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#view_prescription">#Apt126</a></td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href="doctor-profile.html"
                                                                    class="avatar avatar-sm me-2">
                                                                    <img class="avatar-img rounded-3"
                                                                        src="../assets/img/doctors/doctor-thumb-08.jpg"
                                                                        alt="">
                                                                </a>
                                                                <a href="doctor-profile.html">Anthony Tran</a>
                                                            </h2>
                                                        </td>
                                                        <td>Visit</td>
                                                        <td>19 Feb 2024</td>
                                                        <td>
                                                            <div class="action-item">
                                                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                    data-bs-target="#view_prescription">
                                                                    <i class="fa-solid fa-link"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="javascript:void(0);" class="text-blue-600"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#view_prescription">#Apt127</a></td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href="doctor-profile.html"
                                                                    class="avatar avatar-sm me-2">
                                                                    <img class="avatar-img rounded-3"
                                                                        src="../assets/img/doctors/doctor-thumb-01.jpg"
                                                                        alt="">
                                                                </a>
                                                                <a href="doctor-profile.html">Susan Lingo</a>
                                                            </h2>
                                                        </td>
                                                        <td>Visit</td>
                                                        <td>27 Feb 2024</td>
                                                        <td>
                                                            <div class="action-item">
                                                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                    data-bs-target="#view_prescription">
                                                                    <i class="fa-solid fa-link"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="pagination dashboard-pagination">
                                        <ul>
                                            <li>
                                                <a href="#" class="page-link"><i
                                                        class="fa-solid fa-chevron-left"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" class="page-link">1</a>
                                            </li>
                                            <li>
                                                <a href="#" class="page-link active">2</a>
                                            </li>
                                            <li>
                                                <a href="#" class="page-link">3</a>
                                            </li>
                                            <li>
                                                <a href="#" class="page-link">4</a>
                                            </li>
                                            <li>
                                                <a href="#" class="page-link">...</a>
                                            </li>
                                            <li>
                                                <a href="#" class="page-link"><i
                                                        class="fa-solid fa-chevron-right"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                </div> --}}
{{--

                                <div class="tab-pane fade" id="medical">
                                    <div class="search-header">

                                        <div>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#add_medical_records"
                                                class="btn btn-primary prime-btn">Add Medical Record</a>
                                        </div>
                                    </div>
                                    <div class="custom-table">
                                        <div class="table-responsive">
                                            <table class="table table-center mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>S.no</th>
                                                        <th>Name</th>
                                                        <th>Date</th>
                                                        <th>Description</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($medicalRecords as $key => $medicalRecord)
                                                        <tr>
                                                            <td class="text-blue-600"><a
                                                                    href="javascript:void(0);">{{ $key + 1 }}</a>
                                                            </td>
                                                            <td>
                                                                <a href="javascript:void(0);" class="lab-icon">
                                                                    <span><i class="fa-solid fa-paperclip"></i></span>
                                                                    {{ $medicalRecord->name ?? '' }}
                                                                </a>
                                                            </td>
                                                            <td> {{ $medicalRecord->date ?? '' }}</td>
                                                            <td>{!! Str::limit($medicalRecord->description, 20, ' ...') !!}</td>
                                                            <td>
                                                                <div class="action-item">

                                                                    <a href="{{ $medicalRecord->file }}" download>
                                                                        <i class="fa-solid fa-download"></i>
                                                                    </a>

                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @empty

                                               <tr>
                                                <td colspan="5" class="text-center">
                                                    <div><p>Not Found</p></div>
                                                </td>
                                               </tr>

                                                    @endforelse

                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div> --}}


                                {{-- <div class="tab-pane" id="billing">
                                    <div class="search-header">
                                        <div class="search-field">
                                            <input type="text" class="form-control" placeholder="Search">
                                            <span class="search-icon"><i
                                                    class="fa-solid fa-magnifying-glass"></i></span>
                                        </div>
                                        <div>
                                            <a href="#" class="btn btn-primary prime-btn"
                                                data-bs-toggle="modal" data-bs-target="#add_billing">Add New
                                                Billing</a>
                                        </div>
                                    </div>
                                    <div class="custom-table">
                                        <div class="table-responsive">
                                            <table class="table table-center mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Billing Date</th>
                                                        <th>Amount</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>24 Mar 2024</td>
                                                        <td>$300</td>
                                                        <td><span class="badge badge-green status-badge">Paid</span>
                                                        </td>
                                                        <td>
                                                            <div class="action-item">
                                                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                    data-bs-target="#view_bill">
                                                                    <i class="fa-solid fa-link"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>28 Mar 2024</td>
                                                        <td>$350</td>
                                                        <td><span class="badge badge-green status-badge">Paid</span>
                                                        </td>
                                                        <td>
                                                            <div class="action-item">
                                                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                    data-bs-target="#view_bill">
                                                                    <i class="fa-solid fa-link"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>10 Apr 2024</td>
                                                        <td>$400</td>
                                                        <td><span class="badge badge-green status-badge">Paid</span>
                                                        </td>
                                                        <td>
                                                            <div class="action-item">
                                                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                    data-bs-target="#view_bill">
                                                                    <i class="fa-solid fa-link"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>19 Apr 2024</td>
                                                        <td>$250</td>
                                                        <td><span class="badge badge-green status-badge">Paid</span>
                                                        </td>
                                                        <td>
                                                            <div class="action-item">
                                                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                    data-bs-target="#view_bill">
                                                                    <i class="fa-solid fa-link"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>22 Apr 2024</td>
                                                        <td>$320</td>
                                                        <td><span class="badge badge-green status-badge">Paid</span>
                                                        </td>
                                                        <td>
                                                            <div class="action-item">
                                                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                    data-bs-target="#view_bill">
                                                                    <i class="fa-solid fa-link"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>02 May 2024</td>
                                                        <td>$480</td>
                                                        <td><span class="badge badge-danger status-badge">Unpaid</span>
                                                        </td>
                                                        <td>
                                                            <div class="action-item">
                                                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                    data-bs-target="#view_bill">
                                                                    <i class="fa-solid fa-link"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="pagination dashboard-pagination">
                                        <ul>
                                            <li>
                                                <a href="#" class="page-link"><i
                                                        class="fa-solid fa-chevron-left"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" class="page-link">1</a>
                                            </li>
                                            <li>
                                                <a href="#" class="page-link active">2</a>
                                            </li>
                                            <li>
                                                <a href="#" class="page-link">3</a>
                                            </li>
                                            <li>
                                                <a href="#" class="page-link">4</a>
                                            </li>
                                            <li>
                                                <a href="#" class="page-link">...</a>
                                            </li>
                                            <li>
                                                <a href="#" class="page-link"><i
                                                        class="fa-solid fa-chevron-right"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                </div> --}}

                            </div>
                        </div>


@endsection
