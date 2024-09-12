@if ($show)
    <section class="testimonial-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="testimonial-slider slick">
                        @isset($testimonials)
                            @forelse ($testimonials as $testimonial)
                                <div class="testimonial-grid">
                                    <div class="testimonial-info">
                                        <div class="testimonial-img">
                                            <img src="{{ $testimonial->image ?? '' }}" class="img-fluid" alt="John Doe">
                                        </div>
                                        <div class="testimonial-content">
                                            <div class="section-header section-inner-header testimonial-header">
                                                <h5>Testimonials</h5>
                                                <h2>{{ $testimonial->title ?? '' }}</h2>
                                            </div>
                                            <div class="testimonial-details">
                                                <p>{{ $testimonial->description ?? '' }}</p>
                                                <h6><span>{{ $testimonial->username ?? '' }}</span>
                                                    {{ $testimonial->address ?? '' }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p>No testimonials available.</p>
                            @endforelse
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
