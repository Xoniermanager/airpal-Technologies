@extends('layouts.admin.main')
@section('content')
@php
$userEducationDetails        = [];
$userExperiencesDetails      = [];
$userWorkingHourDetails      = [];
$userSpecializaionsDetails   = [];
$userServicesDetails         = [];
$userLanguageDetails         = [];
$userLanguageIds             = [];
$userCourse                  = [];
$userSpeciality              = [];
if(isset($singleDoctorDetails) && !empty($singleDoctorDetails))
{
    $userEducationDetails       =  $singleDoctorDetails['educations'];
    $userExperiencesDetails     =  $singleDoctorDetails['experiences'];
    $userWorkingHourDetails     =  $singleDoctorDetails['workingHour'];
    $userSpecializaionsDetails  =  $singleDoctorDetails['specializaions'];
    $userServicesDetails        =  $singleDoctorDetails['services'];
    $userLanguageDetails        =  $singleDoctorDetails['language'];

    foreach ($userLanguageDetails as $languag) {
            $userLanguageIds[] = $languag['id'];
    }
    foreach ($userEducationDetails as  $education) {
         $userCourse[] = $education['course']['id'];
    }
    foreach ($userSpecializaionsDetails as  $speciality) {
         $userSpeciality[] = $speciality['id'];
    }
    // dd($userSpeciality);
}
@endphp
    <div class="breadcrumb-bar-two">
        <div class="container">
            <div class="row align-items-center inner-banner">
                <div class="col-md-12 col-12 text-center">
                    <h2 class="breadcrumb-title">Doctor Profile</h2>
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                {{-- <a
                                href="{{ route('doctor.doctor-dashboard.index') }}">Home</a> --}}
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Doctor Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
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
                                    <a class="nav-link active" href="#personal_details_tab" data-bs-toggle="tab" >Personal Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#education_tab" data-bs-toggle="tab">Education</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#experience_tab" data-bs-toggle="tab">Experience</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#awards" data-bs-toggle="tab" >Awards</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#working_hours_tab" data-bs-toggle="tab">Working Hours</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content">
                        @include('admin.doctor-profile.tabs.personal_detail')
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
<script src="{{asset('admin/assets/custom-js/add_doctor.js')}}"></script>
    <script>
        $(document).ready(function() {
            // $('.nav-dynamic a[href="#education_tab"]').addClass('show active');
            // $('.nav-dynamic a[href="#personal_details_tab"]').removeClass('show active');
            $("#datepicker").datepicker({
                format: "yyyy-mm-dd",
                startView: 'decade',
                minView: 'decade',
                viewSelect: 'decade',
                autoclose: true
            });
            
            $(".flat-picker").flatpickr({
                enableTime: false,
                // maxDate: "today",
                dateFormat: "Y-m-d",
            });

            // insert personal details 
            jQuery("#personalDetailsForm").validate({
                rules: {
                    first_name: "required",
                    last_name: "required",
                    display_name: "required",
                    phone: "required",
                    email: "required",
                    name : "required"
                },
                messages: {
                    first_name: "Please enter first name!",
                    last_name: "Please enter last name!",
                    display_name: "Please enter display name!",
                    phone: "Please enter phone number!",
                    email: "Please enter email address!",
                    name : "Please select language!"
                },
                submitHandler: function(form) {
                    var formData     = new FormData(form);
                    $.ajax({
                        url: "<?= route('admin.add-personal-details') ?>",
                        type: 'post',
                        data: formData,
                        dataType: 'json',
                        processData: false,
                        contentType: false, 
                        success: function(response) {
                            if (response) {
                                window.location.href = "{{route('admin.index.doctors')}}/edit/" + response;
                                $('#personal_details_tab').removeClass('active show');
                                $('#education_tab').addClass('active show');
                                $('#user_id').val(response);
                            }
                        },
                        error: function(error_messages) {
                            var errors = error_messages.responseJSON;
                            $.each(errors.errors, function(key, value) {
                                // Display error message below each input field
                                // console.log(key);
                                console.log(value);
                                $('#' + key + '_error').html(value);

                                // remove_error_div(key)
                            })

                        }
                    });
                }
            });

            // insert doctor education
            jQuery("#doctorEducationform").validate({
                rules: {
                    "name[]"       : "required",
                    "course[]"     : "required",
                    "start_date[]" : "required",
                    "end_date[]"   : "required",
                },
                messages: {
                    "name[]": "Please enter institue name!",
                    "course[]": "Please enter course!",
                    "start_date[]": "Please enter start date!",
                    "end_date[]": "Please enter end date!",
                },
                submitHandler: function(form) {
                    var formData = $(form).serialize();
                    $.ajax({
                        url : "{{route('admin.add-doctor-education')}}",
                        type: 'post',
                        data: formData,
                        dataType: 'json',
                        success: function(response) {
                            if (response.success) {
                                $('#tabthree').removeClass('active show');
                                $('#tabtwo').addClass('active show');
                                $('#li_tabtwo').removeClass('active');
                                $('#li_tabthree').addClass('active');
                            }
                        },
                        error: function(error_messages) {
                            var errors = error_messages.responseJSON.errors;
                            if (errors) {
                                // Display validation errors
                                $.each(errors, function(key, value) {
                                    var id = key.replace('.', '_')
                                    console.log("#" + id + "_error")
                                    $("#" + id + "_error").html(value[0]);
                                });
                            }
                        }
                    });
                }
            });
            // insert doctor experience
            jQuery("#doctorExperienceForm").validate({
                 rules : {
                    //   "name[]" : "required",
                 },
                 messages : {
                      "name[]": "Please s",
                 },
                 submitHandler : function(form){
                    var formData = $(form).serialize();
                    $.ajax({
                       url      : "{{route('admin.add-doctor-experience')}}",
                       type     : 'post',
                       data     : formData,
                       dataType : 'json',
                       success  : function(response){
                            if (response.success) {
                                $('#tabtwo').removeClass('active show');
                                $('#tabsix').addClass('active show');
                                $('#li_tabthree').removeClass('active');
                                $('#li_tabfour').addClass('active');
                                                        } 
                       },
                       error: function(error_messages) {
                            var errors = error_messages.responseJSON;
                            // console.log(errors)
                            $.each(errors.errors, function(key, value) {
                                var id = key.replace('.', '_')
                                $('#' + id + '_error').html(value);
                                remove_error_div(id)
                            })

                        }
                    });
                 }
            });
            // insert doctor award data
            jQuery("#doctorAwardForm").validate({
                rules : {

                },
                messages : {

                },
                submitHandler : function(form){
                    var formData = $(form).serialize();
                    $.ajax({
                       url      : "{{route('admin.add-doctor-award')}}",
                       type     : 'post',
                       data     : formData,
                       dataType : 'json',
                       success  : function(response){
                            if (response.success) {
                                $('#tabtwo').removeClass('active show');
                                $('#tabsix').addClass('active show');
                                $('#li_tabfour').removeClass('active');
                                $('#li_tabfour').addClass('active');
                            } else {

                            }
                       },
                    });
                 }
            });

            // insert doctor working hour details
            // jQuery("#doctorWorkingHourFormData").validate({
            //     rules: {
                    
            //     },
            //     messages: {
                   
            //     },


            //     submitHandler : function(form){
            //         var formData = $(form).serialize();
            //         $.ajax({
            //            url      : "{{route('admin.add-doctor-working-hour')}}",
            //            type     : 'post',
            //            data     : formData,
            //            dataType : 'json',
            //            success  : function(response){
            //                 if (response.success) {
            //                     $('#tabsix').removeClass('active show');
            //                     $('#tabfive').addClass('active show');
            //                     $('#li_tabfour').removeClass('active');
            //                     $('#li_tabfive').addClass('active');
            //                     $('#doctor_award_user_id').val(response.user_id);
            //                 } 
            //            },
            //            error: function(error_messages) {
            //             var errors = error_messages.responseJSON;

            //             console.log(error_messages.responseJSON)
            //             $.each(errors.errors, function(key, value) {
            //                     $('#' + key + '_error').html(value); 
            //                 });
            //                                     // Open the accordion
            //                 // $('#day-tuesday').collapse('show'); // Adjust the selector as per your HTML structure
            //               }
            //             });
            //      }


            // });
            jQuery("#doctorWorkingHourFormData").validate({
                rules: {
                   //   monday_start_time : "required",
                   // monday_end_time   : "required",   
                },
                messages: {

                    monday_start_time : "Please enter start time for monday!",
                    monday_end_time   : "Please enter end time for monday!",
                    
                },
                submitHandler: function(form) {
                    var formData = $(form).serialize();
                    $.ajax({
                        url: "<?= route('admin.add-doctor-working-hour') ?>",
                        type: 'POST',
                        data: formData,
                        dataType: 'json',
                        success: function(response) {
                            if (response) {
                              
                            }
                        },
                        error: function(error_messages) {
                            for (let [key, value] of Object.entries(error_messages.responseJSON.errors)) {
                            let split_arr = key.split('.');
                            let error_key = 'input[name="' + split_arr[0] +'['+split_arr[1]+']'+'['+split_arr[2]+']"]';
                            $(document).find(error_key).after(
                                '<span class="_error'+split_arr[1]+' text text-danger">' + value[0].replace(split_arr[0]+'.'+split_arr[1]+'.',' ') + '</span>');
                            setTimeout(function() {
                                jQuery('._error'+split_arr[1]).remove();
                            }, 5000);
                        }
                        }
                    });
                }
             });

            function remove_error_div(error_ele_id) {
                setTimeout(function() {
                    jQuery("#" + error_ele_id + "_error").remove();
                }, 5000);
            }
            // for language  
            var site_admin_base_url = 'http://127.0.0.1:8000/admin/';
            var languageDataSource = new kendo.data.DataSource({
                batch: true,
                transport: {
                    read: {
                        url: site_admin_base_url + "language",
                        dataType: "json"
                    },
                    create: {
                        url: site_admin_base_url + "language/ajax-create",
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

            // for course
            courseDataSource   = new kendo.data.DataSource({
                batch: true,
                transport: {
                    read: {
                        url: site_admin_base_url + "course",
                        dataType: "json"
                    },
                    create: {
                        url: site_admin_base_url + "course/ajax-create",
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

            // for hospital
            hospitalDataSource = new kendo.data.DataSource({
                batch: true,
                transport: {
                    read: {
                        url: site_admin_base_url + "hospital",
                        dataType: "json"
                    },
                    create: {
                        url: site_admin_base_url + "hospital/ajax-create",
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

            // for award
            awardDataSource    = new kendo.data.DataSource({
                batch: true,
                transport: {
                    read: {
                        url: site_admin_base_url + "award",
                        dataType: "json"
                    },
                    create: {
                        url: site_admin_base_url + "award/ajax-create",
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

            jQuery("#award").kendoMultiSelect({
                filter: "contains",
                dataTextField: "name",
                dataValueField: "id",
                dataSource: awardDataSource,
                noDataTemplate: jQuery("#noAwardTemplate1").html()
            });

            jQuery("#hospital").kendoMultiSelect({
                filter: "contains",
                dataTextField: "name",
                dataValueField: "id",
                dataSource: hospitalDataSource,
                noDataTemplate: jQuery("#noHospitalTemplate").html()
            });

            jQuery("#language").kendoMultiSelect({
                filter: "contains",
                dataTextField: "name",
                dataValueField: "id",
                dataSource: languageDataSource,
                noDataTemplate: jQuery("#nolanguageTemplate").html()
            });
            jQuery("#course").kendoDropDownList({
                filter: "startswith",
                dataTextField: "name",
                dataValueField: "id",
                dataSource: courseDataSource,
                noDataTemplate: jQuery("#noCourseTemplate").html()
            });

             /*
                 code for selected language for update 
             */
            //     function populateLanguageForUpdate(selectedLanguageIds) {
            //        $("#language").data("kendoMultiSelect").value(selectedLanguageIds);
            //     }
            //    var selectedLanguageIds  = <?php echo json_encode($userLanguageIds); ?>; 
            //    populateLanguageForUpdate(selectedLanguageIds);

               /*
                  code for course allready selected and show  
               */
            //    function populateCourseForUpdate(selectedLanguageIds) {
            //      $("#course").data("kendoMultiSelect").value(selectedLanguageIds);
            //    }
            //    var selectedCourseIds  = <?php echo json_encode($userCourse); ?>; 
            //       populateCourseForUpdate(selectedCourseIds);

            });

  /*
 * Working Hours
 * Scroll to selected day
 */
jQuery('.tab-link').on('click',function(){
    day_div_id = jQuery(this).attr('day-id');
    
    // Adding active class to clicked tab
    // var checkboxes = document.querySelectorAll(".user-accordion-item input[type='checkbox']");
    // checkboxes.forEach(function(checkbox) {
    //     jQuery(checkbox).removeClass('active');
    // });
    // jQuery(this).addClass('active');

    jQuery('html, body').animate({
        scrollTop: jQuery('#'+ day_div_id).offset().top - 100 
    },100);
});

/**
 * Makefrom and to inputs disabled on clicking unavailable for the selected day 
 * */
function unavailable_for_the_day(this_ele,day_name)
{
    let checked_status = jQuery(`#${this_ele}`).is(':checked');
    let tab_id = this_ele.replace('checkbox','tab');
    if(!checked_status)
    {
        jQuery('#'+day_name+'_start_time').prop('disabled',true);
        jQuery('#'+day_name+'_end_time').prop('disabled',true);
        jQuery(`#${tab_id}`).removeClass('active');
    }
    else
    {
        jQuery('#'+day_name+'_start_time').prop('disabled',false);
        jQuery('#'+day_name+'_end_time').prop('disabled',false);
        jQuery(`#${tab_id}`).addClass('active');
    }
    // let test = 
    // console.log(day_name +'_start_time : ' + test);
}

/*
   disabled end time for doctor experience when doctor currently working
*/

function disabled_end_time(){
    let check_status = jQuery("#is_cuurently_working").is(':checked');
   if(check_status)
   {
       jQuery('#experience_end_time').prop('disabled',true);
   }
   else
   {
    jQuery('#experience_end_time').prop('disabled',false);
   }
}

function addCourse(widgetId, value) {
    var widget = jQuery("#" + widgetId).getKendoDropDownList();
    var dataSource = widget.dataSource;
        dataSource.add({
            name: value
        });
        dataSource.one("sync", function() {
            widget.select(dataSource.view().length - 1);
        });
        dataSource.sync();
    }

    </script>
@endsection
