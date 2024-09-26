@extends('layouts.admin.main')
@section('content')
    @php
        $userEducationDetails = [];
        $userExperiencesDetails = [];
        $userWorkingHourDetails = [];
        $userAddressDetails = [];
        $userAwardsDetails = [];
        $userLanguageIds = [];
        $userCourse = [];
        $userSpeciality = [];

        if (isset($singleDoctorDetails) && !empty($singleDoctorDetails)) {
            $userEducationDetails = $singleDoctorDetails['educations'];
            $userExperiencesDetails = $singleDoctorDetails['experiences'];
            $userWorkingHourDetails = $singleDoctorDetails['workingHour'];
            $userAddressDetails = $singleDoctorDetails->address;
            $userAwardsDetails = $singleDoctorDetails['awards'];
            $userId = $singleDoctorDetails->id;
      
        }

    @endphp

    <div class="breadcrumb-bar-two">
    </div>
    <div class="content doctor-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xl-3 theiaStickySidebar">

                </div>
                <div class="col-lg-8 col-xl-9">
                    <div class="dashboard-header">
                        <h3>Profile Settings</h3>
                    </div>
                    <div class="setting-tab">
                        <div class="appointment-tabs">
                            <ul class="nav  nav-dynamic">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#personal_details_tab" data-bs-toggle="tab">Personal
                                        Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#address_tab" data-bs-toggle="tab"
                                        {{ isset($singleDoctorDetails->id) ? '' : 'disabled' }}>Address</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#education_tab" data-bs-toggle="tab"
                                        {{ isset($singleDoctorDetails->id) ? '' : 'disabled' }}>Education</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#experience_tab" data-bs-toggle="tab"
                                        {{ isset($singleDoctorDetails->id) ? '' : 'disabled' }}>Experience</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#awards" data-bs-toggle="tab"
                                        {{ isset($singleDoctorDetails->id) ? '' : 'disabled' }}>Awards</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#working_hours_tab" data-bs-toggle="tab"
                                        {{ isset($singleDoctorDetails->id) ? '' : 'disabled' }}>Working Hours</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content">
                        @include('admin.doctor-profile.tabs.personal_detail')
                        @include('admin.doctor-profile.tabs.address')
                        @include('admin.doctor-profile.tabs.experience')
                        @include('admin.doctor-profile.tabs.education')
                        @include('admin.doctor-profile.tabs.working-hour')
                        @include('admin.doctor-profile.tabs.awards')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('admin/assets/custom-js/add_doctor.js') }}"></script>
    <script>
        $(document).ready(function() {


            function updateCharCount() {
        var length = $("#description").val().length;
        var remaining = 1000 - length;

        $('#charCount').text(length + '/1000');

        if (remaining < 0) {
            $('#charCount').css('color', 'red');
        } else {
            $('#charCount').css('color', 'green');
        }
    }

    updateCharCount();

    $("#description").on('input', function() {
        updateCharCount();
    });

            var site_base_url = "{{ env('SITE_BASE_URL') }}";

            var skillId = jQuery('#doctorlanguageID').text();
            if (skillId.length > 1) {
                var arraySkillId = JSON.parse(skillId);
                var skillValue = "" + arraySkillId.join(",") + "";
                var arrs = skillValue.split(',');
            }
            var specialityID = jQuery('#doctorspecialitiesID').text();
            if (specialityID.length > 1) {
                var arrayspecialityID = JSON.parse(specialityID);
                var specialityValue = "" + arrayspecialityID.join(",") + "";
                var specialityArrs = specialityValue.split(',');
            }
            var servicesIds = jQuery('#doctorServicesID').text();
            if (servicesIds.length > 1) {
                var arrayservicesIds = JSON.parse(servicesIds);
                var servicesValue = "" + arrayservicesIds.join(",") + "";
                var servicesArrs = servicesValue.split(',');
            }

            $(".flat-picker").flatpickr({
                enableTime: false,
                dateFormat: "Y-m-d",
            });

            $("#personalDetailsForm").validate({
                rules: {
                    first_name: "required",
                    last_name: "required",
                    gender: "required",
                    password: {
                        required: function(element) {
                            // This will make the password field required only if it exists in the DOM
                            return $("input[name='password']").length > 0;
                        }
                    },

                    phone: "required",

                    email: {
                        required: true,
                        email: true // Add email validation
                    },
                    name: "required",
                    description: {
                        maxlength: 1000
                    }
                },
                messages: {
                    first_name: "Please enter first name!",
                    last_name: "Please enter last name!",
                    display_name: "Please enter display name!",
                    phone: "Please enter phone number!",
                    email: {
                        required: "Please enter email address!",
                        email: "Please enter a valid email address!" // Add email validation message
                    },
                    name: "Please select language!",
                    description: {
                        maxlength: function(range, input) {
                            return [
                                'You are only allowed ',
                                range,
                                ' characters. You have typed ',
                                $(input).val().length,
                                ' characters.'
                            ].join('');
                        }
                    }
                },
                submitHandler: function(form) {
                    var errorTimeout;
                    var formData = new FormData(form);
                    $.ajax({
                        url: "<?= route('admin.add-personal-details') ?>",
                        type: 'post',
                        data: formData,
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                'content') // Add CSRF token
                        },
                        success: function(response) {
                            if (response.status === 'created') {
                                swal.fire("Done!", response.message, "success");
                                setTimeout(function() {
                                    window.location.href =
                                        "{{ route('admin.index.doctors') }}/edit/" +
                                        response.id;
                                    switchTab('#personal_details_tab',
                                        '#address_tab');
                                }, 1500);
                            } else {
                                swal.fire("Done!", response.message, "success");
                                setTimeout(function() {
                                    switchTab('#personal_details_tab',
                                        '#address_tab');
                                }, 1500);
                            }
                        },

                        error: function(error_messages) {
                            var errors = error_messages.responseJSON;
                            $.each(errors.errors, function(key, value) {
                                $('#' + key + '_error').html(value)
                            .show(); // Show the error message
                            });
                            if (errorTimeout) {
                                clearTimeout(errorTimeout);
                            }
                            // Set timeout to remove the error messages after 2 seconds
                            errorTimeout = setTimeout(function() {
                                $('.text-danger').fadeOut();
                            }, 2000);
                        }

                    });
                }
            });




            function switchTab(fromTab, toTab) {
                $(fromTab).removeClass('active').attr('aria-selected', 'false').removeClass('show active');
                var tabLink = document.querySelector('a[href="' + fromTab + '"]');
                if (tabLink) {
                    tabLink.classList.remove('active');
                    tabLink.setAttribute('aria-selected', 'false');
                }
                var newTabLink = document.querySelector('a[href="' + toTab + '"]');
                if (newTabLink) {
                    newTabLink.classList.add('active');
                    newTabLink.setAttribute('aria-selected', 'true');
                }
                $(toTab).addClass('active').attr('aria-selected', 'true').addClass('show active');
            }


            jQuery("#doctorEducationform").validate({
                rules: {
                    "name[]": "required",
                    "course[]": "required",
                    "start_date[]": "required",
                    "end_date[]": "required",
                },
                messages: {
                    "name[]": "Please enter institute name!",
                    "course[]": "Please enter course!",
                    "start_date[]": "Please enter start date!",
                    "end_date[]": "Please enter end date!",
                },
                submitHandler: function(form) {
                    event.preventDefault();

                    var formData = new FormData(form);

                    $.ajax({
                        url: "{{ route('admin.add-doctor-education') }}",
                        type: 'post',
                        data: formData,
                        dataType: 'json',
                        processData: false, // Important!
                        contentType: false, // Important!
                        success: function(response) {

                            if (response.status == 'success') {
                                swal.fire("Done!", response.message, "success");
                                $('#education-tab').removeClass('active').attr(
                                    'aria-selected', 'false');
                                $('#education_tab').removeClass('show active');

                                var tabLink = document.querySelector(
                                    'a[href="#education_tab"]');
                                if (tabLink) {
                                    tabLink.classList.remove('active');
                                    tabLink.setAttribute('aria-selected', 'false');
                                }

                                var exTabLink = document.querySelector(
                                    'a[href="#experience_tab"]');
                                exTabLink.classList.add('active');
                                $('#experience_tab').addClass('active').attr(
                                    'aria-selected', 'true');
                                $('#experience_tab').addClass('show active');
                            }

                        },
                        error: function(error_messages) {
                            if (error_messages.responseJSON && error_messages.responseJSON
                                .status === 'error') {
                                Swal.fire("Error!", error_messages.responseJSON.message,
                                    "error");

                            } else {
                                var errors = error_messages.responseJSON.errors;

                            }

                            
                            if (errors) {
                                $.each(errors, function(key, value) {
                                    var id = key.replace(/\./g, '_');
                                    $("#" + id + "_error").html(value[0]);
                                });
                            }
                        }
                    });
                }
            });

            jQuery("#doctorAddressform").validate({
                rules: {
                    "street": "required",
                    "country": "required",
                    "states": "required",
                    "city": "required",
                },
                messages: {
                    "street": "Please enter street",
                    "country": "Please select country!",
                    "states": "Please select state",
                    "city": "Please enter city",
                },
                submitHandler: function(form) {
                    var formData = $(form).serialize();
                    $.ajax({
                        url: "{{ route('admin.add-doctor-address') }}",
                        type: 'post',
                        data: formData,
                        dataType: 'json',
                        success: function(response) {
                            if (response.status == 'success') {
                                swal.fire("Done!", response.message, "success");
                                $('#address_tab').removeClass('active').attr(
                                    'aria-selected', 'false');
                                $('#address_tab').removeClass('show active');

                                var tabLink = document.querySelector(
                                    'a[href="#address_tab"]');
                                if (tabLink) {
                                    tabLink.classList.remove('active');
                                    tabLink.setAttribute('aria-selected', 'false');
                                }

                                exTabLink = document.querySelector(
                                    'a[href="#education_tab"]');
                                exTabLink.classList.add('active');
                                $('#education_tab').addClass('active').attr('aria-selected',
                                    'true');
                                $('#education_tab').addClass('show active');
                            }
                        },
                        error: function(error_messages) {
                            var errors = error_messages.responseJSON.errors;
                            if (errors) {
                                // Display validation errors
                                $.each(errors, function(key, value) {
                                    // var id = key.replace('.', '_')
                                    var id = key.replace(/\./g, '_');
                                    $("#" + id + "_error").html(value[0]);
                                });
                            }
                        }
                    });
                }
            });




            // insert doctor experience
            jQuery("#doctorExperienceForm").validate({
                rules: {
                    //   "name[]" : "required",
                },
                messages: {
                    "name[]": "Please ",
                },
                submitHandler: function(form) {
                    event.preventDefault();

                    var formData = new FormData(form);
                    $.ajax({
                        url: "{{ route('admin.add-doctor-experience') }}",
                        type: 'post',
                        data: formData,
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            if (response.success == true) {
                                swal.fire("Done!", response.message, "success");
                                $('#experience_tab').removeClass('active').attr(
                                    'aria-selected', 'false');
                                $('#experience_tab').removeClass('show active');

                                var tabLink = document.querySelector(
                                    'a[href="#experience_tab"]');
                                if (tabLink) {
                                    tabLink.classList.remove('active');
                                    tabLink.setAttribute('aria-selected', 'false');
                                }

                                exTabLink = document.querySelector('a[href="#awards"]');
                                exTabLink.classList.add('active');
                                $('#awards').addClass('active').attr('aria-selected',
                                    'true');
                                $('#awards').addClass('show active');
                            }
                        },
                        error: function(error_messages) {

                            if (error_messages.responseJSON && error_messages.responseJSON
                                .status === 'error') {
                                Swal.fire("Error!", error_messages.responseJSON.message,
                                    "error");

                            } else {
                                var errors = error_messages.responseJSON.errors;

                            }

                            $.each(errors.errors, function(key, value) {
                                var id = key.replace(/\./g, '_');
                                $('#' + id + '_error').html(value);
                                remove_error_div(id)
                            })

                        }
                    });
                }
            });
            // insert doctor award data
            jQuery("#doctorAwardForm").validate({
                rules: {
                    "name": "required",
                    "year": "required",
                    "description": "required",
                },
                messages: {
                    "name": "Please enter street",
                    "year": "Please select country!",
                    "description": "Please select state",
                },
                submitHandler: function(form) {
                    event.preventDefault();
                    // var formData = $(form).serialize();
                    var formData = new FormData(form);

                    $.ajax({
                        url: "{{ route('admin.add-doctor-award') }}",
                        type: 'post',
                        data: formData,
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            console.log(response.success);
                            if (response.success == true) {
                                swal.fire("Done!", response.message, "success");
                                $('#awards').removeClass('active').attr('aria-selected',
                                    'false');
                                $('#awards').removeClass('show active');

                                var tabLink = document.querySelector('a[href="#awards"]');
                                if (tabLink) {
                                    tabLink.classList.remove('active');
                                    tabLink.setAttribute('aria-selected', 'false');
                                }

                                var exTabLink = document.querySelector(
                                    'a[href="#working_hours_tab"]');
                                exTabLink.classList.add('active');
                                $('#working_hours_tab').addClass('active').attr(
                                    'aria-selected', 'true');
                                $('#working_hours_tab').addClass('show active');
                            } else {
                                Swal.fire("Error!", "Error deleting experience.", "error");
                            }


                        },
                        error: function(error_messages) {
                            if (error_messages.responseJSON && error_messages.responseJSON
                                .status === 'error') {
                                Swal.fire("Error!", error_messages.responseJSON.message,
                                    "error");

                            } else {
                                var errors = error_messages.responseJSON.errors;

                            }
                            $.each(errors.errors, function(key, value) {
                                var id = key.replace(/\./g, '_');
                                $('#' + id + '_error').html(value);
                                remove_error_div(id)
                            })

                        }
                    });
                }
            });

            $('#country').on('change', function() {
                let countyId = this.value
                $.ajax({
                    url: "{{ route('get.state.by.country.id') }}",
                    type: 'get',
                    data: {
                        'country_id': countyId
                    },
                    dataType: 'json',
                    success: function(response) {
                        var states = response.data;
                        var options = '';
                        //options += "<option>Select State</option>";
                        $.each(states, function(index, item) {

                            options += "<option value='" + item.id + "'>" + item.name +
                                "</option>";
                        });
                        $("#states").html(options);

                    },
                    error: function(error) {
                        console.log("Error fetching data:", error);
                    }
                });
            })

            jQuery("#doctorWorkingHourFormData").validate({
                // rules: {

                // },
                // messages: {

                //     monday_start_time: "Please enter start time for monday!",
                //     monday_end_time: "Please enter end time for monday!",

                // },
                submitHandler: function(form) {
                    var formData = $(form).serialize();
                    $.ajax({
                        url: "<?= route('admin.add-doctor-working-hour') ?>",
                        type: 'POST',
                        data: formData,
                        dataType: 'json',
                        success: function(response) {
                            if (response.success == true) {
                                swal.fire("Done!", response.message, "success");
                                // setTimeout(function() {
                                //     window.location.href =
                                //         "{{ route('admin.index.doctors') }}"
                                // }, 1500);
                            }


                        },
                        error: function(error_messages) {
                            for (let [key, value] of Object.entries(error_messages
                                    .responseJSON.errors)) {
                                let split_arr = key.split('.');
                                let error_key = 'input[name="' + split_arr[0] + '[' +
                                    split_arr[1] + ']' + '[' + split_arr[2] + ']"]';
                                $(document).find(error_key).after(
                                    '<span class="_error' + split_arr[1] +
                                    ' text text-danger">' + value[0].replace(split_arr[
                                        0] + '.' + split_arr[1] + '.', ' ') + '</span>');
                                setTimeout(function() {
                                    jQuery('._error' + split_arr[1]).remove();
                                }, 5000);
                            }
                        }
                    });
                }
            });

            function remove_error_div(error_ele_id) {
                var errorElement = jQuery("#" + error_ele_id + "_error");
                if (errorElement.is(":visible")) {
                    setTimeout(function() {
                        errorElement.hide();
                    }, 3000);
                } else {
                    errorElement.show(); // Ensure the error message is shown
                    setTimeout(function() {
                        errorElement.hide();
                    }, 5000);
                }
            }

            var languageDataSource = new kendo.data.DataSource({
                batch: true,
                transport: {
                    read: {
                        url: site_base_url + "language",
                        dataType: "json"
                    },
                    create: {
                        url: site_base_url + "language/ajax-create",
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



            var specialitiesDataSource = new kendo.data.DataSource({
                batch: true,
                transport: {
                    read: {
                        url: site_base_url + "specialities/get-speciality",
                        dataType: "json",
                        type: "get",
                    },
                    create: {
                        url: site_base_url + "specialities/create-speciality",
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
            var ServicesDataSource = new kendo.data.DataSource({
                batch: true,
                transport: {
                    read: {
                        url: site_base_url + "service/get-service",
                        dataType: "json"
                    },
                    create: {
                        url: site_base_url + "service/ajax-create",
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



            jQuery("#language").kendoMultiSelect({
                filter: "contains",
                dataTextField: "name",
                dataValueField: "id",
                placeholder: 'Please select language...',
                dataSource: languageDataSource,
                value: arrs ?? '',
                noDataTemplate: jQuery("#nolanguageTemplate").html()
            });

            jQuery("#specialities").kendoMultiSelect({
                filter: "contains",
                dataTextField: "name",
                dataValueField: "id",
                placeholder: 'Please select specialties...',
                dataSource: specialitiesDataSource,
                value: specialityArrs ?? '',
                noDataTemplate: jQuery("#nospecialitiesTemplate").html()
            });
            jQuery("#Services").kendoMultiSelect({
                filter: "contains",
                dataTextField: "name",
                dataValueField: "id",
                placeholder: 'Please select services...',
                dataSource: ServicesDataSource,
                value: servicesArrs ?? '',
                noDataTemplate: jQuery("#noServicesTemplate").html()
            });

        });

        /*
         * Working Hours
         * Scroll to selected day
         */
        jQuery('.tab-link').on('click', function() {
            day_div_id = jQuery(this).attr('day-id');

            jQuery('html, body').animate({
                scrollTop: jQuery('#' + day_div_id).offset().top - 100
            }, 100);
        });

        /**
         * Makefrom and to inputs disabled on clicking unavailable for the selected day 
         * */
        function unavailable_for_the_day(this_ele, day_name) {
            let checked_status = jQuery(`#${this_ele}`).is(':checked');
            let tab_id = this_ele.replace('checkbox', 'tab');
            if (!checked_status) {
                jQuery('#' + day_name + '_start_time').prop('disabled', true);
                jQuery('#' + day_name + '_end_time').prop('disabled', true);
                jQuery(`#${tab_id}`).removeClass('active');
            } else {
                jQuery('#' + day_name + '_start_time').prop('disabled', false);
                jQuery('#' + day_name + '_end_time').prop('disabled', false);
                jQuery(`#${tab_id}`).addClass('active');
            }
        }

        /*
           disabled end time for doctor experience when doctor currently working
        */

        function disabled_end_time() {
            let check_status = jQuery("#is_cuurently_working").is(':checked');
            if (check_status) {
                jQuery('#experience_end_time').prop('disabled', true);
            } else {
                jQuery('#experience_end_time').prop('disabled', false);
            }
        }

        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Function to handle file input change dynamically
            const handleFileInputChange = () => {
                const fileInputs = document.querySelectorAll('.certificatesInput');

                fileInputs.forEach(input => {
                    input.addEventListener('change', function(evt) {
                        const file = this.files[0];
                        const previewId = this.getAttribute('data-preview-id');
                        const previewElement = document.getElementById(previewId);

                        if (file) {
                            const fileType = file.type;
                            let previewContent = '';

                            if (fileType === 'application/pdf') {
                                // Create object element for PDF preview
                                previewContent = `
                            <object data="${URL.createObjectURL(file)}" type="application/pdf" width="300" height="200">
                                <p>It appears you don't have a PDF plugin for this browser.
                                    <a href="${URL.createObjectURL(file)}" target="_blank">Click here to download the PDF file.</a>
                                </p>
                            </object>
                            <a href="${URL.createObjectURL(file)}" target="_blank" class="btn btn-primary prime-btn">Click to download PDF</a>
                        `;
                            } else if (fileType.startsWith('image/')) {
                                // Create img element for image preview
                                previewContent =
                                    `<img src="${URL.createObjectURL(file)}" alt="certificate image" width="300" height="200">`;
                            }

                            // Update the preview element with the new content
                            previewElement.innerHTML = previewContent;
                            console.log(
                                `File uploaded for ${this.id} and displayed in ${previewId}`
                            );
                        }
                    });
                });
            };

            // Call the function to set up event listeners
            handleFileInputChange();
        });
    </script>
@endsection
