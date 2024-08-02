<!DOCTYPE html>
<html lang="zxx">

<head>
    @include('include.head')
</head>

<body>

    <div class="main-wrapper">
        @include('doctor.include.header')

        <div class="breadcrumb-bar-two">
            <div class="container">
                <div class="row align-items-center inner-banner">
                    <div class="col-md-12 col-12 text-center">
                        <h2 class="breadcrumb-title">Invoices</h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('doctor.doctor-dashboard.index') }}">Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Invoices</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>


        <div class="content doctor-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-xl-3 theiaStickySidebar">
                        @include('doctor.include.sidebar')

                    </div>

                    <div class="col-lg-8 col-xl-9">
                        <div class="dashboard-header">
                            <h3>Invoices</h3>
                        </div>
                        <div class="search-header">
                            <div class="search-field">
                                <input type="text" class="form-control" placeholder="Search" id="searchKey">
                                <span class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
                            </div>
                        </div>
                        <input type="hidden" id="doctor-id" value="{{ auth()->user()->id }}">
                        <div class="custom-table">
                            <div class="table-responsive">
                                <table class="table table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Patient</th>
                                            <th>Appointment Date</th>
                                            <th>Booked on</th>
                                            <th>Appointment Time</th>
                                            <th>Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($invoiceDetails as  $invoiceDetail)
                                        <tr>
                                            <td>
                                                <a href="javascript:void(0);" class="text-blue-600"
                                                    data-bs-toggle="modal" data-bs-target="#invoice_view">#Inv-2021</a>
                                            </td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{ route('doctor.doctor-profile.index') }}"
                                                        class="avatar avatar-sm me-2">
                                                        <img class="avatar-img rounded-3"
                                                            src="../assets/img/doctors/doctor-thumb-02.jpg"
                                                            alt="">
                                                    </a>
                                                    <a href="{{ route('doctor.doctor-profile.index') }}">
                                                        {{ $invoiceDetail->patient->fullName ?? ''}}
                                                    </a>
                                                </h2>
                                            </td>
                                            <td> {{ \Carbon\Carbon::parse($invoiceDetail->booking_date)->format('d M Y') ?? '' }}</p></td>
                                            <td> {{ \Carbon\Carbon::parse($invoiceDetail->created_at)->format('d M Y') ?? '' }}</td>
                                            <td> {{ \Carbon\Carbon::parse($invoiceDetail->slot_start_time)->format('h:i') ?? '' }} - {{ \Carbon\Carbon::parse($invoiceDetail->slot_end_time)->format('h:i') ?? '' }}</td>
                                            <td>$300</td>
                                            <td>
                                                <div class="action-item">
                                                    <a href="javascript:void(0);" data-bs-toggle="modal"
                                                        data-bs-target="#invoice_view">
                                                        <i class="fa-solid fa-link"></i>
                                                    </a>
                                                    @if (isset($invoiceDetail->invoice_url))
                                                    <a href="{{ $invoiceDetail->invoice_url ?? ''}}" class="set-bg-color">
                                                        <i class="fa-solid fa-print"></i>
                                                    </a>
                                                    @else
                                                    <a href="javascript:void(0)" >
                                                        <i class="fa-solid fa-print"></i>
                                                    </a>  
                                                   
                                                    @endif
                                          
                                                </div>
                                            </td>
                                        </tr> 
                                        @empty
                                            
                                        @endforelse
                               
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="pagination dashboard-pagination ">
                            {{ $invoiceDetails->links() }}    
                    </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        $("#searchKey").keyup(function() {
            filter();
        });


        function filter(page_no = 1) {
    
            let userId = jQuery('#doctor-id').text();
            let searchKey = jQuery('#searchKey').val();
            $.ajax({
                url: "<?= route('doctor.appointment-filter') ?>?page="+page_no,
                type: 'get',
                data: {
                    'key' :'all',
                    'doctorId': 2,
                    'searchKey': searchKey,
                    'page_no': page_no,
                    '_token': '{{ csrf_token() }}'
                },
                success: function(response) {
                    jQuery('#appointmentList').replaceWith(response.data);
                    jQuery('#appointmentList').hide().delay(200).fadeIn();
                },
                error: function(xhr, status, error) {
                    // Handle any errors
                    console.error(error);
                }
            });
        }
        </script>
    <style>
        a.set-bg-color {
    background-color: #004cd4;
    color: white;
}.page-item.active .page-link {
    background-color: #004cd4;
    border-color: #004cd4;
    color: white;
}
        </style>

    @include('include.footer')
