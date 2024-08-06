@extends('layouts.patient.main')
@section('content')
    
                        <div class="dashboard-header">
                            <h3>Ratings</h3>
                        </div>
                        <div class="custom-table">
                            <div class="table-responsive">
                                <table class="table table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Doctor</th>
                                            <th>Title</th>
                                            <th>Rating</th>
                                            <th>Review</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($allReviewDetails as $key => $reviewDetails)
                                            <tr>
                                                <td>{{ $key + 1 }}.</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="{{ route('frontend.doctor.profile', $reviewDetails->doctor_id, $reviewDetails) }}"
                                                            class="avatar avatar-sm me-2">
                                                            <img class="avatar-img rounded-3"
                                                                src="{{ $reviewDetails->doctor->image_url }}"
                                                                alt="User Image">
                                                        </a>
                                                        <span
                                                            class="fs-6 text-dark">{{ $reviewDetails->doctor->display_name }}<br>
                                                            <a
                                                                href="{{ route('frontend.doctor.profile', $reviewDetails->doctor_id, $reviewDetails) }}">{{ $reviewDetails->doctor->email }}</a>
                                                            </h5>
                                                    </h2>
                                                </td>
                                                <td>{{ $reviewDetails->title }}</td>
                                                <td>
                                                    {!! getRatingHtml($reviewDetails->rating) !!}
                                                </td>
                                                <td>{{ $reviewDetails->review }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-denger">No Review Found</td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                                {{ $allReviewDetails->links() }}
                            </div>
                        </div>

   
@endsection
