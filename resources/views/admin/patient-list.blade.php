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
                                                    <th>Patient ID</th>
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
                                                @forelse ($patientList as $patient)
                                                <tr>
                                                    <td>#PT001</td>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a href="" class="avatar avatar-sm me-2"><img
                                                                    class="avatar-img rounded-circle"
                                                                    src="{{ $patient->image_url }}"
                                                                    alt=""></a>
                                                            <a href="">{{ $patient->fullName }}</a>
                                                        </h2>
                                                    </td>
                                                    <td> {{ $patient->getAgeAttribute ?? '' }}</td>
                                                    <td> {{ $patient->gender ?? '' }}</td>
                                                    <td> {{ $patient->blood_group ?? '' }}</td>
                                                    <td> {{ $patient->fullAddress  ?? ''}}</td>
                                                    <td> {{ $patient->phone ?? '' }}</td>
                                                    <td> {{ date('j M Y', strtotime($patient->booking_date)) }}</td>
                                                </tr>   
                                                @empty
                                                <td>Not found</td>
                                                @endforelse
                 
                                            </tbody>
                                        </table>
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

        // function searchPatientsByDoctor()
        // {
        //     let doctorId = jQuery('#doctors').val();
        //     $.ajax({
        //         url: "<?= route('filter.patients.by.doctor') ?>",
        //         type: 'get',
        //         data: {
        //             doctorId: doctorId,
        //             _token: '{{ csrf_token() }}'
        //         },
        //         success: function(response)
        //         {
        //             jQuery('#question_list').replaceWith(response.data);
        //             jQuery('#question_list').hide().delay(200).fadeIn();
        //         }
        //         error: function(xhr, status, error) {
        //             // Handle any errors
        //             console.error(error);
        //         }
        //     })
        // }


    </script>
    @endsection