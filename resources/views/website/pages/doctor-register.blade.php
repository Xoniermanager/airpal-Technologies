@extends('layouts.frontend.main')
@section('content')
    <div class="content top-space">
        <div class="container">
            <div class="row">
                <div class="col-md-9 m-auto">
                    <div class="login-right">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-12 col-lg-6">
                                <div class="login-header">
                                    <h3> Registeration</h3>
                                </div>
                                <form id="register">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-4 form-focus">
                                                <input type="text" class="form-control floating" name="first_name">
                                                <label class="focus-label">First name</label>
                                                <span class="text-danger" id="first_name_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4 form-focus">
                                                <input type="text" class="form-control floating" name="last_name">
                                                <label class="focus-label">Last name</label>
                                                <span class="text-danger" id="last_name_error"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4 form-focus">
                                        <input type="text" class="form-control floating" name="email">
                                        <label class="focus-label">Email</label>
                                        <span class="text-danger" id="email_error"></span>
                                    </div>
                                    <div class="mb-4 form-focus">
                                        <input type="password" class="form-control floating" name="password">
                                        <label class="focus-label">Create Password</label>
                                        <span class="text-danger" id="password_error"></span>
                                    </div>
                                    <div class="mb-4 form-focus">
                                        <input type="text" class="form-control floating" name="phone">
                                        <label class="focus-label">Mobile Number</label>
                                        <span class="text-danger" id="phone_error"></span>
                                    </div>
                                   
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div>
                                                <select name="gender" class="form-control" style="font-size: 14px">
                                                    <option value="">Select Gender</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                                <span class="text-danger" id="gender_error"></span>
                                            </div>
        
                                        </div>
                                        <div class="col-md-6 mb-4">  
                                             <div class="k-justify-content-center">
                                                <div class="k-w-300"> 
                                                    <select id="languages" class="form-control" name="languages[]"></select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4 form-focus">
                                                <div class="k-justify-content-center">
                                                    <div class="k-w-300">
                                                   
                                                        <select id="services" class="form-control"  name="services[]"></select>
                                                    </div>
                                                </div>
                                                <span class="text-danger" id="last_name_error"></span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-4 form-focus">
                                                <div class="k-justify-content-center">
                                                    <div class="k-w-300">
                                              
                                                        <select id="specialty" class="form-control" name="specialities[]"></select>
                                                    </div>
                                                </div>
                                                <span class="text-danger" id="last_name_error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <a class="forgot-link" href="{{ route('login.index') }}">Already have an
                                            account?</a>
                                    </div>
                                    <button class="btn btn-primary w-100 btn-lg login-btn" type="submit">Signup</button>
                                </form>


                            </div>
                            <div class="col-md-6 col-lg-6">
                                <img src="{{ URL::asset('assets/img/doc-register.jpg') }}" class="img-fluid">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')

    <script>
        var site_base_url = "{{ env('SITE_BASE_URL') }}";

            $("#register").validate({
                rules: {
                    first_name: {
                        required: true
                    },
                    last_name: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    phone_number: {
                        required: true,
                        digits: true,
                        minlength: 8,
                        maxlength: 12
                    },
                    password: {
                        required: true,
                        minlength: 8,
                        maxlength: 30
                    },
                    gender: {
                        required: true
                    },
                    'languages[]': {
                        required: true
                    },
                    'services[]': {
                        required: true
                    },
                    'specialities[]': {
                        required: true
                    }
                },
                messages: {
                    first_name: {
                        required: "Please enter your first name"
                    },
                    last_name: {
                        required: "Please enter your last name"
                    },
                    email: {
                        required: "Please enter a valid email address",
                        email: "Please enter a valid email address"
                    },
                    phone_number: {
                        required: "Please enter your phone number",
                        digits: "Please enter only digits",
                        minlength: "Phone number must be at least 8 digits long",
                        maxlength: "Phone number must be no more than 12 digits long"
                    },
                    password: {
                        required: "Please enter your password",
                        minlength: "Password must be at least 8 characters long",
                        maxlength: "Password must be no more than 30 characters long"
                    },
                    gender: {
                        required: "Please select your gender"
                    },
                    'languages[]': {
                        required: "Please select your languages"
                    },
                    'services[]': {
                        required: "Please select your services"
                    },
                    'specialities[]': {
                        required: "Please select your specialties"
                    }
                },
                submitHandler: function(form) {
                    var formData = new FormData(form);
                    console.log(formData);
                    $.ajax({
                        url: "{{ route('admin.add-personal-details')}}",
                        type: 'post',
                        data: formData,
                        processData: false,
                        contentType: false,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.success) {
                                Swal.fire("Done!", response.message, "success").then(() => {
                                    window.location.href = response.redirect_url;
                                });
                            } else {
                                Swal.fire("Error!", response.message, "error");
                            }
                        },
                        error: function(error_messages) {
                            var errors = error_messages.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                $('#' + key + '_error').html(value);
                            });
                        }
                    });
                }
            });
  
    </script>

    <base href="https://demos.telerik.com/kendo-ui/multiselect/serverfiltering">
    <link href="https://kendo.cdn.telerik.com/themes/8.2.1/default/default-main.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2024.3.806/js/kendo.all.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#languages").kendoMultiSelect({
                placeholder: "Select languages...",
                dataTextField: "name",
                dataValueField: "id",
                autoBind: false,
                dataSource: languagesDataSource,
            });
        });

        $(document).ready(function() {
            $("#services").kendoMultiSelect({
                placeholder: "Select services...",
                dataTextField: "name",
                dataValueField: "id",
                autoBind: false,
                dataSource: servicesDataSource,
            });
        });

        $(document).ready(function() {
            $("#specialty").kendoMultiSelect({
                placeholder: "Select specialty...",
                dataTextField: "name",
                dataValueField: "id",
                autoBind: false,
                dataSource: specialityDataSource,
            });
        });

        var languagesDataSource= new kendo.data.DataSource({
        batch: true,
        transport: {
            read: {
                url: site_base_url + "language",
                dataType: "json"
            },
            parameterMap: function(options, operation) {
                if (operation !== "read" && options.models) {
                    return {
                        models: kendo.stringify(options.models)
                    };
                }
            }
        },
        schema: {
            model: {
                id: "id",
                fields: {
                    id: {
                        type: "number"
                    },
                    name: {
                        type: "string"
                    }
                }
            }
        }
    });


        var specialityDataSource= new kendo.data.DataSource({
        batch: true,
        transport: {
            read: {
                 url: site_base_url + "specialities/get-speciality",
             dataType: "json"
            },
            parameterMap: function(options, operation) {
                if (operation !== "read" && options.models) {
                    return {
                        models: kendo.stringify(options.models)
                    };
                }
            }
        },
        schema: {
            model: {
                id: "id",
                fields: {
                    id: {
                        type: "number"
                    },
                    name: {
                        type: "string"
                    }
                }
            }
        }
    });


        var servicesDataSource= new kendo.data.DataSource({
        batch: true,
        transport: {
            read: {
             url: site_base_url + "service/get-service",
                        dataType: "json"
            },
            parameterMap: function(options, operation) {
                if (operation !== "read" && options.models) {
                    return {
                        models: kendo.stringify(options.models)
                    };
                }
            }
        },
        schema: {
            model: {
                id: "id",
                fields: {
                    id: {
                        type: "number"
                    },
                    name: {
                        type: "string"
                    }
                }
            }
        }
    });
    </script>
@endsection
