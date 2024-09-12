@extends('layouts.admin.main')
@section('content')

    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">

                    <div class="row">

                        {{-- Banner section --}}
                        <div class="col-sm-12">
                            <h3 class="page-title">Header Banner Section</h3>
                            <div class="card">
                                <form enctype="multipart/form-data">
                                    @csrf
                                    @include('admin.pages.homepage.home_banner')
                                </form>
                            </div>
                        </div>


                        {{-- How it Work Section --}}
                        <div class="col-sm-12">
                            <h3 class="page-title">How it Work Section</h3>
                            <div class="card">
                                <form method="post" enctype="multipart/form-data">
                                    @csrf
                                    @include('admin.pages.homepage.how_it_works')
                                </form>
                            </div>
                        </div>


                        {{-- Why Airpal App --}}
                        <div class="col-sm-12">
                            <h3 class="page-title">Why Airpal App</h3>
                            <div class="card">
                                <form method="post" enctype="multipart/form-data">
                                    @csrf
                                    @include('admin.pages.homepage.why_airpal_app')
                                </form>
                            </div>
                        </div>

                        {{-- Banner section --}}
                        <div class="col-sm-12">
                            <h3 class="page-title">Download App Section</h3>
                            <div class="card">
                                <form enctype="multipart/form-data">
                                    @csrf
                                    @include('admin.pages.homepage.download_app')
                                </form>
                            </div>
                        </div>

                        {{-- Top Doctros  and Testimonial Section --}}
                        <div class="col-sm-12">
                            <div class="card">
                                <form class="save_extra_page_section" enctype="multipart/form-data">
                                    <h3 class="page-title">Top Doctros</h3>
                                    @csrf
                                    @include('admin.pages.page_extra_section.doctor_slider_filter')

                                    <h3 class="page-title">Testimonials</h3>
                                    @include('admin.pages.page_extra_section.testimonials')
                                    <input type="hidden" name="page_id" value="{{ $page->id ?? '' }}">
                                    <div class="col-md-3"> <button class="btn btn-primary prime-btn mt-3">Save</button></div>
                                </form>
                            </div>
                        </div>



                        {{-- Research section --}}
                        <div class="col-sm-12">
                            <h3 class="page-title">Research Section</h3>
                            <div class="card">
                                <form enctype="multipart/form-data">
                                    @csrf
                                    @include('admin.pages.homepage.research')
                                </form>
                            </div>
                        </div>
                        


                    </div>
                </div>
            </div>
        </div>
    @endsection

    <style>
        .setting-card {
            margin: 12px !important;
        }

        .avatar-upload {
            position: relative;
            width: 100%;
        }

        .avatar-edit {
            position: absolute;
            right: 12px;
            z-index: 1;
            top: 10px;

            input {
                display: none;

                +label {
                    display: inline-block;
                    width: 34px;
                    height: 34px;
                    margin-bottom: 0;
                    border-radius: 100%;
                    background: #FFFFFF;
                    border: 1px solid transparent;
                    box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
                    cursor: pointer;
                    font-weight: normal;
                    transition: all .2s ease-in-out;

                    &:hover {
                        background: #f1f1f1;
                        border-color: #d6d6d6;
                    }

                    &:after {
                        content: "\f040";
                        font-family: 'FontAwesome';
                        color: #757575;
                        position: absolute;
                        top: 10px;
                        left: 0;
                        right: 0;
                        text-align: center;
                        margin: auto;
                    }
                }
            }
        }

        .avatar-preview {
            width: 100%;
            height: 192px;
            position: relative;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);

            >div {
                width: 100%;
                height: 100%;
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
            }
        }

        .avatar-upload-two {
            position: relative;
            padding: 10px;

            /* max-width: 205px;
            margin: 50px auto; */
            .avatar-edit {
                position: absolute;
                right: 12px;
                z-index: 1;
                top: 10px;

                input {
                    display: none;

                    +label {
                        display: inline-block;
                        width: 34px;
                        height: 34px;
                        margin-bottom: 0;
                        border-radius: 100%;
                        background: #FFFFFF;
                        border: 1px solid transparent;
                        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
                        cursor: pointer;
                        font-weight: normal;
                        transition: all .2s ease-in-out;

                        &:hover {
                            background: #f1f1f1;
                            border-color: #d6d6d6;
                        }

                        &:after {
                            content: "\f040";
                            font-family: 'FontAwesome';
                            color: #757575;
                            position: absolute;
                            top: 10px;
                            left: 0;
                            right: 0;
                            text-align: center;
                            margin: auto;
                        }
                    }
                }
            }

            .avatar-preview-two {
                width: 100px;
                height: 100px;
                position: relative;
                /* border-radius: 100%; */
                padding: 10px;
                border: 6px solid #F8F8F8;
                box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);

                >div {
                    width: 100%;
                    height: 100%;
                    border-radius: 100%;
                    background-size: cover;
                    background-repeat: no-repeat;
                    background-position: center;
                }
            }
        }
    </style>


    @section('javascript')
        <script>
            $(document).ready(function() {
                $('.save_extra_page_section').each(function() {
                    jQuery(this).validate({
                        submitHandler: function(form) {
                            var formData = new FormData(form);
                            $.ajax({
                                url: "<?= route('admin.save.page.extra.sections') ?>",
                                type: 'post',
                                data: formData,
                                dataType: 'json',
                                processData: false,
                                contentType: false,
                                success: function(response) {
                                    if (response.status) {
                                        // console.log(response.data);
                                        for (var key in response.data) {
                                            let slug = response.data[key]['slug'];
                                            let html_data = response.data[key]['data'];
                                            jQuery('#' + slug).replaceWith(html_data);
                                        }

                                        swal.fire("Done!", response.message, "success");
                                    }
                                },
                                error: function(error_messages) {
                                    var errors = error_messages.responseJSON;
                                    $.each(errors.errors, function(key, value) {
                                        console.log('#' + key + '_error',
                                            value);
                                        $('#' + key + '_error').html(value);
                                    })

                                }
                            });
                        }
                    });
                });
            });

            $(document).ready(function() {
                $('form').each(function() {
                    jQuery(this).validate({
                        submitHandler: function(form) {
                            var formData = new FormData(form);
                            $.ajax({
                                url: "<?= route('admin.store.home.page.detail') ?>",
                                type: 'post',
                                data: formData,
                                dataType: 'json',
                                processData: false,
                                contentType: false,
                                success: function(response) {
                                    if (response.status) {
                                        // console.log(response.data);
                                        for (var key in response.data) {
                                            let slug = response.data[key]['slug'];
                                            let html_data = response.data[key]['data'];
                                            jQuery('#' + slug).replaceWith(html_data);
                                        }

                                        swal.fire("Done!", response.message, "success");
                                    }
                                },
                                error: function(error_messages) {
                                    var errors = error_messages.responseJSON;
                                    $.each(errors.errors, function(key, value) {
                                        console.log('#' + key + '_error',
                                            value);
                                        $('#' + key + '_error').html(value);
                                    })

                                }
                            });
                        }
                    });
                });
            });

            function readURL(input, preview_id) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#' + preview_id).css('background-image', 'url(' + e.target.result + ')');
                        $('#' + preview_id).hide();
                        $('#' + preview_id).fadeIn(650);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            jQuery('body').on('change', '.imageUpload', function() {
                console.log(this);
                let preview_id = jQuery(this).attr('preview');
                console.log("preview_id : " + preview_id);
                readURL(this, preview_id);
            });
        </script>
    @endsection
