@extends('layouts.admin.main')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-7 col-auto">
                        <h3 class="page-title">List of Doctors</h3>
                    </div>
                    <div class="col-sm-5 col">
                        <a href="{{ route('admin.add-doctor') }}" class="btn btn-primary float-end mt-2">Add doctor</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="col-md-3 float-right">
                                    <div class="top-nav-search mb-3">

                                        <div class="input-block dash-search-input">
                                            <input type="text" class="form-control" placeholder="Search" id="searchKey">
                                            <span class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>Doctor Name</th>
                                            <th>Speciality</th>
                                            <th>Member Since</th>
                                            <th>Earned</th>
                                            <th>Account Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @include('admin.doctor-profile.doctor-list')
                                </table>
                                <div class="mt-3 d-flex justify-content-end">
                                    {{ $doctors->links() }}
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
        $("#searchKey").keyup(function() {
            filter();
        });

        function filter(page_no = 1) {
            let searchKey = jQuery('#searchKey').val();
            let dateSearch = jQuery('#dateSearch').val();
            $.ajax({
                url: "<?= route('admin.searching.doctor') ?>?page=" + page_no,
                type: 'get',
                data: {
                    'searchKey': searchKey,
                    'page_no': page_no,
                    '_token': '{{ csrf_token() }}'
                },
                success: function(response) {
                    jQuery('#doctor-list').replaceWith(response.data);
                    jQuery('#doctor-list').hide().delay(200).fadeIn();
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
    </script>
@endsection
