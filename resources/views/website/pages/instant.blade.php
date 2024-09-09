@extends('layouts.frontend.main')
@section('content')
    <section class="doctor-search-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 aos" data-aos="fade-up">
                    <div class="doctor-search">
                        <div class="banner-header">
                            <h2>Find Doctor, <br> For Instant Consultation</h2>
                        </div>
                        <div class="doctor-form">
                            <form id="instant_consult"  class="doctor-search-form">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="mb-2">Name</label>
                                            <div class="form-custom">
                                                <input type="text" class="form-control" name="name">
                                                <i class="far fa-user"></i>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="mb-2">Number</label>
                                            <div class="form-custom">
                                                <input type="text" class="form-control"  name="phone">
                                                <i class="fa fa-mobile"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="mb-2">Disease</label>
                                            <div class="form-custom">
                                                <input type="text" class="form-control" name="disease">
                                                <i class="fas fa-fa fa-wheelchair"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn banner-btn mt-3">SUBMIT</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 aos" data-aos="fade-up">
                    <img src="{{ URL::asset('assets/img/banner-fifteen-ryt.png') }}" class="img-fluid dr-img"
                        alt="doctor-image">
                </div>
            </div>
        </div>
    </section>

    {{-- this is top doctor section (common section with other pages) --}}
    <x-doctor-slider :doctorList="$doctorList" :show="true" />

    {{-- this is group by doctor specialty section (common section with other pages) --}}
    <x-specialty-group-by-section :show="true" />
@endsection


@section('javascript')

    <script>
        $(document).ready(function() {
            // $('.loaderonload').hide();
            jQuery("#instant_consult").validate({
                rules: {
                    name: 'required',
                    phone: {
                        required: true,
                        digits: true,
                        minlength: 10,
                        maxlength: 15
                    },
                    disease: 'required',
                },
                messages: {
                    name: "Please enter your name",
                    phone: {
                        required: "Please enter your phone number",
                        digits: "Please enter a valid phone number with digits only",
                        minlength: "Your phone number must be at least 10 digits long",
                        maxlength: "Your phone number must not exceed 15 digits"
                    },
                    disease: "Please select a service",

                },
                submitHandler: function(form) {
                    var formData = new FormData(form);
                    console.log(formData);
                    $.ajax({
                        url: "<?= route('send.instant.mail.index') ?>",
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        dataType: "json",
                        beforeSend: function() {
                            $('.loaderonload').show();
                        },
                        success: function(response) {

                            if (response.success == true) {
                                $('.loaderonload').hide();
                                $('#contact-us')[0].reset();
                                // Swal.fire("Done!", response.message, "success");
                                window.location.href = "<?= route('thank.you') ?>";
                            }
                        },
                        error: function(error_messages) {
                            var errors = error_messages.responseJSON;
                            $.each(errors.errors, function(key, value) {
                                var id = key.replace(/\./g, '_');
                                console.log('#' + id + '_error');
                                $('#' + id + '_error').html(value);
                            });
                        }
                    });
                }
            });
        });
    </script>
@endsection
