@extends('layouts.doctor.main')
@section('content')
    <div class="dashboard-header">
        <h3>Appointment Requests</h3>
    </div>
    @include('doctor.request.list')
@endsection

@section('javascript')
    <script>
        function updateAppointment(status, requestId) {
            Swal.fire({
                title: "Are you sure?",
                // text: "You won't be able to revert this!",
                icon: "done",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, proceed!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('doctor.status.appointment') }}", // Adjust this URL to your route
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            booking_id: requestId,
                            status: status
                        },
                        success: function(response) {
                            console.log(response.data);
                            $('#appointment-request-list').replaceWith(response.data);
                            $('#appointmentRequestCounter').text(response.requestCounter);
                            jQuery('#appointment-request-list').hide().delay(200).fadeIn();

                            if (status === 'canceled') {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Appointment Canceled',
                                    text: response.message,
                                });
                            } else {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Done!',
                                    text: response.message,
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
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

        $(document).ready(function() {
            $('.dropdown-item').on('click', function() {
                var filterKey = $(this).data('filter');
                $.ajax({
                    url: "<?= route('filter.appointment.request') ?>",
                    method: 'get',
                    data: {
                        _token: '{{ csrf_token() }}',
                        filterKey: filterKey
                    },
                    success: function(response) {
                        $('#appointment-request-list').html(response.data);
                        $('#appointment-request-list').hide().fadeIn();
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'An error occurred while filtering the appointments.',
                        });
                    }
                });
            });
        });
    </script>
@endsection
