                        
       <div id="doctors_list">
              

        @forelse ($doctors as $doctor)
        <div class="card doctor-card">
            <div class="card-body">
                <div class="doctor-widget-one">
                    <div class="doc-info-left">
                        <div class="doctor-img">
                            <a href="{{ route('frontend.doctor.profile',['user' => $doctor->id]) }}">
                                <img src="{{asset('images/'.$doctor->image_url)}}"
                                onerror="this.src='{{asset('assets/img/doctors/doctor-thumb-01.jpg')}}';" 
                                    class="img-fluid" alt="John Doe">
                            </a>
                            <div class="favourite-btn">
                                <a href="javascript:void(0)" class="favourite-icon">
                                    <i class="fas fa-heart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="doc-info-cont">
                            <h4 class="doc-name">
                                <a href="{{ route('frontend.doctor.profile',['user' => $doctor->id]) }}">{{$doctor->first_name}}</a>
                                <i class="fas fa-circle-check"></i>
                            </h4>
        
                            <p class="doc-speciality">MBBS, Dentist</p>
                            {{-- <p class="doc-speciality">{{$course}}</p> --}}
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
                                            <i class="feather-map-pin"></i> <span>0.9</span> mi - {{$doctor->doctorAddress->city ?? ''}}  {{','. $doctor->doctorAddress->states->country->name ??'' }}
                                            <a href="https://www.google.com/maps?q={{ $encodedAddress }}" target="_blank" style="color: blue">Get Directions
                                        </a>

                                    </p>  
                                    @else
                                    <p class="doc-location"><i class="fas fa-map-marker-alt"></i> - <a href="javascript:void(0);">Get Directions</a></p>
                                    @endif

                                    {{-- <i class="feather-map-pin"></i>
                                    <span>0.9</span> mi - Newyork, USA <a
                                        href="javascript:void(0);">Get Direction</a> --}}
                                </p>
                                <p class="doc-location">
                                    <i class="feather-award"></i> <span>{{($doctor->experience_years == 0 || $doctor->experience_years == Null)?'Experience Not Added':$doctor->experience_years.' Years of Experience'}}</span>
                                </p>
                            </div>
                            <div class="reviews-ratings">
                                <p>
                                    <span><i class="fas fa-star"></i> 4.5</span> (35 Reviews)
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="doc-info-right">
                        <div class="clini-infos">
                            <ul>
                                <li>
                                    <i class="feather-clock available-icon"></i>
                                    <span class="available-date available-today">Available Today</span>
                                </li>
                                <li><i class="feather-thumbs-up available-icon"></i> 98% <span
                                        class="votes">(252 Votes)</span></li>
                                <li><i class="feather-dollar-sign available-icon"></i> $1500 <i
                                        class="feather-info available-info-icon"></i></li>
                            </ul>
                        </div>
                        <div class="clinic-booking book-appoint">
                            <a class="btn btn-primary" href="{{ route('appointment.index',['id' => $doctor->id]) }}">Book
                                Appointment</a>
                            <a class="btn btn-primary-light"
                                href="#">Book Online Consultation</a>
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