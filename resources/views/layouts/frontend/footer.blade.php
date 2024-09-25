<footer class="footer footer-one">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="footer-widget footer-about">
                        <div class="footer-logo">
                            <a href="{{ route('home.index') }}"><img src="{{ site('website_logo') }}" alt="logo"></a>
                        </div>
                        <div class="footer-about-content">
                            <p>{{ site('website_description') }}"</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-3 col-md-4">
                            <div class="footer-widget footer-menu">
                                <h2 class="footer-title">Company </h2>
                                <ul>
                                    <li><a href="{{ route('about.index') }}">About Us</a></li>
                                    <li><a href="{{ route('contact.index') }}">Contact Us</a></li>
                                    <li><a href="{{ route('health_monitoring.index') }}">Bio-Sensor</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <div class="footer-widget footer-menu">
                                <h2 class="footer-title">For Doctors</h2>
                                <ul>
                                    <li><a href="{{ route('doctors.index') }}">Appointments</a></li>
                                    <li><a href="{{ route('choose') }}">Register</a></li>
                                    <li><a href="{{ route('login.index') }}">Login</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4">
                            <div class="footer-widget footer-contact">
                                <h2 class="footer-title">Contact Us</h2>
                                <div class="footer-contact-info">
                                    <div class="footer-address">
                                        <p><i class="feather-map-pin"></i>{{ site('admin_address') ?? '' }}</p>
                                    </div>
                                    <div class="footer-address">
                                        <p><i class="feather-phone-call"></i><a
                                                href="tel:{{ site('admin_phone') ?? '' }}">
                                                {{ site('admin_phone') ?? '' }}</a></p>
                                    </div>
                                    <div class="footer-address mb-0">
                                        <p><i class="feather-mail"></i> <a
                                                href="mailto:{{ site('admin_email') ?? '' }}"
                                                class="__cf_email__">{{ site('admin_email') ?? '' }}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-7">
                    <div class="footer-widget">
                        <h2 class="footer-title">Join Our Newsletter</h2>
                        <div class="subscribe-form">
                            <form class="" action="{{ route('newsletter') }}" id="newsletter-form"
                                method="POST">
                                @csrf
                                <input class="form-control" type="email" id="email"
                                    placeholder="Please enter your email" name="email" required>
                                <button class="btn newsletter" type="submit">Submit</button>
                            </form>
                        </div>
                        <div class="social-icon">
                            <ul>
                                <li>
                                    <a href="{{ site('facebook_link') }}" target="_blank"><i
                                            class="fab fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="{{ site('instagram_link') }}" target="_blank"><i
                                            class="fab fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="{{ site('twitter_link') }}" target="_blank"><i
                                            class="fab fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="{{ site('linkedin_link') }}" target="_blank"><i
                                            class="fab fa-linkedin-in"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">

            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <div class="copyright-text">
                            <p class="mb-0"> Copyright © {{ site('copyright') ?? '' }} All Rights Reserved</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">

                        <div class="copyright-menu">
                            <ul class="policy-menu">
                                <li><a href="{{ route('gdpr.policy.index') }}">GDPR Policy</a></li>
                                <li><a href="{{ route('cookie.policy.index') }}">Cookies Policy</a></li>
                                <li><a href="{{ route('insurance.policy.index') }}">Insurance Policy</a></li>
                                <li><a href="{{ route('privacy.index') }}">Privacy Policy</a></li>
                                <li><a href="{{ route('term.index') }}">Terms and Conditions</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</footer>

<div class="mouse-cursor cursor-outer"></div>
<div class="mouse-cursor cursor-inner"></div>

<div id="popup-overlay" class="popup-overlay">
    <!-- Popup Box -->
    <div class="popup-box">
        <div class="col-md-12">
            <x-cookie_policy :show="true" />
        </div>
        <div class="modalfooter">
            <button class="btn btn-sm btn-primary save_cookie" id="close-btn">I Agree</button>
            <button class="btn btn-sm btn-dark" id="close-btn">Manage Setting</button>
        </div>
    </div>
</div>

</div>
<div class="progress-wrap active-progress">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
            style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919px, 307.919px; stroke-dashoffset: 228.265px;">
        </path>
    </svg>
</div>


<script>
    $(document).ready(function() {
        // Set the initial cookie if it doesn't exist
        if (!Cookies.get('privacy_policy')) {
            Cookies.set('privacy_policy', '0', {
                expires: 1
            }); // expires in 1 day
        }
        var cookieValue = Cookies.get('privacy_policy');

        if (cookieValue != '1') {
            document.getElementById('popup-overlay').style.display = 'flex';

            document.getElementById('close-btn').addEventListener('click', function() {
                Cookies.set('privacy_policy', '1', {
                    expires: 1
                }); // expires in 1 day or as per requirement
                document.getElementById('popup-overlay').style.display = 'none';
            });
            document.getElementById('close-btn').addEventListener('click', function() {
                document.getElementById('popup-overlay').style.display = 'none';
            });
        }
    });
</script>



{{-- <script src="{{asset('assets/js/jquery-3.7.1.min.js')}}" type="572446aacaa112e2d4b8af55-text/javascript"></script> --}}

<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}" type="572446aacaa112e2d4b8af55-text/javascript"></script>

<script src="{{asset('assets/js/feather.min.js')}}" type="572446aacaa112e2d4b8af55-text/javascript"></script>

<script src="{{asset('assets/js/moment.min.js')}}" type="572446aacaa112e2d4b8af55-text/javascript"></script>
<script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}" type="572446aacaa112e2d4b8af55-text/javascript"></script>

<script src="{{asset('assets/js/owl.carousel.min.js')}}" type="572446aacaa112e2d4b8af55-text/javascript"></script>

<script src="{{asset('assets/js/slick.js')}}" type="572446aacaa112e2d4b8af55-text/javascript"></script>

<script src="{{asset('assets/js/aos.js')}}" type="572446aacaa112e2d4b8af55-text/javascript"></script>

<script src="{{asset('assets/js/counter.js')}}" type="572446aacaa112e2d4b8af55-text/javascript"></script>

<script src="{{asset('assets/js/backToTop.js')}}" type="572446aacaa112e2d4b8af55-text/javascript"></script>

<script src="{{asset('assets/js/script.js')}}" type="572446aacaa112e2d4b8af55-text/javascript"></script>
<script src="{{ asset('assets/js/rocket-loader.min.js') }}" data-cf-settings="572446aacaa112e2d4b8af55-|49" defer>
</script>
<script>
    var subform = $('#newsletter-form');
    $(subform).submit(function(e) {
        $('.newsletter').prop('disabled', true);
        e.preventDefault();
        var formData = subform.serialize();
        $.ajax({
            type: 'POST',
            url: subform.attr('action'),
            data: formData
        }).done(function(response) {
            jQuery('.newsletter').attr('disabled', false);
            if (response.status == false) {
                Object.entries(response.data).forEach(([key, value]) => {
                    jQuery(document).find('#newsletter-form [name=' + key + ']')
                        .after(
                            '<span id="' + key +
                            '_error" class="text text-danger ' + key + '_error">' + value[0] +
                            '</span>');
                    setTimeout(function() {
                        jQuery("#" + key + "_error").remove();
                    }, 5000);
                });
            }
            if (response.status == true) {
                Swal.fire({
                    title: response.message,
                    showClass: {
                        popup: `
                        animate__animated
                        animate__fadeInUp
                        animate__faster
                      `
                    },
                    hideClass: {
                        popup: `
                        animate__animated
                        animate__fadeOutDown
                        animate__faster
                      `
                    }
                });
                $('#contact-form input,#contact-form textarea').val('');
            }
        }).fail(function(data) {
            jQuery('.newsletter').attr('disabled', false);
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Oops! An error occurred and your message could not be sent.",
            });
        });
    });
</script>
</body>

</html>
