@extends('layouts.admin.main')
@section('content')
    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-7 col-auto">
                            <h3 class="page-title">Testimonials</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">testimonials</li>
                            </ul>
                        </div>
                        <div class="col-sm-5 col">
                            <a href="{{route('admin.show.testimonial.form')}}"  class="btn btn-primary float-end mt-2">Add</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                @include('admin.generals.testimonials.testimonial_list')
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
    // Bind the click event to delete buttons
    $(document).on('click', '.delete-btn', function(e) {
        e.preventDefault();

        // Get the URL from the button's data attribute
        var deleteUrl = $(this).data('url');
        var form = $(this).closest('form');

        // Show SweetAlert confirmation dialog
        swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Proceed with AJAX delete request
                var formData = new FormData(form[0]);
                $.ajax({
                    url: deleteUrl,
                    type: 'GET',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success === true) {
                            swal.fire('Deleted!', response.message, 'success').then(() => {
                                // Redirect to the testimonials index page or reload
                                window.location.href = "{{ route('admin.testimonial.index') }}";
                            });
                        } else {
                            swal.fire('Error!', response.message, 'error');
                        }
                    },
                    error: function(xhr) {
                        try {
                            let errors = JSON.parse(xhr.responseText).errors;
                            let random_number = Math.floor((Math.random() * 100) + 1);
                            for (var error_key in errors) {
                                var random_id = error_key + '_' + random_number;
                                jQuery('.' + error_key + '_error').remove();
                                jQuery(document).find('#deleteTestimonial [name=' + error_key + ']')
                                    .after('<span id="' + random_id + '_error" class="text text-danger ' + error_key + '_error">' + errors[error_key] + '</span>');
                                remove_error_div(random_id);
                            }
                        } catch (e) {
                            console.log("Error parsing response:", e);
                        }
                    }
                });
            }
        });
    });
});

  </script>

@endsection
