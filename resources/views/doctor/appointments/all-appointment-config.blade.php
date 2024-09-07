@extends('layouts.doctor.main')
@section('content')
    <div class="dashboard-header">
        <h3>Appointment</h3>
    </div>
    @include('doctor.appointments.all-appointment-html')
    <script>
        function deleteFunction(id) {
            $.ajax({
            url: "/doctor/delete-appointment-config/"+id,
            type: 'get',
            data: {
                current_id: jQuery('#current_id').text().trim(),
            },
            success: function(response) {
                if(response.status == true)
                {
                    jQuery('#config_list').replaceWith(response.data);
                }
                else
                {
                    console.log(response.message);
                }
            },
            error: function(xhr, status, error) {
                // Handle any errors
                console.error(error);
            }
        });
            // event.preventDefault();
            // Swal.fire({
            //     title: "Are you sure?",
            //     text: "You won't be able to revert this!",
            //     icon: "warning",
            //     showCancelButton: true,
            //     confirmButtonColor: "#3085d6",
            //     cancelButtonColor: "#d33",
            //     confirmButtonText: "Yes, delete it!"
            // }).then((result) => {
            //     if (result.isConfirmed) {
            //         Swal.fire({
            //             title: "Deleted!",
            //             text: "Your file has been deleted.",
            //             icon: "success"
            //         });
            //     }
            // });
        }
    </script>
@endsection
