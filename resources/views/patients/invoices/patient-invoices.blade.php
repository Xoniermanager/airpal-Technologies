@extends('layouts.patient.main')
@section('content')
                        <div class="dashboard-header">
                            <h3>Invoices</h3>
                        </div>

                        <div class="custom-table">
                            <div class="table-responsive">
                                <table class="table table-center mb-0">
                                    <thead>
                                        <tr>
                                            {{-- <th>ID</th> --}}
                                            <th>Doctor</th>
                                            <th>Booked on</th>
                                            <th>Appointment Date</th>
                                            <th>Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($patientInvoices as $patientInvoice )
                                        <tr>b
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                        <img class="avatar-img rounded-3"
                                                            src="../assets/img/doctors/doctor-thumb-21.jpg"
                                                            alt="">
                                                    </a>
                                                    <a href="doctor-profile.html">{{ $patientInvoice->user->fullName }}</a>
                                                </h2>
                                            </td>
                                            <td>{{ date('j M Y', strtotime($patientInvoice->created_at)) ?? '' }}</td>
                                            <td>{{ date('j M Y', strtotime($patientInvoice->booking_date)) ?? '' }}</td>
                                            <td>$300</td>
                                            <td>
                                                <div class="action-item">
                                                    <a href="javascript:void(0);" data-bs-toggle="modal"
                                                        data-bs-target="#invoice_view">
                                                        <i class="fa-solid fa-link"></i>
                                                    </a>
                                                    <a href="javascript:void(0);">
                                                        <i class="fa-solid fa-print"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>   
                                        @empty
                                        <td>Not Found</td>
                                        @endforelse
           
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="pagination dashboard-pagination">
                            <ul>
                                <li>
                                    <a href="#" class="page-link"><i class="fa-solid fa-chevron-left"></i></a>
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
                                    <a href="#" class="page-link"><i class="fa-solid fa-chevron-right"></i></a>
                                </li>
                            </ul>
                        </div>

@endsection