@extends('layouts.doctor.main')
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
                                                        <input type="checkbox" name="gender" value="Male" id="male">
                                                        <span class="checkmark"></span>
                                                        Male Gender
                                                    </label>
                                                </li>
                                                <li>
                                                    <label class="custom_check d-inline-flex">
                                                        <input type="checkbox" name="gender" value="Female" id="female">
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
                                        <a href="#collapsetwo" data-bs-toggle="collapse" class="collapsed">Availability</a>
                                    </h4>
                                    <div id="collapsetwo" class="collapse">
                                        <div class="filter-collapse">
                                            <ul>
                                                <li>
                                                    <label class="custom_check d-inline-flex">
                                                        <input type="checkbox" name="availability">
                                                        <span class="checkmark"></span>
                                                        Available Today
                                                    </label>
                                                </li>
                                                <li>
                                                    <label class="custom_check d-inline-flex">
                                                        <input type="checkbox" name="availability">
                                                        <span class="checkmark"></span>
                                                        Available Tomorrow
                                                    </label>
                                                </li>
                                                <li>
                                                    <label class="custom_check d-inline-flex">
                                                        <input type="checkbox" name="availability">
                                                        <span class="checkmark"></span>
                                                        Available in Next 7 Days
                                                    </label>
                                                </li>
                                                <li>
                                                    <label class="custom_check d-inline-flex">
                                                        <input type="checkbox" name="availability">
                                                        <span class="checkmark"></span>
                                                        Available in Next 30 Days
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>


                                <div class="filter-grid">
                                    <h4>
                                        <a href="#collapsethree" data-bs-toggle="collapse">Consultation Fee</a>
                                    </h4>
                                    <div id="collapsethree" class="collapse">
                                        <div class="filter-collapse">
                                            <div class="filter-content filter-content-slider">
                                                <p>$10 <span>$10000</span></p>
                                                <div class="slider-wrapper">
                                                    <div id="price-range"></div>
                                                </div>
                                                <div class="price-wrapper">
                                                    <h6>Price:
                                                        <span>
                                                            $<span id="pricerangemin"></span>
                                                            - $<span id="pricerangemax"></span>
                                                        </span>
                                                    </h6>
                                                </div>
                                            </div>
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
                                                        <input type="checkbox" name="speciality"  value="{{$specialty->id}}">
                                                        <span class="checkmark"></span>
                                                       {{ $specialty->name}}
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
                                                        <input type="checkbox" name="services"  value="{{$service->id}}">
                                                        <span class="checkmark"></span>
                                                       {{ $service->name}}
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
                                </div>


                                {{-- <div class="filter-grid">
                                    <h4>
                                        <a href="#collapseseven" data-bs-toggle="collapse">By Rating</a>
                                    </h4>
                                    <div id="collapseseven" class="collapse show">
                                        <div class="filter-collapse">
                                            <ul>
                                                <li>
                                                    <div class="custom_check rating_custom_check d-inline-flex">
                                                        <input type="checkbox" name="online">
                                                        <span class="checkmark"></span>
                                                        <div class="rating">
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star filled"></i>
                                                            <span class="rating-count">(40)</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="custom_check rating_custom_check d-inline-flex">
                                                        <input type="checkbox" name="online">
                                                        <span class="checkmark"></span>
                                                        <div class="rating">
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star"></i>
                                                            <span class="rating-count">(35)</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="custom_check rating_custom_check d-inline-flex">
                                                        <input type="checkbox" name="online">
                                                        <span class="checkmark"></span>
                                                        <div class="rating">
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <span class="rating-count">(20)</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="custom_check rating_custom_check d-inline-flex">
                                                        <input type="checkbox" name="online">
                                                        <span class="checkmark"></span>
                                                        <div class="rating">
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <span class="rating-count">(10)</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="custom_check rating_custom_check d-inline-flex">
                                                        <input type="checkbox" name="online">
                                                        <span class="checkmark"></span>
                                                        <div class="rating">
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <span class="rating-count">(05)</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div> --}}


                                <div class="filter-grid">
                                    <h4>
                                        <a href="#collapseeight" data-bs-toggle="collapse">Languages</a>
                                    </h4>
                                    <div id="collapseeight" class="collapse">
                                        <div class="filter-collapse">
                                            <ul>

                                            @forelse ($languages as $language)
                                            <li>
                                                <label class="custom_check d-inline-flex">
                                                    <input type="checkbox" name="langauges" value="{{$language->id}}"> 
                                                    <span class="checkmark"></span>
                                                    {{$language->name}}
                                                </label>
                                            </li> 
                                            @empty
                                            <li>Languages Not Avaiable</li>    
                                            @endforelse
                                            </ul>
                                        </div>
                                    </div>
                                </div>


                                <div class="filter-btn apply-btn">
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="javascript:void(0);" class="btn btn-primary">Apply</a>
                                        </div>
                                        <div class="col-6">
                                            <a href="javascript:void(0);" class="btn btn-outline-primary">Reset</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="doctor-filter-info">
                            <div class="doctor-filter-inner">
                                <div>
                                    <div class="doctors-found">
                                        <p><span>100 Doctors found for:</span> Dentist in San francisco, California</p>
                                    </div>
                                    <div class="doctor-filter-availability">
                                        <p>Availability</p>
                                        <div class="status-toggle status-tog">
                                            <input type="checkbox" id="status_6" class="check">
                                            <label for="status_6" class="checktoggle">checkbox</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="doctor-filter-option">
                                    <div class="doctor-filter-sort">
                                        <p>Sort</p>
                                        <div class="doctor-filter-select">
                                            <select class="select">
                                                <option>A to Z</option>
                                                <option>B to Z</option>
                                                <option>C to Z</option>
                                                <option>D to Z</option>
                                                <option>E to Z</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="doctor-filter-sort">
                                        <p class="filter-today d-flex align-items-center">
                                            <i class="feather-calendar"></i> Today 10 Aug to 20 Aug
                                        </p>
                                    </div>
                                    <div class="doctor-filter-sort">
                                        <ul class="nav">
                                            <li>
                                                <a href="javascript:void(0);" id="map-list">
                                                    <i class="feather-map-pin"></i>
                                                </a>
                                            </li>
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
                        @include('frontend.doctor.doctors_list')
                    </div>
            <div class="row">
            <div class="col-sm-12">
                    <div class="mt-3 d-flex justify-content-end">
                        {{{ $doctors->links() }}}
                    </div>
            </div>
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
<script src="http://127.0.0.1:8000/assets/js/jquery-3.7.1.min.js" type="text/javascript"></script>
<script>


$('input[name="gender"], input[name="langauges"], input[name="experience"] ,input[name="speciality"],input[name="services"]').on('change', function() {
    search_doctors();
});

function search_doctors() {
    
    genderCheckedValue      = [];
    languagesCheckedValue   = [];
    experienceCheckedValue  = [];
    specialityCheckedValue  = [];
    servicesCheckedValue    = [];

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

    $.ajax({
        url: "{{ route('doctors.search') }}",
        type: 'get',
        data: {
            'gender'    : genderCheckedValue,
            'languages' : languagesCheckedValue,
            'experience': experienceCheckedValue,
            'specialty' : specialityCheckedValue,
            'services' : servicesCheckedValue,
        },
        success: function(res) {
            if (res) {
                jQuery('#doctors_list').replaceWith(res.data);
            } 
        }
    })
}
</script>
@endsection

