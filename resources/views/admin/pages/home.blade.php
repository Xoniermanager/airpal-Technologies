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
                                <form id="save_home_header_banner_detail" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="setting-card p-0">
                                        {!! getImageInput('','homepage_banner_section[image]') !!}
                                        {!! getImageInput('','homepage_banner_section[content][content_image]') !!}
                                    </div>
                                    <div class="setting-title">
                                        <h5>Section Info</h5>
                                    </div>

                                    <div class="setting-card">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                @php
                                                $home_banner_section_title = isset($sections['home_banner']['title']) ? $sections['home_banner']['title'] : '';
                                                @endphp
                                                {!! getTextInput(
                                                    $home_banner_section_title,
                                                    'Title',
                                                    'homepage_banner_section[title]',
                                                    ['div' => ['test', 'testing', 'tester']],
                                                    ['input' => 'helloId'],
                                                ) !!}
                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                            @php
                                                $home_banner_section_subtitle = isset($sections['home_banner']['subtitle']) ? $sections['home_banner']['subtitle'] : '';
                                            @endphp
                                                {!! getTextInput(
                                                    $home_banner_section_subtitle,
                                                    'Subtitle',
                                                    'homepage_banner_section[subtitle]',
                                                    ['div' => ['test', 'testing', 'tester']],
                                                    ['input' => 'subTitleId'],
                                                ) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="setting-card">
                                        <div class="add-info membership-infos">
                                            <div class="row membership-content">

                                                <input type="hidden" name="page_id"
                                                    value="{{ $sections['home_banner']['page_id'] ?? '' }}">

                                                <input type="hidden" name="homepage_banner_section[button][0][id]"
                                                    value="{{ $sections['home_banner']->getButtons[0]['id'] ?? '' }}">

                                                <input type="hidden" name="homepage_banner_section[id]"
                                                    value="{{ $sections['home_banner']['id'] ?? '' }}">

                                                <input type="hidden" name="homepage_banner_section[section_slug]" value="home_banner">
                                                
                                                <div class="col-lg-6">
                                                @php
                                                    $home_banner_button_text = isset($sections['home_banner']->getButtons[0]['text']) ? $sections['home_banner']->getButtons[0]['text'] : '';
                                                @endphp
                                                    {!! getTextInput(
                                                        $home_banner_button_text,
                                                        'button text',
                                                        'homepage_banner_section[button][0][text]',
                                                        'Button Text',
                                                    ) !!}
                                                </div>
                                                <div class="col-lg-6">
                                                @php
                                                    $home_banner_button_link = isset($sections['home_banner']->getButtons[0]['link']) ? $sections['home_banner']->getButtons[0]['link'] : '';
                                                @endphp
                                                    {!! getTextInput(
                                                        $home_banner_button_link,
                                                        'button link',
                                                        'homepage_banner_section[button][0][link]',
                                                        'Button Link',
                                                    ) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button>Save</button>
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
                border-radius: 100%;
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
                $('form').each(function() {
                    jQuery(this).validate({
                        // rules: {
                        //     banner_title: {
                        //         required: true,
                        //         maxlength: 200
                        //     },
                        //     banner_subtitle: {
                        //         required: true,
                        //         maxlength: 200
                        //     }
                        // },
                        // messages: {
                        //     banner_title: {
                        //         required: "This field is required",
                        //         maxlength: "Please enter no more than 200 characters"
                        //     },
                        //     banner_subtitle: {
                        //         required: "This field is required",
                        //         maxlength: "Please enter no more than 200 characters"
                        //     }
                        // },
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
                                    if (response.status == 200) {
                                        swal.fire("Done!", response.message, "success");
                                        location.reload();
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
