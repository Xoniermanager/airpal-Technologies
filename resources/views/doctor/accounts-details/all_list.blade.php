<div id="payment_details_list">
    <div class="custom-table">
        <div class="table-responsive">
            <table class="table table-center mb-0">
                <thead>
                    <tr>
                        <th>Sr No.</th>
                        <th>Patient Details</th>
                        <th>Account No</th>
                        <th>Payer Name</th>
                        <th>Payer Email</th>
                        <th>Transaction Date</th>
                        <th>Amount</th>
                        <th>Currency</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- {{ dd($allPaymentDetails->bookingSlot->user) }} --}}
                    @forelse ($allPaymentDetails as $key => $paymentDetails)
                        <tr>
                            <td>
                                {{ $key + 1 }}
                            </td>
                            <td>
                                <h2 class="table-avatar">
                                    <a href="{{ route('doctor-patient-profile', Crypt::encrypt($paymentDetails->bookingSlot->patient->id)) }}"
                                        class="avatar avatar-sm me-2">
                                        <img class="avatar-img rounded-3"
                                            src="{{ $paymentDetails->bookingSlot->patient->image_url }}" alt=""
                                            onerror="this.src='{{ asset('assets/img/user.jpg') }}'"
                                            >
                                    </a>
                                    <span class="fs-6 text-dark"><a
                                            href="{{ route('doctor-patient-profile', Crypt::encrypt($paymentDetails->bookingSlot->patient->id)) }}">{{ $paymentDetails->bookingSlot->patient->first_name }}
                                            {{ $paymentDetails->bookingSlot->patient->last_name }}<br></a>
                                        <a
                                            href="emailto:{{ $paymentDetails->bookingSlot->patient->email }}">{{ $paymentDetails->bookingSlot->patient->email }}</a>
                                        </h5>
                                </h2>
                            </td>
                            <td>{{ $paymentDetails->payer_account_id ?? 'NULL' }}</td>
                            <td>{{ $paymentDetails->payer_name }}</td>
                            <td>{{ $paymentDetails->payer_email }}</td>
                            <td>{{ getFormattedDate($paymentDetails->created_at) }}</td>
                            <td>{{ $paymentDetails->amount }}</td>
                            <td>{{ $paymentDetails->currency }}</td>
                            <td>
                                @if ($paymentDetails->payment_status == 'COMPLETED')
                                    <span class="btn btn-success btn-xs">Completed</span>
                                @elseif($paymentDetails->payment_status == 'Pending')
                                    <span class="btn btn-warning btn-xs">Pending</span>
                                @else
                                    <span class="btn btn-danger btn-xs">Cancelled</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9">
                                <h4 class="text-danger text-center">No Payment Details Available</h4>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
    {{ $allPaymentDetails->links() }}
</div>
