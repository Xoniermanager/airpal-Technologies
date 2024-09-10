<div id="payment_details_list">
    <div class="custom-table">
        <div class="table-responsive">
            <table class="table table-center mb-0">
                <thead>
                    <tr>
                        <th>Sr No.</th>
                        <th>Doctor Details</th>
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
                                    <a href="{{ route('frontend.doctor.profile', Crypt::encrypt($paymentDetails->bookingSlot->user->id)) }}"
                                        class="avatar avatar-sm me-2">
                                        <img class="avatar-img rounded-3"
                                            src="{{ $paymentDetails->bookingSlot->user->image_url }}" alt="">
                                    </a>
                                    <span class="fs-6 text-dark"><a
                                            href="{{ route('frontend.doctor.profile', Crypt::encrypt($paymentDetails->bookingSlot->user->id)) }}">{{ $paymentDetails->bookingSlot->user->display_name }}<br></a>
                                        <a
                                            href="emailto:{{ $paymentDetails->bookingSlot->user->email }}">{{ $paymentDetails->bookingSlot->user->email }}</a>
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
                                    <span class="badge badge-success-bg">Completed</span>
                                @elseif($paymentDetails->payment_status == 'Pending')
                                    <span class="badge badge-warning-bg">Pending</span>
                                @else
                                    <span class="badge badge-danger-bg">Cancelled</span>
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
