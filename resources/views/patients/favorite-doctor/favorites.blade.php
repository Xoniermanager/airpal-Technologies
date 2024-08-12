@extends('layouts.patient.main')
@section('content')
    <div class="dashboard-header">
        <h3>Favourites</h3>
        <ul class="header-list-btns">
            <li>
                <div class="input-block dash-search-input">
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
                </div>
            </li>
        </ul>
    </div>

    @include('patients.favorite-doctor.doctor-list')
    @endsection

    @section('javascript')
        <script>
            function removeFromFavorites(doctorId, patientId) {
                Swal.fire({
                    title: "Are you sure want to remove from favorites list ?",
                    text: "You won't be able to revert this!",
                    icon: "done",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, proceed!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('remove.doctor.favorite.list') }}", // Adjust this URL to your route
                            method: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                patient_id: patientId,
                                doctor_id: doctorId
                            },
                            success: function(response) {
                                console.log(response.data);
                                $('#favorite-doctor-list').replaceWith(response.data);
                                jQuery('#favorite-doctor-list').hide().delay(200).fadeIn();
                            },
                            error: function(xhr, status, error) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'An error occurred while updating the appointment status.',
                                });
                            }
                        });
                    }
                });
            }
        </script>
    @endsection
