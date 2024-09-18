@extends('layouts.frontend.main')
@section('content')
<div class="breadcrumb-bar-two">
    <div class="container">
        <div class="row align-items-center inner-banner">
            <div class="col-md-12 col-12 text-center">
                <h2 class="breadcrumb-title">Search Doctors</h2>
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page">Search Doctors</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="loaderonload">
    <div class="loaderbox1"></div>
    <div class="loaderbox">
        <img src="{{ asset('assets/img/loader-rolling.gif') }}" class="search-loader">
    </div>
</div>
<div class="doctor-content content">
    <div class="container">

        <div class="row">
            <div class="col-xl-12 col-lg-12 map-view">
                <div class="row">
                    <div class="col-lg-3  theiaStickySidebar">
                        <div class="filter-contents">
                            <div class="filter-header">
                                <h4 class="filter-title">Filter</h4>
                            </div>
                            <div class="filter-details">

                                <div class="filter-grid">
                                    <h4>
                                        <a href="#collapseone" data-bs-toggle="collapse">Gender</a>
                                    </h4>
                                    <div id="collapseone" class="collapse show">
                                        <div class="filter-collapse">
                                            <ul>
                                                <li>
                                                    <label class="custom_check d-inline-flex">
                                                        <input type="checkbox" name="gender" value="male"
                                                            id="male">
                                                        <span class="checkmark"></span>
                                                        Male Gender
                                                    </label>
                                                </li>
                                                <li>
                                                    <label class="custom_check d-inline-flex">
                                                        <input type="checkbox" name="gender" value="female"
                                                            id="female">
                                                        <span class="checkmark"></span>
                                                        Female Gender
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="filter-grid">
                                    <h4>
                                        <a href="#collapsefour" data-bs-toggle="collapse">Speciality</a>
                                    </h4>
                                    <div id="collapsefour" class="collapse show">
                                        <div class="filter-collapse">
                                            <ul>
                                                @forelse ($specialties as $specialty)
                                                <li>
                                                    <label class="custom_check d-inline-flex">
                                                        <input type="checkbox" name="speciality"
                                                            value="{{ $specialty->id }}">
                                                        <span class="checkmark"></span>
                                                        {{ $specialty->name }}
                                                    </label>
                                                </li>
                                                @empty
                                                <li>
                                                    <label class="custom_check d-inline-flex">
                                                        Specialty Not Found
                                                    </label>
                                                </li>
                                                @endforelse

                                            </ul>
                                        </div>
                                    </div>
                                </div>


                                <div class="filter-grid">
                                    <h4>
                                        <a href="" data-bs-toggle="collapse">Services</a>
                                    </h4>
                                    <div id="" class="collapse show">
                                        <div class="filter-collapse">
                                            <ul>
                                                @forelse ($services as $service)
                                                <li>
                                                    <label class="custom_check d-inline-flex">
                                                        <input type="checkbox" name="services"
                                                            value="{{ $service->id }}">
                                                        <span class="checkmark"></span>
                                                        {{ $service->name }}
                                                    </label>
                                                </li>
                                                @empty
                                                <li>
                                                    <label class="custom_check d-inline-flex">
                                                        Service Not Found
                                                    </label>
                                                </li>
                                                @endforelse

                                            </ul>
                                        </div>
                                    </div>
                                </div>


                                <div class="filter-grid">
                                    <h4>
                                        <a href="#collapsefive" data-bs-toggle="collapse">Experience</a>
                                    </h4>
                                    <div id="collapsefive" class=" collapse show">
                                        <div class="filter-collapse">
                                            <ul>
                                                <li>
                                                    <label class="custom_check d-inline-flex">
                                                        <input type="checkbox" name="experience" value="1-5">
                                                        <span class="checkmark"></span>
                                                        1-5 Years
                                                    </label>
                                                </li>
                                                <li>
                                                    <label class="custom_check d-inline-flex">
                                                        <input type="checkbox" name="experience" value="5-10">
                                                        <span class="checkmark"></span>
                                                        5-10 Years
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>


                                <div class="filter-grid">
                                    <h4>
                                        <a href="#collapseseven" data-bs-toggle="collapse">By Rating</a>
                                    </h4>
                                    <div id="collapseseven" class="collapse show">
                                        <div class="filter-collapse">
                                            <ul>
                                                @foreach ($ratingsWithCounter as $rating => $totalDoctor)
                                                @if ($totalDoctor > 0)
                                                <li>
                                                    <label
                                                        class="custom_check rating_custom_check d-inline-flex">
                                                        <input type="checkbox" name="rating_count"
                                                            value="{{ $rating }}">
                                                        <span class="checkmark"></span>
                                                        <div class="rating">
                                                            {!! getRatingHtml($rating) !!}
                                                            <span
                                                                class="rating-count">({{ $totalDoctor }})</span>
                                                        </div>
                                                    </label>
                                                </li>
                                                @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>


                                {{-- <div class="filter-grid">
                                        <h4>
                                            <a href="#collapsesix" data-bs-toggle="collapse">Online Consultation</a>
                                        </h4>
                                        <div id="collapsesix" class="collapse ">
                                            <div class="filter-collapse">
                                                <ul>
                                                    <li>
                                                        <label class="custom_check d-inline-flex">
                                                            <input type="checkbox" name="online">
                                                            <span class="checkmark"></span>
                                                            <i class="feather-video online-icon"></i> Video Call
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="custom_check d-inline-flex">
                                                            <input type="checkbox" name="online">
                                                            <span class="checkmark"></span>
                                                            <i class="feather-mic online-icon"></i> Audio Call
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="custom_check d-inline-flex">
                                                            <input type="checkbox" name="online">
                                                            <span class="checkmark"></span>
                                                            <i class="feather-message-square online-icon"></i> Chat
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="custom_check d-inline-flex">
                                                            <input type="checkbox" name="online">
                                                            <span class="checkmark"></span>
                                                            <i class="feather-users online-icon"></i> Instant Consulting
                                                        </label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div> --}}


                                <div class="filter-grid">
                                    <h4>
                                        <a href="#collapseeight" data-bs-toggle="collapse">Languages</a>
                                    </h4>
                                    <div id="collapseeight" class="collapse show">
                                        <div class="filter-collapse">
                                            <ul>

                                                @forelse ($languages as $language)
                                                <li>
                                                    <label class="custom_check d-inline-flex">
                                                        <input type="checkbox" name="langauges"
                                                            value="{{ $language->id }}">
                                                        <span class="checkmark"></span>
                                                        {{ $language->name }}
                                                    </label>
                                                </li>
                                                @empty
                                                <li>Languages Not Avaiable</li>
                                                @endforelse
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                {{--
                                    <div class="filter-btn apply-btn">
                                        <div class="row">
                                            <div class="col-6">
                                                <a href="javascript:void(0);" class="btn btn-primary">Apply</a>
                                            </div>
                                            <div class="col-6">
                                                <a href="javascript:void(0);" class="btn btn-outline-primary">Reset</a>
                                            </div>
                                        </div>
                                    </div> --}}

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="doctor-filter-info">
                            <div class="doctor-filter-inner">
                                <div>
                                    <div class="doctors-found">
                                        <p><span class="found-doctors-count">{{ $doctors->count() }}</span> Doctors found</p>
                                    </div>
                                </div>
                                <div class="doctor-filter-option">
                                  
                                    <div class="doctor-filter-sort">
                                        <ul class="nav">
                                            <li>
                                                <a href="#">
                                                    <i class="feather-grid"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="active">
                                                    <i class="feather-list"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('website.doctor.doctors_list')
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-12 theiaStickySidebar map-right">
                <div id="map" class="map-listing"></div>
            </div>
        </div>

    </div>
</div>
@endsection
@section('javascript')
<script>
    $('.loaderonload').hide();
    $('input[name="gender"], input[name="langauges"], input[name="experience"] ,input[name="speciality"],input[name="services"],input[name="rating_count"]')
        .on('change', function(event) {
            event.preventDefault();
            search_doctors();
        });

    function search_doctors(page_no = 1) {
        genderCheckedValue = [];
        languagesCheckedValue = [];
        experienceCheckedValue = [];
        specialityCheckedValue = [];
        servicesCheckedValue = [];
        ratingCheckedValue = [];

        $('input[name="gender"]:checkbox').each(function() {
            if ($(this).is(':checked')) {
                genderCheckedValue.push($(this).val());

            }
        });
        $('input[name="langauges"]:checkbox').each(function() {
            if ($(this).is(':checked')) {
                languagesCheckedValue.push($(this).val());

            }
        });
        $('input[name="experience"]:checkbox').each(function() {
            if ($(this).is(':checked')) {
                experienceCheckedValue.push($(this).val());

            }
        });
        $('input[name="speciality"]:checkbox').each(function() {
            if ($(this).is(':checked')) {
                specialityCheckedValue.push($(this).val());

            }
        });

        $('input[name="services"]:checkbox').each(function() {
            if ($(this).is(':checked')) {
                servicesCheckedValue.push($(this).val());

            }
        });
        $('input[name="rating_count"]:checkbox').each(function() {
            if ($(this).is(':checked')) {
                ratingCheckedValue.push($(this).val());

            }
        });

        $.ajax({
            url: "{{ route('doctors.search') }}",
            type: 'get',
            data: {
                'gender': genderCheckedValue,
                'languages': languagesCheckedValue,
                'experience': experienceCheckedValue,
                'specialty': specialityCheckedValue,
                'services': servicesCheckedValue,
                'rating': ratingCheckedValue,
                'page': page_no
            },
            // beforeSend: function(){
            //     $('.loaderonload').show();

            // },
            success: function(res) {
                if (res) {
                    $('.loaderonload').hide();
                    jQuery('#doctors_list').replaceWith(res.data);
                    jQuery('#doctors_list').hide().delay(100).fadeIn();
                    jQuery('.found-doctors-count').text(res.doctorsCount);
                }
            }
        })
    }

    // For ajax requests add active class on selected page
    $(document).on('click', '.pagination a', function(e) {
        e.preventDefault();
        var page_no = $(this).attr('href').split('page=')[1];
        search_doctors(page_no);
    });

    function toggleFavorite(doctorId, userId, checkbox) {
        const isChecked = $(checkbox).is(':checked');

        console.log(`Doctor ID: ${doctorId}, User ID: ${userId}, Checked: ${isChecked}`);

        $.ajax({
            url: "{{ route('patient.update.favorite') }}",
            type: 'POST',
            data: {
                doctor_id: doctorId,
                patient_id: userId,
                liked: isChecked,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                console.log('Favorite status updated:', response);
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    }
</script>
@endsection