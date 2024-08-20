@extends('layouts.admin.main')
@section('content')
 
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-9">
                            <h3 class="page-title">List of Patient</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript:(0);">Users</a></li>
                                <li class="breadcrumb-item active">Patient</li>
                            </ul>
                        </div>
                        <div class="col-sm-3 col">
                            <label value="">Filter by Doctor</label>
                            <select class="form-control select" name="doctor" id="doctors">
                                <option value="">All</option>
                                @forelse ($doctorList as  $doctor)
                                    <option value="{{ $doctor->id }}">{{ $doctor->fullName }}</option>
                                @empty
                                    <option>Not found</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Patient Name</th>
                                                    <th>Age</th>
                                                    <th>gender</th>
                                                    <th>Blood Group</th>
                                                    <th>Address</th>
                                                    <th>Phone</th>
                                                    <th>Joined Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @include('admin.patients.patient-list')
                                            </tbody>
                                        </table>
                                        <div class="mt-3 d-flex justify-content-end">
                                            {{ $patientList->links() }}
                                        </div>
                                    </div>
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

    <script>

        $(document).ready(function() {
            $('#doctors').on('change', function() {
                searchPatientsByDoctor();
            });
        });

        function searchPatientsByDoctor()
        {
            let doctorId = jQuery('#doctors').val();
            $.ajax({
                url: "<?= route('filter.patients.by.doctor') ?>",
                type: 'post',
                data: {
                    doctorId: doctorId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response)
                {
                    console.log(response.data);
                    jQuery('#patients-list').replaceWith(response.data);
                    jQuery('#patients-list').hide().delay(200).fadeIn();
                },
                error: function(xhr, status, error) {
                    // Handle any errors
                    console.error(error);
                }
            });
        }


    </script>
    @endsection