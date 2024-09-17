
<section class="work-section pb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-head-fourteen text-center">
                    <h2>Our <span>Team</span></h2>
                </div>
            </div>
        </div>
        <div class="row">

            @forelse ($ourTeams as $ourTeam )
          

        <div class="col-md-6 col-sm-12 col-lg-3">
                <div class="listing-card">
                    <div class="listing-img">
                        <img src="{{ $ourTeam->image ?? '' }}" class="img-fluid" alt="surgery-image" width="50px">

                    </div>
                    <div class="listing-content">
                        <div class="listing-details">
                            <div class="listing-title">
                                <h3>
                                    {{ $ourTeam->name ?? '' }}
                                </h3>
                            </div>
                            <div class="listing-profile-details">
                                <p> {{ $ourTeam->designation ?? '' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                
            @endforelse





        </div>
    </div>
</section>