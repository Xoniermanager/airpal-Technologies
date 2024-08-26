@extends('layouts.admin.main')
@section('content')
 
        <div class="page-wrapper">
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Appointments</h3>
                            <ul class="breadcrumb">
                                <div class="input-groupicon calender-input float-end">
                                    <input type="date" class="form-control  date-range bookingrange" placeholder="From Date - To Date " id="dateSearch">
                                </div>
                                <div class="col-sm-3 col">
                                <select class="form-control select" name="doctor" id="doctor">
                                    <option value="">All</option>
                                    @forelse ($doctorList as  $doctor)
                                        <option value="{{ $doctor->id }}">{{ $doctor->fullName }}</option>
                                    @empty
                                        <option>Not found</option>
                                    @endforelse
                                </select>
                                </div>
                                <div class="col-sm-3 col">
                                <select class="form-control select" name="status" id="status">
                                    <option value="">All</option>
                                    <option value="requested">Requested</option>
                                    <option value="confirmed">Confirmed</option>
                                    <option value="cancelled">Rejected</option>
                                </select>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>Doctor Name</th>
                                                <th>Speciality</th>
                                                <th>Patient Name</th>
                                                <th>Appointment Time</th>
                                                <th>Status</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        @include('admin.appointments.appointment-list')
                                    </table>


                                    <div class="mt-3 d-flex justify-content-end">
                                        {{ $appointments_list->links() }}
                                    </div>     
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
@endsection



@section('javascript')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $("#searchKey").keyup(function() {
        filter();
    });

    $("#doctor").on('change',function() {
        filter();
    });

    $("#status").on('change',function() {
        filter();
    });


    $('input[type=date]').change(function() {
        filter();
    });

    function appointment_filter(element) {
        document.querySelectorAll('.nav-link').forEach(function(navLink) {
            navLink.classList.remove('active');
        });
        element.classList.add('active');
        jQuery('#selected-filter').text(jQuery(element).attr('id'));
        filter();
    }

    function filter(page_no = 1) {
        let key        = jQuery('#status').val();
        let userId     = jQuery('#doctor').val();
        let searchKey  = jQuery('#searchKey').val();
        let dateSearch = jQuery('#dateSearch').val();
        $.ajax({
            url: "<?= route('admin.appointment-filter') ?>?page=" + page_no,
            type: 'get',
            data: {
                'key': key,
                'doctorId': userId,
                'searchKey': searchKey,
                'dateSearch': dateSearch,
                'page_no': page_no,
                '_token': '{{ csrf_token() }}'
            },
            success: function(response) {
                console.log(response);
                jQuery('#appointmentList').replaceWith(response.data);
                jQuery('#appointmentList').hide().delay(200).fadeIn();
            },
            error: function(xhr, status, error) {
                // Handle any errors
                console.error(error);
            }
        });
    }
    $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            var page_no = $(this).attr('href').split('page=')[1];
            filter(page_no);
        });
</script>

@endsection