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
                        <h2 class="breadcrumb-title">Reviews</h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('doctor.doctor-dashboard.index') }}">Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Reviews</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>


        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-xl-3 theiaStickySidebar">

                        @include('doctor.include.sidebar')

                    </div>
                    <div class="col-lg-8 col-xl-9">
                        <div class="doc-review">
                            <div class="dashboard-header">
                                <div class="header-back">
                                    <h3>Reviews</h3>
                                </div>
                            </div>

                            <ul class="comments-list">
                                <li class="over-all-review">
                                    <div class="review-content">
                                        <div class="review-rate">
                                            <h5>Overall Rating</h5>
                                            {{-- <div class="star-rated">
                                            </div> --}}

                                            <div class="reviews-ratings">
                                                {!! getRatingHtml($allOverrating) !!}
                                                ({{ count($doctorReviewDetails) }} Reviews)
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @forelse ($doctorReviewDetails as $reviewDetails)
                                    <li>
                                        <div class="comments">
                                            <div class="comment-head">
                                                <div class="patinet-information">
                                                    <a href="javascript:void(0);">
                                                        <img src="{{ $reviewDetails->patient->image_url }}"
                                                            alt="">
                                                    </a>
                                                    <div class="patient-info">
                                                        <h6><a
                                                                href="javascript:void(0);">{{ $reviewDetails->patient->first_name }}</a>
                                                        </h6>
                                                        <span>{{ date('Y-M-d', strtotime($reviewDetails->created_at)) }}</span>
                                                    </div>
                                                </div>
                                                <div class="star-rated">
                                                    {!! getRatingHtml($reviewDetails->rating) !!}
                                                </div>
                                            </div>
                                            <div class="review-info">
                                                <h4 class="text-success">{{ $reviewDetails->title }}</h4>
                                                <p> {{ $reviewDetails->review }}
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                    <li>
                                        <div>No Review Available</div>
                                    </li>
                                @endforelse
                            </ul>
                            <div class="pagination dashboard-pagination">
                                <ul>
                                    {{ $doctorReviewDetails->links() }}
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('include.footer')
