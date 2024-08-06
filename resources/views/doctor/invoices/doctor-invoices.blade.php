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
    <div id="chart_div"></div>

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
                                        <a href="javascript:void(0)" class="set-bg-color" onclick="printInvoice('{{ Storage::url($invoiceDetail->invoice_url) }}');">
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
    $("#searchKey").keyup(function() {
        filter();
    });

    function filter(page_no = 1) {

        let userId = jQuery('#doctor-id').text();
        let searchKey = jQuery('#searchKey').val();
        $.ajax({
            url: "<?= route('doctor.appointment-filter') ?>?page=" + page_no,
            type: 'get',
            data: {
                'key': 'all',
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

    function printInvoice(url) {
        var printWindow = window.open(url, '_blank');
        printWindow.onload = function() {
            printWindow.print();
        };
    }

google.charts.load('current', {packages: ['corechart', 'line']});
google.charts.setOnLoadCallback(drawLogScales);

function drawLogScales() {
      var data = new google.visualization.DataTable();
      data.addColumn('number', 'X');
      data.addColumn('number', 'rate');
      

      data.addRows([[25,5.240266007932762],[26,5.253756507319332],[27,5.22029650790401],[28,5.268704059004204],[29,5.233683845050076],[30,5.289605815622391],[31,5.232041091123958],[1,5.2301254401862955],[2,5.250722035402405],[3,5.283736492427697],[4,5.296890906826341],[5,5.355039204322343],[6,5.346735747035125],[7,5.326231782387644],[8,5.3273666240507165],[9,5.328501949410373],[10,5.291005414482904],[11,5.317451861825049],[12,5.3344712035425745],[13,5.318865815686569],[14,5.3273666240507165],[15,5.327650410031998],
[16,5.33532534905194],[17,5.294647171789238],[18,5.243288403010766],[19,5.2449386384155785],[20,5.265097477347184],
[21,5.291005414482904],[22,5.290165399493866],[23,5.243013533000918],[24,5.177591381675723],[25,5.136106760580972],
[26,5.118754990317601],[27,5.132943184294443],[28,5.093984040401572],[29,5.092946441953961],[1,5.096580274206888]]);

     var view = new google.visualization.DataView(data);
     view.setColumns([{ sourceColumn: 0, type: 'string',
       calc: function(dt, rowIndex) {
         return String(dt.getValue(rowIndex, 0));
       }}, 1]);
     
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