@extends('layouts.admin.main')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Reviews</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Reviews</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            @include('admin.reviews.reviews-list')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

<script>
    function review_delete(id) {
        if (id != '') {
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
                        type: 'post',
                        data: {
                            id:id,
                            '_token': '{{ csrf_token() }}'
                        },
                        url: "{{ route('admin.delete.review') }}",
                        success: function(response) {
                            jQuery('#delete-review').modal('hide');
                            swal.fire("Done!", response.message, "success");
                            jQuery('#review_list').replaceWith(response.data);
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            Swal.fire("Error deleting!", "Please try again", "error");
                        }
                    });
                    
                }
            });
        }
    }
</script>
