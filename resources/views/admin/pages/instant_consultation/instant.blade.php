@extends('layouts.admin.main')
@section('content')
    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">

                    <div class="row">

                        {{-- Banner section --}}
                        <div class="col-sm-12">
                            <h3 class="page-title">Banner Section</h3>
                            <div class="card">
                                <form enctype="multipart/form-data">
                                    @csrf
                                    @include('admin.pages.instant_consultation.instant_banner')
                                </form>
                            </div>
                        </div>

                        {{-- Top Doctros --}}
                        <div class="col-sm-12">
                            <div class="card">
                                <form class="save_extra_page_section" enctype="multipart/form-data">
                                    <h3 class="page-title">Top Doctros</h3>
                                    @csrf
                                    @include('admin.pages.page_extra_section.doctor_slider_filter')

                                    <input type="hidden" name="page_id" value="{{ $page->id ?? '' }}">
                                    
                                    <div class="col-md-3"> <button class="btn btn-primary prime-btn mt-3">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        

                    </div>
                </div>
            </div>
        </div>
    @endsection

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
                                url: "<?= route('admin.store.instant.consultation') ?>",
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
        </script>
    @endsection
