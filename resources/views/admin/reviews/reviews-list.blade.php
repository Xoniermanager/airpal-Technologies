<div class="table-responsive" id="review_list">
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
                                    src="{{ $reviews->patient->image_url ?? '' }}"
                                    alt=""></a>
                            <a href="">{{ $reviews->patient->fullName }} </a>
                        </h2>
                    </td>
                    <td>
                        <h2 class="table-avatar">
                            <a href="" class="avatar avatar-sm me-2">

                                <img class="avatar-img rounded-circle"
                                    src="{{ $reviews->doctor->image_url ?? '' }}"
                                    alt=""></a>
                            <a href="">{{ $reviews->doctor->display_name }} </a>
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
                    <td class="white-space-normal">
                        {{ $reviews->review }}
                    </td>
                    <td>{{ date('j M Y', strtotime($reviews->created_at)) ?? '' }}</td>
                    <td>
                        <div class="actions">
                            <a class="btn btn-sm bg-danger-light" data-id={{ $reviews->id }}
                                data-bs-toggle="modal" href="#delete_modal"
                                onclick="review_delete('{{ $reviews->id }}')">
                                <i class="fe fe-trash"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
    <div class="mt-3 d-flex justify-content-end">
        {{ $allDoctorsReviewDetails->links() }}
    </div>
</div>