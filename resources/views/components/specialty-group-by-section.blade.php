<section class="specialities-section">
    <div class="shapes">
        <img src="{{ URL::asset('assets/img/shapes/shape-3.png') }}" alt="shape-image" class="img-fluid shape-3">
        <img src="{{ URL::asset('assets/img/shapes/shape-4.png') }}" alt="shape-image" class="img-fluid shape-4">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 aos aos-init aos-animate">
                <div class="section-heading bg-area">
                    <h2>Browse by Specialities</h2>
                    <p>Find experienced doctors across all specialties</p>
                </div>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('specialty.list') }}" class="btn btn-primary prime-btn">Show More</a>
            </div>
        </div>
        <div class="row">

            @foreach ($specialties as $speciality)
                <div class="col-xl-3 col-lg-4 col-md-6 aos aos-init aos-animate">
                    <a href="{{ route('specialty.detail', ['id' => $speciality->id]) }}" >
                        <div class="specialist-card d-flex">
                            <div class="specialist-img">
                                <img src="{{ $speciality->image_url }}" alt="kidney-image"
                                    style="border-radius: 22px; height: 35px; width: 39px;" class="img-fluid">
                            </div>
                            <div class="specialist-info">
                                
                                    <h4>{{ $speciality->name ?? '' }}</h4>
                            <p>({{ $speciality->doctor()->where('profile_status', '>=', site('profile_status'))->count() }}) Doctors</p>
                            </div>
                            <div class="specialist-nav ms-auto">
                                <i
                                        class="fas fa-long-arrow-alt-right"></i>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
