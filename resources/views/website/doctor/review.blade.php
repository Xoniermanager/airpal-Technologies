<ul class="comments-list" id="review_list">
    @forelse ($allReviewDetails as $key => $reviewDetails)
        <li>
            <div class="comment">
                <img class="avatar avatar-sm rounded-circle" alt=""
                    src="{{ $reviewDetails->patient->image_url ?? URL::asset('assets/img/patients/patient.jpg') }}">
                <div class="col-md-11 comment-body">
                    <div class="meta-data">
                        <span class="comment-author">{{ $reviewDetails->patient->first_name }}</span>
                        {{-- <span class="comment-date">Reviewed 2 Days ago</span> --}}
                        <div class="review-count rating">
                            {!! getRatingHtml($reviewDetails->rating) !!}
                        </div>
                    </div>
                    <p class="recommended">{{ $reviewDetails->title }}</p>
                    <p class="comment-content">
                        {{ $reviewDetails->review }}
                        @if (isset(Auth()->user()->id) && Auth()->user()->id == $reviewDetails->patient_id)
                        @php
                            $ratingButton = true;
                        @endphp
                            <a class="" href="#" data-bs-toggle="modal" data-bs-target="#add_rating"
                                onclick="getReviewDetailsByPatientId('{{ $reviewDetails->id }}','{{ $reviewDetails->rating }}','{{ $reviewDetails->title }}','{{ $reviewDetails->review }}')">
                                <i class="fa fa-edit btn btn-primary btn-sm"></i>
                            </a>
                        @endif
                    </p>
                </div>
            </div>
        </li>
    @empty
    @endforelse
</ul>
