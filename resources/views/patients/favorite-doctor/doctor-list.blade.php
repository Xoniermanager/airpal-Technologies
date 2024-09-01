
<div id="favorite-doctor-list">
<div class="row">
    @forelse ($favoriteDoctors as $favoriteDoctor)
        <div class="col-md-6 col-lg-4">
            <div class="profile-widget patient-favour">
                <div class="fav-head">
                    <label class="fav-checkbox-container fav-btn favourite-btn">
                        <input type="checkbox" 
                               onchange="removeFromFavorites({{ $favoriteDoctor->doctor_id }}, {{ $favoriteDoctor->patient_id }})"
                               {{ $favoriteDoctor->is_favorite ? 'checked' : '' }} />
                        <span class="checkbox-custom"><i class="fa-solid fa-heart"></i></span>
                    </label>
                    
                    <div class="doc-img">
                        <a href="doctor-profile.html">
                            <img class="img-fluid" src="{{ $favoriteDoctor->doctor->image_url ?? '' }}" alt="Img">
                        </a>
                    </div>
                    <div class="pro-content">
                        <h3 class="title">
                            <a href="doctor-profile.html">Dr. {{ $favoriteDoctor->doctor->fullName }}</a>
                            <i class="fas fa-check-circle verified"></i>
                        </h3>
                        <p class="speciality">
                            @isset($favoriteDoctor->doctor)
                                @forelse ($favoriteDoctor->doctor->specializations as $specialization)
                                    <span class="badge badge-info text-white">{{ $specialization->name }}</span>
                                @empty
                                    <p>N/A</p>
                                @endforelse
                            @endisset
                        </p>
                        <p class="speciality">
                            @isset($favoriteDoctor->doctor)
                                @forelse ($favoriteDoctor->doctor->educations as $education)
                                    <b>{{ $education->course->name }}</b>
                                    @if (!$loop->last)
                                        ,
                                    @endif
                                @empty
                                    <p>N/A</p>
                                @endforelse
                            </p>
                        @endisset
                        <div class="rating">
                            {!! getRatingHtml($favoriteDoctor->doctor->allover_rating) !!}
                        </div>
                        <ul class="available-info">
                            <li>
                                <span><i class="fas fa-map-marker-alt"></i></span>Location :
                                {{ $favoriteDoctor->doctor->fullAddress ?? '' }}
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="fav-footer">
                    <div class="row row-sm">
                        <div class="col-6">
                            <a href="{{ route('frontend.doctor.profile', ['user' => $favoriteDoctor->doctor->id]) }}"
                                class="btn view-btn">View Details</a>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('appointment.index', ['id' => $favoriteDoctor->doctor->id]) }}"
                                class="btn book-btn">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
            <div>
                <p>Not found</p>
            </div>
        @endforelse
</div>
</div>


<style>
    .fav-checkbox-container {
    display: inline-block;
    position: relative;
    cursor: pointer;
}

.checkbox-custom {
    display: flex;
    align-items: center;
    font-size: 1.5em; /* Adjust size as needed */
    color: #f00; /* Color for the heart icon */
}

.checkbox-custom i {
    /* Add any additional styles for the icon */
}

input[type="checkbox"] {
    display: none; /* Hide the default checkbox */
}

    </style>