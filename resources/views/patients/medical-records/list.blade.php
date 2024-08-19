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
            <div>
                <a href="{{ route('patient.medical-records.add') }}" class="btn btn-primary prime-btn">Add Medical
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
                            $(".data-medical-record-id-" + id).remove();
                            Swal.fire("Done!", "It was successfully deleted!", "success");
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            Swal.fire("Error deleting!", "Please try again", "error");
                        }
                    });
                }
            });
        }

        $('#search').on('keyup', function() {
            $.ajax({
                url: '/patients/medical-records-filter',
                type: "get",
                data: {
                    "search_key": this.value
                },
                success: function(res) {
                    $('#medical_record_list').replaceWith(res.data);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    // Swal.fire("Error deleting!", "Please try again", "error");
                }
            });
        });
    </script>
@endsection
