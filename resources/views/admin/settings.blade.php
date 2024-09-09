@extends('layouts.admin.main')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">General Settings</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript:(0)">Settings</a></li>
                            <li class="breadcrumb-item active">General Settings</li>
                        </ul>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">General </h4>
                        </div>
                        <div class="card-body">
                            <form id="save_configs" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="mb-2">Website Name</label>
                                        <input type="hidden" value="website_name" class="form-control"
                                            name="config[website_name][name]">
                                        <input type="text" class="form-control" name="config[website_name][value]"
                                            value="{{ $configData['website_name'] ?? '' }}">
                                            <span class="text-denger" id="config_website_name_value_error" style="color: red">

                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="mb-2">Website Url</label>
                                        <input type="hidden" value="website_url" class="form-control"
                                            name="config[website_url][name]">
                                        <input type="text" class="form-control" name="config[website_url][value]"
                                            value="{{ $configData['website_url'] ?? '' }}">
                                            <span class="text-denger" id="config_website_url_value_error" style="color: red">

                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="mb-2">Admin Email</label>
                                        <input type="hidden" value="admin_email" class="form-control"
                                            name="config[admin_email][name]">
                                        <input type="text" class="form-control" name="config[admin_email][value]"
                                            value="{{ $configData['admin_email'] ?? '' }}">
                                            <span class="text-denger" id="config_admin_email_value_error" style="color: red">

                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="mb-2">Admin Phone</label>
                                        <input type="hidden" value="admin_phone" class="form-control"
                                            name="config[admin_phone][name]">
                                        <input type="text" class="form-control" name="config[admin_phone][value]"
                                            value="{{ $configData['admin_phone'] ?? '' }}">
                                            <span class="text-denger" id="config_admin_phone_value_error" style="color: red">

                                    </div>


                                    <div class="col-md-4 mb-3">
                                        <label class="mb-2">Website Logo</label>
                                        <input type="hidden" value="website_logo" class="form-control"
                                            name="config[website_logo][name]">
                                        <input type="file" class="form-control" name="config[website_logo][value]"
                                            value="{{ $configData['website_logo'] ?? '' }}" id="imgInp">
                                            <span class="text-denger" id="config_website_logo_value_error" style="color: red">

                                        <small class="text-secondary">Recommended image size is <b>150px x 150px</b></small>


                                    </div>
                                    <div class="col-md-2 mb-3">
                                        @if (isset($configData['website_logo']))
                                            <img src="{{ $configData['website_logo'] }}" alt="Current Logo"
                                                style="width: 150px;" id="blah">
                                        @endif
                                    </div>
                                    <div class="col-md-4 mb-0">
                                        <label class="mb-2">Favicon</label>
                                        <input type="hidden" value="website_favicon" class="form-control"
                                            name="config[website_favicon][name]">
                                        <input type="file" class="form-control" name="config[website_favicon][value]"
                                            value="{{ $configData['website_favicon'] ?? '' }}">
                                            <span class="text-denger" id="config_website_favicon_value_error" style="color: red">



                                        <small class="text-secondary">Recommended image size is <b>16px x 16px</b> or
                                            <b>32px x 32px</b></small><br>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        @if (isset($configData['website_favicon']))
                                            <img src="{{ asset($configData['website_favicon']) }}" alt="Current Favicon"
                                                style="width: 150px;">
                                        @endif
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="mb-2">CopyRight</label>
                                        <input type="hidden" value="copyright" class="form-control"
                                            name="config[copyright][name]">
                                        <input type="text" class="form-control" name="config[copyright][value]"
                                            value="{{ $configData['copyright'] ?? '' }}">
                                            <span class="text-denger" id="config_copyright_value_error" style="color: red">

                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="mb-2">Admin Address</label>
                                        <input type="hidden" value="admin_address" class="form-control"
                                            name="config[admin_address][name]">
                                        <input type="text" class="form-control" name="config[admin_address][value]"
                                            value="{{ $configData['admin_address'] ?? '' }}">
                                            <span class="text-denger" id="config_admin_address_value_error" style="color: red">
                                    </div>

                                    <!-- Facebook Link -->
                                    <div class="col-md-6 mb-3">
                                        <label class="mb-2">Facebook Link</label>
                                        <input type="hidden" value="facebook_link" class="form-control"
                                            name="config[facebook_link][name]">
                                        <input type="text" class="form-control" name="config[facebook_link][value]"
                                            value="{{ $configData['facebook_link'] ?? '' }}">
                                            <span class="text-denger" id="config_facebook_link_value_error" style="color: red">

                                    </div>

                                    <!-- Instagram Link -->
                                    <div class="col-md-6 mb-3">
                                        <label class="mb-2">Instagram Link</label>
                                        <input type="hidden" value="instagram_link" class="form-control"
                                            name="config[instagram_link][name]">
                                        <input type="text" class="form-control" name="config[instagram_link][value]"
                                            value="{{ $configData['instagram_link'] ?? '' }}">
                                            <span class="text-denger" id="config_instagram_link_value_error" style="color: red">

                                    </div>

                                    <!-- Twitter Link -->
                                    <div class="col-md-6 mb-3">
                                        <label class="mb-2">Twitter Link</label>
                                        <input type="hidden" value="twitter_link" class="form-control"
                                            name="config[twitter_link][name]">
                                        <input type="text" class="form-control" name="config[twitter_link][value]"
                                            value="{{ $configData['twitter_link'] ?? '' }}">
                                            <span class="text-denger" id="config_twitter_link_value_error" style="color: red">

                                    </div>

                                    <!-- LinkedIn Link -->
                                    <div class="col-md-6 mb-3">
                                        <label class="mb-2">LinkedIn Link</label>
                                        <input type="hidden" value="linkedin_link" class="form-control"
                                            name="config[linkedin_link][name]">
                                        <input type="text" class="form-control" name="config[linkedin_link][value]"
                                            value="{{ $configData['linkedin_link'] ?? '' }}">
                                            <span class="text-denger" id="config_linkedin_link_value_error" style="color: red">

                                    </div>



                                    <div class="col-md-12 mb-3">
                                        <label class="mb-2">Website description</label>
                                        <input type="hidden" value="website_description" class="form-control h-100px"
                                            name="config[website_description][name]"
                                            name="config[website_description][value]">
                                        <textarea rows="10" class="form-control h-100px" name="config[website_description][value]"
                                            value="{{ $configData['website_description'] ?? '' }}">{{ $configData['website_description'] ?? '' }}</textarea>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit"
                                            class="form-control btn btn-primary text-white">Submit</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    </div>
@endsection

@section('javascript')
    <script src="{{ asset('admin/assets/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            jQuery("#save_configs").validate({
                submitHandler: function(form) {
                    var formData = new FormData(form);
                    $.ajax({
                        url: "<?= route('add.website.configs') ?>",
                        type: 'POST', // Changed to POST for sending form data
                        data: formData,
                        processData: false, // Important for FormData
                        contentType: false, // Important for FormData
                        dataType: "json",
                        success: function(response) {
                            if (response.status == true) {
                                Swal.fire("Done!", response.message, "success");
                            }
                        },
                        error: function(xhr, status, error) {
                        var errors = xhr.responseJSON;
                        if (errors && errors.errors) {
                            $.each(errors.errors, function(key, value) {
                                $('#' + key.replace(/\./g, '_') + '_error').html(value[0]);
                            });
                        } else {
                            // Optionally handle other types of errors or show a generic error message
                            Swal.fire("Error!", "An unexpected error occurred.", "error");
                        }
                    }

                    });
                }
            });
        });
    </script>
@endsection
