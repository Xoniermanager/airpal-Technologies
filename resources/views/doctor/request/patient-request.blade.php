<!DOCTYPE html>
<html lang="zxx">

<head>
@include('include.head')
</head>

<body>
    <div class="main-wrapper">
    @include('doctor.include.header')
        <div class="breadcrumb-bar-two">
            <div class="container">
                <div class="row align-items-center inner-banner">
                    <div class="col-md-12 col-12 text-center">
                        <h2 class="breadcrumb-title">Requests</h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('doctor.doctor-dashboard.index') }}">Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Requests</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>


        <div class="content doctor-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-xl-3 theiaStickySidebar">
                    @include('doctor.include.sidebar')
                    </div>
                    <div class="col-lg-8 col-xl-9">
                        <div class="dashboard-header">
                            <h3>Appointment Requests</h3>
                        </div>
                        @include('doctor.request.list')
                    </div>
                </div>
            </div>
        </div>
 

    </div>

    @include('include.footer')


<!-- Include jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                    patientId: requestId,
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


