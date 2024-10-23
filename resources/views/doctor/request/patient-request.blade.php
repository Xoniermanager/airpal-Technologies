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
        icon: "question",  // Ensure it's a valid icon
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, proceed!",
        cancelButtonText: "Cancel",  // Explicitly add cancel text
    }).then((result) => {
        console.log('Swal result:', result);  // Log the result object for debugging
        if (result.value) {  // Check for result.value instead of result.isConfirmed
            console.log('Confirmed, sending request...'); // Log that we are proceeding

            $.ajax({
                url: "{{ route('doctor.status.appointment') }}", // Adjust this URL to your route
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    booking_id: requestId,
                    status: status
                },
                success: function(response) {
                    console.log('Request successful:', response);  // Log the response
                    $('#appointment-request-list').replaceWith(response.data);  // Update list
                    $('#appointmentRequestCounter').text(response.requestCounter);  // Update counter
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
                    console.error('Request failed:', error);  // Log the error
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An error occurred while updating the appointment status.',
                    });
                }
            });
        } else {
            console.log('Action canceled or modal dismissed');  // Handle dismiss case
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
