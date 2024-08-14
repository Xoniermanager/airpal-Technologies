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
                                <div class="table-responsive">
                                    <table class="table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>Patient Name</th>
                                                <th>Doctor Name</th>
                                                <th>Ratings</th>
                                                <th>Description</th>
                                                <th>Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($allDoctorsReviewDetails as  $reviews)
                                            
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="{{ $reviews->patient->image_url ?? ''}}"
                                                                alt=""></a>
                                                        <a href="">{{ $reviews->patient->fullName}} </a>
                                                    </h2>
                                                </td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar avatar-sm me-2">
                                                     
                                                            <img
                                                                class="avatar-img rounded-circle"
                                                                src="{{ $reviews->doctor->image_url ?? ''}}"
                                                                alt=""></a>
                                                        <a href="">Dr. {{ $reviews->doctor->display_name }} </a>
                                                    </h2>
                                                </td>
                                                <td>
                                                    {{-- {!! getRatingHtml($reviews) !!} --}}
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star-o text-secondary"></i>
                                                </td>
                                                <td>
                                                    {{ $reviews->review }}
                                                </td>
                                                <td>{{ date('j M Y', strtotime($reviews->created_at)) ?? '' }}</td>
                                                <td>
                                                    <div class="actions">
                                                        <a class="btn btn-sm bg-danger-light" data-bs-toggle="modal"
                                                            href="#delete_modal">
                                                            <i class="fe fe-trash"></i> Delete
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>  
                                            @empty
                                                
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


        <div class="modal fade" id="delete_modal" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-content p-2">
                            <h4 class="modal-title">Delete</h4>
                            <p class="mb-4">Are you sure want to delete?</p>
                            <button type="button" class="btn btn-primary">Save </button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @endsection