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
                <input type="text" class="form-control" placeholder="Search">
                <span class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
            </div>
            <div>
                <a href="{{ route('patient.medical-records.add') }}" class="btn btn-primary prime-btn">Add Medical
                    Record</a>
            </div>
        </div>
        <div class="custom-table">
            <div class="table-responsive">
                <table class="table table-center mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($allMedicalRecord as $key => $medicalRecord)
                            <tr class="data-medical-record-id-{{ $medicalRecord->id }}">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $medicalRecord->name }}</td>
                                <td>{{ $medicalRecord->date }}</td>
                                <td>{!! Str::limit($medicalRecord->description, 20, ' ...') !!}</td>
                                <td>
                                    <div class="action-item">
                                        <a href="{{ route('patient.medical-records.edit', $medicalRecord->id) }}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a href="{{ $medicalRecord->file }}" download>
                                            <i class="fa-solid fa-download"></i>
                                        </a>
                                        <a href="#" onclick="delete_medical_record({{ $medicalRecord->id }})">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-denger">No Medical Record</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="pagination dashboard-pagination">
            <ul>
                {{ $allMedicalRecord->links() }}
            </ul>
        </div>
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
    </script>
@endsection
