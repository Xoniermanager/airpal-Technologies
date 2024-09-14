@extends('layouts.admin.main')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Transactions</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Transactions</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="datatable table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Doctor Details</th>
                                            <th>Patient Details</th>
                                            <th>Total Amount</th>
                                            <th>Transaction Date</th>
                                            <th>Payment Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($allPaymentDetails as $key => $paymentDetails)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a class="avatar avatar-sm me-2">
                                                            <img class="avatar-img rounded-3"
                                                                src="{{ $paymentDetails->bookingSlot->user->image_url }}"
                                                                alt="">
                                                        </a>
                                                        <span class="fs-6 text-dark"><a
                                                                href="#">{{ $paymentDetails->bookingSlot->user->display_name }}<br></a>
                                                            <a>{{ $paymentDetails->bookingSlot->user->email }}</a>
                                                            </h5>
                                                    </h2>
                                                </td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a class="avatar avatar-sm me-2">
                                                            <img class="avatar-img rounded-3"
                                                                src="{{ $paymentDetails->bookingSlot->patient->image_url }}"
                                                                alt="">
                                                        </a>
                                                        <span class="fs-6 text-dark"><a>{{ $paymentDetails->bookingSlot->patient->first_name }}
                                                                {{ $paymentDetails->bookingSlot->patient->last_name }}<br></a>
                                                            <a>{{ $paymentDetails->bookingSlot->patient->email }}</a>
                                                            </h5>
                                                    </h2>
                                                </td>
                                                <td>{{ $paymentDetails->currency }} {{ $paymentDetails->amount }}</td>
                                                <td>{{ getFormattedDate($paymentDetails->created_at) }}</td>
                                                <td>
                                                    {{ PAYMENT_SUCCESS }}
                                                    @if ($paymentDetails->payment_status == 'completed')
                                                        <span
                                                            class="badge rounded-pill bg-success inv-badge">Completed</span>
                                                    @elseif ($paymentDetails->payment_status == 'failed')
                                                        <span class="badge rounded-pill bg-danger inv-badge">Failed</span>
                                                    @else
                                                        <span class="badge rounded-pill bg-info inv-badge">Pending</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="text-danger text-center">No Payments Details Available</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{ $allPaymentDetails->links() }}
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="delete_modal" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-content p-2">
                        <h4 class="modal-title">Delete</h4>
                        <p class="mb-4">Are you sure want to delete?</p>
                        <button type="button" class="btn btn-primary">Save </button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
