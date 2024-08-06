@extends('layouts.doctor.main')
@section('content')
    <div class="dashboard-header">
        <h3>Revenue</h3>
        <div class="search-header">
            <div class="search-field">
                <input type="text" class="form-control" placeholder="Search" id="searchKey">
                <span class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
            </div>
        </div>
    </div>


    {{-- This div make chart by chart.js with dynamic data --}}
    <div id="chart_div">
    </div>
    {{-- End --}}

    <input type="hidden" id="doctor-id" value="{{ auth()->user()->id }}">

    <div class="dashboard-header mt-20">
        <h3>Inovices</h3>
    </div>

    <div class="custom-table">
        <div class="table-responsive">
            <table class="table table-center mb-0">
                <thead>
                    <tr>
                        <th>Patient</th>
                        <th>Booked on</th>
                        <th>Appointment Date</th>
                        <th>Appointment Time</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($invoiceDetails as  $invoiceDetail)
                        <tr>
                            <td>
                                <h2 class="table-avatar">
                                    <a href="{{ route('doctor.doctor-profile.index') }}" class="avatar avatar-sm me-2">
                                        <img class="avatar-img rounded-3" src="{{ $invoiceDetail->patient->image_url }}"
                                            alt="">
                                    </a>
                                    <a href="{{ route('doctor.doctor-profile.index') }}">
                                        {{ $invoiceDetail->patient->fullName ?? '' }}
                                    </a>
                                </h2>
                            </td>
                            <td> {{ \Carbon\Carbon::parse($invoiceDetail->created_at)->format('d M Y') ?? '' }}</td>
                            <td> {{ \Carbon\Carbon::parse($invoiceDetail->booking_date)->format('d M Y') ?? '' }}</p>
                            </td>
                            <td> {{ \Carbon\Carbon::parse($invoiceDetail->slot_start_time)->format('h:i') ?? '' }} -
                                {{ \Carbon\Carbon::parse($invoiceDetail->slot_end_time)->format('h:i') ?? '' }}</td>
                            <td>$0</td>
                            <td>
                                <div class="action-item">
                                    {{-- <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                data-bs-target="#invoice_view">
                                                                <i class="fa-solid fa-link"></i>
                                                            </a> --}}
                                    {{-- {{ url('storage/images/'.$invoiceDetail->invoice_url) }} --}}

                                    @if (isset($invoiceDetail->invoice_url))
                                        <a href="javascript:void(0)" class="set-bg-color"
                                            onclick="printInvoice('{{ Storage::url($invoiceDetail->invoice_url) }}');">
                                            <i class="fa-solid fa-print"></i>
                                        </a>
                                    @else
                                        <a href="javascript:void(0)">
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
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            var graphData = [];
            loadGrpahRevenueData();
            google.charts.load('current', {
                packages: ['corechart', 'line']
            });
            google.charts.setOnLoadCallback(drawLogScales);
        });

        function loadGrpahRevenueData()
        {
            $.ajax({
                url: "<?= route('revenue.report') ?>",
                type: 'get',
                success: function(response) {
                    graphData = response;
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }

        $("#searchKey").keyup(function() {
            filter();
        });

        function filter(page_no = 1) {

            let userId    = jQuery('#doctor-id').text();
            let searchKey = jQuery('#searchKey').val();
            $.ajax({
                url: "<?= route('doctor.appointment-filter') ?>?page=" + page_no,
                type: 'get',
                data: {
                    'key': 'all',
                    'doctorId': userId,
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

        function printInvoice(url) {
            var printWindow = window.open(url, '_blank');
            printWindow.onload = function() {
                printWindow.print();
            };
        }

        function drawLogScales() {
            // console.log(response);
            var data = new google.visualization.DataTable();
            data.addColumn('number', 'X');
            data.addColumn('number', 'rate');


            
            data.addRows(graphData);
            // data.addRows(response);
            var view = new google.visualization.DataView(data);
            view.setColumns([{
                sourceColumn: 0,
                type: 'string',
                calc: function(dt, rowIndex) {
                    return String(dt.getValue(rowIndex, 0));
                }
            }, 1]);

            var options = {
                hAxis: {
                    title: 'day',
                    logScale: false

                },
                vAxis: {
                    title: 'rates',
                    logScale: false

                },
                colors: ['#a52714', '#097138']
            };

            var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
            chart.draw(view, options);
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
