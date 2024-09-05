@extends('layouts.admin.main')
@section('content')
    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">

                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Header Banner Section</h3>
                            <div class="card">
                                <form id="save_home_header_banner_detail" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="setting-card p-0">
                                        {{-- {!! getImageInput() !!} --}}
                                        <div class="avatar-upload">
                                            <div class="avatar-edit">
                                                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="banner['image']" />
                                                <label for="imageUpload"></label>
                                            </div>
                                            <div class="avatar-preview">
                                                <div id="imagePreview"
                                                    style="background-image: url({{ asset('assets/img/doctors-dashboard/no-apt-3.png') }});">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="setting-title">
                                        <h5>Section Info</h5>
                                    </div>

                                    <div class="setting-card">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                {!! getTextInput(
                                                    'hello',
                                                    'Title',
                                                    "banner['title']",
                                                    ['div' => ['test', 'testing', 'tester']],
                                                    ['input' => 'helloId'],
                                                ) !!}
                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                                {!! getTextInput(
                                                    '',
                                                    'Subtitle',
                                                    "banner['subtitle']",
                                                    ['div' => ['test', 'testing', 'tester']],
                                                    ['input' => 'subTitleId'],
                                                ) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="setting-card">
                                        <div class="add-info membership-infos">
                                            <div class="row membership-content">
                                                <div class="col-lg-12">
                                                    {!! getTextInput('','button text', "banner['btntext']",'Button Text') !!}
                                                    {!! getTextInput('','button link', "banner['btnlink']",'Button Link') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   <button>Save</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <h3 class="page-title">How it Work Section</h3>
                            <div class="card">
                                <form id="save_home_header_banner_detail" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="setting-card p-0">
                                        {{-- {!! getImageInput() !!} --}}
                                        <div class="avatar-upload">
                                            <div class="avatar-edit">
                                                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                                <label for="imageUpload"></label>
                                            </div>
                                            <div class="avatar-preview">
                                                <div id="imagePreview"
                                                    style="background-image: url({{ asset('assets/img/doctors-dashboard/no-apt-3.png') }});">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="setting-title">
                                        <h5>Section Info</h5>
                                    </div>

                                    <div class="setting-card">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                {!! getTextInput(
                                                    'hello',
                                                    'Title',
                                                    'banner_title',
                                                    ['div' => ['test', 'testing', 'tester']],
                                                    ['input' => 'helloId'],
                                                ) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                    <div class="col-lg-4">
                                    <div class="setting-card">
                                        <div class="add-info membership-infos">
                                            <div class="row membership-content">
                                                <div class="col-lg-4">
                                                    {!! getImageInput(
                                                        'hello',
                                                        'Title',
                                                        'banner_title',
                                                        ['div' => ['test', 'testing', 'tester']],
                                                        ['input' => 'helloId'],
                                                    ) !!}
                                                    
                                                </div>
                                                <div class="col-lg-8">
                                                    {!! getTextInput(
                                                        'hello',
                                                        'Title',
                                                        'banner_title',
                                                        ['div' => ['test', 'testing', 'tester']],
                                                        ['input' => 'helloId'],
                                                    ) !!}
                                                </div>
                                                <div class="col-lg-12">
                                                {!! getSectionTextArea('','content') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-lg-4">
                                    <div class="setting-card">
                                        <div class="add-info membership-infos">
                                            <div class="row membership-content">
                                                <div class="col-lg-4">
                                                    {!! getImageInput(
                                                        'hello',
                                                        'Title',
                                                        'banner_title',
                                                        ['div' => ['test', 'testing', 'tester']],
                                                        ['input' => 'helloId'],
                                                    ) !!}
                                                    
                                                </div>
                                                <div class="col-lg-8">
                                                    {!! getTextInput(
                                                        'hello',
                                                        'Title',
                                                        'banner_title',
                                                        ['div' => ['test', 'testing', 'tester']],
                                                        ['input' => 'helloId'],
                                                    ) !!}
                                                </div>
                                                <div class="col-lg-12">
                                                {!! getSectionTextArea('','content') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-lg-4">
                                    <div class="setting-card">
                                        <div class="add-info membership-infos">
                                            <div class="row membership-content">
                                                <div class="col-lg-4">
                                                    {!! getImageInput(
                                                        'hello',
                                                        'Title',
                                                        'banner_title',
                                                        ['div' => ['test', 'testing', 'tester']],
                                                        ['input' => 'helloId'],
                                                    ) !!}
                                                    
                                                </div>
                                                <div class="col-lg-8">
                                                    {!! getTextInput(
                                                        'hello',
                                                        'Title',
                                                        'banner_title',
                                                        ['div' => ['test', 'testing', 'tester']],
                                                        ['input' => 'helloId'],
                                                    ) !!}
                                                </div>
                                                <div class="col-lg-12">
                                                {!! getSectionTextArea('','content') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-lg-4">
                                    <div class="setting-card">
                                        <div class="add-info membership-infos">
                                            <div class="row membership-content">
                                                <div class="col-lg-4">
                                                    {!! getImageInput(
                                                        'hello',
                                                        'Title',
                                                        'banner_title',
                                                        ['div' => ['test', 'testing', 'tester']],
                                                        ['input' => 'helloId'],
                                                    ) !!}
                                                    
                                                </div>
                                                <div class="col-lg-8">
                                                    {!! getTextInput(
                                                        'hello',
                                                        'Title',
                                                        'banner_title',
                                                        ['div' => ['test', 'testing', 'tester']],
                                                        ['input' => 'helloId'],
                                                    ) !!}
                                                </div>
                                                <div class="col-lg-12">
                                                {!! getSectionTextArea('','Button Text') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                   <button class="btn btn-primary prime-btn">Save</button>
                                </form>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <h3 class="page-title">Top Doctors</h3>
                            <div class="card">
                                <form id="personalDetailsForm" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="setting-card">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-wrap">
                                                    <label class="col-form-label">Title <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="title"
                                                        value="">
                                                    <span class="text-danger" id="title_error"></span>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-wrap">
                                                    <label class="col-form-label">Select Type <span
                                                            class="text-danger">*</span></label>
                                                    <select name="" id="" class="form-control">
                                                        <option value="">Select type</option>
                                                        <option value="">Rating</option>
                                                        <option value="">Exeprience</option>
                                                        <option value="">Most Booking</option>
                                                    </select>
                                                    <span class="text-danger" id="subtitle_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-btn text-end">
                                        <a href="#" class="btn btn-gray">Cancel</a>
                                        <button type="submit" class="btn btn-primary prime-btn">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <h3 class="page-title">Why Airpal App</h3>
                            <div class="card">
                                <form id="save_home_header_banner_detail" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="setting-title">
                                        <h5>Section Info</h5>
                                    </div>

                                    <div class="setting-card">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                {!! getTextInput(
                                                    'hello',
                                                    'Title',
                                                    'banner_title',
                                                    ['div' => ['test', 'testing', 'tester']],
                                                    ['input' => 'helloId'],
                                                ) !!}
                                            </div>
                                        </div>
                                    </div>

          
                                    <div class="row">
                                        <div class="col-lg-4">
                                        <div class="setting-card">
                                            <div class="add-info membership-infos">
                                                <div class="row membership-content">
                                                    <div class="col-lg-12">
                                                        {!! getImageInput(
                                                            'hello',
                                                            'Title',
                                                            'banner_title',
                                                            ['div' => ['test', 'testing', 'tester']],
                                                            ['input' => 'helloId'],
                                                        ) !!}
                                                        
                                                    </div>
                                                    <div class="col-lg-12">
                                                        {!! getTextInput(
                                                            'hello',
                                                            'Title',
                                                            'banner_title',
                                                            ['div' => ['test', 'testing', 'tester']],
                                                            ['input' => 'helloId'],
                                                        ) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-lg-4">
                                        <div class="setting-card">
                                            <div class="add-info membership-infos">
                                                <div class="row membership-content">
                                                    <div class="col-lg-12">
                                                        {!! getImageInput(
                                                            'hello',
                                                            'Title',
                                                            'banner_title',
                                                            ['div' => ['test', 'testing', 'tester']],
                                                            ['input' => 'helloId'],
                                                        ) !!}
                                                        
                                                    </div>
                                                    <div class="col-lg-12">
                                                        {!! getTextInput(
                                                            'hello',
                                                            'Title',
                                                            'banner_title',
                                                            ['div' => ['test', 'testing', 'tester']],
                                                            ['input' => 'helloId'],
                                                        ) !!}
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-lg-4">
                                        <div class="setting-card">
                                            <div class="add-info membership-infos">
                                                <div class="row membership-content">
                                                    <div class="col-lg-12">
                                                        {!! getImageInput(
                                                            'hello',
                                                            'Title',
                                                            'banner_title',
                                                            ['div' => ['test', 'testing', 'tester']],
                                                            ['input' => 'helloId'],
                                                        ) !!}
                                                        
                                                    </div>
                                                    <div class="col-lg-12">
                                                        {!! getTextInput(
                                                            'hello',
                                                            'Title',
                                                            'banner_title',
                                                            ['div' => ['test', 'testing', 'tester']],
                                                            ['input' => 'helloId'],
                                                        ) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-lg-4">
                                        <div class="setting-card">
                                            <div class="add-info membership-infos">
                                                <div class="row membership-content">
                                                    <div class="col-lg-12">
                                                        {!! getImageInput(
                                                            'hello',
                                                            'Title',
                                                            'banner_title',
                                                            ['div' => ['test', 'testing', 'tester']],
                                                            ['input' => 'helloId'],
                                                        ) !!}
                                                        
                                                    </div>
                                                    <div class="col-lg-12">
                                                        {!! getTextInput(
                                                            'hello',
                                                            'Title',
                                                            'banner_title',
                                                            ['div' => ['test', 'testing', 'tester']],
                                                            ['input' => 'helloId'],
                                                        ) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                <button class="btn btn-primary prime-btn">Save</button>
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
            + label {
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
        > div {
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
                jQuery("#save_home_header_banner_detail").validate({
                    rules: {
                        banner_title: {
                            required: true,
                            maxlength: 200
                        },
                        banner_subtitle: {
                            required: true,
                            maxlength: 200
                        }
                    },
                    messages: {
                        banner_title: {
                            required: "This field is required",
                            maxlength: "Please enter no more than 200 characters"
                        },
                        banner_subtitle: {
                            required: "This field is required",
                            maxlength: "Please enter no more than 200 characters"
                        }
                    },
                    submitHandler: function(form) {
                        var formData = new FormData(form);
                        $.ajax({
                            url: "<?= route('admin.save.banner.details') ?>",
                            type: 'post',
                            data: formData,
                            dataType: 'json',
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                if (response.status == 200) {
                                    swal.fire("Done!", response.message, "success");
                                    window.location.href = successUrl;
                                }
                            },
                            error: function(error_messages) {
                                var errors = error_messages.responseJSON;
                                $.each(errors.errors, function(key, value) {
                                    console.log('#' + key + '_error',value);
                                    $('#' + key + '_error').html(value);
                                })

                            }
                        });
                    }
                });
            });

    </script>
    @endsection
