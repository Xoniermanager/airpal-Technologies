@extends('layouts.doctor.main')
@section('content')
    <div class="dashboard-header">
        <h3>Prescription</h3>
        <div class="input-block dash-search-input ">
            <a href="{{ route('prescription.add') }}" class="btn btn-primary prime-btn">
                Add Prescription</a>
        </div>
    </div>
    <div class="tab-content pt-0">
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible">
                {{ session('error') }}
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success alert-dismissible">
                {{ session('success') }}
            </div>
        @endif
        <div class="search-header">
            <div class="search-field">
                <input type="text" class="form-control" placeholder="Search" id="search">
                <span class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
            </div>
            <div class="input-block dash-search-input mb-3 w-250px">
                <select class="form-select" id="patient_details">
                    <option value="">Select Patient</option>
                    @foreach ($allPatientDetails as $patientDetails)
                        <option value="{{ $patientDetails->id }}">{{ $patientDetails->first_name }}
                            {{ $patientDetails->last_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-block mb-3 w-250px" id="booking_html" style="display:none">
                <select class="form-select" id="booking_details">
                </select>
            </div>
            <div class="input-block dash-search-input mb-3">
                <input type="date" class="form-control" id="date">
            </div>

        </div>
        @include('doctor.prescription.all-prescription')
    </div>
    <script>
        function delete_medical_record(id) {
            event.preventDefault();
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/doctor/prescription/delete/' + id,
                        type: "get",
                        success: function(res) {
                            if (res.status == true) {
                                $('#medical_record_list').replaceWith(res.data)
                                Swal.fire("Done!", "It was successfully deleted!", "success");
                            } else {
                                Swal.fire("Error deleting!", "Please try again", "error");
                            }
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            Swal.fire("Error deleting!", "Please try again", "error");
                        }
                    });
                }
            });
        }
        jQuery("#search").on('keyup', function() {
            search_filter_results();
        });
        jQuery("#date").on('change', function() {
            search_filter_results();
        });
        jQuery("#patient_details").on('change', function() {
            search_filter_results();
            $.ajax({
                type: "GET",
                url: "{{ route('get.booking.details.patient') }}",
                data: {
                    'patient_id': this.value,
                },
                success: function(response) {
                    $('#booking_html').show();
                    var select = $('#booking_details');
                    select.html('');
                    select.append(response.data);
                },
                error: function() {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Somethiong went Wrong!! Please try again"
                    });
                    return false;
                }
            });
        });
        jQuery("#booking_details").on('change', function() {
            search_filter_results();
        });
        function search_filter_results() {
            $.ajax({
                type: "GET",
                url: "{{ route('prescription.search.filter') }}",
                data: {
                    'date': $('#date').val(),
                    'search': $('#search').val(),
                    'booking_detail_id': $('#booking_details').val(),
                    'patient_detail_id': $('#patient_details').val()
                },
                success: function(response) {
                    $('#medical_record_list').replaceWith(response.data);
                }
            });
        }
    </script>
@endsection
