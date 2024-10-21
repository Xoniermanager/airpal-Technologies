<section class="faq-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="section-header-one text-center aos" >
                    <h5>Get Your Answer</h5>
                    <h2 class="section-title">Frequently Asked Questions</h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 aos" >
                <div class="faq-img">
                    <img src="{{URL::asset('assets/img/faq-img-2.jpg')}}" class="img-fluid" alt="img">
                    <div class="faq-patients-count">
                        <div class="faq-smile-img">
                            <img src="{{URL::asset('assets/img/icons/smiling-icon.svg')}}" alt="icon">
                        </div>
                        <div class="faq-patients-content">
                            <h4><span class="count-digit">95</span>k+</h4>
                            <p>Happy Patients</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="faq-info aos" >
                    <div class="accordion" id="faq-details">

                        @foreach ( $allFaqs->slice(0, 6) as  $key => $allFaq)
                            
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{$key}}">
                                <a href="javascript:void(0);" class="accordion-button {{ $key != 0 ? 'collapsed' : '' }}" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{$key}}" aria-expanded="true"
                                    aria-controls="collapse{{$key}}">
                                   {{ $allFaq->name }}
                                </a>
                            </h2>
                            <div id="collapse{{$key}}" class="accordion-collapse collapse {{ $key==0 ? 'show' : '' }}"
                                aria-labelledby="heading{{$key}}" data-bs-parent="#faq-details">
                                <div class="accordion-body">
                                    <div class="accordion-content">
                                        <p>{{  $allFaq->description}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <h5 class="text-center"> <a href="faq.html" class="fw-bold text-primary">Read All
                                        FAQ's</a></h5>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
