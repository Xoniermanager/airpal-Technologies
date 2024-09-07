@if ($show)
    <section class="partners-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header-one text-center aos">
                        <h2 class="section-title">Our Partners</h2>
                    </div>
                </div>
            </div>
            <div class="partners-info aos">
                <ul class="owl-carousel partners-slider d-flex">
                    @foreach ($partners as $partner)
                        <li>
                            <a href="javascript:void(0);">
                                <img class="img-fluid" src="{{ $partner['image'] }}" alt="partners">
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
@endif
