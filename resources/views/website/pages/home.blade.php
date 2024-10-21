@extends('layouts.frontend.main')
@section('content')
    <section class="banner-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="banner-content aos">

                        <h1>{!! $sections['home_banner']->title ?? '' !!}
                            {{-- Consult <span>Best Doctors</span> Your Nearby Location. --}}
                        </h1>
                        <img src="{{ URL::asset('assets/img/icons/header-icon.svg') }}" class="header-icon" alt="header-icon">
                        <p>{{ $sections['home_banner']->subtitle ?? '' }}

                            {{-- {{ optional($sections['home_banner']->getButtons->first())->link ?? '' }} --}}
                        </p>
                        <a href="{{ URL::to(optional($sections['home_banner']->getButtons->first())->link) }}"
                            class="btn">{{ optional($sections['home_banner']->getButtons->first())->text ?? '' }}</a>
                        <div class="banner-arrow-img">
                            <img src="{{ URL::asset('assets/img/down-arrow-img.png') }}" class="img-fluid" alt="down-arrow">
                        </div>
                    </div>
                    <div class="search-box-one aos">
                        <form method="get">
                            <div class="search-input search-line">
                                <i class="feather-search bficon"></i>
                                <div class=" mb-0">
                                    <input type="text" class="form-control" id="header_search"
                                        placeholder="Search doctors">
                                </div>
                                <div id="searchedItems"></div>
                            </div>

                            <div class="search-input search-calendar-line">
                                {{-- <i class="feather-calendar"></i> --}}
                                <div class=" mb-0">
                                    <select class="form-control custom-search-select" id="select_services">
                                        <option value="">Select Specialty</option>
                                        @forelse ($specialties as $specialty)
                                            <option value="{{ $specialty->id }}">{{ $specialty->name }}</option>
                                        @empty
                                            <p>Not Found</p>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="form-search-btn">
                                <button class="btn" onclick="return searchdoctor()" type="submit">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="banner-img aos">
                        <img src="{{ $sections['home_banner']->image ?? '' }}" class="img-fluid" alt="patient-image">
                        <div class="banner-img1">
                            <img src="{{ URL::asset('assets/img/banner-img1.png') }}" class="img-fluid" alt="checkup-image">
                        </div>
                        <div class="banner-img2">
                            <img src="{{ URL::asset('assets/img/banner-img2.png') }}" class="img-fluid" alt="doctor-slide">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- this is top doctor section (common section with other pages) --}}
    <x-doctor-slider :doctorList="$doctorList" :show="true" />

    {{-- this is group by doctor specialty section (common section with other pages) --}}
    <x-specialty-group-by-section :specialties="$specialties" :show="true" />

    {{-- how it works section --}}
    <section class="work-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 work-details">
                    <div class="section-header-one aos">
                        <h5>How it Works</h5>
                        <h2 class="section-title">{!! $sections['how_it_works']->title ?? '' !!}</h2>
                    </div>
                    <div class="row">
                        @forelse ($sections['how_it_works']->getContent as  $contentSection)
                            <div class="col-lg-6 col-md-6 aos">
                                <div class="work-info">
                                    <div class="work-icon">
                                        <span><img src="{{ $contentSection->image ?? '' }}"
                                                alt="search-doctor-icon"></span>
                                    </div>
                                    <div class="work-content">
                                        <h5>{{ $contentSection->title ?? '' }}</h5>
                                        <p> {{ $contentSection->content ?? '' }}

                                        </p>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 work-img-info aos">
                    <div class="work-img">
                        <img src="{!! $sections['how_it_works']->image ?? '' !!}" class="img-fluid" alt="doctor-image">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Why airpal section --}}
    <section class="specialities-section-one pt-0">
        <div class="floating-bg">
            <img src="{{ URL::asset('assets/img/bg/health-care.png') }}" alt="heart-image">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 aos aos-init aos-animate">
                    <div class="section-head-fourteen">
                        <h2>{!! $sections['why_airpal_app']->title ?? '' !!} </h2>

                    </div>
                </div>
            </div>
            <div class="specialities-block aos aos-init aos-animate">
                <ul>
                    @forelse ($sections['why_airpal_app']->getContent as  $whyAirpalcontentSection)
                        <li>
                            <div class="specialities-item">
                                <div class="specialities-img">
                                    <div class="hexogen"><img src="{{ $whyAirpalcontentSection['image'] }} "
                                            alt="heart-icon"></div>
                                </div>
                                <p>{{ $whyAirpalcontentSection['title'] }}</p>
                            </div>
                        </li>
                    @empty
                    @endforelse
                </ul>
            </div>
        </div>
    </section>

    {{-- Download app section --}}
    <section class="app-section">
        <div class="container">
            <div class="app-bg">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="app-content">
                            <div class="app-header aos">
                                <h5>{{ $sections['download_app']->subtitle ?? '' }}</h5>
                                <h2>{{ $sections['download_app']->title ?? '' }}</h2>
                            </div>
                            <div class="app-scan aos">
                                {{-- <p>Book your medicines from your app.</p> --}}

                            </div>

                            <div class="google-imgs aos">
                                <a href="{{ $sections['download_app']->getButtons[0]->link ?? '' }}"><img
                                        src="{{ URL::asset('assets/img/google-play.png') }}" alt="img"></a>
                                <a href="{{ $sections['download_app']->getButtons[1]->link ?? '' }}"><img
                                        src="{{ URL::asset('assets/img/app-store.png') }}" alt="img"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 aos">
                        <div class="mobile-img">
                            <img src="{{ $sections['download_app']->image ?? '' }}" class="img-fluid" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--  Our Team Section --}}
    <x-our-teams :show="true" />

    {{--  Faq's Section --}}
    <x-faqs :show="true" />

    {{-- this is testimonial section (common section with other pages) --}}
    <x-testimonial-slider :testimonials="$testimonials" :show="true" />

    {{--  Research Section --}}
    <section class="need-to-know-section">
        <div class="bg-shapes mt-5">
        </div>
        <div class="container">
            <div class="row">
                @isset($sections['research'])
                    <div class="col-lg-6 col-sm-12 aos aos-init aos-animate" data-aos="fade-up">
                        <div class="section-header-one section-header-slider">
                            <h2 class="section-title mb-0"> {{ $sections['research']->title ?? '' }}</h2>
                        </div>
                        <div class="accordion-condition" id="accord-parent">
                            @isset($sections['research'])
                                @forelse ($sections['research']->getContent as $index => $contentSection)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <a href="javascript:void(0);" class="accordion-button collapsed"
                                                data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}"
                                                aria-expanded="false" aria-controls="collapse{{ $index }}">
                                                {{ $contentSection->title ?? '' }}
                                            </a>
                                        </h2>
                                        <div id="collapse{{ $index }}" class="accordion-collapse collapse"
                                            data-bs-parent="#accord-parent">
                                            <div class="accordion-body">
                                                <div class="accordion-content">
                                                    <p>{{ $contentSection->content ?? '' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                            @endisset
                            <a href="{{ route('home.index') }}" class="btn btn-primary mt-1"> Read all</a>
                        </div>
                    </div>
                @endisset
                <div class="col-lg-6 col-md-12 aos aos-init aos-animate" data-aos="fade-up">
                    <div class="gallery-box-block">
                        <div class="box-detail">
                            <img src="{{ $sections['research']->image ?? '' }}" class="img-fluid" alt="image">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- this is our partners section (common section with other pages) --}}
    <x-partner-slider :show="true" />
@endsection

@section('javascript')
    <script>


function searchdoctor() 
{
    var services = $("#select_services").val();
    var query_param    = $("#header_search").val();
    // if (!services) {
    //     alert('Please select a service to search');
    //     return;
    // }
    // Redirect with query parameters
    search_page_url = "{{ route('doctors.index') }}" + `?specialty=${services}&query=${query_param}`;
    console.log('Redirect : ' + search_page_url);
    window.location.replace(search_page_url);
    return false;
}


        
        $(document).ready(function() {
            $("#header_search").keyup(function() {
                filter();
            });

            function filter() {
                var query = $("#header_search").val();

                if (query != '') {
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('global.frontend.search.header') }}",
                        method: "POST",
                        data: {
                            searchKey: query,
                            _token: _token
                        },
                        success: function(data) {
                            $('#searchedItems').fadeIn();
                            console.log(data);
                            $('#searchedItems').html(data);
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                        }
                    });
                } else {
                    $('#searchedItems').fadeOut();
                }
            }
        });
    </script>
@endsection
