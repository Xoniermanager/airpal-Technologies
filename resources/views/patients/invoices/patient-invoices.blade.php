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
                    @forelse ($patientInvoices as $patientInvoice)
                        <tr>
                            <td>
                                <h2 class="table-avatar">
                                    <a href="{{ route('frontend.doctor.profile', ['user' => Crypt::encrypt($patientInvoice->user->id) ]) }}" class="avatar avatar-sm me-2">
                                        <img class="avatar-img rounded-3" src="{{ $patientInvoice->user->image_url }}"
                                            alt=""
                                            onerror="this.src='{{ asset('assets/img/user.jpg') }}'">
                                    </a>
                                    <a href="{{ route('frontend.doctor.profile', ['user' => Crypt::encrypt($patientInvoice->user->id) ]) }}">{{ $patientInvoice->user->fullName }}</a>
                                </h2>
                            </td>
                            <td>{{ date('j M Y', strtotime($patientInvoice->created_at)) ?? '' }}</td>
                            <td>{{ date('j M Y', strtotime($patientInvoice->booking_date)) ?? '' }}</td>
                            <td>${{ $patientInvoice->payments->amount ?? 0 }}</td>
                            <td>
                                @if (isset($patientInvoice->invoice_url))
                                <div class="action-item">
                                    <a href="javascript:void(0)" class="set-bg-color"
                                        onclick="printInvoice('{{ Storage::url($patientInvoice->invoice_url) }}');">
                                        <i class="fa-solid fa-print"></i>
                                    </a>
                                </div>
                                @else
                                <div class="action-item">
                                    <a href="javascript:void(0)">
                                        <i class="fa-solid fa-print"></i>
                                    </a>
                                </div>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <td>Not Found</td>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>

{{-- 
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
    </div> --}}

    <div class="pagination dashboard-pagination">
        <div class="mt-3 d-flex justify-content-end">
            {{ $patientInvoices->links() }}
        </div>
    </div>


    @endsection

    @section('javascript')
    <script>

    function printInvoice(url) {
        var printWindow = window.open(url, '_blank');
        printWindow.onload = function() {
            printWindow.print();
        };
    }
    
</script>
    <style>
        a.set-bg-color {
            background-color: #004cd4;
            color: white;
        }

        .page-item.active .page-link {
            background-color: #004cd4;
            border-color: #004cd4;
            color: white;
        }
    </style>
@endsection
