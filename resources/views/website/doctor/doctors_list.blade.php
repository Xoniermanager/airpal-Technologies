                        <div id="doctors_list">
                            @forelse ($doctors as $doctor)
                                <div class="card doctor-card">
                                    <div class="card-body">
                                        <div class="doctor-widget-one">
                                            <div class="doc-info-left">
                                                <div class="doctor-img">
                                                    <a
                                                        href="{{ route('frontend.doctor.profile', ['user' => $doctor->id]) }}">
                                                        <img src="{{ $doctor['image_url'] }}"
                                                            onerror="this.src='{{ asset('assets/img/doctors/doctor-thumb-01.jpg') }}';"
                                                            class="img-fluid" alt="John Doe">
                                                    </a>
                                                    <div class="favourite-btn">
                                                        <input type="checkbox" id="heart" 
                                                               onclick="toggleFavorite({{ $doctor->id }}, {{ auth()->user()->id }}, this)"
                                                               @if(in_array($doctor->id, $favoriteDoctorsList)) checked @endif>
                                                               <label for="heart">
                                                                
                                                            </label>
                                                    </div>
                                                    
                                                    
                                                </div>
                                                <div class="doc-info-cont">
                                                    <h4 class="doc-name">
                                                        <a
                                                            href="{{ route('frontend.doctor.profile', ['user' => $doctor->id]) }}">{{ $doctor->first_name }}</a>
                                                        <i class="fas fa-circle-check"></i>
                                                    </h4>
                                                    <span class="doc-speciality">
                                                       ( @forelse ($doctor->educations as $education)
                                                            {{ $education->course->name }}
                                                            @if (!$loop->last)
                                                                ,
                                                            @endif
                                                        @empty
                                                            <p>N/A</p>
                                                        @endforelse
                                                       )
                                                    </span>
                                                    <div>
                                                        @isset($doctor)
                                                            @forelse ($doctor->specializations as $specialization)
                                                                <span
                                                                    class="badge badge-info text-white">{{ $specialization->name }}</span>

                                                            @empty
                                                                <p>N/A</p>
                                                            @endforelse
                                                        @endisset
                                                    </div>
                                                    <div class="clinic-details">
                                                        <p class="doc-location">
                                                            @php
                                                                $address = $doctor->doctorAddress->address ?? '';
                                                                $city = $doctor->doctorAddress->city ?? '';
                                                                $fullAddress = $address . ' ' . $city . ' india';
                                                                $encodedAddress = str_replace(' ', '+', $fullAddress);
                                                            @endphp

                                                            @if (isset($doctor->doctorAddress))
                                                                <p>
                                                                    <i class="feather-map-pin"></i> <span>0.9</span> mi
                                                                    - {{ $doctor->doctorAddress->city ?? '' }}
                                                                    {{ ',' . $doctor->doctorAddress->states->country->name ?? '' }}
                                                                    <a href="https://www.google.com/maps?q={{ $encodedAddress }}"
                                                                        target="_blank" style="color: blue">Get
                                                                        Directions
                                                                    </a>

                                                                </p>
                                                            @else
                                                                <p class="doc-location"><i
                                                                        class="fas fa-map-marker-alt"></i> - <a
                                                                        href="javascript:void(0);">Get Directions</a>
                                                                </p>
                                                            @endif
                                                        </p>
                                                        <p class="doc-location">
                                                            <i class="feather-award"></i>
                                                            <span>{{ $doctor->experience_years == 0 || $doctor->experience_years == null ? 'Experience Not Added' : $doctor->experience_years . ' Years of Experience' }}</span>
                                                        </p>
                                                        <p class="doc-location">
                                                            <i class="feather-phone"></i>
                                                            <span>{{ $doctor->phone ?? 'Not available' }}</span>
                                                          </p>
                                                          <p class="doc-location">
                                                            <i class="feather-mail"></i>
                                                            <span>{{ $doctor->email ?? 'Not available' }}</span>
                                                          </p>

                                                   
                                                    </div>
                                                    <div class="reviews-ratings">
                                                        {!! getRatingHtml($doctor->allover_rating) !!}
                                                        ({{ count($doctor->doctorReview) }} Reviews)
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="doc-info-right">
                                                <div class="clinic-booking book-appoint">
                                                    <a class="btn btn-primary"
                                                        href="{{ route('appointment.index', ['id' => $doctor->id]) }}">Book
                                                        Appointment</a>
                                                    <a class="btn btn-primary-light" href="#">Book Online
                                                        Consultation</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                    <div>
                                        <p>No Doctor Found</p>
                                    </div>
                                @endforelse
                            </div>

 <style>

.favourite-btn {
    display: flex;
	justify-content: center;
	align-items: center;
	/* height: 100vh; */
}

/*      CHECKBOX         */

input[type="checkbox"] {
    display: none;
}


input[type="checkbox"] + label {
    position: relative;
    padding-left: 35px;
    display: inline-block;
    font-size: 20px;
}
 
input[type="checkbox"] + label:before {
    content: "\1F90D"; /* Unicode for black heart emoji */
    color: white;    
    font-size: 16px;  
    margin-right: 5px; 
    top: -11px;
    left: -8px;
    border: 1px solid transparent;    
    padding: 10px;
    border-radius: 3px;
    display: block;
    position: absolute;
	transition:  .5s ease;
}
 
input[type="checkbox"]:checked + label:before {
    border: 1px solid transparent;
    background-color: transparent;
}
 
input[type="checkbox"]:checked + label:after {
    content: '\2764';
    font-size: 20px;
    line-height: 1;
    position: absolute;
    top: 1px;
    left: 2px;
    color: red;
    transform: scaleY(1.4) scaleX(.9);
    transition: .5s ease;
}

/*                       */
 </style>         