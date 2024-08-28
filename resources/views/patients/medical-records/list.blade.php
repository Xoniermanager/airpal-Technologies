@extends('layouts.patient.main')
@section('content')
    <div class="dashboard-header">
        <h3>Medical Records</h3>
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
            <div class="input-block dash-search-input mb-3">
                <input type="date" class="form-control" id="date">
            </div>
            <div class="input-block dash-search-input ">
                <a href="{{ route('patient.medical-records.add') }}" class="btn btn-primary prime-btn">Add
                    Medical
                    Record</a>
            </div>
        </div>
        @include('patients.medical-records.all-medical-record')
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
                        url: '/patients/delete-medical-record/' + id,
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

        function search_filter_results() {
            $.ajax({
                type: 'GET',
                url: "{{route('medical.records.filtering')}}",
                data: {
                    'date': $('#date').val(),
                    'search': $('#search').val()
                },
                success: function(response) {
                    $('#medical_record_list').replaceWith(response.data);
                }
            });
        }
    </script>
@endsection
